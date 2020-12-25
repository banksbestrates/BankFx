<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package MagazineBook
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function magazinebook_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	if ( get_theme_mod( 'magazinebook_site_layout', 'boxed' ) === 'boxed' ) {
		$classes[] = 'theme-boxed-layout';
	}

	if ( get_theme_mod( 'magazinebook_enable_sticky_menu', false ) ) {
		$classes[] = 'theme-sticky-menu';
	}

	if ( get_theme_mod( 'magazinebook_base_color_skin', 'light' ) === 'dark' ) {
		$classes[] = 'theme-dark-skin';
	}

	return $classes;
}
add_filter( 'body_class', 'magazinebook_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function magazinebook_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'magazinebook_pingback_header' );

/**
 * Sets the post excerpt length to 40 words.
 *
 * @param  mixed $length Excerpt length.
 * @return number
 */
function magazinebook_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'magazinebook_excerpt_length' );
