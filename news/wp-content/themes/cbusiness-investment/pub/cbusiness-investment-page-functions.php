<?php
if ( ! isset( $content_width ) ) $content_width = 900;

add_action( 'admin_menu', 'cbusiness_investment_pros');
function cbusiness_investment_pros() {    	
	add_theme_page( esc_html__('CBusiness Investment Details', 'cbusiness-investment'), esc_html__('CBusiness Investment Details', 'cbusiness-investment'), 'edit_theme_options', 'cbusiness_investment_pro', 'cbusiness_investment_pro_details');   
} 

function cbusiness_investment_pro_details() { 	
?>
<div class="wrap">
	<h1><?php esc_html_e( 'CBusiness Investment', 'cbusiness-investment' ); ?></h1>
	
		<div>
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/view/images/innerbanner.jpg" alt="<?php bloginfo('name'); ?>" style=" width: 100%;"> 
		</div>
	
	<p><strong> <?php esc_html_e( 'Description: ', 'cbusiness-investment' ); ?></strong><?php esc_html_e( 'CBusiness Investment Pro WordPress theme is used for all type of corporate business. That Multipurpose Theme covers many Business includes various market areas like corporate business, Marketing, Finance, Stock Market, Investment business, IT infrastructure, Consultant, Manufacture plant, Services, Retailer, Wholesaler, Online business, Insurance, SIP, Mutual Fund, Services, Marketing, Finance, Stock Market, Nifty, Store business, IT Firm, Retailers, Education, Shopping, E-commerce, Gift Service market, Beauty, Fashion, Blogger, News, Portfolio, and all types of business.', 'cbusiness-investment' ); ?></p>
<a class="button button-primary button-large" href="<?php echo esc_url( CBUSINESS_INVESTMENT_THEMEURL ); ?>" target="_blank"><?php esc_html_e('Theme Url', 'cbusiness-investment'); ?></a>	
<a class="button button-primary button-large" href="<?php echo esc_url( CBUSINESS_INVESTMENT_PROURL ); ?>" target="_blank"><?php esc_html_e('Pro Theme Url', 'cbusiness-investment'); ?></a>
<a class="button button-primary button-large" href="<?php echo esc_url( CBUSINESS_INVESTMENT_PURCHASEURL ); ?>" target="_blank"><?php esc_html_e('Click To Purchase', 'cbusiness-investment'); ?></a>
<a class="button button-primary button-large" href="<?php echo esc_url( CBUSINESS_INVESTMENT_PURCHASEURL ); ?>" target="_blank"><?php esc_html_e('Price: $29 Only', 'cbusiness-investment'); ?></a>
<a class="button button-primary button-large" href="<?php echo esc_url( CBUSINESS_INVESTMENT_DOCURL ); ?>" target="_blank"><?php esc_html_e('Documentation', 'cbusiness-investment'); ?></a>
<a class="button button-primary button-large" href="<?php echo esc_url( CBUSINESS_INVESTMENT_DEMOURL ); ?>" target="_blank"><?php esc_html_e('View Demo', 'cbusiness-investment'); ?></a>
<a class="button button-primary button-large" href="<?php echo esc_url( CBUSINESS_INVESTMENT_SUPPORTURL ); ?>" target="_blank"><?php esc_html_e('Support', 'cbusiness-investment'); ?></a>
 </div> 
</div>
<?php }?>
<?php
add_action('customize_register', 'cbusiness_investment_customize_register');
define('CBUSINESS_INVESTMENT_PROURL', 'https://www.themescave.com/themes/wordpress-cbusiness-investment-pro-business/');
define('CBUSINESS_INVESTMENT_THEMEURL', 'https://www.themescave.com/themes/wordpress-theme-finance-free-cbusiness-investment/');
define('CBUSINESS_INVESTMENT_DOCURL', 'https://www.themescave.com/documentation/cbusiness-investment-pro');
define('CBUSINESS_INVESTMENT_DEMOURL', 'https://www.themescave.com/demo/cbusiness-investment-pro');
define('CBUSINESS_INVESTMENT_SUPPORTURL', 'https://www.themescave.com/forums/forum/cbusiness-investment-pro/');
define('CBUSINESS_INVESTMENT_PURCHASEURL', 'https://www.themescave.com/themes/?add-to-cart=3163');
?>