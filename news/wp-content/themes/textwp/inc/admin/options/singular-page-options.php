<?php
/**
* Page options
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function textwp_page_options($wp_customize) {

    $wp_customize->add_section( 'textwp_section_page', array( 'title' => esc_html__( 'Page Options', 'textwp' ), 'panel' => 'textwp_main_options_panel', 'priority' => 190 ) );

    $wp_customize->add_setting( 'textwp_options[thumbnail_link_page]', array( 'default' => 'yes', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_thumbnail_link' ) );

    $wp_customize->add_control( 'textwp_thumbnail_link_page_control', array( 'label' => esc_html__( 'Featured Image Link', 'textwp' ), 'description' => esc_html__('Do you want the featured image in a page to be linked to its page?', 'textwp'), 'section' => 'textwp_section_page', 'settings' => 'textwp_options[thumbnail_link_page]', 'type' => 'select', 'choices' => array( 'yes' => esc_html__('Yes', 'textwp'), 'no' => esc_html__('No', 'textwp') ) ) );

    $wp_customize->add_setting( 'textwp_options[hide_thumbnail_page]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_thumbnail_page_control', array( 'label' => esc_html__( 'Hide Featured Image from Single Pages', 'textwp' ), 'section' => 'textwp_section_page', 'settings' => 'textwp_options[hide_thumbnail_page]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_page_title]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_page_title_control', array( 'label' => esc_html__( 'Hide Page Header from Single Pages', 'textwp' ), 'section' => 'textwp_section_page', 'settings' => 'textwp_options[hide_page_title]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[remove_page_title_link]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_remove_page_title_link_control', array( 'label' => esc_html__( 'Remove Link from Single Page Titles', 'textwp' ), 'section' => 'textwp_section_page', 'settings' => 'textwp_options[remove_page_title_link]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_page_date]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_page_date_control', array( 'label' => esc_html__( 'Hide Posted Date from Single Pages', 'textwp' ), 'section' => 'textwp_section_page', 'settings' => 'textwp_options[hide_page_date]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_page_author]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_page_author_control', array( 'label' => esc_html__( 'Hide Page Author from Single Pages', 'textwp' ), 'section' => 'textwp_section_page', 'settings' => 'textwp_options[hide_page_author]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_page_comments]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_page_comments_control', array( 'label' => esc_html__( 'Hide Comment Link from Single Pages', 'textwp' ), 'section' => 'textwp_section_page', 'settings' => 'textwp_options[hide_page_comments]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_page_comment_form]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_page_comment_form_control', array( 'label' => esc_html__( 'Hide Comments/Comment Form from Single Pages', 'textwp' ), 'section' => 'textwp_section_page', 'settings' => 'textwp_options[hide_page_comment_form]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_page_edit]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_page_edit_control', array( 'label' => esc_html__( 'Hide Edit Link from Single Pages', 'textwp' ), 'section' => 'textwp_section_page', 'settings' => 'textwp_options[hide_page_edit]', 'type' => 'checkbox', ) );

}