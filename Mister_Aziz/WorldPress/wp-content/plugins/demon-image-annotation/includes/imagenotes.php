<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

?>
	<div class="wrap">
		<div class="dia-container">
		<?php
		$note_action = ( isset( $_REQUEST['action'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['action'] ) ) : '' );
		global $my_list_table;
		$my_list_table = new Image_Annotation_List_Table();
		?>
		<br><br>
		<?php
		if ( 'edit' === $note_action ) {
			$my_list_table->editNote();
		} else {
			$my_list_table->prepare_items();
			$my_list_table->views();
			?>
			<form method="post">
				<input type="hidden" name="page" value="imageannotatetable">
			<?php $my_list_table->display(); ?>
			</form></div>
			<?php
		};
		?>
		</div>
	</div>
