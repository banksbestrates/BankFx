<?php
/**
 * Template part for displaying posts navigation
 *
 * @package MagazineBook
 */

?>
<div class="clearfix"></div>
<?php
if ( is_archive() || is_home() || is_search() ) {
	/**
	 * Checking WP-PageNaviplugin exist
	 */
	if ( function_exists( 'wp_pagenavi' ) ) {
		?>
		<div class="theme-wp_pagenavi">
			<?php
			wp_pagenavi();
			?>
		</div>
		<?php
	} else {
		?>
		<ul class="default-theme-posts-navigation">
			<li class="theme-nav-previous"><?php next_posts_link( esc_html__( '&larr; Previous', 'magazinebook' ) ); ?></li>
			<li class="theme-nav-next"><?php previous_posts_link( esc_html__( 'Next &rarr;', 'magazinebook' ) ); ?></li>
		</ul>
		<?php
	}
}

if ( is_single() ) {
	if ( is_attachment() ) {
		?>
		<ul class="default-theme-post-navigation">
			<li class="theme-nav-previous"><?php previous_image_link( false, __( '&larr; Previous', 'magazinebook' ) ); ?></li>
			<li class="theme-nav-next"><?php next_image_link( false, __( 'Next &rarr;', 'magazinebook' ) ); ?></li>
		</ul>
		<?php
	} else {
		?>
		<ul class="default-theme-post-navigation">
			<li class="theme-nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'magazinebook' ) . '</span> %title' ); ?></li>
			<li class="theme-nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'magazinebook' ) . '</span>' ); ?></li>
		</ul>
		<?php
	}
}
