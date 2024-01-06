<?php 
define( 'HQ_LAT', -7.220155 );
define( 'HQ_LNG', 112.771491 );
define( 'PER_KM', 1800 );
define( 'ONGKIR_MIN', 6400 );
define( 'PEMBULATAN', 500 );

add_action( 'woocommerce_cart_calculate_fees', 'woo_add_cart_fee' );
function woo_add_cart_fee( $cart ){
    global $woocommerce;

    if ( ! $_POST || ( is_admin() && ! is_ajax() ) ) { return; }

    if ( isset( $_POST['post_data'] ) ) {
        parse_str( $_POST['post_data'], $post_data );
    } else {
        $post_data = $_POST;
    }

    $estimasi_rute = ( isset($post_data['billing_distance']) && $post_data['billing_distance']  > 0 ) ? $post_data['billing_distance'] : 0;

    $ongkir = ( $estimasi_rute/1000 ) * PER_KM;
    $ongkir = ( $ongkir < ONGKIR_MIN ) ? ONGKIR_MIN : $ongkir;
     
    $ongkir = ceil( $ongkir / PEMBULATAN ) * PEMBULATAN;
    // ceil:pembulatan atas, memanjakan driver 
    // floor: pembulatan bawah memanjakan customer
    WC()->cart->add_fee( 'Ongkir', $ongkir );

}

add_action( 'wp_enqueue_scripts', 'woo_leaflet', 9 );
function woo_leaflet() {
    wp_deregister_style( 'leaflet_style' );
    wp_register_style( 'leaflet_style', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css' );
	wp_enqueue_style( 'leaflet_style' );

    wp_deregister_style( 'leaflet_routing_machine_style' );
    wp_register_style( 'leaflet_routing_machine_style', 'https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css' );
	wp_enqueue_style( 'leaflet_routing_machine_style' );


	wp_deregister_script( 'leaflet_script' );
    wp_register_script( 'leaflet_script', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', array(), '1.0', true );
	wp_enqueue_script( 'leaflet_script' );

	wp_deregister_script( 'leaflet_routing_machine_script' );
    wp_register_script( 'leaflet_routing_machine_script', 'https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js', array(), '1.0', true );
	wp_enqueue_script( 'leaflet_routing_machine_script' );


	wp_deregister_script( 'zee_script' );
	wp_register_script( 'zee_script', get_template_directory_uri() . '/script.js', array(), '1.0', true );
    wp_localize_script( 'zee_script', 'zee_script_object',
		array( 
			'ajax_url' => admin_url('admin-ajax.php'),
			'toko_lat' => HQ_LAT,
			'toko_lng' => HQ_LNG,
		)
	);
	wp_enqueue_script( 'zee_script' );
}

add_action( 'woocommerce_form_field_text','additional_paragraph_after_billing_address_1', 10, 4 );
function additional_paragraph_after_billing_address_1( $field, $key, $args, $value ){
    if ( is_checkout() && $key == 'billing_address_1' ) {
        $field .= '<p id="map" class="form-row" style="height:300px"></p>';
    }
    return $field;
}



add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
     $fields['billing']['billing_coordinate'] = array(
        'label'     => false,
        'placeholder'   => _x('Coordinate', 'placeholder', 'woocommerce'),
        'required'  => false,
        'type'      => 'hidden',
        'class'     => array('form-row-wide'),
        'clear'     => true
     );
     $fields['billing']['billing_distance'] = array(
        'label'     => false,
        'placeholder'   => _x('Distance', 'placeholder', 'woocommerce'),
        'required'  => false,
        'type'      => 'hidden',
        'class'     => array('form-row-wide'),
        'clear'     => true
     );

     return $fields;
}

/**
 * Display field value on the order edit page
 */
 
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo '
        <p><strong>'.__('Map').':</strong> <a target="_blank" href="https://www.google.com/maps/dir/'.HQ_LAT.','.HQ_LNG.'/'.get_post_meta($order->get_id(),'_billing_coordinate',true).'/@'.get_post_meta($order->get_id(),'_billing_coordinate',true).',15z?entry=ttu">Google Maps</a></p>
        <p><strong>'.__('Distance').':</strong> ' . get_post_meta( $order->get_id(), '_billing_distance', true ) . 'm</p>
    ';
}
add_action('wp_ajax_atc', 'atc');
add_action("wp_ajax_nopriv_atc", 'atc');
function atc(){
      $id = $_POST['pid'];
    // WC()->cart->empty_cart(); // kosongkan keranjang
    WC()->cart->add_to_cart($_POST['pid']);// tambahkan 1 (satu) unit produk kedalam keranjang
    $subtotal =wc_price(WC()->cart->subtotal) ;
    echo get_the_title($id). ' berhasil ditambahkan ke <a href="' . wc_get_cart_url().'">keranjang</a>  Total: '.$subtotal.'';

    wp_die();
}
add_action('wp_ajax_selipkan_film', 'selipkan_film');
add_action("wp_ajax_nopriv_selipkan_film", 'selipkan_film');
function selipkan_film(){

     $post_id = wp_insert_post(array(
        'post_title' => $_POST['judul'],
        'post_content' => $_POST['sinopsis'],
        'post_status' => 'publish',
        'post_type' => 'movie',
        'meta_input' => array(
            'negara' =>  $_POST['negara'],
            'released' =>  $_POST['released'],
            'poster' =>  $_POST['poster'],
        ),
    ));
    if( !is_wp_error($post_id) ){ //Sukses
        echo 'SUKSES...!!!';
    }else{ // gagal
        echo $post_id->get_error_message();
    }
    wp_die();
}
/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_book_init() {
	$labels = array(
		'name' => 'Testimony',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimony' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor',  'thumbnail' ),
	);
	register_post_type( 'testimony', $args );
	register_post_type(
         'movie',
          array(
            'labels' => array (
                'name' => 'Movies',
            ),
		     'supports'=> array( 'title',
              'editor',
              'thumbnail' 
            ),
            'public' => true,
            'has_archive' => true,
          ) 
        );
}

add_action( 'init', 'wpdocs_codex_book_init' );
function fimage($postID){
    if( has_post_thumbnail($postID) ){// punya
        $featured_img_url = get_the_post_thumbnail_url($postID,'full');
    }else{// tidak punya
        $featured_img_url = 'https://cdn.pnghd.pics/data/272/gambar-baby-boss-keren-17.jpg';
    }
    return $featured_img_url;
}


// -----------------------------------------
add_action( 'cmb2_admin_init', 'yourprefix_register_demo_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function yourprefix_register_demo_metabox() {
	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => 'yourprefix_demo_metabox',
		'title'         => esc_html__( 'Test Metabox', 'cmb2' ),
		'object_types'  => array( 'movie' ), // Post type
		
	) );
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Image', 'cmb2' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'cmb2' ),
		'id'   => 'poster',
		'type' => 'file',
	) );
    $cmb_demo->add_field( array(
		'name' => esc_html__( 'Negara', 'cmb2' ),
		'id'   => 'negara',
		'type' => 'text_small',
    ) );
    $cmb_demo->add_field( array(
		'name' => esc_html__( 'Released', 'cmb2' ),
		'id'   => 'released',
		'type' => 'text_small',
    ) );
    // $cmb_demo->add_field( array(
	// 	'name' => esc_html__( 'Budget', 'cmb2' ),
	// 	'id'   => 'budget',
	// 	'type' => 'text_small',
    // ) );
    // $cmb_demo->add_field( array(
	// 	'name' => esc_html__( 'Aspec', 'cmb2' ),
	// 	'id'   => 'aspec',
	// 	'type' => 'text_small',
    // ) );
	

}