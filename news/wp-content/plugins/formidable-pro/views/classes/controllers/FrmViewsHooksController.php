<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmViewsHooksController {

	public static function load_views() {
		global $frm_vars;
		if ( ! $frm_vars['pro_is_authorized'] ) {
			return;
		}

		add_action( 'admin_init', 'FrmViewsAppController::admin_init' );

		add_filter( 'frm_load_controllers', 'FrmViewsHooksController::load_controllers' );
		FrmHooksController::trigger_load_hook();
		remove_filter( 'frm_load_controllers', 'FrmViewsHooksController::load_controllers' );
		add_filter( 'frm_load_controllers', 'FrmViewsHooksController::add_hook_controller' );
	}

	public static function load_controllers( $controllers ) {
		unset( $controllers[0] ); // don't load hooks in free again
		unset( $controllers[1] ); // don't load pro either
		return self::add_hook_controller( $controllers );
	}

	public static function add_hook_controller( $controllers ) {
		$controllers[] = 'FrmViewsHooksController';
		return $controllers;
	}

	public static function load_hooks() {
		add_action( 'wp_before_admin_bar_render', 'FrmViewsAppController::admin_bar_configure', 25 );
		add_action( 'init', 'FrmViewsDisplaysController::register_post_types', 0 );
		add_action( 'init', 'FrmViewsSimpleBlocksController::register_simple_view_block', 20 );
		add_action( 'before_delete_post', 'FrmViewsDisplaysController::before_delete_post' );
		add_action( 'widgets_init', 'FrmViewsDisplaysController::register_widgets' );
		add_action( 'genesis_init', 'FrmViewsAppController::load_genesis' );

		add_filter( 'the_content', 'FrmViewsDisplaysController::get_content', 1 );

		add_shortcode( 'display-frm-data', 'FrmViewsDisplaysController::get_shortcode' );
	}

	public static function load_admin_hooks() {
		add_action( 'frm_after_uninstall', 'FrmViewsDb::uninstall' );
		add_action( 'admin_menu', 'FrmViewsDisplaysController::menu', 13 );
		add_action( 'restrict_manage_posts', 'FrmViewsDisplaysController::switch_form_box' );
		add_action( 'post_submitbox_misc_actions', 'FrmViewsDisplaysController::submitbox_actions' );
		add_action( 'add_meta_boxes', 'FrmViewsDisplaysController::add_meta_boxes' );
		add_action( 'save_post', 'FrmViewsDisplaysController::save_post' );
		add_action( 'frm_destroy_form', 'FrmViewsDisplaysController::delete_views_for_form' );
		add_action( 'manage_frm_display_posts_custom_column', 'FrmViewsDisplaysController::manage_custom_columns', 10, 2 );

		add_filter( 'parse_query', 'FrmViewsDisplaysController::filter_forms' );
		add_filter( 'frm_form_nav_list', 'FrmViewsAppController::form_nav', 9, 2 );
		add_filter( 'admin_head-post.php', 'FrmViewsDisplaysController::highlight_menu' );
		add_filter( 'admin_head-post-new.php', 'FrmViewsDisplaysController::highlight_menu' );
		add_filter( 'views_edit-frm_display', 'FrmViewsDisplaysController::add_form_nav' );
		add_filter( 'edit_form_top', 'FrmViewsDisplaysController::add_form_nav_edit' );
		add_filter( 'post_row_actions', 'FrmViewsDisplaysController::post_row_actions', 10, 2 );
		add_filter( 'default_content', 'FrmViewsDisplaysController::default_content', 10, 2 );
		add_filter( 'manage_edit-frm_display_columns', 'FrmViewsDisplaysController::manage_columns' );
		add_filter( 'manage_edit-frm_display_sortable_columns', 'FrmViewsDisplaysController::sortable_columns' );
		add_filter( 'get_user_option_manageedit-frm_displaycolumnshidden', 'FrmViewsDisplaysController::hidden_columns' );
		add_filter( 'frm_popup_shortcodes', 'FrmViewsDisplaysController::popup_shortcodes', 9 );

		if ( FrmAppHelper::is_admin_page( 'formidable' ) ) {
			add_filter( 'frm_before_save_wppost_action', 'FrmViewsDisplaysController::save_wppost_action_displays', 11, 2 );
		}
	}

	public static function load_ajax_hooks() {
		add_action( 'wp_ajax_frm_get_cd_tags_box', 'FrmViewsDisplaysController::get_tags_box' );
		add_action( 'wp_ajax_frm_get_date_field_select', 'FrmViewsDisplaysController::get_date_field_select' );
		add_action( 'wp_ajax_frm_add_order_row', 'FrmViewsDisplaysController::get_order_row' );
		add_action( 'wp_ajax_frm_add_where_row', 'FrmViewsDisplaysController::get_where_row' );
		add_action( 'wp_ajax_frm_add_where_options', 'FrmViewsDisplaysController::get_where_options' );
		add_action( 'wp_ajax_frm_display_get_content', 'FrmViewsDisplaysController::get_post_content' );
	}

	public static function load_view_hooks() {
		add_filter( 'frm_after_display_content', 'FrmViewsDisplaysController::include_pagination', 9, 4 );
		add_filter( 'frm_keep_address_value_array', '__return_true' );
		add_filter( 'frm_keep_credit_card_value_array', '__return_true' );
	}

	public static function load_form_hooks() {

	}

	public static function load_multisite_hooks() {
		add_action( 'frm_after_install', 'FrmViewsCopiesController::activation_install', 20 );
		add_action( 'frm_create_display', 'FrmViewsCopiesController::save_copied_display', 20, 2 );
		add_action( 'frm_update_display', 'FrmViewsCopiesController::save_copied_display', 20, 2 );
		add_action( 'frm_destroy_display', 'FrmViewsCopiesController::destroy_copied_display' );
	}
}
