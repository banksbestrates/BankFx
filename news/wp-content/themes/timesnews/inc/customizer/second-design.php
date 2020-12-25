<?php
/**
 * TimesNews Second Design
 *
 * @package timesnews
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

//Select Theme Layout
$wp_customize->add_setting( 'second-design-display', array(
    'default' => 'default',
    'sanitize_callback' => 'timesnews_sanitize_select',
));
$wp_customize->add_control( 'second-design-display', array(
    'priority'=> 10,
    'label' => esc_html__('Timesnews Second Design', 'timesnews'),
    'section' => 'timesnews_second_design_section',
    'type' => 'radio',
    'choices' => array(
        'default' => esc_html__( 'Default','timesnews' ),
        'second' => esc_html__( 'Second Design','timesnews' ),
    ),
));

$wp_customize->add_setting( 'attention_zone_category', array(
	'default' => '',
	'sanitize_callback' => 'timesnews_sanitize_select',
));
$wp_customize->add_control( 'attention_zone_category', array(
	'priority'=>30,
	'label' => esc_html__('Attention Zone', 'timesnews'),
	'description' => esc_html__('Only create two posts for this category. The second post will only display title and content. ', 'timesnews'),
	'section' => 'timesnews_second_design_section',
	'type' => 'select',
	'choices'   =>  timesnews_cat_list()
));

$wp_customize->add_setting( 'attention_zone_date', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'attention_zone_date', array(
	'priority'=>40,
	'label' => esc_html__('Date', 'timesnews'),
	'description' => esc_html__('Display only in second post', 'timesnews'),
	'section' => 'timesnews_second_design_section',
	'type' => 'text',
));
