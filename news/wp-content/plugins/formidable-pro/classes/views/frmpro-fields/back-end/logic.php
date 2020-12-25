<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}
?>
<tr>
	<td colspan="2">
		<a href="javascript:void(0)" id="logic_<?php echo absint( $field['id'] ) ?>" class="frm_add_logic_row frm_add_logic_link <?php
		echo ( ! empty( $field['hide_field'] ) && ( count( $field['hide_field'] ) > 1 || reset( $field['hide_field'] ) != '' ) ) ? ' frm_hidden' : '';
		?>">
			<?php FrmProAppHelper::icon_by_class( 'frmfont frm_swap_icon' ); ?>
			<?php esc_html_e( 'Add Conditional Logic', 'formidable-pro' ); ?>
		</a>
		<div class="frm_logic_rows frm_add_remove<?php echo ( ! empty( $field['hide_field'] ) && ( count( $field['hide_field'] ) > 1 || reset( $field['hide_field'] ) != '' ) ) ? '' : ' frm_hidden'; ?>" id="frm_logic_rows_<?php echo absint( $field['id'] ) ?>">
			<h3>
				<?php esc_html_e( 'Conditional Logic', 'formidable-pro' ); ?>
				<i class="frm_icon_font frm_arrowdown6_icon"></i>
			</h3>
			<div class="frm-collapse-me">
			<div id="frm_logic_row_<?php echo absint( $field['id'] ) ?>">
				<select name="field_options[show_hide_<?php echo absint( $field['id'] ) ?>]" class="auto_width">
					<option value="show" <?php selected( $field['show_hide'], 'show' ); ?>><?php echo ( $field['type'] == 'break' ) ? __( 'Do not skip next page', 'formidable-pro' ) : __( 'Show this field', 'formidable-pro' ); ?></option>
					<option value="hide" <?php selected( $field['show_hide'], 'hide' ) ?>><?php echo ( $field['type'] == 'break' ) ? __( 'Skip next page', 'formidable-pro' ) : __( 'Hide this field', 'formidable-pro' ); ?></option>
				</select>

				<?php
				$all_select =
					'<select name="field_options[any_all_' . absint( $field['id'] ) . ']" class="auto_width">' .
					'<option value="any" ' . selected( $field['any_all'], 'any', false ) . '>' . __( 'any', 'formidable-pro' ) . '</option>' .
					'<option value="all" ' . selected( $field['any_all'], 'all', false ) . '>' . __( 'all', 'formidable-pro' ) . '</option>' .
					'</select>';

				printf( __( 'if %s of the following match:', 'formidable-pro' ), $all_select );
				unset($all_select);

				if ( ! empty( $field['hide_field'] ) ) {
					foreach ( (array) $field['hide_field'] as $meta_name => $hide_field ) {
						include(FrmProAppHelper::plugin_path() . '/classes/views/frmpro-fields/_logic_row.php');
					}
				}
				?>
			</div>
			<a href="javascript:void(0)" class="frm_add_logic_row button frm-button-secondary">
				<?php FrmProAppHelper::icon_by_class( 'frmfont frm_plus_icon' ); ?>
				<?php esc_html_e( 'Add', 'formidable-pro' ); ?>
			</a>
			</div>
		</div>
	</td>
</tr>
