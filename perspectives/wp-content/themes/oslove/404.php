<?php get_header(); ?>

		</div> <!-- .inner-sidebar -->
	</div> <!-- #sidebar -->


	<article id="content" class="wrap">
		<div class="page-content-wrap">
			
			<h1>Oops!</h1>
				
			<h2>
				<?php _e( 'Sorry, but the page you requested cannot be found. Try checking the URL for errors or start again from the ', 'oslovetheme'); ?>
				<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php _e( 'home page', 'oslovetheme'); ?></a>.
			</h2>
			
		</div>
	</article><!-- #content.page -->

<?php get_footer(); ?>