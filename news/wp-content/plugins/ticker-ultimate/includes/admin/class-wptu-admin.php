<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package Ticker Ultimate
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Wptu_Admin {
	
	function __construct() {
		// Action to add metabox
		add_action( 'add_meta_boxes', array($this, 'wptu_metabox') );

		// Action to save metabox
		add_action( 'save_post', array($this,'wptu_save_metabox_value') );

		// Admin Init Processes
		add_action( 'admin_init', array($this, 'wptu_admin_init_process') );

		// Action to register admin menu
		add_action( 'admin_menu', array($this, 'wptu_register_menu') );
	}

	/**
	 * Function to add menu
	 * 
	 * @package Ticker Ultimate
	 * @since 1.0.0
	 */
	function wptu_register_menu() {

		// Premium feature page
		add_submenu_page( 'edit.php?post_type='.WPTU_POST_TYPE, __('Upgrade to PRO - Ticker Ultimate', 'ticker-ultimate'), '<span style="color:#2ECC71">'.__('Upgrade to PRO', 'ticker-ultimate').'</span>', 'manage_options', 'wptu-premium', array($this, 'wptu_premium_page') );
	}

	/**
	 * Premium Page Html
	 * 
	 * @package Ticker Ultimate
	 * @since 1.0.0
	 */
	function wptu_premium_page() {
		include_once( WPTU_DIR . '/includes/admin/settings/premium.php' );		
	}

	/**
	 * Ticker Post Settings Metabox
	 * 
	 * @package Ticker Ultimate
	 * @since 1.0.0
	 */
	function wptu_metabox() {
		add_meta_box( 'wptu-post-sett', __( 'Ticker Settings - Settings', 'ticker-ultimate' ), array($this, 'wptu_ticker_metabox_sett_mb_content'), WPTU_POST_TYPE, 'normal', 'high' );
	}

	/**
	 * News Post Settings Metabox HTML
	 * 
	 * @package Ticker Ultimate
	 * @since 1.0.0
	 */
	function wptu_ticker_metabox_sett_mb_content() {
		include_once( WPTU_DIR .'/includes/admin/metabox/wptu-post-sett-metabox.php');
	}

	/**
	 * Function to save metabox values
	 * 
	 * @package Ticker Ultimate
	 * @since 1.0.0
	 */
	function wptu_save_metabox_value( $post_id ) {

		global $post_type;
		
		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                	// Check Autosave
		|| ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )  	// Check Revision
		|| ( $post_type !=  WPTU_POST_TYPE ) )              					// Check if current post type is supported.
		{
		  return $post_id;
		}

		$prefix = WPTU_META_PREFIX; // Taking metabox prefix

		// Taking variables
		$read_more_link = isset($_POST[$prefix.'more_link']) ? wptu_slashes_deep(trim($_POST[$prefix.'more_link'])) : '';

		update_post_meta($post_id, $prefix.'more_link', $read_more_link);
	}

	/**
	 * Admin prior processes
	 * 
	 * @package Ticker Ultimate
	 * @since 1.4
	 */
	function wptu_admin_init_process() {

		// If plugin notice is dismissed
	    if( isset($_GET['message']) && $_GET['message'] == 'wptu-plugin-notice' ) {
	    	set_transient( 'wptu_install_notice', true, 604800 );
	    }
	}
}
$wptu_admin = new Wptu_Admin();