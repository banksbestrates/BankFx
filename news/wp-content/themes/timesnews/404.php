<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package timesnews
 */

get_header();
?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'timesnews' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<div class="error-page-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/404.png" alt="<?php esc_attr_e('404 Not Found','timesnews'); ?>"></div>
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'timesnews' ); ?></p>

					<?php
					get_search_form();
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
<?php
get_footer();
