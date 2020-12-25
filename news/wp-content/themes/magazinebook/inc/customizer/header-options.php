<?php
/**
 * MagazineBook Theme Customizer - Header options
 *
 * @package MagazineBook
 */

// Add Header Options panel.
$wp_customize->add_panel(
	'magazinebook_header_options',
	array(
		'capabitity'  => 'edit_theme_options',
		'description' => __( 'Change the Header Settings', 'magazinebook' ),
		'priority'    => 501,
		'title'       => __( 'Header Options', 'magazinebook' ),
	)
);

// Add main header design section.
$wp_customize->add_section(
	'magazinebook_main_header_section',
	array(
		'title' => __( 'Main Header Area Options', 'magazinebook' ),
		'panel' => 'magazinebook_header_options',
	)
);

$wp_customize->add_setting(
	'magazinebook_main_header_design',
	array(
		'default'           => 'design1',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_radio',
	)
);
$wp_customize->add_control(
	'magazinebook_main_header_design',
	array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Main Header Design:', 'magazinebook' ),
		'section'  => 'magazinebook_main_header_section',
		'settings' => 'magazinebook_main_header_design',
		'choices'  => array(
			'design1' => esc_html__( 'Type 1', 'magazinebook' ),
			'design2' => esc_html__( 'Type 2', 'magazinebook' ),
		),
	)
);

// Add top header bar settings section.
$wp_customize->add_section(
	'magazinebook_top_bar_section',
	array(
		'title' => __( 'Header Top Bar', 'magazinebook' ),
		'panel' => 'magazinebook_header_options',
	)
);

$wp_customize->add_setting(
	'magazinebook_show_top_bar',
	array(
		'priority'          => 1,
		'default'           => true,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'magazinebook_show_top_bar',
	array(
		'type'     => 'checkbox',
		'label'    => __( 'Check to show the top bar in header', 'magazinebook' ),
		'section'  => 'magazinebook_top_bar_section',
		'settings' => 'magazinebook_show_top_bar',
	)
);

$wp_customize->add_setting(
	'magazinebook_top_bar_theme',
	array(
		'default'           => 'dark',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_radio',
	)
);
$wp_customize->add_control(
	'magazinebook_top_bar_theme',
	array(
		'type'            => 'radio',
		'label'           => esc_html__( 'Theme for Header Top Bar:', 'magazinebook' ),
		'section'         => 'magazinebook_top_bar_section',
		'settings'        => 'magazinebook_top_bar_theme',
		'active_callback' => 'magazinebook_is_top_bar_active',
		'choices'         => array(
			'dark'  => esc_html__( 'Dark', 'magazinebook' ),
			'light' => esc_html__( 'Light', 'magazinebook' ),
		),
	)
);

// Add section for Show Date.
$wp_customize->add_section(
	'magazinebook_show_date_section',
	array(
		'title'           => esc_html__( 'Show Date', 'magazinebook' ),
		'panel'           => 'magazinebook_header_options',
		'active_callback' => 'magazinebook_is_top_bar_active',
	)
);

$wp_customize->add_setting(
	'magazinebook_show_date_in_header',
	array(
		'priority'          => 1,
		'default'           => true,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'magazinebook_show_date_in_header',
	array(
		'type'     => 'checkbox',
		'label'    => __( 'Check to show the date top header bar', 'magazinebook' ),
		'section'  => 'magazinebook_show_date_section',
		'settings' => 'magazinebook_show_date_in_header',
	)
);

$wp_customize->add_setting(
	'magazinebook_top_date_type',
	array(
		'default'           => 'theme_date_setting',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_radio',
	)
);
$wp_customize->add_control(
	'magazinebook_top_date_type',
	array(
		'type'            => 'radio',
		'label'           => esc_html__( 'Format for Date in the Header:', 'magazinebook' ),
		'section'         => 'magazinebook_show_date_section',
		'settings'        => 'magazinebook_top_date_type',
		'active_callback' => 'magazinebook_is_top_bar_active',
		'choices'         => array(
			'theme_date_setting'     => esc_html__( 'Theme Date Settings', 'magazinebook' ),
			'wordpress_date_setting' => esc_html__( 'WordPress Date Settings', 'magazinebook' ),
		),
	)
);

// Add section for Show Latest News.
$wp_customize->add_section(
	'magazinebook_show_latest_news_section',
	array(
		'title'           => esc_html__( 'Show Latest News', 'magazinebook' ),
		'panel'           => 'magazinebook_header_options',
		'active_callback' => 'magazinebook_is_top_bar_active',
	)
);

$wp_customize->add_setting(
	'magazinebook_show_latest_news_in_header',
	array(
		'priority'          => 1,
		'default'           => true,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'magazinebook_show_latest_news_in_header',
	array(
		'type'     => 'checkbox',
		'label'    => __( 'Check to show latest news top header bar', 'magazinebook' ),
		'section'  => 'magazinebook_show_latest_news_section',
		'settings' => 'magazinebook_show_latest_news_in_header',
	)
);

// Add section for Social Media.
$wp_customize->add_section(
	'magazinebook_social_media_section',
	array(
		'title'           => esc_html__( 'Social Media Links', 'magazinebook' ),
		'panel'           => 'magazinebook_header_options',
		'active_callback' => 'magazinebook_is_top_bar_active',
	)
);

$wp_customize->add_setting(
	'magazinebook_show_social_in_top_bar',
	array(
		'priority'          => 1,
		'default'           => true,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'magazinebook_show_social_in_top_bar',
	array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to show social media links in header top bar', 'magazinebook' ),
		'section'  => 'magazinebook_social_media_section',
		'settings' => 'magazinebook_show_social_in_top_bar',
	)
);

$magazinebook_social_links = array(
	'magazinebook_social_facebook'   => array(
		'id'      => 'magazinebook_social_facebook',
		'title'   => esc_html__( 'Facebook Link', 'magazinebook' ),
		'default' => '',
	),
	'magazinebook_social_twitter'    => array(
		'id'      => 'magazinebook_social_twitter',
		'title'   => esc_html__( 'Twitter Link', 'magazinebook' ),
		'default' => '',
	),
	'magazinebook_social_instagram'  => array(
		'id'      => 'magazinebook_social_instagram',
		'title'   => esc_html__( 'Instagram Link', 'magazinebook' ),
		'default' => '',
	),
	'magazinebook_social_linkedin'   => array(
		'id'      => 'magazinebook_social_linkedin',
		'title'   => esc_html__( 'LinkedIn Link', 'magazinebook' ),
		'default' => '',
	),
	'magazinebook_social_youtube'    => array(
		'id'      => 'magazinebook_social_youtube',
		'title'   => esc_html__( 'YouTube Link', 'magazinebook' ),
		'default' => '',
	),
	'magazinebook_social_googleplus' => array(
		'id'      => 'magazinebook_social_googleplus',
		'title'   => esc_html__( 'Google-Plus Link', 'magazinebook' ),
		'default' => '',
	),
	'magazinebook_social_pinterest'  => array(
		'id'      => 'magazinebook_social_pinterest',
		'title'   => esc_html__( 'Pinterest Link', 'magazinebook' ),
		'default' => '',
	),
);

foreach ( $magazinebook_social_links as $magazinebook_social_link ) {
	$wp_customize->add_setting(
		$magazinebook_social_link['id'],
		array(
			'default'           => $magazinebook_social_link['default'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		$magazinebook_social_link['id'],
		array(
			'label'           => $magazinebook_social_link['title'],
			'section'         => 'magazinebook_social_media_section',
			'settings'        => $magazinebook_social_link['id'],
			'active_callback' => 'magazinebook_is_social_section_active',
		)
	);
}

$wp_customize->add_setting(
	'magazinebook_display_header_media_on',
	array(
		'default'           => 'home',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_radio',
	)
);
$wp_customize->add_control(
	'magazinebook_display_header_media_on',
	array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Display Header Media On:', 'magazinebook' ),
		'section'  => 'header_image',
		'settings' => 'magazinebook_display_header_media_on',
		'choices'  => array(
			'home' => esc_html__( 'Home Page Only', 'magazinebook' ),
			'all'  => esc_html__( 'All Pages', 'magazinebook' ),
		),
	)
);

$wp_customize->add_setting(
	'magazinebook_header_media_position',
	array(
		'default'           => 'before',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_radio',
	)
);
$wp_customize->add_control(
	'magazinebook_header_media_position',
	array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Header Media Position:', 'magazinebook' ),
		'section'  => 'header_image',
		'settings' => 'magazinebook_header_media_position',
		'choices'  => array(
			'before' => esc_html__( 'Above Header Top Bar', 'magazinebook' ),
			'middle' => esc_html__( 'Below Header Top Bar', 'magazinebook' ),
			'after'  => esc_html__( 'After Main Header', 'magazinebook' ),
		),
	)
);

// Add section for Sticky Menu.
$wp_customize->add_section(
	'magazinebook_sticky_menu_section',
	array(
		'title' => esc_html__( 'Sticky Menu', 'magazinebook' ),
		'panel' => 'magazinebook_header_options',
	)
);

$wp_customize->add_setting(
	'magazinebook_enable_sticky_menu',
	array(
		'default'           => false,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'magazinebook_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'magazinebook_enable_sticky_menu',
	array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to enable the sticky behavior of the primary menu.', 'magazinebook' ),
		'section'  => 'magazinebook_sticky_menu_section',
		'settings' => 'magazinebook_enable_sticky_menu',
	)
);
