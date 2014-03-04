<!DOCTYPE html>
<html dir="ltr" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=2" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

	<title><?php wp_title(); ?></title>
	<?php wp_head(); ?>
	
	
	<!-- Customizing theme color  -->
	<?php $content_text_color = get_option( 'content_text_color' ); ?>
	<style>
		/* link colors */
		a:hover,
		.post .read-more,
		.commentlist .reply a,
		.single-content-wrap a,
		.page-content-wrap a { 
			color: #32beaf;
			color: <?php echo $content_text_color; ?>; 
		}
		
		/* bg colors */
		.menu-button,
		.navigation.posts .mt_load_more, 
		.scroll-to-top, 
		#commentform #submit,
		#drop-down-menu .menu li:hover a,
		#drop-down-menu .menu li:hover .sub-menu li:hover a,
		#drop-down-menu .menu li .sub-menu li .sub-menu li:hover a { 
			background-color: #32beaf; /* default color */
			background-color: <?php echo $content_text_color; ?>; 
		}
		
		/* border colors */
		blockquote,
		#content .post { 
			border-left: #32beaf solid 8px; /* default color */
			border-left: <?php echo $content_text_color; ?> solid 8px;
		}
		
		#comments-wrap { 
			border-top: #32beaf solid 8px; /* default color */
			border-top: <?php echo $content_text_color; ?> solid 8px; 
		}
	</style>

</head>

<body <?php body_class(); ?>>

	<div id="header">
		<a href="#drop-down-menu" class="toggle-target menu-button">
			<span><?php _e( '', 'oslovetheme' ); ?></span> <span class="icon"></span>
		</a>

		<a href="#top-search" class="toggle-target search-button">
			<?php _e( 'search', 'oslovetheme' ); ?>
		</a>
		
		<div id="top-search">
			<?php get_search_form(); ?>
		</div>
	</div>
	
	
	<div id="wrapper">

		<div id="sidebar">
			<div id="drop-down-menu">
				<?php wp_nav_menu(); ?>
			</div>
			
			<div class="inner-sidebar">
				<div class="blog-info">
					<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>">
						<?php bloginfo( 'name' ); ?>
					</a></h1>
					
					<p>"<?php bloginfo( 'description' ); ?>"</p>
					
					<div class="profile-picture-wrap">
						<?php $options = get_option( 'profile_pic_options' ); ?>
						
						<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>">
							<!-- profile image --> <img src="
								<?php if ( '' != $options[ 'profile_image_uploader' ] ) {
									echo $options[ 'profile_image_uploader' ]; 
								} else {
									echo get_template_directory_uri() . '/images/profile-pic.jpg';
								} ?>" 
							class="profile-pic" /> <!-- profile image ends -->
						</a>
					</div>
					
					<div class="social-icons">
						<?php $options = get_option( 'social_links_options' ); ?>

						<?php if ( $options[ 'facebook' ] ) { ?>
							<a href="<?php echo $options[ 'facebook' ]; ?>" class="fb" title="Facebook" target="_blank">Facebook</a>
						<?php } ?>

						<?php if ( $options[ 'twitter' ] ) { ?>
							<a href="<?php echo $options[ 'twitter' ]; ?>" class="tw" title="Twitter" target="_blank">Twitter</a>
						<?php } ?>

						<?php if ( $options[ 'google-plus' ] ) { ?>
							<a href="<?php echo $options[ 'google-plus' ]; ?>" class="gp" title="Google +" target="_blank">Google +</a>
						<?php } ?>

						<?php if ( $options[ 'instagram' ] ) { ?>
							<a href="<?php echo $options[ 'instagram' ]; ?>" class="insta" title="Instagram" target="_blank">Instagram</a>
						<?php } ?>

						<?php if ( $options[ 'rss' ] ) { ?>
							<a href="<?php echo $options[ 'rss' ]; ?>" class="rss" title="RSS" target="_blank">RSS</a>
						<?php } ?>

						<?php if ( $options[ 'linkedin' ] ) { ?>
							<a href="<?php echo $options[ 'linkedin' ]; ?>" class="in" title="LinkedIn" target="_blank">LinkedIn</a>
						<?php } ?>
					</div>
				</div>
