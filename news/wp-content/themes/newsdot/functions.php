<?php
/**
 * NewsDot functions and definitions
 */

if ( ! defined( 'NEWSDOT_VERSION' ) ) {
	$newsdot_theme = wp_get_theme();
	define( 'NEWSDOT_VERSION', $newsdot_theme->get( 'Version' ) );
}

if ( ! function_exists( 'newsdot_setup' ) ) :
	function newsdot_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'newsdot', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Add thumbnail sizes for optimized images
		add_image_size( 'newsdot-wide-image', 400, 260, true );
		add_image_size( 'newsdot-medium-image', 800, 520, true );
		add_image_size( 'newsdot-small-image', 180, 120, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'newsdot' ),
			)
		);

		// Switch default core markup to output valid HTML5.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'newsdot_custom_background_args',
				array(
					'default-color' => 'F7FAFC',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add theme support for responsive embeds
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'newsdot_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function newsdot_content_width() {
	// This variable is intended to be overruled from themes.
	$GLOBALS['content_width'] = apply_filters( 'newsdot_content_width', 780 );
}
add_action( 'after_setup_theme', 'newsdot_content_width', 0 );



/**
 * Register widget area.
 */
function newsdot_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'newsdot' ),
			'id'            => 'newsdot-sidebar-main',
			'description'   => esc_html__( 'Add widgets here for sidebar.', 'newsdot' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title"><span>',
			'after_title'   => '</span></h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Right', 'newsdot' ),
			'id'            => 'newsdot-header-right',
			'description'   => esc_html__( 'Add widgets here to display in main header.', 'newsdot' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Front Page Content Section', 'newsdot' ),
			'id'            => 'newsdot_frontpage_content_section',
			'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title"><span>',
			'after_title'   => '</span></h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 1', 'newsdot' ),
			'id'            => 'newsdot_footer_widget_1',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 2', 'newsdot' ),
			'id'            => 'newsdot_footer_widget_2',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 3', 'newsdot' ),
			'id'            => 'newsdot_footer_widget_3',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 4', 'newsdot' ),
			'id'            => 'newsdot_footer_widget_4',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);

	register_widget("newsdot_post_cards");
	register_widget("newsdot_horizontal_vertical_posts");
}
add_action( 'widgets_init', 'newsdot_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function newsdot_scripts() {
	wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.css', array(), 'v4.4.1', 'all' );
	if ( get_theme_mod( 'newsdot_font_family', 'default' ) === 'roboto' ) {
		wp_enqueue_style( 'roboto', '//fonts.googleapis.com/css?family=Roboto:400,400i,500,700,700i,900,900i&display=swap' );
	}
	if ( get_theme_mod( 'newsdot_font_family', 'default' ) === 'jost' ) {
		wp_enqueue_style( 'jost', '//fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,500;0,700;0,900;1,400;1,700;1,900&display=swap' );
	}
	if ( get_theme_mod( 'newsdot_font_family', 'default' ) === 'overpass' ) {
		wp_enqueue_style( 'overpass', '//fonts.googleapis.com/css2?family=Overpass:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap' );
	}
	if ( get_theme_mod( 'newsdot_font_family', 'default' ) === 'lato' ) {
		wp_enqueue_style( 'lato', '//fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap' );
	}
	wp_enqueue_style( 'owl-carousel-2', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), 'v2.3.4', 'all' );
	wp_enqueue_style( 'owl-carousel-2-default', get_template_directory_uri() . '/assets/css/owl.theme.default.css', array(), 'v2.3.4', 'all' );
	wp_enqueue_style( 'newsdot-style', get_stylesheet_uri(), array(), NEWSDOT_VERSION );
	wp_style_add_data( 'newsdot-style', 'rtl', 'replace' );

	wp_enqueue_script( 'newsdot-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), NEWSDOT_VERSION, true );
	wp_enqueue_script( 'newsdot-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), NEWSDOT_VERSION, true );
	wp_enqueue_script( 'owl-carousel-2', get_template_directory_uri() . '/assets/js/owl.carousel.js', array( 'jquery' ), 'v2.3.4', true );
	wp_enqueue_script( 'newsdot-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), NEWSDOT_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'newsdot_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add Widgets.
 */
require get_template_directory() . '/inc/newsdot-widgets.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
