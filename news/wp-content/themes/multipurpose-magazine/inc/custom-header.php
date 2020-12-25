<?php
/**
 * @package Multipurpose Magazine
 * @subpackage multipurpose-magazine
 * Setup the WordPress core custom header feature.
 *
 * @uses multipurpose_magazine_header_style()
*/

function multipurpose_magazine_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'multipurpose_magazine_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'multipurpose_magazine_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'multipurpose_magazine_custom_header_setup' );

if ( ! function_exists( 'multipurpose_magazine_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see multipurpose_magazine_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'multipurpose_magazine_header_style' );
function multipurpose_magazine_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$multipurpose_magazine_custom_css = "
        .top-bar{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'multipurpose-magazine-basic-style', $multipurpose_magazine_custom_css );
	endif;
}
endif; //multipurpose_magazine_header_style