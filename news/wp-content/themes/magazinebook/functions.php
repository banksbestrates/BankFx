<?php
/**
 * MagazineBook functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MagazineBook
 */

if ( ! defined( 'MAGAZINEBOOK_VERSION' ) ) {
	// Theme version.
	$magazinebook_theme = wp_get_theme();
	define( 'MAGAZINEBOOK_VERSION', $magazinebook_theme->get( 'Version' ) );
}

if ( ! function_exists( 'magazinebook_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function magazinebook_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on MagazineBook, use a find and replace
		 * to change 'magazinebook' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'magazinebook', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'magazinebook' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'magazinebook_custom_background_args',
				array(
					'default-color' => 'f0f0f0',
					'default-image' => '',
				)
			)
		);

		// Define image sizes for theme.
		add_image_size( 'magazinebook-featured-image', 1020, 600, true );
		add_image_size( 'magazinebook-featured-image-medium', 501, 300, true );
		add_image_size( 'magazinebook-featured-image-small', 150, 120, true );

		// Adding excerpt option box for pages as well.
		add_post_type_support( 'page', 'excerpt' );

		// Add Yoast Breadcrumbs support.
		add_theme_support( 'yoast-seo-breadcrumbs' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add theme support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'magazinebook_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function magazinebook_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'magazinebook_content_width', 1020 );
}
add_action( 'after_setup_theme', 'magazinebook_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function magazinebook_scripts() {
	wp_enqueue_style( 'magazinebook-fonts', '//fonts.googleapis.com/css?family=Barlow+Semi+Condensed:600|Lora:400,500|Poppins:500&display=swap', array(), MAGAZINEBOOK_VERSION );
	wp_enqueue_style( 'bootstrap-4', get_template_directory_uri() . '/css/bootstrap.css', array(), '4.4.1', 'all' );
	wp_enqueue_style( 'fontawesome-5', get_template_directory_uri() . '/css/font-awesome.css', array(), '5.13.0', 'all' );
	wp_enqueue_style( 'splide-css', get_template_directory_uri() . '/css/splide.min.css', array(), '2.3.1', 'all' );
	wp_enqueue_style( 'magazinebook-style', get_stylesheet_uri(), array(), MAGAZINEBOOK_VERSION );

	wp_enqueue_script( 'magazinebook-navigation', get_template_directory_uri() . '/js/navigation.js', array(), MAGAZINEBOOK_VERSION, true );
	wp_enqueue_script( 'magazinebook-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), MAGAZINEBOOK_VERSION, true );
	wp_enqueue_script( 'magazinebook-news-ticker', get_template_directory_uri() . '/js/jquery.easy-ticker.js', array( 'jquery' ), '3.1.0', true );
	wp_enqueue_script( 'splide-js', get_template_directory_uri() . '/js/splide.min.js', array( 'jquery' ), '2.3.1', true );
	wp_enqueue_script( 'magazinebook-theme-js', get_template_directory_uri() . '/js/theme.js', array( 'jquery', 'magazinebook-news-ticker' ), MAGAZINEBOOK_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'magazinebook_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/header-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/footer-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/frontpage-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add new widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Calling in the admin area for the Welcome Page as well as for the new theme notice too.
 */
if ( is_admin() ) {
	require get_template_directory() . '/inc/admin/class-magazinebook-admin-dashboard.php';
	require get_template_directory() . '/inc/admin/class-magazinebook-admin-welcome-notice.php';
	require get_template_directory() . '/inc/admin/class-magazinebook-theme-review-notice.php';
}
