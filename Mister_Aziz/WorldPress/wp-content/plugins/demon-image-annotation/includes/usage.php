<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; }
?>

	<div class="wrap">
		<div class="dia-container">
			<?php dia_metabox_open( esc_html__( 'How to use:', 'demon-image-annotation' ), 'id-how-to-use', true ); ?>
			<ol>
				<li>
					<p><?php printf( /* translators: %s: The strong tag. */ esc_html__( 'First enter div wrapper %1$sid%2$s or %3$sclass%4$s in settings where your post content appear, or else the plugin can\'t find the wrapper to start. Leave it empty if you don\'t know what to do.', 'demon-image-annotation' ), '<strong>', '</strong>', '<strong>', '</strong>' ); ?></p>
					<strong><?php esc_html_e( 'Example (.entrybody)', 'demon-image-annotation' ); ?></strong><br>
					<code>
					&lt;div class="entrybody&gt;<br>
					&nbsp;&nbsp;&nbsp; &lt;?php the_content(); ?&gt;<br>
					&lt;/div&gt;</code><br><br>
				</li>				
				<li>
					<p><?php printf( /* translators: %s: The strong tag. */ esc_html__( 'To embed annotations and comments on images, your img tag must have id attribute value start with %1$s‘img-‘%2$s, this plugin already did the trick if you enable %3$sAuto Generate Image ID%4$s option.', 'demon-image-annotation' ), '<strong>', '</strong>', '<strong>', '</strong>' ); ?></p><br>
				</li>	
				<li>
					<p><?php esc_html_e( 'If you wish to add an id attribute maunally, here is the guide on how to insert id attribute to img tag.', 'demon-image-annotation' ); ?></p>
					<ul>
						<li><?php printf( /* translators: %s: The strong tag. */ esc_html__( 'First disable %1$sAuto Generate Image ID%2$s option', 'demon-image-annotation' ), '<strong>', '</strong>' ); ?></li>
						<li><?php printf( /* translators: %s: The strong tag. */ esc_html__( 'Add an id attribute start with %1$s‘img-‘%2$s follow by unique id to img tag.', 'demon-image-annotation' ), '<strong>', '</strong>' ); ?></li>
						<li><?php esc_html_e( 'All the images must have unique and different id or else you will get the same comments.', 'demon-image-annotation' ); ?></li>
					</ul>
					<strong><?php esc_html_e( 'Example (img-4774005463)', 'demon-image-annotation' ); ?></strong><br>
					<code>
					&lt;img id=&quot;img-4774005463&quot; src=&quot;http://farm5.static.flickr.com/4121/4774005463_3837b6de44_o.jpg&quot; width=&quot;900&quot; height=&quot;599&quot; alt=&quot;Image Annotation Plugin&quot; /&gt;
					</code>
					<br><br>
				</li>	
				<li>
					<p><?php printf( /* translators: %s: The strong tag. */ esc_html__( 'Decide the option for %1$sWordpress Comments%2$s setting.', 'demon-image-annotation' ), '<strong>', '</strong>' ); ?></p>

					<p><strong><?php esc_html_e( 'Sync with WordPress comments:', 'demon-image-annotation' ); ?></strong></p>
					<ul>
						<li><?php esc_html_e( 'image note sync with WordPress comment database', 'demon-image-annotation' ); ?></li>
						<li><?php esc_html_e( 'modified comment will auto update both database', 'demon-image-annotation' ); ?></li>
						<li><?php esc_html_e( 'deleted comment from WordPress comment will not sync, have to delete manually in image notes table list.', 'demon-image-annotation' ); ?></li>
						<li><?php esc_html_e( 'new image note from annoymous will auto add into WordPress comment as waiting approval.', 'demon-image-annotation' ); ?></li>
						<li><?php esc_html_e( 'the image note only publish when the comment is approve.', 'demon-image-annotation' ); ?></li>
					</ul>

					<p><strong><?php esc_html_e( 'Not sync with WordPress comments:', 'demon-image-annotation' ); ?></strong></p>
					<ol>
						<li><?php esc_html_e( 'standalone image note database.', 'demon-image-annotation' ); ?></li>
						<li><?php esc_html_e( 'new image note will publish without approval.', 'demon-image-annotation' ); ?></li>
					</ol>
					<p><?php esc_html_e( 'Pls note if you switch the option, the comments added with previous option will not load.', 'demon-image-annotation' ); ?></p>
				</li>
			</ol>
			<?php dia_metabox_close(); ?>

			<?php dia_metabox_open( 'Usage:', 'id-usage', false ); ?>
			<ol>
				<li>
					<p><strong><?php esc_html_e( 'Disable Add Note button:', 'demon-image-annotation' ); ?></strong><br/>
					<?php printf( /* translators: %s: The line break tag. */ esc_html__( 'Add an addable attribute with value “false” to disable the add note button, but image notes still viewable.%sLogin User who can Moderate Comments still able to see Add button option.', 'demon-image-annotation' ), '<br>' ); ?>
					</p>
					<code>
					&lt;img id=&quot;img-4774005463&quot; addable=&quot;false&quot; src=&quot;http://farm5.static.flickr.com/4121/4774005463_3837b6de44_o.jpg&quot; width=&quot;900&quot; height=&quot;599&quot; alt=&quot;Image Annotation Plugin&quot; /&gt;
					</code>
					<br><br>
				</li>			
				<li>
					<p><strong><?php esc_html_e( 'Exclude image:', 'demon-image-annotation' ); ?></strong><br/>
					<?php esc_html_e( 'Add an exclude attribute to disable image annotation function.', 'demon-image-annotation' ); ?></p>
					<code>
					&lt;img exclude id=&quot;img-4774005463&quot; src=&quot;http://farm5.static.flickr.com/4121/4774005463_3837b6de44_o.jpg&quot; width=&quot;900&quot; height=&quot;599&quot; alt=&quot;Image Annotation Plugin&quot; /&gt;
					</code>
					<br><br>
				</li>		
				<li>
					<p><strong><?php esc_html_e( 'Comments thumbnail:', 'demon-image-annotation' ); ?></strong><br/>
					<?php esc_html_e( 'To add thumbnails to your comments list manually, just add the php code below in your comment callback function.', 'demon-image-annotation' ); ?></p>
					<code>
					&lt;?php if (function_exists(&#39;dia_thumbnail&#39;)) {
						dia_thumbnail($comment-&gt;comment_ID);
					}?&gt;
					</code>
					<br><br>
				</li>
			</ol>
			<?php dia_metabox_close(); ?>

			<?php dia_metabox_open( esc_html__( 'Other Notes:', 'demon-image-annotation' ), 'id-other-notes', false ); ?>  
			<ol>
				<li><?php esc_html_e( 'There\'s a new method to exlcude image annotation after version 3, but previous version method id="img-exclude" still work.', 'demon-image-annotation' ); ?></li>
				<li><?php esc_html_e( 'Image preview for admin editing is only support version 3 and above, image note added with previous version does not support.', 'demon-image-annotation' ); ?></li>				
			</ol>
			<?php dia_metabox_close(); ?>
		</div>
	</div>
