<?php

class FrmSigAppController {

	public static function load_lang() {
		$plugin_folder = FrmSigAppHelper::plugin_folder();
		load_plugin_textdomain( 'frmsig', false, $plugin_folder . '/languages/' );
	}

	/**
	 * Migrate settings if needed
	 *
	 * @since 2.0
	 */
	public static function initialize() {
		if ( ! FrmSigAppHelper::is_formidable_compatible() ) {
			return;
		}

		new FrmSigDb();

		add_action( 'admin_head-toplevel_page_formidable', 'FrmSigAppController::enqueue_styles' );
	}

	/**
	 * Display a warning in the admin if Formidable is not activated or if it is not compatible
	 *
	 * @since 2.0
	 */
	public static function display_admin_notices() {
		// Don't display notices as we're upgrading
		$action = isset( $_GET['action'] ) ? sanitize_text_field( wp_unslash( $_GET['action'] ) ) : '';
		if ( $action == 'upgrade-plugin' && ! isset( $_GET['activate'] ) ) {
			return;
		}

		// Show message if Formidable is not compatible
		if ( ! FrmSigAppHelper::is_formidable_compatible() ) {
			include( FrmSigAppHelper::plugin_path() . '/views/update_formidable.php' );
		}
	}

	/**
	 * Print a notice if Formidable is too old to be compatible with the signature add-on
	 *
	 * @since 2.0
	 */
	public static function min_version_notice() {
		if ( FrmSigAppHelper::is_formidable_compatible() ) {
			return;
		}

		$wp_list_table = _get_list_table( 'WP_Plugins_List_Table' );
		echo '<tr class="plugin-update-tr active"><th colspan="' . absint( $wp_list_table->get_column_count() ) . '" class="check-column plugin-update colspanchange"><div class="update-message">' .
			 esc_html__( 'You are running an outdated version of Formidable. This plugin will not work correctly if you do not update Formidable.', 'frmsig' ) .
			 '</div></td></tr>';
	}

	public static function register_scripts( $form ) {
		add_action( 'frm_load_ajax_field_scripts', 'FrmSigAppController::maybe_load_scripts' );
		add_action( 'wp_print_footer_scripts', 'FrmSigAppController::footer_js', 0 );
		add_action( 'admin_footer', 'FrmSigAppController::footer_js', 20 );

		self::register_assets();

		return $form;
	}

	/**
	 * @since 2.01
	 */
	private static function register_assets() {
		$url = FrmSigAppHelper::plugin_url();
		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		$depends = array( 'jquery' );
		if ( self::is_ie8() ) {
			wp_register_script( 'flashcanvas', $url . '/js/flashcanvas.js', array( 'jquery' ), '20131211', true );
			wp_script_add_data( 'flashcanvas', 'conditional', 'lt IE 9' );
			$depends[] = 'flashcanvas';
			$depends[] = 'json2';
		}
		$version = '2.01';
		wp_register_script( 'frm-signature', $url . '/js/frm.signature' . $min . '.js', $depends, $version, true );
		wp_register_style( 'jquery-signaturepad', $url . '/css/jquery.signaturepad.css', array(), $version );
	}

	/**
	 * Used for the form builder page so the styles will be ready for a new field
	 *
	 * @since 2.01
	 */
	public static function enqueue_styles() {
		self::register_assets();
		wp_enqueue_style( 'jquery-signaturepad' );
	}

	/**
	 * Check if running IE8 or below
	 *
	 * @since 2.0
	 * @return boolean
	 */
	private static function is_ie8() {
		if ( ! isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
			return false;
		}

		$browser = sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) );
		preg_match( '/MSIE (.*?);/', $browser, $matches );
		if ( count( $matches ) < 2 ) {
			preg_match( '/Trident\/\d{1,2}.\d{1,2}; rv:([0-9]*)/', $browser, $matches );
		}

		if ( count( $matches ) > 1 ) {
			// Then we're using IE.
			$version = $matches[1];
			return $version <= 8;
		}

		return false;
	}

	/**
	 * Load the scripts on the first page of the form
	 *
	 * @since 2.0
	 */
	public static function maybe_load_scripts( $atts ) {
		if ( $atts['field']->type !== 'signature' ) {
			return;
		}

		// load field info on page before script during in-place-edit
		add_action( 'frm_enqueue_form_scripts', 'FrmSigAppController::footer_js', 5 );

		if ( $atts['is_first'] ) {
			self::load_scripts();
		}
	}

	public static function maybe_add_field( $fields ) {
		if ( FrmAppHelper::pro_is_installed() ) {
			add_filter( 'frm_pro_available_fields', 'FrmSigAppController::add_field' );
		} else {
			$fields = self::add_field( $fields );
		}

		return $fields;
	}

	public static function add_field( $fields ) {
		$fields['signature'] = array(
			'name' => __( 'Signature', 'frmsig' ),
			'icon' => 'frm_icon_font frm_signature_icon',
		);

		return $fields;
	}

	/**
	 * Initiate the signature field class
	 *
	 * @since 2.0
	 */
	public static function get_signature_object_class( $class, $field_type ) {
		if ( $field_type === 'signature' ) {
			$class = 'FrmSigField';
		}
		return $class;
	}

	/**
	 * If this form uses ajax, we need all the signature field info in advance
	 */
	public static function check_signature_fields( $values, $field, $entry_id = false ) {
		if ( $field->type != 'signature' && ! isset( $field->field_options['label1'] ) ) {
			return $values;
		}

		$values['value'] = maybe_unserialize( $values['value'] );

		// If the signature has already been saved, don't load scripts for this field
		if ( is_array( $values['value'] ) && isset( $values['value']['format'] ) && $values['value']['format'] == 'drawn' ) {
			return $values;
		}

		global $frm_vars;
		if ( ! is_array( $frm_vars ) ) {
			$frm_vars = array();
		}

		if ( ! isset( $frm_vars['sig_fields'] ) || empty( $frm_vars['sig_fields'] ) ) {
			$frm_vars['sig_fields'] = array();
		}

		$field_obj = FrmFieldFactory::get_field_object( $field );
		$style_settings = self::get_style_settings( $field->form_id );

		$values['size'] = $field_obj->get_signature_image_dimension( $values['size'], 'size' );
		$values['max']  = $field_obj->get_signature_image_dimension( $values['max'], 'max' );
		$hide_tabs = isset( $values['restrict'] ) ? $values['restrict'] : false;

		$signature_opts = array(
			'id'          => $field->id,
			'width'       => $values['size'],
			'height'      => $values['max'],
			'line_top'    => round( $values['max'] * 0.7 ) + 0.5, // use .5 for crisp line
			'line_margin' => $values['size'] * 0.05,
			'line_color'  => '#' . $style_settings['border_color'],
			'line_width'  => $hide_tabs ? 0 : 1,
		);

		$signature_opts['default_tab'] = self::get_current_tab( $values );

		foreach ( array( 'bg_color', 'text_color', 'border_color' ) as $color ) {
			if ( ! empty( $style_settings[ $color ] ) ) {
				$signature_opts[ $color ] = '#' . $style_settings[ $color ];
			}
		}

		$frm_vars['sig_fields'][] = $signature_opts;

		return $values;
	}

	/**
	 * Get the tab that should show in a Signature field on page load
	 *
	 * @since 2.0
	 *
	 * @param array $values
	 *
	 * @return string
	 */
	private static function get_current_tab( $values ) {
		$current_tab = 'drawIt';
		if ( is_array( $values['value'] ) ) {
			$typed = ( isset( $values['value']['typed'] ) && $values['value']['typed'] ) || ( isset( $values['value']['format'] ) && $values['value']['format'] === 'typed' );
			if ( $typed ) {
				$current_tab = 'typeIt';
			}
		}

		return $current_tab;
	}

	/**
	 * @since 2.0
	 */
	public static function load_scripts() {
		wp_enqueue_style( 'jquery-signaturepad' );
		wp_enqueue_style( 'font-awesome-5' );
		wp_enqueue_script( 'frm-signature' );
	}

	public static function footer_js() {
		global $frm_vars;

		if ( ! is_array( $frm_vars ) || ! isset( $frm_vars['sig_fields'] ) || empty( $frm_vars['sig_fields'] ) ) {
			return;
		}

		include_once( FrmSigAppHelper::plugin_path() . '/views/footer_js.php' );
	}

	public static function validate( $errors, $field, $value ) {
		if ( $field->type != 'signature' || $field->required != '1' || isset( $errors[ 'field' . $field->id ] ) ) {
			return $errors;
		}

		return $errors;
	}

	/**
	 * Get the signature value for the email message and frm-show-entry shortcode
	 *
	 * @param mixed $value
	 * @param object $meta
	 *
	 * @return mixed $value
	 */
	public static function email_value( $value, $meta ) {
		if ( $meta->field_type == 'signature' ) {
			$value = self::get_final_signature_value( $value, array( 'use_html' => true ) );
		}

		return $value;
	}

	/**
	 * Adjust the signature display attributes
	 * Used when displaying a signature in the entries tab
	 *
	 * @since 2.0
	 *
	 * @param $atts
	 * @param $field
	 *
	 * @return mixed
	 */
	public static function signature_display_atts( $atts, $field ) {
		if ( $field->type == 'signature' ) {
			$atts['return_array'] = true;
			$atts['truncate'] = false;
		}

		return $atts;
	}

	/**
	 * Sanitize the signature image before display
	 *
	 * @since 2.0
	 */
	public static function show_final_signature( $value, $args ) {
		echo FrmAppHelper::kses( self::get_final_signature_value( $value, $args ), 'all' ); // WPCS: XSS ok.
	}

	/**
	 * Get the typed or written signature value with or without HTML added
	 *
	 * @since 1.07.03
	 *
	 * @param array|string $value
	 * @param array $args
	 *
	 * @return string - the typed string or img html
	 */
	public static function get_final_signature_value( $value, $args ) {
		$value = maybe_unserialize( $value );

		if ( ! is_array( $value ) || ! isset( $value['format'] ) ) {
			return '';
		}

		if ( $value['format'] === 'drawn' ) {
			$file_path = self::get_signature_file_directory() . '/' . $value['content'];

			if ( file_exists( $file_path ) ) {
				$value = self::get_signature_url( $file_path );

				if ( $value !== '' && $args['use_html'] ) {
					$value = '<img src="' . esc_attr( $value ) . '" />';
				}
			} else {
				$value = '';
			}
		} else if ( $value['format'] === 'typed' ) {
			$value = $value['content'];
		} else {
			$value = '';
		}

		return $value;
	}

	/**
	 * Prepare the Signature value for an XML export
	 *
	 * @since 2.0
	 *
	 * @param array|string $value
	 * @param stdClass $field
	 *
	 * @return string
	 */
	public static function xml_value( $value, $field ) {
		if ( $field->type === 'signature' ) {
			$value = self::get_final_signature_value( $value, array( 'use_html' => false ) );
		}

		return $value;
	}

	public static function csv_value( $value, $atts ) {
		return self::xml_value( $value, $atts['field'] );
	}

	/**
	 * Get the typed signature for a graph
	 *
	 * @param $values
	 * @param $field
	 *
	 * @return array|string
	 */
	public static function graph_value( $values, $field ) {
		if ( is_object( $field ) && $field->type === 'signature' ) {
			$values = self::get_typed_value( $values );
		}

		return $values;
	}

	/**
	 * Get the typed signature value or the Drawn signature text
	 *
	 * @since 1.09
	 *
	 * @param array|string $value
	 *
	 * @return string
	 */
	private static function get_typed_value( $value ) {
		if ( is_array( $value ) ) {
			if ( $value['format'] === 'typed' ) {
				$value = $value['content'];
			} else {
				$value = __( 'Drawn signatures', 'frmsig' );
			}
		}

		return $value;
	}

	public static function delete_images( $entry_id ) {
		global $wpdb;

		$fields = $wpdb->get_col( $wpdb->prepare( "SELECT fi.id FROM {$wpdb->prefix}frm_fields fi LEFT JOIN {$wpdb->prefix}frm_items it ON (it.form_id=fi.form_id) WHERE fi.type=%s AND it.id=%d", 'signature', $entry_id ) );

		if ( ! $fields ) {
			return;
		}

		$uploads     = wp_upload_dir();
		$target_path = $uploads['basedir'] . '/';
		$target_path .= apply_filters( 'frm_sig_upload_folder', 'formidable/signatures' );
		$target_path = untrailingslashit( $target_path );

		foreach ( $fields as $field ) {
			$file = $target_path . '/signature-' . $field . '-' . $entry_id . '.png';
			if ( file_exists( $file ) ) {
				//delete it
				unlink( $file );
			}
			unset( $field );
		}
	}

	public static function include_updater() {
		if ( class_exists( 'FrmAddon' ) ) {
			include_once( FrmSigAppHelper::plugin_path() . '/models/FrmSigUpdate.php' );
			FrmSigUpdate::load_hooks();
		}
	}

	/**
	 * @since 2.0
	 */
	public static function get_style_settings( $form_id ) {
		if ( is_callable( 'FrmStylesController::get_form_style' ) ) {
			$style_settings = FrmStylesController::get_form_style( $form_id );
			$style_settings = $style_settings->post_content;
		} else {
			global $frmpro_settings;
			if ( ! $frmpro_settings && class_exists( 'FrmProSettings' ) ) {
				$frmpro_settings = new FrmProSettings();
			}
			$style_settings = (array) $frmpro_settings;
		}

		return $style_settings;
	}

	/**
	 * Get the URL for a signature
	 *
	 * @since 1.07.03
	 *
	 * @param string $file_path
	 *
	 * @return string $url
	 */
	private static function get_signature_url( $file_path ) {
		if ( ! file_exists( $file_path ) ) {
			$url = '';
		} else {
			$uploads = wp_upload_dir();
			$url     = set_url_scheme( str_replace( $uploads['basedir'], $uploads['baseurl'], $file_path ) );
		}

		return $url;
	}

	/**
	 * Get the folder that holds signature files
	 *
	 * @since 2.0
	 *
	 * @return string
	 */
	public static function get_signature_file_directory() {
		$uploads     = wp_upload_dir();
		$target_path = $uploads['basedir'];

		self::maybe_make_directory( $target_path );

		$relative_path = apply_filters( 'frm_sig_upload_folder', 'formidable/signatures' );
		$relative_path = untrailingslashit( $relative_path );
		$folders       = explode( '/', $relative_path );

		foreach ( $folders as $folder ) {
			$target_path .= '/' . $folder;
			self::maybe_make_directory( $target_path );
		}

		return $target_path;
	}

	/**
	 * Create a directory if it doesn't exist
	 *
	 * @since 1.07.03
	 *
	 * @param string $target_path
	 */
	private static function maybe_make_directory( $target_path ) {
		if ( ! file_exists( $target_path ) ) {
			@mkdir( $target_path . '/' );
		}
	}

	/**
	 * Display the signature
	 * Used for field ID shortcode in pro version
	 *
	 * @deprecated 2.02
	 * @param mixed $value
	 * @param string $tag
	 * @param array $atts
	 * @param object $field
	 *
	 * @return mixed
	 */
	public static function custom_display_signature( $value, $tag, $atts, $field ) {
		_deprecated_function( __METHOD__, '2.02', 'FrmSigAppController::get_final_signature_value' );
		if ( $field->type != 'signature' ) {
			return $value;
		}

		return self::display_signature( $value, $field, $atts );
	}

	/**
	 * Display the signature
	 * Used for field ID shortcode and entries tab
	 *
	 * @deprecated 2.02
	 * @param mixed $value
	 * @param object $field
	 * @param array $atts
	 *
	 * @return mixed
	 */
	public static function display_signature( $value, $field, $atts ) {
		_deprecated_function( __METHOD__, '2.02', 'FrmSigAppController::get_final_signature_value' );
		if ( $field->type != 'signature' || empty( $value ) ) {
			return $value;
		}

		return self::get_final_signature_value( $value, array( 'use_html' => true ) );
	}

	/**
	 * @deprecated 2.0
	 */
	public static function admin_field( $field ) {
		_deprecated_function( __METHOD__, '2.0', 'FrmSigField::include_on_form_builder' );
	}

	/**
	 * @deprecated 2.0
	 */
	public static function options_form( $field ) {
		_deprecated_function( __METHOD__, '2.0', 'FrmSigField::show_options' );
	}

	/**
	 * @deprecated 2.0
	 */
	public static function update( $field_options, $field, $values ) {
		_deprecated_function( __METHOD__, '2.0', 'FrmSigField::include_on_form_builder' );

		return $field_options;
	}

	/**
	 * @deprecated 2.0
	 */
	public static function front_field( $field, $field_name ) {
		_deprecated_function( __METHOD__, '2.0', 'FrmSigField::front_field_input' );
	}

	/**
	 * @deprecated 2.0
	 */
	public static function set_defaults( $field_data ) {
		_deprecated_function( __METHOD__, '2.0', 'FrmSigField class' );

		return $field_data;
	}

	/**
	 * @deprecated 2.0
	 */
	public static function get_defaults() {
		_deprecated_function( __METHOD__, '2.0', 'FrmSigField::extra_field_opts' );
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
	 * Create the signature file
	 * Returns the file name if a file is created. Otherwise returns empty string.
	 *
	 * @since 1.07.03
	 *
	 * @param string $points
	 * @param $field
	 * @param $entry_id
	 *
	 * @return string
	 */
	public static function create_signature_file( $points, $field, $entry_id ) {
		_deprecated_function( __METHOD__, '2.0', 'FrmSigField::create_signature_file' );
		return '';
	}

	/**
	 * Create the signature file before saving to db
	 *
	 * @since 1.13
	 * @deprecated 2.0
	 *
	 * @param array|string $meta_value
	 * @param int $field_id
	 * @param int $entry_id
	 * @return array $atts
	 */
	public static function format_value_before_save( $meta_value, $field_id, $entry_id, $atts ) {
		_deprecated_function( __METHOD__, '2.0', 'FrmSigField::get_value_to_save' );
		return $meta_value;
	}

	/**
	 * Make sure these scripts are loaded on ajax page change if enqueued
	 *
	 * @deprecated 2.0
	 */
	public static function ajax_load_scripts( $scripts ) {
		_deprecated_function( __METHOD__, '2.0', 'FrmSigAppController::maybe_load_scripts' );

		$scripts = array_merge( $scripts, array( 'flashcanvas', 'frm-signature' ) );

		return $scripts;
	}

	/**
	 * Make sure these styles are loaded on ajax page change if enqueued
	 *
	 * @deprecated 2.0
	 */
	public static function ajax_load_styles( $styles ) {
		_deprecated_function( __METHOD__, '2.0', 'FrmSigAppController::maybe_load_scripts' );

		$styles[] = 'jquery-signaturepad';

		return $styles;
	}

	/**
	 * Check if there are any signatures that need to be created when the entry is created
	 *
	 * @since 1.07.03
	 * @deprecated 2.0
	 *
	 * @param $entry_id
	 * @param $form_id
	 */
	public static function maybe_create_signature_files( $entry_id, $form_id ) {
		_deprecated_function( __METHOD__, '2.0', 'FrmSigAppController::format_value_before_save' );
	}
}
