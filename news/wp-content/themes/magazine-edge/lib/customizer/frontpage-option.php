<?php
/**
 * Front Page Options
 *
 * @package Magazine edge
 */

// Front Page Options Panel.

$wp_customize->add_panel('front_page_option_panel',
    array(
        'title'      => __('Frontpage Options', 'magazine-edge'),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
    )
);


//********************************* //
	
	// Advertisement Section // 

// ********************************//
 
	// Advertisement Section.
	$wp_customize->add_section('frontpage_advertisement_settings',
	    array(
	        'title'      => __('Banner Advertisement', 'magazine-edge'),
	        'priority'   => 1, 
	        'capability' => 'edit_theme_options',
	        'panel'      => 'front_page_option_panel',
	    )
	);
	// Setting magazine_edge_banner_advertisement_section.
	$wp_customize->add_setting('magazine_edge_banner_advertisement_section',
	    array(
	        'default'           => $default['magazine_edge_banner_advertisement_section'],
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'esc_url_raw',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Cropped_Image_Control($wp_customize, 'magazine_edge_banner_advertisement_section',
	        array(
	            'label'       => __('Banner Section Advertisement', 'magazine-edge'),
	            'description' => sprintf(esc_html('Recommended Size %1$s px X %2$s px', 'magazine-edge'), 728, 90),
	            'section'     => 'frontpage_advertisement_settings',
	            'width' => 728,
	            'height' => 90,
	            'flex_width' => true,
	            'flex_height' => true,
	            'priority'    => 120,
                'type' => 'upload',
	        )
	    )
	);

	/*magazine_edge_banner_advertisement_section_url*/
	$wp_customize->add_setting('magazine_edge_banner_advertisement_section_url',
	    array(
	        'default'           => $default['magazine_edge_banner_advertisement_section_url'],
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'esc_url_raw',
	    )
	);
	$wp_customize->add_control('magazine_edge_banner_advertisement_section_url',
	    array(
	        'label'    => __('URL Link', 'magazine-edge'),
	        'section'  => 'frontpage_advertisement_settings',
	        'type'     => 'url',
	        'priority' => 130,
	    )
	);

	/*magazine_edge_banner_advertisement_section_url*/
	$wp_customize->add_setting('magazine_edge_banner_advertisement_open_on_new_tab',
	    array(
	        'default'           => $default['magazine_edge_banner_advertisement_open_on_new_tab'],
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'magazine_edge_sanitize_checkbox',
	    )
	);
	$wp_customize->add_control('magazine_edge_banner_advertisement_open_on_new_tab',
	    array(
	        'label'    => __('Open in new tab', 'magazine-edge'),
	        'section'  => 'frontpage_advertisement_settings',
	        'type'     => 'checkbox',
	        'priority' => 130,
	    )
	);

	// Setting - select_main_banner_section_mode.
	$wp_customize->add_setting('magazine_edge_banner_advertisement_scope',
	    array(
	        'default'           => $default['magazine_edge_banner_advertisement_scope'],
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'magazine_edge_sanitize_select',
	    )
	);
	$wp_customize->add_control( 'magazine_edge_banner_advertisement_scope',
	    array(
	        'label'       => __('Show banner advertisement on', 'magazine-edge'),
	        'description' => __('Select scope to display on banner advertisement section', 'magazine-edge'),
	        'section'     => 'frontpage_advertisement_settings',
	        'type'        => 'radio',
	        'choices'               => array(
	            'front-page-only' => __( 'Show on Homepage only', 'magazine-edge' ),
	            'another-page' => __( 'Show Another Page', 'magazine-edge' ),
	        ),
	        'priority'    => 130,

	    ));


//********************************* //
	
	// Banner Section // 

// ********************************//


	$wp_customize->add_section('magazine_edge_homepage_banner_section_settings',
        array(
            'title'      => __('Homepage Banner Posts', 'magazine-edge'),
            'priority'   => 2,
            'capability' => 'edit_theme_options',
            'panel'      => 'front_page_option_panel',
        )
    );
    $wp_customize->add_setting('magazine_edge_show_homepage_banner_news_section',
        array(
            'default'           => $default['magazine_edge_show_homepage_banner_news_section'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'magazine_edge_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('magazine_edge_show_homepage_banner_news_section',
        array(
            'label'    => __('Enable Homepage Banner Posts Section', 'magazine-edge'),
            'section'  => 'magazine_edge_homepage_banner_section_settings',
            'type'     => 'checkbox',
            'priority' => 22,

        )
    );
    // Setting - drop down category for slider.
    $wp_customize->add_setting('magazine_edge_select_homepage_banner_news_category',
        array(
            'default'           => $default['magazine_edge_select_homepage_banner_news_category'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'magazine_edge_sanitize_select',
        )
    );
    $wp_customize->add_control('magazine_edge_select_homepage_banner_news_category',
        array(
            'label'       => __('Homepage Banner Posts Category', 'magazine-edge'),
            'description' => esc_html__( 'Note :- "Please upload same size image".', 'magazine-edge' ),
            'section'     => 'magazine_edge_homepage_banner_section_settings',
            'type' => 'select',
            'choices' => magazine_edge_get_categories(),
            'priority'    => 24,
            'active_callback' => 'magazine_edge_hompag_banner_posts_section_status'
        ));


    $wp_customize->add_setting('magazine_edge_banner_slider_news_title_length',
        array(
            'default'           => $default['magazine_edge_banner_slider_news_title_length'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control('magazine_edge_banner_slider_news_title_length',
        array(
            'label'    => __('Title Length', 'magazine-edge'),
            'section'  => 'magazine_edge_homepage_banner_section_settings',
            'type'     => 'number',
            'priority' => 25,
            'active_callback' => 'magazine_edge_hompag_banner_posts_section_status'

        )
    );



//********************************* //
	
	// Popular News Section // 

// ********************************//

  
	$wp_customize->add_section('magazine_edge_homepage_popular_section_settings',
        array(
            'title'      => __('Homepage Popular Posts', 'magazine-edge'),
            'priority'   => 2,
            'capability' => 'edit_theme_options',
            'panel'      => 'front_page_option_panel',
        )
    );
    $wp_customize->add_setting('magazine_edge_show_homepage_popular_news_section',
        array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'magazine_edge_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('magazine_edge_show_homepage_popular_news_section',
        array(
            'label'    => __('Enable Homepage Popular Posts Section', 'magazine-edge'),
            'section'  => 'magazine_edge_homepage_popular_section_settings',
            'type'     => 'checkbox',
            'priority' => 22,

        )
    );
	
	$wp_customize->add_setting('magazine_edge_popular_news_title',
        array(
            'default'           => $default['magazine_edge_popular_news_title'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'panel'      => 'front_page_option_panel',
        )
    );
    $wp_customize->add_control('magazine_edge_popular_news_title',
        array(
            'label'    => __('Popular News Title', 'magazine-edge'),
            'section'  => 'magazine_edge_homepage_popular_section_settings',
            'type'     => 'text',
            'priority' => 23,
            'active_callback' => 'magazine_edge_hompag_popular_posts_section_status'

        )
    );
	
    // Setting - drop down category for slider.
    $wp_customize->add_setting('magazine_edge_select_homepage_popular_news_category',
        array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'magazine_edge_sanitize_select',
        )
    );
    $wp_customize->add_control('magazine_edge_select_homepage_popular_news_category',
        array(
            'label'       => __('Homepage Popular Slider Posts Category', 'magazine-edge'),
            'description' => __('Select category to be shown on popular posts ', 'magazine-edge'),
            'section'     => 'magazine_edge_homepage_popular_section_settings',
            'type' => 'select',
            'choices' => magazine_edge_get_categories(),
            'priority'    => 24,
            'active_callback' => 'magazine_edge_hompag_popular_posts_section_status'
        ));


    $wp_customize->add_setting('magazine_edge_select_homepage_popular_news_category2',
        array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'magazine_edge_sanitize_select',
        )
    );
    $wp_customize->add_control('magazine_edge_select_homepage_popular_news_category2',
        array(
            'label'       => __('Homepage Popular Right Side Posts Category', 'magazine-edge'),
            'description' => __('Select category to be shown on popular posts ', 'magazine-edge'),
            'section'     => 'magazine_edge_homepage_popular_section_settings',
            'type' => 'select',
            'choices' => magazine_edge_get_categories(),
            'priority'    => 24,
            'active_callback' => 'magazine_edge_hompag_popular_posts_section_status'
        ));
	
//********************************* //
	
	// Recent News Section // 

// ********************************//
$wp_customize->add_section('magazine_edge_homepage_recent_section_settings',
        array(
            'title'      => __('Homepage Recent Posts', 'magazine-edge'),
            'priority'   => 2,
            'capability' => 'edit_theme_options',
            'panel'      => 'front_page_option_panel',
        )
    );
    $wp_customize->add_setting('magazine_edge_show_homepage_recent_news_section',
        array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'magazine_edge_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('magazine_edge_show_homepage_recent_news_section',
        array(
            'label'    => __('Enable Homepage Recent Posts Section', 'magazine-edge'),
            'section'  => 'magazine_edge_homepage_recent_section_settings',
            'type'     => 'checkbox',
            'priority' => 22,

        )
    );

        $wp_customize->add_setting('magazine_edge_recent_news_title',
        array(
            'default'           => $default['magazine_edge_recent_news_title'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'panel'      => 'front_page_option_panel',
        )
    );
    $wp_customize->add_control('magazine_edge_recent_news_title',
        array(
            'label'    => __('Recent News Title', 'magazine-edge'),
            'section'  => 'magazine_edge_homepage_recent_section_settings',
            'type'     => 'text',
            'priority' => 23,
            'active_callback' => 'magazine_edge_hompag_recent_posts_section_status'

        )
    );
    // Setting - drop down category for slider.
    $wp_customize->add_setting('magazine_edge_select_homepage_recent_news_category',
        array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'magazine_edge_sanitize_select',
        )
    );
    $wp_customize->add_control('magazine_edge_select_homepage_recent_news_category',
        array(
            'label'       => __('Homepage Recent Top Posts Category', 'magazine-edge'),
            'description' => __('Select category to be shown on recent posts ', 'magazine-edge'),
            'section'     => 'magazine_edge_homepage_recent_section_settings',
            'type' => 'select',
            'choices' => magazine_edge_get_categories(),
            'priority'    => 24,
            'active_callback' => 'magazine_edge_hompag_recent_posts_section_status'
        ));

    $wp_customize->add_setting('magazine_edge_select_homepage_recent_news_category2',
        array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'magazine_edge_sanitize_select',
        )
    );
    $wp_customize->add_control('magazine_edge_select_homepage_recent_news_category2',
        array(
            'label'       => __('Homepage Recent Bottom Posts Category', 'magazine-edge'),
            'description' => __('Select category to be shown on recent posts ', 'magazine-edge'),
            'section'     => 'magazine_edge_homepage_recent_section_settings',
            'type' => 'select',
            'choices' => magazine_edge_get_categories(),
            'priority'    => 24,
            'active_callback' => 'magazine_edge_hompag_recent_posts_section_status'
        ));

//********************************* //
	
	// Trending News Section // 

// ********************************//
$wp_customize->add_section('magazine_edge_homepage_trending_section_settings',
        array(
            'title'      => __('Homepage Trending Posts', 'magazine-edge'),
            'priority'   => 2,
            'capability' => 'edit_theme_options',
            'panel'      => 'front_page_option_panel',
        )
    );
    $wp_customize->add_setting('magazine_edge_show_homepage_trending_news_section',
        array(
            'default'           => $default['magazine_edge_show_homepage_trending_news_section'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'magazine_edge_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('magazine_edge_show_homepage_trending_news_section',
        array(
            'label'    => __('Enable Homepage Trending Posts Section', 'magazine-edge'),
            'section'  => 'magazine_edge_homepage_trending_section_settings',
            'type'     => 'checkbox',
            'priority' => 22,

        )
    );

        $wp_customize->add_setting('magazine_edge_trending_news_title',
        array(
            'default'           => $default['magazine_edge_trending_news_title'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'panel'      => 'front_page_option_panel',
        )
    );
    $wp_customize->add_control('magazine_edge_trending_news_title',
        array(
            'label'    => __('Trending News Title', 'magazine-edge'),
            'section'  => 'magazine_edge_homepage_trending_section_settings',
            'type'     => 'text',
            'priority' => 23,
            'active_callback' => 'magazine_edge_hompag_trending_posts_section_status'

        )
    );
    // Setting - drop down category for slider.
    $wp_customize->add_setting('magazine_edge_select_homepage_trending_news_category',
        array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'magazine_edge_sanitize_select',
        )
    );
    $wp_customize->add_control('magazine_edge_select_homepage_trending_news_category',
        array(
            'label'       => __('Homepage Trending Posts Category', 'magazine-edge'),
            'description' => __('Select category to be shown on Trending posts ', 'magazine-edge'),
            'section'     => 'magazine_edge_homepage_trending_section_settings',
            'type' => 'select',
            'choices' => magazine_edge_get_categories(),
            'priority'    => 24,
            'active_callback' => 'magazine_edge_hompag_trending_posts_section_status'
        ));
		
//********************************* //
	
	// Brief News Section // 

// ********************************//
$wp_customize->add_section('magazine_edge_homepage_brief_section_settings',
        array(
            'title'      => __('Homepage Brief Posts', 'magazine-edge'),
            'priority'   => 2,
            'capability' => 'edit_theme_options',
            'panel'      => 'front_page_option_panel',
        )
    );
    $wp_customize->add_setting('magazine_edge_show_homepage_brief_news_section',
        array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'magazine_edge_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('magazine_edge_show_homepage_brief_news_section',
        array(
            'label'    => __('Enable Homepage Brief Posts Section', 'magazine-edge'),
            'section'  => 'magazine_edge_homepage_brief_section_settings',
            'type'     => 'checkbox',
            'priority' => 22,

        )
    );

        $wp_customize->add_setting('magazine_edge_brief_news_title',
        array(
            'default'           => $default['magazine_edge_brief_news_title'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'panel'      => 'front_page_option_panel',
        )
    );
    $wp_customize->add_control('magazine_edge_brief_news_title',
        array(
            'label'    => __('Brief News Title', 'magazine-edge'),
            'section'  => 'magazine_edge_homepage_brief_section_settings',
            'type'     => 'text',
            'priority' => 23,
            'active_callback' => 'magazine_edge_hompag_brief_posts_section_status'

        )
    );   
	   // Setting - drop down category for slider.
    $wp_customize->add_setting('magazine_edge_select_homepage_brief_news_category',
        array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'magazine_edge_sanitize_select',
        )
    );
    $wp_customize->add_control('magazine_edge_select_homepage_brief_news_category',
        array(
            'label'       => __('Homepage Brief Posts Category', 'magazine-edge'),
            'description' => __('Select category to be shown on Brief posts ', 'magazine-edge'),
            'section'     => 'magazine_edge_homepage_brief_section_settings',
            'type' => 'select',
            'choices' => magazine_edge_get_categories(),
            'priority'    => 24,
            'active_callback' => 'magazine_edge_hompag_brief_posts_section_status'
        ));