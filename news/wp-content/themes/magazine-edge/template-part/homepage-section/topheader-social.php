<!--Top Right-->
<?php if('' != magazine_edge_get_option('show_top_social_section')):?>
	<ul class="social-nav">
	<?php

	  $magazine_edge_topbar_link1 = magazine_edge_get_option('topbar_fb_social_link');
	  $magazine_edge_topbar_link2 = magazine_edge_get_option('topbar_instagram_social_link');
	  $magazine_edge_topbar_link3 = magazine_edge_get_option('topbar_twitter_social_link');
	  $magazine_edge_topbar_link4 = magazine_edge_get_option('topbar_linkedin_social_link');
	  $magazine_edge_topbar_link5 = magazine_edge_get_option('topbar_youtube_social_link');

		if( !empty($magazine_edge_topbar_link1) ) { ?>   
		  	<li><a class="fa fa-facebook" href="<?php echo esc_url($magazine_edge_topbar_link1);?>" target="_blank" ></a></li>
		<?php } 
		
		if( !empty($magazine_edge_topbar_link2) ) { ?>    
			<li><a class="fa fa-instagram" href="<?php echo esc_url($magazine_edge_topbar_link2);?>" target="_blank"></a></li>
		<?php } 

		if( !empty($magazine_edge_topbar_link3)) { ?>   
			<li><a class="fa fa-twitter" href="<?php echo esc_url($magazine_edge_topbar_link3);?>" target="_blank"></a></li>
		<?php }
		
		if( !empty($magazine_edge_topbar_link4)) { ?>   
			<li><a class="fa fa-linkedin" href="<?php echo esc_url($magazine_edge_topbar_link4);?>" target="_blank"></a></li>
		<?php }

		if( !empty($magazine_edge_topbar_link5)) { ?>   
			<li><a class="fa fa-youtube" href="<?php echo esc_url($magazine_edge_topbar_link5);?>" target="_blank"></a></li>
		<?php } ?> 
	</ul>
<?php endif; ?>