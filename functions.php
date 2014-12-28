<?php
/**
 * indian functions and definitions
 *
 * @package indian
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'indian_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function indian_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on indian, use a find and replace
	 * to change 'indian' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'indian', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	//Style the Tiny MCE editor
	add_editor_style();

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'index-thumb', 150, 150 );

	// This theme uses wp_nav_menu() in one location.	
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'indian' ),
		'social'    => __( 'Social Links Menu', 'indian' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat' ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sorbet_custom_background_args', array(
		'default-color' => '#333333',
		'default-image' => '',
	) ) );

}
endif; // indian_setup
add_action( 'after_setup_theme', 'indian_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function indian_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Header Widget Column 1', 'indian' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Widget Column 2', 'indian' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Widget Column 3', 'indian' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'indian_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function indian_scripts() {
	wp_enqueue_style( 'indian-style', get_stylesheet_uri() );

	wp_enqueue_style( 'indian-roboto' );
	wp_enqueue_style( 'indian-pt-serif' );

	wp_enqueue_style( 'indian-genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );

	wp_enqueue_script( 'indian-init', get_template_directory_uri() . '/js/init.js', array( 'jquery' ), '20120206', true );

	wp_enqueue_script( 'indian-menus', get_template_directory_uri() . '/js/menus.js', array( 'jquery' ), '20120206', true );

	wp_enqueue_script( 'indian-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	/*wp_enqueue_script( 'indian-cookie-control', get_template_directory_uri() . '/js/cookieControl-6.2.min.js', array(), '20130115', true );*/


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'indian-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}


}
add_action( 'wp_enqueue_scripts', 'indian_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Register Google Fonts
 */
function indian_google_fonts() {

	$protocol = is_ssl() ? 'https' : 'http';

	/*	translators: If there are characters in your language that are not supported
		by Source Sans Pro, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'indian' ) ) {

		wp_register_style( 'indian-roboto', "$protocol://fonts.googleapis.com/css?family=Roboto:400,700,400italic,700italic" );

	}	

	/*	translators: If there are characters in your language that are not supported
		by PT Serif, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'PT Serif font: on or off', 'indian' ) ) {

		wp_register_style( 'indian-pt-serif', "$protocol://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic" );

	}
}
add_action( 'init', 'indian_google_fonts' );

/**
 * Enqueue Google Fonts for custom headers
 */
function sorbet_admin_scripts( $hook_suffix ) {

	if ( 'appearance_page_custom-header' != $hook_suffix )
		return;

	wp_enqueue_style( 'indian-roboto' );
	wp_enqueue_style( 'indian-pt-serif' );

}
add_action( 'admin_enqueue_scripts', 'sorbet_admin_scripts' );

/**
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string
 */
function indian_mce_css( $mce_css ) {

	$protocol = is_ssl() ? 'https' : 'http';

	$font = "$protocol://fonts.googleapis.com/css?family=Roboto:300,400,700,300italic,400italic,700italic&subset=latin,latin-ext|Roboto:400,700,400italic,700italic&subset=latin,latin-ext";

	if ( empty( $font ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$font = str_replace( ',', '%2C', $font );
	$font = esc_url_raw( str_replace( '|', '%7C', $font ) );

	return $mce_css . $font;
}
add_filter( 'mce_css', 'indian_mce_css' );


/**
 * Limit number of tags inside widget
 */
function tag_widget_limit($args){
 	//Check if taxonomy option inside widget is set to tags
	if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
		$args['number'] = 20; //Limit number of tags
 	}
 	return $args;
}
/* Register tag cloud filter callback */
add_filter('widget_tag_cloud_args', 'tag_widget_limit');


if ( ! function_exists( 'indian_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Fourteen 1.0
 */
function indian_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default indian attachment size.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'indian_attachment_size', array( 750, 750 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;


//Clean head section: http://wpengineer.com/1438/wordpress-header/

// Remove links to the extra feeds (e.g. category feeds)
remove_action( 'wp_head', 'feed_links_extra', 3 );
// Remove links to the general feeds (e.g. posts and comments)
remove_action( 'wp_head', 'feed_links', 2 );
// Remove link to the RSD service endpoint, EditURI link
remove_action( 'wp_head', 'rsd_link' );
// Remove link to the Windows Live Writer manifest file
remove_action( 'wp_head', 'wlwmanifest_link' );
// Remove index link
remove_action( 'wp_head', 'index_rel_link' );
// Remove prev link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
// Remove start link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
// Display relational links for adjacent posts
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
// Remove XHTML generator showing WP version
remove_action( 'wp_head', 'wp_generator' );
