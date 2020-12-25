<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

$max = FrmField::get_option( $field, 'maxnum' );
if ( $max !== '' ) {
	$min = FrmField::get_option( $field, 'minnum' );
	if ( $min !== '' ) {
		$field['options'] = range( $min, $max );
	}
}

if ( is_array($field['options']) ) {
    if ( ! isset($field['value']) ) {
		$field['value'] = $field['default_value'];
		FrmProAppHelper::unserialize_or_decode( $field['value'] );
    }

    foreach ( $field['options'] as $opt_key => $opt ) {
        $opt = apply_filters('frm_field_label_seen', $opt, $opt_key, $field);
        $last = end($field['options']) == $opt ? ' frm_last' : '';

    ?><div class="frm_scale <?php echo esc_attr( $last ) ?>"><label for="<?php echo esc_attr( $html_id . '-' . $opt_key ) ?>">
<input type="radio" name="<?php echo esc_attr( $field_name ) ?>" id="<?php echo esc_attr( $html_id . '-' . $opt_key ) ?>" value="<?php echo esc_attr( $opt ) ?>" <?php
	checked( $field['value'], $opt ) . ' ';
    do_action( 'frm_field_input_html', $field );
?> />
<?php echo esc_html( $opt ) ?></label>
</div>
<?php

}
}
?>
<div style="clear:both;"></div>
