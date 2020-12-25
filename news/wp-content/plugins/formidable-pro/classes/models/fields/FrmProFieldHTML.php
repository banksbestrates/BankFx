<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

/**
 * @since 3.0
 */
class FrmProFieldHTML extends FrmFieldHTML {

	protected function field_settings_for_type() {
		$settings = parent::field_settings_for_type();

		FrmProFieldsHelper::fill_default_field_display( $settings );
		return $settings;
	}
}
