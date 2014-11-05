<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

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
        'title'       => __( 'Logo', 'theme-options.php' )
      ),
      array(
        'id'          => 'skinning_options',
        'title'       => __( 'Skin Options', 'theme-options.php' )
      ),
      array(
        'id'          => 'styling',
        'title'       => __( 'Typography', 'theme-options.php' )
      ),
      array(
        'id'          => 'image_settings',
        'title'       => __( 'Image Options', 'theme-options.php' )
      ),
      array(
        'id'          => 'header',
        'title'       => __( 'Top Hat Options', 'theme-options.php' )
      ),
      array(
        'id'          => 'frontpage',
        'title'       => __( 'Front Page', 'theme-options.php' )
      ),
      array(
        'id'          => 'footer',
        'title'       => __( 'Footer Options', 'theme-options.php' )
      ),
      array(
        'id'          => 'documentation',
        'title'       => __( 'Supported Plugins', 'theme-options.php' )
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'general_notes',
        'label'       => __( 'Welcome!', 'theme-options.php' ),
        'desc'        => __( 'Welcome to the Theme Options page! From this panel, you\'ll be able to select the custom options that will make this theme your own. Have Fun!', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'logo',
        'label'       => __( 'Upload Your Logo', 'theme-options.php' ),
        'desc'        => __( 'Upload your logo image (JPG, GIF, PNG). Keep in mind that this won\'t scale, so you may need to resize it to fit the template. Default size is 260 x 60px.<br /><br />
Hint: Select the "File URL" option after the image has uploaded, then hit the Add to OptionTree button.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'favicon',
        'label'       => __( 'Upload Your Browser Icon', 'theme-options.php' ),
        'desc'        => __( 'Upload the 16x16px image (GIF) that you\'d like to show up in the browser address bar.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'responsive_toggle',
        'label'       => __( 'Enable Responsive Mode on Mobile Devices?', 'theme-options.php' ),
        'desc'        => __( 'Selecting "Yes" will enable the responsive mode on all devices. Selecting "No" will disable the responsive layout on mobile devices like phones (but not on normal desktop browser windows).', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => __( 'Yes', 'theme-options.php' ),
            'src'         => ''
          ),
          array(
            'value'       => 'No',
            'label'       => __( 'No', 'theme-options.php' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'default_skin',
        'label'       => __( 'Select your starting skin', 'theme-options.php' ),
        'desc'        => __( 'Pick the default starter skin that you want to use. <br /><br />Note: You can change the CSS for any of these from inside the /assets/stylesheets/xxxx.css files. You can also manually enter your own custom CSS override rules below.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'Classic',
            'label'       => __( 'Classic', 'theme-options.php' ),
            'src'         => ''
          ),
          array(
            'value'       => 'Dark',
            'label'       => __( 'Dark', 'theme-options.php' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'boxed_skin',
        'label'       => __( 'Select a boxed or unboxed layout', 'theme-options.php' ),
        'desc'        => __( 'Select the "boxed" in skin to place a solid background behind your main content column, regardless of the body background color that you select later on.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'Boxed',
            'label'       => __( 'Boxed', 'theme-options.php' ),
            'src'         => ''
          ),
          array(
            'value'       => 'Open',
            'label'       => __( 'Open', 'theme-options.php' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'color_notes',
        'label'       => __( 'Highlight Colors', 'theme-options.php' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => 'heading',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'link_color',
        'label'       => __( 'Link Color &amp; Theme Accent Color', 'theme-options.php' ),
        'desc'        => __( 'Pick the color that you\'d like all links to appear as by default. This color will also be used across the theme as an accent (borders, some highlight text, etc.)', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'link_hover_color',
        'label'       => __( 'Link Hover Color', 'theme-options.php' ),
        'desc'        => __( 'Select the color that you\'d like your links to appear as when hovered over by a mouse.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'link_visited_color',
        'label'       => __( 'Link Visited Color', 'theme-options.php' ),
        'desc'        => __( 'Select the color that you\'d like links to appear as AFTER a user has visited them. Likely a slight variation of the default link color.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'skin_notes',
        'label'       => __( 'Background Colors', 'theme-options.php' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => 'heading',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'tophat_background_image',
        'label'       => __( 'Top Hat Background Image', 'theme-options.php' ),
        'desc'        => __( 'Upload a tile-able image that you\'d like to use for the "tophat" background texture. <br /><br />
Note: This (and the other BG options for the tophat, footer and sub-footer) are irrelevant in the "Boxed" skin version as it uses transparent backgrounds.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'tophat_background_color',
        'label'       => __( 'Top Hat Background Color', 'theme-options.php' ),
        'desc'        => __( 'Select a color that you\'d like to use for the tophat\'s background (in case you\'re using a transparent image or no image for the previous field).', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'header_background_image',
        'label'       => __( 'Header Background Image', 'theme-options.php' ),
        'desc'        => __( 'Upload a tile-able image that you\'d like to use for the "header" background texture. <br /><br />', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'header_background_color',
        'label'       => __( 'Header Background Color', 'theme-options.php' ),
        'desc'        => __( 'Select a color that you\'d like to use for the header\'s background (in case you\'re using a transparent image or no image for the previous field).', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'slider_background_image',
        'label'       => __( 'Caption Area Background Image', 'theme-options.php' ),
        'desc'        => __( 'Upload a large, or tile-able image that you\'d like to use for the page caption\'s background texture.<br /><br />', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'slider_background_color',
        'label'       => __( 'Caption Area Background Color', 'theme-options.php' ),
        'desc'        => __( 'Select a color that you\'d like to use for the page-caption\'s background (in case you\'re using a transparent image or no image for the previous field).', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'default_bg',
        'label'       => __( 'Body Background Image', 'theme-options.php' ),
        'desc'        => __( 'Optional: Upload an image that you\'d like to use as the default background. This will be centered at the top and repeated along the X and Y axis, so it can either be a pattern or a large graphic.  <br /><br />

Note: You can override this image using the "custom field" for background images inside posts and pages.

 <br /><br />

Also Note: If you leave any of these next options blank, the theme\'s base skin may use a default backup image or color instead.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'default_bgcolor',
        'label'       => __( 'Body Background Color', 'theme-options.php' ),
        'desc'        => __( 'Select a color that you\'d like to use for the body\'s background (in case you\'re using a transparent image or no image for the previous field).', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_background_image',
        'label'       => __( 'Footer Background Image', 'theme-options.php' ),
        'desc'        => __( 'Upload a tile-able image that you\'d like to use for the "footer" background texture.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_background_color',
        'label'       => __( 'Footer Background Color', 'theme-options.php' ),
        'desc'        => __( 'Select a color that you\'d like to use for the footer\'s background (in case you\'re using a transparent image or no image for the previous field).', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'subfooter_background_image',
        'label'       => __( 'Sub-Footer Background Image', 'theme-options.php' ),
        'desc'        => __( 'Upload a tile-able image that you\'d like to use for the "sub-footer" background texture.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'subfooter_background_color',
        'label'       => __( 'Sub-Footer Background Color', 'theme-options.php' ),
        'desc'        => __( 'Select a color that you\'d like to use for the sub-footer\'s background (in case you\'re using a transparent image or no image for the previous field).', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'css_notes',
        'label'       => __( 'Custom CSS', 'theme-options.php' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'skinning_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => 'heading',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'customcss',
        'label'       => __( 'Custom CSS', 'theme-options.php' ),
        'desc'        => __( 'You can enter custom style rules into this box if you\'d like. IE: <i>a{color: red !important;}</i><br />
					This is an advanced option! This is not recommended for users not fluent in CSS... but if you do know CSS, anything you add here will override the default styles.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'skinning_options',
        'rows'        => '15',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'default_fontstack',
        'label'       => __( 'Select a Fontstack', 'theme-options.php' ),
        'desc'        => __( 'Select the default font stack that you\'d like used on the site. The first 2 options are simple, unobtrusive typeset styles that will work for most sites. The "Typekit" option is for users who intend to select their own fonts from Typekit.com. <br /><br />The "Typekit" option is discussed in the documentation and opens up a wide range of possibilities for font replacement. It does require some extra steps though! In short, you must to select your custom fonts from <a href="http://typekit.com">Typekit.com</a> (which requires a free account if you don\'t already have one). <br /><br />The theme demo uses the "Custom Typekit" option with the font "Proxima Nova" from Typekit.com. There are screenshots of what the font selections we used in the demo included in the Documentation folder. You can also just copy/paste the following string of text into your "Kit Editor" at Typekit.com to expedite the process: <br /><br /><span style="font-style: italic"> .fp_caption, .fp_caption strong, .header_blurb, .module-meta h4 a, .portfolio-filters .button, .title, body, h1, h1 a, h2, h2 a, h3, h3 a, h4, h4 a, h5, h5 a, p </span><br /><br />When you\'re done, just copy and paste the "Embed Code" that Typekit will give you into the field directly below this. Keep in mind you can pick ANY of the fonts that they offer over there... so feel free to get creative!', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'Sans-Serif',
            'label'       => __( 'Sans-Serif', 'theme-options.php' ),
            'src'         => ''
          ),
          array(
            'value'       => 'Serif',
            'label'       => __( 'Serif', 'theme-options.php' ),
            'src'         => ''
          ),
          array(
            'value'       => 'Typekit-2',
            'label'       => __( 'Custom Typekit (Read the Sidebar for Details)', 'theme-options.php' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'alt_fontreplace',
        'label'       => __( 'Font Replacement Embed Script', 'theme-options.php' ),
        'desc'        => __( 'Have your own font-replacement "embed code" already from a service like TypeKit? Go ahead and enter it right here. This is an experimental tool at the moment, so if it doesn\'t work perfectly with your own font service, you\'ll have to use the default options above or insert yours via the header.php file.<br /><br />

You can also check out the popular and stable WP Google Fonts plugin (free in the Plugins &gt; Add New directory).', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'styling',
        'rows'        => '12',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'show_featured_image',
        'label'       => __( 'Auto-Insert Full Post Images?', 'theme-options.php' ),
        'desc'        => __( 'Sometimes it\'s a hassle to manually insert an image at the top of each blog post or page... this option allows you to simply set the "Featured Image" and the theme will add that image to the top of your blog posts, every time. 
<br /><br />It\'s also fully responsive, so you won\'t need to worry about sizing so long as your featured image is above roughly 700px wide.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'image_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => __( 'Yes', 'theme-options.php' ),
            'src'         => ''
          ),
          array(
            'value'       => 'No',
            'label'       => __( 'No', 'theme-options.php' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'image_notes',
        'label'       => __( 'Thumbnail Tweaking Notes', 'theme-options.php' ),
        'desc'        => __( 'The following fields only apply to the <strong>Portfolio &amp; Hybrid Blog</strong> page templates. They are entirely optional, but they strive to give you a little more control over the images in our signature grid templates.<br /><br />Note that this is not "image cropping" in the true sense. It\'s a quick way to make lots of big images smaller and more manageable in a responsive layout that changes from one device to another. If you require truly perfect uniformity in your grid images, you should create them all to an exact uniform size before uploading them (ie: create all of your featured images at 700x500 before you upload them to your posts).', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'image_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'default_image_width',
        'label'       => __( 'Set a Maximum Thumbnail Width (Optional)', 'theme-options.php' ),
        'desc'        => __( 'Enter a width value (ie: "700" - we recommend that you don\'t use a value smaller than 680). This will be the largest width allowed when cropping your images to create thumbnails. This means that images thinner than this width will ignore this.', 'theme-options.php' ),
        'std'         => '500',
        'type'        => 'text',
        'section'     => 'image_settings',
        'rows'        => '1',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'default_image_height',
        'label'       => __( 'Set a Maximum Thumbnail Height (Optional)', 'theme-options.php' ),
        'desc'        => __( 'Enter a width value (ie: "400"). This will be the largest height allowed when cropping your images to create thumbnails. This means that images shorter than this height will ignore this.', 'theme-options.php' ),
        'std'         => '500',
        'type'        => 'text',
        'section'     => 'image_settings',
        'rows'        => '1',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'maintain_aspect_ratio',
        'label'       => __( 'Maintain the Thumbnail\'s Aspect Ratio?', 'theme-options.php' ),
        'desc'        => __( 'Setting this to "Yes" will maintain the original aspect ratio (tall images will be tall, short images will be short).<br /><br />If you set this to "No", the theme will crop your images to the exact width and height that you gave in the options just above this (assuming they are large enough to warrant cropping - images that don\'t exceed their space in the layout will be left alone).', 'theme-options.php' ),
        'std'         => 'false',
        'type'        => 'radio',
        'section'     => 'image_settings',
        'rows'        => '1',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'false',
            'label'       => __( 'Yes', 'theme-options.php' ),
            'src'         => ''
          ),
          array(
            'value'       => 'true',
            'label'       => __( 'No', 'theme-options.php' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'open_as_lightbox',
        'label'       => __( 'Open Thumbnails Inside a Lightbox?', 'theme-options.php' ),
        'desc'        => __( 'Selecting "Yes" will make most template-based thumbnails across the theme (ie: the portfolio and hybrid blog templates) open the full-size featured-image inside a lightbox. 

<br /><br />This can also be your "custom lightbox link", which can be a video URL or an alternate image. You can set this from the Skeleton Post Options on the post editor. 

<br /><br />Selecting "No" will make the thumbnails all link directly to their full post (inside a normal post template).', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'image_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => __( 'Yes', 'theme-options.php' ),
            'src'         => ''
          ),
          array(
            'value'       => 'No',
            'label'       => __( 'No', 'theme-options.php' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'top_hat',
        'label'       => __( 'Show Top Hat?', 'theme-options.php' ),
        'desc'        => __( 'The Top Hat is the black row at the top of the site that displays a search bar and social-media links (setup later in this panel).', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => __( 'Yes', 'theme-options.php' ),
            'src'         => ''
          ),
          array(
            'value'       => 'No',
            'label'       => __( 'No', 'theme-options.php' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'top_hat_blurb',
        'label'       => __( 'Top Hat Left-Side Text', 'theme-options.php' ),
        'desc'        => __( 'Enter some text that you\'d like used for the top-hat\'s left-side blurb. This could be your motto, a telephone number, or anything else. The Social Icons will be selected in a later section.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'header',
        'rows'        => '2',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'frontpage_notes',
        'label'       => __( 'Front Page Notes', 'theme-options.php' ),
        'desc'        => __( 'The theme frontpage assumes that your "Settings &gt; Reading" panel is set to display a static page, otherwise it will display blog posts. The following options give you control over how the content is displayed... but at any time, you can opt-out of the default theme frontpage by selecting another page for your "Settings &gt; Reading" panel. And yes, this means that you can pick a page template (portfolios, alternate blog layouts, etc.) for your homepage!', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hero_header_title',
        'label'       => __( 'Front Page Header Title', 'theme-options.php' ),
        'desc'        => __( 'This is the largest text on the left side of the header region.', 'theme-options.php' ),
        'std'         => 'The operator of .ORG  domain names',
        'type'        => 'text',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hero_header_subtitle',
        'label'       => __( 'Front Page Hero Header Subtitle', 'theme-options.php' ),
        'desc'        => __( 'smaller text in a darker blue color', 'theme-options.php' ),
        'std'         => 'Providing people and organizations an identity online, where everyone has a voice.',
        'type'        => 'text',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hero_header_button_text',
        'label'       => __( 'Front Page Hero Button Text', 'theme-options.php' ),
        'desc'        => '',
        'std'         => 'Learn about .ORG',
        'type'        => 'text',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'frontpage_revolution_slider',
        'label'       => __( 'Front Page Revolution Slider Shortcode', 'theme-options.php' ),
        'desc'        => __( 'Build your slider at the "Revolution Slider" admin panel on your dashboard (find it at the left sidebar at the bottom). Once it\'s built, copy and paste the shortcode that the plugin gives you here in this text field. It should look something like this:<br /><br />[rev_slider your_slider_alias]<br /><br />For additional assistance and support with the slider, please reference the <a href="http://www.themepunch.com/codecanyon/revolution_wp/#video">Revolution Slider demo page</a> or the <a href="http://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380">Revolution Slider product page &amp; forum</a>.<br /><br />You can also add additional sliders to individual pages or posts. To do this, create a new slider under the "Revolution Slider" admin panel, then add the custom shortcode to the individual page editor\'s "Skeleton Page Options" in the Revolution Slider field.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'frontpage',
        'rows'        => '1',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'frontpage_caption_text_1',
        'label'       => __( 'Front Page Caption', 'theme-options.php' ),
        'desc'        => __( 'The text that will go on your frontpage\'s caption area. Leave this empty to omit the caption element from view.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'frontpage',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'action_button_row',
        'label'       => __( 'Add Your Action Buttons (for below the front page caption):', 'theme-options.php' ),
        'desc'        => __( 'Add a new item for each custom "Action Button" that you would like below the caption.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'button_row_text',
            'label'       => __( 'Button Text', 'theme-options.php' ),
            'desc'        => __( 'The text that will appear in the button.', 'theme-options.php' ),
            'std'         => '',
            'type'        => 'textarea-simple',
            'rows'        => '5',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'button_row_link',
            'label'       => __( 'Link URL', 'theme-options.php' ),
            'desc'        => __( 'The link that the button will send the user to.', 'theme-options.php' ),
            'std'         => '',
            'type'        => 'textarea-simple',
            'rows'        => '1',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
      array(
        'id'          => 'frontpage_blurbs',
        'label'       => __( 'Add Your Own FrontPage Blurb Elements:', 'theme-options.php' ),
        'desc'        => __( 'Add a new item for each custom "blurb" that you want to add. Each item consists of an image, title, text, and a link. Don\'t forget to add "http://" before your URL if it is an external link!', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'image',
            'label'       => __( 'Upload Your Icon (32x32)', 'theme-options.php' ),
            'desc'        => __( 'Upload a JPG, PNG, or GIF to use as your icon. We recommend the size be 32px by 32px.', 'theme-options.php' ),
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'description',
            'label'       => __( 'Description', 'theme-options.php' ),
            'desc'        => __( 'Add the text that will show up below the blurb title.', 'theme-options.php' ),
            'std'         => '',
            'type'        => 'textarea-simple',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'link',
            'label'       => __( 'Optional Link', 'theme-options.php' ),
            'desc'        => __( 'If you would like the title to link to a page or external URL, enter the full URL (including http://) right here.', 'theme-options.php' ),
            'std'         => '',
            'type'        => 'textarea-simple',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
      array(
        'id'          => 'category_row_section',
        'label'       => __( 'Show the "Category Rows"?', 'theme-options.php' ),
        'desc'        => __( 'Select "Yes" to show a row(s) of posts just above the footer widgets section. You can setup custom options for each row below.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => __( 'Yes', 'theme-options.php' ),
            'src'         => ''
          ),
          array(
            'value'       => 'No',
            'label'       => __( 'No', 'theme-options.php' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'category_rows_main_title',
        'label'       => __( 'Front Page Category Row Header', 'theme-options.php' ),
        'desc'        => __( 'The title that will show up above the "Category Row" section. Leave this empty and no title will show up.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'category_row',
        'label'       => __( 'Add Your Front Page Category Rows:', 'theme-options.php' ),
        'desc'        => __( 'This pulls posts from your blog to the frontpage, which means it requires you to have a few posts with assigned featured images.<br /><br /> Add a new item for each custom "Category Row" that you want to add. Each item consists of a title, descriptive text, and a category.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'cat_row_text',
            'label'       => __( 'Descriptive Text', 'theme-options.php' ),
            'desc'        => __( 'The text for the From the Blog row (shown on the left side of the row).', 'theme-options.php' ),
            'std'         => '',
            'type'        => 'textarea-simple',
            'rows'        => '5',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'cat_row_category',
            'label'       => __( 'Which Blog Category Should This Come From?', 'theme-options.php' ),
            'desc'        => __( 'Pick a category (not mandatory) for the posts that you\'d like to show up in this row. If you don\'t pick one, it\'ll draw from all possible categories in your blog.', 'theme-options.php' ),
            'std'         => '',
            'type'        => 'category-select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
      array(
        'id'          => 'frontpage_notes_more',
        'label'       => __( 'Additional Front Page Content', 'theme-options.php' ),
        'desc'        => __( 'You can add additional content to the front-page, below the options you just filled out, by visiting Settings &gt; Reading and selecting a static page to be displayed. For instance, the theme-demo does this to display a large piece of text and a button linking to the RSVP page. You can add anything though, from plain text to images, so be creative!', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_widgets',
        'label'       => __( 'Display Footer Widget Space?', 'theme-options.php' ),
        'desc'        => __( 'Choose whether or not you\'d like the footer widget space to be visible. These 3 widget spaces (sidebars) are controlled from the Appearance &gt; Widgets panel.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => __( 'Yes', 'theme-options.php' ),
            'src'         => ''
          ),
          array(
            'value'       => 'No',
            'label'       => __( 'No', 'theme-options.php' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'footer_blurb_left',
        'label'       => __( 'Page ID of the Privacy policy page for this site', 'theme-options.php' ),
        'desc'        => __( 'For example, on the main site, this is 179', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_blurb_right',
        'label'       => __( 'Translation of phrase "privacy policy"', 'theme-options.php' ),
        'desc'        => __( 'For example, on the main site, this is "Privacy Policy"', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'plugins',
        'label'       => __( 'Supported Third Party Plugins', 'theme-options.php' ),
        'desc'        => __( 'The following plugins are confirmed to work with this theme... and in some cases I even recommend that you pick them up to extend the core features:

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
Why not just include them in the theme? Because that\'s a bad, bad, terrible no good, downright dirty practice that theme developers should avoid. The theme\'s purpose is to skin and lay out your content... not BE the content ;) Using plugins in this way is good for you and good for the community because it allows you to switch themes easily and keep your plugin-based-features isolated from all of that stuff.', 'theme-options.php' ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'documentation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}