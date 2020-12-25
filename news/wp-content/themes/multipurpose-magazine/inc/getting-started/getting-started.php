<?php
//about theme info
add_action( 'admin_menu', 'multipurpose_magazine_gettingstarted' );
function multipurpose_magazine_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'multipurpose-magazine'), esc_html__('Get Started', 'multipurpose-magazine'), 'edit_theme_options', 'multipurpose_magazine_guide', 'multipurpose_magazine_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function multipurpose_magazine_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'multipurpose_magazine_admin_theme_style');

//guidline for about theme
function multipurpose_magazine_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'multipurpose-magazine' );
?>
<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Multipurpose Magazine WordPress Theme', 'multipurpose-magazine' ); ?></h3>
		</div>
		<div class="color_bg_blue">
			<p>Version: <?php echo esc_html($theme['Version']);?></p>
				<p class="intro_version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and felxible WordPress theme.', 'multipurpose-magazine' ); ?></p>
				<div class="blink">
					<h4><?php esc_html_e( 'Theme Created By Themesglance', 'multipurpose-magazine' ); ?></h4>
				</div>
			<div class="intro-text"><img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/themesglance-logo.png" alt="" /></div>
			<div class="coupon-code"><?php esc_html_e( 'Get', 'multipurpose-magazine' ); ?> <span><?php esc_html_e( '20% off', 'multipurpose-magazine' ); ?></span> <?php esc_html_e( 'on Premium Theme with the discount code: ', 'multipurpose-magazine' ); ?> <span><?php esc_html_e( '" Get20 "', 'multipurpose-magazine' ); ?></span></div>
		</div>
		<div class="started">
			<h3><?php esc_html_e( 'Lite Theme Info', 'multipurpose-magazine' ); ?></h3>
			<p><?php esc_html_e( 'Multipurpose Magazine is a vibrant, energetic, feature-full and highly organized WordPress magazine theme which is made to be used by online magazines, newspapers, editors, journalists, publishing units, bloggers, informative sites, educational websites, content writers, digital news media and other similar websites. It is flexible to be used for portfolio website. This modern theme is filled with many advanced and high-level features and functions to design a top performing website. Banners and sliders are provided to give it a stylish look. You get unlimited colour options and numerous Google fonts to make it more appealing and eye-catching. Social media is an important part of any news and magazine website and that is why so many popular and trending social networking platforms are included in the theme. Its Bootstrap framework facilitates its easy usage. This magazine WordPress theme is totally responsive, compatible with various browsers, multilingual and optimized for search engines. It supports multiple post formats like image, video, audio etc. Multipurpose Magazine shows sharp and crisp images on retina ready devices enhancing overall website look. It has a great page loading speed. It can be deeply customized through theme customizer to suit your brand and give it a personalized touch.', 'multipurpose-magazine')?></p>
			<hr>
			<h3><?php esc_html_e( 'Help Docs', 'multipurpose-magazine' ); ?></h3>
			<ul>
				<p><?php esc_html_e( 'Multipurpose Magazine', 'multipurpose-magazine' ); ?> <a href="<?php echo esc_url( MULTIPURPOSE_MAGAZINE_THEMESGLANCE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'multipurpose-magazine' ); ?></a></p>
			</ul>
			<hr>
			<h3><?php esc_html_e( 'Get started with Multipurpose Magazine Theme', 'multipurpose-magazine' ); ?></h3>
			<div class="col-left-inner"> 
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/free-screenshot.png" alt="" />
			</div>		
			<div class="col-right-inner">
				<p><?php esc_html_e( 'Go to', 'multipurpose-magazine' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'multipurpose-magazine' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'multipurpose-magazine' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Easily customizable ', 'multipurpose-magazine' ); ?> </li>
					<li><?php esc_html_e( 'Absolutely free', 'multipurpose-magazine' ); ?> </li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'multipurpose-magazine'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/responsive.png" alt="" />
			<hr class="firsthr">
			<a href="<?php echo esc_url( MULTIPURPOSE_MAGAZINE_THEMESGLANCE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'multipurpose-magazine'); ?></a>
			<a href="<?php echo esc_url( MULTIPURPOSE_MAGAZINE_THEMESGLANCE_PRO_THEME_URL ); ?>"><?php esc_html_e('Buy Pro', 'multipurpose-magazine'); ?></a>
			<a href="<?php echo esc_url( MULTIPURPOSE_MAGAZINE_THEMESGLANCE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'multipurpose-magazine'); ?></a>
			<hr class="secondhr">
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'multipurpose-magazine'); ?></h3>
		<ul>
		 	<li><?php esc_html_e( 'Slider with unlimited slides', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Simple Menu option', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Seperate Posttype for the Courses', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'About Section for the company description', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "testimonial" listing', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Gallery section with the plugin', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Team section with the custom posttype', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Video Promotion', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Plans listing', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Record section', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Social Icon widget', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Blog Post section on home', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Book now with contact form 7', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Frequently asked question', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Latest Blog Post Section', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Contact widget for footer', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Contact page Template', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Recent Post Widget with thumbnails', 'multipurpose-magazine'); ?></li>
		 	<li><?php esc_html_e( 'Blog full width, With Left and Right sidebar Template', 'multipurpose-magazine'); ?></li>
		</ul>
	</div>
	<div class="service">
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-media-document"></span> <?php esc_html_e('Get Support', 'multipurpose-magazine'); ?></h3>
			<ol>
				<li>
				<a href="<?php echo esc_url( MULTIPURPOSE_MAGAZINE_THEMESGLANCE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'multipurpose-magazine'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-welcome-widgets-menus"></span> <?php esc_html_e('Getting Started', 'multipurpose-magazine'); ?></h3>
			<ol>
				<li> <?php esc_html_e('Start', 'multipurpose-magazine'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'multipurpose-magazine'); ?></a> <?php esc_html_e('your website.', 'multipurpose-magazine'); ?></li>
			</ol>
		</div>
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e('Rate This Theme', 'multipurpose-magazine'); ?></h3>
			<ol>
				<li>
				<a href="<?php echo esc_url( MULTIPURPOSE_MAGAZINE_THEMESGLANCE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Rate it here', 'multipurpose-magazine'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-editor-help"></span> <?php esc_html_e( 'Help Docs', 'multipurpose-magazine' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'Multipurpose Magazine Lite', 'multipurpose-magazine' ); ?> <a href="<?php echo esc_url( MULTIPURPOSE_MAGAZINE_THEMESGLANCE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'multipurpose-magazine' ); ?></a></li>
			</ol>
		</div>
	</div>
</div>
<?php } ?>