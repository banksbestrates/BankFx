<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}
?>
<div class="frm_submit_logic_rows frm_logic_rows frm_add_remove <?php echo ( ! empty( $submit_conditions['hide_field'] ) && ( count( $submit_conditions['hide_field'] ) > 1 || reset( $submit_conditions['hide_field'] ) != '' ) ) ? '' : ' frm_hidden'; ?>" id="frm_submit_logic_rows">
	<div id="frm_submit_logic_row">
			<select name="options[submit_conditions][show_hide]" class="auto_width">
				<option value="show" <?php selected( $submit_conditions['show_hide'], 'show' ); ?>>
					<?php esc_html_e( 'Show submit button', 'formidable-pro' ); ?>
				</option>
				<option value="hide" <?php selected( $submit_conditions['show_hide'], 'hide' ) ?>>
					<?php esc_html_e( 'Hide submit button', 'formidable-pro' ); ?>
				</option>
				<option value="enable" <?php selected( $submit_conditions['show_hide'], 'enable' ); ?>>
					<?php esc_html_e( 'Enable submit button', 'formidable-pro' ); ?>
				</option>
				<option value="disable" <?php selected( $submit_conditions['show_hide'], 'disable' ) ?>>
					<?php esc_html_e( 'Disable submit button', 'formidable-pro' ); ?>
				</option>
			</select>

			<?php
			$all_select = '<select name="options[submit_conditions][any_all]" class="auto_width">' .
				'<option value="any" ' . selected( $submit_conditions['any_all'], 'any', false ) . '>'
					. esc_html__( 'any', 'formidable-pro' ) .
				'</option>' .
				'<option value="all" ' . selected( $submit_conditions['any_all'], 'all', false ) . '>'
					. esc_html__( 'all', 'formidable-pro' ) .
				'</option>' .
				'</select>';

			echo( sprintf( esc_html__( 'if %s of the following match:', 'formidable-pro' ), $all_select ) );
			unset( $all_select );

			if ( ! empty( $submit_conditions['hide_field'] ) && ( isset( $values['fields'] ) && ! empty( $values['fields'] ) ) ) {
				$form_fields    = $values['fields'];
				$exclude_fields = array_merge( FrmField::no_save_fields(), array( 'file', 'rte', 'date' ) );
				foreach ( (array) $submit_conditions['hide_field'] as $meta_name => $hide_field ) {
					include( FrmProAppHelper::plugin_path() . '/classes/views/frmpro-forms/_submit_logic_row.php' );
				}
			}
			?>
	</div>
</div>
