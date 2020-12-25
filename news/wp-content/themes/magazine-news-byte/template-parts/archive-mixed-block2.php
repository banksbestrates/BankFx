<?php
/**
 * Template to display single post content on archive pages
 * Archive Post Style: Mixed-Block2
 */

$magnb_archive_postcounter = hoot_data( 'archive_postcounter' );
if ( empty( $magnb_archive_postcounter ) )
	$magnb_archive_postcounter = 0;
$magnb_archive_postcounter++;
hoot_set_data( 'archive_postcounter', $magnb_archive_postcounter );

if ( $magnb_archive_postcounter == 1 ) :
?>

<article <?php hoot_attr( 'post', '', 'archive-mixed archive-mixed-block2 mixedunit-big' ); ?>>

	<div class="entry-grid hgrid">

		<?php if ( is_sticky() ) : ?>
			<div class="entry-sticky-tag invert-typo"><?php esc_html_e( 'Sticky', 'magazine-news-byte' ) ?></div>
		<?php endif; ?>

		<?php $img_size = apply_filters( 'magnb_archive_imgsize', '', 'mixedbig' );
		hoot_post_thumbnail( 'entry-content-featured-img entry-grid-featured-img', $img_size, true, esc_url( get_permalink() ) ); ?>

		<div class="entry-grid-content hgrid-span-12">

			<header class="entry-header">
				<?php the_title( '<h2 ' . hoot_get_attr( 'entry-title' ) . '><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
			</header><!-- .entry-header -->

			<div class="screen-reader-text" itemprop="datePublished" itemtype="https://schema.org/Date"><?php echo get_the_date('Y-m-d'); ?></div>
			<?php hoot_display_meta_info( hoot_get_mod('archive_post_meta'), 'mixedunit-big' ); ?>

			<?php
			$archive_post_content = hoot_get_mod('archive_post_content');
			if ( 'full-content' == $archive_post_content ) {
				?><div <?php hoot_attr( 'entry-summary', 'content' ); ?>><?php
					the_content();
				?></div><?php
				wp_link_pages();
			} elseif ( 'excerpt' == $archive_post_content ) {
				?><div <?php hoot_attr( 'entry-summary', 'excerpt' ); ?>><?php
					the_excerpt();
				?></div><?php
			}
			?>

		</div><!-- .entry-grid-content -->

	</div><!-- .entry-grid -->

</article><!-- .entry -->

<?php else : ?>

<article <?php hoot_attr( 'post', '', 'archive-mixed archive-mixed-block2 mixedunit-block2 hcolumn-1-2' ); ?>>

	<div class="entry-grid hgrid">

		<?php if ( is_sticky() ) : ?>
			<div class="entry-sticky-tag invert-typo"><?php esc_html_e( 'Sticky', 'magazine-news-byte' ) ?></div>
		<?php endif; ?>

		<?php $img_size = apply_filters( 'magnb_archive_imgsize', 'hoot-large-thumb', 'mixedblock2' );
		hoot_post_thumbnail( 'entry-content-featured-img entry-grid-featured-img', $img_size, true, esc_url( get_permalink() ) ); ?>

		<div class="entry-grid-content">

			<header class="entry-header">
				<?php the_title( '<h2 ' . hoot_get_attr( 'entry-title' ) . '><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
			</header><!-- .entry-header -->

			<div class="screen-reader-text" itemprop="datePublished" itemtype="https://schema.org/Date"><?php echo get_the_date('Y-m-d'); ?></div>
			<?php hoot_display_meta_info( hoot_get_mod('archive_post_meta'), 'mixedunit-block2' ); ?>

			<?php
			$archive_post_content = hoot_get_mod('archive_post_content');
			if ( 'full-content' == $archive_post_content ) {
				?><div <?php hoot_attr( 'entry-summary', 'content' ); ?>><?php
					the_content();
				?></div><?php
				wp_link_pages();
			} elseif ( 'excerpt' == $archive_post_content ) {
				?><div <?php hoot_attr( 'entry-summary', 'excerpt' ); ?>><?php
					the_excerpt();
				?></div><?php
			}
			?>

		</div><!-- .entry-grid-content -->

	</div><!-- .entry-grid -->

</article><!-- .entry -->

<?php endif; ?>