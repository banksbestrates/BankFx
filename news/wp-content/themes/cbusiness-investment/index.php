<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package cbusiness-investment
 */

get_header(); 
?>
<div id="content" class="container">
     <div class="page_content">
        <div class="site-main">
        	 <div class="blog-post">
                    <?php
                    if ( have_posts() ) :
                        
                        while ( have_posts() ) : the_post();
                            get_template_part( 'content' );
                        ?> 
                       
                        <?php endwhile;
                        the_posts_pagination();
                    
                    endif;
                    ?>
                    </div><!-- blog-post -->
             </div><!--site-main -->
      
        <?php get_sidebar();?>     
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- content -->
<?php get_footer(); ?>