<?php
/**
 * Contains checks to see if plugins are active and then loads logic accordingly
 */
if ( ! defined( 'ABSPATH' ) ) {
 exit;
}
/* ----------------------------------------------------------------------------------- */
/* Load all files in extensions folder.                                                  */
/* ----------------------------------------------------------------------------------- */
/**
 * Checks if plugins are activated and loads logic accordingly
 * @uses  class_exists() detect if a class exists
 * @uses  function_exists() detect if a function exists
 * @uses  defined() detect if a constant is defined
 */
function theme_extensions_setup() {

	/**
	 * TGMPA
	 * @link https://github.com/thomasgriffin/TGM-Plugin-Activation
	 */
	if( ! class_exists('TGM_Plugin_Activation')) {
		require_once( get_template_directory() . '/includes/admin/extensions/tgmpa/class-tgm-plugin-activation.php' );
		require_once( get_template_directory() . '/includes/admin/extensions/tgmpa/register-plugin.php' );
	}

	/**
	 * Mega Menu 
	 */
	if( ! class_exists('Df_Mega_Menu')) {
		require_once( get_template_directory() . '/includes/admin/extensions/mega-menu/custom-menu-admin.class.php' );
	}

	/**
	 * Metabox 
	 */
	if( class_exists( 'RW_Meta_Box' ) ){
		require_once( get_template_directory() . '/includes/admin/extensions/meta-box/config-meta-boxes.php' );
	}

}
add_action( 'after_setup_theme', 'theme_extensions_setup' );