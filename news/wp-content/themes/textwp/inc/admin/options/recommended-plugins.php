<?php
/**
* Recommended plugins options
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function textwp_recomm_plugin_options($wp_customize) {

    // Customizer Section: Recommended Plugins
    $wp_customize->add_section( 'textwp_section_recommended_plugins', array( 'title' => esc_html__( 'Recommended Plugins', 'textwp' ), 'panel' => 'textwp_main_options_panel', 'priority' => 620 ));

    $wp_customize->add_setting( 'textwp_options[recommended_plugins]', array( 'type' => 'option', 'capability' => 'install_plugins', 'sanitize_callback' => '__return_false' ) );

    $wp_customize->add_control( new TextWP_Customize_Recommended_Plugins( $wp_customize, 'textwp_recommended_plugins_control', array( 'label' => esc_html__( 'Recommended Plugins', 'textwp' ), 'section' => 'textwp_section_recommended_plugins', 'settings' => 'textwp_options[recommended_plugins]', 'type' => 'themesdna-recommended-wpplugins', 'capability' => 'install_plugins' ) ) );

}