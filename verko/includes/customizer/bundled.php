<?php
/**
 * 
 * @package Verko
 */

add_action( 'after_setup_theme', 'df_load_customizer_init', 0 );
function df_load_customizer_init(){
	$dir_path = get_template_directory() . '/includes/customizer';

	require $dir_path . '/typography.php';
	require $dir_path . '/defaults.php';
	require $dir_path . '/interface.php';
	require $dir_path . '/register.php';
	require $dir_path . '/theme-customizer-output.php';

	add_action( 'customize_register', 'dahz_customizer_register_autoload', 1 );
	add_action( 'customize_register', 'df_customizer_typography', 105 );
	add_action( 'customize_register', 'df_register_controls', 100 );
	add_action( 'customize_controls_enqueue_scripts', 'df_enqueue_customizer_admin_scripts' );
	add_action( 'customize_preview_init', 'df_enqueue_customizer_admin_preview_scripts' );
}

add_action( 'customize_register', 'df_add_remove_customizer_sections' );
/**
* dahz_remove_customizer_sections
*
* Remove Unused Native Sections
*
* @param $wp_manager
* @return void
*
*/
function df_add_remove_customizer_sections( $wp_customize ) {

		/* Remove Sections */
        $wp_customize->remove_section( 'add_menu' );
        $wp_customize->remove_section( 'menu_locations' );
        $wp_customize->remove_section( 'colors' );
        $wp_customize->remove_section( 'title_tagline' );
        $wp_customize->remove_section( 'background_image' );
        $wp_customize->remove_section( 'static_front_page' );
        $wp_customize->remove_section( 'header_image' );
        $wp_customize->remove_section( 'themes' );

        $menus = wp_get_nav_menus();
        foreach ( $menus as $menu ) {
            $menu_id = $menu->term_id;
            $section_id = 'nav_menu[' . $menu_id . ']';
            $wp_customize->remove_section( $section_id );
        }

	}