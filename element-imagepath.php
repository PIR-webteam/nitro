<?php 

// Grab the URL for the thumbnail (featured image)
						$image_full = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
						$imgheight = ot_get_option('default_image_height', $theme_options, false, true, 0 );
																		
						global $blog_id;
								
						if (isset($blog_id) && $blog_id > 0) {
							$imageParts = explode('/files/', $image_full[0]);
							if (isset($imageParts)) {
								$image[0] = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
							}
						}
						else{$image = $image_full;}
						
						// Check for a lightbox link, if it exists, use that as the value. 
						// If it doesn't, use the featured image URL from above.
						if(get_custom_field('lightbox_link')) { 							
							$lightbox_link = get_custom_field('lightbox_link'); 							
						} else {							
							$lightbox_link = $image_full[0];							
						}

?>