<?php
/**
 * MagazineBook Theme Customizer - Content options
 *
 * @package MagazineBook
 */

// Add Content Options panel.
$wp_customize->add_panel(
	'magazinebook_content_options',
	array(
		'capabitity'  => 'edit_theme_options',
		'description' => __( 'Change the Content Settings', 'magazinebook' ),
		'priority'    => 505,
		'title'       => __( 'Content Options', 'magazinebook' ),
	)
);

// Add content archive section.
$wp_customize->add_section(
	'magazinebook_show_hide_content_section',
	array(
		'title' => __( 'Show / Hide Content', 'magazinebook' ),
		'panel' => 'magazinebook_content_options',
	)
);

$wp_customize->add_setting(
	'magazinebook_hide_post_author',
	array(
		'default'           => false,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'magazinebook_hide_post_author',
	array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to hide Post Author on all pages', 'magazinebook' ),
		'section'  => 'magazinebook_show_hide_content_section',
		'settings' => 'magazinebook_hide_post_author',
	)
);

$wp_customize->add_setting(
	'magazinebook_hide_post_date',
	array(
		'default'           => false,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'magazinebook_hide_post_date',
	array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to hide Post Date on all pages', 'magazinebook' ),
		'section'  => 'magazinebook_show_hide_content_section',
		'settings' => 'magazinebook_hide_post_date',
	)
);

$wp_customize->add_setting(
	'magazinebook_hide_post_cats',
	array(
		'default'           => false,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'magazinebook_hide_post_cats',
	array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to hide Post Categories displayed above title', 'magazinebook' ),
		'section'  => 'magazinebook_show_hide_content_section',
		'settings' => 'magazinebook_hide_post_cats',
	)
);

$wp_customize->add_setting(
	'magazinebook_hide_post_comment_link',
	array(
		'default'           => false,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'magazinebook_hide_post_comment_link',
	array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to hide Comments Link displayed below title (on some places)', 'magazinebook' ),
		'section'  => 'magazinebook_show_hide_content_section',
		'settings' => 'magazinebook_hide_post_comment_link',
	)
);

$wp_customize->add_setting(
	'magazinebook_hide_post_thumbnail_single',
	array(
		'default'           => false,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'magazinebook_hide_post_thumbnail_single',
	array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to hide Post Thumbnail displayed on Single Post', 'magazinebook' ),
		'section'  => 'magazinebook_show_hide_content_section',
		'settings' => 'magazinebook_hide_post_thumbnail_single',
	)
);

$wp_customize->add_setting(
	'magazinebook_hide_similar_posts_single',
	array(
		'default'           => false,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'magazinebook_hide_similar_posts_single',
	array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to hide Similar Posts displayed below content on Single Post', 'magazinebook' ),
		'section'  => 'magazinebook_show_hide_content_section',
		'settings' => 'magazinebook_hide_similar_posts_single',
	)
);
