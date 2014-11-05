<?php get_header(); ?>


<!-- ============================================== -->


<!-- CATEGORY QUERY + START OF THE LOOP -->
<?php while (have_posts()) : the_post(); ?>		

  
<!-- Super Container -->
<div class="super-container main-content-area" id="section-content">


	<!-- 960 Container -->
	<div class="container">		
		
		
		<!-- Checks for remove-sidebar option and adapts layout accordingly -->
		<?php if(get_custom_field('remove_sidebar') == 'Yes') { $remove_sidebar = 'sixteen'; } ?>
		
		
		<!-- THE CONTENT -->
		<div class="eleven columns content <?php echo $remove_sidebar; ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<!-- THE POST TITLE (and hide option) -->
			<?php if(get_custom_field('hide_title') == 'Yes') : else : ?>				
			<h1 class="title"><span><?php the_title(); ?></span></h1>
			<?php endif; ?>
					
			<hr class="half-bottom" />	
				 	
			<!-- FEATURED IMAGE INSERTION -->
			<?php if(get_option_tree('show_featured_image') == 'Yes') : ?>
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
					
					?>
					<a class="featured-image-insert" href="<?php echo $lightbox_link; ?>" data-rel="prettyPhoto[<?php echo $post_slug; ?>]">
						<img class="aligncenter" src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" alt="<?php the_title(); ?>" />
					</a>	
										
								
				<?php } else {} ?>	 				
			<?php endif; ?>
										
			<!-- ============================================ -->			
			
			<!-- THE POST CONTENT -->	
			<div class="the_content post type-post hentry excerpt clearfix">	
					
				<?php the_content(); ?>
				<br />
				<?php wp_link_pages('before=<div id="page-links"><span>Pages:</span>&after=</div>&link_before=<div>&link_after=</div>'); ?>
									
				
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
					<?php } ?>
					<!-- /TAGS SPACE -->
					
				</div>	
				<!-- /META SPACE -->
		
				
			</div>
			<!-- /THE POST CONTENT -->
				
			<hr class="remove-top"/>
				
			<!-- COMMENTS SECTION -->
			<?php comments_template(); ?> 
			<div class="hidden"><?php wp_list_comments('type="comment&avatar_size=64'); ?></div>
			<?php next_comments_link(); previous_comments_link(); ?>
			<div class="hidden"><?php comments_template( '', true ); ?></div>
			<!-- COMMENTS-SECTION -->
				
							
		<?php endwhile; ?>
		<!-- /POST LOOP -->				
		
		</div>	
		<!-- /CONTENT -->
	
			
		<!-- ============================================== -->
			
		
		<?php if(get_custom_field('remove_sidebar') == 'Yes') { } else { ?>
		<!-- SIDEBAR -->
		<div class="five columns sidebar">			
			<?php dynamic_sidebar( 'default-widget-area' ); ?>	
		</div>
		<!-- /SIDEBAR -->	
		<?php } ?>
					
	
	</div>
	<!-- /End 960 Container -->
	
</div>
<!-- /End Super Container -->


<!-- ============================================== -->


<?php get_footer(); ?>