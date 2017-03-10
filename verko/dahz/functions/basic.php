<?php

/**
 * Dahz Framework Basic Function.
 *
 * WARNING: This file is part of the core Dahz Framework. DO NOT EDIT if you unsure for what will you do. Believe me, skies will fall !
 *
 * @package WordPress
 * @subpackage  DahzFramework
 * @category  Core
 * @author  Dahz
 * @since  1.0.0
 */

/*-----------------------------------------------------------------------------------

TABLE OF CONTENTS - FUNCTIONS/BASIC.PHP
- grab nav menu theme location name
- grab dynamic sidebar name
- suffix for minified
- convert hex to rgba
- Word Trim function


-----------------------------------------------------------------------------------*/


/**
 * Function for grabbing a WP nav menu theme location name.
 *
 * @since  1.1.0
 * @access public
 * @param  string  $location
 * @return string
 */
function dahz_get_menu_location_name( $location ) {

  $locations = get_registered_nav_menus();

  return $locations[ $location ];
}

/**
 * Function for grabbing a dynamic sidebar name.
 *
 * @since  1.1.0
 * @access public
 * @param  string  $sidebar_id
 * @return string
 */
function dahz_get_sidebar_name( $sidebar_id ) {
  global $wp_registered_sidebars;

  if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) )
    return $wp_registered_sidebars[ $sidebar_id ]['name'];
}

/**
 * Helper function for getting the script/style `.min` suffix for minified files.
 *
 * @since  1.3.0
 * @access public
 * @return string
 */
function dahz_get_min_suffix() {
  return defined( 'WP_DEBUG' ) && true === WP_DEBUG ? '' : '.min';
}

/**
 * Adds the default framework actions and filters.
 *
 * @since 1.1.0
 */
function dahz_default_filters() {
  /* Make text widgets and term descriptions shortcode aware. */
  add_filter( 'widget_text', 'do_shortcode' );
  add_filter( 'term_description', 'do_shortcode' );
  add_filter( 'the_excerpt', 'do_shortcode');
}
/* Initialize the framework's default actions and filters. */
add_action( 'after_setup_theme', 'dahz_default_filters', 3 );


if ( ! function_exists( 'dahz_comment_reply' ) ) {
/**
 * Enqueue the comment reply JavaScript on singular entry screens.
 * @since  1.0.0
 * @return void
 */
function dahz_comment_reply() {
  if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) wp_enqueue_script( 'comment-reply' );
} // End dahz_comment_reply()
}
add_action( 'wp_enqueue_scripts', 'dahz_comment_reply', 5 );


/**
 * Convert Hex to RGBA
 * @since  1.0.0
 */
if ( ! function_exists( 'df_convert_rgba' ) ) {

    function df_convert_rgba( $color, $opacity ) {
        $color = str_replace( "#", "", $color );

        $r = hexdec( substr( $color, 0, 2 ) );
        $g = hexdec( substr( $color, 2, 2 ) );
        $b = hexdec( substr( $color, 4, 2 ) );
        $a = intval( $opacity ) / 100;

        return "rgba( $r, $g, $b, $a )";
    }

}


/**
 * Word Trim function
 * @param type $count
 * @param type $ellipsis
 * @return string
 * @since  1.0.0
 */
if ( ! function_exists( 'df_word_trim' ) ) :
function df_word_trim($string, $count, $ellipsis = FALSE){
          $words = explode(' ', $string);
          if (count($words) > $count){
                array_splice($words, $count);
                $string = implode(' ', $words);

                if (is_string($ellipsis)){
                        $string .= $ellipsis;
                }
                elseif ($ellipsis){
                        $string .= '&hellip;';
                }
          }
          return $string;
}
endif;
