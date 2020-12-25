<?php

class FrmLogHooksController {

	public static function load_hooks() {
		add_action( 'admin_init', 'FrmLogAppController::include_updater', 1 );
		add_action( 'init', 'FrmLogAppController::register_post_types', 0 );
        add_action( 'admin_menu', 'FrmLogAppController::menu', 15 );
        add_filter( 'admin_head-post.php', 'FrmLogAppController::highlight_menu' );
        add_filter( 'admin_head-post-new.php', 'FrmLogAppController::highlight_menu' );
		add_action( 'add_meta_boxes', 'FrmLogAppController::add_meta_to_log' );

		$post_type = 'frm_logs';
		add_filter( 'manage_edit-' . $post_type . '_columns', 'FrmLogList::manage_columns' );
		add_action( 'manage_' . $post_type . '_posts_custom_column', 'FrmLogList::manage_custom_columns', 10, 2 );
		add_filter( 'post_row_actions', 'FrmLogList::post_row_actions', 10, 2 );
	}
}
