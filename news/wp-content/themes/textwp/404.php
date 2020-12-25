<?php
/**
* The template for displaying 404 pages (not found).
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class='textwp-main-wrapper textwp-clearfix' id='textwp-main-wrapper' itemscope='itemscope' itemtype='http://schema.org/Blog' role='main'>
<div class='theiaStickySidebar'>
<div class="textwp-main-wrapper-inside textwp-clearfix">

<div class='textwp-posts-wrapper' id='textwp-posts-wrapper'>

<div class='textwp-posts textwp-box'>
<div class="textwp-box-inside">

<div class="textwp-page-header-outside">
<header class="textwp-page-header">
<div class="textwp-page-header-inside">
    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can not be found.', 'textwp' ); ?></h1>
</div>
</header><!-- .textwp-page-header -->
</div>

<div class='textwp-posts-content'>

    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'textwp' ); ?></p>

    <?php get_search_form(); ?>

</div>

</div>
</div>

</div><!--/#textwp-posts-wrapper -->

</div>
</div>
</div><!-- /#textwp-main-wrapper -->

<?php get_footer(); ?>