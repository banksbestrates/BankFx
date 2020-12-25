<?php
/**
 * The template part for displaying grid layout
 * @package Multipurpose Magazine
 * @subpackage multipurpose_magazine
 * @since 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<div class="col-lg-4 col-md-4">
  <article class="blog-sec">
    <?php if(has_post_thumbnail()) { ?>
      <div class="mainimage">    
        <?php the_post_thumbnail(); ?>      
      </div>
      <?php if( get_theme_mod( 'multipurpose_magazine_metafields_date',true) != '') { ?>
        <div class="post-info">
          <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>">
            <div class="dateday"><?php echo esc_html( get_the_date( 'd') ); ?></div>
            <hr class="metahr m-0 p-0">
            <div class="month"><?php echo esc_html( get_the_date( 'M' ) ); ?></div>
            <div class="year"><?php echo esc_html( get_the_date( 'Y' ) ); ?></div>
          <span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a>
        </div>
      <?php }?>
    <?php }?>
    <h2><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <?php if(get_the_excerpt()) { ?>
      <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( multipurpose_magazine_string_limit_words( $excerpt, esc_attr(get_theme_mod('multipurpose_magazine_post_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('multipurpose_magazine_button_excerpt_suffix','...') ); ?></p></div>
    <?php }?>
    <?php if ( get_theme_mod('multipurpose_magazine_blog_button_text','Read Full') != '' ) {?>
      <div class="blogbtn">
        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small"><?php echo esc_html( get_theme_mod('multipurpose_magazine_blog_button_text',__('Read Full', 'multipurpose-magazine')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('multipurpose_magazine_blog_button_text',__('Read Full', 'multipurpose-magazine')) ); ?></span></a>
      </div>
    <?php }?>
  </article>
</div>