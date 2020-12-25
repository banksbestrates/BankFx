<?php
/**
* Template part for displaying posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<div class="textwp-compact-post-wrapper">
<div id="post-<?php the_ID(); ?>" class="textwp-compact-post textwp-item-post textwp-box">
<div class="textwp-box-inside">

    <?php if ( !(textwp_get_option('hide_thumbnail_home')) ) { ?>
    <?php if ( has_post_thumbnail() ) { ?>
        <div class="textwp-compact-post-thumbnail textwp-fp-post-thumbnail">
            <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'textwp' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="textwp-compact-post-thumbnail-link textwp-fp-post-thumbnail-link"><?php the_post_thumbnail('textwp-100w-100h-image', array('class' => 'textwp-compact-post-thumbnail-img textwp-fp-post-thumbnail-img', 'title' => the_title_attribute('echo=0'))); ?></a>
        </div>
    <?php } else { ?>
        <?php if ( !(textwp_get_option('hide_default_thumbnail_home')) ) { ?>
        <div class="textwp-compact-post-thumbnail textwp-fp-post-thumbnail">
            <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'textwp' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="textwp-compact-post-thumbnail-link textwp-fp-post-thumbnail-link"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/no-image-100-100.jpg' ); ?>" class="textwp-compact-post-thumbnail-img textwp-fp-post-thumbnail-img"/></a>
        </div>
        <?php } ?>
    <?php } ?>
    <?php } ?>

    <?php if ( !(textwp_get_option('hide_post_title_home')) ) { ?>
    <?php the_title( sprintf( '<h2 class="textwp-compact-post-title textwp-fp-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    <?php } ?>

    <?php textwp_compactview_postmeta(); ?>

    <?php if ( !(textwp_get_option('hide_post_snippet')) ) { ?><div class="textwp-compact-post-snippet textwp-fp-post-snippet textwp-compact-post-excerpt textwp-fp-post-excerpt"><?php the_excerpt(); ?></div><?php } ?>

    <?php if ( textwp_get_option('show_read_more_button') ) { ?><div class='textwp-compact-post-read-more textwp-fp-post-read-more'><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( textwp_read_more_text() ); ?><span class="textwp-sr-only"> <?php echo wp_kses_post( get_the_title() ); ?></span></a></div><?php } ?>

</div>
</div>
</div>