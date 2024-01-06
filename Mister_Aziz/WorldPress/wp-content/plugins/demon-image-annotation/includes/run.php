<?php
require_once 'run-config.php';
require_once 'data.php';

$run_action = ( isset( $_REQUEST['action'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['action'] ) ) : '' );

if ( 'get' === $run_action ) {
	dia_get_results();
} elseif ( 'save' === $run_action ) {
	dia_get_save();
} elseif ( 'delete' === $run_action ) {
	dia_get_delete();
}

/**
 * Save.
 */
function dia_get_save() {
	$img_id  = ( isset( $_REQUEST['imgid'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['imgid'] ) ) : '' );
	$post_id = ( isset( $_REQUEST['postid'] ) ? intval( $_REQUEST['postid'] ) : 0 );

	// Get data from jQuery.
	$note_top    = ( isset( $_GET['top'] ) ? sanitize_text_field( wp_unslash( $_GET['top'] ) ) : '' );
	$note_left   = ( isset( $_GET['left'] ) ? sanitize_text_field( wp_unslash( $_GET['left'] ) ) : '' );
	$note_width  = ( isset( $_GET['width'] ) ? sanitize_text_field( wp_unslash( $_GET['width'] ) ) : '' );
	$note_height = ( isset( $_GET['height'] ) ? sanitize_text_field( wp_unslash( $_GET['height'] ) ) : '' );
	$note_text   = ( isset( $_GET['text'] ) ? sanitize_text_field( wp_unslash( $_GET['text'] ) ) : '' );
	$note_id     = ( isset( $_GET['id'] ) ? sanitize_text_field( wp_unslash( $_GET['id'] ) ) : '' );
	$note_ind_id = ( isset( $_GET['noteID'] ) ? sanitize_text_field( wp_unslash( $_GET['noteID'] ) ) : '' );
	$note_author = ( isset( $_GET['author'] ) ? sanitize_text_field( wp_unslash( $_GET['author'] ) ) : '' );
	$note_email  = ( isset( $_GET['email'] ) ? sanitize_email( wp_unslash( $_GET['email'] ) ) : '' );

	$data = array(
		$note_top,
		$note_left,
		$note_width,
		$note_height,
		$note_text,
		$note_id,
		$note_ind_id,
		$note_author,
		$note_email,
	);

	global $wpdb;
	if ( 'new' !== $data[5] ) {
		// Find the old image note from comment.
		$result = $wpdb->get_results( $wpdb->prepare( 'SELECT * from %1s WHERE note_img_ID = %s AND note_ID = %s', DIA_TABLE_NOTES, $img_id, $data[5] ) );
		foreach ( $result as $commentresult ) {
			$comment_id     = (int) $commentresult->note_comment_ID; // comment ID.
			$comment_author = $commentresult->note_author; // comment Author.
			$comment_email  = $commentresult->note_email; // comment Email.
		};

		// Update comment.
		if ( ( get_option( 'demon_image_annotation_comments' ) === '0' ) ) {
			$wpdb->update(
				DIA_TABLE_COMMENTS,
				array(
					'comment_content' => $data[4],
				),
				array(
					'comment_ID' => $comment_id,
				)
			);
		}

		// Update image note.
		$wpdb->update(
			DIA_TABLE_NOTES,
			array(
				'note_top'     => $data[0],
				'note_left'    => $data[1],
				'note_width'   => $data[2],
				'note_height'  => $data[3],
				'note_text'    => $data[4],
				'note_text_ID' => 'id_' . md5( $data[4] ),
			),
			array(
				'note_ID' => $data[6],
			)
		);

	} else {
		// If image note is new.
		$comment_post_ID      = $post_id;
		$comment_author       = ( isset( $_GET['author'] ) ? sanitize_text_field( wp_unslash( $_GET['author'] ) ) : null );
		$comment_author_email = ( isset( $_GET['email'] ) ? sanitize_text_field( wp_unslash( $_GET['email'] ) ) : null );
		$comment_author_url   = ( isset( $_GET['url'] ) ? sanitize_url( wp_unslash( $_GET['url'] ) ) : null );
		$comment_content      = $data[4];

		// If the user is logged in, get author name and author email.
		$user = wp_get_current_user();
		if ( $user->ID ) {
			if ( empty( $user->display_name ) ) {
				$user->display_name = $user->user_login;
			}
				$comment_author       = $wpdb->escape( $user->display_name );
				$comment_author_email = $wpdb->escape( $user->user_email );
				$comment_author_url   = $wpdb->escape( $user->user_url );
			if ( current_user_can( 'unfiltered_html' ) ) {
				$wp_unfiltered_html_comment = ( isset( $_POST['_wp_unfiltered_html_comment'] ) ? sanitize_text_field( wp_unslash( $_POST['_wp_unfiltered_html_comment'] ) ) : '' );
				if ( wp_create_nonce( 'unfiltered-html-comment_' . $comment_post_ID ) !== $wp_unfiltered_html_comment ) {
					kses_remove_filters();
					kses_init_filters();
				}
			}
		}

		$autoapprove = 1;
		if ( ( get_option( 'demon_image_annotation_autoapprove' ) === '1' ) ) {
			$autoapprove = 0;
		}

		// Add to comment.
		if ( ( get_option( 'demon_image_annotation_comments' ) === '0' ) ) {
			$user_ID        = $user->ID;
			$comment_type   = '';
			$comment_parent = isset( $_POST['comment_parent'] ) ? absint( $_POST['comment_parent'] ) : 0;
			$commentdata    = compact( 'comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID' );
			if ( 1 === $autoapprove ) {
				$comment_id = wp_insert_comment( $commentdata );
			} else {
				$comment_id = wp_new_comment( $commentdata );
			}
		}

		// Add to image note.
		$wpdb->insert(
			DIA_TABLE_NOTES,
			array(
				'note_img_ID'     => $img_id,
				'note_comment_ID' => $comment_id,
				'note_post_ID'    => $post_id,
				'note_author'     => $comment_author,
				'note_email'      => $comment_author_email,
				'note_top'        => $data[0],
				'note_left'       => $data[1],
				'note_width'      => $data[2],
				'note_height'     => $data[3],
				'note_text'       => $data[4],
				'note_text_id'    => 'id_' . md5( $data[4] ),
				'note_editable'   => 1,
				'note_approved'   => $autoapprove,
				'note_date'       => current_time( 'mysql' ),
			)
		);
	}
	// Output JSON array.
	ob_end_clean();
	echo '{ "status":true, "annotation_id": "id_' . esc_textarea( md5( $data[4] ) ) . '" }';
}

/**
 * Delete.
 */
function dia_get_delete() {
	$qs_type = ( isset( $_REQUEST['imgid'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['imgid'] ) ) : '' );
	$note_id = ( isset( $_GET['id'] ) ? sanitize_text_field( wp_unslash( $_GET['id'] ) ) : '' );

	$data = array(
		$note_id,
	);

	// Find the comment ID.
	global $wpdb;
	$result = $wpdb->get_results( $wpdb->prepare( 'SELECT * from %1s WHERE note_img_ID = %s AND note_ID = %s', DIA_TABLE_NOTES, $qs_type, $data[0] ) );
	foreach ( $result as $commentresult ) {
		$comment_id = (int) $commentresult->note_comment_ID; // comment ID.
	};

	// Delete note from comment.
	$wpdb->delete( DIA_TABLE_COMMENTS, array( 'comment_ID' => $comment_id ) );

	// Delete note from image note.
	$wpdb->delete(
		DIA_TABLE_NOTES,
		array(
			'note_img_ID' => $qs_type,
			'note_ID'     => $data[0],
		)
	);

	// Output JSON array.
	echo '{ "status":true }';
}

/**
 * Get.
 */
function dia_get_results() {
	$qs_type    = ( isset( $_REQUEST['imgid'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['imgid'] ) ) : '' );
	$qs_preview = ( isset( $_REQUEST['preview'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['preview'] ) ) : '' );

	global $wpdb;
	if ( ( get_option( 'demon_image_annotation_comments' ) === '0' ) ) {
		$query = $wpdb->prepare( 'SELECT * from %1s WHERE note_img_ID = %s AND note_comment_ID != %1s', DIA_TABLE_NOTES, $qs_type, 0 );
	} else {
		$query = $wpdb->prepare( 'SELECT * from %1s WHERE note_img_ID = %s AND note_comment_ID = %1s', DIA_TABLE_NOTES, $qs_type, 0 );
	}

	$result = $wpdb->get_results( $query );

	// Output JSON array.
	$json = array();

	foreach ( $result as $row ) {
		$comment_approve = 0;

		if ( 1 === $qs_preview ) {
			$comment_approve = 1;
		} elseif ( ( get_option( 'demon_image_annotation_comments' ) === '0' ) ) {
			// Sync with approved comment.
			$comment_approve = $wpdb->get_var( $wpdb->prepare( 'SELECT comment_approved from %1s WHERE comment_ID = %s', DIA_TABLE_COMMENTS, (int) $row->note_comment_ID ) );

			// Empty string will use image note approved value.
			if ( '' === $comment_approve ) {
				$comment_approve = $row->note_approved;
			}
		} else {
			// Not sync with approved comment.
			$comment_approve = $row->note_approved;
		}

		if ( 1 === (int) $comment_approve ) {
			$notetext = esc_html( $row->note_text );

			if ( ( get_option( 'demon_image_annotation_gravatar' ) === '0' ) ) {
				// Display author avatar.
				if ( get_option( 'demon_image_annotation_gravatar_deafult' ) !== '' ) {
					$defaultgravatar = get_bloginfo( 'template_url' ) . get_option( 'demon_image_annotation_gravatar_deafult' );
				} else {
					$defaultgravatar = '';
				}
				$author = "<div class='dia-author'>" . get_avatar( $row->note_email, 20, $defaultgravatar ) . ' ' . esc_html( $row->note_author ) . '</div>';
			} else {
				$author = "<div class='dia-author'>" . esc_html( $row->note_author ) . '</div>';
			}
			$json['id']        = esc_html( $row->note_ID );
			$json['top']       = esc_html( $row->note_top );
			$json['left']      = esc_html( $row->note_left );
			$json['width']     = esc_html( $row->note_width );
			$json['height']    = esc_html( $row->note_height );
			$json['text']      = $notetext;
			$json['note_id']   = esc_html( $row->note_text_ID );
			$json['editable']  = true;
			$json['author']    = $author;
			$json['commentid'] = esc_html( $row->note_comment_ID );
			$data[]            = $json;
		}
	};

	echo '{ "status":true, "note": ' . wp_json_encode( $data ) . ' }';
}

