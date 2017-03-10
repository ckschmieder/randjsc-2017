<?php

if ( !defined('ABSPATH') ){
 exit;
}
/**
 * dahztheme functions and definitions
 *
 * @package dahztheme
 */
/* ------------------------------------------------------------------------------------

  TABLE OF CONTENTS

  - Global Content Width
  - Theme Setup

  ------------------------------------------------------------------------------------ */

/**
 * set grid thumb if content dynamicaly changing
 */
if( !function_exists('df_grid_content_thumb') ) :

  function df_grid_content_thumb() {

    global $df_options;

    $df_grid_col = df_options( 'blog_grid_col', dahz_get_default( 'blog_grid_col' ) );
    $content     = df_options( 'layout_content', dahz_get_default( 'layout_content' ) );
    $max         = df_options( 'site_max_width', dahz_get_default( 'site_max_width' ) ); // 1400px, 1200px, 1000px
    $m_w         = 100;
    $c_w         = 75;

    $two_col   = ( $m_w / 2 ) - 2.5;
    $three_col = ( $m_w / 3 ) - 2.5;
    $four_col  = ( $m_w / 4 ) - 2.5;
    $five_col  = ( $m_w / 5 ) - 2.5;
    $two_col_sidebar   = ( $c_w / 2 ) - 2.5;
    $three_col_sidebar = ( $c_w / 3 ) - 2.5;
    $four_col_sidebar  = ( $c_w / 4 ) - 2.5;
    $five_col_sidebar  = ( $c_w / 5 ) - 2.5;

    if ( $content == 'one-col' ) {
            switch ( $df_grid_col ) {
              case '2col':
                  $output = round ( $max * ( $two_col / 100 ) ); break;
              case '3col':
                  $output = round ( $max * ( $three_col / 100 ) ); break;
              case '4col':
                  $output = round ( $max * ( $four_col / 100 ) ); break;
              case '5col':
                  $output = round ( $max * ( $five_col / 100 ) ); break;
              default:
                  $output = round ( $max * ( $two_col / 100 ) ); break;
          }
      } else {
          switch ( $df_grid_col ) {
              case '2col':
                  $output = round ( $max * ( $two_col_sidebar / 100 ) ); break;
              case '3col':
                  $output = round ( $max * ( $three_col_sidebar / 100 ) ); break;
              case '4col':
                  $output = round ( $max * ( $four_col_sidebar / 100 ) ); break;
              case '5col':
                  $output = round ( $max * ( $five_col_sidebar / 100 ) ); break;
              default:
                  $output = round ( $max * ( $two_col_sidebar / 100 ) ); break;
          }
     }

    return $output;

 }
endif;

add_action( 'customize_save', 'df_grid_content_thumb' );

/**
 * set width if content dynamicaly changing
 */
if( !function_exists('df_composer_global_content_width') ) :

  function df_composer_global_content_width() {

    $content = df_options( 'layout_content', dahz_get_default( 'layout_content' )   );
    $max     = df_options( 'site_max_width', dahz_get_default( 'site_max_width' ) ); // 1400px, 1200px, 1000px
    $m_w     = 100 - 2.5;
    $c_w     = 75 - 2.5;

      if ( $content == 'one-col' ) {
          $output = round ( $max * ( $m_w / 100 ) );
      } else {
          $output = round ( $max * ( $c_w / 100 ) );
      }

      return $output;

  }

endif;

add_action( 'customize_save', 'df_composer_global_content_width' );

function dahztheme_content_width(){
  global $content_width;
  if ( !isset($content_width) ) {
      $content_width = df_composer_global_content_width(); /* pixels */
  }
}
add_action('template_redirect', 'dahztheme_content_width' );


if (!function_exists('dahztheme_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function dahztheme_setup() {

        // Load `dahztheme` text domain translations
        load_theme_textdomain( 'dahztheme', get_template_directory() . '/lang' );
        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style();

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /* The best thumbnail/image script ever. */
        add_theme_support( 'get-the-image' );

        // Plugin Support
        add_theme_support( 'jetpack' );
        add_theme_support( 'woocommerce' );
        add_theme_support( 'qtranslate' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
          'primary-menu' => __( 'Primary Menu', 'dahztheme' ),
          'top-menu' => __( 'Top Menu', 'dahztheme' ),
          'off-canvas-menu' => __( 'Off Canvas Menu', 'dahztheme' ),
        ) );

        if( df_options( 'header_navbar_position', dahz_get_default( 'header_navbar_position' ) ) == 'split' ){
          register_nav_menus( array(
            'split-left-menu' => __( 'Split Left Menu', 'dahztheme' ),
            'split-right-menu' => __( 'Split Right Menu', 'dahztheme' )
          ) );
        }

        /* Adds core WordPress HTML5 support. */
        add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );
       /*
       * Enable support for Post Formats.
       * See http://codex.wordpress.org/Post_Formats
       */
        add_theme_support('post-formats', array('audio', 'gallery', 'image', 'video', 'quote', 'link', 'chat', 'aside', 'status'));

        // Featured images.
        // $height_thumb = round( df_grid_content_thumb() / 1.333333333333333 );
        // add_image_size( 'dahz-large', df_composer_global_content_width(), 9999, false );
        // add_image_size( 'dahz-grid-thumb', df_grid_content_thumb(), 9999, false );
        // add_image_size( 'dahz-grid-thumb-cropped', df_grid_content_thumb(), $height_thumb, true );
        // add_image_size( 'dahz-small-thumb', 80, 80, true);

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background');
        add_theme_support('custom-header');


    }

endif; // dahztheme_setup
add_action('after_setup_theme', 'dahztheme_setup', 5);


/**
 * Registers custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function dahz_register_image_sizes() {

  /* Adds the 'dahz-large' image size. */
  $height_thumb = round( df_grid_content_thumb() / 1.333333333333333 );
  add_image_size( 'dahz-large', df_composer_global_content_width(), 9999, false );
  add_image_size( 'dahz-grid-thumb', df_grid_content_thumb(), 9999, false );
  add_image_size( 'dahz-grid-thumb-cropping', df_grid_content_thumb(), $height_thumb, true );
  add_image_size( 'dahz-small-thumb', 80, 80, true);
}
add_action( 'init', 'dahz_register_image_sizes', 5 );


if (!function_exists('df_remove_menus')) :

    function df_remove_menus() {

        remove_submenu_page( 'themes.php', 'header_image' );      // 1
        remove_submenu_page( 'themes.php', 'custom-background' ); // 2

        // Remove featured image on page
        remove_meta_box( 'postimagediv', 'page', 'side' );

    }

endif;
add_action( 'admin_head', 'df_remove_menus', 999 );

/*-----------------------------------------------------------------------------------*/
/* Check if WooCommerce is activated */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'is_woocommerce_activated' ) ) :
  function is_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
  }
endif;

/* ----------------------------------------------------------------------------------- */
/* Visual Composer Setup                                                               */
/* ----------------------------------------------------------------------------------- */

// if plugin Visual Composer is active Set WPB VC as Theme
add_action( 'vc_before_init', 'is__vcSetAsTheme' );
function is__vcSetAsTheme() {
    vc_set_as_theme(true);
    vc_disable_frontend();
}

/* ----------------------------------------------------------------------------------- */
/* Revolution Slider Setup                                                             */
/* ----------------------------------------------------------------------------------- */

// if plugin Revolution Slider is active Set RevS as Theme
if(function_exists('set_revslider_as_theme')) { set_revslider_as_theme(); }
