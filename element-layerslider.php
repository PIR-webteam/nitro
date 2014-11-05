	<!--LayerSlider begin-->
	<div id="layerslider-container-fw">
			<div id="layerslider" style="position: absolute; width: 100%; height: <?php echo (get_option_tree('header_height')) ? get_option_tree('header_height') : "262"; ?>px; margin: 0px auto; ">

			<?php
			
			if(get_custom_field('custom_background_image_slider')) {
			$slides = get_custom_field( 'custom_background_image_slider', $option_tree );
			$duration = get_option_tree('header_duration') ? get_option_tree('header_duration') : "5000";
			  foreach( $slides as $slide ) 
			  {	
			    echo ' 				    
			    <div class="ls-layer" style="
			    		slidedirection: right;		
					    slidedelay: '.$duration.'; 
					    durationin: 0; 
					    durationout: 0; 
					    delayout: 0;
			    ">
					<img src="'.$slide['header_background_image_url'].'" 
					class="ls-s1" 
					style="
						position: absolute;
						left: 50%;
						slidedirection : fade; 
						slideoutdirection : fade; 
						durationin : 500; 
						durationout : 500; 
						easingin : easeInOutQuad; 
						easingout : easeInOutQuad; 
						delayin : 0; 
					">	
				</div>
			    ';
			  }
				
			} elseif ( function_exists( 'ot_get_option' ) ) {
			  $slides = ot_get_option( 'header_background_image', $option_tree );
			  $duration = get_option_tree('header_duration') ? get_option_tree('header_duration') : "5000";
			  foreach( $slides as $slide ) {					  				
			  	
			    echo ' 				    
			    <div class="ls-layer" style="
			    		slidedirection: right;		
					    slidedelay: '.$duration.'; 
					    durationin: 0; 
					    durationout: 0; 
					    delayout: 0;
			    ">
					<img src="'.$slide['header_background_image_url'].'" 
					class="ls-s1" 
					style="
						position: absolute;
						left: 50%;
						slidedirection : fade; 
						slideoutdirection : fade; 
						durationin : 500; 
						durationout : 500; 
						easingin : easeInOutQuad; 
						easingout : easeInOutQuad; 
						delayin : 0; 
					">	
				</div>
			    ';
			  }
			}
			?>
			
			<style type="text/css">
			@media screen and (-webkit-min-device-pixel-ratio:0) {

			/* CSS Statements that only apply on webkit-based browsers (Chrome, Safari, etc.) */
			
			img.ls-s1 { left: 0% !important; }
			
			} 
			</style>
			</div>
						
		</div>