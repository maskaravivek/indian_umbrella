<?php
/**
 * The default template for displaying content. Used for both single and index/archive/category/tag.
 *
 * @package WordPress
 */
?>

<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
	
	<div class="content-wrap">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'post-image' ); ?>
			</a>
			
			<div class="post-content-wrap">
				<?php the_excerpt(); ?>
				<div class="tags">
					<?php the_tags('#', ' #', ''); ?>
				</div>
			</div>
		<?php } 
		else { ?>
				<?php the_excerpt(); ?>
				<div class="tags">
					<?php the_tags('#', ' #', ''); ?>
				</div>
		<?php } ?>
	</div>
	
	<div class="meta">
		<span><a href="<?php the_permalink(); ?>"><?php the_date( get_option( 'j F Y' )) ?></a></span>
		
		<span class="comment-number">
			 <a href="<?php the_permalink(); ?>"><?php comments_popup_link( __( '0 Comments', 'oslovetheme' ), __( '1 Comment', 'oslovetheme' ), __( '% Comments', 'oslovetheme' ) ); ?></a>
		</span>
		
		<span class="cat-wrap">
			<?php the_category( ' &bull; ' ) ?> 
		</span>
	</div>
	
</div> <!-- post_class -->
