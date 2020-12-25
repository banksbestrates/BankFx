<?php
/**
 * MagazineBook Theme Customizer - Frontpage options
 *
 * @package MagazineBook
 */

// Add Design Options panel.
$wp_customize->add_panel(
	'magazinebook_frontpage_options',
	array(
		'capabitity'  => 'edit_theme_options',
		'description' => __( 'Change the Frontpage Settings', 'magazinebook' ),
		'priority'    => 503,
		'title'       => __( 'Frontpage Options', 'magazinebook' ),
	)
);

// Add frontpage general section.
$wp_customize->add_section(
	'magazinebook_general_section',
	array(
		'title' => __( 'General Options', 'magazinebook' ),
		'panel' => 'magazinebook_frontpage_options',
	)
);

$wp_customize->add_setting(
	'magazinebook_hide_frontpage_posts_page',
	array(
		'default'           => false,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'magazinebook_hide_frontpage_posts_page',
	array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to hide blog posts/static page on front page', 'magazinebook' ),
		'section'  => 'magazinebook_general_section',
		'settings' => 'magazinebook_hide_frontpage_posts_page',
	)
);

$wp_customize->add_setting(
	'magazinebook_show_banner_section',
	array(
		'default'           => true,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'magazinebook_show_banner_section',
	array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to show Banner Section on front page', 'magazinebook' ),
		'section'  => 'magazinebook_general_section',
		'settings' => 'magazinebook_show_banner_section',
	)
);

// Add frontpage banner slider section.
$wp_customize->add_section(
	'magazinebook_banner_slider',
	array(
		'title' => __( 'Banner Slider', 'magazinebook' ),
		'panel' => 'magazinebook_frontpage_options',
	)
);

$wp_customize->add_setting(
	'magazinebook_banner_slider_category',
	array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Magazinebook_Dropdown_Category_Control(
		$wp_customize,
		'magazinebook_banner_slider_category',
		array(
			'section'     => 'magazinebook_banner_slider',
			'label'       => esc_html__( 'Slider Posts Category', 'magazinebook' ),
			'description' => esc_html__( 'Select the category that the slider will show posts from. If no category is selected, the slider will show latest 5 posts.', 'magazinebook' ),
		)
	)
);

// Add frontpage banner featured section.
$wp_customize->add_section(
	'magazinebook_banner_featured',
	array(
		'title' => __( 'Banner Featured Posts', 'magazinebook' ),
		'panel' => 'magazinebook_frontpage_options',
	)
);

$wp_customize->add_setting(
	'magazinebook_banner_featured_category',
	array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Magazinebook_Dropdown_Category_Control(
		$wp_customize,
		'magazinebook_banner_featured_category',
		array(
			'section'     => 'magazinebook_banner_featured',
			'label'       => esc_html__( 'Featured Posts Category', 'magazinebook' ),
			'description' => esc_html__( 'Select the category that the section will show posts from. If no category is selected, the latest 4 posts will be shown.', 'magazinebook' ),
		)
	)
);
