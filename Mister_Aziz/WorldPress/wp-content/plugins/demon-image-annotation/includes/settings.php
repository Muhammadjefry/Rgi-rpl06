<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Admin settings.
if ( isset( $_POST['update_dia_options'] ) ) {
	$wpnonce = ( isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '' );
	if (
		! wp_verify_nonce(
			$wpnonce,
			'diaupdateoptions'
		)
	) {
		die( esc_html__( 'Update security violated', 'demon-image-annotation' ) );
	}
	if ( sanitize_text_field( wp_unslash( $_POST['update_dia_options'] ) ) === 'yes' ) {
		$dia_csscontainer    = ( isset( $_POST['dia_csscontainer'] ) ? sanitize_text_field( wp_unslash( $_POST['dia_csscontainer'] ) ) : '' );
		$dia_display         = ( isset( $_POST['dia_display'] ) ? sanitize_text_field( wp_unslash( $_POST['dia_display'] ) ) : '' );
		$dia_admin           = ( isset( $_POST['dia_admin'] ) ? sanitize_text_field( wp_unslash( $_POST['dia_admin'] ) ) : '' );
		$dia_autoresize      = ( isset( $_POST['dia_autoresize'] ) ? sanitize_text_field( wp_unslash( $_POST['dia_autoresize'] ) ) : '' );
		$dia_thumbnail       = ( isset( $_POST['dia_thumbnail'] ) ? sanitize_text_field( wp_unslash( $_POST['dia_thumbnail'] ) ) : '' );
		$dia_gravatar        = ( isset( $_POST['dia_gravatar'] ) ? sanitize_text_field( wp_unslash( $_POST['dia_gravatar'] ) ) : '' );
		$dia_gravatardefault = ( isset( $_POST['dia_gravatardefault'] ) ? sanitize_text_field( wp_unslash( $_POST['dia_gravatardefault'] ) ) : '' );
		$dia_autoapprove     = ( isset( $_POST['dia_autoapprove'] ) ? sanitize_text_field( wp_unslash( $_POST['dia_autoapprove'] ) ) : '' );
		$dia_comments        = ( isset( $_POST['dia_comments'] ) ? sanitize_text_field( wp_unslash( $_POST['dia_comments'] ) ) : '' );

		$dia_autoimageid    = ( isset( $_POST['dia_autoimageid'] ) ? sanitize_text_field( wp_unslash( $_POST['dia_autoimageid'] ) ) : '' );
		$dia_numbering      = ( isset( $_POST['dia_numbering'] ) ? sanitize_text_field( wp_unslash( $_POST['dia_numbering'] ) ) : '' );
		$dia_mouseoverdesc  = ( isset( $_POST['dia_mouseoverdesc'] ) ? sanitize_text_field( wp_unslash( $_POST['dia_mouseoverdesc'] ) ) : '' );
		$dia_linkoption     = ( isset( $_POST['dia_linkoption'] ) ? sanitize_text_field( wp_unslash( $_POST['dia_linkoption'] ) ) : '' );
		$dia_linkdesc       = ( isset( $_POST['dia_linkdesc'] ) ? sanitize_text_field( wp_unslash( $_POST['dia_linkdesc'] ) ) : '' );
		$dia_clickable_text = ( isset( $_POST['dia_clickable_text'] ) ? sanitize_text_field( wp_unslash( $_POST['dia_clickable_text'] ) ) : '' );
		$dia_maxlength      = ( isset( $_POST['dia_maxlength'] ) ? dia_is_valid_maxlength(  $_POST['dia_maxlength'] ) : '' );

		// post content wrapper.
		update_option( 'demon_image_annotation_postcontainer', $dia_csscontainer );

		// plugin status.
		update_option( 'demon_image_annotation_display', $dia_display );

		// admin only.
		update_option( 'demon_image_annotation_admin', $dia_admin );

		// auto resize image.
		update_option( 'demon_image_annotation_autoresize', $dia_autoresize );

		// comments thumbnail.
		update_option( 'demon_image_annotation_thumbnail', $dia_thumbnail );

		// image note gravatar.
		update_option( 'demon_image_annotation_gravatar', $dia_gravatar );

		// image note gravatar.
		update_option( 'demon_image_annotation_gravatar_deafult', $dia_gravatardefault );

		// auto approve comment.
		update_option( 'demon_image_annotation_autoapprove', $dia_autoapprove );

		// WordPress comment.
		update_option( 'demon_image_annotation_comments', $dia_comments );

		// auto insert image id attribute.
		update_option( 'demon_image_annotation_autoimageid', $dia_autoimageid );

		// numbering.
		update_option( 'demon_image_annotation_numbering', $dia_numbering );

		// mouse over desc.
		update_option( 'demon_image_annotation_mouseoverdesc', $dia_mouseoverdesc );

		// link.
		update_option( 'demon_image_annotation_linkoption', $dia_linkoption );

		// link desc.
		update_option( 'demon_image_annotation_linkdesc', $dia_linkdesc );

		// mouseover text.
		update_option( 'demon_image_annotation_clickable_text', $dia_clickable_text );

		// note maxlength.
		update_option( 'demon_image_annotation_maxlength', $dia_maxlength );
		?>
		<div class="updated"><p><strong><?php esc_html_e( 'Options saved.' ); ?></strong></p></div>
		<?php
	}
} else {
	// Normal page display.
	$dia_csscontainer    = get_option( 'demon_image_annotation_postcontainer' );
	$dia_display         = get_option( 'demon_image_annotation_display' );
	$dia_admin           = get_option( 'demon_image_annotation_admin' );
	$dia_autoresize      = get_option( 'demon_image_annotation_autoresize' );
	$dia_thumbnail       = get_option( 'demon_image_annotation_thumbnail' );
	$dia_gravatar        = get_option( 'demon_image_annotation_gravatar' );
	$dia_gravatardefault = get_option( 'demon_image_annotation_gravatar_deafult' );
	$dia_everypage       = get_option( 'demon_image_annotation_everypage' );
	$dia_autoapprove     = get_option( 'demon_image_annotation_autoapprove' );
	$dia_comments        = get_option( 'demon_image_annotation_comments' );

	$dia_autoimageid    = get_option( 'demon_image_annotation_autoimageid' );
	$dia_numbering      = get_option( 'demon_image_annotation_numbering' );
	$dia_mouseoverdesc  = get_option( 'demon_image_annotation_mouseoverdesc' );
	$dia_linkoption     = get_option( 'demon_image_annotation_linkoption' );
	$dia_linkdesc       = get_option( 'demon_image_annotation_linkdesc' );
	$dia_clickable_text = get_option( 'demon_image_annotation_clickable_text' );
	$dia_maxlength      = get_option( 'demon_image_annotation_maxlength' );
}
?>

<div class="wrap">
	<div class="dia-container">
		<?php dia_metabox_open( esc_html__( 'Image Annotation Settings:', 'demon-image-annotation' ), 'id-image-annotation-settings', true ); ?>
		<?php $request_url = ( isset( $_SERVER['REQUEST_URI'] ) ? sanitize_url( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '' ); ?>
		<form name="dia_form" method="post" action="<?php echo esc_url( str_replace( '%7E', '~', $request_url ) ); ?>">
		<input type="hidden" name="update_dia_options" value="yes">
		<?php wp_nonce_field( 'diaupdateoptions' ); ?>

		<table class="form-table" width="100%">
			<tr>
				<th>
					<label><?php esc_html_e( 'Plugin Status : ', 'demon-image-annotation' ); ?></label>
				</th>
			<td>
				<?php
					$sndisplaymode = array(
						0 => __( 'Enable' ),
						1 => __( 'Disable' ),
					);
					foreach ( $sndisplaymode as $key => $value ) {
						$selected = (int) $dia_display === $key ? 'checked="checked"' : '';
						echo '<label><input type="radio" name="dia_display" value="' . esc_attr( $key ) . '"' . esc_attr( $selected ) . '/> ' . esc_textarea( $value ) . '</label>  ';
					}
					?>
					<br>
					<p><?php esc_html_e( 'Enable or disable the plugins although you want it to be Activate.', 'demon-image-annotation' ); ?></p>
			</td>
			</tr>			
			<tr>
				<th>
					<label><?php esc_html_e( 'Post Content Wrapper : ', 'demon-image-annotation' ); ?></label>
				</th>
				<td>
					<input type="text" name="dia_csscontainer" value="<?php echo ( esc_textarea( $dia_csscontainer ) === '' ) ? '' : esc_textarea( $dia_csscontainer ); ?>" size="20"><em><?php esc_html_e( ' eg: #entrybody, .entrybody', 'demon-image-annotation' ); ?></em><br>
					<p><?php printf( /* translators: %s: The line break tag. */ esc_html__( 'The image annotation plugins initiate by targeting post content wrapper,%1$sput in the div wrapper id or class where your post content appear,%2$sleave it empty if you don\'t know what to do.', 'scoreboard-for-html5-game' ), '<br>', '<br>' ); ?></p><br>
					<strong><?php esc_html_e( 'Example (.entrybody)', 'demon-image-annotation' ); ?></strong><br>
					<code>
					&lt;div class="entrybody&gt;<br>
					&nbsp;&nbsp;&nbsp; &lt;?php the_content(); ?&gt;<br>
					&lt;/div&gt;</code><br><br>
					<em><?php esc_html_e( 'Leave it empty will treat all images as image annotation.', 'demon-image-annotation' ); ?></em>
				</td>
			</tr>
			<tr>
				<th>
					<label><?php esc_html_e( 'Auto Generate Image ID : ', 'demon-image-annotation' ); ?></label>
				</th>
			<td>
				<?php
					$sndisplaymode = array(
						0 => __( 'Enable' ),
						1 => __( 'Disable' ),
					);
					foreach ( $sndisplaymode as $key => $value ) {
						$selected = (int) $dia_autoimageid === $key ? 'checked="checked"' : '';
						echo '<label><input type="radio" name="dia_autoimageid" value="' . esc_attr( $key ) . '"' . esc_attr( $selected ) . '/> ' . esc_textarea( $value ) . '</label>  ';
					}
					?>
					<br>
					<p><?php printf( /* translators: %s: The line break tag and id. */ esc_html__( 'Enable jQuery to auto add an id attribute to HTML img tag,%1$sthe uniqe id will be generate by img src starting with %2$s,%3$sit will skip if the id attribute of img tag is already exist.', 'scoreboard-for-html5-game' ), '<br>', '"img-postid-"', '<br>' ); ?></p><br>					
					<strong><?php esc_html_e( 'Example (img-postid-4774005463)', 'demon-image-annotation' ); ?></strong><br>
					<code><?php esc_html_e( '<img id="img-12-4774005463" src="http://farm5.static.flickr.com/4121/4774005463_3837b6de44_o.jpg" />', 'demon-image-annotation' ); ?></code><br><br>			
					<em><?php esc_html_e( 'Disable this option if you want to manually add img tag id attribute to all images.', 'demon-image-annotation' ); ?></em><br>
			</td>
			</tr>
			<tr>
				<th>
					<label><?php esc_html_e( 'Admin Only : ', 'demon-image-annotation' ); ?></label>
				</th>
			<td>
				<?php
					$sndisplaymode = array(
						0 => __( 'Enable' ),
						1 => __( 'Disable' ),
					);
					foreach ( $sndisplaymode as $key => $value ) {
						$selected = (int) $dia_admin === $key ? 'checked="checked"' : '';
						echo '<label><input type="radio" name="dia_admin" value="' . esc_attr( $key ) . '"' . esc_attr( $selected ) . '/> ' . esc_textarea( $value ) . '</label>  ';
					}
					?>
					<br>
					<p><?php esc_html_e( 'Enable to allow Add Note for login user only who can moderate comment, public still able to see image annotation.', 'demon-image-annotation' ); ?></p>
			</td>
			</tr>	
			<tr>
				<th>
					<label><?php esc_html_e( 'Auto Resize Images : ', 'demon-image-annotation' ); ?></label>
				</th>
			<td>
				<?php
					$sndisplaymode = array(
						0 => __( 'Enable' ),
						1 => __( 'Disable' ),
					);
					foreach ( $sndisplaymode as $key => $value ) {
						$selected = (int) $dia_autoresize === $key ? 'checked="checked"' : '';
						echo '<label><input type="radio" name="dia_autoresize" value="' . esc_attr( $key ) . '"' . esc_attr( $selected ) . '/> ' . esc_textarea( $value ) . '</label>  ';
					}
					?>
					<br>
					<p><?php esc_html_e( 'Enable to auto resizing images to fit content max width.', 'demon-image-annotation' ); ?></p>
			</td>
			</tr>
			<tr>
				<th>
					<label><?php esc_html_e( 'Numbering : ', 'demon-image-annotation' ); ?></label>
				</th>
			<td>
					<?php
					$sndisplaymode = array(
						0 => __( 'Enable' ),
						1 => __( 'Disable' ),
					);
					foreach ( $sndisplaymode as $key => $value ) {
						$selected = (int) $dia_numbering === $key ? 'checked="checked"' : '';
						echo '<label><input type="radio" name="dia_numbering" value="' . esc_attr( $key ) . '"' . esc_attr( $selected ) . '/> ' . esc_textarea( $value ) . '</label>  ';
					}
					?>
					<br>
					<p><?php esc_html_e( 'Enable to show numbering every image annotation.', 'demon-image-annotation' ); ?></p><br/>
					<strong><?php esc_html_e( 'Example', 'demon-image-annotation' ); ?></strong><br>
					<code><?php printf( /* translators: %s: The strong tag. */ esc_html__( '%1$s03%2$s | Mouseover to load notes | Image Note by Flickr', 'demon-image-annotation' ), '<strong>', '</strong>' ); ?></code>
			</td>
			</tr>
			<tr>
				<th>
					<label><?php esc_html_e( 'Mouseover Description : ', 'demon-image-annotation' ); ?></label>
				</th>
			<td>
					<input type="text" name="dia_mouseoverdesc" size="30" value="<?php echo ( esc_textarea( $dia_mouseoverdesc ) === '' ) ? '' : esc_textarea( $dia_mouseoverdesc ); ?>" size="20"><em><?php esc_html_e( ' eg. Mouseover to load notes', 'demon-image-annotation' ); ?></em>
					<br>
					<p><?php esc_html_e( 'Show description on top of every image annotation, leave it empty to hide.', 'demon-image-annotation' ); ?></p><br>
					<strong><?php esc_html_e( 'Example', 'demon-image-annotation' ); ?></strong><br>
					<code><?php printf( /* translators: %s: The strong tag. */ esc_html__( '03 | %1$sMouseover to load notes%2$s | Image Note by Flickr', 'demon-image-annotation' ), '<strong>', '</strong>' ); ?></code>
			</td>
			</tr>
			<tr>
				<th>
					<label><?php esc_html_e( 'Image Hyperlink : ', 'demon-image-annotation' ); ?></label>
				</th>
			<td>
					<?php
					$sndisplaymode = array(
						0 => __( 'Enable' ),
						1 => __( 'Disable' ),
					);
					foreach ( $sndisplaymode as $key => $value ) {
						$selected = (int) $dia_linkoption === $key ? 'checked="checked"' : '';
						echo '<label><input type="radio" name="dia_linkoption" value="' . esc_attr( $key ) . '"' . esc_attr( $selected ) . '/> ' . esc_textarea( $value ) . '</label>  ';
					}
					?>
					<br>
					<p><?php esc_html_e( 'Enable to show image hyberlink if image is embed as a link, it will show behind load note instruction.', 'demon-image-annotation' ); ?></p><br>					
					<input type="text" name="dia_linkdesc" size="30" value="<?php echo ( esc_textarea( $dia_linkdesc ) === '' ) ? '' : esc_textarea( $dia_linkdesc ); ?>" size="20"><em><?php esc_html_e( 'eg: Source, Link, Flickr', 'demon-image-annotation' ); ?></em>
					<br>
					<p><?php esc_html_e( 'Image hyperlink text behind load note instruction, input %TITLE% to show image link title attribute.', 'demon-image-annotation' ); ?></p><br/>
					<strong><?php esc_html_e( 'Example', 'demon-image-annotation' ); ?></strong><br>
					<code><?php printf( /* translators: %s: The strong tag. */ esc_html__( '03 | Mouseover to load notes | %1$sImage Note by Flickr%2$s', 'demon-image-annotation' ), '<strong>', '</strong>' ); ?></code>
			</td>
			</tr>
			<tr>
				<th>
					<label><?php esc_html_e( 'Remove Mouseover Text : ', 'demon-image-annotation' ); ?></label>
				</th>
			<td>
				<?php
					$sndisplaymode = array(
						0 => __( 'Enable' ),
						1 => __( 'Disable' ),
					);
					foreach ( $sndisplaymode as $key => $value ) {
						$selected = (int) $dia_clickable_text === $key ? 'checked="checked"' : '';
						echo '<label><input type="radio" name="dia_clickable_text" value="' . esc_attr( $key ) . '"' . esc_attr( $selected ) . '/> ' . esc_textarea( $value ) . '</label>  ';
					}
					?>
					<br>
					<p><?php esc_html_e( 'Enable to remove mouseover text, it will remove a tag title attribute if your image is clickable.', 'demon-image-annotation' ); ?></p>
			</td>
			</tr>
		</table>
		<?php dia_metabox_close(); ?>

		<?php dia_metabox_open( esc_html__( 'Comment Settings:', 'demon-image-annotation' ), 'id-comment-settings', true ); ?>
		<table class="form-table" width="100%">
			<tr>
				<th>
					<label><?php esc_html_e( 'WordPress Comments : ', 'demon-image-annotation' ); ?></label>
				</th>
			<td>
				<?php
					$sndisplaymode = array(
						0 => __( 'Enable' ),
						1 => __( 'Disable' ),
					);
					foreach ( $sndisplaymode as $key => $value ) {
						$selected = (int) $dia_comments === $key ? 'checked="checked"' : '';
						echo '<label><input type="radio" name="dia_comments" value="' . esc_attr( $key ) . '"' . esc_attr( $selected ) . '/> ' . esc_textarea( $value ) . '</label>  ';
					}
					?>
					<br>
					<p><?php printf( /* translators: %s: The line break tag. */ esc_html__( 'Enable to sync all the image note with WordPress commenting system,%snew image note from annoymous will add into WordPress comment as waiting approval.', 'scoreboard-for-html5-game' ), '<br>' ); ?><p/>
			</td>
			</tr>
			<tr>
				<th>
					<label><?php esc_html_e( 'Approve Comments : ', 'demon-image-annotation' ); ?></label>
				</th>
			<td>
				<?php
					$sndisplaymode = array(
						0 => __( 'Enable' ),
						1 => __( 'Disable' ),
					);
					foreach ( $sndisplaymode as $key => $value ) {
						$selected = (int) $dia_autoapprove === $key ? 'checked="checked"' : '';
						echo '<label><input type="radio" name="dia_autoapprove" value="' . esc_attr( $key ) . '"' . esc_attr( $selected ) . '/> ' . esc_textarea( $value ) . '</label>  ';
					}
					?>
					<br>
					<p><?php esc_html_e( 'Enable to automatically approve new comments without moderation or approval.', 'demon-image-annotation' ); ?></p>
			</td>
			</tr>
			<tr>
				<th>
					<label><?php esc_html_e( 'Comments Thumbnail : ', 'demon-image-annotation' ); ?></label>
				</th>
			<td>
				<?php
					$sndisplaymode = array(
						0 => __( 'Enable' ),
						1 => __( 'Disable' ),
					);
					foreach ( $sndisplaymode as $key => $value ) {
						$selected = (int) $dia_thumbnail === $key ? 'checked="checked"' : '';
						echo '<label><input type="radio" name="dia_thumbnail" value="' . esc_attr( $key ) . '"' . esc_attr( $selected ) . '/> ' . esc_textarea( $value ) . '</label>  ';
					}
					?>
					<br>
					<p><?php esc_html_e( 'Enable to show image thumbnail in comment list.', 'demon-image-annotation' ); ?></p>
			</td>
			</tr>
			<tr>
				<th>
					<label><?php esc_html_e( 'Comments Maxlength : ', 'demon-image-annotation' ); ?></label>
				</th>
			<td>
				<input type="number" name="dia_maxlength" max="300" value="<?php echo ( intval( $dia_maxlength ) === '' ) ? '140' : intval( $dia_maxlength ); ?>" size="20"><em><?php esc_html_e( ' eg: 140', 'demon-image-annotation' ); ?></em>
					<br>
					<p><?php esc_html_e( 'Maximum characters for image note input.', 'demon-image-annotation' ); ?></p>
			</td>
			</tr>
			<tr>
				<th>
					<label><?php esc_html_e( 'Image Note Gravatar : ', 'demon-image-annotation' ); ?></label>
				</th>
			<td>
				<?php
					$sndisplaymode = array(
						0 => __( 'Enable' ),
						1 => __( 'Disable' ),
					);
					foreach ( $sndisplaymode as $key => $value ) {
						$selected = (int) $dia_gravatar === $key ? 'checked="checked"' : '';
						echo '<label><input type="radio" name="dia_gravatar" value="' . esc_attr( $key ) . '"' . esc_attr( $selected ) . '/> ' . esc_textarea( $value ) . '</label>  ';
					}
					?>
					<br>
					<p><?php esc_html_e( 'Enable to show gravatar in image note.', 'demon-image-annotation' ); ?></p><br>
					<em><?php esc_html_e( 'Default gravatar : ', 'demon-image-annotation' ); ?></em><br/><?php echo sanitize_url( get_bloginfo( 'template_url' ) ); ?><input type="text" name="dia_gravatardefault" value="<?php echo esc_textarea( $dia_gravatardefault ); ?>" size="20"><?php esc_html_e( ' eg: /images/default.png', 'demon-image-annotation' ); ?><br>
			</td>
			</tr>
		</table>
		<?php dia_metabox_close(); ?>

			<p class="submit">
				<input type="submit" name="Submit" class="button-primary" value="<?php esc_html_e( 'Update Options', 'demon-image-annotation' ); ?>" />
			</p>
		</form>
	</div>
</div>
