<?php

/**
 * function for google fonts
 */
if (!function_exists('magazine_edge_fonts_url')):

    /**
     * Return fonts URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function magazine_edge_fonts_url() {

        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Oswald, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Source Sans Pro font: on or off', 'magazine-edge')) {
            $fonts[] = 'Source+Sans+Pro:400,400i,700,700i';
        }

        /* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Montserrat font: on or off', 'magazine-edge')) {
            $fonts[] = 'Montserrat:300,400,500,600,700,800';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urldecode(implode('|', $fonts)),
                'subset' => urldecode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }
        return $fonts_url;
    }
endif;
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package magazine-edge
 */

if (!function_exists('magazine_edge_setup')):

    function magazine_edge_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    register_nav_menus( array(
        'menu-1' => esc_html__( 'Primary', 'magazine-edge' ),
    ) );

    add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));


    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support('custom-logo', array(
            'flex-width'  => true,
            'flex-height' => true,
        ));

        if ( is_singular() && comments_open() ) {
            wp_enqueue_script( 'comment-reply' );
        }
        add_editor_style( 'assets/css/editor-style.css' );
}
endif;
add_action('after_setup_theme', 'magazine_edge_setup');

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function magazine_edge_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'magazine_edge_body_classes' );

if (!function_exists('magazine_edge_ocdi_files')) :
/**
* OCDI files.
*
* @since 1.0.0
*
* @return array Files.
*/
function magazine_edge_ocdi_files() {

return apply_filters( 'aft_demo_import_files', array(
    array(
        'import_file_name'             => esc_html__( 'Magazine Edge Data', 'magazine-edge' ),
        'import_file_url'            => esc_url('http://ratinatemplates.com/import-data/edge.xml'),
        'import_widget_file_url'     => esc_url('http://ratinatemplates.com/import-data/edge.wie'),
        'import_customizer_file_url' => esc_url('http://ratinatemplates.com/import-data/edge.dat'),


    ),
));
}
endif;
add_filter( 'pt-ocdi/import_files', 'magazine_edge_ocdi_files');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function magazine_edge_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'magazine_edge_pingback_header' );


if(!function_exists('magazine_edge_get_posts')):
    function magazine_edge_get_posts($magazine_edges_number_of_posts, $magazine_edges_category = '0'){
        if(is_front_page()) {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        }
        else {
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        }
    $ins_args = array(
            'post_type' => 'post',
            'post__not_in' => get_option('sticky_posts'),
            'posts_per_page' => absint($magazine_edges_number_of_posts),
            'paged' => $paged,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        );


        if (absint($magazine_edges_category) > 0) {
            $ins_args['cat'] = absint($magazine_edges_category);
        }

        $magazine_edges_all_posts = new WP_Query($ins_args);
        return $magazine_edges_all_posts;
    }

endif;

/**
 * Enqueue scripts and styles.
 */
function magazine_edge_scripts() {
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css');
    wp_enqueue_style('magazine-edge', get_stylesheet_uri());
    wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/css/font-awesome.css');
    wp_enqueue_style('animate', get_template_directory_uri().'/assets/css/animate.css');    
    wp_enqueue_style('jquery-owl', get_template_directory_uri().'/assets/css/owl.css');
    wp_enqueue_style('mCustomScrollbar', get_template_directory_uri().'/assets/css/mCustomScrollbar.css');
    wp_enqueue_style('magazine-edge-responsive', get_template_directory_uri().'/assets/css/responsive.css');
    wp_enqueue_style('magazine-edge-typography', get_template_directory_uri().'/assets/css/typo.css');

    $fonts_url = magazine_edge_fonts_url();

    if (!empty($fonts_url)) {
        wp_enqueue_style('magazine-edge-google-fonts', $fonts_url, array(), null);
    }

    wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-owl', get_template_directory_uri().'/assets/js/owl.js', array('jquery'), '', true);
    wp_enqueue_script('magazine-edge-wow', get_template_directory_uri().'/assets/js/wow.js', array('jquery'), '', true);
    wp_enqueue_script('mCustomScrollbar', get_template_directory_uri().'/assets/js/jquery.mCustomScrollbar.concat.js', array('jquery'), '', true);
    wp_enqueue_script('imageloaded', get_template_directory_uri().'/assets/js/imagesloaded.js', array('jquery'), '', true);
    wp_enqueue_script('isotope', get_template_directory_uri().'/assets/js/isotope.js', array('jquery'), '', true);
    wp_enqueue_script('magazine-edge-script', get_template_directory_uri().'/assets/js/script.js', array('jquery'), '', true);
    wp_enqueue_script( 'magazine-edge-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'magazine-edge-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    

}
add_action('wp_enqueue_scripts', 'magazine_edge_scripts');