<?php
if ('' != magazine_edge_get_option('magazine_edge_show_homepage_brief_news_section')) : 
$magazine_edge_category = magazine_edge_get_option('magazine_edge_select_homepage_brief_news_category');

$magazine_edge_brief_news_title = magazine_edge_get_option('magazine_edge_brief_news_title');
$magazine_edge_all_posts = magazine_edge_get_posts(6, $magazine_edge_category);
if ($magazine_edge_all_posts->have_posts()) : ?>

<div class="content">
	<div class="sec-title">
		<h2><?php echo esc_html($magazine_edge_brief_news_title); ?></h2>
	</div>
	<div class="row clearfix blog-isotope">
		<?php
	  while ($magazine_edge_all_posts->have_posts()) : $magazine_edge_all_posts->the_post(); 

			get_template_part( 'template-part/contenthp', get_post_format() );

		 endwhile;?>
	</div>
</div>
<?php 
else :
	get_template_part( 'template-part/content', 'none' );
endif; 
endif; ?>