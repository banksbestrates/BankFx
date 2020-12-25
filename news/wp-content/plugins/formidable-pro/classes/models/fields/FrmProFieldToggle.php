<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

/**
 * @since 3.0
 */
class FrmProFieldToggle extends FrmFieldType {

	/**
	 * @var string
	 * @since 3.0
	 */
	protected $type = 'toggle';

	protected function field_settings_for_type() {
		$settings = array();

		FrmProFieldsHelper::fill_default_field_display( $settings );
		return $settings;
	}

	protected function extra_field_opts() {
		return array(
			'show_label' => false,
			'toggle_on'  => __( 'Yes', 'formidable-pro' ),
			'toggle_off' => __( 'No', 'formidable-pro' ),
		);
	}

	/**
	 * @since 4.0
	 * @param array $args - Includes 'field', 'display', and 'values'
	 */
	public function show_primary_options( $args ) {
		$field = $args['field'];
		include( FrmProAppHelper::plugin_path() . '/classes/views/frmpro-fields/back-end/toggle-labels.php' );

		parent::show_primary_options( $args );
	}

	/**
	 * @since 3.06.01
	 */
	public function translatable_strings() {
		$strings   = parent::translatable_strings();
		$strings[] = 'toggle_on';
		$strings[] = 'toggle_off';
		return $strings;
	}

	protected function builder_text_field( $name = '' ) {
		$this->set_field_column( 'value', $this->get_field_column('default_value') );
		$args = array(
			'html_id'    => $this->html_id(),
			'field_name' => $this->html_name( $name ),
			'is_builder' => true,
		);
		return $this->front_field_input( $args, array() );
	}

	public function front_field_input( $args, $shortcode_atts ) {
		if ( isset( $args['is_builder'] ) ) {
			$input_html = '';
		} else {
			$input_html = $this->get_field_input_html_hook( $this->field );
			$this->add_aria_description( $args, $input_html );
		}

		$checked_values = $this->get_field_column('value');

		$show_labels = FrmField::get_option( $this->field, 'show_label' );
		$off_label = FrmField::get_option( $this->field, 'toggle_off' );
		$on_label = FrmField::get_option( $this->field, 'toggle_on' );

		$checked = FrmAppHelper::check_selected( $checked_values, $on_label ) ? ' checked="checked" ' : '';
		$input = '<div>';

		$data = '';

		$input .= '<label class="frm_switch_block">' . "\r\n";
		if ( $show_labels && ! empty( $off_label ) ) {
			$data = ' data-off="' . esc_attr( $off_label ) . '"';
			$input .= '<span class="frm_off_label frm_switch_opt">' . $off_label . '</span>';
		}

		$input .= '<input type="checkbox" name="' . esc_attr( $args['field_name'] ) . '[]" id="' . esc_attr( $args['html_id'] ) . '" value="' . esc_attr( $on_label ) . '" ' . $checked . $data . $input_html . '/>' . "\r\n";
		$input .= '<span class="frm_switch">' . "\r\n";
		$input .= '<span class="frm_slider"></span>' . "\r\n";
		$input .= '</span>';
		if ( $show_labels && $on_label != 1 ) {
			$input .= '<span class="frm_on_label frm_switch_opt">' . $on_label . '</span>' . "\r\n";
		}
		$input .= '</label>';
		$input .= '</div>';

		return $input;
	}

	/**
	 * If no value is saved, set the off label if it's not 0.
	 *
	 * @since 3.06.01
	 * @param array $args
	 * @return array errors
	 */
	public function validate( $args ) {
		if ( empty( $args['value'] ) ) {
			$off_label = FrmField::get_option( $this->field, 'toggle_off' );
			if ( ! empty( $off_label ) ) {
				FrmEntriesHelper::set_posted_value( $this->field, $off_label, $args );
			}
		}

		return array();
	}
}
