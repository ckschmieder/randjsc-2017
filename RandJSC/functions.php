<?php

add_action( 'wp_enqueue_scripts', 'import_parent_style' );

function import_parent_style() {
	$suffix = dahz_get_min_suffix(); 
    wp_enqueue_style('df-layout', THEME_URI . '/includes/assets/css/layout'.$suffix.'.css', NULL, NULL);
    wp_enqueue_style( 'df-layout-child', CHILD_THEME_URI . '/style.css', array( 'df-layout' ), NULL );
}

// Enable svg in the media library (https://css-tricks.com/snippets/wordpress/allow-svg-through-wordpress-media-uploader/)
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// END of code from Verko


// R&JSC START

function randjsc_custom_style() {
    wp_enqueue_style('randj-styles', CHILD_THEME_URI . '/builds/development/css/style.css', array(), null, 'screen' );
    // wp_enqueue_script( 'jqry', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js' );
    wp_enqueue_script( 'particles', 'http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js' );
    wp_enqueue_script( 'randj-script', CHILD_THEME_URI . '/builds/development/js/scripts.js', array('jquery'), '1.12.4' );

}

add_action( 'wp_enqueue_scripts', 'randjsc_custom_style' );

register_taxonomy( 
            'portfolio_tag', 
            'portfolio', 
            array( 
                'hierarchical'  => false, 
                'label'         => __( 'Tags', CURRENT_THEME ), 
                'singular_name' => __( 'Tag', CURRENT_THEME ), 
                'rewrite'       => true, 
                'query_var'     => true 
            )  
        );


/**
 * Plugin Name: Filename-based cache busting
 * Version: 0.3
 * Description: Filename-based cache busting for WordPress scripts/styles.
 * Author: Dominik Schilling
 * Author URI: http://wphelper.de/
 * Plugin URI: https://dominikschilling.de/880/
 *
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 *
 * Extend your .htaccess file with these lines:
 *
 *   <IfModule mod_rewrite.c>
 *     RewriteEngine On
 *     RewriteBase /
 *
 *     RewriteCond %{REQUEST_FILENAME} !-f
 *     RewriteCond %{REQUEST_FILENAME} !-d
 *     RewriteRule ^(.+)\.(.+)\.(js|css)$ $1.$3 [L]
 *   </IfModule>
 */

/**
 * Moves the `ver` query string of the source into
 * the filename. Doesn't change admin scripts/styles and sources
 * with more than the `ver` arg.
 *
 * @param  string $src The original source.
 * @return string
 */
/*function ds_filename_based_cache_busting( $src ) {
  // Don't touch admin scripts.
  if ( is_admin() ) {
    return $src;
  }

  $_src = $src;
  if ( '//' === substr( $_src, 0, 2 ) ) {
    $_src = 'http:' . $_src;
  }

  $_src = parse_url( $_src );

  // Give up if malformed URL.
  if ( false === $_src ) {
    return $src;
  }

  // Check if it's a local URL.
  $wp = parse_url( home_url() );
  if ( isset( $_src['host'] ) && $_src['host'] !== $wp['host'] ) {
    return $src;
  }

  return preg_replace(
    '/\.(js|css)\?ver=(.+)$/',
    '.$2.$1',
    $src
  );
}
add_filter( 'script_loader_src', 'ds_filename_based_cache_busting' );
add_filter( 'style_loader_src', 'ds_filename_based_cache_busting' );*/

/*jQuery(document).ready(function ($) {

  $('.vc_grid-item').each(function(){
    var containsToken = false,
        token = '1',
        classToAdd = 'winner';
    
    $(this).children().each(function(){
      if ($(this).text().indexOf(token) !== -1) {
        containsToken = true;
      }
    });
    if(containsToken) {
      $(this).addClass(classToAdd);
      $(".winner").prepend("<img class='award-banner' src='http://www.dev.randjsc.com/wp-content/uploads/2016/12/Awards-FINAL.png'>");
    } 
    
  });

});*/
//
/*add_filter('body_class', 'add_acf_body_class');
 
function add_acf_body_class($class) {
    $field = get_field_object('award_winning', get_queried_object_id());
    $value = get_field('award_winning');
    $label = $field['choices'][$value];
    $class[] = $label;
    return $class;
}

//
add_filter( 'vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2 );
function custom_css_classes_for_vc_row_and_vc_column( $class_string, $tag ) {
 if ( $tag == 'vc_row' || $tag == 'vc_row_inner' ) {
   $class_string .= 'cocktail';
 }
 if ( $tag == 'vc_column' || $tag == 'vc_column_inner' ) {
  $class_string .= 'wilfredo';
 }
 return $class_string; 
}*/

// Add award banner to award-winning portfolio items
/*$( ".award-winner" )
  .closest( ".vc_gitem-zone-c" )
  .css({
      "background-color": "yellow",
      "position": "absolute",
      "position": "absolute",

    });*/

/*jQuery(document).ready(function ($) {

  console.log( "end!" );

if ($('.award-winner:contains("1")').length > 0) {
        $('.award-winner').parents('.vc_grid-item').addClass( 'award' );
        $( ".award-winner" ).parents(".vc_grid-item").prepend("<img class='award-banner' src='http://www.dev.randjsc.com/wp-content/uploads/2016/12/Awards-FINAL.png'>");
        $('.award-winner').html('');
        console.log( "true!" );
    } else {
       $(this).parents('.vc_grid-item').addClass( 'no-award' );
        console.log( "false!" );
    }
    console.log( "end!" );

});*/