<?php
/**
 * Theme Options
 *
 * @package Magazine edge
 */
 
 	$default = magazine_edge_get_default_theme_options();
 
 	require get_template_directory() . '/lib/customizer/frontpage-option.php';


	// Add Theme Options Panel.
	$wp_customize->add_panel('theme_option_panel',
	    array(
	        'title'      => __('Theme Options', 'magazine-edge'),
	        'priority'   => 8,
	        'capability' => 'edit_theme_options',
	    )
	);

//********************************* //
	
	// Page/Post Header 

// ********************************//	

	    $wp_customize->add_section('site_header_settings',
	        array(
	            'title'      => __('Header Options', 'magazine-edge'),
	            'priority'   => 1,
	            'capability' => 'edit_theme_options',
	            'panel'      => 'theme_option_panel',
	        )
	    );
	    // Setting - preloader.
	    $wp_customize->add_setting('magazine_edge_enable_header',
	        array(
	            'default'           => $default['magazine_edge_enable_header'],
	            'capability'        => 'edit_theme_options',
	            'sanitize_callback' => 'magazine_edge_sanitize_checkbox',
	        )
	    );
	    $wp_customize->add_control('magazine_edge_enable_header',
	        array(
	            'label'    => __('Enable Post/page Header', 'magazine-edge'),
	            'section'  => 'site_header_settings',
	            'type'     => 'checkbox',
	            'priority' => 10,
	        )
	    );

//********************************* //
	
	// Preloader Section 

// ********************************//	

	    $wp_customize->add_section('site_preloader_settings',
	        array(
	            'title'      => __('Preloader Options', 'magazine-edge'),
	            'priority'   => 1,
	            'capability' => 'edit_theme_options',
	            'panel'      => 'theme_option_panel',
	        )
	    );
	    // Setting - preloader.
	    $wp_customize->add_setting('magazine_edge_enable_site_preloader',
	        array(
	            'default'           => $default['magazine_edge_enable_site_preloader'],
	            'capability'        => 'edit_theme_options',
	            'sanitize_callback' => 'magazine_edge_sanitize_checkbox',
	        )
	    );
	    $wp_customize->add_control('magazine_edge_enable_site_preloader',
	        array(
	            'label'    => __('Enable preloader', 'magazine-edge'),
	            'section'  => 'site_preloader_settings',
	            'type'     => 'checkbox',
	            'priority' => 10,
	        )
	    );


//********************************* //
	
	// Top Header Social Settings 

// ********************************//

	    $wp_customize->add_section('magazine_edge_header_topbar_section_settings',
	        array(
	            'title'      => __('Topbar Setting', 'magazine-edge'),
	            'priority'   => 3,
	            'capability' => 'edit_theme_options',
	            'panel'      => 'theme_option_panel',
	        )
	    );
	    $wp_customize->add_setting('show_magazine_blog_topbar_header_section',
	        array(
	            'default'           => $default['show_magazine_blog_topbar_header_section'],
	            'capability'        => 'edit_theme_options',
	            'sanitize_callback' => 'magazine_edge_sanitize_checkbox',
	        )
	    );
	    $wp_customize->add_control('show_magazine_blog_topbar_header_section',
	        array(
	            'label'    => __('Enable Topbar Setting', 'magazine-edge'),
	            'section'  => 'magazine_edge_header_topbar_section_settings',
	            'type'     => 'checkbox',
	            'priority' => 2,

	        )
	    );


	    $wp_customize->add_setting('show_top_social_section',
	        array(
	            'default'           => $default['show_top_social_section'],
	            'capability'        => 'edit_theme_options',
	            'sanitize_callback' => 'magazine_edge_sanitize_checkbox',
	        )
	    );
	    $wp_customize->add_control('show_top_social_section',
	        array(
	            'label'    => __('Enable Topbar Social Setting', 'magazine-edge'),
	            'section'  => 'magazine_edge_header_topbar_section_settings',
	            'type'     => 'checkbox',
	            'priority' => 7,

	        )
	    );
	    $wp_customize->add_setting('topbar_fb_social_link',
	        array(
	            'default'           => $default['topbar_fb_social_link'],
	            'capability'        => 'edit_theme_options',
	            'sanitize_callback' => 'esc_url_raw',
	        )
	    );
	    $wp_customize->add_control('topbar_fb_social_link',
	        array(
	            'label'    => __('Facebook URL', 'magazine-edge'),
	            'section'  => 'magazine_edge_header_topbar_section_settings',
	            'type'     => 'url',
	            'priority' => 23,
	            'active_callback' => 'magazine_edge_topbar_social_link'

	        )
	    );

	    $wp_customize->add_setting('topbar_instagram_social_link',
	        array(
	            'default'           => $default['topbar_instagram_social_link'],
	            'capability'        => 'edit_theme_options',
	            'sanitize_callback' => 'esc_url_raw',
	        )
	    );
	    $wp_customize->add_control('topbar_instagram_social_link',
	        array(
	            'label'    => __('Instagram URL', 'magazine-edge'),
	            'section'  => 'magazine_edge_header_topbar_section_settings',
	            'type'     => 'url',
	            'priority' => 25,
	            'active_callback' => 'magazine_edge_topbar_social_link'

	        )
	    );

	    $wp_customize->add_setting('topbar_twitter_social_link',
	        array(
	            'default'           => $default['topbar_twitter_social_link'],
	            'capability'        => 'edit_theme_options',
	            'sanitize_callback' => 'esc_url_raw',
	        )
	    );
	    $wp_customize->add_control('topbar_twitter_social_link',
	        array(
	            'label'    => __('Twitter URL', 'magazine-edge'),
	            'section'  => 'magazine_edge_header_topbar_section_settings',
	            'type'     => 'url',
	            'priority' => 25,
	            'active_callback' => 'magazine_edge_topbar_social_link'

	        )
	    );
	    $wp_customize->add_setting('topbar_linkedin_social_link',
	        array(
	            'default'           => $default['topbar_linkedin_social_link'],
	            'capability'        => 'edit_theme_options',
	            'sanitize_callback' => 'esc_url_raw',
	        )
	    );
	    $wp_customize->add_control('topbar_linkedin_social_link',
	        array(
	            'label'    => __('Linkedin URL', 'magazine-edge'),
	            'section'  => 'magazine_edge_header_topbar_section_settings',
	            'type'     => 'url',
	            'priority' => 26,
	            'active_callback' => 'magazine_edge_topbar_social_link'

	        )
	    );
	    $wp_customize->add_setting('topbar_youtube_social_link',
	        array(
	            'default'           => $default['topbar_youtube_social_link'],
	            'capability'        => 'edit_theme_options',
	            'sanitize_callback' => 'esc_url_raw',
	        )
	    );
	    $wp_customize->add_control('topbar_youtube_social_link',
	        array(
	            'label'    => __('Youtube URL', 'magazine-edge'),
	            'section'  => 'magazine_edge_header_topbar_section_settings',
	            'type'     => 'url',
	            'priority' => 27,
	            'active_callback' => 'magazine_edge_topbar_social_link'

	        )
	    );


//********************************* //
	
	// Trending Posts Section 

// ********************************//

		$wp_customize->add_section('magazine_edge_flash_posts_section_settings',
		    array(
		        'title'      => __('Breaking News Settings', 'magazine-edge'),
		        'priority'   => 4,
		        'capability' => 'edit_theme_options',
		        'panel'      => 'theme_option_panel',
		    )
		);
		$wp_customize->add_setting('magazine_edge_show_flash_news_section',
		    array(
		        'default'           => $default['magazine_edge_show_flash_news_section'],
		        'capability'        => 'edit_theme_options',
		        'sanitize_callback' => 'magazine_edge_sanitize_checkbox',
		    )
		);
		$wp_customize->add_control('magazine_edge_show_flash_news_section',
		    array(
		        'label'    => __('Enable Breaking News Section', 'magazine-edge'),
		        'section'  => 'magazine_edge_flash_posts_section_settings',
		        'type'     => 'checkbox',
		        'priority' => 22,

		    )
		);
		// Setting - number_of_slides.
		$wp_customize->add_setting('magazine_edge_flash_news_title',
		    array(
		        'default'           => $default['magazine_edge_flash_news_title'],
		        'capability'        => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('magazine_edge_flash_news_title',
		    array(
		        'label'    => __('Breaking News Title', 'magazine-edge'),
		        'section'  => 'magazine_edge_flash_posts_section_settings',
		        'type'     => 'text',
		        'priority' => 23,
		        'active_callback' => 'magazine_edge_flash_posts_section_status'

		    )
		);
		// Setting - drop down category for slider.
		$wp_customize->add_setting('magazine_edge_select_flash_news_category',
		    array(
		        'default'           => $default['magazine_edge_select_flash_news_category'],
		        'capability'        => 'edit_theme_options',
		        'sanitize_callback' => 'magazine_edge_sanitize_select',
		    )
		);
		$wp_customize->add_control('magazine_edge_select_flash_news_category',
		    array(
		        'label'       => __('Breaking News Category', 'magazine-edge'),
		        'section'     => 'magazine_edge_flash_posts_section_settings',
				'type' => 'select',
            	'choices' => magazine_edge_get_categories(),
		        'priority'    => 23,
		        'active_callback' => 'magazine_edge_flash_posts_section_status'
		   ));


//********************************* //
	
	// footer section options 

// ********************************//

	    $wp_customize->add_section('site_footer_settings',
	        array(
	            'title'      => __('Footer', 'magazine-edge'),
	            'priority'   => 50,
	            'capability' => 'edit_theme_options',
	            'panel'      => 'theme_option_panel',
	        )
	    );
	    $wp_customize->add_setting('magazine_edge_show_footer_section',
	        array(
	            'default'           => $default['magazine_edge_show_footer_section'],
	            'capability'        => 'edit_theme_options',
	            'sanitize_callback' => 'magazine_edge_sanitize_checkbox',
	        )
	    );
	    $wp_customize->add_control('magazine_edge_show_footer_section',
	        array(
	            'label'    => __('Enable Bottom Footer Section', 'magazine-edge'),
	            'section'  => 'site_footer_settings',
	            'type'     => 'checkbox',
	            'priority' => 2,

	        )
	    );
	    // Setting - global content alignment of news.
	    $wp_customize->add_setting('magazine_edge_footer_copyright_text',
	        array(
	            'default'           => $default['magazine_edge_footer_copyright_text'],
	            'capability'        => 'edit_theme_options',
	            'sanitize_callback' => 'sanitize_textarea_field',
	        )
	    );
	    $wp_customize->add_control( 'magazine_edge_footer_copyright_text',
	        array(
	            'label'    => __( 'Copyright Text', 'magazine-edge' ),
	            'section'  => 'site_footer_settings',
	            'type'     => 'textarea',
	            'priority' => 100,
	            'active_callback' => 'magazine_edge_footer_part'
	        )
	    );