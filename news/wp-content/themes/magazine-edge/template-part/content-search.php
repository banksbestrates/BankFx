<div class="news-block-one blog-iso-item">
	<div class="inner-box">
		<div class="image">
			<a href="<?php the_permalink();?>"> 
				<?php 
				if(has_post_thumbnail()):
					the_post_thumbnail('magazine-edge-post'); 
				else:
				?>
					<img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/img/370x218.jpg"> 
				<?php
				endif;?>
			</a>
		</div>
		<div class="lower-box">
			<h3>
				<a href="<?php the_permalink();?>">
				<?php the_title(); ?>
				</a>
			</h3>
			<div class="post-date">
				<?php 
                  magazine_edge_posted_by();
                  magazine_edge_posted_on();
                  magazine_edge_entry_footer(); 
                ?>
			</div>
			<div class="text">
				<?php the_excerpt();?>
			</div>
			<a href="<?php the_permalink();?>" class="read-more">
				<?php echo esc_html__('Read More','magazine-edge');?>
				<span class="arrow ion-ios-arrow-thin-right"></span>
			</a>
		</div>
	</div>
</div>