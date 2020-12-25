<?php

/**
 * @since 2.0
 */
class FrmSigField extends FrmFieldType {

	/**
	 * @var string
	 * @since 2.0
	 */
	protected $type = 'signature';

	/**
	 * @since 2.0
	 */
	protected function field_settings_for_type() {
		$settings = array();
		if ( is_callable( 'FrmProFieldsHelper::fill_default_field_display' ) ) {
			FrmProFieldsHelper::fill_default_field_display( $settings );
		}
		return $settings;
	}

	/**
	 * @since 2.0
	 */
	protected function extra_field_opts() {
		return array(
			'size'     => 400,
			'max'      => 150,
			'restrict' => false,
			'label1'   => __( 'Draw It', 'frmsig' ),
			'label2'   => __( 'Type It', 'frmsig' ),
			'label3'   => __( 'Clear', 'frmsig' ),
		);
	}

	/**
	 * @since 2.03
	 */
	public function translatable_strings() {
		$strings = array();
		if ( is_callable( 'parent::translatable_strings' ) ) {
			$strings = parent::translatable_strings();
		}

		$strings[] = 'label1';
		$strings[] = 'label2';
		$strings[] = 'label3';
		return $strings;
	}

	/**
	 * @since 2.0
	 */
	protected function include_form_builder_file() {
		return FrmSigAppHelper::plugin_path() . '/views/front_field.php';
	}

	/**
	 * @since 2.01
	 */
	protected function include_on_form_builder( $name, $field ) {
		$field_name = $this->html_name( $name );
		$html_id    = $this->html_id();
		$field['html_name'] = $field_name;
		$field['html_id']   = $html_id;
		$styles = $this->get_style_settings( $field );

		$typed_value = '';
		$output = '';

		include( $this->include_form_builder_file() );
	}

	/**
	 * @since 2.0
	 */
	public function show_options( $field, $display, $values ) {
		include( FrmSigAppHelper::plugin_path() . '/views/options_form.php' );

		parent::show_options( $field, $display, $values );
	}

	/**
	 * @since 2.0
	 */
	public function validate( $args ) {
		if ( ! $this->field->required ) {
			return;
		}

		if ( is_callable( 'FrmProEntryMeta::skip_required_validation' ) && FrmProEntryMeta::skip_required_validation( $this->field ) ) {
			return;
		}

		$errors = array();
		$value = $args['value'];
		if ( empty( $value ) || ( isset( $value['output'] ) && empty( $value['output'] ) && empty( $value['typed'] ) ) ) {
			$errors[ 'field' . $args['id'] ] = FrmFieldsHelper::get_error_msg( $this->field, 'blank' );
		}
		return $errors;
	}

	/**
	 * @since 2.0
	 * @param array|string $value (the posted value)
	 * @param array $atts
	 *
	 * @return array|string $value
	 */
	public function get_value_to_save( $value, $atts ) {
		$entry_id = $atts['entry_id'];
		if ( ! is_array( $value ) ) {
			$value = array();
		} else if ( isset( $value['format'] ) && $value['format'] ) {
			// Don't change value if 'format' is posted. This means drawn signature is already saved.
		} else if ( isset( $value['output'] ) && $value['output'] ) {
			$this->convert_output_to_formatted_value( $value, $entry_id );
		} else if ( isset( $value['typed'] ) && $value['typed'] ) {
			$this->format_typed_value( $value );
		} else if ( isset( $value['url'] ) && $value['url'] ) {
			$this->convert_url_to_drawn_value( $value, $entry_id );
		} else {
			$value = array();
		}
		FrmEntriesHelper::set_posted_value( $this->field, $value, $atts );

		return $value;
	}

	/**
	 * Convert output (points) to the formatted value.
	 * If the entry is being saved as a draft, keep the points.
	 * If not a draft, create the image and return the url.
	 * TODO: Don't switch to image with draft entry in multi-page form
	 *
	 * @since 2.0
	 *
	 * @param array $meta_value
	 * @param int|string $entry_id
	 */
	private function convert_output_to_formatted_value( &$value, $entry_id ) {
		$is_draft_save = ( is_callable( 'FrmProFormsHelper::saving_draft' ) && FrmProFormsHelper::saving_draft() );

		if ( $is_draft_save ) {
			$this->format_points_value( $value );
		} else {
			$this->format_drawn_value( $value, $entry_id );
		}
	}

	/**
	 * Convert the URL to a drawn value
	 *
	 * Either the signature file should be copied and renamed
	 * or the same signature file should be used
	 *
	 * @since 2.0
	 *
	 * @param $value
	 * @param $entry_id
	 */
	private function convert_url_to_drawn_value( &$value, $entry_id ) {
		$image_url = trim( $value['url'] );
		$file_name = basename( $image_url );
		$file_path = FrmSigAppController::get_signature_file_directory() . '/' . $file_name;
		$new_file_name  = $this->get_file_name( $entry_id );

		// TODO: delete the original and re-import in case it's a different signature
		// Do not change file name if it is correct and file exists
		if ( $file_name != $new_file_name || ! file_exists( $file_path ) ) {
			$file_name = $this->copy_image( $image_url, $new_file_name );
		}

		$value = array();
		if ( $file_name ) {
			$value['format']  = 'drawn';
			$value['content'] = $file_name;
		}
	}

	/**
	 * Format the drawn value
	 *
	 * @since 2.0
	 *
	 * @param array $meta_value
	 * @param int|string $entry_id
	 */
	private function format_drawn_value( &$value, $entry_id ) {
		$file_name = $this->create_signature_file( $value['output'], $entry_id );
		if ( $file_name ) {
			$value = array(
				'content' => $file_name,
				'output'  => $value['output'],
				'format'  => 'drawn',
			);
		} else {
			$this->format_points_value( $value );
		}
	}

	/**
	 * Format the points value
	 *
	 * @since 2.0
	 *
	 * @param array $meta_value
	 */
	private function format_points_value( &$meta_value ) {
		$meta_value = array(
			'output' => $meta_value['output'],
			'format' => 'points',
		);
	}

	/**
	 * Create the signature file
	 * Returns the file name if a file is created. Otherwise returns empty string.
	 *
	 * @since 2.0
	 *
	 * @param string $points
	 * @param $entry_id
	 *
	 * @return string
	 */
	private function create_signature_file( $points, $entry_id ) {
		$points = stripslashes( $points );
		$is_file_created = false;
		$file_name = $this->get_file_name( $entry_id );
		$file_path = FrmSigAppController::get_signature_file_directory() . '/' . $file_name;

		if ( file_exists( $file_path ) ) {
			// File was already created, possibly when a draft was saved
			return $file_name;
		}

		require_once( FrmSigAppHelper::plugin_path() . '/signature-to-image.php' );

		$img = sigJsonToImage( $points, $this->get_signature_image_options() );
		if ( $img ) {
			$is_file_created = imagepng( $img, $file_path );
			imagedestroy( $img );
		}

		if ( ! $is_file_created ) {
			$file_name = '';
		}

		return $file_name;
	}

	/**
	 * Get the signature file name
	 *
	 * @since 2.0
	 *
	 * @param int|string $entry_id
	 *
	 * @return string
	 */
	private function get_file_name( $entry_id ) {
		return 'signature-' . $this->field->id . '-' . $entry_id . '.png';
	}

	/**
	 * Get the options for generating a signature file
	 *
	 * @since 2.0
	 *
	 * @return array
	 */
	private function get_signature_image_options() {
		$width  = $this->get_signature_image_width();
		$height = $this->get_signature_image_height();

		$options = array( 'bgColour' => 'transparent' );

		if ( is_numeric( $height ) ) {
			$options['imageSize']      = array( (int) $width, (int) $height );
			$options['drawMultiplier'] = apply_filters( 'frm_sig_multiplier', 5, $this->field );
		}

		return apply_filters( 'frm_sig_output_options', $options, array( 'field' => $this->field ) );
	}


	/**
	 * Get the width for the signature field
	 *
	 * @since 2.0
	 *
	 * @return int
	 */
	private function get_signature_image_width() {
		$width = FrmField::get_option( $this->field, 'size' );
		return $this->get_signature_image_dimension( $width, 'size' );
	}

	/**
	 * Get the height for a signature field
	 *
	 * @since 2.0
	 *
	 * @return int
	 */
	private function get_signature_image_height() {
		$height = FrmField::get_option( $this->field, 'max' );
		return $this->get_signature_image_dimension( $height, 'max' );
	}

	/**
	 * Get a dimension for the signature field
	 *
	 * @since 2.0
	 *
	 * @param string $saved_setting
	 * @param string $default
	 *
	 * @return string
	 */
	public function get_signature_image_dimension( $saved_setting, $setting ) {
		$defaults = $this->extra_field_opts();
		$default  = $defaults[ $setting ];
		$dimension = ( ! empty( $saved_setting ) ) ? $saved_setting : $default;

		return str_replace( 'px', '', $dimension );
	}

	/**
	 * Copy an image and give it a new file name
	 * Copy file from current site or remote site
	 *
	 * @since 2.0
	 *
	 * @param string $image_url
	 * @param string $new_file_name
	 *
	 * @return string
	 */
	private function copy_image( $image_url, $new_file_name ) {
		$upload_folder = FrmSigAppController::get_signature_file_directory();
		$file_name = wp_unique_filename( $upload_folder, $new_file_name );
		$path = trailingslashit( $upload_folder );

		$ch = curl_init( str_replace( array( ' ' ), array( '%20' ), $image_url ) );
		$fp = fopen( $path . $file_name, 'wb' );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_FILE, $fp );
		curl_setopt( $ch, CURLOPT_HEADER, 0 );
		$user_agent = apply_filters( 'http_headers_useragent', 'WordPress/' . get_bloginfo( 'version' ) . '; ' . get_bloginfo( 'url' ) );
		curl_setopt( $ch, CURLOPT_USERAGENT, $user_agent );
		$result = curl_exec( $ch );
		$code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
		curl_close( $ch );
		fclose( $fp );

		if ( ! $result || $code !== 200 ) {
			// Failed to download image
			unlink( $path . $file_name );
			$file_name = '';
		}

		return $file_name;
	}

	/**
	 * Format the typed value
	 *
	 * @since 2.0
	 *
	 * @param array $meta_value
	 */
	private function format_typed_value( &$value ) {
		$value = array(
			'content' => $value['typed'],
			'typed'   => $value['typed'], // for reverse compatibility
			'format'  => 'typed',
		);
	}

	/**
	 * @since 2.0
	 */
	protected function prepare_display_value( $value, $atts ) {
		$atts['use_html'] = true;
		return FrmSigAppController::get_final_signature_value( $value, $atts );
	}

	/**
	 * @since 2.0
	 */
	public function front_field_input( $args, $shortcode_atts ) {
		$field   = $this->field;
		$html_id = $args['html_id'];
		$field_name = $args['field_name'];
		$plus_id = ( isset( $args['field_plus_id'] ) ? $args['field_plus_id'] : '' );

		// WARNING: This will be the posted value, if it has been posted, not the saved value
		$field['value'] = stripslashes_deep( $field['value'] );
		$format = is_array( $field['value'] ) && isset( $field['value']['format'] ) ? $field['value']['format'] : 'none';

		ob_start();
		if ( $format === 'drawn' ) {
			FrmSigAppController::show_final_signature( $field['value'], array( 'use_html' => true ) );
			include( FrmSigAppHelper::plugin_path() . '/views/hidden_inputs.php' );
		} else {
			if ( $this->loading_first_page() ) {
				FrmSigAppController::load_scripts();
			}

			$styles = $this->get_style_settings( $this->field );

			if ( $format === 'typed' ) {
				$typed_value = $field['value']['content'];
				$output      = '';
			} else if ( $format === 'points' ) {
				$typed_value = '';
				$output = $field['value']['output'];
			} else {
				$typed_value = is_array( $field['value'] ) && isset( $field['value']['typed'] ) ? $field['value']['typed'] : '';
				$output = is_array( $field['value'] ) && isset( $field['value']['output'] ) ? $field['value']['output'] : '';
			}

			include( FrmSigAppHelper::plugin_path() . '/views/front_field.php' );
		}

		$input_html = ob_get_contents();
		ob_end_clean();
		return $input_html;
	}

	/**
	 * @since 2.01
	 */
	private function get_style_settings( $field ) {
		$style_settings = FrmSigAppController::get_style_settings( $field['form_id'] );

		$styles = array(
			'hide_tabs'     => isset( $field['restrict'] ) ? $field['restrict'] : false,
			'width'         => $this->get_signature_image_width(),
			'height'        => $this->get_signature_image_height(),
		);

		$font_size   = $styles['hide_tabs'] ? 16 : $this->get_button_font_size( $styles['height'] );
		$button_size = $font_size * 2; // font size + padding
		$button_top    = floor( ( $styles['height'] - 4 - ( $button_size * 2 ) ) / 3 ); // height - border - buttons
		$button_margin = max( $button_top, $styles['width'] * 0.05 );

		$active_color  = '--active:#' . $style_settings['progress_active_bg_color'];
		$toggle_colors = $active_color . ';--inactive:#' . $style_settings['progress_bg_color'] . ';--active-text:#' . $style_settings['progress_active_color'] . ';--inactive-text:#' . $style_settings['progress_color'];
		$button_style = '--button-margin:' . $button_top . 'px;--button-size:' . $font_size . 'px;--button-padding:' . ( $font_size / 2 ) . 'px;--button-side-margin:' . $button_margin . 'px';
		if ( $font_size < 16 ) {
			$button_style .= ';--icon:' . floor( $font_size * 1.25 ) . 'px';
		} else {
			$button_style .= ';--icon:20px';
		}

		$styles['css'] = 'height:' . $styles['height'] . 'px;border-color:#' . $style_settings['border_color'] . ';--bg-color:#' . $style_settings['bg_color'] . ';' . $toggle_colors . ';' . $button_style;

		return $styles;
	}

	/**
	 * @since 2.01
	 */
	private function get_button_font_size( $height, $font_size = 12 ) {
		$font_max = 20;
		if ( $font_size >= $font_max ) {
			return $font_size;
		}

		$button_size = ( $font_size * 2 ); // font size + padding
		if ( $button_size / $height < .3 ) {
			$font_size = $this->get_button_font_size( $height, $font_size + 2 );
		}

		return $font_size;
	}

	/**
	 * Check if this is the first page of an ajax-loaded form
	 *
	 * @since 2.0
	 */
	private function loading_first_page() {
		global $frm_vars;
		$ajax_now = ! FrmAppHelper::doing_ajax();
		if ( ! $ajax_now && isset( $frm_vars['inplace_edit'] ) && $frm_vars['inplace_edit'] ) {
			$ajax_now = true;
		}
		return $ajax_now;
	}

	/**
	 * @since 2.0
	 */
	protected function prepare_import_value( $value, $atts ) {

		if ( ! is_string( $value ) ) {
			return $value;
		}

		if ( strpos( $value, 'http' ) === 0 ) {
			$value = array(
				'url' => $value,
			);
		} elseif ( $value !== '' ) {
			$value = array(
				'format'  => 'typed',
				'content' => $value,
			);
		}

		return $value;
	}
}
