<?php
/**
 * Flash News Categroy
 *
 * @package timesnews
 */

/**
 * Display Flash News Categroy in frontpage. 
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

$wp_customize->add_setting( 'flash_news_title_text', array(
	'default' => esc_html__('Flash News','timesnews'),
	'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'flash_news_title_text', array(
	'priority'=>20,
	'label' => esc_html__('Title', 'timesnews'),
	'section' => 'timesnews_flash_news_section',
	'type' => 'text',
));

$wp_customize->add_setting( 'flash_news_category', array(
	'default' => '',
	'sanitize_callback' => 'timesnews_sanitize_select',
));
$wp_customize->add_control( 'flash_news_category', array(
	'priority'=>30,
	'label' => esc_html__('Flash News', 'timesnews'),
	'description' => esc_html__('Select Category from Dropdown ', 'timesnews'),
	'section' => 'timesnews_flash_news_section',
	'type' => 'select',
	'choices'   =>  timesnews_cat_list()
));

