<?php

// Customizer General Options CSS Output
// =============================================================================
$df_layout_site		= df_options( 'layout_site', dahz_get_default( 'layout_site' ) );
$df_site_max_width  = df_options( 'site_max_width', dahz_get_default( 'site_max_width' ) );

// Customizer Header Options CSS Output
// =============================================================================
$df_header_topbar_bg_color      = df_options( 'header_topbar_bg_color', dahz_get_default( 'header_topbar_bg_color' ) );
$df_header_topbar_txt_color     = df_options( 'header_topbar_txt_color', dahz_get_default( 'header_topbar_txt_color' ) );

// navbar background color
$df_header_navbar_bg_color      = df_options( 'header_navbar_bg_color', dahz_get_default( 'header_navbar_bg_color' ) );
// image bg
$df_navbar_bg_image             = df_options( 'header_navbar_bg_image', dahz_get_default( 'header_navbar_bg_image' ) );
$df_navbar_bg_image_rep         = df_options( 'header_navbar_bg_image_repeat', dahz_get_default( 'header_navbar_bg_image_repeat' ) );
$df_navbar_bg_image_pos         = df_options( 'header_navbar_bg_image_pos', dahz_get_default( 'header_navbar_bg_image_pos' ) );
$df_navbar_bg_image_sz          = df_options( 'header_navbar_bg_image_size', dahz_get_default( 'header_navbar_bg_image_size' ) );
$df_navbar_bg_image_atc         = df_options( 'header_navbar_bg_image_attc', dahz_get_default( 'header_navbar_bg_image_attc' ) );
$df_image_navbar_bg             = ( $df_navbar_bg_image != '' ) ? 'url( ' . $df_navbar_bg_image . ' ) ' . $df_navbar_bg_image_rep . ' ' . $df_navbar_bg_image_pos : '';
$df_navbar_bg_image_size        = ( $df_navbar_bg_image != '' ) ? 'background-size: ' . $df_navbar_bg_image_sz : '';
$df_navbar_bg_image_attc        = ( $df_navbar_bg_image != '' ) ? 'background-attachment: ' . $df_navbar_bg_image_atc : '';

$df_header_navbar_txt_color     = df_options( 'header_navbar_txt_color', dahz_get_default( 'header_navbar_txt_color' ) );

$df_logo                        = df_options( 'logo', dahz_get_default( 'logo' ) );
$df_logo_height                 = df_options( 'logo_height', dahz_get_default( 'logo_height' ) );
$df_logo_spacing_above          = df_options( 'logo_spacing_above', dahz_get_default( 'logo_spacing_above' ) );
$df_logo_spacing_below          = df_options( 'logo_spacing_below', dahz_get_default( 'logo_spacing_below' ) );
$df_enable_navbar_transparency  = df_options( 'enable_navbar_transparency', dahz_get_default( 'enable_navbar_transparency' ) );
$df_dark_light_transparency     = df_options( 'default_dark_light_transparency', dahz_get_default( 'default_dark_light_transparency' ) );
$df_light_transparent_color     = df_options( 'color_transparent_light', dahz_get_default( 'color_transparent_light' ) );
$df_dark_transparent_color      = df_options( 'color_transparent_dark', dahz_get_default( 'color_transparent_dark' ) );
$df_sticky_navbar_bg_color      = df_options( 'sticky_navbar_bg_color', dahz_get_default( 'sticky_navbar_bg_color' ) );
$df_sticky_navbar_txt_color     = df_options( 'sticky_navbar_txt_color', dahz_get_default( 'sticky_navbar_txt_color' ) );

$df_navbar_position             = df_options( 'header_navbar_position', dahz_get_default( 'header_navbar_position' ) );
// navbar font style
$df_navbar_font_family          = df_options( 'nav_font_family', dahz_get_default( 'nav_font_family' ) );
$df_navbar_font_weight          = df_options( 'nav_font_weight', dahz_get_default( 'nav_font_weight' ) );
$df_navbar_font_weight_style    = ( strpos( $df_navbar_font_weight, 'italic' ) ) ? str_replace( 'italic', '', $df_navbar_font_weight ) : $df_navbar_font_weight;
$df_navbar_font_size            = df_options( 'nav_font_size', dahz_get_default( 'nav_font_size' ) );
$df_navbar_txt_trans            = df_options( 'header_navbar_txt_trans', dahz_get_default( 'header_navbar_txt_trans' ) );

// page title color
$df_page_title_txt_color        = df_options( 'page_header_title_txt_color', dahz_get_default( 'page_header_title_txt_color' ) );

// additional variable
$navbar_transparency_class      = '';

// Customizer Content Options CSS Output
// =============================================================================

// Outer Area
// image bg
$df_outer_bg_image 				= df_options( 'outer_area_image_bg', dahz_get_default( 'outer_area_image_bg' ) );
$df_outer_bg_image_rep  		= df_options( 'outer_area_image_bg_repeat', dahz_get_default( 'outer_area_image_bg_repeat' ) );
$df_outer_bg_image_pos  		= df_options( 'outer_area_background_pos', dahz_get_default( 'outer_area_background_pos' ) );
$df_outer_bg_image_sz  			= df_options( 'outer_area_background_size', dahz_get_default( 'outer_area_background_size' ) );
$df_outer_bg_image_atc 			= df_options( 'outer_area_background_attachment', dahz_get_default( 'outer_area_background_attachment' ) );

$df_image_outer_bg				= ( $df_outer_bg_image != '' ) ? 'url( ' . $df_outer_bg_image . ' ) ' . $df_outer_bg_image_rep . ' ' . $df_outer_bg_image_pos : '';
$df_outer_bg_image_size 		= ( $df_outer_bg_image != '' ) ? 'background-size: ' . $df_outer_bg_image_sz : '';
$df_outer_bg_image_attc 		= ( $df_outer_bg_image != '' ) ? 'background-attachment: ' . $df_outer_bg_image_atc : '';

// color bg
$df_outer_bg_color 				= df_options( 'outer_area_bg_color', dahz_get_default( 'outer_area_bg_color' ) );
$df_outer_opa_color 			= df_options( 'outer_area_color_opa', dahz_get_default( 'outer_area_color_opa' ) );
$df_outer_bg_rgba       		= ( $df_outer_bg_color != '' ) ? df_convert_rgba( $df_outer_bg_color, $df_outer_opa_color ) : '';

// Content Area
$df_content_bg_image			= df_options( 'content_area_image_bg', dahz_get_default( 'content_area_image_bg' ) );
$df_content_bg_image_rep  		= df_options( 'content_area_image_bg_repeat', dahz_get_default( 'content_area_image_bg_repeat' ) );
$df_content_bg_image_pos  		= df_options( 'content_area_background_pos', dahz_get_default( 'content_area_background_pos' ) );
$df_content_bg_image_sz  		= df_options( 'content_area_background_size', dahz_get_default( 'content_area_background_size' ) );
$df_content_bg_image_atc  		= df_options( 'content_area_background_attachment', dahz_get_default( 'content_area_background_attachment' ) );
$df_image_content_bg			= ( $df_content_bg_image != '' ) ? 'url( ' . $df_content_bg_image . ' ) ' . $df_content_bg_image_rep . ' ' . $df_content_bg_image_pos : '';
$df_content_bg_image_size 		= ( $df_content_bg_image != '' ) ? 'background-size: ' . $df_content_bg_image_sz : '';
$df_content_bg_image_attc		= ( $df_content_bg_image != '' ) ? 'background-attachment: ' . $df_content_bg_image_atc : '';

// color bg
$df_content_bg_color 			= df_options( 'content_area_bg_color', dahz_get_default( 'content_area_bg_color' ) );
$df_content_opa_color 			= df_options( 'content_area_color_opa', dahz_get_default( 'content_area_color_opa' ) );
$df_content_bg_rgba     		= ( $df_content_bg_color != '' ) ? df_convert_rgba( $df_content_bg_color, $df_content_opa_color ) : '';

// Accent Color
$df_accent_color 				= df_options( 'accent_color', dahz_get_default( 'accent_color' ) );
$df_accent_color_hover			= df_convert_rgba( $df_accent_color, 80 );

// Typography
$df_general_font_size 			= df_options( 'general_font_size', dahz_get_default( 'general_font_size' ) );

// Body Typography
$df_body_font_family 			= df_options( 'body_font_family', dahz_get_default( 'body_font_family' ) );
$df_body_font_color 			= df_options( 'body_font_color', dahz_get_default( 'body_font_color' ) );
$df_body_font_weight 			= df_options( 'body_font_weight', dahz_get_default( 'body_font_weight' ) );
$df_body_font_weight_style		= ( strpos( $df_body_font_weight, 'italic' ) ) ? str_replace( 'italic', '', $df_body_font_weight ) : $df_body_font_weight;
$df_body_ltr_space 				= df_options( 'body_letter_space', dahz_get_default( 'body_letter_space' ) );

// Heading Typography
$df_heading_font_family			= df_options( 'heading_font_family', dahz_get_default( 'heading_font_family' ) );
$df_heading_font_color 			= df_options( 'heading_font_color', dahz_get_default( 'heading_font_color' ) );
$df_heading_font_weight			= df_options( 'heading_font_weight', dahz_get_default( 'heading_font_weight' ) );
$df_heading_font_weight_style 	= ( strpos( $df_heading_font_weight, 'italic' ) ) ? str_replace( 'italic', '', $df_heading_font_weight ) : $df_heading_font_weight;
$df_heading_txt_trans 			= df_options( 'heading_txt_transform', dahz_get_default( 'heading_txt_transform' ) );
$df_heading_ltr_space 			= df_options( 'heading_letter_space', dahz_get_default( 'heading_letter_space' ) );

// ajax search top
$header_search 					= df_options( 'show_header_search', dahz_get_default( 'show_header_search' ) );
$show_header_search 			= $header_search == 1;

// Customizer Button Options CSS Output
// =============================================================================
$df_btn_style    			= df_options( 'df_button_style', dahz_get_default( 'df_button_style' ) );
// color
$df_btn_text_color			= df_options( 'df_button_text_color', dahz_get_default( 'df_button_text_color' ) );
$df_btn_bg_color			= df_options( 'df_button_bg_color', dahz_get_default( 'df_button_bg_color' ) );
$df_btn_bottom_color		= df_options( 'df_button_bottom_color', dahz_get_default( 'df_button_bottom_color' ) );
$df_btn_border_color		= df_options( 'df_button_border_color', dahz_get_default( 'df_button_border_color' ) );
// color hover
$df_btn_text_color_hover	= df_options( 'df_button_text_hover_color', dahz_get_default( 'df_button_text_hover_color' ) );
$df_btn_bg_color_hover		= df_options( 'df_button_bg_hover_color', dahz_get_default( 'df_button_bg_hover_color' ) );
$df_btn_bottom_hover_color	= df_options( 'df_button_bottom_hover_color', dahz_get_default( 'df_button_bottom_hover_color' ) );
$df_btn_border_color_hover	= df_options( 'df_button_border_hover_color', dahz_get_default( 'df_button_border_hover_color' ) );

$pagination_switcher    	= df_options( 'pagination_style', dahz_get_default( 'pagination_style' ) );

// Customizer Footer Options CSS Output
// =============================================================================
// 1. Primary Footer Variables
// bg image
$df_pf_bg_image				= df_options( 'primary_footer_image_bg', dahz_get_default( 'primary_footer_image_bg' ) );
$df_pf_bg_image_pos			= df_options( 'primary_footer_background_pos', dahz_get_default( 'primary_footer_background_pos' ) );
$df_pf_bg_image_rep			= df_options( 'primary_footer_image_bg_repeat', dahz_get_default( 'primary_footer_image_bg_repeat' ) );
$df_pf_bg_repeat			= $df_pf_bg_image_pos . ' ' . $df_pf_bg_image_rep;
$df_pf_bg_size				= df_options( 'primary_footer_background_size', dahz_get_default( 'primary_footer_background_size' ) );
$df_pf_bg_attch				= df_options( 'primary_footer_background_attachment', dahz_get_default( 'primary_footer_background_attachment' ) );
// bg color
$df_pf_bg_color    			= df_options( 'primary_footer_bg_color', dahz_get_default( 'primary_footer_bg_color' ) );
$df_pf_bg_opacity  			= df_options( 'primary_footer_color_opa', dahz_get_default( 'primary_footer_color_opa' ) );
$df_pf_bg_rgba     			= df_convert_rgba( $df_pf_bg_color, $df_pf_bg_opacity );
// widget color
$df_pf_widget_title_color	= df_options( 'pf_widget_title_color', dahz_get_default( 'pf_widget_title_color' ) );
$df_pf_widget_content_color	= df_options( 'pf_widget_content_color', dahz_get_default( 'pf_widget_content_color' ) );

// 2. Copyright Footer Variables
// bg image
$df_cf_bg_image				= df_options( 'copyright_footer_image_bg', dahz_get_default( 'copyright_footer_image_bg' ) );
$df_cf_bg_image_pos			= df_options( 'copyright_footer_background_pos', dahz_get_default( 'copyright_footer_background_pos' ) );
$df_cf_bg_image_rep			= df_options( 'copyright_footer_image_bg_repeat', dahz_get_default( 'copyright_footer_image_bg_repeat' ) );
$df_cf_bg_repeat			= $df_cf_bg_image_pos . ' ' . $df_cf_bg_image_rep;
$df_cf_bg_size				= df_options( 'copyright_footer_background_size', dahz_get_default( 'copyright_footer_background_size' ) );
$df_cf_bg_attch				= df_options( 'copyright_footer_background_attachment', dahz_get_default( 'copyright_footer_background_attachment' ) );
// bg color
$df_cf_bg_color    			= df_options( 'copyright_footer_bg_color', dahz_get_default( 'copyright_footer_bg_color' ) );
$df_cf_bg_opacity  			= df_options( 'copyright_footer_color_opa', dahz_get_default( 'copyright_footer_color_opa' ) );
$df_cf_bg_rgba     			= df_convert_rgba( $df_cf_bg_color, $df_cf_bg_opacity );
// text color
$df_cf_text_color			= df_options( 'cf_text_color', dahz_get_default( 'cf_text_color' ) );
$df_cf_link_color			= df_options( 'cf_link_color', dahz_get_default( 'cf_link_color' ) );
$df_cf_link_color_hover		= df_convert_rgba( $df_cf_link_color, 80);

// Customizer Misc Options CSS Output
// =============================================================================
// 404 Background
// bg color
$df_404_bg_color              = df_options( '404_color_bg', dahz_get_default( '404_color_bg' ) );
$df_404_bg_opacity         	  = df_options( '404_color_opa', dahz_get_default( '404_color_opa' ) );
$df_404_bg_rgba            	  = df_convert_rgba( $df_404_bg_color, $df_404_bg_opacity );
// bg image
$df_404_bg_image          	  = df_options( '404_image_bg', dahz_get_default( '404_image_bg' ) );
$df_404_bg_att                = df_options( '404_background_attachment', dahz_get_default( '404_background_attachment' ) );
$df_404_bg_size               = df_options( '404_background_size', dahz_get_default( '404_background_size' ) );
$df_404_bg_pos                = df_options( '404_background_pos', dahz_get_default( '404_background_pos' ) );
$df_404_bg_rep                = df_options( '404_image_bg_repeat', dahz_get_default( '404_image_bg_repeat' ) );
$df_404_bg_repeat_options     = $df_404_bg_pos . ' ' . $df_404_bg_rep;

// page loader
$page_loader 				  = df_options( 'df_enable_page_loader', dahz_get_default( 'df_enable_page_loader' ) );
$page_loader_bg_color 		  = df_options( 'df_page_loader_background', dahz_get_default( 'df_page_loader_background' ) );