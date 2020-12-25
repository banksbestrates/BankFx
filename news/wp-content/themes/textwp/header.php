<?php
/**
* The header for TextWP theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class('textwp-animated textwp-fadein'); ?> id="textwp-site-body" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#textwp-posts-wrapper"><?php esc_html_e( 'Skip to content', 'textwp' ); ?></a>

<div class="textwp-site-wrapper">

<?php textwp_header_image(); ?>

<?php if ( textwp_is_primary_menu_active() ) { ?>
<div class="textwp-container textwp-primary-menu-container textwp-clearfix">
<div class="textwp-primary-menu-container-inside textwp-clearfix">

<nav class="textwp-nav-primary" id="textwp-primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'textwp' ); ?>">
<div class="textwp-outer-wrapper">
<button class="textwp-primary-responsive-menu-icon" aria-controls="textwp-menu-primary-navigation" aria-expanded="false"><?php esc_html_e( 'Menu', 'textwp' ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'textwp-menu-primary-navigation', 'menu_class' => 'textwp-primary-nav-menu textwp-menu-primary', 'fallback_cb' => 'textwp_fallback_menu', 'container' => '', ) ); ?>
</div>
</nav>

</div>
</div>
<?php } ?>

<?php textwp_before_header(); ?>

<div class="textwp-container" id="textwp-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
<div class="textwp-head-content textwp-clearfix" id="textwp-head-content">
<div class="textwp-outer-wrapper">

<?php if ( textwp_is_header_content_active() ) { ?>
<div class="textwp-header-inside textwp-clearfix">
<div class="textwp-header-inside-content textwp-clearfix">

<div class="textwp-logo">
<?php if ( has_custom_logo() ) : ?>
    <div class="site-branding">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="textwp-logo-img-link">
        <img src="<?php echo esc_url( textwp_custom_logo() ); ?>" alt="" class="textwp-logo-img"/>
    </a>
    <div class="textwp-custom-logo-info"><?php textwp_site_title(); ?></div>
    </div>
<?php else: ?>
    <div class="site-branding">
      <?php textwp_site_title(); ?>
    </div>
<?php endif; ?>
</div>

<div class="textwp-header-social">
<?php if ( textwp_is_header_social_buttons_active() ) { ?>
<?php textwp_footer_social_buttons(); ?>
<?php } ?>
</div><!--/.textwp-header-social -->

</div>
</div>
<?php } else { ?>
<div class="textwp-no-header-content">
  <?php textwp_site_title(); ?>
</div>
<?php } ?>

</div><!--/#textwp-head-content -->
</div><!--/#textwp-header -->
</div>

<?php textwp_after_header(); ?>

<div id="textwp-search-overlay-wrap" class="textwp-search-overlay">
  <div class="textwp-search-overlay-content">
    <?php get_search_form(); ?>
  </div>
  <button class="textwp-search-closebtn" aria-label="<?php esc_attr_e( 'Close Search', 'textwp' ); ?>" title="<?php esc_attr_e('Close Search','textwp'); ?>">&#xD7;</button>
</div>

<div class="textwp-outer-wrapper">
<?php textwp_top_wide_widgets(); ?>
</div>

<div class="textwp-outer-wrapper" id="textwp-wrapper-outside">

<div class="textwp-container textwp-clearfix" id="textwp-wrapper">
<div class="textwp-content-wrapper textwp-clearfix" id="textwp-content-wrapper">