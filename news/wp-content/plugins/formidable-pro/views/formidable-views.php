<?php
/*
Plugin Name: Formidable Views
Description: Add the power of views to your Formidable Forms to display your form submissions in listings, tables, calendars, and more.
Version: 4.0.03
Plugin URI: https://formidableforms.com/
Author URI: https://formidableforms.com/
Author: Strategy11
Text Domain: formidable-views
*/

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

if ( ! function_exists( 'load_formidable_views' ) ) {
	add_action( 'plugins_loaded', 'load_formidable_views', 1 );
	function load_formidable_views() {
		$is_free_installed = function_exists( 'load_formidable_forms' );
		$is_pro_installed  = function_exists( 'load_formidable_pro' );
		if ( $is_free_installed && $is_pro_installed ) {
			spl_autoload_register( 'frm_views_autoloader' );
			FrmViewsHooksController::load_views();
		}
	}

	function frm_views_autoloader( $class_name ) {
		// Only load Frm classes here
		if ( ! preg_match( '/^FrmViews.+$/', $class_name ) ) {
			return;
		}

		$filepath = dirname( __FILE__ );
		frm_class_autoloader( $class_name, $filepath );
	}
}
