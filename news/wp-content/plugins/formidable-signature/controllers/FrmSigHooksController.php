<?php

class FrmSigHooksController {

	public static function load_hooks() {
		if ( ! FrmSigAppHelper::is_formidable_compatible() ) {
			self::load_basic_admin_hooks();

			return;
		}

		FrmSigAppController::load_lang();

		add_filter( 'frm_pre_display_form', 'FrmSigAppController::register_scripts' );

		add_filter( 'frm_get_field_type_class', 'FrmSigAppController::get_signature_object_class', 10, 2 );
		add_filter( 'frm_setup_new_fields_vars', 'FrmSigAppController::check_signature_fields', 20, 2 );
		add_filter( 'frm_setup_edit_fields_vars', 'FrmSigAppController::check_signature_fields', 20, 3 );
		add_filter( 'frm_keep_signature_value_array', '__return_true' );

		// Value in frm-show-entry shortcode and entries tab
		add_filter( 'frm_display_value_atts', 'FrmSigAppController::signature_display_atts', 10, 2 );

		add_filter( 'frm_csv_value', 'FrmSigAppController::csv_value', 10, 2 );
		add_filter( 'frm_xml_field_export_value', 'FrmSigAppController::xml_value', 10, 2 );
		add_filter( 'frm_graph_value', 'FrmSigAppController::graph_value', 10, 2 );

		add_action( 'frm_before_destroy_entry', 'FrmSigAppController::delete_images' );

		self::load_admin_hooks();
	}

	public static function load_admin_hooks() {
		if ( ! is_admin() ) {
			return;
		}

		add_action( 'admin_init', 'FrmSigAppController::initialize', 0 );

		add_filter( 'frm_available_fields', 'FrmSigAppController::maybe_add_field' );
	}

	/**
	 * Load the basic admin hooks to allow updating and display notices
	 *
	 * @since 2.0
	 */
	private static function load_basic_admin_hooks() {
		if ( is_admin() ) {
			add_action( 'admin_init', 'FrmSigAppController::include_updater', 1 );
			add_action( 'admin_notices', 'FrmSigAppController::display_admin_notices' );
			add_action( 'after_plugin_row_formidable-signature/formidable-signature.php', 'FrmSigAppController::min_version_notice' );
		}
	}
}
