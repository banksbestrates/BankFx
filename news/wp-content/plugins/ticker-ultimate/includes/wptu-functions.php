<?php
/**
 * Plugin generic functions file
 *
 * @package Ticker Ultimate
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Function to get post external link or permalink
 * 
 * @package Ticker Ultimate
 * @since 1.0.0
 */
function wptu_get_post_link( $post_id = '' ) {

	$post_link = '';

	if( !empty($post_id) ) {

		$prefix = WPTU_META_PREFIX;
		
		$post_link = get_post_meta( $post_id, $prefix.'more_link', true );
		
		if( empty($post_link) && (get_post_type($post_id) != WPTU_POST_TYPE) ) {
			$post_link = get_the_permalink( $post_id );	
		}		
	}
	return $post_link;
}

/**
 * Function to unique number value
 * 
 * @package Ticker Ultimate
 * @since 1.0.0
 */
function wptu_get_unique() {
  static $unique = 0;
  $unique++;

  return $unique;
}

/**
 * Escape Tags & Slashes
 *
 * Handles escapping the slashes and tags
 *
 * @package Ticker Ultimate
 * @since 1.0.0
 */
function wptu_esc_attr($data) {
	return esc_attr( stripslashes($data) );
}

/**
 * Strip Slashes From Array
 *
 * @package Ticker Ultimate
 * @since 1.0.0
 */
function wptu_slashes_deep($data = array(), $flag = false) {
	
	if($flag != true) {
		$data = wptu_nohtml_kses($data);
	}
	$data = stripslashes_deep($data);
	return $data;
}

/**
 * Strip Html Tags 
 * 
 * It will sanitize text input (strip html tags, and escape characters)
 * 
 * @package Ticker Ultimate
 * @since 1.0.0
 */
function wptu_nohtml_kses($data = array()) {
	
	if ( is_array($data) ) {
		
		$data = array_map('wptu_nohtml_kses', $data);
		
	} elseif ( is_string( $data ) ) {
		$data = trim( $data );
		$data = wp_filter_nohtml_kses($data);
	}
	
	return $data;
}