<!--Top Left-->
<?php
	if ('' != magazine_edge_get_option('magazine_edge_show_flash_news_section')) : 
	$magazine_edge_category = magazine_edge_get_option('magazine_edge_select_flash_news_category');
	$magazine_edge_em_ticker_news_title = magazine_edge_get_option('magazine_edge_flash_news_title');
	$magazine_edge_all_posts = magazine_edge_get_posts(5, $magazine_edge_category); ?>

	<div class="news-tiker">
		<div class="bn-title">
			<h6 class="uppercase">
				<?php echo esc_html($magazine_edge_em_ticker_news_title);?>
			</h6>
		</div>
		<?php if ($magazine_edge_all_posts->have_posts()) : ?>
			<ul class="breaking__ticker-active owl-carousel">
				<?php
				while ($magazine_edge_all_posts->have_posts()) : $magazine_edge_all_posts->the_post();?>
					<li>
						<a href="<?php the_permalink();?>">
							<?php the_title(); ?>
						</a>
					</li>
				<?php endwhile;
				wp_reset_postdata();
				?>
			</ul>
		<?php endif; ?>
	</div>
<?php endif;?>
