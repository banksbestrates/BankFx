<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package Magazine edge
*/
get_header();
magazine_edge_breadcrumbs();
?>
<div class="sidebar-page-container">
	<div class="auto-container">
		<div class="row clearfix">
			<div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12 theme-edge">
				<?php 
					if(have_posts()) : 
					while(have_posts()) : the_post(); 
						get_template_part( 'template-part/content', 'single' ); 
					endwhile; 

					else :  
						get_template_part( 'template-part/content', 'none' );
					endif; 
				 ?> 

				<?php 
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif; 
				?>   
			</div>

			<div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sidebar">            
						<?php dynamic_sidebar('sidebar-1'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>