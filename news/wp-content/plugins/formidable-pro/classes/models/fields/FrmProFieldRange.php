<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

/**
 * @since 3.0
 */
class FrmProFieldRange extends FrmFieldType {

	/**
	 * @var string
	 * @since 3.0
	 */
	protected $type = 'range';

	protected function field_settings_for_type() {
		$settings = array(
			'invalid' => true,
			'range'   => true,
			'prefix'  => true,
		);

		FrmProFieldsHelper::fill_default_field_display( $settings );
		return $settings;
	}

	protected function builder_text_field( $name = '' ) {
		if ( is_object( $this->field ) ) {
			$min  = FrmField::get_option( $this->field, 'minnum' );
			$max  = FrmField::get_option( $this->field, 'maxnum' );
			$step = FrmField::get_option( $this->field, 'step' );
		} else {
			$min  = 0;
			$max  = 100;
			$step = 1;
		}

		$default_value = $this->get_default_value( $min, $max );

		$input = '<div class="frm_range_container">';
		$input .= $this->output_selected_value( $default_value, true );
		$input .= '<input type="range" name="' . esc_attr( $this->html_name( $name ) ) . '" id="' . esc_attr( $this->html_id() ) . '" value="' . esc_attr( $default_value ) . '" min="' . esc_attr( $min ) . '" max="' . esc_attr( $max ) . '" step="' . esc_attr( $step ) . '" />';
		$input .= $this->output_min_max_value( true );
		$input .= '</div>';

		return $input;
	}

	/**
	 * Reset the default value if it's out of range
	 *
	 * @since 3.0.06
	 */
	private function get_default_value( $min, $max ) {
		$default_value = $this->get_field_column( 'default_value' );
		$out_of_range = $default_value < $min || $default_value > $max;
		if ( $default_value !== '' && $out_of_range ) {
			$default_value = '';
		}
		return $default_value;
	}

	protected function extra_field_opts() {
		return array(
			'minnum' => 0,
			'maxnum' => 100,
			'step'   => 1,
		);
	}

	public function front_field_input( $args, $shortcode_atts ) {
		$input_html = $this->get_field_input_html_hook( $this->field );
		$this->add_aria_description( $args, $input_html );
		if ( is_callable( array( $this, 'add_min_max' ) ) ) {
			$this->add_min_max( $args, $input_html );
		}

		$default = $this->get_field_column('default_value');
		if ( is_object( $this->field ) ) {
			$field = $this->field;
		} else {
			$field = FrmField::getOne( $this->field_id );
		}
		$default = apply_filters( 'frm_get_default_value', $default, $field, true );

		$starting_value = ( '' === $this->field['value'] || false === $this->field['value'] ) ? $default : $this->field['value'];

		$prepend = FrmField::get_option( $this->field, 'prepend' );
		$append  = FrmField::get_option( $this->field, 'append' );
		$has_unit = ! empty( $prepend ) || ! empty( $append );

		$output = $this->output_selected_value( $default );
		$output = apply_filters( 'frm_range_output', $output, array( 'field' => $this->field ) );

		$input = '<div class="frm_range_container">';
		if ( $has_unit ) {
			$input .= $output;
		}
		$input .= '<input type="range" id="' . esc_attr( $args['html_id'] ) . '" name="' . esc_attr( $args['field_name'] ) . '" value="' . esc_attr( $this->field['value'] ) . '" data-frmrange ' . $input_html . '/>';
		if ( $has_unit ) {
			$input .= $this->output_min_max_value();
		} else {
			$input .= $output;
		}
		$input .= '</div>';

		return $input;
	}

	/**
	 * @since 4.03.05
	 */
	private function output_selected_value( $default, $is_builder = false ) {
		$value = FrmField::get_option( $this->field, 'value' );

		$starting_value = ( '' === $value || false === $value ) ? $default : $value;
		$starting_value = $this->get_mid_value( $starting_value );

		$num  = '<span class="frm_range_value">' . esc_html( $starting_value ) . '</span>';
		$pre  = $this->format_unit( 'prepend', $is_builder );
		$unit = $this->format_unit( 'append', $is_builder );

		return $pre . $num . $unit;
	}

	/**
	 * Get the middle value so the label isn't alone.
	 *
	 * @since 4.06
	 */
	private function get_mid_value( $value ) {
		if ( $value !== '' && $value !== false ) {
			return $value;
		}

		$min = FrmField::get_option( $this->field, 'minnum' );
		$max = FrmField::get_option( $this->field, 'maxnum' );
		$mid = ( $max - $min ) / 2;
		if ( is_int( $mid ) ) {
			return $mid;
		}

		$step = FrmField::get_option( $this->field, 'step' );
		return round( $mid / $step ) * $step;
	}

	/**
	 * @since 4.05
	 */
	private function output_min_max_value( $is_builder = false ) {
		$min  = FrmField::get_option( $this->field, 'minnum' );
		$max  = FrmField::get_option( $this->field, 'maxnum' );
		$pre  = $this->format_unit( 'prepend', $is_builder );
		$unit = $this->format_unit( 'append', $is_builder );
		if ( $is_builder && strpos( $unit, '><' ) ) {
			// Hide if no unit.
			$min = '';
			$max = '';
		}

		$min = $pre . esc_html( $min ) . $unit;
		$max = $pre . esc_html( $max ) . $unit;

		$output = '<div class="frm_description">';
		$output .= '<span class="frm_range_min">' . $min . '</span>';
		$output .= '<span class="frm_range_max">' . $max . '</span>';
		$output .= '</div>';

		return $output;
	}

	/**
	 * @since 4.05
	 */
	private function format_unit( $setting, $is_builder = false ) {
		$unit   = FrmField::get_option( $this->field, $setting );
		$output = '';

		if ( ! empty( $unit ) || $is_builder ) {
			$output = '<span class="frm_range_unit"' . ( $is_builder ? ' id="range_unit_' . esc_attr( $this->get_field_column( 'id' ) ) . '"' : '' ) . '>' . esc_html( $unit ) . '</span>';
		}
		return $output;
	}

	/**
	 * @since 4.0.04
	 */
	public function sanitize_value( &$value ) {
		FrmAppHelper::sanitize_value( 'sanitize_text_field', $value );
	}
}
