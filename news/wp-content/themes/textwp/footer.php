<?php
/**
* The template for displaying the footer
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

</div>

</div><!--/#textwp-content-wrapper -->
</div><!--/#textwp-wrapper -->

<div class="textwp-outer-wrapper">
<?php textwp_bottom_wide_widgets(); ?>
</div>

<?php textwp_before_footer(); ?>

<?php if ( !(textwp_hide_footer_widgets()) ) { ?>
<?php if ( is_active_sidebar( 'textwp-footer-1' ) || is_active_sidebar( 'textwp-footer-2' ) || is_active_sidebar( 'textwp-footer-3' ) || is_active_sidebar( 'textwp-footer-4' ) || is_active_sidebar( 'textwp-footer-5' ) || is_active_sidebar( 'textwp-footer-6' ) || is_active_sidebar( 'textwp-top-footer' ) || is_active_sidebar( 'textwp-bottom-footer' ) ) : ?>
<div class='textwp-clearfix' id='textwp-footer-blocks' itemscope='itemscope' itemtype='http://schema.org/WPFooter' role='contentinfo'>
<div class='textwp-container textwp-clearfix'>
<div class="textwp-outer-wrapper">

<?php if ( is_active_sidebar( 'textwp-top-footer' ) ) : ?>
<div class='textwp-clearfix'>
<div class='textwp-top-footer-block'>
<?php dynamic_sidebar( 'textwp-top-footer' ); ?>
</div>
</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'textwp-footer-1' ) || is_active_sidebar( 'textwp-footer-2' ) || is_active_sidebar( 'textwp-footer-3' ) || is_active_sidebar( 'textwp-footer-4' ) || is_active_sidebar( 'textwp-footer-5' ) || is_active_sidebar( 'textwp-footer-6' ) ) : ?>
<div class='textwp-footer-block-cols textwp-clearfix'>

<div class="textwp-footer-block-col textwp-footer-4-col" id="textwp-footer-block-1">
<?php dynamic_sidebar( 'textwp-footer-1' ); ?>
</div>

<div class="textwp-footer-block-col textwp-footer-4-col" id="textwp-footer-block-2">
<?php dynamic_sidebar( 'textwp-footer-2' ); ?>
</div>

<div class="textwp-footer-block-col textwp-footer-4-col" id="textwp-footer-block-3">
<?php dynamic_sidebar( 'textwp-footer-3' ); ?>
</div>

<div class="textwp-footer-block-col textwp-footer-4-col" id="textwp-footer-block-4">
<?php dynamic_sidebar( 'textwp-footer-4' ); ?>
</div>

</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'textwp-bottom-footer' ) ) : ?>
<div class='textwp-clearfix'>
<div class='textwp-bottom-footer-block'>
<?php dynamic_sidebar( 'textwp-bottom-footer' ); ?>
</div>
</div>
<?php endif; ?>

</div>
</div>
</div><!--/#textwp-footer-blocks-->
<?php endif; ?>
<?php } ?>

<div class='textwp-clearfix' id='textwp-footer'>
<div class='textwp-foot-wrap textwp-container'>
<div class="textwp-outer-wrapper">

<?php if ( textwp_get_option('footer_text') ) : ?>
  <p class='textwp-copyright'><?php echo esc_html(textwp_get_option('footer_text')); ?></p>
<?php else : ?>
  <p class='textwp-copyright'><?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'textwp' ), esc_html(date_i18n(__('Y','textwp'))) . ' ' . esc_html(get_bloginfo( 'name' ))  ); ?></p>
<?php endif; ?>
<p class='textwp-credit'><a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'textwp' ), 'ThemesDNA.com' ); ?></a></p>

</div>
</div>
</div><!--/#textwp-footer -->

<?php textwp_after_footer(); ?>

</div>

<button class="textwp-scroll-top" title="<?php esc_attr_e('Scroll to Top','textwp'); ?>"><i class="fas fa-arrow-up" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e('Scroll to Top', 'textwp'); ?></span></button>

<?php wp_footer(); ?>
</body>
</html>