<?php
if (!defined('ABSPATH')) {
  exit;
}

$topbar_section = 'df_customizer_topbar_section';
$logo_section   = 'df_customizer_logo_section';
$navbar_section = 'df_customizer_navbar_section';
$pagetitle_section = 'df_customizer_pagetitle_section';
// Section : Topbar
$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'header_topbar',
           'label'    => _x( 'Topbar', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $topbar_section,
           'priority' => 5,
           'transport'=> 'postMessage'
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'header_topbar_bg_color',
           'label'    => _x( 'Bg Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $topbar_section,
           'priority' => 10,
           'transport'=> 'postMessage'
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'header_topbar_txt_color',
           'label'    => _x( 'Text color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $topbar_section,
           'priority' => 15,
           'transport'=> 'postMessage'
         );

$controls[] = array(
           'type'     => 'textarea',
           'setting'  => 'header_topbar_content',
           'label'    => _x( 'Custom Welcome Text', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $topbar_section,
           'priority' => 20,
           'transport'=> 'postMessage'
         );

$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'enable_topbar_social_icon',
           'label'    => _x( 'Social Icon', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $topbar_section,
           'priority' => 25,
           'transport'=> 'postMessage'
         );

// Section : Logo
$controls[] = array(
           'type'     => 'uploader',
           'setting'  => 'logo',
           'label'    => _x( 'Custom Logo', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $logo_section,
           'priority' => 5,
         );
$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'logo_spacing_above',
           'label'    => _x( 'Spacing above the logo', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $logo_section,
           'input_attrs'  => array(
                            'min' => '0',
                            'max' => '100',
                            'step' => '1'
                         ),
           'priority' => 10,
           'transport'=> 'postMessage'
         );
$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'logo_spacing_below',
           'label'    => _x( 'Spacing below the logo', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $logo_section,
           'input_attrs'  => array(
            'min' => '0',
            'max' => '100',
            'step' => '1'
            ),
           'priority' => 15,
           'transport'=> 'postMessage'
         );
$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'logo_height',
           'label'    => _x( 'Height', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $logo_section,
           'input_attrs'  => array(
            'min' => '0',
            'max' => '300',
            'step' => '1'
            ),
           'priority' => 20,
           'transport'=> 'postMessage'
         );
$controls[] = array(
           'type'     => 'uploader',
           'setting'  => 'logo_alt',
           'label'    => _x( 'Alternative Logo', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $logo_section,
           'description' => 'The Alternative Logo is used on the Sticky Navbar and Mobile Devices.',
           'priority' => 25,
         );

// Section : Navbar
$controls[] = array(
           'type'       => 'images_radio',
           'setting'    => 'header_navbar_position',
           'label'      => _x( 'Navbar Position', 'backend customizer' , 'backend_dahztheme' ),
           'section'    => $navbar_section,
           'choices'    =>  $navbar_position,
           'priority'   => 0,
         );

$controls[] = array(
           'type'       => 'radio',
           'mode'       => 'buttonset',
           'setting'    => 'header_navbar_align',
           'label'      => _x( 'Alignment', 'backend customizer' , 'backend_dahztheme' ),
           'section'    => $navbar_section,
           'choices'    => array(
                              'align-left'    => 'Left',
                              'align-center'  => 'Center',
                              'align-right'   => 'Right',
                           ),
           'priority'   => 10,
           'transport'  => 'postMessage'
         );

$controls[] = array(
           'type'       => 'checkbox',
           'mode'       => 'toggle',
           'setting'    => 'header_navbar_wide',
           'label'      => _x( 'Wide Navbar', 'backend customizer' , 'backend_dahztheme' ),
           'section'    => $navbar_section,
           'default'    => 0,
           'priority'   => 20,
           'transport'  => 'postMessage'
         );

// navbar color bg
$controls[] = array(
           'type'       => 'sub-title',
           'setting'    => 'df_navbar_bg_color_subtitle',
           'label'      => _x( 'Background Color','backend customizer', 'backend_dahztheme' ),
           'section'    => $navbar_section,
           'default'    => '',
           'priority'   => 30
         );

$controls[] = array(
           'type'       => 'color',
           'setting'    => 'header_navbar_bg_color',
           'label'      => _x( 'Background Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'    => $navbar_section,
           'default'    => '#ffffff',
           'priority'   => 40,
           'transport'  => 'postMessage'
         );

// navbar image bg
$controls[] = array(
           'type'       => 'sub-title',
           'setting'    => 'df_navbar_bg_image_subtitle',
           'label'      => _x( 'Background Image','backend customizer', 'backend_dahztheme' ),
           'section'    => $navbar_section,
           'default'    => '',
           'priority'   => 50
         );

$controls[] = array(
           'type'       => 'image',
           'setting'    => 'header_navbar_bg_image',
           'label'      => _x( 'Background image', 'backend customizer' , 'backend_dahztheme' ),
           'section'    => $navbar_section,
           'default'    => '',
           'priority'   => 60
         );

$controls[] = array(
           'type'       => 'select',
           'setting'    => 'header_navbar_bg_image_repeat',
           'label'      => _x( 'Background Image Repeat', 'backend customizer' , 'backend_dahztheme' ),
           'section'    => $navbar_section,
           'default'    => 'no-repeat',
           'choices'    => array(
                            'no-repeat' => _x('No Repeat', 'backend customizer','dahztheme'),
                            'repeat'    => _x('Repeat', 'backend customizer','dahztheme'),
                            'repeat-x'  => _x('Repeat X','backend customizer', 'dahztheme'),
                            'repeat-y'  => _x('Repeat Y','backend customizer', 'dahztheme'),
                           ),
           'priority'   => 70
         );

$controls[] = array(
           'type'       => 'select',
           'setting'    => 'header_navbar_bg_image_pos',
           'label'      => _x( 'Background Image Position', 'backend customizer', 'backend_dahztheme' ),
           'section'    => $navbar_section,
           'default'    => 'center center',
           'choices'    => array(
                            'top left'      => 'Top Left',
                            'top center'    => 'Top Center',
                            'top right'     => 'Top Right',
                            'center left'   => 'Center Left',
                            'center center' => 'Center',
                            'center right'  => 'Center Right',
                            'bottom left'   => 'Bottom Left',
                            'bottom center' => 'Bottom Center',
                            'bottom right'  => 'Bottom Right'
                           ),
           'priority'   => 80
         );

$controls[] = array(
           'type'       => 'select',
           'setting'    => 'header_navbar_bg_image_size',
           'label'      => _x( 'Background Size', 'backend customizer', 'dahztheme' ),
           'section'    => $navbar_section,
           'default'    => 'auto',
           'choices'    => array(
                            'auto'     => 'Auto',
                            'cover'    => 'Cover',
                            'contain'  => 'Contain'
                           ),
           'priority'   => 90
         );

$controls[] = array(
           'type'       => 'select',
           'setting'    => 'header_navbar_bg_image_attc',
           'label'      => _x( 'Background Attachment', 'backend customizer', 'dahztheme' ),
           'section'    => $navbar_section,
           'default'    => 'fixed',
           'choices'    => array(
                            'fixed'   => 'Fixed',
                            'scroll'  => 'Scroll'
                           ),
           'priority'   => 100
         );

// navbar font style
$controls[] = array(
           'type'       => 'sub-title',
           'setting'    => 'df_navbar_font_style_subtitle',
           'label'      => _x( 'Font Style','backend customizer', 'backend_dahztheme' ),
           'section'    => $navbar_section,
           'default'    => '',
           'priority'   => 110
         );

$controls[] = array(
           'type'       => 'slider',
           'setting'    => 'nav_font_size',
           'label'      => _x( 'Navigation Font Size', 'backend customizer' , 'backend_dahztheme' ),
           'section'    => $navbar_section,
           'default'    => '15',
           'input_attrs'    => array(
                            'min'  => '11',
                            'max'  => '18',
                            'step' => '1'
                           ),
           'priority'   => 140,
         );

$controls[] = array(
           'type'       => 'color',
           'setting'    => 'header_navbar_txt_color',
           'label'      => _x( 'Text Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'    => $navbar_section,
           'default'    => '#696969',
           'priority'   => 150
         );

$controls[] = array(
           'type'       => 'select',
           'direction'  => 'upward',
           'setting'    => 'header_navbar_txt_trans',
           'label'      => _x( 'Text Transform', 'backend customizer' , 'backend_dahztheme' ),
           'section'    => $navbar_section,
           'default'    => 'uppercase',
           'choices'    => array(
                              'none' => 'None',
                              'capitalize'  => 'Capitalize',
                              'lowercase'   => 'Lowercase',
                              'uppercase'   => 'Uppercase'
                           ),
           'priority'   => 160
         );

// Section : Navbar  Transparency
$controls[] = array( // Global
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'enable_navbar_transparency',
           'label'    => _x( 'Transparency','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_navbar_transparency_section',
           'default'  => 0,
           'priority' => 21
         );

$controls[] = array( // Global
           'type'     => 'radio',
           'mode'     => 'buttonset',
           'setting'  => 'default_dark_light_transparency',
           'label'    => _x( 'Color Scheme','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_navbar_transparency_section',
           'default'  => 'dark',
           'choices'  => array(
                        'light' => 'Light',
                        'dark'  => 'Dark'
                        ),
           'priority' => 25
         );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_navbar_transparency_light_subtitle',
           'label'    => _x( 'Light','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_navbar_transparency_section',
           'default'  => '',
           'priority' => 30
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'color_transparent_light',
           'label'    => _x( 'Transparent Navbar Light Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_navbar_transparency_section',
           'default'  => '#ffffff',
           'priority' => 31,
         );

$controls[] = array(
           'type'     => 'image',
           'setting'  => 'logo_light',
           'label'    => _x( 'Logo Light for Transparent Navbar', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_navbar_transparency_section',
           'default'  => '',
           'priority' => 35,
         );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_navbar_transparency_dark_subtitle',
           'label'    => _x( 'dark','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_navbar_transparency_section',
           'default'  => '',
           'priority' => 40
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'color_transparent_dark',
           'label'    => _x( 'Transparent Navbar Dark Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_navbar_transparency_section',
           'default'  => '#696969',
           'priority' => 41,
         );

$controls[] = array(
           'type'     => 'image',
           'setting'  => 'logo_dark',
           'label'    => _x( 'Logo Dark for Transparent Navbar', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_navbar_transparency_section',
           'default'  => '',
           'priority' => 45,
         );

// Section : Sticky
$controls[] = array(
           'type'     => 'color',
           'setting'  => 'sticky_navbar_bg_color',
           'label'    => _x( 'Bg Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_navbar_sticky_section',
           'priority' => 5,
           'transport' => 'postMessage'
         );
$controls[] = array(
           'type'     => 'color',
           'setting'  => 'sticky_navbar_txt_color',
           'label'    => _x( 'Text Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_navbar_sticky_section',
           'priority' => 10,
           'transport' => 'postMessage'
         );

// Section : Miscellaneous
$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'show_header_search',
           'label'    => _x( 'Header Search', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_navbar_miscellaneous_section',
           'default'  => 1,
           'priority' => 0,
           'transport' => 'postMessage'
         );

$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'show_offcanvas',
           'label'    => _x( 'Off Canvas Menu', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_navbar_miscellaneous_section',
           'default'  => '0',
           'priority' => 20,
           'transport' => 'postMessage'
         );

// Section : Page Title

$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'show_page_header_title',
           'label'    => _x( 'Titles and Breadcrumbs', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $pagetitle_section,
           'default'  => 1,
           'priority' => 10,
         );

$controls[] = array(
           'type'     => 'radio',
           'mode'     => 'buttonset',
           'setting'  => 'page_header_title_align',
           'label'    => _x( 'Page Title Alignment', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $pagetitle_section,
           'default'  => 'center',
           'choices'   => array(
                'left'      => 'Left',
                'center'    => 'Center',
                'right'     => 'Right'),
           'priority' => 15,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'show_page_header_breadcrumb',
           'label'    => _x( 'Breadcrumbs', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $pagetitle_section,
           'default'  => 1,
           'priority' => 20,
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'page_header_title_bg_color',
           'label'    => _x( 'Bg Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $pagetitle_section,
           'default'  => '#f8f8f8',
           'priority' => 25,
           'transport' => 'postMessage'
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'page_header_title_txt_color',
           'label'    => _x( 'Text Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $pagetitle_section,
           'default'  => '#000000',
           'priority' => 30,
         );

$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'page_header_title_height',
           'label'    => _x( 'Height', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => $pagetitle_section,
           'default'  => '240',
           'input_attrs'  => array(
            'min'  => '120',
            'max'  => '600',
            'step' => '1'
            ),
           'priority' => 35,
           'transport' => 'postMessage'
         );

/* Animation */
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_animation_title_bread_subtitle',
           'label'    => _x( 'TITLE & BREADCRUMBS ANIMATION','backend customizer', 'backend_dahztheme' ),
           'section'  => $pagetitle_section,
           'default'  => '',
           'priority' => 40,
         );

$controls[] = array(
           'type'     => 'select',
           'direction' => 'upward',
           'setting'  => 'page_onload_title_animation',
           'label'    => _x( 'onLoad Animation', 'backend customizer', 'backend_dahztheme' ),
           'section'  => $pagetitle_section,
           'default'  => 'none',
           'choices'  => array(
                        'none'        => 'None',
                        'fadein'      => 'FadeIn',
                        'fadeinup'    => 'FadeInUp',
                        'fadeindown'  => 'FadeInDown',
                        'zoom-in'     => 'ZoomIn'
                      ),
           'priority' => 45,
         );

$controls[] = array(
           'type'     => 'select',
           'direction' => 'upward',
           'setting'  => 'page_onscroll_title_animation',
           'label'    => _x( 'onScroll Animation', 'backend customizer', 'backend_dahztheme' ),
           'section'  => $pagetitle_section,
           'default'  => 'none',
           'choices'  => array(
                        'none'        => 'None',
                        'fadeout'     => 'FadeOut',
                        'fadeoutdown' => 'FadeOutDown',
                        'fadeoutup'   => 'FadeOutUp',
                        'zoom-out'    => 'ZoomOut'
                      ),
           'priority' => 50,
         );
