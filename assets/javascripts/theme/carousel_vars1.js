	<script type="text/javascript">
	jQuery(window).load(function($) {
	/*-----------------------------------------------------------------------------------*/
	/*	carouFredSel - http://caroufredsel.frebsite.nl/configuration.php
	/*-----------------------------------------------------------------------------------*/		
			jQuery("#slides").carouFredSel({
				height: "variable",
				width: "auto",
				auto	: {
					play : <?php echo get_option_tree('fpslider_auto'); ?>,
					timeoutDuration  : <?php echo get_option_tree('fpslider_autoduration'); ?>
				},
				responsive  : true,
				circular : true,
				infinite : true,			
				items       : {
					height: "auto",
					visible          : <?php echo get_option_tree('fpslider_count'); ?>,
					minimum          : <?php echo get_option_tree('fpslider_count'); ?>
				},
				scroll : {
					items           : <?php echo get_option_tree('fpslider_count'); ?>,
					easing          : "quadratic",
					fx 				: "<?php echo get_option_tree('fpslider_fx'); ?>",
					duration        : 1000,                        
					pauseOnHover    : true,
					wipe : true, 
				},
				prev : {
					button      : ".fpslider #carousel_prev",
					key         : "left",
					duration    : 500
					},			    
				next : {
					button      : ".fpslider #carousel_next",
					key         : "right",
					duration    : 500
						},			
				onCreate : function(items) {
					jQuery('#slides img').fadeIn(500);
				},	 	
							   
			}).find(".slide").hover(
			);
	});
	</script>