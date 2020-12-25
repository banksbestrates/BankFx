<?php

// Logo hight setting
$wp_customize->add_setting( 'newsdot_logo_height', array(
	'default'           => 60,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( 'newsdot_logo_height', array(
	'label'    => __( 'Enter logo height (in px)', 'newsdot' ),
	'type'     => 'number',
	'section'  => 'title_tagline',
	'setting'  => 'newsdot_logo_height',
	'priority' => '9',
) );

// PANEL => Theme Options
$wp_customize->add_panel( 'newsdot_theme_options_panel', array(
	'title'    => __( 'Theme Options', 'newsdot' ),
	'priority' => 30,
) );




// SECTION => General Options
$wp_customize->add_section( 'newsdot_general_options', array(
	'title'       => __( 'General Settings', 'newsdot' ),
	'panel'       => 'newsdot_theme_options_panel',
) );

// Divider + Heading
$wp_customize->add_setting( 'newsdot_general_heading_1', array(
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( new Newsdot_Divider_Heading_Control( $wp_customize, 'newsdot_general_heading_1', array(
	'label'    => __( 'Design', 'newsdot' ),
	'section'  => 'newsdot_general_options',
	'setting'  => 'newsdot_general_heading_1',
	'priority' => 1,
) ) );

// Select Primary Color
$wp_customize->add_setting( 'newsdot_primary_color', array(
	'default'           => 'default',
	'sanitize_callback' => 'newsdot_sanitize_select',
) );
$wp_customize->add_control( 'newsdot_primary_color', array(
	'label'   => __( 'Select Primary Color', 'newsdot' ),
	'type'    => 'select',
	'section' => 'newsdot_general_options',
	'setting' => 'newsdot_primary_color',
	'priority' => 2,
	'choices' => array(
		'default' => esc_html__('Default (Red)','newsdot'),
		'indigo'  => esc_html__('Indigo','newsdot'),
		'teal'    => esc_html__('Teal','newsdot'),
		'pink'    => esc_html__('Pink','newsdot'),
	)
) );

// Show Card Shadow
$wp_customize->add_setting( 'newsdot_show_card_shadow', array(
	'default'           => false,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_show_card_shadow', array(
	'label'   => __( 'Display Card Shadow', 'newsdot' ),
	'type'    => 'checkbox',
	'priority' => 3,
	'section' => 'newsdot_general_options',
	'setting' => 'newsdot_show_card_shadow',
) );

// Divider + Heading
$wp_customize->add_setting( 'newsdot_general_heading_2', array(
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( new Newsdot_Divider_Heading_Control( $wp_customize, 'newsdot_general_heading_2', array(
	'label'    => __( 'Typography', 'newsdot' ),
	'section'  => 'newsdot_general_options',
	'setting'  => 'newsdot_general_heading_2',
	'priority' => 5,
) ) );

// Select Font Family
$wp_customize->add_setting( 'newsdot_font_family', array(
	'default'           => 'default',
	'sanitize_callback' => 'newsdot_sanitize_select',
) );
$wp_customize->add_control( 'newsdot_font_family', array(
	'label'   => __( 'Select Font Family', 'newsdot' ),
	'type'    => 'select',
	'section' => 'newsdot_general_options',
	'setting' => 'newsdot_font_family',
	'priority' => 6,
	'choices' => array(
		'default'  => esc_html__('Default System Fonts','newsdot'),
		'roboto'   => esc_html__('Roboto','newsdot'),
		'jost'     => esc_html__('Jost','newsdot'),
		'overpass' => esc_html__('Overpass','newsdot'),
		'lato'     => esc_html__('Lato','newsdot'),
	)
) );

// Don't transform to uppercase
$wp_customize->add_setting( 'newsdot_no_uppercase', array(
	'default'           => false,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_no_uppercase', array(
	'label'   => __( 'Do not tranform titles to Uppercase', 'newsdot' ),
	'type'    => 'checkbox',
	'section' => 'newsdot_general_options',
	'setting' => 'newsdot_no_uppercase',
) );

// Reduce The Boldness
$wp_customize->add_setting( 'newsdot_reduce_boldness', array(
	'default'           => false,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_reduce_boldness', array(
	'label'   => __( 'Reduce the boldness of titles', 'newsdot' ),
	'type'    => 'checkbox',
	'section' => 'newsdot_general_options',
	'setting' => 'newsdot_reduce_boldness',
) );

// Divider + Heading
$wp_customize->add_setting( 'newsdot_general_heading_3', array(
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( new Newsdot_Divider_Heading_Control( $wp_customize, 'newsdot_general_heading_3', array(
	'label'    => __( 'Layout', 'newsdot' ),
	'section'  => 'newsdot_general_options',
	'setting'  => 'newsdot_general_heading_3',
) ) );

// Select Site Layout
$wp_customize->add_setting( 'newsdot_site_layout', array(
	'default'           => 'right',
	'sanitize_callback' => 'newsdot_sanitize_select',
) );
$wp_customize->add_control( 'newsdot_site_layout', array(
	'label'   => __( 'Select Site Layout', 'newsdot' ),
	'type'    => 'select',
	'section' => 'newsdot_general_options',
	'setting' => 'newsdot_site_layout',
	'choices' => array(
		'right' => esc_html__('Right Sidebar','newsdot'),
		'left'  => esc_html__('Left Sidebar','newsdot'),
		'no'    => esc_html__('No Sidebar','newsdot'),
		'full'  => esc_html__('No Sidebar (Full Width)','newsdot'),
	)
) );




// SECTION => Header Top Bar Options
$wp_customize->add_section( 'newsdot_top_header_options', array(
	'title'       => __( 'Header Top Bar', 'newsdot' ),
	'panel'       => 'newsdot_theme_options_panel',
) );

// Show Topbar
$wp_customize->add_setting( 'newsdot_show_topbar', array(
	'default'           => true,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_show_topbar', array(
	'label'   => __( 'Show Top Bar Above Main Header', 'newsdot' ),
	'type'    => 'checkbox',
	'section' => 'newsdot_top_header_options',
	'setting' => 'newsdot_show_topbar',
) );

// Divider + Heading
$wp_customize->add_setting( 'newsdot_topbar_heading_1', array(
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( new Newsdot_Divider_Heading_Control( $wp_customize, 'newsdot_topbar_heading_1', array(
	'label'           => __( 'Date & Search', 'newsdot' ),
	'section'         => 'newsdot_top_header_options',
	'setting'         => 'newsdot_topbar_heading_1',
	'active_callback' => 'newsdot_is_topbar_active',
) ) );

// Show Date
$wp_customize->add_setting( 'newsdot_show_topbar_date', array(
	'default'           => true,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_show_topbar_date', array(
	'label'           => __( 'Show Date in the Top Bar', 'newsdot' ),
	'type'            => 'checkbox',
	'section'         => 'newsdot_top_header_options',
	'setting'         => 'newsdot_show_topbar_date',
	'active_callback' => 'newsdot_is_topbar_active',
) );

// Show Search
$wp_customize->add_setting( 'newsdot_show_topbar_search', array(
	'default'           => true,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_show_topbar_search', array(
	'label'           => __( 'Show Search Box in the Top Bar', 'newsdot' ),
	'type'            => 'checkbox',
	'section'         => 'newsdot_top_header_options',
	'setting'         => 'newsdot_show_topbar_search',
	'active_callback' => 'newsdot_is_topbar_active',
) );

// Divider + Heading
$wp_customize->add_setting( 'newsdot_topbar_heading_2', array(
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( new Newsdot_Divider_Heading_Control( $wp_customize, 'newsdot_topbar_heading_2', array(
	'label'           => __( 'Top Stories', 'newsdot' ),
	'section'         => 'newsdot_top_header_options',
	'setting'         => 'newsdot_topbar_heading_2',
	'active_callback' => 'newsdot_is_topbar_active',
) ) );

// Show Top Stories
$wp_customize->add_setting( 'newsdot_show_topbar_stories', array(
	'default'           => false,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_show_topbar_stories', array(
	'label'           => __( 'Show Top Stories in the Top Bar', 'newsdot' ),
	'type'            => 'checkbox',
	'section'         => 'newsdot_top_header_options',
	'setting'         => 'newsdot_show_topbar_stories',
	'active_callback' => 'newsdot_is_topbar_active',
) );

// Select category for top stories
$wp_customize->add_setting( 'newsdot_top_stories_cat', array(
	'default'           => 0,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Newsdot_Dropdown_Category_Control( $wp_customize, 'newsdot_top_stories_cat', array(
	'label'           => __( 'Select Category for Top Stories', 'newsdot' ),
	'section'         => 'newsdot_top_header_options',
	'setting'         => 'newsdot_top_stories_cat',
	'active_callback' => function() { return newsdot_is_topbar_active() && get_theme_mod( 'newsdot_show_topbar_stories', false ); },
) ) );

// Label for Top Stories
$wp_customize->add_setting( 'newsdot_top_stories_label', array(
	'default'           => __( 'Top Stories:', 'newsdot' ),
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'newsdot_top_stories_label', array(
	'label'           => __( 'Label for Top Stories', 'newsdot' ),
	'type'            => 'text',
	'section'         => 'newsdot_top_header_options',
	'setting'         => 'newsdot_top_stories_label',
	'active_callback' => 'newsdot_is_topbar_active',
) );

// Divider + Heading
$wp_customize->add_setting( 'newsdot_topbar_heading_3', array(
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( new Newsdot_Divider_Heading_Control( $wp_customize, 'newsdot_topbar_heading_3', array(
	'label'           => __( 'Social Media Links', 'newsdot' ),
	'section'         => 'newsdot_top_header_options',
	'setting'         => 'newsdot_topbar_heading_3',
	'active_callback' => 'newsdot_is_topbar_active',
) ) );

// Show Social Media Links
$wp_customize->add_setting( 'newsdot_show_topbar_social_links', array(
	'default'           => true,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_show_topbar_social_links', array(
	'label'           => __( 'Show Social Media Links in Top Bar', 'newsdot' ),
	'type'            => 'checkbox',
	'section'         => 'newsdot_top_header_options',
	'setting'         => 'newsdot_show_topbar_social_links',
	'active_callback' => 'newsdot_is_topbar_active',
) );

// Enter Social Media Links
$wp_customize->add_setting( 'newsdot_social_links', array(
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'newsdot_social_links', array(
	'label'           => __( 'Social Media Links (Comma Separated)', 'newsdot' ),
	'description'     => __( 'Add the full link to your Social Profiles. Seperate with comma ,', 'newsdot' ),
	'type'            => 'textarea',
	'section'         => 'newsdot_top_header_options',
	'setting'         => 'newsdot_social_links',
	'active_callback' => function() { return newsdot_is_topbar_active() && get_theme_mod( 'newsdot_show_topbar_social_links', true ); },
) );




// SECTION => Primary Header Options
$wp_customize->add_section( 'newsdot_primary_header_options', array(
	'title' => __( 'Primary Header', 'newsdot' ),
	'panel' => 'newsdot_theme_options_panel',
) );

// Select Primary header background color
$wp_customize->add_setting( 'newsdot_primary_header_bg', array(
	'default'           => 'light',
	'sanitize_callback' => 'newsdot_sanitize_radio',
) );
$wp_customize->add_control( 'newsdot_primary_header_bg', array(
	'label'   => __( 'Select Primary Header Background', 'newsdot' ),
	'type'    => 'radio',
	'section' => 'newsdot_primary_header_options',
	'setting' => 'newsdot_primary_header_bg',
	'choices' => array(
		'light' => esc_html__('Light','newsdot'),
		'dark'  => esc_html__('Dark','newsdot'),
		'image' => esc_html__('Image','newsdot'),
	)
) );

// Divider + Heading
$wp_customize->add_setting( 'newsdot_header_heading_1', array(
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( new Newsdot_Divider_Heading_Control( $wp_customize, 'newsdot_header_heading_1', array(
	'label'           => __( 'Background Image', 'newsdot' ),
	'section'         => 'newsdot_primary_header_options',
	'setting'         => 'newsdot_header_heading_1',
	'active_callback' => 'newsdot_is_header_bg_img',
) ) );

// Header background image
$wp_customize->add_setting('newsdot_header_bg_image', array(
    'default'           => get_template_directory_uri() . '/assets/images/header-bg.jpg',
	'sanitize_callback' => 'newsdot_sanitize_image',
));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'newsdot_header_bg_image', array(
    'label'           => __('Header Background Image', 'newsdot'),
    'section'         => 'newsdot_primary_header_options',
    'setting'         => 'newsdot_header_bg_image',
	'active_callback' => 'newsdot_is_header_bg_img',
)));

// Select Primary header overlay
$wp_customize->add_setting( 'newsdot_primary_header_overlay', array(
	'default'           => 'dark',
	'sanitize_callback' => 'newsdot_sanitize_radio',
) );
$wp_customize->add_control( 'newsdot_primary_header_overlay', array(
	'label'           => __( 'Select Primary Header Background', 'newsdot' ),
	'type'            => 'radio',
	'section'         => 'newsdot_primary_header_options',
	'setting'         => 'newsdot_primary_header_overlay',
	'active_callback' => 'newsdot_is_header_bg_img',
	'priority'        => 100,
	'choices'         => array(
		'light' => esc_html__('Light Overlay','newsdot'),
		'dark'  => esc_html__('Dark Overlay','newsdot'),
		'none'  => esc_html__('No Overlay','newsdot'),
	)
) );



// SECTION => Banner Section Options
$wp_customize->add_section( 'newsdot_banner_section_options', array(
	'title' => __( 'Banner Section', 'newsdot' ),
	'panel' => 'newsdot_theme_options_panel',
) );

// Show Banner Section
$wp_customize->add_setting( 'newsdot_show_banner_section', array(
	'default'           => true,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_show_banner_section', array(
	'label'   => __( 'Show Banner Section', 'newsdot' ),
	'type'    => 'checkbox',
	'section' => 'newsdot_banner_section_options',
	'setting' => 'newsdot_show_banner_section',
) );

// Divider + Heading
$wp_customize->add_setting( 'newsdot_banner_heading_1', array(
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( new Newsdot_Divider_Heading_Control( $wp_customize, 'newsdot_banner_heading_1', array(
	'label'           => __( 'Part 1 (Banner Slider)', 'newsdot' ),
	'section'         => 'newsdot_banner_section_options',
	'setting'         => 'newsdot_banner_heading_1',
	'active_callback' => function() { return get_theme_mod( 'newsdot_show_banner_section', true ); },
) ) );

// Select category for Banner Slider
$wp_customize->add_setting( 'newsdot_banner_slider_cat', array(
	'default'           => 0,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Newsdot_Dropdown_Category_Control( $wp_customize, 'newsdot_banner_slider_cat', array(
	'label'           => __( 'Select Category for Banner Part 1', 'newsdot' ),
	'section'         => 'newsdot_banner_section_options',
	'setting'         => 'newsdot_banner_slider_cat',
	'active_callback' => function() { return get_theme_mod( 'newsdot_show_banner_section', true ); },
) ) );

// Label for Banner Slider
$wp_customize->add_setting( 'newsdot_banner_slider_label', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'newsdot_banner_slider_label', array(
	'label'           => __( 'Label for Banner Slider', 'newsdot' ),
	'type'            => 'text',
	'section'         => 'newsdot_banner_section_options',
	'setting'         => 'newsdot_banner_slider_label',
	'active_callback' => function() { return get_theme_mod( 'newsdot_show_banner_section', true ); },
) );

// Autoplay Banner Slider
$wp_customize->add_setting( 'newsdot_autoplay_banner_slider', array(
	'default'           => false,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_autoplay_banner_slider', array(
	'label'   => __( 'Autoplay Banner Slider', 'newsdot' ),
	'type'    => 'checkbox',
	'section' => 'newsdot_banner_section_options',
	'setting' => 'newsdot_autoplay_banner_slider',
) );

// Divider + Heading [Part 2]
$wp_customize->add_setting( 'newsdot_banner_heading_2', array(
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( new Newsdot_Divider_Heading_Control( $wp_customize, 'newsdot_banner_heading_2', array(
	'label'           => __( 'Part 2 (Second Column)', 'newsdot' ),
	'section'         => 'newsdot_banner_section_options',
	'setting'         => 'newsdot_banner_heading_2',
	'active_callback' => function() { return get_theme_mod( 'newsdot_show_banner_section', true ); },
) ) );

// Select category for Banner Part 2
$wp_customize->add_setting( 'newsdot_banner_part_2_cat', array(
	'default'           => 0,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Newsdot_Dropdown_Category_Control( $wp_customize, 'newsdot_banner_part_2_cat', array(
	'label'           => __( 'Select Category for Banner Part 2', 'newsdot' ),
	'section'         => 'newsdot_banner_section_options',
	'setting'         => 'newsdot_banner_part_2_cat',
	'active_callback' => function() { return get_theme_mod( 'newsdot_show_banner_section', true ); },
) ) );

// Label for Banner Part 2
$wp_customize->add_setting( 'newsdot_banner_part_2_label', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'newsdot_banner_part_2_label', array(
	'label'           => __( 'Label for Banner Part 2', 'newsdot' ),
	'type'            => 'text',
	'section'         => 'newsdot_banner_section_options',
	'setting'         => 'newsdot_banner_part_2_label',
	'active_callback' => function() { return get_theme_mod( 'newsdot_show_banner_section', true ); },
) );

// Divider + Heading [Part 3]
$wp_customize->add_setting( 'newsdot_banner_heading_3', array(
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( new Newsdot_Divider_Heading_Control( $wp_customize, 'newsdot_banner_heading_3', array(
	'label'           => __( 'Part 3 (Third Column)', 'newsdot' ),
	'section'         => 'newsdot_banner_section_options',
	'setting'         => 'newsdot_banner_heading_3',
	'active_callback' => function() { return get_theme_mod( 'newsdot_show_banner_section', true ); },
) ) );

// Select category for Banner Part 3
$wp_customize->add_setting( 'newsdot_banner_part_3_cat', array(
	'default'           => 0,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Newsdot_Dropdown_Category_Control( $wp_customize, 'newsdot_banner_part_3_cat', array(
	'label'           => __( 'Select Category for Banner Part 2', 'newsdot' ),
	'section'         => 'newsdot_banner_section_options',
	'setting'         => 'newsdot_banner_part_3_cat',
	'active_callback' => function() { return get_theme_mod( 'newsdot_show_banner_section', true ); },
) ) );

// Label for Banner Part 3
$wp_customize->add_setting( 'newsdot_banner_part_3_label', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'newsdot_banner_part_3_label', array(
	'label'           => __( 'Label for Banner Part 2', 'newsdot' ),
	'type'            => 'text',
	'section'         => 'newsdot_banner_section_options',
	'setting'         => 'newsdot_banner_part_3_label',
	'active_callback' => function() { return get_theme_mod( 'newsdot_show_banner_section', true ); },
) );




// SECTION => Featured Posts at top Options
$wp_customize->add_section( 'newsdot_featured_section_options', array(
	'title' => __( 'Featured Posts Section', 'newsdot' ),
	'panel' => 'newsdot_theme_options_panel',
) );

// Show Featured Posts at top
$wp_customize->add_setting( 'newsdot_show_featured_posts_top', array(
	'default'           => true,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_show_featured_posts_top', array(
	'label'   => __( 'Show Featured Posts Section on Front Page below Banner Section', 'newsdot' ),
	'type'    => 'checkbox',
	'section' => 'newsdot_featured_section_options',
	'setting' => 'newsdot_show_featured_posts_top',
) );

// Select category for Featured Posts Top
$wp_customize->add_setting( 'newsdot_featured_posts_top_cat', array(
	'default'           => 0,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Newsdot_Dropdown_Category_Control( $wp_customize, 'newsdot_featured_posts_top_cat', array(
	'label'           => __( 'Select Category for Featured Posts', 'newsdot' ),
	'section'         => 'newsdot_featured_section_options',
	'setting'         => 'newsdot_featured_posts_top_cat',
	'active_callback' => function() { return get_theme_mod( 'newsdot_show_featured_posts_top', true ); },
) ) );

// Label for Featured Posts Top
$wp_customize->add_setting( 'newsdot_featured_posts_top_label', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'newsdot_featured_posts_top_label', array(
	'label'           => __( 'Label for Featured Posts', 'newsdot' ),
	'type'            => 'text',
	'section'         => 'newsdot_featured_section_options',
	'setting'         => 'newsdot_featured_posts_top_label',
	'active_callback' => function() { return get_theme_mod( 'newsdot_show_featured_posts_top', true ); },
) );




// SECTION => Content Settings
$wp_customize->add_section( 'newsdot_content_options', array(
	'title' => __( 'Content Settings', 'newsdot' ),
	'panel' => 'newsdot_theme_options_panel',
) );

// Show Post Author
$wp_customize->add_setting( 'newsdot_show_post_author', array(
	'default'           => true,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_show_post_author', array(
	'label'   => __( 'Show Post Author', 'newsdot' ),
	'type'    => 'checkbox',
	'section' => 'newsdot_content_options',
	'setting' => 'newsdot_show_post_author',
) );

// Show Post Date
$wp_customize->add_setting( 'newsdot_show_post_date', array(
	'default'           => true,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_show_post_date', array(
	'label'   => __( 'Show Post Date', 'newsdot' ),
	'type'    => 'checkbox',
	'section' => 'newsdot_content_options',
	'setting' => 'newsdot_show_post_date',
) );

// Show Comments Link
$wp_customize->add_setting( 'newsdot_show_comments_link', array(
	'default'           => false,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_show_comments_link', array(
	'label'   => __( 'Show Post Comments Link', 'newsdot' ),
	'type'    => 'checkbox',
	'section' => 'newsdot_content_options',
	'setting' => 'newsdot_show_comments_link',
) );

// Divider + Heading
$wp_customize->add_setting( 'newsdot_content_heading_1', array(
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( new Newsdot_Divider_Heading_Control( $wp_customize, 'newsdot_content_heading_1', array(
	'label'   => __( 'Single Post', 'newsdot' ),
	'section' => 'newsdot_content_options',
	'setting' => 'newsdot_content_heading_1',
) ) );

// Show Last Updated date on single page
$wp_customize->add_setting( 'newsdot_show_updated_date_single', array(
	'default'           => true,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_show_updated_date_single', array(
	'label'           => __( 'Show Last Updated Date on Single Post', 'newsdot' ),
	'type'            => 'checkbox',
	'section'         => 'newsdot_content_options',
	'setting'         => 'newsdot_show_updated_date_single',
	'active_callback' => function() { return get_theme_mod( 'newsdot_show_post_date', true ); },
) );

// Show Post Thumbnail on single page
$wp_customize->add_setting( 'newsdot_show_thumbnail_single', array(
	'default'           => true,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_show_thumbnail_single', array(
	'label'   => __( 'Show Post Thumbnail on Single Post', 'newsdot' ),
	'type'    => 'checkbox',
	'section' => 'newsdot_content_options',
	'setting' => 'newsdot_show_thumbnail_single',
) );

// Show Summary on the left side
$wp_customize->add_setting( 'newsdot_show_summary_single', array(
	'default'           => true,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_show_summary_single', array(
	'label'   => __( 'Show Summary Box on the Left Side', 'newsdot' ),
	'type'    => 'checkbox',
	'section' => 'newsdot_content_options',
	'setting' => 'newsdot_show_summary_single',
) );

// Show 'More On' related to tag
$wp_customize->add_setting( 'newsdot_show_more_content_single', array(
	'default'           => true,
	'sanitize_callback' => 'newsdot_sanitize_checkbox',
) );
$wp_customize->add_control( 'newsdot_show_more_content_single', array(
	'label'       => __( 'Show \'More On\' Box on the Left Side', 'newsdot' ),
	'description' => __( 'Similar posts will be fetched using post\'s tags.', 'newsdot' ),
	'type'        => 'checkbox',
	'section'     => 'newsdot_content_options',
	'setting'     => 'newsdot_show_more_content_single',
) );

// Label for Summary Box
$wp_customize->add_setting( 'newsdot_summary_label', array(
	'default'           => __( 'Summary', 'newsdot' ),
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'newsdot_summary_label', array(
	'label'           => __( 'Label for Summary Box', 'newsdot' ),
	'type'            => 'text',
	'section'         => 'newsdot_content_options',
	'setting'         => 'newsdot_summary_label',
	'active_callback' => function() { return get_theme_mod( 'newsdot_show_summary_single', true ); },
) );

// Label for More On Box
$wp_customize->add_setting( 'newsdot_more_on_label', array(
	'default'           => __( 'More On', 'newsdot' ),
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'newsdot_more_on_label', array(
	'label'           => __( 'Label for \'More On\' Box', 'newsdot' ),
	'type'            => 'text',
	'section'         => 'newsdot_content_options',
	'setting'         => 'newsdot_more_on_label',
	'active_callback' => function() { return get_theme_mod( 'newsdot_show_more_content_single', true ); },
) );





/**
 * SANITIZATION FUNCTIONS
 */

// Sanitize select
function newsdot_sanitize_select( $input, $setting ){

	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	//get the list of possible select options
	$choices = $setting->manager->get_control( $setting->id )->choices;

	//return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

// Sanitize checkbox
function newsdot_sanitize_checkbox( $checked ){

	//returns true if checkbox is checked
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

// Sanitize radio
function newsdot_sanitize_radio( $input, $setting ){

	// input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	// get the list of possible radio box options
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

// Sanitize image
function newsdot_sanitize_image( $image, $setting ) {
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}
