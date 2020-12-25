<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Magazine edge
*/
?>

<!doctype html>
<html 
   <?php language_attributes(); ?>>
   <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
   </head>
   	<body <?php body_class(); ?>>

   	<?php
		if ( function_exists( 'wp_body_open' ) ) {
		    wp_body_open();
		} else {
		    do_action( 'wp_body_open' );
		}
    ?>
   		<div id="page" class="site">
    		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'magazine-edge'); ?></a>
		<div class="page-wrapper">
			<?php if('' != magazine_edge_get_option('magazine_edge_enable_site_preloader')) : ?>
				<div class="preloader"></div>
			<?php endif; ?>

			<header class="main-header header-style-three">
				<?php 
				  if('' != magazine_edge_get_option('show_magazine_blog_topbar_header_section')):
				?>
				<div class="header-top">
					<div class="auto-container">
						<div class="clearfix">
							<div class="top-left col-md-8 col-sm-12 col-xs-12">
						  		<?php get_template_part('template-part/homepage-section/topheader-news'); ?>
						  	</div>
						  	<div class="top-right pull-right col-md-4 col-sm-12 col-xs-12">
						  		<?php get_template_part('template-part/homepage-section/topheader-social');?>
						  	</div>
						</div>
			        </div>
			    </div>
				<?php endif; ?>

				<?php get_template_part('template-part/homepage-section/advertisement'); ?>

	    		<div class="header-lower">
					<div class="auto-container">
						<div class="nav-outer clearfix">
							<nav id="site-navigation" class="main-navigation">
	                            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
	                        	<?php
	                                wp_nav_menu( array(
	                                    'theme_location' => 'menu-1',
	                                    'menu_id'        => 'primary-menu',            
	                                ) );
	                            ?>
	                    	</nav>

							<div class="outer-box">
								<div class="search-box-outer">
									<div class="dropdown">
										<button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="fa fa-search"></span>
										</button>
										<ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu1">
											<li class="panel-outer">
												<div class="form-container">
													<button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
													<?php get_search_form(); ?>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="sticky-header">
					<div class="auto-container clearfix">
						<div class="logo pull-left">
							<?php magazine_edge_title_subtitle(); ?>
						</div>

						<div class="right-col pull-right">
	     					<nav id="site-navigation" class="main-navigation">
	                                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
	                                	<i class="fa fa-bars"></i></button>
	                        	<?php
	                                wp_nav_menu( array(
	                                    'theme_location' => 'menu-1',
	                                    'menu_id'        => 'primary-menu',
	                                    
	                                ) );
	                            ?>
	                      	</nav>
						</div>
					</div>
				</div>
			</header>
			<section class="hidden-bar left-align">
				<div class="hidden-bar-closer">
					<button><span class="qb-close-button"></span></button>
				</div>
			
				<div class="hidden-bar-wrapper">
					<div class="logo">
						<?php magazine_edge_title_subtitle(); ?>
					</div>


					<div class="options-box">
						<div class="sidebar-search">
							<?php get_search_form(); ?>
						</div>
						<?php get_template_part('template-part/homepage-section/topheader-social');?>
					</div>
				</div>
			</section>
		<div id="content" class="site-content"></div>