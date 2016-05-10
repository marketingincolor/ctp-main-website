<?php
/**
 * ZFWP Base Theme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 */
if ( ! function_exists( 'theme_setup' ) ) :
	/**
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 */
	function theme_setup() {
		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );
		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 590, 260 );
		add_image_size( 'news-thumb', 98, 98, true );
		add_image_size( 'side-thumb', 86, 86, true );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary'   =>  'Header menu',
			'secondary' => 'Footer menu'
		) );
		//Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );
		//Enable support for Post Formats. See http://codex.wordpress.org/Post_Formats
		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
		) );
		//Creating custom theme settings
		require get_template_directory() . '/includes/custom-settings.php';
	}
endif;

add_action( 'after_setup_theme', 'theme_setup' );

require get_template_directory() . '/includes/foundation-wp-navwalker.php';

//Initialize and Register sidebars for theme
function theme_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Primary Sidebar', 'zfwpbase' ),
		'id' => 'sidebar-1',
		'description' => __( 'Main sidebar content for site', 'zfwpbase' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __('Secondary Sidebar', 'zfwpbase' ),
		'id' => 'sidebar-2',
		'description' => __( 'Alternate sidebar content for site', 'zfwpbase' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __('Tertiary Sidebar', 'zfwpbase' ),
		'id' => 'sidebar-3',
		'description' => __( 'Alternate sidebar content for site', 'zfwpbase' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __( 'Footer One', 'zfwpbase' ),
		'id' => 'sidebar-4',
		'description' => __( 'Footer area content for site', 'zfwpbase' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __( 'Footer Two', 'zfwpbase' ),
		'id' => 'sidebar-5',
		'description' => __( 'Footer area content for site', 'zfwpbase' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __( 'Footer Three', 'zfwpbase' ),
		'id' => 'sidebar-6',
		'description' => __( 'Footer area content for site', 'zfwpbase' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
}
add_action( 'widgets_init', 'theme_widgets_init' );
// Enqueue scripts and functions specific for theme
//function theme_scripts () {
//	wp_enqueue_script( 'devtheme-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20140319', true );
//}
//add_action( 'wp_enqueue_scripts', 'theme_scripts' );

//Create custom display for Company Address
function display_co_address() {
	$custom_option = get_option('custom_option_name');
	echo $custom_option['ad_info'];
}
add_action( 'co_address', 'display_co_address', 10);

//Create custom display for Company Phone Number
function display_co_phone() {
	$custom_option = get_option('custom_option_name');
	echo $custom_option['ph_info'];
}
add_action( 'co_phone', 'display_co_phone', 10);

//Create custom display for Company Email
function display_co_email() {
	$custom_option = get_option('custom_option_name');
	echo $custom_option['em_info'];
}
add_action( 'co_email', 'display_co_email', 10);


//Create custom display for Company Phone Number Call To Action using 'hdr' or 'ftr' for location on page.
function display_cta_phone( $page_location ){
	$location = ($page_location == 'footer' ? 'ftr' : 'hdr');
	$custom_option = get_option('custom_option_name');
	$location_phone = $custom_option['ph_info'];
	echo '<div class="cta-phone">';
	echo '<a href="tel://'.$location_phone.'"><h3><img src="'. get_template_directory_uri(). '/img/tbw-grfx-'.$location.'-ico-pho.png">&nbsp;'.$location_phone.'</h3></a>';
	echo '</div>';
}
add_action( 'cta_phone', 'display_cta_phone', 10, 1 );

//Create custom display for Social Media icons as grouped set.
function display_social_media_icons( $page_location ){
	$custom_option = get_option('custom_option_name');
	$location = ($page_location == 'header' ? 'hdr' : 'ftr');
	echo '<div class="social-icons-'.$page_location.'">';
	if ($custom_option['fb_link']) :
		echo '&nbsp;<a href="'.$custom_option['fb_link'].'" target="_blank"><img src="'. get_template_directory_uri(). '/img/tbw-grfx-'.$location.'-ico-fb.png"></a>&nbsp;';
	endif;
	if ($custom_option['tw_link']) :
		echo '&nbsp;<a href="'.$custom_option['tw_link'].'" target="_blank"><img src="'. get_template_directory_uri(). '/img/tbw-grfx-'.$location.'-ico-tw.png"></a>&nbsp;';
	endif;
	echo '&nbsp;<a href="'. site_url('/feed'). '" target="_blank"><img src="'. get_template_directory_uri(). '/img/tbw-grfx-'.$location.'-ico-rss.png"></a>&nbsp;';
	echo '</div>';
}
add_action( 'social_icons', 'display_social_media_icons', 10, 1 );

// [ctajoinform location="side"] , side is default, body is option
function sc_application_cta( $atts ) {
	$join = shortcode_atts( array('location' => 'side'), $atts );
	$location = ( $join['location'] );
	$output = '<a href="'.site_url().'/business-watch-application">';
	$output .= '<img src="'. get_template_directory_uri().'/img/tbw-grfx-'.$location.'-signup-btn.png">';
	$output .= '</a>';
	return $output;
}
add_shortcode('ctajoinform', 'sc_application_cta');

// [ctareferform location="side"] , side is default, body is option
function sc_refer_cta( $atts ) {
	$join = shortcode_atts( array('location' => 'side'), $atts );
	$location = ( $join['location'] );
	$output = '<a href="'.site_url().'/refer-a-business">';
	$output .= '<img src="'. get_template_directory_uri().'/img/tbw-grfx-'.$location.'-refer-btn.png">';
	$output .= '</a>';
	return $output;
}
add_shortcode('ctareferform', 'sc_refer_cta');

//Excerpt Adjustments
add_post_type_support( 'page', 'excerpt');
// Alter length of the Excerpt.
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Alter the more of the Excerpt.
function custom_excerpt_more( $more ) {
	return '<a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( ' Read More <span class="txt-large">&rsaquo;</span>', 'fwp-base' ) . '</a>';
	//return '';
}
add_filter('excerpt_more', 'custom_excerpt_more');

//Adjustable Excerpt length, using echo custom_length_excerpt(xx);
function custom_length_excerpt($limit) {
	return wp_trim_words(get_the_excerpt(), $limit, '<a href="'. esc_url( get_permalink() ) . '">' . __( ' Read More <span class="txt-large">&rsaquo;</span>', 'fwp-base' ) . '</a>');
}





//Enable Shortcodes in Widgets
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode', 11);

//Change Howdy Text
function change_howdy_text_toolbar($wp_admin_bar) {
	$get_greetings = $wp_admin_bar->get_node('my-account');
	$rpc_title = str_replace('Howdy','Welcome',$get_greetings->title);
	$wp_admin_bar->add_node(array("id"=>"my-account","title"=>$rpc_title));
}
add_filter('admin_bar_menu','change_howdy_text_toolbar');

//Get ID based on Slug
function get_id_by_slug($page_slug) {
	$find_page = get_page_by_path($page_slug);
	if ($find_page) {
		return $find_page->ID;
	} else {
		return null;
	}
}

//Check if post is in a menu
function is_in_menu( $menu = null, $object_id = null ) {
	$menu_object = wp_get_nav_menu_items( esc_attr( $menu ) );
	if( ! $menu_object )
		return false;
	$menu_items = wp_list_pluck( $menu_object, 'object_id' );
	if( !$object_id ) {
		global $post;
		$object_id = get_queried_object_id();
	}
	return in_array( (int) $object_id, $menu_items );
}

/**
 * Add Read More link to Display Posts Shortcode plugin
 * @author Bill Erickson
 * @link http://wordpress.org/extend/plugins/display-posts-shortcode/
 *
 * @param string $output the original markup for an individual post
 * @param array $atts all the attributes passed to the shortcode
 * @param string $image the image part of the output
 * @param string $title the title part of the output
 * @param string $date the date part of the output
 * @param string $excerpt the excerpt part of the output
 * @param string $inner_wrapper what html element to wrap each post in (default is li)
 * @return string $output the modified markup for an individual post
 */

add_filter( 'display_posts_shortcode_output', 'be_display_posts_read_more', 10, 9 );
function be_display_posts_read_more( $output, $atts, $image, $title, $date, $excerpt, $inner_wrapper, $content, $class ) {
	// First check if an excerpt is included by looking at the shortcode $atts
	if ( $atts['include_excerpt'] )
		// Now let's rebuild the excerpt to include read more
		$excerpt = '<span class="excerpt">' . get_the_excerpt() . '<br /><a class="more-link" href="' . get_permalink() . '">Read More <span class="txt-large">&rsaquo;</span></a></span>';
	else $excerpt = '';
	// Now let's rebuild the output. Only the excerpt changed so we're using the original $image, $title, and $date
	$output = '<' . $inner_wrapper . ' class="' . implode( ' ', $class ) . '">' . $image . $title . $date . $excerpt . $content . '</' . $inner_wrapper . '>';
	// Finally we'll return the modified output
	return $output;
}

/*function limit_on_category( $query ) {
	if ( !is_admin() && $query->is_category( 'news')  ) {
		$query->set( 'posts_per_page', '3' );
	}
}
add_action( 'pre_get_posts', 'limit_on_category' );*/