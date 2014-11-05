<?php
/*
 * Template Name: Full Width
*/

get_header();
?>

<!-- ============================================== -->

<!-- Super Container -->
<div class="super-container full-width main-content-area" id="section-content">

	<!-- 960 Container -->
	<div class="container">
		
		<!-- CONTENT -->
		<div class="sixteen columns content" >
			<!-- 404 MESSAGE -->
			<?php if ( ! have_posts() ) : ?>
				<h1 class="title fulltitle"><span>Ohhhh Snap! We can't find the page...</span></h1>
				<div class="the_content">	
					<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'sidewinder' ); ?></p>
					<?php get_template_part( 'element', 'search' ); ?>
				</div>
			<?php endif; ?>
			
			<!-- THE POST LOOP -->
			<?php while ( have_posts() ) : the_post(); ?>	
				
			<!-- PAGE TITLE (and hide option) -->
			<?php if(get_custom_field('hide_title') == 'Yes') : else : ?>
			<h1 class="title"><span><?php the_title(); ?></span></h1>
			<?php endif; ?>
			
			<?php the_content(); ?>
			<?php endwhile; ?>	
		</div>	
		<!-- /CONTENT -->
		
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