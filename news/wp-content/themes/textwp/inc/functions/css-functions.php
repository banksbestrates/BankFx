<?php
/**
* Css Classes Functions
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Category ids in post class
function textwp_category_id_class($classes) {
    global $post;
    foreach((get_the_category($post->ID)) as $category) {
        $classes [] = 'wpcat-' . $category->cat_ID . '-id';
    }
    return $classes;
}
add_filter('post_class', 'textwp_category_id_class');


// Adds custom classes to the array of body classes.
function textwp_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'textwp-group-blog';
    }

    $classes[] = 'textwp-theme-is-active';

    if ( get_header_image() ) {
        $classes[] = 'textwp-header-image-active';
    }

    if ( has_custom_logo() ) {
        $classes[] = 'textwp-custom-logo-active';
    }

    if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
       $classes[] = 'textwp-layout-full-width';
    }

    if ( is_404() ) {
        $classes[] = 'textwp-layout-full-width';
    }

    if ( textwp_get_option('hide_tagline') ) {
        $classes[] = 'textwp-tagline-inactive';
    }

    if ( textwp_is_primary_menu_active() ) {
        $classes[] = 'textwp-primary-menu-active';
    }
    $classes[] = 'textwp-primary-mobile-menu-active';

    $classes[] = 'textwp-table-css-active';

    return $classes;
}
add_filter( 'body_class', 'textwp_body_classes' );


/* Posts container class */
function textwp_posts_container_class() {
    if ( 'compactview' == textwp_post_style() ) {
        $posts_container_class = 'textwp-compact-posts-container textwp-fpw-1-column';
    } else {
        $posts_container_class = 'textwp-default-posts-container';
    }
    return apply_filters( 'textwp_posts_container_class', $posts_container_class );
}