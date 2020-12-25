<?php
/**
 * TimesNews Main Banner
 *
 * @package timesnews
 */

/**
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

$wp_customize->add_setting( 'select_main_banner_category', array(
    'default' => '',
    'sanitize_callback' => 'timesnews_sanitize_select',
));
$wp_customize->add_control( 'select_main_banner_category', array(
    'priority'=>10,
    'label' => esc_html__('Select Main Banner', 'timesnews'),
    'section' => 'timesnews_main_banner_section',
    'type' => 'select',
    'choices'   =>  timesnews_cat_list()
));