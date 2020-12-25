<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

/**
 * @since 3.0
 */
class FrmProFieldPassword extends FrmFieldType {

	/**
	 * @var string
	 * @since 3.0
	 */
	protected $type = 'password';
	protected $display_type = 'text';

	protected function field_settings_for_type() {
		$settings = array(
			'size'          => true,
			'unique'        => true,
			'clear_on_focus' => true,
			'invalid'       => true,
			'read_only'     => true,
			'conf_field'    => true,
			'prefix'        => true,
		);

		FrmProFieldsHelper::fill_default_field_display( $settings );
		return $settings;
	}

	/**
	 * @return array
	 */
	protected function extra_field_opts() {
		return array(
			'strong_pass' => 0,
			'strength_meter' => 0,
		);
	}

	/**
	 * @since 4.05
	 */
	protected function builder_text_field( $name = '' ) {
		$html  = FrmProFieldsHelper::builder_page_prepend( $this->field );
		$field = parent::builder_text_field( $name );
		return str_replace( '[input]', $field, $html );
	}

	/**
	 * @since 3.06.01
	 */
	public function translatable_strings() {
		$strings   = parent::translatable_strings();
		$strings[] = 'conf_desc';
		$strings[] = 'conf_msg';
		return $strings;
	}

	protected function html5_input_type() {
		return 'password';
	}

	/**
	 * @since 4.0
	 * @param array $args - Includes 'field', 'display', and 'values'.
	 */
	public function show_primary_options( $args ) {
		$field = $args['field'];
		include( FrmProAppHelper::plugin_path() . '/classes/views/frmpro-fields/back-end/password-options.php' );

		include( FrmProAppHelper::plugin_path() . '/classes/views/frmpro-fields/back-end/confirmation.php' );

		parent::show_primary_options( $args );
	}

	/**
	 * @since 4.0
	 * @param array $args - Includes 'field', 'display'.
	 */
	public function show_after_default( $args ) {
		$field = $args['field'];
		include( FrmProAppHelper::plugin_path() . '/classes/views/frmpro-fields/back-end/confirmation-placeholder.php' );
	}

	/**
	 * Add extra classes on front-end input
	 *
	 * @since 3.01.04
	 */
	protected function get_input_class() {
		$class = '';
		// add class for javascript validation
		if ( FrmField::get_option( $this->field, 'strong_pass' ) ) {
			$class .= ' frm_strong_pass';
		}
		if ( FrmField::get_option( $this->field, 'strength_meter' ) ) {
			$class .= ' frm_strength_meter';
		}

		return $class;
	}

	/**
	 * @param array $args
	 * @return array|mixed errors
	 * @since 3.01.04
	 */
	public function validate( $args ) {
		$errors = array();
		$password = $args['value'];
		if ( '' === trim( $password ) ) {
			return $errors;
		}

		$check_strength = FrmField::get_option( $this->field, 'strong_pass' );

		//validate the password format
		if ( $check_strength ) {
			$message = $this->check_format( $password );
			if ( ! empty( $message ) ) {
				$errors[ 'field' . $args['id'] ] = $message;
			}
		}

		return $errors;
	}

	public function front_field_input( $args, $shortcode_atts ) {
		$input_html            = parent::front_field_input( $args, $shortcode_atts );
		$strength_meter_option = FrmField::get_option( $this->field, 'strength_meter' );

		if ( ! $strength_meter_option ) {
			return $input_html;
		}

		$is_confirmation_field = strpos( $args['field_id'], 'conf' ) === 0;

		if ( ! $is_confirmation_field ) {
			$field_id = $args['field_id'];

			$input_html .= '<div id="frm_password_strength_' . esc_attr( $field_id ) . '" class="frm-password-strength">';
			foreach ( $this->password_checks() as $type => $check ) {
				$input_html .= '<span id="frm-pass-' . esc_attr( $type ) . '-' . esc_attr( $field_id ) . '" class="frm-pass-req frm_icon_font">' . esc_html( $check['label'] ) . '</span>' . "\r\n";
			}
			$input_html .= '</div>';
		}

		return $input_html;
	}

	/**
	 * @since 3.02
	 *
	 * @param string $password
	 * @return string - The error message if present
	 */
	private function check_format( $password ) {
		$message = '';
		foreach ( $this->password_checks() as $type => $check ) {
			if ( ! $this->check_regex( $check['regex'], $password ) ) {
				$message = $check['message'];
				break;
			}
		}

		return $message;
	}

	/**
	 * @since 3.03
	 *
	 * @return array
	 */
	private function password_checks() {
		$checks = array(
			'eight-char'   => array(
				'label'    => __( 'Eight characters minimum', 'formidable-pro' ),
				'regex'    => '/^.{8,}$/',
				'message'  => __( 'Passwords require at least 8 characters', 'formidable-pro' ),
			),
			'lowercase'    => array(
				'label'    => __( 'One lowercase letter', 'formidable-pro' ),
				'regex'    => '#[a-z]+#',
				'message'  => __( 'Passwords must include at least one lowercase letter', 'formidable-pro' ),
			),
			'uppercase'    => array(
				'label'    => __( 'One uppercase letter', 'formidable-pro' ),
				'regex'    => '#[A-Z]+#',
				'message'  => __( 'Passwords must include at least one uppercase letter', 'formidable-pro' ),
			),
			'number'       => array(
				'label'    => __( 'One number', 'formidable-pro' ),
				'regex'    => '#[0-9]+#',
				'message'  => __( 'Passwords must include at least one number', 'formidable-pro' ),
			),
			'special-char' => array(
				'label'    => __( 'One special character', 'formidable-pro' ),
				'regex'    => '/(?=.*[^a-zA-Z0-9])/',
				'message'  => FrmFieldsHelper::get_error_msg( $this->field, 'invalid' ),
			),
		);

		/**
		 * @since 3.03
		 */
		return apply_filters(
			'frm_password_checks',
			$checks,
			array(
				'field' => $this->field,
			)
		);
	}

	/**
	 * @since 3.03
	 * @return boolean
	 */
	private function check_regex( $regex, $password ) {
		return preg_match( $regex, $password );
	}
}
