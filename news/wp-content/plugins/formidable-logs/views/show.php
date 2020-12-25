<table class="form-table">
	<tr>
		<td><?php esc_html_e( 'Response', 'formidable-log' ) ?></td>
		<td><?php echo FrmLog::prepare_for_output( $post->post_content ); ?></td>
	</tr>
	<?php foreach ( $custom_fields as $custom_field ) { ?>
		<tr>
			<td><?php echo esc_html( $custom_field->meta_key ) ?></td>
			<td><?php echo FrmLog::prepare_meta_for_output( $custom_field ); ?></td>
		</tr>
	<?php } ?>
</table>