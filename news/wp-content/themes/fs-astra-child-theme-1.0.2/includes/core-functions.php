<?php
/*
* Function to enable adding of custom post types easily.
*/


/******************************
* Create new post type
*
* @param  string $cpt_slug the slug of CPT (required)
* @param  string $cpt_name the name of CPT in singular (required)
* @param  string $cpt_name_plural the name of CPT in plural (required)
* @param  array  $args array for register_post_type function (optional)
*
* @return null
******************************/
if(!function_exists('fs_register_post_type')){
	function fs_register_post_type($cpt_slug, $cpt_name, $cpt_name_plural, $args = array()){

		$labels = array(
			'name'                => __( $cpt_name_plural ),
			'singular_name'       => __( $cpt_name),
			'menu_name'           => __( $cpt_name_plural),
			'parent_item_colon'   => __( 'Parent ' . $cpt_name),
			'all_items'           => __( 'All ' . $cpt_name_plural),
			'view_item'           => __( 'View ' . $cpt_name),
			'add_new_item'        => __( 'Add New ' . $cpt_name),
			'add_new'             => __( 'Add New'),
			'edit_item'           => __( 'Edit ' . $cpt_name),
			'update_item'         => __( 'Update ' . $cpt_name),
			'search_items'        => __( 'Search ' . $cpt_name),
			'not_found'           => __( 'No ' . $cpt_name_plural . ' Found'),
			'not_found_in_trash'  => __( 'No ' . $cpt_name_plural . ' found in Trash')
		);

		$args = wp_parse_args( $args, array(
			'label'               => __( $cpt_slug ),
			'description'         => __( $cpt_name_plural . 'Post Type'),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions'),
			'public'              => true,
			'hierarchical'        => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'has_archive'         => true,
			'can_export'          => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post'
		));

		register_post_type( $cpt_slug , $args );

	}
}

/******************************
* Create new taxonomy for a post type
*
* @param  string $taxonomy_slug the slug of custom taxonomy (required)
* @param  string $taxonomy_name the name of custom taxonomy in singular (required)
* @param  string $taxonomy_name_plural the name of custom taxonomy in plural (required)
* @param  string $cpt_slug the slug of CPT (required)
* @param  array  $args array for register_taxonomy function (optional)
*
* @return null
******************************/
if(!function_exists('fs_register_taxonomy')){
	function fs_register_taxonomy($taxonomy_slug, $taxonomy_name, $taxonomy_name_plural, $cpt_slug, $args = array()){
		
		$labels = array(
			'name' => __( $taxonomy_name_plural ),
			'singular_name' => __( $taxonomy_name ),
			'search_items' =>  __( 'Search ' . $taxonomy_name_plural ),
			'all_items' => __( 'All ' . $taxonomy_name_plural ),
			'parent_item' => __( 'Parent ' . $taxonomy_name ),
			'parent_item_colon' => __( 'Parent ' . $taxonomy_name . ':' ),
			'edit_item' => __( 'Edit ' . $taxonomy_name ), 
			'update_item' => __( 'Update ' . $taxonomy_name ),
			'add_new_item' => __( 'Add New ' . $taxonomy_name ),
			'new_item_name' => __( 'New ' . $taxonomy_name . ' Name' ),
			'menu_name' => __(  $taxonomy_name_plural ),
		); 	

		$args =  array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => $taxonomy_slug )
		);

		register_taxonomy( $taxonomy_slug , array( $cpt_slug ), $args );

	}
}

/******************************
* White Labeling Astra
*******************************/

add_filter('astra_addon_get_white_labels', 'fs_modify_theme_labels');
function fs_modify_theme_labels($labels){
	$labels = array(
		'astra-agency' => array(
			'author'        => 'Fantastech Solutions',
			'author_url'    => 'https://fantastech.co/',
			'licence'       => '',
			'hide_branding' => true,
		),
		'astra'        => array(
			'name'        => 'FS Core',
			'description' => 'Thsi is the main parent theme of your website. Do not delete.',
			'screenshot'  => get_stylesheet_directory_uri() . '/assets/images/screenshot-parent.png',
		),
		'astra-pro'    => array(
			'name'        => 'FS Core',
			'description' => 'This is the core plugin required by FS Core theme to function properly.',
		),
	);
	return $labels;
}

/******************************
* To change default small 
* screen break point to 767px
******************************/
add_filter( 'astra_mobile_breakpoint', function() {
    return 767;
});

/******************************
* To change default tablet 
* screen break point to 992px
******************************/
add_filter( 'astra_tablet_breakpoint', function() {
    return 992;
});