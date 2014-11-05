<?php if ( is_front_page() ) : 	

if (ot_get_option('category_row')) :

$catrows = ot_get_option( 'category_row', $option_tree );

foreach( $catrows as $catrow ) {
	echo '<script type="text/javascript">
		jQuery(window).load(function($) {
		/*-----------------------------------------------------------------------------------*/
		/*	carouFredSel - http://caroufredsel.frebsite.nl/configuration.php
		/*-----------------------------------------------------------------------------------*/		
				jQuery(".slides-'.$catrow['cat_row_category'].'").carouFredSel({
					height: "variable",
					width: "variable",
					auto	: {
						play : false,
					},
					responsive  : true,
					circular : true,
					infinite : true,			
					items       : {
						height: "auto",
						visible          : 4,
						minimum          : 4,
					},
					scroll : {
						items           : 1,
						easing          : "quadratic",
						duration        : 1000,                        
						pauseOnHover    : true,
						fx				: "directscroll",
						wipe : true, 
					},
					prev : {
						button      : "#carousel_prev-'.$catrow['cat_row_category'].'",
						key         : "left",
						duration    : 500
						},			    
					next : {
						button      : "#carousel_next-'.$catrow['cat_row_category'].'",
						key         : "right",
						duration    : 500
							},				
								   
				}).find(".slide").hover(
				);
		});
	</script>';
}

wp_reset_query();

endif;

endif; ?>