<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

/**
 * @since 3.0
 */
class FrmProFieldEndDivider extends FrmFieldType {

	/**
	 * @var string
	 * @since 3.0
	 */
	protected $type = 'end_divider';

	/**
	 * @var bool
	 * @since 3.0
	 */
	protected $has_input = false;

	/**
	 * @var bool
	 * @since 3.0
	 */
	protected $has_html = false;

	protected function include_form_builder_file() {
		return FrmProAppHelper::plugin_path() . '/classes/views/frmpro-fields/back-end/field-' . $this->type . '.php';
	}

	protected function field_settings_for_type() {
		$settings = array(
			'required'      => false,
			'visibility'    => false,

			'description'   => false,
			'label_position' => false,

			'label'         => false,
			'logic'         => false,
		);

		FrmProFieldsHelper::fill_default_field_display( $settings );
		return $settings;
	}

	protected function extra_field_opts() {
		return array(
			'add_label'    => __( 'Add', 'formidable-pro' ),
			'remove_label' => __( 'Remove', 'formidable-pro' ),
			'format'       => 'both', // set icon format
		);
	}

	/**
	 * @since 4.0
	 * @param array $args - Includes 'field', 'display', and 'values'
	 */
	public function show_primary_options( $args ) {
		$field = $args['field'];
		include( FrmProAppHelper::plugin_path() . '/classes/views/frmpro-fields/back-end/repeat-buttons.php' );

		parent::show_primary_options( $args );
	}

	/**
	 * @since 3.06.01
	 */
	public function translatable_strings() {
		return array( 'add_label', 'remove_label' );
	}

	public function prepare_field_html( $args ) {
		global $frm_vars;

		$html = '';

		// close the section's frm_field_x_container div
		if ( isset( $frm_vars['div'] ) && $frm_vars['div'] ) {
			$html .= "</div>\n";
			$frm_vars['div'] = false;
		}

		// close the collapsible section toggle div
		if ( isset( $frm_vars['collapse_div'] ) && $frm_vars['collapse_div'] ) {
			$html .= "</div>\n";
			$frm_vars['collapse_div'] = false;
		}

		return $html;
	}

	public function get_label_class() {
		return $this->get_field_column( 'label' );
	}
}
