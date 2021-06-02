<?php
/**
 * Comment.
 *
 * @package View.
 */

?>
<div class="comments-wrapper">

	<div class="comments-header" id="comment">
		<h2 class="comment-reply-title">
			<?php if ( have_comments() ) : ?>
				<?php comments_number(); ?>
				replies on
				"<?php the_title(); ?>"
			<?php else : ?>
				Not comments
			<?php endif; ?>
		</h2><!-- .comments-title -->

	</div><!-- .comments-header -->

	<?php
		wp_list_comments(
			array(
				'avatar_size' => 120,
				'style'       => 'div',
			)
		);

		if ( comments_open() ) {
			comment_form(
				array(
					'class_form'         => 'comments-wrapper',
					'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
					'title_reply_after'  => '</h2>',
				)
			);
		}
		?>


</div>
