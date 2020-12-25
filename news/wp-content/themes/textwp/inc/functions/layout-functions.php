<?php
/**
* Layout Functions
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function textwp_post_style() {
   $post_style = 'compactview';
    return apply_filters( 'textwp_post_style', $post_style );
}

function textwp_hide_footer_widgets() {
    $hide_footer_widgets = FALSE;

    if ( textwp_get_option('hide_footer_widgets') ) {
        $hide_footer_widgets = TRUE;
    }

    return apply_filters( 'textwp_hide_footer_widgets', $hide_footer_widgets );
}

function textwp_is_header_social_buttons_active() {
    $footer_social_buttons_active = TRUE;

    if ( textwp_get_option('hide_header_social_buttons') ) {
        $footer_social_buttons_active = FALSE;
    }

    return apply_filters( 'textwp_is_header_social_buttons_active', $footer_social_buttons_active );
}

function textwp_is_primary_menu_active() {
    $primary_menu_active = TRUE;

    if ( textwp_get_option('disable_primary_menu') ) {
        $primary_menu_active = FALSE;
    }

    return apply_filters( 'textwp_is_primary_menu_active', $primary_menu_active );
}

function textwp_is_header_content_active() {
    $header_content_active = TRUE;

    if ( textwp_get_option('hide_header_content') ) {
        $header_content_active = FALSE;
    }

    return apply_filters( 'textwp_is_header_content_active', $header_content_active );
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function textwp_content_width() {
    $content_width = 760;

    if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
       $content_width = 1116;
    }

    if ( is_404() ) {
        $content_width = 1116;
    }

    $GLOBALS['content_width'] = apply_filters( 'textwp_content_width', $content_width ); /* phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound */
}
add_action( 'template_redirect', 'textwp_content_width', 0 );