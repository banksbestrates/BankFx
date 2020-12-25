<?php
/*********************************************************************************************************
Demos
**********************************************************************************************************/

 	function seos_magazine_demo_slider($wp_customize) {

		$wp_customize->add_section( 'demo_slider' , array(
			'title'       => __( 'Seos Magazine Slider 🔒', 'seos-magazine' ),
			'description' => __( '<a target="_blank" href="http://seosthemes.info/seos-magazine-free-wordpress-theme/">Preview Premium</a>', 'seos-magazine' ),
			'priority'		=> 2
		) );	

	
		$wp_customize->add_setting('seos_demo_slider', array(         
		'default'     => '',
		 'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'seos_demo_slider', array(
		'label' => __('Seos Magazine Slider', 'seos-magazine'),        
		'section' => 'demo_slider',
		'settings' => 'seos_demo_slider',
		'type'		=> 'radio'
		)));





/**********************************************************************************************************/



		$wp_customize->add_section( 'demo_main' , array(
			'title'       => __( 'Custom Main Container 🔒', 'seos-magazine' ),
			'description' => __( '<a target="_blank" href="http://seosthemes.info/seos-magazine-free-wordpress-theme/">Preview Premium</a>', 'seos-magazine' ),
			'priority'		=> 2
		) );	

	
		$wp_customize->add_setting('seos_demo_main', array(         
		'default'     => '',
		 'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'seos_demo_main', array(
		'label' => __('Custom Main Container', 'seos-magazine'),        
		'section' => 'demo_main',
		'settings' => 'seos_demo_main',
		'type'		=> 'radio'
		)));


/**********************************************************************************************************/



		$wp_customize->add_section( 'demo_contacts' , array(
			'title'       => __( 'Contacts 🔒', 'seos-magazine' ),
			'description' => __( '<a target="_blank" href="http://seosthemes.info/seos-magazine-free-wordpress-theme/">Preview Premium</a>', 'seos-magazine' ),
			'priority'		=> 2
		) );	

	
		$wp_customize->add_setting('seos_demo_contacts', array(         
		'default'     => '',
		 'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'seos_demo_contacts', array(
		'label' => __('Contacts', 'seos-magazine'),        
		'section' => 'demo_contacts',
		'settings' => 'seos_demo_contacts',
		'type'		=> 'radio'
		)));
		
/**********************************************************************************************************/



		$wp_customize->add_section( 'demo_social_media' , array(
			'title'       => __( 'Social Media 🔒', 'seos-magazine' ),
			'description' => __( '<a target="_blank" href="http://seosthemes.info/seos-magazine-free-wordpress-theme/">Preview Premium</a>', 'seos-magazine' ),
			'priority'		=> 2
		) );	

	
		$wp_customize->add_setting('seos_demo_social_media', array(         
		'default'     => '',
		 'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'seos_demo_social_media', array(
		'label' => __('Social Media', 'seos-magazine'),        
		'section' => 'demo_social_media',
		'settings' => 'seos_demo_social_media',
		'type'		=> 'radio'
		)));
		
/**********************************************************************************************************/



		$wp_customize->add_section( 'demo_footer_options' , array(
			'title'       => __( 'Footer Options 🔒', 'seos-magazine' ),
			'description' => __( '<a target="_blank" href="http://seosthemes.info/seos-magazine-free-wordpress-theme/">Preview Premium</a>', 'seos-magazine' ),
			'priority'		=> 2
		) );	

	
		$wp_customize->add_setting('seos_demo_footer_options', array(         
		'default'     => '',
		 'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'seos_demo_footer_options', array(
		'label' => __('Footer Options', 'seos-magazine'),        
		'section' => 'demo_footer_options',
		'settings' => 'seos_demo_footer_options',
		'type'		=> 'radio'
		)));
		
/**********************************************************************************************************/

		$wp_customize->add_section( 'demo1' , array(
			'title'       => __( 'Back to Top 🔒', 'seos-magazine' ),
			'description' => __( '<a target="_blank" href="http://seosthemes.info/seos-magazine-free-wordpress-theme/">Preview Premium</a>', 'seos-magazine' ),
			'priority'		=> 2
		) );	

	
		$wp_customize->add_setting('seos_demo1', array(         
		'default'     => '',
		 'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'seos_demo1', array(
		'label' => __('Back to Top', 'seos-magazine'),        
		'section' => 'demo1',
		'settings' => 'seos_demo1',
		'type'		=> 'radio'
		)));

}

add_action('customize_register', 'seos_magazine_demo_slider');
