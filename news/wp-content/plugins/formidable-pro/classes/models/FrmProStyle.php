<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmProStyle extends FrmStyle {
	public function duplicate( $id ) {
		$this->id = $id;
		$default_style = $this->get_one();
		$style = $this->get_new();

		$style->post_content = array_merge( $style->post_content, $default_style->post_content );

		return $style;
	}
}
