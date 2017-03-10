<?php
/**
 * Customizer setup
 * @package Dahz
 * @subpackage Customizer
 */

 global $pagenow;
 if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {

   // Flush rewrite rules.
  add_action( 'admin_head', 'dahz_flush_rewriterules', 9 );

  do_action('dahz_theme_activate');
 }

if( ! function_exists( 'dahz_flush_rewriterules' ) ) :
/**
* Flush the WordPress rewrite rules to refresh permalinks with updated rewrite rules.
* @since  1.0.0
* @return void
*/
function dahz_flush_rewriterules() {
  flush_rewrite_rules();
} // End dahz_flush_rewriterules()
endif;

add_action( 'admin_menu', 'dahz_unset_customizer_admin_menu' );
/**
 *
 */
 function dahz_unset_customizer_admin_menu(){
    global $submenu;
    unset($submenu['themes.php'][6]); // remove customize link
 }

add_action( 'dahz_screen_menu', 'dahz_register_customizer_admin_menu' );
/**
 * @return void
 */
 function dahz_register_customizer_admin_menu(){
    add_submenu_page( 'dahzframework', 'Customize', 'Customize', 'edit_theme_options', 'customize.php', NULL );
 }

if( ! function_exists( 'df_options' ) ) :
/**
 * Global Get Option Customizer
 * Store settings value with df_options[theme_settings].
 * Get theme’s settings from database with df_options('theme_settings').
 *
 * @param  string  $name
 * @param  boolean $default
 * @return mixed
 */
function df_options( $name, $default = false ) {
    // get the meta from the database
    $options = ( get_option( 'df_options' ) ) ? get_option( 'df_options' ) : null;
    // return the option if it exists
    if ( isset( $options[ $name ] ) ) {
      return apply_filters( 'df_options_$name', $options[ $name ] );
    }
    // return default if nothing else
    return apply_filters( 'df_options_$name', $default );
}
endif;

add_action( 'customize_controls_enqueue_scripts', 'dahz_customize_control_register_scripts' );
if( ! function_exists( 'dahz_customize_control_register_scripts' ) ) :
/**
* get style and script
* @author Dahz
* @since  1.5.0
*/
function dahz_customize_control_register_scripts() {
    $suffix = dahz_get_min_suffix();
    wp_enqueue_style( 'dahz-customizer', DF_CORE_CSS_DIR . 'dahz-customizer'. $suffix .'.css' );
    //HOOK
    do_action('dahz_enqueue_customizer_admin');

    wp_enqueue_script('dahz-customizer-main', DF_CORE_JS_DIR . 'customizer-main'. $suffix .'.js', array( 'customize-controls' ), false, true );
}
endif;

add_action( 'customize_controls_enqueue_scripts', 'dahz_api_controls_customizer_script', 0 );
/**
 * API custom control JS interface
 * @author Dahz
 * @since  1.5.0
 * @return void
 */
function dahz_api_controls_customizer_script()
{
    $suffix = dahz_get_min_suffix();
    wp_register_script( 'dahz-api-controls', DF_CORE_JS_DIR . 'api-controls'. $suffix .'.js', array( 'customize-controls' ), false, true );
}
