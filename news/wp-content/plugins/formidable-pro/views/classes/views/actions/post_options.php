<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}
?>
<p class="frm6 frm_form_field frm_dyncontent_opt <?php echo $display ? '' : 'frm_hidden'; ?>">
	<label for="<?php echo esc_attr( $display_id_field_name ); ?>"><?php esc_html_e( 'Select View', 'formidable-views' ); ?></label>
	<select id="<?php echo esc_attr( $display_id_field_name ); ?>" name="<?php echo esc_attr( $display_id_field_name ); ?>" class="frm_dyncontent_opt">
		<option value=""><?php esc_html_e( '&mdash; Select &mdash;', 'formidable-views' ); ?></option>
		<option value="new"><?php esc_html_e( 'Create new view', 'formidable-views' ); ?></option>
		<?php foreach ( $displays as $d ) { ?>
			<option value="<?php echo absint( $d->ID ); ?>" 
				<?php
				if ( $display ) {
					selected( $d->ID, $display->ID );
				}
				?>>
				<?php echo esc_html( stripslashes( $d->post_title ) ); ?>
			</option>
		<?php } ?>
	</select>
</p>
<div class="frm_dyncontent_opt <?php echo esc_attr( $display ? '' : 'frm_hidden' ); ?>">
	<p class="frm_has_shortcodes">
		<label for="frm_dyncontent">
			<?php esc_html_e( 'Customize Content', 'formidable-views' ); ?>
			<span class="frm_help frm_icon_font frm_tooltip_icon" title="<?php esc_attr_e( 'The content shown on your single post page. If nothing is entered here, the regular post content will be used.', 'formidable-views' ); ?>"></span>
		</label>
		<?php
		if ( $display ) {
			$textarea_value = FrmAppHelper::esc_textarea( 'one' === $display->frm_show_count ? $display->post_content : $display->frm_dyncontent );
		} else {
			$textarea_value = '';
		}
		?>
		<textarea
			id="frm_dyncontent"
			placeholder="<?php esc_attr_e( 'Add text, HTML, and fields from your form to build your post content.', 'formidable-views' ); ?>"
			name="dyncontent"
			rows="10"
			class="frm_not_email_message"
		><?php echo $textarea_value; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></textarea>
	</p>
	<span class="howto">
		<?php esc_html_e( 'Editing this box will update your existing view or create a new one.', 'formidable-views' ); ?>
	</span>
</div>
