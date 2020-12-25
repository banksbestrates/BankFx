<?php
/**
 * MagazineBook Theme Customizer - Sanitize Settings
 *
 * @package MagazineBook
 */

/**
 * Sanitize checkbox.
 *
 * @param  mixed $checked input.
 * @return boolian
 */
function magazinebook_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Sanitize radio input
 *
 * @param  mixed $input input.
 * @param  mixed $setting setting.
 * @return string
 */
function magazinebook_sanitize_radio( $input, $setting ) {
	// Input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only.
	$input = sanitize_key( $input );

	// Get the list of possible radio box options.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// Return input if valid or return default option.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

/**
 * Check if top header is active.
 *
 * @return boolian
 */
function magazinebook_is_top_bar_active() {
	if ( get_theme_mod( 'magazinebook_show_top_bar', true ) ) {
		return true;
	}
	return false;
}

/**
 * Color escaping option sanitize
 *
 * @param  mixed $input Input.
 * @return string
 */
function magazinebook_color_escaping_option_sanitize( $input ) {
	$input = esc_attr( $input );

	return $input;
}

/**
 * Check if social media links active.
 *
 * @return boolian
 */
function magazinebook_is_social_section_active() {
	if ( get_theme_mod( 'magazinebook_show_social_in_top_bar', true ) ) {
		return true;
	}
	return false;
}


// Add option to show/hide breadcrumbs.
if ( function_exists( 'yoast_breadcrumb' ) ) {
	$wp_customize->add_setting(
		'magazinebook_show_breadcrumbs',
		array(
			'default'           => false,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'magazinebook_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'magazinebook_show_breadcrumbs',
		array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Check to show Breadcrumbs (On all pages except front page).', 'magazinebook' ),
			'section'  => 'wpseo_breadcrumbs_customizer_section',
			'settings' => 'magazinebook_show_breadcrumbs',
			'priority' => 1,
		)
	);
}


/**
 * Customizer styles
 *
 * @return void
 */
function magazinebook_customizer_custom_scripts() {
	?>
	<style>
		#accordion-panel-magazinebook_header_options {
			margin-top: 15px;
		}
		.mb-theme-info {
			margin-right: -12px;
			margin-left: -12px;
		}
		.mb-theme-info a {
			padding: 10px 10px 11px 14px;
			font-size: 14px;
			line-height: 21px;
			font-weight: 600;
			background: #fff;
			color: #555d66;
			display: block;
			text-decoration: none;
			border-left: 4px solid #fff;
			border-bottom: 1px solid #ddd;
		}
		.mb-theme-info a:hover {
			color: #0073aa;
			background: #f3f3f5;
			border-left-color: #0073aa;
		}
		.mb-theme-info a:focus {
			box-shadow : none;
		}
		.accordion-section-title .upgrade-to-pro {
			padding: 5px 15px;
			margin: -4px -4px 0 0;
			display: inline-block;
			background-color: rgb(110,175,40);
			-webkit-border-radius: 50px;
			-moz-border-radius:50px;
			border-radius: 50px;
			color: #fff;
			text-decoration: none;
			float: right;
		}
		.accordion-section-title .upgrade-to-pro:hover {
			background-color: rgb(110,185,40);
		}
		.mb-customizer-review-wrap {
			background: #fff;
			font-style: italic;
			margin: 20px 10px;
			padding: 5px 15px;
			border: 1px solid #ddd;
		}
		.mb-customizer-review-wrap h3 {
			font-style: normal;
		}
	</style>
	<?php
}
add_action( 'customize_controls_print_footer_scripts', 'magazinebook_customizer_custom_scripts' );
