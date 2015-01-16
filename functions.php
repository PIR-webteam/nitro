<?php

/**
* Initiate Theme Options
*
* @uses wp_deregister_script()
* @uses wp_register_script()
* @uses wp_enqueue_script()
* @uses register_nav_menus()
* @uses add_theme_support()
* @uses is_admin()
*
* @access public
* @since 1.0.0
*
* @return void

*/


/* Define our theme URL constant */
if(!defined('WP_THEME_URL')) {
	define( 'WP_THEME_URL', get_template_directory_uri());
}

/* OPTION TREE */ 
add_filter( 'ot_show_pages', '__return_true' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_false' );
include_once( 'option-tree/ot-loader.php' );
include_once( 'functions/theme-options.php' );

function ot_custom_style(){
    wp_register_style( 'custom_wp_admin_css', get_stylesheet_directory_uri() . '/functions/custom-option-tree/option-tree-custom.css', false, '1.0.0' );
	    wp_enqueue_style( 'custom_wp_admin_css' );
	}
add_action('admin_head', 'ot_custom_style');


// OPTIONTREE STYLELOADER ============================
// Create a new Static "options.css" file from the element-styleloader.php

/* function generate_options_css($newdata) {

	$oldCSS = $css_dir . 'options.css';
	if (isset($oldCSS)) :
		$fh = fopen($oldCSS, 'w') or die("can't open file");
		fclose($fh);
		unlink($oldCSS); // Delete the existing options.css if it exists.
	endif;

	$data = $newdata;	
	$css_dir = get_stylesheet_directory() . '/'; // Shorten code, save 1 call
	ob_start(); // Capture all output (output buffering)
		
	require($css_dir . 'element-styleloader.php'); // Generate CSS

	$css = ob_get_clean(); // Get generated CSS (output buffering)
	file_put_contents($css_dir . 'options.css', $css, LOCK_EX); // Save it
} */

// Now only generate a new options.css file when we hit save from OptionTree
// add_action('ot_after_theme_options_save', 'generate_options_css', 10, $data);
// generate_options_css($data); //TEST IT WITHOUT THE OPTIONTREE HOOK

// Last, enqueue the stylesheet in the proper way. Check if we're on the demo. If not, enqueue the options.css file.
/* function skeleton_enqueue_css() {		
	wp_register_style('options', get_template_directory_uri() . '/options.css', 'style');
	wp_enqueue_style( 'options');	
}
add_action('wp_head', 'skeleton_enqueue_css'); */

// Make sure the Typekit Embed Insert happens
function type_embed(){
   get_template_part( 'element', 'type-embed' ); 
   get_template_part( 'element', 'optionsloader' ); 
   get_template_part( 'element', 'styleloader' ); 
}
add_action('wp_head', 'type_embed');

/* function carousel_vars(){
   get_template_part( 'element', 'carouselvars' ); 
}
add_action('wp_footer', 'carousel_vars'); */

function theme_categoryrow_js(){
   get_template_part( 'element', 'categoryrow-js' ); 
}
add_action('wp_footer', 'theme_categoryrow_js');

function theme_footer_js(){
   get_template_part( 'element', 'footerjs' ); 
}
add_action('wp_footer', 'theme_footer_js');



/** PAGE META BOXES */
include_once( 'functions/new-meta-boxes.php' );

/** IMAGE RESIZE */
include_once( 'functions/image_mod.php' );

/* CATEGORY SLUG FUNCTION */
function get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category = &get_category($cat_id);
	return $category->slug;
}


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once( get_template_directory() . '/functions/tgm-plugin-activation/class-tgm-plugin-activation.php' );
 
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
function my_theme_register_required_plugins() {

    $plugins = array(
 
        // This is an example of how to include a plugin pre-packaged with a theme
         array(
            'name'                  => 'WP-Paginate', // The plugin name
            'slug'                  => 'wp-paginate', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/functions/plugins/wp-paginate.1.2.4.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),        
        array(
            'name'                  => 'Advanced Excerpt', // The plugin name
            'slug'                  => 'advanced-excerpt', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/functions/plugins/advanced-excerpt.4.1.1.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),        
    );
 
    $theme_text_domain = 'skeleton';
    $config = array(
        'domain'            => $theme_text_domain,           // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                           // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',         // Default parent menu slug
        'parent_url_slug'   => 'themes.php',         // Default parent URL slug
        'menu'              => 'install-required-plugins',   // Menu slug
        'has_notices'       => true,                         // Show admin notices or not
        'is_automatic'      => false,            // Automatically activate plugins after installation or not
        'message'           => '',               // Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
            'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
            'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ) // %1$s = dashboard link
        )
    );
 
    tgmpa( $plugins, $config );
 
}


/* Load Theme Specific Widgets, Shortcodes, the ability to pull custom fields on the frontend, and our custom meta-boxes for the theme */
include('functions/widgets/search_widget.php');
//include('functions/widgets/social_widget.php');
include('functions/custom-field.php');
include('functions/shortcodes.php');

/* Activate Our Theme Widgets */
add_action('widgets_init', create_function('', 'return register_widget("SearchWidget");'));
//add_action('widgets_init', create_function('', 'return register_widget("SocialWidget");'));


/* Our Master Function: Does 2 Main things
*  If inside the admin panel, load up our custom style
*  If outside the admin panel, register/enqueue our theme scripts, nav areas, and widget areas.
*/
function init_mdnw() {
	
	/* LOCALIZATION STUFF - 
	Defines the text domain 'skeleton' - 
	Instructs where the language files are - 
	Then instructs the theme to load the language if it's in WP-CONFIG.php as WP_LANG */
	load_theme_textdomain('skeleton', get_template_directory() . '/languages');
	$locale = get_locale();
	$locale_file = get_template_directory()."/languages/$locale.php";
	if ( is_readable($locale_file) )
		require_once($locale_file);
	

	/* init_mdnw cont... ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- */
	
	
	/* Register all scripts, Nav Areas, and Widget Areas */
	if(!is_admin()){
				
    	wp_enqueue_script( 'jquery' );		    	
    	
    	wp_register_script( 'touchWipe', WP_THEME_URL . '/assets/javascripts/jquery.touchwipe.min.js', false, null, true);
    	wp_enqueue_script( 'touchWipe' );
		
    	//wp_register_script( 'retina', WP_THEME_URL . '/assets/javascripts/retina.js', false, null, true);
    	//wp_enqueue_script( 'retina' ); 
    			
    	wp_register_script( 'Isotope', WP_THEME_URL . '/assets/javascripts/jquery.isotope.js', false, null, true);
    	wp_enqueue_script( 'Isotope' );
    	
    	wp_register_script( 'prettyPhoto', WP_THEME_URL . '/assets/javascripts/jquery.prettyPhoto.js', false, null, true);
    	wp_enqueue_script( 'prettyPhoto' ); 
				    	    	    	
    	wp_register_script( 'HoverIntent', WP_THEME_URL . '/assets/javascripts/jquery.hoverIntent.js', false, null, true);
    	wp_enqueue_script( 'HoverIntent' );
    	
    	wp_register_script( 'Modernizer', WP_THEME_URL . '/assets/javascripts/modernizr.custom.69142.js', false, null, true);
    	wp_enqueue_script( 'Modernizer' );
    	
//    	wp_register_script( 'Superfish', WP_THEME_URL . '/assets/javascripts/superfish.js', false, null, true);
//    	wp_enqueue_script( 'Superfish' );
	
		wp_register_script( 'SuperSubs', WP_THEME_URL . '/assets/javascripts/supersubs.js', false, null, true);
    	wp_enqueue_script( 'SuperSubs' );
    	
    	wp_register_script( 'MouseWheel', WP_THEME_URL . '/assets/lightbox/jquery.mousewheel.js', false, null, true);
    	wp_enqueue_script( 'MouseWheel' );
    	
    	wp_register_script( 'iLightbox', WP_THEME_URL . '/assets/lightbox/ilightbox.js', false, null, true);
    	wp_enqueue_script( 'iLightbox' );
    	
    	wp_register_script( 'carouFredSel', WP_THEME_URL . '/assets/javascripts/jquery.carouFredSel-6.2.0.js', false, null, true);
    	wp_enqueue_script( 'carouFredSel' );

        // Pre-Script Action
        wp_register_script( 'SkeletonKeyPreScripts', WP_THEME_URL . '/assets/javascripts/prescripts.js', false, null, false);
        wp_enqueue_script( 'SkeletonKeyPreScripts' ); 

		wp_register_script( 'SkeletonKey', WP_THEME_URL . '/assets/javascripts/skeleton-key.js', false, null, true);
    	wp_enqueue_script( 'SkeletonKey' ); 

		wp_register_style ( 'Base', WP_THEME_URL . '/assets/stylesheets/base.css' );
    	wp_enqueue_style( 'Base' );
    	
    	wp_register_style ( 'skeleton', WP_THEME_URL . '/assets/stylesheets/skeleton.css' );
    	wp_enqueue_style( 'skeleton' );
    	
    	wp_register_style ( 'iLightbox', WP_THEME_URL . '/assets/lightbox/ilightbox.css' );
    	wp_enqueue_style( 'iLightbox' );
    	
    	wp_register_style ( 'comments', WP_THEME_URL . '/assets/stylesheets/comments.css' );
    	wp_enqueue_style( 'comments' );
    	
    	wp_register_style ( 'custom-buttons', WP_THEME_URL . '/assets/stylesheets/buttons.css' );
    	wp_enqueue_style( 'custom-buttons' );
    	
//    	wp_register_style ( 'superfish', WP_THEME_URL . '/assets/stylesheets/superfish.css' );
//    	wp_enqueue_style( 'superfish' );
    	
    	wp_register_style ( 'prettyphoto', WP_THEME_URL . '/assets/javascripts/prettyPhoto/css/prettyPhoto.css' );
    	wp_enqueue_style( 'prettyphoto' );
    	
    	wp_register_style ( 'Styles', WP_THEME_URL . '/assets/stylesheets/styles.css' );
    	wp_enqueue_style( 'Styles' );
    }


	/* init_mdnw cont... ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- */

	
    /* Register Navigation */
    register_nav_menus( array(
		'topbar' => __( 'Top Bar Menu', 'skeleton' ),
	) );


	/* init_mdnw cont... ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- */

	
	/* Register Sidebar (Right side, next to posts/pages) */
	register_sidebar( array(
		'name' => __( 'Default Post/Page Sidebar', 'skeleton' ),
		'id' => 'default-widget-area',
		'description' => __( 'Default widget area for posts/pages. ', 'skeleton' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
/*USED TO BE         'after_widget' => '<hr class="partial-bottom" /></div>',        */
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	


	register_sidebar( array(
		'name' => __( 'Pre-Footer Widgets: Column 1', 'skeleton' ),
		'id' => 'pre-footer-widget-1',
		'description' => __( 'The first column in the pre-footer widget area.', 'skeleton' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="footer-widget-title">',
		'after_title' => '</h5>',
	) );	
	
	register_sidebar( array(
		'name' => __( 'Pre-Footer Widgets: Column 2', 'skeleton' ),
		'id' => 'pre-footer-widget-2',
		'description' => __( 'The second column in the pre-footer widget area.', 'skeleton' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="footer-widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Pre-Footer Widgets: Column 3', 'skeleton' ),
		'id' => 'pre-footer-widget-3',
		'description' => __( 'The third column in the pre-footer widget area.', 'skeleton' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="footer-widget-title">',
		'after_title' => '</h5>',
	) );
	

	register_sidebar( array(
		'name' => __( 'Footer Widgets: Column 1', 'skeleton' ),
		'id' => 'footer-widget-1',
		'description' => __( 'The first column in the footer widget area.', 'skeleton' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="footer-widget-title">',
		'after_title' => '</h5>',
	) );	
	
	register_sidebar( array(
		'name' => __( 'Footer Widgets: Column 2', 'skeleton' ),
		'id' => 'footer-widget-2',
		'description' => __( 'The second column in the footer widget area.', 'skeleton' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="footer-widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widgets: Column 3', 'skeleton' ),
		'id' => 'footer-widget-3',
		'description' => __( 'The third column in the footer widget area.', 'skeleton' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="footer-widget-title">',
		'after_title' => '</h5>',
	) );
		
}    

add_action('init', 'init_mdnw'); /* Run the above function at the init() hook */
/* end init_mdnw ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- */


/* ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- */


/* Required WP Theme Support */
add_theme_support( 'automatic-feed-links' );

/* Add "Post Thumbnails" Support */
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 700, 450, true );
add_image_size( 'single-post-thumbnail', 700, 9999 );


/* Add filter to the gallery so that we can apply the prettyPhoto tag */
/* add_filter( 'wp_get_attachment_link', 'sant_prettyadd');
 
function sant_prettyadd ($content) {
	$content = preg_replace("/<a/","<a data-rel=\"prettyPhoto[slides]\"",$content,1);
	return $content;
} */


/* ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- */


/* Custom Excerpt Length and Prevent <P> Stripping  */
/* Use with the default 'THE_EXCERPT()' */
function improved_trim_excerpt($text) { // Fakes an excerpt if needed
  global $post;
  if ( '' == $text ) {
    $text = get_the_content('');
    $text = apply_filters('the_content', $text);
    
	$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
	$text = preg_replace('@<style[^>]*?>.*?</style>@si', '', $text);
	$text = preg_replace('@<p class="wp-caption-text"[^>]*?>.*?</p>@si', '', $text);	
    $text = str_replace('\]\]\>', ']]&gt;', $text);
    $text = strip_tags($text, '<p>');
    $excerpt_length = 200;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words)> $excerpt_length) {
      array_pop($words);
      array_push($words, '... <a href="'.get_permalink($post->ID).'">'.'Read More &raquo;'.'</a>');
      $text = implode(' ', $words);
    }
  }
return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt'); 


/* Optional Alternative Excerpt - Usage: Portfolio snippets */
/* 
 * excerpt(40); // 40 chars 
 * Note that this is just "EXCERPT", not the default "THE_EXCERPT"
 * 
*/ 
 
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }


/* ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- */

/* Add shortcode support in widgets */
add_filter('widget_text', 'do_shortcode');

/* Add comment-reply support */
function theme_queue_js(){
  if (!is_admin()){
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
      wp_enqueue_script( 'comment-reply' );
  }
}
add_action('wp_print_scripts', 'theme_queue_js');

/* Disable Page Comments */
function noPgComments($open,$post_id) {
  if (get_post_type($post_id) == 'page') {
    $open = false;
  }
  return $open;
}
add_filter( 'comments_open', 'noPgComments', 10, 2 );


/* ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- */


/* Post View Count */
// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('', 'skeleton');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

function my_query_for_homepage( $query ) {
    if( $query->is_main_query() && $query->is_home() ) {
        $query->set( 'post_type', array( 'post', 'gaming', 'entertainment', 'tech', 'breakroom', 'podcasts', 'off-grid' ) );
    }
}
add_action( 'pre_get_posts', 'my_query_for_homepage' ); 



// Kriesi Page Navigation Enhancement... because Christian rocks!

/* function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
} */



if ( ! function_exists( 'twentyeleven_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyeleven_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'skeleton' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'skeleton' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'skeleton' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'skeleton' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'skeleton' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'skeleton' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'skeleton' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for twentyeleven_comment()


/* Custom Navigation Menu 
 * 
 * Allows for us to use the Description field as the sub-text to the navigation.
 * 
/* Credit to Christian Kriesi for the initial example of this walker class */
class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<strong class="tk-sommet-rounded">';
           $append = '</strong>';
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
           		$description = $append = $prepend = "";
           } 

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}



?>