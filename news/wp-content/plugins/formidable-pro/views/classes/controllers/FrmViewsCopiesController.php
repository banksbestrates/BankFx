<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmViewsCopiesController {

	public static function activation_install() {
		// make sure post type exists before creating any views
		FrmViewsDisplaysController::register_post_types();
	}

	public static function save_copied_display( $id, $values ) {
		global $wpdb, $blog_id;

		$wpdb->delete(
			FrmProCopy::table_name(),
			array(
				'form_id' => $id,
				'type'    => 'display',
				'blog_id' => $blog_id,
			)
		);

		if ( ! empty( $values['options']['copy'] ) ) {
			FrmProCopy::create(
				array(
					'form_id' => $id,
					'type'    => 'display',
				)
			);
		}
	}

	public static function destroy_copied_display( $id ) {
		global $blog_id;
		$copies = FrmProCopy::getAll(
			array(
				'blog_id' => $blog_id,
				'form_id' => $id,
				'type'    => 'display',
			)
		);
		foreach ( $copies as $copy ) {
			FrmProCopy::destroy( $copy->id );
			unset( $copy );
		}
	}
}
