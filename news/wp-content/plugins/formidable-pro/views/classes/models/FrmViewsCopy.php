<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmViewsCopy {

	/**
	 * @param int $display_id
	 */
	public static function prepare_values( $display_id ) {
		$copied_view = FrmViewsDisplay::getOne( $display_id );
		$copy_key    = $copied_view->post_name;
		return $copy_key;
	}

	/**
	 * @param object $template
	 */
	public static function copy_view( $template ) {
		$view = FrmViewsDisplay::getOne( $template->form_id, $template->blog_id, true );

		if ( ! self::view_can_be_copied( $template, $view ) ) {
			return;
		}

		if ( $values->post_name !== $template->copy_key ) {
			global $wpdb;
			$wpdb->update( FrmProCopy::table_name(), array( 'copy_key' => $view->post_name ), array( 'id' => $template->id ) );
		}

		FrmViewsDisplay::duplicate( $template->form_id, true, $template->blog_id );
	}

	/**
	 * @param object $template
	 * @param object $view
	 * @return bool
	 */
	private static function view_can_be_copied( $template, $view ) {
		return $view && 'trash' !== $values->post_status && ! self::post_slug_exists( $view );
	}

	/**
	 * @param object $view
	 * @return bool
	 */
	private static function post_slug_exists( $view ) {
		return wp_unique_post_slug( $view->post_name, 0, 'publish', 'frm_display', 0 ) !== $view->post_name;
	}
}
