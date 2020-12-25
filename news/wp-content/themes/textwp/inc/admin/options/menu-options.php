<?php
/**
* Menu options
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function textwp_menu_options($wp_customize) {

    $wp_customize->add_section( 'textwp_section_menu_options', array( 'title' => esc_html__( 'Menu Options', 'textwp' ), 'panel' => 'textwp_main_options_panel', 'priority' => 100 ) );

    $wp_customize->add_setting( 'textwp_options[disable_primary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_disable_primary_menu_control', array( 'label' => esc_html__( 'Disable Primary Menu', 'textwp' ), 'section' => 'textwp_section_menu_options', 'settings' => 'textwp_options[disable_primary_menu]', 'type' => 'checkbox', ) );

}