<?php
/**
* Post meta functions
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'textwp_post_tags' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function textwp_post_tags() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'textwp' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<span class="textwp-tags-links"><i class="fas fa-tags" aria-hidden="true"></i> ' . esc_html__( 'Tagged %1$s', 'textwp' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;

if ( ! function_exists( 'textwp_compactview_postmeta' ) ) :
function textwp_compactview_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( !(textwp_get_option('hide_post_author_home')) || !(textwp_get_option('hide_posted_date_home')) || !(textwp_get_option('hide_comments_link_home')) ) { ?>
    <div class="textwp-compact-post-footer textwp-fp-post-footer">
    <?php if ( !(textwp_get_option('hide_post_author_home')) ) { ?><span class="textwp-compact-post-author textwp-fp-post-author textwp-compact-post-meta textwp-fp-post-meta"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(textwp_get_option('hide_posted_date_home')) ) { ?><span class="textwp-compact-post-date textwp-fp-post-date textwp-compact-post-meta textwp-fp-post-meta"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php echo esc_html(get_the_date()); ?></span><?php } ?>
    <?php if ( !(textwp_get_option('hide_comments_link_home')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="textwp-compact-post-comment textwp-fp-post-comment textwp-compact-post-meta textwp-fp-post-meta"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( '0 Comments<span class="screen-reader-text"> on %s</span>', 'textwp' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;

if ( ! function_exists( 'textwp_single_cats' ) ) :
function textwp_single_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( ', ', 'textwp' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="textwp-entry-meta-single textwp-entry-meta-single-top"><span class="textwp-entry-meta-single-cats"><i class="far fa-folder-open" aria-hidden="true"></i>&nbsp;' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'textwp' ) . '</span></div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;

if ( ! function_exists( 'textwp_single_postmeta' ) ) :
function textwp_single_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( !(textwp_get_option('hide_post_author')) || !(textwp_get_option('hide_posted_date')) || !(textwp_get_option('hide_comments_link')) || !(textwp_get_option('hide_post_edit')) ) { ?>
    <div class="textwp-entry-meta-single">
    <?php if ( !(textwp_get_option('hide_post_author')) ) { ?><span class="textwp-entry-meta-single-author"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(textwp_get_option('hide_posted_date')) ) { ?><span class="textwp-entry-meta-single-date"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php echo esc_html(get_the_date()); ?></span><?php } ?>
    <?php if ( !(textwp_get_option('hide_comments_link')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="textwp-entry-meta-single-comments"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'textwp' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?><?php } ?>
    <?php if ( !(textwp_get_option('hide_post_edit')) ) { ?><?php edit_post_link( sprintf( wp_kses( /* translators: %s: Name of current post. Only visible to screen readers */ __( 'Edit<span class="screen-reader-text"> %s</span>', 'textwp' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ), '<span class="edit-link">&nbsp;&nbsp;<i class="far fa-edit" aria-hidden="true"></i> ', '</span>' ); ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;

if ( ! function_exists( 'textwp_page_postmeta' ) ) :
function textwp_page_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( !(textwp_get_option('hide_page_author')) || !(textwp_get_option('hide_page_date')) || !(textwp_get_option('hide_page_comments')) ) { ?>
    <div class="textwp-entry-meta-single textwp-entry-meta-page">
    <?php if ( !(textwp_get_option('hide_page_author')) ) { ?><span class="textwp-entry-meta-single-author"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(textwp_get_option('hide_page_date')) ) { ?><span class="textwp-entry-meta-single-date"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php echo esc_html(get_the_date()); ?></span><?php } ?>
    <?php if ( !(textwp_get_option('hide_page_comments')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="textwp-entry-meta-single-comments"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'textwp' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;