<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Indian
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-header-image-wrapper">
			<?php if ( get_header_image() ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
			</a>
			<?php endif; // End header image check. ?>
		</div>
		<div class="site-header-branding-wrapper">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>
		<div class="site-header-nav-wrapper">
			<div id="header-main-toggle" class="header-main-toggle-spinner" title="Toggle Menu Options"><div class="header-main-toggle-spinner-bouncer1 animation"></div><div class="header-main-toggle-spinner-bouncer2 animation"></div><div class="header-main-toggle-spinner-bouncer3 animation"></div></div>
			<div id="header-toggles" class="toggles">
				<div id="menu-toggle" class="toggle" title="<?php esc_attr_e( 'Menu', 'indian' ); ?>"><span class="screen-reader-text"><?php _e( 'Menu', 'indian' ); ?></span></div>
				<div id="sidebar-toggle" class="toggle" title="<?php esc_attr_e( 'Widgets', 'indian' ); ?>"><span class="screen-reader-text"><?php _e( 'Widgets', 'indian' ); ?></span></div>
				<div id="search-toggle" class="toggle" title="<?php esc_attr_e( 'Search', 'indian' ); ?>"><span class="screen-reader-text"><?php _e( 'Search', 'indian' ); ?></span></div>
				<?php if ( has_nav_menu( 'social' ) ) : ?>
					<div id="social-links-toggle" class="toggle" title="<?php esc_attr_e( 'Social Links', 'indian' ); ?>"><span class="screen-reader-text"><?php _e( 'Social Links', 'indian' ); ?></span></div>
				<?php endif; ?>
			</div><!-- #toggles  -->
			<div id="toggle-nav-panels" class="panels">
				<div id="menu-toggle-nav" class="panel">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>

				<?php get_sidebar( 'header' ); ?>

				<div id="search-toggle-nav" class="panel">
					<div class="search-wrapper">
						<?php get_search_form(); ?>
					</div>
				</div>

				<?php if ( has_nav_menu( 'social' ) ) : ?>
					<div id="social-links-toggle-nav" class="panel">
						<?php wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links', ) ); ?>
					</div>
				<?php endif; ?>
			</div><!-- #toggle-nav-panels  -->

		</div><!-- #site-header-menu-wrapper -->
	</header><!-- #masthead -->
<div id="content" class="site-content">