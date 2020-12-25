<?php
/**
 * The template for displaying home page.
 * @package Multipurpose Magazine
 */
get_header(); ?>

<main id="maincontent" role="main">
    <?php
    $multipurpose_magazine_left_right = get_theme_mod( 'multipurpose_magazine_layout','Right Sidebar');
    if($multipurpose_magazine_left_right == 'Right Sidebar'){ ?>
        <div id="blog_post">
            <div class="innerlightbox">
        		<div class="container">  
                    <div class="row">      
                        <div class="col-lg-9 col-md-9">                
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' , get_post_format() );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <?php if( get_theme_mod( 'multipurpose_magazine_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php multipurpose_magazine_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        </div>      
                    	<div class="col-lg-3 col-md-3"><?php get_sidebar();?></div>
              		    <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php }else if($multipurpose_magazine_left_right == 'Left Sidebar'){ ?>
        <div id="blog_post">
            <div class="innerlightbox">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3"><?php get_sidebar();?></div>
                        <div class="col-lg-9 col-md-9" >                
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' , get_post_format() );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <?php if( get_theme_mod( 'multipurpose_magazine_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php multipurpose_magazine_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        </div> 
                    </div>                   
                </div>
            </div>
        </div>
    <?php }else if($multipurpose_magazine_left_right == 'One Column'){ ?>
        <div id="blog_post">
            <div class="innerlightbox">
                <div class="container">               
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content' , get_post_format() );
                        endwhile;
                          else :
                            get_template_part( 'no-results' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'multipurpose_magazine_post_navigation',true) != '') { ?>
                        <div class="navigation">
                            <?php multipurpose_magazine_posts_pagination();?>
                            <div class="clearfix"></div>
                        </div>
                    <?php }?>                   
                </div>
            </div>
        </div>
    <?php }else if($multipurpose_magazine_left_right == 'Three Columns'){ ?>
        <div id="blog_post">
            <div class="innerlightbox">
                <div class="container">
                    <div class="row">
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                        <div class="col-lg-6 col-md-6">                
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' , get_post_format() );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <?php if( get_theme_mod( 'multipurpose_magazine_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php multipurpose_magazine_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        </div> 
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                    </div>               
                </div>
            </div>
        </div>
    <?php }else if($multipurpose_magazine_left_right == 'Four Columns'){ ?>
        <div id="blog_post">
            <div class="innerlightbox">
                <div class="container">
                    <div class="row">
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                        <div class="col-lg-3 col-md-3">                
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' , get_post_format() );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <?php if( get_theme_mod( 'multipurpose_magazine_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php multipurpose_magazine_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        </div> 
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
                    </div>
                </div>
            </div>
        </div>
    <?php }else if($multipurpose_magazine_left_right == 'Grid Layout'){ ?>
        <div id="blog_post">
            <div class="innerlightbox">
                <div class="container">
                    <div class="row">
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/grid-layout' );
                            endwhile;
                              else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                    </div>
                    <?php if( get_theme_mod( 'multipurpose_magazine_post_navigation',true) != '') { ?>
                        <div class="navigation">
                            <?php multipurpose_magazine_posts_pagination();?>
                            <div class="clearfix"></div>
                        </div>
                    <?php }?>                   
                </div>
            </div>
        </div>
    <?php }else {?>
        <div id="blog_post">
            <div class="innerlightbox">
                <div class="container">  
                    <div class="row">      
                        <div class="col-lg-9 col-md-9">                
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' , get_post_format() );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <?php if( get_theme_mod( 'multipurpose_magazine_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php multipurpose_magazine_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        </div>      
                        <div class="col-lg-3 col-md-3"><?php get_sidebar();?></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</main>

<?php get_footer(); ?>