<!-- This file is where we'll load a bunch of extra header stuff -->
<!-- Specifically, any IE Hacks or Theme-Options that aren't pure CSS get loaded here. -->
<!-- Pure CSS Theme Options are loaded in the elment-styleloader and then saves as a CSS file -->

<!--[if IE 8]>
<style type="text/css">
	.module-img img{width: 100%;}
	
	hiddenStyle: { opacity: 0.25 }
	.isotope-item {
	  z-index: 2;
	}	
	.isotope-hidden.isotope-item {
	  pointer-events: none;
	  z-index: 1;
	}
	hiddenStyle: $.browser.msie ? 
	  { opacity: 0.5, left: -2000 } : // IE
	  { opacity: 0, scale: 0.001 }
</style>
<![endif]-->

<?php /* GRAY DISABLED TO LOAD DIRECTLY FROM THE CHILD STYLESHEETS INSTEAD

<!-- Load the font stack from the Options Panel -->
<?php if (ot_get_option('default_fontstack') == 'Typekit-1') { ?>
	<?php 
	wp_register_style ( 'typography-serif-custom', WP_THEME_URL . '/assets/stylesheets/typography-typekit-1-serif.css' );
	wp_enqueue_style( 'typography-serif-custom' );
	?>
<?php } else if (ot_get_option('default_fontstack') == 'Typekit-2') { ?>
	<?php 
	wp_register_style ( 'typography-serif-custom2', WP_THEME_URL . '/assets/stylesheets/typography-typekit-2-sans.css' );
	wp_enqueue_style( 'typography-serif-custom2' );
	?>
<?php } else if (ot_get_option('default_fontstack') == 'Serif') { ?>
	<?php 
	wp_register_style ( 'typography-serif', WP_THEME_URL . '/assets/stylesheets/typography-serif.css' );
	wp_enqueue_style( 'typography-serif' );
	?>
<?php } else { ?>
	<?php 
	wp_register_style ( 'typography-sans', WP_THEME_URL . '/assets/stylesheets/typography-sans.css' );
	wp_enqueue_style( 'typography-sans' );
	?>
<?php } ?>

<!-- Load the default skin from the Options Panel -->
<?php $lightdark = ''; 
if (ot_get_option('default_skin') == 'Dark') { ?>
	
	<?php 
	wp_register_style ( 'skin-dark', WP_THEME_URL . '/assets/stylesheets/skin-dark.css' );
	wp_enqueue_style( 'skin-dark' );
	?>

	<?php if (ot_get_option('boxed_skin') == 'Boxed') { ?>
		
		<?php 
		wp_register_style ( 'boxed-dark', WP_THEME_URL . '/assets/stylesheets/boxed-dark.css' );
		wp_enqueue_style( 'boxed-dark' );
		?>
		
	<?php } else {}?>
	
<?php $lightdark = '-footer'; ?>

<?php } else if (ot_get_option('default_skin') == 'Classic') { ?>
	
	<?php 
	wp_register_style ( 'skin-classic', WP_THEME_URL . '/assets/stylesheets/skin-classic.css' );
	wp_enqueue_style( 'skin-classic' );
	?>
	
	<?php if (ot_get_option('boxed_skin') == 'Boxed') { ?>
		
	<?php 
	wp_register_style ( 'boxed', WP_THEME_URL . '/assets/stylesheets/boxed.css' );
	wp_enqueue_style( 'boxed' );
	?>
	
	<?php } else {}?>
	
<?php } else {} ?>

*/ ?>

<!-- Load the required style.css -->
	<?php 
	wp_register_style ( 'theme-style', WP_THEME_URL . '/style.css' );
	wp_enqueue_style( 'theme-style' );
	?>

<!-- Load the Custom CSS from the Theme Options panel and the Skeleton Page Options -->
<style type="text/css">
<?php echo ot_get_option('customcss'); ?> 
<?php echo get_custom_field('page_css'); ?> 
</style>