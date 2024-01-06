<?php
/**
 * Coaching Institute: Customizer
 *
 * @subpackage Coaching Institute
 * @since 1.0
 */

use WPTRT\Customize\Section\Coaching_Institute_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Coaching_Institute_Button::class );

	$manager->add_section(
		new Coaching_Institute_Button( $manager, 'coaching_institute_pro', [
			'title' => __( 'Coaching Institute Pro', 'coaching-institute' ),
			'priority' => 0,
			'button_text' => __( 'Go Pro', 'coaching-institute' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/coaching-institute-wp-theme/', 'coaching-institute')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'coaching-institute-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'coaching-institute-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function coaching_institute_customize_register( $wp_customize ) {

	$wp_customize->add_setting('coaching_institute_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('coaching_institute_logo_padding',array(
		'label' => __('Logo Margin','coaching-institute'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('coaching_institute_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'coaching_institute_sanitize_float'
	));
	$wp_customize->add_control('coaching_institute_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','coaching-institute'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('coaching_institute_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'coaching_institute_sanitize_float'
	));
	$wp_customize->add_control('coaching_institute_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','coaching-institute'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('coaching_institute_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'coaching_institute_sanitize_float'
	));
	$wp_customize->add_control('coaching_institute_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','coaching-institute'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('coaching_institute_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'coaching_institute_sanitize_float'
 	));
 	$wp_customize->add_control('coaching_institute_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','coaching-institute'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('coaching_institute_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'coaching_institute_sanitize_checkbox'
	));
	$wp_customize->add_control('coaching_institute_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','coaching-institute'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'coaching_institute_site_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'coaching_institute_site_title_color', array(
		'label' => 'Title Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_setting('coaching_institute_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'coaching_institute_sanitize_checkbox'
	));
	$wp_customize->add_control('coaching_institute_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','coaching-institute'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'coaching_institute_site_tagline_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'coaching_institute_site_tagline_color', array(
		'label' => 'Tagline Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_panel( 'coaching_institute_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'coaching-institute' ),
		'description' => __( 'Description of what this panel does.', 'coaching-institute' ),
	) );

	$wp_customize->add_section( 'coaching_institute_theme_options_section', array(
    	'title'      => __( 'General Settings', 'coaching-institute' ),
		'priority'   => 30,
		'panel' => 'coaching_institute_panel_id'
	) );

	$wp_customize->add_setting('coaching_institute_theme_options',array(
		'default' => 'One Column',
		'sanitize_callback' => 'coaching_institute_sanitize_choices'
	));
	$wp_customize->add_control('coaching_institute_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','coaching-institute'),
		'section' => 'coaching_institute_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','coaching-institute'),
		   'Right Sidebar' => __('Right Sidebar','coaching-institute'),
		   'One Column' => __('One Column','coaching-institute'),
		   'Grid Layout' => __('Grid Layout','coaching-institute')
		),
	));

	$wp_customize->add_setting('coaching_institute_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'coaching_institute_sanitize_choices'
	));
	$wp_customize->add_control('coaching_institute_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','coaching-institute'),
        'section' => 'coaching_institute_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','coaching-institute'),
            'Right Sidebar' => __('Right Sidebar','coaching-institute'),
            'One Column' => __('One Column','coaching-institute')
        ),
	));

	$wp_customize->add_setting('coaching_institute_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'coaching_institute_sanitize_choices'
	));
	$wp_customize->add_control('coaching_institute_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','coaching-institute'),
        'section' => 'coaching_institute_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','coaching-institute'),
            'Right Sidebar' => __('Right Sidebar','coaching-institute'),
            'One Column' => __('One Column','coaching-institute')
        ),
	));

	$wp_customize->add_setting('coaching_institute_archive_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'coaching_institute_sanitize_choices'
	));
	$wp_customize->add_control('coaching_institute_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','coaching-institute'),
        'section' => 'coaching_institute_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','coaching-institute'),
            'Right Sidebar' => __('Right Sidebar','coaching-institute'),
            'One Column' => __('One Column','coaching-institute'),
            'Grid Layout' => __('Grid Layout','coaching-institute')
        ),
	));

	//Header
	$wp_customize->add_section( 'coaching_institute_header' , array(
    	'title'    => __( 'Header Section', 'coaching-institute' ),
		'priority' => null,
		'panel' => 'coaching_institute_panel_id'
	) );


	$wp_customize->add_setting('coaching_institute_phoneno',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_phoneno',array(
	   	'type' => 'text',
	   	'label' => __('Phone Number','coaching-institute'),
	   	'section' => 'coaching_institute_header',
	));


	//home page slider
	$wp_customize->add_section( 'coaching_institute_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'coaching-institute' ),
		'priority' => null,
		'panel' => 'coaching_institute_panel_id'
	) );

	$wp_customize->add_setting('coaching_institute_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'coaching_institute_sanitize_checkbox'
	));
	$wp_customize->add_control('coaching_institute_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','coaching-institute'),
	   	'section' => 'coaching_institute_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'coaching_institute_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'coaching_institute_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'coaching_institute_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'coaching-institute' ),
			'section' => 'coaching_institute_slider_section',
			'type' => 'dropdown-pages'
		));
	}


	$wp_customize->add_setting('coaching_institute_slider_excerpt_length',array(
		'default' => '15',
		'sanitize_callback'	=> 'coaching_institute_sanitize_float'
	));
	$wp_customize->add_control('coaching_institute_slider_excerpt_length',array(
		'type' => 'number',
		'label' => __('Description Excerpt Length','coaching-institute'),
		'section' => 'coaching_institute_slider_section',
	));

	$wp_customize->add_setting('coaching_institute_sliderbtnlink',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('coaching_institute_sliderbtnlink',array(
	   	'type' => 'url',
	   	'label' => __('ContactUs Button Link','coaching-institute'),
	   	'section' => 'coaching_institute_slider_section',
	));


	//Aboutus Section
	$wp_customize->add_section('coaching_institute_aboutus_section',array(
		'title'	=> __('Aboutus Settings','coaching-institute'),
		'description'=> __('<b>Note :</b> This section will appear below the slider.','coaching-institute'),
		'panel' => 'coaching_institute_panel_id',
	));

	$wp_customize->add_setting('coaching_institute_aboutusheading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_aboutusheading',array(
	   	'type' => 'text',
	   	'label' => __('Heading','coaching-institute'),
	   	'section' => 'coaching_institute_aboutus_section',
	));

	$wp_customize->add_setting('coaching_institute_aboutustitle',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_aboutustitle',array(
	   	'type' => 'text',
	   	'label' => __('Title','coaching-institute'),
	   	'section' => 'coaching_institute_aboutus_section',
	));

	$wp_customize->add_setting('coaching_institute_aboutusdescription',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_aboutusdescription',array(
	   	'type' => 'text',
	   	'label' => __('Description','coaching-institute'),
	   	'section' => 'coaching_institute_aboutus_section',
	));

	$wp_customize->add_setting('coaching_institute_aboutuspoint1',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_aboutuspoint1',array(
	   	'type' => 'text',
	   	'label' => __('Point1','coaching-institute'),
	   	'section' => 'coaching_institute_aboutus_section',
	));
	$wp_customize->add_setting('coaching_institute_aboutuspoint2',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_aboutuspoint2',array(
	   	'type' => 'text',
	   	'label' => __('Point2','coaching-institute'),
	   	'section' => 'coaching_institute_aboutus_section',
	));
	$wp_customize->add_setting('coaching_institute_aboutuspoint3',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('coaching_institute_aboutuspoint3',array(
	   	'type' => 'text',
	   	'label' => __('Point3','coaching-institute'),
	   	'section' => 'coaching_institute_aboutus_section',
	));

	$wp_customize->add_setting('coaching_institute_aboutuspoint4',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_aboutuspoint4',array(
	   	'type' => 'text',
	   	'label' => __('Point4','coaching-institute'),
	   	'section' => 'coaching_institute_aboutus_section',
	));

	$wp_customize->add_setting('coaching_institute_aboutus_box1_icon',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_aboutus_box1_icon',array(
	   	'type' => 'text',
	   	'label' => __('Box 1 Icon (like far fa-clock)','coaching-institute'),
	   	'section' => 'coaching_institute_aboutus_section',
	));

	$wp_customize->add_setting('coaching_institute_aboutus_box1_title',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_aboutus_box1_title',array(
	   	'type' => 'text',
	   	'label' => __('Box 1 Title','coaching-institute'),
	   	'section' => 'coaching_institute_aboutus_section',
	));

	$wp_customize->add_setting('coaching_institute_aboutus_box2_icon',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_aboutus_box2_icon',array(
	   	'type' => 'text',
	   	'label' => __('Box 2 Icon (like far fa-clock)','coaching-institute'),
	   	'section' => 'coaching_institute_aboutus_section',
	));

	$wp_customize->add_setting('coaching_institute_aboutus_box2_title',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_aboutus_box2_title',array(
	   	'type' => 'text',
	   	'label' => __('Box 2 Title','coaching-institute'),
	   	'section' => 'coaching_institute_aboutus_section',
	));

	$wp_customize->add_setting('coaching_institute_aboutus_box3_icon',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_aboutus_box3_icon',array(
	   	'type' => 'text',
	   	'label' => __('Box 3 Icon (like far fa-clock)','coaching-institute'),
	   	'section' => 'coaching_institute_aboutus_section',
	));

	$wp_customize->add_setting('coaching_institute_aboutus_box3_title',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_aboutus_box3_title',array(
	   	'type' => 'text',
	   	'label' => __('Box 3 Title','coaching-institute'),
	   	'section' => 'coaching_institute_aboutus_section',
	));


	$wp_customize->add_setting('coaching_institute_aboutus_btnlink',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_aboutus_btnlink',array(
	   	'type' => 'text',
	   	'label' => __('Button Link','coaching-institute'),
	   	'section' => 'coaching_institute_aboutus_section',
	));


	$wp_customize->add_setting(
    	'coaching_institute_aboutus_rightimage',
	    array(
	        'sanitize_callback' => 'esc_url_raw'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'coaching_institute_aboutus_rightimage',
	        array(
			    'label'   		=> __('Right Image','coaching-institute'),
				'description'   		=> __('Image size 400*600','coaching-institute'),
	            'section' => 'coaching_institute_aboutus_section',
	            'settings' => 'coaching_institute_aboutus_rightimage',
	        )
	    )
	);

	$wp_customize->add_setting('coaching_institute_aboutus_noyearexper',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_aboutus_noyearexper',array(
	   	'type' => 'text',
	   	'label' => __('Number Of Year Experience','coaching-institute'),
	   	'section' => 'coaching_institute_aboutus_section',
	));

	$wp_customize->add_setting('coaching_institute_aboutusyoutubevideourl',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('coaching_institute_aboutusyoutubevideourl',array(
		'label'	=> __('Youtube Video URL','coaching-institute'),
		'section' => 'coaching_institute_aboutus_section',
		'type' => 'text'
	));


	//Footer
    $wp_customize->add_section( 'coaching_institute_footer', array(
    	'title'  => __( 'Footer Settings', 'coaching-institute' ),
		'priority' => null,
		'panel' => 'coaching_institute_panel_id'
	) );

	$wp_customize->add_setting('coaching_institute_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'coaching_institute_sanitize_checkbox'
    ));
    $wp_customize->add_control('coaching_institute_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','coaching-institute'),
       'section' => 'coaching_institute_footer'
    ));

    $wp_customize->add_setting('coaching_institute_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('coaching_institute_footer_copy',array(
		'label'	=> __('Copyright Text','coaching-institute'),
		'section' => 'coaching_institute_footer',
		'setting' => 'coaching_institute_footer_copy',
		'type' => 'text'
	));

	$wp_customize->add_setting('coaching_institute_footer_fblink',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_footer_fblink',array(
	   	'type' => 'text',
	   	'label' => __('Facebook Link','coaching-institute'),
	   	'section' => 'coaching_institute_footer',
	));

	$wp_customize->add_setting('coaching_institute_footer_instalink',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_footer_instalink',array(
	   	'type' => 'text',
	   	'label' => __('Instagram Link','coaching-institute'),
	   	'section' => 'coaching_institute_footer',
	));

	$wp_customize->add_setting('coaching_institute_footer_twitterlink',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_footer_twitterlink',array(
	   	'type' => 'text',
	   	'label' => __('Twitter Link','coaching-institute'),
	   	'section' => 'coaching_institute_footer',
	));

	$wp_customize->add_setting('coaching_institute_footer_pinterestlink',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coaching_institute_footer_pinterestlink',array(
	   	'type' => 'text',
	   	'label' => __('Pinterest Link','coaching-institute'),
	   	'section' => 'coaching_institute_footer',
	));

	

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'coaching_institute_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'coaching_institute_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'coaching_institute_customize_register' );

function coaching_institute_customize_partial_blogname() {
	bloginfo( 'name' );
}

function coaching_institute_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if (class_exists('WP_Customize_Control')) {

   	class Coaching_Institute_Fontawesome_Icon_Chooser extends WP_Customize_Control {

      	public $type = 'icon';

      	public function render_content() { ?>
	     	<label>
	            <span class="customize-control-title">
	               <?php echo esc_html($this->label); ?>
	            </span>

	            <?php if ($this->description) { ?>
	                <span class="description customize-control-description">
	                   <?php echo wp_kses_post($this->description); ?>
	                </span>
	            <?php } ?>

	            <div class="coaching-institute-selected-icon">
	                <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
	                <span><i class="fa fa-angle-down"></i></span>
	            </div>

	            <ul class="coaching-institute-icon-list clearfix">
	                <?php
	                $coaching_institute_font_awesome_icon_array = coaching_institute_font_awesome_icon_array();
	                foreach ($coaching_institute_font_awesome_icon_array as $coaching_institute_font_awesome_icon) {
	                   $icon_class = $this->value() == $coaching_institute_font_awesome_icon ? 'icon-active' : '';
	                   echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($coaching_institute_font_awesome_icon) . '"></i></li>';
	                }
	                ?>
	            </ul>
	            <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
	        </label>
	        <?php
      	}
  	}
}
function coaching_institute_customizer_script() {
   wp_enqueue_style( 'font-awesome-1', esc_url(get_template_directory_uri()).'/assets/css/fontawesome-all.css');
}
add_action( 'customize_controls_enqueue_scripts', 'coaching_institute_customizer_script' );