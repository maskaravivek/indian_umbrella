<?php get_header(); ?>

			<div class="widget-wrap">
				<?php dynamic_sidebar( 'page-sidebar' ); ?>
			</div>
		</div> <!-- .inner-sidebar -->
	</div> <!-- #sidebar -->


	<article id="content" class="wrap">
		
		<!-- If subpages, display on mobile -->
		<div class="sub-pages-mobile">
			<?php if($post->post_parent)
				$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
			else
				$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
				if ($children) { ?>
					<ul class="child-pages">
						<?php echo $children; ?>
					</ul>
			<?php } ?>
		</div> <!-- .sub-pages-mobile -->
		
		<div class="page-content-wrap">
			<?php while ( have_posts() ) : the_post(); ?>
			
				<h1><?php the_title(); ?></h1>

				<?php the_content();
			
			endwhile; ?>
			
			<div id="pagination">
				<?php wp_link_pages(); ?>
			</div>
		</div>
		
		<?php comments_template(); ?>
		
	</article><!-- #content.page -->
	
	
	<!-- mobile sidebar -->
	<div id="sidebar" class="mobile">
		<div class="inner-sidebar">
			<?php dynamic_sidebar( 'page-sidebar' ); ?>
		</div>
	</div> 
	

<?php get_footer(); ?>