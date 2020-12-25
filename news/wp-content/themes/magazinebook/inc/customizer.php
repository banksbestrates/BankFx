<?php
/**
 * MagazineBook Theme Customizer
 *
 * @package MagazineBook
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function magazinebook_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'magazinebook_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'magazinebook_customize_partial_blogdescription',
			)
		);
	}

	include get_template_directory() . '/inc/customizer/other-functions.php';
	include get_template_directory() . '/inc/class-magazinebook-dropdown-category-control.php';
	include get_template_directory() . '/inc/class-magazinebook-customize-magazinebook-support.php';
	include get_template_directory() . '/inc/customizer/header-options.php';
	include get_template_directory() . '/inc/customizer/footer-options.php';
	include get_template_directory() . '/inc/customizer/frontpage-options.php';
	include get_template_directory() . '/inc/customizer/design-options.php';
	include get_template_directory() . '/inc/customizer/content-options.php';

	$wp_customize->get_section( 'header_image' )->panel               = 'magazinebook_header_options';
	$wp_customize->get_section( 'header_image' )->priority            = 999;
	$wp_customize->get_section( 'background_image' )->panel           = 'magazinebook_design_options';
	$wp_customize->get_section( 'background_image' )->priority        = 999;
	$wp_customize->get_section( 'background_image' )->active_callback = function() {
		if ( 'boxed' === get_theme_mod( 'magazinebook_site_layout', 'boxed' ) ) {
			return true;
		}
		return false;
	};
	$wp_customize->get_control( 'header_textcolor' )->section         = 'magazinebook_color_options_section';
	$wp_customize->get_control( 'background_color' )->section         = 'magazinebook_color_options_section';
	$wp_customize->get_control( 'background_color' )->active_callback = function() {
		if ( 'boxed' === get_theme_mod( 'magazinebook_site_layout', 'boxed' ) ) {
			return true;
		}
		return false;
	};

	// Logo hight setting.
	$wp_customize->add_setting(
		'magazinebook_custom_logo_height',
		array(
			'default'           => false,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'magazinebook_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'magazinebook_custom_logo_height',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Set custom height for Logo', 'magazinebook' ),
			'section'  => 'title_tagline',
			'settings' => 'magazinebook_custom_logo_height',
			'priority' => 8,
		)
	);
	$wp_customize->add_setting(
		'magazinebook_logo_height',
		array(
			'default'           => 60,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'magazinebook_logo_height',
		array(
			'label'           => __( 'Enter logo height (in px)', 'magazinebook' ),
			'type'            => 'number',
			'section'         => 'title_tagline',
			'setting'         => 'magazinebook_logo_height',
			'priority'        => '9',
			'active_callback' => function () {
				if ( get_theme_mod( 'magazinebook_custom_logo_height', false ) ) {
					return true;
				}
				return false;
			},
		)
	);

	// Add Support Section.
	$wp_customize->add_section(
		'magazinebook_support_section',
		array(
			'title'    => __( 'MagazineBook Support', 'magazinebook' ),
			'priority' => 999,
		)
	);
	$wp_customize->add_setting(
		'magazinebook_support_setting',
		array(
			'default'           => false,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);
	$wp_customize->add_control(
		new MagazineBook_Customize_MagazineBook_Support(
			$wp_customize,
			'magazinebook_support_setting',
			array(
				'label'   => __( 'MagazineBook Support', 'magazinebook' ),
				'section' => 'magazinebook_support_section',
			)
		)
	);

}
add_action( 'customize_register', 'magazinebook_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function magazinebook_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function magazinebook_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function magazinebook_customize_preview_js() {
	wp_enqueue_script( 'magazinebook-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'magazinebook_customize_preview_js' );


/**
 * Magazinebook Custom css for customizer.
 *
 * @return void
 */
function magazinebook_styles_method() {

	$magazinebook_color_skin = get_theme_mod( 'magazinebook_base_color_skin', 'light' );
	if ( 'dark' === $magazinebook_color_skin ) {
		wp_enqueue_style( 'theme-dark-skin', get_template_directory_uri() . '/css/dark-skin.css', array(), MAGAZINEBOOK_VERSION, 'all' );
	}

	$magazinebook_primary_color = get_theme_mod( 'magazinebook_primary_color', '#007bff' );
	$magazinebook_internal_css  = '';

	if ( '#007bff' !== $magazinebook_primary_color ) {
		$magazinebook_internal_css = "
			a, .main-navigation li:hover > a, .main-navigation li.focus > a,
			.widget a:hover,
			.top-header-bar.mb-light-top-bar .mb-latest-posts a,
			.mb-simple-featured-posts .cat-links a,
			.widget .cat-links a {
				color: {$magazinebook_primary_color};
			}
			.main-navigation .current_page_item > a,
			.main-navigation .current-menu-item > a,
			.main-navigation .current_page_ancestor > a,
			.main-navigation .current-menu-ancestor > a {
				color: {$magazinebook_primary_color};
  				border-bottom: 2px solid {$magazinebook_primary_color};
			}
			.mb-read-more {
				background-color: {$magazinebook_primary_color};
			}
			input[type='reset'], input[type='button'], input[type='submit'], button {
				background-color: {$magazinebook_primary_color};
			}
			.search-form button.search-icon {
				border-top: 1px solid {$magazinebook_primary_color};
			}
		";
	}

	if ( 'dark' === $magazinebook_color_skin ) {
		wp_add_inline_style( 'theme-dark-skin', $magazinebook_internal_css );
	} else {
		wp_add_inline_style( 'magazinebook-style', $magazinebook_internal_css );
	}

	if ( 'option1' === get_theme_mod( 'magazinebook_font_combo', 'default' ) ) {
		wp_dequeue_style( 'magazinebook-fonts' );
		wp_enqueue_style( 'magazinebook-fonts-option1', '//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,400&display=swap', array(), MAGAZINEBOOK_VERSION );

		$magazinebook_internal_font_css = "
		body, button, input, select, optgroup, textarea {
			font-family: 'Open Sans', sans-serif;
		}
		h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
			font-weight: 600;
		}
		.entry-title {
			font-family: 'Open Sans', sans-serif;
			font-weight: 600;
		}
		.main-navigation, .mb-read-more, .cat-links, input[type='reset'], input[type='button'], input[type='submit'], button, #respond form label {
			font-family: 'Open Sans', sans-serif;
			font-weight: 600;
		}
		.widget .widget-title, .widget .widgettitle, .site-header .site-title, .page-title, .comments-title, .comment-reply-title {
			font-family: 'Open Sans', sans-serif;
			font-weight: 800;
		}
		";

		wp_add_inline_style( 'magazinebook-fonts-option1', $magazinebook_internal_font_css );
	}

	if ( 'option2' === get_theme_mod( 'magazinebook_font_combo', 'default' ) ) {
		wp_dequeue_style( 'magazinebook-fonts' );
		wp_enqueue_style( 'magazinebook-fonts-option2', '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap', array(), MAGAZINEBOOK_VERSION );

		$magazinebook_internal_font_css = "
		body, button, input, select, optgroup, textarea {
			font-family: 'Roboto', sans-serif;
		}
		h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
			font-weight: 500;
		}
		.entry-title {
			font-family: 'Roboto', sans-serif;
			font-weight: 500;
		}
		.main-navigation, .mb-read-more, .cat-links, input[type='reset'], input[type='button'], input[type='submit'], button, #respond form label {
			font-family: 'Roboto', sans-serif;
			font-weight: 500;
		}
		.widget .widget-title, .widget .widgettitle, .site-header .site-title, .page-title, .comments-title, .comment-reply-title {
			font-family: 'Roboto', sans-serif;
			font-weight: 700;
		}
		";

		wp_add_inline_style( 'magazinebook-fonts-option2', $magazinebook_internal_font_css );
	}

	if ( 'option3' === get_theme_mod( 'magazinebook_font_combo', 'default' ) ) {
		wp_dequeue_style( 'magazinebook-fonts' );
		wp_enqueue_style( 'magazinebook-fonts-option3', '//fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;1,400;1,700&display=swap', array(), MAGAZINEBOOK_VERSION );

		$magazinebook_internal_font_css = "
		html {
			font-size: 18px;
		}
		body, button, input, select, optgroup, textarea {
			font-family: 'Crimson Text', serif;
		}
		h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
			font-weight: 600;
		}
		.entry-title {
			font-family: 'Crimson Text', serif;
			font-weight: 600;
		}
		.main-navigation, .mb-read-more, .cat-links, input[type='reset'], input[type='button'], input[type='submit'], button, #respond form label {
			font-family: 'Crimson Text', serif;
			font-weight: 600;
		}
		.widget .widget-title, .widget .widgettitle, .site-header .site-title, .page-title, .comments-title, .comment-reply-title {
			font-family: 'Crimson Text', serif;
			font-weight: 700;
			font-style: italic;
		}
		#secondary .widget_search input.s.field {
			width: calc(100% - 48px);
		}
		";

		wp_add_inline_style( 'magazinebook-fonts-option3', $magazinebook_internal_font_css );
	}

}
add_action( 'wp_enqueue_scripts', 'magazinebook_styles_method' );


/**
 * Magazinebook_custom_logo_css
 *
 * @return void
 */
function magazinebook_custom_logo_css() {
	if ( get_theme_mod( 'magazinebook_custom_logo_height', false ) ) {
		?>
		<style type="text/css" id="custom-theme-css">
			.custom-logo { height: <?php echo esc_attr( get_theme_mod( 'magazinebook_logo_height', '60' ) ); ?>px; width: auto; }
		</style>
		<?php
	}
}
add_action( 'wp_head', 'magazinebook_custom_logo_css', 100 );
