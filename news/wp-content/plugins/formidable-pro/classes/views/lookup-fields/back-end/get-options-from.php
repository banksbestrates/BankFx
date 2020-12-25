<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}
?>
<p class="frm6 frm_form_field">
<?php if ( isset( $opt_label ) ) { ?>
	<label>
		<?php echo esc_html( $opt_label ); ?>
	</label>
<?php } ?>

<select class="frm_get_values_form" id="get_values_form_<?php echo absint( $field['id'] ); ?>" name="field_options[get_values_form_<?php echo esc_attr( $field['id'] ); ?>]" data-fieldtype="<?php echo esc_attr( $field['type'] ); ?>">
	<option value="">&mdash; <?php esc_html_e( 'Select Form', 'formidable-pro' ); ?> &mdash;</option>
	<?php foreach ( $lookup_args['form_list'] as $form_opts ) { ?>
	<option value="<?php echo absint( $form_opts->id ) ?>"<?php selected( $form_opts->id, isset( $field['get_values_form'] ) ? $field['get_values_form'] : '' ); ?>>
		<?php echo FrmAppHelper::truncate( $form_opts->name, 30 ) ?>
	</option>
	<?php } ?>
</select>
</p>
<p class="frm6 frm_form_field">
	<label for="get_values_field_<?php echo absint( $field['id'] ) ?>" class="frm_invisible">
		<?php esc_html_e( 'Select a Field', 'formidable-pro' ); ?>
	</label>
	<select id="get_values_field_<?php echo absint( $field['id'] ) ?>" name="field_options[get_values_field_<?php echo esc_attr( $field['id'] ) ?>]" data-changeme="setup-message-<?php echo esc_attr( $field['id'] ); ?>">
		<?php
		FrmProLookupFieldsController::show_options_for_get_values_field( $lookup_args['form_fields'], $field );
		?>
	</select>
</p>
