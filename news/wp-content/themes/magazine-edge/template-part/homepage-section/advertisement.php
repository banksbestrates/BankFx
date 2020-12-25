<div class="header-upper">
	<div class="auto-container">
		<div class="clearfix">
			<div class="pull-left logo-outer">
				<div class="logo">
					<?php magazine_edge_title_subtitle(); ?>
				</div>
			</div>
			<?php
			if (('' != magazine_edge_get_option('magazine_edge_banner_advertisement_section')) ) 
			{ 
				$magazine_edge_banner_advertisement = absint(magazine_edge_get_option('magazine_edge_banner_advertisement_section'));
				$magazine_edge_banner_url = magazine_edge_get_option('magazine_edge_banner_advertisement_section_url');
				$magazine_edge_banner_advertisement_url = isset($magazine_edge_banner_url) ? esc_url($magazine_edge_banner_url) : esc_html__('#','magazine-edge');
				$magazine_edge_open_on_new_tab = ('' != magazine_edge_get_option('magazine_edge_banner_advertisement_open_on_new_tab')) ? '_blank' : '';    
			?>
				<div class="pull-right upper-right clearfix">
					<div class="add-image">
						<?php
						$magazine_edge_advertisement_scope = magazine_edge_get_option('magazine_edge_banner_advertisement_scope');
						if ($magazine_edge_advertisement_scope == 'another-page') 
						{
						?>
							<a  href="<?php echo esc_url($magazine_edge_banner_advertisement_url); ?>" target="<?php echo esc_url($magazine_edge_open_on_new_tab); ?>">
							<?php 
							echo  wp_get_attachment_image(esc_html($magazine_edge_banner_advertisement), 'full');
							?>          
							</a>
						<?php
						} 
						elseif ($magazine_edge_advertisement_scope == 'front-page-only')
						{
							if (is_front_page() || is_home()) 
							{
							?>
								<a  href="<?php echo esc_url($magazine_edge_banner_advertisement_url); ?>" target="<?php echo esc_url($magazine_edge_open_on_new_tab); ?>">
								<?php 
								echo  wp_get_attachment_image(esc_html($magazine_edge_banner_advertisement), 'full');
								?>
								</a>
						<?php
							}
						}
						?>
					</div>
				</div>
			<?php 
			} 
			?>
		</div>
	</div>
</div>