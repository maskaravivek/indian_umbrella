<?php
/**
 * Theme setup
 *
 */
add_action( 'after_setup_theme', 'oslovetheme_theme_setup' );

function oslovetheme_theme_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'automatic-feed-links' );
	
	load_theme_textdomain( 'oslovetheme', get_template_directory() . '/languages/' );
	
	if ( ! isset( $content_width ) ) $content_width = 733;
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	
	register_sidebar(array(
		'name' => 'Sidebar Area',
		'id' => 'sidebar',
		'description'   => __( 'Widget area for blog', 'oslovetheme' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		)
	);
	register_sidebar(array(
		'name' => 'Page Sidebar Area',
		'id' => 'page-sidebar',
		'description'   => __( 'Widget area for pages', 'oslovetheme' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		)
	);
	register_sidebar(array(
		'name' => 'Portfolio Sidebar Area',
		'id' => 'portfolio-sidebar',
		'description'   => __( 'Widget area for custom post type Portfolio', 'oslovetheme' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		)
	);
}



/**
 * Editor style
 * 
 */
function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );



/**
 * Loading scripts
 * 
 */
add_action( 'wp_enqueue_scripts', 'add_oslovetheme_scripts' );

function add_oslovetheme_scripts() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );
	
	//Load "load more" script
		global $wp_query;
		$max = $wp_query->max_num_pages;
 		$paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
		wp_enqueue_script( 'metronet-load-more', get_template_directory_uri() . '/js/loadmore.js', array( 'jquery' ), '20130624', true );
		wp_localize_script( 'metronet-load-more', 'mt_load_more', array(
			'current_page' => esc_js( $paged ),
			'max_pages' => esc_js( $max ),
			'ajaxurl' => esc_js( admin_url( 'admin-ajax.php' ) ),
			'main_text' => esc_js( __( 'Load more posts', 'oslovetheme' ) ),
			'loading_img' => esc_js( get_template_directory_uri() . '/images/ajax-loader.gif' )
		) );
}




/**
 * Custom background image
 *
 */
$args = array(
	'default-color' => 'ccc',
	'default-image' => get_template_directory_uri() . '/images/bg-pattern.png',
);
add_theme_support( 'custom-background', $args );




/**
 * Featured image sizes
 *
 */
add_action('init', 'oslovetheme_image_sizes');

function oslovetheme_image_sizes() {
	add_image_size( 'post-image', 150, 150, true );
	add_image_size( 'large-post-image', 733, 300, false );
	add_image_size( 'portfolio-image', 183, 183, true );
}




/**
 * Excerpt length and read more link
 * 
 */
function custom_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {
       global $post;
	return ' [...] <a href="'. get_permalink($post->ID) . '" class="read-more">'. __( 'Read more', 'oslovetheme' ) . ' &raquo;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');




 /**
 * All custom post types and taxonomies
 * 
 */
add_action( 'init', 'oslovetheme_custom_posts_taxonomies' );

function oslovetheme_custom_posts_taxonomies() {
	
	// Custom post types
	register_post_type( 'work', array(
		'label'			  => 'Portfolio',
		'public'		  => true,
		'has_archive'	  => true,
		'capability_type' => 'post',
		'menu_position'   => 4,
		'supports'		  => array(
				'title',
				'editor',
				'thumbnail'
			)
	));
}



/**
 * Ajax for loading more posts
 * 
 */
 add_action( 'wp_ajax_load_posts', 'oslovetheme_ajax_load_posts' );
 add_action( 'wp_ajax_nopriv_load_posts', 'oslovetheme_ajax_load_posts' );
 function oslovetheme_ajax_load_posts() {
 	$next_page = absint( $_POST[ 'next_page' ] );
 	
 	global $wp_query;
 	$wp_query = new WP_Query( array(
 		'paged' => $next_page,
 		'meta_query', array(
			array(
				'key' => 'exclude_from_homepage',
				'value' => 'false',
				'compare' => '='
			),
			array(
				'key' => 'exclude_from_homepage',
				'value' => '',
				'compare' => 'NOT EXISTS'
			),
			'relation' => 'OR'
		)
 	) );
 	ob_start();
 	global $post;
 	while( $wp_query->have_posts() ) {
 		$wp_query->the_post();
 		get_template_part( 'content', get_post_format() );
 	};
 	$html = ob_get_clean();
 	
 	$return_array = array(
 		'next_page' => $next_page + 1,
 		'max_pages' => $wp_query->max_num_pages,
 		'html' => $html
 	);
 	//return
 	die( json_encode( $return_array ) );
 } //end oslovetheme_ajax_load_posts
 
 /**
 * post_class doesn't include the 'post' class for ajax requests - Adding it back in
 * 
 */
add_filter( 'post_class', 'oslovetheme_post_class', 10, 3 );
function oslovetheme_post_class( $classes, $class, $post_id ) {
	if ( defined( 'DOING_AJAX' ) && 'post' == get_post_type( $post_id ) ) {
		$classes[] = 'post';
	}
	return $classes;
} //end oslovetheme_post_class




/*
 * Register new theme customiser functionality
 *
 */
function profile_pic_customisation( $wp_customize ) {
    /*
     * Add new section
     */
    $wp_customize->add_section(
        'image_new_section',
        array(
            'title'    => __( 'Profile picture', 'slug' ),
            'priority' => 50,
        )
    );
    /*
     * Image uploader
     */
    $wp_customize->add_setting(
        'profile_pic_options[profile_image_uploader]', array(
            'capability' => 'edit_theme_options',
            'default'    => get_template_directory_uri() . '/images/profile-pic.jpg',
            'type'       => 'option',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'profile_image_uploader',
            array(
                'label'          => __( 'Upload a square image for best results', 'slug' ),
                'section'        => 'image_new_section',
                'settings'       => 'profile_pic_options[profile_image_uploader]',
            )
        )
    );
}
add_action( 'customize_register', 'profile_pic_customisation' );







/**
 * Adding "Social links" to appearance menu
 */
function social_options_init(){
	register_setting( 'social_options', 'social_links_options', 'social_options_validate' );
}
add_action( 'admin_init', 'social_options_init' );
/**
 * Adding page for social links
 */
function register_social_custom_submenu_page() {  
    add_theme_page(
        __( 'Social links', 'oslovetheme' ), 
		__( 'Social links', 'oslovetheme' ),
		'manage_options',   
        'social_custom_submenu_page',
		'social_custom_submenu_page_callback'
	); 
}
add_action( "admin_menu", "register_social_custom_submenu_page" );

function social_custom_submenu_page_callback() { ?>
	<div class="wrap">  
        <?php screen_icon('themes'); ?> <h2><?php _e( 'Social links', 'oslovetheme' ) ?></h2>
		
		 <form method="post" action="options.php">
			<?php $options = get_option( 'social_links_options' ); ?>
			<?php settings_fields( 'social_options' ); ?>
            <table class="form-table">				
                <tr>
                    <th>  
                        <label for="facebook">  
                            Facebook:  
                        </label>   
                    </th>  
                    <td>  
                        <input type="text" name="social_links_options[facebook]" id="facebook" value="<?php esc_attr_e( $options['facebook'] ); ?>" size="45" /> 
                    </td>  
                </tr>
				
				<tr>
                    <th>  
                        <label for="twitter">  
                            Twitter:  
                        </label>   
                    </th>  
                    <td>  
                        <input type="text" name="social_links_options[twitter]" id="twitter" value="<?php esc_attr_e( $options['twitter'] ); ?>" size="45" />  
                    </td>  
                </tr>
				
				<tr>
                    <th>  
                        <label for="google-plus">  
                            Google+:  
                        </label>   
                    </th>  
                    <td>  
                        <input type="text" name="social_links_options[google-plus]" id="google-plus" value="<?php esc_attr_e( $options['google-plus'] ); ?>" size="45" />  
                    </td>  
                </tr> 
				
				<tr>
                    <th>  
                        <label for="instagram">  
                            Instagram:  
                        </label>   
                    </th>  
                    <td>  
                        <input type="text" name="social_links_options[instagram]" id="instagram" value="<?php esc_attr_e( $options['instagram'] ); ?>" size="45" />  
                    </td>  
                </tr> 
				
				<tr>
                    <th>  
                        <label for="rss">  
                            RSS:  
                        </label>   
                    </th>  
                    <td>  
                        <input type="text" name="social_links_options[rss]" id="rss" value="<?php esc_attr_e( $options['rss'] ); ?>" size="45" />  
                    </td>  
                </tr> 
				
				<tr>
                    <th>  
                        <label for="linkedin">  
                            LinkedIn:  
                        </label>   
                    </th>  
                    <td>  
                        <input type="text" name="social_links_options[linkedin]" id="linkedin" value="<?php esc_attr_e( $options['linkedin'] ); ?>" size="45" />  
                    </td>  
                </tr> 
				
				<tr>
					<td>
						<p class="submit">
							<input name='submit' type='submit' id='submit' class='button-primary' value='<?php _e( 'Save Changes', 'oslovetheme' ) ?>' />
						</p>
					</td>
				</tr>
            </table>  
        </form>
	</div>
<?php }

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function social_options_validate( $input ) {

	// Say our text option must be safe text with no HTML tags
	$output['facebook'] =  esc_url( $input['facebook'] );
	$output['twitter'] =  esc_url( $input['twitter'] );
	$output['google-plus'] =  esc_url( $input['google-plus'] );
	$output['instagram'] =  esc_url( $input['instagram'] );
	$output['rss'] =  esc_url( $input['rss'] );
	$output['linkedin'] =  esc_url( $input['linkedin'] );
	
	return $output;
}





/**
 * Custom colors
 */
add_action( 'customize_register', 'oslovetheme_customize_register' );
function oslovetheme_customize_register($wp_customize)
{
  $colors = array();
  $colors[] = array( 'slug' => 'content_text_color', 'default' => '#32beaf', 'label' => __( 'Theme Color', 'oslovetheme' ) );

  foreach($colors as $color)
  {
    // SETTINGS
    $wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options' ));

    // CONTROLS
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'colors', 'settings' => $color['slug'] )));
  }
}