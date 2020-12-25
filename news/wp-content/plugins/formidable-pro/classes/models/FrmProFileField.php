<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmProFileField {

	/**
	 * @param array $field (no array for field options)
	 * @param array $atts
	 */
	public static function setup_dropzone( $field, $atts ) {
		global $frm_vars;

		$is_multiple = FrmField::is_option_true( $field, 'multiple' );

		if ( ! isset( $frm_vars['dropzone_loaded'] ) || ! is_array( $frm_vars['dropzone_loaded'] ) ) {
			$frm_vars['dropzone_loaded'] = array();
		}

		$the_id = $atts['file_name'];
		if ( ! isset( $frm_vars['dropzone_loaded'][ $the_id ] ) ) {
			if ( $is_multiple ) {
				$max = empty( $field['max'] ) ? 99 : absint( $field['max'] );
			} else {
				$max = 1;
			}

			$file_size = self::get_max_file_size( $field['size'] );

			$frm_vars['dropzone_loaded'][ $the_id ] = array(
				'maxFilesize' => round( $file_size, 2 ),
				'maxFiles'    => $max,
				'htmlID'      => $the_id,
				'label'       => $atts['html_id'],
				'uploadMultiple' => $is_multiple,
				'fieldID'     => $field['id'],
				'formID'            => $field['form_id'],
				'parentFormID'      => isset( $field['parent_form_id'] ) ? $field['parent_form_id'] : $field['form_id'],
				'fieldName'   => $atts['field_name'],
				'mockFiles'   => array(),
				'defaultMessage' => __( 'Drop files here to upload', 'formidable-pro' ),
				'fallbackMessage' => __( 'Your browser does not support drag and drop file uploads.', 'formidable-pro' ),
				'fallbackText' => __( 'Please use the fallback form below to upload your files like in the olden days.', 'formidable-pro' ),
				'fileTooBig' => sprintf( __( 'That file is too big. It must be less than %sMB.', 'formidable-pro' ), '{{maxFilesize}}' ),
				'invalidFileType'  => self::get_invalid_file_type_message( $field['name'], $field['invalid'] ),
				'responseError'    => sprintf( __( 'Server responded with %s code.', 'formidable-pro' ), '{{statusCode}}' ),
				'cancel'           => __( 'Cancel upload', 'formidable-pro' ),
				'cancelConfirm'    => __( 'Are you sure you want to cancel this upload?', 'formidable-pro' ),
				'remove'           => __( 'Remove file', 'formidable-pro' ),
				'maxFilesExceeded' => sprintf( __( 'You have uploaded more than %d file(s).', 'formidable-pro' ), $max ),
				'resizeHeight'     => null,
				'resizeWidth'      => null,
				'timeout'          => self::get_timeout(),
			);

			$file_types = self::get_allowed_mimes( $field );
			if ( ! empty( $file_types ) ) {
				// Expected formats: image/*,application/pdf,.psd
				$frm_vars['dropzone_loaded'][ $the_id ]['acceptedFiles'] = implode( ',', array_unique( $file_types ) );
				foreach ( $file_types as $file_type => $mime ) {
					$file_type = explode( '|', $file_type );
					$frm_vars['dropzone_loaded'][ $the_id ]['acceptedFiles'] .= ',.' . implode( ',.', $file_type );
				}
			}

			if ( $field['resize'] && ! empty( $field['new_size'] ) ) {
				$setting_name = 'resize' . ucfirst( $field['resize_dir'] );
				$frm_vars['dropzone_loaded'][ $the_id ][ $setting_name ] = $field['new_size'];
			}

			if ( strpos( $the_id, '-i' ) ) {
				// we are editing, so get the base settings added too
				$id_parts = explode( '-i', $the_id );
				$base_id = $id_parts[0] . '-0';
				$base_settings = $frm_vars['dropzone_loaded'][ $the_id ];
				if ( ! isset( $frm_vars['dropzone_loaded'][ $base_id ] ) && strpos( $base_settings['fieldName'], '[i' . $id_parts[1] . ']' ) ) {
					$base_settings['htmlID'] = $base_id;
					$base_settings['fieldName'] = str_replace( '[i' . $id_parts[1] . ']', '[0]', $base_settings['fieldName'] );
					$frm_vars['dropzone_loaded'][ $base_id ] = $base_settings;
				}
			}

			self::add_mock_files( $field['value'], $frm_vars['dropzone_loaded'][ $the_id ]['mockFiles'] );
		}
	}

	/**
	 * Increase the default timeout from 30 based on server limits
	 *
	 * @since 3.01.02
	 */
	private static function get_timeout() {
		$timeout = absint( ini_get( 'max_execution_time' ) );
		if ( $timeout <= 1 ) {
			// allow for -1 or 0 for unlimited
			$timeout = 5000 * 1000;
		} elseif ( $timeout > 30 ) {
			$timeout = $timeout * 1000;
		} else {
			$timeout = 30000;
		}
		return $timeout;
	}

	private static function add_mock_files( $media_ids, &$mock_files ) {
		FrmProAppHelper::unserialize_or_decode( $media_ids );
		if ( ! empty( $media_ids ) ) {
			foreach ( (array) $media_ids as $media_id ) {
				$file = self::get_mock_file( $media_id );
				if ( ! empty( $file ) ) {
					$mock_files[] = $file;
				}
			}
		}
	}

	/**
	 * @param int $media_id
	 * @return array
	 */
	private static function get_mock_file( $media_id ) {
		$file_url = self::get_file_url( $media_id );
		$path     = get_attached_file( $media_id );
		$file     = array(
			'name'     => basename( $path ),
			'url'      => self::get_file_url( $media_id, 'thumbnail' ),
			'id'       => $media_id,
			'file_url' => $file_url,
		);

		if ( file_exists( $path ) ) {
			$file['size'] = filesize( $path );
		}

		return $file;
	}

	/**
	 * Always hide the temp files from queries.
	 * Hide all unattached form uploads from those without permission.
	 *
	 * @param WP_Query $query
	 */
	public static function filter_media_library( $query ) {
		if ( 'attachment' == $query->get( 'post_type' ) ) {
			$meta_query = $query->get( 'meta_query' );
			self::query_to_exclude_files( $meta_query );

			$query->set( 'meta_query', $meta_query );
		}
	}

	private static function query_to_exclude_files( &$meta_query ) {
		if ( current_user_can( 'frm_edit_entries' ) ) {
			$show = FrmAppHelper::get_param( 'frm-attachment-filter', '', 'get', 'absint' );
		} else {
			$show = false;
		}

		if ( ! is_array( $meta_query ) ) {
			$meta_query = array();
		} else {
			$continue = self::nest_attachment_query( $meta_query );
			if ( ! $continue ) {
				return;
			}
		}

		$meta_query[] = array(
			'relation' => 'AND',
			array(
				'key'     => '_frm_temporary',
				'compare' => 'NOT EXISTS',
			),
			array(
				'key'     => '_frm_file',
				'compare' => $show ? 'EXISTS' : 'NOT EXISTS',
			),
		);
	}

	/**
	 * If a query uses OR, adding to it will return unexpected results
	 * Move the OR query into a subquery
	 *
	 * @return boolean true to continue adding the extra query
	 */
	private static function nest_attachment_query( &$meta_query ) {
		if ( ! isset( $meta_query['relation'] ) || 'or' !== strtolower( $meta_query['relation'] ) ) {
			return true;
		}

		$temp_group = array();
		foreach ( $meta_query as $k => $meta ) {
			// if looking for a Formidable file, don't exclude it
			if ( isset( $meta['value'] ) && strpos( $meta['value'], 'formidable' ) !== false ) {
				return false;
			}
			$temp_group[] = $meta;
			unset( $meta_query[ $k ] );
		}
		$meta_query[] = $temp_group;

		return true;
	}

	public static function filter_api_attachments( $args ) {
		add_action( 'pre_get_posts', 'FrmProFileField::filter_media_library', 99 );
		return $args;
	}

	/**
	 * Validate a file upload field if file was not uploaded with Ajax
	 *
	 * @since 2.03.08
	 *
	 * @param array $errors
	 * @param stdClass $field
	 * @param array $values
	 * @param array $args
	 *
	 * @return array
	 */
	public static function no_js_validate( $errors, $field, $values, $args ) {
		$field->temp_id = $args['id'];

		$args['file_name'] = self::get_file_name( $field, $args );

		if ( isset( $_FILES[ $args['file_name'] ] ) ) {
			self::validate_file_upload( $errors, $field, $args, $values );
			self::add_file_fields_to_global_variable( $field, $args );
		}

		return $errors;
	}

	/**
	 * @since 3.0
	 *
	 * @param object $field
	 * @param array $args
	 */
	private static function get_file_name( $field, $args ) {
		$file_name = 'file' . $field->id;
		if ( isset( $args['key_pointer'] ) && ( $args['key_pointer'] || $args['key_pointer'] === 0 ) ) {
			$file_name .= '-' . $args['key_pointer'];
		}
		return $file_name;
	}

	/**
	 * Add file upload field information to global variable
	 *
	 * @since 2.03.08
	 *
	 * @param stdClass $field
	 * @param array $args
	 */
	private static function add_file_fields_to_global_variable( $field, $args ) {
		global $frm_vars;
		if ( ! isset( $frm_vars['file_fields'] ) ) {
			$frm_vars['file_fields'] = array();
		}

		$frm_vars['file_fields'][ $field->temp_id ]               = $args;
		$frm_vars['file_fields'][ $field->temp_id ]['field_id'] = $field->id;
	}

	/**
	 * Upload files the uploaded files when no JS on page
	 *
	 * @since 2.03.08
	 *
	 * @param array $errors
	 *
	 * @return array
	 */
	public static function upload_files_no_js( $errors ) {
		if ( ! empty( $errors ) ) {
			return $errors;
		}

		global $frm_vars;

		if ( isset( $frm_vars['file_fields'] ) ) {
			foreach ( $frm_vars['file_fields'] as $unique_file_id => $file_args ) {

				if ( isset( $_FILES[ $file_args['file_name'] ] ) ) {
					$file_field = FrmField::getOne( $file_args['field_id'] );
					self::maybe_upload_temp_file( $errors, $file_field, $file_args );
				}
			}
		}

		return $errors;
	}

	/**
	 * If blank errors are set, remove them if a file was uploaded in the field.
	 * It still needs some checks in case there are multiple file fields
	 *
	 * @since 3.0.03
	 */
	public static function remove_error_message( $errors, $field, $value, $args ) {
		if ( ! isset( $errors[ 'field' . $field->temp_id ] ) || $errors[ 'field' . $field->temp_id ] != FrmFieldsHelper::get_error_msg( $field, 'blank' ) ) {
			return $errors;
		}

		$file_name = self::get_file_name( $field, $args );
		$file_uploads = $_FILES[ $file_name ];
		if ( self::file_was_selected( $file_uploads ) ) {
			unset( $errors[ 'field' . $field->temp_id ] );
		}

		return $errors;
	}

	public static function validate_file_upload( &$errors, $field, $args, $values = array() ) {
		$file_uploads = $_FILES[ $args['file_name'] ];

		if ( self::file_was_selected( $file_uploads ) ) {

			add_filter( 'frm_validate_file_field_entry', 'FrmProFileField::remove_error_message', 10, 4 );

			self::validate_file_size( $errors, $field, $args );
			self::validate_file_count( $errors, $field, $args, $values );
			self::validate_file_type( $errors, $field, $args );
			$errors = apply_filters( 'frm_validate_file', $errors, $field, $args );

		} elseif ( empty( $values ) ) {
			$skip_required = FrmProEntryMeta::skip_required_validation( $field );
			if ( $field->required && ! $skip_required ) {
				$errors[ 'field' . $field->temp_id ] = FrmFieldsHelper::get_error_msg( $field, 'blank' );
			}
		}
	}

	private static function file_was_selected( $file_uploads ) {
		//if the field is a file upload, check for a file
		if ( empty( $file_uploads['name'] ) ) {
			return false;
		}

		$filled = true;
		if ( is_array( $file_uploads['name'] ) ) {
			$filled = false;
			foreach ( $file_uploads['name'] as $n ) {
				if ( ! empty( $n ) ) {
					$filled = true;
				}
			}
		}
		return $filled;
	}

	/**
	 * @since 2.02
	 */
	public static function validate_file_size( &$errors, $field, $args ) {
		$mb_limit = FrmField::get_option( $field, 'size' );
		$size_limit = self::get_max_file_size( $mb_limit );
		$file_uploads = (array) $_FILES[ $args['file_name'] ];

		foreach ( (array) $file_uploads['name'] as $k => $name ) {

			// check allowed file size
			if ( ! empty( $file_uploads['error'] ) && in_array( 1, (array) $file_uploads['error'] ) ) {
				$errors[ 'field' . $field->temp_id ] = __( 'That file is too big. It must be less than %sMB.', 'formidable-pro' );
			}

			if ( empty( $name ) ) {
				continue;
			}

			$this_file_size = is_array( $file_uploads['size'] ) ? $file_uploads['size'][ $k ] : $file_uploads['size'];
			$this_file_size = $this_file_size / 1000000; // compare in MB

			if ( $this_file_size > $size_limit ) {
				$errors[ 'field' . $field->temp_id ] = sprintf( __( 'That file is too big. It must be less than %sMB.', 'formidable-pro' ), $size_limit );
			}

			unset( $name );
		}
	}

	public static function get_max_file_size( $mb_limit = 256 ) {
		if ( empty( $mb_limit ) || ! is_numeric( $mb_limit ) ) {
			$mb_limit = 516;
		}
		$mb_limit = (float) $mb_limit;

		$upload_max = wp_max_upload_size() / 1000000;

		return round( min( $upload_max, $mb_limit ), 3 );
	}

	/**
	 * @since 2.02
	 */
	private static function validate_file_count( &$errors, $field, $args, $values ) {
		$multiple_files_allowed = FrmField::get_option( $field, 'multiple' );
		$file_count_limit = (int) FrmField::get_option( $field, 'max' );
		if ( ! $multiple_files_allowed || empty( $file_count_limit ) ) {
			return;
		}

		$total_upload_count = self::get_new_and_old_file_count( $field, $args, $values );
		if ( $total_upload_count > $file_count_limit ) {
			$errors[ 'field' . $field->temp_id ] = sprintf( __( 'You have uploaded more than %d file(s).', 'formidable-pro' ), $file_count_limit );
		}
	}

	/**
	 * Count the number of new files uploaded
	 * along with any previously uploaded files
	 *
	 * @since 2.02
	 */
	private static function get_new_and_old_file_count( $field, $args, $values ) {
		$file_uploads = (array) $_FILES[ $args['file_name'] ];
		$uploaded_count = count( array_filter( $file_uploads['tmp_name'] ) );

		$previous_uploads = (array) self::get_file_posted_vals( $field->id, $args );
		$previous_upload_count = count( array_filter( $previous_uploads ) );

		$total_upload_count = $uploaded_count + $previous_upload_count;
		return $total_upload_count;
	}

	/**
	 * @since 2.02
	 */
	public static function validate_file_type( &$errors, $field, $args ) {
		if ( isset( $errors[ 'field' . $field->temp_id ] ) ) {
			return;
		}

		$mimes = self::get_allowed_mimes( $field );

		$file_uploads = $_FILES[ $args['file_name'] ];
		foreach ( (array) $file_uploads['name'] as $name ) {
			if ( empty( $name ) ) {
				continue;
			}

			//check allowed mime types for this field
			$file_type = wp_check_filetype( $name, $mimes );
			unset($name);

			if ( ! $file_type['ext'] ) {
				break;
			}
		}

		if ( isset( $file_type ) && ! $file_type['ext'] ) {
			$errors[ 'field' . $field->temp_id ] = self::get_invalid_file_type_message( $field->name, $field->field_options['invalid'] );
		}
	}

	private static function get_allowed_mimes( $field ) {
		$mimes = FrmField::get_option( $field, 'ftypes' );
		$restrict = FrmField::is_option_true( $field, 'restrict' ) && ! empty( $mimes );
		if ( ! $restrict ) {
			$mimes = null;
		}
		return $mimes;
	}

	/**
	 * @param string $field_name
	 * @param string $field_invalid_msg
	 * @return string
	 */
	private static function get_invalid_file_type_message( $field_name, $field_invalid_msg ) {
		$default_invalid_messages = array( '' );
		$default_invalid_messages[] = __( 'This field is invalid', 'formidable-pro' );
		$default_invalid_messages[] = $field_name . ' ' . __( 'is invalid', 'formidable-pro' );
		$is_default_message = in_array( $field_invalid_msg, $default_invalid_messages );

		$invalid_type = __( 'Sorry, this file type is not permitted.', 'formidable-pro' );
		$invalid_message = $is_default_message ? $invalid_type : $field_invalid_msg;

		return $invalid_message;
	}

	/**
	 * Upload new files, delete removed files
	 *
	 * @since 2.0
	 * @param array|string $meta_value (the posted value)
	 * @param int $field_id
	 * @param int $entry_id
	 * @return array|string $meta_value
	 */
	public static function prepare_data_before_db( $meta_value, $field_id, $entry_id, $atts ) {
		_deprecated_function( __FUNCTION__, '3.0', 'FrmFieldType::get_value_to_save' );
		$atts['field_id'] = $field_id;
		$atts['entry_id'] = $entry_id;
		$field_obj = FrmFieldFactory::get_field_object( $atts['field'] );
		return $field_obj->get_value_to_save( $meta_value, $atts );
	}

	/**
	* Get media ID(s) to be saved to database and set global media ID values
	*
	* @since 2.0
	* @param array|string $prev_value (posted value)
	* @param object $field
	* @param integer $entry_id
	* @return array|string $meta_value
	*/
	public static function prepare_file_upload_meta( $prev_value, $field, $entry_id ) {
		// remove temp tag on uploads
		self::remove_meta_from_media( $prev_value );

		$last_saved_value = self::get_previous_file_ids( $field, $entry_id );
		self::delete_removed_files( $last_saved_value, $prev_value, $field );
		return $prev_value;
	}

	private static function maybe_upload_temp_file( &$errors, $field, $args ) {
		$file_uploads = $_FILES[ $args['file_name'] ];

		if ( self::file_was_selected( $file_uploads ) ) {
			$response = array( 'errors' => array(), 'media_ids' => array() );
			self::upload_temp_files( $args['file_name'], $response, $field );

			if ( ! empty( $response['media_ids'] ) ) {
				$previous_value = self::get_file_posted_vals( $field->id, $args );
				$new_value = self::set_new_file_upload_meta_value( $field, $response['media_ids'], $previous_value );
				self::set_file_posted_vals( $field->id, $new_value, $args );
			}

			if ( ! empty( $response['errors'] ) ) {
				$errors[ 'field' . $field->temp_id ] = implode( ' ', $response['errors'] );
			}
		}
	}

	public static function ajax_upload() {
		$response = array( 'errors' => array(), 'media_ids' => array() );
		if ( ! empty( $_FILES ) ) {
			$field_id = FrmAppHelper::get_param( 'field_id', '', 'post', 'absint' );
			if ( $field_id ) {
				$field = FrmField::getOne( $field_id, true );
				$field->temp_id = $field->id;

				foreach ( $_FILES as $file_name => $file ) {
					$args = array( 'file_name' => $file_name );
					self::validate_file_type( $response['errors'], $field, $args );
					self::validate_file_size( $response['errors'], $field, $args );
					$response['errors'] = apply_filters( 'frm_validate_file', $response['errors'], $field, $args );

					if ( empty( $response['errors'] ) ) {
						self::upload_temp_files( $file_name, $response, $field );
					}
				}
				$response = apply_filters( 'frm_response_after_upload', $response, $field );
			}
		}

		return $response;
	}

	/**
	 * @param string $file_name
	 * @param array $response
	 * @param object $field
	 */
	private static function upload_temp_files( $file_name, &$response, $field ) {
		$new_media_ids = self::upload_file( $file_name );

		if ( ! $new_media_ids ) {
			$response['errors'][] = __( 'File upload failed', 'formidable-pro' );
		} else {
			self::add_meta_to_media( $new_media_ids, 'temporary', $field->id );
			$response['media_ids'] = $response['media_ids'] + (array) $new_media_ids;
			self::sort_errors_from_ids( $response );
		}
	}

	/**
	 * Let WordPress process the uploads
	 *
	 * @param int $field_id
	 * @param bool $sideload
	 */
	public static function upload_file( $field_id, $sideload = false ) {
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		$response = array( 'media_ids' => array(), 'errors' => array() );
		add_filter( 'upload_dir', array( 'FrmProFileField', 'upload_dir' ) );

		if ( ! $sideload && is_array( $_FILES[ $field_id ]['name'] ) ) {
			foreach ( $_FILES[ $field_id ]['name'] as $k => $n ) {
				if ( empty( $n ) ) {
					continue;
				}

				$f_id = $field_id . $k;
				$_FILES[ $f_id ] = array(
					'name'  => $n,
					'type'  => $_FILES[ $field_id ]['type'][ $k ],
					'tmp_name' => $_FILES[ $field_id ]['tmp_name'][ $k ],
					'error' => $_FILES[ $field_id ]['error'][ $k ],
					'size'  => $_FILES[ $field_id ]['size'][ $k ]
				);

				unset( $k, $n );

				self::handle_upload( $f_id, $response );
			}
		} else {
			self::handle_upload( $field_id, $response, $sideload );
		}

		remove_filter( 'upload_dir', array( 'FrmProFileField', 'upload_dir' ) );

		self::prepare_upload_response( $response );

		return $response;
	}

	private static function handle_upload( $field_id, &$response, $sideload = false ) {
		add_filter( 'wp_insert_attachment_data', 'FrmProFileField::change_attachment_slug', 10, 2 );
		$media_id = $sideload ? media_handle_sideload( $field_id, 0 ) : media_handle_upload( $field_id, 0 );
		remove_filter( 'wp_insert_attachment_data', 'FrmProFileField::change_attachment_slug' );

		if ( is_numeric( $media_id ) ) {
			$response['media_ids'][] = $media_id;
			self::maybe_set_chmod( array( 'file_id' => $media_id, 'form_id' => FrmAppHelper::get_param( 'form_id', '', 'post' ) ) );
			self::add_meta_to_media( $media_id, 'file' );
		} else {
			$response['errors'][] = $media_id;
		}
	}

	/**
	 * Prevent attachments from using valuable top-level slug names
	 *
	 * @param array $data
	 * @param array $post
	 * @return array
	 */
	public static function change_attachment_slug( $data, $post ) {
		$slug              = 'frm-' . sanitize_title( $data['post_name'] );
		$post_id           = $post['ID'];
		$post_status       = $data['post_status'];
		$post_type         = $data['post_type'];
		$post_parent       = $data['post_parent'];
		$data['post_name'] = wp_unique_post_slug( $slug, $post_id, $post_status, $post_type, $post_parent );
		return $data;
	}

	private static function prepare_upload_response( &$response ) {
		if ( empty( $response['media_ids'] ) ) {
			$response = $response['errors'];
		} else {
			$response = $response['media_ids'];
			if ( count( $response ) == 1 ) {
				$response = reset( $response );
			}
		}
	}

	/**
	* Get the final media IDs
	*
	* @since 2.0
	* @param array|string $media_ids
	* @return array $mids
	*/
	private static function sort_errors_from_ids( &$response ) {
		$mids = array();
		foreach ( (array) $response['media_ids'] as $media_id ) {
			if ( is_numeric( $media_id ) ) {
			   $mids[] = $media_id;
			} else {
				foreach ( $media_id->errors as $error ) {
					if ( ! is_array( $error[0] ) ) {
						$response['errors'][] = $error[0];
					}
					unset( $error );
				}
			}
			unset( $media_id );
		}

		$response['media_ids'] = array_filter( $mids );
	}

	/**
	 * Set _frm_temporary and _frm_file metas
	 * to use for media library filtering
	 *
	 * @param array $media_ids
	 * @param string $type
	 * @param mixed $value
	 */
	private static function add_meta_to_media( $media_ids, $type = 'temporary', $value = 1 ) {
		foreach ( (array) $media_ids as $media_id ) {
			if ( is_numeric( $media_id ) ) {
				update_post_meta( $media_id, '_frm_' . $type, $value );
			}
		}
	}

	/**
	 * When an entry is saved, remove the temp flag
	 */
	private static function remove_meta_from_media( $media_ids ) {
		foreach ( (array) $media_ids as $media_id ) {
			if ( is_numeric( $media_id ) ) {
				delete_post_meta( $media_id, '_frm_temporary' );
			}
		}
	}

	/**
	 * Upload files into "formidable" subdirectory
	 */
	public static function upload_dir( $uploads ) {
		$form_id = FrmAppHelper::get_post_param( 'form_id', 0, 'absint' );
		if ( ! $form_id ) {
			$form_id = FrmAppHelper::simple_get( 'form', 'absint', 0 );
		}

		$relative_path = self::get_upload_dir_for_form( $form_id );

		if ( ! empty( $relative_path ) ) {
			$uploads['path'] = $uploads['basedir'] . '/' . $relative_path;
			$uploads['url'] = $uploads['baseurl'] . '/' . $relative_path;
			$uploads['subdir'] = '/' . $relative_path;

			self::create_index( $uploads, $relative_path );
		}

		return $uploads;
	}

	/**
	 * Create an index.php in the folders where files are being uploaded.
	 *
	 * @since 3.06.01
	 * @param array  $uploads Info about file locations.
	 * @param string $path The folder where files will be saved.
	 */
	private static function create_index( $uploads, $path ) {
		if ( file_exists( $uploads['path'] . $uploads['subdir'] . '/index.php' ) ) {
			return;
		}

		remove_filter( 'upload_dir', array( 'FrmProFileField', 'upload_dir' ) );

		$file_atts = array(
			'file_name'   => 'index.php',
			'folder_name' => $path,
		);

		$file_content = '<?php' . "\r\n";
		$new_file     = new FrmCreateFile( $file_atts );
		$new_file->create_file( $file_content );

		add_filter( 'upload_dir', array( 'FrmProFileField', 'upload_dir' ) );
	}

	public static function get_upload_dir_for_form( $form_id ) {
		$base = 'formidable';
		if ( $form_id ) {
			$base .= '/' . $form_id;
		}

		$relative_path = apply_filters( 'frm_upload_folder', $base, compact( 'form_id' ) );
		$relative_path = untrailingslashit( $relative_path );

		return $relative_path;
	}

	/**
	 * Automatically delete files when an entry is deleted.
	 * If the "Delete all entries" button is used, entries will not be deleted
	 *
	 * @since 2.0.22
	 */
	public static function delete_files_with_entry( $entry_id, $entry = false ) {
		if ( empty( $entry ) ) {
			return;
		}

		$upload_fields = FrmField::getAll( array( 'fi.type' => 'file', 'fi.form_id' => $entry->form_id ) );
		foreach ( $upload_fields as $field ) {
			self::delete_files_from_field( $field, $entry );
			unset( $field );
		}
	}

	/**
	 * @since 2.0.22
	 */
	public static function delete_files_from_field( $field, $entry ) {
		if ( self::should_delete_files( $field ) ) {
			$media_ids = self::get_previous_file_ids( $field, $entry );
			self::delete_files_now( $media_ids );
		}
	}

	private static function should_delete_files( $field ) {
		$auto_delete = FrmField::get_option_in_object( $field, 'delete' );
		return ! empty( $auto_delete );
	}

	/**
	 * @since 2.0.22
	 */
	private static function get_previous_file_ids( $field, $entry_id ) {
		return FrmProEntryMetaHelper::get_post_or_meta_value( $entry_id, $field );
	}

	private static function delete_removed_files( $old_value, $new_value, $field ) {
		if ( self::should_delete_files( $field ) ) {
			$media_ids = self::get_removed_file_ids( $old_value, $new_value );
			self::delete_files_now( $media_ids );
		}
	}

	/**
	 * @since 2.0.22
	 */
	private static function get_removed_file_ids( $old_value, $new_value ) {
		$media_ids = array_diff( (array) $old_value, (array) $new_value );
		return $media_ids;
	}

	/**
	 * @since 2.0.22
	 */
	private static function delete_files_now( $media_ids ) {
		if ( empty( $media_ids ) ) {
			return;
		}

		FrmProAppHelper::unserialize_or_decode( $media_ids );
		foreach ( (array) $media_ids as $m ) {
			if ( is_numeric( $m ) ) {
				wp_delete_attachment( $m, true );
			}
		}
	}

	/**
	 * @since 2.02
	 */
	private static function get_file_posted_vals( $field_id, $args ) {
		if ( self::is_field_repeating( $field_id, $args ) ) {
			$value = $_POST['item_meta'][ $args['parent_field_id'] ][ $args['key_pointer'] ][ $field_id ];
		} else {
			$value = $_POST['item_meta'][ $field_id ];
		}
		return $value;
	}

	/**
	*
	* @since 2.0
	* @param int $field_id
	* @param $new_value to set
	* @param array $args array with repeating, key_pointer, and parent_field
	*/
	private static function set_file_posted_vals( $field_id, $new_value, $args ) {
		if ( self::is_field_repeating( $field_id, $args ) ) {
			$_POST['item_meta'][ $args['parent_field_id'] ][ $args['key_pointer'] ][ $field_id ] = $new_value;
		} else {
			$_POST['item_meta'][ $field_id ] = $new_value;
		}
	}

	/**
	* Get the final value for a file upload field
	*
	* @since 2.0.19
	*
	* @param object $field
	* @param array $new_mids
	* @param array|string $prev_value
	* @return array|string $new_value
	*/
	private static function set_new_file_upload_meta_value( $field, $new_mids, $prev_value ) {
		// If no media IDs to upload, end now
		if ( empty( $new_mids ) ) {
			$new_value = $prev_value;
		} else {

			if ( FrmField::is_option_true( $field, 'multiple' ) ) {
				// Multi-file upload fields

				if ( ! empty( $prev_value ) ) {
					$new_value = array_merge( (array) $prev_value, $new_mids );
				} else {
					$new_value = $new_mids;
				}
			} else {
				// Single file upload fields
				$new_value = reset( $new_mids );
			}
		}

		return $new_value;
	}

	private static function is_field_repeating( $field_id, $args ) {
		// Assume this field is not repeating
		$repeating = false;

		if ( isset( $args['parent_field_id'] ) && $args['parent_field_id'] && isset( $args['key_pointer'] ) ) {
			// Check if the current field is inside of the parent/pointer
			if ( isset( $_POST['item_meta'][ $args['parent_field_id'] ][ $args['key_pointer'] ][ $field_id ] ) ) {
				$repeating = true;
			}
		}

		return $repeating;
	}

	/**
	 * @since 3.01.03
	 */
	public static function duplicate_files_with_entry( $entry_id, $form_id, $args ) {
		$old_entry_id  = ! empty( $args['old_id'] ) ? $args['old_id'] : 0;
		$upload_fields = FrmField::getAll( array( 'fi.type' => 'file', 'fi.form_id' => $form_id ) );

		if ( ! $old_entry_id || ! $upload_fields ) {
			return;
		}

		include_once ABSPATH . 'wp-admin/includes/file.php';

		$form_is_protected = self::folder_is_protected( $form_id );
		foreach ( $upload_fields as $field ) {
			$attachments = self::get_previous_file_ids( $field, $old_entry_id );
			FrmProAppHelper::unserialize_or_decode( $attachments );
			if ( empty( $attachments ) ) {
				continue;
			}

			$new_media_ids = array();

			foreach ( (array) $attachments as $attachment_id ) {
				$orig_path = get_attached_file( $attachment_id );

				if ( ! file_exists( $orig_path ) ) {
					continue;
				}

				// Copy path to a temp location because wp_handle_sideload() deletes the original.
				$tmp_path = wp_tempnam();
				if ( ! $tmp_path ) {
					continue;
				}

				if ( $form_is_protected ) {
					self::chmod( $orig_path, 0400 );
				}

				$read_file     = new FrmCreateFile(
					array(
						'new_file_path' => dirname( $orig_path ),
						'file_name'     => basename( $orig_path ),
					)
				);
				$file_contents = $read_file->get_file_contents();

				if ( ! $file_contents || false === file_put_contents( $tmp_path, $file_contents ) ) { // phpcs:ignore WordPress.VIP.FileSystemWritesDisallow.file_ops_file_put_contents,
					@unlink( $tmp_path );
					continue;
				}

				if ( $form_is_protected ) {
					self::chmod( $orig_path, 0200 );
				}

				$file_arr = array(
					'name'     => basename( $orig_path ),
					'size'     => @filesize( $tmp_path ),
					'tmp_name' => $tmp_path,
					'error'    => 0
				);
				$response = self::upload_file( $file_arr, true );

				foreach ( (array) $response as $r ) {
					if ( is_numeric( $r ) ) {
						$new_media_ids[] = $r;
					}
				}
			}

			if ( 1 === count( $new_media_ids ) ) {
				$new_meta = reset( $new_media_ids );
			} else {
				$new_meta = $new_media_ids;
			}

			FrmEntryMeta::update_entry_meta( $entry_id, $field->id, null, $new_meta );
		}
	}

	/**
	 * @param int $file_id
	 * @return bool
	 */
	public static function is_formidable_file( $file_id ) {
		$meta = get_post_meta( $file_id, '_frm_file', true );
		return ! is_array( $meta ) && $meta;
	}

	/**
	 * @return bool
	 */
	public static function server_supports_htaccess() {
		return strpos( FrmAppHelper::get_server_value( 'SERVER_SOFTWARE' ), 'nginx' ) === false && self::files_can_be_modified_on_server();
	}

	/**
	 * @return bool
	 */
	private static function files_can_be_modified_on_server() {
		ob_start();
		$credentials = request_filesystem_credentials( add_query_arg( array( 'page' => 'formidable-settings' ), admin_url( 'admin.php' ) ) );
		ob_end_clean();
		return $credentials !== false;
	}

	/**
	 * Check if the current user has permission to access a specific file
	 *
	 * @param int $id
	 * @return bool
	 */
	public static function user_has_permission( $id ) {
		$form_id = self::get_form_id_from_file_id( $id );
		if ( ! self::folder_is_protected( $form_id ) ) {
			return true;
		}

		$protect_files_roles = self::get_option( $form_id, 'protect_files_role', 0 );

		if ( ! $protect_files_roles ) {
			return true;
		}

		return FrmProFieldsHelper::user_has_permission( $protect_files_roles );
	}

	/**
	 * @param array $args
	 * @return int
	 */
	public static function get_chmod( $args ) {
		if ( isset( $args['file'] ) ) {
			$path = $args['file'];
		} elseif ( isset( $args['file_id'] ) ) {
			$path = get_attached_file( $args['file_id'] );
		} else {
			return -1;
		}

		clearstatcache();
		return fileperms( $path ) & 0777;
	}

	/**
	 * @param array $args
	 */
	public static function maybe_set_chmod( $args ) {
		$args = self::fill_missing_chmod_args( $args );

		if ( ! $args ) {
			return;
		}

		if ( isset( $args['file_id'] ) ) {
			self::set_file_protection( get_attached_file( $args['file_id'] ), $args['protected'] );
			return;
		}

		$dir             = $args['dir'];
		$file_ids        = array_filter( array_map( 'absint', $args['file_ids'] ) );
		$files_to_update = array();
		foreach ( $file_ids as $file_id ) {
			$files_to_update[] = basename( get_attached_file( $file_id ) );

			$metadata = wp_get_attachment_metadata( $file_id, '_wp_attachment_metadata' );
			if ( is_array( $metadata ) && isset( $metadata['sizes'] ) ) {
				$files_to_update = array_merge( $files_to_update, array_column( $metadata['sizes'], 'file' ) );
			}
		}

		foreach ( $files_to_update as $file ) {
			$path = "$dir/$file";
			if ( is_file( $path ) ) {
				self::set_file_protection( $path, $args['protected'] );
			}
		}
	}

	/**
	 * Fill missing chmod keys with function calls based off of other data provided in $args
	 * Also performs some light clean up and validation. If data cannot be filled properly, $args returned will be false
	 *
	 * @param array $args
	 * @return array|false
	 */
	private static function fill_missing_chmod_args( $args ) {
		$is_single_file = isset( $args['file_id'] ) && is_numeric( $args['file_id'] );
		$is_folder      = isset( $args['file_ids'] ) && is_array( $args['file_ids'] );

		if ( ! $is_single_file && ! $is_folder ) {
			return false;
		}

		$missing_args = ! isset( $args['protected'] );
		if ( $is_folder ) {
			$missing_args = $missing_args || ! isset( $args['dir'] );
		}

		if ( ! $missing_args ) {
			return self::cleanup_chmod_args( $args );
		}

		if ( ! isset( $args['form_id'] ) ) {
			$file_id         = isset( $args['file_id'] ) ? $args['file_id'] : reset( $args['file_ids'] );
			$args['form_id'] = self::get_form_id_from_file_id( $file_id );
		}

		if ( ! $args['form_id'] || -1 === $args['form_id'] ) {
			return false;
		}

		if ( ! isset( $args['protected'] ) ) {
			$args['protected'] = self::folder_is_protected( $args['form_id'] );
		}

		if ( $is_folder && ! isset( $args['dir'] ) ) {
			$args['dir'] = self::upload_dir_path( $args['form_id'] );
		}

		return self::cleanup_chmod_args( $args );
	}

	private static function cleanup_chmod_args( $args ) {
		if ( isset( $args['dir'] ) ) {
			$args['dir'] = untrailingslashit( $args['dir'] );
			if ( ! file_exists( $args['dir'] ) ) {
				return false;
			}
		}

		if ( isset( $args['file_ids'] ) ) {
			$args['file_ids'] = array_filter( array_map( 'absint', $args['file_ids'] ) );
			if ( ! $args['file_ids'] ) {
				return false;
			}
		}

		return $args;
	}

	/**
	 * @param int $id
	 * @param string|int[]|bool $size
	 * @param array $args
	 * @return string
	 */
	public static function get_file_url( $id, $size = false, $args = array() ) {
		$form_id = self::get_form_id_from_file_id( $id );

		if ( isset( $args['url'] ) ) {
			$url = $args['url'];
		} else {
			if ( ! $size && wp_attachment_is_image( $id ) ) {
				$size = 'full';
			}

			if ( $size ) {
				$src = wp_get_attachment_image_src( $id, $size );
				if ( $src ) {
					$url = reset( $src );
				}
			}

			if ( ! isset( $url ) ) {
				$url = wp_get_attachment_url( $id );
			}
		}

		if ( -1 === $form_id ) {
			return $url;
		}

		$protected = self::folder_is_protected( $form_id );
		self::maybe_set_chmod( array( 'file_id' => $id, 'form_id' => $form_id, 'protected' => $protected ) );

		if ( ! $protected ) {
			return $url;
		}

		$attached_file = get_attached_file( $id );
		$filename      = basename( $attached_file );
		$raw           = "id:{$id}|filename:{$filename}";

		if ( $size ) {
			if ( is_string( $size ) ) {
				$raw .= "|size:{$size}";
			} elseif ( is_array( $size ) && 2 === count( $size ) ) {
				list( $width, $height ) = $size;
				if ( is_numeric( $width ) && is_numeric( $height ) ) {
					$raw .= "|size:{$width}x{$height}";
				}
			}
		}

		$scheme   = self::maybe_is_ssl() ? 'https' : 'http';
		$home_url = home_url( '', $scheme );

		return $home_url . self::file_protocol() . base64_encode( $raw );
	}

	/**
	 * Determine if the server should serve files over https
	 * First, check for specific $_SERVER variables
	 * If none of the special cases match, use the WordPress function if applicable
	 *
	 * @return bool
	 */
	private static function maybe_is_ssl() {
		if ( self::headers_include_cloudflare_ssl_scheme() ) {
			return true;
		}

		if ( self::headers_include_https_proxy() ) {
			return true;
		}

		return function_exists( 'is_ssl' ) ? is_ssl() : false;
	}

	/**
	 * @return bool
	 */
	private static function headers_include_cloudflare_ssl_scheme() {
		if ( empty( $_SERVER['HTTP_CF_VISITOR'] ) ) {
			return false;
		}

		$cloudflare_visitor = json_decode( $_SERVER['HTTP_CF_VISITOR'] );
		return isset( $cloudflare_visitor->scheme ) && 'https' === $cloudflare_visitor->scheme;
	}

	/**
	 * @return bool
	 */
	private static function headers_include_https_proxy() {
		return ! empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && 'https' === $_SERVER['HTTP_X_FORWARDED_PROTO'];
	}

	/**
	 * @param int $form_id
	 * @param string $key
	 * @param mixed $default
	 * @return mixed
	 */
	public static function get_option( $form_id, $key, $default ) {
		$options = FrmDb::get_var( 'frm_forms', array( 'id' => $form_id ), 'options' );
		FrmProAppHelper::unserialize_or_decode( $options );
		return isset( $options[ $key ] ) ? $options[ $key ] : $default;
	}

	/**
	 * Check REQUEST_URI for protected file download details
	 */
	public static function check_for_download() {
		$payload = self::get_file_payload();

		if ( ! $payload ) {
			return;
		}

		$download = self::get_download_filepath( $payload );

		if ( ! isset( $download['code'] ) ) {
			return;
		}

		if ( 200 === $download['code'] ) {
			self::chmod( $download['path'], 0400 );

			$mime_type   = FrmProAppHelper::get_mime_type( $download['path'] );
			$disposition = self::get_disposition( $mime_type );

			header( FrmAppHelper::get_server_value('SERVER_PROTOCOL') . ' 200 OK');
			header( 'Cache-Control: public' ); // needed for internet explorer
			header( 'Content-Type: ' . $mime_type );
			header( 'Content-Transfer-Encoding: Binary' );
			header( 'Content-Length:' . filesize( $download['path'] ) );
			header( 'Content-Disposition: ' . esc_attr( $disposition ) . '; filename=' . esc_attr( $download['name'] ) );

			@readfile( $download['path'] ); // hide any errors to prevent issues with downloading an error message as a file

			self::chmod( $download['path'], 0200 );
			die();
		} else {
			status_header( $download['code'] );

			if ( 404 === $download['code'] ) {
				$title = __( 'Oops! That file no longer exists', 'formidable-pro' );
			} else {
				$title = __( 'Oops! That file is protected', 'formidable-pro' );
			}
			?>
				<div style="text-align: center;">
					<h1><?php echo esc_html( $title ); ?></h1>
					<p><?php echo esc_html( $download['message'] ); ?></p>
				</div>
			<?php
			wp_die();
		}
	}

	/**
	 * Determine Content-Disposition based on $mime_type
	 * We want to inline PDF and images
	 *
	 * @param string $mime_type
	 * @return string
	 */
	private static function get_disposition( $mime_type ) {
		$is_pdf   = 'application/pdf' === $mime_type;
		$is_image = 0 === strpos( $mime_type, 'image/' );
		if ( $is_pdf || $is_image ) {
			return 'inline';
		}
		return 'attachment';
	}

	/**
	 * @param int $form_id
	 * @return string
	 */
	private static function upload_dir_url( $form_id ) {
		return trailingslashit( wp_upload_dir()['baseurl'] ) . self::get_upload_dir_for_form( $form_id );
	}

	/**
	 * @param int $form_id
	 * @return string
	 */
	private static function upload_dir_path( $form_id ) {
		return trailingslashit( wp_upload_dir()['basedir'] ) . self::get_upload_dir_for_form( $form_id );
	}

	/**
	 * @param int $file_id
	 * @return int
	 */
	private static function get_form_id_from_file_id( $file_id ) {
		$meta = get_post_meta( $file_id, '_frm_file', true );

		if ( ! $meta ) {
			$path = get_attached_file( $file_id );
			if ( self::file_is_in_the_formidable_uploads_dir( $path ) ) {
				$meta = 1;
			} else {
				return -1;
			}
		}

		if ( is_array( $meta ) ) {
			return -1;
		}

		$meta = (int) $meta;

		if ( $meta !== 1 ) {
			return $meta;
		}

		$where     = array(
			'or'              => 1,
			'meta_value'      => $file_id,
			'meta_value LIKE' => array( ':"' . $file_id . '"', 'i:' . $file_id . ';' ),
		);
		$field_ids = FrmDb::get_col( 'frm_item_metas', $where, 'field_id' );

		foreach ( $field_ids as $field_id ) {
			$field = FrmField::getOne( $field_id );
			if ( 'file' === $field->type ) {
				update_post_meta( $file_id, '_frm_file', $field->form_id );
				return $field->form_id;
			}
		}

		$path = get_attached_file( $file_id );
		if ( self::file_is_in_the_formidable_uploads_dir( $path ) ) {
			$relative_path = str_replace( self::default_formidable_uploads_dir(), '', $path );
			$split         = explode( '/', $relative_path );

			if ( 2 === count( $split ) && is_numeric( $split[0] ) ) {
				$form_id = $split[0];
				update_post_meta( $file_id, '_frm_file', $form_id );
				return $form_id;
			}
		}

		return -1;
	}

	/**
	 * As a fallback, if the _frm_file meta is missing for whatever reason, still check for files in the formidable uploads dir
	 *
	 * @param string $path
	 * @return bool
	 */
	private static function file_is_in_the_formidable_uploads_dir( $path ) {
		$file_folder            = dirname( $path );
		$formidable_uploads_dir = self::default_formidable_uploads_dir();
		$dir_length             = strlen( $formidable_uploads_dir );
		if ( strlen( $file_folder ) < $dir_length ) {
			return false;
		}
		return $formidable_uploads_dir === substr( $file_folder, 0, $dir_length );
	}

	public static function default_formidable_uploads_dir() {
		return trailingslashit( wp_upload_dir()['basedir'] ) . 'formidable/';
	}

	/**
	 * Check if the current user has permission to access a specific form
	 *
	 * @param int $id
	 * @return bool
	 */
	private static function folder_is_protected( $form_id ) {
		if ( ! $form_id || $form_id === -1 ) {
			return false;
		}

		$form = FrmForm::getOne( $form_id );
		if ( ! $form ) {
			return false;
		}

		return self::get_option( $form->parent_form_id ? $form->parent_form_id : $form_id, 'protect_files', 0 );
	}

	/**
	 * @param string $file path
	 * @param bool protected
	 */
	private static function set_file_protection( $file, $protected ) {
		if ( ! file_exists( $file ) ) {
			return;
		}

		$chmod = $protected ? 0200 : 0644;
		$leave = array( $chmod );

		if ( $protected ) {
			$leave[] = 0400;
		}

		if ( ! in_array( self::get_chmod( array( 'file' => $file ) ), $leave, true ) ) {
			self::chmod( $file, $chmod );
		}
	}

	/**
	 * @param string $file
	 * @param int $mode
	 */
	public static function chmod( $file, $mode ) {
		self::setup_wp_filesystem();
		global $wp_filesystem;
		if ( ! is_null( $wp_filesystem ) ) {
			$wp_filesystem->chmod( $file, $mode );
		}
	}

	private static function setup_wp_filesystem() {
		new FrmCreateFile( array( 'file_name' => '' ) );
	}

	/**
	 * @return string
	 */
	private static function file_protocol() {
		return get_option( 'permalink_structure' ) ? '/frm_file/' : '?frm_file=';
	}

	/**
	 * Attempt to get a protected file from a /frm_file/ url
	 *
	 * @param string $payload
	 * @return array
	 */
	private static function get_download_filepath( $payload ) {
		/**
		 *  $decoded needs to match id:|filename:|size: pattern (size is optional though)
		 *  if it does not, return without a code (to ignore the request, just in case there is another /frm_file/ implementation on their website)
		*/
		$decoded  = base64_decode( $payload );
		$split    = preg_split( '/[:|]+/', $decoded );
		$count    = count( $split );
		$home_url = home_url();

		if ( ! in_array( $count, array( 4, 6 ), true ) ) {
			return array( 'message' => __( 'payload is not the right size', 'formidable-pro' ) );
		}

		if ( $split[0] !== 'id' || $split[2] !== 'filename' ) {
			return array( 'message' => __( 'payload does not match the expected format', 'formidable-pro' ) );
		}

		$file_id  = absint( $split[1] );
		$filename = sanitize_file_name( $split[3] );

		if ( empty( $file_id ) || empty( $filename ) ) {
			return array(
				'code'    => 403,
				'message' => __( 'if sanitized data is empty, do not try to download', 'formidable-pro' ),
			);
		}

		// only do the referer checks if the user is a guest
		if ( ! is_user_logged_in() ) {
			$referer = FrmAppHelper::get_server_value( 'HTTP_REFERER' );

			if ( ! $referer ) {
				return array(
					'code'    => 403,
					'message' => __( 'referer value either does not exist or it is unusable', 'formidable-pro' ),
				);
			}

			$referer = wp_parse_url( $referer );
			$home    = wp_parse_url( $home_url );

			if ( $referer['host'] !== $home['host'] ) {
				return array(
					'code'    => 403,
					'message' => __( 'referer check failed', 'formidable-pro' ),
				);
			}
		}

		$is_image = wp_attachment_is_image( $file_id );

		if ( $is_image ) {
			if ( $count === 6 && $split[4] !== 'size' ) {
				return array( 'message' => __( 'payload does not match the expected format', 'formidable-pro' ) );
			}

			$size = $count === 6 ? $split[5] : 'full';
		}

		$expected_url         = self::get_file_url( $file_id, $is_image && $count === 6 ? $split[5] : false );
		$expected_request_uri = str_replace( $home_url, '', $expected_url );

		if ( self::file_protocol() . $payload !== $expected_request_uri ) {
			// prevent urls like /something/frm_file/ from triggering a download
			// in this case, leave out the code so the url just continues gracefully
			return array( 'message'  => __( 'url is not an exact match', 'formidable-pro' ) );
		}

		$original_file = get_attached_file( $file_id );

		if ( ! $original_file ) {
			return array(
				'code'    => 404,
				'message' => __( 'no file found', 'formidable-pro' )
			);
		}

		$original_filename = basename( $original_file );

		if ( $original_filename !== $filename ) {
			return array(
				'code'    => 403,
				'message' => __( 'if the filename requested does not match our filename, do not return the file', 'formidable-pro' )
			);
		}

		$form_id = self::get_form_id_from_file_id( $file_id );

		if ( $form_id === -1 ) {
			return array(
				'code'    => 403,
				'message' => __( 'prevent downloads for other uploads. We only want to allow valid connected formidable data', 'formidable-pro' )
			);
		}

		if ( ! self::user_has_permission( $file_id ) ) {
			return array(
				'code'    => 403,
				'message' => __( 'user does not fit any of the set roles, do not serve a file', 'formidable-pro' )
			);
		}

		$directory  = dirname( get_attached_file( $file_id ) );
		$final_path = trailingslashit( $directory );

		self::remove_protected_file_filters();

		if ( $is_image ) {
			$split = array_filter( array_map( 'absint', explode( 'x', $size ) ) );
			if ( 2 === count( $split ) ) {
				$size = $split;
			}
			$image_src = wp_get_attachment_image_src( $file_id, $size );
		}

		$final_path .= ! empty( $image_src ) ? basename( reset( $image_src ) ) : $filename;

		if ( ! file_exists( $final_path ) ) {
			$url = apply_filters( 'wp_get_attachment_url', '', $file_id );

			if ( self::file_might_be_on_another_server( $url ) ) {
				wp_redirect( $url );
				exit;
			}

			self::put_back_protected_file_filters();

			return array(
				'code'    => 404,
				'message' => __( 'file does not exist', 'formidable-pro' )
			);
		}

		self::put_back_protected_file_filters();

		return array(
			'code' => 200,
			'name' => $filename,
			'path' => $final_path,
		);
	}

	private static function remove_protected_file_filters() {
		remove_filter( 'wp_get_attachment_url', 'FrmProFileField::filter_attachment_url' );
		remove_filter( 'wp_get_attachment_image_src', 'FrmProFileField::filter_attachment_image_src' );
	}

	private static function put_back_protected_file_filters() {
		add_filter( 'wp_get_attachment_url', 'FrmProFileField::filter_attachment_url', 10, 2 );
		add_filter( 'wp_get_attachment_image_src', 'FrmProFileField::filter_attachment_image_src', 10, 4 );
	}

	/**
	 * If the url is not pointing to the uploads dir, it might be on another server (like S3, or Google's Cloud)
	 *
	 * @param string $url
	 * @return bool
	 */
	private static function file_might_be_on_another_server( $url ) {
		return $url && false === strpos( $url, wp_upload_dir()['baseurl'] );
	}

	/**
	 * Check REQUEST_URI (or any uri) for protected file download details
	 *
	 * @param string|bool $uri
	 * @return string|bool false if no payload exists
	 */
	private static function get_file_payload( $uri = false ) {
		if ( ! $uri ) {
			$uri = FrmAppHelper::get_server_value('REQUEST_URI');
		}

		$pattern  = self::file_protocol();
		$position = strpos( $uri, $pattern );

		if ( $position === false ) {
			return false;
		}

		return substr( $uri, $position + strlen( $pattern ) );
	}

	/**
	 * @param string $url
	 * @param int $attachment_id
	 * @return bool
	 */
	private static function should_filter_url( $url, $attachment_id ) {
		$form_id = self::get_form_id_from_file_id( $attachment_id );
		if ( $form_id === -1 ) {
			// do not touch non-formidable urls
			return false;
		}

		if ( self::url_is_already_protected( $url ) ) {
			return false;
		}

		return true;
	}

	/**
	 * @param string $url
	 * @return bool
	 */
	private static function url_is_already_protected( $url ) {
		return strpos( $url, self::file_protocol() ) !== false;
	}

	/**
	 * @param string $url
	 * @param int $attachment_id
	 * @return string
	 */
	public static function filter_attachment_url( $url, $attachment_id ) {
		if ( ! self::should_filter_url( $url, $attachment_id ) ) {
			return $url;
		}
		return self::get_file_url( $attachment_id, false, compact( 'url' ) );
	}

	/**
	 * @param array|false $image
	 * @param int $attachment_id
	 * @param string|int[] $size
	 * @param bool $icon
	 * @return array
	 */
	public static function filter_attachment_image_src( $image, $attachment_id, $size, $icon ) {
		if ( is_array( $image ) && isset( $image[0] ) && self::should_filter_url( $image[0], $attachment_id ) && ! $icon ) {
			$image[0] = self::get_file_url( $attachment_id, $size, array( 'url' => $image[0] ) );
		}
		return $image;
	}

	/**
	 * @param array $attr
	 * @param WP_Post $attachment
	 * @param string|int[] $size
	 * @return array
	 */
	public static function filter_attachment_image_attributes( $attr, $attachment, $size = 'thumbnail' ) {
		if ( self::should_filter_attachment_image_attributes( $attachment->ID ) ) {
			$attr['src'] = self::get_file_url( $attachment->ID, $size );
		}
		return $attr;
	}

	/**
	 * @param int $attachment_id
	 * @return bool
	 */
	private static function should_filter_attachment_image_attributes( $attachment_id ) {
		return self::is_formidable_file( $attachment_id ) && wp_attachment_is_image( $attachment_id );
	}

	/**
	 * Protect generated attachments that get generated for thumbnails and other image sizes
	 *
	 * @param mixed $metadata
	 * @param int $attachment_id
	 * @param string $context
	 * @return array
	 */
	public static function protect_metadata_attachments( $metadata, $attachment_id, $context = 'create' ) {
		if ( 'create' === $context ) {
			self::maybe_protect_metadata_file( $metadata, $attachment_id );
		}
		return $metadata;
	}

	/**
	 * @param array $metadata
	 * @param int $attachment_id
	 */
	private static function maybe_protect_metadata_file( $metadata, $attachment_id ) {
		$no_file_meta_exists = ! is_array( $metadata ) || ! isset( $metadata['file'] );
		if ( $no_file_meta_exists ) {
			return;
		}

		if ( self::is_formidable_file( $attachment_id ) ) {
			$form_id = self::get_form_id_from_file_id( $attachment_id );
		} else {
			$form_id = self::get_request_form_id();
			if ( ! $form_id || ! self::path_matches_form( $form_id, $metadata['file'] ) ) {
				return;
			}
		}

		if ( ! self::folder_is_protected( $form_id ) ) {
			return;
		}

		$upload_directory = trailingslashit( self::upload_dir_path( $form_id ) );
		foreach ( $metadata['sizes'] as $size_meta ) {
			$path = $upload_directory . $size_meta['file'];
			self::set_file_protection( $path, true );
		}
	}

	/**
	 * @return int 0 if request has no form id
	 */
	private static function get_request_form_id() {
		$form_id = FrmAppHelper::get_post_param( 'form_id', 0, 'absint' );
		if ( ! $form_id ) {
			$form_id = FrmAppHelper::simple_get( 'form', 'absint', 0 );
		}
		return $form_id;
	}

	/**
	 * @param int $form_id
	 * @param string $path
	 * @return bool
	 */
	private static function path_matches_form( $form_id, $path ) {
		$form_directory = self::upload_dir_path( $form_id );
		$path           = wp_upload_dir()['basedir'] . '/' . $path;
		return 0 === strpos( $path, $form_directory );
	}


	/**
	 * @deprecated 2.03.08
	 */
	public static function validate( $errors, $field, $values, $args ) {
		_deprecated_function( __FUNCTION__, '2.03.08', 'FrmProFileField::no_js_validate' );

		return self::no_js_validate( $errors, $field, $values, $args );
	}
}

