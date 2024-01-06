<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'coaching_institute_above_slider' ); ?>

	<?php if( get_theme_mod('coaching_institute_slider_hide_show') != ''){ ?>
		<section id="slider">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			    <?php $coaching_institute_slider_pages = array();
			    for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'coaching_institute_slider'. $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $coaching_institute_slider_pages[] = $mod;
			        }
			    }
		      	if( !empty($coaching_institute_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $coaching_institute_slider_pages,
			          	'orderby' => 'post__in'
			        );
		        	$query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>     
				    <div class="carousel-inner" role="listbox">
				      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
					        <div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>
					        	<div class="slide-imgbx ">
						        	<!-- <div class="sliderimg "> -->
			            				<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
			            				<div class="s-oly"></div>
			            				<div class="up-brd"></div>
                    					<div class="low-brd"></div>
                    					<div class="s-moveing">
	                    					<div class="s-move"></div>
	                    					<div class="s-move2"></div>
	                    					<div class="s-move3"></div>
	                    					<div class="s-move4"></div>
	                    					<div class="clearfix"></div>
	                    				</div>
										<div class="content">
											<h2><?php the_title(); ?></h2>
											<?php 
												$coaching_institute_slider_excerpt_length = get_theme_mod('coaching_institute_slider_excerpt_length');
											
												if( $coaching_institute_slider_excerpt_length != '15'){?>
												<p class="mb-0"><?php $coaching_institute_excerpt = get_the_excerpt(); echo esc_html( coaching_institute_string_limit_words( $coaching_institute_excerpt, esc_attr(get_theme_mod('coaching_institute_slider_excerpt_length','15') ) )); ?></p>
											<?php } ?>
											<a href="<?php echo esc_url(get_theme_mod('coaching_institute_sliderbtnlink')) ?>" class="read-btn sbtn1">
												<span><?php echo esc_html_e('contact us','coaching-institute'); ?></span>
												<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32" xml:space="preserve">
													<style></style>
													<path d="M7 28a.999.999 0 0 1-1-1V5a1 1 0 0 1 1.521-.854l18 11a1.001 1.001 0 0 1 0 1.708l-18 11A1 1 0 0 1 7 28zM8 6.783v18.434L23.082 16 8 6.783z"></path>
												</svg>
											</a>
										</div>
						        </div>
					        </div>
				      	<?php $i++; endwhile; 
				      	wp_reset_postdata();?>
				    </div>
			    <?php else : ?>
			    	<div class="no-postfound"></div>
	      		<?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			      	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Prev','coaching-institute' );?></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			      	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-arrow-right"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Next','coaching-institute' );?></span>
			    </a>
			</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>
	
	<?php do_action('coaching_institute_below_slider'); ?>

	<section id="aboutus-section" class="py-5">
		<div class="container"> 
			<div class="row mr-0"> 
				<div class="col-lg-7 col-md-12 col-sm-12 r-abt">
					<h1><?php echo esc_html(get_theme_mod('coaching_institute_aboutusheading')); ?></h1>
					<h2><?php echo esc_html(get_theme_mod('coaching_institute_aboutustitle')); ?></h2>
					<p><?php echo esc_html(get_theme_mod('coaching_institute_aboutusdescription')); ?></p>
					<div class="row mr-0"> 
						<div class="col-lg-12 col-md-6 col-sm-12 pd-0">
							
							<li><?php echo esc_html(get_theme_mod('coaching_institute_aboutuspoint1')); ?></li>
							<li><?php echo esc_html(get_theme_mod('coaching_institute_aboutuspoint2')); ?></li>
							
						</div>	
						<div class="col-lg-12 col-md-6 col-sm-12 pd-0">
							
							<li><?php echo esc_html(get_theme_mod('coaching_institute_aboutuspoint3')); ?></li>
							<li><?php echo esc_html(get_theme_mod('coaching_institute_aboutuspoint4')); ?></li>
							
						</div>			
					</div>	
					<div class="row mr-0"> 
						<div class="col-lg-4 col-md-4 col-sm-12 pd-0">
							<div class="row tmbx"> 
								<div class="col-lg-3 col-md-3 col-sm-2 pd-0">
									<div class="icn">
										<i class="<?php echo esc_html(get_theme_mod('coaching_institute_aboutus_box1_icon')); ?>"></i>
									</div>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-10 pd-0">
									<h4><?php echo esc_html(get_theme_mod('coaching_institute_aboutus_box1_title')); ?></h4>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 pd-0">
							<div class="row tmbx ">
								<div class="col-lg-3 col-md-3 col-sm-2 pd-0">
									<div class="icn">
										<i class="<?php echo esc_html(get_theme_mod('coaching_institute_aboutus_box2_icon')); ?>"></i>
									</div>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-10 pd-0">
									<h4><?php echo esc_html(get_theme_mod('coaching_institute_aboutus_box2_title')); ?></h4>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 pd-0">
							<div class="row tmbx ">
								<div class="col-lg-3 col-md-3 col-sm-2 pd-0">
									<div class="icn">
										<i class="<?php echo esc_html(get_theme_mod('coaching_institute_aboutus_box3_icon')); ?>"></i>
									</div>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-10 pd-0">
									<h4><?php echo esc_html(get_theme_mod('coaching_institute_aboutus_box3_title')); ?></h4>
								</div>
							</div>
						</div>
					</div>
					<a href="<?php echo esc_html(get_theme_mod('coaching_institute_aboutus_btnlink')); ?>" class="read-btn"><?php echo esc_html('About Us','coaching-institute'); ?>
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32" xml:space="preserve">
						<style></style>
						<path d="M7 28a.999.999 0 0 1-1-1V5a1 1 0 0 1 1.521-.854l18 11a1.001 1.001 0 0 1 0 1.708l-18 11A1 1 0 0 1 7 28zM8 6.783v18.434L23.082 16 8 6.783z"></path>
					</svg>
					</a>
				</div>
				<div class="col-lg-5 col-md-12 col-sm-12">
					<div class="row mr-0">
						<div class="col-md-10 pd-0">
							<div class="aboutus-image">
								<div class="abtimg-brd"></div>
								<?php 
									$coaching_institute_aboutus_rightimage = get_theme_mod('coaching_institute_aboutus_rightimage');

									if(!empty($coaching_institute_aboutus_rightimage)){
										echo '<img alt="'. esc_html(get_the_title()) .'" src="'.esc_url($coaching_institute_aboutus_rightimage).'" class="img-responsive secondry-bg-img" />';
									}else{
										echo '<img alt="coaching_institute_aboutus_rightimage" src="'.get_template_directory_uri().'/assets/images/about.jpg" class="img-responsive" />';
									}
								?>
							</div>
						</div>
						<div class="col-md-2 pd-0">
							<div class="experiencebx">
								<div class="experience">
									<h2 class="year"><?php echo esc_html(get_theme_mod('coaching_institute_aboutus_noyearexper')); ?></h2>
									<h3>EXPERIENCE</h3>
								</div>
							</div>
						</div>
					</div>

					<div id="yt-player">
						<?php
							$youtube_video_url = get_theme_mod('coaching_institute_aboutusyoutubevideourl');

							if (!empty($youtube_video_url)) {
								// Extract video ID from the URL
								$video_id = esc_attr(get_youtube_video_id($youtube_video_url));

								// Display embedded YouTube video
								echo '<div class="youtube-video">';
								echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0" allowfullscreen></iframe>';
								echo '</div>';
							}
						?>
					</div>
					<div class="clearfix"></div>
				</div>
				
			</div>
		</div>
	</section>

	<?php do_action('coaching_institute_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>