<?php
/**
 * Seos  Magazine functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Seos__Magazine
 */

if ( ! function_exists( 'seos_magazine_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function seos_magazine_setup() {
	load_theme_textdomain( 'seos-magazine', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );	
	add_editor_style( get_template_directory_uri() . '/style.css' );
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'seos-magazine' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	add_theme_support( 'custom-background', apply_filters( 'seos_magazine_custom_background_args', array(
		'default-color' => '555555',
		'default-image' => '',
	) ) );
}
endif; // seos_magazine_setup
add_action( 'after_setup_theme', 'seos_magazine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function seos_magazine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'seos_magazine_content_width', 640 );
}
add_action( 'after_setup_theme', 'seos_magazine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function seos_magazine_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'seos-magazine' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'seos_magazine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function seos_magazine_scripts() {

	wp_enqueue_script( 'seos-magazine-magazine-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'seos-magazine-magazine-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_style( 'seos-magazine-dashicons-style', get_stylesheet_uri(), array('dashicons'), '1.0' );
	
	wp_enqueue_style( 'seos-magazine-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	
	wp_enqueue_style( 'seos-magazine-font-oswald', '//fonts.googleapis.com/css?family=Oswald:400,300,700', false, 1.0, 'screen' );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'seos_magazine_scripts' );

function seos_magazine_admin_scripts() {
	wp_enqueue_style( 'seos-magazine-fontawesome', get_template_directory_uri() . '/css/admin.css' );
	
}
add_action( 'admin_enqueue_scripts', 'seos_magazine_admin_scripts' );	

	require get_template_directory() . '/inc/custom-header.php';
	require get_template_directory() . '/inc/template-tags.php';
	require get_template_directory() . '/inc/extras.php';
	require get_template_directory() . '/inc/customizer.php';
	require get_template_directory() . '/inc/jetpack.php';
	require get_template_directory() . '/inc/premium-options.php';
	require get_template_directory() . '/inc/kirki/kirki.php' ;
	require get_template_directory() . '/inc/customize-kirki.php' ;	
	require get_template_directory() . '/inc/customize-demo.php' ;	
	
/*********************************************************************************************************
* Search Form
**********************************************************************************************************/

		function seos_magazine_search_form( $form ) {
			$form = '<form role="search" method="get" class="search-form" action="' . esc_url(home_url( '/' )) . '" >
			<div><label class="screen-reader-text" for="s">' . __( 'Search', 'seos-magazine') . '</label>
			<input type="search" class="search-field" placeholder="'. esc_attr_x( 'Search ...', '', 'seos-magazine' ) . '" value="' . get_search_query() . '" name="s" id="s" />
			<input type="submit" class="search-submit" value="'. esc_attr__( 'GO', 'seos-magazine' ) .'" />
			</div>
			</form>';
			return $form;
		}

		add_filter( 'get_search_form', 'seos_magazine_search_form' );
	
/*********************************************************************************************************
* Pagination. 
**********************************************************************************************************/

		add_filter('wp_link_pages_args','seos_magazine_add_next_and_number');

		function seos_magazine_add_next_and_number($args){
			if($args['next_or_number'] == 'next_and_number'){
				global $page, $numpages, $multipage, $more, $pagenow;
				$args['next_or_number'] = 'number';
				$prev = '';
				$next = '';
				if ( $multipage ) {
					if ( $more ) {
						$i = $page - 1;
						if ( $i && $more ) {
							$prev .= _wp_link_page($i);
							$prev .= $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>';
						}
						$i = $page + 1;
						if ( $i <= $numpages && $more ) {
							$next .= _wp_link_page($i);
							$next .= $args['link_before']. $args['nextpagelink'] . $args['link_after'] . '</a>';
						}
					}
				}
				$args['before'] = $args['before'].$prev;
				$args['after'] = $next.$args['after'];    
			}
			return $args;
		}

/***********************************************************************************
 * Seos Magazine How To Use
***********************************************************************************/

		function seos_magazine_support($wp_customize){
			class Seos_Magazine_Customize extends WP_Customize_Control {
				public function render_content() { ?>
				<div class="seos-magazine-info"> 
					<div class="button media-button button-primary button-large media-button-select">
						<a style="color: #fff;" href="<?php echo esc_url( 'http://seosthemes.info/seos-magazine-free-wordpress-theme/' ); ?>" title="<?php esc_attr_e( 'Seos Magazine Demo', 'seos-magazine' ); ?>" target="_blank">
						<?php _e( 'Premium Demo', 'seos-magazine' ); ?>
						</a>
					</div>
				</div>
				<?php
				}
			}
		}
		add_action('customize_register', 'seos_magazine_support');

		function seos_magazine_customize_styles( $input ) { ?>
			<style type="text/css">
				#customize-theme-controls #accordion-section-seos_magazine_buy_section .accordion-section-title,
				#customize-theme-controls #accordion-section-seos_magazine_buy_section > .accordion-section-title {
					background: #555555;
					color: #FFFFFF;
				}

				.seos-magazine-info button a {
					color: #FFFFFF;
				}	
			</style>
		<?php }
		
		add_action( 'customize_controls_print_styles', 'seos_magazine_customize_styles');

		if ( ! function_exists( 'seos_magazine_buy' ) ) :
			function seos_magazine_buy( $wp_customize ) {
			$wp_customize->add_section( 'seos_magazine_buy_section', array(
				'title'			=> __('Premium Demo', 'seos-magazine'),
				'description'	=> __('	Learn more about Seos Magazine Premium. ','seos-magazine'),
				'priority'		=> 1,
			));
			$wp_customize->add_setting( 'seos_magazine_setting', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new Seos_Magazine_Customize(
					$wp_customize,'seos_magazine_setting', array(
						'label'		=> __('Buy Premium', 'seos-magazine'),
						'section'	=> 'seos_magazine_buy_section',
						'settings'	=> 'seos_magazine_setting',
					)
				)
			);
		}
		endif;
		 
		add_action('customize_register', 'seos_magazine_buy');	
