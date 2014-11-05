<!DOCTYPE html >
<!--[if lt IE 7 ]> <html class="no-js ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<meta charset="utf-8">	
	
	<title><?php 
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
	
		wp_title( '|', true, 'right' );
	 
		// Add the blog name.
		bloginfo( 'name' );
	
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'mdnw' ), max( $paged, $page ) );
	
		?></title>
	
	
	<?php $theme_options = get_option('option_tree'); ?>	
	
	<!-- Mobile Specific Metas
  	================================================== -->
  	<?php if (get_option_tree('responsive_toggle') == 'Yes') { ?>	  		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 		
	<?php } else { ?>		 
		<meta name="viewport" content="user-scalable=yes, initial-scale=0.05, maximum-scale=1.0, width=980" />		
	<?php } ?>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php echo get_option_tree('favicon'); ?>" type="image/gif" />
	
	<?php if ( ! isset( $content_width ) ) 
	    $content_width = 960;
	?>
	
<?php wp_head(); ?>		
</head>

<!-- Start the Markup
================================================== -->
<body <?php body_class(); ?> >

<?php if (get_option_tree('top_hat') == 'No') { } else { ?>	
	<?php get_template_part( 'element', 'tophat' ); ?>
<?php } ?>

<!-- Super Container for Logo -->
<div class="super-container full-width" id="section-header">

	<!-- 960 Container -->
	<div class="container">				
		
		<!-- Header -->
		<header>
		<div class="sixteen columns">
			 
			<!-- Branding -->
			<div class="four columns alpha logospace">
				<a href="<?php echo home_url(); ?>/" title="<?php echo bloginfo('blog_name'); ?>">
					<h1 id="logo">
						<?php if(get_option_tree('logo')) : 
						$logopath = get_option_tree('logo'); ?>
						<img id="logotype" src="<?php echo $logopath; ?>" alt="<?php echo bloginfo('blog_name'); ?>" />
        				<?php else : ?>
	        			<?php echo bloginfo('blog_name'); ?>
	        			<br /><span><?php echo get_bloginfo('description'); ?></span>			
	        			<?php endif; ?>
	         		</h1>
				</a>
			</div>
			<!-- /End Branding -->	
			
			<?php get_template_part( 'element', 'navigation' ); ?>				
			
		</div>
		</header>
		<!-- /End Header -->

	</div>
</div>



<!-- Super Container for Slider -->
<div class="super-container full-width" id="section-slider">

		
		<!-- Frontpage Slider Conditionals -->
		<?php if ( is_front_page() ) : ?> 		
		
			<!-- New RevolutionSlider Super Container for Header-->
			<?php if(ot_get_option('frontpage_revolution_slider')) {
				
				$strip_this_shit = array("[", "]", " ", "rev_slider");
				$revslider_shortcode_prestrip = ot_get_option('frontpage_revolution_slider');
				$revslider_shortcode_poststrip = str_replace($strip_this_shit, "", "$revslider_shortcode_prestrip");

				putRevSlider( "$revslider_shortcode_poststrip" );
				
				?>
									
			<?php } ?>	
			<!--RevolutionSlider end-->
			
		<?php endif; ?>
		
		
		<!-- Page Slider Conditionals -->
		<?php if ( is_page() ) : ?>
			
			<!-- New RevolutionSlider Super Container for Header-->
				<?php 
				if(get_custom_field('frontpage_slider') == "Yes") {						
					if(ot_get_option('frontpage_revolution_slider')) {
					
					$strip_this_shit = array("[", "]", " ", "rev_slider");
					$revslider_shortcode_prestrip = ot_get_option('frontpage_revolution_slider');
					$revslider_shortcode_poststrip = str_replace($strip_this_shit, "", "$revslider_shortcode_prestrip");
	
					putRevSlider( "$revslider_shortcode_poststrip" );
					}					
				 } ?>	
				<!--RevolutionSlider end-->

				<!-- PageSlider Conditional -->			
				<!-- New RevolutionSlider Super Container for Header-->
				<?php if(get_custom_field('page_revolution_slider')) {
					
					$strip_this_shit_1 = array("[", "]", " ", "rev_slider");
					$revslider_shortcode_prestrip_1 = get_custom_field('page_revolution_slider');
					$revslider_shortcode_poststrip_1 = str_replace($strip_this_shit_1, "", "$revslider_shortcode_prestrip_1");
	
					putRevSlider( "$revslider_shortcode_poststrip_1" );
				 } ?>	
				 
				<!--RevolutionSlider end-->
			
		<?php endif; ?>
		
		
		<!-- Single Post Slider Conditionals -->
		<?php if ( is_single() ) : ?>		

				<!-- PostSlider Conditional -->			
				<!-- New RevolutionSlider Super Container for Header-->
				<?php if(get_custom_field('page_revolution_slider')) {
					
					$strip_this_shit_1 = array("[", "]", " ", "rev_slider");
					$revslider_shortcode_prestrip_1 = get_custom_field('page_revolution_slider');
					$revslider_shortcode_poststrip_1 = str_replace($strip_this_shit_1, "", "$revslider_shortcode_prestrip_1");
	
					putRevSlider( "$revslider_shortcode_poststrip_1" );
				 } ?>	
				<!--RevolutionSlider end-->
			
		<?php endif; ?>
	
		
		
		<!-- Page Caption Conditionals -->
		<?php if ( is_page() ) : ?>
			
			<!-- PageCaption Conditional -->
			<?php if(get_custom_field('page_caption')) : 
				get_template_part( 'element', 'pagecaption' ); 
			endif; ?>
			
			<!-- Set a global variable for the page ID that we can use in the footer (outside of the loop) -->
			<?php $GLOBALS[ 'isapage' ] = 'yes'; 
			global $wp_query;
			$GLOBALS[ 'ourpostid' ] = $wp_query->post->ID; ?>
		
		<?php endif; ?>
		
		
			
		<!-- Single Post Caption Conditionals -->
		<?php if ( is_single() ) : ?>		
			
			<!-- Set a global variable for the page ID that we can use in the footer (outside of the loop) -->
			<?php $GLOBALS[ 'isapost' ] = 'yes'; 
			global $wp_query;
			$GLOBALS[ 'ourpostid' ] = $wp_query->post->ID; ?>
		
		<?php endif; ?>


</div>



<!-- Super Container for Custom Content -->
<div class="super-container full-width" id="section-sub-header">		
	
	<!-- Frontpage ThemeOption Content Conditionals -->
	<?php if ( is_front_page() ) : ?> 
					
		<?php if(get_option_tree('frontpage_caption_text-1')) : ?>
			<!-- 960 Container -->
			<div class="container">	
				<div class="fp_caption sixteen columns">
					<h1><?php echo get_option_tree('frontpage_caption_text-1'); ?></h1>
					
					<?php if (ot_get_option('action_button_row')) :
					
					echo '<div class="action_button_wrapper">';
					  $buttons = ot_get_option( 'action_button_row', $option_tree );
					  foreach( $buttons as $button ) {
					  	
					  	$buttonlink = '<a title="'.$button['button_row_text'].'" target="_blank" href="'.$button['button_row_link'].'" >'; 
						$buttonendlink = '</a>';											
						
					    echo ' 
							<div class="action_button">
							'.$buttonlink.' '.$button['button_row_text'].' '.$buttonendlink.'
							</div>
					    ';	
					    		
					  }
					echo '</div> ';
					endif;
					
					?>
					<hr class="hr2">	
								
				</div>
			</div>
		<?php endif; ?>
		
		<?php
		if (ot_get_option('frontpage_blurbs')) :
		
		echo '<div class="container"><div class="blurb-maker">';
		  $blurbs = ot_get_option( 'frontpage_blurbs', $option_tree );
		  foreach( $blurbs as $blurb ) {
		  	
		  	$blurblink = '<a title="'.$blurb['title'].'" target="_blank" href="'.$blurb['link'].'" >'; 
			$blurbendlink = '</a>';											
			
		    echo ' 
		    <div class="four columns hybrid">
		    	<div class="the_content post type-post hentry hybrid-excerpt clearfix">
				    <div class="module-img">
				    '.$blurblink.'<img src="'.$blurb['image'].'" alt="'.$blurb['title'].'" />'.$blurbendlink.'
				    <span></span>
				    </div>
				    <h4>'.$blurblink.''.$blurb['title'].''.$blurbendlink.'</h4>
				    <p>'.$blurb['description'].'</p>
				</div>
		    </div>			    
		    ';	
		    		
		  }
		echo '</div><hr class="hr6"></div> ';
		endif;			
		?>

		<!--  Begin Category Row Section -->
		<div class="category_row container">
		<?php if(ot_get_option('category_rows_main_title')) : ?>
			<h1><?php echo ot_get_option('category_rows_main_title'); ?></h1>
			<hr />
		<?php else: ?>
			<br class="clearfix" /><br class="clearfix" />
		<?php endif; ?>
		<?php if(ot_get_option('category_row_section') == 'Yes') :
			get_template_part( 'element', 'categoryrow' );
		endif; ?>
		</div>
		<!--  End Category Row Section -->			
		
	<?php endif; ?>
	<!-- /End FrontPage Conditionals -->
	
	
				
	
	
	
	<!-- ============================================== -->
		
		
</div>
<!-- End SuperContainer -->


<!-- ============================================== -->