<?php
/**
 * NewsDot Theme Customizer
 *
 * @package NewsDot
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function newsdot_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_control( 'background_color' )->section  = 'newsdot_general_options';
	$wp_customize->get_control( 'background_color' )->priority = 3;

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'newsdot_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'newsdot_customize_partial_blogdescription',
			)
		);
	}

	include get_template_directory() . '/inc/customizer/dropdown-category.php';
	include get_template_directory() . '/inc/customizer/divider-heading.php';
	include get_template_directory() . '/inc/customizer/theme-options.php';
}
add_action( 'customize_register', 'newsdot_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function newsdot_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function newsdot_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newsdot_customize_preview_js() {
	wp_enqueue_script( 'newsdot-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'newsdot_customize_preview_js' );

/**
 * Add Styles to the Customizer
 */
function newsdot_customizer_css()
{
	wp_enqueue_style( 'newsdot-customizer-css', get_template_directory_uri() . '/inc/customizer/customizer.css' );
}
add_action( 'customize_controls_print_styles', 'newsdot_customizer_css' );


/**
 * Custom CSS output for theme options
 */
function newsdot_custom_css_output() { ?>
	<style type="text/css" id="custom-theme-css">
		.custom-logo { height: <?php echo esc_attr( get_theme_mod( 'newsdot_logo_height', '60' ) ); ?>px; width: auto; }
		<?php if ( newsdot_is_header_bg_img() && get_theme_mod( 'newsdot_header_bg_image', get_template_directory_uri() . '/assets/images/header-bg.jpg' ) ) : ?>
			.site-header .nd-header-wrapper {
				background-image: url('<?php echo esc_url( get_theme_mod( 'newsdot_header_bg_image', get_template_directory_uri() . '/assets/images/header-bg.jpg' ) ); ?>');
			}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'newsdot_show_card_shadow', false ) ) : ?>
			.hentry, .nd-banner-part-wrap, .comments-area,
			#secondary.widget-area .widget, .error-404 .widget {
				border-width: 0px;
				border-radius: 0.25rem;
				box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
			}
			.hentry a.post-thumbnail img {
				border-radius: 0.25rem 0.25rem 0 0;
			}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'newsdot_font_family', 'default' ) === 'roboto' ) : ?>
			body, button, input, select, optgroup, textarea { font-family: 'Roboto', sans-serif; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'newsdot_font_family', 'default' ) === 'jost' ) : ?>
			body, button, input, select, optgroup, textarea { font-family: 'Jost', sans-serif; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'newsdot_font_family', 'default' ) === 'overpass' ) : ?>
			body, button, input, select, optgroup, textarea { font-family: 'Overpass', sans-serif; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'newsdot_font_family', 'default' ) === 'lato' ) : ?>
			body, button, input, select, optgroup, textarea { font-family: 'Lato', sans-serif; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'newsdot_reduce_boldness', false ) ) : ?>
			h1, h2, h3, h4, h5, h6,
			#secondary.widget-area .widget-title, #secondary.widget-area .widgettitle, .error-404 .widget-title, .error-404 .widgettitle,
			.nd-topbar-stories h5,
			.site-header .site-title,
			.hentry .cat-links,
			.nd-featured-posts-title,
			.footer-widgets-row .widget-title, .footer-widgets-row .widgettitle,
			.newsdot-content-widget-title .widget-title,
			.page-header .page-title, .page-header .title-404,
			.nd-post-body .summary-title, .nd-post-body .nd-similar-posts-title,
			#newsdot-banner .nd-banner-post-title, .nd-banner-title,
			.comments-area .comments-title, .comments-area .comment-reply-title,
			button, input[type="button"], input[type="reset"], input[type="submit"] { font-weight: 700; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'newsdot_no_uppercase', false ) ) : ?>
			.main-navigation a,
			#header-right .widget-title,
			.nd-topbar-stories h5, .hentry .cat-links,
			.nd-featured-posts-title, .newsdot-content-widget-title .widget-title,
			.footer-widgets-row .widget-title, .footer-widgets-row .widgettitle,
			.page-header .page-title, .page-header .title-404,
			.nd-post-body .summary-title, .nd-post-body .nd-similar-posts-title,
			.nd-banner-title,
			.comments-area .comments-title, .comments-area .comment-reply-title,
			#secondary.widget-area .widget-title, #secondary.widget-area .widgettitle, .error-404 .widget-title, .error-404 .widgettitle {
				text-transform: none;
			}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'newsdot_primary_color', 'default' ) === 'indigo' ) : ?>
			a:hover, a:focus, a:active {
				color: #4C51BF;
			}
			a,
			#secondary.widget-area .widget a:hover, .error-404 .widget a:hover,
			.site-header .site-title a:hover,
			.site-header.nd-header-bg-dark .site-title a:hover,
			.site-header.nd-header-bg-image .nd-header-wrapper.ng-header-overlay-dark .site-title a:hover,
			.hentry .entry-title a:hover,
			.nd-similar-posts-in-single ul a:hover,
			.nd-single-post-nav a:hover,
			#newsdot-banner .nd-banner-post-title a:hover {
				color: #5A67D8;
			}
			.main-navbar, .main-navigation ul ul,
			.post.sticky .nd-post-body:after {
				background-color: #5A67D8;
			}
			.main-navigation a:hover, .main-navigation a:focus,
			.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .main-navigation .current-menu-ancestor > a,
			.main-navigation li.highlight-this-menu-item a:hover, .main-navigation li.highlight-this-menu-item a:focus {
				background-color: #4C51BF;
			}
			.post.sticky .nd-post-body:after {
				border-color: #4C51BF;
			}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'newsdot_primary_color', 'default' ) === 'teal' ) : ?>
			a:hover, a:focus, a:active {
				color: #2C7A7B;
			}
			a,
			#secondary.widget-area .widget a:hover, .error-404 .widget a:hover,
			.site-header .site-title a:hover,
			.site-header.nd-header-bg-dark .site-title a:hover,
			.site-header.nd-header-bg-image .nd-header-wrapper.ng-header-overlay-dark .site-title a:hover,
			.hentry .entry-title a:hover,
			.nd-similar-posts-in-single ul a:hover,
			.nd-single-post-nav a:hover,
			#newsdot-banner .nd-banner-post-title a:hover {
				color: #319795;
			}
			.main-navbar, .main-navigation ul ul,
			.post.sticky .nd-post-body:after {
				background-color: #319795;
			}
			.main-navigation a:hover, .main-navigation a:focus,
			.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .main-navigation .current-menu-ancestor > a,
			.main-navigation li.highlight-this-menu-item a:hover, .main-navigation li.highlight-this-menu-item a:focus {
				background-color: #2C7A7B;
			}
			.post.sticky .nd-post-body:after {
				border-color: #2C7A7B;
			}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'newsdot_primary_color', 'default' ) === 'pink' ) : ?>
			a:hover, a:focus, a:active {
				color: #B83280;
			}
			a,
			#secondary.widget-area .widget a:hover, .error-404 .widget a:hover,
			.site-header .site-title a:hover,
			.site-header.nd-header-bg-dark .site-title a:hover,
			.site-header.nd-header-bg-image .nd-header-wrapper.ng-header-overlay-dark .site-title a:hover,
			.hentry .entry-title a:hover,
			.nd-similar-posts-in-single ul a:hover,
			.nd-single-post-nav a:hover,
			#newsdot-banner .nd-banner-post-title a:hover {
				color: #D53F8C;
			}
			.main-navbar, .main-navigation ul ul,
			.post.sticky .nd-post-body:after {
				background-color: #D53F8C;
			}
			.main-navigation a:hover, .main-navigation a:focus,
			.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .main-navigation .current-menu-ancestor > a,
			.main-navigation li.highlight-this-menu-item a:hover, .main-navigation li.highlight-this-menu-item a:focus {
				background-color: #B83280;
			}
			.post.sticky .nd-post-body:after {
				border-color: #B83280;
			}
		<?php endif; ?>
	</style>
	<?php
}
add_action( 'wp_head', 'newsdot_custom_css_output');


/**
 * Check in topbar active
 */
function newsdot_is_topbar_active() {
	return get_theme_mod( 'newsdot_show_topbar', false );
}


/**
 * Check if header background is image
 */
function newsdot_is_header_bg_img() {
	if ( get_theme_mod( 'newsdot_primary_header_bg', 'light' ) === 'image' ) {
		return true;
	}
	return false;
}
