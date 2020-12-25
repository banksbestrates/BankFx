<?php
/**
 * Miscellaneous functions
 *
 * @package nirmala
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter( 'widget_tag_cloud_args', 'nirmala_tag_cloud_font_sizes' );
function nirmala_tag_cloud_font_sizes( array $args ) {
    $args['smallest'] = '.875';
    $args['largest'] = '.875';
    $args['unit'] = 'rem';
    $args['separator'] = '';
    return $args;
}

add_filter( 'wp_generate_tag_cloud', 'nirmala_add_class_tag_cloud', 10, 1 );
function nirmala_add_class_tag_cloud( $string ) {
   return str_replace( 'class="tag-cloud-link', 'class="btn btn-outline-dark mr-1 mb-6px p-1 tag-cloud-link', $string );
}

add_filter( "the_excerpt", "nirmala_add_class_to_excerpt" );
function nirmala_add_class_to_excerpt( $excerpt ) {
    return str_replace( '<p', '<p class="mb-2"', $excerpt );
}

if ( ! function_exists( 'nirmala_edit_link' ) ) :
/**
 * Returns an accessibility-friendly link to edit a post or page or attachment
 */
function nirmala_edit_link() {
	$link = edit_post_link(
		sprintf(
			/* translators: %s: Name of current page */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'nirmala' ),
			get_the_title()
		),
		'<footer class="entry-footer mt-3 pt-12px pb-12px border-top small"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ',
		'</footer>'
	);
	return $link;
}
endif;
