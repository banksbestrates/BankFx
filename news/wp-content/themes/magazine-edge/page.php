<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Magazine edge
*/
get_header(); 
magazine_edge_breadcrumbs();
?>
<section class="sidebar-page-container">
	<div class="auto-container">
		<div class="clearfix">
			<div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12 theme-edge">
				<?php
					if(have_posts()) : 
					while(have_posts()) : the_post();  
					?>
					<div class="text">
						<?php if(has_post_thumbnail()) : ?>
							<?php the_post_thumbnail(); ?> 
						<?php endif;   
							the_content();
							wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'magazine-edge' ),
							'after'  => '</div>',
							) );
						?> 
					</div>
					<?php
					endwhile; 
					  if ( comments_open() || get_comments_number() ) :?>
						<div class="comment-box">
							<?php comments_template(); ?>
						</div>		
	                  <?php endif; ?> 
	          <?php else :  
                        get_template_part( 'template-part/content', 'none' );
                     endif; ?>
                </div>
                <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<aside class="sidebar default-sidebar right-sidebar">
						<?php dynamic_sidebar('sidebar-1'); ?>
					</aside>
				</div>  
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>