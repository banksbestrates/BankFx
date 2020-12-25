<?php
/**
* Enqueue scripts and styles
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function textwp_scripts() {
    wp_enqueue_style('textwp-maincss', get_stylesheet_uri(), array(), NULL);
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), NULL );
    wp_enqueue_style('textwp-webfont', '//fonts.googleapis.com/css?family=Domine:400,700|Oswald:400,700|Patua+One|Frank+Ruhl+Libre:400,700&amp;display=swap', array(), NULL);

    $textwp_primary_menu_active = FALSE;
    if ( textwp_is_primary_menu_active() ) {
        $textwp_primary_menu_active = TRUE;
    }

    $textwp_sticky_menu_active = TRUE;
    $textwp_sticky_mobile_menu_active = FALSE;

    $textwp_sticky_sidebar_active = TRUE;
    if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
        $textwp_sticky_sidebar_active = FALSE;
    }
    if ( is_404() ) {
        $textwp_sticky_sidebar_active = FALSE;
    }
    if ( $textwp_sticky_sidebar_active ) {
        wp_enqueue_script('ResizeSensor', get_template_directory_uri() .'/assets/js/ResizeSensor.min.js', array( 'jquery' ), NULL, true);
        wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() .'/assets/js/theia-sticky-sidebar.min.js', array( 'jquery' ), NULL, true);
    }

    wp_enqueue_script('fitvids', get_template_directory_uri() .'/assets/js/jquery.fitvids.min.js', array( 'jquery' ), NULL, true);

    wp_enqueue_script('textwp-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), NULL, true );
    wp_enqueue_script('textwp-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), NULL, true );
    wp_enqueue_script('textwp-customjs', get_template_directory_uri() .'/assets/js/custom.js', array( 'jquery', 'imagesloaded' ), NULL, true);
    wp_localize_script( 'textwp-customjs', 'textwp_ajax_object',
        array(
            'ajaxurl' => esc_url_raw( admin_url( 'admin-ajax.php' ) ),
            'primary_menu_active' => $textwp_primary_menu_active,
            'sticky_menu_active' => $textwp_sticky_menu_active,
            'sticky_mobile_menu_active' => $textwp_sticky_mobile_menu_active,
            'sticky_sidebar_active' => $textwp_sticky_sidebar_active,
        )
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script('textwp-html5shiv-js', get_template_directory_uri() .'/assets/js/html5shiv.js', array('jquery'), NULL, true);

    wp_localize_script('textwp-html5shiv-js','textwp_custom_script_vars',array(
        'elements_name' => esc_html__('abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video', 'textwp'),
    ));
}
add_action( 'wp_enqueue_scripts', 'textwp_scripts' );

/**
 * Enqueue IE compatible scripts and styles.
 */
function textwp_ie_scripts() {
    wp_enqueue_script( 'respond', get_template_directory_uri(). '/assets/js/respond.min.js', array(), NULL, false );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'textwp_ie_scripts' );

/**
 * Enqueue customizer styles.
 */
function textwp_enqueue_customizer_styles() {
    wp_enqueue_style( 'textwp-customizer-styles', get_template_directory_uri() . '/inc/admin/css/customizer-style.css', array(), NULL );
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), NULL );
}
add_action( 'customize_controls_enqueue_scripts', 'textwp_enqueue_customizer_styles' );