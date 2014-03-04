<?php get_header(); ?>

			<div class="widget-wrap">
				<?php dynamic_sidebar( 'portfolio-sidebar' ); ?>
			</div>
		</div> <!-- .inner-sidebar -->
	</div> <!-- #sidebar -->


	<article id="content" class="wrap">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
		<div class="post">
			<div class="meta">
				<span><?php the_date( get_option( 'j F Y' )) ?></span>
			</div>
			
			<div class="single-content-wrap">
				
				<h1><?php the_title(); ?></h1>
			
				<?php the_content(); ?>
	
			</div>		
		</div>
		
		<?php endwhile; ?>
		
	</article><!-- #content.page -->
	
	
	<!-- mobile sidebar -->
	<div id="sidebar" class="mobile">
		<div class="inner-sidebar">
			<?php dynamic_sidebar( 'portfolio-sidebar' ); ?>
		</div>
	</div> 
	

<?php get_footer(); ?>