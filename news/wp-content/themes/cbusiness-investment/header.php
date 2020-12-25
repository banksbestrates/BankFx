<?php
/**
 * @package cbusiness-investment
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php esc_url( get_bloginfo( 'pingback_url' )); ?>">
<?php endif; ?>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php 
get_template_part('lib/template', 'headertop');
get_template_part('lib/template', 'banner');
?>
<?php if ( is_front_page() && !is_home() ) {?>
<div class="container">
<?php 
get_template_part('template', 'home');?>
</div>
<?php }?>