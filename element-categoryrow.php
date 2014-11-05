<?php
if (ot_get_option('category_row')) :

  $catrows = ot_get_option( 'category_row', $option_tree );
				  
  foreach( $catrows as $catrow ) {
	echo '<div class="container sixteen columns alpha omega breakout-row" id="breakout-row">';			  	
  	  	
	if($catrow['cat_row_category']) :
	  	$catrowlink = '<a title="'.$catrow['title'].'" class="read_more_button" href="?cat='.$catrow['cat_row_category'].'" >'; 
		$catrowendlink = '</a>';
	else : 
		$catrowlink = '<a class="action_button" title="'.$catrow['title'].'" href="#" >'; 
		$catrowendlink = '</a>';
	endif;
	
    echo ' 
	<div class="three columns omega aside-container '.$catrow['cat_row_category'].'">
		<div class="aside">
    		<h4>'.$catrow['title'].'</h4>
    	 	
		    <p>'.$catrow['cat_row_text'].'</p>	
		    
		    '.$catrowlink.'Read More'.$catrowendlink.'
		    
		    <a class="prev" id="carousel_prev-'.$catrow['cat_row_category'].'" href="#"><span>prev</span></a>
			<a class="next" id="carousel_next-'.$catrow['cat_row_category'].'" href="#"><span>next</span></a>
			
		</div>
    </div>	
    
    <div class="thirteen columns omega ">
		<div class="list_carousel">	
			<div class="slides-'.$catrow['cat_row_category'].'">		    
    ';				    
    
    /* FROM THE BLOG CODE HERE */			
    				
	$args=array(
		'cat'=>$catrow['cat_row_category'],
		'posts_per_page'=> 12,					
	   );
	
	$the_query = new WP_Query( $args );
    			    
    while ( $the_query->have_posts() ) :
	$the_query->the_post();	    
    
	    if (has_post_thumbnail( $post->ID )) {
					
					// Grab the URL for the thumbnail (featured image)
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
												
					// Check for a lightbox link, if it exists, use that as the value. 
					// If it doesn't, use the featured image URL from above.
					if(get_custom_field('lightbox_link')) { 							
						$lightbox_link = get_custom_field('lightbox_link'); 							
					} else {							
						$lightbox_link = $image[0];							
					}
					
					//Check if it's a Video
					if(strstr($lightbox_link, 'youtube.com')) { 
					$dataoption= 'data-options="smartRecognition: true"';
					} 
						
					//Check if it's a Video
					elseif(strstr($lightbox_link, 'vimeo.com')) { 
					$dataoption= 'data-options="smartRecognition: true"';
					} 
					
					else{
						$dataoption= '';
					}
					
			}

		?>
		<div class="slide three omega columns module-container
				<?php //Here's where we add in the individual category slugs for each individual post
					$postcats = get_the_category();
					if ($postcats) {
					  foreach($postcats as $cat) {
						echo $cat->slug . ' '; 
					  }
					}
				?>">
				
			<div <?php post_class('module'); ?> >						
				<?php if (has_post_thumbnail( $post->ID )) { ?>
					
					<div class="module-img">							
						<a href="<?php if (get_option_tree('open_as_lightbox') == 'Yes') { echo $lightbox_link; } else { the_permalink(); } ?>" <?php if (get_option_tree('open_as_lightbox') == 'Yes') { ?>class="iLightbox" data-title="View the Post: <a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>" <?php echo $dataoption; } ?>>
							<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
							<span></span>
						</a>
					</div>
				
				<?php } else {} ?>				
				
				<div class="module-meta">
					<h5 class="<?php if (has_post_thumbnail( $post->ID )) { echo "has_image"; } else{ echo "no_image"; } ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>	
					<!-- <?php echo the_excerpt(); ?>  Swap with the_excerpt() if you so desire-->
				</div>
								
			</div>
		</div>	
		<?php 
    
    endwhile;    
    
    echo '</div></div></div></div>
    	
	<hr class="hr7">';
    
  }
  wp_reset_query();

endif;

?>