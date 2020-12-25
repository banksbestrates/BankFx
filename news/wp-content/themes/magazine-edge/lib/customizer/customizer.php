<?php
/**
 * Magazine edge Theme Customizer
 *
 * @package Magazine edge
 */
if (!function_exists('magazine_edge_get_option')):
function magazine_edge_get_option($key) {
    
    if (empty($key)) 
    {
        return;
    }
    $value = '';

    $default       = magazine_edge_get_default_theme_options();
    $default_value = null;

    if (is_array($default) && isset($default[$key])) {
        $default_value = $default[$key];
    }

    if (null !== $default_value) {
        $value = get_theme_mod($key, $default_value);
    } else {
        $value = get_theme_mod($key);
    }

    return $value;
}
endif;


if ( ! function_exists( 'magazine_edge_flash_posts_section_status' ) ) :

    //callback function
    function magazine_edge_topbar_header( $control ) {

        if ( true == $control->manager->get_setting( 'show_magazine_blog_topbar_header_section' )->value() ) {
            return true;
        } else {
            return false;
        }

    }
    //callback function
    function magazine_edge_topbar_social_link( $control ) {

        if ( true == $control->manager->get_setting( 'show_top_social_section' )->value() ) {
            return true;
        } else {
            return false;
        }

    }



    //callback function
    function magazine_edge_flash_posts_section_status( $control ) {

        if ( true == $control->manager->get_setting( 'magazine_edge_show_flash_news_section' )->value() ) {
            return true;
        } else {
            return false;
        }

    }


        //callback function
    function magazine_edge_blog_page_section_status( $control ) {

        if ( true == $control->manager->get_setting( 'magazine_edge_show_blog_page_section' )->value() ) {
            return true;
        } else {
            return false;
        }

    }


    //callback function
    function magazine_edge_hompag_popular_posts_section_status( $control ) {

        if ( true == $control->manager->get_setting( 'magazine_edge_show_homepage_popular_news_section' )->value() ) {
            return true;
        } else {
            return false;
        }

    }

 


    //callback function
    function magazine_edge_hompag_recent_posts_section_status( $control ) {

        if ( true == $control->manager->get_setting( 'magazine_edge_show_homepage_recent_news_section' )->value() ) {
            return true;
        } else {
            return false;
        }

    }
	
	//callback function
    function magazine_edge_hompag_trending_posts_section_status( $control ) {

        if ( true == $control->manager->get_setting( 'magazine_edge_show_homepage_trending_news_section' )->value() ) {
            return true;
        } else {
            return false;
        }

    }
	
	//callback function
    function magazine_edge_hompag_brief_posts_section_status( $control ) {

        if ( true == $control->manager->get_setting( 'magazine_edge_show_homepage_brief_news_section' )->value() ) {
            return true;
        } else {
            return false;
        }

    }

endif;

    //callback function
    function magazine_edge_hompag_banner_posts_section_status( $control ) {

        if ( true == $control->manager->get_setting( 'magazine_edge_show_homepage_banner_news_section' )->value() ) {
            return true;
        } else {
            return false;
        }

    }

    //callback function
    function magazine_edge_footer_part( $control ) {

        if ( true == $control->manager->get_setting( 'magazine_edge_show_footer_section' )->value() ) {
            return true;
        } else {
            return false;
        }

    }

    if (!function_exists('magazine_edge_get_default_theme_options')):

    /**
     * Get default theme options
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function magazine_edge_get_default_theme_options() {

        $defaults = array();
        // Preloader options section
        $defaults['magazine_edge_enable_site_preloader'] = 0;
		
		// Header options section
        $defaults['magazine_edge_enable_header'] = 0;

        // Topbar Social Section
        $defaults['show_magazine_blog_topbar_header_section'] = 1;
        $defaults['show_top_social_section'] = 1;
        $defaults['topbar_fb_social_link'] = __('#', 'magazine-edge');
        $defaults['topbar_instagram_social_link']= __('#', 'magazine-edge');
        $defaults['topbar_twitter_social_link']= __('#', 'magazine-edge');
        $defaults['topbar_linkedin_social_link']= __('#', 'magazine-edge');
        $defaults['topbar_youtube_social_link']= __('#', 'magazine-edge');

        // Advertisement Option
        $defaults['magazine_edge_banner_advertisement_section'] = 0;
        $defaults['magazine_edge_banner_advertisement_section_url'] = __('#', 'magazine-edge');
        $defaults['magazine_edge_banner_advertisement_open_on_new_tab'] = 1;
        $defaults['magazine_edge_banner_advertisement_scope'] = __('front-page-only', 'magazine-edge');

        // breaking new topbar Section
        $defaults['magazine_edge_show_flash_news_section'] = 1;
        $defaults['magazine_edge_flash_news_title'] = __('Breaking News', 'magazine-edge');
        $defaults['magazine_edge_select_flash_news_category'] = 0;

        // Banner Post Section
        $defaults['magazine_edge_show_homepage_banner_news_section'] = 1;
        $defaults['magazine_edge_select_homepage_banner_news_category'] = 0;
        $defaults['magazine_edge_banner_slider_news_title_length'] = 5;
        $defaults['magazine_edge_show_main_news_section'] = 1;

        // Popular Section
        $defaults['magazine_edge_show_popular_news_section'] = 1;
        $defaults['magazine_edge_popular_news_title'] = __('Popular News', 'magazine-edge');
        $defaults['magazine_edge_select_homepage_popular_news_category'] = 0;
        $defaults['magazine_edge_select_homepage_popular_news_category2'] = 0;

        // Recent Section
        $defaults['magazine_edge_show_recent_news_section'] = 1;
        $defaults['magazine_edge_recent_news_title'] = __('Recent News', 'magazine-edge');
        $defaults['magazine_edge_select_homepage_recent_news_category'] = 0;
        $defaults['magazine_edge_select_homepage_recent_news_category2'] = 0;
		
		// Trending Section
        $defaults['magazine_edge_show_homepage_trending_news_section'] = 1;
        $defaults['magazine_edge_trending_news_title'] = __('Trending News ', 'magazine-edge');
        $defaults['magazine_edge_select_homepage_trending_news_category'] = 0;
        
		// Brief Section
        $defaults['magazine_edge_show_homepage_brief_news_section'] = 1;
        $defaults['magazine_edge_brief_news_title'] = __('Brief News', 'magazine-edge');
        $defaults['magazine_edge_select_homepage_brief_news_category'] = 0;
        
        // Footer.
        $defaults['magazine_edge_show_footer_section'] = 1;
        $defaults['magazine_edge_footer_copyright_text'] = __('Powered by WordPress.', 'magazine-edge');

        // Pass through filter.
        $defaults = apply_filters('magazine_edge_filter_default_theme_options', $defaults);
        return $defaults;
    }
    endif;

function magazine_edge_customize_register($wp_customize) {

    /**
 * Customize Control for Taxonomy Select.
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */
class magazine_edge_Dropdown_Taxonomies_Control extends WP_Customize_Control {

    /**
     * Control type.
     *
     * @access public
     * @var string
     */
    public $type = 'dropdown-taxonomies';

    /**
     * Taxonomy.
     *
     * @access public
     * @var string
     */
    public $taxonomy = '';

    /**
     * Constructor.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Manager $manager Customizer bootstrap instance.
     * @param string               $id      Control ID.
     * @param array                $args    Optional. Arguments to override class property defaults.
     */
    public function __construct( $manager, $id, $args = array() ) {

        $our_taxonomy = 'category';
        if ( isset( $args['taxonomy'] ) ) {
            $taxonomy_exist = taxonomy_exists( $args['taxonomy']  );
            if ( true === $taxonomy_exist ) {
                $our_taxonomy =  $args['taxonomy'];
            }
        }
        $args['taxonomy'] = $our_taxonomy;
        $this->taxonomy =  $our_taxonomy;

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render content.
     *
     * @since 1.0.0
     */
    public function render_content() {

        $tax_args = array(
            'hierarchical' => 0,
            'taxonomy'     => $this->taxonomy,
        );
        $all_taxonomies = get_categories( $tax_args );

        ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <select <?php $this->link(); ?>>
                <?php
                printf( '<option value="%s" %s>%s</option>', 0, selected( $this->value(), '', false ), esc_html__( 'All', 'magazine-edge' )  );
                ?>
                <?php if ( ! empty( $all_taxonomies ) ) :  ?>
                    <?php foreach ( $all_taxonomies as $key => $tax ) :  ?>
                        <?php
                        printf( '<option value="%s" %s>%s</option>', esc_attr( $tax->term_id ), selected( $this->value(), $tax->term_id, false ), esc_html( $tax->name ) );
                        ?>
                    <?php endforeach ?>
                <?php endif ?>
            </select>
        </label>
        <?php
    }
}

class magazine_edge_Customize_Section_Upsell extends WP_Customize_Section {

 
    public function json() {
        $json = parent::json();

        $json['pro_text'] = $this->pro_text;
        $json['pro_url']  = esc_url( $this->pro_url );

        return $json;
    }

    protected function render_template() { ?>

        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

            <h3 class="accordion-section-title">
                <?php if ( data.pro_text && data.pro_url ) { ?>
                <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank"></a>
                <?php } ?>
            </h3>
        </li>
    <?php }
}
/**
 * Sanitization functions.
 *
 * @package Magazine edge
 */

if ( ! function_exists( 'magazine_edge_sanitize_checkbox' ) ) :


    function magazine_edge_sanitize_checkbox( $checked ) {

        return ( ( isset( $checked ) && true === $checked ) ? true : false );

    }

endif;


if ( ! function_exists( 'magazine_edge_sanitize_select' ) ) :

    /**
     * Sanitize select.
     *
     * @since 1.0.0
     *
     * @param mixed                $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     */
    function magazine_edge_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_text_field( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

    }
endif;

if( !function_exists('magazine_edge_get_categories')):
/**
 * Function to list post categories in customizer options
*/
function magazine_edge_get_categories( $select = true, $taxonomy = 'category', $slug = false ){
    
    /* Option list of all categories */
    $categories = array();
    
    $args = array( 
        'hide_empty' => false,
        'taxonomy'   => $taxonomy 
    );
    
    $catlists = get_terms( $args );
    if( $select ) $categories[''] = __( 'Choose Category', 'magazine-edge' );
    foreach( $catlists as $category ){
        if( $slug ){
            $categories[$category->slug] = $category->name;
        }else{
            $categories[$category->term_id] = $category->name;    
        }        
    }
    
    return $categories;
}
endif;

    $default = magazine_edge_get_default_theme_options();
    // use get control
    $wp_customize->get_control( 'header_textcolor')->label = esc_html__( 'Site Title/Tagline Color', 'magazine-edge' );

    require get_template_directory() . '/lib/customizer/theme-options.php';

    // Register custom section types.
    $wp_customize->register_section_type( 'magazine_edge_Customize_Section_Upsell' );

}
add_action('customize_register', 'magazine_edge_customize_register');
?>