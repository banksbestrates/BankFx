<?php
/**
* Template part for displaying a message that posts cannot be found.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<div class="no-results not-found">
    <div class="textwp-page-header-outside">
    <header class="textwp-page-header">
    <div class="textwp-page-header-inside">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'textwp' ); ?></h1>
    </div>
    </header><!-- .textwp-page-header -->
    </div>

    <div class="page-content">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                <p><?php
                    printf(
                        wp_kses(
                            /* translators: 1: link to WP admin new post page. */
                            __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'textwp' ),
                            array(
                                'a' => array(
                                    'href' => array(),
                                ),
                            )
                        ),
                        esc_url( admin_url( 'post-new.php' ) )
                    );
                ?></p>

        <?php elseif ( is_search() ) : ?>

                <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'textwp' ); ?></p>

                <?php get_search_form(); ?>

        <?php else : ?>

                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'textwp' ); ?></p>
                <?php get_search_form(); ?>

        <?php endif; ?>
    </div><!-- .page-content -->
</div><!-- .no-results -->