<!-- Super Container -->
<div class="super-container full-width main-content-area" id="section-slider">

	<!-- 960 Container -->
	<div class="container">
		
		<!-- Carousel -->
		<div class="sixteen columns">	
								
			<div>
				<div id="carousel" class="es-carousel-wrapper pageslider">
					<div class="list_carousel"> 
					  <ul id="pageslides"> 
					    <?php
						if ( function_exists( 'ot_get_option' ) ) {
						  $slides = get_custom_field( 'homepage_slider', $option_tree );
						  foreach( $slides as $slide ) {
						  							
							$lightbox_link = ' data-rel="prettyPhoto[Gallery]" ';								
							
							//Check if it's a JPG
							if(strstr($slide['link'], '.jpg')) { 
							$slidelink = '<a href="'.$slide['link'].'" '.$lightbox_link.' >'; 
							$slideendlink = '</a>';
							} 
							
							//Check if it's a PNG
							elseif(strstr($slide['link'], '.png')) { 
							$slidelink = '<a href="'.$slide['link'].'" '.$lightbox_link.' >'; 
							$slideendlink = '</a>';
							} 
							
							//Check if it's a Vimeo
							elseif(strstr($slide['link'], 'vimeo.com')) { 
							$slidelink = '<a href="'.$slide['link'].'" '.$lightbox_link.' >'; 
							$slideendlink = '</a>';
							} 
							
							//Check if it's a YouTube
							elseif(strstr($slide['link'], 'youtube.com')) { 
							$slidelink = '<a href="'.$slide['link'].'" '.$lightbox_link.' >'; 
							$slideendlink = '</a>';
							} 
							
							//Check if it's a MOV
							elseif(strstr($slide['link'], '.mov')) { 
							$slidelink = '<a href="'.$slide['link'].'" '.$lightbox_link.' >'; 
							$slideendlink = '</a>';
							} 
														
							//If not, just link out
							elseif($slide['link']) { 
							$slidelink = '<a href="'.$slide['link'].'">'; 
							$slideendlink = '</a>';
							} 
							
							//Or do nothing
							else {
							$slidelink = ''; 
							$slideendlink = '';
							}	
							
							if($slide['description']) { 
							$slidecaption = '<div class="slide-caption"><h4>'.$slide['title'].'</h4>'.$slide['description'].'</div>'; 		
							} else {
							$slidecaption = ' ';
							}
						  
						    echo ' 
						    <li class="slide">								    		     
						     <div>'.$slidelink.'<img class="img_grayscale" src="'.$slide['image'].'" alt="'.$slide['title'].'" width="100%" />'.$slideendlink.'		
						     '.$slidecaption.'</div>			     
						    </li>';
						  }
						}
						?>
					  </ul>
					  
					  <div class="clearfix"></div>
					  <div class="slider_nav">
					   		<a class="prev" id="carousel_prev" href="#"><img src="<?php echo WP_THEME_URL . "/assets/images/left-arrow.png"; ?>" /><span>prev</span></a>
					  		<a class="next" id="carousel_next" href="#"><img src="<?php echo WP_THEME_URL . "/assets/images/right-arrow.png"; ?>" /><span>next</span></a>
					  </div>
					  
					</div>
				</div>			
			</div>
								
			<hr class="hr-pageslider" />
			
		</div>		
		<!-- /End Full Width Slider-->

	</div>
	<!-- /End 960 Container -->
	
</div>
<!-- /End Super Container -->