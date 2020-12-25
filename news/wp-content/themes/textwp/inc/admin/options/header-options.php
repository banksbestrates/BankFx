<?php
/**
* Header options
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function textwp_header_options($wp_customize) {

    // Header
    $wp_customize->add_section( 'textwp_section_header', array( 'title' => esc_html__( 'Header Options', 'textwp' ), 'panel' => 'textwp_main_options_panel', 'priority' => 120 ) );

    $wp_customize->add_setting( 'textwp_options[hide_tagline]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_tagline_control', array( 'label' => esc_html__( 'Hide Tagline', 'textwp' ), 'section' => 'textwp_section_header', 'settings' => 'textwp_options[hide_tagline]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_header_content]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_header_content_control', array( 'label' => esc_html__( 'Hide Header Content', 'textwp' ), 'section' => 'textwp_section_header', 'settings' => 'textwp_options[hide_header_content]', 'type' => 'checkbox', ) );

    // Header Image
    $wp_customize->add_setting( 'textwp_options[hide_header_image]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_header_image_control', array( 'label' => esc_html__( 'Hide Header Image from Everywhere', 'textwp' ), 'section' => 'header_image', 'settings' => 'textwp_options[hide_header_image]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[remove_header_image_link]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_remove_header_image_link_control', array( 'label' => esc_html__( 'Remove Link from Header Image', 'textwp' ), 'section' => 'header_image', 'settings' => 'textwp_options[remove_header_image_link]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_header_image_details]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_header_image_details_control', array( 'label' => esc_html__( 'Hide both Title and Description from Header Image', 'textwp' ), 'section' => 'header_image', 'settings' => 'textwp_options[hide_header_image_details]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_header_image_description]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_header_image_description_control', array( 'label' => esc_html__( 'Hide Description from Header Image', 'textwp' ), 'section' => 'header_image', 'settings' => 'textwp_options[hide_header_image_description]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[header_image_custom_title]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_html', ) );

    $wp_customize->add_control( 'textwp_header_image_custom_title_control', array( 'label' => esc_html__( 'Header Image Custom Title', 'textwp' ), 'section' => 'header_image', 'settings' => 'textwp_options[header_image_custom_title]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'textwp_options[header_image_custom_description]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_html', ) );

    $wp_customize->add_control( 'textwp_header_image_custom_description_control', array( 'label' => esc_html__( 'Header Image Custom Description', 'textwp' ), 'section' => 'header_image', 'settings' => 'textwp_options[header_image_custom_description]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'textwp_options[header_image_destination]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_header_image_destination_control', array( 'label' => esc_html__( 'Header Image Destination URL', 'textwp' ), 'description' => esc_html__( 'Enter the URL a visitor should go when he/she click on the header image. If you did not enter a URL below, header image will be linked to the homepage of your website.', 'textwp' ), 'section' => 'header_image', 'settings' => 'textwp_options[header_image_destination]', 'type' => 'text' ) );

}