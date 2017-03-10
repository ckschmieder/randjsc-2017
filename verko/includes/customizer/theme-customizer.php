<?php

if (!defined('ABSPATH')) {
	exit;
}

/* =============================================================
* TABLE OF CONTENTS - INCLUDES/ADMIN/THEME-CUSTOMIZER.PHP
*
* - __construct
* - Initialize Output Theme Mods
* - Remove Unused Native Section
* - Customizer Manager Init
*
================================================================ */

class DF_theme_customizer {

	static $instance;

	public $prefix = 'df_customizer_';
	private $suffix;

	public function __construct () {
    self::$instance =& $this;

		$this->suffix = dahz_get_min_suffix();

  		add_action( 'after_setup_theme', array( $this, '_load_customizer' ) );
  }


	function _load_customizer(){
		$dir_path = THEME_DIR . '/includes/customizer';

		require_once $dir_path . '/typography.php';
		require_once $dir_path . '/defaults.php';

		add_action( 'customize_register', 'df_customizer_typography' );
		add_action( 'customize_register', array( $this, 'df_register_theme_customizer'  ) );
		add_action( 'customize_register', array( $this, 'df_add_remove_customizer_sections' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'df_enqueue_customizer_admin_scripts' ) );
		add_action( 'customize_preview_init', array( $this, 'df_enqueue_customizer_admin_preview_scripts' ) );
	}


	/**
	 * Get Panel Customizer
	 * name 0 | title 1 | priority 2 | description 3
	 * @return array
	 */
	private function customizer_get_panel(){
		$panels = array(
			'header'  => array( 'header_panel', 'Header', 10, 'sections' => array(
						// Panel: Header
						/* Section : Topbar */
						'topbar' => array( 'topbar_section', _x('Topbar', 'backend customizer', 'backend_dahztheme'),  5),
						/* Section : Logo Setting */
						'logo' => array( 'logo_section', _x('Logo', 'backend customizer', 'backend_dahztheme'),  10),
						/* Section : Navbar */
						'navbar' => array( 'navbar_section', _x('Navbar', 'backend customizer', 'backend_dahztheme'),  15),
						/* Section : Navbar Transparency */
						'navbar_transparency' => array( 'navbar_transparency_section', _x('Transparency', 'backend customizer', 'backend_dahztheme'),  20),
						/* Section : Sticky */
						'navbar_sticky' => array( 'navbar_sticky_section', _x('Sticky', 'backend customizer', 'backend_dahztheme'),  25),
						/* Section : Miscellaneous */
						'navbar_miscellaneous_section' => array( 'navbar_miscellaneous_section', _x('Miscellaneous', 'backend customizer', 'backend_dahztheme'),  30),
						/* Section : Page Title */
						'pagetitle' => array( 'pagetitle_section', _x('Page Title', 'backend customizer', 'backend_dahztheme'),  35)
						),
						 _x( 'Header is first impression of your website here you can customize the whole part of header area.', 'backend customizer', 'backend_dahztheme' )
			),
			'content' => array( 'content_panel', 'Content', 20, 'sections' => array(
						// Panel: Content
						/* Section : Outer Area */
						'outer_area' => array( 'outer_area_section', _x('Outer Area', 'backend customizer','backend_dahztheme'), 0),
						/* Section : Content Area */
						'content_area' => array( 'content_area_section',  _x('Content Area', 'backend customizer','backend_dahztheme'),  10),
						/* Section : Typography */
						'typo' => array( 'typo_section',  _x('Typography', 'backend customizer','backend_dahztheme'), 20)
						),
						 _x( 'Customize your typography and the outer & content area which includes background image, color, and sidebar layout.', 'backend customizer', 'backend_dahztheme' )
			),
			'footer' => array( 'footer_panel', 'Footer', 30, 'sections' => array(
						// Panel: Footer
						/* Section : Widget Footer */
						'primary' => array( 'primary_section', _x('Primary Footer', 'backend customizer', 'backend_dahztheme'),  5),
						/* Section : Copyright Footer */
						'copyright' => array( 'copyright_section', _x('Copyright Footer', 'backend customizer', 'backend_dahztheme'),  10)
						),
					  _x( 'Footer refers to the bottom section that contains information copyright notices, links to privacy policy, credits and widgetized area with multiple columns that you can use to add widgets.', 'backend customizer', 'backend_dahztheme' )
			),
			'blog' => array( 'blog_panel', 'Blog', 50, 'sections' => array(
						// Panel: Blog
						/* Section : Featured Slider */
						'featslider' => array( 'featslider_section', _x('Featured Slider', 'backend customizer', 'backend_dahztheme'),  0),
						/* Section : Layout */
						'layout' => array( 'layout_section', _x('Layout', 'backend customizer', 'backend_dahztheme'),  10),
						/* Section : Single Blog */
						'singleblog' => array( 'singleblog_section', _x('Single Blog', 'backend customizer', 'backend_dahztheme'), 20),
						/* Section : Archive */
						'archive' => array( 'archive_section', _x('Archive', 'backend customizer', 'backend_dahztheme'),  30),
						/* Section : Share */
						'share' => array( 'share_section', _x('Share', 'backend customizer', 'backend_dahztheme'), 40)
						),
						 _x( 'Customize your blog appearance, including layout, pagination style, featured slider, archive and sharing options.', 'backend customizer', 'backend_dahztheme' )
			),
			'misc' => array( 'misc_panel', 'Misc', 60, 'sections' => array(
						// Panel: Misc
						/* Favicon */
						'site_icon' => array( 'site_icon_section', _x('Site Icon', 'backend customizer', 'backend_dahztheme'),  5),
						/* Google Analytics */
						'google_analytics' => array( 'google_analytics_section', _x('Google Analytics', 'backend customizer', 'backend_dahztheme'),  10),
						/* Social Connects */
						'social_connect' => array( 'social_connect_section', _x('Social Connect', 'backend customizer', 'backend_dahztheme'),  15),
						/* 404 */
						'404' => array( '404_section', _x('404', 'backend customizer', 'backend_dahztheme'), 20),
						/* Page Loader */
						'page_loader' => array( 'page_loader_section', _x('Page Loader', 'backend customizer', 'backend_dahztheme'),  25),
						/* Font Subsets */
						'font_subset' => array( 'font_subset_section', _x('Font Subset', 'backend customizer', 'backend_dahztheme'),  30)
						),
						 _x( 'Misc is additional configuration which includes site icon, google analytics, social media URLs, 404 page, page loader and font subset.', 'backend customizer', 'backend_dahztheme' )
			)
		);

		return apply_filters( 'create_customizer_panels', $panels );
	}

	/**
	 * Register Theme Customizer
	 */
	public function df_register_theme_customizer( $wp_customize ){
		if ( ! isset( $wp_customize ) ) {
			return;
		}

			$prefix  = $this->prefix;
			$panels  = $this->customizer_get_panel();

			/* Section : Screen Layout Mode */
			$wp_customize->add_section( $prefix . 'general_section', array('title' => _x('General', 'backend customizer','backend_dahztheme'), 'priority' => 0 ) );
			/* Section : Button Mode */
			$wp_customize->add_section( $prefix . 'button_section', array('title' => _x('Button', 'backend customizer','backend_dahztheme'), 'priority' => 40 ) );
			/* Section : Custom CSS */
			$wp_customize->add_section( $prefix . 'custom_style_section', array('title' => _x('Custom CSS', 'backend customizer', 'dahztheme'), 'priority' => 1000 ) );

			// Tier 1 : Add Panel
			foreach ( $panels as $panel ) {

				$wp_customize->add_panel( $prefix . $panel[0], array(
					'title' => $panel[1],
					'priority' => $panel[2],
					'description' => $panel[3]
				) );
				// Tier 2 : Add Section
				foreach ( $panel['sections'] as $section ) {
					$wp_customize->add_section(	$prefix . $section[0],	array(
							'title'			=> $section[1],
							'priority'  => $section[2],
							'panel'			=> $prefix . $panel[0]
						)
					);
				}
			}

	}
	/**
	* dahz_remove_customizer_sections
	*
	* Remove Unused Native Sections
	*
	* @param $wp_manager
	* @return void
	*
	*/
	public function df_add_remove_customizer_sections( $wp_manager ) {

		/* Remove Sections */
        $wp_manager->remove_section( 'add_menu' );
        $wp_manager->remove_section( 'menu_locations' );
        $wp_manager->remove_section( 'colors' );
        $wp_manager->remove_section( 'title_tagline' );
        $wp_manager->remove_section( 'background_image' );
        $wp_manager->remove_section( 'static_front_page' );
        $wp_manager->remove_section( 'header_image' );
        $wp_manager->remove_section( 'themes' );

        $menus = wp_get_nav_menus();
        foreach ( $menus as $menu ) {
            $menu_id = $menu->term_id;
            $section_id = 'nav_menu[' . $menu_id . ']';
            $wp_manager->remove_section( $section_id );
        }

	}

	/* ----------------------------------------------------------------------------------- */
	/* Theme Customizer JavaScript                                                         */
	/* ----------------------------------------------------------------------------------- */
	public function df_enqueue_customizer_admin_scripts() {
	        wp_enqueue_script( 'df-customizer-admin', get_template_directory_uri() . '/includes/assets/js/admin/theme-customizer-control'.$this->suffix.'.js', array( 'jquery', 'customize-controls' ), NULL, true );
	}

	/* ----------------------------------------------------------------------------------- */
	/* Theme Customizer Preview JavaScript                                                 */
	/* ----------------------------------------------------------------------------------- */
	public function df_enqueue_customizer_admin_preview_scripts() {
	         wp_enqueue_script( 'df-customizer-preview', get_template_directory_uri() . '/includes/assets/js/admin/theme-customizer-preview'.$this->suffix.'.js', array( 'customize-preview' ), NULL, true );

	         do_action( 'df_customizer_preview_localize' );
	}


}
new DF_theme_customizer;
