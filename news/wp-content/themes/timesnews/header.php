<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package timesnews
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php 
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'timesnews' ); ?></a>
	<?php
	if ( has_header_image() ) {
		/**
		* Header Image
		*/
		do_action ('timesnews_frontend_header_image');
	}

	if ( ( is_front_page() && is_home() ) || is_front_page() ) {
		// Default homepage
		if ( is_active_sidebar( 'advertise-area' ) ) { ?>
			<div class="advertise-area">
				<div class="wrap">

					<?php dynamic_sidebar( 'advertise-area' ); ?>

				</div><!-- .wrap -->
			</div><!-- .advertise-area -->

		<?php }
	} ?>

	<?php
		$disable_search_form = get_theme_mod('disable_search_form',0);
		$disable_flash_news = get_theme_mod('disable_flash_news',0);
		$upload_header_brand = get_theme_mod ('upload_header_brand','');
	?>

	<header id="masthead" class="site-header">
		<div id="main-header" class="main-header">
			<div class="navigation-top">
        		<div class="wrap">
            	<div id="site-header-menu" class="site-header-menu">
               	<nav class="main-navigation" aria-label="<?php esc_attr_e('Primary Menu','timesnews'); ?>" role="navigation">
							<?php
								/**
								 * Top Navigation
								 */
								do_action('timesnews_frontend_navigation_top'); 
							?>
						 </nav><!-- #site-navigation -->
						 <?php if($disable_search_form ==0) { ?>
									<button type="button" class="search-toggle"><span><span class="screen-reader-text"><?php esc_html_e('Search for:','timesnews'); ?></span></span></button>
								<?php } ?>
           		</div>
        		</div><!-- .wrap -->
			</div><!-- .navigation-top -->
			<?php
     			if ( $disable_search_form == 0 ){
					/**
					* Search Form
					*/
					do_action('timesnews_frontend_search_form');

				} ?>

			<div class="main-header-brand">
				<?php if( ( has_nav_menu( 'menu-3' ) ) || (  has_nav_menu('menu-2') ) ) { ?>
					<div class="secondary-nav-wrap">
						<div class="wrap">
							<?php

							if( has_nav_menu( 'menu-3' ) ){
								/**
								 * Secondary Navigation
								 */
								do_action('timesnews_frontend_secondary_navigation');

							}

							if(has_nav_menu('menu-2')){ ?>
								<div class="header-social-menu">

									<?php
										/**
										 * Social navigation
										 */
										do_action ('timesnews_frontend_social_navigation');
									?>

								</div><!-- .header-social-menu -->
							<?php } ?>
						</div><!-- .wrap -->
					</div><!-- .secondary-nav-wrap -->
				<?php } ?>

				<div class="header-brand" <?php if (!empty($upload_header_brand)){ ?> style="background-image: url('<?php echo esc_url ($upload_header_brand); ?>');"<?php } ?>>
					<div class="wrap">
						<div class="header-brand-content">
							<?php 

								/**
								 * Site Branding
								 */
								do_action ('timesnews_frontend_site_branding');
							?>

							<div class="header-right">
								<div class="header-banner">

									<?php if ( is_active_sidebar( 'header-banner' ) ) {

										dynamic_sidebar( 'header-banner' );

									} ?>
								</div><!-- .header-banner -->
							</div><!-- .header-right -->
						</div><!-- .header-brand-content -->
					</div><!-- .wrap -->
				</div><!-- .header-brand -->

				<div id="nav-sticker">
					<div class="navigation-top">
						<div class="wrap">
							<div id="site-header-menu" class="site-header-menu">
								<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e('Primary Menu','timesnews'); ?>">
								<?php

									/**
									 * Top Navigation
									 */
									do_action('timesnews_frontend_navigation_top');

								?>
								</nav><!-- #site-navigation -->
	            			<?php if($disable_search_form ==0) { ?>
									<button type="button" class="search-toggle"><span><span class="screen-reader-text"><?php esc_html_e('Search for:','timesnews'); ?></span></span></button>
								<?php } ?>
							</div>
        				</div><!-- .wrap -->
     				</div><!-- .navigation-top -->
     			</div><!-- #nav-sticker -->
     			<?php
     			if ( $disable_search_form == 0 ){
					/**
					* Search Form
					*/
					do_action('timesnews_frontend_search_form');

				}

				if ($disable_flash_news ==0 ) { ?>
					<div class="flash-news-holder">
						<div class="wrap">
							<div class="top-header">
								<div class="top-header-inner">
									<?php
										/**
										* Flash News
										*/
										do_action('timesnews_frontend_flash_news');
									?>
								</div><!-- .top-header-inner -->
							</div><!-- .top-header -->

							<div class="clock">
								<div id="date"><?php echo date_i18n(__('l, F d, Y','timesnews')); ?></div>
								<div id="time"></div>
							</div>
						</div><!-- .wrap -->
					</div><!-- .flash-news-holder -->
				<?php }

				if ( ( is_front_page() && is_home() ) || is_front_page() ) {

					/**
					* Attention Zone section
					*/
					do_action('timesnews_frontend_attention_zone');

				}

				?>

			</div><!-- .main-header-brand -->
		</div><!-- .main-header -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="site-content-cell">