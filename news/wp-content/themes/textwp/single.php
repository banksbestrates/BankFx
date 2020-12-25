<?php
/**
* The template for displaying all single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

<?php while (have_posts()) : the_post();

    get_template_part( 'template-parts/content', 'single' );

    textwp_post_navigation();

    textwp_post_bottom_widgets();

    if ( !(textwp_get_option('hide_comment_form')) ) {

    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;

    }

endwhile; ?>

<div class="clear"></div>
</div><!--/#textwp-posts-wrapper -->

<?php textwp_after_main_content(); ?>

</div>
</div>
</div><!-- /#textwp-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>