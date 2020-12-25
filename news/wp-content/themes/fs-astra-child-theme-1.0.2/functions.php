<?php
/**
 * To prevent accessing the file directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
* Define Constants
*/
define( 'FS_THEME_VERSION', '1.0.2' );
define( 'FS_THEME_USE_CUSTOM_JS', true );
define( 'FS_THEME_USE_LIGHTBOX_LIB', false );

/**
* Include core functions
*/
require_once 'includes/core-functions.php';

/**
* Enqueue styles
*/
add_action( 'wp_enqueue_scripts', 'fs_enqueue_stuff', 10 );
function fs_enqueue_stuff() {
	
	wp_enqueue_style(  'font-awesome-5',  '//use.fontawesome.com/releases/v5.2.0/css/all.css');
	
	// Enqueue this theme's styles.
	wp_enqueue_style( 'fs-theme-styles', get_stylesheet_uri(), array(), FS_THEME_VERSION, 'all');
	
	// Enqueue custom JS file
	if(FS_THEME_USE_CUSTOM_JS){
	    wp_enqueue_script( 'fs-theme-js', get_stylesheet_directory_uri() . '/assets/js/script.js' , array('jquery'), FS_THEME_VERSION, true );
	}

	// Load lightbox_me.js library file
    if(FS_THEME_USE_LIGHTBOX_LIB){
    	wp_enqueue_script('fs-lightbox', get_stylesheet_directory_uri() . '/assets/js/jquery.lightbox_me.min.js' , array('fs-theme-js'), FS_THEME_VERSION, true);
    }

}

/**
* Create custom post types (if needed)
* Delete the function or the lines if not needed
*/
add_action('init', 'fs_define_post_types_taxonomies', 0);
function fs_define_post_types_taxonomies(){

	// Uncomment the lines below to add custom post type and taxonomies. 
	// See /includes/core-functions.php for available paramters.

	// fs_register_post_type('book', 'Book', 'Books');
	// fs_register_taxonomy('book_cat', 'Book Category', 'Book Categories', 'book');

	// fs_register_post_type('event', 'Event', 'Events');
	// fs_register_taxonomy('event-cat', 'Event Category', 'Event Categories', 'event');
	// fs_register_taxonomy('event-location', 'Event Location', 'Event Locations', 'event');

}

add_action( 'astra_single_post_title_before', 'fs_add_category_above_title' );
function fs_add_category_above_title() {
	printf( '<div class="entry-category-meta">%s</div>', astra_post_categories() );
}

add_action('astra_blog_single_featured_image_after', 'fs_single_entry_meta');
function fs_single_entry_meta(){
	echo '<div class="post-meta">';
	echo 'By' ;
	echo '<div class="author-single"> ';
		the_author();
		echo  '</div>';
	echo '<div class="date"> ';
		the_date();
		echo  '</div>';
	echo  '</div>';
}

add_filter( 'astra_post_meta_separator', 'fs_remove_separator' );
function fs_remove_separator( $separator ) {
	$separator = '';
	return $separator;
}

add_filter('astra_default_strings', 'change_string_values');
function change_string_values($strings){
        $strings['string-blog-meta-author-by'] = '';
        return $strings;
}

add_filter( 'astra_post_author', 'fs_add_author_icon' ); 
function fs_add_author_icon( $output ) {
	$output = '<span class="post-meta-icon"><i class="fas fa-user-circle"></i> </span>' . $output;
	return $output;
}

add_filter( 'astra_post_date', 'fs_add_date_icon' );
function fs_add_date_icon( $output ) {
	$output = '<span class="post-meta-icon"><i class="far fa-clock"></i> </span>' . $output;
	return $output;
}

add_filter( 'the_category', 'fs_categories_sepeartor', 10 , 2);
function fs_categories_sepeartor( $thelist, $separator ) {
 	return str_replace( $separator, ' | ', $thelist );

}

add_action('astra_primary_content_top', 'fs_article_title');
function fs_article_title(){
	if(is_home()){
		echo '<div class="article-blog-title"><h2> Latest Articles </h2></div>';
	}
}

add_action('astra_primary_content_top', 'show_ticker_above_blogs', 5);
function show_ticker_above_blogs(){
	if(is_home()){
    echo do_shortcode('[wp_ticker category="5" ticker_title="LATEST NEWS" color="#000" background_color="#0374A1" effect="slide-h" fontstyle="normal" autoplay="true" timer="4000" title_color="#fff" border="true" post_type="post" post_cat="category"  link="true" link_target="self"]');
	}
}
