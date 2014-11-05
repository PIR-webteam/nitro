<!-- Top Hat -->
<?php if (get_option_tree('top_hat') == 'Yes') { ?>
<div class="super-container full-width" id="section-tophat">

	<!-- 960 Container -->
	<div class="container">			
		
		<div class="sixteen columns">
					
			<div class="five columns alpha tagline" style="height: 18px;" id="tagline">				
				<div class="tophat_blurb"><?php echo get_option_tree('top_hat_blurb'); ?></div>
				<!-- <?php get_search_form(); ?> -->
			</div>						
			
			<div class="tophat_social omega">				
				<?php get_template_part( 'element', 'getsocial' ); ?>
			</div>	
			
		</div>
		
	</div>
	
</div>
<?php } else{} ?>