<?php
/**
* The template for displaying full-width page.
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*
* Template Name: Full Width, no sidebar
* Template Post Type: page
*/

get_header(); ?>

<div class="textwp-main-wrapper textwp-clearfix" id="textwp-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="textwp-main-wrapper-inside textwp-clearfix">

<?php textwp_before_main_content(); ?>

<div class='textwp-posts-wrapper' id='textwp-posts-wrapper'>

<?php while (have_posts()) : the_post();

    get_template_part( 'template-parts/content', 'page' );

    if ( !(textwp_get_option('hide_page_comment_form')) ) {

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

<?php get_footer(); ?>