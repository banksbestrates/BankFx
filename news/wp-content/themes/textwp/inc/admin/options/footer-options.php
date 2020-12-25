<?php
/**
* Footer options
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function textwp_footer_options($wp_customize) {

    $wp_customize->add_section( 'textwp_section_footer', array( 'title' => esc_html__( 'Footer Options', 'textwp' ), 'panel' => 'textwp_main_options_panel', 'priority' => 280 ) );

    $wp_customize->add_setting( 'textwp_options[footer_text]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_html', ) );

    $wp_customize->add_control( 'textwp_footer_text_control', array( 'label' => esc_html__( 'Footer copyright notice', 'textwp' ), 'section' => 'textwp_section_footer', 'settings' => 'textwp_options[footer_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'textwp_options[hide_footer_widgets]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_footer_widgets_control', array( 'label' => esc_html__( 'Hide Footer Widgets', 'textwp' ), 'section' => 'textwp_section_footer', 'settings' => 'textwp_options[hide_footer_widgets]', 'type' => 'checkbox', ) );

}