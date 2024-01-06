<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

/**
 * JS notice.
 */
$jsupdate = ( isset( $_REQUEST['jsupdate'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['jsupdate'] ) ) : '' );
if ( 'delete' === $jsupdate ) {
	echo '<div class="updated"><p><strong>' . esc_html__( 'Images Note Deleted.', 'demon-image-annotation' ) . '</strong></p></div>';
} elseif ( 'update' === $jsupdate ) {
	echo '<div class="updated"><p><strong>' . esc_html__( 'Images Note Updated.', 'demon-image-annotation' ) . '</strong></p></div>';
}

/**
 * Tab settings.
 */
$pluginpage = ( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : 'dia_image_notes' );
if ( ! current_user_can( 'manage_options' ) ) {
	$pluginpage = 'dia_image_notes';
}
?>

<?php
/**
 * Header function.
 */
?>
<div class="wrap">
	<?php echo '<h2>' . esc_html__( 'demon-Image-Annotation Settings', 'demon-image-annotation' ) . '</h2>'; ?>
	<?php esc_html_e( 'Visit my site for more update.', 'demon-image-annotation' ); ?> <a href="http://www.superwhite.cc" target="_blank">http://www.superwhite.cc</a><br>
	<?php esc_html_e( 'If you enjoy using demon Image Annotation and find it useful, please consider making a donation.', 'demon-image-annotation' ); ?>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
	">
	<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>


	<h2>

	<?php if ( current_user_can( 'manage_options' ) ) { ?>
		<nav class="nav-tab-wrapper">
			<a href="<?php echo esc_url( DIA_PLUGIN_URL ) . 'dia_image_notes'; ?>" class="nav-tab<?php 'dia_image_notes' === $pluginpage ? print esc_textarea( ' nav-tab-active' ) : ''; ?>"><?php esc_html_e( 'Image Notes', 'demon-image-annotation' ); ?></a>
			<a href="<?php echo esc_url( DIA_PLUGIN_URL ) . 'dia_settings'; ?>" class="nav-tab<?php 'dia_settings' === $pluginpage ? print esc_textarea( ' nav-tab-active' ) : ''; ?>"><?php esc_html_e( 'Settings', 'demon-image-annotation' ); ?></a>
			<a href="<?php echo esc_url( DIA_PLUGIN_URL ) . 'dia_usage'; ?>" class="nav-tab<?php 'dia_usage' === $pluginpage ? print esc_textarea( ' nav-tab-active' ) : ''; ?>"><?php esc_html_e( 'Usage.', 'demon-image-annotation' ); ?></a>
		</nav>
	<?php } ?>
	</h2>
</div>


<?php if ( 'dia_settings' === $pluginpage ) {

	// *************** Settings ***************
	include_once 'settings.php';

} elseif ( 'dia_usage' === $pluginpage ) {

	// *************** Usage ***************
	include_once 'usage.php';

} else {

	// *************** Image Notes ***************
	include_once 'imagenotes.php';

}
?>
