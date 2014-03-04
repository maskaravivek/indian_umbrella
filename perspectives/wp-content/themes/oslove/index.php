<?php get_header(); ?>

			<div class="widget-wrap">
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</div>
		</div> <!-- .inner-sidebar -->
	</div> <!-- #sidebar -->


	<article id="content">
		<?php while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		
		<div class="navigation posts">
			<?php posts_nav_link( ' &mdash; ', __( '&laquo; Previous', 'oslovetheme' ), __( 'Next &raquo;', 'oslovetheme' ) ); ?>
		</div>
	</article><!-- #content -->
	
	
	<!-- mobile sidebar -->
	<div id="sidebar" class="mobile">
		<div class="inner-sidebar">
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</div>
	</div> 

<?php get_footer(); ?>
