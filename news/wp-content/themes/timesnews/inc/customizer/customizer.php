<?php
/**
 * TimesNews Theme Customizer
 *
 * @package timesnews
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function timesnews_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'timesnews_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'timesnews_customize_partial_blogdescription',
		) );
	}
	class TimesNews_title_display extends WP_Customize_Control {
        public $type = 'main-title';
        public $label = '';
        public function render_content() {
        ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
        <?php
        }
    }

    // Background for Header brand

    $wp_customize->add_setting( 'upload_header_brand', array(
        'default'        => '',
        'sanitize_callback' => 'timesnews_sanitize_url',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'upload_header_brand', array(
    	'priority' => 100,
        'label' => esc_html__('Header Brand BG Image', 'timesnews'),
        'section' => 'title_tagline',
    ) ) );

	// Add Panel
	$wp_customize->add_panel( 'timesnews_options_panel', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'Theme Options', 'timesnews' ),
	) );



	// Add Section
	$wp_customize->add_section( 'timesnews_all_theme_options', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'All theme Options', 'timesnews' ),
		'panel' => 'timesnews_options_panel',
	) );

	$wp_customize->add_section( 'timesnews_flash_news_section', array(
		'priority' => 20,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'Flash News', 'timesnews' ),
		'panel' => 'timesnews_options_panel',
	) );

	$wp_customize->add_section( 'timesnews_main_banner_section', array(
		'priority' => 30,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'Main Banner', 'timesnews' ),
		'panel' => 'timesnews_options_panel',
	) );

	$wp_customize->add_section( 'timesnews_highlighted_category_section', array(
		'priority' => 40,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'Highlighted Category', 'timesnews' ),
		'panel' => 'timesnews_options_panel',
	) );

	$wp_customize->add_section( 'timesnews_second_design_section', array(
		'priority' => 50,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'Second Design', 'timesnews' ),
		'panel' => 'timesnews_options_panel',
	) );

	/**
	 * Control Checkbox Multiple
	 */
	 require get_template_directory() . '/inc/customizer/control-checkbox-multiple.php';

	/**
	 * Flash News section
	 */
	require get_template_directory() . '/inc/customizer/flash-news.php';

	/**
	 * All theme Options section
	 */
	require get_template_directory() . '/inc/customizer/all-theme-options.php';

	/**
	 * Main Banner Section
	 */
	require get_template_directory() . '/inc/customizer/main-banner.php';

	/**
	 * Excerpt Display
	 */
	require get_template_directory() . '/inc/customizer/excerpt-display.php';

	/**
	 * Color Schemes Section
	 */
	require get_template_directory() . '/inc/customizer/cat-color.php';

	/**
	 * Second Design Section
	 */
	require get_template_directory() . '/inc/customizer/second-design.php';


	/**
	 * Sanitize functions
	 */
	require get_template_directory() . '/inc/customizer/sanitize-callback-functions.php';

	}
add_action( 'customize_register', 'timesnews_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function timesnews_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function timesnews_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function timesnews_customize_preview_js() {
	wp_enqueue_script( 'timesnews-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20180801', true );

}
add_action( 'customize_preview_init', 'timesnews_customize_preview_js' );
