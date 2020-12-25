<?php
 /**
 * Enqueue scripts and styles.
 *
 * @package timesnews
 */

function timesnews_scripts() {
	$select_main_banner_category = get_theme_mod('select_main_banner_category','');
	$slider_options = get_theme_mod('slider-options','main-banner');
	$disable_main_banner = get_theme_mod('disable_main_banner',0);
	$enable_sticky_menu = get_theme_mod('enable_sticky_menu',1);
	$second_design_display = get_theme_mod('second-design-display','default');
	wp_enqueue_style( 'timesnews-style', get_stylesheet_uri() );

	if ($second_design_display == 'second'){

		wp_enqueue_style( 'timesnews-blue-style', get_template_directory_uri() . '/assets/css/blue-color.css' );

	}

	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/library/fontawesome/css/all.min.css' );

	wp_enqueue_style( 'timesnews-google-fonts', timesnews_fonts_url(), array(), null );

	wp_enqueue_script('timesnews-global', get_template_directory_uri().'/assets/js/global.js', array('jquery'), true, false);

	wp_enqueue_script( 'timesnews-navigation', get_template_directory_uri() . '/assets/js/navigation.min.js', array(), false, true );

	wp_enqueue_script( 'timesnews-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), false, true );

	wp_enqueue_script( 'ResizeSensor', get_template_directory_uri() . '/assets/library/sticky-sidebar/ResizeSensor.min.js', array(), false, true );

	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/library/sticky-sidebar/theia-sticky-sidebar.min.js', array(), false, true );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/library/slick/slick.min.js', array(), false, true );

	wp_enqueue_script( 'timesnews-slick-settings', get_template_directory_uri() . '/assets/library/slick/slick-settings.js', array(), false, true );

	if($enable_sticky_menu ==1 ){
		wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/assets/library/sticky/jquery.sticky.js', array(), false, true );
		wp_enqueue_script( 'timesnews-sticky-settings', get_template_directory_uri() . '/assets/library/sticky/sticky-setting.js', array(), false, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'marquee', get_template_directory_uri() . '/assets/library/marquee/jquery.marquee.min.js', array(), false, true );

	wp_enqueue_script( 'timesnews-marquee-settings', get_template_directory_uri() . '/assets/library/marquee/marquee-settings.js', array(), false, true );
}

add_action( 'wp_enqueue_scripts', 'timesnews_scripts' );

function timesnews_admin_notice (){

  wp_enqueue_style( 'timesnews-admin-css', get_template_directory_uri() . '/css/admin/admin.css' );

}

add_action( 'admin_enqueue_scripts', 'timesnews_admin_notice' );

if ( ! function_exists( 'timesnews_fonts_url' ) ) :
/**
 * Register Google fonts for TimesNews.
 *
 * Create your own timesnews_fonts_url() function to override in a child theme.
 *
 *
 * @return string Google fonts URL for the theme.
 */
function timesnews_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Play, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Play font: on or off', 'timesnews' ) ) {
		$fonts[] = 'Play:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'timesnews' ) ) {
		$fonts[] = 'Lato:400,400i,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => esc_attr( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

// Dynamic Category Color
if ( ! function_exists( 'timesnews_timesnews_category_colors' ) ) :
	function timesnews_category_colors(){
		$categories_list =get_terms( 'category' );

		$output_css='';

		foreach ( $categories_list as $category_data ) {

			 $cat_data = get_theme_mod('cat_col_'.esc_html( strtolower( $category_data->name ) ) );

			 $cat_id = $category_data->term_id;
			 ?>
			 <?php if( $cat_data != '' ){

				 	$output_css .= '.cat-links .category-color-'.absint($cat_id).'{

						border-color:'.esc_attr($cat_data).';'.'

					}
					.secondary-menu .category-color-'.absint($cat_id). ' > a:hover:after,
					.secondary-menu .category-color-'.absint($cat_id). ' > a:focus:after,
					.secondary-menu > li.current-menu-item.category-color-'.absint($cat_id). ' > a:after, 
					.secondary-menu > li.current_page_item.category-color-'.absint($cat_id). ' > a:after, 
					.secondary-menu > li.current-menu-ancestor.category-color-1 > a:after {
						border-bottom-color:'.esc_attr($cat_data).';'.'

					}';
				}
		}
	wp_add_inline_style( 'timesnews-style', $output_css );
	}
	add_action( 'wp_enqueue_scripts', 'timesnews_category_colors', 10 );
endif;