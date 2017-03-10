<?php
/**
 * @package Verko
 * @subpackage Customizer
 */


if ( ! function_exists( 'df_customizer_setting_defaults' ) ) :
/**
 * The big array of global setting defaults.
 *
 * @since  1.2.0
 *
 * @return array    The default values for all theme settings.
 */
function df_customizer_setting_defaults() {
	$defaults = array(
				//Section : General
				'site_max_width' => '1200',
				'layout_site' => 'wide',
				// Section : Topbar
				'header_topbar' => 1,
				'header_topbar_bg_color' => '#283447',
				'header_topbar_txt_color' => '#ffffff',
				'header_topbar_content' => 'Welcome to Verko Theme',
				'enable_topbar_social_icon' => 1,
				// Section : Logo
				'logo' => '',
				'logo_spacing_above' => '30',
				'logo_spacing_below' => '30',
				'logo_height' => '40',
				'logo_alt' => '',
				// Section : Navbar
				'header_navbar_position' => 'left',
				'header_navbar_align' => 'align-right',
				'header_navbar_wide' => 0,
				'header_navbar_bg_color' => '#ffffff',
				'header_navbar_bg_image' => '',
				'header_navbar_bg_image_repeat' => 'no-repeat',
				'header_navbar_bg_image_pos' => 'center center',
				'header_navbar_bg_image_size' => 'auto',
				'header_navbar_bg_image_attc' => 'fixed',
				'nav_font_size' => '15',
				'header_navbar_txt_color' => '#696969',
				'header_navbar_txt_trans' => 'uppercase',
				// Section : Navbar Transparency
				'enable_navbar_transparency' => 0,
				'default_dark_light_transparency' => 'dark',
				'color_transparent_light' => '#ffffff',
				'logo_light' => '',
				'color_transparent_dark' => '#696969',
				'logo_dark' => '',
				// Section : Sticky
				'sticky_navbar_bg_color' => '#ededed',
				'sticky_navbar_txt_color' => '#616161',
				// Section : Header Miscellaneous
				'show_header_search' => 1,
				'show_offcanvas' => '0',
				// Section : Page Title
				'show_page_header_title' => 1,
				'page_header_title_align' => 'center',
				'show_page_header_breadcrumb' => 1,
				'page_header_title_bg_color' => '#f8f8f8',
				'page_header_title_txt_color' => '#000000',
				'page_header_title_height' => '240',
				'page_onload_title_animation' => 'none',
				'page_onscroll_title_animation' => 'none',
				// Section : Featured Slider
				'feat_slider' => 0,
				'slider_sc' => '', 
				// Section : Blog Layout
				'blog_layout' => 'list',
				'blog_content_list' => 'summary',
				'blog_content_grid' => 'fitrows',
				'blog_grid_col' => '2col',
				'cat_filter' => 1,
				'love_btn' => 1,
				'pagination_style' => 'prev-next',
				// Section : Single Blog
				'feat_image' => 1,
				// Section : Archive
				'archive_layout' => 'list',
				'arch_content_list' => 'summary',
				'arch_content_grid' => 'fitrows',
				'arch_grid_col' => '2col',
				// Section : Blog Share
				'blog_share' => 1,
				'fb_share' => 1,
				'twt_share' => 1,
				'gplus_share' => 1,
				'pin_share' => 1,
				'mail_share' => 0,
				'link_share' => 0,
				// Section : Content Area
				'outer_area_image_bg' => '',
				'outer_area_image_bg_repeat' => 'no-repeat',
				'outer_area_background_pos' => 'center center',
				'outer_area_background_size' => 'auto',
				'outer_area_background_attachment' => 'fixed',
				'outer_area_bg_color' => '#dbdbdb',
				'outer_area_color_opa' => '50',
				'content_area_image_bg' => '',
				'content_area_image_bg_repeat' => 'no-repeat',
				'content_area_background_pos' => 'center center',
				'content_area_background_size' => 'auto',
				'content_area_background_attachment' => 'fixed',
				'content_area_bg_color' => '#ffffff',
				'content_area_color_opa' => '100',
				'layout_content' => 'two-col-left',
				'accent_color' => '#00c1cf',
				// Section : Content Typography
				'general_font_size' => '15',
				'heading_font_color' => '#444751',
				'heading_txt_transform' => 'none',
				'heading_letter_space' => '1.25',
				'body_font_color' => '#676c7b',
				'body_letter_space' => '0.25',
				// Section : Primary Footer
				'primary_footer_widget_columns' => '0',
				'primary_footer_image_bg' => '',
				'primary_footer_image_bg_repeat' => 'no-repeat',
				'primary_footer_background_pos' => '',
				'primary_footer_background_size' => '',
				'primary_footer_background_attachment' => '',
				'primary_footer_bg_color' => '#292929',
				'primary_footer_color_opa' => '100',
				'pf_widget_title_color' => '#a78f68',
				'pf_widget_content_color' => '#ffffff',
				// Section : Copyright Footer
				'copyright_footer_image_bg' => '',
				'copyright_footer_image_bg_repeat' => '',
				'copyright_footer_background_pos' => '',
				'copyright_footer_background_size' => '',
				'copyright_footer_background_attachment' => '',
				'copyright_footer_bg_color' => '#292929',
				'copyright_footer_color_opa' => '100',
				'copyright_content' => '<p style="text-align: center; margin-bottom: 0;">Copyright © 2015 DAHZ All Rights Reserved. Verko</p>',
				'cf_text_color' => '#ffffff',
				'cf_link_color' => '#2eaee0',
				// Section : Button
				 'df_button_style' => 'flat',
				 'df_button_shape' => 'round',
				 'df_button_text_color' => '#ffffff',
				 'df_button_bg_color' => '#00c1cf',
				 'df_button_bottom_color' => '',
				 'df_button_border_color' => '#00c1cf',
				 'df_button_text_hover_color' => '#ffffff',
				 'df_button_bg_hover_color' => '#00dfce',
				 'df_button_bottom_hover_color' => '#4f4f4f',
				 'df_button_border_hover_color' => '#00dfce',
				 // Section : Site Icon
				 'fav_icon' => '',
				 'icon_touch' => '',
				 'icon_tile' => '',
				 'icon_tile_bg_color' => '#ffffff',
				 // Section : Google Analytics
				 'df_analytics_text' => '',
				 // Section : Social Connect
				 'facebook' => '#',
				 'twitter' => '#',
				 'google' => '#',
				 'youtube' => '#',
				 'vimeo' => '',
				 'instagram' => '',
				 'pinterest' => '#',
				 'dribbble' => '',
				 'linkedin' => '',
				 'rss' => '',
				 // Section : 404
				 '404_image_bg' => '',
				 '404_image_bg_repeat' => 'no-repeat',
				 '404_background_pos' => 'center center',
				 '404_background_size' => 'cover',
				 '404_background_attachment' => 'fixed',
				 '404_color_bg' => '#000000',
				 '404_color_opa' => '0',
				// Section : Page Loader
				 'df_page_loader_subtitle' => '0',
				 'df_enable_page_loader' => 0,
				 'df_page_loader_animation' => 'fadeOut',
				 'df_loading_animation_subtitle' => '',
				 'df_enable_loading_animation' => 0,
				 'df_loading_animation_style' => 'fadeOut',
				 'df_loading_animation_color' => '#000000',
				 'df_page_loader_background' => '#ffffff',
				 'df_loading_animation_img' => '',
				 // Section : Subsets
				 'custom_font_subsets' => 0,
				 'custom_font_subset_cyrillic' => 0,
				 'custom_font_subset_greek' => 0,
				 'custom_font_subset_vietnamese' => 0,
				 // Typography
				'nav_font_family' => 'Karla',
				'nav_font_weight' => '400',
				'heading_font_family' => 'Dosis',
				'heading_font_weight' => '400',
				'body_font_family' => 'Karla',
				'body_font_weight' => '400',

				// Custom CSS
				'custom_styles' => ''
	);

	return $defaults;
}
endif;

if ( ! function_exists( 'dahz_get_option_default' ) ) :
/**
 * Return a particular global option default.
 *
 * @since  1.2.0.
 *
 * @param  string    $mod    The key of the option to return.
 * @return mixed                Default value if found; false if not found.
 */
function dahz_get_default( $mod ) {
	$defaults = df_customizer_setting_defaults();
	$default  = ( isset( $defaults[ $mod ] ) ) ? $defaults[ $mod ] : false;

	/**
	 * Filter the retrieved default value.
	 *
	 * @since 2.2.0.
	 *
	 * @param mixed     $default    The default value.
	 * @param string    $option     The name of the default value.
	 */
	return apply_filters( 'dahz_customizer_get_default', $default, $mod );
}
endif;