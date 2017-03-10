<?php
if ( ! class_exists( 'DF_part_layout' ) ) :
/**
* Part Layout Actions
*
*
* @package      Verko
* @subpackage   classes
* @since        1.0
* @author       Dahz
* @copyright    Copyright (c) 2015, Dahz
* @license      http://www.gnu.org/licenses/gpl.html
*/

class DF_part_layout{
    static $instance;

    function __construct(){
    self::$instance =& $this;

      add_action( 'wp', array( $this, 'df_set_layout_hooks') );
    }

    function df_set_layout_hooks(){
      add_filter( 'body_class', array( $this, 'df_layout_content_class'), 10 );

      // modify existing HTML attribute functions and filters
      add_filter( 'dahz_attr_content', array( $this, 'set_main_content_filter_class') );
      add_filter( 'dahz_attr_sidebar', array( $this, 'set_sidebar_content_filter_class') );
    }

    /**
    * Determine what layout to use
    *
    *
    * @package Verko
    * @since 1.0
    */
    public static function df_get_layout_content_class() {

        if( is_404() ) return;

        $opt_layout_content = df_options( 'layout_content', dahz_get_default( 'layout_content' ) );
        $meta_layout_content = get_post_meta( get_the_ID(), 'df_metabox_layout_content', true );

        // Set default global layout
        $layout = 'two-col-left';
        if ( '' != $opt_layout_content ) {
            $layout = $opt_layout_content;
        }

        // Single post layout
        if ( is_singular() ) {
            // Get layout setting from single post Custom Settings panel
            if ( '' != $meta_layout_content ) {
                $layout = $meta_layout_content;
            }
        }

        return $layout;
    }

    /**
    * callback to body_class
    *
    *
    * @package Verko
    * @since 1.0
    */
    function df_layout_content_class( $classes ) {
        $classes[] = self::df_get_layout_content_class();
        return $classes;
    }

    /**
    * callback to dahz_attr_content
    *
    * @package Verko
    * @since 1.0
    */
    function set_main_content_filter_class( $attr ){

        $get_layout = self::df_get_layout_content_class();
        $output = array( 'df-main', 'col-full' );

        if( $get_layout === 'two-col-right' ){
             $output[] = 'df_span-sm-9 df_span-sm-push-3';
        } elseif( $get_layout === 'two-col-left' ) {
             $output[] = 'df_span-sm-9';
        } else {
             $output[] = 'df_span-sm-12';
        }

        $attr['class'] = esc_attr( implode ( " ", $output ) );

        return $attr;
    }

    /**
    * callback to dahz_attr_sidebar
    *
    * @package Verko
    * @since 1.0
    */
    function set_sidebar_content_filter_class( $attr ){

        $get_layout = self::df_get_layout_content_class();
        $output = array( 'df-sidebar' );

        if( $get_layout === 'two-col-right'){
             $output[] = 'df_span-sm-3 df_span-sm-pull-9';
        } elseif( $get_layout === 'two-col-left' ) {
             $output[] = 'df_span-sm-3';
        }

        $attr['class'] = esc_attr( implode( " ", $output ) );

        return $attr;
    }

    }// end of class
endif;
new DF_part_layout;

if ( ! function_exists( 'df_layout_content' ) ) :
/**
 * content layout
 * @see DF_part_layout::df_get_layout_content_class
 * @since 1.2.0
 */
function df_layout_content(){
  $content = DF_part_layout::df_get_layout_content_class();
  return $content;
}
endif;
