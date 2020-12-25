<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}
?>
<label class="frm_left_label"><?php esc_html_e( 'Event Date', 'formidable-views' ); ?></label>
<select id="date_field_id" name="options[date_field_id]">
	<option value="created_at" <?php selected( $post->frm_date_field_id, 'created_at' ); ?>>
		<?php esc_html_e( 'Entry creation date', 'formidable-views' ); ?>
	</option>
	<option value="updated_at" <?php selected( $post->frm_date_field_id, 'updated_at' ); ?>>
		<?php esc_html_e( 'Entry update date', 'formidable-views' ); ?>
	</option>
	<?php
	if ( is_numeric( $post->frm_form_id ) && ! empty( $post->frm_form_id ) ) {
		FrmProFieldsHelper::get_field_options( $post->frm_form_id, $post->frm_date_field_id, '', array( 'date' ) );
	}
	?>
</select>
<br/>

<label class="frm_left_label"><?php esc_html_e( 'End Date or Day Count', 'formidable-views' ); ?></label>
<select id="edate_field_id" name="options[edate_field_id]">
	<option value=""><?php esc_html_e( 'No multi-day events', 'formidable-views' ); ?></option>
	<option value="created_at" <?php selected( $post->frm_edate_field_id, 'created_at' ); ?>>
		<?php esc_html_e( 'Entry creation date', 'formidable-views' ); ?>
	</option>
	<option value="updated_at" <?php selected( $post->frm_edate_field_id, 'updated_at' ); ?>>
		<?php esc_html_e( 'Entry update date', 'formidable-views' ); ?>
	</option>
	<?php
	if ( is_numeric( $post->frm_form_id ) && ! empty( $post->frm_form_id ) ) {
		FrmProFieldsHelper::get_field_options( $post->frm_form_id, $post->frm_edate_field_id, '', array( 'date', 'number', 'select', 'radio', 'scale', 'star' ) );
	}
	?>
</select>
<br/>

<label class="frm_left_label">
	<?php esc_html_e( 'Repeat', 'formidable-views' ); ?>
	<span class="frm_help frm_icon_font frm_tooltip_icon" title="<?php printf( esc_html__( 'Select a field from your form that contains values like 1 week, 2 weeks, 1 year, etc. This will set the repeat period for each event.', 'formidable-views' ), FrmAppHelper::site_url() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" ></span>
</label>
<select id="repeat_event_field_id" name="options[repeat_event_field_id]">
	<option value=""><?php esc_html_e( 'No repeating events', 'formidable-views' ); ?></option>
	<?php
	if ( is_numeric( $post->frm_form_id ) && ! empty( $post->frm_form_id ) ) {
		FrmProFieldsHelper::get_field_options( $post->frm_form_id, $post->frm_repeat_event_field_id, '', array( 'radio', 'select' ) );
	}
	?>
</select>
<br/>

<label class="frm_left_label"><?php esc_html_e( 'End Repeat', 'formidable-views' ); ?></label>
<select id="repeat_edate_field_id" name="options[repeat_edate_field_id]">
	<option value=""><?php esc_html_e( 'Never', 'formidable-views' ); ?></option>
	<?php
	if ( is_numeric( $post->frm_form_id ) && ! empty( $post->frm_form_id ) ) {
		FrmProFieldsHelper::get_field_options( $post->frm_form_id, $post->frm_repeat_edate_field_id, '', array( 'date' ) );
	}
	?>
</select>
