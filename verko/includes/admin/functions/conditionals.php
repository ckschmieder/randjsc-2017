<?php
/**
 * @package Verko 
 */

/**
 * checks if static site front page & blog posts index being displayed
 *
 * @access public
 * @return boolean
 */

function df_is_homepage() {

	if( is_home() && is_front_page() ) {
		return true;
	} else {
		return false;
	}

}

if( ! function_exists( 'df_get_the_id' ) ) :
/**
 * Helper to get metapost from single post or page base on post id.
 * @param  string  $key
 * @param  boolean $single
 * @return void
 */
function df_get_the_id() {

	if( is_singular() ) {
	   return get_the_ID();
	}

}
endif;

/**
 * conditionals for 
 * @return array
 */
function df_has_featured_image(){
	switch ( get_post_format() ) {

		case 'image':
			return array( 'scan_raw', 'scan', 'featured', 'attachment' );
			break;

		case 'gallery':
			return array( 'callback' );
			break;

		default:
			return array( 'featured' );
			break;
	}

	return array();
}