<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

if ( isset( $field->field_options ) && isset( $field->field_options['post_field'] ) && 'post_status' === $field->field_options['post_field'] ) {
	$options = FrmProFieldsHelper::get_status_options( $field, $field->options ); ?>
	<select name="options[where_val][<?php echo esc_attr( $where_key ); ?>]">
		<?php
		foreach ( $options as $opt_key => $opt ) {
			if ( is_array( $opt ) ) {
				$opt_key = isset( $opt['value'] ) ? $opt['value'] : ( isset( $opt['label'] ) ? $opt['label'] : reset( $opt ) );
				$opt     = isset( $opt['label'] ) ? $opt['label'] : reset( $opt );
			}
			?>
			<option value="<?php echo esc_attr( $opt_key ); ?>" <?php selected( $where_val, $opt_key ); ?>><?php echo esc_html( $opt ); ?></option>
		<?php } ?>
	</select>
	<?php
} elseif ( 'is_draft' === $field_id ) {
	?>
		<select name="options[where_val][<?php echo esc_attr( $where_key ); ?>]">
			<option value="both" <?php selected( $where_val, 'both' ); ?>>
				<?php esc_html_e( 'Draft or complete entry', 'formidable-views' ); ?>
			</option>
			<option value="1" <?php selected( $where_val, '1' ); ?>>
				<?php esc_html_e( 'Draft', 'formidable-views' ); ?>
			</option>
			<option value="0" <?php selected( $where_val, '0' ); ?>>
				<?php esc_html_e( 'Complete entry', 'formidable-views' ); ?>
			</option>
		</select>
	<?php
} else {
	if ( isset( $field ) && 'date' === $field->type ) {
		?><span class="frm_help frm_icon_font frm_tooltip_icon" title="<?php esc_attr_e( 'Date options: \'NOW\' or a date in yyyy-mm-dd format.', 'formidable-views' ); ?>" ></span> 
		<?php
	}
	?>
<input type="text" value="<?php echo esc_attr( $where_val ); ?>" name="options[where_val][<?php echo esc_attr( $where_key ); ?>]"/>
	<?php
}
