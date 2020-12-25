<?php
/**
* Posts navigation functions
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'textwp_wp_pagenavi' ) ) :
function textwp_wp_pagenavi() {
    ?>
    <nav class="navigation posts-navigation textwp-clearfix" role="navigation">
        <?php wp_pagenavi(); ?>
    </nav><!-- .navigation -->
    <?php
}
endif;


if ( ! function_exists( 'textwp_posts_navigation' ) ) :
function textwp_posts_navigation() {
    if ( !(textwp_get_option('hide_posts_navigation')) ) {
        if ( function_exists( 'wp_pagenavi' ) ) {
            textwp_wp_pagenavi();
        } else {
            if ( textwp_get_option('posts_navigation_type') === 'normalnavi' ) {
                the_posts_navigation(array('prev_text' => esc_html__( 'Older posts', 'textwp' ), 'next_text' => esc_html__( 'Newer posts', 'textwp' )));
            } else {
                the_posts_pagination(array('mid_size' => 2, 'prev_text' => esc_html__( '&larr; Newer posts', 'textwp' ), 'next_text' => esc_html__( 'Older posts &rarr;', 'textwp' )));
            }
        }
    }
}
endif;


if ( ! function_exists( 'textwp_post_navigation' ) ) :
function textwp_post_navigation() {
    if ( !(textwp_get_option('hide_post_navigation')) ) {
        the_post_navigation(array('prev_text' => esc_html__( '%title &rarr;', 'textwp' ), 'next_text' => esc_html__( '&larr; %title', 'textwp' )));
    }
}
endif;