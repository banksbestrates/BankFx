<?php
/**
 * Template Name: Home Template
 *
 * @package timesnews
 * 
 */

get_header();
$timesnews_standart_section_position = get_theme_mod ('standart_section_position','bottom');

if ( $timesnews_standart_section_position == 'top'){

	/*
	 * Standard Section
	 */

	do_action ('timesnews_frontend_standard_section');
}


?>

<div class="main-section">
	<div class="wrap">
		<div id="main-content-area" class="main-content-area">
			<div class="main-content-holder">
				<?php 
					do_action ('timesnews_frontend_main_banner_after_hook');

					if ( is_active_sidebar( 'timesnews-template-main' ) ) {
						dynamic_sidebar( 'timesnews-template-main' );
					}
				?>
			</div><!-- .main-content-holder -->
		</div><!-- .main-content-area -->
		
		<?php
			if ( is_active_sidebar( 'timesnews-template-primary' ) ) { ?>
				<aside id="left-widget-area" class="left-widget-area" role="complementary" aria-label="<?php esc_attr_e('Template Left','timesnews'); ?>">
					<div class="theiaStickySidebar">

						<?php dynamic_sidebar( 'timesnews-template-primary' ); ?>

					</div>
				</aside><!-- .left-widget-area -->

		<?php }

		if ( is_active_sidebar( 'timesnews-template-secondary' ) ) { ?>
			<aside id="right-widget-area" class="right-widget-area" role="complementary" aria-label="<?php esc_attr_e('Template Right','timesnews'); ?>">
				<div class="theiaStickySidebar">

					<?php dynamic_sidebar( 'timesnews-template-secondary' ); ?>

				</div>
			</aside><!-- .right-widget-area -->

		<?php } ?>
	</div><!-- .wrap -->
</div><!-- .main-section -->

<?php
if ( $timesnews_standart_section_position == 'bottom'){

	/*
	 * Standard Section
	 */

	do_action ('timesnews_frontend_standard_section');
}

get_footer();