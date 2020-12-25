<?php
/**
 * The template for displaying all attachment page
 *
 *
 * @package timesnews
 */

get_header();
?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php 

		do_action ('timesnews_frontend_main_banner_after_hook');
		while ( have_posts() ) :
			the_post();

?>
	<header class="entry-header">
		
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php

		/**
		 * Filter the default timesnews image attachment size.
		 *
		 * @since Twenty Sixteen 1.0
		 *
		 * @param string $image_size Image size. Default 'large'.
		 */
		$image_size = apply_filters( 'timesnews_attachment_size', 'full' ); ?>

		<div class="post-thumbnail">
			<?php echo wp_get_attachment_image( get_the_ID(), $image_size ); ?>
		</div>

		<div class="entry-content-holder">

			<div class="entry-content">
				<?php 
				the_content();
					wp_link_pages(
						array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'timesnews' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'timesnews' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						)
					);
									?>
			</div><!-- .entry-content -->


	<?php 
		// Retrieve attachment metadata.
		$metadata = wp_get_attachment_metadata();
		if ( $metadata ) {
			printf(
				'<span class="full-size-link"><span class="screen-reader-text">%1$s</span><a href="%2$s">%3$s &times; %4$s</a></span>',
				_x( 'Full size', 'Used before full size attachment link.', 'timesnews' ),
				esc_url( wp_get_attachment_url() ),
				absint( $metadata['width'] ),
				absint( $metadata['height'] )
			);
		}
	?>
		</div><!-- .entry-content-holder -->
	</article><!-- #post-<?php the_ID(); ?> -->
		


	<?php

		// Parent post navigation.
		the_post_navigation();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
	get_sidebar();
 ?>
</div><!-- .wrap -->
<?php
get_footer();
