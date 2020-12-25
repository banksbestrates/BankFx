<?php

function cbusiness_investment_style() {
    wp_enqueue_style('cbusiness-investment-basic-style', get_stylesheet_uri());
    wp_enqueue_style('cbusiness-investment-style', get_template_directory_uri() . '/view/css/cbusiness-investment-main.css');
    wp_enqueue_style('cbusiness-investment-responsive', get_template_directory_uri() . '/view/css/cbusiness-investment-responsive.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/view/css/font-awesome.css');
    wp_enqueue_script('cbusiness-investment-toggle', get_template_directory_uri() . '/view/js/cbusiness-investment-toggle.js', array('jquery'));
    wp_enqueue_script('cbusiness-investment-customjs', get_template_directory_uri() . '/view/js/cbusiness-investment-customjs.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'cbusiness_investment_style');
?>
<?php

function cbusiness_investment_header_style() {
    $cbusiness_investment_header_text_color = get_header_textcolor();
    if (get_theme_support('custom-header', 'default-text-color') === $cbusiness_investment_header_text_color) {
        return;
    }
    echo '<style id="cbusiness-investment-custom-header-styles" type="text/css">';
    if ('blank' !== $cbusiness_investment_header_text_color) {
        echo '.header_top .logo a,
            .blog-post h3 a,
            .blog-post .pageheading h1
			 {
				color: #' . esc_attr($cbusiness_investment_header_text_color) . '
			}';
    }
    echo '</style>';
}
