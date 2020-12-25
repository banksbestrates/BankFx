<h3><?php _e('User Meta', 'frmreg') ?> <span class="frm_help frm_icon_font frm_tooltip_icon" title="<?php esc_attr_e('Add user meta to save submitted values to a user\'s profile. User meta can be retrieved with the [user_meta key="insert_name_here"] shortcode.', 'frmreg') ?>"></span></h3>
<?php $has_meta =  isset( $form_action->post_content['reg_usermeta'] ) && ! empty( $form_action->post_content['reg_usermeta'] ); ?>
<div id="frm_user_meta_add" class="form-table<?php echo esc_attr( $has_meta ? ' frm_hidden' : '' ); ?>">
	<span class="frm_add_meta_link">
		<a href="javascript:void(0)" class="button frm-button-secondary frm-with-plus reg_user_meta_add_button">
			<?php esc_html_e( 'Add', 'frmreg' ); ?>
		</a>
	</span>
</div>
<div id="frm_user_meta_table" class="frm_name_value frm_add_remove <?php echo esc_attr( $has_meta ? '' : ' frm_hidden' ); ?>">
	<p class="frm_grid_container frm_no_margin">
		<label class="frm4 frm_form_field">
			<?php _e( 'Name', 'frmreg' ); ?>
		</label>
		<label class="frm6 frm_form_field">
			<?php _e( 'Value', 'frmreg' ); ?>
		</label>
	</p>
    <div id="frm_user_meta_rows">
    <?php
        foreach ( $form_action->post_content['reg_usermeta'] as $meta_key => $user_meta_vars ) {
            $meta_name = $user_meta_vars['meta_name'];
            $field_id = $user_meta_vars['field_id'];
            $echo = true;
            $action_control = $this;
            if ( $meta_name ) {
                include(FrmRegAppHelper::path() .'/views/_usermeta_row.php');
            }
        } ?>
	</div>
</div>
