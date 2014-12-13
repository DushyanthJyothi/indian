<?php
/**
 * @package Indian
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses indian_header_style()
 * @uses indian_admin_header_style()
 * @uses indian_admin_header_image()
 *
 * @package Indian
 */
function indian_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'indian_custom_header_args', array(
		'default-image'          => get_stylesheet_directory_uri() . '/images/theme_header.jpg',
		'default-text-color'     => '#333333',
		'width'                  => 80,
		'height'                 => 80,
		'flex-height'            => false,
		'flex-width'             => false,
		'wp-head-callback'       => 'indian_header_style',
		'admin-head-callback'    => 'indian_admin_header_style',
		'admin-preview-callback' => 'indian_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'indian_custom_header_setup' );

if ( ! function_exists( 'indian_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see indian_custom_header_setup().
 */
function indian_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // indian_header_style

if ( ! function_exists( 'indian_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see indian_custom_header_setup().
 */

function indian_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			background: #242d36;
			border: none;
			max-width: 1100px;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
			font-family: "PT Serif", Georgia, Times, serif;
			font-size: 23px;
			font-style: normal;
			font-weight: 300;
			line-height: 26.999977111816406px;
			margin: 0;
		}
		#headimg h1 a {
			text-decoration: none;
		}
		#desc {
			font-family: "Source Sans Pro", Helvetica, Arial, sans-serif;
			font-size: 15px;
			font-style: normal;
			font-weight: 300;
			line-height: 26.99989128112793px;
			margin: 0;
		}
		#headimg img {
			max-height: 200px;
		}
		.site-branding {
			max-width: 33%;
			padding: 29.7px;
		}
	</style>
<?php
}
endif; // indian_admin_header_style


if ( ! function_exists( 'indian_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see indian_custom_header_setup().
 */
function indian_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
			<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
		<div class="site-branding">
			<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		</div>
	</div>
<?php
}
endif; // indian_admin_header_image
