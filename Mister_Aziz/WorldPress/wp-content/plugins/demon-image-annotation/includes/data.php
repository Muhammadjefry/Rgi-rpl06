<?php
require_once 'functions.php';

global $wpdb;
if ( ( get_option( 'demon_image_annotation_comments' ) === '0' ) ) {
	// Moderate comments.
	$query = 'SELECT ' . DIA_TABLE_NOTES . '.note_ID, ' . DIA_TABLE_NOTES . '.note_approved, ' . DIA_TABLE_COMMENTS . '.comment_approved
			FROM ' . DIA_TABLE_NOTES . ', ' . DIA_TABLE_COMMENTS . '
			WHERE ' . DIA_TABLE_NOTES . '.note_approved != ' . DIA_TABLE_COMMENTS . '.comment_approved
			AND ' . DIA_TABLE_NOTES . '.note_comment_ID = ' . DIA_TABLE_COMMENTS . '.comment_ID';

	$result = $wpdb->get_results( $query );
	foreach ( $result as $r ) {
		$wpdb->update(
			DIA_TABLE_NOTES,
			array(
				'note_approved' => $r->comment_approved,
			),
			array(
				'note_ID' => $r->note_ID,
			)
		);
	}

	// Content.
	$query = 'SELECT ' . DIA_TABLE_NOTES . '.note_ID, ' . DIA_TABLE_NOTES . '.note_text, ' . DIA_TABLE_COMMENTS . '.comment_content
			FROM ' . DIA_TABLE_NOTES . ', ' . DIA_TABLE_COMMENTS . '
			WHERE ' . DIA_TABLE_NOTES . '.note_text != ' . DIA_TABLE_COMMENTS . '.comment_content
			AND ' . DIA_TABLE_NOTES . '.note_comment_ID = ' . DIA_TABLE_COMMENTS . '.comment_ID';

	$result = $wpdb->get_results( $query );
	foreach ( $result as $r ) {
		$wpdb->update(
			DIA_TABLE_NOTES,
			array(
				'note_text' => addslashes( $r->comment_content ),
			),
			array(
				'note_ID' => $r->note_ID,
			)
		);
	}

	// Author.
	$query = 'SELECT ' . DIA_TABLE_NOTES . '.note_ID, ' . DIA_TABLE_NOTES . '.note_author, ' . DIA_TABLE_COMMENTS . '.comment_author
			FROM ' . DIA_TABLE_NOTES . ', ' . DIA_TABLE_COMMENTS . '
			WHERE ' . DIA_TABLE_NOTES . '.note_author != ' . DIA_TABLE_COMMENTS . '.comment_author
			AND ' . DIA_TABLE_NOTES . '.note_comment_ID = ' . DIA_TABLE_COMMENTS . '.comment_ID';

	$result = $wpdb->get_results( $query );
	foreach ( $result as $r ) {
		$wpdb->update(
			DIA_TABLE_NOTES,
			array(
				'note_author' => $r->comment_author,
			),
			array(
				'note_ID' => $r->note_ID,
			)
		);
	}

	// Email.
	$query = 'SELECT ' . DIA_TABLE_NOTES . '.note_ID, ' . DIA_TABLE_NOTES . '.note_email, ' . DIA_TABLE_COMMENTS . '.comment_author_email
			FROM ' . DIA_TABLE_NOTES . ', ' . DIA_TABLE_COMMENTS . '
			WHERE ' . DIA_TABLE_NOTES . '.note_email != ' . DIA_TABLE_COMMENTS . '.comment_author_email
			AND ' . DIA_TABLE_NOTES . '.note_comment_ID = ' . DIA_TABLE_COMMENTS . '.comment_ID';

	$result = $wpdb->get_results( $query );
	foreach ( $result as $r ) {
		$wpdb->update(
			DIA_TABLE_NOTES,
			array(
				'note_email' => $r->comment_author_email,
			),
			array(
				'note_ID' => $r->note_ID,
			)
		);
	}
}

$data_action = ( isset( $_REQUEST['action'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['action'] ) ) : '' );
if ( is_admin() && '' !== $data_action ) {
	if ( isset( $_REQUEST['note'] ) ) {
		$noteid = ( is_array( $_REQUEST['note'] ) ) ? dia_sanitize_text_or_array_field( wp_unslash( $_REQUEST['note'] ) ) : array( dia_sanitize_text_or_array_field( wp_unslash( $_REQUEST['note'] ) ) );
	}

	// Define our data source.
	if ( 'delete' === $data_action ) {
		foreach ( $noteid as $id ) {
			$id = absint( sanitize_text_field( $id ) );
			if ( ( get_option( 'demon_image_annotation_comments' ) === '0' ) ) {
				// Find comment id and comment text.
				$result = $wpdb->get_results( $wpdb->prepare( 'SELECT * from %1s WHERE note_ID = %s', DIA_TABLE_NOTES, sanitize_text_field( $id ) ) );
				foreach ( $result as $r ) {
					$comment_id = $r->note_comment_ID;
					$content    = $r->note_text;
					// Delete comment.
					$wpdb->delete(
						DIA_TABLE_COMMENTS,
						array(
							'comment_ID'      => $comment_id,
							'comment_content' => $content,
						)
					);
				}
			}
			// Delete note.
			$wpdb->delete( DIA_TABLE_NOTES, array( 'note_ID' => $id ) );
			$wpdb->delete( 'wp_comments', array( 'comment_ID' => $comment_id ) );
		}
	} elseif ( 'approve' === $data_action ) {
		foreach ( $noteid as $id ) {
			$id = absint( sanitize_text_field( $id ) );
			if ( ( get_option( 'demon_image_annotation_comments' ) === '0' ) ) {
				// Find comment id and comment text.
				$result = $wpdb->get_results( $wpdb->prepare( 'SELECT * from %1s WHERE note_ID = %s', DIA_TABLE_NOTES, sanitize_text_field( $id ) ) );
				foreach ( $result as $r ) {
					$comment_id = $r->note_comment_ID;
					$content    = $r->note_text;
					// Approve comment.
					$wpdb->update(
						DIA_TABLE_COMMENTS,
						array(
							'comment_approved' => '1',
						),
						array(
							'comment_ID'      => $comment_id,
							'comment_content' => $content,
						)
					);
				}
			}
			// Approve note.
			$wpdb->update(
				DIA_TABLE_NOTES,
				array(
					'note_approved' => '1',
				),
				array(
					'note_ID' => $id,
				)
			);
		}
	} elseif ( 'restore' === $data_action ) {
		foreach ( $noteid as $id ) {
			$id = absint( sanitize_text_field( $id ) );
			if ( ( get_option( 'demon_image_annotation_comments' ) === '0' ) ) {
				// Find comment id and comment text.
				$result = $wpdb->get_results( $wpdb->prepare( 'SELECT * from %1s WHERE note_ID = %s', DIA_TABLE_NOTES, sanitize_text_field( $id ) ) );
				foreach ( $result as $r ) {
					$comment_id = $r->note_comment_ID;
					$content    = $r->note_text;
					// Approve comment.
					$wpdb->update(
						DIA_TABLE_COMMENTS,
						array(
							'comment_approved' => '1',
						),
						array(
							'comment_ID'      => $comment_id,
							'comment_content' => $content,
						)
					);
				}
			}
			// Approve note.
			$wpdb->update(
				DIA_TABLE_NOTES,
				array(
					'note_approved' => '1',
				),
				array(
					'note_ID' => $id,
				)
			);
		}
	} elseif ( 'unapprove' === $data_action ) {
		foreach ( $noteid as $id ) {
			$id = absint( $id );
			if ( ( get_option( 'demon_image_annotation_comments' ) === '0' ) ) {
				// Find comment id and comment text.
				$result = $wpdb->get_results( $wpdb->prepare( 'SELECT * from %1s WHERE note_ID = %s', DIA_TABLE_NOTES, sanitize_text_field( $id ) ) );
				foreach ( $result as $r ) {
					$comment_id = $r->note_comment_ID;
					$content    = $r->note_text;
					// Approve comment.
					$wpdb->update(
						DIA_TABLE_COMMENTS,
						array(
							'comment_approved' => '0',
						),
						array(
							'comment_ID'      => $comment_id,
							'comment_content' => $content,
						)
					);
				}
			}
			// Unapprove note.
			$wpdb->update(
				DIA_TABLE_NOTES,
				array(
					'note_approved' => '0',
				),
				array(
					'note_ID' => $id,
				)
			);
		}
	}
}

