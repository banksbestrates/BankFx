<?php
/**
* Post Summaries options
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function textwp_post_summaries_options($wp_customize) {

    $wp_customize->add_section( 'textwp_section_posts_summaries', array( 'title' => esc_html__( 'Post Summaries Options', 'textwp' ), 'panel' => 'textwp_main_options_panel', 'priority' => 175 ) );

    $wp_customize->add_setting( 'textwp_options[hide_posts_heading]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_posts_heading_control', array( 'label' => esc_html__( 'Hide HomePage Posts Heading', 'textwp' ), 'section' => 'textwp_section_posts_summaries', 'settings' => 'textwp_options[hide_posts_heading]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[posts_heading]', array( 'default' => esc_html__( 'Recent Posts', 'textwp' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field', ) );

    $wp_customize->add_control( 'textwp_posts_heading_control', array( 'label' => esc_html__( 'HomePage Posts Heading', 'textwp' ), 'section' => 'textwp_section_posts_summaries', 'settings' => 'textwp_options[posts_heading]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'textwp_options[read_more_length]', array( 'default' => 20, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_read_more_length' ) );

    $wp_customize->add_control( 'textwp_read_more_length_control', array( 'label' => esc_html__( 'Auto Post Summary Length', 'textwp' ), 'description' => esc_html__('Enter the number of words need to display in the post summary. Default is 20 words.', 'textwp'), 'section' => 'textwp_section_posts_summaries', 'settings' => 'textwp_options[read_more_length]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[read_more_text]', array( 'default' => esc_html__( 'Continue Reading', 'textwp' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field', ) );

    $wp_customize->add_control( 'textwp_read_more_text_control', array( 'label' => esc_html__( 'Read More Text', 'textwp' ), 'section' => 'textwp_section_posts_summaries', 'settings' => 'textwp_options[read_more_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'textwp_options[hide_thumbnail_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_thumbnail_home_control', array( 'label' => esc_html__( 'Hide Featured Images from Posts Summaries', 'textwp' ), 'section' => 'textwp_section_posts_summaries', 'settings' => 'textwp_options[hide_thumbnail_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_default_thumbnail_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_default_thumbnail_home_control', array( 'label' => esc_html__( 'Hide Default Images from Posts Summaries', 'textwp' ), 'section' => 'textwp_section_posts_summaries', 'settings' => 'textwp_options[hide_default_thumbnail_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_post_title_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_post_title_home_control', array( 'label' => esc_html__( 'Hide Post Titles from Posts Summaries', 'textwp' ), 'section' => 'textwp_section_posts_summaries', 'settings' => 'textwp_options[hide_post_title_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_post_author_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_post_author_home_control', array( 'label' => esc_html__( 'Hide Post Authors from Posts Summaries', 'textwp' ), 'section' => 'textwp_section_posts_summaries', 'settings' => 'textwp_options[hide_post_author_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_posted_date_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_posted_date_home_control', array( 'label' => esc_html__( 'Hide Posted Dates from Posts Summaries', 'textwp' ), 'section' => 'textwp_section_posts_summaries', 'settings' => 'textwp_options[hide_posted_date_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_comments_link_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_comments_link_home_control', array( 'label' => esc_html__( 'Hide Comment Links from Posts Summaries', 'textwp' ), 'section' => 'textwp_section_posts_summaries', 'settings' => 'textwp_options[hide_comments_link_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_post_snippet]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_post_snippet_control', array( 'label' => esc_html__( 'Hide Post Snippets from Posts Summaries', 'textwp' ), 'section' => 'textwp_section_posts_summaries', 'settings' => 'textwp_options[hide_post_snippet]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[show_read_more_button]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_show_read_more_button_control', array( 'label' => esc_html__( 'Show Read More Buttons on Posts Summaries', 'textwp' ), 'section' => 'textwp_section_posts_summaries', 'settings' => 'textwp_options[show_read_more_button]', 'type' => 'checkbox', ) );

}