<?php

/** PHP Collection */
function var_dump_pre($mixed = null) {
	echo '<pre>';
	var_dump($mixed);
	echo '</pre>';
	return null;
}
function var_dump_ret($mixed = null) {
	ob_start();
	var_dump($mixed);
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
// $example = array( 'SSR'=>1, 'SR'=>4, 'R'=>10, 'UC'=>35, 'C'=>100 );
function getRandomWeightedElement(array $weightedValues) {
	$rand = mt_rand(1, (int) array_sum($weightedValues));
	foreach ($weightedValues as $key => $value) {
		$rand -= $value;
		if ($rand <= 0) {
			return $key;
		}
	}
}
function str_truncator($str,$count){
	$exc = get_the_excerpt();
	if( strlen($str) > $count ) {
		$str = str_replace( '"', '\'', $exc );
		$str = strip_tags($str);
		$str = substr($str, 0, $count);
		$str = substr($str, 0, strripos($str, " "));
		$str = $str.'...';
		return $str;
	} else {
		return $str;
	}
}
function validasi($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


/** Theme setup */
add_action( 'after_setup_theme', 'absensi_setup' );
function absensi_setup() {
	// Theme supports
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );

	show_admin_bar(false);
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
}

// Fully Disable Gutenberg editor.
add_filter('use_block_editor_for_post_type', '__return_false', 10);
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );
function remove_block_css() {
	wp_dequeue_style( 'wp-block-library' ); // Wordpress core
	wp_dequeue_style( 'wp-block-library-theme' ); // Wordpress core
	wp_dequeue_style( 'wc-block-style' ); // WooCommerce
	wp_dequeue_style( 'global-styles' ); // global inline styles
	wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
}

/** Register Scripts */
if (!is_admin()) add_action('wp_enqueue_scripts', 'absensi_scripts_enqueue', 111);
function absensi_scripts_enqueue() {
	// Don't load Gutenberg-related stylesheets.
	wp_dequeue_style( 'wp-block-library' ); // Wordpress core
	wp_dequeue_style( 'wp-block-library-theme' ); // Wordpress core
	wp_dequeue_style( 'wc-block-style' ); // WooCommerce
	wp_dequeue_style( 'global-styles' ); // global inline styles
	wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
	wp_dequeue_style( 'classic-theme-styles' ); // geez... hopefulley this wil truly be the last one
	
	// wp_deregister_script('wp-embed');
	
	wp_enqueue_style( 'absensi-style', get_stylesheet_uri() );

	wp_deregister_script('absensi-js');
	wp_register_script('absensi-js', get_template_directory_uri() . '/script.js', false, null, true);
	$misc = array(
		'site_name' => get_bloginfo('name'),
		'home_url' => home_url(),
		'ajax_url' => admin_url('admin-ajax.php'),
	);
	wp_localize_script( 'absensi-js', 'absensi_misc_data', $misc );
	wp_enqueue_script('absensi-js');
}











add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );
function keep_me_logged_in_for_1_year( $expirein ) {
	return YEAR_IN_SECONDS * 99; // 99 years
}

add_action('after_switch_theme', 'absensi_install');
function absensi_install () {
	if( !get_option('absensi_installed') ) {
		global $wpdb;

		$table_name = $wpdb->prefix . "absensi";
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  user_id mediumint(9) NOT NULL,
		  action int(1) NOT NULL,
		  timestamp int(12) NOT NULL,
		  PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
		
		// keep report that the table has been installed
		update_option( 'absensi_installed', '1' );
	}
}

add_action( 'wp_ajax_absen', 'absen' );
add_action( 'wp_ajax_nopriv_absen', 'absen' );
function absen() {
	if( is_user_logged_in() ) {
		global $wpdb;
		$user = wp_get_current_user();
		$user_id = get_current_user_id();
		$table = $wpdb->prefix . 'absensi';
		
		// get last action to determine current action
		$lastAct = $wpdb->get_results( $wpdb->prepare( "SELECT action FROM $table WHERE user_id=$user_id ORDER BY timestamp DESC LIMIT 1") );
		if( $lastAct[0]->action == 1 ) {
			$action = 0;
			$actStr = 'out';
		} else {
			$action = 1;
			$actStr = 'in';
		}
		
		// insert new log
		$data = array(
			'user_id' => $user_id,
			'action' => $action,
			'timestamp' => time(),
		);
		$format = array('%d','%d','%d');
		$wpdb->insert($table,$data,$format);
		// $output = $wpdb->insert_id;
		$output = $user->display_name . ' has logged ' . $actStr . '. (logID: #' . $wpdb->insert_id . ')';
		
	} else {
		$output = "User is not logged in.";
	}
	
	echo json_encode($output);
	
	wp_die();
}