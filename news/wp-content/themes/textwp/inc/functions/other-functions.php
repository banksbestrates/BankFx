<?php
/**
* More Custom Functions
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function textwp_read_more_text() {
   $readmoretext = esc_html__( 'Continue Reading', 'textwp' );
    if ( textwp_get_option('read_more_text') ) {
            $readmoretext = textwp_get_option('read_more_text');
    }
   return $readmoretext;
}

// Change excerpt length
function textwp_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }
    $read_more_length = 20;
    if ( textwp_get_option('read_more_length') ) {
        $read_more_length = textwp_get_option('read_more_length');
    }
    return $read_more_length;
}
add_filter('excerpt_length', 'textwp_excerpt_length');

// Change excerpt more word
function textwp_excerpt_more($more) {
    if ( is_admin() ) {
        return $more;
    }
    return '...';
}
add_filter('excerpt_more', 'textwp_excerpt_more');

if ( ! function_exists( 'wp_body_open' ) ) :
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
     */
    function wp_body_open() { // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedFunctionFound
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
    }
endif;