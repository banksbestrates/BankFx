<?php if( ! defined( 'ABSPATH' ) ) exit;
/**
 * Update Kirki Path's
 *
 * @since 1.2.0
 */
function seos_magazine_configuration() {
    return array( 'url_path'     => get_stylesheet_directory_uri() . '/inc/kirki/' );
}
add_filter( 'kirki/config', 'seos_magazine_configuration' );


Kirki::add_panel( 'seos_magazine_panel', array(
    'priority'    => 1,
    'title'       => __( 'Free Options', 'seos-magazine' ),
    'description' => __( 'Free Kirki Options', 'seos-magazine' ),
) );

/***********************************************
Custom CSS
************************************************/

Kirki::add_section( 'seos_magazine_kirki_section', array(
    'title'          => __( 'Custom CSS', 'seos-magazine' ),
    'description'    => __( 'Add custom CSS here', 'seos-magazine' ),
    'panel'          => 'seos_magazine_panel', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'seos_magazine_kirki_css', array(
	'capability'	=> 'edit_theme_options'
) );
	
Kirki::add_field( 'seos_magazine_kirki_css', array(
	'type'        => 'code',
	'settings'    => 'seos_magazine_kirki_css',
	'label'       => __( 'Code Control', 'seos-magazine' ),
	'section'     => 'seos_magazine_kirki_section',
	'default'     => '',
	'priority'    => 1,
	'choices'     => array(
		'language' => 'css',
		'theme'    => 'monokai',
		'height'   => 250,
	),
) );


/***********************************************
Disable All Comments
************************************************/

Kirki::add_section( 'seos_magazine_kirki_section1', array(
    'title'          => __( 'Disable All Comments', 'seos-magazine' ),
    'panel'          => 'seos_magazine_panel', // Not typically needed.
    'priority'       => 2,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'seos_magazine_setting1', array(
	'capability'	=> 'edit_theme_options'
) );
	
Kirki::add_field( 'seos_magazine_setting1', array(
	'type'        => 'switch',
	'settings'    => 'seos_magazine_setting1',
	'label'       => __( 'Hide All Comments', 'seos-magazine' ),
	'section'     => 'seos_magazine_kirki_section1',
	'default'     => '',
	'priority'    => 2,
	'choices'     => array(
		'on'  => esc_attr__( 'on', 'seos-magazine' ),
		'off' => esc_attr__( 'off', 'seos-magazine' ),
	),
) );

Kirki::add_config( 'seos_magazine_setting2', array(
	'capability'	=> 'edit_theme_options'
) );


Kirki::add_field( 'seos_magazine_setting2', array(
	'type'        => 'switch',
	'settings'    => 'seos_magazine_setting2',
	'label'       => __( 'Hide existing comments', 'seos-magazine' ),
	'section'     => 'seos_magazine_kirki_section1',
	'default'     => '',
	'priority'    => 2,
	'choices'     => array(
		'on'  => esc_attr__( 'on', 'seos-magazine' ),
		'off' => esc_attr__( 'off', 'seos-magazine' ),
	),
) );

Kirki::add_config( 'seos_magazine_setting3', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'seos_magazine_setting3', array(
	'type'        => 'switch',
	'settings'    => 'seos_magazine_setting3',
	'label'       => __( 'Remove comments page from the menu', 'seos-magazine' ),
	'section'     => 'seos_magazine_kirki_section1',
	'default'     => '',
	'priority'    => 2,
	'choices'     => array(
		'on'  => esc_attr__( 'on', 'seos-magazine' ),
		'off' => esc_attr__( 'off', 'seos-magazine' ),
	),
) );


/***********************************************
All Google Fonts
************************************************/
Kirki::add_section( 'seos_magazine_kirki_section4', array(
    'title'          => __( 'All Google Fonts', 'seos-magazine' ),
    'description'    => __( 'Copy and Paste the Font Name','seos-magazine' ),
    'panel'          => 'seos_magazine_panel', // Not typically needed.
    'priority'       => 3,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'seos_magazine_google_font_h7', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'seos_magazine_google_font_h7', array(
	'type'     => 'text',
	'settings' => 'seos_magazine_google_font_h7',
	'label'    => __( 'Site Title', 'seos-magazine' ). ' <a target="_blank" href="https://fonts.google.com/">Copy the font name</a>',
	'section'  => 'seos_magazine_kirki_section4',
	'priority' => 1,
) );


Kirki::add_config( 'seos_magazine_google_font_h1', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'seos_magazine_google_font_h1', array(
	'type'     => 'text',
	'settings' => 'seos_magazine_google_font_h1',
	'label'    => __( 'H1 Element', 'seos-magazine' ) . ' <a target="_blank" href="https://fonts.google.com/">Copy the font name</a>',
	'section'  => 'seos_magazine_kirki_section4',
	'priority' => 1,
) );

Kirki::add_config( 'seos_magazine_google_font_h2', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'seos_magazine_google_font_h2', array(
	'type'     => 'text',
	'settings' => 'seos_magazine_google_font_h2',
	'label'    => __( 'H2 Element', 'seos-magazine' ). ' <a target="_blank" href="https://fonts.google.com/">Copy the font name</a>',
	'section'  => 'seos_magazine_kirki_section4',
	'priority' => 2,
) );

Kirki::add_config( 'seos_magazine_google_font_h3', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'seos_magazine_google_font_h3', array(
	'type'     => 'text',
	'settings' => 'seos_magazine_google_font_h3',
	'label'    => __( 'H3 Element', 'seos-magazine' ). ' <a target="_blank" href="https://fonts.google.com/">Copy the font name</a>',
	'section'  => 'seos_magazine_kirki_section4',
	'priority' => 3,
) );

Kirki::add_config( 'seos_magazine_google_font_h4', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'seos_magazine_google_font_h4', array(
	'type'     => 'text',
	'settings' => 'seos_magazine_google_font_h4',
	'label'    => __( 'H4 Element', 'seos-magazine' ). ' <a target="_blank" href="https://fonts.google.com/">Copy the font name</a>',
	'section'  => 'seos_magazine_kirki_section4',
	'priority' => 4,
) );

Kirki::add_config( 'seos_magazine_google_font_h5', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'seos_magazine_google_font_h5', array(
	'type'     => 'text',
	'settings' => 'seos_magazine_google_font_h5',
	'label'    => __( 'H5 Element', 'seos-magazine' ). ' <a target="_blank" href="https://fonts.google.com/">Copy the font name</a>',
	'section'  => 'seos_magazine_kirki_section4',
	'priority' => 5,
) );

Kirki::add_config( 'seos_magazine_google_font_h6', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'seos_magazine_google_font_h6', array(
	'type'     => 'text',
	'settings' => 'seos_magazine_google_font_h6',
	'label'    => __( 'H6 Element', 'seos-magazine' ). ' <a target="_blank" href="https://fonts.google.com/">Copy the font name</a>',
	'section'  => 'seos_magazine_kirki_section4',
	'priority' => 6,
) );

/***********************************************
Mobile Call Now
************************************************/

Kirki::add_section( 'seos_magazine_kirki_section5', array(
    'title'          => __( 'Mobile Call Now', 'seos-magazine' ),
    'description'    => __( 'Mobile Call Now option places a Call Now button to the bottom of the screen which is only visible for your mobile visitors.', 'seos-magazine' ),
    'panel'          => 'seos_magazine_panel', // Not typically needed.
    'priority'       => 3,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'seos_magazine_phone_number', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'seos_magazine_phone_number', array(
	'type'     => 'text',
	'settings' => 'seos_magazine_phone_number',
	'label'    => __( 'Phone Number', 'seos-magazine' ),
	'section'  => 'seos_magazine_kirki_section5',
	'priority' => 10,
) );


/***********************************************
Read More Button Options
************************************************/

Kirki::add_section( 'seos_magazine_kirki_section6', array(
    'title'          => __( 'Read More Button', 'seos-magazine' ),
    'panel'          => 'seos_magazine_panel', // Not typically needed.
    'priority'       => 11,
    'capability'     => 'edit_theme_options',
    'theme_supports' => ' ', // Rarely needed.
) );

Kirki::add_config( 'seos_magazine_read_more_activate', array(
	'capability'	=> 'edit_theme_options'
) );
	
Kirki::add_field( 'seos_magazine_read_more_activate', array(
	'type'        => 'switch',
	'settings'    => 'seos_magazine_read_more_activate',
	'label'       => __( 'Activate Read more Button', 'seos-magazine' ),
	'section'     => 'seos_magazine_kirki_section6',
	'default'     => 1,
	'priority'    => 11,
	'choices'     => array(
		'on'  => esc_attr__( 'on', 'seos-magazine' ),
		'off' => esc_attr__( 'off', 'seos-magazine' ),
	),
) );

Kirki::add_config( 'seos_magazine_read_more_text', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'seos_magazine_read_more_text', array(
	'type'     => 'text',
	'settings' => 'seos_magazine_read_more_text',
	'label'    => __( 'Read More Text', 'seos-magazine' ),
	'section'  => 'seos_magazine_kirki_section6',
	'default'  => esc_attr__( 'Read More', 'seos-magazine' ),
	'priority' => 12,
) );

Kirki::add_config( 'seos_magazine_read_more_lenght', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'seos_magazine_read_more_lenght', array(
	'type'        => 'number',
	'priority'    => 13,	
	'settings'    => 'seos_magazine_read_more_lenght',
	'label'       => esc_attr__( 'Read More Length', 'seos-magazine' ),
	'section'     => 'seos_magazine_kirki_section6',
	'default'     => 42,
	'choices'     => array(
		'min'  => 10,
		'max'  => 500,
		'step' => 1,
	),
) );


/***********************************************************
* Just hide all comments
***********************************************************/

	if (get_theme_mod('seos_magazine_setting1')) {
		function disable_all_comments_1 () {
			echo "<style> #comments { display: none !important; }</style>";
		}
		add_action('wp_head','disable_all_comments_1');	
	}
	
/***********************************************************
* Hide existing comments
***********************************************************/


	if (get_theme_mod( 'seos_magazine_setting2' )) {
		function disable_all_comments_hide_existing_comments($comments) {
			$comments = array();
			return $comments;
		}
		add_filter('comments_array', 'disable_all_comments_hide_existing_comments', 10, 2);
    }

/***********************************************************
* Remove comments page in menu
***********************************************************/

	if (get_theme_mod( 'seos_magazine_setting3' )) {
		function disable_all_comments_admin_menu() {
			remove_menu_page('edit-comments.php');
		}
		add_action('admin_menu', 'disable_all_comments_admin_menu');
	}
	
	
/*********************************************************************************************************
* Excerpt
**********************************************************************************************************/
	if (get_theme_mod('seos_magazine_read_more_activate')) {
		function seos_magazine_magazine_excerpt_more( $more ) {
			return ' <br /><br /><br /><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . seos_magazine_return_read_more_text (). '</a>';
		}
			add_filter( 'excerpt_more', 'seos_magazine_magazine_excerpt_more' );

		function custom_excerpt_length( $length ) {
			if (get_theme_mod('seos_magazine_read_more_lenght')) {
				return get_theme_mod('seos_magazine_read_more_lenght');
			}
			else return 42;
		}
		add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	}
	
	function seos_magazine_return_read_more_text () {
		if (get_theme_mod('seos_magazine_read_more_text')) {	 
			return get_theme_mod('seos_magazine_read_more_text');
		} 
		return "Read More";
		
	}
	
/*********************************************************************************************************
* Custom Google Fonts
**********************************************************************************************************/
	
    if( get_theme_mod('seos_magazine_google_font_h1') ) {
	
	function custom_google_fonts_styles_method1() {
	
		wp_enqueue_style('custom_google_fonts_font1', 'https://fonts.googleapis.com/css?family=' . get_theme_mod( 'seos_magazine_google_font_h1'));

        wp_enqueue_style(
		
		'custom_google_fonts_style1', get_template_directory_uri() . '/css/seos_magazine-google.css');
				
        $seos_magazine_font = get_theme_mod( 'seos_magazine_google_font_h1' );
		
        $seos_magazine_custom_css = "h1 {font-family: '{$seos_magazine_font}', sans-serif !important;}";
		
        wp_add_inline_style( 'custom_google_fonts_style1', $seos_magazine_custom_css );
	}
	
	add_action( 'wp_enqueue_scripts', 'custom_google_fonts_styles_method1' );
		
 	}

	/**********************************************************************************************************/

    if( get_theme_mod('seos_magazine_google_font_h2') ) {
	
	function custom_google_fonts_styles_method2() {
	
		wp_enqueue_style('custom_google_fonts_font2', 'https://fonts.googleapis.com/css?family=' . get_theme_mod( 'seos_magazine_google_font_h2'));

        wp_enqueue_style(
		
		'custom_google_fonts_style2', get_template_directory_uri() . '/css/seos_magazine-google.css');
				
        $seos_magazine_font = get_theme_mod( 'seos_magazine_google_font_h2' );
		
        $seos_magazine_custom_css = "h2, h2 a {font-family: '{$seos_magazine_font}', sans-serif !important;}";
		
        wp_add_inline_style( 'custom_google_fonts_style2', $seos_magazine_custom_css );
	}
	
	add_action( 'wp_enqueue_scripts', 'custom_google_fonts_styles_method2' );
		
 	}
	
	/**********************************************************************************************************/

    if( get_theme_mod('seos_magazine_google_font_h3') ) {
	
	function custom_google_fonts_styles_method3() {
	
		wp_enqueue_style('custom_google_fonts_font3', 'https://fonts.googleapis.com/css?family=' . get_theme_mod( 'seos_magazine_google_font_h3'));

        wp_enqueue_style(
		
		'custom_google_fonts_style3', get_template_directory_uri() . '/css/seos_magazine-google.css');
				
        $seos_magazine_font = get_theme_mod( 'seos_magazine_google_font_h3' );
		
        $seos_magazine_custom_css = "h3, h3 a {font-family: '{$seos_magazine_font}', sans-serif !important;}";
		
        wp_add_inline_style( 'custom_google_fonts_style3', $seos_magazine_custom_css );
	}
	
	add_action( 'wp_enqueue_scripts', 'custom_google_fonts_styles_method3' );
		
 	}	
	
	/**********************************************************************************************************/

    if( get_theme_mod('seos_magazine_google_font_h4') ) {
	
	function custom_google_fonts_styles_method4() {
	
		wp_enqueue_style('custom_google_fonts_font4', 'https://fonts.googleapis.com/css?family=' . get_theme_mod( 'seos_magazine_google_font_h4'));

        wp_enqueue_style(
		
		'custom_google_fonts_style4', get_template_directory_uri() . '/css/seos_magazine-google.css');
				
        $seos_magazine_font = get_theme_mod( 'seos_magazine_google_font_h4' );
		
        $seos_magazine_custom_css = "h4, h4 a {font-family: '{$seos_magazine_font}', sans-serif !important;}";
		
        wp_add_inline_style( 'custom_google_fonts_style4', $seos_magazine_custom_css );
	}
	
	add_action( 'wp_enqueue_scripts', 'custom_google_fonts_styles_method4' );
		
 	}	
	
	/**********************************************************************************************************/

    if( get_theme_mod('seos_magazine_google_font_h5') ) {
	
	function custom_google_fonts_styles_method5() {
	
		wp_enqueue_style('custom_google_fonts_font5', 'https://fonts.googleapis.com/css?family=' . get_theme_mod( 'seos_magazine_google_font_h5'));

        wp_enqueue_style(
		
		'custom_google_fonts_style5', get_template_directory_uri() . '/css/seos_magazine-google.css');
				
        $seos_magazine_font = get_theme_mod( 'seos_magazine_google_font_h5' );
		
        $seos_magazine_custom_css = "h5, h5 a {font-family: '{$seos_magazine_font}', sans-serif !important;}";
		
        wp_add_inline_style( 'custom_google_fonts_style5', $seos_magazine_custom_css );
	}
	
	add_action( 'wp_enqueue_scripts', 'custom_google_fonts_styles_method5' );
		
 	}
	
	/**********************************************************************************************************/

    if( get_theme_mod('seos_magazine_google_font_h6') ) {
	
	function custom_google_fonts_styles_method6() {
	
		wp_enqueue_style('custom_google_fonts_font6', 'https://fonts.googleapis.com/css?family=' . get_theme_mod( 'seos_magazine_google_font_h6'));

        wp_enqueue_style(
		
		'custom_google_fonts_style6', get_template_directory_uri() . '/css/seos_magazine-google.css');
				
        $seos_magazine_font = get_theme_mod( 'seos_magazine_google_font_h6' );
		
        $seos_magazine_custom_css = "h6, h6 a {font-family: '{$seos_magazine_font}', sans-serif !important;}";
		
        wp_add_inline_style( 'custom_google_fonts_style6', $seos_magazine_custom_css );
	}
	
	add_action( 'wp_enqueue_scripts', 'custom_google_fonts_styles_method6' );
		
 	}	

	/**********************************************************************************************************/

    if( get_theme_mod('seos_magazine_google_font_h7') ) {
	
	function custom_google_fonts_styles_method7() {
	
		wp_enqueue_style('custom_google_fonts_font7', 'https://fonts.googleapis.com/css?family=' . get_theme_mod( 'seos_magazine_google_font_h7'));

        wp_enqueue_style(
		
		'custom_google_fonts_style7', get_template_directory_uri() . '/css/seos_magazine-google.css');
				
        $seos_magazine_font = get_theme_mod( 'seos_magazine_google_font_h7' );
		
        $seos_magazine_custom_css = ".site-title a {font-family: '{$seos_magazine_font}', sans-serif !important;}";
		
        wp_add_inline_style( 'custom_google_fonts_style7', $seos_magazine_custom_css );
	}
	
	add_action( 'wp_enqueue_scripts', 'custom_google_fonts_styles_method7' );
		
 	}	
	
/*****************************************************
Activation
*****************************************************/
	if (get_theme_mod( 'seos_magazine_phone_number' )) {
		function seos_magazine_mobile_calL_now_activation() {

			echo "
			<style>
		
				.mcn-footer {
						display: none;
					}
					
					@media screen and (max-width: 480px) {

					.mcn-footer {
						position: fixed;
						bottom: 0;
						text-align: center;
						margin: 0 auto;
						width: 100%;
						padding: 20px 0 20px 0;
						z-index: 999999;
						background: red;
						display: block;
						font-size: 30px;

					}

					.mcn-footer  img {
						color: #fff;
						margin: 0 auto;
						width: 50px !important;
						text-align: center;
					}
				
				}
				
			</style>";
		}

		add_action('wp_head','seos_magazine_mobile_calL_now_activation');
	}
/*****************************************************
Kirki Custom CSS
*****************************************************/

if (get_theme_mod('seos_magazine_kirki_css')) {
	
	function seos_magazine_kirki_custom_css () { ?>

		<style>
			<?php echo esc_html(get_theme_mod('seos_magazine_kirki_css')); ?>
		</style>

	<?php }

	add_action('wp_head','seos_magazine_kirki_custom_css');
}
