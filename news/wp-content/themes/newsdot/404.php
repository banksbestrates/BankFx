<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

<div id="content" class="site-content">
	<div class="container">
		<div class="row align-content-center justify-content-center">

			<?php if ( get_theme_mod( 'newsdot_site_layout', 'right' ) === 'left' ) : ?>
			<div class="col-lg-3 order-lg-0 order-1">
				<?php get_sidebar(); ?>
			</div>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'newsdot_site_layout', 'right' ) === 'full' ) : ?>
			<div class="col-lg-12">
			<?php else : ?>
			<div class="col-lg-9">
			<?php endif; ?>
				<main id="primary" class="site-main">

					<section class="error-404 not-found">
						<header class="page-header">
							<h2 class="title-404"><span><?php esc_html_e( '404', 'newsdot' ); ?></span></h2>
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'newsdot' ); ?></h1>
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'newsdot' ); ?></p>
							<?php get_search_form(); ?>
						</header><!-- .page-header -->

						<div class="page-content">

							<div class="row">

								<div class="col">
									<?php the_widget( 'WP_Widget_Recent_Posts', 'show_date=1' ); ?>
								</div>

								<div class="col">
									<div class="widget widget_categories">
										<h5 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'newsdot' ); ?></h5>
										<ul>
											<?php
											wp_list_categories(
												array(
													'orderby'    => 'count',
													'order'      => 'DESC',
													'show_count' => 1,
													'title_li'   => '',
													'number'     => 10,
												)
											);
											?>
										</ul>
									</div><!-- .widget -->
								</div>

								<div class="col">
									<?php
									/* translators: %1$s: smiley */
									$newsdot_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'newsdot' ), convert_smilies( ':)' ) ) . '</p>';
									the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h5>$newsdot_archive_content" );
									?>
								</div>

								<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
							</div>

						</div><!-- .page-content -->
					</section><!-- .error-404 -->

				</main><!-- #main -->
			</div>

			<?php if ( get_theme_mod( 'newsdot_site_layout', 'right' ) === 'right' ) : ?>
				<div class="col-lg-3">
					<?php get_sidebar(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php
get_footer();
