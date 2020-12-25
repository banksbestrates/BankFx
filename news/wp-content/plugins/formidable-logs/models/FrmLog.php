<?php

class FrmLog {

	public $post_type = 'frm_logs';

	public function add( $values ) {
		$post = array(
			'post_type'    => $this->post_type,
			'post_title'   => $values['title'],
			'post_content' => $values['content'],
			'post_status'  => 'publish',
		);
		if ( isset( $values['excerpt'] ) ) {
			$post['post_excerpt'] = $values['excerpt'];
			$this->maybe_encode( $post['post_excerpt'] );
		}
		$this->maybe_encode( $post['post_content'] );

		$post_id = wp_insert_post( $post );
		if ( isset( $values['fields'] ) ) {
			$this->add_custom_fields( $post_id, $values['fields'] );
		}
	}

	private function add_custom_fields( $post_id, $fields ) {
		foreach ( $fields as $name => $value ) {
			update_post_meta( $post_id, 'frm_' . $name, $value );
		}
	}

	private function maybe_encode( &$value ) {
		if ( is_array( $value ) ) {
			$value = json_encode( $value );
		}
	}


	public static function prepare_meta_for_output( $custom_field ) {
		$value = $custom_field->meta_value;
		$value = self::maybe_decode( $value );
		if ( is_array( $value ) ) {
			if ( $custom_field->meta_key == 'frm_request' ) {
				if ( version_compare( phpversion(), '5.4', '>=' ) ) {
					$value = json_encode( $value, JSON_PRETTY_PRINT );
				} else {
					$value = json_encode( $value, true );
				}
			} else {
			
			}
		}

		return self::prepare_for_output( $value );
	}

	public static function prepare_for_output( $value ) {
		if ( is_array( $value ) ) {
			$value = implode( $value, "\r\n" );
		}
		$value = str_replace( array( '":"', '","', '{', '},' ), array( '": "', '", "', "\r\n{\r\n", "\r\n},\r\n" ), $value );
		return wpautop( strip_tags( $value ) );
	}

	private static function maybe_decode( $value ) {
		return FrmAppHelper::maybe_json_decode( $value );
	}
}
