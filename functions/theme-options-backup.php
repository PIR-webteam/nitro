<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array(
      
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general_default',
        'title'       => 'Logo'
      ),
      array(
        'id'          => 'skinning_options',
        'title'       => 'Skin Options'
      ),
      array(
        'id'          => 'styling',
        'title'       => 'Typography'
      ),
      array(
        'id'          => 'image_settings',
        'title'       => 'Image Options'
      ),
      array(
        'id'          => 'header',
        'title'       => 'Top Hat Options'
		      ),
      array(
        'id'          => 'frontpage',
        'title'       => 'Front Page'
      ),
      /* array(
        'id'          => 'skeleton_slider',
        'title'       => 'Front Page Slider'
			  ), 
      array(
        'id'          => 'social',
        'title'       => 'Social Options'
      ),*/
      array(
        'id'          => 'footer',
        'title'       => 'Footer Options'
      ),
      array(
        'id'          => 'documentation',
        'title'       => 'Supported Plugins'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'general_notes',
        'label'       => 'Welcome!',
        'desc'        => 'Welcome to the Theme Options page! From this panel, you\'ll be able to select the custom options that will make this theme your own. Have Fun!',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'logo',
        'label'       => 'Upload Your Logo',
        'desc'        => 'Upload your logo image (JPG, GIF, PNG). Keep in mind that this won\'t scale, so you may need to resize it to fit the template. Default size is 260 x 60px.<br /><br />
Hint: Select the "File URL" option after the image has uploaded, then hit the Add to OptionTree button.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'favicon',
        'label'       => 'Upload Your Browser Icon',
        'desc'        => 'Upload the 16x16px image (GIF) that you\'d like to show up in the browser address bar.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'responsive_toggle',
        'label'       => 'Enable Responsive Mode on Mobile Devices?',
        'desc'        => 'Selecting "Yes" will enable the responsive mode on all devices. Selecting "No" will disable the responsive layout on mobile devices like phones (but not on normal desktop browser windows). ',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'general_default',
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
        'id'          => 'default_skin',
        'label'       => 'Select your starting skin',
        'desc'        => 'Pick the default starter skin that you want to use. <br /><br />Note: You can change the CSS for any of these from inside the /assets/stylesheets/xxxx.css files. You can also manually enter your own custom CSS override rules below.',
        'std'         => '', 
        'type'        => 'select',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Classic',
            'label'       => 'Classic',
            'src'         => ''
          ),
          array(
            'value'       => 'Dark',
            'label'       => 'Dark',
            'src'         => ''
          ),
        ),
      ),
      
      array(
        'id'          => 'boxed_skin',
        'label'       => 'Select a boxed or unboxed layout',
        'desc'        => 'Select the "boxed" in skin to place a solid background behind your main content column, regardless of the body background color that you select later on.',
        'std'         => '', 
        'type'        => 'select',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Boxed',
            'label'       => 'Boxed',
            'src'         => ''
          ),
          array(
            'value'       => 'Open',
            'label'       => 'Open',
            'src'         => ''
          ),
        ),
      ),
      
      array(
        'id'          => 'color_notes',
        'label'       => 'Highlight Colors',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => 'heading'
      ),
      
      array(
        'id'          => 'link_color',
        'label'       => 'Link Color & Theme Accent Color',
        'desc'        => 'Pick the color that you\'d like all links to appear as by default. This color will also be used across the theme as an accent (borders, some highlight text, etc.)',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'link_hover_color',
        'label'       => 'Link Hover Color',
        'desc'        => 'Select the color that you\'d like your links to appear as when hovered over by a mouse.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'link_visited_color',
        'label'       => 'Link Visited Color',
        'desc'        => 'Select the color that you\'d like links to appear as AFTER a user has visited them. Likely a slight variation of the default link color.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      array(
        'id'          => 'skin_notes',
        'label'       => 'Background Colors',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => 'heading'
      ),
      
      array(
        'id'          => 'tophat_background_image',
        'label'       => 'Top Hat Background Image',
        'desc'        => 'Upload a tile-able image that you\'d like to use for the "tophat" background texture. <br /><br />
Note: This (and the other BG options for the tophat, footer and sub-footer) are irrelevant in the "Boxed" skin version as it uses transparent backgrounds.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'tophat_background_color',
        'label'       => 'Top Hat Background Color',
        'desc'        => 'Select a color that you\'d like to use for the tophat\'s background (in case you\'re using a transparent image or no image for the previous field).',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      array(
        'id'          => 'header_background_image',
        'label'       => 'Header Background Image',
        'desc'        => 'Upload a tile-able image that you\'d like to use for the "header" background texture. <br /><br />',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'header_background_color',
        'label'       => 'Header Background Color',
        'desc'        => 'Select a color that you\'d like to use for the header\'s background (in case you\'re using a transparent image or no image for the previous field).',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
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
        'id'          => 'slider_background_color',
        'label'       => 'Caption Area Background Color',
        'desc'        => 'Select a color that you\'d like to use for the page-caption\'s background (in case you\'re using a transparent image or no image for the previous field).',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      array(
        'id'          => 'default_bg',
        'label'       => 'Body Background Image',
        'desc'        => 'Optional: Upload an image that you\'d like to use as the default background. This will be centered at the top and repeated along the X and Y axis, so it can either be a pattern or a large graphic.  <br /><br />

Note: You can override this image using the "custom field" for background images inside posts and pages.

 <br /><br />

Also Note: If you leave any of these next options blank, the theme\'s base skin may use a default backup image or color instead.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'default_bgcolor',
        'label'       => 'Body Background Color',
        'desc'        => 'Select a color that you\'d like to use for the body\'s background (in case you\'re using a transparent image or no image for the previous field).',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      array(
        'id'          => 'footer_background_image',
        'label'       => 'Footer Background Image',
        'desc'        => 'Upload a tile-able image that you\'d like to use for the "footer" background texture.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_background_color',
        'label'       => 'Footer Background Color',
        'desc'        => 'Select a color that you\'d like to use for the footer\'s background (in case you\'re using a transparent image or no image for the previous field).',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'subfooter_background_image',
        'label'       => 'Sub-Footer Background Image',
        'desc'        => 'Upload a tile-able image that you\'d like to use for the "sub-footer" background texture.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'subfooter_background_color',
        'label'       => 'Sub-Footer Background Color',
        'desc'        => 'Select a color that you\'d like to use for the sub-footer\'s background (in case you\'re using a transparent image or no image for the previous field).',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      array(
        'id'          => 'css_notes',
        'label'       => 'Custom CSS',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => 'heading'
      ),
      
      array(
        'id'          => 'customcss',
        'label'       => 'Custom CSS',
        'desc'        => 'You can enter custom style rules into this box if you\'d like. IE: <i>a{color: red !important;}</i><br />
					This is an advanced option! This is not recommended for users not fluent in CSS... but if you do know CSS, anything you add here will override the default styles.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'skinning_options',
        'rows'        => '15',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      array(
        'id'          => 'default_fontstack',
        'label'       => 'Select a Fontstack',
	        'desc'        => 'Select the default font stack that you\'d like used on the site. The first 2 options are simple, unobtrusive typeset styles that will work for most sites. The "Typekit" option is for users who intend to select their own fonts from Typekit.com. <br /><br />The "Typekit" option is discussed in the documentation and opens up a wide range of possibilities for font replacement. It does require some extra steps though! In short, you must to select your custom fonts from <a href="http://typekit.com">Typekit.com</a> (which requires a free account if you don\'t already have one). <br /><br />The theme demo uses the "Custom Typekit" option with the font "Proxima Nova" from Typekit.com. There are screenshots of what the font selections we used in the demo included in the Documentation folder. You can also just copy/paste the following string of text into your "Kit Editor" at Typekit.com to expedite the process: <br /><br /><span style="font-style: italic;"> .fp_caption, .fp_caption strong, .header_blurb, .module-meta h4 a, .portfolio-filters .button, .title, body, h1, h1 a, h2, h2 a, h3, h3 a, h4, h4 a, h5, h5 a, p </span><br /><br />When you\'re done, just copy and paste the "Embed Code" that Typekit will give you into the field directly below this. Keep in mind you can pick ANY of the fonts that they offer over there... so feel free to get creative!',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Sans-Serif',
            'label'       => 'Sans-Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Serif',
            'label'       => 'Serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Typekit-2',
            'label'       => 'Custom Typekit (Read the Sidebar for Details)',
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 'alt_fontreplace',
        'label'       => 'Font Replacement Embed Script',
        'desc'        => 'Have your own font-replacement "embed code" already from a service like TypeKit? Go ahead and enter it right here. This is an experimental tool at the moment, so if it doesn\'t work perfectly with your own font service, you\'ll have to use the default options above or insert yours via the header.php file.<br /><br />

You can also check out the popular and stable WP Google Fonts plugin (free in the Plugins &gt; Add New directory).',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'styling',
        'rows'        => '12',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      
      // Image Settings
      
      array(
        'id'          => 'show_featured_image',
        'label'       => 'Auto-Insert Full Post Images?',
        'desc'        => 'Sometimes it\'s a hassle to manually insert an image at the top of each blog post or page... this option allows you to simply set the "Featured Image" and the theme will add that image to the top of your blog posts, every time. 
<br /><br />It\'s also fully responsive, so you won\'t need to worry about sizing so long as your featured image is above roughly 700px wide.',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'image_settings',
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
        'id'          => 'image_notes',
        'label'       => 'Thumbnail Tweaking Notes',
        'desc'        => 'The following fields only apply to the <strong>Portfolio &amp; Hybrid Blog</strong> page templates. They are entirely optional, but they strive to give you a little more control over the images in our signature grid templates.<br /><br />Note that this is not "image cropping" in the true sense. It\'s a quick way to make lots of big images smaller and more manageable in a responsive layout that changes from one device to another. If you require truly perfect uniformity in your grid images, you should create them all to an exact uniform size before uploading them (ie: create all of your featured images at 700x500 before you upload them to your posts).',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'image_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      
      array(
        'id'          => 'default_image_width',
        'label'       => 'Set a Maximum Thumbnail Width (Optional)',
        'desc'        => 'Enter a width value (ie: "700" - we recommend that you don\'t use a value smaller than 680). This will be the largest width allowed when cropping your images to create thumbnails. This means that images thinner than this width will ignore this.',
        'std'         => '500',
        'type'        => 'text',
        'section'     => 'image_settings',
        'rows'        => '1',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'default_image_height',
        'label'       => 'Set a Maximum Thumbnail Height (Optional)',
        'desc'        => 'Enter a width value (ie: "400"). This will be the largest height allowed when cropping your images to create thumbnails. This means that images shorter than this height will ignore this.',
        'std'         => '500',
        'type'        => 'text',
        'section'     => 'image_settings',
        'rows'        => '1',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'maintain_aspect_ratio',
        'label'       => 'Maintain the Thumbnail\'s Aspect Ratio?',
        'desc'        => 'Setting this to "Yes" will maintain the original aspect ratio (tall images will be tall, short images will be short).<br /><br />If you set this to "No", the theme will crop your images to the exact width and height that you gave in the options just above this (assuming they are large enough to warrant cropping - images that don\'t exceed their space in the layout will be left alone).',
        'std'         => 'false',
        'type'        => 'radio',
        'section'     => 'image_settings',
        'rows'        => '1',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'false',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'true',
            'label'       => 'No',
            'src'         => ''
          )
          )
      ),
      array(
        'id'          => 'open_as_lightbox',
        'label'       => 'Open Thumbnails Inside a Lightbox?',
        'desc'        => 'Selecting "Yes" will make most template-based thumbnails across the theme (ie: the portfolio and hybrid blog templates) open the full-size featured-image inside a lightbox. 

<br /><br />This can also be your "custom lightbox link", which can be a video URL or an alternate image. You can set this from the Skeleton Post Options on the post editor. 

<br /><br />Selecting "No" will make the thumbnails all link directly to their full post (inside a normal post template).',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'image_settings',
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
      
      // End Image Settings
      
      array(
        'id'          => 'top_hat',
        'label'       => 'Show Top Hat?',
        'desc'        => 'The Top Hat is the black row at the top of the site that displays a search bar and social-media links (setup later in this panel).',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'header',
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
        'id'          => 'top_hat_blurb',
        'label'       => 'Top Hat Left-Side Text',
        'desc'        => 'Enter some text that you\'d like used for the top-hat\'s left-side blurb. This could be your motto, a telephone number, or anything else. The Social Icons will be selected in a later section.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'header',
        'rows'        => '2',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      /* array(
        'id'          => 'fp_banner',
        'label'       => 'Upload Your Promotional Banner',
        'desc'        => 'Upload your banner image (JPG, GIF, PNG - it should approximately be 120px by 168px - the PSD is included in the theme download kit). <strong>Leave this empty if you don\'t want the banner</strong>.<br /><br />',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'fp_banner_url',
        'label'       => 'Promotional Banner Destination URL',
        'desc'        => 'The URL that you\'d like your "Hire Me" banner to link to.<br /><br />',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'header',
        'rows'        => '1',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
		      ), */
      array(
        'id'          => 'frontpage_notes',
        'label'       => 'Front Page Notes',
        'desc'        => 'The theme frontpage assumes that your "Settings &gt; Reading" panel is set to display a static page, otherwise it will display blog posts. The following options give you control over how the content is displayed... but at any time, you can opt-out of the default theme frontpage by selecting another page for your "Settings &gt; Reading" panel. And yes, this means that you can pick a page template (portfolios, alternate blog layouts, etc.) for your homepage!',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'frontpage_revolution_slider',
        'label'       => 'Front Page Revolution Slider Shortcode',
        'desc'        => 'Build your slider at the "Revolution Slider" admin panel on your dashboard (find it at the left sidebar at the bottom). Once it\'s built, copy and paste the shortcode that the plugin gives you here in this text field. It should look something like this:<br /><br /><italic>[rev_slider your_slider_alias]</italic><br /><br />For additional assistance and support with the slider, please reference the <a href="http://www.themepunch.com/codecanyon/revolution_wp/#video">Revolution Slider demo page</a> or the <a href="http://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380">Revolution Slider product page & forum</a>.<br /><br />You can also add additional sliders to individual pages or posts. To do this, create a new slider under the "Revolution Slider" admin panel, then add the custom shortcode to the individual page editor\'s "Skeleton Page Options" in the Revolution Slider field.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'frontpage',
        'rows'        => '1',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
      ),
      /*array(
        'id'          => 'frontpage_slider',
        'label'       => 'Show Front-Page Slider?',
        'desc'        => 'Show the homepage slider? Selecting "No" will hide it, even if you have slides set below.

<br /><br />
You can adjust the settings (timing, transitions, etc.) in the next section.',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'frontpage',
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
	  ), */
      array(
        'id'          => 'frontpage_caption_text-1',
        'label'       => 'Front Page Caption',
        'desc'        => 'The text that will go on your frontpage\'s caption area. Leave this empty to omit the caption element from view.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'frontpage',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'action_button_row',
        'label'       => 'Add Your Action Buttons (for below the front page caption):',
        'desc'        => 'Add a new item for each custom "Action Button" that you would like below the caption.',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array(
          array(
            'id'          => 'button_row_text',
            'label'       => 'Button Text',
            'desc'        => 'The text that will appear in the button.',
            'std'         => '',
            'type'        => 'textarea-simple',
            'section'     => 'action_button_row',
            'rows'        => '5',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
           array(
            'id'          => 'button_row_link',
            'label'       => 'Link URL',
            'desc'        => 'The link that the button will send the user to.',
            'std'         => '',
            'type'        => 'textarea-simple',
            'section'     => 'action_button_row',
            'rows'        => '1',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),                    
        ),
		),
      
      /* array(
        'id'          => 'frontpage_blurbs_toggle',
        'label'       => 'Display the row of "FrontPage Blurbs" (the row of image/text blocks):',
        'desc'        => 'Add a new item for each custom "blurb" that you want to add. Each item consists of an image, title, text, and a link. Don\'t forget to add "http://" before your URL if it is an external link!',
        'rows'        => '',
 		'type'        => 'radio',
        'section'     => 'frontpage',
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
		      ), */
		      
      array(
        'id'          => 'frontpage_blurbs',
        'label'       => 'Add Your Own FrontPage Blurb Elements:',
        'desc'        => 'Add a new item for each custom "blurb" that you want to add. Each item consists of an image, title, text, and a link. Don\'t forget to add "http://" before your URL if it is an external link!',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array(
          array(
            'id'          => 'image',
            'label'       => 'Upload Your Icon (32x32)',
            'desc'        => 'Upload a JPG, PNG, or GIF to use as your icon. We recommend the size be 32px by 32px.',
            'std'         => '',
            'type'        => 'upload',
            'section'     => 'frontpage_blurbs',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
          array(
            'id'          => 'description',
            'label'       => 'Description',
            'desc'        => 'Add the text that will show up below the blurb title.',
            'std'         => '',
            'type'        => 'textarea-simple',
            'section'     => 'frontpage_blurbs',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),         
          array(
            'id'          => 'link',
            'label'       => 'Optional Link',
            'desc'        => 'If you would like the title to link to a page or external URL, enter the full URL (including http://) right here.',
            'std'         => '',
            'type'        => 'textarea-simple',
            'section'     => 'frontpage_blurbs',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),   
        ),
      ),  
      array(
        'id'          => 'category_row_section',
        'label'       => 'Show the "Category Rows"?',
        'desc'        => 'Select "Yes" to show a row(s) of posts just above the footer widgets section. You can setup custom options for each row below.',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'frontpage',
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
          'id'          => 'category_rows_main_title',
          'label'       => 'Front Page Category Row Header',
          'desc'        => 'The title that will show up above the "Category Row" section. Leave this empty and no title will show up.',
          'std'         => '',
          'type'        => 'text',
          'section'     => 'frontpage',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => ''
        ),
        array(
        'id'          => 'category_row',
        'label'       => 'Add Your Front Page Category Rows:',
        'desc'        => 'This pulls posts from your blog to the frontpage, which means it requires you to have a few posts with assigned featured images.<br /><br /> Add a new item for each custom "Category Row" that you want to add. Each item consists of a title, descriptive text, and a category.',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array(
          array(
            'id'          => 'cat_row_text',
            'label'       => 'Descriptive Text',
            'desc'        => 'The text for the From the Blog row (shown on the left side of the row).',
            'std'         => '',
            'type'        => 'textarea-simple',
            'section'     => 'cat_row',
            'rows'        => '5',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
          array(
            'id'          => 'cat_row_category',
            'label'       => 'Which Blog Category Should This Come From?',
            'desc'        => 'Pick a category (not mandatory) for the posts that you\'d like to show up in this row. If you don\'t pick one, it\'ll draw from all possible categories in your blog.',
            'std'         => '',
            'type'        => 'category-select',
            'section'     => 'cat_row',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),         
        ),
      ), 
      
      array(
        'id'          => 'frontpage_notes_more',
        'label'       => 'Additional Front Page Content',
        'desc'        => 'You can add additional content to the front-page, below the options you just filled out, by visiting Settings > Reading and selecting a static page to be displayed. For instance, the theme-demo does this to display a large piece of text and a button linking to the RSVP page. You can add anything though, from plain text to images, so be creative!',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      /* array(
        'id'          => 'frontpage_category_filter',
        'label'       => 'Front Page Category Filter',
        'desc'        => '<strong>Only relevant if you are using "Your Latest Posts" under the Setting > Reading panel.</strong> Explanation: The frontpage, by default, will display ALL of your blog posts. If you\'d like just a few categories to be displayed, select them here and they won\'t show up.',
        'std'         => '',
        'type'        => 'category-checkbox',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'frontpage_post_count',
        'label'       => 'Front Page Post Count',
        'desc'        => 'Select how many posts you\'d like displayed on the front page before pagination kicks in. 
<br /><br />Select -1 to show all posts... This is not recommended in most circumstances as it\'ll slow down the site.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
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
          ),
          array(
            'value'       => '11',
            'label'       => '11',
            'src'         => ''
          ),
          array(
            'value'       => '12',
            'label'       => '12',
            'src'         => ''
          ),
          array(
            'value'       => '13',
            'label'       => '13',
            'src'         => ''
          ),
          array(
            'value'       => '14',
            'label'       => '14',
            'src'         => ''
          ),
          array(
            'value'       => '15',
            'label'       => '15',
            'src'         => ''
          ),
          array(
            'value'       => '-1',
            'label'       => '-1',
            'src'         => ''
          )
        ),
		      ), */
      
      /* array(
        'id'          => 'pagination',
        'label'       => 'Select The Pagination Style',
        'desc'        => 'Select whether you want to use the simple "Next/Previous" pagination style when there are too many posts on a page, or the new "Numbered" style.',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Numbered',
            'label'       => 'Numbered',
            'src'         => ''
          ),
          array(
            'value'       => 'NextPrev',
            'label'       => 'Next/Previous',
            'src'         => ''
          )
        ),
      ),    */ 
       
	  /* array(
        'id'          => 'slider_notes',
        'label'       => 'Slider Notes',
        'desc'        => 'The settings below will control the front page slider options. Each individual post and page have their own set of these settings as well.',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'skeleton_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'homepage_slider',
        'label'       => 'Front Page Slides',
        'desc'        => 'Upload images that you\'d like to be used as slides on the default homepage layout, as well as a simple destination URL for when visitors click each slide. 

Note: The theme will automatically resize any oversized images to fit the space. Images should all be roughly the same height, and images that are too small will not be scaled "up" to fit the space.',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'skeleton_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'fpslider_fx',
        'label'       => 'Slider : Transition Effect',
        'desc'        => 'Select the effect that will transition you from one set of slides to another.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'skeleton_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
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
        'id'          => 'fpslider_count',
        'label'       => 'Slider : Items Per Transition',
        'desc'        => 'Select how many slides/items you would like to be visible at any given time. IE: Picking "5" would show 5 images in each carousel. Picking "1" would just show one large image on each carousel (making it look like a traditional slider).',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'skeleton_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
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
        'id'          => 'fpslider_minheight',
        'label'       => 'Slider : Initial Height',
        'desc'        => 'Default: "215"
<br /><br />
Some browsers require an initial height to be entered for your sliders. Enter a numeric value here that represents your slider\'s approximate opening height. <br /><br />
Hint: If you\'re loading just 2 or 3 slides at once, it\'ll be a big number (200+). If you\'re loading 5 or 6 slides at once, it\'ll be smaller (120 or under).',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'skeleton_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'fpslider_auto',
        'label'       => 'Slider : AutoPlay',
        'desc'        => 'Selecting "true" will result in a slider that plays automatically. <br /><br />Selecting "false" will require users to manually advance the slider with the  buttons, keyboard  keys, or a finger swipe.',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'skeleton_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
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
        'id'          => 'fpslider_autoduration',
        'label'       => 'Slider : AutoPlay Pause Duration',
        'desc'        => 'Select a time in milliseconds for the pause duration of each slide if you selected "true" for the auto play feature. Hint: "2000" is fast, "8000" is slower.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'skeleton_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
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
	  ), */
      /* array(
        'id'          => 'header_social',
        'label'       => 'Display Social Icons in the Header?',
        'desc'        => 'Do you want the social icons to show up in the header? Options for each icon are below.',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'social',
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
        'id'          => 'footer_social',
        'label'       => 'Display Social Icons in the Footer?',
        'desc'        => 'Selecting "Yes" will repeat the social icons (Facebook, Twitter, etc.) from the header navigation on the right side of the footer.',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'social',
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
        'id'          => 'social_twitter',
        'label'       => 'Twitter Link',
        'desc'        => 'Enter your Twitter URL that you\'d like to use for all theme-specific social links.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'social_facebook',
        'label'       => 'Facebook Link',
        'desc'        => 'Enter your Facebook URL that you\'d like to use for all theme-specific social links.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'social_google',
        'label'       => 'Google+ Link',
        'desc'        => 'Enter your Google+ URL that you\'d like to use for all theme-specific social links.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'social_youtube',
        'label'       => 'YouTube Link',
        'desc'        => 'Insert the full URL you\'d like used for your YouTube link. Leave empty and the icon won\'t show up at all.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'social_vimeo',
        'label'       => 'Vimeo Link',
        'desc'        => 'Enter your Vimeo URL that you\'d like to use for all theme-specific social links.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'social_linkedin',
        'label'       => 'Linked-In Link',
        'desc'        => 'Enter your LinkedIn URL that you\'d like to use for all theme-specific social links.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'social_pinterest',
        'label'       => 'Pinterest Link',
        'desc'        => 'Your Pinterest URL.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'social_skype',
        'label'       => 'Skype Link',
        'desc'        => 'Your Skype URL',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'social_custom',
        'label'       => 'Add Your Own Social Icons:',
        'desc'        => 'Add a new item for each custom icon that you want to add. An uploaded image and a link are required. The image should be a PNG, sized to about 32x32, but the theme will likely scale these down if you upload anything bigger. Here\'s a good place to start looking for <a href="http://www.komodomedia.com/blog/2009/06/social-network-icon-pack/">additional icons</a>. Don\'t forget to add "http://" before your URL!',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),  
      array(
        'id'          => 'social_rss',
        'label'       => 'Add your blog\'s RSS link?',
        'desc'        => 'Want to display your blog\'s RSS feed link?',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'social',
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
        'id'          => 'pre_footer_widgets',
        'label'       => 'Display the Pre-Footer Widget Space?',
        'desc'        => 'Choose whether or not you\'d like the pre-footer widget space to be visible. These 3 widget spaces (sidebars) are controlled from the Appearance &gt; Widgets panel.',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'footer',
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
      ),*/
      array(
        'id'          => 'footer_widgets',
        'label'       => 'Display Footer Widget Space?',
        'desc'        => 'Choose whether or not you\'d like the footer widget space to be visible. These 3 widget spaces (sidebars) are controlled from the Appearance &gt; Widgets panel.',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'footer',
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
        'id'          => 'footer_blurb_left',
        'label'       => 'Page ID of the Privacy policy page for this site',
        'desc'        => 'For example, on the main site, this is 179',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_blurb_right',
        'label'       => 'Translation of phrase "privacy policy"',
        'desc'        => 'For example, on the main site, this is "Privacy Policy"',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'plugins',
        'label'       => 'Supported Third Party Plugins',
        'desc'        => 'The following plugins are confirmed to work with this theme... and in some cases I even recommend that you pick them up to extend the core features:

<br /><br />
<a target="_blank" href="http://wordpress.org/extend/plugins/shortcodes-ultimate">Shortcodes Ultimate</a>: Want to use tabs, videos, create your own buttons, and more? This will add a small "shortcodes" icon next to the image-uploader icon on your Posts and Pages. Make sure you visit the Settings &gt; Shortcodes page after installation to turn on their "Compatibility Mode" to ensure there\'s no conflict with other plugins. Note: The sliders are not verified to work with the theme... yet.
<br /><br />
<a target="_blank" href="http://wordpress.org/extend/plugins/advanced-excerpt/">Advanced Excerpt</a>: A better post excerpt system... this will allow you to include images, paragraphs, videos (iframes) and more into your post previews.
<br /><br />
<a target="_blank" href="http://wordpress.org/extend/plugins/wp-google-fonts">WP Google Fonts</a>: If you\'re not using Typekit.com and want more fonts, you can\'t really go wrong with this plugin.

<br /><br />
<a target="_blank" href="http://wordpress.org/extend/plugins/twitter-wings">Twitter Wings</a>: Just about the perfect Twitter Feed plugin - it\'ll allow you to add a widget for your twitter stuff.

<br /><br />
<a target="_blank" href="http://wordpress.org/extend/plugins/quick-flickr-widget">Quick Flickr Widget</a>: Adds a Flickr Widget (as seen in the demo).

<br /><br />
Why not just include them in the theme? Because that\'s a bad, bad, terrible no good, downright dirty practice that theme developers should avoid. The theme\'s purpose is to skin and lay out your content... not BE the content ;) Using plugins in this way is good for you and good for the community because it allows you to switch themes easily and keep your plugin-based-features isolated from all of that stuff.',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'documentation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
    )
  );
   
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}