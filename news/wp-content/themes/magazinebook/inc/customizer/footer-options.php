<?php
/**
 * MagazineBook Theme Customizer - Footer options
 *
 * @package MagazineBook
 */

// Add Footer Options panel.
$wp_customize->add_panel(
	'magazinebook_footer_options',
	array(
		'capabitity'  => 'edit_theme_options',
		'description' => __( 'Change the Footer Settings', 'magazinebook' ),
		'priority'    => 502,
		'title'       => __( 'Footer Options', 'magazinebook' ),
	)
);

// Add main header design section.
$wp_customize->add_section(
	'magazinebook_main_footer_section',
	array(
		'title' => __( 'Main Footer Area Options', 'magazinebook' ),
		'panel' => 'magazinebook_footer_options',
	)
);

$wp_customize->add_setting(
	'magazinebook_main_footer_design',
	array(
		'default'           => 'design1',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_radio',
	)
);
$wp_customize->add_control(
	'magazinebook_main_footer_design',
	array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Main Footer Design:', 'magazinebook' ),
		'section'  => 'magazinebook_main_footer_section',
		'settings' => 'magazinebook_main_footer_design',
		'choices'  => array(
			'design1' => esc_html__( 'Type 1', 'magazinebook' ),
			'design2' => esc_html__( 'Type 2', 'magazinebook' ),
		),
	)
);

$wp_customize->add_setting(
	'magazinebook_main_footer_right',
	array(
		'default'           => 'social',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_radio',
	)
);
$wp_customize->add_control(
	'magazinebook_main_footer_right',
	array(
		'type'            => 'radio',
		'label'           => esc_html__( 'Footer Right Side:', 'magazinebook' ),
		'section'         => 'magazinebook_main_footer_section',
		'settings'        => 'magazinebook_main_footer_right',
		'active_callback' => function () {
			if ( get_theme_mod( 'magazinebook_main_footer_design', 'design1' ) === 'design2' ) {
				return true;
			}
			return false;
		},
		'choices'         => array(
			'social' => esc_html__( 'Social Media Links', 'magazinebook' ),
			'text'   => esc_html__( 'Text', 'magazinebook' ),
		),
	)
);

$wp_customize->add_setting(
	'magazinebook_main_footer_right_text',
	array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'magazinebook_main_footer_right_text',
	array(
		'type'            => 'text',
		'label'           => esc_html__( 'Footer Right Text:', 'magazinebook' ),
		'section'         => 'magazinebook_main_footer_section',
		'settings'        => 'magazinebook_main_footer_right_text',
		'active_callback' => function () {
			if ( get_theme_mod( 'magazinebook_main_footer_design', 'design1' ) === 'design2' && get_theme_mod( 'magazinebook_main_footer_right', 'social' ) === 'text' ) {
				return true;
			}
			return false;
		},
	)
);
