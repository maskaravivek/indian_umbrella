<?php get_header(); ?>

			<div class="widget-wrap">
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</div>
		</div> <!-- .inner-sidebar -->
	</div> <!-- #sidebar -->

	<article id="content">	
		<?php if (have_posts() ) :  ?>
		
			<h2 class="top">&mdash; <?php _e( 'Search results for:', 'oslovetheme' ); ?> <em><?php the_search_query(); ?></em></h2>
			
		<?php while ( have_posts() ) : the_post(); ?>
			
			<div class="post">
				<div class="content-wrap">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<?php if ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'post-image' ); ?>
						</a>

						<div class="post-content-wrap">
							<?php the_excerpt(); ?>
						</div>
					<?php } 
					else { ?>
							<?php the_excerpt(); ?>
					<?php } ?>
				</div>

				<div class="meta"></div>
			</div>
		
		<?php endwhile; ?>

			<div id="pagination">
				<?php posts_nav_link( ' &mdash; ', __( '&laquo; Previous', 'oslovetheme' ), __( 'Next &raquo;', 'oslovetheme' ) ); ?>
			</div>
			
			
		<?php else: ?>
			
			<div class="post">
				<div class="content-wrap">
					<h1><?php _e( 'No results', 'oslovetheme' ); ?></h1>
					
					<?php _e( 'Sorry no search results found on', 'oslovetheme' ); ?> <em><strong><?php the_search_query(); ?></strong></em>.
					<br>
					<?php _e( 'Please try again with a different word:', 'oslovetheme' ); ?>
					
					<?php get_search_form(); ?>
				</div>
			</div>
			
		<?php endif; ?>
	</article><!-- #content -->
	
	
	<!-- mobile sidebar -->
	<div id="sidebar" class="mobile">
		<div class="inner-sidebar">
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</div>
	</div> 
	

<?php get_footer(); ?>