<?php 
/**
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
* @package magazine-edge
*/  
get_header();

get_template_part('template-part/homepage-section/banner-post');

?>

<div class="sidebar-page-container main-page">
	<div class="auto-container">
		<div class="row clearfix">
			<div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">

				<?php get_template_part('template-part/homepage-section/popular-news');
					get_template_part('template-part/homepage-section/recent-articles');
					get_template_part('template-part/homepage-section/latest-post');  
					get_template_part('template-part/homepage-section/latest-post2'); ?>
 
			</div>
			<div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<aside class="sidebar default-sidebar right-sidebar">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</aside>
			</div>
		</div>
	</div>
</div>


<?php get_footer();?>