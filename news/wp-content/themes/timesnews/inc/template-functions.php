<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package timesnews
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function timesnews_body_classes( $classes ) {
    $select_layout = get_theme_mod('select-layout','right');
    $second_design_display = get_theme_mod('second-design-display','default');

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    //has header image
    if(has_header_image()){
        $classes[] = 'has-header-image';
    }

    //left sidebar
    if($select_layout=='left'){
        $classes[] = 'left-sidebar';

    }

    if ( is_active_sidebar( 'timesnews-template-primary' ) ) {
        $classes[] = 'lw-area';
    }

    if ( is_active_sidebar( 'timesnews-template-secondary' ) ) {
        $classes[] = 'rw-area';
    }

     // Add class if sidebar is used.
    if ( is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'has-sidebar';
    }
    if ($second_design_display == 'second'){
        $classes[] = 'second-design';
    }

	return $classes;
}
add_filter( 'body_class', 'timesnews_body_classes' );

/**
 * Adds custom class to the array of posts classes.
 */
function timesnews_post_classes( $classes, $class, $post_id ) {
    $classes[] = 'entry';

    return $classes;
}
add_filter( 'post_class', 'timesnews_post_classes', 10, 3 );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function timesnews_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'timesnews_pingback_header' );

// Default Category Lists for Dropdown

if( !function_exists( 'timesnews_cat_list' ) ):
    function timesnews_cat_list() {
        $timesnews_args = array(
            'type'       => 'post',
            'taxonomy'   => 'category',
        );
        $timesnews_cat_lists = get_categories( $timesnews_args );
        $timesnews_cat_list = array('' => esc_html__('--Select--','timesnews'));
        foreach( $timesnews_cat_lists as $category ) {
            $timesnews_cat_list[esc_attr( $category->slug )] = esc_html( $category->name );
        }
        return $timesnews_cat_list;
    }
endif;

//front page category list

if( !function_exists( 'timesnews_frontpage_cat_list' ) ):
    function timesnews_frontpage_cat_list() {
        $timesnews_args = array(
            'type'       => 'post',
            'taxonomy'   => 'category',
        );
        $timesnews_frontpage_cat_lists = get_categories( $timesnews_args );
        foreach( $timesnews_frontpage_cat_lists as $category ) {
            $timesnews_frontpage_cat_list[esc_attr( $category->term_id )] = esc_html( $category->name );
        }
        return $timesnews_frontpage_cat_list;
    }
endif;

//Exclude posts from home page

function timesnews_exclude_homepage($query) {
    $front_page_categories = get_theme_mod('front_page_categories','');
    if ( is_array( $front_page_categories ) && !in_array( 0, $front_page_categories ) ) {
        if ( $query->is_home() && $query->is_main_query() ) {
            $query->query_vars['category__in'] = $front_page_categories;
        }
    }
}
add_action('pre_get_posts', 'timesnews_exclude_homepage');

