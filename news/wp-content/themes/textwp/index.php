<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class="textwp-main-wrapper textwp-clearfix" id="textwp-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="textwp-main-wrapper-inside textwp-clearfix">

<?php textwp_before_main_content(); ?>

<div class="textwp-posts-wrapper" id="textwp-posts-wrapper">
<div class="textwp-posts">

<?php if ( !(textwp_get_option('hide_posts_heading')) ) { ?>
<?php if(is_home() && !is_paged()) { ?>
<?php if ( textwp_get_option('posts_heading') ) : ?>
<div class="textwp-posts-header"><h2 class="textwp-posts-heading"><span><?php echo esc_html( textwp_get_option('posts_heading') ); ?></span></h2></div>
<?php else : ?>
<div class="textwp-posts-header"><h2 class="textwp-posts-heading"><span><?php esc_html_e( 'Recent Posts', 'textwp' ); ?></span></h2></div>
<?php endif; ?>
<?php } ?>
<?php } ?>

<div class="textwp-posts-content">

<?php if (have_posts()) : ?>

    <div class="textwp-posts-container <?php echo esc_attr(textwp_posts_container_class()); ?>">
    <?php $textwp_total_posts = $wp_query->post_count; ?>
    <?php $textwp_post_counter=1; while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', textwp_post_style() ); ?>

    <?php $textwp_post_counter++; endwhile; ?>
    </div>
    <div class="clear"></div>

    <?php textwp_posts_navigation(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</div>

</div>
</div><!--/#textwp-posts-wrapper -->

<?php textwp_after_main_content(); ?>

</div>
</div>
</div><!-- /#textwp-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>