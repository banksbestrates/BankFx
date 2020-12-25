<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}
?>
<p>
	<label for="frm_fade_form">
		<input type="checkbox" value="1" id="frm_fade_form" name="frm_fade_form" <?php checked( $frm_settings->fade_form, 1 ); ?> />
		<?php esc_html_e( 'Fade in forms with conditional logic on page load', 'formidable-pro' ); ?>
		<span class="frm_help frm_icon_font frm_tooltip_icon" title="<?php esc_attr_e( 'If your form is near the top of the page, you may see a flash of the fields hidden with conditional logic. Check this box to fade in the whole form. Note: If you have javascript errors on your page, your form will remain hidden on the page.', 'formidable-pro' ) ?>"></span>
	</label>
</p>

<!-- Deprecated settings can only be switched away from the default -->
<?php if ( $frm_settings->jquery_css ) { ?>
<p>
	<label for="frm_jquery_css">
		<input type="checkbox" value="1" id="frm_jquery_css" name="frm_jquery_css" <?php checked( $frm_settings->jquery_css, 1 ) ?> />
<?php esc_html_e( 'Include the jQuery CSS on ALL pages', 'formidable-pro' ); ?>
	</label>
	<span class="frm_help frm_icon_font frm_tooltip_icon" title="<?php esc_attr_e( 'The styling for the date field calendar. Some users may be using this css on pages other than just the ones that include a date field.', 'formidable-pro' ) ?>"></span>
</p>
<?php } ?>


<?php if ( $frm_settings->accordion_js ) { ?>
<p>
	<label for="frm_accordion_js">
		<input type="checkbox" value="1" id="frm_accordion_js" name="frm_accordion_js" <?php checked( $frm_settings->accordion_js, 1 ) ?> />
    	<?php esc_html_e( 'Include accordion javascript', 'formidable-pro' ); ?>
		<span class="howto"><strong><?php esc_html_e( 'Warning: This option will be removed. Please load accordion javascripts from your theme.', 'formidable-pro' ) ?></strong></span>
	</label>
	<span class="frm_help frm_icon_font frm_tooltip_icon" title="<?php esc_attr_e( 'If you have manually created an accordion form, be sure to include the javascript for it.', 'formidable-pro' ) ?>" ></span>
</p>
<?php } ?>
