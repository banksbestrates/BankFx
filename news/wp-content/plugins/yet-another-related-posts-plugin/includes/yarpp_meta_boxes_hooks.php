<?php
include_once(YARPP_DIR.'/classes/YARPP_Meta_Box.php');
include_once(YARPP_DIR.'/classes/YARPP_Meta_Box_Contact.php');
include_once(YARPP_DIR.'/classes/YARPP_Meta_Box_Display_Feed.php');
include_once(YARPP_DIR.'/classes/YARPP_Meta_Box_Display_Web.php');
include_once(YARPP_DIR.'/classes/YARPP_Meta_Box_Optin.php');
include_once(YARPP_DIR.'/classes/YARPP_Meta_Box_Pool.php');
include_once(YARPP_DIR.'/classes/YARPP_Meta_Box_Relatedness.php');
include_once(YARPP_DIR.'/classes/YARPP_Meta_Box_Display_Rest_Api.php');

global $yarpp;

add_meta_box(
    'yarpp_pool',
    __( '"The Pool"', 'yarpp' ),
    array(new YARPP_Meta_Box_Pool, 'display'),
    'settings_page_yarpp',
    'normal',
    'core'
);

add_meta_box(
    'yarpp_relatedness',
    __( 'The Algorithm', 'yarpp' ),
    array(
        new YARPP_Meta_Box_Relatedness,
        'display'
    ),
    'settings_page_yarpp',
    'normal',
    'core'
);

add_meta_box(
    'yarpp_display_web',
    __('Automatic Display Options', 'yarpp'),
    array(
        new YARPP_Meta_Box_Display_Web,
        'display'
    ),
    'settings_page_yarpp',
    'normal',
    'core'
);

add_meta_box(
    'yarpp_display_rss',
    __('RSS Feed Options', 'yarpp'),
    array(
        new YARPP_Meta_Box_Display_Feed,
        'display'
    ),
    'settings_page_yarpp',
    'normal',
    'core'
);

if(
	apply_filters('rest_enabled', true) &&
	function_exists('register_rest_route') &&
	class_exists('WP_REST_Controller') &&
	class_exists('WP_REST_Posts_Controller')
){
	add_meta_box(
		'yarpp_display_api',
		__('REST API Options', 'yarpp'),
		array(
			new YARPP_Meta_Box_Display_Rest_Api,
			'display'
		),
		'settings_page_yarpp',
		'normal',
		'core'
	);
}


add_meta_box(
    'yarpp_display_contact',
    __('Contact YARPP', 'yarpp'),
    array(new YARPP_Meta_Box_Contact, 'display'),
    'settings_page_yarpp',
    'side',
    'core'
);


function yarpp_make_optin_classy($classes) {
	if (!yarpp_get_option('optin') )
		$classes[] = 'yarpp_attention';
	return $classes;
}

add_filter(
    "postbox_classes_settings_page_yarpp_yarpp_display_optin",
    'yarpp_make_optin_classy'
);

/** @since 3.3: hook for registering new YARPP meta boxes */
//do_action('add_meta_boxes_settings_page_yarpp');