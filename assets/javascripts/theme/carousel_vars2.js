<script type="text/javascript">
	jQuery(window).load(function($) {
	/*-----------------------------------------------------------------------------------*/
	/*	carouFredSel - http://caroufredsel.frebsite.nl/configuration.php
	/*-----------------------------------------------------------------------------------*/		
			jQuery("#pageslides").carouFredSel({
				height: "variable",
				auto	: {
					play : <?php echo get_post_meta($postid, 'slider_auto', true); ?>,
					timeoutDuration  : <?php echo get_option_tree('fpslider_autoduration'); ?>
				},
				responsive  : true,
				circular : true,
				infinite : true,			
				items       : {
					height: "auto",
					visible          : <?php echo get_post_meta($postid, 'slider_count', true); ?>,
					minimum          : <?php echo get_post_meta($postid, 'slider_count', true);?>
				},
				scroll : {
					items           : <?php echo get_post_meta($postid, 'slider_count', true); ?>,
					easing          : "quadratic",
					fx 				: "<?php echo get_post_meta($postid, 'slider_fx', true); ?>",
					duration        : 1000,                        
					pauseOnHover    : true,
					wipe : true, 
				},
				prev : {
					button      : ".pageslider #carousel_prev",
					key         : "left",
					duration    : 500
					},			    
				next : {
					button      : ".pageslider #carousel_next",
					key         : "right",
					duration    : 500
						},			
				onCreate : function(items) {
					jQuery('#pageslides img').fadeIn(500);
				},	 	
							   
			});
		});
	</script>