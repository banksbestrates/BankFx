<?php
/**
 * Nirmala enqueue scripts
 *
 * @package nirmala
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'nirmala_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function nirmala_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'nirmala-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'nirmala-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'nirmala_scripts' ).

add_action( 'wp_enqueue_scripts', 'nirmala_scripts' );
