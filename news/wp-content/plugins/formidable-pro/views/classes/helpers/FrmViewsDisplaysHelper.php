<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmViewsDisplaysHelper {

	public static function setup_new_vars() {
		$values   = array();
		$defaults = self::get_default_opts();
		foreach ( $defaults as $var => $default ) {
			$sanitize       = self::sanitize_option( $var );
			$values[ $var ] = FrmAppHelper::get_param( $var, $default, 'post', $sanitize );
		}

		return $values;
	}

	public static function setup_edit_vars( $post, $check_post = true ) {
		if ( ! $post ) {
			return false;
		}

		$values = (object) $post;

		foreach ( array( 'form_id', 'entry_id', 'dyncontent', 'param', 'type', 'show_count' ) as $var ) {
			$values->{'frm_' . $var} = get_post_meta( $post->ID, 'frm_' . $var, true );
			if ( $check_post ) {
				$sanitize                = self::sanitize_option( $var );
				$values->{'frm_' . $var} = FrmAppHelper::get_param( $var, $values->{'frm_' . $var}, 'post', $sanitize );
			}
		}

		$defaults = self::get_default_opts();
		$options  = get_post_meta( $post->ID, 'frm_options', true );
		foreach ( $defaults as $var => $default ) {
			if ( ! isset( $values->{'frm_' . $var} ) ) {
				$values->{'frm_' . $var} = isset( $options[ $var ] ) ? $options[ $var ] : $default;
				if ( $check_post ) {
					$sanitize                = self::sanitize_option( $var );
					$values->{'frm_' . $var} = FrmAppHelper::get_post_param( 'options[' . $var . ']', $values->{'frm_' . $var}, $sanitize );
				}
			} elseif ( 'param' === $var && empty( $values->{'frm_' . $var} ) ) {
				$values->{'frm_' . $var} = $default;
			}
		}

		$values->frm_form_id  = (int) $values->frm_form_id;
		$values->frm_order_by = empty( $values->frm_order_by ) ? array() : (array) $values->frm_order_by;
		$values->frm_order    = empty( $values->frm_order ) ? array() : (array) $values->frm_order;

		return $values;
	}

	/**
	 * Allow script and style tags in content boxes,
	 * but remove them from other settings
	 *
	 * @param string $name
	 * @return string
	 */
	private static function sanitize_option( $name ) {
		$allow_code = array( 'before_content', 'content', 'after_content', 'dyncontent', 'empty_msg', 'where_is' );
		return in_array( $name, $allow_code, true ) ? '' : 'sanitize_text_field';
	}

	public static function get_default_opts() {
		return array(
			'name'                  => '',
			'description'           => '',
			'display_key'           => '',
			'form_id'               => 0,
			'date_field_id'         => '',
			'edate_field_id'        => '',
			'repeat_event_field_id' => '',
			'repeat_edate_field_id' => '',
			'entry_id'              => '',
			'before_content'        => '',
			'content'               => '',
			'after_content'         => '',
			'dyncontent'            => '',
			'param'                 => 'entry',
			'type'                  => '',
			'show_count'            => 'all',
			'no_rt'                 => 0,
			'order_by'              => array(),
			'order'                 => array(),
			'limit'                 => '',
			'page_size'             => '',
			'empty_msg'             => __( 'No Entries Found', 'formidable-views' ),
			'copy'                  => 0,
			'where'                 => array(),
			'where_is'              => array(),
			'where_val'             => array(),
			'group_by'              => array(),
		);
	}

	public static function is_edit_view_page() {
		global $pagenow;
		$post_type = FrmAppHelper::simple_get( 'post_type', 'sanitize_title' );
		return is_admin() && 'edit.php' === $pagenow && FrmViewsDisplaysController::$post_type === $post_type;
	}

	public static function prepare_duplicate_view( &$post ) {
		$post = self::get_current_view( $post );
		$post = self::setup_edit_vars( $post );
	}

	/**
	 * Check if a View has been duplicated. If it has, get the View object to be duplicated. If it has not been duplicated, just get the new post object.
	 *
	 * @param object $post
	 * @return object - the View to be copied or the View that is being created (if it is not being duplicated)
	 */
	public static function get_current_view( $post ) {
		if ( FrmViewsDisplaysController::$post_type === $post->post_type && isset( $_GET['copy_id'] ) ) {
			global $copy_display;
			return $copy_display;
		}
		return $post;
	}

	public static function where_is_options() {
		return array(
			'='               => __( 'equal to', 'formidable-views' ),
			'!='              => __( 'NOT equal to', 'formidable-views' ),
			'>'               => __( 'greater than', 'formidable-views' ),
			'<'               => __( 'less than', 'formidable-views' ),
			'>='              => __( 'greater than or equal to', 'formidable-views' ),
			'<='              => __( 'less than or equal to', 'formidable-views' ),
			'LIKE'            => __( 'like', 'formidable-views' ),
			'not LIKE'        => __( 'NOT like', 'formidable-views' ),
			'LIKE%'           => __( 'starts with', 'formidable-views' ),
			'%LIKE'           => __( 'ends with', 'formidable-views' ),
			'group_by'        => __( 'unique (get oldest entries)', 'formidable-views' ),
			'group_by_newest' => __( 'unique (get newest entries)', 'formidable-views' ),
		);
	}

	/**
	 * Get the View type (show_count) for each View, e.g. calendar, dynamic
	 *
	 * @return array|object|void|null
	 */
	public static function get_show_counts() {
		$show_counts = self::get_meta_values( 'frm_show_count', 'frm_display' );
		return $show_counts;
	}

	/**
	 * Get the options for the site's Views
	 *
	 * @return array|object|void|null
	 */
	public static function get_frm_options_for_views() {
		$views_options = self::get_meta_values( 'frm_options', 'frm_display' );

		foreach ( $views_options as $key => $value ) {
			FrmProAppHelper::unserialize_or_decode( $value->meta_value );
			$views_options[ $key ]->meta_value = $value->meta_value;
		}

		return $views_options;
	}

	/**
	 * Get the specified meta value for the specified post type
	 *
	 * @param string $key
	 * @param string $post_type
	 *
	 * @return array|object|void|null
	 */
	public static function get_meta_values( $key = '', $post_type = 'frm_display' ) {
		global $wpdb;

		if ( empty( $key ) ) {
			return;
		}

		$table                = $wpdb->postmeta . ' pm LEFT JOIN ' . $wpdb->posts . ' p ON p.ID = pm.post_id';
		$field                = 'pm.post_id, pm.meta_value, pm.meta_key';
		$where['pm.meta_key'] = $key;
		$where['p.post_type'] = $post_type;

		$results = FrmDb::get_var( $table, $where, $field, array(), '', 'associative_results' );

		return $results;
	}

	public static function update_post_content_if_view_exists( &$post, $display_id, $form, $entry, &$dyn_content ) {
		$display = FrmViewsDisplay::getOne( $display_id, false, true );

		if ( ! $display ) {
			return;
		}

		$dyn_content          = 'one' === $display->frm_show_count ? $display->post_content : $display->frm_dyncontent;
		$post['post_content'] = apply_filters( 'frm_content', $dyn_content, $form, $entry );
	}
}
