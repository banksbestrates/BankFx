<?php
/**
* Navigation options
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function textwp_navigation_options($wp_customize) {

    $wp_customize->add_section( 'textwp_section_navigation', array( 'title' => esc_html__( 'Post/Posts Navigation Options', 'textwp' ), 'panel' => 'textwp_main_options_panel', 'priority' => 185 ) );

    $wp_customize->add_setting( 'textwp_options[hide_post_navigation]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_post_navigation_control', array( 'label' => esc_html__( 'Hide Post Navigation from Full Posts', 'textwp' ), 'section' => 'textwp_section_navigation', 'settings' => 'textwp_options[hide_post_navigation]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_posts_navigation]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_posts_navigation_control', array( 'label' => esc_html__( 'Hide Posts Navigation from Home/Archive/Search Pages', 'textwp' ), 'section' => 'textwp_section_navigation', 'settings' => 'textwp_options[hide_posts_navigation]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[posts_navigation_type]', array( 'default' => 'numberednavi', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_posts_navigation_type' ) );

    $wp_customize->add_control( 'textwp_posts_navigation_type_control', array( 'label' => esc_html__( 'Posts Navigation Type', 'textwp' ), 'description' => esc_html__('Select posts navigation type you need. If you activate WP-PageNavi plugin, this navigation will be replaced by WP-PageNavi navigation.', 'textwp'), 'section' => 'textwp_section_navigation', 'settings' => 'textwp_options[posts_navigation_type]', 'type' => 'select', 'choices' => array( 'normalnavi' => esc_html__('Link Navigation', 'textwp'), 'numberednavi' => esc_html__('Numbered Navigation', 'textwp') ) ) );

}