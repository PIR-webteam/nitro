<?php


/** *********************** **/
/** These are "Portable" Shortcodes, which means you can 
 * easily transfer this file to another theme (along with 
 * the skeleton.css and buttons.css file) and retain the 
 * core functionality in another theme. Some styles can also
 * be ported from the typography and main stylesheets 
 * for the 'exact' same styling. **/
/** *********************** **/

	
/** *********************** **/
/** Shortcodes Declarations **/
/** *********************** **/
add_shortcode( 'one_column', 'one_column' );
add_shortcode( 'one_column_first', 'one_column_first' );
add_shortcode( 'one_column_last', 'one_column_last' );

add_shortcode( 'two_columns', 'two_columns' );
add_shortcode( 'two_columns_first', 'two_columns_first' );
add_shortcode( 'two_columns_last', 'two_columns_last' );

add_shortcode( 'three_columns', 'three_columns' );
add_shortcode( 'three_columns_first', 'three_columns_first' );
add_shortcode( 'three_columns_last', 'three_columns_last' );

add_shortcode( 'four_columns', 'four_columns' );
add_shortcode( 'four_columns_first', 'four_columns_first' );
add_shortcode( 'four_columns_last', 'four_columns_last' );

add_shortcode( 'five_columns', 'five_columns' );
add_shortcode( 'five_columns_first', 'five_columns_first' );
add_shortcode( 'five_columns_last', 'five_columns_last' );

add_shortcode( 'six_columns', 'six_columns' );
add_shortcode( 'six_columns_first', 'six_columns_first' );
add_shortcode( 'six_columns_last', 'six_columns_last' );

add_shortcode( 'seven_columns', 'seven_columns' );
add_shortcode( 'seven_columns_first', 'seven_columns_first' );
add_shortcode( 'seven_columns_last', 'seven_columns_last' );

add_shortcode( 'eight_columns', 'eight_columns' );
add_shortcode( 'eight_columns_first', 'eight_columns_first' );
add_shortcode( 'eight_columns_last', 'eight_columns_last' );

add_shortcode( 'nine_columns', 'nine_columns' );
add_shortcode( 'nine_columns_first', 'nine_columns_first' );
add_shortcode( 'nine_columns_last', 'nine_columns_last' );

add_shortcode( 'ten_columns', 'ten_columns' );
add_shortcode( 'ten_columns_first', 'ten_columns_first' );
add_shortcode( 'ten_columns_last', 'ten_columns_last' );

add_shortcode( 'eleven_columns', 'eleven_columns' );
add_shortcode( 'eleven_columns_first', 'eleven_columns_first' );
add_shortcode( 'eleven_columns_last', 'eleven_columns_last' );

add_shortcode( 'twelve_columns', 'twelve_columns' );
add_shortcode( 'twelve_columns_first', 'twelve_columns_first' );
add_shortcode( 'twelve_columns_last', 'twelve_columns_last' );

add_shortcode( 'thirteen_columns', 'thirteen_columns' );
add_shortcode( 'thirteen_columns_first', 'thirteen_columns_first' );
add_shortcode( 'thirteen_columns_last', 'thirteen_columns_last' );

add_shortcode( 'fourteen_columns', 'fourteen_columns' );
add_shortcode( 'fourteen_columns_first', 'fourteen_columns_first' );
add_shortcode( 'fourteen_columns_last', 'fourteen_columns_last' );

add_shortcode( 'fifteen_columns', 'fifteen_columns' );
add_shortcode( 'fifteen_columns_first', 'fifteen_columns_first' );
add_shortcode( 'fifteen_columns_last', 'fifteen_columns_last' );

add_shortcode( 'sixteen_columns', 'sixteen_columns' );

add_shortcode( 'onethird_column', 'onethird_column' );
add_shortcode( 'onethird_column_first', 'onethird_column_first' );
add_shortcode( 'onethird_column_last', 'onethird_column_last' );

add_shortcode( 'twothirds_column', 'twothirds_column' );
add_shortcode( 'twothirds_column_first', 'twothirds_column_first' );
add_shortcode( 'twothirds_column_last', 'twothirds_column_last' );

add_shortcode( 'clearfix', 'clearfix' );
add_shortcode( 'superquote', 'superquote' );
add_shortcode( 'supertagline', 'supertagline' );
add_shortcode( 'feature', 'feature' );
add_shortcode( 'aside', 'aside' );

add_shortcode( 'button', 'button' );
add_shortcode( 'blue_button', 'blue_button' );
add_shortcode( 'red_button', 'red_button' );
add_shortcode( 'green_button', 'green_button' );
add_shortcode( 'yellow_button', 'yellow_button' );
add_shortcode( 'purple_button', 'purple_button' );
add_shortcode( 'black_button', 'black_button' );

/** ******************************* **/
/** Shortcodes Functions and Markup **/
/** ******************************* **/

// Skeleton Columns ==========================================
function one_column( $atts, $content = null ) { 
  return '<div class="one column">'.$content.'</div>';
}
function one_column_first( $atts, $content = null ) { 
  return '<div class="one column alpha">'.$content.'</div>';
}
function one_column_last( $atts, $content = null ) { 
  return '<div class="one column omega">'.$content.'</div>';
}

function two_columns( $atts, $content = null ) {
  return '<div class="two columns">'.$content.'</div>';
}
function two_columns_first( $atts, $content = null ) {
  return '<div class="two columns alpha">'.$content.'</div>';
}
function two_columns_last( $atts, $content = null ) {
  return '<div class="two columns omega">'.$content.'</div>';
}

function three_columns( $atts, $content = null ) {
  return '<div class="three columns">'.$content.'</div>';
}
function three_columns_first( $atts, $content = null ) {
  return '<div class="three columns alpha">'.$content.'</div>';
}
function three_columns_last( $atts, $content = null ) {
  return '<div class="three columns omega">'.$content.'</div>';
}

function four_columns( $atts, $content = null ) {
  return '<div class="four columns">'.$content.'</div>';
}
function four_columns_first( $atts, $content = null ) {
  return '<div class="four columns alpha">'.$content.'</div>';
}
function four_columns_last( $atts, $content = null ) {
  return '<div class="four columns omega">'.$content.'</div>';
}

function five_columns( $atts, $content = null ) {
  return '<div class="five columns">'.$content.'</div>';
}
function five_columns_first( $atts, $content = null ) {
  return '<div class="four columns alpha">'.$content.'</div>';
}
function five_columns_last( $atts, $content = null ) {
  return '<div class="four columns omega">'.$content.'</div>';
}

function six_columns( $atts, $content = null ) {
  return '<div class="six columns">'.$content.'</div>';
}
function six_columns_first( $atts, $content = null ) {
  return '<div class="six columns alpha">'.$content.'</div>';
}
function six_columns_last( $atts, $content = null ) {
  return '<div class="six columns omega">'.$content.'</div>';
}

function seven_columns( $atts, $content = null ) {
  return '<div class="seven columns">'.$content.'</div>';
}
function seven_columns_first( $atts, $content = null ) {
  return '<div class="seven columns alpha">'.$content.'</div>';
}
function seven_columns_last( $atts, $content = null ) {
  return '<div class="seven columns omega">'.$content.'</div>';
}

function eight_columns( $atts, $content = null ) {
  return '<div class="eight columns">'.$content.'</div>';
}
function eight_columns_first( $atts, $content = null ) {
  return '<div class="eight columns alpha">'.$content.'</div>';
}
function eight_columns_last( $atts, $content = null ) {
  return '<div class="eight columns omega">'.$content.'</div>';
}

function nine_columns( $atts, $content = null ) {
  return '<div class="nine columns">'.$content.'</div>';
}
function nine_columns_first( $atts, $content = null ) {
  return '<div class="nine columns alpha">'.$content.'</div>';
}
function nine_columns_last( $atts, $content = null ) {
  return '<div class="nine columns omega">'.$content.'</div>';
}

function ten_columns( $atts, $content = null ) {
  return '<div class="ten columns">'.$content.'</div>';
}
function ten_columns_first( $atts, $content = null ) {
  return '<div class="ten columns alpha">'.$content.'</div>';
}
function ten_columns_last( $atts, $content = null ) {
  return '<div class="ten columns omega">'.$content.'</div>';
}

function eleven_columns( $atts, $content = null ) {
  return '<div class="eleven columns">'.$content.'</div>';
}
function eleven_columns_first( $atts, $content = null ) {
  return '<div class="eleven columns alpha">'.$content.'</div>';
}
function eleven_columns_last( $atts, $content = null ) {
  return '<div class="eleven columns omega">'.$content.'</div>';
}

function twelve_columns( $atts, $content = null ) {
  return '<div class="twelve columns">'.$content.'</div>';
}
function twelve_columns_first( $atts, $content = null ) {
  return '<div class="twelve columns alpha">'.$content.'</div>';
}
function twelve_columns_last( $atts, $content = null ) {
  return '<div class="twelve columns omega">'.$content.'</div>';
}

function thirteen_columns( $atts, $content = null ) {
  return '<div class="thirteen columns">'.$content.'</div>';
}
function thirteen_columns_first( $atts, $content = null ) {
  return '<div class="thirteen columns alpha">'.$content.'</div>';
}
function thirteen_columns_last( $atts, $content = null ) {
  return '<div class="thirteen columns omega">'.$content.'</div>';
}

function fourteen_columns( $atts, $content = null ) {
  return '<div class="fourteen columns">'.$content.'</div>';
}
function fourteen_columns_first( $atts, $content = null ) {
  return '<div class="fourteen columns alpha">'.$content.'</div>';
}
function fourteen_columns_last( $atts, $content = null ) {
  return '<div class="fourteen columns omega">'.$content.'</div>';
}

function fifteen_columns( $atts, $content = null ) {
  return '<div class="fifteen columns">'.$content.'</div>';
}
function fifteen_columns_first( $atts, $content = null ) {
  return '<div class="fifteen columns alpha">'.$content.'</div>';
}
function fifteen_columns_last( $atts, $content = null ) {
  return '<div class="fifteen columns omega">'.$content.'</div>';
}

function sixteen_columns( $atts, $content = null ) {
  return '<div class="sixteen columns">'.$content.'</div>';
}


function onethird_column( $atts, $content = null ) {
  return '<div class="one-third column">'.$content.'</div>';
}
function onethird_column_first( $atts, $content = null ) {
  return '<div class="one-third column alpha">'.$content.'</div>';
}
function onethird_column_last( $atts, $content = null ) {
  return '<div class="one-third column omega">'.$content.'</div>';
}

function twothirds_column( $atts, $content = null ) {
  return '<div class="two-thirds column">'.$content.'</div>';
}
function twothirds_column_first( $atts, $content = null ) {
  return '<div class="two-thirds column alpha">'.$content.'</div>';
}
function twothirds_column_last( $atts, $content = null ) {
  return '<div class="two-thirds column omega">'.$content.'</div>';
}



// Clearfix ==========================================
function clearfix( $atts, $content = null ) {
	return '<div class="clearfix">'.$content.'</div>';
}



// SuperQuote ==========================================
function superquote( $atts, $content = null ) {
	return '<div class="superquote">'.$content.'</div>';
}


// SuperTagline ==========================================
function supertagline( $atts, $content = null ) {
	return '<hr /><span class="supertagline"> '.$content.' </span><br class="clear" /><hr />';
}



// Feature bar (download button) ==========================================
function feature( $atts, $content = null ) {
	extract(shortcode_atts(array(
	        "href" => 'http://',
	        "buttontext" => 'null'
	    ), $atts));
		  
	return '<div class="feature"><a class="button yellow" href="'.$href.'">'.$buttontext.'</a><span>'.$content.'</span></div>';
}


// Aside ==========================================
function aside( $atts, $content = null ) {
	extract(shortcode_atts(array(
	        "title" => 'null'
	    ), $atts));
		
	return '<div class="three columns alpha aside-container">
				<div class="aside"> 
					<h3>'.$title.'</h3>
					<p>'.$content.'</p>
				</div>
			</div>';
}



// Button ==========================================
function button( $atts, $content = null ) {
	extract(shortcode_atts(array(
	        "href" => 'null'
	    ), $atts));
		
	return '<a class="button" href="'.$href.'">'.$content.'</a>';
}

// Blue Button ==========================================
function blue_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
	        "href" => 'null'
	    ), $atts));
		
	return '<a class="button blue" href="'.$href.'">'.$content.'</a>';
}


// Green Button ==========================================
function green_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
	        "href" => 'null'
	    ), $atts));
		
	return '<a class="button green" href="'.$href.'">'.$content.'</a>';
}


// Yellow Button ==========================================
function yellow_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
	        "href" => 'null'
	    ), $atts));
		
	return '<a class="button yellow" href="'.$href.'">'.$content.'</a>';
}


// Red Button ==========================================
function red_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
	        "href" => 'null'
	    ), $atts));
		
	return '<a class="button red" href="'.$href.'">'.$content.'</a>';
}


// Purple Button ==========================================
function purple_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
	        "href" => 'null'
	    ), $atts));
		
	return '<a class="button purple" href="'.$href.'">'.$content.'</a>';
}

// Black Button ==========================================
function black_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
	        "href" => 'null'
	    ), $atts));
		
	return '<a class="button black" href="'.$href.'">'.$content.'</a>';
}


?>