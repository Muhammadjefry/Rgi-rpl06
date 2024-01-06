<?php 

	$coaching_institute_custom_style = '';

	// Logo Size
	$coaching_institute_logo_top_padding = get_theme_mod('coaching_institute_logo_top_padding');
	$coaching_institute_logo_bottom_padding = get_theme_mod('coaching_institute_logo_bottom_padding');
	$coaching_institute_logo_left_padding = get_theme_mod('coaching_institute_logo_left_padding');
	$coaching_institute_logo_right_padding = get_theme_mod('coaching_institute_logo_right_padding');

	if( $coaching_institute_logo_top_padding != '' || $coaching_institute_logo_bottom_padding != '' || $coaching_institute_logo_left_padding != '' || $coaching_institute_logo_right_padding != ''){
		$coaching_institute_custom_style .=' .logo {';
			$coaching_institute_custom_style .=' padding-top: '.esc_attr($coaching_institute_logo_top_padding).'px; padding-bottom: '.esc_attr($coaching_institute_logo_bottom_padding).'px; padding-left: '.esc_attr($coaching_institute_logo_left_padding).'px; padding-right: '.esc_attr($coaching_institute_logo_right_padding).'px;';
		$coaching_institute_custom_style .=' }';
	}

	// Header Image
	$header_image_url = coaching_institute_banner_image( $image_url = '' );
	if( $header_image_url != ''){
		$coaching_institute_custom_style .=' #inner-pages-header {';
			$coaching_institute_custom_style .=' background-image: url('. esc_url( $header_image_url ).'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;';
		$coaching_institute_custom_style .=' }';
	} else {
		$coaching_institute_custom_style .=' #inner-pages-header {';
			$coaching_institute_custom_style .=' background: radial-gradient(circle at center, rgba(0,0,0,0) 0%, #000000 100%); ';
		$coaching_institute_custom_style .=' }';
	}

	$coaching_institute_slider_hide_show = get_theme_mod('coaching_institute_slider_hide_show',false);
	if( $coaching_institute_slider_hide_show == true){
		$coaching_institute_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$coaching_institute_custom_style .=' display:none;';
		$coaching_institute_custom_style .=' }';
	}

	//site title tagline
	$coaching_institute_site_title_color = get_theme_mod('coaching_institute_site_title_color');
	if ( $coaching_institute_site_title_color != '') {
		$coaching_institute_custom_style .=' h1.site-title a, p.site-title a{';
			$coaching_institute_custom_style .=' color:'.esc_attr($coaching_institute_site_title_color).';';
		$coaching_institute_custom_style .=' }';
	}

	$coaching_institute_site_tagline_color = get_theme_mod('coaching_institute_site_tagline_color');
	if ( $coaching_institute_site_tagline_color != '') {
		$coaching_institute_custom_style .=' p.site-description{';
			$coaching_institute_custom_style .=' color:'.esc_attr($coaching_institute_site_tagline_color).';';
		$coaching_institute_custom_style .=' }';
	}

	