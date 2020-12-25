<?php
/**
 * Search results partial template
 *
 * @package nirmala
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('card pb-12px mb-3 rounded-0 border-top-0 border-left-0 border-right-0'); ?> id="post-<?php the_ID(); ?>">

<?php if ( has_post_thumbnail() ) { ?>
	<div class="text-center pt-2px mb-3">
		<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
	</div>
<?php } ?>

	<header class="entry-header">

	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),'</a></h2>' ); ?>

	<?php if ( 'post' === get_post_type() ) : ?>
	<div class="entry-meta small mb-2">
		<?php nirmala_posted_on(); ?>
	</div>
	<?php endif; ?>

	</header>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer small">
		<?php nirmala_entry_footer(); ?>
	</footer>

</article>
