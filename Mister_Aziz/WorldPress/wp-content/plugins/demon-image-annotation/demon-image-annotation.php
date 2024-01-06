<?php
/**
 * Demon Image Annotation
 *
 * @package     Demon_Image_Annotation
 * @author      demonisblack
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Demon Image Annotation
 * Plugin URI: https://www.superwhite.cc/demon/image-annotation-plugin
 * Description: Allows you to add textual annotations to images by select a region of the image and then attach a textual description, the concept of annotating images with user comments.
 * Author: demonisblack
 * Version: 5.1
 * Text Domain: demon-image-annotation
 * Domain Path: /languages/
 * Author URI: https://www.superwhite.cc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

require_once 'config.php';
require_once 'includes/class-image-annotation-list-table.php';
require_once 'includes/data.php';
require_once 'includes/functions.php';

/**
 * Header function.
 */
function dia_jquery() {
	wp_register_style( 'dia-annotate-style', plugins_url( '/css/annotation.css', __FILE__ ), array(), DIA_PLUGIN_VERSION );
	wp_enqueue_style( 'dia-annotate-style' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-resizable' );
	wp_enqueue_script( 'jquery-ui-draggable' );

	wp_deregister_script( 'jquery-annotate' );
	wp_register_script( 'jquery-annotate', plugins_url( 'js/jquery.annotate.js', __FILE__ ), array( 'jquery' ), DIA_PLUGIN_VERSION, true );
	wp_localize_script(
		'jquery-annotate',
		'myAjax',
		array(
			'ajaxurl'  => admin_url( 'admin-ajax.php' ),
			'security' => wp_create_nonce( 'dia-security-nonce' ),
		)
	);
	wp_enqueue_script( 'jquery-annotate' );

	wp_deregister_script( 'jquery-annotate-config' );
	wp_register_script( 'jquery-annotate-config', plugins_url( 'js/jquery.annotate.config.js', __FILE__ ), array( 'jquery' ), DIA_PLUGIN_VERSION, true );
	wp_enqueue_script( 'jquery-annotate-config' );
}

/**
 * Admin header function.
 */
function dia_admin_jquery() {
	wp_register_style( 'dia-admin-style', plugins_url( '/css/admin.css', __FILE__ ), array(), DIA_PLUGIN_VERSION );
	wp_enqueue_style( 'dia-admin-style' );

	wp_deregister_script( 'dia-script' );
	wp_register_script( 'dia-script', plugins_url( 'js/admin.js', __FILE__ ), array( 'jquery' ), DIA_PLUGIN_VERSION, true );
	wp_enqueue_script( 'dia-script' );
}

/**
 * JQuery Init function.
 */
function dia_init_js() {
	$page = 0;
	if ( is_single() ) {
		$page = 0;
	}

	$init_note = false;
	if ( get_option( 'demon_image_annotation_display' ) === '0' ) {
		if ( get_option( 'demon_image_annotation_comments' ) === '0' && comments_open() ) {
			$init_note = true;
		} else {
			$init_note = true;
		}
	}

	if ( $init_note ) {
		?>
	<script language="javascript">
	jQuery(document).ready(function(){
		jQuery(this).initAnnotate({
				container:'<?php echo esc_textarea( get_option( 'demon_image_annotation_postcontainer' ) ); ?>',
				pageOnly:<?php echo esc_textarea( $page ); ?>,
				adminOnly:<?php echo esc_textarea( get_option( 'demon_image_annotation_admin' ) ); ?>,
				autoResize:'<?php echo esc_textarea( get_option( 'demon_image_annotation_autoresize' ) ); ?>',
				numbering:'<?php echo esc_textarea( get_option( 'demon_image_annotation_numbering' ) ); ?>',
				removeImgTag:<?php echo esc_textarea( get_option( 'demon_image_annotation_clickable_text' ) ); ?>,
				mouseoverDesc:'<?php echo esc_textarea( get_option( 'demon_image_annotation_mouseoverdesc' ) ); ?>',
				maxLength:<?php echo esc_textarea( get_option( 'demon_image_annotation_maxlength' ) ); ?>,
				imgLinkOption:'<?php echo esc_textarea( get_option( 'demon_image_annotation_linkoption' ) ); ?>',
				imgLinkDesc:'<?php echo esc_textarea( get_option( 'demon_image_annotation_linkdesc' ) ); ?>',
				userLevel:
				<?php
				wp_get_current_user();
				global $user_level;
				echo esc_textarea( $user_level );
				?>
		});
	});
	</script>
		<?php
	}
}

/**
 * Ajax function.
 */
function dia_wp_ajax_function() {
	if ( ! check_ajax_referer( 'dia-security-nonce', 'security', false ) ) {
		wp_send_json_error( 'Invalid security token sent.' );
		wp_die();
	} else {
		include plugin_dir_path( __FILE__ ) . 'includes/run.php';
		wp_die();
	}
}

/**
 * Comment function.
 */
function dia_thumbnail() {
	$php_self = ( isset( $_SERVER['PHP_SELF'] ) ? sanitize_text_field( wp_unslash( $_SERVER['PHP_SELF'] ) ) : '' );
	if ( basename( $php_self ) !== 'includes/run.php' ) {
		global $comment;
		$comment_id = $comment->comment_ID;

		global $wpdb;
		$img_id_now = $wpdb->get_var( $wpdb->prepare( 'SELECT note_img_ID, note_ID FROM %1s WHERE note_comment_id = %s', DIA_TABLE_NOTES, (int) $comment_id ) );
		$img_id     = $wpdb->get_var( $wpdb->prepare( 'SELECT note_ID FROM %1s WHERE note_comment_id = %s', DIA_TABLE_NOTES, (int) $comment_id ) );

		$is_admin = current_user_can( 'manage_options' );
		if ( strlen( $img_id_now ) > 0 ) {
			$str = substr( $img_id_now, 4, strlen( $img_id_now ) );
			if ( $is_admin ) {
				echo '<div id="comment-' . esc_attr( $str ) . "\"><a href='" . esc_url( admin_url( DIA_PLUGIN_URL . 'dia_image_notes&action=edit&note=' ) ) . esc_attr( $img_id ) . "'>" . esc_html__( 'Edit Image Note', 'demon-image-annotation' ) . ' > #' . esc_textarea( $img_id_now ) . '</a></div>';
			} else {
				echo '<div id="comment-' . esc_attr( $str ) . "\"><a href='#" . esc_textarea( $str ) . "'>" . esc_html__( 'noted on', 'demon-image-annotation' ) . ' #' . esc_textarea( $img_id_now ) . '</a></div>';
			}
		} else {
			echo '&nbsp;';
		}
	}
}

/**
 * Thumbnail Inserter function.
 *
 * @param string $comment_id comment id.
 */
function dia_thumbnail_inserter( $comment_id = 0 ) {
	dia_thumbnail();
	$comment_content = get_comment_text();
	return $comment_content;
}

if ( ( get_option( 'demon_image_annotation_display' ) === '0' ) ) {
	if ( ( get_option( 'demon_image_annotation_thumbnail' ) === '0' ) ) {
		add_filter( 'comment_text', 'dia_thumbnail_inserter', 10, 4 );
	}
}

/**
 * Admin Init function.
 */
function dia_admin_init() {
	$dia_display        = dia_default( 'demon_image_annotation_display' );
	$dia_admin          = dia_default( 'demon_image_annotation_admin' );
	$dia_gravatar       = dia_default( 'demon_image_annotation_gravatar' );
	$dia_resize         = dia_default( 'demon_image_annotation_autoresize' );
	$dia_autoimageid    = dia_default( 'demon_image_annotation_autoimageid' );
	$dia_numbering      = dia_default( 'demon_image_annotation_numbering' );
	$dia_mouseoverdesc  = dia_default( 'demon_image_annotation_mouseoverdesc' );
	$dia_linkoption     = dia_default( 'demon_image_annotation_linkoption' );
	$dia_linkdesc       = dia_default( 'demon_image_annotation_linkdesc' );
	$dia_clickable_text = dia_default( 'demon_image_annotation_clickable_text' );
	$dia_maxlength      = dia_default( 'demon_image_annotation_maxlength' );
	$dia_autoapprove    = dia_default( 'demon_image_annotation_autoapprove' );
	$dia_comments       = dia_default( 'demon_image_annotation_comments' );
	$dia_thumbnail      = dia_default( 'demon_image_annotation_thumbnail' );

	dia_createtable();
	dia_admin_ignore_notice();
}

/**
 * Admin default option function.
 *
 * @param string $con type of option.
 */
function dia_default( $con ) {
	$dia_option = get_option( $con );
	if ( '' === $dia_option ) {
		switch ( $con ) {
			case 'demon_image_annotation_autoresize':
				$dia_option = '1';
				break;
			case 'demon_image_annotation_display':
				$dia_option = '0';
				break;
			case 'demon_image_annotation_admin':
				$dia_option = '1';
				break;
			case 'demon_image_annotation_gravatar':
				$dia_option = '0';
				break;
			case 'demon_image_annotation_autoimageid':
				$dia_option = '0';
				break;
			case 'demon_image_annotation_numbering':
				$dia_option = '0';
				break;
			case 'demon_image_annotation_mouseoverdesc':
				$dia_option = 'Mouseover to load notes';
				break;
			case 'demon_image_annotation_linkoption':
				$dia_option = '0';
				break;
			case 'demon_image_annotation_linkdesc':
				$dia_option = '%TITLE%';
				break;
			case 'demon_image_annotation_clickable_text':
				$dia_option = '0';
				break;
			case 'demon_image_annotation_maxlength':
				$dia_option = '140';
				break;
			case 'demon_image_annotation_comments':
				$dia_option = '0';
				break;
			case 'demon_image_annotation_thumbnail':
				$dia_option = '0';
				break;
			case 'demon_image_annotation_autoapprove':
				$dia_option = '1';
				break;
		}
		update_option( $con, $dia_option );
	}
	return $dia_option;
}

/**
 * Admin page function.
 */
function dia_admin() {
	include plugin_dir_path( __FILE__ ) . 'includes/admin.php';
}

/**
 * Admin menu function.
 */
function dia_admin_menu() {
	$imgtitle = esc_html__( 'Image Notes', 'demon-image-annotation' );
	add_menu_page( $imgtitle, $imgtitle, 1, 'dia_image_notes', 'dia_admin', plugins_url( 'icon.png', __FILE__ ) );

	if ( current_user_can( 'manage_options' ) ) {
		add_submenu_page( 'dia_image_notes', $imgtitle, $imgtitle, 1, 'dia_image_notes' );
		add_submenu_page( 'dia_image_notes', esc_html__( 'Settings', 'demon-image-annotation' ), esc_html__( 'Settings', 'demon-image-annotation' ), 'manage_options', 'dia_settings', 'dia_admin' );
		add_submenu_page( 'dia_image_notes', esc_html__( 'Usage', 'demon-image-annotation' ), esc_html__( 'Usage', 'demon-image-annotation' ), 'manage_options', 'dia_usage', 'dia_admin' );

		global $wpdb;
		$notes_count = 0;

		if ( get_option( 'demon_image_annotation_comments' ) === '0' ) {
			$notes_count = $wpdb->get_var( $wpdb->prepare( 'SELECT COUNT(*) FROM %1s WHERE note_approved = %1s AND note_comment_ID != %1s', DIA_TABLE_NOTES, 0, 0 ) );
		} else {
			$notes_count = $wpdb->get_var( $wpdb->prepare( 'SELECT COUNT(*) FROM %1s WHERE note_approved = %1s AND note_comment_ID = %1s', DIA_TABLE_NOTES, 0, 0 ) );
		}

		global $menu;
		foreach ( $menu as $key => $value ) {
			if ( $menu[ $key ][0] === $imgtitle ) {
				$menu[ $key ][0] .= sprintf( " <span class='update-plugins count-%s'><span class='plugin-count'>%s</span></span>", esc_textarea( $notes_count ), esc_textarea( $notes_count ) );
			}
		}
	}
}

/**
 * Admin header function.
 */
function dia_admin_head() {
	$page   = ( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '' );
	$action = ( isset( $_REQUEST['action'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['action'] ) ) : '' );
	if ( is_admin() && 'dia_image_notes' === $page && 'edit' === $action ) {
		dia_jquery();
		?>
	<script language="javascript">
	jQuery(document).ready(function(){
		jQuery(this).initAnnotate({
				container:'#dia-admin-holder',
				numbering:1,
				pluginPath:'<?php echo esc_textarea( plugins_url( 'includes/run', __FILE__ ) ); ?>',
				mouseoverDesc:'<?php echo esc_textarea( get_option( 'demon_image_annotation_mouseoverdesc' ) ); ?>',
				maxLength:<?php echo esc_textarea( get_option( 'demon_image_annotation_maxlength' ) ); ?>,
				imgLinkOption:1,
				userLevel:
				<?php
				wp_get_current_user();
				global $user_level;
				echo esc_textarea( $user_level );
				?>
				,
				previewOnly:1
		});
	});
	</script>
		<?php
	}
}

/**
 * Create table function.
 */
function dia_createtable() {
	$dia_cur_version = DIA_PLUGIN_VERSION;

	global $wpdb;
	$dia_pluginver = get_option( 'demon_image_annotation_pluginver' );

	// Rename old table.
	if ( '' === $dia_pluginver || $dia_pluginver < $dia_cur_version ) {
		if ( $wpdb->get_var( "show tables like '%1s'", DIA_TABLE_NOTES ) !== DIA_TABLE_NOTES ) {
			$wpdb->query( 'Rename table `demon_imagenote` to `%1s`;', DIA_TABLE_NOTES );
			$wpdb->query( 'Rename table `wp_imagenote` to `%1s`;', DIA_TABLE_NOTES );
		}
	}

	if ( $wpdb->get_var( "show tables like '%1s'", DIA_TABLE_NOTES ) !== DIA_TABLE_NOTES ) {
		$sql = 'CREATE TABLE IF NOT EXISTS `' . DIA_TABLE_NOTES . '` (
		`note_ID` bigint(20) NOT NULL AUTO_INCREMENT,
		`note_img_ID` varchar(30) NOT NULL,
		`note_comment_ID` bigint(20) NOT NULL,
		`note_post_ID` bigint(20) NOT NULL,
		`note_author` varchar(100) NOT NULL,
		`note_email` varchar(100) NOT NULL,
		`note_top` bigint(20) NOT NULL,
		`note_left` bigint(20) NOT NULL,
		`note_width` bigint(20) NOT NULL,
		`note_height` bigint(20) NOT NULL,
		`note_text` text NOT NULL,
		`note_text_ID` varchar(100) NOT NULL,
		`note_editable` tinyint(1) NOT NULL,
		`note_approved` VARCHAR(20) NOT NULL,
		`note_date` datetime NOT NULL,
		PRIMARY KEY (`note_ID`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci AUTO_INCREMENT=21 ;';

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );

	} else {
		if ( '' === $dia_pluginver || $dia_pluginver <= $dia_cur_version ) {
			$wpdb->query( 'ALTER TABLE `%1s` CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;', DIA_TABLE_NOTES );
			$wpdb->query( 'ALTER TABLE `%1s` modify `note_img_ID` VARCHAR(30);', DIA_TABLE_NOTES );
			$wpdb->query( 'ALTER TABLE `%1s` modify `note_ID` bigint(20) NOT NULL AUTO_INCREMENT, modify `note_comment_ID` bigint(20), modify `note_top` bigint(20), modify `note_left` bigint(20), modify `note_width` bigint(20), modify `note_height` bigint(20), modify `note_text` text, modify `note_approved` VARCHAR(20);', DIA_TABLE_NOTES );
			$wpdb->query( 'ALTER TABLE `%1s` ADD `note_post_ID` bigint(20) NOT NULL AFTER `note_comment_ID`;', DIA_TABLE_NOTES );

			$dia_pluginver = $dia_cur_version;
			update_option( 'demon_image_annotation_pluginver', $dia_pluginver );
		}
	}
}

/**
 * Admin notice function.
 */
function dia_admin_notice() {
	global $current_user;
	if ( ! get_user_meta( $current_user->ID, 'dia_admin_ignore_notice' ) ) {
		global $pagenow;
		$paged       = ( isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : '' );
		$request_url = ( isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '' );
		echo '<div class="updated"><h3>' . esc_html__( 'demon Image annotation', 'demon-image-annotation' ) . '</h3><p>';
		if ( 'dia_image_notes' === $paged || 'dia_settings' === $paged || 'dia_usage' === $paged ) {
			printf( '<b>' . esc_html__( 'Important:', 'scoreboard-for-html5-game' ) . '</b> ' . esc_html__( 'Please update the new version', 'scoreboard-for-html5-game' ) . ' | <a href="%s%1$s">' . esc_html__( 'Hide Notice', 'scoreboard-for-html5-game' ) . '</a>', esc_url( DIA_PLUGIN_URL ), esc_textarea( str_replace( '%7E', '~', $request_url ) ), '&dia_admin_ignore_notice=0' );
		} else {
			printf( '<b>' . esc_html__( 'Important:', 'scoreboard-for-html5-game' ) . '</b> ' . esc_html__( 'Please update the new version', 'scoreboard-for-html5-game' ) . ' | <a href="%1$s">' . esc_html__( 'Hide Notice', 'scoreboard-for-html5-game' ) . '</a>', esc_url( DIA_PLUGIN_URL ), '?dia_admin_ignore_notice=0' );
		}
		echo '</p></div>';
	}
}

/**
 * Admin ignore notice function.
 */
function dia_admin_ignore_notice() {
	global $current_user;
	$dia_admin_ignore_notice = ( isset( $_GET['dia_admin_ignore_notice'] ) ? sanitize_text_field( wp_unslash( $_GET['dia_admin_ignore_notice'] ) ) : '' );
	if ( '0' === $dia_admin_ignore_notice ) {
		add_user_meta( $current_user->ID, 'dia_admin_ignore_notice', 'true', true );
	}
}

/**
 * Admin bar function.
 *
 * @param string $admin_bar admin bar.
 */
function dia_admin_bar( $admin_bar ) {
	if ( current_user_can( 'manage_options' ) ) {

		global $wpdb;
		$notes_count = 0;

		if ( get_option( 'demon_image_annotation_comments' ) === '0' ) {
			$notes_count = $wpdb->get_var( $wpdb->prepare( 'SELECT COUNT(*) FROM %1s WHERE note_approved = %1s AND note_comment_ID != %1s', DIA_TABLE_NOTES, 0, 0 ) );
		} else {
			$notes_count = $wpdb->get_var( $wpdb->prepare( 'SELECT COUNT(*) FROM %1s WHERE note_approved = %1s AND note_comment_ID = %1s', DIA_TABLE_NOTES, 0, 0 ) );
		}

		$url = admin_url( 'admin.php?page=' );

		$args = array(
			'id'    => 'dia',
			'title' => '<span class="ab-icon"><img src=' . plugins_url( 'icon.png', __FILE__ ) . ' /></span><span class="ab-label count-' . esc_textarea( $notes_count ) . '">' . esc_textarea( $notes_count ) . '</span>',
			'href'  => sprintf( $url . '%s', 'dia_image_notes' ),
			'meta'  => array(),
		);
		$admin_bar->add_node( $args );
	}
}


/**
 * Auto genrate id function.
 *
 * @param string $content content.
 */
function dia_filter_img( $content ) {
	// $matches will be an array with all images.
	preg_match_all( '/<img[^>]+\>/i', $content, $matches );

	$img_arr = array();

	global $post;
	foreach ( $matches[0] as $img ) {
		$post_id_tag = 'data-post-id="' . $post->ID . '" ';
		$img_id_tag  = '';

		preg_match_all( '/(id|src)=("[^"]*")/i', $img, $img_arr );

		if ( 'id' === $img_arr[1][0] && '' !== $img_arr[2][0] ) {
			// 'ID exist'.
		} else {
			if ( get_option( 'demon_image_annotation_autoimageid' ) === '0' ) {
				if ( 'src' === $img_arr[1][0] && '' !== $img_arr[2][0] ) {
					$imgsrc     = substr( $img_arr[2][0], 1, -1 );
					$img_id     = md5( $imgsrc );
					$img_id_tag = 'id="img-' . $post->ID . '-' . substr( $img_id, 0, 10 ) . '" ';
				}
			}
		}
		$newimg  = str_replace( 'img ', 'img ' . $img_id_tag . $post_id_tag, $img );
		$content = str_replace( $img, $newimg, $content );
	}
	return $content;
}

/**
 * Admin plugin action function.
 *
 * @param string $links links.
 */
function dia_plugin_action( $links ) {
	$mylinks = array(
		sprintf( '<a href="%s">' . esc_html__( 'Settings', 'demon-image-annotation' ) . '</a>', DIA_PLUGIN_URL . 'dia_settings' ),
		sprintf( '<a href="%s">' . esc_html__( 'Image Notes', 'demon-image-annotation' ) . '</a>', DIA_PLUGIN_URL . 'dia_image_notes' ),
	);
	return array_merge( $mylinks, $links );
}

/**
 * Admin row meta function.
 *
 * @param string $links links.
 * @param string $file file.
 */
function dia_plugin_row_meta( $links, $file ) {
	$plugin = plugin_basename( __FILE__ );
	if ( $file === $plugin ) {
		return array_merge(
			$links,
			array( sprintf( '<a href="http://goo.gl/cMgHz4">Donate</a>' ) )
		);
	}
	return $links;
}

add_action( 'wp_enqueue_scripts', 'dia_jquery' );
add_action( 'wp_head', 'dia_init_js' );
add_action( 'wp_ajax_get', 'dia_wp_ajax_function' );
add_action( 'wp_ajax_save', 'dia_wp_ajax_function' );
add_action( 'wp_ajax_delete', 'dia_wp_ajax_function' );
add_action( 'wp_ajax_nopriv_get', 'dia_wp_ajax_function' );
add_action( 'wp_ajax_nopriv_save', 'dia_wp_ajax_function' );
add_action( 'admin_enqueue_scripts', 'dia_admin_jquery' );

if ( is_admin() ) {
	if ( current_user_can( 'manage_options' ) ) {
		add_action( 'admin_init', 'dia_admin_init' );
		add_action( 'admin_notices', 'dia_admin_notice' );
		add_filter( 'comment_text', 'dia_thumbnail_inserter', 10, 4 );
	}
}
add_action( 'admin_head', 'dia_admin_head' );
add_action( 'admin_menu', 'dia_admin_menu' );
add_action( 'admin_bar_menu', 'dia_admin_bar', 70 );
add_filter( 'the_content', 'dia_filter_img' );

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'dia_plugin_action' );
add_filter( 'plugin_row_meta', 'dia_plugin_row_meta', 10, 2 );

?>
