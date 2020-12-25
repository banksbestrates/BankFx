<?php 
 if ( ! function_exists( 'cbusiness_investment_setup' ) ) :
function cbusiness_investment_setup() {   
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'cbusiness-investment' )
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );	

		$defaults = array(
		'default-image'          => get_template_directory_uri() .'/view/images/slider.jpg',
		'default-text-color' => 'f03e3e',
		'width'                  => 1400,
		'height'                 => 500,
		'uploads'                => true,
		'wp-head-callback'   => 'cbusiness_investment_header_style',			
		);
		add_theme_support( 'custom-header', $defaults );

		//custom logo
		 $cbusiness_investment_custom_logo = array(
 		'height'      => 56,
 		'width'       => 224,
 		'flex-height' => true,
 		'flex-width'  => true,
 		'header-text' => array( 'site-title', 'site-description' ),
 		);
 	add_theme_support( 'custom-logo', $cbusiness_investment_custom_logo );
 	
} 
endif; // cbusiness_investment_setup
add_action( 'after_setup_theme', 'cbusiness_investment_setup' );

if ( ! function_exists( 'cbusiness_investment_the_custom_logo' ) ) :
function cbusiness_investment_the_custom_logo() {
    the_custom_logo();
}
endif;