<section id="banner">
  <div class="banner ">
      <?php if ( is_front_page() || is_home() ) {?>
        <?php if ( get_header_image() ) : ?>
        <div class="homeslider">
          <img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" >
          <?php
            $cbusiness_investment_banner_heading = get_theme_mod('banner_heading');
            $cbusiness_investment_banner_sub_heading = get_theme_mod('banner_sub_heading');
            $cbusiness_investment_slider_url = get_theme_mod('cbusiness_investment_slider_url');
            $cbusiness_investment_slider_readmore = get_theme_mod('cbusiness_investment_slider_readmore');

            if( !empty($cbusiness_investment_banner_heading) || !empty($cbusiness_investment_banner_sub_heading)){ ?>
              <div class="bannercontent">
                <div class="bannercaption">
                <div class="banner_heading"><h3><?php echo esc_html($cbusiness_investment_banner_heading); ?></h3></div><!--banner_heading-->
                <div class="banner_sub_heading"><?php echo esc_html($cbusiness_investment_banner_sub_heading); ?></div><!--banner_heading-->
                <?php if(!empty($cbusiness_investment_slider_url)){?>
                <div class="banner_button">
                  <a class="button bannerbutton" href="<?php echo esc_url($cbusiness_investment_slider_url); ?>"><?php echo esc_html($cbusiness_investment_slider_readmore); ?></a>
                </div><!--banner_button-->
              <?php }?>
              </div><!--bannercaption-->
              </div><!--bannercontent-->
          <?php } ?>
        </div>  <!--homeslider-->

        
              <?php endif; ?>
      <?php }elseif(is_page()){?>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/view/images/innerbanner.jpg" alt="<?php bloginfo('name'); ?>">          
    <?php }?>
  </div><!--banner-->
</section><!--banner-->

