<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}
?>

<div class="frm-preview-buttons frm_submit">
	<button class="frm_prev_page" disabled="disabled">
		<?php echo esc_html( $previous ); ?>
	</button>
	<button class="frm_button_submit" disabled="disabled">
		<?php echo FrmAppHelper::kses( force_balance_tags( $field['name'] ), 'all' ); // WPCS: XSS ok. ?>
	</button>
</div>

<div class="frm-page-break">
	<div class="frm-collapse-page button frm-button-secondary">
		<?php
		/* translators: %s: The page number */
		printf( esc_html__( 'Page %s', 'formidable-pro' ), '<span class="frm-page-num">2</span>' );
		?>
		<i class="frm_icon_font frm_arrowdown6_icon"></i>
	</div>
</div>
