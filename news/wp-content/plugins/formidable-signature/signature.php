<?php
/*
 * Plugin Name: Formidable Digital Signatures
 * Description: Collect e-signatures in your Formidable forms
 * Version: 2.03
 * Plugin URI: https://formidableforms.com
 * Author URI: https://formidableforms.com
 * Author: Strategy11
 * Text domain: frmsig
 */

function frm_sig_autoloader( $class_name ) {
	$path = dirname( __FILE__ );

	// Only load Frm classes here.
	if ( ! preg_match( '/^FrmSig.+$/', $class_name ) ) {
		return;
	}

	if ( preg_match( '/^.+Helper$/', $class_name ) ) {
		$path .= '/helpers/' . $class_name . '.php';
	} elseif ( preg_match( '/^.+Controller$/', $class_name ) ) {
		$path .= '/controllers/' . $class_name . '.php';
	} else {
		$path .= '/models/' . $class_name . '.php';
	}

	if ( file_exists( $path ) ) {
		include( $path );
	}
}

// Add the autoloader.
spl_autoload_register( 'frm_sig_autoloader' );

// Load hooks.
add_action( 'plugins_loaded', 'FrmSigHooksController::load_hooks' );
