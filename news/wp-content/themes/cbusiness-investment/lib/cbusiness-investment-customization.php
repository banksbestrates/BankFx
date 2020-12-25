<?php
function cbusiness_investment_customize_register($wp_customize){

    $wp_customize->add_section('cbusiness_investment_header', array(
        'title'    => esc_html__(' Header Phone and email', 'cbusiness-investment'),
        'description' => '',
        'priority' => 30,
    ));
    
     $wp_customize->add_section('cbusiness_investment_social', array(
        'title'    => esc_html__(' Social Link', 'cbusiness-investment'),
        'description' => '',
        'priority' => 35,
    ));
    	
	$wp_customize->add_section('cbusiness_investment_footer', array(
        'title'    => esc_html__(' Footer', 'cbusiness-investment'),
        'description' => '',
        'priority' => 37,
    ));
 
   //  =============================
    //  = Text Input phone number                =
    //  =============================
    $wp_customize->add_setting('cbusiness_investment_phone', array(
        'default'        => '',
        'sanitize_callback' => 'cbusiness_investment_sanitize_phone_number'
    ));
 
    $wp_customize->add_control('cbusiness_investment_phone', array(
        'label'      => esc_html__('Phone Number', 'cbusiness-investment'),
        'section'    => 'cbusiness_investment_header',
        'setting'   => 'cbusiness_investment_phone',
        'type'    => 'text'
    ));
    
    //  =============================
    //  = Text Input Email                =
    //  =============================
    $wp_customize->add_setting('cbusiness_investment_email', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_email'       
    ));
 
    $wp_customize->add_control('cbusiness_investment_email', array(
        'label'      => esc_html__('Email', 'cbusiness-investment'),
        'section'    => 'cbusiness_investment_header',
        'setting'   => 'cbusiness_investment_email',
        'type'    => 'email'
    ));
    
    //  =============================
    //  = Text Input facebook                =
    //  =============================
    $wp_customize->add_setting('cbusiness_investment_fb', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('cbusiness_investment_fb', array(
        'label'      => esc_html__('Facebook', 'cbusiness-investment'),
        'section'    => 'cbusiness_investment_social',
        'setting'   => 'cbusiness_investment_fb',
        'type'    => 'url'
    ));
    //  =============================
    //  = Text Input Twitter                =
    //  =============================
    $wp_customize->add_setting('cbusiness_investment_twitter', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('cbusiness_investment_twitter', array(
        'label'      => esc_html__('Twitter', 'cbusiness-investment'),
        'section'    => 'cbusiness_investment_social',
        'setting'   => 'cbusiness_investment_twitter',
        'type'    => 'url'
    ));
    //  =============================
    //  = Text Input googleplus                =
    //  =============================
    $wp_customize->add_setting('cbusiness_investment_glplus', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('cbusiness_investment_glplus', array(
        'label'      => esc_html__('Google Plus', 'cbusiness-investment'),
        'section'    => 'cbusiness_investment_social',
        'setting'   => 'cbusiness_investment_glplus',
        'type'    => 'url'
    ));
    //  =============================
    //  = Text Input linkedin                =
    //  =============================
    $wp_customize->add_setting('cbusiness_investment_in', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('cbusiness_investment_in', array(
        'label'      => esc_html__('Linkedin', 'cbusiness-investment'),
        'section'    => 'cbusiness_investment_social',
        'setting'   => 'cbusiness_investment_in',
        'type'    => 'url'
    ));

        //  =============================
    //  = Text Input pininterest                =
    //  =============================
    $wp_customize->add_setting('cbusiness_investment_pin', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('cbusiness_investment_pin', array(
        'label'      => esc_html__('Pinterest', 'cbusiness-investment'),
        'section'    => 'cbusiness_investment_social',
        'setting'   => 'cbusiness_investment_pin',
        'type'    => 'url'
    ));
	//  =============================
    //  = slider section              =
    //  =============================
    $wp_customize->add_section('cbusiness_investment_banner', array(
        'title'    => esc_html__(' Home banner Text', 'cbusiness-investment'),
        'description' => esc_html__('add home banner text here.','cbusiness-investment'),
        'priority' => 36,
    ));
   
// Banner heading Text
    $wp_customize->add_setting('banner_heading',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('banner_heading',array( 
            'type'  => 'text',
            'label' => esc_html__('Add Banner heading here','cbusiness-investment'),
            'section'   => 'cbusiness_investment_banner',
            'setting'   => 'banner_heading'
    )); // Banner heading Text

    // Banner heading Text
    $wp_customize->add_setting('banner_sub_heading',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('banner_sub_heading',array( 
            'type'  => 'text',
            'label' => esc_html__('Add Banner sub heading here','cbusiness-investment'),
            'section'   => 'cbusiness_investment_banner',
            'setting'   => 'banner_sub_heading'
    )); // Banner heading Text

        //  =============================
    //  = url banner readmoret                =
    //  =============================
    $wp_customize->add_setting('cbusiness_investment_slider_url', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('cbusiness_investment_slider_url', array(
        'label'      => esc_html__('Url', 'cbusiness-investment'),
        'section'    => 'cbusiness_investment_banner',
        'setting'   => 'cbusiness_investment_slider_url',
        'type'    => 'url'
    ));

    // Banner heading Text
    $wp_customize->add_setting('cbusiness_investment_slider_readmore',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('cbusiness_investment_slider_readmore',array( 
            'type'  => 'text',
            'label' => esc_html__('Add button text here','cbusiness-investment'),
            'section'   => 'cbusiness_investment_banner',
            'setting'   => 'cbusiness_investment_slider_readmore'
    )); // Banner heading Text

    //  =============================
    //  = box section              =
    //  =============================
    $wp_customize->add_section('cbusiness_investment_box', array(
        'title'    => esc_html__('Resource Section', 'cbusiness-investment'),
        'description' => esc_html__('Upload image, it will auto crop with 400*250.','cbusiness-investment'),
        'priority' => 36,
    ));
   
    $wp_customize->add_setting('cbusiness_investment_box1',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'cbusiness_investment_sanitize_page'
    ));
    
    $wp_customize->add_control('cbusiness_investment_box1',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for Resource first:','cbusiness-investment'),
            'section'   => 'cbusiness_investment_box'
    )); 

    $wp_customize->add_setting('cbusiness_investment_box2',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'cbusiness_investment_sanitize_page'
    ));
    
    $wp_customize->add_control('cbusiness_investment_box2',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for Resource second:','cbusiness-investment'),
            'section'   => 'cbusiness_investment_box'
    )); 

    $wp_customize->add_setting('cbusiness_investment_box3',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'cbusiness_investment_sanitize_page'
    ));
    
    $wp_customize->add_control('cbusiness_investment_box3',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for Resource third:','cbusiness-investment'),
            'section'   => 'cbusiness_investment_box'
    )); 

     $wp_customize->add_setting('cbusiness_investment_box4',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'cbusiness_investment_sanitize_page'
    ));
    
    $wp_customize->add_control('cbusiness_investment_box4',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for Resource fourth:','cbusiness-investment'),
            'section'   => 'cbusiness_investment_box'
    )); 

//  =============================
    //  = box section              =
    //  =============================

  //  =============================
    //  = Footer              =
    //  =============================
	
	// Footer design and developed
	 $wp_customize->add_setting('cbusiness_investment_design', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'
    ));
 
    $wp_customize->add_control('cbusiness_investment_design', array(
        'label'      => esc_html__('Design and developed', 'cbusiness-investment'),
        'section'    => 'cbusiness_investment_footer',
        'setting'   => 'cbusiness_investment_design',
		'type'	   =>'textarea'
    ));
	// Footer copyright
	 $wp_customize->add_setting('cbusiness_investment_copyright', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'       
    ));
 
    $wp_customize->add_control('cbusiness_investment_copyright', array(
        'label'      => esc_html__('Copyright', 'cbusiness-investment'),
        'section'    => 'cbusiness_investment_footer',
        'setting'   => 'cbusiness_investment_copyright',
		'type'	   =>'textarea'
    ));	
}
add_action('customize_register', 'cbusiness_investment_customize_register');

if ( ! function_exists( 'cbusiness_investment_sanitize_page' ) ) :
    function cbusiness_investment_sanitize_page( $page_id, $setting ) {
        // Ensure $input is an absolute integer.
        $page_id = absint( $page_id );
        // If $page_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );
    }

endif;