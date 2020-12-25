<?php
/**
 * MagazineBook Theme Customizer - Design options
 *
 * @package MagazineBook
 */

// Add Design Options panel.
$wp_customize->add_panel(
	'magazinebook_design_options',
	array(
		'capabitity'  => 'edit_theme_options',
		'description' => __( 'Change the Design Settings', 'magazinebook' ),
		'priority'    => 504,
		'title'       => __( 'Design Options', 'magazinebook' ),
	)
);

// Add site layout section.
$wp_customize->add_section(
	'magazinebook_site_layout_section',
	array(
		'title' => __( 'Site Layout', 'magazinebook' ),
		'panel' => 'magazinebook_design_options',
	)
);

$wp_customize->add_setting(
	'magazinebook_site_layout',
	array(
		'default'           => 'boxed',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_radio',
	)
);
$wp_customize->add_control(
	'magazinebook_site_layout',
	array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Site Layout:', 'magazinebook' ),
		'section'  => 'magazinebook_site_layout_section',
		'settings' => 'magazinebook_site_layout',
		'choices'  => array(
			'wide'  => esc_html__( 'Wide Layout', 'magazinebook' ),
			'boxed' => esc_html__( 'Boxed Layout', 'magazinebook' ),
		),
	)
);

// Add sidebar positions section.
$wp_customize->add_section(
	'magazinebook_sidebar_positions_section',
	array(
		'title' => __( 'Sidebar Positions', 'magazinebook' ),
		'panel' => 'magazinebook_design_options',
	)
);

$wp_customize->add_setting(
	'magazinebook_frontpage_sidebar_position',
	array(
		'default'           => 'right',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_radio',
	)
);
$wp_customize->add_control(
	'magazinebook_frontpage_sidebar_position',
	array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Frontpage Sidebar Position:', 'magazinebook' ),
		'section'  => 'magazinebook_sidebar_positions_section',
		'settings' => 'magazinebook_frontpage_sidebar_position',
		'choices'  => array(
			'right' => esc_html__( 'Sidebar on Right', 'magazinebook' ),
			'left'  => esc_html__( 'Sidebar on Left', 'magazinebook' ),
			'hide'  => esc_html__( 'Hide Sidebar', 'magazinebook' ),
		),
	)
);

$wp_customize->add_setting(
	'magazinebook_single_sidebar_position',
	array(
		'default'           => 'right',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_radio',
	)
);
$wp_customize->add_control(
	'magazinebook_single_sidebar_position',
	array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Single Post Sidebar Position:', 'magazinebook' ),
		'section'  => 'magazinebook_sidebar_positions_section',
		'settings' => 'magazinebook_single_sidebar_position',
		'choices'  => array(
			'right' => esc_html__( 'Sidebar on Right', 'magazinebook' ),
			'left'  => esc_html__( 'Sidebar on Left', 'magazinebook' ),
			'hide'  => esc_html__( 'Hide Sidebar', 'magazinebook' ),
		),
	)
);

$wp_customize->add_setting(
	'magazinebook_page_sidebar_position',
	array(
		'default'           => 'right',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_radio',
	)
);
$wp_customize->add_control(
	'magazinebook_page_sidebar_position',
	array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Page Sidebar Position:', 'magazinebook' ),
		'section'  => 'magazinebook_sidebar_positions_section',
		'settings' => 'magazinebook_page_sidebar_position',
		'choices'  => array(
			'right' => esc_html__( 'Sidebar on Right', 'magazinebook' ),
			'left'  => esc_html__( 'Sidebar on Left', 'magazinebook' ),
			'hide'  => esc_html__( 'Hide Sidebar', 'magazinebook' ),
		),
	)
);

$wp_customize->add_setting(
	'magazinebook_archive_sidebar_position',
	array(
		'default'           => 'right',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_radio',
	)
);
$wp_customize->add_control(
	'magazinebook_archive_sidebar_position',
	array(
		'type'        => 'radio',
		'label'       => esc_html__( 'Archive Sidebar Position:', 'magazinebook' ),
		'description' => esc_html__( 'Sidebar position for archive pages like category archives, author archives, tag archives, etc.', 'magazinebook' ),
		'section'     => 'magazinebook_sidebar_positions_section',
		'settings'    => 'magazinebook_archive_sidebar_position',
		'choices'     => array(
			'right' => esc_html__( 'Sidebar on Right', 'magazinebook' ),
			'left'  => esc_html__( 'Sidebar on Left', 'magazinebook' ),
			'hide'  => esc_html__( 'Hide Sidebar', 'magazinebook' ),
		),
	)
);

// Add primary color section.
$wp_customize->add_section(
	'magazinebook_color_options_section',
	array(
		'title' => __( 'Color Options', 'magazinebook' ),
		'panel' => 'magazinebook_design_options',
	)
);

$wp_customize->add_setting(
	'magazinebook_primary_color',
	array(
		'default'              => '#007bff',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'sanitize_hex_color',
		'sanitize_js_callback' => 'magazinebook_color_escaping_option_sanitize',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'magazinebook_primary_color',
		array(
			'label'       => esc_html__( 'Select Primary Color:', 'magazinebook' ),
			'description' => esc_html__( 'This will reflect in links, buttons and many other places. Choose a color to match your site.', 'magazinebook' ),
			'section'     => 'magazinebook_color_options_section',
			'settings'    => 'magazinebook_primary_color',
			'priority'    => 1,
		)
	)
);

$wp_customize->add_setting(
	'magazinebook_base_color_skin',
	array(
		'default'           => 'light',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_radio',
	)
);
$wp_customize->add_control(
	'magazinebook_base_color_skin',
	array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Base Color Skin:', 'magazinebook' ),
		'section'  => 'magazinebook_color_options_section',
		'settings' => 'magazinebook_base_color_skin',
		'choices'  => array(
			'light' => esc_html__( 'Light', 'magazinebook' ),
			'dark'  => esc_html__( 'Dark', 'magazinebook' ),
		),
	)
);


// Add font section.
$wp_customize->add_section(
	'magazinebook_fonts_section',
	array(
		'title' => __( 'Font Options', 'magazinebook' ),
		'panel' => 'magazinebook_design_options',
	)
);

$wp_customize->add_setting(
	'magazinebook_font_combo',
	array(
		'default'           => 'default',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_radio',
	)
);
$wp_customize->add_control(
	'magazinebook_font_combo',
	array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Select Font Combination Option:', 'magazinebook' ),
		'section'  => 'magazinebook_fonts_section',
		'settings' => 'magazinebook_font_combo',
		'choices'  => array(
			'default' => esc_html__( 'Default', 'magazinebook' ),
			'option1' => esc_html__( 'Option 1', 'magazinebook' ),
			'option2' => esc_html__( 'Option 2', 'magazinebook' ),
			'option3' => esc_html__( 'Option 3', 'magazinebook' ),
		),
	)
);
