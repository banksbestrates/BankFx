<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}
?>
<div class="frm_dropzone dz-clickable">
	<div class="dz-message">
		<span class="frm_icon_font frm_upload_icon"></span>
		<?php echo esc_html( $field['drop_msg'] ); ?>
		<div class="frm_small_text">
			<?php echo esc_html( sprintf( __( 'Maximum upload size: %sMB', 'formidable-pro' ), FrmProFileField::get_max_file_size( $field['size'] ) ) ) ?>
		</div>
	</div>
</div>
<input type="hidden" name="<?php echo esc_attr( $field_name ) ?>" />
