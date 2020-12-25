<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package MagazineBook
 */

get_header();
?>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-md-12">
			<main id="main" class="site-main">

				<section class="error-404 not-found">
					<header class="page-header text-center">
						<h2 class="err-404-text"><?php esc_html_e( '404', 'magazinebook' ); ?></h2>
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'magazinebook' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p class="text-center"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'magazinebook' ); ?></p>

						<div class="row justify-content-center">
							<div class="col-md-4">
								<div class="mb-5 text-center">
									<?php get_search_form(); ?>
								</div>
							</div>
						</div>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
</div>

<?php
get_footer();
