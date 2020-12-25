<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
*
* @package Magazine edge
*/
?>
</div>
<footer class="main-footer">
	<div class="widgets-section">
		<div class="auto-container">
			<div class="row clearfix">
			 <?php dynamic_sidebar('magazine-edge-footer-widget-area'); ?>
			</div>
		</div>
	</div>
    <?php
	if ('' != magazine_edge_get_option('magazine_edge_show_footer_section')) :  ?>
		<div class="footer-bottom">
			<div class="copyright-section">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright"><?php echo esc_html(magazine_edge_get_option('magazine_edge_footer_copyright_text'));?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>
</footer>
</div>
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up"></span></div>
<?php wp_footer(); ?>
</body>
</html>