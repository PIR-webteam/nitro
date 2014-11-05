<?php
/*
 * Template Name: Traditional Blog
*/

get_header(); 
?>


<!-- ============================================== -->


<!-- Super Container -->
<div class="super-container main-content-area" id="section-content">


	<!-- 960 Container -->
	<div class="container">		
		
		
		<!-- CONTENT -->
		<div class="eleven columns content">
		
			
			<!-- PAGE TITLE (and hide option) -->
			<?php if(get_custom_field('hide_title') == 'Yes') : else : ?>
			<h1 class="title"><span><?php the_title(); ?></span></h1>
			<?php endif; ?>
			
			<!-- Page Content (if it exists) -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
			<div class="eleven columns alpha">
				<?php the_content(); ?>			
			</div>	
			<?php endwhile; ?>	
			
			<!-- ============================================== -->			
			
			
			<!-- CATEGORY QUERY + START OF THE LOOP -->
			<div id="content">
			<?php get_template_part( 'element', 'categoryfilterquery' ); ?>
			<?php while ( have_posts() ) : the_post(); ?>							
			
				<?php get_template_part( 'element', 'excerpt' ); ?>					
							
			<?php endwhile; endif; ?>
			</div>
			<!-- /STOP LOOP -->
			
			
			<!-- ============================================== -->		
			
		
			<?php get_template_part( 'element', 'pagination' ); ?>
			
		
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