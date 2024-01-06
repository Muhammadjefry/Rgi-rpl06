<?php
/**
 * The template for displaying the footer
 * @subpackage Coaching Institute
 * @since 1.0
 * @version 0.1
 */

?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-overlay"></div>
		<div class="container">
			<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
		</div>
		<div class="copyright"> 
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="fs-icn">
							<li><a href="<?php echo esc_html(get_theme_mod('coaching_institute_footer_fblink')); ?>" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="<?php echo esc_html(get_theme_mod('coaching_institute_footer_instalink')); ?>" title="Instagram"  target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="<?php echo esc_html(get_theme_mod('coaching_institute_footer_twitterlink')); ?>" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="<?php echo esc_html(get_theme_mod('coaching_institute_footer_pinterestlink')); ?>" title="pinterest" target="_blank"><i class="fab fa-pinterest"></i></a></li>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="col-md-6"><?php get_template_part( 'template-parts/footer/site', 'info' ); ?></div>
				</div>
			</div>
		</div>
	</footer>
	<?php if (get_theme_mod('coaching_institute_show_back_totop',true) != ''){ ?>
		<button role="tab" class="back-to-top"><span class="back-to-top-text"><?php echo esc_html_e('Top', 'coaching-institute'); ?></span></button>
	<?php }?>

<?php wp_footer(); ?>
</body>
</html>