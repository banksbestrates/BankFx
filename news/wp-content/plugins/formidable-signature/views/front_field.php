<div class="sigPad" <?php
if ( ! isset( $plus_id ) || empty( $plus_id ) ) {
	?>id="sigPad<?php echo esc_attr( (int) $field['id'] ); ?>"<?php
}
?> style="max-width:<?php echo esc_attr( (int) $styles['width'] ); ?>px;">
	<div class="sig sigWrapper" style="<?php echo esc_attr( $styles['css'] ); ?>">
		<?php if ( ! $styles['hide_tabs'] ) { ?>
		<ul class="sigNav">
			<li class="drawIt"><a href="#" class="current" title="<?php echo esc_html( $field['label1'] ); ?>" aria-label="<?php echo esc_html( $field['label1'] ); ?>"><i class="frm_icon_font frm_signature_icon" aria-hidden></i></a></li>
			<li class="typeIt"><a href="#" title="<?php echo esc_html( $field['label2'] ); ?>" aria-label="<?php echo esc_html( $field['label2'] ); ?>"><i class="frm_icon_font frm_keyboard_icon" aria-hidden></i></a></li>
		</ul>
		<?php } ?>
		<div class="typed">
			<input type="text" name="<?php echo esc_attr( $field_name ); ?>[typed]" class="name" id="<?php echo esc_attr( $html_id ); ?>" autocomplete="off" value="<?php echo esc_attr( $typed_value ); ?>" />
		</div>
		<canvas class="pad" width="<?php echo esc_attr( $styles['width'] - 4 ); ?>" height="<?php echo esc_attr( $styles['height'] ); ?>"></canvas>
		<div class="clearButton"><a href="#clear"><?php echo esc_html( $field['label3'] ); ?></a></div>
		<input type="hidden" name="<?php echo esc_attr( $field_name ); ?>[output]" class="output" value="<?php echo esc_attr( $output ); ?>" />
	</div>
</div>
