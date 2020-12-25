<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmViewsSimpleBlocksController {

	/**
	 * Returns an array of Views options with name as the label and the id as the value, sorted by label
	 *
	 * @return array
	 */
	public static function get_views_options() {
		$views         = FrmViewsDisplay::getAll( array(), 'post_title' );
		$views_options = array_map( 'self::set_view_options', $views );
		$views_options = array_reverse( $views_options );
		return $views_options;
	}

	/**
	 * For a View, returns an array with the title as label and id as value
	 *
	 * @param object $view
	 * @return array
	 */
	private static function set_view_options( $view ) {
		return array(
			'label' => $view->post_title,
			'value' => $view->ID,
		);
	}

	private static function get_forms( $ids ) {
		$forms = FrmForm::getAll(
			array(
				'is_template' => 0,
				'status'      => 'published',
				'id'          => $ids,
			),
			'name'
		);
		return self::set_form_options( $forms );
	}

	/**
	 * Returns an array for a form with name as label and id as value
	 *
	 * @param array $forms
	 * @return array
	 */
	private static function set_form_options( $forms ) {
		$list   = array();
		$parent = array();
		foreach ( $forms as $form ) {
			if ( ! empty( $form->parent_form_id ) ) {
				$parent[] = $form->parent_form_id;
			} else {
				$list[ $form->id ] = array(
					'label' => $form->name,
					'value' => $form->id,
				);
			}
		}

		if ( $parent ) {
			$parent = array_diff( $parent, array_keys( $list ) );
			if ( $parent ) {
				$parents = self::get_forms( $parent );
				$list   += $parents;
			}
		}

		$list = array_values( $list );
		return $list;
	}

	/**
	 * Registers simple View block
	 */
	public static function register_simple_view_block() {
		if ( ! is_callable( 'register_block_type' ) ) {
			return;
		}

		$block_type = 'formidable/simple-view';
		$registry   = WP_Block_Type_Registry::get_instance();
		$registered = $registry->get_registered( $block_type );

		if ( ! $registered ) {
			register_block_type(
				$block_type,
				array(
					'attributes'      => array(
						'viewId'          => array(
							'type' => 'string',
						),
						'filter'          => array(
							'type'    => 'string',
							'default' => 'limited',
						),
						'useDefaultLimit' => array(
							'type'    => 'boolean',
							'default' => false,
						),
						'className'       => array(
							'type' => 'string',
						),
					),
					'editor_style'    => 'formidable',
					'editor_script'   => 'formidable-view-selector',
					'render_callback' => 'FrmViewsSimpleBlocksController::simple_view_render',
				)
			);
		}
	}

	/**
	 * Renders a View given the specified attributes.
	 *
	 * @param array $attributes
	 * @return string
	 */
	public static function simple_view_render( $attributes ) {
		if ( ! isset( $attributes['viewId'] ) ) {
			return '';
		}

		$params = array_filter( $attributes );
		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated, WordPress.Security.ValidatedSanitizedInput.MissingUnslash, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$in_editor = strrpos( $_SERVER['REQUEST_URI'], 'context=edit' );

		if ( $in_editor && isset( $params['useDefaultLimit'] ) && ( $params['useDefaultLimit'] ) ) {
			$params['limit'] = 20;
		}
		unset( $params['useDefaultLimit'] );

		$params['id'] = $params['viewId'];
		unset( $params['viewId'] );

		return FrmViewsDisplaysController::get_shortcode( $params );
	}
}
