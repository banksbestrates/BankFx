<?php
/**
 * The template part for displaying a message that posts cannot be found.
 * @package Multipurpose Magazine
 */
?>

<header role="banner">
	<h2 class="entry-title"><?php echo esc_html( get_theme_mod('multipurpose_magazine_search_result_title',__('Nothing Found', 'multipurpose-magazine' )) ); ?></h2>
</header>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	
	<p><?php printf( esc_html__( 'Ready to publish your first post? Get started here.', 'multipurpose-magazine' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
<?php elseif ( is_search() ) : ?>
	<p><?php echo esc_html( get_theme_mod('multipurpose_magazine_search_result_text',__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'multipurpose-magazine' )) ); ?></p><br />
		<?php get_search_form(); ?>
<?php else : ?>
	<p><?php esc_html_e( 'Dont worry it happens to the best of us.', 'multipurpose-magazine' ); ?></p><br />
	<div class="read-moresec">
		<a href="<?php echo esc_url( home_url() ); ?>" class="button"><?php esc_html_e( 'Return to the home page', 'multipurpose-magazine' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Return to the home page', 'multipurpose-magazine' ); ?></span></a>
	</div>
<?php endif; ?>