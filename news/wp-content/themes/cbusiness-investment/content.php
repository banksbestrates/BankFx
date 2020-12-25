<?php
/**
 * @package cbusiness-investment
 */
?>
 <div class="recent_articles">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
         <?php if (has_post_thumbnail() ){ ?>
			<div class="post-thumb">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
			</div>
		<?php }  ?> 
        
        <header class="entry-header">           
            <h4><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
            
        </header><!-- .entry-header -->
          
        <?php if ( is_search() || !is_single() ) : ?>
        <div class="entry-summary">
           	<?php the_excerpt(); ?>
            <?php if ( 'post' == get_post_type() ) : ?>
                <div class="postmeta">
                    <div class="post-date"><?php the_date(); ?></div><!-- post-date -->
                    <div class="post-comment"> <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></div>                                  
                </div><!-- postmeta -->
            <?php endif; ?>            
            <div class="clear"></div>
        </div><!-- .entry-summary -->
        <?php else : ?>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading ', 'cbusiness-investment' ) .'<span class="meta-nav">&rarr;</span>'); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cbusiness-investment' ),
                    'after'  => '</div>',
                ) );
            ?>

        </div><!-- .entry-content -->
        <?php endif; ?>
        <div class="clear"></div>
    </article><!-- #post-## -->
</div><!-- site-bloglist-repeat -->