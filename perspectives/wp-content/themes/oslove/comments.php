<?php
/**
 * Template for displaying Comments.
 */ 


/*
 * Show pre comments navigation
 */
function oslovetheme_comments_navigation( $id = '' ) {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>

		<nav role="navigation" id="<?php echo $id; ?>" class="site-navigation comment-navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'oslovetheme' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'oslovetheme' ) ); ?></div>
		</nav><!-- #comment-nav-<?php echo $id; ?> .site-navigation .comment-navigation -->

	<?php }
}
/*
 * Bail out now if the user needs to enter a password
 */
if ( post_password_required() )
	return;



/*
 * If comments are closed, then leave a notice
 */
if ( comments_open() ) : ?>

<div id="comments-wrap">
	<div class="comments-inner-wrap">
		
			<div id="comments" class="comments-area">					
				<?php oslovetheme_comments_navigation( 'comment-nav-above' ); ?>

					<ol class="commentlist"><?php wp_list_comments(); ?></ol><!-- .commentlist -->

				<?php oslovetheme_comments_navigation( 'comment-nav-below' ); ?>
			</div><!-- #comments .comments-area -->
	
			<?php comment_form(); ?>

	</div><!-- #comments-wrap -->
</div><!-- .comments-inner-wrap -->

<?php else : // comments are closed ?>

<div id="comments-wrap" class="comments-off">
	<div class="comments-inner-wrap">
		
		<?php _e ( 'Comments are closed.', 'oslovetheme' ) ?>
   
	</div><!-- #comments-wrap -->
</div><!-- .comments-inner-wrap -->

<?php endif;
