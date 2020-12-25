<?php
/*
Plugin Name: Post Ticker Ultimate
Plugin URL: https://www.wponlinesupport.com/plugins/
Text Domain: ticker-ultimate
Domain Path: /languages/
Description: Ultimate Post Ticker Plugin : Add and display horizontal or vertical ticker on your website that work with WordPress posts and Custom Post Type with the help of shortcode. Also work with Gutenberg shortcode block.
Version: 1.3
Author: WP OnlineSupport
Author URI: https://www.wponlinesupport.com/
Contributors: WP OnlineSupport
*/

if( ! defined( 'WPTU_VERSION' ) ) {
	define( 'WPTU_VERSION', '1.3' ); // Version of plugin
}
if( ! defined( 'WPTU_POST_TYPE' ) ) {
	define( 'WPTU_POST_TYPE', 'wptu_ticker' ); // Plugin post type
}
if( ! defined( 'WPTU_DIR' ) ) {
	define( 'WPTU_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( ! defined( 'WPTU_URL' ) ) {
	define( 'WPTU_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( ! defined( 'WPTU_PLUGIN_BASENAME' ) ) {
	define( 'WPTU_PLUGIN_BASENAME', plugin_basename( __FILE__ ) ); // Plugin base name
}
if( ! defined( 'WPTU_CAT' ) ) {
	define( 'WPTU_CAT', 'wptu-ticker-category' ); // Plugin category name
}
if( ! defined( 'WPTU_META_PREFIX' ) ) {
	define( 'WPTU_META_PREFIX', '_wptu_' ); // Plugin metabox prefix
}

/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @package Ticker Ultimate
 * @since 1.0.0
 */
function wptu_ticker_load_textdomain() {
	load_plugin_textdomain( 'ticker-ultimate', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}
add_action('plugins_loaded', 'wptu_ticker_load_textdomain');

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package Ticker Ultimate
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'wptu_ticker_install' );

/**
 * Plugin Activation Function
 * Does the initial setup, sets the default values for the plugin options
 * 
 * @package Ticker Ultimate
 * @since 1.0.0
 */
function wptu_ticker_install() {
	
	// Custom post type and taxonomy function
	wptu_register_post_type();
	wptu_register_taxonomies();
	
	// IMP to call to generate new rules
	flush_rewrite_rules();

	if( is_plugin_active('ticker-ultimate-pro/wptu-ticker-ultimate-pro.php') ){
	 add_action('update_option_active_plugins', 'deactivate_premium_version_wptu');
	}

}

/**
 * Deactivate pro plugin
 * 
 * @package Ticker Ultimate
 * @since 1.0.1
 */
function deactivate_premium_version_wptu(){
   deactivate_plugins('ticker-ultimate-pro/wptu-ticker-ultimate-pro.php',true);
}

// Action to add admin notice
add_action( 'admin_notices', 'wptu_admin_notice' );

/**
 * Admin notice
 * 
 * @package Ticker Ultimate
 * @since 1.0.1
 */
function wptu_admin_notice() {
	
	global $pagenow;

	// If PRO plugin is active and free plugin exist
	$dir                = WP_PLUGIN_DIR . '/ticker-ultimate-pro/wptu-ticker-ultimate-pro.php';
	$notice_link        = add_query_arg( array('message' => 'wptu-plugin-notice'), admin_url('plugins.php') );
	$notice_transient   = get_transient( 'wptu_install_notice' );

	if ( $notice_transient == false &&  $pagenow == 'plugins.php' && file_exists($dir) && current_user_can( 'install_plugins' ) ) {
		echo '<div class="updated notice" style="position:relative;">
				<p>
					<strong>'.sprintf( __('Thank you for activating %s', 'ticker-ultimate'), 'Ticker Ultimate').'</strong>.<br/>
					'.sprintf( __('It looks like you had PRO version %s of this plugin activated. To avoid conflicts the extra version has been deactivated and we recommend you delete it.', 'ticker-ultimate'), '<strong>(<em>Ticker Ultimate PRO</em>)</strong>' ).'
				</p>
				<a href="'.esc_url( $notice_link ).'" class="notice-dismiss" style="text-decoration:none;"></a>
			</div>';      
	}
}

// Functions file
require_once( WPTU_DIR . '/includes/wptu-functions.php' );

// Plugin Post type file
require_once( WPTU_DIR . '/includes/wptu-post-types.php' );

// Scripts
require_once( WPTU_DIR . '/includes/class-wptu-script.php' );

// Shortcode
require_once( WPTU_DIR . '/includes/shortcode/wptu-ticker-shortcode.php');

//admin file
require_once( WPTU_DIR . '/includes/admin/class-wptu-admin.php');

/* Recommended Plugins Starts */
if ( is_admin() ) {
	require_once( WPTU_DIR . '/wpos-plugins/wpos-recommendation.php' );

	wpos_espbw_init_module( array(
							'prefix'	=> 'wptu',
							'menu'		=> 'edit.php?post_type='.WPTU_POST_TYPE,
							'position'	=> 3,
						));
}
/* Recommended Plugins Ends */

/* Plugin Wpos Analytics Data Starts */
function wpos_analytics_anl5_load() {

	require_once dirname( __FILE__ ) . '/wpos-analytics/wpos-analytics.php';

	$wpos_analytics =  wpos_anylc_init_module( array(
							'id'			=> 5,
							'file'			=> plugin_basename( __FILE__ ),
							'name'			=> 'Ticker Ultimate',
							'slug'			=> 'ticker-ultimate',
							'type'			=> 'plugin',
							'menu'			=> 'edit.php?post_type=wptu_ticker',
							'text_domain'	=> 'ticker-ultimate',							
						));

	return $wpos_analytics;
}

// Init Analytics
wpos_analytics_anl5_load();
/* Plugin Wpos Analytics Data Ends */