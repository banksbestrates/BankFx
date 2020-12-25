<?php
/**
* Singular Post options
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function textwp_post_options($wp_customize) {

    $wp_customize->add_section( 'textwp_section_posts', array( 'title' => esc_html__( 'Singular Post Options', 'textwp' ), 'panel' => 'textwp_main_options_panel', 'priority' => 180 ) );

    $wp_customize->add_setting( 'textwp_options[thumbnail_link]', array( 'default' => 'yes', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_thumbnail_link' ) );

    $wp_customize->add_control( 'textwp_thumbnail_link_control', array( 'label' => esc_html__( 'Featured Image Link', 'textwp' ), 'description' => esc_html__('Do you want single post thumbnail to be linked to their post?', 'textwp'), 'section' => 'textwp_section_posts', 'settings' => 'textwp_options[thumbnail_link]', 'type' => 'select', 'choices' => array( 'yes' => esc_html__('Yes', 'textwp'), 'no' => esc_html__('No', 'textwp') ) ) );

    $wp_customize->add_setting( 'textwp_options[hide_thumbnail_single]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_thumbnail_single_control', array( 'label' => esc_html__( 'Hide Featured Image from Full Posts', 'textwp' ), 'section' => 'textwp_section_posts', 'settings' => 'textwp_options[hide_thumbnail_single]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_post_title]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_post_title_control', array( 'label' => esc_html__( 'Hide Post Header from Full Posts', 'textwp' ), 'section' => 'textwp_section_posts', 'settings' => 'textwp_options[hide_post_title]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[remove_post_title_link]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_remove_post_title_link_control', array( 'label' => esc_html__( 'Remove Link from Full Post Titles', 'textwp' ), 'section' => 'textwp_section_posts', 'settings' => 'textwp_options[remove_post_title_link]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_posted_date]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_posted_date_control', array( 'label' => esc_html__( 'Hide Posted Date from Full Posts', 'textwp' ), 'section' => 'textwp_section_posts', 'settings' => 'textwp_options[hide_posted_date]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_post_author]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_post_author_control', array( 'label' => esc_html__( 'Hide Post Author from Full Posts', 'textwp' ), 'section' => 'textwp_section_posts', 'settings' => 'textwp_options[hide_post_author]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_post_categories]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_post_categories_control', array( 'label' => esc_html__( 'Hide Post Categories from Full Posts', 'textwp' ), 'section' => 'textwp_section_posts', 'settings' => 'textwp_options[hide_post_categories]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_post_tags]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_post_tags_control', array( 'label' => esc_html__( 'Hide Post Tags from Full Posts', 'textwp' ), 'section' => 'textwp_section_posts', 'settings' => 'textwp_options[hide_post_tags]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_comments_link]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_comments_link_control', array( 'label' => esc_html__( 'Hide Comment Link from Full Posts', 'textwp' ), 'section' => 'textwp_section_posts', 'settings' => 'textwp_options[hide_comments_link]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_comment_form]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_comment_form_control', array( 'label' => esc_html__( 'Hide Comments/Comment Form from Full Posts', 'textwp' ), 'section' => 'textwp_section_posts', 'settings' => 'textwp_options[hide_comment_form]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_post_edit]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_post_edit_control', array( 'label' => esc_html__( 'Hide Post Edit Link from Full Posts', 'textwp' ), 'section' => 'textwp_section_posts', 'settings' => 'textwp_options[hide_post_edit]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_author_bio_box]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_author_bio_box_control', array( 'label' => esc_html__( 'Hide Author Bio Box from Full Posts', 'textwp' ), 'section' => 'textwp_section_posts', 'settings' => 'textwp_options[hide_author_bio_box]', 'type' => 'checkbox', ) );

}