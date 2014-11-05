<?php get_header(); ?>


<!-- ============================================== -->


<!-- Super Container -->
<div class="super-container main-content-area" id="section-content">

	<!-- 960 Container -->
	<div class="container">
		
		<!-- CONTENT -->
		<div class="eleven columns content">
									
			<!-- THE POST LOOP -->  
			<?php while ( have_posts() ) : the_post(); ?>	
				
				<!-- PAGE TITLE (and hide option) -->
				<?php if(get_custom_field('hide_title') == 'Yes') : echo '<br />'; else : ?>
				<h1 class="title"><span><?php the_title(); ?></span></h1>
				<?php endif; ?>
				
				<!-- FEATURED IMAGE (optional) -->
				<?php if(get_option_tree('show_featured_image') == 'Yes') : ?>
						<?php if (has_post_thumbnail( $post->ID )) 	{												
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
						<a class="featured-image-insert" href="<?php echo $image[0]; ?>" data-rel="prettyPhoto">
							<img class="aligncenter" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
						</a>
					<br class="clearfix" />					
					<?php } else {} ?>					
				<?php endif; ?>
			
				<!-- THE PAGE CONTENT -->
				<?php the_content(); ?>
				
				<!-- PAGINATION for Multiple pages -->
				<?php wp_link_pages('before=<br /><div id="page-links"><span>Pages:</span>&after=</div><hr />&link_before=<div>&link_after=</div>'); ?>
				
				
				
			<?php endwhile; ?>	
			
		</div>	
		<!-- /CONTENT -->
		
		<!-- ============================================== -->
		
		<!-- SIDEBAR -->
		<div class="five columns sidebar">			
			<?php dynamic_sidebar( 'default-widget-area' ); ?>	
		</div>
		<!-- /SIDEBAR -->

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