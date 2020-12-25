<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmViewsAppHelper {

	public static function plugin_version() {
		$plugin_data = get_plugin_data( self::plugin_path() . '/formidable-views.php' );
		return $plugin_data['Version'];
	}

	public static function plugin_folder() {
		return basename( self::plugin_path() );
	}

	public static function plugin_path() {
		return dirname( dirname( dirname( __FILE__ ) ) );
	}

	public static function plugin_url() {
		return plugins_url( '', self::plugin_path() . '/formidable-views.php' );
	}

	public static function relative_plugin_url() {
		return str_replace( array( 'https:', 'http:' ), '', self::plugin_url() );
	}

	public static function reset_keys( $arr ) {
		$new_arr = array();
		if ( empty( $arr ) ) {
			return $new_arr;
		}

		foreach ( $arr as $val ) {
			$new_arr[] = $val;
			unset( $val );
		}
		return $new_arr;
	}

	/* Genesis Integration */
	public static function load_genesis() {
		// Add classes to view pagination
		add_filter( 'frm_pagination_class', 'FrmViewsAppHelper::gen_pagination_class' );
		add_filter( 'frm_prev_page_label', 'FrmViewsAppHelper::gen_prev_label' );
		add_filter( 'frm_next_page_label', 'FrmViewsAppHelper::gen_next_label' );
		add_filter( 'frm_prev_page_class', 'FrmViewsAppHelper::gen_prev_class' );
		add_filter( 'frm_next_page_class', 'FrmViewsAppHelper::gen_next_class' );
		add_filter( 'frm_page_dots_class', 'FrmViewsAppHelper::gen_dots_class', 1 );
	}

	public static function gen_pagination_class( $class ) {
		$class .= ' archive-pagination pagination';
		return $class;
	}

	public static function gen_prev_label() {
		return apply_filters( 'genesis_prev_link_text', '&#x000AB;' . __( 'Previous Page', 'formidable-views' ) );
	}

	public static function gen_next_label() {
		return apply_filters( 'genesis_next_link_text', __( 'Next Page', 'formidable-views' ) . '&#x000BB;' );
	}

	public static function gen_prev_class( $class ) {
		$class .= ' pagination-previous';
		return $class;
	}

	public static function gen_next_class( $class ) {
		$class .= ' pagination-next';
		return $class;
	}

	public static function gen_dots_class( $class ) {
		$class = 'pagination-omission';
		return $class;
	}
	/* End Genesis */
}
