<?php if(has_post_thumbnail()) : ?>
   <div class="banner-img">
      <?php the_post_thumbnail(); ?>
   </div>
   <?php endif; ?>

  <div class="blog-single">
     <div class="inner-box">
        <div class="upper-box">
           <h2 class="title"><?php the_title(); ?></h2>
           <ul class="post-meta">
              <?php 
                  magazine_edge_posted_by();
                  magazine_edge_posted_on();
                  magazine_edge_entry_footer(); 
                ?>
           </ul>
        </div>
        <div class="text">
           <?php the_content();  
              wp_link_pages( array(
              'before' => '<div>' . esc_html__( 'Pages:', 'magazine-edge' ),
              'after'  => '</div>',
              ) );
              ?>       
        </div>
        <?php if (has_tag()) : ?>
        <div class="post-share-options">
           <div class="tags clearfix">
            <?php $seperator = ''; // blank instead of comma ?>
            <?php the_tags( $seperator,'&nbsp;'); ?></div>
        </div>
        <?php endif; ?>
       <?php magazine_edge_single_post_navigation(); ?>
     </div>
  </div>
