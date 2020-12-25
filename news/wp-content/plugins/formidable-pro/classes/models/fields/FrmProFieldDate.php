<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

/**
 * @since 3.0
 */
class FrmProFieldDate extends FrmFieldType {

	/**
	 * @var string
	 * @since 3.0
	 */
	protected $type = 'date';
	protected $display_type = 'text';

	protected function field_settings_for_type() {
		$settings = array(
			'autopopulate'  => true,
			'size'          => true,
			'unique'        => true,
			'clear_on_focus' => true,
			'invalid'       => true,
			'read_only'     => true,
			'prefix'        => true,
		);
		FrmProFieldsHelper::fill_default_field_display( $settings );
		return $settings;
	}

	/**
	 * @since 4.05
	 */
	protected function builder_text_field( $name = '' ) {
		$html  = FrmProFieldsHelper::builder_page_prepend( $this->field );
		$field = parent::builder_text_field( $name );
		return str_replace( '[input]', $field, $html );
	}

	protected function extra_field_opts() {
		return array(
			'start_year' => '-10',
			'end_year'   => '+10',
			'locale'     => 'en',
			'max'        => '10',
		);
	}

	protected function fill_default_atts( &$atts ) {
		$defaults = array(
			'format' => false,
		);
		$atts = wp_parse_args( $atts, $defaults );
	}

	/**
	 * @since 3.06.01
	 */
	public function translatable_strings() {
		$strings   = parent::translatable_strings();
		$strings[] = 'locale';
		return $strings;
	}

	/**
	 * @since 3.01.01
	 */
	public function show_options( $field, $display, $values ) {
		if ( ! function_exists( 'frm_dates_autoloader' ) && is_callable( 'FrmProAddonsController::install_link' ) ) {
			$install_data = '';
			$class        = ' frm_noallow';
			$upgrading    = FrmProAddonsController::install_link( 'dates' );
			if ( isset( $upgrading['url'] ) ) {
				$install_data = json_encode( $upgrading );
				$class        = '';
			}
		}

		$locales = FrmAppHelper::locales( 'date' );
		include( FrmProAppHelper::plugin_path() . '/classes/views/frmpro-fields/back-end/dates-advanced.php' );

		parent::show_options( $field, $display, $values );
	}

	/**
	 * @since 4.0
	 * @param array $args - Includes 'field', 'display', and 'values'
	 */
	public function show_primary_options( $args ) {
		$field = $args['field'];
		include( FrmProAppHelper::plugin_path() . '/classes/views/frmpro-fields/back-end/calendar.php' );

		parent::show_primary_options( $args );
	}

	/**
	 * @todo remove this function since it's the same as parent
	 */
	public function prepare_front_field( $values, $atts ) {
		$values['value'] = $this->prepare_field_value( $values['value'], $atts );
		return $values;
	}

	public function prepare_field_value( $value, $atts ) {
		return FrmProAppHelper::maybe_convert_from_db_date( $value );
	}

	protected function html5_input_type() {
		return 'text';
	}

	/**
	 * Add extra classes on front-end input
	 *
	 * @since 3.01.04
	 */
	protected function get_input_class() {
		$class = '';
		if ( ! FrmField::is_read_only( $this->field ) ) {
			$class = 'frm_date';
		}
		return $class;
	}

	protected function load_field_scripts( $args ) {
		if ( ! FrmField::is_read_only( $this->field ) ) {
			global $frm_vars;
			if ( ! isset( $frm_vars['datepicker_loaded'] ) || ! is_array( $frm_vars['datepicker_loaded'] ) ) {
				$frm_vars['datepicker_loaded'] = array();
			}

			if ( ! isset( $frm_vars['datepicker_loaded'][ $args['html_id'] ] ) ) {
				$static_html_id = $this->html_id();
				if ( $args['html_id'] != $static_html_id ) {
					// user wildcard for repeating fields
					$frm_vars['datepicker_loaded'][ '^' . $static_html_id ] = true;
				} else {
					$frm_vars['datepicker_loaded'][ $args['html_id'] ] = true;
				}
			}

			$entry_id = isset( $frm_vars['editing_entry'] ) ? $frm_vars['editing_entry'] : 0;
			FrmProFieldsHelper::set_field_js( $this->field, $entry_id );
		}
	}

	public function validate( $args ) {
		$errors = array();
		$value = $args['value'];

		if ( $value == '' ) {
			return $errors;
		}

		if ( ! preg_match( '/^\d{4}-\d{2}-\d{2}$/', $value ) ) {
			$frmpro_settings = FrmProAppHelper::get_settings();
			$formated_date = FrmProAppHelper::convert_date( $value, $frmpro_settings->date_format, 'Y-m-d' );

			//check format before converting
			if ( $value != gmdate( $frmpro_settings->date_format, strtotime( $formated_date ) ) ) {
				$allow_it = apply_filters(
					'frm_allow_date_mismatch',
					false,
					array(
						'date'           => $value,
						'formatted_date' => $formated_date,
					)
				);
				if ( ! $allow_it ) {
					$errors[ 'field' . $args['id'] ] = FrmFieldsHelper::get_error_msg( $this->field, 'invalid' );
				}
			}

			$value = $formated_date;
			unset( $formated_date );
		}

		$date = explode( '-', $value );

		if ( count( $date ) != 3 || ! checkdate( (int) $date[1], (int) $date[2], (int) $date[0] ) ) {
			$errors[ 'field' . $args['id'] ] = FrmFieldsHelper::get_error_msg( $this->field, 'invalid' );
		}

		if ( ! $this->validate_year_is_within_range( $date[0] ) ) {
			$errors[ 'field' . $args['id'] ] = FrmFieldsHelper::get_error_msg( $this->field, 'invalid' );
		}

		return $errors;
	}

	private function validate_year_is_within_range( $year ) {
		$year       = (int) $year;
		$start_year = $this->maybe_convert_relative_year_to_int('start_year');
		$end_year   = $this->maybe_convert_relative_year_to_int('end_year');

		return ( ( ! $start_year || ( $start_year <= $year ) ) && ( ! $end_year || ( $year <= $end_year ) ) );
	}

	private function maybe_convert_relative_year_to_int( $start_end ) {
		$rel_year = FrmField::get_option( $this->field, $start_end );

		if ( is_string( $rel_year ) && strlen( $rel_year ) > 0 && ( '0' === $rel_year || '+' == $rel_year[0] || '-' == $rel_year[0] || strlen( $rel_year ) < 4 ) ) {
			$rel_year = gmdate( 'Y', strtotime( $rel_year . ' year' ) );
		}

		return (int) $rel_year;
	}

	public function is_not_unique( $value, $entry_id ) {
		$value = FrmProAppHelper::maybe_convert_to_db_date( $value, 'Y-m-d' );
		return parent::is_not_unique( $value, $entry_id );
	}

	public function set_value_before_save( $value ) {
		return FrmProAppHelper::maybe_convert_to_db_date( $value, 'Y-m-d' );
	}

	protected function prepare_display_value( $value, $atts ) {
		if ( $value === false ) {
			return $value;
		}

		if ( isset( $atts['offset'] ) ) {
			$value = FrmProFieldsHelper::get_date( $value, 'Y-m-d H:i:s' );
			if ( isset( $atts['time_ago'] ) ) {
				$atts['format'] = 'Y-m-d H:i:s';
			} elseif ( ! isset( $atts['format'] ) || empty( $atts['format'] ) ) {
				$atts['format'] = get_option( 'date_format' );
			}
			$value = gmdate( $atts['format'], strtotime( $atts['offset'], strtotime( $value ) ) );
		}

		if ( isset( $atts['time_ago'] ) ) {
			$value = FrmProFieldsHelper::get_date( $value, 'Y-m-d H:i:s' );
			$value = FrmAppHelper::human_time_diff( strtotime( $value ), strtotime( date_i18n( 'Y-m-d' ) ), $atts['time_ago'] );
		} elseif ( ! isset( $atts['offset'] ) ) {
			if ( ! is_array( $value ) && strpos( $value, ',' ) ) {
				$value = explode( ',', $value );
			}

			if ( isset( $atts['date_format'] ) && ! empty( $atts['date_format'] ) ) {
				$atts['format'] = $atts['date_format'];
			}

			$value = FrmProFieldsHelper::format_values_in_array( $value, $atts['format'], array( 'self', 'get_date' ) );
		}

		return $value;
	}

	protected function prepare_import_value( $value, $atts ) {
		if ( ! empty( $value ) ) {
			$value = gmdate( 'Y-m-d', strtotime( $value ) );
		}

		return $value;
	}

	/**
	 * @since 4.0.04
	 */
	public function sanitize_value( &$value ) {
		FrmAppHelper::sanitize_value( 'sanitize_text_field', $value );
	}
}
