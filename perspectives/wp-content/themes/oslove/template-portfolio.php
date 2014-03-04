<?php 
/*
Template Name: Portfolio
*/
get_header(); ?>

			<div class="widget-wrap">
				<?php dynamic_sidebar( 'portfolio-sidebar' ); ?>
			</div>
		</div> <!-- .inner-sidebar -->
	</div> <!-- #sidebar -->


	<article id="content" class="wrap">
		
		<div class="portfolio">
			<?php while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
			<?php endwhile; ?>
			
			<?php $args = array( 'posts_per_page' => -1, 'order'=> 'ASC', 'post_type' => 'work' );
			$postslist = get_posts( $args );
			foreach ($postslist as $post) :  setup_postdata($post); ?>
			
				<div class="project">
					<span><?php the_title(); ?></span>
					
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'portfolio-image' ); ?>
					</a>
				</div>
				
			<?php endforeach; ?>
		</div><!-- .portfolio -->
		
		<?php comments_template(); ?>

	</article><!-- #content.page -->
	
	
	<!-- mobile sidebar -->
	<div id="sidebar" class="mobile">
		<div class="inner-sidebar">
			<?php dynamic_sidebar( 'portfolio-sidebar' ); ?>
		</div>
	</div> 
	

<?php get_footer(); ?>
