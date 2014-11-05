<?php
/*
 * Template Name: Traditional Blog (No Sidebar)
*/

get_header(); 
?>


<!-- ============================================== -->


<!-- Super Container -->
<div class="super-container full-width main-content-area" id="section-content">


	<!-- 960 Container -->
	<div class="container">		
		
		
		<!-- CONTENT -->
		<div class="sixteen columns content">
		
			
			<!-- PAGE TITLE (and hide option) -->
			<?php if(get_custom_field('hide_title') == 'Yes') : else : ?>
			<h1 class="title fulltitle"><span><?php the_title(); ?></span></h1>
			<?php endif; ?>
			
			<!-- Page Content (if it exists) -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
			<div class="sixteen columns content alpha">
				<?php the_content(); ?>			
			</div>	
			<?php endwhile; ?>	
			
			<!-- ============================================== -->			
			
			
			<!-- CATEGORY QUERY + START OF THE LOOP -->
			<?php get_template_part( 'element', 'categoryfilterquery' ); ?>
			<?php while ( have_posts() ) : the_post(); ?>							
			
								<!-- THE POST EXCERPT -->	
				<div class="the_content post type-post hentry excerpt clearfix" style="margin-top: 30px;" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
					
					<h4 style="text-align: left;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									 	
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
					
						<div class="five columns alpha">
							<div class="aside"> 
								<a href="<?php if (get_option_tree('open_as_lightbox') == 'Yes') { echo $lightbox_link; } else { the_permalink(); } ?>" <?php if (get_option_tree('open_as_lightbox') == 'Yes') { ?>class="iLightbox" <?php echo $dataoption; } ?>>
									<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" alt="<?php the_title(); ?>" />
								</a>
							</div> 							
						</div>															
					 
						<div class="eleven columns omega">
							<?php the_excerpt(); ?>
						</div> 						
					
					<?php } else { ?>	 
						<div>
							<?php the_excerpt(); ?>
						</div> 
					<?php } ?>					
					
					
					<!-- META SPACE -->
						<div class="date sixteen columns alpha omega date"> 
						
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
				<!-- /THE POST EXCERPT -->
				
			<?php endwhile; endif; ?>
			<!-- /STOP LOOP -->
			
			
			<!-- ============================================== -->		
			
		
			<?php get_template_part( 'element', 'pagination' ); ?>
			
		
		</div>	
		<!-- /CONTENT -->
		
		
		<!-- ============================================== -->
		
		<?php if(get_custom_field('fullwidth_social') == 'Yes') : ?>
		<div class="sixteen columns alpha omega social_footer">
		<hr />
		<span class="fullwidth_social">				
			<h1>Connect with us!</h1>
			<?php get_template_part( 'element', 'getsocial' ); ?>
		</span>	
		</div>
		<?php endif; ?>
		
						

	</div>
	<!-- /End 960 Container -->
	
</div>
<!-- /End Super Container -->


<!-- ============================================== -->


<?php get_footer(); ?>