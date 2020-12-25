<?php
/**
 * Add the about page under appearance.
 *
 * Display the details about the theme information
 *
 * @package timesnews
 */
?>
<?php
// About Information
add_action( 'admin_menu', 'timesnews_about' );
function timesnews_about() {    	
	add_theme_page( esc_html__('About Theme', 'timesnews'), esc_html__('About Theme', 'timesnews'), 'edit_theme_options', 'timesnews-about', 'timesnews_about_page');   
}

// CSS for About Theme Page
function timesnews_admin_theme_style() {
   wp_enqueue_style('timesnews-admin-style', get_template_directory_uri() . '/inc/about-theme/css/about-theme.css');
}
add_action('admin_enqueue_scripts', 'timesnews_admin_theme_style');

function timesnews_about_page() {
	$theme = wp_get_theme();

?>
<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php /* translators: %s theme name */
				printf( esc_html__( 'Welcome to %s', 'timesnews' ), esc_html( $theme->Name ) ); ?>
				<?php esc_html_e('Version:','timesnews'); ?> <?php echo esc_html($theme['Version']);?></h3>
				<p>
					<?php esc_html_e('TimesNews Magazine theme is an amazing modern WordPress theme. You can choose to build professional websites. It is easy to customize for all kinds of news, newspaper, magazine, publishing, blog or review sites. It also include all major aspects like responsive, performance, cross-browser compatible, SEO ready and supports RTL. It is ready to promotion with social media icons to reach maximum target audience. Responsive slider impress your customers with lively eye-catching images right on your banner section.','timesnews'); ?>
				</p>
				<p>
				<?php /* translators: %s theme name */
					printf( esc_html__( '%s theme is designed with passion. Please click the below button to display how your site looks like', 'timesnews' ), esc_html( $theme->Name ) );
				?></p>
				<p> &nbsp;</p>
				<a href="<?php echo esc_url('https://demo.themespiral.com/timesnews'); ?>" class="button button-primary button-hero about-theme" target="_blank"><?php esc_html_e( 'Visit Free Demo', 'timesnews' ); ?></a> &nbsp; <a href="<?php echo esc_url('https://demo.themespiral.com/timesnews-pro'); ?>" class="button button-primary button-hero about-theme" target="_blank"><?php esc_html_e( 'Visit Pro Demo', 'timesnews' ); ?></a>
		</div>
		<div class="theme-tabs">
			<input type="radio" name="nav" id="one" checked="checked"/>
			<label for="one" class="tab-label"><?php esc_html_e('Getting Started?','timesnews');?></label>

			<input type="radio" name="nav" id="two"/>
			<label for="two" class="tab-label"><?php esc_html_e('Demo Importer','timesnews');?></label>

			<input type="radio" name="nav" id="three"/>
			<label for="three" class="tab-label"><?php esc_html_e('Support','timesnews');?></label>

			<input type="radio" name="nav" id="four"/>
			<label for="four" class="tab-label"><?php esc_html_e('Setup Section','timesnews');?></label>

			<input type="radio" name="nav" id="five"/>
			<label for="five" class="tab-label"><?php esc_html_e('Pro Features','timesnews');?></label>

			<article class="content one">
			    <h3><?php esc_html_e('About Documentation','timesnews');?></h3>
			    <p><?php esc_html_e('Documentation is the information that describes the product to its users. Our documentation covers only related to Free Themes and Pro Extension Plugins. It will guide your to develop your Website as we displayed in demo site without any others help.','timesnews');?></p>
			    <p>
					<a href="<?php echo esc_url('https://docs.themespiral.com/timesnews/');?>" target="_blank" class="button button-primary"><?php printf( esc_html__( '%s Documentation', 'timesnews' ), esc_html( $theme->Name ) ); ?></a>
				</p>
				<h3><?php esc_html_e('Theme Customizer','timesnews');?></h3>
			   <p><?php printf( esc_html__( '%s supports the Theme Customizer for all theme settings. Click "Customize" to personalize your site.', 'timesnews' ), esc_html( $theme->Name ) ); ?>
			   	<a href="<?php echo esc_url(admin_url( 'customize.php' )); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Start Customizing','timesnews');?></a>
				</p>
				<h3><?php esc_html_e('F.A.Q (Frequently Asked Questions)','timesnews');?></h3>
			   <p><?php esc_html_e('Want to know more about Themes and Plugins developed by Theme Spiral? ','timesnews'); ?><a href="<?php echo esc_url('https://themespiral.com/f-a-q/');?>" class="button button-primary" target="_blank"><?php esc_html_e('F.A.Q','timesnews');?></a></p>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
			</article>

			<article class="content two">
			    <h3><?php esc_html_e('Demo Importer','timesnews');?></h3>
				<p>
					<?php esc_html_e( 'If your site have your own content then do not use this plugins to import dummy content. It will mess your site with dummy content. Is your site fresh? Install the Demo importer plugins and activate it.', 'timesnews' ); ?></p>
				<p><?php esc_html_e('Do you want to install One Click Demo Import Plugin? ','timesnews'); ?></p>
					<?php if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) { ?>
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ) ?>" class="button button-primary" style="text-decoration: none;">
						<?php esc_html_e( 'Install Demo Plugin', 'timesnews' ); ?>
					</a>
				<?php } else { ?>
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) ?>" class="button button-primary" style="text-decoration: none;">
						<?php esc_html_e( 'Install Demo Plugin', 'timesnews' ); ?>
					</a>
				<?php } ?> &nbsp;&nbsp;

				<h3><?php esc_html_e('How to install Dummy Content ?','timesnews');?></h3>

				<p><?php esc_html_e(' Please install One Click Demo Import plugins. You can install it after activating timesnews theme. It is listed in recommended Plugins','timesnews'); ?></p>
				<ul>
					<li><?php esc_html_e('After plugin is activated, it asks you to upload  XML, WIE and  DAT dummy file','timesnews');?></li>
					<li><a href="https://themespiral.com/download/1612/" target="_blank"><?php esc_html_e('Download it from Here ','timesnews');?></a></li>
					<li><?php esc_html_e('Unzip timesnews-dummy-content.zip file. You can find all XML, WIE and  DAT dummy file','timesnews');?></li>
					<li><?php esc_html_e('Navigate to Appearance > Import Demo Data','timesnews');?> 
					<?php if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) { ?> <a href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ) ?>"><?php esc_html_e('Upload','timesnews'); ?></a><?php } ?></li>
					<li><?php esc_html_e('Upload manually and Click on Import demo data.','timesnews');?></li>
					<li><?php esc_html_e('Now all your files and settings has been imported. Now you just need to setup your menu and front page.','timesnews');?></li>
				</ul>
				<p><?php esc_html_e('Now all your files and settings has been imported. Now you just need to setup your menu and front page.','timesnews');?></p>
				<p><strong><?php esc_html_e('Setup Menu:','timesnews');?> </strong></p>
				
				<ul>
					<li><?php esc_html_e('In the Blog Dashboard, select Appearance > Menus.','timesnews');?></li>
					<li><?php esc_html_e('Under the Menu Settings, located at the bottom of your screen, select Primary/ Secondary menu','timesnews');?></li>
					<li><?php esc_html_e('Click save menu','timesnews');?></li>
				</ul>
				<p><strong><?php esc_html_e('Setup Home Page:','timesnews');?></strong></p>
				<ul>
					<li><?php esc_html_e('Navigate to Dashboard > Reading > Click on ( A static page ) from Your homepage displays','timesnews');?></li>
				
				<li><?php esc_html_e('Select Homepage as Home and Postpage as Blog','timesnews');?></li>
			</ul>
			</article>

			<article class="content three">
			   <h3><?php esc_html_e('About Support','timesnews');?></h3>
				<p><?php esc_html_e('Need Help? Use our Forums if you have any Themes and Plugins related questions. Support will be provided only related to our Themes and Plugins','timesnews');?>
					<a href="<?php echo esc_url('https://themespiral.com/forums/'); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Forums','timesnews');?></a>
				</p>
				<h3><?php esc_html_e('Sales Questions','timesnews');?></h3>
				<p><?php esc_html_e('Do you have discussion relating to billing, your account or have pre-sales questions? Get touch with us!','timesnews');?>
					<a href="<?php echo esc_url('https://themespiral.com/contact-us/');?>" target="_blank" class="button button-primary"> <?php esc_html_e('Contact us','timesnews');?></a>
				</p>
			   <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
			</article>

			<article class="content four">
			   <h3><?php esc_html_e('Setup Sections','timesnews');?></h3>
				<h4> <?php esc_html_e('Setup Site Identity','timesnews'); ?></h4>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=title_tagline')); ?>"></span><?php esc_html_e( 'Site Identity', 'timesnews' ); ?></a>

				<h4> <?php esc_html_e('Setup Main Banner','timesnews'); ?></h4>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=timesnews_main_banner_section')); ?>"></span><?php esc_html_e( 'Main Banner', 'timesnews' ); ?></a>

				<h4> <?php esc_html_e('Setup Social Icons','timesnews'); ?></h4>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url())?>nav-menus.php"></span><?php esc_html_e( 'Social Icons', 'timesnews' ); ?></a>

				<h4> <?php esc_html_e('Setup Primary Menu','timesnews'); ?></h4>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url())?>nav-menus.php"></span><?php esc_html_e( 'Primary Menu', 'timesnews' ); ?></a>

				<h4> <?php esc_html_e('Setup Header','timesnews'); ?></h4>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=header_image')); ?>"></span><?php esc_html_e( 'Setup Header', 'timesnews' ); ?></a>
			</article>

			<article class="content five">
				 <h3><?php esc_html_e('Upgrade to Pro','timesnews');?></h3>
				 <p><?php esc_html_e('Want additional features? Pro extension plugin adds additinal features for free themes. ','timesnews')?><a href="<?php echo esc_url('https://themespiral.com/themes/timesnews');?>" class="button button-primary button-hero" target="_blank"><?php esc_html_e('Upgrade to Pro','timesnews');?></a></p>
			   <h3><?php esc_html_e('Pro Features Extension','timesnews');?></h3>
				<div class="feature-content">
					<ul class="feature-text">
						<li><?php esc_html_e('Site Layout','timesnews'); ?></li>
						<li><?php esc_html_e('Single Sidebar Layout','timesnews'); ?></li>
						<li><?php esc_html_e('Flexible Content Width','timesnews'); ?></li>
						<li><?php esc_html_e('Sidebar Content Width','timesnews'); ?></li>
						<li><?php esc_html_e('Custom Design','timesnews'); ?></li>
						<li><?php esc_html_e('Default Text Edit','timesnews'); ?></li>
						<li><?php esc_html_e('Choose Main Banner','timesnews'); ?></li>
						<li><?php esc_html_e('Category highlight settings','timesnews'); ?></li>
						<li><?php esc_html_e('Excerpt Text edit','timesnews'); ?></li>
						<li><?php esc_html_e('Footer Layout','timesnews'); ?></li>
						<li><?php esc_html_e('Instagram Compatible','timesnews'); ?></li>
						<li><?php esc_html_e('Unlimited Color','timesnews'); ?></li>
						<li><?php esc_html_e('Font Color','timesnews'); ?></li>
						<li><?php esc_html_e('Color Schemes','timesnews'); ?></li>
						<li><?php esc_html_e('Background Color','timesnews'); ?></li>
						<li><?php esc_html_e('Font Size','timesnews'); ?></li>
						<li><?php esc_html_e('Font Family','timesnews'); ?></li>
						<li><?php esc_html_e('Footer Column 1/2/3/4','timesnews'); ?></li>
						<li><?php esc_html_e('More Social Icons','timesnews'); ?></li>
						<li><?php esc_html_e('Change Featured Text in Sticky Post','timesnews'); ?></li>
						<li><?php esc_html_e('Standard Section','timesnews'); ?></li>
						<li><?php esc_html_e('Standard Section Column 3/4/5','timesnews'); ?></li>
					</ul>
			    </div><!-- .feature-content -->
			</article>
		</div>
		<div class="pro-content">
			<div class="pro-content-wrap">
				<div class="pro-content-header">
					<h3><?php esc_html_e('Powerful Pro Extension Features','timesnews');?></h3>
					<p><?php esc_html_e('Get unlimited features using Pro extension. Purchase TimesNews Pro extension and get additional features and advanced customization options to make your website look awesome in different styles. ','timesnews'); ?></p>
				</div>
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/free_vs_pro.png" alt="<?php esc_attr_e('Free vs Pro','timesnews');?>">
			</div>
		</div>
	</div>
</div>
<?php }