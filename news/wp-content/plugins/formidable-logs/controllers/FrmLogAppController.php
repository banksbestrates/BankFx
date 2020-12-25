<?php

class FrmLogAppController {

	public static $post_type = 'frm_logs';

    public static function include_updater() {
		if ( class_exists( 'FrmAddon' ) ) {
			FrmLogUpdate::load_hooks();
		}
    }

	public static function register_post_types() {
		register_post_type( self::$post_type, array(
			'label' => __( 'Logs', 'formidable-logs' ),
			'description' => '',
			'public' => false,
			'show_ui' => true,
			'exclude_from_search' => true,
			'show_in_nav_menus' => false,
			'show_in_menu' => false,
			'capability_type' => 'page',
			'capabilities' => array(
				'edit_post' => 'frm_edit_forms',
				'edit_posts' => 'frm_edit_forms',
				'edit_others_posts' => 'frm_edit_forms',
				'publish_posts' => 'frm_edit_forms',
				'delete_post' => 'frm_edit_forms',
				'delete_posts' => 'frm_edit_forms',
				'read_post' => 'frm_edit_forms',
			),
			'supports' => array(
				'title',
			),
			'has_archive' => false,
			'labels' => array(
				'name' => __( 'Logs', 'formidable-logs' ),
				'singular_name' => __( 'Log', 'formidable-logs' ),
				'menu_name' => __( 'Logs', 'formidable-logs' ),
				'edit' => __( 'Edit' ),
				'search_items' => __( 'Search Logs', 'formidable-logs' ),
				'not_found' => __( 'No Logs Found.', 'formidable-logs' ),
				'add_new_item' => __( 'Add New Log', 'formidable-logs' ),
				'edit_item' => __( 'Edit Log', 'formidable-logs' )
			)
		) );
	}

	public static function menu() {
		add_submenu_page( 'formidable', 'Formidable | ' . __( 'Logs', 'formidable-logs' ), __( 'Logs', 'formidable-logs' ), 'frm_edit_forms', 'edit.php?post_type=' . self::$post_type );
	}

	public static function highlight_menu() {
		FrmAppHelper::maybe_highlight_menu( self::$post_type );
	}

	public static function add_meta_to_log() {
		add_meta_box( 'frm-show-log', __( 'Log Details', 'formidable-logs' ), array( __CLASS__, 'show_log' ), self::$post_type );
	}

	public static function show_log( $post ) {
		global $wpdb;
		$custom_fields = FrmDb::get_results( $wpdb->postmeta, array( 'meta_key like' => 'frm_', 'post_ID' => $post->ID ) );
		include( FrmLogAppHelper::plugin_path() . '/views/show.php' );
	}
}
