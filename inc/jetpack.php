<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package indian
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function indian_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'main',
		'footer'         => 'content',
		'type'           => 'scroll',
	) );

}
add_action( 'after_setup_theme', 'indian_jetpack_setup' );

