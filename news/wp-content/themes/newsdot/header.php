<?php
/**
 * The header for our theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'newsdot' ); ?></a>

	<?php newsdot_topbar_section(); ?>

	<!--==================== MAIN HEADER ====================-->
	<header id="masthead" class="site-header nd-header-bg-<?php echo esc_attr( get_theme_mod( 'newsdot_primary_header_bg', 'light' ) ); ?>">
		<div class="nd-header-wrapper ng-header-overlay-<?php echo esc_attr( get_theme_mod( 'newsdot_primary_header_overlay', 'dark' ) ); ?>">
			<div class="container">
				<div class="row align-items-center main-header-row">
					<div class="col-md-4">
						<div class="site-branding">
						<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$newsdot_description = get_bloginfo( 'description', 'display' );
						if ( $newsdot_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $newsdot_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<?php endif; ?>
						</div><!-- .site-branding -->
					</div>

					<div class="col-md-8 text-right">
						<!-- TODO: Create a custom widget for advertisement -->
						<aside id="header-right" class="header-right-widget-area">
							<?php dynamic_sidebar( 'newsdot-header-right' ); ?>
						</aside>
					</div>
				</div>
			</div>
		</div>

		<div class="main-navbar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'newsdot' ); ?></button>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
						</nav><!-- #site-navigation -->
					</div>
				</div>
			</div>
		</div>
	</header>
