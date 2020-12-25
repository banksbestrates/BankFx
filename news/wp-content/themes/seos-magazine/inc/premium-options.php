<?php

add_action('admin_menu', 'seos_magazine_admin_menu');

function seos_magazine_admin_menu() {

global $magazinenews_settings_page;

   $magazinenews_settings_page = add_theme_page('SEOS Magazine', 'Premium Theme ', 'edit_theme_options',  'my-unique-identifier', 'seos_magazine_settings_page');

	add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {

}

function seos_magazine_settings_page() {
?>
<div class="wrap">

	<form class="theme-options" method="post" action="options.php" accept-charset="ISO-8859-1">
		<?php settings_fields( 'seos-settings-group' ); ?>
		<?php do_settings_sections( 'seos-settings-group' ); ?>
		
		<div class="seos-magazine">
			<a target="_blank" href="https://seosthemes.com/seos-magazine/">
				<div class="btn s-red">
					 <?php _e('Buy', 'seos-magazine'); ?> <img class="ss-logo" src="<?php echo esc_url(get_template_directory_uri()) . '/images/logo.png'; ?>"/><?php _e(' Now', 'seos-magazine'); ?>
				</div>
			</a>
		</div>
		
		<div class="cb-center">	
			<img class="sb-demo" src="<?php echo esc_url(get_template_directory_uri()) . '/images/PREMIUM-THEME.png'; ?>"/>					
		</div>
				
		<div class="cb-center">			
			<img class="sb-demo" src="<?php echo esc_url(get_template_directory_uri()) . '/images/premium-options.png'; ?>"/>			
		</div>
		
	</form>
	
</div>
<?php } ?>