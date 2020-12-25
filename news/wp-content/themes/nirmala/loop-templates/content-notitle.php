<?php
/**
 * Partial template for content without title in page.php
 *
 * @package nirmala
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('mb-3 border-bottom'); ?> id="post-<?php the_ID(); ?>">

	<header class="d-none entry-header">

		<?php the_title( '<h1 class="entry-title border-bottom">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'd-block mx-auto mb-3' ) ); ?>

	<div class="entry-content mb-3">

		<?php the_content(); ?>

		<div class="clearfix"></div>

	</div><!-- .entry-content -->

	<?php
	wp_link_pages( array(
		'before' => '<div class="multipages mt-3 py-2 border-top border-bottom">' . __( 'Pages:', 'nirmala' ),
		'after'  => '</div>'
	) );
	?>

	<?php nirmala_edit_link(); ?>

</article><!-- #post-## -->
