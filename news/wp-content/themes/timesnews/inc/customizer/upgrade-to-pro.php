<?php
/**
 * TimesNews Theme Customizer
 *
 * @package timesnews
 */

use WPTRT\Customize\Section\Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Button::class );

	$manager->add_section(
		new Button( $manager, 'timesnews_pro', [
			'title'       => __( 'TimesNews Pro', 'timesnews' ),
			'priority'    => 1,
			'button_text' => __( 'Upgrade To Pro', 'timesnews' ),
			'button_url'  => 'https://themespiral.com/themes/timesnews/'
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'timesnews-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'timesnews-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );