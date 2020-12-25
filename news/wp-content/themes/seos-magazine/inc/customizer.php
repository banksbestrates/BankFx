<?php
/**
 * Seos  Magazine Theme Customizer.
 *
 * @package Seos__Magazine
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function seos_magazine_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function seos_magazine_customize_preview_js() {
	wp_enqueue_script( 'seos_magazine_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'seos_magazine_customize_preview_js' );

/***********************************************************************************
 * Recent News
***********************************************************************************/	
		
		$wp_customize->add_section( 'seos_magazine_news_section' , array(
			'title'       => __( 'Recent News', 'seos-magazine' ),
			'description' => __( 'Select IMG and Recent News will be activated in your home page.', 'seos-magazine' ),
			'priority'		=> 3,
		) );
		
		$wp_customize->add_setting( 'recent_news_img', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
			$wp_customize, 
			'recent_news_img', 
			array(
				'label'      => __( 'Recent News IMG:', 'seos-magazine' ),
				'description' => __( 'Load IMG from your media:', 'seos-magazine' ),
				'section'    => 'seos_magazine_news_section',
				'settings'   => 'recent_news_img',
			) ) );
			
		$wp_customize->add_setting( 'recent_news_title', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recent_news_title', array(
			'label'    => __( 'Recent News Title:', 'seos-magazine' ),
			'section'  => 'seos_magazine_news_section',
			'description' => __( 'The title of your Recent News. Will be activated in your home page:', 'seos-magazine' ),
			'settings' => 'recent_news_title',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'recent_news_text', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recent_news_text', array(
			'label'    => __( 'Recent News Text:', 'seos-magazine' ),
			'section'  => 'seos_magazine_news_section',
			'description' => __( 'Content of your Recent News. Will be activated in your home page:', 'seos-magazine' ),
			'settings' => 'recent_news_text',
			'type' => 'textarea',
		) ) );
			
		$wp_customize->add_setting( 'recent_news_url', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recent_news_url', array(
			'label'    => __( 'Recent News URL:', 'seos-magazine' ),
			'section'  => 'seos_magazine_news_section',
			'description' => __( 'Copy and paste the URL from your media:', 'seos-magazine' ),			
			'settings' => 'recent_news_url',
		) ) );		

		
/***********************************************************************************
 * Header Logo
***********************************************************************************/
		
		$wp_customize->add_section( 'seos_magazine_news_section_logo' , array(
			'title'       => __( 'Header Logo', 'seos-magazine' ),
			'description' => __( 'Your theme recommends a header logo size of 250 x 90 pixels.', 'seos-magazine' ),
			'priority'		=> 3,
		) );
		
		$wp_customize->add_setting( 'header_logo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
			$wp_customize, 
			'header_logo', 
			array(
				'label'      => __( 'Header Logo:', 'seos-magazine' ),
				'section'    => 'seos_magazine_news_section_logo',
				'settings'   => 'header_logo',
			) ) );
	
}
add_action( 'customize_register', 'seos_magazine_customize_register' );		