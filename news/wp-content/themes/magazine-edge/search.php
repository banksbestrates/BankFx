<?php
/**
* The template for displaying search results pages.
*
* @package Magazine edge
*/
get_header();
magazine_edge_breadcrumbs();
?>

<div class="sidebar-page-container main-page">
	<div class="auto-container">
		<div class="row clearfix">
			<div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="col-md-12">
						<?php get_template_part('template-part/content', 'search'); ?>
					</div>
				<?php 
				endwhile;
				else :
					get_template_part( 'template-part/content', 'none' );
				endif; 
				?>
				<div class="styled-pagination">
					<ul class="clearfix">
						<?php the_posts_pagination(
							array(
							'prev_text' => '',
							'next_text' => ''
							)
							);               
						?>  
					</ul>
				</div>
			</div>
			<div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<aside class="sidebar default-sidebar right-sidebar">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</aside>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>