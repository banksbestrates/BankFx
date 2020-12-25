<?php
/**
* Getting started options
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function textwp_getting_started($wp_customize) {

    $wp_customize->add_section( 'textwp_section_getting_started', array( 'title' => esc_html__( 'Getting Started', 'textwp' ), 'description' => esc_html__( 'Thanks for your interest in TextWP! If you have any questions or run into any trouble, please visit us the following links. We will get you fixed up!', 'textwp' ), 'panel' => 'textwp_main_options_panel', 'priority' => 5, ) );

    $wp_customize->add_setting( 'textwp_options[documentation]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new TextWP_Customize_Button_Control( $wp_customize, 'textwp_documentation_control', array( 'label' => esc_html__( 'Documentation', 'textwp' ), 'section' => 'textwp_section_getting_started', 'settings' => 'textwp_options[documentation]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => esc_url( 'https://themesdna.com/textwp-wordpress-theme/' ), 'button_target' => '_blank', ) ) );

    $wp_customize->add_setting( 'textwp_options[contact]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new TextWP_Customize_Button_Control( $wp_customize, 'textwp_contact_control', array( 'label' => esc_html__( 'Contact Us', 'textwp' ), 'section' => 'textwp_section_getting_started', 'settings' => 'textwp_options[contact]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => esc_url( 'https://themesdna.com/contact/' ), 'button_target' => '_blank', ) ) );

}