<!-- THIS FILE LOADS ALL THE CUSTOMIZATIONS FROM THE THEME OPTIONS PANEL  -->

<!-- Custom CSS Modifications from the Admin Panel -->
<style type="text/css">

/* Insert the rest of the custom CSS from the admin panel */ 
	 
<?php global $theme_options; ?>

body, 
#section-tophat,
#section-logo,
#section-navigation,
#section-header,
#section-content,
#section-footer,
#section-sub-footer{
	background-repeat: repeat;
 	background-position: top center;
 	background-attachment: scroll;
}

#section-header{background-position: center -1px !important;}


/* ============================================================================== */
/* SKIN OPTIONS SECTION! LOAD THE BG STRIPES =================================== */
/* CUSTOM BG INSERTER FOR TOPHAT, FOOTER, SUBFOOTER */
<?php $tophat_bg = ot_get_option("tophat_background_image");
	  $tophat_color = ot_get_option("tophat_background_color");
	  $header_bg = ot_get_option("header_background_image");
	  $header_color = ot_get_option("header_background_color");
	  $slider_bg = ot_get_option("slider_background_image");
	  $slider_color = ot_get_option("slider_background_color");
	  $default_bg = ot_get_option("default_bg");
	  $default_bgcolor = ot_get_option("default_bgcolor");
	  $footer_bg = ot_get_option("footer_background_image");
	  $footer_color = ot_get_option("footer_background_color");
	  $subfooter_bg = ot_get_option("subfooter_background_image");
	  $subfooter_color = ot_get_option("subfooter_background_color");
?>

<?php if (isset($tophat_color[0])) { ?>
 		#section-tophat {
 			background-image: url('');
 			background-color: <?php echo ot_get_option("tophat_background_color"); ?>;
			}
<?php } ?>
<?php if (isset($tophat_bg[0])) { ?>
 		#section-tophat {
 			background-image: url('<?php echo ot_get_option("tophat_background_image"); ?>');
			}
<?php } ?>

<?php if (isset($header_color[0])) { ?>
 		#section-header {
 			background-image: none;	 			
 			background-color: <?php echo ot_get_option("header_background_color"); ?>;
			}
<?php } ?>
<?php if (isset($header_bg[0])) { ?>
 		#section-header {
 			background-image: url('<?php echo ot_get_option("header_background_image"); ?>');
 			background-position: top center;
			} 
<?php } ?>

<?php if (isset($slider_color[0])) { ?>
 		#section-slider {
 			background-image: none;	 			
 			background-color: <?php echo ot_get_option("slider_background_color"); ?>;
			}
<?php } ?>
<?php if (isset($slider_bg[0])) { ?>
 		#section-slider {
 			background-image: url('<?php echo ot_get_option("slider_background_image"); ?>');
 			background-position: top center;
			} 
<?php } ?>
	
<?php if (isset($default_bgcolor[0])) { ?>
 		#section-sub-header, #section-content {
 			background-image: url('');
 			background-color: <?php echo ot_get_option("default_bgcolor"); ?>;
			}
<?php } ?>	
<?php if (isset($default_bg[0])) { ?>
 		#section-sub-header, #section-content {
 			background-image: url('<?php echo ot_get_option("default_bg"); ?>');
			}
<?php } ?>	

<?php if (isset($footer_color[0])) { ?>
 		#section-footer {
 			background-image: url('');
 			background-color: <?php echo ot_get_option("footer_background_color"); ?>;
			}
<?php } ?>
<?php if (isset($footer_bg[0])) { ?>
 		#section-footer {
 			background-image: url('<?php echo ot_get_option("footer_background_image"); ?>');
			}
<?php } ?>

<?php if (isset($subfooter_color[0])) { ?>
 		#section-sub-footer {
 			background-image: url('');
 			background-color: <?php echo ot_get_option("subfooter_background_color"); ?>;
			}
<?php } ?>
<?php if (isset($subfooter_bg[0])) { ?>
 		#section-sub-footer {
 			background-image: url('<?php echo ot_get_option("subfooter_background_image"); ?>');
			}
<?php } ?>




/* CUSTOM PAGE/POST BACKGROUND OVERRIDE SECTION! ==================*/
/* Add a custom bg if it exists */
/* Used on a per-theme basis for custom header or body background images */

/* NOT USED IN THIS THEME */

<?php if(get_custom_field('custom_background_image')) { ?>
#section-superheader {
	background-image: url('<?php echo get_custom_field('custom_background_image',true); ?>') !important;	
} 
<?php } ?>


/* ============================================================================== */
	 


/* ============================================================================== */
/* LINK COLORS SECTION! LOAD HIGHLIGHT COLORS =================================== */

/* STANDARD LINK COLOR STYLES ========== */
/* This is your link color */
<?php $link_color = ot_get_option("link_color"); if (isset($link_color[0])) { ?>	

/* COLORED TEXT ELEMENTS */
.module-img, 
h1#logo span,
.widget_categories a, 
.widget_categories a:hover, 
.widget_categories a:visited,
.widget_archive a, 
.widget_archive a:hover, 
.widget_archive a:visited,
.sf-menu li li:hover > a, 
.sf-menu li li:hover > a:hover, 
.sf-menu li li:hover > a:visited,
.hybrid:hover h4 a, 
.module-container:hover h4 a, 
.fp_caption strong,
.blurb-maker h4 a:hover,
li a, 
a{	
	color: <?php echo ot_get_option('link_color'); ?>; 
}

.sf-menu > li:after {
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-top: 10px solid <?php echo ot_get_option('link_color'); ?>;
    content: " ";
    height: 0;
    opacity: 0.0;
    left: 38%;
    position: absolute;
    top: 96%;
    width: 0;
}

.sf-menu > li:hover:after {
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-top: 10px solid <?php echo ot_get_option('link_color'); ?>;
    content: " ";
    height: 0;
    left: 38%;
    position: absolute;
    top: 96%;
    width: 0;
    z-index: 1000;
    opacity: 1;
}

/* WHITE TEXT / COLORED BG ELEMENTS (default link color) */
/*.sf-menu > li:hover */
.read_more_button, 
.read_more_button:hover,
.widget_categories li, 
.widget_archive li, 
#section-header .slide:hover .slide-caption,
.tags a,
.action_button a,
.module-img,
.rev_slider .tp-button,
.sf-menu > li:hover{	
	background: <?php echo ot_get_option('link_color'); ?>; 
	color: white !important;	
}

.sf-menu li li:hover{	
	/* background: #999 !important; */
	background: <?php echo ot_get_option('link_color'); ?> !important; 
}

.sf-menu > li:hover > a:hover,
.sf-menu > li:hover span,
.sf-menu > li:hover strong,
.sf-menu li li:hover> a{	
	color: white !important;
}

.sf-menu.light ul li:hover > a,
.widget_categories li a,
.widget_archives li a{color: white !important;}

/* BORDER COLOR ELEMENTS */
#section-footer {
	border-top: 1px solid <?php echo ot_get_option('link_color'); ?> !important;	
}
.sf-menu li li:hover{	
	border-left: 1px solid <?php echo ot_get_option('link_color'); ?> !important; 
	border-right: 1px solid <?php echo ot_get_option('link_color'); ?> !important; 
} 

<?php } else {} ?>



/* HOVER COLOR STYLES ========== */
/* This is your link hover color */
<?php $link_hover_color = ot_get_option("link_hover_color"); if (isset($link_hover_color[0])) { ?>	

/* BACKGROUND ELEMENTS - using hover color */
.widget_categories li:hover, 
.widget_archive li:hover,
.rev_slider .tp-button:hover{	
	background: <?php echo ot_get_option('link_hover_color'); ?> !important; 
}

/* COLORED TEXT ELEMENTS (hover color) */
#section-header li a:hover, 
a:hover{
	color: <?php echo ot_get_option('link_hover_color');?>;	
}

/* WHITE TEXT / COLORED BG (hover color) */
.action_button a:hover, 
.read_more_button:hover,
.tags a:hover{	
	background: <?php echo ot_get_option('link_hover_color');?> !important; 
	color: white;	
}

<?php } else {} ?>	


/* VISITED LINK COLOR ============ */
/* This is your visited link color */
<?php $link_visited_color = ot_get_option("link_visited_color"); if (isset($link_visited_color[0])) { ?>
a:visited {
	color: <?php echo ot_get_option('link_visited_color'); ?>;	
}
<?php } else {} ?>		



/* ============================================================================== */
	 


/* ============================================================================== */
/* THIS SECTION IS FOR OTHER MIXED FEATURES THAT REQUIRE STYLES */

/* Column Flipping (bound to page/post options) */
<?php if(get_custom_field('column_flip') == 'Yes') : ?>	
#section-content .content.columns{float: right !important;}
<?php endif; ?>

<?php $slider_bg_override = get_custom_field('slider_background_image');

if (isset($slider_bg_override[0])) { ?>
body #section-slider{background: url('<?php echo $slider_bg_override; ?>') !important;}
<?php } ?>


<?php $slider_override = get_custom_field('page_revolution_slider');

if (isset($slider_override[0])) { ?>
body #section-slider{background: none transparent !important; box-shadow: 0 0 0 !important;}
<?php } ?>


</style>


<!-- ============================================== -->
<!-- FredCarousel Slider Height - Frontpage Version -->
<!-- ============================================== -->

<style type="text/css">
#section-header .list_carousel li {
    min-height: <?php echo ot_get_option('fpslider_minheight'); ?>px !important;
}
@media only screen and (min-width: 959px) {#section-header .list_carousel{min-height: <?php echo ot_get_option('fpslider_minheight'); ?>px !important;}} 

/* Tablet to 960 */ 
@media only screen and (min-width: 768px) and (max-width: 959px) {#section-header .list_carousel li{min-height: <?php echo ot_get_option('fpslider_minheight') / 1.5; ?>px  !important;}}

/* All Mobile Sizes */ 
@media only screen and (max-width: 767px) {
	#section-header .caroufredsel_wrapper, #section-header .list_carousel li{min-height: <?php echo ot_get_option('fpslider_minheight') / 1.7; ?>px  !important;} 
	a.prev, a.next {
		left: 10px !important;
		right: 10px !important;
		top: -9999px !important;
	}
	
	.list_carousel {
	    padding: 15px 0;
	}
	
}

/* Mobile Landscape Size to Tablet Size  */ 
@media only screen and (min-width: 480) and (max-width: 767px) {
	#section-header .caroufredsel_wrapper, #section-header .list_carousel li{min-height: <?php echo ot_get_option('fpslider_minheight') / 1.7; ?>px  !important;} 
}

/* Mobile Portrait Size to Mobile Landscape Size */ 
@media only screen and (max-width: 479px) {
	#section-header .caroufredsel_wrapper, #section-header .list_carousel li{min-height: <?php echo ot_get_option('fpslider_minheight') / 1.7; ?>px  !important;} 
}
</style>

<!-- Slider Height - Page/Post Version -->
<?php if(get_custom_field('image_slider') == 'Yes') { ?>
<style type="text/css">
#section-header .list_carousel li {
    min-height: <?php echo get_custom_field('slider_minheight'); ?>px !important;
}
@media only screen and (min-width: 959px) {#section-header .list_carousel{min-height: <?php echo get_custom_field('slider_minheight'); ?>px !important;}} 

/* Tablet to 960 */ 
@media only screen and (min-width: 768px) and (max-width: 959px) {#section-header .list_carousel li{min-height: <?php echo get_custom_field('slider_minheight') / 1.5; ?>px  !important;}}

/* All Mobile Sizes */ 
@media only screen and (max-width: 767px) {
	#section-header .list_carousel li{min-height: <?php echo get_custom_field('slider_minheight') / 1.9; ?>px  !important;} 
	a.prev, a.next {
		left: 10px !important;
		right: 10px !important;
		top: -9999px !important;
	}
}

/* Mobile Landscape Size to Tablet Size  */ 
@media only screen and (min-width: 480) and (max-width: 767px) {#section-header .list_carousel li{min-height: <?php echo get_custom_field('slider_minheight') / 1.9; ?>px  !important;}}

/* Mobile Portrait Size to Mobile Landscape Size */ 
@media only screen and (max-width: 479px) {#section-header .list_carousel li{min-height: <?php echo get_custom_field('slider_minheight') / 2.2; ?>px;}}
</style>
<?php } ?>

<!-- ============================================== -->
<!-- ============================================== -->
<!-- ============================================== -->
