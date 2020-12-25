<?php
/**
 * Theme Functions which enhance the theme by hooking into WordPress
 *
 * @package timesnews
 */


// Navigation Top
function timesnews_navigation_top(){ ?>
    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
        <span class="toggle-text"><?php esc_html_e('Menu','timesnews'); ?></span>
        <span class="toggle-bar"></span>
    </button>

    <?php
    wp_nav_menu( array(
        'container' =>'',
        'theme_location' => 'menu-1',
        'menu_id'        => 'primary-menu',
        'items_wrap'      => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>',
    ) );
}

add_action('timesnews_frontend_navigation_top','timesnews_navigation_top');

// Navigation Secondary
function timesnews_secondary_navigation(){ ?>
   <nav class="secondary-navigation" role="navigation" aria-label="<?php esc_attr_e('Secondary Navigation','timesnews'); ?>">
        <button class="secondary-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span class="secondary-toggle-text"><?php esc_html_e('Menu','timesnews'); ?></span>
            <span class="secondary-toggle-bar"></span>
        </button>
        <?php
        wp_nav_menu( array(
            'container' =>'',
            'theme_location' => 'menu-3',
            'menu_id'        => 'primary-menu',
            'items_wrap'      => '<ul id="primary-menu" class="secondary-menu">%3$s</ul>',
        ) ); ?>
    </nav><!-- .secondary-navigation -->       
<?php }

add_action('timesnews_frontend_secondary_navigation','timesnews_secondary_navigation');

// Search Form 
function timesnews_search_form(){
    $search_text = get_theme_mod('search_text',esc_html__('Search','timesnews')); ?>
<div class="search-container-wrap">
    <div class="search-container">
        <form role="search" method="get" class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>"  role="search"> 
            <label for='s' class='screen-reader-text'><?php esc_html_e( 'Search', 'timesnews' ); ?></label> 
                <input class="search-field" placeholder="<?php echo esc_attr($search_text).'&hellip;'; ?>" name="s" type="search"> 
                <input class="search-submit" value="<?php echo esc_attr($search_text); ?>" type="submit">
        </form>
    </div><!-- .search-container -->
</div><!-- .search-container-wrap -->
    
<?php }
add_action('timesnews_frontend_search_form','timesnews_search_form');

// Social Navigation
function timesnews_social_navigation(){ ?>
    <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Social Navigation','timesnews'); ?>">
        <?php
       
            wp_nav_menu( array(
                'container' =>'',
                'theme_location' => 'menu-2',
                'menu_id'        => 'primary-menu',
                'items_wrap'      => '<ul class="social-links-menu">%3$s</ul>',
                'link_before'    => '<span class="screen-reader-text">',
                'link_after'     => '</span>',
            ) );
        ?>
    </nav><!-- .social-navigation -->

<?php }

add_action('timesnews_frontend_social_navigation','timesnews_social_navigation');

// Site Branding
function timesnews_site_branding(){ ?>
    <div class="site-branding">
        <?php the_custom_logo(); ?>
        <div class="site-branding-text">

            <?php if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
            else :
                ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
            endif;
            $timesnews_description = get_bloginfo( 'description', 'display' );
            if ( $timesnews_description || is_customize_preview() ) :
                ?>
                <p class="site-description"><?php echo $timesnews_description; /* WPCS: xss ok. */ ?></p>
            <?php endif; ?>

        </div><!-- .site-branding-text -->
    </div><!-- .site-branding -->

<?php }

add_action('timesnews_frontend_site_branding','timesnews_site_branding');

// Main Banner
function timesnews_main_banner(){
$disable_main_banner = get_theme_mod('disable_main_banner',0);
$select_main_banner_category = get_theme_mod('select_main_banner_category','');
$no_of_main_banner = get_theme_mod('no_of_main_banner','3');
$slider_options = get_theme_mod('slider-options','main-banner');
$excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','timesnews'));
$excerpt_display = get_theme_mod('excerpt-display','excerpt-content');
$query = new WP_Query(array(
    'posts_per_page' =>  absint($no_of_main_banner),
    'post_type' => array( 'post' ) ,
    'category_name' => esc_attr($select_main_banner_category),
));
if(!is_paged()){
    if($disable_main_banner==0){
        if($select_main_banner_category!='' || $slider_options !='main-banner'){ ?>

            <div class="banner-list">
                <?php 
                if($slider_options == 'metaslider' || $slider_options == 'smartslider' || $slider_options == 'masterslider'){
                    do_action('timesnews_frontend_plugins_slider');
                } else {
                    while ($query->have_posts()):$query->the_post();  ?>
                        <div class="slide">
                            <div class="slide-content">
                                 <?php if(has_post_thumbnail()){ ?>
                                <div class="slide-thumb">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> <?php the_post_thumbnail('timesnews-main-banner'); ?></a>
                                    <?php } ?>
                                </div><!-- .slide-thumb -->

                                <div class="slide-text-wrap">
                                    <div class="slide-text-content">
                                        <div class="slide-meta">
                                            <?php 
                                                timesnews_cat_lists ();
                                                timesnews_posted_on(); 
                                            ?>
                                        </div><!-- .slide-meta -->
                                        <h2 class="slide-title"><a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                   
                                        <div class="slide-text">
                                            <?php 
                                                if($excerpt_display == 'full-content'){
                                                    the_content( sprintf(
                                                    wp_kses(
                                                        /* translators: %s: Name of current post. Only visible to screen readers */
                                                        $excerpt_text. '<span class="screen-reader-text"> "%s"</span>',
                                                        array(
                                                            'span' => array(
                                                                'class' => array(),
                                                            ),
                                                        )
                                                    ),
                                                    get_the_title()
                                                ) );
                                                } else {
                                                    the_excerpt();
                                                } ?>
                                        </div><!-- .slider-text -->
                                   
                                    </div><!-- .slide-text-content -->
                                </div><!-- .slide-text-wrap -->
                            </div><!-- .slide-content -->
                        </div><!-- .slide -->
                    <?php endwhile;
                    wp_reset_postdata();
                } ?>
            </div><!-- .banner-list -->
        <?php }
    }
} ?>

<?php }

add_action('timesnews_frontend_main_banner','timesnews_main_banner');

function timesnews_header_image(){ ?>
    <div class="custom-header">
        <div class="custom-header-media">
            <?php the_custom_header_markup(); ?>
        </div><!-- .custom-header-media -->
    </div><!-- .custom-header -->
<?php
}

add_action('timesnews_frontend_header_image','timesnews_header_image');


// Flash News
function timesnews_flash_news(){
$flash_news_category = get_theme_mod('flash_news_category','');
$flash_news_title_text = get_theme_mod ('flash_news_title_text',esc_html__('Flash News','timesnews'));

if ($flash_news_category ==''){
    $query = new WP_Query(array(
        'post_type' => array( 'post' )
    ));
} else {
    $query = new WP_Query(array(
        'post_type' => array( 'post' ) ,
        'category_name' => esc_attr($flash_news_category),
    ));
}

?>
    <div class="flash-news">
        <?php if ($flash_news_title_text !=''){ ?>
        <div class="flash-news-header">
            <h4 class="flash-news-title"><?php echo esc_html($flash_news_title_text); ?></h4>
        </div>
        <?php } ?>
        <div class="marquee">
            <?php while ($query->have_posts()):$query->the_post(); ?>
                <artical class="news-post-title">
                    <?php if (has_post_thumbnail()){ ?>
                        <span class="news-post-img">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
                         </span>
                     <?php } ?>

                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                </artical>

            <?php endwhile;
                wp_reset_postdata();
            ?>
        </div><!-- .marquee -->
    </div><!-- .flash-news -->
    <?php
}

add_action('timesnews_frontend_flash_news','timesnews_flash_news');

// Attention Zone

function timesnews_attention_zone (){
    $attention_zone_category = get_theme_mod('attention_zone_category','');
    $attention_zone_date = get_theme_mod('attention_zone_date','');
    $excerpt_display = get_theme_mod('excerpt-display','excerpt-content');
    $excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','timesnews'));

    if ($attention_zone_category !=''){
        $query = new WP_Query(array(
            'post_type' => array( 'post' ),
            'category_name' => esc_attr($attention_zone_category),
            'posts_per_page' => 2
        )); ?>

    <div class="attention-zone">
        <div class="wrap">
            <div class="az-content-wrap">
                <?php 
                $x=1;
                while ($query->have_posts()):$query->the_post();

                if ( $x==1 ){ ?>
                    <div class="az-content-one">
                        <?php if (has_post_thumbnail()){ ?>
                            <div class="az-post-thumbnail">
                                 <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
                            </div><!-- .az-post-thumbnail -->
                        <?php } ?>

                        <div class="az-post-content">
                            <h2 class="az-post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                            <div class="az-post-meta">
                                <?php timesnews_cat_lists ();
                                timesnews_posted_on();  ?>
                            </div><!-- .az-post-meta -->
                            <div class="az-text-content">
                               <?php
                            if($excerpt_display == 'full-content'){
                                the_content( sprintf(
                                wp_kses(
                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                    $excerpt_text. '<span class="screen-reader-text"> "%s"</span>',
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                get_the_title()
                            ) );
                            } else {
                                the_excerpt();
                            }
                        ?>
                            </div><!-- .az-text-content -->
                        </div><!-- .az-post-content -->
                    </div><!-- .az-content-one -->
                <?php } else {
                    ?>
                    <div class="az-content-two">
                        <div class="az-highlight">
                            <?php if (!empty($attention_zone_date)){ ?>
                                 <div class="az-date"><?php echo esc_html ($attention_zone_date); ?></div>
                            <?php } ?>

                            <h2 class="az-title"><?php the_title(); ?></h2>
                            <?php
                            if($excerpt_display == 'full-content'){
                                the_content( sprintf(
                                wp_kses(
                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                    $excerpt_text. '<span class="screen-reader-text"> "%s"</span>',
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                get_the_title()
                            ) );
                            } else {
                                the_excerpt();
                            }
                        ?>
                        </div><!-- .az-highlight -->
                    </div><!-- .az-content-two -->
                <?php }

                $x++;

            endwhile;
                 wp_reset_postdata();
                ?>
            </div><!-- .az-content-wrap -->
        </div><!-- .wrap -->
    </div><!-- .attention-zone -->

   <?php  }

}

add_action('timesnews_frontend_attention_zone','timesnews_attention_zone');

// Before Main Banner
function timesnews_main_banner_before(){
$disable_main_banner = get_theme_mod('disable_main_banner',0);
$select_main_banner_category = get_theme_mod('select_main_banner_category','');
$slider_options = get_theme_mod('slider-options','main-banner');
    if($disable_main_banner==0){
        if($select_main_banner_category!='' || $slider_options !='main-banner'){ ?>
            <div class="main-banner">
                <div class="banner-wrap">

        <?php }
    }
}

add_action('timesnews_frontend_mainbanner_before','timesnews_main_banner_before');

// After Main Banner
function timesnews_main_banner_after(){
$disable_main_banner = get_theme_mod('disable_main_banner',0);
$select_main_banner_category = get_theme_mod('select_main_banner_category','');
$slider_options = get_theme_mod('slider-options','main-banner');
    if($disable_main_banner==0){
        if($select_main_banner_category!='' || $slider_options !='main-banner'){ ?>
            </div><!-- .banner-wrap -->
        </div><!-- .main-banner -->

        <?php }
    }
}

add_action('timesnews_frontend_mainbanner_after','timesnews_main_banner_after');

// Main Banner with hook
function timesnews_main_banner_after_hook(){
    $disable_main_banner = get_theme_mod('disable_main_banner',0); 
    if($disable_main_banner ==0 ) {

        /**
        * Main Banner
        */

        if (is_page_template( 'template/timesnews-template.php' )){
            do_action ('timesnews_frontend_mainbanner_before');
            //Static homepage
            do_action('timesnews_frontend_main_banner');
            do_action ('timesnews_frontend_mainbanner_after');
        }
        
    } 

}

add_action('timesnews_frontend_main_banner_after_hook','timesnews_main_banner_after_hook');