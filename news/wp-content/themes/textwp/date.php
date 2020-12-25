<?php
/**
* The template for displaying date archive pages.
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

<?php if ( !(textwp_get_option('hide_date_title')) ) { ?>
<div class="textwp-page-header-outside">
<header class="textwp-page-header">
<div class="textwp-page-header-inside">
<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
</div>
</header>
</div>
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