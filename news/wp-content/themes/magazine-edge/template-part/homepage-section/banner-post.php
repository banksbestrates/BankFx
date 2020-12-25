<?php
if ('' != magazine_edge_get_option('magazine_edge_show_homepage_banner_news_section')) : 
$magazine_edge_category = magazine_edge_get_option('magazine_edge_select_homepage_banner_news_category');
$magazine_edge_all_posts = magazine_edge_get_posts(4, $magazine_edge_category);
if ($magazine_edge_all_posts->have_posts()) : ?>
        <section class="main-slider-two main-slider-four">
            <!-- <div class="single-item-carousel owl-carousel owl-theme"> -->
                <!--Slide-->
                <div class="slide">
                    <div class="clearfix">
                        
                        <!--Slide Column-->
                       
                        <?php
                        while ($magazine_edge_all_posts->have_posts()) : $magazine_edge_all_posts->the_post();?>
                            <div class="slide-column col-md-3 col-sm-12 col-xs-12">
                                <!--News Block Three-->
                                <div class="news-block-three style-two">
                                    <div class="inner-box">
                                        <div class="image">
                                            <?php 
                                                if(has_post_thumbnail()):
                                                the_post_thumbnail('magazine-edge-banner-slider'); 
                                                else:
                                                ?>
                                             <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/img/391x383.jpg"> 
                                             <?php
                                              endif;?>
                                            <div class="overlay-box">
                                                <div class="content">
                                                  <div class="category">
                                                    <?php
                                                      $categories = get_the_category();
                                                      $separator = ' ';
                                                      $output = ' ';
                                                      if ( ! empty( $categories ) ) :
                                                        foreach ( $categories as $magzine_edge_cat ) {
                                                          $output .= '<a href="'. esc_url( get_category_link( $magzine_edge_cat->term_id ) ) . '" class="bg-cat-3 cat-btn">' . esc_html( $magzine_edge_cat->name ) . '</a>' . $separator;
                                                        }
                                                        echo trim( $output, $separator );
                                                      endif;
                                                    ?>
                                                  </div>  
                                                   <h3>
                                                        <a href="<?php the_permalink();?>">
                                                        <?php echo esc_html(wp_trim_words( get_the_title(),  magazine_edge_get_option('magazine_edge_banner_slider_news_title_length') )); ?>
                                                        </a>
                                                    </h3>
                                                    <ul class="post-meta">
                                                      <?php 
                                                        magazine_edge_posted_by();
                                                        magazine_edge_posted_on();
                                                      ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                         endwhile;
                         wp_reset_postdata();
                        ?>
                    </div>
                </div>
            <!-- </div> -->

        </section>
<?php
endif;
endif;
?>