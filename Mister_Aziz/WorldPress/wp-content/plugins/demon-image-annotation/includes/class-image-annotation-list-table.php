<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

// *************** Table ***************
if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * Image_Annotation_List_Table function.
 */
class Image_Annotation_List_Table extends WP_List_Table {
	/**
	 * __construct function.
	 */
	public function __construct() {
		global $status, $page;
			parent::__construct(
				array(
					'singular' => esc_html__( 'note', 'demon-image-annotation' ),     // singular name of the listed records.
					'plural'   => esc_html__( 'notes', 'demon-image-annotation' ),   // plural name of the listed records.
					'ajax'     => false,        // does this table support ajax?.

				)
			);
	}

	/**
	 * No_items function.
	 */
	public function no_items() {
		esc_html__( 'No notes found.', 'demon-image-annotation' );
	}

	/**
	 * Column_default function.
	 *
	 * @param string $item item.
	 * @param string $column_name column name.
	 */
	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'note_img_ID':
				return $item->$column_name;
			case 'note_text':
				return '<strong>' . esc_html__( 'Submitted on :', 'demon-image-annotation' ) . '</strong>' . esc_textarea( gmdate( 'y/m/d g:i A', strtotime( $item->note_date ) ) ) . '<br/>' . esc_textarea( nl2br( $item->$column_name ) );
			case 'note_author':
				return '<strong>' . get_avatar( $item->note_email, 30, '' ) . esc_textarea( $item->$column_name ) . '</strong><br><a href="mailto:' . esc_textarea( $item->note_email ) . '">' . esc_textarea( $item->note_email ) . '</a>';
			case 'note_response':
				if ( ( get_option( 'demon_image_annotation_comments' ) === '0' ) ) {
					global $wpdb;
					$list  = $wpdb->get_results( $wpdb->prepare( 'SELECT * from %1s WHERE comment_ID = %s AND comment_content = %s', DIA_TABLE_COMMENTS, $item->note_comment_ID, $item->note_text ) );
					$count = 0;
					foreach ( $list as $t ) {
						$comment_approved = $t->comment_approved;
						$post             = get_post( $t->comment_post_ID );
						$posttitle        = $post->post_title;
						$count ++;
						return esc_textarea( $posttitle );
					}
				}
				if ( 0 === $count ) {
					$post      = get_post( $item->note_post_ID );
					$posttitle = $post->post_title;
					if ( '' === $posttitle ) {
						return esc_html__( 'Not sync with WordPress comment', 'demon-image-annotation' );
					} else {
						return esc_textarea( $posttitle );
					}
				}
				// return.
			default:
				return print_r( esc_textarea( $item ), true ); // Show the whole array for troubleshooting purposes.
		}
	}

	/**
	 * Get_sortable_columns function.
	 */
	public function get_sortable_columns() {
		$sortable_columns = array(
			'note_img_ID' => array( 'note_img_ID', false ),
			'note_author' => array( 'note_author', false ),
			'note_text'   => array( 'note_text', false ),
		);
		return $sortable_columns;
	}

	/**
	 * Get_columns function.
	 */
	public function get_columns() {
		$columns = array(
			'cb'            => '<input type="checkbox" />',
			'note_img_ID'   => esc_html__( 'IMG ID', 'imageannotatetable' ),
			'note_author'   => esc_html__( 'Author', 'imageannotatetable' ),
			'note_text'     => esc_html__( 'Text', 'imageannotatetable' ),
			'note_response' => esc_html__( 'In Response to', 'imageannotatetable' ),
			'note_action'   => esc_html__( 'Action', 'imageannotatetable' ),
		);
		return $columns;
	}

	/**
	 * Usort_reorder function.
	 *
	 * @param string $a item a.
	 * @param string $b item b.
	 */
	public function usort_reorder( $a, $b ) {
		// If no sort, default to title.
		$orderby = ( isset( $_GET['orderby'] ) ? sanitize_text_field( wp_unslash( $_GET['orderby'] ) ) : 'note_ID' );
		// If no order, default to asc.
		$order = ( isset( $_GET['order'] ) ? sanitize_text_field( wp_unslash( $_GET['order'] ) ) : 'asc' );
		// Determine sort order.
		$result = strcmp( $a[ $orderby ], $b[ $orderby ] );
		// Send final sort direction to usort.
		return ( 'asc' === $order ) ? $result : -$result;
	}

	/**
	 * Column_note_action function.
	 *
	 * @param string $item item.
	 */
	public function column_note_action( $item ) {
		$page  = ( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '' );
		$paged = ( isset( $_REQUEST['paged'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['paged'] ) ) : '' );
		$new   = '';

		if ( ( get_option( 'demon_image_annotation_comments' ) === '0' ) ) {
			// Sync with WordPress comments.
			if ( '1' === $item->comment_approved ) {
				$condition = 'Unapprove';
				$text      = esc_html__( 'Approve', 'demon-image-annotation' );
			} elseif ( '0' === $item->comment_approved ) {
				$condition = 'Approve';
				$text      = esc_html__( 'Unapprove', 'demon-image-annotation' );
			} elseif ( 'trash' === $item->comment_approved ) {
				$condition = 'Restore';
				$text      = esc_html__( 'Trash', 'demon-image-annotation' );
			}

			// Not sycn or sync but with old notes.
			if ( '' === $item->comment_approved ) {
				$condition = 'Notsync';
				if ( 0 === $item->note_comment_ID ) {
					// Deleted comments.
					$text = esc_html__( 'Not sync with WordPress comment', 'demon-image-annotation' );
				} else {
					// Not Sycn.
					$text = '<span style="color:#a00">' . esc_html__( 'Deleted Comment', 'demon-image-annotation' ) . '</span>';
				}
			}

			if ( 'spam' === $item->comment_approved ) {
				$condition = 'Spam';
				$text      = '<span style="color:#a00">' . esc_html__( 'Spam', 'demon-image-annotation' ) . '</span>';
			}
		} else {
			if ( '1' === $item->note_approved ) {
				$condition = 'Unapprove';
				$text      = esc_html__( 'Approve', 'demon-image-annotation' );
			} else {
				$condition = 'Approve';
				$text      = esc_html__( 'Unapprove', 'demon-image-annotation' );
			}
		}

		if ( current_user_can( 'moderate_comments' ) ) {
			$moderate = true;
		}

		if ( $moderate ) {
			if ( 'Notsync' === $condition || 'Spam' === $condition ) {
				$actions = array(
					'delete' => sprintf( '<a href="?page=%s&action=%s&note=%s&paged=%s">' . esc_html__( 'Delete', 'demon-image-annotation' ) . '</a>', esc_textarea( $page ), 'delete', esc_attr( $item->note_ID ), esc_textarea( $paged ) ),
				);
			} else {
				$actions = array(
					esc_textarea( $condition ) => sprintf( '<a href="?page=%s&action=%s&note=%s&paged=%s">' . esc_textarea( $condition ) . '</a>', esc_textarea( $page ), esc_textarea( strtolower( $condition ) ), esc_attr( $item->note_ID ), esc_textarea( $paged ) ),
					'edit'                     => sprintf( '<a href="?page=%s&action=%s&note=%s&paged=%s">' . esc_html__( 'Edit', 'demon-image-annotation' ) . '</a>', esc_textarea( $page ), 'edit', esc_attr( $item->note_ID ), esc_textarea( $paged ) ),
					'delete'                   => sprintf( '<a href="?page=%s&action=%s&note=%s&paged=%s">' . esc_html__( 'Delete', 'demon-image-annotation' ) . '</a>', esc_textarea( $page ), 'delete', esc_attr( $item->note_ID ), esc_textarea( $paged ) ),
				);
			}

			return sprintf( '%1$s %2$s', $text, $this->row_actions( $actions ) );
		} else {
			return sprintf( '%1$s %2$s', $text, $this->row_actions( $actions ) );
		}
	}

	/**
	 * Single_row function.
	 *
	 * @param string $a_comment comment.
	 */
	public function single_row( $a_comment ) {
		global $comment;
		$comment = $a_comment;
		$condition;
		if ( ( '0' === get_option( 'demon_image_annotation_comments' ) ) ) {
			// Sync with WordPress comments.
			if ( '1' === $comment->comment_approved ) {
				$condition = 'approved';
			} elseif ( '0' === $comment->comment_approved ) {
				$condition = 'unapproved';
			} elseif ( 'trash' === $comment->comment_approved ) {
				$condition = 'deleted';
			}

			// Not sycn or sync but with old notes.
			if ( '' === $comment->comment_approved ) {
				$condition = 'deleted';
			}
		} else {
			if ( '1' === $comment->note_approved ) {
				$condition = 'approved';
			} else {
				$condition = 'unapproved';
			}
		}
		$the_comment_class = join( ' ', get_comment_class( $condition ) );
		echo "<tr id='comment-" . esc_attr( $comment->note_ID ) . "' class='" . esc_attr( $the_comment_class ) . "'>";
		echo esc_html( $this->single_row_columns( $comment ) );
		echo "</tr>\n";
	}

	/**
	 * Get_bulk_actions function.
	 */
	public function get_bulk_actions() {
		$actions = array(
			'delete'    => esc_html__( 'Delete', 'demon-image-annotation' ),
			'approve'   => esc_html__( 'Approve', 'demon-image-annotation' ),
			'unapprove' => esc_html__( 'Unapprove', 'demon-image-annotation' ),
		);

		return $actions;
	}

	/**
	 * Process_bulk_action function.
	 */
	public function process_bulk_action() {
		global $wpdb;

		// our data source.
		if ( 'delete' === $this->current_action() ) {
			echo '<div class="updated"><p><strong>' . esc_html__( 'Images Note Deleted.', 'demon-image-annotation' ) . '</strong></p></div>';
		} elseif ( 'approve' === $this->current_action() ) {
			echo '<div class="updated"><p><strong>' . esc_html__( 'Images Note Approved.', 'demon-image-annotation' ) . '</strong></p></div>';
		} elseif ( 'restore' === $this->current_action() ) {
			echo '<div class="updated"><p><strong>' . esc_html__( 'Images Note Restored.', 'demon-image-annotation' ) . '</strong></p></div>';
		} elseif ( 'unapprove' === $this->current_action() ) {
			echo '<div class="updated"><p><strong>' . esc_html__( 'Images Note Unapproved.', 'demon-image-annotation' ) . '</strong></p></div>';
		} elseif ( 'edit' === $this->current_action() ) {
			echo '<div class="updated"><p><strong>' . esc_html__( 'Images Note Edit.', 'demon-image-annotation' ) . '</strong></p></div>';
		} elseif ( 'update' === $this->current_action() ) {
			echo '<div class="updated"><p><strong>' . esc_html__( 'Images Note Updated.', 'demon-image-annotation' ) . '</strong></p></div>';
		}

		if ( isset( $_POST['update_single_note'] ) ) {
			$wpnonce = ( isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '' );
			if ( ! wp_verify_nonce( $wpnonce, 'imagenotesactionupdate' ) ) {
				die( esc_html__( 'Update security violated.', 'demon-image-annotation' ) );
			}
			if ( sanitize_text_field( wp_unslash( $_POST['update_single_note'] ) ) === 'yes' ) {
				$imgid       = ( isset( $_POST['note_ID'] ) ? sanitize_text_field( wp_unslash( $_POST['note_ID'] ) ) : '' );
				$commentid   = ( isset( $_POST['note_comment_ID'] ) ? sanitize_text_field( wp_unslash( $_POST['note_comment_ID'] ) ) : '' );
				$note_text   = ( isset( $_POST['note_text'] ) ? sanitize_text_field( wp_unslash( $_POST['note_text'] ) ) : '' );
				$note_author = ( isset( $_POST['note_author'] ) ? sanitize_text_field( wp_unslash( $_POST['note_author'] ) ) : '' );
				$note_email  = ( isset( $_POST['note_email'] ) ? sanitize_text_field( wp_unslash( $_POST['note_email'] ) ) : '' );

				$note_top    = ( isset( $_POST['note_top'] ) ? sanitize_text_field( wp_unslash( $_POST['note_top'] ) ) : '' );
				$note_left   = ( isset( $_POST['note_left'] ) ? sanitize_text_field( wp_unslash( $_POST['note_left'] ) ) : '' );
				$note_width  = ( isset( $_POST['note_width'] ) ? sanitize_text_field( wp_unslash( $_POST['note_width'] ) ) : '' );
				$note_height = ( isset( $_POST['note_height'] ) ? sanitize_text_field( wp_unslash( $_POST['note_height'] ) ) : '' );

				if ( ( get_option( 'demon_image_annotation_comments' ) === '0' ) ) {
					$wpdb->update(
						DIA_TABLE_COMMENTS,
						array(
							'comment_content'      => $note_text,
							'comment_author'       => $note_author,
							'comment_author_email' => $note_email,
						),
						array(
							'comment_ID' => $commentid,
						)
					);
				}

				$wpdb->update(
					DIA_TABLE_NOTES,
					array(
						'note_author' => $note_author,
						'note_email'  => $note_email,
						'note_top'    => $note_top,
						'note_left'   => $note_left,
						'note_width'  => $note_width,
						'note_height' => $note_height,
						'note_text'   => $note_text,
					),
					array(
						'note_ID' => $imgid,
					)
				);
			}
		}
	}

	/**
	 * Column_cb function.
	 *
	 * @param string $item item.
	 */
	public function column_cb( $item ) {
		if ( current_user_can( 'moderate_comments' ) ) {
			$moderate = true;
		}
		if ( $moderate ) {
			return sprintf(
				'<input type="checkbox" name="note[]" value="%s" />',
				esc_attr( $item->note_ID )
			);
		}
	}

	/**
	 * Get_views function.
	 */
	public function get_views() {
		global $allnum, $pendingnum, $approvednum;

		$page    = ( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '' );
		$current = ( isset( $_REQUEST['filter'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['filter'] ) ) : 'all' );

		$allclass      = ( 'all' === $current || '' === $current ? ' class="current"' : '' );
		$pendingclass  = ( 'pending' === $current ? ' class="current"' : '' );
		$approvedclass = ( 'approved' === $current ? ' class="current"' : '' );

		$status_links = array(
			'all'      => sprintf( '<a href="?page=%s" %s>' . esc_html__( 'All', 'demon-image-annotation' ) . '</a> (%s)', esc_textarea( $page ), $allclass, esc_textarea( $allnum ) ),
			'pending'  => sprintf( '<a href="?page=%s&filter=%s" %s>' . esc_html__( 'Pending', 'demon-image-annotation' ) . '</a> (%s)', esc_textarea( $page ), 'pending', $pendingclass, esc_textarea( $pendingnum ) ),
			'approved' => sprintf( '<a href="?page=%s&filter=%s" %s>' . esc_html__( 'Approved', 'demon-image-annotation' ) . '</a> (%s)', esc_textarea( $page ), 'approved', $approvedclass, esc_textarea( $approvednum ) ),
		);
		return $status_links;
	}

	/**
	 * EditNote function.
	 */
	public function editNote() {
		if ( 'edit' === $this->current_action() ) {
			$page   = ( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '' );
			$paged  = ( isset( $_REQUEST['paged'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['paged'] ) ) : '' );
			$noteid = ( is_array( $_REQUEST['note'] ) ) ? dia_sanitize_text_or_array_field( wp_unslash( $_REQUEST['note'] ) ) : array( dia_sanitize_text_or_array_field( wp_unslash( $_REQUEST['note'] ) ) );
			global $wpdb;

			foreach ( $noteid as $id ) {
				$id     = absint( sanitize_text_field( $id ) );
				$result = $wpdb->get_results( $wpdb->prepare( 'SELECT * from %1s WHERE note_ID = %s', DIA_TABLE_NOTES, $id ) );

				?>
				<div class="wrap">
				<form name="dia_update_form" method="post" action="<?php echo sprintf( '?page=%s&action=%s&paged=%s', esc_textarea( $page ), 'update', esc_textarea( $paged ) ); ?>">
				<input type="hidden" name="update_single_note" value="yes">
				<?php wp_nonce_field( 'imagenotesactionupdate' ); ?>	
				<?php
				foreach ( $result as $r ) {
					echo '<table class="widefat" width="100%">';
					echo '<thead><tr>';
					echo '<th colspan="2">' . esc_html__( 'Edit Image Note : ', 'demon-image-annotation' ) . esc_textarea( $r->note_img_ID ) . '<input type="hidden" name="note_ID" value="' . esc_textarea( $r->note_ID ) . '" /><input type="hidden" name="note_comment_ID" value="' . esc_textarea( $r->note_comment_ID ) . '" /></th>';
					echo '</tr></thead>';
					echo '<tbody>';
					echo '<tr>';
					echo '<td width="120">' . esc_html__( 'Image Preview', 'demon-image-annotation' ) . '</td>';
					echo '<td>';

					$postid = $r->note_post_ID;

					if ( 0 === $postid ) {
						// Grab post ID from comment.
						global $wpdb;

						$list = $wpdb->get_results( $wpdb->prepare( 'SELECT * from %1s WHERE comment_ID = %s AND comment_content = %s', DIA_TABLE_COMMENTS, $r->note_comment_ID, $r->note_text ) );
						foreach ( $list as $t ) {
							$postid = $t->comment_post_ID;
						}
					}
					if ( 0 === $postid ) {
						// Grab post ID from note image ID.
						$postid = dia_get_between( '-', '-', $r->note_img_ID );
					}

					if ( 0 !== $postid ) {
						// Find all images.
						$post        = get_post( $postid );
						$postcontent = $post->post_content;
						preg_match_all( '/<img[^>]+>/i', $postcontent, $matches );

						// Find id and src.
						$img = array();
						foreach ( $matches[0] as $img_tag ) {
							preg_match_all( '/(id|src)=("[^"]*")/i', $img_tag, $img[ $img_tag ] );
						}

						$imgid;
						$imgsrc;
						$count = 0;
						foreach ( $img as $img_tag ) {
							$first = trim( $img_tag[0][0] );
							if ( strpos( $first, 'id=' ) !== false ) {
								$second = trim( $img_tag[0][1] );

								$imgid  = substr( $first, 4, -1 );
								$imgsrc = substr( $second, 5, -1 );
							} elseif ( strpos( $first, 'src=' ) !== false ) {
								$imgsrc = substr( $first, 5, -1 );
								$imgid  = md5( $imgsrc );
								$imgid  = 'img-' . $postid . '-' . substr( $imgid, 0, 10 );
							}

							if ( $r->note_img_ID === $imgid ) {
								$notelink = sprintf( '?page=%s&note=%s&paged=%s"', esc_textarea( $page ), esc_textarea( $r->note_ID ), esc_textarea( $paged ) );
								echo '<div id="dia-admin-holder" data-note-ID="' . esc_attr( $r->note_ID ) . '" date-note-link="' . esc_attr( $notelink ) . '">';
								echo '<img id="' . esc_attr( $imgid ) . '" addable="false" src="' . esc_textarea( $imgsrc ) . '">';
								echo '</div>';
							}
							$count++;
						}
						if ( 0 === $count ) {
							esc_html_e( 'No preview image', 'demon-image-annotation' );
						}
					} else {
						esc_html_e( 'No preview image', 'demon-image-annotation' );
					}

					echo '</td>';
					echo '</tr>';
					echo '<tr>';
					echo '<td>' . esc_html__( 'Author', 'demon-image-annotation' ) . '</td>';
					echo '<td><input name="note_author" type="text" size="40" value="' . esc_textarea( $r->note_author ) . '" /></td>';
					echo '</tr>';
					echo '<tr>';
					echo '<td>' . esc_html__( 'Email', 'demon-image-annotation' ) . '</td>';
					echo '<td><input name="note_email" type="text" size="40" value="' . esc_textarea( $r->note_email ) . '" /></td>';
					echo '</tr>';

					echo '<tr>';
					echo '<td>' . esc_html__( 'Top', 'demon-image-annotation' ) . '</td>';
					echo '<td><input name="note_top" type="text" size="5" value="' . esc_attr( $r->note_top ) . '" /></td>';
					echo '</tr>';
					echo '<tr>';
					echo '<td>' . esc_html__( 'Left', 'demon-image-annotation' ) . '</td>';
					echo '<td><input name="note_left" type="text" size="5" value="' . esc_attr( $r->note_left ) . '" /></td>';
					echo '</tr>';
					echo '<tr>';
					echo '<td>' . esc_html__( 'Width', 'demon-image-annotation' ) . '</td>';
					echo '<td><input name="note_width" type="text" size="5" value="' . esc_attr( $r->note_width ) . '" /></td>';
					echo '</tr>';
					echo '<tr>';
					echo '<td>' . esc_html__( 'Height', 'demon-image-annotation' ) . '</td>';
					echo '<td><input name="note_height" type="text" size="5" value="' . esc_attr( $r->note_height ) . '" /></td>';
					echo '</tr>';
					echo '<tr>';
					echo '<td>' . esc_html__( 'Text', 'demon-image-annotation' ) . '</td>';
					echo '<td><textarea name="note_text" cols="32" rows="5">' . esc_textarea( $r->note_text ) . '</textarea></td>';
					echo '</tr>';
					echo '<tr>';
					echo '<td></td>';
					echo '<td><input type="submit" name="update" value="' . esc_html__( 'Update', 'demon-image-annotation' ) . '" class="button-primary action" /> <a class="button-secondary" href="?page=' . esc_textarea( $page ) . '&paged=' . esc_textarea( $paged ) . '">' . esc_html__( 'Cancel', 'demon-image-annotation' ) . '</a></td>';
					echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';

				?>
				</form></div><?php
			}
		}
	}

	/**
	 * Prepare the table with different parameters, pagination, columns and table elements
	 */
	public function prepare_items() {
		global $wpdb, $_wp_column_headers, $screen, $allnum, $pendingnum, $approvednum;
		$screen = get_current_screen();
		$filter = ( isset( $_REQUEST['filter'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['filter'] ) ) : 'all' );

		/* Handle our bulk actions */
			$this->process_bulk_action();

		/* -- Preparing your query -- */
		if ( ( get_option( 'demon_image_annotation_comments' ) === '0' ) ) {
			// with WordPress comment.
			$wpdb->get_results( 'SELECT %1s.*, %1s.comment_approved FROM %1s LEFT OUTER JOIN %1s on %1s.comment_ID = %1s.note_comment_ID WHERE %1s.note_comment_ID != %s', DIA_TABLE_NOTES, DIA_TABLE_COMMENTS, DIA_TABLE_NOTES, DIA_TABLE_COMMENTS, DIA_TABLE_COMMENTS, DIA_TABLE_NOTES, DIA_TABLE_NOTES, 0 );
			$allnum = $wpdb->num_rows;

			$wpdb->get_results( 'SELECT %1s.*, %1s.comment_approved FROM %1s LEFT OUTER JOIN %1s on %1s.comment_ID = %1s.note_comment_ID WHERE %1s.note_comment_ID != %s AND note_approved = %s', DIA_TABLE_NOTES, DIA_TABLE_COMMENTS, DIA_TABLE_NOTES, DIA_TABLE_COMMENTS, DIA_TABLE_COMMENTS, DIA_TABLE_NOTES, DIA_TABLE_NOTES, 0, 0 );
			$pendingnum = $wpdb->num_rows;

			$wpdb->get_results( 'SELECT %1s.*, %1s.comment_approved FROM %1s LEFT OUTER JOIN %1s on %1s.comment_ID = %1s.note_comment_ID WHERE %1s.note_comment_ID != %s AND note_approved = %s', DIA_TABLE_NOTES, DIA_TABLE_COMMENTS, DIA_TABLE_NOTES, DIA_TABLE_COMMENTS, DIA_TABLE_COMMENTS, DIA_TABLE_NOTES, DIA_TABLE_NOTES, 0, 1 );
			$approvednum = $wpdb->num_rows;
		} else {
			$wpdb->get_results( 'SELECT * FROM %1s WHERE %1s.note_comment_ID = %s', DIA_TABLE_NOTES, DIA_TABLE_NOTES, 0 );
			$allnum = $wpdb->num_rows;

			$wpdb->get_results( 'SELECT * FROM %1s WHERE %1s.note_comment_ID = %s AND note_approved = %s', DIA_TABLE_NOTES, DIA_TABLE_NOTES, 0, 0 );
			$pendingnum = $wpdb->num_rows;

			$wpdb->get_results( $wpdb->prepare( 'SELECT * FROM %1s WHERE %1s.note_comment_ID = %s AND note_approved = %s', DIA_TABLE_NOTES, DIA_TABLE_NOTES, 0, 1 ) );
			$approvednum = $wpdb->num_rows;
		}

		$additionalquery = '';
		if ( 'pending' === $filter ) {
			$additionalquery = ' AND note_approved = 0';
		} elseif ( 'approved' === $filter ) {
			$additionalquery = ' AND note_approved = 1';
		}

		// Check is sync with WordPress comment.
		if ( ( get_option( 'demon_image_annotation_comments' ) === '0' ) ) {
			// With WordPress comment.
			$query = 'SELECT ' . DIA_TABLE_NOTES . '.*, ' . DIA_TABLE_COMMENTS . '.comment_approved FROM ' . DIA_TABLE_NOTES . ' LEFT OUTER JOIN ' . DIA_TABLE_COMMENTS . ' on ' . DIA_TABLE_COMMENTS . '.comment_ID = ' . DIA_TABLE_NOTES . '.note_comment_ID WHERE ' . DIA_TABLE_NOTES . '.note_comment_ID != 0' . $additionalquery;
		} else {
			$query = 'SELECT * FROM ' . DIA_TABLE_NOTES . ' WHERE ' . DIA_TABLE_NOTES . '.note_comment_ID = 0' . $additionalquery;
		}

		// Ordering parameters.
		// Parameters that are going to be used to order the result.
		$orderby = ( isset( $_GET['orderby'] ) ? sanitize_text_field( wp_unslash( $_GET['orderby'] ) ) : 'ASC' );
		$order   = ( isset( $_GET['order'] ) ? sanitize_text_field( wp_unslash( $_GET['order'] ) ) : '' );
		if ( ! empty( $orderby ) & ! empty( $order ) ) {
			$query .= ' ORDER BY ' . $orderby . ' ' . $order;
		} else {
			$query .= ' ORDER BY note_ID DESC';
		}

		// Pagination parameters.
		// Number of elements in your table?
		$totalitems = $wpdb->query( $query ); // return the total number of affected rows
		// How many to display per page?
		$perpage = 10;
		// Which page is this?
		$paged = ( isset( $_GET['paged'] ) ? sanitize_text_field( wp_unslash( $_GET['paged'] ) ) : '' );
		// Page Number.
		if ( empty( $paged ) || ! is_numeric( $paged ) || $paged <= 0 ) {
			$paged = 1; }
			// How many pages do we have in total?
			$totalpages = ceil( $totalitems / $perpage );
			// adjust the query to take pagination into account.
		if ( ! empty( $paged ) && ! empty( $perpage ) ) {
			$offset = ( $paged - 1 ) * $perpage;
			$query .= ' LIMIT ' . (int) $offset . ',' . (int) $perpage;
		}

		// Register the pagination.
		$this->set_pagination_args(
			array(
				'total_items' => $totalitems,
				'total_pages' => $totalpages,
				'per_page'    => $perpage,
			)
		);
		// The pagination links are automatically built according to those parameters.

		/* -- Register the Columns -- */
			$columns               = $this->get_columns();
			$hidden                = array();
			$sortable              = $this->get_sortable_columns();
			$this->_column_headers = array( $columns, $hidden, $sortable );

		/* -- Fetch the items -- */
			$this->items = $wpdb->get_results( $query );
	}

} //class
?>
