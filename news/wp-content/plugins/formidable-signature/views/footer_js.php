<script>
var frmSigs=<?php echo json_encode( (array) $frm_vars['sig_fields'] ); ?>;
if(typeof __FRMSIG === 'undefined'){__FRMSIG=frmSigs;}else{__FRMSIG=jQuery.extend(__FRMSIG,frmSigs);}
</script>
