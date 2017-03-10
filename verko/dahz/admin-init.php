<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Dahz Framework - A WordPress theme development framework.
 * @package   DahzFramework
 * @version   2.2.0
 * @author    Dahz
 * @copyright Copyright (c) 2015, Dahz
 */

class Dahz {

  public function __construct()
  {
    $this->constants();
    $this->functions();
    add_action( 'after_setup_theme', array( $this, 'customizer' ), -95 );
    add_action( 'after_setup_theme', array( $this, 'admin_screen' ), 100 );
    add_action( 'dahz_theme_activate', array( $this, 'dahz_redirect_after_activate' ), 10 );
    add_action( 'admin_enqueue_scripts', array( $this, 'dahz_menu_styles' ) );
  }

  /**
   * Defines the constant paths for use within the core framework, parent theme, and child theme.
   * Constants prefixed with 'DF_' are for use only within the core framework and don't
   * reference other areas of the parent or child theme.
   *
   * @since 1.0.0
   * @return void
   */
  public function constants() {

    /* Sets the framework version number. */
    define( 'DF_VERSION', '2.2.0' );

    /* Sets the path to the parent theme directory. */
    define( 'THEME_DIR', get_template_directory() );

    /* Sets the path to the parent theme directory URI. */
    define( 'THEME_URI', get_template_directory_uri() );

    /* Sets the path to the child theme directory. */
    define( 'CHILD_THEME_DIR', get_stylesheet_directory());

    /* Sets the path to the child theme directory URI. */
    define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );

    /* Sets the path to the core framework directory. */
    define( 'DF_CORE_DIR', trailingslashit( trailingslashit( get_template_directory() ) . 'dahz' ) );

    /* Sets the path to the core framework directory URI. */
    define( 'DF_CORE_URI', trailingslashit( trailingslashit( get_template_directory_uri() ) . 'dahz' ) );

    define( 'DF_CUSTOMIZER_CONTROL_DIR', trailingslashit( trailingslashit( DF_CORE_DIR ) . 'customizer' ));

    /* Sets the path to the core framework extensions directory. */
    define( 'DF_EXTENSION_DIR', trailingslashit( trailingslashit( DF_CORE_DIR ) . 'extensions' ));

    /* Sets the path to the core framework functions directory. */
    define( 'DF_FUNCTION_DIR', trailingslashit( trailingslashit( DF_CORE_DIR ) . 'functions' ));

    /* Sets the path to the core framework CSS directory URI. */
    define( 'DF_CORE_CSS_DIR', trailingslashit( trailingslashit( DF_CORE_URI ) . 'css' ));

    /* Sets the path to the core framework JavaScript directory URI. */
    define( 'DF_CORE_JS_DIR', trailingslashit( trailingslashit( DF_CORE_URI ) . 'js' ));

    /* Sets the path to the core framework images directory URI. */
    define( 'DF_CORE_IMG_DIR', trailingslashit( trailingslashit( DF_CORE_URI ) . 'images' ));

  }

  /**
   * Load core functions
   * @since 1.0.0
   * @return void
   */
  public function functions(){

    require_once DF_FUNCTION_DIR . 'basic.php';
    require_once DF_FUNCTION_DIR . 'data-head.php';
    require_once DF_FUNCTION_DIR . 'attr.php';
    require_once DF_FUNCTION_DIR . 'post-formats.php';
    require_once DF_FUNCTION_DIR . 'template.php';
    require_once DF_FUNCTION_DIR . 'pagination.php';
    require_once DF_FUNCTION_DIR . 'breadcrumbs.php';
    require_once DF_FUNCTION_DIR . 'deprecated.php';

    require_once DF_EXTENSION_DIR . 'aqua-resizer.php';
    require_once DF_EXTENSION_DIR . 'get-the-image.php';

  }

  /**
   * loads customizer library custom controls
   * @return void
   */
  public function customizer() {

    require_once DF_CUSTOMIZER_CONTROL_DIR . 'googlefont-array.php';
    //require_once DF_CUSTOMIZER_CONTROL_DIR . 'interface.php';
    require_once DF_CUSTOMIZER_CONTROL_DIR . 'sanitization.php';
    require_once DF_CUSTOMIZER_CONTROL_DIR . 'setup.php';
    /* Backup Import / Export */
    require_once DF_CUSTOMIZER_CONTROL_DIR . 'backup.php';

  }

  /**
   * branding admin screen
   * @return void
   */
  public function admin_screen() {

    if ( is_admin() && !is_customize_preview() ) {
          require_once DF_CORE_DIR . 'screen/dahz-screen-admin-base.php';
          require_once DF_CORE_DIR . 'screen/dahz-screen-home.php';
          require_once DF_CORE_DIR . 'screen/dahz-screen-addons.php';
          require_once DF_CORE_DIR . 'screen/dahz-screen-backup.php';
    }

  }

  /**
   * Hooked onto "dahz_theme_activate" at priority 10.
   * @since  2.0.0
   * @return void
   */
  public function dahz_redirect_after_activate() {
    header( 'Location: ' . admin_url( esc_url_raw( 'admin.php?page=dahzframework&activated=true' ) ) );
  } // End dahz_redirect_after_activate()

  /**
   * Enqueue menu.css.
   * Used to control the display of DahzFramework menu items across the dashboard
   * @since  2.0.0
   * @return void
   */
  public function dahz_menu_styles() {
    if( is_customize_preview() ) return;
    $token = 'dahz';

    wp_register_style( $token . '-menu', esc_url( DF_CORE_CSS_DIR . 'menu.css' ), array(), DF_VERSION );
    wp_enqueue_style( $token . '-menu' );
  }
}
