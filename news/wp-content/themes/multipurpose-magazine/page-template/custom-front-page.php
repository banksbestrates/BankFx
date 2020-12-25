<?php
/**
 * Template Name: Custom home page
 */
get_header(); ?>

<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<main id="maincontent" role="main">
  <?php do_action('multipurpose_magazine_above_slider_section'); ?>

  <?php if(get_theme_mod('multipurpose_magazine_slider_hide_show',true) != ''){?>
    <section id="categry">
      <div class="owl-carousel">
        <?php 
        $multipurpose_magazine_catData = get_theme_mod('multipurpose_magazine_category3');
        if($multipurpose_magazine_catData){              
        $page_query = new WP_Query(array( 'category_name' => esc_html( $multipurpose_magazine_catData ,'multipurpose-magazine')));?>
        <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
          <div class="imagebox">
            <?php if(has_post_thumbnail()) { ?>
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
            <?php } ?>
            <div class="text-content">
              <div class="meta-box">
                <?php if(get_theme_mod('multipurpose_magazine_slider_tags',true) != ''){?>
                  <span class="home_tags">
                    <?php
                      $posttags = get_the_tags();
                      $count=1; $sep='';
                      if ($posttags) {
                        foreach($posttags as $slider_tag) {
                          $count++;
                          echo esc_attr($sep) . '<a href="'.esc_html(get_tag_link($slider_tag->term_id)).'">'.esc_attr($slider_tag->name).'</a>';
                          $sep = ' ';
                          if( $count > get_theme_mod('multipurpose_magazine_tags_count',2) ) break; //change the number to adjust the count
                        }
                      }
                    ?>
                  </span>
                <?php }?>
                <?php if(get_theme_mod('multipurpose_magazine_slider_date',true) != ''){?>
                  <span class="entry-date"><i class="fa fa-calendar" aria-hidden="true"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
                <?php }?>
                <?php if(get_theme_mod('multipurpose_magazine_slider_time',true) != ''){?>
                  <span class="entry-time"><i class="far fa-clock" aria-hidden="true"></i><?php the_time(); ?></span>
                <?php }?>
              </div>
              <?php if(get_theme_mod('multipurpose_magazine_slider_title',true) != ''){?>
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>
              <?php }?>
              <?php if(get_theme_mod('multipurpose_magazine_slider_content',true) != ''){?>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( multipurpose_magazine_string_limit_words( $excerpt, esc_attr(get_theme_mod('multipurpose_magazine_slider_excerpt_number','15')))); ?></p>
              <?php }?>
            </div>
          </div>
          <?php endwhile; 
          wp_reset_postdata();
        }?>
      </div>
    </section>
  <?php }?>

  <?php do_action('multipurpose_magazine_below_slider_section'); ?>

  <?php if( get_theme_mod('multipurpose_magazine_page_title') != '' || get_theme_mod('multipurpose_magazine_category') != ''){ ?>
    <section id="top-trending">
      <div class="container">      
        <div class="row">
          <div class="col-lg-9 col-md-9">
            <?php if( get_theme_mod('multipurpose_magazine_page_title') != ''){ ?>
              <hr class="top-head">
              <h2><?php echo esc_html(get_theme_mod('multipurpose_magazine_page_title','')); ?></h2>
              <hr class="top-head">
            <?php }?>
            <?php 
              $multipurpose_magazine_catData=  get_theme_mod('multipurpose_magazine_category');
              if($multipurpose_magazine_catData){
                $page_query = new WP_Query(array( 'category_name' => esc_html( $multipurpose_magazine_catData ,'multipurpose-magazine')));?>
                <div class="row">
                  <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                  <div class="col-lg-4 col-md-6">
                    <div class="abt-img-box"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></div>
                    <div class="trending-cat">
                      <div class="top-tag">
                        <?php
                          $posttags = get_the_tags();
                          $count=1; $sep='';
                          if ($posttags) {
                            foreach($posttags as $feature_tag) {
                              $count++;
                              echo esc_attr($sep) . '<a href="'.esc_html(get_tag_link($feature_tag->term_id)).'">'.esc_attr($feature_tag->name).'</a>';
                              $sep = ' ';
                              if( $count > get_theme_mod('multipurpose_magazine_tags_count',2) ) break; //change the number to adjust the count
                            }
                          }
                        ?>
                      </div>
                      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3> 
                    </div>
                  </div>
                  <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata();
              }?>
            <div class="home-content">
              <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
              <?php endwhile; // end of the loop. ?>
            </div>
          </div>
          <div class="col-lg-3 col-md-3">
            <div id="sidebar"><?php dynamic_sidebar('home'); ?></div>
          </div>
        </div>
        <div class="clearfix"></div> 
      </div>
    </section>
  <?php }?>

  <?php do_action('multipurpose_magazine_after_top_trending_section'); ?>
</main>

<?php get_footer(); ?>