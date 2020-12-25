<?php 
if ('' != magazine_edge_get_option('magazine_edge_show_homepage_trending_news_section')) : 
$magazine_edge_category = magazine_edge_get_option('magazine_edge_select_homepage_trending_news_category');

$magazine_edge_trending_news_title = magazine_edge_get_option('magazine_edge_trending_news_title');
$magazine_edge_all_posts = magazine_edge_get_posts(5, $magazine_edge_category);
if ($magazine_edge_all_posts->have_posts()) : ?>
<!--Sec Title-->
    <div class="sec-title">
        <h2><?php echo esc_html($magazine_edge_trending_news_title); ?></h2>
    </div>
	<div class="content-blocks">
		<?php  while ($magazine_edge_all_posts->have_posts()) : $magazine_edge_all_posts->the_post();?>
		    <!--News Block Four-->
		    <div class="news-block-four">
		        <div class="inner-box">
		            <div class="row clearfix">
		                <div class="image-column col-md-6 col-sm-6 col-xs-12">
		                    <div class="image">
		                        <a href="<?php the_permalink();?>"> 
									<?php 
									if(has_post_thumbnail()):
										the_post_thumbnail('magazine-edge-post'); 
									else:
									?>
										<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/img/370x218.jpg"> 
									<?php
									endif;?>
								</a>
		                    </div>
		                </div>
		                <div class="content-box col-md-6 col-sm-6 col-xs-12">
		                    <div class="content-inner">
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

		                        <h3><a href="<?php the_permalink();?>">
									<?php the_title(); ?></a>
								</h3>
		                        <ul class="post-meta">
		                            <?php 
				                      magazine_edge_posted_by();
				                      magazine_edge_posted_on();
				                      magazine_edge_entry_footer(); 
				                    ?>
		                        </ul>
		                        <div class="text"><?php the_excerpt();?></div>
		                        <a href="<?php the_permalink();?>" class="read-more">
									<?php echo esc_html__('Read More','magazine-edge');?>
									<span class="arrow ion-ios-arrow-thin-right"></span>
								</a>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		<?php endwhile; ?>
		
	</div>
<?php endif;
endif;
 ?>
