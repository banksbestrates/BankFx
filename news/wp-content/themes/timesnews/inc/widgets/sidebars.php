<?php
 /**
 * Register Sidebar area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package timesnews
 */
function timesnews_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'timesnews' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'timesnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Side Header Banner', 'timesnews' ),
		'id'            => 'header-banner',
		'description'   => esc_html__( 'This section will appear at right side of Site Title', 'timesnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Advertise Area', 'timesnews' ),
		'id'            => 'advertise-area',
		'description'   => esc_html__( 'This section will appear above the Header Section', 'timesnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'TimesNews Template Main Section', 'timesnews' ),
		'id'            => 'timesnews-template-main',
		'description'   => esc_html__( 'This section will appear when TimesNews Template is selected at Main Section', 'timesnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'TimesNews Template Primary Section', 'timesnews' ),
		'id'            => 'timesnews-template-primary',
		'description'   => esc_html__( 'This section will appear when TimesNews Template is selected at Primary Section', 'timesnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'TimesNews Template Secondary Section', 'timesnews' ),
		'id'            => 'timesnews-template-secondary',
		'description'   => esc_html__( 'This section will appear when TimesNews Template is selected at Secondary Section', 'timesnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_widget( 'TimesNews_posts' );
	register_widget( 'TimesNews_list_category_posts' );
	register_widget( 'TimesNews_category_slide' );
	register_widget( 'TimesNews_blog_category_posts' );
}
add_action( 'widgets_init', 'timesnews_widgets_init' );