<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmViewsAppController {

	public static function load_lang() {
		load_plugin_textdomain( 'formidable-views', false, FrmViewsAppHelper::plugin_folder() . '/languages/' );
	}

	public static function admin_init() {
		self::include_updater();
	}

	private static function include_updater() {
		if ( class_exists( 'FrmAddon' ) ) {
			include_once FrmViewsAppHelper::plugin_path() . '/classes/models/FrmViewsUpdate.php';
			FrmViewsUpdate::load_hooks();
		}
	}

	public static function register_scripts() {

	}

	public static function admin_bar_configure() {
		if ( is_admin() || ! current_user_can( 'frm_edit_forms' ) ) {
			return;
		}

		$actions = array();
		self::add_views_to_admin_bar( $actions );

		if ( ! $actions ) {
			return;
		}

		self::maybe_add_parent_admin_bar();

		global $wp_admin_bar;

		foreach ( $actions as $id => $action ) {
			$wp_admin_bar->add_node(
				array(
					'parent' => 'frm-forms',
					'title'  => $action['name'],
					'href'   => $action['url'],
					'id'     => 'edit_' . $id,
				)
			);
		}
	}

	private static function maybe_add_parent_admin_bar() {
		global $wp_admin_bar;
		$has_node = $wp_admin_bar->get_node( 'frm-forms' );
		if ( ! $has_node ) {
			FrmFormsController::add_menu_to_admin_bar();
		}
	}

	private static function add_views_to_admin_bar( &$actions ) {
		global $frm_vars;

		if ( empty( $frm_vars['views_loaded'] ) ) {
			return;
		}

		foreach ( $frm_vars['views_loaded'] as $id => $name ) {
			$actions[ 'view_' . $id ] = array(
				'name' => sprintf( __( '%s View', 'formidable-views' ), $name ),
				'url'  => admin_url( 'post.php?post=' . intval( $id ) . '&action=edit' ),
			);
		}
		asort( $actions );
	}

	public static function form_nav( $nav, $atts ) {
		$form_id = absint( $atts['form_id'] );
		$nav[]   = array(
			'link'       => admin_url( 'edit.php?post_type=frm_display&frm-full=1&form=' . $form_id . '&show_nav=1' ),
			'label'      => __( 'Views', 'formidable-views' ),
			'current'    => array(),
			'page'       => 'frm_display',
			'permission' => 'frm_edit_displays',
		);
		return $nav;
	}

	public static function load_genesis() {
		// trigger Genesis hooks for integration
		FrmViewsAppHelper::load_genesis();
	}
}
