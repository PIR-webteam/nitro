<!-- FrontPage Conditionals (check for the page variable from header.php) -->
<?php if(get_option_tree('frontpage_slider') == 'Yes') { ?>

	<?php wp_register_script( 'Carousel-Vars1', WP_THEME_URL . '/assets/javascripts/theme/carousel_vars1.js', false, null, true);
	wp_enqueue_script( 'Carousel-Vars1' ); ?>

<?php } ?>


<!-- Page Conditionals (check for the page variable from header.php) -->
<?php if(isset($GLOBALS['isapage']) && $GLOBALS[ 'isapage' ] == 'yes') : 
$postid = $GLOBALS[ 'ourpostid' ]; 
?>
	
<?php if(get_post_meta($postid, 'image_slider', true) == 'Yes') { ?>
	
<?php wp_register_script( 'Carousel-Vars2', WP_THEME_URL . '/assets/javascripts/theme/carousel_vars2.js', false, null, true);
wp_enqueue_script( 'Carousel-Vars2' ); ?>

<?php } ?>

<?php endif; ?>


<!-- POST Conditionals (check for the page variable from header.php) -->
<?php if(isset($GLOBALS['isapost']) && $GLOBALS[ 'isapost' ] == 'yes') : 
$postid = $GLOBALS[ 'ourpostid' ]; ?>
	
<?php if(get_post_meta($postid, 'image_slider', true) == 'Yes') { ?>

<?php wp_register_script( 'Carousel-Vars23', WP_THEME_URL . '/assets/javascripts/theme/carousel_vars3.js', false, null, true);
wp_enqueue_script( 'Carousel-Vars3' ); ?>

<?php } ?>

<?php endif; ?>