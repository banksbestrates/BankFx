<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmViewsDisplaysController {

	public static $post_type = 'frm_display';

	public static function trigger_load_view_hooks() {
		FrmHooksController::trigger_load_hook( 'load_view_hooks' );
	}

	public static function register_post_types() {
		register_post_type(
			self::$post_type,
			array(
				'label'               => __( 'Views', 'formidable-views' ),
				'description'         => '',
				'public'              => apply_filters( 'frm_public_views', true ),
				'show_ui'             => true,
				'exclude_from_search' => true,
				'show_in_nav_menus'   => false,
				'show_in_menu'        => false,
				'menu_icon'           => admin_url( 'images/icons32.png' ),
				'capability_type'     => 'page',
				'capabilities'        => array(
					'edit_post'         => 'frm_edit_displays',
					'edit_posts'        => 'frm_edit_displays',
					'edit_others_posts' => 'frm_edit_displays',
					'publish_posts'     => 'frm_edit_displays',
					'delete_post'       => 'frm_edit_displays',
					'delete_posts'      => 'frm_edit_displays',
					'read_post'         => 'frm_edit_displays', // Needed to view revisions
				),
				'supports'           => array( 'title', 'revisions' ),
				'has_archive'        => false,
				'labels'             => array(
					'name'          => __( 'Views', 'formidable-views' ),
					'singular_name' => __( 'View', 'formidable-views' ),
					'menu_name'     => __( 'View', 'formidable-views' ),
					'edit'          => __( 'Edit', 'formidable-views' ),
					'search_items'  => __( 'Search Views', 'formidable-views' ),
					'not_found'     => __( 'No Views Found.', 'formidable-views' ),
					'add_new_item'  => __( 'Add New View', 'formidable-views' ),
					'edit_item'     => __( 'Edit View', 'formidable-views' ),
				),
			)
		);
	}

	public static function menu() {
		FrmAppHelper::force_capability( 'frm_edit_displays' );
		add_submenu_page( 'formidable', 'Formidable | ' . __( 'Views', 'formidable-views' ), __( 'Views', 'formidable-views' ), 'frm_edit_displays', 'edit.php?post_type=frm_display' );
	}

	public static function highlight_menu() {
		FrmAppHelper::maybe_highlight_menu( self::$post_type );
	}

	public static function switch_form_box() {
		global $post_type_object;
		if ( ! $post_type_object || $post_type_object->name != self::$post_type ) {
			return;
		}
		$form_id = FrmAppHelper::simple_get( 'form', 'absint' );
		if ( ! empty( $form_id ) ) {
			// Only show when a form is not already selected.
			return;
		}

		// phpcs:ignore WordPress.Security.EscapeOutput
		echo FrmFormsHelper::forms_dropdown( 'form', $form_id, array( 'blank' => __( 'View all forms', 'formidable-views' ) ) );
	}

	/**
	 * Add nav on the views listing page.
	 */
	public static function add_form_nav( $views ) {
		if ( FrmViewsDisplaysHelper::is_edit_view_page() ) {
			$form = isset( $_REQUEST['form'] ) && is_numeric( $_REQUEST['form'] ) ? absint( $_REQUEST['form'] ) : 0;
			self::admin_nav( $form );
		}

		return $views;
	}

	/**
	 * Add nav on the new and edit posts page.
	 */
	public static function add_form_nav_edit( $post ) {
		if ( $post->post_type !== self::$post_type ) {
			return;
		}

		$form = get_post_meta( $post->ID, 'frm_form_id', true );
		self::maybe_set_default_form( $form );
		?>
		<div class="frm_hidden">
			<svg id="frm_views_lock" class="frmsvg">
				<use xlink:href="#frm_lock_simple"></use>
			</svg>
			<svg id="frm_views_unlock" class="frmsvg">
				<use xlink:href="#frm_unlock_simple"></use>
			</svg>
		</div>
		<?php
		self::add_edit_script();
		self::admin_nav( $form );
	}

	private static function add_edit_script() {
		$version = FrmViewsAppHelper::plugin_version();
		wp_register_script( 'formidable_views_edit', FrmViewsAppHelper::plugin_url() . '/js/edit.js', array( 'wp-i18n' ), $version, true );
		wp_register_style( 'formidable_views_edit', FrmViewsAppHelper::plugin_url() . '/css/edit.css', array(), $version );

		wp_enqueue_script( 'formidable_views_edit' );
		wp_enqueue_style( 'formidable_views_edit' );
	}

	private static function admin_nav( $form ) {
		global $pagenow;

		if ( $form ) {
			$form = FrmForm::getOne( $form );
		}

		$header = array(
			'label' => __( 'Views', 'formidable-views' ),
			'form'  => $form,
			'close' => admin_url( 'edit.php?post_type=' . self::$post_type ),
		);

		$is_listing = 'edit.php' === $pagenow;
		if ( $is_listing ) {
			$header['new_link'] = admin_url( 'post-new.php?post_type=' . self::$post_type );
		} else {
			$header['publish']  = array( __CLASS__ . '::publish_button', array() );
		}

		FrmAppHelper::include_svg();
		FrmAppHelper::get_admin_header( $header );

		if ( $is_listing ) {
			self::add_new_button( $form ? $form->id : 0 );
		}
	}

	/**
	 * Add the buttons in the view header.
	 */
	public static function publish_button() {
		global $post;

		$post_type        = $post->post_type;
		$post_type_object = get_post_type_object( $post_type );
		$can_publish      = current_user_can( $post_type_object->cap->publish_posts );

		$label = __( 'Submit for Review', 'formidable-views' );
		$name  = 'publish';
		if ( ! in_array( $post->post_status, array( 'publish', 'future', 'private' ), true ) || 0 == $post->ID ) {
			if ( $can_publish ) {
				if ( ! empty( $post->post_date_gmt ) && time() < strtotime( $post->post_date_gmt . ' +0000' ) ) {
					$label = __( 'Schedule', 'formidable-views' );
				} else {
					$label = __( 'Publish', 'formidable-views' );
				}
			}
		} else {
			$label = __( 'Update', 'formidable-views' );
			$name  = 'save';
		}

		$preview_link        = esc_url( get_preview_post_link( $post ) );
		$preview_button_text = __( 'Preview', 'formidable-views' );

		include FrmViewsAppHelper::plugin_path() . '/classes/views/displays/publish-box.php';
	}

	public static function add_new_button( $form_id = 0 ) {
		if ( empty( $form_id ) ) {
			$form_id = FrmAppHelper::simple_get( 'form', 'absint' );
			if ( ! $form_id ) {
				return;
			}
		}

		echo '<div class="wrap">';
		echo '<h2>';
		esc_html_e( 'Views', 'formidable-views' );
		echo '<a href="' . esc_url( admin_url( 'post-new.php?post_type=' . self::$post_type . '&form=' . $form_id ) ) . '" class="button-primary frm-button-primary frm-with-plus">' .
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			FrmProAppHelper::icon_by_class( 'frmfont frm_plus_icon frm_svg15', array( 'echo' => false ) ) .
			esc_html__( 'Add New', 'formidable-views' ) .
			'</a>';
		echo '</h2>';
		echo '</div>';
	}

	public static function post_row_actions( $actions, $post ) {
		if ( $post->post_type === self::$post_type ) {
			$actions['duplicate'] = '<a href="' . esc_url( admin_url( 'post-new.php?post_type=frm_display&copy_id=' . $post->ID ) ) . '" title="' . esc_attr( __( 'Duplicate', 'formidable-views' ) ) . '">' . __( 'Duplicate', 'formidable-views' ) . '</a>';
		}
		return $actions;
	}

	public static function create_from_template( $path ) {
		$templates = glob( $path . '/*.php' );

		for ( $i = count( $templates ) - 1; $i >= 0; $i-- ) {
			$filename              = str_replace( '.php', '', str_replace( $path . '/', '', $templates[ $i ] ) );
			$display               = get_page_by_path( $filename, OBJECT, self::$post_type );
			$values                = FrmViewsDisplaysHelper::setup_new_vars();
			$values['display_key'] = $filename;

			include $templates[ $i ];
		}
	}

	public static function manage_columns( $columns ) {
		unset( $columns['title'], $columns['date'] );

		$columns['title']       = __( 'View Title', 'formidable-views' );
		$columns['id']          = 'ID';
		$columns['description'] = __( 'Description', 'formidable-views' );
		$columns['form_id']     = __( 'Form', 'formidable-views' );
		$columns['show_count']  = __( 'Entry', 'formidable-views' );
		$columns['content']     = __( 'Content', 'formidable-views' );
		$columns['dyncontent']  = __( 'Dynamic Content', 'formidable-views' );
		$columns['date']        = __( 'Date', 'formidable-views' );
		$columns['name']        = __( 'Key', 'formidable-views' );
		$columns['old_id']      = __( 'Former ID', 'formidable-views' );
		$columns['shortcode']   = __( 'Shortcode', 'formidable-views' );

		return $columns;
	}

	public static function sortable_columns( $columns ) {
		$columns['name']      = 'name';
		$columns['shortcode'] = 'ID';
		return $columns;
	}

	public static function hidden_columns( $result ) {
		$return = false;
		foreach ( (array) $result as $r ) {
			if ( $r ) {
				$return = true;
				break;
			}
		}

		if ( 'excerpt' !== FrmAppHelper::simple_get( 'mode', 'sanitize_title' ) ) {
			$result[] = 'description';
		}

		if ( $return ) {
			return $result;
		}

		$result[] = 'content';
		$result[] = 'dyncontent';
		$result[] = 'old_id';
		$result[] = 'date';

		return $result;
	}

	public static function manage_custom_columns( $column_name, $id ) {
		switch ( $column_name ) {
			case 'id':
				$val = absint( $id );
				break;
			case 'old_id':
				$old_id = get_post_meta( $id, 'frm_old_id', true );
				$val    = ( $old_id ) ? absint( $old_id ) : esc_html__( 'N/A', 'formidable-views' );
				break;
			case 'name':
			case 'content':
				$post = get_post( $id );
				$val  = FrmAppHelper::truncate( strip_tags( $post->{"post_$column_name"} ), 100 );
				break;
			case 'description':
				$post = get_post( $id );
				$val  = FrmAppHelper::truncate( strip_tags( $post->post_excerpt ), 100 );
				break;
			case 'show_count':
				$val = esc_html( ucwords( get_post_meta( $id, 'frm_' . $column_name, true ) ) );
				break;
			case 'dyncontent':
				$val = FrmAppHelper::truncate( strip_tags( get_post_meta( $id, 'frm_' . $column_name, true ) ), 100 );
				break;
			case 'form_id':
				$form_id = get_post_meta( $id, 'frm_' . $column_name, true );
				$val     = FrmFormsHelper::edit_form_link( $form_id );
				break;
			case 'shortcode':
				$code = '[display-frm-data id=' . $id . ' filter=limited]';
				$val  = '<input type="text" readonly="readonly" class="frm_select_box" value="' . esc_attr( $code ) . '" />';
				break;
			default:
				$val = esc_html( $column_name );
				break;
		}

		echo $val; // phpcs:ignore WordPress.Security.EscapeOutput
	}

	public static function submitbox_actions() {
		global $post;
		if ( $post->post_type !== self::$post_type ) {
			return;
		}
		include FrmViewsAppHelper::plugin_path() . '/classes/views/displays/submitbox_actions.php';
	}

	public static function default_content( $content, $post ) {
		$copy_id = FrmAppHelper::simple_get( 'copy_id', 'sanitize_title' );
		if ( $post->post_type !== self::$post_type || ! $copy_id ) {
			return $content;
		}

		global $copy_display;
		$copy_display = FrmViewsDisplay::getOne( $copy_id, false, false, array( 'check_post' => true ) );
		if ( $copy_display ) {
			$content = $copy_display->post_content;
			// Copy title and excerpt over to duplicated View
			add_filter( 'default_title', 'FrmViewsDisplaysController::default_title', 10, 2 );
			add_filter( 'default_excerpt', 'FrmViewsDisplaysController::default_excerpt', 10, 2 );
		}

		return $content;
	}

	/**
	 *
	 * Get the title for a View when it is duplicated
	 *
	 * @return string $title
	 */
	public static function default_title( $title, $post ) {
		$copy_display = FrmViewsDisplaysHelper::get_current_view( $post );
		if ( $copy_display ) {
			$title = $copy_display->post_title;
		}
		return $title;
	}

	/**
	 *
	 * Get the excerpt for a View when it is duplicated
	 *
	 * @return string $excerpt
	 */
	public static function default_excerpt( $excerpt, $post ) {
		$copy_display = FrmViewsDisplaysHelper::get_current_view( $post );
		if ( $copy_display ) {
			$excerpt = $copy_display->post_excerpt;
		}
		return $excerpt;
	}

	public static function add_meta_boxes( $post_type ) {
		if ( $post_type !== self::$post_type ) {
			return;
		}

		add_meta_box( 'frm_form_disp_type', __( 'Basic Settings', 'formidable-views' ), 'FrmViewsDisplaysController::mb_form_disp_type', self::$post_type, 'normal', 'high' );
		add_meta_box( 'frm_dyncontent', __( 'Content', 'formidable-views' ), 'FrmViewsDisplaysController::mb_dyncontent', self::$post_type, 'normal', 'high' );
		add_meta_box( 'frm_excerpt', __( 'Description', 'formidable-views' ), 'FrmViewsDisplaysController::mb_excerpt', self::$post_type, 'normal', 'high' );
		add_meta_box( 'frm_advanced', __( 'Advanced Settings', 'formidable-views' ), 'FrmViewsDisplaysController::mb_advanced', self::$post_type, 'advanced' );
		add_meta_box( 'frm_adv_info', __( 'Customization', 'formidable-views' ), 'FrmViewsDisplaysController::mb_adv_info', self::$post_type, 'side', 'low' );
	}

	public static function save_post( $post_id ) {
		// verify nonce
		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		if ( empty( $_POST ) || ( isset( $_POST['frm_save_display'] ) && ! wp_verify_nonce( $_POST['frm_save_display'], 'frm_save_display_nonce' ) ) || ! isset( $_POST['post_type'] ) || $_POST['post_type'] != self::$post_type || ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$post = get_post( $post_id );
		if ( 'inherit' === $post->post_status ) {
			return;
		}

		FrmViewsDisplay::update( $post_id, $_POST );
		do_action( 'frm_create_display', $post_id, $_POST );
	}

	public static function before_delete_post( $post_id ) {
		$post = get_post( $post_id );
		if ( $post->post_type !== self::$post_type ) {
			return;
		}

		global $wpdb;

		do_action( 'frm_destroy_display', $post_id );

		$used_by = FrmDb::get_col(
			$wpdb->postmeta,
			array(
				'meta_key'   => 'frm_display_id',
				'meta_value' => $post_id,
			),
			'post_ID'
		);
		if ( ! $used_by ) {
			return;
		}

		$form_id = get_post_meta( $post_id, 'frm_form_id', true );

		$next_display = FrmViewsDisplay::get_auto_custom_display( compact( 'form_id' ) );
		if ( $next_display && $next_display->ID ) {
			$wpdb->update(
				$wpdb->postmeta,
				array(
					'meta_value' => $next_display->ID,
				),
				array(
					'meta_key'   => 'frm_display_id',
					'meta_value' => $post_id,
				)
			);
		} else {
			$wpdb->delete(
				$wpdb->postmeta,
				array(
					'meta_key'   => 'frm_display_id',
					'meta_value' => $post_id,
				)
			);
		}
	}

	public static function delete_views_for_form( $form_id ) {
		$display_ids = FrmViewsDisplay::get_display_ids_by_form( $form_id );
		foreach ( $display_ids as $display_id ) {
			wp_delete_post( $display_id );
		}
	}

	/* META BOXES */
	public static function mb_dyncontent( $post ) {
		FrmViewsDisplaysHelper::prepare_duplicate_view( $post );

		$editor_args = array();
		if ( $post->frm_no_rt ) {
			$editor_args['teeny'] = true;
			$editor_args['tinymce'] = false;
		}

		$use_dynamic_content = in_array( $post->frm_show_count, array( 'dynamic', 'calendar' ), true );

		include FrmViewsAppHelper::plugin_path() . '/classes/views/displays/mb_dyncontent.php';
	}

	public static function mb_excerpt( $post ) {
		include FrmViewsAppHelper::plugin_path() . '/classes/views/displays/mb_excerpt.php';
	}

	public static function mb_form_disp_type( $post ) {
		FrmViewsDisplaysHelper::prepare_duplicate_view( $post );
		self::maybe_set_default_form( $post->frm_form_id );
		include FrmViewsAppHelper::plugin_path() . '/classes/views/displays/mb_form_disp_type.php';
	}

	/**
	 * If a form id is in the url, use it to select the default form.
	 */
	private static function maybe_set_default_form( &$form_id ) {
		if ( $form_id ) {
			return;
		}

		$default_form = FrmAppHelper::simple_get( 'form', 'absint' );
		if ( $default_form ) {
			$form_id = $default_form;
		}
	}

	public static function mb_advanced( $post ) {
		FrmViewsDisplaysHelper::prepare_duplicate_view( $post );
		include FrmViewsAppHelper::plugin_path() . '/classes/views/displays/mb_advanced.php';
	}

	public static function mb_adv_info( $post ) {
		FrmViewsDisplaysHelper::prepare_duplicate_view( $post );
		self::maybe_set_default_form( $post->frm_form_id );
		FrmFormsController::mb_tags_box( $post->frm_form_id );
	}

	public static function get_tags_box() {
		FrmAppHelper::permission_check( 'frm_view_forms' );
		check_ajax_referer( 'frm_ajax', 'nonce' );
		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		FrmFormsController::mb_tags_box( (int) $_POST['form_id'], 'frm_doing_ajax' );
		wp_die();
	}

	/* FRONT END */

	public static function get_content( $content ) {
		global $post;
		if ( ! $post ) {
			return $content;
		}

		$entry_id = false;

		if ( $post->post_type === self::$post_type && in_the_loop() ) {
			global $frm_displayed;
			if ( ! $frm_displayed ) {
				$frm_displayed = array();
			}

			if ( in_array( $post->ID, $frm_displayed ) ) {
				return $content;
			}

			$frm_displayed[] = $post->ID;

			return self::get_view_data( $post, $content, array( 'entry_id' => false ) );
		}

		$requires_password = is_singular() && post_password_required();
		$is_single_page    = is_single() || is_page();
		if ( $requires_password || ! $is_single_page || ! in_the_loop() ) {
			return $content;
		}

		$display_id = get_post_meta( $post->ID, 'frm_display_id', true );

		if ( ! $display_id ) {
			return $content;
		}

		$display = FrmViewsDisplay::getOne( $display_id );
		if ( ! $display ) {
			return $content;
		}

		global $frm_displayed;

		if ( $post->post_type !== self::$post_type ) {
			$display = FrmViewsDisplaysHelper::setup_edit_vars( $display, false );
		}

		if ( ! $frm_displayed ) {
			$frm_displayed = array();
		}

		//make sure this isn't loaded multiple times but still works with themes and plugins that call the_content multiple times
		if ( in_array( $display->ID, (array) $frm_displayed ) ) {
			return $content;
		}

		//get the entry linked to this post
		if ( $post->post_type !== self::$post_type ) {

			$entry = FrmDb::get_row( 'frm_items', array( 'post_id' => $post->ID ), 'id, item_key' );
			if ( ! $entry ) {
				return $content;
			}

			$entry_id = $entry->id;

			if ( in_array( $display->frm_show_count, array( 'dynamic', 'calendar' ), true ) && 'display_key' === $display->frm_type ) {
				$entry_id = $entry->item_key;
			}
		}

		$frm_displayed[] = $display->ID;

		$content = self::get_view_data(
			$display,
			$content,
			array(
				'entry_id' => $entry_id,
				'auto_id'  => $entry_id,
			)
		);

		return $content;
	}

	public static function get_order_row() {
		FrmAppHelper::permission_check( 'frm_edit_displays' );
		check_ajax_referer( 'frm_ajax', 'nonce' );
		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		self::add_order_row( absint( $_POST['order_key'] ), absint( $_POST['form_id'] ) );
		wp_die();
	}

	public static function add_order_row( $order_key = '', $form_id = '', $order_by = '', $order = '' ) {
		$order_key = (int) $order_key;
		require FrmViewsAppHelper::plugin_path() . '/classes/views/displays/order_row.php';
	}

	public static function get_where_row() {
		FrmAppHelper::permission_check( 'frm_edit_displays' );
		check_ajax_referer( 'frm_ajax', 'nonce' );
		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		self::add_where_row( absint( $_POST['where_key'] ), absint( $_POST['form_id'] ) );
		wp_die();
	}

	public static function add_where_row( $where_key = '', $form_id = '', $where_field = '', $where_is = '', $where_val = '' ) {
		$where_key = (int) $where_key;
		require FrmViewsAppHelper::plugin_path() . '/classes/views/displays/where_row.php';
	}

	public static function get_where_options() {
		FrmAppHelper::permission_check( 'frm_edit_displays' );
		check_ajax_referer( 'frm_ajax', 'nonce' );
		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		self::add_where_options( sanitize_title( $_POST['field_id'] ), absint( $_POST['where_key'] ), '', true );
		wp_die();
	}

	public static function add_where_options( $field_id, $where_key, $where_val = '', $new = false ) {
		if ( is_numeric( $field_id ) ) {
			$field = FrmField::getOne( $field_id );

			// If a new UserID filter is being added, set "current_user" as the default value
			if ( $new && 'user_id' === $field->type ) {
				$where_val = 'current_user';
			}
		}

		require FrmViewsAppHelper::plugin_path() . '/classes/views/displays/where_options.php';
	}

	/**
	 * Add the header for a calendar listing View
	 *
	 * @param string $content
	 * @param object $view
	 * @return string
	 */
	public static function calendar_header( $content, $view ) {
		if ( 'calendar' !== $view->frm_show_count ) {
			return $content;
		}

		global $frm_vars, $wp_locale;
		$frm_vars['load_css'] = true;

		// 4 digit year
		$year = FrmAppHelper::get_param( 'frmcal-year', date_i18n( 'Y' ), 'get', 'absint' );

		// numeric month with leading zeros
		$month = FrmAppHelper::get_param( 'frmcal-month', date_i18n( 'm' ), 'get', 'sanitize_title' );

		$month_names = $wp_locale->month;

		$this_time  = strtotime( $year . '-' . $month . '-01' );
		$prev_month = gmdate( 'm', strtotime( '-1 month', $this_time ) );
		$prev_year  = gmdate( 'Y', strtotime( '-1 month', $this_time ) );

		$next_month = gmdate( 'm', strtotime( '+1 month', $this_time ) );
		$next_year  = gmdate( 'Y', strtotime( '+1 month', $this_time ) );

		ob_start();
		include FrmViewsAppHelper::plugin_path() . '/classes/views/calendars/calendar-header.php';
		$content .= ob_get_contents();
		ob_end_clean();
		return $content;
	}

	/**
	 * Get the inner content for a Calendar View
	 *
	 * @param string $new_content
	 * @param array $entry_ids
	 * @param array $shortcodes
	 * @param object $view
	 * @return string
	 */
	public static function build_calendar( $new_content, $entry_ids, $shortcodes, $view ) {
		if ( ! $view || 'calendar' !== $view->frm_show_count ) {
			return $new_content;
		}

		global $wp_locale;

		$current_year  = date_i18n( 'Y' );
		$current_month = date_i18n( 'm' );

		//4 digit year
		$year = FrmAppHelper::get_param( 'frmcal-year', gmdate( 'Y' ), 'get', 'absint' );

		//Numeric month with leading zeros
		$month = FrmAppHelper::get_param( 'frmcal-month', $current_month, 'get', 'sanitize_title' );

		$timestamp  = mktime( 0, 0, 0, $month, 1, $year );
		$maxday     = gmdate( 't', $timestamp ); //Number of days in the given month
		$this_month = getdate( $timestamp );
		$startday   = $this_month['wday'];
		unset( $this_month );

		// week_begins = 0 stands for Sunday
		$week_begins = apply_filters( 'frm_cal_week_begins', absint( get_option( 'start_of_week' ) ), $view );
		if ( $week_begins > $startday ) {
			$startday = $startday + 7;
		}

		$week_ends = 6 + (int) $week_begins;
		if ( $week_ends > 6 ) {
			$week_ends = (int) $week_ends - 7;
		}

		$efield = false;
		$field  = false;
		if ( is_numeric( $view->frm_date_field_id ) ) {
			$field = FrmField::getOne( $view->frm_date_field_id );
		}

		if ( is_numeric( $view->frm_edate_field_id ) ) {
			$efield = FrmField::getOne( $view->frm_edate_field_id );
		}

		$daily_entries    = array();
		while ( $next_set = array_splice( $entry_ids, 0, 30 ) ) {
			$entries = FrmEntry::getAll( array( 'id' => $next_set ), ' ORDER BY FIELD(it.id,' . implode( ',', $next_set ) . ')', '', true, false );
			foreach ( $entries as $entry ) {
				self::calendar_daily_entries( $entry, $view, compact( 'startday', 'maxday', 'year', 'month', 'field', 'efield' ), $daily_entries );
			}
		}

		$locale_day_names = apply_filters( 'frm_calendar_day_names', 'weekday_abbrev', array( 'display' => $view ) );
		$day_names        = FrmViewsAppHelper::reset_keys( $wp_locale->{$locale_day_names} ); //switch keys to order

		if ( $week_begins ) {
			for ( $i = $week_begins; $i < ( $week_begins + 7 ); $i++ ) {
				if ( ! isset( $day_names[ $i ] ) ) {
					$day_names[ $i ] = $day_names[ $i - 7 ];
				}
			}
			unset( $i );
		}

		if ( $current_year == $year && $current_month == $month ) {
			$today = date_i18n( 'j' );
		}

		$used_entries = array();

		ob_start();
		include FrmViewsAppHelper::plugin_path() . '/classes/views/calendars/calendar.php';
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	private static function calendar_daily_entries( $entry, $display, $args, array &$daily_entries ) {
		$i18n = false;

		if ( is_numeric( $display->frm_date_field_id ) ) {
			$date = FrmEntryMeta::get_meta_value( $entry, $display->frm_date_field_id );

			if ( $entry->post_id && ! $date && $args['field'] &&
				isset( $args['field']->field_options['post_field'] ) && $args['field']->field_options['post_field']
			) {
				$date = FrmProEntryMetaHelper::get_post_value(
					$entry->post_id,
					$args['field']->field_options['post_field'],
					$args['field']->field_options['custom_field'],
					array(
						'form_id' => $display->frm_form_id,
						'type'    => $args['field']->type,
						'field'   => $args['field'],
					)
				);
			}
		} else {
			$date = 'updated_at' === $display->frm_date_field_id ? $entry->updated_at : $entry->created_at;
			$i18n = true;
		}

		if ( empty( $date ) ) {
			return;
		}

		if ( $i18n ) {
			$date = FrmAppHelper::get_localized_date( 'Y-m-d', $date );
		} else {
			$date = gmdate( 'Y-m-d', strtotime( $date ) );
		}

		unset( $i18n );
		$dates = array( $date );

		if ( ! empty( $display->frm_edate_field_id ) ) {
			if ( is_numeric( $display->frm_edate_field_id ) && $args['efield'] ) {
				$edate = FrmProEntryMetaHelper::get_post_or_meta_value( $entry, $args['efield'] );

				if ( $args['efield'] && 'number' === $args['efield']->type && is_numeric( $edate ) ) {
					$edate = gmdate( 'Y-m-d', strtotime( '+' . ( $edate - 1 ) . ' days', strtotime( $date ) ) );
				}
			} elseif ( 'updated_at' === $display->frm_edate_field_id ) {
				$edate = FrmAppHelper::get_localized_date( 'Y-m-d', $entry->updated_at );
			} else {
				$edate = FrmAppHelper::get_localized_date( 'Y-m-d', $entry->created_at );
			}

			if ( $edate && ! empty( $edate ) ) {
				$from_date = strtotime( $date );
				$to_date   = strtotime( $edate );

				if ( ! empty( $from_date ) && $from_date < $to_date ) {
					for ( $current_ts = $from_date; $current_ts <= $to_date; $current_ts += ( 60 * 60 * 24 ) ) {
						$dates[] = gmdate( 'Y-m-d', $current_ts );
					}
					unset( $current_ts );
				}

				unset( $from_date, $to_date );
			}
			unset( $edate );
		}
		unset( $date );

		self::get_repeating_dates( $entry, $display, $args, $dates );

		$dates = apply_filters( 'frm_show_entry_dates', $dates, $entry );

		for ( $i = 0; $i < ( $args['maxday'] + $args['startday'] ); $i++ ) {
			$day = $i - $args['startday'] + 1;

			if ( in_array( gmdate( 'Y-m-d', strtotime( $args['year'] . '-' . $args['month'] . '-' . $day ) ), $dates ) ) {
				$daily_entries[ $i ][] = $entry;
			}

			unset( $day );
		}
	}

	private static function get_repeating_dates( $entry, $display, $args, array &$dates ) {
		if ( ! is_numeric( $display->frm_repeat_event_field_id ) ) {
			return;
		}

		//Get meta values for repeat field and end repeat field
		if ( isset( $entry->metas[ $display->frm_repeat_event_field_id ] ) ) {
			$repeat_period = $entry->metas[ $display->frm_repeat_event_field_id ];
		} else {
			$repeat_field  = FrmField::getOne( $display->frm_repeat_event_field_id );
			$repeat_period = FrmProEntryMetaHelper::get_post_or_meta_value( $entry->id, $repeat_field );
			unset( $repeat_field );
		}

		if ( isset( $entry->metas[ $display->frm_repeat_edate_field_id ] ) ) {
			$stop_repeat = $entry->metas[ $display->frm_repeat_edate_field_id ];
		} else {
			$stop_field  = FrmField::getOne( $display->frm_repeat_edate_field_id );
			$stop_repeat = FrmProEntryMetaHelper::get_post_or_meta_value( $entry->id, $stop_field );
			unset( $stop_field );
		}

		//If site is not set to English, convert day(s), week(s), month(s), and year(s) (in repeat_period string) to English
		//Check for a few common repeat periods like daily, weekly, monthly, and yearly as well
		$t_strings = array( __( 'day', 'formidable-views' ), __( 'days', 'formidable-views' ), __( 'daily', 'formidable-views' ), __( 'week', 'formidable-views' ), __( 'weeks', 'formidable-views' ), __( 'weekly', 'formidable-views' ), __( 'month', 'formidable-views' ), __( 'months', 'formidable-views' ), __( 'monthly', 'formidable-views' ), __( 'year', 'formidable-views' ), __( 'years', 'formidable-views' ), __( 'yearly', 'formidable-views' ) );
		$t_strings = apply_filters( 'frm_recurring_strings', $t_strings, $display );
		$e_strings = array( 'day', 'days', '1 day', 'week', 'weeks', '1 week', 'month', 'months', '1 month', 'year', 'years', '1 year' );
		if ( $t_strings != $e_strings ) {
			$repeat_period = str_ireplace( $t_strings, $e_strings, $repeat_period );
		}
		unset( $t_strings, $e_strings );

		//Switch [frmcal-date] for current calendar date (for use in "Third Wednesday of [frmcal-date]")
		$repeat_period = str_replace( '[frmcal-date]', $args['year'] . '-' . $args['month'] . '-01', $repeat_period );

		//Filter for repeat_period
		$repeat_period = apply_filters( 'frm_repeat_period', $repeat_period, $display );

		//If repeat period is set and is valid
		if ( empty( $repeat_period ) || ! is_numeric( strtotime( $repeat_period ) ) ) {
			return;
		}

		//Set up end date to minimize dates array - allow for no end repeat field set, nothing selected for end, or any date

		if ( ! empty( $stop_repeat ) ) {
			//If field is selected for recurring end date and the date is not empty
			$maybe_stop_repeat = strtotime( $stop_repeat );
		}

		//Repeat until next viewable month
		$cal_date    = $args['year'] . '-' . $args['month'] . '-01';
		$stop_repeat = strtotime( '+1 month', strtotime( $cal_date ) );

		//If the repeat should end before $stop_repeat (+1 month), use $maybe_stop_repeat
		if ( isset( $maybe_stop_repeat ) && $maybe_stop_repeat < $stop_repeat ) {
			$stop_repeat = $maybe_stop_repeat;
			unset( $maybe_stop_repeat );
		}

		$temp_dates = array();

		foreach ( $dates as $d ) {
			$last_i = 0;
			for ( $i = strtotime( $d ); $i <= $stop_repeat; $i = strtotime( $repeat_period, $i ) ) {
				//Break endless loop
				if ( $i === $last_i ) {
					break;
				}
				$last_i = $i;

				//Add to dates array
				$temp_dates[] = gmdate( 'Y-m-d', $i );
			}
			unset( $last_i, $d );
		}
		$dates = $temp_dates;
	}

	/**
	 * Get the footer for a Calendar View
	 *
	 * @param string $content
	 * @param object $view
	 * @return string
	 */
	public static function calendar_footer( $content, $view ) {
		if ( 'calendar' !== $view->frm_show_count ) {
			return $content;
		}

		ob_start();
		include FrmViewsAppHelper::plugin_path() . '/classes/views/calendars/calendar-footer.php';
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	public static function get_date_field_select() {
		FrmAppHelper::permission_check( 'frm_edit_displays' );
		check_ajax_referer( 'frm_ajax', 'nonce' );

		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		if ( is_numeric( $_POST['form_id'] ) ) {
			$post                            = new stdClass();
			// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$post->frm_form_id               = (int) $_POST['form_id'];
			$post->frm_edate_field_id        = '';
			$post->frm_date_field_id         = '';
			$post->frm_repeat_event_field_id = '';
			$post->frm_repeat_edate_field_id = '';
			include FrmViewsAppHelper::plugin_path() . '/classes/views/calendars/_calendar_options.php';
		}

		wp_die();
	}

	/**
	 * @param string|int $atts[id] The View id or key
	 * @param string|int $atts[entry_id] entry key, id ot list of ids/keys
	 * @param string $atts[filter] 1, 0, or limited
	 * @param string|int $atts[user_id] user id, email, or login
	 * @param string|int $atts[limit] 10 or 10, 20
	 * @param int $atts[page_size]
	 * @param string $atts[order_by] field id or key or list of fields
	 * @param string $atts[order] ASC, DESC, or RAND
	 * @param string $atts[get]
	 * @param string $atts[get_value]
	 * @param string $atts[drafts] 1, 0, or both
	 * @return string
	 */
	public static function get_shortcode( $atts ) {
		$defaults = array(
			'id'        => '',
			'entry_id'  => '',
			'filter'    => false,
			'user_id'   => false,
			'limit'     => '',
			'page_size' => '',
			'order_by'  => '',
			'order'     => '',
			'get'       => '',
			'get_value' => '',
			'drafts'    => 'default',
			'wpautop'   => '',
		);

		$sc_atts = shortcode_atts( $defaults, $atts );
		$atts    = array_merge( (array) $atts, (array) $sc_atts );
		$display = FrmViewsDisplay::getOne( $atts['id'], false, true );
		$user_id = FrmAppHelper::get_user_id_param( $atts['user_id'] );

		if ( ! empty( $atts['get'] ) ) {
			$_GET[ $atts['get'] ] = $atts['get_value'];
		}

		$get_atts = $atts;
		foreach ( $defaults as $unset => $val ) {
			unset( $get_atts[ $unset ], $unset, $val );
		}

		foreach ( $get_atts as $att => $val ) {
			$_GET[ $att ] = $val;
			unset( $att, $val );
		}

		if ( ! $display ) {
			return __( 'There are no views with that ID', 'formidable-views' );
		}

		return self::get_view_data(
			$display,
			'',
			array(
				'filter'    => sanitize_title( $atts['filter'] ),
				'user_id'   => sanitize_text_field( $user_id ),
				'limit'     => sanitize_text_field( $atts['limit'] ),
				'page_size' => sanitize_title( $atts['page_size'] ),
				'order_by'  => sanitize_text_field( $atts['order_by'] ),
				'order'     => sanitize_text_field( $atts['order'] ),
				'drafts'    => sanitize_title( $atts['drafts'] ),
				'entry_id'  => sanitize_text_field( $atts['entry_id'] ),
				'wpautop'   => sanitize_text_field( $atts['wpautop'] ),
			)
		);
	}

	/**
	 * Get the content for a View
	 *
	 * @param object $view
	 * @param string $content
	 * @param array $atts
	 * @return string
	 */
	private static function get_view_data( $view, $content, $atts ) {
		if ( post_password_required( $view ) ) {
			return get_the_password_form( $view );
		}

		if ( self::check_the_view_object( $view ) === false ) {
			return $content;
		}

		$view = apply_filters( 'frm_filter_view', $view );

		self::load_view_hooks( $view );
		self::add_to_forms_loaded_vars();

		$atts = self::get_atts_for_view( $atts, $view );

		self::apply_atts_to_view_object( $atts, $view );

		if ( self::is_listing_page_displayed( $view, $atts ) ) {
			$view_content = self::get_listing_page_content( $view, $atts );
			if ( ! empty( $atts['return_entry_ids'] ) ) {
				return $view_content;
			}
		} else {
			$view_content = self::get_detail_page_content( $view, $atts );
		}

		self::maybe_filter_content( $atts, $view_content );

		// load the styling for css classes and pagination
		FrmStylesController::enqueue_style();

		self::add_view_to_globals( $view );

		ob_start();
		FrmProFormsController::after_footer_loaded();
		$view_content .= ob_get_contents();
		ob_end_clean();

		return $view_content;
	}

	public static function get_view_entry_ids( $view, $content ) {
		return self::get_view_data( $view, $content, array( 'return_entry_ids' => true ) );
	}

	/**
	 * Make sure the View object has the necessary properties set
	 *
	 * TODO: Do not change a value by reference and return a value
	 *
	 * @param object $view
	 * @return bool
	 */
	private static function check_the_view_object( &$view ) {
		if ( ! isset( $view->frm_empty_msg ) ) {
			$view = FrmViewsDisplaysHelper::setup_edit_vars( $view, false );
		}

		if ( empty( $view->frm_form_id ) ) {
			return false;
		}

		//for backwards compatibility
		$view->id          = $view->frm_old_id;
		$view->display_key = $view->post_name;

		return true;
	}

	/**
	 * Load the necessary hooks for a View
	 *
	 * @param object $view
	 */
	private static function load_view_hooks( $view ) {
		add_action( 'frm_load_view_hooks', 'FrmViewsDisplaysController::trigger_load_view_hooks' );
		FrmAppHelper::trigger_hook_load( 'view', $view );
	}

	/**
	 * Add to the forms_loaded array in the global $frm_vars variable
	 */
	private static function add_to_forms_loaded_vars() {
		global $frm_vars;
		$frm_vars['forms_loaded'][] = true;
	}

	/**
	 * Set up the default attributes for a View
	 *
	 * @param array $atts
	 * @param object $view
	 * @return array
	 */
	private static function get_atts_for_view( $atts, $view ) {
		// If old entry ID is set, save it as an att (for reverse compatibility)
		if ( 'one' === $view->frm_show_count && is_numeric( $view->frm_entry_id ) && $view->frm_entry_id > 0 && ! $atts['entry_id'] ) {
			$atts['entry_id'] = $view->frm_entry_id;
		}

		$defaults = array(
			'filter'           => false,
			'user_id'          => '',
			'limit'            => '',
			'page_size'        => '',
			'order_by'         => '',
			'order'            => '',
			'drafts'           => 'default',
			'auto_id'          => '',
			'form_posts'       => self::get_form_posts_for_view( $view, $atts ),
			'pagination'       => '',
			'return_entry_ids' => '',
		);

		return wp_parse_args( $atts, $defaults );
	}

	/**
	 * Apply shortcode attributes to View object
	 *
	 * @param array $atts
	 * @param object $view
	 */
	private static function apply_atts_to_view_object( $atts, &$view ) {
		self::move_view_attributes_to_filters( $atts, $view );
		self::maybe_update_view_order( $atts, $view );
		self::maybe_update_view_limit( $atts, $view );
		self::maybe_update_view_page_size( $atts, $view );
	}

	/**
	 * Move specific View attributes to filters
	 *
	 * @param array $atts
	 * @param object $view
	 */
	private static function move_view_attributes_to_filters( $atts, &$view ) {
		self::move_drafts_param_to_filter( $atts, $view );
		self::move_user_id_param_to_filter( $atts, $view );
	}

	/**
	 * Check if the listing page is being displayed in a View
	 *
	 * @param object $view
	 * @param array $atts
	 * @return bool
	 */
	private static function is_listing_page_displayed( $view, $atts ) {
		$listing_page = true;

		if ( in_array( $view->frm_show_count, array( 'dynamic', 'calendar' ), true ) ) {
			// If calendar/Dynamic View, show the detail page if entry parameter is set (or post is showing)
			if ( self::get_detail_param( $view, $atts ) ) {
				$listing_page = false;
			}
		} elseif ( 'one' === $view->frm_show_count ) {
			$listing_page = false;
		}

		return $listing_page;
	}

	/**
	 * Get the content for the listing page of a View
	 *
	 * @param object $view
	 * @param array $atts
	 * @return string
	 */
	private static function get_listing_page_content( $view, $atts ) {
		$where     = self::get_where_query_for_view_listing_page( $view, $atts );
		$entry_ids = self::get_ordered_entry_ids_for_view( $view, $atts, $where );

		if ( ! empty( $atts['return_entry_ids'] ) ) {
			return array(
				'entry_ids' => $entry_ids,
				'where'     => $where,
			);
		}

		if ( ! $entry_ids ) {
			return self::get_no_entries_content_for_listing_page( $view, $atts );
		}

		$args           = self::package_args_for_view_hooks( $entry_ids, $view, $where );
		$before_content = self::get_before_content_for_listing_page( $view, $args );
		$inner_content  = self::get_inner_content_for_listing_page( $view, $args );
		$after_content  = self::get_after_content_for_listing_page( $view, $args );
		$view_content   = $before_content . $inner_content . $after_content;

		return $view_content;
	}

	/**
	 * Set up the where query for a View listing page
	 *
	 * @param object $view
	 * @param array $atts
	 * @return array
	 */
	private static function get_where_query_for_view_listing_page( $view, $atts ) {
		$where = array( 'it.form_id' => absint( $view->frm_form_id ) );

		if ( self::skip_view_filters( $atts ) ) {
			$where['it.id'] = self::get_entry_ids_that_override_filters( $atts );
		} else {
			self::check_view_filters( $view, $atts, $where );
			if ( self::entries_are_possible( $view ) ) {
				self::check_frm_search( $view, $where );
				self::maybe_add_cat_query( $where );
				self::check_unique_filters( $view, $where );
			}
		}

		return $where;
	}

	/**
	 * Get the content for a View's Detail Page
	 *
	 * @param object $view
	 * @param array $atts
	 * @return string
	 */
	private static function get_detail_page_content( $view, $atts ) {
		self::prepare_view_object_for_detail_page( $view );

		$where     = self::get_where_query_for_view_detail_page( $view, $atts );
		$entry_ids = self::get_ordered_entry_ids_for_view( $view, $atts, $where );

		if ( ! $entry_ids ) {
			return self::get_no_entries_message( $view, $atts );
		}

		$entry_id = reset( $entry_ids );

		self::maybe_redirect_to_post( $entry_id, $view );

		$before_content = self::get_before_content_for_detail_page( $view );
		$inner_content  = self::get_inner_content_for_detail_page( $view, $entry_id );
		$after_content  = self::get_after_content_for_detail_page( $view );
		$view_content   = $before_content . $inner_content . $after_content;

		return $view_content;
	}

	/**
	 * Set the limit to 1 and page size to blank when we're on the detail page of a View
	 *
	 * @param object $view
	 */
	private static function prepare_view_object_for_detail_page( &$view ) {
		$view->frm_limit     = 1;
		$view->frm_page_size = '';
	}

	/**
	 * Get the where query for a View detail page
	 *
	 * @param object $view
	 * @param array $atts
	 * @return array
	 */
	private static function get_where_query_for_view_detail_page( $view, $atts ) {
		$where = array( 'it.form_id' => $view->frm_form_id );

		if ( self::skip_view_filters( $atts ) ) {
			$where['it.id'] = self::get_entry_ids_that_override_filters( $atts );
		} else {
			self::maybe_get_detail_page_entry_id( $view, $atts, $where );
			self::check_view_filters( $view, $atts, $where );

			if ( self::entries_are_possible( $view ) ) {
				self::check_frm_search( $view, $where );
			}
		}

		return $where;
	}

	/**
	 * If on the detail page of a View, add the entry ID of the detail page to the where array
	 *
	 * @param object $view
	 * @param array $atts
	 * @param array $where
	 */
	private static function maybe_get_detail_page_entry_id( $view, $atts, &$where ) {
		if ( in_array( $view->frm_show_count, array( 'dynamic', 'calendar' ), true ) && self::get_detail_param( $view, $atts ) ) {
			$where['it.id'] = self::get_entry_id_for_detail_page( $view, $atts );
		}
	}

	/**
	 * Get the ordered entry IDs for the current page of a View
	 *
	 * @param object $view
	 * @param array $atts
	 * @param array $where
	 * @return array
	 */
	private static function get_ordered_entry_ids_for_view( $view, $atts, $where ) {
		if ( isset( $where['it.id'] ) && empty( $where['it.id'] ) ) {
			return $where['it.id'];
		}

		if ( ! self::entries_are_possible( $view ) ) {
			return array();
		}

		$query_args = array(
			'order_by_array' => $view->frm_order_by,
			'order_array'    => $view->frm_order,
			'posts'          => $atts['form_posts'],
			'display'        => $view,
		);

		if ( $view->frm_page_size ) {
			$entry_ids = self::get_view_page( $view, $where, $query_args );
		} else {
			self::maybe_add_limit_to_query( $view, $query_args );
			$entry_ids = FrmProEntry::get_view_results( $where, $query_args );
		}

		return $entry_ids;
	}

	/**
	 * Checks if it's possible that the View will have entries
	 *
	 * @param object $view
	 * @return bool
	 */
	private static function entries_are_possible( $view ) {
		return 0 !== $view->frm_limit;
	}

	/**
	 * Adds indication in View object that no entries will be found
	 *
	 * @param $view
	 */
	private static function set_entries_as_impossible( &$view ) {
		$view->frm_limit = 0;
	}

	/**
	 * Get a page of entries for a View
	 *
	 * @param object $view
	 * @param array $where
	 * @param array $args
	 * @return array
	 */
	private static function get_view_page( $view, $where, $args ) {
		$current_page         = self::get_current_page_num( $view->ID );
		$entry_limit_for_page = self::get_entry_limit_for_current_page( $current_page, $view );

		if ( $entry_limit_for_page < 0 ) {
			return array();
		}

		$end_index     = $current_page * $entry_limit_for_page;
		$start_index   = $end_index - $entry_limit_for_page;
		$args['limit'] = " LIMIT $start_index,$entry_limit_for_page";
		$results       = FrmProEntry::get_view_results( $where, $args );

		return $results;
	}

	/**
	 * Get the page number from the URL, and make sure it isn't 0
	 *
	 * @param int $view_id
	 * @return int
	 */
	private static function get_current_page_num( $view_id ) {
		$page_param   = ( $_GET && isset( $_GET[ 'frm-page-' . $view_id ] ) ) ? 'frm-page-' . $view_id : 'frm-page';
		$current_page = FrmAppHelper::simple_get( $page_param, 'absint', 1 );
		return max( 1, $current_page );
	}

	/**
	 * Get the number of entries that should be displayed on the current page
	 * Takes into account the limit, page size, and the current page being displayed
	 *
	 * @param int $current_page
	 * @param object $view
	 * @return int
	 */
	private static function get_entry_limit_for_current_page( $current_page, $view ) {
		$page_size = $view->frm_page_size;
		if ( is_numeric( $view->frm_limit ) ) {
			$current_page_size = $view->frm_limit - ( ( $current_page - 1 ) * $view->frm_page_size );

			if ( $current_page_size < 0 || $current_page_size < $view->frm_page_size ) {
				$page_size = $current_page_size;
			}
		}

		return (int) $page_size;
	}

	/**
	 * Skip the filters when a post is displayed or the entry_id parameter is set in shortcode
	 *
	 * @param array $atts
	 * @return bool
	 */
	private static function skip_view_filters( $atts ) {
		$return_now = false;

		// If single post is displayed, ignore View filters
		global $post;
		if ( ! empty( $atts['auto_id'] ) && $post ) {
			$return_now = true;
		}

		// If entry_id parameter is set, skip all other filters
		if ( ! empty( $atts['entry_id'] ) ) {
			$return_now = true;
		}

		return $return_now;
	}

	/**
	 * Get the entry IDs that override View filters
	 *
	 * @param array $atts
	 * @return array
	 */
	private static function get_entry_ids_that_override_filters( $atts ) {
		$entry_ids = array();

		if ( $atts['auto_id'] ) {
			// single post is being shown
			$entry_ids = self::get_entry_id_for_post( $atts );
		} elseif ( $atts['entry_id'] ) {
			// entry_id parameter is set, overrides all filters and other parameters
			$entry_ids = self::convert_entry_param_to_numeric_ids( $atts['entry_id'] );

		}

		return $entry_ids;
	}

	/**
	 * Loop through a View's filters and update the $where clause accordingly
	 *
	 * @param object $view
	 * @param array $atts
	 * @param array $where
	 */
	private static function check_view_filters( $view, $atts, &$where ) {
		if ( isset( $where['it.id'] ) && empty( $where['it.id'] ) ) {
			return;
		}

		if ( ! empty( $view->frm_where ) ) {
			foreach ( $view->frm_where as $i => $where_field ) {

				// If no value is saved for where field or current filter is a unique filter, move on
				if ( '' === $where_field || 0 === strpos( $view->frm_where_is[ $i ], 'group_by' ) ) {
					continue;
				}

				if ( self::prepare_where_val( $i, $view ) === false ) {
					if ( ! self::entries_are_possible( $view ) ) {
						break;
					}
					continue;
				}

				self::prepare_where_is( $i, $view );

				if ( is_numeric( $where_field ) ) {
					// Filter by a field value

					if ( ! isset( $where['it.id'] ) ) {
						$where['it.id'] = self::get_all_entry_ids_for_view( $view );
					}

					self::update_entry_ids_with_field_filter( $view, $i, $atts, $where );

					if ( empty( $where['it.id'] ) ) {
						return;
					}
				} else {
					// Filter by a standard frm_items database column
					self::add_to_frm_items_query( $view, $i, $where );
				}
			}
		}
	}

	/**
	 * Get the entry ID linked to the single post being displayed
	 * auto_id could have the entry ID or key
	 *
	 * @param array $atts
	 * @return array
	 */
	private static function get_entry_id_for_post( $atts ) {
		if ( is_numeric( $atts['auto_id'] ) ) {
			$entry_id = $atts['auto_id'];
		} else {
			$entry_id = FrmEntry::get_id_by_key( $atts['auto_id'] );
		}

		// Convert to array
		if ( $entry_id ) {
			$entry_ids = array( $entry_id );
		} else {
			$entry_ids = array();
		}

		return $entry_ids;
	}

	/**
	 * Convert an entry parameter, set by user, to a numeric entry ID
	 *
	 * @param mixed $entry_id_att
	 * @return array
	 */
	private static function convert_entry_param_to_numeric_ids( $entry_id_att ) {
		// Allow mulitiple entry ids.
		if ( ! is_array( $entry_id_att ) && strpos( $entry_id_att, ',' ) ) {
			$entry_id_att = explode( ',', $entry_id_att );
		}

		if ( is_array( $entry_id_att ) ) {
			$entry_ids = array();
			foreach ( $entry_id_att as $e_id ) {
				$entry_ids[] = self::convert_single_entry_to_numeric_id( $e_id );
			}
		} else {
			$entry_ids = array( self::convert_single_entry_to_numeric_id( $entry_id_att ) );
		}

		$entry_ids = array_filter( $entry_ids );

		return $entry_ids;
	}

	/**
	 * Convert entry key or ID to an ID
	 *
	 * @param string $e_id
	 * @return int
	 */
	private static function convert_single_entry_to_numeric_id( $e_id ) {
		if ( ! is_numeric( $e_id ) ) {
			$e_id = FrmEntry::get_id_by_key( $e_id );
		}

		return $e_id;
	}

	/**
	 * Get the entry ID for a View's detail page
	 *
	 * @param object $view
	 * @param array $atts
	 * @return array
	 */
	private static function get_entry_id_for_detail_page( $view, $atts ) {
		$detail_param = self::get_detail_param( $view, $atts );

		if ( 'id' === $view->frm_type && is_numeric( $detail_param ) ) {
			// If using entry ID for detail page
			$entry_id = $detail_param;
		} else {
			// If using entry key for detail page
			$entry_id = FrmEntry::get_id_by_key( $detail_param );
		}

		// Convert to array
		if ( $entry_id ) {
			$entry_ids = array( $entry_id );
		} else {
			$entry_ids = array();
		}

		return $entry_ids;
	}

	/**
	 * Get all the entry IDs for a View's form ID
	 *
	 * @param object $view
	 * @return array
	 */
	private static function get_all_entry_ids_for_view( $view ) {
		$table     = 'frm_items';
		$where     = array( 'form_id' => $view->frm_form_id );
		$entry_ids = FrmDb::get_col( $table, $where, 'id' );

		if ( ! $entry_ids ) {
			$entry_ids = array();
		}

		return $entry_ids;
	}

	/**
	 * Get the detail page parameter value
	 *
	 * @param object $view
	 * @param array $atts
	 * @return string
	 */
	private static function get_detail_param( $view, $atts ) {
		$entry_key = get_query_var( $view->frm_param );
		if ( empty( $entry_key ) ) {
			$entry_key = FrmAppHelper::simple_get( $view->frm_param, 'sanitize_title', $atts['auto_id'] );
		} else {
			// for compatibility with features checking GET
			$_GET[ $view->frm_param ] = $entry_key;
		}

		return $entry_key;
	}

	/**
	 * Get the entry IDs and linked post IDs for a particular View
	 *
	 * @param object $view
	 * @param array $atts
	 * @return array
	 */
	private static function get_form_posts_for_view( $view, $atts ) {
		if ( ! empty( $atts['auto_id'] ) ) {
			$posts = array();
		} else {
			$form_query = array(
				'form_id'   => $view->frm_form_id,
				'post_id >' => 1,
			);
			$posts      = FrmDb::get_results( 'frm_items', $form_query, 'id, post_id' );
		}

		return $posts;
	}

	/**
	 * Move the drafts parameter to a View filter
	 *
	 * @param array $atts
	 * @param object $view
	 */
	private static function move_drafts_param_to_filter( $atts, &$view ) {
		if ( ! isset( $view->frm_where ) ) {
			$view->frm_where = array();
		}

		if ( in_array( 'is_draft', $view->frm_where, true ) && 'default' === $atts['drafts'] ) {
			// Don't modify the View filters if a drafts filter is already set and no user-defined drafts parameter is set
		} else {
			$draft_value = self::get_the_drafts_where_value( $atts['drafts'] );
			self::add_or_update_filter( 'is_draft', $draft_value, $view );
		}

		// Remove filter if it sets drafts = both
		$key = array_search( 'is_draft', $view->frm_where, true );
		if ( 'both' === $view->frm_where_val[ $key ] ) {
			unset( $view->frm_where[ $key ] );
			unset( $view->frm_where_is[ $key ] );
			unset( $view->frm_where_val[ $key ] );
		}
	}

	/**
	 * Get the where_value for the drafts filter
	 *
	 * @param mixed $drafts_param
	 * @return string
	 */
	private static function get_the_drafts_where_value( $drafts_param ) {
		// Get the is_draft value
		if ( 'both' === $drafts_param ) {
			$draft_value = 'both';
		} elseif ( 'default' === $drafts_param ) {
			$draft_value = '0';
		} elseif ( $drafts_param ) {
			$draft_value = '1';
		} else {
			$draft_value = '0';
		}

		return $draft_value;
	}

	/**
	 * Move the user_id parameter to a View filter
	 *
	 * @param array $atts
	 * @param object $view
	 */
	private static function move_user_id_param_to_filter( $atts, &$view ) {
		if ( ! $atts['user_id'] ) {
			return;
		}

		// Get the userID field in the form
		$user_id_fields = FrmField::get_all_types_in_form( $view->frm_form_id, 'user_id' );
		$user_id_field  = reset( $user_id_fields );

		// Get the user value
		if ( 'current' === $atts['user_id'] ) {
			$user_val = get_current_user_id();
		} else {
			$user_val = $atts['user_id'];
		}

		// Replace userID filter or add a new one
		self::add_or_update_filter( $user_id_field->id, $user_val, $view );
	}

	/**
	 * Update a View filter if it already exists, otherwise add it
	 *
	 * @param string $filter_col
	 * @param string $filter_value
	 * @param object $view
	 */
	private static function add_or_update_filter( $filter_col, $filter_value, &$view ) {
		if ( in_array( $filter_col, $view->frm_where ) ) {
			// Update existing filter
			$key                         = array_search( $filter_col, $view->frm_where );
			$view->frm_where_is[ $key ]  = '=';
			$view->frm_where_val[ $key ] = $filter_value;
		} else {
			// Add new filter
			$view->frm_where[]     = $filter_col;
			$view->frm_where_is[]  = '=';
			$view->frm_where_val[] = $filter_value;
		}
	}

	/**
	 * Prepare the where value in a View filter
	 *
	 * @param int $i
	 * @param object $view
	 * @return bool - True if there is a value to filter
	 */
	private static function prepare_where_val( $i, &$view ) {
		if ( ! isset( $view->frm_where_val[ $i ] ) ) {
			$view->frm_where_val[ $i ] = '';
		}

		$orig_where_val = $view->frm_where_val[ $i ];

		$view->frm_where_val[ $i ] = FrmProFieldsHelper::get_default_value( $orig_where_val, false, true, true );

		if ( preg_match( "/\[(get|get-(.?))\b(.*?)(?:(\/))?\]/s", $orig_where_val ) && '' == $view->frm_where_val[ $i ] ) {
			// If where_val contains [get] or [get-param] shortcode and the param isn't set, ignore this filter
			return false;
		}

		if ( self::ignore_entry_id_filter( $orig_where_val, $i, $view ) ) {
			return false;
		}

		self::convert_current_user_val_to_current_user_id( $view->frm_where_val[ $i ] );

		if ( 'current_user' === $view->frm_where_val[ $i ] ) {
			self::set_entries_as_impossible( $view );
			return false;
		}

		self::do_shortcode_in_where_val( $view->frm_where_val[ $i ] );

		self::prepare_where_val_for_date_columns( $view, $i, $view->frm_where_val[ $i ] );

		self::prepare_where_val_for_id_and_key_columns( $view, $i, $view->frm_where_val[ $i ] );

		return true;
	}

	/**
	 * For stinking reverse compatibility
	 * Ignore an "Entry ID is equal to [get param=entry old_filter=1]" filter in a single entry View
	 * if the retrieved entry doesn't exist in the current form
	 *
	 * @param object $view
	 * @param int $i
	 * @param string $orig_where_val
	 * @return bool
	 */
	private static function ignore_entry_id_filter( $orig_where_val, $i, &$view ) {
		$ignore = false;

		if ( 'one' === $view->frm_show_count && 'id' === $view->frm_where[ $i ] && '[get param=entry old_filter=1]' === $orig_where_val ) {
			$where = array( 'form_id' => $view->frm_form_id );
			if ( ! is_numeric( $view->frm_where_val[ $i ] ) ) {
				$where['item_key'] = $view->frm_where_val[ $i ];
				$entry_id_in_form  = FrmDb::get_var( 'frm_items', $where );
				if ( $entry_id_in_form ) {
					$view->frm_where_val[ $i ] = $entry_id_in_form;
				}
			} else {
				$where['id']      = $view->frm_where_val[ $i ];
				$entry_id_in_form = FrmDb::get_var( 'frm_items', $where );
				if ( ! $entry_id_in_form ) {
					$ignore = true;
				}
			}
		}

		return $ignore;
	}

	/**
	 * Convert current_user to the current user's ID
	 *
	 * @param string|array $where_val
	 */
	private static function convert_current_user_val_to_current_user_id( &$where_val ) {
		if ( 'current_user' === $where_val && is_user_logged_in() ) {
			$where_val = get_current_user_id();
		}
	}

	/**
	 * Do shortcodes in the where value
	 *
	 * @param string|array $where_val
	 */
	private static function do_shortcode_in_where_val( &$where_val ) {
		if ( ! is_array( $where_val ) ) {
			$where_val = do_shortcode( $where_val );
		}
	}

	/**
	 * Prepare the where value for date columns
	 *
	 * @param object $view
	 * @param int $i
	 * @param string $where_val
	 */
	private static function prepare_where_val_for_date_columns( $view, $i, &$where_val ) {
		if ( ! in_array( $view->frm_where[ $i ], array( 'created_at', 'updated_at' ), true ) ) {
			return;
		}

		FrmProContent::get_gmt_for_filter( $view->frm_where_is[ $i ], $where_val );
	}

	/**
	 * Prepare the where value for id, item_key, and post_id columns
	 *
	 * @param object $view
	 * @param int $i
	 * @param string|array $where_val
	 */
	private static function prepare_where_val_for_id_and_key_columns( $view, $i, &$where_val ) {
		if ( in_array( $view->frm_where[ $i ], array( 'id', 'item_key', 'post_id' ), true ) && ! is_array( $where_val ) ) {
			if ( strpos( $where_val, ',' ) ) {
				$where_val = explode( ',', $where_val );
				$where_val = array_filter( $where_val );
			} elseif ( in_array( $view->frm_where_is[ $i ], array( '=', 'LIKE' ), true ) ) {
				$where_val = (array) $where_val;
			}
		}
	}

	/**
	 * Prepare the where_is value for a View filter
	 *
	 * @param int $i
	 * @param object $view
	 */
	private static function prepare_where_is( $i, &$view ) {
		$where_is = $view->frm_where_is[ $i ];

		if ( is_array( $view->frm_where_val[ $i ] ) && ! empty( $view->frm_where_val[ $i ] ) ) {
			if ( strpos( $where_is, '!' ) === false && strpos( $where_is, 'not' ) === false ) {
				$where_is = 'in';
			} else {
				$where_is = 'not in';
			}
		}

		$view->frm_where_is[ $i ] = $where_is;
	}

	/**
	 * Check if frm_search parameter is set and filter entry IDs accordingly
	 *
	 * @param object $view
	 * @param array $where
	 */
	private static function check_frm_search( $view, &$where ) {
		if ( isset( $where['it.id'] ) && empty( $where['it.id'] ) ) {
			return;
		}

		$s = FrmAppHelper::get_param( 'frm_search', false, 'get', 'sanitize_text_field' );
		if ( $s ) {
			if ( self::apply_frm_search_to_view( $view ) !== true ) {
				return;
			}

			$new_ids = FrmProEntriesHelper::get_search_ids( $s, $view->frm_form_id, array( 'is_draft' => 'both' ) );

			if ( isset( $where['it.id'] ) ) {
				$where['it.id'] = array_intersect( $new_ids, $where['it.id'] );
			} else {
				$where['it.id'] = (array) $new_ids;
			}
		}
	}

	/**
	 * Check if frm_search should apply to this View
	 *
	 * @param object $view
	 * @return bool
	 */
	private static function apply_frm_search_to_view( $view ) {
		$apply_frm_search = true;

		$search_view_ids = FrmAppHelper::get_param( 'frm_search_views', '', 'get', 'sanitize_text_field' );
		$search_view_ids = explode( ',', $search_view_ids );

		// Remove non-numeric values
		$search_view_ids = array_filter( $search_view_ids, 'is_numeric' );

		if ( ! empty( $search_view_ids ) && ! in_array( $view->ID, $search_view_ids ) ) {
			$apply_frm_search = false;
		}

		return $apply_frm_search;
	}

	/**
	 * Filter down entry IDs with a View field filter
	 *
	 * @param object $view
	 * @param int $i
	 * @param array $atts
	 * @param array $where
	 */
	private static function update_entry_ids_with_field_filter( $view, $i, $atts, &$where ) {
		$args = array(
			'where_opt'   => $view->frm_where[ $i ],
			'where_is'    => $view->frm_where_is[ $i ],
			'where_val'   => $view->frm_where_val[ $i ],
			'form_id'     => $view->frm_form_id,
			'form_posts'  => $atts['form_posts'],
			'after_where' => true,
			'display'     => $view,
			'drafts'      => 'both',
			'use_ids'     => false,
		);

		if ( count( $where['it.id'] ) < 100 ) {
			// Only use the entry IDs in DB calls if it won't make the query too long
			$args['use_ids'] = true;
		}

		$filter_opts = apply_filters( 'frm_display_filter_opt', $args );

		$where['it.id'] = FrmProAppHelper::filter_where( $where['it.id'], $filter_opts );
	}

	/**
	 * Add a standard frm_items column filter to the where array
	 *
	 * @param object $view
	 * @param int $i
	 * @param array $where
	 */
	private static function add_to_frm_items_query( $view, $i, &$where ) {
		$array_key = 'it.' . sanitize_title( $view->frm_where[ $i ] ) . FrmDb::append_where_is( $view->frm_where_is[ $i ] );

		if ( 'it.id ' === $array_key ) {
			$array_key = rtrim( $array_key );
		}

		if ( isset( $where[ $array_key ] ) ) {
			if ( 'it.id' === $array_key ) {
				$view->frm_where_val[ $i ] = array_intersect( $where['it.id'], $view->frm_where_val[ $i ] );
			} else {
				$array_key .= ' ';
			}
		}

		$where[ $array_key ] = $view->frm_where_val[ $i ];
	}

	/**
	 * Check the unique filters on a View and filter entry IDs accordingly
	 *
	 * @param object $view
	 * @param array $where
	 */
	private static function check_unique_filters( $view, &$where ) {
		if ( isset( $where['it.id'] ) && empty( $where['it.id'] ) ) {
			return;
		}

		if ( self::has_unique_filter( $view ) ) {
			if ( ! isset( $where['it.id'] ) ) {
				$where['it.id'] = self::get_all_entry_ids_for_view( $view );
			}

			foreach ( $view->frm_where as $i => $filter_field ) {
				if ( strpos( $view->frm_where_is[ $i ], 'group_by' ) !== 0 ) {
					continue;
				}

				self::set_unique_filter_order( $view->frm_where_is[ $i ], $where['it.id'] );

				if ( is_numeric( $view->frm_where[ $i ] ) ) {
					$where['it.id'] = self::check_unique_field_filter( $view, $i, $where['it.id'] );
				} else {
					if ( in_array( $view->frm_where[ $i ], array( 'id', 'item_key' ) ) ) {
						continue;
					}
					$results        = self::check_unique_frm_items_filter( $view, $i );
					$where['it.id'] = self::get_the_entry_ids_for_a_unique_filter( $results, $where['it.id'] );
				}
			}
		}
	}

	/**
	 * Check if a View has any unique filters on it
	 *
	 * @param object $view
	 * @return bool
	 */
	private static function has_unique_filter( $view ) {
		$has_unique_filter = false;
		if ( ! empty( $view->frm_where_is ) ) {
			if ( in_array( 'group_by', $view->frm_where_is, true ) || in_array( 'group_by_newest', $view->frm_where_is, true ) ) {
				$has_unique_filter = true;
			}
		}

		return $has_unique_filter;
	}

	/**
	 * Set the order for the unique filter
	 *
	 * @param string $where_is
	 * @param array $entry_ids
	 */
	private static function set_unique_filter_order( $where_is, &$entry_ids ) {
		if ( 'group_by_newest' === $where_is ) {
			rsort( $entry_ids );
		}
	}

	/**
	 * Check a unique field filter
	 *
	 * @param object $view
	 * @param int $i
	 * @param array $entry_ids
	 * @return array
	 */
	private static function check_unique_field_filter( $view, $i, $entry_ids ) {
		$unique_field = FrmField::getOne( $view->frm_where[ $i ] );

		if ( FrmField::is_repeating_field( $unique_field ) || 'form' === $unique_field->type ) {
			// TODO: Add embedded field functionality
			return $entry_ids;
		}

		if ( FrmField::is_option_value_in_object( $unique_field, 'post_field' ) ) {
			$results = self::get_post_values_and_entry_ids_for_unique_fields( $unique_field, $view->frm_form_id );
		} else {
			$results = self::get_values_and_item_ids_for_unique_fields( $unique_field->id );
		}

		return self::get_the_entry_ids_for_a_unique_filter( $results, $entry_ids );
	}

	/**
	 * Get the post values and entry IDs for a unique field filter
	 *
	 * @param object $unique_field
	 * @param int $form_id
	 * @return array
	 */
	private static function get_post_values_and_entry_ids_for_unique_fields( $unique_field, $form_id ) {
		if ( 'post_custom' === $unique_field->field_options['post_field'] ) {
			// If field is a custom field
			$results = self::get_results_for_custom_fields( $unique_field, $form_id );
		} elseif ( 'post_category' === $unique_field->field_options['post_field'] ) {
			// If field is a category field
			$results = self::get_results_for_category_fields( $unique_field, $form_id );
		} else {
			// If field is a non-category post field
			$results = self::get_results_for_post_fields( $unique_field, $form_id );
		}

		return $results;
	}

	/**
	 * Get the results for custom fields (for a unique filter)
	 *
	 * @param object $unique_field
	 * @param int $form_id
	 * @return array
	 */
	private static function get_results_for_custom_fields( $unique_field, $form_id ) {
		global $wpdb;
		$raw_query = '
				SELECT
					entries.id,
					postmeta.meta_value meta_value
				FROM
					' . $wpdb->prefix . 'frm_items entries
				INNER JOIN
					' . $wpdb->postmeta . ' postmeta
				ON
					entries.post_id=postmeta.post_id
				WHERE
					postmeta.meta_key=%s AND
					entries.form_id=%d';
		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		$query = $wpdb->prepare( $raw_query, $unique_field->field_options['custom_field'], $form_id );

		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		return $wpdb->get_results( $query, OBJECT_K );
	}

	/**
	 * Get the results for category fields (for a unique filter)
	 *
	 * @param object $unique_field
	 * @param int $form_id
	 * @return array
	 */
	private static function get_results_for_category_fields( $unique_field, $form_id ) {
		global $wpdb;
		$raw_query = '
				SELECT
					entries.id,
					term_taxonomy.term_id meta_value
				FROM
					' . $wpdb->prefix . 'frm_items entries
				INNER JOIN
					' . $wpdb->term_relationships . ' term_relationships
					ON
						entries.post_id=term_relationships.object_id
				INNER JOIN
					' . $wpdb->term_taxonomy . ' term_taxonomy
					ON
						term_taxonomy.term_taxonomy_id=term_relationships.term_taxonomy_id
				WHERE
					term_taxonomy.taxonomy=%s AND
					entries.form_id=%d';
		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		$query = $wpdb->prepare( $raw_query, $unique_field->field_options['taxonomy'], $form_id );

		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		return $wpdb->get_results( $query, OBJECT_K );
	}

	/**
	 * Get the results for post fields (for a unique filter)
	 *
	 * @param object $unique_field
	 * @param int $form_id
	 * @return array|null|object
	 */
	private static function get_results_for_post_fields( $unique_field, $form_id ) {
		global $wpdb;
		$raw_query = '
				SELECT
					entries.id,
					posts.' . $unique_field->field_options['post_field'] . ' meta_value
				FROM
					' . $wpdb->prefix . 'frm_items entries
				INNER JOIN
					' . $wpdb->posts . ' posts
				ON
					entries.post_id=posts.ID
				WHERE
					entries.form_id=%d';
		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		$query = $wpdb->prepare( $raw_query, $form_id );

		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		return $wpdb->get_results( $query, OBJECT_K );
	}

	/**
	 * Get the meta_values and item_ids for the unique field filter
	 *
	 * @param int $filter_field
	 * @return array
	 */
	private static function get_values_and_item_ids_for_unique_fields( $filter_field ) {
		global $wpdb;
		$raw_query = '
				SELECT
					item_id,
					meta_value
				FROM
					' . $wpdb->prefix . 'frm_item_metas
				WHERE
					field_id=%d';
		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		$query = $wpdb->prepare( $raw_query, $filter_field );

		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		return $wpdb->get_results( $query, OBJECT_K );
	}

	/**
	 * Check a unique filter for a column in frm_items
	 *
	 * @param object $view
	 * @param int $i
	 * @return array
	 */
	private static function check_unique_frm_items_filter( $view, $i ) {
		global $wpdb;
		$raw_query = '
				SELECT
					id,
					' . $view->frm_where[ $i ] . ' meta_value
				FROM
					' . $wpdb->prefix . 'frm_items
				WHERE
					form_id=%d';
		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		$query = $wpdb->prepare( $raw_query, $view->frm_form_id );

		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		return $wpdb->get_results( $query, OBJECT_K );
	}

	/**
	 * Get the entry IDs for a unique filter
	 *
	 * @param $results
	 * @param $entry_ids
	 * @return array
	 */
	private static function get_the_entry_ids_for_a_unique_filter( $results, $entry_ids ) {
		$unique_meta_values = array();
		$new_entry_ids      = array();

		foreach ( $entry_ids as $e_id ) {
			// If field value is empty/blank, entry will not be shown in View
			if ( ! isset( $results[ $e_id ] ) ) {
				continue;
			}

			$meta_value = $results[ $e_id ]->meta_value;

			// Add the entry ID to the $new_entry_ids array if the value doesn't already exist in the $unique_meta_values array
			if ( ! isset( $unique_meta_values[ $meta_value ] ) ) {
				$unique_meta_values[ $meta_value ] = $e_id;
				$new_entry_ids[]                   = $e_id;
			}
		}

		return $new_entry_ids;
	}

	/**
	 * Allow order and order_by parameters to override order/order_by settings
	 *
	 * @param array $atts
	 * @param object $view
	 */
	private static function maybe_update_view_order( $atts, &$view ) {
		if ( ! empty( $atts['order_by'] ) ) {
			$view->frm_order_by = explode( ',', $atts['order_by'] );

			if ( ! empty( $atts['order'] ) ) {
				$view->frm_order = explode( ',', $atts['order'] );
			} else {
				$view->frm_order = array( 'DESC' );
			}

			foreach ( $view->frm_order_by as $i => $order ) {
				if ( ! isset( $view->frm_order[ $i ] ) ) {
					$view->frm_order[ $i ] = 'DESC';
				}
			}
		}
	}

	/**
	 * Get the limit for a View
	 *
	 * @param array $atts
	 * @param object $view
	 */
	private static function maybe_update_view_limit( $atts, &$view ) {
		if ( is_numeric( $atts['limit'] ) ) {
			$view->frm_limit = (int) $atts['limit'];
		}

		// Ignore limit on calendar Views since it doesn't appear as an option
		if ( 'calendar' === $view->frm_show_count ) {
			$view->frm_limit = '';
		}
	}

	/**
	 * Add the View limit to a query
	 *
	 * @param object $view
	 * @param array $display_page_query
	 */
	private static function maybe_add_limit_to_query( $view, &$display_page_query ) {
		if ( is_numeric( $view->frm_limit ) ) {
			$display_page_query['limit'] = FrmDb::esc_limit( $view->frm_limit );
		}
	}

	/**
	 * Add the pagination after the view content
	 */
	public static function include_pagination( $content, $view, $show, $args ) {
		$show_pagination = ! empty( $args['pagination'] ) && 'all' === $show;
		if ( $show_pagination ) {
			if ( ! empty( $args['prepend'] ) ) {
				$content = $args['pagination'] . $content;
			} else {
				$content .= $args['pagination'];
			}
		}

		return $content;
	}

	/**
	 * Add the pagination before the view content
	 * Called by custom code:
	 * add_filter( 'frm_before_display_content', 'FrmViewsDisplaysController::prepend_pagination', 10, 4 );
	 */
	public static function prepend_pagination( $content, $view, $show, $args ) {
		$args['prepend'] = true;
		return self::include_pagination( $content, $view, $show, $args );
	}

	/**
	 * Get the pagination HTML for a paginated View
	 *
	 * @param object $view
	 * @param int $total_count
	 * @return string
	 */
	private static function setup_pagination( $view, $total_count ) {
		$pagination = '';

		if ( is_int( $view->frm_page_size ) ) {
			$current_page = self::get_current_page_num( $view->ID );
			$pagination   = self::get_pagination( $view, $total_count, $current_page );
		}

		return $pagination;
	}

	/**
	 * Get the page size for a View
	 * Make sure page_size parameter overrides Page Size setting
	 *
	 * @param array $atts
	 * @param object $view
	 */
	private static function maybe_update_view_page_size( $atts, &$view ) {
		if ( is_numeric( $atts['page_size'] ) ) {
			// page_size parameter overrides page size setting
			$view->frm_page_size = (int) $atts['page_size'];
		} elseif ( is_numeric( $view->frm_page_size ) ) {
			$view->frm_page_size = (int) $view->frm_page_size;
		} else {
			$view->frm_page_size = '';
		}

		// If limit is lower than page size, ignore the page size
		if ( is_numeric( $view->frm_page_size ) && is_numeric( $view->frm_limit ) && $view->frm_limit < $view->frm_page_size ) {
			$view->frm_page_size = '';
		}

		// If calendar View, ignore page size
		if ( 'calendar' === $view->frm_show_count ) {
			$view->frm_page_size = '';
		}
	}

	/**
	 * Package the arguments for all the View hooks
	 *
	 * @param array $entry_ids_on_current_page
	 * @param object $view
	 * @param array $where
	 * @return array
	 */
	private static function package_args_for_view_hooks( $entry_ids_on_current_page, $view, $where ) {
		$total_entry_count = self::get_total_entry_count( $view, count( $entry_ids_on_current_page ), $where );
		$args              = array(
			'entry_ids'    => $entry_ids_on_current_page,
			'total_count'  => count( $entry_ids_on_current_page ),
			'record_count' => $total_entry_count,
			'pagination'   => self::setup_pagination( $view, $total_entry_count ),
		);
		return $args;
	}

	/**
	 * Get the total entry count for the entries in a View
	 *
	 * @param object $view
	 * @param int $count_for_current_page
	 * @param array $where
	 * @return int
	 */
	private static function get_total_entry_count( $view, $count_for_current_page, $where ) {
		if ( isset( $view->frm_page_size ) && is_numeric( $view->frm_page_size ) ) {
			$total_entry_count = FrmEntry::getRecordCount( $where );
		} else {
			$total_entry_count = $count_for_current_page;
		}

		self::check_total_entry_count( $view->frm_limit, $total_entry_count );

		return $total_entry_count;
	}

	/**
	 * Compare the total entry count against the View limit
	 *
	 * @param int $view_limit
	 * @param int $total_entry_count
	 * @return int
	 */
	private static function check_total_entry_count( $view_limit, &$total_entry_count ) {
		if ( is_numeric( $view_limit ) && $view_limit < $total_entry_count ) {
			$total_entry_count = $view_limit;
		}
	}

	/**
	 * Conditionally redirect to a post if the current entry has a post
	 * and the frm_display_id on that post matches the current View ID
	 *
	 * @param int $entry_id
	 * @param object $view
	 */
	private static function maybe_redirect_to_post( $entry_id, $view ) {
		if ( in_the_loop() && 'one' !== $view->frm_show_count ) {
			global $post;

			// Check if entry has a post
			$post_id = FrmDb::get_var( 'frm_items', array( 'id' => $entry_id ), 'post_id' );

			if ( $post_id && ! is_single( $post_id ) && $post->ID != $post_id ) {
				// If $post_id is a non-zero value and we're not already on the post page

				$frm_display_id = get_post_meta( $post_id, 'frm_display_id', true );
				if ( $frm_display_id == $view->ID ) {
					// Redirect now
					die( FrmAppHelper::js_redirect( get_permalink( $post_id ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}
	}

	/**
	 * Get the Before Content for a View's Listing Page
	 *
	 * @param object $view
	 * @param array $args
	 * @return string
	 */
	public static function get_before_content_for_listing_page( $view, $args ) {
		$before_content = isset( $view->frm_before_content ) ? $view->frm_before_content : '';
		$before_content = self::calendar_header( $before_content, $view );

		self::replace_entry_count_shortcode( $args, $before_content );

		$before_content = apply_filters( 'frm_before_display_content', $before_content, $view, 'all', $args );

		FrmProFieldsHelper::replace_non_standard_formidable_shortcodes( array(), $before_content );

		return $before_content;
	}

	/**
	 * Get the inner content for a View's Listing Page
	 *
	 * @param object $view
	 * @param array $args
	 * @return string
	 */
	public static function get_inner_content_for_listing_page( $view, $args ) {
		$inner_content = '';

		// Replace shortcodes in the content
		$unfiltered_content = $view->post_content;
		$shortcodes         = FrmProDisplaysHelper::get_shortcodes( $unfiltered_content, $view->frm_form_id );

		$filtered_content = self::build_calendar( $unfiltered_content, $args['entry_ids'], $shortcodes, $view );
		$filtered_content = apply_filters( 'frm_display_entries_content', $filtered_content, $args['entry_ids'], $shortcodes, $view, 'all', $args );

		if ( $filtered_content != $unfiltered_content ) {
			$inner_content = $filtered_content;
		} else {
			$odd            = 'odd';
			$count          = 0;
			$loop_entry_ids = $args['entry_ids'];
			while ( $next_set = array_splice( $loop_entry_ids, 0, 30 ) ) {
				$entries = FrmEntry::getAll( array( 'id' => $next_set ), ' ORDER BY FIELD(it.id,' . implode( ',', $next_set ) . ')', '', true, false );
				foreach ( $entries as $entry ) {
					$count++;
					$args['count'] = $count;
					$new_content   = apply_filters( 'frm_display_entry_content', $unfiltered_content, $entry, $shortcodes, $view, 'all', $odd, $args );

					FrmProContent::replace_entry_position_shortcode( compact( 'entry', 'view' ), $args, $new_content );

					$inner_content .= $new_content;
					$odd            = ( 'odd' === $odd ) ? 'even' : 'odd';
				}

				unset( $entry, $entries );
			}
		}

		FrmProFieldsHelper::replace_non_standard_formidable_shortcodes( array(), $inner_content );

		return $inner_content;
	}

	/**
	 * Get the After Content for a View's Listing Page
	 *
	 * @param object $view
	 * @param array $args
	 * @return string
	 */
	public static function get_after_content_for_listing_page( $view, $args ) {
		$after_content = '';

		if ( isset( $view->frm_after_content ) ) {
			$after_content = $view->frm_after_content;
			self::replace_entry_count_shortcode( $args, $after_content );
		}

		if ( 'calendar' === $view->frm_show_count ) {
			$calendar_footer = self::calendar_footer( '', $view );
			$after_content   = $calendar_footer . $after_content;
		}

		$after_content = apply_filters( 'frm_after_display_content', $after_content, $view, 'all', $args );

		FrmProFieldsHelper::replace_non_standard_formidable_shortcodes( array(), $after_content );

		return $after_content;
	}

	/**
	 * Get the Before Content for a View's Detail Page
	 *
	 * @param object $view
	 * @return string
	 */
	private static function get_before_content_for_detail_page( $view ) {
		$before_content = apply_filters( 'frm_before_display_content', '', $view, 'one', array() );
		return $before_content;
	}

	/**
	 * Get the inner cntent for a View's Detail Page
	 *
	 * @param object $view
	 * @param int $entry_id
	 * @return string
	 */
	private static function get_inner_content_for_detail_page( $view, $entry_id ) {
		if ( 'one' === $view->frm_show_count ) {
			$new_content = $view->post_content;
		} else {
			$new_content = $view->frm_dyncontent;
		}

		$shortcodes     = FrmProDisplaysHelper::get_shortcodes( $new_content, $view->frm_form_id );
		$entry          = FrmEntry::getOne( $entry_id );
		$detail_content = apply_filters( 'frm_display_entry_content', $new_content, $entry, $shortcodes, $view, 'one', 'odd', array() );

		FrmProFieldsHelper::replace_non_standard_formidable_shortcodes( array(), $detail_content );

		return $detail_content;
	}

	/**
	 * Get the after content for a View's Detail Page
	 *
	 * @param object $view
	 * @return string
	 */
	private static function get_after_content_for_detail_page( $view ) {
		$after_content = apply_filters( 'frm_after_display_content', '', $view, 'one', array() );
		return $after_content;
	}

	/**
	 * Get View pagination
	 *
	 * @param object $view
	 * @param int $record_count
	 * @param int $current_page
	 * @return string
	 */
	private static function get_pagination( $view, $record_count, $current_page ) {
		$pagination = '';
		$page_count = FrmEntry::getPageCount( $view->frm_page_size, $record_count );

		if ( $page_count > 1 ) {
			$page_last_record  = FrmAppHelper::get_last_record_num( $record_count, $current_page, $view->frm_page_size );
			$page_first_record = FrmAppHelper::get_first_record_num( $record_count, $current_page, $view->frm_page_size );
			$page_param        = 'frm-page-' . $view->ID;
			$args              = compact( 'current_page', 'record_count', 'page_count', 'page_last_record', 'page_first_record', 'page_param', 'view' );
			$pagination        = FrmAppHelper::get_file_contents( FrmViewsAppHelper::plugin_path() . '/classes/views/displays/pagination.php', $args );
		}

		return $pagination;
	}

	/**
	 * Get the content for a listing page with no entries
	 *
	 * @param object $view
	 * @param array $atts
	 * @return string
	 */
	private static function get_no_entries_content_for_listing_page( $view, $atts ) {
		if ( 'calendar' === $view->frm_show_count ) {
			// Show empty calendar
			$view_content  = self::calendar_header( '', $view );
			$view_content .= self::build_calendar( $view_content, array(), array(), $view );
			$view_content .= self::calendar_footer( $view_content, $view );
		} else {
			// Get no entries message
			$view_content = self::get_no_entries_message( $view, $atts );
		}

		return $view_content;
	}

	/**
	 * Get the no entries message for a view
	 *
	 * @param object $view
	 * @return string
	 */
	private static function get_no_entries_message( $view, $atts ) {
		$empty_msg = '';

		if ( isset( $view->frm_empty_msg ) && '' !== trim( $view->frm_empty_msg ) ) {
			$empty_msg = '<div class="frm_no_entries">' . FrmProFieldsHelper::get_default_value( $view->frm_empty_msg, false ) . '</div>';
		}

		return apply_filters( 'frm_no_entries_message', $empty_msg, array( 'display' => $view ) );
	}

	/**
	 * Apply the filters normally run on the_content if filter=1 is set
	 *
	 * @param string $content
	 * @param array $atts
	 */
	private static function maybe_filter_content( $atts, &$content ) {
		self::set_filter_needed( $atts, $content );

		if ( 'limited' === $atts['filter'] ) {
			self::filter_embeds( $content );
			self::add_content_filters( $atts );

			$content = apply_filters( 'frm_the_content', $content );

			self::remove_content_filters();
		} elseif ( ! empty( $atts['filter'] ) ) {
			$content = apply_filters( 'the_content', $content );
		}
	}

	/**
	 * If filter has not been specified, check for known shortcodes.
	 * If a shortcode is included, filter it without adding p tags.
	 */
	private static function set_filter_needed( &$atts, $content ) {
		if ( empty( $atts['filter'] ) ) {
			$shortcodes = 'formidable|frm-stats|frm-field-value|display-frm-data|frm-set-get|formresults|frm-search|frm-entry-links|frm-edit-|frm-show-entry|frm-alt-color|frm-graph|gallery';
			if ( preg_match( "/\[($shortcodes)/s", $content ) ) {
				$atts['filter'] = 'limited';
				if ( ! isset( $atts['wpautop'] ) || '' === $atts['wpautop'] ) {
					$atts['wpautop'] = '0';
				}
			}
		}
	}

	/**
	 * Filter embeds instead of using the_content filter
	 */
	private static function filter_embeds( &$content ) {
		global $wp_embed;
		$content = $wp_embed->run_shortcode( $content );
		$content = $wp_embed->autoembed( $content );
	}

	/**
	 * Add all the default the_content filters to be run
	 * on frm_the_content
	 */
	private static function add_content_filters( $atts ) {
		if ( has_filter( 'frm_the_content', 'do_shortcode' ) ) {
			// don't add the filters a second time
			return;
		}

		if ( has_filter( 'the_content', 'wptexturize' ) ) {
			add_filter( 'frm_the_content', 'wptexturize' );
		}

		$cancel_autop = isset( $atts['wpautop'] ) && '0' === $atts['wpautop'];
		$do_autop     = has_filter( 'the_content', 'wpautop' ) || ( isset( $atts['wpautop'] ) && '1' === $atts['wpautop'] );
		if ( $do_autop && ! $cancel_autop ) {
			add_filter( 'frm_the_content', 'wpautop' );
		}

		if ( function_exists( 'wp_filter_content_tags' ) ) {
			add_filter( 'frm_the_content', 'wp_filter_content_tags' );
		} else {
			add_filter( 'frm_the_content', 'wp_make_content_images_responsive' );
		}
		add_filter( 'frm_the_content', 'shortcode_unautop' );
		add_filter( 'frm_the_content', 'do_shortcode', 11 );
	}

	/**
	 * Remove the filters that were added so they won't
	 * affect another view/form
	 */
	private static function remove_content_filters() {
		if ( has_filter( 'frm_the_content', 'do_shortcode' ) ) {
			remove_filter( 'frm_the_content', 'wptexturize' );
			remove_filter( 'frm_the_content', 'wpautop' );
			remove_filter( 'frm_the_content', 'wp_make_content_images_responsive' );
			remove_filter( 'frm_the_content', 'wp_filter_content_tags' );
			remove_filter( 'frm_the_content', 'shortcode_unautop' );
			remove_filter( 'frm_the_content', 'do_shortcode', 11 );
		}
	}

	/**
	 * Get fields with specified field value 'frm_cat' = field key/id,
	 * 'frm_cat_id' = order position of selected option
	 */
	private static function maybe_add_cat_query( &$where ) {
		$frm_cat    = FrmAppHelper::simple_get( 'frm_cat', 'sanitize_title' );
		$frm_cat_id = FrmAppHelper::simple_get( 'frm_cat_id', 'sanitize_title' );

		if ( ! $frm_cat || ! isset( $_GET['frm_cat_id'] ) ) {
			return;
		}

		$cat_field = FrmField::getOne( $frm_cat );
		if ( ! $cat_field ) {
			return;
		}

		$categories = $cat_field->options;
		FrmProAppHelper::unserialize_or_decode( $categories );

		if ( isset( $categories[ $frm_cat_id ] ) ) {
			$cat_entry_ids = FrmEntryMeta::getEntryIds(
				array(
					'meta_value'   => $categories[ $frm_cat_id ],
					'fi.field_key' => $frm_cat,
				)
			);
			if ( $cat_entry_ids ) {
				if ( isset( $where['it.id'] ) ) {
					$where['it.id'] = array_intersect( $where['it.id'], $cat_entry_ids );
				} else {
					$where['it.id'] = $cat_entry_ids;
				}
			} else {
				$where['it.id'] = 0;
			}
		}
	}

	/**
	 * Replace the [entry_count] shortcode in a View's before and after content
	 *
	 * @param array $atts
	 * @param string $content
	 */
	private static function replace_entry_count_shortcode( $atts, &$content ) {
		$content = str_replace( '[entry_count]', $atts['record_count'], $content );
	}

	public static function get_post_content() {
		FrmAppHelper::permission_check( 'frm_edit_forms' );
		check_ajax_referer( 'frm_ajax', 'nonce' );

		$id      = FrmAppHelper::get_param( 'id', '', 'post', 'absint' );
		$display = FrmViewsDisplay::getOne( $id, false, true );

		if ( 'one' === $display->frm_show_count ) {
			$content = $display->post_content;
		} else {
			$content = $display->frm_dyncontent;
		}

		echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		wp_die();
	}

	private static function add_view_to_globals( $view ) {
		global $frm_vars;
		if ( ! isset( $frm_vars['views_loaded'] ) ) {
			$frm_vars['views_loaded'] = array();
		}
		$frm_vars['views_loaded'][ $view->ID ] = $view->post_title;
	}

	public static function save_wppost_action_displays( $settings, $action ) {
		return FrmViewsDisplay::save_wppost_action_displays( $settings, $action );
	}

	public static function filter_forms( $query ) {
		if ( self::should_filter_forms() ) {
			// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
			if ( isset( $_REQUEST['form'] ) && is_numeric( $_REQUEST['form'] ) && isset( $query->query_vars['post_type'] ) && self::$post_type === $query->query_vars['post_type'] ) {
				$form_id                         = absint( $_REQUEST['form'] );
				$children_form_ids               = FrmDb::get_col( 'frm_forms', array( 'parent_form_id' => $form_id ) );
				$query->query_vars['meta_key']   = 'frm_form_id';
				$query->query_vars['meta_value'] = array_merge( array( $form_id ), $children_form_ids );
			}

			self::search_by_id( $query );
		}

		return $query;
	}

	private static function should_filter_forms() {
		return FrmViewsDisplaysHelper::is_edit_view_page();
	}

	private static function search_by_id( &$query ) {
		if ( ! self::should_search_by_id( $query ) ) {
			return;
		}

		$s = FrmAppHelper::get_param( 's', '', 'get', 'sanitize_text_field' );
		if ( $s && is_numeric( $s ) ) {
			$query->query_vars['page_id'] = $s;
			$query->query_vars['s']       = '';
		}
	}

	/**
	 * @param object $query
	 * @return bool
	 */
	private static function should_search_by_id( $query ) {
		if ( 0 !== $query->found_posts || ! is_search() ) {
			return false;
		}
		return ! FrmAppHelper::is_admin() || self::should_filter_forms();
	}

	public static function popup_opts_display_frm_data( array &$opts, $shortcode ) {
		$displays = FrmViewsDisplay::getAll( array(), 'title ASC' );
		?>
		<h4 for="frmsc_<?php echo esc_attr( $shortcode ); ?>_id" class="frm_left_label"><?php esc_html_e( 'Select a view:', 'formidable-views' ); ?></h4>
		<select id="frmsc_<?php echo esc_attr( $shortcode ); ?>_id">
			<option value=""> </option>
			<?php foreach ( $displays as $display ) { ?>
			<option value="<?php echo esc_attr( $display->ID ); ?>"><?php echo esc_html( $display->post_title ); ?></option>
			<?php } ?>
		</select>
		<div class="frm_box_line"></div>
		<?php
		$opts = array(
			'filter'    => array(
				'val'   => 'limited',
				'label' => __( 'Filter shortcodes within the view content', 'formidable-views' ),
			),
			'limit'     => array(
				'val'   => '',
				'label' => __( 'Limit', 'formidable-views' ),
				'type'  => 'text',
			),
			'page_size' => array(
				'val'   => '',
				'label' => __( 'Page size', 'formidable-views' ),
				'type'  => 'text',
			),
			'order'     => array(
				'val'   => '',
				'label' => __( 'Entry order', 'formidable-views' ),
				'type'  => 'select',
				'opts'  => array(
					''     => __( 'Default', 'formidable-views' ),
					'ASC'  => __( 'Ascending', 'formidable-views' ),
					'DESC' => __( 'Descending', 'formidable-views' ),
				),
			),
			'drafts'    => array(
				'val'   => '',
				'label' => __( 'Include draft entries', 'formidable-views' ),
				'type'  => 'select',
				'opts'  => array(
					''     => __( 'No draft entries', 'formidable-views' ),
					'1'    => __( 'Only draft entries', 'formidable-views' ),
					'both' => __( 'All entries', 'formidable-views' ),
				),
			),
		);
	}

	/**
	 * @param array $shortcodes
	 * @return array $shortcodes
	 */
	public static function popup_shortcodes( $shortcodes ) {
		$shortcodes['display-frm-data'] = array(
			'name'  => __( 'View', 'formidable-views' ),
			'label' => __( 'Insert a View', 'formidable-views' ),
		);
		return $shortcodes;
	}

	/**
	 * @param array $instance
	 * @param FrmListEntries $widget
	 */
	public static function render_view_settings( $instance, $widget ) {
		$displays = FrmViewsDisplay::getAll(
			array(
				'meta_key'   => 'frm_show_count',
				'meta_value' => 'dynamic',
			)
		);

		if ( $instance['display_id'] ) {
			$selected_display = FrmViewsDisplay::getOne( $instance['display_id'] );
			if ( $selected_display ) {
				$selected_form_id       = get_post_meta( $selected_display->ID, 'frm_form_id', true );
				$title_opts             = FrmField::getAll(
					array(
						'fi.form_id' => (int) $selected_form_id,
						'type not'   => FrmField::no_save_fields(),
					),
					'field_order'
				);
				$instance['display_id'] = $selected_display->ID;
			}
		}
		?>
		<p><label for="<?php echo esc_attr( $widget->get_field_id( 'display_id' ) ); ?>"><?php esc_html_e( 'Use Settings from View', 'formidable-views' ); ?>:</label>
			<select name="<?php echo esc_attr( $widget->get_field_name( 'display_id' ) ); ?>" id="<?php echo esc_attr( $widget->get_field_id( 'display_id' ) ); ?>" class="widefat frm_list_items_display_id">
				<option value=""> </option>
				<?php
				foreach ( $displays as $display ) {
					echo '<option value="' . esc_attr( $display->ID ) . '" ' . selected( $instance['display_id'], $display->ID, false ) . '>' . esc_html( $display->post_title ) . '</option>';
				}
				?>
			</select>
		</p>
		<?php
	}

	public static function register_widgets() {
		if ( ! class_exists( 'FrmListEntries' ) ) {
			include_once FrmViewsAppHelper::plugin_path() . '/classes/widgets/FrmListEntries.php';
			register_widget( 'FrmListEntries' );
		}
	}
}
