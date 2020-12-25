<?php

class FrmLogList {
	public static function manage_columns( $columns ) {

		$columns['entry']  = __( 'Entry', 'formidable' );
		$columns['action']    = __( 'Action', 'formidable' );
		$columns['code']      = __( 'Status', 'formidable' );

		return $columns;
	}

	public static function manage_custom_columns( $column_name, $id ) {
		switch ( $column_name ) {
			case 'name':
			case 'content':
				$post = get_post( $id );
				$val = FrmAppHelper::truncate( strip_tags( $post->{"post_$column_name"} ), 100 );
				break;
			case 'entry':
				$entry_id = get_post_meta( $id, 'frm_' . $column_name, true );
				if ( current_user_can('frm_edit_entries') ) {
					$edit_link = '?page=formidable-entries&frm_action=edit&id=' . $entry_id;
					$val = '<a href="' . esc_url( $edit_link ) . '">' . __( 'Entry' ) . ' ' . $entry_id . '</a>';
				} else {
					$val = $entry_id;
				}
				break;
			case 'action':
			case 'code':
				$val = get_post_meta( $id, 'frm_' . $column_name, true );
			break;
			default:
				$val = $column_name;
				break;
		}

		echo $val;
	}

	public static function post_row_actions( $actions, $post ) {
		if ( $post->post_type == FrmLogAppController::$post_type ) {
			//$actions['resend'] = '<a href="' . esc_url( admin_url( 'post-new.php?post_type=frm_display&copy_id=' . $post->ID ) ) . '" title="' . esc_attr( __( 'Trigger Now', 'formidable-logs' ) ) . '">' . __( 'Trigger Now', 'formidable-logs' ) . '</a>';
		}
		return $actions;
	}
}
