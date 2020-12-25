<?php
/**
* The header for our theme.
*
* Displays all of the <head> section 
*
* @package Magazine edge
*/
get_header(); ?>
<section class="error-section">
  	<div class="auto-container">
        <div class="error-big-text"><?php echo esc_html__('404','magazine-edge');?></div>
        <h2><?php echo esc_html__('Ohh! Nothing Found what are you looking for','magazine-edge');?></h2>
        <div class="text"><?php echo esc_html__('It looks like nothing was found at this location. Maybe try one of the links below or a search?','magazine-edge');?></div>
        <div class="error-options">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn btn-style-four"><?php echo esc_html__('Go Home','magazine-edge');?></a>
            <span class="or"><?php echo esc_html__('Or','magazine-edge');?></span>
            <div class="error-search-box">
                <form  class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="form-group">
                       <?php get_search_form(); ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>