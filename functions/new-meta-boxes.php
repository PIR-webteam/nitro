<?php

/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );

function custom_meta_boxes() {

  $page_options = array(
    'id'        => 'page_options',
    'title'     => 'Skeleton Page Options',
    'desc'      => '',
    'pages'     => array( 'page' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
      
     array(
    	'id' => 'title_1',
		'label' => 'Page Specific Options',			
		'desc' => 'This is a set of custom options for just this page. These are entirely optional, but they bring some extra functionality to pages. Some page templates (Portfolios, Blogs, etc.) may need some of these options filled out to work properly.',
		'type' => 'textblock',					
		'std' => '',
		'class' => '',
      	'choices' => array()
	),
      
	array(
        'id'          => 'slider_background_image',
        'label'       => 'Caption Area Background Image',
        'desc'        => 'Upload a large, or tile-able image that you\'d like to use for the page caption\'s background texture.<br /><br />',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	
	array(
    	'id' => 'page_caption',
		'label' => 'Page Caption',			
		'desc' => 'Enter a custom page caption that will appear in the header. Leaving this blank removes the page caption from view.',					
		'type' => 'textarea-simple',					
		'std' => '',
		'class' => '',
      	'choices' => array()
	),
		
	array(
    	'id' => 'hide_title',
		'label' => 'Hide the Page Title?',			
		'desc' => 'Do you want to hide the page title from view?',					
		'type' => 'radio',					
		'std' => '',
		'class' => '',
      	'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'No',
            'label'       => 'No',
            'src'         => ''
          )
        ),
	),
	
	array(
        'id'          => 'category_filter',
        'label'       => 'Category Filter',
        'desc'        => 'Select which categories you would like included. <strong>These are only used if the page template that you have selected uses blog posts, like the Portfolio or Blog templates</strong>.',
        'std'         => '',
        'type'        => 'category-checkbox',
        'class'       => ''
      ),
      
      array(
    	'id' => 'post_count',
		'label' => 'Number of Posts Per Page',			
		'desc' => 'If this is a page template that uses blog posts, set a number for how many posts you want to show up per page. The default is set to show ALL posts found within the above category(s).',					
		'type' => 'text',					
		'std' => '',
		'class' => '',
      	'choices' => array()
	),
	
	array(
    	'id' => 'column_flip',
		'label' => 'Flip Columns?',			
		'desc' => 'Do you want to swap the sides for the Main Column and Sidebar Column?',					
		'type' => 'radio',					
		'std' => '',
		'class' => '',
      	'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'No',
            'label'       => 'No',
            'src'         => ''
          )
        ),
	),
	
	array(
    	'id' => 'portfolio_view',
		'label' => 'Default Portfolio View',			
		'desc' => 'If this is a Portfolio page template, you can set the default view here.',					
		'type' => 'radio',					
		'std' => '',
		'class' => '',
      	'choices'     => array( 
          array(
            'value'       => 'Grid',
            'label'       => 'Grid',
            'src'         => ''
          ),
          array(
            'value'       => 'Hybrid',
            'label'       => 'Hybrid',
            'src'         => ''
          ),
          array(
            'value'       => 'List',
            'label'       => 'List',
            'src'         => ''
          )
        ),
	),
	
	/* array(
    	'id' => 'frontpage_slider',
		'label' => 'FrontPage Slider: On/Off',			
		'desc' => 'Toggle the front-age slider element on or off from this option. <strong>Note:</strong> This is specifically to grab the front-page slider that is managed from the Theme Options panel. The page-specific slider manager is below this module.',					
		'type' => 'radio',					
		'std' => '',
		'class' => '',
      	'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'No',
            'label'       => 'No',
            'src'         => ''
          )
        ),
			),*/
	
	array(
        'id'          => 'page_revolution_slider',
        'label'       => 'Revolution Slider Shortcode (for this individual page)',
        'desc'        => 'Build your slider at the "Revolution Slider" admin panel on your dashboard (find it at the left sidebar at the bottom). Once it\'s built, copy and paste the shortcode that the plugin gives you here in this text field. It should look something like this:<br /><br /><italic>[rev_slider your_slider_alias]</italic><br /><br />For additional assistance and support with the slider, please reference the <a href="http://www.themepunch.com/codecanyon/revolution_wp/#video">Revolution Slider demo page</a> or the <a href="http://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380">Revolution Slider product page & forum</a>.<br /><br />You can also add a slider to your "front page" by entering the shortcode on the Appearances > Theme Options panel.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => '',
        'rows'        => '1',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
      ),
      
	 array(
        'id'          => 'fullwidth_social',
        'label'       => 'Display Social Icons below the page template?',
        'desc'        => 'Do you want the social icons to show up below the page template? The actual social-icons are set from the Theme Options panel under the Social tab.',
        'std'         => '',
        'type'        => 'radio',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'No',
            'label'       => 'No',
            'src'         => ''
          )
        ),
      ),
	array(
    	'id' => 'page_css',
		'label' => 'Custom Page CSS',			
		'desc' => 'Enter any custom CSS that you would like used on just this page.',					
		'type' => 'textarea-simple',					
		'std' => '',
		'class' => '',
      	'choices' => array()
	),
	
    )
  );







  $post_options = array(
    'id'        => 'post_options',
    'title'     => 'Skeleton Post Options',
    'desc'      => '',
    'pages'     => array( 'post' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
      
     array(
    	'id' => 'title_1',
		'label' => 'Post Specific Options',			
		'desc' => 'This is a set of custom options for just this post. These are entirely optional, but they bring some extra functionality to post.',
		'type' => 'textblock',					
		'std' => '',
		'class' => '',
      	'choices' => array()
	),
	    	
	/* array(
    	'id' => 'custom_background_image',
		'label' => 'Body Background Image',			
		'desc' => 'Upload an image, then place the URL here. ie: http://yoursite.com/images/custom_bg_image.jpg',					
		'type' => 'upload',					
		'std' => '',
		'class' => '',
      	'choices' => array()
		), */
	
	array(
    	'id' => 'lightbox_link',
		'label' => 'Custom Lightbox Link',			
		'desc' => 'Insert a URL for an image or video (Vimeo, YouTube, or .MOV) to be launched inside a lightbox from the post thumbnail. See the <a href="http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/">lightbox documentation</a> for acceptable media.',					
		'type' => 'text',					
		'std' => '',
		'class' => '',
      	'choices' => array()
	),
		
	array(
    	'id' => 'remove_sidebar',
		'label' => 'Remove the Sidebar?',			
		'desc' => 'Do you want to remove the sidebar and use the full-width template for this post?',					
		'type' => 'radio',					
		'std' => '',
		'class' => '',
      	'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'No',
            'label'       => 'No',
            'src'         => ''
          )
        ),
	),
	
	
	array(
    	'id' => 'column_flip',
		'label' => 'Flip Columns?',			
		'desc' => 'Do you want to swap the sides for the Main Column and Sidebar Column?',					
		'type' => 'radio',					
		'std' => '',
		'class' => '',
      	'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'No',
            'label'       => 'No',
            'src'         => ''
          )
        ),
	),
	
	array(
        'id'          => 'post_revolution_slider',
        'label'       => 'Revolution Slider Shortcode (for this individual post)',
        'desc'        => 'Build your slider at the "Revolution Slider" admin panel on your dashboard (find it at the left sidebar at the bottom). Once it\'s built, copy and paste the shortcode that the plugin gives you here in this text field. It should look something like this:<br /><br /><italic>[rev_slider your_slider_alias]</italic><br /><br />For additional assistance and support with the slider, please reference the <a href="http://www.themepunch.com/codecanyon/revolution_wp/#video">Revolution Slider demo page</a> or the <a href="http://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380">Revolution Slider product page & forum</a>.<br /><br />You can also add a slider to your "front page" by entering the shortcode on the Appearances > Theme Options panel.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => '',
        'rows'        => '1',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
      ),
      
      
	array(
    	'id' => 'page_css',
		'label' => 'Custom Post CSS',			
		'desc' => 'Enter any custom CSS that you would like used on just this post.',					
		'type' => 'textarea-simple',					
		'std' => '',
		'class' => '',
      	'choices' => array()
	),
	
    )
  );








/*$slider_options = array(
    'id'        => 'slider_options',
    'title'     => 'Skeleton Slider Options',
    'desc'      => '',
    'pages'     => array( 'page', 'post' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
      
    array(
        'id'          => 'slider_notes',
        'label'       => 'Slider Notes',
        'desc'        => 'The settings below will control the slider options for just this page. Make sure you fill out all of the options (even if you want to leave an option off), or the slider might break.',
        'std'         => '',
        'type'        => 'textblock',
        'class'       => ''
      ),
      
      array(
    	'id' => 'image_slider_title',
		'label' => 'Slider Title (optional)',			
		'desc' => 'Enter some text if you would like to display a title above your slider. Leave Empty to Display No Title.',					
		'type' => 'text',					
		'std' => '',
		'class' => '',
	),
	
      array(
    	'id' => 'image_slider',
		'label' => 'Page Slider: On/Off',			
		'desc' => 'Toggle the slider element on or off from this option.',					
		'type' => 'radio',					
		'std' => '',
		'class' => '',
      	'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'No',
            'label'       => 'No',
            'src'         => ''
          )
        ),
	),
	
      array(
        'id'          => 'homepage_slider',
        'label'       => 'Slider: Slide Manager',
        'desc'        => 'Upload images that you\'d like to be used as slides, as well as a simple destination URL for when visitors click each slide. 

Note: The theme will automatically resize any oversized images to fit the space. Images should all be roughly the same height, and images that are too small will not be scaled "up" to fit the space.',
        'std'         => '',
        'type'        => 'list-item',
      ),
      array(
        'id'          => 'slider_fx',
        'label'       => 'Slider: Transition Effect',
        'desc'        => 'Select the effect that will transition you from one set of slides to another.',
        'std'         => '',
        'type'        => 'select',
        'choices'     => array( 
          array(
            'value'       => 'scroll',
            'label'       => 'scroll',
            'src'         => ''
          ),
          array(
            'value'       => 'directscroll',
            'label'       => 'directscroll',
            'src'         => ''
          ),
          array(
            'value'       => 'crossfade',
            'label'       => 'crossfade',
            'src'         => ''
          ),
          array(
            'value'       => 'fade',
            'label'       => 'fade',
            'src'         => ''
          ),
          array(
            'value'       => 'cover',
            'label'       => 'cover',
            'src'         => ''
          ),
          array(
            'value'       => 'uncover',
            'label'       => 'uncover',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'slider_count',
        'label'       => 'Slider: How many slides should be visible at once?',
        'desc'        => 'Default: 1. Select how many slides you would like to be visible at any given time. IE: Picking "5" would show 5 images in each carousel. Picking "1" would just show one large image on each carousel (making it look like a traditional slider).',
        'std'         => '1',
        'type'        => 'select',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => '1',
            'src'         => ''
          ),
          array(
            'value'       => '2',
            'label'       => '2',
            'src'         => ''
          ),
          array(
            'value'       => '3',
            'label'       => '3',
            'src'         => ''
          ),
          array(
            'value'       => '4',
            'label'       => '4',
            'src'         => ''
          ),
          array(
            'value'       => '5',
            'label'       => '5',
            'src'         => ''
          ),
          array(
            'value'       => '6',
            'label'       => '6',
            'src'         => ''
          ),
          array(
            'value'       => '7',
            'label'       => '7',
            'src'         => ''
          ),
          array(
            'value'       => '8',
            'label'       => '8',
            'src'         => ''
          ),
          array(
            'value'       => '9',
            'label'       => '9',
            'src'         => ''
          ),
          array(
            'value'       => '10',
            'label'       => '10',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'slider_minheight',
        'label'       => 'Slider: Initial Height',
        'desc'        => 'Some browsers require an initial height to be entered for your slider. Enter a numeric value here that represents your slider\'s approximate opening height in pixels (this is the height of your first slider image in most cases). Hint: WordPress will tell you the image size when you upload your image.',
        'std'         => '',
        'type'        => 'text'
      ),
      array(
        'id'          => 'slider_auto',
        'label'       => 'Slider: AutoPlay',
        'desc'        => 'Selecting "true" will result in a slider that plays automatically. <br /><br />Selecting "false" will require users to manually advance the slider with the  buttons, keyboard  keys, or a finger swipe.',
        'std'         => '',
        'type'        => 'radio',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'true',
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => 'false',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'slider_autoduration',
        'label'       => 'Slider: AutoPlay Pause Time',
        'desc'        => 'Select a time, in milliseconds, for the pause duration of each slide if you selected "true" for the auto play feature. Hint: "2000" is fast, "8000" is slower.',
        'std'         => '',
        'type'        => 'select',
        'choices'     => array( 
          array(
            'value'       => '2000',
            'label'       => '2000',
            'src'         => ''
          ),
          array(
            'value'       => '2500',
            'label'       => '2500',
            'src'         => ''
          ),
          array(
            'value'       => '3000',
            'label'       => '3000',
            'src'         => ''
          ),
          array(
            'value'       => '3500',
            'label'       => '3500',
            'src'         => ''
          ),
          array(
            'value'       => '4000',
            'label'       => '4000',
            'src'         => ''
          ),
          array(
            'value'       => '4500',
            'label'       => '4500',
            'src'         => ''
          ),
          array(
            'value'       => '5000',
            'label'       => '5000',
            'src'         => ''
          ),
          array(
            'value'       => '5500',
            'label'       => '5500',
            'src'         => ''
          ),
          array(
            'value'       => '6000',
            'label'       => '6000',
            'src'         => ''
          ),
          array(
            'value'       => '6500',
            'label'       => '6500',
            'src'         => ''
          ),
          array(
            'value'       => '7000',
            'label'       => '7000',
            'src'         => ''
          ),
          array(
            'value'       => '7500',
            'label'       => '7500',
            'src'         => ''
          ),
          array(
            'value'       => '8000',
            'label'       => '8000',
            'src'         => ''
          )
        ),
      ),
	
    )
		  );*/


 
  ot_register_meta_box( $page_options );
  ot_register_meta_box( $post_options );
  /*ot_register_meta_box( $slider_options );*/
  
}

?>