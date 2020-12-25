<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Ticker Ultimate
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Wptu_Script {

	function __construct() {
		
 		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array( $this, 'wptu_front_style') );
		
		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array( $this, 'wptu_front_script') );
	}

	/**
	 * Function to add style at front side
	 * 
	 * @package Ticker Ultimate
 	 * @since 1.0.0
	 */
	function wptu_front_style() {

		// Registring public style
		wp_register_style( 'wptu-front-style', WPTU_URL.'assets/css/wptu-front.css', null, WPTU_VERSION );
		wp_enqueue_style('wptu-front-style');
	}
 
	/**
	 * Function to add script at front side
	 * 
	 * @package Ticker Ultimate
	 * @since 1.0.0
	 */
	function wptu_front_script() {
		
		// Registring ticker script
		if( !wp_script_is( 'wptu-ticker-script', 'registered' ) ) {
			wp_register_script( 'wptu-ticker-script', WPTU_URL . 'assets/js/wptu-ticker.js', array('jquery'), WPTU_VERSION, true );
		}
		// Registring public script
		wp_register_script( 'wptu-public-js', WPTU_URL . 'assets/js/wptu-public.js', array('jquery'), WPTU_VERSION, true );
	}
}

$wptu_script = new Wptu_Script();