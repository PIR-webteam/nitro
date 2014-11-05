<?php
/*
 * Template Name: Hybrid Blog (3-columns)
*/

get_header(); 
?>

<!-- ============================================== -->

<!-- Super Container -->
<div class="super-container full-width main-content-area hybrid-blog-3" id="section-content">

	<!-- 960 Container -->
	<div class="container">		
		
		<!-- CONTENT -->
		<div class="sixteen columns content">		
			
			<!-- Page Title -->
			<?php if(get_custom_field('hide_title') == 'Yes') : else : ?>
			<div class="sixteen columns alpha omega">			
				<h1 class="title fulltitle"><span><?php the_title(); ?></span></h1>	
			</div>
			<?php endif; ?>
			
			<!-- Page Content (if it exists) -->
			<?php while ( have_posts() ) : the_post(); ?>	
			<div class="sixteen columns alpha omega">
				<?php the_content(); ?>			
			</div>	
			<?php endwhile; ?>	
		
		</div>
			
			<!-- ============================================== -->	
			
	</div>
	<div class="container">			
			
			<!-- CATEGORY QUERY + START OF THE LOOP -->
			<?php get_template_part( 'element', 'categoryfilterquery' ); ?>
			<?php while (have_posts()) : the_post(); ?>		
									
				<div class="one-third column hybrid">				
				
				<!-- THE POST EXCERPT -->	
				<?php $classes = array(
				    'the_content',
				    'post',
				    'type-post',
				    'hentry',
				    'hybrid-excerpt',
				    'clearfix'
				  );
				  ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>	
										 
				 	<!-- Grab the image path and set our variables -->
					<?php include(get_query_template('element-gridimagemod')); ?>
					<?php if (has_post_thumbnail( $post->ID )) { //Only post a module if there's a featured image ?>								
					
						<div class="hybrid-image">
							<div class="aside"> 
								<a href="<?php if (get_option_tree('open_as_lightbox') == 'Yes') { echo $lightbox_link; } else { the_permalink(); } ?>" <?php if (get_option_tree('open_as_lightbox') == 'Yes') { ?>class="iLightbox" data-title="View the Post: <a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>" <?php echo $dataoption; } ?>>
									<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" alt="<?php the_title(); ?>" />
								</a>
							</div> 
						</div>															
					 
						<div class="hybrid-excerpt">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							
							<?php echo excerpt(30); ?>
							<a href="<?php the_permalink(); ?>" class="readmore"> <?php _e('Read More', 'skeleton') ?> &raquo;</a>
						</div> 
						
					
					<?php } else { ?>	 
						<div class="hybrid-excerpt">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							
							<?php echo excerpt(30); ?>
							<a href="<?php the_permalink(); ?>" class="readmore"> <?php _e('Read More', 'skeleton') ?> &raquo;</a>
						</div> 
					<?php } ?>					
					
				
					
				</div>
				<!-- /THE POST EXCERPT -->				
				
				</div>
							
			<?php endwhile; ?>
			<!-- /STOP LOOP -->
			
			
			<!-- ============================================== -->		
			
		<div class="sixteen columns content">	
		
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