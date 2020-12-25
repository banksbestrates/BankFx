<?php
/**
 * Multipurpose Magazine Theme Customizer
 * @package Multipurpose Magazine
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function multipurpose_magazine_customize_register( $wp_customize ) {

	class Multipurpose_Magazine_WP_Customize_Range_Control extends WP_Customize_Control{
	    public $type = 'custom_range';
	    public function enqueue(){
	        wp_enqueue_script(
	            'cs-range-control',
	            false,
	            true
	        );
	    }
	    public function render_content(){?>
	        <label>
	            <?php if ( ! empty( $this->label )) : ?>
	                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	            <?php endif; ?>
	            <div class="cs-range-value"><?php echo esc_html($this->value()); ?></div>
	            <input data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
	            <?php if ( ! empty( $this->description )) : ?>
	                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
	            <?php endif; ?>
	        </label>
        <?php }
	}

	//add home page setting pannel
	$wp_customize->add_panel( 'multipurpose_magazine_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'multipurpose-magazine' ),
	    'description' => __( 'Description of what this panel does.', 'multipurpose-magazine' ),
	) );

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'multipurpose_magazine_theme_color_option', array( 
		'panel' => 'multipurpose_magazine_panel_id', 
		'title' => esc_html__( 'Global Color Settings', 'multipurpose-magazine' ) 
	) );

  	$wp_customize->add_setting( 'multipurpose_magazine_first_theme_color', array(
	    'default' => '#ff973b',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_magazine_first_theme_color', array(
  		'label' => 'Color Option',
	    'description' => __('One can change complete theme global color settings on just one click.', 'multipurpose-magazine'),
	    'section' => 'multipurpose_magazine_theme_color_option',
	    'settings' => 'multipurpose_magazine_first_theme_color',
  	)));

	// font array
	$multipurpose_magazine_font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' => 'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' => 'Bree Serif',
        'BenchNine' => 'BenchNine', 
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Cherry Swash' => 'Cherry Swash',
        'Cormorant Garamond' => 'Cormorant Garamond',
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One', 
        'Dosis' => 'Dosis',
        'Droid Sans' => 'Droid Sans',
        'Economica' => 'Economica',
        'Fredoka One' => 'Fredoka One',
        'Fjalla One' => 'Fjalla One',
        'Francois One' => 'Francois One',
        'Frank Ruhl Libre' => 'Frank Ruhl Libre',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' => 'Great Vibes',
        'Handlee' => 'Handlee', 
        'Hammersmith One' => 'Hammersmith One',
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC', 
        'Julius Sans One' => 'Julius Sans One',
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans', 
        'Kanit' => 'Kanit', 
        'Lobster' => 'Lobster', 
        'Lato' => 'Lato',
        'Lora' => 'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather', 
        'Monda' => 'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron', 
        'Patua One' => 'Patua One', 
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk', 
        'Playball' => 'Playball',
        'Playfair Display' => 'Playfair Display', 
        'PT Sans' => 'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' => 'Poiret One', 
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' => 'Quattrocento Sans', 
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Source Sans Pro' => 'Source Sans Pro', 
        'Shadows Into Light Two' =>'Shadows Into Light Two', 
        'Shadows Into Light' => 'Shadows Into Light', 
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand', 
        'Tangerine' => 'Tangerine',
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round', 
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
    );

	//Typography
	$wp_customize->add_section( 'multipurpose_magazine_typography', array(
    	'title'      => __( 'Typography', 'multipurpose-magazine' ),
		'priority'   => 30,
		'panel' => 'multipurpose_magazine_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'multipurpose_magazine_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_magazine_paragraph_color', array(
		'label' => __('Paragraph Color', 'multipurpose-magazine'),
		'section' => 'multipurpose_magazine_typography',
		'settings' => 'multipurpose_magazine_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('multipurpose_magazine_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_magazine_paragraph_font_family', array(
	    'section'  => 'multipurpose_magazine_typography',
	    'label'    => __( 'Paragraph Fonts','multipurpose-magazine'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_magazine_font_array,
	));

	$wp_customize->add_setting('multipurpose_magazine_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_magazine_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_typography',
		'setting'	=> 'multipurpose_magazine_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'multipurpose_magazine_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_magazine_atag_color', array(
		'label' => __('"a" Tag Color', 'multipurpose-magazine'),
		'section' => 'multipurpose_magazine_typography',
		'settings' => 'multipurpose_magazine_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('multipurpose_magazine_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_magazine_atag_font_family', array(
	    'section'  => 'multipurpose_magazine_typography',
	    'label'    => __( '"a" Tag Fonts','multipurpose-magazine'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_magazine_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'multipurpose_magazine_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_magazine_li_color', array(
		'label' => __('"li" Tag Color', 'multipurpose-magazine'),
		'section' => 'multipurpose_magazine_typography',
		'settings' => 'multipurpose_magazine_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('multipurpose_magazine_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_magazine_li_font_family', array(
	    'section'  => 'multipurpose_magazine_typography',
	    'label'    => __( '"li" Tag Fonts','multipurpose-magazine'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_magazine_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'multipurpose_magazine_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_magazine_h1_color', array(
		'label' => __('H1 Color', 'multipurpose-magazine'),
		'section' => 'multipurpose_magazine_typography',
		'settings' => 'multipurpose_magazine_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('multipurpose_magazine_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_magazine_h1_font_family', array(
	    'section'  => 'multipurpose_magazine_typography',
	    'label'    => __( 'H1 Fonts','multipurpose-magazine'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_magazine_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('multipurpose_magazine_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_magazine_h1_font_size',array(
		'label'	=> __('H1 Font Size','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_typography',
		'setting'	=> 'multipurpose_magazine_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'multipurpose_magazine_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_magazine_h2_color', array(
		'label' => __('h2 Color', 'multipurpose-magazine'),
		'section' => 'multipurpose_magazine_typography',
		'settings' => 'multipurpose_magazine_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('multipurpose_magazine_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_magazine_h2_font_family', array(
	    'section'  => 'multipurpose_magazine_typography',
	    'label'    => __( 'h2 Fonts','multipurpose-magazine'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_magazine_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('multipurpose_magazine_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_magazine_h2_font_size',array(
		'label'	=> __('h2 Font Size','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_typography',
		'setting'	=> 'multipurpose_magazine_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'multipurpose_magazine_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_magazine_h3_color', array(
		'label' => __('h3 Color', 'multipurpose-magazine'),
		'section' => 'multipurpose_magazine_typography',
		'settings' => 'multipurpose_magazine_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('multipurpose_magazine_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_magazine_h3_font_family', array(
	    'section'  => 'multipurpose_magazine_typography',
	    'label'    => __( 'h3 Fonts','multipurpose-magazine'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_magazine_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('multipurpose_magazine_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_magazine_h3_font_size',array(
		'label'	=> __('h3 Font Size','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_typography',
		'setting'	=> 'multipurpose_magazine_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'multipurpose_magazine_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_magazine_h4_color', array(
		'label' => __('h4 Color', 'multipurpose-magazine'),
		'section' => 'multipurpose_magazine_typography',
		'settings' => 'multipurpose_magazine_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('multipurpose_magazine_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_magazine_h4_font_family', array(
	    'section'  => 'multipurpose_magazine_typography',
	    'label'    => __( 'h4 Fonts','multipurpose-magazine'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_magazine_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('multipurpose_magazine_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_magazine_h4_font_size',array(
		'label'	=> __('h4 Font Size','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_typography',
		'setting'	=> 'multipurpose_magazine_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'multipurpose_magazine_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_magazine_h5_color', array(
		'label' => __('h5 Color', 'multipurpose-magazine'),
		'section' => 'multipurpose_magazine_typography',
		'settings' => 'multipurpose_magazine_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('multipurpose_magazine_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_magazine_h5_font_family', array(
	    'section'  => 'multipurpose_magazine_typography',
	    'label'    => __( 'h5 Fonts','multipurpose-magazine'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_magazine_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('multipurpose_magazine_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_magazine_h5_font_size',array(
		'label'	=> __('h5 Font Size','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_typography',
		'setting'	=> 'multipurpose_magazine_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'multipurpose_magazine_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_magazine_h6_color', array(
		'label' => __('h6 Color', 'multipurpose-magazine'),
		'section' => 'multipurpose_magazine_typography',
		'settings' => 'multipurpose_magazine_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('multipurpose_magazine_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_magazine_h6_font_family', array(
	    'section'  => 'multipurpose_magazine_typography',
	    'label'    => __( 'h6 Fonts','multipurpose-magazine'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_magazine_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('multipurpose_magazine_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_magazine_h6_font_size',array(
		'label'	=> __('h6 Font Size','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_typography',
		'setting'	=> 'multipurpose_magazine_h6_font_size',
		'type'	=> 'text'
	));

	//Topbar section
	$wp_customize->add_section('multipurpose_magazine_topbar_icon',array(
		'title'	=> __('Topbar Section','multipurpose-magazine'),
		'description'	=> __('Add Header Content here','multipurpose-magazine'),
		'priority'	=> null,
		'panel' => 'multipurpose_magazine_panel_id',
	));

	$wp_customize->add_setting('multipurpose_magazine_top_header',array(
       'default' => false,
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_top_header',array(
       'type' => 'checkbox',
       'label' => __('Enable Top Header','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_topbar_icon'
    ));

    $wp_customize->add_setting('multipurpose_magazine_topbar_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('multipurpose_magazine_topbar_padding',array(
		'label'	=> esc_html__('Topbar Padding','multipurpose-magazine'),
		'section'=> 'multipurpose_magazine_topbar_icon',
	));

    $wp_customize->add_setting('multipurpose_magazine_top_topbar_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_top_topbar_padding',array(
		'description'	=> __('Top','multipurpose-magazine'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'multipurpose_magazine_topbar_icon',
		'type'=> 'number',
	));

	$wp_customize->add_setting('multipurpose_magazine_bottom_topbar_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_bottom_topbar_padding',array(
		'description'	=> __('Bottom','multipurpose-magazine'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'multipurpose_magazine_topbar_icon',
		'type'=> 'number',
	));

    $wp_customize->add_setting('multipurpose_magazine_sticky_header',array(
       'default' => '',
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_sticky_header',array(
       'type' => 'checkbox',
       'label' => __('Stick header on Desktop','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_topbar_icon'
    ));

    $wp_customize->add_setting('multipurpose_magazine_sticky_header_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('multipurpose_magazine_sticky_header_padding',array(
		'label'	=> esc_html__('Sticky Header Padding','multipurpose-magazine'),
		'section'=> 'multipurpose_magazine_topbar_icon',
		'type' => 'hidden',
	));

    $wp_customize->add_setting('multipurpose_magazine_top_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_top_sticky_header_padding',array(
		'description'	=> __('Top','multipurpose-magazine'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'multipurpose_magazine_topbar_icon',
		'type'=> 'number'
	));

	$wp_customize->add_setting('multipurpose_magazine_bottom_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_bottom_sticky_header_padding',array(
		'description'	=> __('Bottom','multipurpose-magazine'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'multipurpose_magazine_topbar_icon',
		'type'=> 'number'
	));

	$wp_customize->add_setting('multipurpose_magazine_show_search',array(
       'default' => 'true',
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_show_search',array(
       'type' => 'checkbox',
       'label' => __('Show/Hide Search','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_topbar_icon'
    ));

    $wp_customize->add_setting('multipurpose_magazine_search_placeholder',array(
       'default' => __('Search','multipurpose-magazine'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('multipurpose_magazine_search_placeholder',array(
       'type' => 'text',
       'label' => __('Search Placeholder text','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_topbar_icon'
    ));

    $wp_customize->add_setting( 'multipurpose_magazine_social_icons_font_size', array(
		'default'=> '16',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Multipurpose_Magazine_WP_Customize_Range_Control( $wp_customize, 'multipurpose_magazine_social_icons_font_size', array(
        'label'  => __('Social Icons Font Size','multipurpose-magazine'),
        'section'  => 'multipurpose_magazine_topbar_icon',
        'description' => __('Measurement is in pixel.','multipurpose-magazine'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

	$wp_customize->add_setting( 'multipurpose_magazine_popular_maazine', array(
		'default'           => '',
		'sanitize_callback' => 'multipurpose_magazine_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'multipurpose_magazine_popular_maazine', array(
		'label'    => __( 'Select Popular Magazine Page', 'multipurpose-magazine' ),
		'description' => __('Image Size ( 570 x 110 )','multipurpose-magazine'),
		'section'  => 'multipurpose_magazine_topbar_icon',
		'type'     => 'dropdown-pages'
	) );

	$wp_customize->add_setting('multipurpose_magazine_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_time',array(
		'label'	=> __('Add Time','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_time',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_time_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_time_text',array(
		'label'	=> __('Add Time Text','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_time_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_temperature',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_temperature',array(
		'label'	=> __('Add Temperature','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_temperature',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_temperature_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_temperature_text',array(
		'label'	=> __('Add Temperature Text','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_temperature_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'multipurpose_magazine_sanitize_email'
	));	
	$wp_customize->add_control('multipurpose_magazine_email',array(
		'label'	=> __('Add Email Address','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_email_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_email_text',array(
		'label'	=> __('Add Email Text','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_email_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_breaking_news',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_breaking_news',array(
		'label'	=> __('Add Breaking News','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_breaking_news',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_login_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_login_text',array(
		'label'	=> __('Add Login Text','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_login_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_login_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_login_link',array(
		'label'	=> __('Add Login Link','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_login_link',
		'type'		=> 'url'
	));

	$wp_customize->add_section('multipurpose_magazine_header',array(
		'title'	=> __('Header','multipurpose-magazine'),
		'priority'	=> null,
		'panel' => 'multipurpose_magazine_panel_id',
	));

	$wp_customize->add_setting('multipurpose_magazine_menu_case',array(
        'default' => 'uppercase',
        'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control('multipurpose_magazine_menu_case',array(
        'type' => 'select',
        'label' => __('Menu Case','multipurpose-magazine'),
        'section' => 'multipurpose_magazine_header',
        'choices' => array(
            'uppercase' => __('Uppercase','multipurpose-magazine'),
            'capitalize' => __('Capitalize','multipurpose-magazine'),
        ),
	) );

	$wp_customize->add_setting( 'multipurpose_magazine_menu_font_size', array(
		'default'=> '14',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Multipurpose_Magazine_WP_Customize_Range_Control( $wp_customize, 'multipurpose_magazine_menu_font_size', array(
        'label'  => __('Menu Font Size','multipurpose-magazine'),
        'section'  => 'multipurpose_magazine_header',
        'description' => __('Measurement is in pixel.','multipurpose-magazine'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

	//Our Blog Category section
  	$wp_customize->add_section('multipurpose_magazine_category_section',array(
	    'title' => __('Slider Section','multipurpose-magazine'),
	    'description' => '',
	    'priority'  => null,
	    'panel' => 'multipurpose_magazine_panel_id',
	)); 

	$wp_customize->add_setting('multipurpose_magazine_slider_hide_show',array(
	  'default' => false,
	  'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
	));
	$wp_customize->add_control('multipurpose_magazine_slider_hide_show',array(
	  'type' => 'checkbox',
	  'label' => __('Show / Hide slider','multipurpose-magazine'),
	  'section' => 'multipurpose_magazine_category_section',
	));

	$wp_customize->add_setting('multipurpose_magazine_slider_title',array(
        'default' => true,
        'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
	));
	$wp_customize->add_control('multipurpose_magazine_slider_title',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Title','multipurpose-magazine'),
      	'section' => 'multipurpose_magazine_category_section'
	));

	$wp_customize->add_setting('multipurpose_magazine_slider_content',array(
        'default' => true,
        'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
	));
	$wp_customize->add_control('multipurpose_magazine_slider_content',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Content','multipurpose-magazine'),
      	'section' => 'multipurpose_magazine_category_section'
	));

	$wp_customize->add_setting('multipurpose_magazine_slider_tags',array(
        'default' => true,
        'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
	));
	$wp_customize->add_control('multipurpose_magazine_slider_tags',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Tags','multipurpose-magazine'),
      	'section' => 'multipurpose_magazine_category_section'
	));

	$wp_customize->add_setting('multipurpose_magazine_slider_date',array(
        'default' => true,
        'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
	));
	$wp_customize->add_control('multipurpose_magazine_slider_date',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Date','multipurpose-magazine'),
      	'section' => 'multipurpose_magazine_category_section'
	));

	$wp_customize->add_setting('multipurpose_magazine_slider_time',array(
        'default' => true,
        'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
	));
	$wp_customize->add_control('multipurpose_magazine_slider_time',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Time','multipurpose-magazine'),
      	'section' => 'multipurpose_magazine_category_section'
	));

	// category 
	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post1[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post1[$category->slug] = $category->name;
	}

    $wp_customize->add_setting('multipurpose_magazine_category3',array(
	    'default' => 'select',
	    'sanitize_callback' => 'multipurpose_magazine_sanitize_choices',
  	));
  	$wp_customize->add_control('multipurpose_magazine_category3',array(
	    'type'    => 'select',
	    'choices' => $cat_post1,
	    'label' => __('Select Category to display Latest Post','multipurpose-magazine'),
	    'section' => 'multipurpose_magazine_category_section',
	));

	//Slider excerpt
	$wp_customize->add_setting( 'multipurpose_magazine_slider_excerpt_number', array(
		'default'              => 15,
		'sanitize_callback'    => 'multipurpose_magazine_sanitize_float',
	) );
	$wp_customize->add_control( 'multipurpose_magazine_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','multipurpose-magazine' ),
		'section'     => 'multipurpose_magazine_category_section',
		'type'        => 'number',
		'settings'    => 'multipurpose_magazine_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('multipurpose_magazine_slider_image_overlay',array(
        'default' => true,
        'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
	));
	$wp_customize->add_control('multipurpose_magazine_slider_image_overlay',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Image Overlay','multipurpose-magazine'),
      	'section' => 'multipurpose_magazine_category_section',
	));

	$wp_customize->add_setting( 'multipurpose_magazine_slider_overlay_color', array(
	    'default' => '#000',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_magazine_slider_overlay_color', array(
	    'label' => __('Slider Overlay Color', 'multipurpose-magazine'),
	    'section' => 'multipurpose_magazine_category_section',
  	)));

	//Opacity
	$wp_customize->add_setting('multipurpose_magazine_slider_opacity',array(
      'default'              => 0.7,
      'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control( 'multipurpose_magazine_slider_opacity', array(
		'label'       => esc_html__( 'Slider Image Opacity','multipurpose-magazine' ),
		'section'     => 'multipurpose_magazine_category_section',
		'type'        => 'select',
		'settings'    => 'multipurpose_magazine_slider_opacity',
		'choices' => array(
	      '0' =>  esc_attr('0','multipurpose-magazine'),
	      '0.1' =>  esc_attr('0.1','multipurpose-magazine'),
	      '0.2' =>  esc_attr('0.2','multipurpose-magazine'),
	      '0.3' =>  esc_attr('0.3','multipurpose-magazine'),
	      '0.4' =>  esc_attr('0.4','multipurpose-magazine'),
	      '0.5' =>  esc_attr('0.5','multipurpose-magazine'),
	      '0.6' =>  esc_attr('0.6','multipurpose-magazine'),
	      '0.7' =>  esc_attr('0.7','multipurpose-magazine'),
	      '0.8' =>  esc_attr('0.8','multipurpose-magazine'),
	      '0.9' =>  esc_attr('0.9','multipurpose-magazine')
	  ),
	));

	//Top Trending Section
	$wp_customize->add_section('multipurpose_magazine_about',array(
		'title'	=> __('Top Trending News','multipurpose-magazine'),
		'description'	=> __('Add Top Trending sections below.','multipurpose-magazine'),
		'panel' => 'multipurpose_magazine_panel_id',
	));

	$wp_customize->add_setting('multipurpose_magazine_page_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_page_title',array(
		'label'	=> __('Section Title','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_about',
		'type'		=> 'text'
	));

	// category 
	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post2[]= 'select';
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cat_post2[$category->slug] = $category->name;
	}

    $wp_customize->add_setting( 'multipurpose_magazine_category', array(
      'default'           => '',
      'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
    ));
    $wp_customize->add_control('multipurpose_magazine_category',array(
		'type'    => 'select',
		'choices' => $cat_post2,
		'label' => __('Select Category to display Latest Post','multipurpose-magazine'),
		'section' => 'multipurpose_magazine_about',
	));

	//layout setting
	$wp_customize->add_section( 'multipurpose_magazine_theme_layout', array(
    	'title'      => __( 'Blog Settings', 'multipurpose-magazine' ),
		'priority'   => null,
		'panel' => 'multipurpose_magazine_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('multipurpose_magazine_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'	        
	) );
	$wp_customize->add_control(new Multipurpose_Magazine_Image_Radio_Control($wp_customize, 'multipurpose_magazine_layout', array(
        'type' => 'radio',
        'label' => esc_html__('Select default layout', 'multipurpose-magazine'),
        'section' => 'multipurpose_magazine_theme_layout',
        'settings' => 'multipurpose_magazine_layout',
        'choices' => array(
            'Right Sidebar' => get_template_directory_uri() . '/images/layout3.png',
            'Left Sidebar' => get_template_directory_uri() . '/images/layout2.png',
            'One Column' => get_template_directory_uri() . '/images/layout1.png',
            'Three Columns' => get_template_directory_uri() . '/images/layout4.png',
            'Four Columns' => get_template_directory_uri() . '/images/layout5.png',
            'Grid Layout' => get_template_directory_uri() . '/images/layout6.png'
        )
    )));

    $wp_customize->add_setting('multipurpose_magazine_metafields_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_metafields_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Date ','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_theme_layout'
    ));

    $wp_customize->add_setting('multipurpose_magazine_metafields_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Author','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_theme_layout'
    ));

    $wp_customize->add_setting('multipurpose_magazine_metafields_comment',array(
       'default' => 'true',
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Comments','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_theme_layout'
    ));

    $wp_customize->add_setting('multipurpose_magazine_post_navigation',array(
       'default' => 'true',
       'sanitize_callback' => 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_post_navigation',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Post Navigation','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_theme_layout'
    ));

    $wp_customize->add_setting('multipurpose_magazine_blog_post_content',array(
    	'default' => 'Excerpt Content',
        'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control('multipurpose_magazine_blog_post_content',array(
        'type' => 'radio',
        'label' => __('Blog Post Content Type','multipurpose-magazine'),
        'section' => 'multipurpose_magazine_theme_layout',
        'choices' => array(
            'No Content' => __('No Content','multipurpose-magazine'),
            'Full Content' => __('Full Content','multipurpose-magazine'),
            'Excerpt Content' => __('Excerpt Content','multipurpose-magazine'),
        ),
	) );

    $wp_customize->add_setting( 'multipurpose_magazine_post_excerpt_number', array(
		'default'              => 20,
        'sanitize_callback'	=> 'multipurpose_magazine_sanitize_float'
	) );
	$wp_customize->add_control( 'multipurpose_magazine_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Excerpt Number (Max 50)','multipurpose-magazine' ),
		'section'     => 'multipurpose_magazine_theme_layout',
		'type'        => 'number',
		'settings'    => 'multipurpose_magazine_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
		'active_callback' => 'multipurpose_magazine_excerpt_enabled'
	) );

	$wp_customize->add_setting( 'multipurpose_magazine_button_excerpt_suffix', array(
		'default'   => '...',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'multipurpose_magazine_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','multipurpose-magazine' ),
		'section'     => 'multipurpose_magazine_theme_layout',
		'type'        => 'text',
		'settings'    => 'multipurpose_magazine_button_excerpt_suffix',
		'active_callback' => 'multipurpose_magazine_excerpt_enabled'
	) );

	$wp_customize->add_setting( 'multipurpose_magazine_feature_image_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Multipurpose_Magazine_WP_Customize_Range_Control( $wp_customize, 'multipurpose_magazine_feature_image_border_radius', array(
        'label'  => __('Featured Image Border Radius','multipurpose-magazine'),
        'section'  => 'multipurpose_magazine_theme_layout',
        'description' => __('Measurement is in pixel.','multipurpose-magazine'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    )));

    $wp_customize->add_setting( 'multipurpose_magazine_feature_image_shadow', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Multipurpose_Magazine_WP_Customize_Range_Control( $wp_customize, 'multipurpose_magazine_feature_image_shadow', array(
        'label'  => __('Featured Image Shadow','multipurpose-magazine'),
        'section'  => 'multipurpose_magazine_theme_layout',
        'description' => __('Measurement is in pixel.','multipurpose-magazine'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    )));

    $wp_customize->add_setting( 'multipurpose_magazine_pagination_type', array(
        'default'			=> 'page-numbers',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'multipurpose_magazine_pagination_type', array(
        'section' => 'multipurpose_magazine_theme_layout',
        'type' => 'select',
        'label' => __( 'Blog Pagination Style', 'multipurpose-magazine' ),
        'choices'		=> array(
            'page-numbers'  => __( 'Number', 'multipurpose-magazine' ),
            'next-prev' => __( 'Next/Prev', 'multipurpose-magazine' ),
    )));

	$wp_customize->add_section( 'multipurpose_magazine_single_post_settings', array(
		'title' => __( 'Single Post Options', 'multipurpose-magazine' ),
		'panel' => 'multipurpose_magazine_panel_id',
	));

	$wp_customize->add_setting('multipurpose_magazine_single_post_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Date','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_single_post_settings'
    ));

    $wp_customize->add_setting('multipurpose_magazine_single_post_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Author','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_single_post_settings'
    ));

    $wp_customize->add_setting('multipurpose_magazine_single_post_comment_no',array(
       'default' => 'true',
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_single_post_comment_no',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment Number','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_single_post_settings'
    ));

	$wp_customize->add_setting('multipurpose_magazine_metafields_tags',array(
       'default' => 'true',
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_metafields_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Tags','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_single_post_settings'
    ));

    $wp_customize->add_setting('multipurpose_magazine_single_post_image',array(
       'default' => 'true',
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_single_post_image',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Featured Image','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_single_post_settings'
    ));

    $wp_customize->add_setting( 'multipurpose_magazine_post_featured_image', array(
        'default' => 'in-content',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'multipurpose_magazine_post_featured_image', array(
        'section' => 'multipurpose_magazine_single_post_settings',
        'type' => 'radio',
        'label' => __( 'Featured Image Display Type', 'multipurpose-magazine' ),
        'choices'		=> array(
            'banner'  => __('as Banner Image', 'multipurpose-magazine'),
            'in-content' => __( 'as Featured Image', 'multipurpose-magazine' ),
    )));

    $wp_customize->add_setting('multipurpose_magazine_single_post_nav',array(
       'default' => 'true',
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_single_post_nav',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Navigation','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_single_post_settings'
    ));

    $wp_customize->add_setting( 'multipurpose_magazine_single_post_prev_nav_text', array(
		'default' => __('Previous','multipurpose-magazine' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'multipurpose_magazine_single_post_prev_nav_text', array(
		'label' => esc_html__( 'Single Post Previous Nav text','multipurpose-magazine' ),
		'section'     => 'multipurpose_magazine_single_post_settings',
		'type'        => 'text',
		'settings'    => 'multipurpose_magazine_single_post_prev_nav_text'
	) );

	$wp_customize->add_setting( 'multipurpose_magazine_single_post_next_nav_text', array(
		'default' => __('Next','multipurpose-magazine' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'multipurpose_magazine_single_post_next_nav_text', array(
		'label' => esc_html__( 'Single Post Next Nav text','multipurpose-magazine' ),
		'section'     => 'multipurpose_magazine_single_post_settings',
		'type'        => 'text',
		'settings'    => 'multipurpose_magazine_single_post_next_nav_text'
	) );

    $wp_customize->add_setting('multipurpose_magazine_single_post_comment',array(
       'default' => 'true',
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_single_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post comment','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_single_post_settings'
    ));

	$wp_customize->add_setting( 'multipurpose_magazine_comment_width', array(
		'default'=> '100',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Multipurpose_Magazine_WP_Customize_Range_Control( $wp_customize, 'multipurpose_magazine_comment_width', array(
        'label'  => __('Comment textarea width','multipurpose-magazine'),
        'section'  => 'multipurpose_magazine_single_post_settings',
        'description' => __('Measurement is in %.','multipurpose-magazine'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
        ),
    )));

    $wp_customize->add_setting('multipurpose_magazine_comment_title',array(
       'default' => __('Leave a Reply','multipurpose-magazine'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('multipurpose_magazine_comment_title',array(
       'type' => 'text',
       'label' => __('Comment form Title','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_single_post_settings'
    ));

    $wp_customize->add_setting('multipurpose_magazine_comment_submit_text',array(
       'default' => __('Post Comment','multipurpose-magazine'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('multipurpose_magazine_comment_submit_text',array(
       'type' => 'text',
       'label' => __('Comment Submit Button Label','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_single_post_settings'
    ));

	$wp_customize->add_setting('multipurpose_magazine_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Related Posts','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_single_post_settings'
    ));

    $wp_customize->add_setting('multipurpose_magazine_related_posts_title',array(
       'default' => __('You May Also Like','multipurpose-magazine'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('multipurpose_magazine_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_single_post_settings'
    ));

    $wp_customize->add_setting( 'multipurpose_magazine_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'multipurpose_magazine_sanitize_float'
	) );
	$wp_customize->add_control( 'multipurpose_magazine_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','multipurpose-magazine' ),
		'section' => 'multipurpose_magazine_single_post_settings',
		'type' => 'number',
		'settings' => 'multipurpose_magazine_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'multipurpose_magazine_post_shown_by', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'multipurpose_magazine_post_shown_by', array(
        'section' => 'multipurpose_magazine_single_post_settings',
        'type' => 'radio',
        'label' => __( 'Related Posts must be shown:', 'multipurpose-magazine' ),
        'choices' => array(
            'categories' => __('By Categories', 'multipurpose-magazine'),
            'tags' => __( 'By Tags', 'multipurpose-magazine' ),
    )));

	// Button option
	$wp_customize->add_section( 'multipurpose_magazine_button_options', array(
		'title' =>  __( 'Button Options', 'multipurpose-magazine' ),
		'panel' => 'multipurpose_magazine_panel_id',
	));

    $wp_customize->add_setting( 'multipurpose_magazine_blog_button_text', array(
		'default'   => __('Read Full','multipurpose-magazine'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'multipurpose_magazine_blog_button_text', array(
		'label'       => esc_html__( 'Blog Post Button Label','multipurpose-magazine' ),
		'section'     => 'multipurpose_magazine_button_options',
		'type'        => 'text',
		'settings'    => 'multipurpose_magazine_blog_button_text'
	) );

	$wp_customize->add_setting('multipurpose_magazine_button_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('multipurpose_magazine_button_padding',array(
		'label'	=> esc_html__('Button Padding','multipurpose-magazine'),
		'section'=> 'multipurpose_magazine_button_options',
		'active_callback' => 'multipurpose_magazine_button_enabled'
	));

	$wp_customize->add_setting('multipurpose_magazine_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_top_button_padding',array(
		'label'	=> __('Top','multipurpose-magazine'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'multipurpose_magazine_button_options',
		'type'=> 'number',
		'active_callback' => 'multipurpose_magazine_button_enabled'
	));

	$wp_customize->add_setting('multipurpose_magazine_bottom_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_bottom_button_padding',array(
		'label'	=> __('Bottom','multipurpose-magazine'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'multipurpose_magazine_button_options',
		'type'=> 'number',
		'active_callback' => 'multipurpose_magazine_button_enabled'
	));

	$wp_customize->add_setting('multipurpose_magazine_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_left_button_padding',array(
		'label'	=> __('Left','multipurpose-magazine'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'multipurpose_magazine_button_options',
		'type'=> 'number',
		'active_callback' => 'multipurpose_magazine_button_enabled'
	));

	$wp_customize->add_setting('multipurpose_magazine_right_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_right_button_padding',array(
		'label'	=> __('Right','multipurpose-magazine'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'multipurpose_magazine_button_options',
		'type'=> 'number',
		'active_callback' => 'multipurpose_magazine_button_enabled'
	));

	$wp_customize->add_setting( 'multipurpose_magazine_button_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Multipurpose_Magazine_WP_Customize_Range_Control( $wp_customize, 'multipurpose_magazine_button_border_radius', array(
        'label'  => __('Border Radius','multipurpose-magazine'),
        'section'  => 'multipurpose_magazine_button_options',
        'description' => __('Measurement is in pixel.','multipurpose-magazine'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
		'active_callback' => 'multipurpose_magazine_button_enabled'
    )));

    //Sidebar setting
	$wp_customize->add_section( 'multipurpose_magazine_sidebar_options', array(
    	'title'   => __( 'Sidebar options', 'multipurpose-magazine' ),
		'priority'   => null,
		'panel' => 'multipurpose_magazine_panel_id'
	) );

	$wp_customize->add_setting('multipurpose_magazine_single_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
    ));
	$wp_customize->add_control('multipurpose_magazine_single_page_layout', array(
        'type' => 'select',
        'label' => __( 'Single Page Layout', 'multipurpose-magazine' ),
        'section' => 'multipurpose_magazine_sidebar_options',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','multipurpose-magazine'),
            'Right Sidebar' => __('Right Sidebar','multipurpose-magazine'),
            'One Column' => __('One Column','multipurpose-magazine')
        ),
    ));

    $wp_customize->add_setting('multipurpose_magazine_single_post_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
    ));
	$wp_customize->add_control('multipurpose_magazine_single_post_layout', array(
        'type' => 'select',
        'label' => __( 'Single Post Layout', 'multipurpose-magazine' ),
        'section' => 'multipurpose_magazine_sidebar_options',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','multipurpose-magazine'),
            'Right Sidebar' => __('Right Sidebar','multipurpose-magazine'),
            'One Column' => __('One Column','multipurpose-magazine')
        ),
    ));

    //Advance Options
	$wp_customize->add_section( 'multipurpose_magazine_advance_options', array(
    	'title' => __( 'Advance Options', 'multipurpose-magazine' ),
		'priority'   => null,
		'panel' => 'multipurpose_magazine_panel_id'
	) );

	$wp_customize->add_setting('multipurpose_magazine_preloader',array(
       'default' => 'true',
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_advance_options'
    ));

    $wp_customize->add_setting( 'multipurpose_magazine_preloader_color', array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_magazine_preloader_color', array(
  		'label' => __('Preloader Color', 'multipurpose-magazine'),
	    'section' => 'multipurpose_magazine_advance_options',
	    'settings' => 'multipurpose_magazine_preloader_color',
  	)));

  	$wp_customize->add_setting( 'multipurpose_magazine_preloader_bg_color', array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_magazine_preloader_bg_color', array(
  		'label' => __('Preloader Background Color', 'multipurpose-magazine'),
	    'section' => 'multipurpose_magazine_advance_options',
	    'settings' => 'multipurpose_magazine_preloader_bg_color',
  	)));

  	$wp_customize->add_setting('multipurpose_magazine_preloader_type',array(
        'default' => 'Square',
        'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control('multipurpose_magazine_preloader_type',array(
        'type' => 'radio',
        'label' => __('Preloader Type','multipurpose-magazine'),
        'section' => 'multipurpose_magazine_advance_options',
        'choices' => array(
            'Square' => __('Square','multipurpose-magazine'),
            'Circle' => __('Circle','multipurpose-magazine'),
        ),
	) );

	$wp_customize->add_setting('multipurpose_magazine_theme_layout_options',array(
        'default' => 'Default Theme',
        'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control('multipurpose_magazine_theme_layout_options',array(
        'type' => 'radio',
        'label' => __('Theme Layout','multipurpose-magazine'),
        'section' => 'multipurpose_magazine_advance_options',
        'choices' => array(
            'Default Theme' => __('Default Theme','multipurpose-magazine'),
            'Container Theme' => __('Container Theme','multipurpose-magazine'),
            'Box Container Theme' => __('Box Container Theme','multipurpose-magazine'),
        ),
	) );

    $wp_customize->add_setting( 'multipurpose_magazine_tags_count', array(
		'default' => 2,
		'sanitize_callback'	=> 'multipurpose_magazine_sanitize_float'
	) );
	$wp_customize->add_control( 'multipurpose_magazine_tags_count', array(
		'label' => esc_html__( 'Tags Count','multipurpose-magazine' ),
		'section' => 'multipurpose_magazine_advance_options',
		'type' => 'number',
		'settings' => 'multipurpose_magazine_tags_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

	//404 Page Option
	$wp_customize->add_section('multipurpose_magazine_404_settings',array(
		'title'	=> __('404 Page & Search Result Settings','multipurpose-magazine'),
		'priority'	=> null,
		'panel' => 'multipurpose_magazine_panel_id',
	));

	$wp_customize->add_setting('multipurpose_magazine_404_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_404_title',array(
		'label'	=> __('404 Title','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('multipurpose_magazine_404_button_label',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_404_button_label',array(
		'label'	=> __('404 button Label','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('multipurpose_magazine_search_result_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_search_result_title',array(
		'label'	=> __('No Search Result Title','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('multipurpose_magazine_search_result_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_search_result_text',array(
		'label'	=> __('No Search Result Text','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_404_settings',
		'type'		=> 'text'
	));	

	//Woocommerce Options
	$wp_customize->add_section('multipurpose_magazine_woocommerce',array(
		'title'	=> __('WooCommerce Options','multipurpose-magazine'),
		'panel' => 'multipurpose_magazine_panel_id',
	));

	$wp_customize->add_setting('multipurpose_magazine_shop_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_shop_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable Shop Page Sidebar','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_woocommerce'
    ));

    $wp_customize->add_setting('multipurpose_magazine_single_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_single_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable Single Product Page Sidebar','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_woocommerce'
    ));

    $wp_customize->add_setting('multipurpose_magazine_single_related_products',array(
       'default' => true,
       'sanitize_callback' => 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_single_related_products',array(
       'type' => 'checkbox',
       'label' => __('Enable Related Products','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_woocommerce'
    ));

    $wp_customize->add_setting('multipurpose_magazine_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_products_per_page',array(
		'label'	=> __('Products Per Page','multipurpose-magazine'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'multipurpose_magazine_woocommerce',
		'type'=> 'number',
	));

	$wp_customize->add_setting('multipurpose_magazine_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control('multipurpose_magazine_products_per_row',array(
		'label'	=> __('Products Per Row','multipurpose-magazine'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'multipurpose_magazine_woocommerce',
		'type'=> 'select',
	));

	$wp_customize->add_setting('multipurpose_magazine_product_border',array(
       'default' => false,
       'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('multipurpose_magazine_product_border',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide product border','multipurpose-magazine'),
       'section' => 'multipurpose_magazine_woocommerce',
    ));

    $wp_customize->add_setting('multipurpose_magazine_product_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('multipurpose_magazine_product_padding',array(
		'label'	=> esc_html__('Product Padding','multipurpose-magazine'),
		'section'=> 'multipurpose_magazine_woocommerce',
	));

	$wp_customize->add_setting( 'multipurpose_magazine_product_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_product_top_padding', array(
		'label' => esc_html__( 'Top','multipurpose-magazine' ),
		'type' => 'number',
		'section' => 'multipurpose_magazine_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('multipurpose_magazine_product_bottom_padding',array(
		'default' => 0,
		'sanitize_callback' => 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_product_bottom_padding', array(
		'label' => esc_html__( 'Bottom','multipurpose-magazine' ),
		'type' => 'number',
		'section' => 'multipurpose_magazine_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('multipurpose_magazine_product_left_padding',array(
		'default' => 0,
		'sanitize_callback' => 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_product_left_padding', array(
		'label' => esc_html__( 'Left','multipurpose-magazine' ),
		'type' => 'number',
		'section' => 'multipurpose_magazine_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'multipurpose_magazine_product_right_padding',array(
		'default' => 0,
		'sanitize_callback' => 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_product_right_padding', array(
		'label' => esc_html__( 'Right','multipurpose-magazine' ),
		'type' => 'number',
		'section' => 'multipurpose_magazine_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'multipurpose_magazine_product_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Multipurpose_Magazine_WP_Customize_Range_Control( $wp_customize, 'multipurpose_magazine_product_border_radius', array(
        'label'  => __('Product Border Radius','multipurpose-magazine'),
        'section'  => 'multipurpose_magazine_woocommerce',
        'description' => __('Measurement is in pixel.','multipurpose-magazine'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

	$wp_customize->add_setting('multipurpose_magazine_product_button_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('multipurpose_magazine_product_button_padding',array(
		'label'	=> esc_html__('Product Button Padding','multipurpose-magazine'),
		'section'=> 'multipurpose_magazine_woocommerce',
	));

	$wp_customize->add_setting( 'multipurpose_magazine_product_button_top_padding',array(
		'default' => 10,
		'sanitize_callback' => 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_product_button_top_padding', array(
		'label' => esc_html__( 'Top','multipurpose-magazine' ),
		'type' => 'number',
		'section' => 'multipurpose_magazine_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('multipurpose_magazine_product_button_bottom_padding',array(
		'default' => 10,
		'sanitize_callback' => 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_product_button_bottom_padding', array(
		'label' => esc_html__( 'Bottom','multipurpose-magazine' ),
		'type' => 'number',
		'section' => 'multipurpose_magazine_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('multipurpose_magazine_product_button_left_padding',array(
		'default' => 15,
		'sanitize_callback' => 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_product_button_left_padding', array(
		'label' => esc_html__( 'Left','multipurpose-magazine' ),
		'type' => 'number',
		'section' => 'multipurpose_magazine_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'multipurpose_magazine_product_button_right_padding',array(
		'default' => 15,
		'sanitize_callback' => 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_product_button_right_padding', array(
		'label' => esc_html__( 'Right','multipurpose-magazine' ),
		'type' => 'number',
		'section' => 'multipurpose_magazine_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'multipurpose_magazine_product_button_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Multipurpose_Magazine_WP_Customize_Range_Control( $wp_customize, 'multipurpose_magazine_product_button_border_radius', array(
        'label'  => __('Product Button Border Radius','multipurpose-magazine'),
        'section'  => 'multipurpose_magazine_woocommerce',
        'description' => __('Measurement is in pixel.','multipurpose-magazine'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('multipurpose_magazine_product_sale_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control('multipurpose_magazine_product_sale_position',array(
        'type' => 'radio',
        'label' => __('Product Sale Position','multipurpose-magazine'),
        'section' => 'multipurpose_magazine_woocommerce',
        'choices' => array(
            'Left' => __('Left','multipurpose-magazine'),
            'Right' => __('Right','multipurpose-magazine'),
        ),
	) );

    $wp_customize->add_setting('multipurpose_magazine_product_sale_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('multipurpose_magazine_product_sale_padding',array(
		'label'	=> esc_html__('Product Sale Padding','multipurpose-magazine'),
		'section'=> 'multipurpose_magazine_woocommerce',
	));

	$wp_customize->add_setting( 'multipurpose_magazine_product_sale_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_product_sale_top_padding', array(
		'label' => esc_html__( 'Top','multipurpose-magazine' ),
		'type' => 'number',
		'section' => 'multipurpose_magazine_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('multipurpose_magazine_product_sale_bottom_padding',array(
		'default' => 0,
		'sanitize_callback' => 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_product_sale_bottom_padding', array(
		'label' => esc_html__( 'Bottom','multipurpose-magazine' ),
		'type' => 'number',
		'section' => 'multipurpose_magazine_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('multipurpose_magazine_product_sale_left_padding',array(
		'default' => 0,
		'sanitize_callback' => 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_product_sale_left_padding', array(
		'label' => esc_html__( 'Left','multipurpose-magazine' ),
		'type' => 'number',
		'section' => 'multipurpose_magazine_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('multipurpose_magazine_product_sale_right_padding',array(
		'default' => 0,
		'sanitize_callback' => 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_product_sale_right_padding', array(
		'label' => esc_html__( 'Right','multipurpose-magazine' ),
		'type' => 'number',
		'section' => 'multipurpose_magazine_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'multipurpose_magazine_product_sale_border_radius',array(
		'default' => '50',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Multipurpose_Magazine_WP_Customize_Range_Control( $wp_customize, 'multipurpose_magazine_product_sale_border_radius', array(
        'label'  => __('Product Sale Border Radius','multipurpose-magazine'),
        'section'  => 'multipurpose_magazine_woocommerce',
        'description' => __('Measurement is in pixel.','multipurpose-magazine'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

	//footer text
	$wp_customize->add_section('multipurpose_magazine_footer_section',array(
		'title'	=> __('Footer Section','multipurpose-magazine'),
		'panel' => 'multipurpose_magazine_panel_id'
	));

	$wp_customize->add_setting('multipurpose_magazine_hide_scroll',array(
        'default' => 'true',
        'sanitize_callback'	=> 'multipurpose_magazine_sanitize_checkbox'
	));
	$wp_customize->add_control('multipurpose_magazine_hide_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Back To Top','multipurpose-magazine'),
      	'section' => 'multipurpose_magazine_footer_section',
	));

	$wp_customize->add_setting('multipurpose_magazine_back_to_top',array(
        'default' => 'Right',
        'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control('multipurpose_magazine_back_to_top',array(
        'type' => 'radio',
        'label' => __('Back to Top Alignment','multipurpose-magazine'),
        'section' => 'multipurpose_magazine_footer_section',
        'choices' => array(
            'Left' => __('Left','multipurpose-magazine'),
            'Right' => __('Right','multipurpose-magazine'),
            'Center' => __('Center','multipurpose-magazine'),
        ),
	) );

	$wp_customize->add_setting('multipurpose_magazine_footer_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'multipurpose_magazine_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'multipurpose-magazine'),
		'section'  => 'multipurpose_magazine_footer_section',
	)));

	$wp_customize->add_setting('multipurpose_magazine_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'multipurpose_magazine_footer_bg_image',array(
        'label' => __('Footer Background Image','multipurpose-magazine'),
        'section' => 'multipurpose_magazine_footer_section'
	)));

	$wp_customize->add_setting('multipurpose_magazine_footer_widget',array(
        'default'           => '4',
        'sanitize_callback' => 'multipurpose_magazine_sanitize_choices',
    ));
    $wp_customize->add_control('multipurpose_magazine_footer_widget',array(
        'type'        => 'radio',
        'label'       => __('No. of Footer columns', 'multipurpose-magazine'),
        'section'     => 'multipurpose_magazine_footer_section',
        'description' => __('Select the number of footer columns and add your widgets in the footer.', 'multipurpose-magazine'),
        'choices' => array(
            '1'     => __('One column', 'multipurpose-magazine'),
            '2'     => __('Two columns', 'multipurpose-magazine'),
            '3'     => __('Three columns', 'multipurpose-magazine'),
            '4'     => __('Four columns', 'multipurpose-magazine')
        ),
    )); 

    $wp_customize->add_setting('multipurpose_magazine_copyright_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('multipurpose_magazine_copyright_padding',array(
		'label'	=> esc_html__('Copyright Padding','multipurpose-magazine'),
		'section'=> 'multipurpose_magazine_footer_section',
	));

    $wp_customize->add_setting('multipurpose_magazine_top_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_top_copyright_padding',array(
		'description'	=> __('Top','multipurpose-magazine'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'multipurpose_magazine_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('multipurpose_magazine_bottom_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'multipurpose_magazine_sanitize_float'
	));
	$wp_customize->add_control('multipurpose_magazine_bottom_copyright_padding',array(
		'description'	=> __('Bottom','multipurpose-magazine'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'multipurpose_magazine_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('multipurpose_magazine_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
	));
	$wp_customize->add_control('multipurpose_magazine_copyright_alignment',array(
        'type' => 'radio',
        'label' => __('Copyright Alignment','multipurpose-magazine'),
        'section' => 'multipurpose_magazine_footer_section',
        'choices' => array(
            'left' => __('Left','multipurpose-magazine'),
            'right' => __('Right','multipurpose-magazine'),
            'center' => __('Center','multipurpose-magazine'),
        ),
	) );

	$wp_customize->add_setting( 'multipurpose_magazine_copyright_font_size', array(
		'default'=> '15',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Multipurpose_Magazine_WP_Customize_Range_Control( $wp_customize, 'multipurpose_magazine_copyright_font_size', array(
        'label'  => __('Copyright Font Size','multipurpose-magazine'),
        'section'  => 'multipurpose_magazine_footer_section',
        'description' => __('Measurement is in pixel.','multipurpose-magazine'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    ))); 
	
	$wp_customize->add_setting('multipurpose_magazine_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_text',array(
		'label'	=> __('Copyright Text','multipurpose-magazine'),
		'description'	=> __('Add some text for footer like copyright etc.','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_footer_section',
		'type'		=> 'text'
	));	
}
add_action( 'customize_register', 'multipurpose_magazine_customize_register' );	

load_template( ABSPATH . 'wp-includes/class-wp-customize-control.php' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

class Multipurpose_Magazine_Image_Radio_Control extends WP_Customize_Control {

    public function render_content() {
 
        if (empty($this->choices))
            return;
 
        $name = '_customize-radio-' . $this->id;
        ?>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <ul class="controls" id='multipurpose-magazine-img-container'>
            <?php
            foreach ($this->choices as $value => $label) :
                $class = ($this->value() == $value) ? 'multipurpose-magazine-radio-img-selected multipurpose-magazine-radio-img-img' : 'multipurpose-magazine-radio-img-img';
                ?>
                <li style="display: inline;">
                    <label>
                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
                          	$this->link();
                          	checked($this->value(), $value);
                          	?> />
                        <img role="img" src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
                    </label>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
        <?php
    }
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Multipurpose_Magazine_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Multipurpose_Magazine_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Multipurpose_Magazine_Customize_Section_Pro(
			$manager,
			'multipurpose_magazine_pro_link',
				array(
				'priority'   => 9,
				'title'    => esc_html__( 'Multipurpose Magazine Pro', 'multipurpose-magazine' ),
				'pro_text' => esc_html__( 'Go Pro', 'multipurpose-magazine' ),
				'pro_url'  => esc_url('https://www.themesglance.com/themes/magazine-wordpress-theme/')
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'multipurpose-magazine-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'multipurpose-magazine-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!

Multipurpose_Magazine_Customize::get_instance();