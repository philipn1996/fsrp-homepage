<?php if ( post_password_required() ) {
				return;
			}
			?>
		<div class="comments">
			
			<?php
			comments_template();	
			if ( true ) : ?>
				
				<h2 class="comments-title">
					<?php
						$comments_number = get_comments_number();
						echo "$comments_number";
						if($comments_number==1) echo " Kommentar";
						else echo " Kommentare";
						echo " zu ". get_the_title() ;
					?>
				</h2>

				<?php the_comments_navigation(); ?>

				<ol class="comment-list">
					<?php
						wp_list_comments( array(
							'style'       => 'ol',
							'short_ping'  => true,
							'avatar_size' => 42,
						) );
					?>
				</ol>

				<?php the_comments_navigation(); ?>

			<?php endif; // Check for have_comments(). ?>

			<?php
				if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
			?>
				<p class="no-comments"><?php echo "Kommentare sind geschlossen."; ?></p>
			<?php endif; ?>

			<?php
				comment_form( array(
					'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
					'title_reply_after'  => '</h4>',
				) );
			?>

		</div>
