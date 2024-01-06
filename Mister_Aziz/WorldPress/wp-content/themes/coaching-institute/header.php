<?php
/**
 * The header for our theme
 *
 * @subpackage Coaching Institute
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'coaching-institute' ); ?></a>

<div id="header">
	<div class="container">
		<div class="main-header">
			<div class="row mx-0">
				<div class="col-lg-3 col-md-12 col-sm-11">
					<div class="logo text-lg-left text-center">
						<?php if ( has_custom_logo() ) : ?>
		            		<?php the_custom_logo(); ?>
			            <?php endif; ?>
		             	<?php if (get_theme_mod('coaching_institute_show_site_title',true)) {?>
		          			<?php $blog_info = get_bloginfo( 'name' ); ?>
			                <?php if ( ! empty( $blog_info ) ) : ?>
			                  	<?php if ( is_front_page() && is_home() ) : ?>
			                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			                  	<?php else : ?>
		                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		                  		<?php endif; ?>
			                <?php endif; ?>
			            <?php }?>
			            <?php if (get_theme_mod('coaching_institute_show_tagline',true)) {?>
			                <?php $description = get_bloginfo( 'description', 'display' );
		                  	if ( $description || is_customize_preview() ) : ?>
			                  	<p class="site-description"><?php echo esc_html($description); ?></p>
		              		<?php endif; ?>
		          		<?php }?>
					</div>
				</div>
				<div class="col-lg-9 col-md-12 col-sm-12 R-hd">
					<div class="row mr-0">
						<div class="col-lg-9 col-md-6 col-sm-12 ">
							<div class="menu-bar">
								<div class="toggle-menu responsive-menu text-md-left text-center">
									<?php if(has_nav_menu('primary')){ ?>
										<button onclick="coaching_institute_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','coaching-institute'); ?></span></button>
									<?php }?>
								</div>
								<div id="sidelong-menu" class="nav sidenav">
									<nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'coaching-institute' ); ?>">
										<?php if(has_nav_menu('primary')){
											wp_nav_menu( array( 
												'theme_location' => 'primary',
												'container_class' => 'main-menu-navigation clearfix' ,
												'menu_class' => 'clearfix',
												'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
												'fallback_cb' => 'wp_page_menu',
											) ); 
										} ?>
										<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="coaching_institute_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','coaching-institute'); ?></span></a>
									</nav>
									
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 contact pd-0">
							<div class="row mr-0">
								<div class="col-lg-3 col-md-3 col-sm-3 pd-0">
									<div class="phn-icon">
										<i class="fa fa-phone" aria-hidden="true"></i>
									</div>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-9">
									<div class="phn-text">
										<?php esc_html_e('Call Now','coaching-institute'); ?>
										<div class="clearfix"></div>
										<a href="<?php echo esc_html(get_theme_mod('coaching_institute_phoneno')); ?>" ><?php echo esc_html(get_theme_mod('coaching_institute_phoneno')); ?></a>

									</div>
								</div>
							</div>
							
						</div>				
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if(is_singular()) {?>
	<div id="inner-pages-header">
		<div class="header-overlay"></div>
	    <div class="header-content">
		    <div class="container"> 
		      	<h1><?php single_post_title(); ?></h1>
		      	<div class="innheader-border"></div>
		      	<div class="theme-breadcrumb mt-2">
					<?php coaching_institute_breadcrumb();?>
				</div>
		    </div>
		</div>
	</div>
<?php } ?>