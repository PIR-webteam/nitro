<?php
/*
 * Template Name: 3 Column Portfolio
*/

get_header();
?>


<!-- ============================================== -->


<!-- Default Portfolio View Variable for Footer -->					
<?php 					
if(get_custom_field('portfolio_view') == 'Hybrid') : 
	$GLOBALS[ 'portfolio_view' ] = 'Hybrid';
elseif(get_custom_field('portfolio_view') == 'List') :
	$GLOBALS[ 'portfolio_view' ] = 'List';					
else :			
	$GLOBALS[ 'portfolio_view' ] = 'Grid';
endif; 
?>					
<!-- End Default Portfolio View - Variable will be used in the footer -->


<!-- Super Container -->
<div class="super-container full-width main-content-area portfolio-3 isotope" id="section-content">

	<!-- 960 Container -->
	<div class="container">		
					
		<!-- CONTENT -->
		
			<!-- Page Title -->
			<?php if(get_custom_field('hide_title') == 'Yes') : else : ?>
			<div class="sixteen columns content">			
				<h1 class="title fulltitle"><span><?php the_title(); ?></span></h1>	
			</div>
			<?php endif; ?>
			
			<!-- Page Content (if it exists) -->
			<?php while ( have_posts() ) : the_post(); ?>	
			<div class="sixteen columns content">
				<?php the_content(); ?>			
			</div>	
			<?php endwhile; ?>	
			
	</div>
	<div class="container">		
	
			<!-- Filter Navigation -->
			<div class="sixteen columns portfolio-nav">
				<p class="portfolio-filters" id="portfolio-filter">			
					
					<a class="button" href="#" data-filter="*">All</a>
					
					<!-- Grab just the category slugs and list them using our markup -->
					<?php 
					 					
					if(get_post_custom_values('category_filter')) :     // If the category filter exists on this page...
					
					$cats = get_custom_field( 'category_filter', $option_tree ); // Returns an array of cat-slugs from the custom field.			
					
					foreach ( $cats as $cat ) {	
						$cat = urldecode($cat);	
						$cat = get_cat_slug($cat);	// Leverages the functions.php get_cat_slug() function.
						$catsluglink = '<a class="button" href="#" data-filter=".'.$cat.'">'.$cat = str_replace('-',' ',$cat).'</a> ';  // Create a link using our markup now
						$acats[] = $catsluglink; 								// Turn the list of ID's into an ARRAY, $acats[]
					}			
				    
					$cat_string = join(' ', $acats);					// Join the ARRAY into a space-separated STRING 
					$cat_string = urldecode($cat_string);	
					echo ($cat_string);	
					endif;							
			
					?>
						
				</p>
					
				<p class="portfolio-view">
					<span class="grid_btn 3-col-grid"><img src="<?php echo WP_THEME_URL; ?>/assets/images/theme/btn_grid.png" alt="Grid View" /></span> 
					<span class="hybrid_btn 3-col-hybrid"><img src="<?php echo WP_THEME_URL; ?>/assets/images/theme/btn_hybrid.png" alt="Hybrid View" /></span>
					<span class="list_btn 3-col-list"><img src="<?php echo WP_THEME_URL; ?>/assets/images/theme/btn_list.png" alt="List View" /></span>
				</p>
				<br /><br />
				<hr class="half-bottom" />
			</div> 
			
	</div>
	
	<div class="container portfolio-container">		
		
			<!-- Portfolio List-->  
			<div id="portfolio-list" class="content">
		
			<!-- CATEGORY QUERY + START OF THE LOOP -->
			<?php get_template_part( 'element', 'categoryfilterquery' ); ?>
			<?php while (have_posts()) : the_post(); ?>
				
				
				<!-- THE POST LOOP -->				
				
				<!-- ============================================ -->
			
				<!-- Grab the image path and set our variables -->
				<?php include(get_query_template('element-gridimagemod')); ?>
				<?php if (has_post_thumbnail( $post->ID )) { //Only post a module if there's a featured image ?>
			
						<!-- Begin Portfolio Module Container -->
						<div class="one-third column module-container post view-grid			
							
							<?php //FILTERS: Here's where we add in the individual category slugs for each individual post
							
								//Declare our post slug - we'll use it later for the lightbox gallery hook
								$post_slug = str_replace(" ", "-",$post->post_name);
											
								$postcats = get_the_category();
								if ($postcats) {
								  foreach($postcats as $cat) {
									echo urldecode($cat->slug) . ' ';  //This is where I wrapped the decoder so we get a working Greek piece of text instead of WPs encoded version
									}
								}
							?>">
							
							<!-- Begin Module -->
							<div id="post-<?php the_ID(); ?>" <?php post_class('module'); ?>>	
						
								<!-- Begin Module Image -->
								<div class="module-img <?php if (get_option_tree('open_as_lightbox') == 'Yes') { echo "jackbox-container"; } else {} ?>">							
									<a href="<?php if (get_option_tree('open_as_lightbox') == 'Yes') { echo $lightbox_link; } else { the_permalink(); } ?>" <?php if (get_option_tree('open_as_lightbox') == 'Yes') { ?>class="iLightbox" data-title="View the Post: <a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>" <?php echo $dataoption; } ?>>
										<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" alt="<?php the_title(); ?>" />
										<span></span>
									</a>						    
								</div>
								<!-- End Module Image -->
								
								<!-- Begin Module Meta -->
								<div class="module-meta">
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>										
								</div>	
								<!-- End Module Meta -->
								
							</div>
							<!-- End Module -->
							
						</div>
						<!-- End Module Container -->
						
					<?php } //End Image Check ?>
			
				<!-- ============================================ -->
						
			<?php endwhile; ?>
			<!-- /POST LOOP -->	
			
		
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
	
	
	<!-- Portfolio Template Pagination Fix - For Isotype Plugin -->
	<div class="super-container full-width main-content-area portfolio-pag-fix">
		<div class="container">		
			<?php get_template_part( 'element', 'pagination' ); ?>	
		</div>
	</div>
	
	
</div>
<!-- /End Super Container -->


<!-- ============================================== -->


<?php get_footer(); ?>