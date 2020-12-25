<?php
/*
Plugin Name: Formidable Logs
Description: Log events from Formidable and other add-ons
Version: 1.0b1
Plugin URI: http://formidablepro.com/
Author URI: http://formidablepro.com/
Author: Strategy11
Text Domain: formidable-logs
*/

function frm_log_autoloader( $class_name ) {
    // Only load FrmLog classes here
	if ( ! preg_match( '/^FrmLog.+$/', $class_name ) && 'FrmLog' != $class_name ) {
        return;
    }

    $filepath = dirname(__FILE__);

	if ( preg_match( '/^.+Helper$/', $class_name ) ) {
        $filepath .= '/helpers/';
	} else if ( preg_match( '/^.+Controller$/', $class_name ) ) {
        $filepath .= '/controllers/';
    } else {
        $filepath .= '/models/';
    }

    $filepath .= $class_name .'.php';

    if ( file_exists($filepath) ) {
        include($filepath);
    }
}

// Add the autoloader
spl_autoload_register('frm_log_autoloader');

FrmLogHooksController::load_hooks();
