<?php
global $more;
$more = 0;
?>

				<!-- THE POST EXCERPT -->	
				<div class="the_content post type-post hentry excerpt clearfix" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
					
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					
				 	<!-- Grab the image path and set our variables -->
					<?php if (has_post_thumbnail( $post->ID )) {
		 								
						// Grab the URL for the thumbnail (featured image)
						$thumb = get_post_thumbnail_id(); 
						$image_full = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
						$image = vt_resize( $thumb, '', 700, 2000, false );							
														
						// Check for a lightbox link, if it exists, use that as the value. 
						// If it doesn't, use the featured image URL from above.
						if(get_custom_field('lightbox_link')) { 							
							$lightbox_link = get_custom_field('lightbox_link'); 							
						} else {							
							$lightbox_link = $image_full[0];							
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
					
					?>
					
						<div class="post-thumbnail">
							
							<div class="aside"> 
								<a href="<?php if (get_option_tree('open_as_lightbox') == 'Yes') { echo $lightbox_link; } else { the_permalink(); } ?>" <?php if (get_option_tree('open_as_lightbox') == 'Yes') { ?>class="iLightbox" data-title="View the Post: <a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>" <?php echo $dataoption; } ?>>
									<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" alt="<?php the_title(); ?>" />
								</a>								
								<?php the_excerpt(); ?> 
							</div> 							
							
							<!-- META SPACE -->
							<div class="date"> 
								
								<div class="my-avatar" title="<?php the_author(); ?>">
									<a href="<?php the_permalink(); ?>">
										<?php echo get_avatar( get_the_author_meta('email'), '60' ); ?>
									</a>
								</div>	
								
								<div class="single-meta"><?php _e('Posted on', 'skeleton') ?> <?php the_time(__ ('F', 'skeleton'));?> <?php the_time(__ ('jS', 'skeleton'));?>, <?php _e('by', 'skeleton')?> <?php the_author(); ?> <?php _e('in', 'skeleton')?> <?php the_category(', ') ?>.</div>
								
								<div class="the_comments">
									<?php comments_popup_link(__ ('No Comments', 'skeleton'), __ ('1 Comment', 'skeleton'), __ngettext ('% comment', '% comments', get_comments_number (),'skeleton')); ?>	
								</div>					
					
								<!-- TAGS SPACE -->	
								<?php $post_tags = wp_get_post_tags($post->ID);
								if(!empty($post_tags)) { ?><div class="meta-space">					
									<div class="tags clearfix">
										<?php the_tags('',' '); ?>					
									</div>									
								</div>
								<?php } else { ?>
								<br />
								<?php } ?>
								<!-- /TAGS SPACE -->
								
							</div>	
							<!-- /META SPACE -->
							
						</div>															 
					  						
						<br class="clearfix" />
					
					<?php } else { ?>	 
						<div>
							<?php the_excerpt(); ?>
						</div> 
					<?php } ?>					
					
					
					
				</div>
				<!-- /THE POST EXCERPT -->