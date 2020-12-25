<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmProXMLHelper {

	public static function import_xml_entries( $entries, $imported ) {
		global $frm_duplicate_ids;

		$saved_entries   = array();
		$track_child_ids = array();

		// Import all child entries first
		self::put_child_entries_first( $entries );

		foreach ( $entries as $item ) {
			$entry = array(
				'id'             => (int) $item->id,
				'item_key'       => (string) $item->item_key,
				'name'           => (string) $item->name,
				'description'    => FrmAppHelper::maybe_json_decode( (string) $item->description ),
				'ip'             => (string) $item->ip,
				'form_id'        => ( isset( $imported['forms'][ (int) $item->form_id ] ) ? $imported['forms'][ (int) $item->form_id ] : (int) $item->form_id ),
				'post_id'        => ( isset( $imported['posts'][ (int) $item->post_id ] ) ? $imported['posts'][ (int) $item->post_id ] : (int) $item->post_id ),
				'user_id'        => FrmAppHelper::get_user_id_param( (string) $item->user_id ),
				'parent_item_id' => (int) $item->parent_item_id,
				'is_draft'       => (int) $item->is_draft,
				'updated_by'     => FrmAppHelper::get_user_id_param( (string) $item->updated_by ),
				'created_at'     => (string) $item->created_at,
				'updated_at'     => (string) $item->updated_at,
			);

			$metas = array();
			foreach ( $item->item_meta as $meta ) {
				$field_id = (int) $meta->field_id;
				if ( is_array( $frm_duplicate_ids ) && isset( $frm_duplicate_ids[ $field_id ] ) ) {
					$field_id = $frm_duplicate_ids[ $field_id ];
				}
				$field = FrmField::getOne($field_id);

				if ( ! $field ) {
					continue;
				}

				$metas[ $field_id ] = FrmAppHelper::maybe_json_decode( (string) $meta->meta_value );
				$metas[ $field_id ] = apply_filters( 'frm_import_val', $metas[ $field_id ], $field );

				self::convert_field_values( $field, $field_id, $metas, $saved_entries );
				if ( $field->type === 'user_id' && $metas[ $field_id ] && is_numeric( $metas[ $field_id ] ) ) {
					$entry['frm_user_id'] = $metas[ $field_id ];
				}

				unset($field, $meta);
			}

			unset($item);

			$entry['item_meta'] = $metas;
			unset($metas);

			// Edit entry if the key and created time match.
			$editing = FrmDb::get_var(
				'frm_items',
				array(
					'item_key'   => $entry['item_key'],
					'created_at' => gmdate( 'Y-m-d H:i:s', strtotime( $entry['created_at'] ) ),
				)
			);

			if ( $editing ) {
				FrmEntry::update_entry_from_xml( $entry['id'], $entry );
				$imported['updated']['items']++;
				$saved_entries[ $entry['id'] ] = $entry['id'];
			} else {
				$e = FrmEntry::create_entry_from_xml( $entry );
				if ( $e ) {
					$saved_entries[ $entry['id'] ] = $e;
					$imported['imported']['items']++;
				}
			}

			self::track_imported_child_entries( $saved_entries[ $entry['id'] ], $entry['parent_item_id'], $track_child_ids );

			unset($entry);
		}

		self::update_parent_item_ids( $track_child_ids, $saved_entries );

		unset($entries);

		return $imported;
	}

	private static function put_child_entries_first( &$entries ) {
		$child_entries   = array();
		$regular_entries = array();

		foreach ( $entries as $item ) {
			$parent_item_id = (int) $item->parent_item_id;

			if ( $parent_item_id ) {
				$child_entries[] = $item;
			} else {
				$regular_entries[] = $item;
			}
		}

		$entries = array_merge( $child_entries, $regular_entries );
	}

	/**
	*
	* Track imported entries if they have a parent_item_id
	* Use the old parent_item_id as the array key and set the array value to an array of child IDs
	*
	* @param int|boolean $child_id
	* @param int $parent_id
	* @param array $track_child_ids - pass by reference
	*/
	private static function track_imported_child_entries( $child_id, $parent_id, &$track_child_ids ) {
		if ( ! $parent_id ) {
			return;
		}

		if ( ! isset( $track_child_ids[ $parent_id ] ) ) {
			$track_child_ids[ $parent_id ] = array();
		}

		$track_child_ids[ $parent_id ][] = $child_id;
	}

	/**
	*
	* Update imported child entries so their parent_item_ids match any imported parent entries
	*
	* @since 2.0.12
	*
	* @param array $track_child_ids
	* @param array $saved_entries
	*/
	private static function update_parent_item_ids( $track_child_ids, $saved_entries ) {
		global $wpdb;

		foreach ( $track_child_ids as $old_parent_id => $new_child_ids ) {
			if ( isset( $saved_entries[ $old_parent_id ] ) ) {
				$new_parent_id = $saved_entries[ $old_parent_id ];

				$new_child_ids = '(' . implode( ',', $new_child_ids ) . ')';

				// This parent entry was imported and the parent_item_id column needs to be updated on all children
				$wpdb->query(
					$wpdb->prepare(
						'UPDATE ' . $wpdb->prefix . 'frm_items SET parent_item_id = %d WHERE id IN ' . $new_child_ids,
						$new_parent_id
					)
				);
			}
		}
	}

	public static function import_csv( $path, $form_id, $field_ids, $entry_key = 0, $start_row = 2, $del = ',', $max = 250 ) {
		if ( ! defined('WP_IMPORTING') ) {
			define('WP_IMPORTING', true);
		}

		$form_id = (int) $form_id;
		if ( ! $form_id ) {
			return $start_row;
		}

		// Remove time limit to execute this function
		set_time_limit( 0 );

		$unmapped_fields = self::get_unmapped_fields( $field_ids );
		$field_ids       = array_filter( $field_ids );

		$f = fopen( $path, 'r' );
		if ( $f ) {
			unset($path);
			$row = 0;
			//setlocale(LC_ALL, get_locale());

			while ( ( $data = fgetcsv($f, 100000, $del) ) !== false ) {
				$row++;
				if ( $start_row > $row ) {
					continue;
				}

				$values = array(
					'form_id'   => $form_id,
					'item_meta' => array(),
				);

				foreach ( $field_ids as $key => $field_id ) {
					self::csv_to_entry_value( $key, $field_id, $data, $values );
					unset( $key, $field_id );
				}

				self::convert_db_cols( $values );
				self::convert_timestamps( $values );
				self::save_or_edit_entry( $values, $unmapped_fields );
				unset( $_POST, $values );

				if ( ( $row - $start_row ) >= $max ) {
					fclose($f);
					return $row;
				}
			}

			fclose($f);
			return $row;
		}
	}

	private static function get_unmapped_fields( $field_ids ) {
		$unmapped_fields = array();
		$mapped_fields   = array_filter( $field_ids );
		if ( $field_ids != $mapped_fields ) {
			$unmapped_fields = array_diff( $field_ids, $mapped_fields );
		}
		return $unmapped_fields;
	}

	private static function csv_to_entry_value( $key, $field_id, $data, &$values ) {
		$data[ $key ] = isset( $data[ $key ] ) ? $data[ $key ] : '';

		if ( is_numeric($field_id) ) {
			self::set_values_for_fields($key, $field_id, $data, $values);
		} elseif ( is_array($field_id) ) {
			self::set_values_for_data_fields($key, $field_id, $data, $values);
		} else {
			$values[ $field_id ] = $data[ $key ];
		}
	}

	/**
	 * Called by self::csv_to_entry_value
	 */
	private static function set_values_for_fields( $key, $field_id, $data, &$values ) {
		$field             = self::get_field( $field_id );
		$is_repeater_child = self::is_the_child_of_a_repeater( $field );
		$is_embedded_field = ! $is_repeater_child && isset( $_POST['form_id'] ) && $field->form_id !== $_POST['form_id'];

		if ( $is_repeater_child ) {
			$section_id = $field->field_options['in_section'];
		} elseif ( $is_embedded_field ) {
			$section_id = self::get_section_id_from_form_fields( $_POST['form_id'], $field->form_id );
		}

		$values['item_meta'][ $field_id ] = apply_filters( 'frm_import_val', $data[ $key ], $field );
		self::convert_field_values($field, $field_id, $values['item_meta']);
		$value = $values['item_meta'][ $field_id ];

		if ( $field->type === 'user_id' ) {
			$_POST['frm_user_id']  = $value;
			$values['frm_user_id'] = $value;
		}

		if ( ! empty( $section_id ) ) {
			if ( isset( $_POST['item_meta'][ $section_id ] ) ) {
				$section_data = $_POST['item_meta'][ $section_id ];
				$index        = 0;
				while ( true ) {
					if ( ! array_key_exists( $index, $section_data ) ) {
						$section_data[ $index ] = array();
						break;
					}

					if ( ! array_key_exists( $field_id, $section_data[ $index ] ) ) {
						break;
					}

					$index ++;
				}

				$section_data[ $index ][ $field_id ] = $value;
			} else {
				$section_data = array( 'form' => $field->form_id, array( $field_id => $value ) );
			}

			$values['item_meta'][ $section_id ] = $section_data;
			$_POST['item_meta'][ $section_id ]  = $section_data;
			unset( $values['item_meta'][ $field_id ] );
			return;
		}

		$is_array_type = $field->type === 'checkbox' || ( $field->type === 'data' && $field->field_options['data_type'] !== 'checkbox' );
		if ( $value && $is_array_type && ! empty( $_POST['item_meta'][ $field_id ] ) ) {
			$value = array_merge( (array) $_POST['item_meta'][ $field_id ], (array) $value );
		}

		$values['item_meta'][ $field_id ] = $value;
		$_POST['item_meta'][ $field_id ]  = $value;
	}

	private static function get_section_id_from_form_fields( $parent_form_id, $embedded_form_id ) {
		$fields = FrmField::get_all_types_in_form( $parent_form_id, 'form' );
		foreach ( $fields as $parent_form_field ) {
			if ( ! empty( $parent_form_field->field_options['form_select'] ) && (int) $parent_form_field->field_options['form_select'] === (int) $embedded_form_id ) {
				return $parent_form_field->id;
			}
		}
		return false;
	}

	/**
	 * @param object $field
	 * @return bool
	 */
	private static function is_the_child_of_a_repeater( $field ) {
		$form_id = isset( $_POST['form_id'] ) ? $_POST['form_id'] : false;

		if ( $field->form_id === $form_id || empty( $field->field_options['in_section'] ) ) {
			return false;
		}

		$section_id = $field->field_options['in_section'];
		$section    = self::get_field( $section_id );

		if ( ! $section ) {
			return false;
		}

		return FrmField::is_repeating_field( $section );
	}

	private static function get_field( $field_id ) {
		global $importing_fields;

		if ( ! $importing_fields ) {
			$importing_fields = array();
		}

		if ( isset( $importing_fields[ $field_id ] ) ) {
			$field = $importing_fields[ $field_id ];
		} else {
			$field                         = FrmField::getOne( $field_id );
			$importing_fields[ $field_id ] = $field;
		}

		return $field;
	}

	/**
	 * Called by self::csv_to_entry_value
	 */
	private static function set_values_for_data_fields( $key, $field_id, $data, &$values ) {
		$field_type = isset($field_id['type']) ? $field_id['type'] : false;

		if ( $field_type !== 'data' ) {
			return;
		}

		$linked   = isset($field_id['linked']) ? $field_id['linked'] : false;
		$field_id = $field_id['field_id'];

		if ( $linked ) {
			$entry_id = FrmDb::get_var( 'frm_item_metas', array( 'meta_value' => $data[ $key ], 'field_id' => $linked ), 'item_id' );
		} else {
			//get entry id of entry with item_key == $data[$key]
			$entry_id = FrmDb::get_var( 'frm_items', array( 'item_key' => $data[ $key ] ) );
		}

		if ( $entry_id ) {
			$values['item_meta'][ $field_id ] = $entry_id;
		}
	}

	private static function convert_field_values( $field, $field_id, &$metas, $saved_entries = array() ) {
		$field_obj          = FrmFieldFactory::get_field_object( $field );
		$metas[ $field_id ] = $field_obj->get_import_value( $metas[ $field_id ], array( 'ids' => $saved_entries ) );
	}

	/**
	 * Convert timestamps to the database format
	 */
	private static function convert_timestamps( &$values ) {
		$offset = get_option('gmt_offset') * 60 * 60;

		$frmpro_settings = FrmProAppHelper::get_settings();
		foreach ( array( 'created_at', 'updated_at' ) as $stamp ) {
			if ( ! isset( $values[ $stamp ] ) ) {
				continue;
			}

			// adjust the date format if it starts with the day
			if ( ! preg_match( '/^\d{4}-\d{2}-\d{2}/', trim( $values[ $stamp ] ) ) && substr( $frmpro_settings->date_format, 0, 1 ) === 'd' ) {
				$reg_ex = str_replace(
					array( '/', '.', '-', 'd', 'j', 'm', 'y', 'Y' ),
					array( '\/', '\.', '\-', '\d{2}', '\d', '\d{2}', '\d{2}', '\d{4}' ),
					$frmpro_settings->date_format
				);

				if ( preg_match( '/^' . $reg_ex . '/', trim( $values[ $stamp ] ) ) ) {
					$values[ $stamp ] = FrmProAppHelper::convert_date( $values[ $stamp ], $frmpro_settings->date_format, 'Y-m-d H:i:s' );
				}
			}

			$values[ $stamp ] = gmdate( 'Y-m-d H:i:s', ( strtotime( $values[ $stamp ] ) - $offset ) );

			unset($stamp);
		}
	}

	/**
	 * Make sure values are in the format they should be saved in
	 */
	private static function convert_db_cols( &$values ) {
		if ( ! isset($values['item_key']) || empty($values['item_key']) ) {
			global $wpdb;
			$values['item_key'] = FrmAppHelper::get_unique_key( '', $wpdb->prefix . 'frm_items', 'item_key' );
		}

		if ( isset($values['user_id']) ) {
			$values['user_id'] = FrmAppHelper::get_user_id_param($values['user_id']);
		}

		if ( isset( $values['updated_by'] ) ) {
			$values['updated_by'] = FrmAppHelper::get_user_id_param($values['updated_by']);
		}

		if ( isset( $values['is_draft'] ) ) {
			$values['is_draft'] = (int) $values['is_draft'];
		}

		if ( isset( $values['ip'] ) ) {
			$values['ip'] = sanitize_text_field( $values['ip'] );
		}
	}

	/**
	 * Save the entry after checking if it should be created or updated
	 */
	private static function save_or_edit_entry( $values, $unmapped_fields ) {
		$editing = self::get_entry_to_edit( $values, $unmapped_fields );
		if ( $editing ) {
			FrmEntry::update( $editing, $values );
		} else {
			FrmEntry::create( $values );
		}
	}

	/**
	 * Editing CSV entries on import based on id or key
	 *
	 * @since 3.01.03
	 */
	private static function get_entry_to_edit( $values, $unmapped_fields ) {
		$entry_id = 0;
		$query    = array();

		if ( ! empty( $values['id'] ) ) {
			$query['id'] = $values['id'];
		}

		if ( ! empty( $values['item_key'] ) ) {
			$query['item_key'] = $values['item_key'];
		}

		if ( $query ) {
			if ( count( $query) === 2 ) {
				$query = array_merge( array( 'or' => 1 ), $query );
			}

			$query    = array( 'form_id' => $values['form_id'], $query );
			$entry_id = FrmDb::get_var( 'frm_items', $query );
		}

		/**
		 * When importing entries via CSV set the id of the entry that should be edited
		 *
		 * @since 3.01.03
		 * @param int $entry_id - The ID of the entry to edit. 0 means a new entry will be created.
		 * @param array $values - The mapped values for this entry
		 */
		return apply_filters( 'frm_editing_entry_by_csv', absint( $entry_id ), $values );
	}

	private static function merge_old_entry( $unmapped_fields, &$values ) {
		if ( $unmapped_fields ) {
			$entry = FrmEntry::getOne( $values['id'], true );
			if ( $entry ) {
				$values['item_meta'] += $entry->metas;
			}
		}
	}

	/**
	 * @deprecated 3.0
	 */
	public static function get_file_id( $value ) {
		_deprecated_function( __FUNCTION__, '3.0', 'FrmProFieldFile->get_file_id' );
		$field_obj = FrmFieldFactory::get_field_type( 'file' );
		return $field_obj->get_file_id( $value );
	}

	/**
	 * @deprecated 3.0
	 */
	public static function get_date( $value ) {
		_deprecated_function( __FUNCTION__, '3.0', 'FrmProFieldFile->get_file_id' );
		$field_obj = FrmFieldFactory::get_field_type('file');
		return $field_obj->get_import_value( $value );
	}

	/**
	 * @deprecated 3.0
	 */
	public static function get_multi_opts( $value, $field ) {
		_deprecated_function( __FUNCTION__, '3.0', 'FrmProFieldFile->get_import_value' );
		$field_obj = FrmFieldFactory::get_field_object( $field );
		return $field_obj->get_import_value( $value );
	}

	/**
	 * @deprecated 2.03.08
	 */
	public static function get_dfe_id( $value, $field, $ids = array() ) {
		_deprecated_function( __FUNCTION__, '2.03.08' );
		$field_obj = FrmFieldFactory::get_field_object( $field );
		return $field_obj->get_import_value( $value, compact( 'ids' ) );
	}

	/**
	 * Converted an imported XML value to an array
	 *
	 * @since 2.03.08
	 *
	 * @param $imported_value
	 *
	 * @return array|mixed|string
	 */
	public static function convert_imported_value_to_array( $imported_value ) {
		if ( is_string( $imported_value ) && strpos( $imported_value, ',' ) !== false ) {
			FrmProAppHelper::unserialize_or_decode( $imported_value );

			if ( ! is_array( $imported_value ) ) {
				$imported_value = explode( ',', $imported_value );
			}
		} else {
			$imported_value = (array) $imported_value;
		}

		return $imported_value;
	}

	/**
	 * Update field settings before it's saved.
	 *
	 * @since 4.0
	 */
	public static function run_field_migrations( $field ) {
		$update = self::migrate_dyn_default_value( $field['type'], $field['field_options'] );
		foreach ( $update as $k => $v ) {
			$field[ $k ] = $v;
		}

		self::migrate_lookup_checkbox_setting( $field['field_options'] );
		self::migrate_lookup_placeholder( $field['field_options'] );

		return $field;
	}

	/**
	 * @since 4.0
	 */
	public static function migrate_lookup_placeholder( &$field_options ) {
		if ( empty( $field_options['lookup_placeholder_text'] ) ) {
			return;
		}

		if ( isset( $field_options['placeholder'] ) && ! empty( $field_options['placeholder'] ) ) {
			// Don't overwrite an existing value.
			return;
		}

		$field_options['placeholder'] = $field_options['lookup_placeholder_text'];
		unset( $field_options['lookup_placeholder_text'] );
	}

	/**
	 * @since 4.0
	 */
	public static function migrate_lookup_checkbox_setting( &$field_options ) {
		$is_not_selected = empty( $field_options['get_values_field'] );
		$is_on           = ! isset( $field_options['autopopulate_value'] ) || ! empty( $field_options['autopopulate_value'] );

		if ( $is_not_selected || $is_on ) {
			return;
		}

		// Remove the unused settings used when a field selected, but autopopulate is off.
		$field_options['get_values_field'] = '';
		$field_options['get_values_form']  = '';
		unset( $field_options['autopopulate_value'] );
	}

	/**
	 * @since 4.0
	 */
	public static function migrate_dyn_default_value( $type, $field_options ) {
		$field_types = array( 'file', 'range', 'scale', 'star', 'time', 'toggle', 'user_id' );
		$has_default = isset( $field_options['dyn_default_value'] ) && ! empty( $field_options['dyn_default_value'] );
		if ( ! in_array( $type, $field_types, true ) || ! $has_default ) {
			return array();
		}

		$default_value                      = $field_options['dyn_default_value'];
		$field_options['dyn_default_value'] = '';
		return compact( 'field_options', 'default_value' );
	}

	/**
	 * Perform an action after a field is imported
	 *
	 * @since 2.0.25
	 *
	 * @param array $field_array
	 * @param int $field_id
	 */
	public static function after_field_is_imported( $field_array, $field_id ) {
		self::add_in_section_value_to_repeating_fields( $field_array, $field_id );
		self::update_page_titles( $field_array, $field_id );
	}

	/**
	 * Update page title indexes after import
	 *
	 * @since 2.03.06
	 *
	 * @param array $field_array
	 * @param int|string $new_id
	 */
	private static function update_page_titles( $field_array, $new_id ) {
		if ( $field_array['type'] === 'break' ) {
			$form   = FrmForm::getOne( $field_array['form_id'] );
			$old_id = $field_array['id'];
			if ( isset( $form->options['rootline_titles'][ $old_id ] ) ) {
				$form->options['rootline_titles'][ $new_id ] = $form->options['rootline_titles'][ $old_id ];
				unset( $form->options['rootline_titles'][ $old_id ] );
				FrmForm::update( $form->id, array( 'options' => $form->options ) );
			}
		}
	}

	/**
	 * Add the in_section value to fields in a repeating section
	 *
	 * @since 2.0.25
	 * @param array $f
	 * @param int $section_id
	 */
	private static function add_in_section_value_to_repeating_fields( $f, $section_id ) {
		if ( $f['type'] === 'divider'
			&& FrmField::is_option_true( $f['field_options'], 'repeat' )
			&& FrmField::is_option_true( $f['field_options'], 'form_select' )
		) {
			$new_form_id  = $f['field_options']['form_select'];
			$child_fields = FrmDb::get_col( 'frm_fields', array( 'form_id' => $new_form_id ), 'id' );

			if ( ! $child_fields ) {
				return;
			}

			self::add_in_section_value_to_field_ids( $child_fields, $section_id );
		}
	}

	/**
	 * Add specific in_section value to an array of field IDs
	 *
	 * @since 2.0.25
	 * @param array $field_ids
	 * @param int $section_id
	 */
	public static function add_in_section_value_to_field_ids( $field_ids, $section_id ) {
		foreach ( $field_ids as $child_id ) {
			$child_field_options = FrmDb::get_var( 'frm_fields', array( 'id' => $child_id ), 'field_options' );
			FrmProAppHelper::unserialize_or_decode( $child_field_options );
			$child_field_options['in_section'] = $section_id;

			// Update now
			$update_values = array( 'field_options' => $child_field_options );
			FrmField::update( $child_id, $update_values );
		}
	}

	/**
	 * Update the in_section value after all of the fields have been imported
	 * In come cases the in_section value will be lost otherwise
	 * And the repeater data will not properly associate with the repeating field data
	 *
	 * @param int $child_form_id
	 * @param int $parent_form_id
	 */
	public static function maybe_update_in_section_variables_for_repeater_children( $child_form_id, $parent_form_id ) {
		$child_form_fields = FrmField::get_all_for_form( $child_form_id );
		foreach ( $child_form_fields as $child_field ) {
			if ( ! $child_field->field_options['in_section'] ) {
				if ( ! isset( $dividers ) ) {
					$dividers = FrmField::get_all_types_in_form( $parent_form_id, 'divider' );
				}

				foreach ( $dividers as $divider ) {
					if ( FrmField::is_repeating_field( $divider ) && (int) $divider->field_options['form_select'] === (int) $child_form_id ) {
						$child_field->field_options['in_section'] = $divider->id;
						self::add_in_section_value_to_field_ids( array( $child_field->id ), $divider->id );
						break;
					}
				}
			}
		}
	}
}
