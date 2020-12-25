<?php
/**
 * The sidebar containing footer widget areas
 *
 * @package MagazineBook
 */

if ( ! is_active_sidebar( 'magazinebook_footer_widget_one' ) &&
	! is_active_sidebar( 'magazinebook_footer_widget_two' ) &&
	! is_active_sidebar( 'magazinebook_footer_widget_three' ) &&
	! is_active_sidebar( 'magazinebook_footer_widget_four' ) ) {
	return;
}
?>

<section class="footer-widget-area">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-5 px-lg-3">
				<?php
				if ( is_active_sidebar( 'magazinebook_footer_widget_one' ) ) :
					dynamic_sidebar( 'magazinebook_footer_widget_one' );
				endif;
				?>
			</div>
			<div class="col-md-7 px-lg-3">
				<div class="row">
					<div class="col-md-4">
					<?php
					if ( is_active_sidebar( 'magazinebook_footer_widget_two' ) ) :
						dynamic_sidebar( 'magazinebook_footer_widget_two' );
					endif;
					?>
					</div>
					<div class="col-md-4">
					<?php
					if ( is_active_sidebar( 'magazinebook_footer_widget_three' ) ) :
						dynamic_sidebar( 'magazinebook_footer_widget_three' );
					endif;
					?>
					</div>
					<div class="col-md-4">
					<?php
					if ( is_active_sidebar( 'magazinebook_footer_widget_four' ) ) :
						dynamic_sidebar( 'magazinebook_footer_widget_four' );
					endif;
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
