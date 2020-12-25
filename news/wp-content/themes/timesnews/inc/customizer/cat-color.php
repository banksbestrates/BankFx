<?php
/**
 * TimesNews Color Schemes
 *
 * @package timesnews
 */
$timesnews_cat_col = get_terms ('category');

// Category Color
$wp_customize->add_setting('main-title', array(
         'type'              => 'main-title-control',
         'sanitize_callback' => 'sanitize_text_field',            
     )
 );
 $wp_customize->add_control( new TimesNews_title_display( $wp_customize, 'timesnews-101', array(
         'priority' => 30,
         'label' => esc_html__('Category Lists', 'timesnews'),
         'description' => esc_html__('Change default Category Color to any','timesnews'),
         'section' => 'colors',
         'settings' => 'main-title',
     ) )
 );

foreach ( $timesnews_cat_col as $cat_list ) {
		$wp_customize->add_setting( 'cat_col_'.esc_html( strtolower( $cat_list->name ) ), array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cat_col_'.esc_html( strtolower( $cat_list->name ) ), array(
			'priority'   => 30,
			'description'       => esc_html( $cat_list->name ) ,
			'section'     => 'colors',
		) ) );
	}