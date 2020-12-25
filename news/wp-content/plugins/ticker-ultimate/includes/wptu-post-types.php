<?php
/**
 * Register Post type functionality
 *
 * @package Ticker Ultimate
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


/**
 * Function to register post type
 * 
 * @package Ticker Ultimate
 * @since 1.0.0
 */
function wptu_register_post_type() {

  	// 'Ticker' post type
	$wptu_ticker_labels = array(
		'name'                 => __('Ticker', 'ticker-ultimate'),
		'singular_name'        => __('Ticker', 'ticker-ultimate'),
		'add_new'              => __('Add Ticker', 'ticker-ultimate'),
		'add_new_item'         => __('Add New Ticker', 'ticker-ultimate'),
		'edit_item'            => __('Edit Ticker', 'ticker-ultimate'),
		'new_item'             => __('New Ticker', 'ticker-ultimate'),
		'view_item'            => __('View Ticker', 'ticker-ultimate'),
		'search_items'         => __('Search Ticker', 'ticker-ultimate'),
		'not_found'            => __('No Tickers found', 'ticker-ultimate'),
		'not_found_in_trash'   => __('No Tickers found in Trash', 'ticker-ultimate'),
		'parent_item_colon'    => '',
		'menu_name'            => __('WP Ticker', 'ticker-ultimate'),
	);

	$wptu_ticker_args = array(
		'labels'              	=> $wptu_ticker_labels,
		'public'              	=> false,
		'publicly_queryable'  	=> false,
		'exclude_from_search' 	=> false,
		'show_ui'             	=> true,
		'show_in_menu'        	=> true, 
		'query_var'           	=> true,
		'rewrite'             	=> false,
		'capability_type'   	=> 'post',
		'has_archive'       	=> true,
		'hierarchical'      	=> false,
		'menu_icon'         	=> 'dashicons-feedback',
		'supports'          	=> array('title'),
	);

	// Register wp_ticker post type
    register_post_type( WPTU_POST_TYPE, apply_filters('wptu_register_post_type_ticker', $wptu_ticker_args) );
}

// Action to register plugin post type
add_action('init', 'wptu_register_post_type');


/**
 * Function to register taxonomy
 * 
 * @package Ticker Ultimate
 * @since 1.0.0
 */
function wptu_register_taxonomies() {

    $labels = array(
        'name'              => __( 'Category', 'ticker-ultimate' ),
        'singular_name'     => __( 'Category', 'ticker-ultimate' ),
        'search_items'      => __( 'Search Category', 'ticker-ultimate' ),
        'all_items'         => __( 'All Category', 'ticker-ultimate' ),
        'parent_item'       => __( 'Parent Category', 'ticker-ultimate' ),
        'parent_item_colon' => __( 'Parent Category:', 'ticker-ultimate' ),
        'edit_item'         => __( 'Edit Category', 'ticker-ultimate' ),
        'update_item'       => __( 'Update Category', 'ticker-ultimate' ),
        'add_new_item'      => __( 'Add New Category', 'ticker-ultimate' ),
        'new_item_name'     => __( 'New Category Name', 'ticker-ultimate' ),
        'menu_name'         => __( 'Ticker Category', 'ticker-ultimate' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => apply_filters('wptu_cat_slug', 'ticker-category'), ),
    );

    // Register 'ticker-category' taxonomies
    register_taxonomy( WPTU_CAT, array( WPTU_POST_TYPE ), apply_filters('wptu_register_category_ticker', $args) );
}

// Action to register plugin taxonomies
add_action( 'init', 'wptu_register_taxonomies');


/**
 * Function to update post message for ticker post type
 * 
 * @package Ticker Ultimate
 * @since 1.0.0
 */
function wptu_post_updated_messages( $messages ) {

	global $post, $post_ID;

	$messages[WPTU_POST_TYPE] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Ticker updated.', 'ticker-ultimate' ),
		2 => __( 'Custom field updated.', 'ticker-ultimate' ),
		3 => __( 'Custom field deleted.', 'ticker-ultimate' ),
		4 => __( 'Ticker updated.', 'ticker-ultimate' ),
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'Ticker restored to revision from %s', 'ticker-ultimate' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => __( 'Ticker published.', 'ticker-ultimate' ),
		7 => __( 'Ticker saved.', 'ticker-ultimate' ),
		8 => __( 'Ticker submitted.', 'ticker-ultimate' ),
		9 => sprintf( __( 'Ticker scheduled for: <strong>%1$s</strong>.', 'ticker-ultimate' ),
		  date_i18n( 'M j, Y @ G:i', strtotime( $post->post_date ) ) ),
		10 => __( 'Ticker draft updated.', 'ticker-ultimate' ),
	);
	
	return $messages;
}
// Filter to update ticker post message
add_filter( 'post_updated_messages', 'wptu_post_updated_messages' );