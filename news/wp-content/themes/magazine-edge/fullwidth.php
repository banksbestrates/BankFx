<?php
/**
 * Template Name: Full-width Page
 *
* @package Magazine edge
*/
?>

<?php get_header(); 
magazine_edge_breadcrumbs();
?>
<section class="sidebar-page-container">
    <div class="auto-container">
        <div class="clearfix">
            <div class="content-side theme-edge">
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
                    endwhile; ?>
                    <div class="comment-box">
                        <?php 
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif; 
                        ?> 
                    </div>

                <?php else :  
                        get_template_part( 'template-part/content', 'none' );
                     endif; ?>
                </div>  
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>