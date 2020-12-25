<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmProDb {

	public static $db_version = 82;

	/**
	 * @since 3.0.02
	 */
	public static $plug_version = '4.09.02';

	/**
	 * @since 2.3
	 */
	public static function needs_upgrade( $needs_upgrade = false ) {
		if ( ! $needs_upgrade ) {
			if ( is_callable( 'FrmAppHelper::compare_for_update' ) ) {
				$needs_upgrade = FrmAppHelper::compare_for_update(
					array(
						'option'             => 'frmpro_db_version',
						'new_db_version'     => self::$db_version,
						'new_plugin_version' => self::$plug_version,
					)
				);
			} else {
				// deprecated
				$db_version = get_option( 'frmpro_db_version' );
				if ( strpos( $db_version, '-' ) === false ) {
					$needs_upgrade = true;
				} else {
					$last_upgrade = explode( '-', $db_version );
					$needs_db_upgrade = (int) $last_upgrade[1] < (int) self::$db_version;
					$new_version = version_compare( $last_upgrade[0], self::$plug_version, '<' );
					$needs_upgrade = $needs_db_upgrade || $new_version;
				}
			}
		}
		return $needs_upgrade;
	}

	public static function upgrade() {
		if ( ! self::needs_upgrade() ) {
			return;
		}

		$db_version = self::$db_version; // this is the version of the database we're moving to
		$old_db_version = get_option( 'frmpro_db_version' );
		if ( strpos( $old_db_version, '-' ) ) {
			$last_upgrade = explode( '-', $old_db_version );
			$old_db_version = (int) $last_upgrade[1];
		}

		if ( $old_db_version && is_numeric( $old_db_version ) ) {
			$migrations = array( 16, 17, 25, 27, 28, 29, 30, 31, 32, 34, 36, 37, 39, 43, 44, 50, 62, 65, 66, 71, 78, 79, 81, 82 );
			foreach ( $migrations as $migration ) {
				if ( $db_version >= $migration && $old_db_version < $migration ) {
					call_user_func( array( __CLASS__, 'migrate_to_' . $migration ) );
				}
			}
		}

		FrmProCopiesController::install();

		update_option( 'frmpro_db_version', self::$plug_version . '-' . self::$db_version );

		FrmAppHelper::save_combined_js();
	}

	public static function uninstall() {
		if ( ! current_user_can( 'administrator' ) ) {
			$frm_settings = FrmAppHelper::get_settings();
			wp_die( esc_html( $frm_settings->admin_permission ) );
		}

		delete_option('frmpro_options');
		delete_option('frmpro_db_version');

		//locations
		delete_option( 'frm_usloc_options' );

		delete_option('frmpro_copies_db_version');
		delete_option('frmpro_copies_checked');

		// updating
		delete_site_option( 'frmpro-authorized' );
		delete_site_option( 'frmpro-credentials' );
		delete_site_option( 'frm_autoupdate' );
		delete_site_option( 'frmpro-wpmu-sitewide' );
	}

	/**
	 * Make sure new endpoints are added before the free version upgrade happens
	 *
	 * @since 2.02.09
	 */
	public static function before_free_version_db_upgrade() {
		FrmProContent::add_rewrite_endpoint();
	}

	/**
	 * Attempt to move formidable/views to formidable-views and activate
	 *
	 * @since 4.09
	 */
	private static function migrate_to_82() {
		if ( ! class_exists( 'FrmViewsAppHelper' ) ) {
			return;
		}

		self::add_views_to_inbox();

		if ( ! self::views_plugin_is_nested() || self::views_plugin_exists_outside_of_pro() ) {
			return;
		}

		self::try_to_move_views_with_wp_filesystem() || self::try_to_download_views();
	}

	private static function add_views_to_inbox() {
		$link   = FrmAppHelper::admin_upgrade_link( 'view-separation', 'account/downloads/' );
		$addons = admin_url( 'admin.php?page=formidable-addons' );
		$inbox  = new FrmInbox();
		$inbox->add_message(
			array(
				'key'     => 'views-separation',
				'subject' => 'Formidable Views are now in a new plugin',
				'message' => 'Guess what? Our views have a huge redesign coming. In order to make this easier to manage, we have moved Views into a new add-on. No worries. You will not lose access to Formidable Views.<br/>
					This change should be fully automatic. Please check to make sure you have the new Formidable Views plugin on your site. If it\'s missing, please download it from your <a href="' . esc_url( $addons ) . '">Add-ons page</a> or <a href="' . esc_url( $link ) . '" target="_blank" rel="noopener">account page</a>.',
				'cta'     => '<a href="' . esc_url( $addons ) . '" class="button-primary frm-button-primary">' . esc_html__( 'Check Add-ons', 'formidable-pro' ) . '</a>',
				'icon'    => 'frm_folder_icon',
				'type'    => 'news',
			)
		);
	}

	private static function desired_views_folder_location() {
		return WP_PLUGIN_DIR . '/formidable-views';
	}

	private static function nested_views_folder_location() {
		return FrmProAppHelper::plugin_path() . '/views';
	}

	private static function views_plugin_exists_outside_of_pro() {
		return file_exists( self::desired_views_folder_location() );
	}

	private static function views_plugin_is_nested() {
		return FrmViewsAppHelper::plugin_path() === self::nested_views_folder_location();
	}

	/**
	 * @return bool true on success
	 */
	private static function try_to_move_views_with_wp_filesystem() {
		$attempted = get_option( 'frm_attempt_views_copy' );
		if ( false !== $attempted ) {
			return false;
		}

		update_option( 'frm_attempt_views_copy', true, 'no' );
		self::setup_wp_filesystem();

		$nested_views_path  = self::nested_views_folder_location();
		$desired_views_path = self::desired_views_folder_location();
		$plugin_helper      = new FrmProInstallPlugin(
			array(
				'plugin_file' => 'formidable-views/formidable-views.php',
			)
		);

		global $wp_filesystem;

		if ( is_null( $wp_filesystem ) ) {
			return false;
		}

		$desired_path_exists = $wp_filesystem->mkdir( $desired_views_path );

		if ( ! $desired_path_exists ) {
			return false;
		}

		$result = copy_dir( $nested_views_path, $desired_views_path );

		if ( true === $result ) {
			$plugin_helper->activate_plugin();
			wp_schedule_single_event( time() + 1, 'delete_nested_views' );
			return true;
		}

		return false;
	}

	private static function setup_wp_filesystem() {
		new FrmCreateFile( array( 'file_name' => '' ) );
	}

	public static function delete_nested_views_folder() {
		self::setup_wp_filesystem();
		global $wp_filesystem;
		if ( ! is_null( $wp_filesystem ) ) {
			$wp_filesystem->rmdir( self::nested_views_folder_location(), true );
		}
	}

	/**
	 * @return bool true on success
	 */
	private static function try_to_download_views() {
		$license   = FrmProAddonsController::get_pro_license();
		$api       = new FrmFormApi( $license );
		$downloads = $api->get_api_info();
		$views     = self::get_views_from_addons( $downloads );

		if ( empty( $views['url'] ) ) {
			return false;
		}

		$download_url = esc_url_raw( $views['url'] );

		require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';

		// Create the plugin upgrader with our custom skin.
		$installer = new Plugin_Upgrader( new FrmProInstallerSkin() );
		$installer->install( $download_url );

		// Flush the cache and get the newly installed plugin basename.
		wp_cache_flush();
		$installed = $installer->plugin_info();
		if ( ! $installed ) {
			return false;
		}

		$network_wide = is_plugin_active_for_network( 'formidable-pro/formidable-pro.php' );
		activate_plugin( $installed, '', $network_wide );

		return true;
	}

	/**
	 * @since 4.09
	 */
	private static function get_views_from_addons( $addons ) {
		return isset( $addons['28027505'] ) ? $addons['28027505'] : array();
	}

	/**
	 * Move the range unit into the append setting.
	 *
	 * @since 4.05.01
	 */
	private static function migrate_to_81() {
		$query = array(
			'field_options like'     => '"unit";s:',
			'field_options not like' => '"unit";s:0:',
			'type'                   => 'range',
		);

		$fields = FrmDb::get_results( 'frm_fields', $query, 'id, field_options' );

		foreach ( $fields as $field ) {
			$field_options = $field->field_options;
			FrmProAppHelper::unserialize_or_decode( $field_options );
			if ( ! isset( $field_options['unit'] ) || trim( $field_options['unit'] ) === '' ) {
				continue;
			}

			$field_options['append'] = $field_options['unit'];
			unset( $field_options['unit'] );

			FrmField::update( $field->id, compact( 'field_options' ) );

			unset( $field, $field_options );
		}
	}

	/**
	 * Move the lookup placeholder into the normal placeholder setting.
	 *
	 * @since 4.0
	 */
	private static function migrate_to_79() {
		$query = array(
			'field_options like'     => '"lookup_placeholder_text";s:',
			'field_options not like' => '"lookup_placeholder_text";s:0:',
			'type'                   => 'lookup',
		);

		$fields = FrmDb::get_results( 'frm_fields', $query, 'id, field_options' );

		foreach ( $fields as $field ) {
			$field_options = $field->field_options;
			FrmProAppHelper::unserialize_or_decode( $field_options );
			$original      = $field_options;

			FrmProXMLHelper::migrate_lookup_placeholder( $field_options );
			if ( $original !== $field_options ) {
				FrmField::update( $field->id, compact( 'field_options' ) );
			}

			unset( $field );
		}
	}

	/**
	 * Remove the checkbox to use Lookup values.
	 *
	 * @since 4.0
	 */
	private static function migrate_to_78() {
		$query = array(
			'field_options like'     => '"get_values_field";s:',
			'field_options not like' => '"get_values_field";s:0:',
		);

		$fields = FrmDb::get_results( 'frm_fields', $query, 'id, field_options' );

		foreach ( $fields as $field ) {
			$field_options = $field->field_options;
			FrmProAppHelper::unserialize_or_decode( $field_options );
			$original      = $field_options;

			FrmProXMLHelper::migrate_lookup_checkbox_setting( $field_options );
			if ( $original !== $field_options ) {
				FrmField::update( $field->id, compact( 'field_options' ) );
			}

			unset( $field );
		}
	}

	/**
	 * Move dyn_default_value to default value.
	 * Fields that still support dyn_default: data, radio, select, dropdown, lookup, address
	 *
	 * @since 4.0
	 */
	private static function migrate_to_71() {
		$query = array(
			'field_options like'     => ':"dyn_default_value";s:',
			'field_options not like' => ':"dyn_default_value";s:0',
		);

		$fields = FrmDb::get_results( 'frm_fields', $query, 'id, type, field_options, default_value' );

		foreach ( $fields as $field ) {
			$field_options = $field->field_options;
			FrmProAppHelper::unserialize_or_decode( $field_options );
			$update = FrmProXMLHelper::migrate_dyn_default_value( $field->type, $field_options );
			if ( ! empty( $update ) ) {
				FrmField::update( $field->id, $update );
			}

			unset( $field );
		}
	}

	/**
	 * Delete uneeded default templates
	 *
	 * @since 3.06
	 */
	private static function migrate_to_66() {
		$form_keys = array( 'frmproapplication', 'frmprorealestatelistings', 'frmprocontact' );
		foreach ( $form_keys as $form_key ) {
			$form = FrmForm::getOne( $form_key );
			if ( $form && $form->default_template == 1 ) {
				FrmForm::destroy( $form_key );
			}
		}
	}

	/**
	 * Make another attempt to move Pro if still nested.
	 * Before running the move, check if migration 50 be triggered anyway.
	 *
	 * @since 3.04.03
	 */
	public static function migrate_to_65() {
		$pro_folder = substr( untrailingslashit( FrmProAppHelper::plugin_path() ), -4 );

		if ( '/pro' !== $pro_folder || ! is_callable( 'FrmProAddonsController::get_pro_download_url' ) ) {
			// not nested
			return;
		}

		$new_plugin = WP_PLUGIN_DIR . '/formidable-pro/';
		if ( file_exists( $new_plugin ) ) {
			return;
		}

		require_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' );

		$download_url = esc_url_raw( FrmProAddonsController::get_pro_download_url() );

		// Create the plugin upgrader with our custom skin.
		$installer = new Plugin_Upgrader( new FrmInstallerSkin() );
		$installer->install( $download_url );

		// Flush the cache and get the newly installed plugin basename.
		wp_cache_flush();
		$installed = $installer->plugin_info();
		if ( ! $installed ) {
			return;
		}

		activate_plugin( $installed );
	}

	/**
	 * Switch end year from 2020 to +10
	 *
	 * @since 3.01
	 */
	public static function migrate_to_62() {
		// Get all date fields
		$fields = FrmDb::get_results( 'frm_fields', array( 'type' => 'date' ), 'id, field_options, form_id' );

		foreach ( $fields as $field ) {
			$field_options = $field->field_options;
			FrmProAppHelper::unserialize_or_decode( $field_options );
			if ( isset( $field_options['end_year'] ) && $field_options['end_year'] == '2020' ) {
				$field_options['end_year'] = '+10';
				$options = array(
					'form_id'       => $field->form_id,
					'field_options' => $field_options,
				);

				FrmField::update( $field->id, $options );
			}
		}
	}

	/**
	 * Attempt to move formidable/pro to formidable-pro and activate
	 *
	 * @since 3.0
	 */
	public static function migrate_to_50() {
		$pro_folder = substr( untrailingslashit( FrmProAppHelper::plugin_path() ), -4 );

		if ( '/pro' === $pro_folder ) {
			// setup $wp_filesystem
			new FrmCreateFile(
				array(
					'file_name' => '',
				)
			);

			$plugin_helper = new FrmProInstallPlugin(
				array(
					'plugin_file' => 'formidable-pro/formidable-pro.php',
				)
			);

			if ( $plugin_helper->is_active() ) {
				return;
			}

			$attempted = get_option( 'frm_attempt_copy' );
			if ( false !== $attempted ) {
				// let's be sure this doesn't get run again
				return;
			}

			update_option( 'frm_attempt_copy', true, 'no' );

			if ( $plugin_helper->is_installed() ) {
				$plugin_helper->activate_plugin();
			} else {

				// copy to new plugin folder
				$new_plugin = WP_PLUGIN_DIR . '/formidable-pro/';

				global $wp_filesystem;
				$m = $wp_filesystem->mkdir( $new_plugin );

				$result = copy_dir( FrmProAppHelper::plugin_path(), $new_plugin );

				if ( true === $result ) {
					$plugin_helper->activate_plugin();
				}
			}
		}
	}

	/**
	 * Separate star from scale field
	 *
	 * @since 3.0
	 */
	public static function migrate_to_44() {
		$image_fields = FrmDb::get_results( 'frm_fields', array( 'type' => array( 'scale', '10radio' ) ), 'id, field_options, form_id' );

		foreach ( $image_fields as $field ) {
			$field_options = $field->field_options;
			FrmProAppHelper::unserialize_or_decode( $field_options );
			if ( isset( $field_options['star'] ) && $field_options['star'] ) {
				$options = array(
					'form_id'       => $field->form_id,
					'type'          => 'star',
				);
				FrmField::update( $field->id, $options );
			}
		}
	}

	/**
	 * Switch image field to url
	 *
	 * @since 3.0
	 */
	public static function migrate_to_43() {
		// Get all image fields
		$image_fields = FrmDb::get_results( 'frm_fields', array( 'type' => 'image' ), 'id, field_options, form_id' );

		foreach ( $image_fields as $field ) {
			$field_options = $field->field_options;
			FrmProAppHelper::unserialize_or_decode( $field_options );
			$field_options['show_image'] = 1;
			$options = array(
				'form_id'       => $field->form_id,
				'field_options' => $field_options,
				'type'          => 'url',
			);

			FrmField::update( $field->id, $options );
		}
	}

	/**
	 * Change saved time formats
	 *
	 * @since 2.3
	 */
	public static function migrate_to_39() {
		// Get all time fields on site
		$times = FrmDb::get_col( 'frm_fields', array( 'type' => array( 'time', 'lookup' ) ), 'id' );
		if ( ! $times ) {
			return;
		}
		$values = FrmDb::get_results( 'frm_item_metas', array( 'field_id' => $times, 'meta_value LIKE' => array( ' AM', ' PM' ) ), 'meta_value, id' );

		global $wpdb;
		foreach ( $values as $value ) {
			$meta_id = $value->id;
			$value = $value->meta_value;
			FrmProAppHelper::unserialize_or_decode( $value );
			$new_value = array();

			foreach ( (array) $value as $v ) {
				$formatted_time = FrmProAppHelper::format_time( $v );
				if ( $formatted_time ) {
					// double check to make sure the time is correct
					$check_time = gmdate( 'h:i A', strtotime( $formatted_time ) );
					if ( $check_time != $v ) {
						break;
					}

					$new_value[] = $formatted_time;
				}
			}

			if ( ! empty( $new_value ) ) {
				if ( count( $new_value ) <= 1 ) {
					$new_time = implode( '', $new_value );
				} else {
					$new_time = maybe_serialize( $new_value );
				}

				$wpdb->update( $wpdb->prefix . 'frm_item_metas', array( 'meta_value' => $new_time ), array( 'id' => $meta_id ) );
			}
		}
	}

	/**
	 * Delete orphaned entries from duplicated repeating section data
	 */
	public static function migrate_to_37() {
		// Get all section fields on site
		$dividers = FrmDb::get_col( 'frm_fields', array( 'type' => 'divider' ), 'id' );

		if ( ! $dividers ) {
			return;
		}

		foreach ( $dividers as $divider_id ) {
			$section_field = FrmField::getOne( $divider_id );

			if ( ! $section_field || ! FrmField::is_repeating_field( $section_field ) ) {
				continue;
			}

			self::delete_duplicate_data_in_section( $section_field );
		}
	}

	/**
	 * Delete orphaned entries from duplicated repeating section data
	 *
	 * @param object $section_field
	 */
	private static function delete_duplicate_data_in_section( $section_field ) {
		// Get all parent entry IDs for section field's parent form
		$check_parents = FrmDb::get_col( 'frm_items', array( 'form_id' => $section_field->form_id ), 'id' );

		if ( ! $check_parents ) {
			return;
		}

		$child_form_id = $section_field->field_options['form_select'];

		foreach ( $check_parents as $parent_id ) {
			$all_child_ids = FrmDb::get_col( 'frm_items', array( 'form_id' => $child_form_id, 'parent_item_id' => $parent_id ), 'id' );

			if ( ! $all_child_ids ) {
				continue;
			}

			$keep_child_ids = FrmDb::get_var( 'frm_item_metas', array( 'field_id' => $section_field->id, 'item_id' => $parent_id ), 'meta_value' );
			FrmProAppHelper::unserialize_or_decode( $keep_child_ids );

			if ( ! is_array( $keep_child_ids ) ) {
				$keep_child_ids = (array) $keep_child_ids;
			}

			foreach ( $all_child_ids as $child_id ) {
				if ( ! in_array( $child_id, $keep_child_ids ) ) {
					FrmEntry::destroy( $child_id );
				}
			}
		}
	}

	/**
	 * Add the _frm_file meta to images without a post
	 * This will prevent old files from showing in the media libarary
	 */
	public static function migrate_to_36() {
		global $wpdb;
		$file_field_ids = $wpdb->get_col( $wpdb->prepare( 'SELECT id FROM ' . $wpdb->prefix . 'frm_fields WHERE type=%s', 'file' ) );
		if ( ! empty( $file_field_ids ) ) {
			$file_field_ids = array_filter( $file_field_ids, 'is_numeric' );
			$query = 'SELECT meta_value FROM ' . $wpdb->prefix . 'frm_item_metas m LEFT JOIN ' . $wpdb->prefix . 'frm_items e ON (e.id = m.item_id) WHERE e.post_id < %d';
			$uploaded_files = $wpdb->get_col( $wpdb->prepare( $query, 1 ) . ' AND field_id in (' . implode( ',', $file_field_ids ) . ')' );

			$file_ids = array();
			foreach ( $uploaded_files as $files ) {
				if ( ! is_numeric( $files ) ) {
					FrmProAppHelper::unserialize_or_decode( $files );
				}
				$add_files = array_filter( (array) $files, 'is_numeric' );
				$file_ids = array_merge( $file_ids, $add_files );
			}

			foreach ( $file_ids as $file_id ) {
				update_post_meta( absint( $file_id ), '_frm_file', 1 );
			}
		}
	}

	/**
	 * Add in_section variable to all fields within sections
	 *
	 * @since 2.01.0
	 */
	private static function migrate_to_34() {
		$dividers = FrmDb::get_col( 'frm_fields', array( 'type' => 'divider' ), 'id' );

		if ( ! $dividers ) {
			return;
		}

		foreach ( $dividers as $divider_id ) {
			$section_field = FrmField::getOne( $divider_id );

			if ( ! $section_field ) {
				continue;
			}

			self::add_in_section_variable_to_section_children( $section_field );
		}
	}

	/**
	 * Add in_section variable to all of a section's children
	 *
	 * @param object $section_field
	 */
	private static function add_in_section_variable_to_section_children( $section_field ) {
		$section_field_array = FrmProFieldsHelper::convert_field_object_to_flat_array( $section_field );

		// Get all children for divider
		$children = FrmProField::get_children( $section_field_array );

		// Set in_section variable for all children
		FrmProXMLHelper::add_in_section_value_to_field_ids( $children, $section_field->id );
	}

	/**
	 * Add an "Entry ID is equal to [get param=entry old_filter=1]" filter on single entry Views
	 * As of 2.0.23, single entry Views will no longer be filtered automatically by an "entry" parameter
	 *
	 * @since 2.0.23
	 */
	private static function migrate_to_32() {
		global $wpdb;

		// Get all single entry View IDs
		$raw_query = '
			SELECT
				post_id
			FROM
				' . $wpdb->prefix . 'postmeta
			WHERE
				meta_key=%s AND
				meta_value=%s';
		$query = $wpdb->prepare( $raw_query, 'frm_show_count', 'one' );
		$single_entry_view_ids = $wpdb->get_col( $query );

		foreach ( $single_entry_view_ids as $view_id ) {

			$view_options = get_post_meta( $view_id, 'frm_options', true );

			if ( ! $view_options ) {
				$view_options = array();
			} else {
				FrmProAppHelper::unserialize_or_decode( $view_options );
			}

			self::add_entry_id_is_equal_to_get_param_filter( $view_options );

			update_post_meta( $view_id, 'frm_options', $view_options );
		}
	}

	/**
	 * Add "Entry ID is equal to [get param=entry old_filter=1]" filter to a View's options
	 *
	 * @since 2.0.23
	 * @param array $view_options
	 */
	private static function add_entry_id_is_equal_to_get_param_filter( &$view_options ) {
		if ( ! isset( $view_options['where'] ) ) {
			$view_options['where'] = array();
		}

		if ( ! isset( $view_options['where_is'] ) ) {
			$view_options['where_is'] = array();
		}

		if ( ! isset( $view_options['where_val'] ) ) {
			$view_options['where_val'] = array();
		}

		if ( ! in_array( 'id', $view_options['where'] ) ) {
			$view_options['where'][] = 'id';
			$view_options['where_is'][] = '=';
			$view_options['where_val'][] = '[get param=entry old_filter=1]';
		}
	}

	/**
	 * Save the view shortcode to the page if it's inserted automatically
	 * Before removing these options, we need to get the view onto the page
	 */
	private static function migrate_to_31() {
		$query = array(
			'post_type' => 'frm_display',
			'posts_per_page' => 100,
			'post_status' => array( 'publish', 'private' ),
			'meta_query' => array(
				array(
					'key' => 'frm_insert_loc',
					'compare' => 'IN',
					'value' => array( 'before', 'after', 'replace' ),
				),
				array(
					'key' => 'frm_post_id',
					'compare' => '>',
					'value' => '0',
				),
			),
		);
		$auto_inserted_views = get_posts( $query );

		foreach ( $auto_inserted_views as $view ) {
			$location = get_post_meta( $view->ID, 'frm_insert_loc', true );
			$post_id = get_post_meta( $view->ID, 'frm_post_id', true );

			$shortcode = '[display-frm-data id=' . absint( $view->ID ) . ' filter=1]';
			$post = get_post( $post_id );
			if ( $post ) {
				$updated_post = array( 'ID' => $post_id, 'post_content' => $post->post_content );
				if ( $location == 'before' ) {
					$updated_post['post_content'] = $shortcode . $updated_post['post_content'];
				} else {
					$updated_post['post_content'] .= $shortcode;
				}

				if ( wp_update_post( $updated_post ) ) {
					delete_post_meta( $post_id, 'frm_display_id' );
					delete_post_meta( $view->ID, 'frm_insert_loc' );
					delete_post_meta( $view->ID, 'frm_post_id' );
				}
			}
		}
	}

	/**
	* Remove form_select from all non-repeating sections
	*/
	private static function migrate_to_30() {
		// Get all section fields
		$dividers = FrmField::getAll( array( 'fi.type' => 'divider' ) );

		// Remove form_select for non-repeating sections
		foreach ( $dividers as $d ) {
			if ( FrmField::is_repeating_field( $d ) ) {
				continue;
			}

			if ( FrmField::is_option_value_in_object( $d, 'form_select' ) ) {
				$d->field_options['form_select'] = '';
				FrmField::update( $d->id, array( 'field_options' => maybe_serialize( $d->field_options ) ) );
			}
		}
	}

	/**
	* Switch repeating section forms to published and give them names
	*/
	private static function migrate_to_29() {
		// Get all section fields
		$dividers = FrmField::getAll( array( 'fi.type' => 'divider' ) );

		// Update the form name and status for repeating sections
		foreach ( $dividers as $d ) {
			if ( ! FrmField::is_repeating_field( $d ) ) {
				continue;
			}

			$form_id = $d->field_options['form_select'];
			$new_name = $d->name;
			if ( $form_id && is_numeric( $form_id ) ) {
				FrmForm::update( $form_id, array( 'name' => $new_name, 'status' => 'published' ) );
			}
		}
	}

	/**
	* Update incorrect end_divider form IDs
	*/
	private static function migrate_to_28() {
		global $wpdb;
		$query = $wpdb->prepare( 'SELECT fi.id, fi.form_id, form.parent_form_id FROM ' . $wpdb->prefix . 'frm_fields fi INNER JOIN ' . $wpdb->prefix . 'frm_forms form ON fi.form_id = form.id WHERE fi.type = %s AND parent_form_id > %d', 'end_divider', 0 );
		$end_dividers = $wpdb->get_results( $query );

		foreach ( $end_dividers as $e ) {
			// Update the form_id column for the end_divider field
			$wpdb->update( $wpdb->prefix . 'frm_fields', array( 'form_id' => $e->parent_form_id ), array( 'id' => $e->id ) );

			// Clear the cache
			wp_cache_delete( $e->id, 'frm_field' );
			FrmField::delete_form_transient( $e->form_id );
		}
	}

	/**
	 * Migrate style to custom post type
	 */
	private static function migrate_to_27() {
		$new_post = array(
			'post_type'     => FrmStylesController::$post_type,
			'post_title'    => __( 'Formidable Style', 'formidable-pro' ),
			'post_status'   => 'publish',
			'post_content'  => array(),
			'menu_order'    => 1, //set as default
		);

		$exists = get_posts(
			array(
				'post_type'   => $new_post['post_type'],
				'post_status' => $new_post['post_status'],
				'numberposts' => 1,
			)
		);

		if ( $exists ) {
			$new_post['ID'] = reset($exists)->ID;
		}

		$frmpro_settings = get_option('frmpro_options');

		// If unserializing didn't work
		if ( ! is_object($frmpro_settings) ) {
			if ( $frmpro_settings ) { //workaround for W3 total cache conflict
				$frmpro_settings = unserialize(serialize($frmpro_settings));
			}
		}

		if ( ! is_object($frmpro_settings) ) {
			return;
		}

		$frm_style = new FrmStyle();
		$default_styles = $frm_style->get_defaults();

		foreach ( $default_styles as $setting => $default ) {
			if ( isset($frmpro_settings->{$setting}) ) {
				$new_post['post_content'][ $setting ] = $frmpro_settings->{$setting};
			}
		}

		$frm_style->save($new_post);
	}

	/**
	 * Let's remove the old displays now
	 */
	private static function migrate_to_25() {
		global $wpdb;
		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.SchemaChange
		$wpdb->query( 'DROP TABLE IF EXISTS ' . $wpdb->prefix . 'frm_display' );
	}

	/**
	 * Migrate "allow one per field" into "unique"
	 */
	private static function migrate_to_17() {
		global $wpdb;

		$form = FrmForm::getAll();
		$field_ids = array();
		foreach ( $form as $f ) {
			if ( isset($f->options['single_entry']) && $f->options['single_entry'] && is_numeric($f->options['single_entry_type']) ) {
				$f->options['single_entry'] = 0;
				$wpdb->update( $wpdb->prefix . 'frm_forms', array( 'options' => serialize( $f->options ) ), array( 'id' => $f->id ) );
				$field_ids[] = $f->options['single_entry_type'];
			}
			unset($f);
		}

		if ( ! empty($field_ids) ) {
			$fields = FrmDb::get_results( 'frm_fields', array( 'id' => $field_ids ), 'id, field_options' );
			foreach ( $fields as $f ) {
				$opts = $f->field_options;
				FrmProAppHelper::unserialize_or_decode( $opts );
				$opts['unique'] = 1;
				$wpdb->update( $wpdb->prefix . 'frm_fields', array( 'field_options' => serialize( $opts ) ), array( 'id' => $f->id ) );
				unset($f);
			}
		}
	}

	/**
	 * Migrate displays table into wp_posts
	 */
	private static function migrate_to_16() {
		global $wpdb;

		$display_posts = array();
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$wpdb->prefix}frm_display'" ) ) { //only migrate if table exists
			$dis = FrmDb::get_results('frm_display');
		} else {
			$dis = array();
		}

		foreach ( $dis as $d ) {
			$post = array(
				'post_title'      => $d->name,
				'post_content'    => $d->content,
				'post_date'       => $d->created_at,
				'post_excerpt'    => $d->description,
				'post_name'       => $d->display_key,
				'post_status'     => 'publish',
				'post_type'       => 'frm_display'
			);
			$post_ID = wp_insert_post( $post );
			unset($post);

			update_post_meta($post_ID, 'frm_old_id', $d->id);

			if ( ! isset($d->show_count) || empty($d->show_count) ) {
				$d->show_count = 'none';
			}

			foreach ( array(
				'dyncontent', 'param', 'form_id', 'post_id', 'entry_id',
				'param', 'type', 'show_count', 'insert_loc'
			) as $f ) {
				update_post_meta( $post_ID, 'frm_' . $f, $d->{$f} );
				unset($f);
			}

			FrmProAppHelper::unserialize_or_decode( $d->options );
			update_post_meta($post_ID, 'frm_options', $d->options);

			if ( isset( $d->options['insert_loc'] ) && $d->options['insert_loc'] != 'none' && is_numeric( $d->options['post_id'] ) && ! isset( $display_posts[ $d->options['post_id'] ] ) ) {
				$display_posts[ $d->options['post_id'] ] = $post_ID;
			}

			unset($d, $post_ID);
		}
		unset($dis);

		//get all post_ids from frm_entries
		$entry_posts = FrmDb::get_results( $wpdb->prefix . 'frm_items', array( 'post_id >' => 1 ), 'id, post_id, form_id' );
		$form_display = array();
		foreach ( $entry_posts as $ep ) {
			if ( isset( $form_display[ $ep->form_id ] ) ) {
				$display_posts[ $ep->post_id ] = $form_display[ $ep->form_id ];
			} else {
				$d = FrmProDisplay::get_auto_custom_display( array( 'post_id' => $ep->post_id, 'form_id' => $ep->form_id, 'entry_id' => $ep->id ) );
				$display_posts[ $ep->post_id ] = $d ? $d->ID : 0;
				$form_display[ $ep->form_id ]  = $display_posts[ $ep->post_id ];
				unset( $d );
			}

			unset($ep);
		}
		unset($form_display);

		foreach ( $display_posts as $post_ID => $d ) {
			if ( $d ) {
				update_post_meta($post_ID, 'frm_display_id', $d);
			}
			unset($d, $post_ID);
		}
		unset($display_posts);
	}

}
