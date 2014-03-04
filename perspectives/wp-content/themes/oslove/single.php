<?php get_header(); ?>

			<div class="widget-wrap">
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</div>
		</div> <!-- .inner-sidebar -->
	</div> <!-- #sidebar -->


	<article id="content" class="wrap">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="meta">
				<span><?php the_date( get_option( 'j F Y' )) ?></span>
				
				<span class="cat-wrap">
					<?php $categories = get_the_category();
					$separator = ' &bull; ';
					$output = '';
					if($categories){
						foreach($categories as $category) {
							$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", "oslovetheme" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
						}
					echo trim($output, $separator);
					} ?>
				</span>
			</div>
			
			<div class="single-content-wrap">
				<h1><?php the_title(); ?></h1>
				
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'large-post-image' );
				}

				the_content(); ?>
				
				<div class="tags">
					<?php the_tags('#', ' #', ''); ?>
				</div>
			</div>		
		</div>
		
		<?php endwhile; ?>
		
		<?php comments_template(); ?>
		
	</article><!-- #content.page -->
	
	
	<!-- mobile sidebar -->
	<div id="sidebar" class="mobile">
		<div class="inner-sidebar">
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</div>
	</div> 
	

<?php get_footer(); ?>
