<?php
/**
 *Recommended way to include parent theme styles.
 *(Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 */
//after theme setup hook for background color
if (!function_exists('mag_and_news_setup')) :
    function mag_and_news_setup()
    {

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('refined_magazine_custom_background_args', array(
            'default-color' => '#ffffff ',
            'default-image' => '',
        )));

    }
endif;
add_action('after_setup_theme', 'mag_and_news_setup');
/**
 * Loads the child theme textdomain.
 */
function mag_and_news_load_language()
{
    load_child_theme_textdomain('mag-and-news');
}

add_action('after_setup_theme', 'mag_and_news_load_language');

/**
 * Enqueue Style
 */
add_action('wp_enqueue_scripts', 'mag_and_news_style');
function mag_and_news_style()
{
    global $refined_magazine_theme_options;
    wp_enqueue_script('masonry');
    wp_enqueue_style('mag-and-news-heading', '//fonts.googleapis.com/css2?family=Pathway+Gothic+One&display=swa');
    wp_enqueue_style('mag-and-news-body', '//fonts.googleapis.com/css?family=Muli');
    wp_enqueue_style('refined-magazine-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('mag-and-news-style', get_stylesheet_directory_uri() . '/style.css', array('refined-magazine-style'));
    wp_enqueue_script('mag-and-news-custom-js', get_stylesheet_directory_uri() . '/js/mag-and-news-custom.js', array('jquery'), '20151215', true);
    $refined_magazine_pagination_option = $refined_magazine_theme_options['refined-magazine-pagination-options'];
    if($refined_magazine_pagination_option == 'load-more'){
        wp_enqueue_script('mag-and-news-custom-pagination', get_stylesheet_directory_uri() . '/js/custom-infinte-pagination.js', array('jquery'), '20151215', true);
        global $wp_query;
        $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
        $max_num_pages = $wp_query->max_num_pages;

        wp_localize_script( 'mag-and-news-custom-pagination', 'mag_and_news_ajax', array(
            'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
            'paged'     => absint($paged),
            'max_num_pages'      => absint($max_num_pages),
            'next_posts'      => next_posts( absint($max_num_pages), false ),
            'show_more'      => __( 'Load More', 'mag-and-news' ),
            'no_more_posts'        => __( 'No More', 'mag-and-news' ),
        ));
    }

}

/**
 * Refined Magazine Theme Customizer default values
 *
 * @package Refined Magazine
 */
if (!function_exists('refined_magazine_default_theme_options_values')) :
    function refined_magazine_default_theme_options_values()
    {
        $default_theme_options = array(

            /*General Colors*/
            'refined-magazine-primary-color' => '#000',
            'refined-magazine-site-title-hover' => '',
            'refined-magazine-site-tagline' => '#000',


            /*Logo Section Colors*/
            'refined-magazine-logo-section-background' => '#f7f7f7',

            /*logo position*/
            'refined-magazine-custom-logo-position' => 'center',

            /*Site Layout Options*/
            'refined-magazine-site-layout-options' => 'full-width',
            'refined-magazine-boxed-width-options' => 1500,

            /*Top Header Section Default Value*/
            'refined-magazine-enable-top-header' => true,
            'refined-magazine-enable-top-header-social' => true,
            'refined-magazine-enable-top-header-menu' => true,
            'refined-magazine-enable-top-header-date' => true,

            /*Treding News*/
            'refined-magazine-enable-trending-news' => true,
            'refined-magazine-enable-trending-news-text' => esc_html__('Trending News', 'mag-and-news'),
            'refined-magazine-trending-news-category' => 0,

            /*Menu Section*/
            'refined-magazine-enable-menu-section-search' => true,
            'refined-magazine-enable-sticky-primary-menu' => true,
            'refined-magazine-enable-menu-home-icon' => true,

            /*Header Ads Default Value*/
            'refined-magazine-enable-ads-header' => false,
            'refined-magazine-header-ads-image' => '',
            'refined-magazine-header-ads-image-link' => 'https://www.candidthemes.com/themes/refined-magazine/',

            /*Slider Section Default Value*/
            'refined-magazine-enable-slider' => true,
            'refined-magazine-select-category' => 0,
            'refined-magazine-select-category-featured-right' => 0,
            'refined-magazine-slider-post-date' => true,
            'refined-magazine-slider-post-author' => false,
            'refined-magazine-slider-post-category' => true,
            'refined-magazine-slider-post-read-time' => true,


            /*Sidebars Default Value*/
            'refined-magazine-sidebar-blog-page' => 'right-sidebar',
            'refined-magazine-sidebar-front-page' => 'right-sidebar',
            'refined-magazine-sidebar-archive-page' => 'right-sidebar',

            /*Blog Page Default Value*/
            'refined-magazine-content-show-from' => 'excerpt',
            'refined-magazine-excerpt-length' => 25,
            'refined-magazine-pagination-options' => 'load-more',
            'refined-magazine-read-more-text' => esc_html__('Continue Reading', 'mag-and-news'),
            'refined-magazine-enable-blog-author' => false,
            'refined-magazine-enable-blog-category' => true,
            'refined-magazine-enable-blog-date' => true,
            'refined-magazine-enable-blog-comment' => false,
            'refined-magazine-enable-blog-tags'=> false,

            /*Single Page Default Value*/
            'refined-magazine-single-page-featured-image' => true,
            'refined-magazine-single-page-related-posts' => true,
            'refined-magazine-single-page-related-posts-title' => esc_html__('Check this too', 'mag-and-news'),
            'refined-magazine-enable-single-category' => true,
            'refined-magazine-enable-single-date' => true,
            'refined-magazine-enable-single-author' => true,


            /*Sticky Sidebar Options*/
            'refined-magazine-enable-sticky-sidebar' => true,

            /*Social Share Options*/
            'refined-magazine-enable-single-sharing' => true,
            'refined-magazine-enable-blog-sharing' => false,
            'refined-magazine-enable-static-page-sharing' => false,

            /*Footer Section*/
            'refined-magazine-footer-copyright' => esc_html__('All Rights Reserved 2020.', 'mag-and-news'),
            'refined-magazine-go-to-top' => true,


            /*Extra Options*/
            'refined-magazine-extra-breadcrumb' => true,
            'refined-magazine-breadcrumb-text' => esc_html__('You are Here', 'mag-and-news'),
            'refined-magazine-extra-preloader' => true,
            'refined-magazine-front-page-content' => false,
            'refined-magazine-extra-hide-read-time' => false,
            'refined-magazine-extra-post-formats-icons' => true,
            'refined-magazine-enable-category-color' => false,

            'refined-magazine-breadcrumb-display-from-option' => 'theme-default',
            'refined-magazine-breadcrumb-display-from-plugins' => 'yoast',

            'refined-magazine-blog-col-options' => 'two-columns',
            'refined-magazine-enable-post-carousel-below-slider' => true,
            'refined-magazine-post-carousel-below-slider-cat' => 0,
            'refined-magazine-enable-post-carousel-below-slider-title' => esc_html__('Featured Posts Carousel', 'mag-and-news'),

        );
        return apply_filters('refined_magazine_default_theme_options_values', $default_theme_options);
    }
endif;


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mag_and_news_customize_register($wp_customize)
{

    $default = refined_magazine_default_theme_options_values();

    /*Blog Page Pagination Options*/
    $wp_customize->add_setting('refined_magazine_options[refined-magazine-blog-col-options]', array(
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => $default['refined-magazine-blog-col-options'],
        'sanitize_callback' => 'refined_magazine_sanitize_select'
    ));
    $wp_customize->add_control('refined_magazine_options[refined-magazine-blog-col-options]', array(
        'choices' => array(
            'one-column' => __('Single Column', 'mag-and-news'),
            'two-columns' => __('Two Column', 'mag-and-news'),
        ),
        'label' => __('Blog Column Options', 'mag-and-news'),
        'description' => __('Select the Required Blog Page Column', 'mag-and-news'),
        'section' => 'refined_magazine_blog_page_section',
        'settings' => 'refined_magazine_options[refined-magazine-blog-col-options]',
        'type' => 'select',
        'priority' => 9,
    ));


    /*Post Carousel Below Slider*/
    $wp_customize->add_section('refined_magazine_post_carousel_below_slider', array(
        'priority' => 26,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Carousel Below Featured Section', 'mag-and-news'),
        'panel' => 'refined_magazine_panel',
    ));
    /*Enable Post Carousel Below Slider*/
    $wp_customize->add_setting('refined_magazine_options[refined-magazine-enable-post-carousel-below-slider]', array(
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => $default['refined-magazine-enable-post-carousel-below-slider'],
        'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('refined_magazine_options[refined-magazine-enable-post-carousel-below-slider]', array(
        'label' => __('Enable Post Carousel Below Slider', 'mag-and-news'),
        'description' => __('Enable post carousel below Slider.', 'mag-and-news'),
        'section' => 'refined_magazine_post_carousel_below_slider',
        'settings' => 'refined_magazine_options[refined-magazine-enable-post-carousel-below-slider]',
        'type' => 'checkbox',
        'priority' => 20,
    ));

    /*callback functions you may missed*/
    if (!function_exists('mag_and_news_post_carousel_enable')) :
        function mag_and_news_post_carousel_enable()
        {
            global $refined_magazine_theme_options;
            $posts_carousel = absint($refined_magazine_theme_options['refined-magazine-enable-post-carousel-below-slider']);
            if (1 == $posts_carousel) {
                return true;
            } else {
                return false;
            }
        }
    endif;

    /*Carousel Category*/
    $wp_customize->add_setting('refined_magazine_options[refined-magazine-post-carousel-below-slider-cat]', array(
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => $default['refined-magazine-post-carousel-below-slider-cat'],
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control(
        new refined_magazine_Customize_Category_Dropdown_Control(
            $wp_customize,
            'refined_magazine_options[refined-magazine-post-carousel-below-slider-cat]',
            array(
                'label' => __('Select Category For Post Carousel', 'mag-and-news'),
                'description' => __('From the dropdown select the category for the first column.', 'mag-and-news'),
                'section' => 'refined_magazine_post_carousel_below_slider',
                'settings' => 'refined_magazine_options[refined-magazine-post-carousel-below-slider-cat]',
                'type' => 'category_dropdown',
                'priority' => 20,
                'active_callback' => 'mag_and_news_post_carousel_enable'
            )
        )
    );


    /*Post Carousel Title*/
    $wp_customize->add_setting('refined_magazine_options[refined-magazine-enable-post-carousel-below-slider-title]', array(
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => $default['refined-magazine-enable-post-carousel-below-slider-title'],
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('refined_magazine_options[refined-magazine-enable-post-carousel-below-slider-title]', array(
        'label' => __('Title Post Carousel Below Slider', 'mag-and-news'),
        'description' => __('Enter the title of Post Carousel.', 'mag-and-news'),
        'section' => 'refined_magazine_post_carousel_below_slider',
        'settings' => 'refined_magazine_options[refined-magazine-enable-post-carousel-below-slider-title]',
        'type' => 'text',
        'priority' => 20,
        'active_callback' => 'mag_and_news_post_carousel_enable',
    ));

    /*Blog Page Pagination Options*/
    $wp_customize->add_setting( 'refined_magazine_options[refined-magazine-pagination-options]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['refined-magazine-pagination-options'],
        'sanitize_callback' => 'refined_magazine_sanitize_select'
    ) );
    $wp_customize->add_control( 'refined_magazine_options[refined-magazine-pagination-options]', array(
       'choices' => refined_magazine_pagination_types(),
       'label'     => __( 'Pagination Types', 'mag-and-news' ),
       'description' => __('Select the Required Pagination Type', 'mag-and-news'),
       'section'   => 'refined_magazine_blog_page_section',
       'settings'  => 'refined_magazine_options[refined-magazine-pagination-options]',
       'type'      => 'select',
       'priority'  => 10,
    ) );
}

add_action('customize_register', 'mag_and_news_customize_register', 999);

/**
 * Load new thumbnail widget
 */
require get_stylesheet_directory() . '/candid-thumbnail-three-col.php';

/**
 * Implement the Custom Header feature.
 */
require get_stylesheet_directory() . '/inc/custom-header.php';


/**
 * Add class in post list
 *
 * @since 1.0.0
 *
 */
add_filter('post_class', 'mag_and_news_post_column_class');
function mag_and_news_post_column_class($classes)
{
    global $refined_magazine_theme_options;
    if (!is_singular()) {
        $classes[] = esc_attr($refined_magazine_theme_options['refined-magazine-blog-col-options']);
    }
    return $classes;
}

if (!function_exists('refined_magazine_footer_siteinfo')) {
    /**
     * Add footer site info block
     *
     * @param none
     * @return void
     * @since 1.0.0
     *
     */
    function refined_magazine_footer_siteinfo()
    {
        ?>

        <div class="site-info" <?php refined_magazine_do_microdata('footer'); ?>>
            <div class="container-inner">
                <?php
                global $refined_magazine_theme_options;
                $refined_magazine_copyright = wp_kses_post($refined_magazine_theme_options['refined-magazine-footer-copyright']);
                if (!empty($refined_magazine_copyright)):
                    ?>
                    <span class="copy-right-text"><?php echo $refined_magazine_copyright; ?></span><br>
                <?php
                endif; //$refined_magazine_copyright
                ?>

                <a href="<?php echo esc_url(__('https://wordpress.org/', 'mag-and-news')); ?>" target="_blank">
                    <?php
                    /* translators: %s: CMS name, i.e. WordPress. */
                    printf(esc_html__('Proudly powered by %s', 'mag-and-news'), 'WordPress');
                    ?>
                </a>
                <span class="sep"> | </span>
                <?php
                /* translators: 1: Theme name, 2: Theme author. */
                printf(esc_html__('Theme: %1$s by %2$s.', 'mag-and-news'), 'Mag and News', '<a href="https://www.candidthemes.com/" target="_blank">Candid Themes</a>');
                ?>
            </div> <!-- .container-inner -->
        </div><!-- .site-info -->
        <?php
    }
}


// Post Carousel from Customizer
if (!function_exists('mag_and_news_post_carousel_customizer')) {
    /**
     * Post Carousel from Customizer
     *
     * @since 1.0.0
     */
    function mag_and_news_post_carousel_customizer()
    {
        global $refined_magazine_theme_options;
        $cat_id = absint($refined_magazine_theme_options['refined-magazine-post-carousel-below-slider-cat']);
        $section_title = esc_html($refined_magazine_theme_options['refined-magazine-enable-post-carousel-below-slider-title']);
        $hide_read_time = $refined_magazine_theme_options['refined-magazine-extra-hide-read-time'];


        $refined_magazine_slider_args = array();
        if(is_rtl()){
            $refined_magazine_slider_args['rtl'] = true;
        }
        $refined_magazine_slider_args_encoded = wp_json_encode( $refined_magazine_slider_args );
        $query_args = array(
            'post_type' => 'post',
            'cat' => $cat_id,
            'posts_per_page' => 9,
            'ignore_sticky_posts' => true
        );

        $query = new WP_Query($query_args);

        if ($query->have_posts()) :

            ?>
            <div class="ct-header-carousel-section">
                <div class="container-inner">
                    <?php
                    if ($section_title) {
                        ?>
                        <h2 class="widget-title"> <?php echo $section_title; ?> </h2>
                        <?php
                    }
                    ?>
                    <div class="ct-header-carousel clearfix" data-slick='<?php echo $refined_magazine_slider_args_encoded; ?>'>
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post();
                            ?>
                            <div class="ct-carousel-single ct-post-overlay">
                                <?php
                                if (has_post_thumbnail()) {
                                    ?>
                                    <div class="post-thumb">
                                        <?php
                                        refined_magazine_post_formats(get_the_ID());
                                        ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('refined-magazine-carousel-img'); ?>
                                        </a>
                                    </div>
                                    <?php
                                } else {
                                    ?>

                                    <div class="post-thumb">
                                        <?php
                                        refined_magazine_post_formats(get_the_ID());
                                        ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo esc_url( get_template_directory_uri()) . '/candidthemes/assets/images/refined-mag-carousel.jpg' ?>"
                                                 alt="<?php the_title(); ?>">

                                        </a>
                                    </div>

                                    <?php
                                }
                                ?>
                                <div class="featured-section-details post-content">
                                    <div class="post-meta">
                                        <?php
                                        refined_magazine_list_category(get_the_ID());
                                        ?>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="post-meta">
                                        <?php
                                        refined_magazine_posted_on();
                                        if ($hide_read_time != 1) {
                                            refined_magazine_read_time_words_count(get_the_ID());
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        <?php
                        endwhile;
                        ?>
                    </div>
                </div> <!-- .container-inner -->
            </div> <!-- .ct-header-carousel-section -->
        <?php
        endif;
        wp_reset_postdata();
    }
}
add_action('mag_and_news_post_carousel_customizer', 'mag_and_news_post_carousel_customizer', 10);


if (!function_exists('refined_magazine_front_page')) :

    function refined_magazine_front_page()
    {

        if (is_active_sidebar('refined-magazine-home-widget-area')) {
            dynamic_sidebar('refined-magazine-home-widget-area');
        }
        global $refined_magazine_theme_options;
        $refined_magazine_front_page_content = $refined_magazine_theme_options['refined-magazine-front-page-content'];

        if (false == $refined_magazine_front_page_content) {
            if ('posts' == get_option('show_on_front')) {
                if (have_posts()) :
                    /* Start the Loop */
                    echo "<div class='mag-and-news-article-wrapper ct-post-list clearfix'>";
                    while (have_posts()) : the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', get_post_format());
                    endwhile;
                    echo "</div>";
                    /**
                     * refined_magazine_post_navigation hook
                     * @since Refined Magazine 1.0.0
                     *
                     * @hooked refined_magazine_posts_navigation -  10
                     */
                    do_action('refined_magazine_action_navigation');

                else :
                    get_template_part('template-parts/content', 'none');
                endif;
            } else {
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'page');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                endwhile; // End of the loop.
            }
        }
    }

endif;

/**
 * Post Navigation Function
 *
 * @param null
 * @return void
 *
 * @since 1.0.0
 *
 */
if (!function_exists('refined_magazine_posts_navigation')) :
    function refined_magazine_posts_navigation()
    {
        global $refined_magazine_theme_options;
        $refined_magazine_pagination_option = $refined_magazine_theme_options['refined-magazine-pagination-options'];
        if ($refined_magazine_pagination_option == 'default') {
            the_posts_navigation();
        } elseif ($refined_magazine_pagination_option == 'load-more') {
            $page_number = get_query_var('paged');
            if ($page_number == 0) {
                $output_page = 2;
            } else {
                $output_page = $page_number + 1;
            }
            if(paginate_links()) {
                echo "<div class='ajax-pagination text-center'><div class='show-more' data-number='$output_page'><i class='fa fa-refresh'></i>" . __('Load More', 'mag-and-news') . "</div><div id='free-temp-post'></div></div>";
            }
        } else {
            echo "<div class='candid-pagination'>";
            the_posts_pagination();
            echo "</div>";
        }
    }
endif;

if (!function_exists('mag_and_news_dynamic_css')) :
    /**
     * Dynamic CSS
     *
     * @since 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function mag_and_news_dynamic_css()
    {
        $mag_and_news_custom_css = '';
        global $refined_magazine_theme_options;
        $mag_and_news_primary_color = esc_attr( $refined_magazine_theme_options['refined-magazine-primary-color'] );
        /* Primary Color Section */
        if (!empty($mag_and_news_primary_color)) {
            //background-color
            $mag_and_news_custom_css .= ".show-more{ background-color : {$mag_and_news_primary_color}; }";
        }
        wp_add_inline_style('mag-and-news-style', $mag_and_news_custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'mag_and_news_dynamic_css', 99);



//Pagination types array function
if( !function_exists( 'refined_magazine_pagination_types' ) ) :
    /*
     * Function to pagination types in array
     */
    function refined_magazine_pagination_types() {

        $pagination_types = array(
            'default'    => __('Default','mag-and-news'),
            'numeric'    => __('Numeric','mag-and-news'),
            'load-more'    => __('Ajax Pagination','mag-and-news'),
        );
        
        return $pagination_types;
    }
endif;