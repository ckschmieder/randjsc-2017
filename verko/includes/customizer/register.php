<?php 

if ( ! function_exists( 'df_customizer_get_panel' ) ) :
/**
 * Get Panel Customizer
 * name 0 | title 1 | priority 2 | description 3
 * @return array
 */
function df_customizer_get_panel(){
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
endif;

/**
 * Register Theme Customizer
 */
function df_register_panel_customizer( $wp_customize ){
	if ( ! isset( $wp_customize ) ) {
		return;
	}

		$prefix  = 'df_customizer_';
		$panels  = df_customizer_get_panel();

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

function df_register_controls( $wp_customize ){

		df_register_panel_customizer( $wp_customize );

        $options_path = get_template_directory() . '/includes/customizer/option-settings';
        require( $options_path . '/variable-option.php' );
        require( $options_path . '/customizer-header-options.php' );
        require( $options_path . '/customizer-misc-options.php' );
        require( $options_path . '/customizer-content-options.php' );
        require( $options_path . '/customizer-footer-options.php' );
        require( $options_path . '/customizer-blog-options.php' );
        require( $options_path . '/customizer-button-options.php' );
        require( $options_path . '/customizer-general-options.php' );
        require( $options_path . '/customizer-customcss-options.php' );

		dahz_build_customizer( $wp_customize, $controls );

}

/* ----------------------------------------------------------------------------------- */
/* Theme Customizer JavaScript                                                         */
/* ----------------------------------------------------------------------------------- */
function df_enqueue_customizer_admin_scripts() {
		$suffix = dahz_get_min_suffix();
        wp_enqueue_script( 'df-customizer-admin', get_template_directory_uri() . '/includes/assets/js/admin/theme-customizer-control'.$suffix.'.js', array( 'jquery', 'customize-controls' ), NULL, true );
}

/* ----------------------------------------------------------------------------------- */
/* Theme Customizer Preview JavaScript                                                 */
/* ----------------------------------------------------------------------------------- */
function df_enqueue_customizer_admin_preview_scripts() {
		$suffix = dahz_get_min_suffix();
         wp_enqueue_script( 'df-customizer-preview', get_template_directory_uri() . '/includes/assets/js/admin/theme-customizer-preview'.$suffix.'.js', array( 'customize-preview' ), NULL, true );

         do_action( 'df_customizer_preview_localize' );
}