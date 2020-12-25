<?php
/**
 * The Header for our theme.
 * @package Multipurpose Magazine
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
  } else {
    do_action( 'wp_body_open' );
  }?>

  <?php if(get_theme_mod('multipurpose_magazine_preloader',true)){ ?>
    <?php if(get_theme_mod( 'multipurpose_magazine_preloader_type','Square') == 'Square'){ ?>
      <div id="overlayer"></div>
      <span class="tg-loader">
        <span class="tg-loader-inner"></span>
      </span>
    <?php }else if(get_theme_mod( 'multipurpose_magazine_preloader_type') == 'Circle') {?>    
      <div class="preloader">
        <div class="preloader-container">
          <span class="animated-preloader"></span>
        </div>
      </div>
    <?php }?>
  <?php }?>
  
  <header role="banner">
    <div id="header">
      <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'multipurpose-magazine' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'multipurpose-magazine' ); ?></span></a>
      <div class="top">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4">
              <?php dynamic_sidebar('social-icon') ?>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="logo">
                <?php if ( has_custom_logo() ) : ?>
                  <div class="site-logo"><?php the_custom_logo(); ?></div>
                <?php endif; ?>
                <?php $blog_info = get_bloginfo( 'name' ); ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php endif; ?>
                <?php endif; ?>
                <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
                  ?>
                  <p class="site-description">
                    <?php echo esc_html($description); ?>
                  </p>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="login">
                <?php if(get_theme_mod('multipurpose_magazine_show_search',true) ){ ?>
                  <span class="wrap"><?php get_search_form(); ?></span>
                <?php }?>
                <?php if ( get_theme_mod('multipurpose_magazine_login_link','') != "" ) {?>
                  <a href="<?php echo esc_url(get_theme_mod('multipurpose_magazine_login_link','')); ?>"><i class="fa fa-user"></i><?php echo esc_html(get_theme_mod('multipurpose_magazine_login_text','')); ?><span class="screen-reader-text"><?php esc_html_e( 'Login Button', 'multipurpose-magazine' ); ?></span></a>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php if(get_theme_mod('multipurpose_magazine_top_header')){ ?>
        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <?php $content_pages = array();
                  $mod = intval( get_theme_mod( 'multipurpose_magazine_popular_maazine'));
                  if ( 'page-none-selected' != $mod ) {
                    $content_pages[] = $mod;
                  }
                  if( !empty($content_pages) ) :
                    $args = array(
                      'post_type' => 'page',
                      'post__in' => $content_pages,
                      'orderby' => 'post__in'
                    );
                  $query = new WP_Query( $args );
                  if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                      <div class="popular">
                        <div class="box-image">
                          <div class="text">
                            <div class="row m-0">
                              <div class="col-lg-9 col-md-9 col-8">
                                 <strong><?php the_title(); ?></strong>
                               </div>
                                <div class="col-lg-3 col-md-3 col-4">
                                  <div class="know-btn">
                                    <a href="<?php the_permalink(); ?>" class="blogbutton-small"><?php esc_html_e('BUY NOW','multipurpose-magazine'); ?><span class="screen-reader-text"><?php esc_html_e( 'BUY NOW', 'multipurpose-magazine' ); ?></span></a>
                                  </div>
                                </div>
                            </div>
                          </div>
                          <?php the_post_thumbnail(); ?>
                        </div>
                      </div>
                    <?php  endwhile; ?>
                  <?php else : ?>
                    <div class="no-postfound"></div>
                  <?php endif;
                  endif;
                  wp_reset_postdata();
                ?>
              </div>
              <div class="col-lg-6 col-md-12">
                <div class="row">
                  <div class="col-lg-4 col-md-4">
                    <div class="contact-details">
                      <div class="row">
                        <?php if ( get_theme_mod('multipurpose_magazine_time','') != "" ) {?>
                          <div class="col-lg-2 col-md-2 col-2 p-0">
                            <i class="far fa-clock"></i>
                          </div>
                          <div class="col-lg-10 col-md-10 col-10 p-0">
                            <?php if ( get_theme_mod('multipurpose_magazine_time','') != "" ) {?>
                              <p class="heading"><?php echo esc_html( get_theme_mod('multipurpose_magazine_time','')); ?></p>
                              <p><?php echo esc_html( get_theme_mod('multipurpose_magazine_time_text','')); ?></p>
                            <?php }?>
                          </div>
                        <?php }?>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <div class="contact-details">
                      <div class="row">
                        <?php if ( get_theme_mod('multipurpose_magazine_temperature','') != "" ) {?>
                          <div class="col-lg-2 col-md-2 col-2 p-0">
                            <i class="fab fa-mixcloud"></i>
                          </div>
                          <div class="col-lg-10 col-md-10 col-10">
                            <?php if ( get_theme_mod('multipurpose_magazine_temperature','') != "" ) {?>
                              <p class="heading"><?php echo esc_html( get_theme_mod('multipurpose_magazine_temperature','')); ?></p>
                              <p><?php echo esc_html( get_theme_mod('multipurpose_magazine_temperature_text','' )); ?></p>
                            <?php }?>
                          </div>
                        <?php }?>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-5 col-md-5">
                    <div class="contact-details">
                      <div class="row">
                        <?php if ( get_theme_mod('multipurpose_magazine_email','') != "" ) {?>
                          <div class="col-lg-2 col-md-2 col-2">
                            <i class="fas fa-at"></i>
                          </div>
                          <div class="col-lg-10 col-md-10 col-10 p-0">
                            <?php if ( get_theme_mod('multipurpose_magazine_email','') != "" ) {?>
                              <a href="mailto:<?php echo esc_attr( get_theme_mod('multipurpose_magazine_email','')); ?>"><p class="heading"><?php echo esc_html( get_theme_mod('multipurpose_magazine_email','')); ?></p><span class="screen-reader-text"><?php esc_html_e('Email', 'multipurpose-magazine') ?></span></a>
                              <p><?php echo esc_html( get_theme_mod('multipurpose_magazine_email_text','')); ?></p>
                            <?php }?>
                          </div>
                        <?php }?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="news">
                  <?php if ( get_theme_mod('multipurpose_magazine_breaking_news','') != "" ) {?>
                    <marquee width="100%" direction="left" height="30%">  
                      <span class="headline"><?php esc_html_e('BREAKING NEWS /','multipurpose-magazine'); ?> </span><span><?php echo esc_html( get_theme_mod('multipurpose_magazine_breaking_news','')); ?></span>
                    </marquee>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php }?>
      <?php if (has_nav_menu('primary')){ ?>
        <div class="toggle-menu responsive-menu">
          <button role="tab"><i class="fas fa-bars"></i><?php esc_html_e('Menu','multipurpose-magazine'); ?><span class="screen-reader-text"><?php esc_html_e('Menu','multipurpose-magazine'); ?></span></button>
        </div>
      <?php }?>
      <div class="menu-sec <?php if( get_theme_mod( 'multipurpose_magazine_sticky_header') != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
        <div class="container"> 
          <div id="sidelong-menu" class="nav side-nav">
            <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'multipurpose-magazine' ); ?>">
              <?php if (has_nav_menu('primary')){ 
                wp_nav_menu( array( 
                  'theme_location' => 'primary',
                  'container_class' => 'main-menu-navigation clearfix' ,
                  'menu_class' => 'clearfix',
                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                  'fallback_cb' => 'wp_page_menu',
                ) ); 
              } ?>
              <a href="javascript:void(0)" class="closebtn responsive-menu"><?php esc_html_e('Close Menu','multipurpose-magazine'); ?><i class="fas fa-times-circle"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','multipurpose-magazine'); ?></span></a>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>

  <?php if(get_theme_mod('multipurpose_magazine_post_featured_image') == 'banner' ){
    if( is_singular() ) {?>
      <div id="page-site-header">
        <div class='page-header'> 
          <?php the_title( '<h1>', '</h1>' ); ?>
        </div>
      </div>
    <?php }
  }?>