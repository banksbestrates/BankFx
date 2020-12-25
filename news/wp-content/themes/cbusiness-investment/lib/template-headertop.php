<a class="skip-link screen-reader-text" href="#content">
<?php esc_attr_e( 'Skip to content', 'cbusiness-investment' ); ?></a>
<section id="header">
  <header class="container">
    <div class="header_top row">      
      <!--header section start -->
      <div class="header_left headercommon">          
        <div class="phone-email">
          <ul>
          
          <li>
            <?php $cbusiness_investment_phone = get_theme_mod('cbusiness_investment_phone'); ?>
            <?php if(get_theme_mod('cbusiness_investment_phone')){?>
              <i class="fa fa-phone"></i>&nbsp;&nbsp;<?php echo esc_html(cbusiness_investment_sanitize_phone_number($cbusiness_investment_phone));?>
            <?php }?>           
            </li>
            <li>
            <?php $cbusiness_investment_email = get_theme_mod('cbusiness_investment_email'); ?>
            <?php if(get_theme_mod('cbusiness_investment_email')){?>
              <i class="fa fa-envelope"></i>&nbsp;&nbsp;<?php echo esc_html(sanitize_email($cbusiness_investment_email));?>
            <?php }?>
          </li>
        </ul>
        </div><!--phone-email-->

      </div><!--header_left-->
      <div class="header_right headercommon">
        <ul>
          <?php if(get_theme_mod('cbusiness_investment_fb')){?>
            <li><a title="<?php esc_attr_e('Facebook','cbusiness-investment'); ?>" class="fa fa-facebook" target="_blank" href="<?php echo esc_url(get_theme_mod('cbusiness_investment_fb','')); ?>"></a> </li>
          <?php }?>
          <?php if(get_theme_mod('cbusiness_investment_twitter')){?>
            <li><a title="<?php esc_attr_e('twitter','cbusiness-investment'); ?>" class="fa fa-twitter" target="_blank" href="<?php echo esc_url(get_theme_mod('cbusiness_investment_twitter','')); ?>"></a></li>
          <?php }?>
          <?php if(get_theme_mod('cbusiness_investment_glplus')){?>
            <li><a title="<?php esc_attr_e('googleplus','cbusiness-investment'); ?>" class="fa fa-google-plus" target="_blank" href="<?php echo esc_url(get_theme_mod('cbusiness_investment_glplus','')); ?>"></a></li>
          <?php }?>
          <?php if(get_theme_mod('cbusiness_investment_in')){?>
            <li><a title="<?php esc_attr_e('linkedin','cbusiness-investment'); ?>" class="fa fa-linkedin" target="_blank" href="<?php echo esc_url(get_theme_mod('cbusiness_investment_in','')); ?>"></a></li>
          <?php }?>

          <?php if(get_theme_mod('cbusiness_investment_pin')){?>
            <li><a title="<?php esc_attr_e('linkedin','cbusiness-investment'); ?>" class="fa fa-pinterest" target="_blank" href="<?php echo esc_url(get_theme_mod('cbusiness_investment_pin','')); ?>"></a></li>
          <?php }?>


          
        </ul>

                
        <div class="clear"></div> 

      </div>
      <!-- header section end -->     
      <div class="clear"></div>
    </div><!--header_top-->
    <div class="clear"></div>
    
  </header>
</section><!--header-->
<section id="header_bottom">
  <div class="container">
    <div class="header_bottom_left">
        <div class="logo">
          <?php if (has_custom_logo()) {?>
           <a href="<?php echo esc_url( home_url( '/') ); ?>"><?php cbusiness_investment_the_custom_logo(); ?></a>
          <?php }if(display_header_text()==true) {?>
            <h1><a href="<?php echo esc_url( home_url( '/') ); ?>"><?php bloginfo('name'); ?></a></h1>
          <p><?php bloginfo('description'); ?></p>
          <?php }?>
        </div><!-- logo -->
    </div><!--header_bottom_left-->
    <div class="header_bottom_right" >
      <div id="main_navigation">
        <div class="main-navigation-inner mainwidth">
      <div class="toggle">
                <a class="togglemenu" href="#"><?php esc_html_e('Menu','cbusiness-investment'); ?></a>
                <div class="clear"></div>
      </div><!-- toggle --> 
      <div class="sitenav">
          <div class="nav">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary'                            
                        ));
                        ?>
                        </div>
          <div class="clear"></div>
      </div><!-- site-nav -->
      <div class="clear"></div>
    </div><!--main-navigation-->
    <div class="clear"></div>
    </div><!--main_navigation-->
    </div><!--header_bottom_right-->
    <div class="clear"></div>
  </div><!--container-->
</section>