<?php
/**
 * MagazineBook Widgets
 *
 * @package MagazineBook
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function magazinebook_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'magazinebook' ),
			'id'            => 'magazinebook_sidebar_1',
			'description'   => esc_html__( 'Add widgets here.', 'magazinebook' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Right', 'magazinebook' ),
			'id'            => 'magazinebook_header_right',
			'description'   => esc_html__( 'Add widget here to display in header.', 'magazinebook' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Front Page: Content Top Section', 'magazinebook' ),
			'id'            => 'magazinebook_frontpage_content_top_section',
			'description'   => esc_html__( 'Add widgets here to display posts just below the banner section. (This is a full width section without any sidebar.)', 'magazinebook' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Front Page: Content Middle Section', 'magazinebook' ),
			'id'            => 'magazinebook_frontpage_content_middle_section',
			'description'   => esc_html__( 'Add widgets here to display them along with sidebar.', 'magazinebook' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'magazinebook' ),
			'id'            => 'magazinebook_footer_widget_one',
			'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'magazinebook' ),
			'id'            => 'magazinebook_footer_widget_two',
			'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'magazinebook' ),
			'id'            => 'magazinebook_footer_widget_three',
			'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'magazinebook' ),
			'id'            => 'magazinebook_footer_widget_four',
			'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_widget( 'magazinebook_728x90_advertisement_widget' );
	register_widget( 'magazinebook_simple_featured_posts_widget' );
	register_widget( 'magazinebook_featured_posts_style_1_widget' );
	register_widget( 'magazinebook_featured_posts_style_2_widget' );
	register_widget( 'magazinebook_recent_posts_style_1_widget' );
}
add_action( 'widgets_init', 'magazinebook_widgets_init' );


/**
 * Add 728-90 adv widget.
 */
require get_template_directory() . '/inc/widgets/class-magazinebook-728x90-advertisement-widget.php';

/**
 * Add simple featured posts widget.
 */
require get_template_directory() . '/inc/widgets/class-magazinebook-simple-featured-posts-widget.php';

/**
 * Add featured posts style 1 widget.
 */
require get_template_directory() . '/inc/widgets/class-magazinebook-featured-posts-style-1-widget.php';

/**
 * Add featured posts style 2 widget.
 */
require get_template_directory() . '/inc/widgets/class-magazinebook-featured-posts-style-2-widget.php';

/**
 * Add recent posts style 1 widget.
 */
require get_template_directory() . '/inc/widgets/class-magazinebook-recent-posts-style-1-widget.php';

/**
 * Widget assets for image upload
 *
 * @return void
 */
function magazinebook_widget_assets() {
	wp_enqueue_script( 'media-upload' );
	wp_enqueue_script( 'mfc-media-upload', get_template_directory_uri() . '/js/media-upload.js', array( 'jquery' ), MAGAZINEBOOK_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'magazinebook_widget_assets' );
