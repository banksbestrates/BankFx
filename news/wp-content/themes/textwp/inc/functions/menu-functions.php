<?php
/**
* Menu Functions
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a "Home" link as the first item
function textwp_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'textwp_page_menu_args' );

function textwp_fallback_menu() {
    wp_page_menu( array(
        'sort_column'  => 'menu_order, post_title',
        'menu_id'      => 'textwp-menu-primary-navigation',
        'menu_class'   => 'textwp-primary-nav-menu textwp-menu-primary',
        'container'    => 'ul',
        'echo'         => true,
        'link_before'  => '',
        'link_after'   => '',
        'before'       => '',
        'after'        => '',
        'item_spacing' => 'discard',
        'walker'       => '',
    ) );
}