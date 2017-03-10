<?php
if (!defined('ABSPATH')) {
	exit;
}
//==============================================================
// Site Icon
//==============================================================

$controls[] = array(
           'type'     => 'uploader',
           'setting'  => 'fav_icon',
           'label'    => _x('Favicon', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_site_icon_section',
           'default'  => '',
           'description' => 'If an image is not set, nothing will be displayed. You can use .png or .ico image files here. A 152x152 image should be used for your touch icon, and a 144x144 image should be used for your tile icon. The color you set for your tile icon will be used behind your image.',
           'priority' => 5,
         );

$controls[] = array(
           'type'     => 'uploader',
           'setting'  => 'icon_touch',
           'label'    => _x('Touch Icon (ios & android)', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_site_icon_section',
           'default'  => '',
           'priority' => 10,
         );

$controls[] = array(
           'type'     => 'uploader',
           'setting'  => 'icon_tile',
           'label'    => _x('Tile Icon (microsoft)', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_site_icon_section',
           'default'  => '',
           'priority' => 20,
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'icon_tile_bg_color',
           'label'    => _x('Tile Icon Background Color', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_site_icon_section',
           'default'  => '#fff',
           'priority' => 30,
         );


//==============================================================
// Google Analytics
//==============================================================
$controls[] = array(
           'type'     => 'text',
           'setting'  => 'df_analytics_text',
           'label'    => _x( 'Insert your Google analytics ID here', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_google_analytics_section',
           'default'  => '',
           'priority' => 0,
         );

//==============================================================
// Social Connect
//==============================================================
$controls[] = array(
           'type'     => 'text',
           'setting'  => 'facebook',
           'label'    => _x('Facebook URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_connect_section',
           'default'  => '#',
           'priority' => 0,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'twitter',
           'label'    => _x('Twitter URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_connect_section',
           'default'  => '#',
           'priority' => 5
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'google',
           'label'    => _x('Google+ URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_connect_section',
           'default'  => '#',
           'priority' => 10,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'youtube',
           'label'    => _x('YouTube URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_connect_section',
           'default'  => '',
           'priority' => 15,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'vimeo',
           'label'    => _x('Vimeo URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_connect_section',
           'default'  => '',
           'priority' => 20,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'instagram',
           'label'    => _x('Instagram URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_connect_section',
           'default'  => '',
           'priority' => 25,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'pinterest',
           'label'    => _x('Pinterest URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_connect_section',
           'default'  => '#',
           'priority' => 30,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'dribbble',
           'label'    => _x('Dribbble URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_connect_section',
           'default'  => '',
           'priority' => 35,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'linkedin',
           'label'    => _x('LinkedIn URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_connect_section',
           'default'  => '',
           'priority' => 40,
         );

$controls[] = array(
           'type'     => 'text',
           'setting'  => 'rss',
           'label'    => _x('RSS Feed URL','backend customizer', 'backend_dahztheme'),
           'section'  => 'df_customizer_social_connect_section',
           'default'  => '#',
           'priority' => 45,
         );

//==============================================================
// 404
//==============================================================
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_404_bg_image_subtitle',
           'label'    => _x( 'Background image','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_404_section',
           'default'  => '',
           'priority' => 0
         );

$controls[] = array(
           'type'     => 'image',
           'setting'  => '404_image_bg',
           'label'    => _x( 'Background image', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_404_section',
           'default'  => 'http://dahz.daffyhazan.com/verko/wp-content/uploads/2015/06/only_04.jpg',
           'priority' => 10
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => '404_image_bg_repeat',
           'label'    => _x( 'Background Image Repeat', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_404_section',
           'default'  => 'no-repeat',
           'choices'  => array(
                            'no-repeat' => _x('No Repeat', 'backend customizer','dahztheme'),
                            'repeat'    => _x('Repeat', 'backend customizer','dahztheme'),
                            'repeat-x'  => _x('Repeat X','backend customizer', 'dahztheme'),
                            'repeat-y'  => _x('Repeat Y','backend customizer', 'dahztheme'),
                         ),
           'priority' => 20
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => '404_background_pos',
           'label'    => _x( 'Background Image Position', 'backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_404_section',
           'default'  => 'center center',
           'choices'  => array(
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
           'priority' => 30
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => '404_background_size',
           'label'    => _x( 'Background Size', 'backend customizer', 'dahztheme' ),
           'section'  => 'df_customizer_404_section',
           'default'  => 'cover',
           'choices'  => array(
                            'auto'     => 'Auto',
                            'cover'    => 'Cover',
                            'contain'  => 'Contain'
                         ),
           'priority' => 40
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => '404_background_attachment',
           'label'    => _x( 'Background Attachment', 'backend customizer', 'dahztheme' ),
           'section'  => 'df_customizer_404_section',
           'default'  => 'fixed',
           'choices'  => array(
                            'fixed'   => 'Fixed',
                            'scroll'  => 'Scroll'
                         ),
           'priority' => 50
         );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_404_bg_color_subtitle',
           'label'    => _x( 'Background color & opacity','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_404_section',
           'default'  => '',
           'priority' => 60
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => '404_color_bg',
           'label'    => _x( 'Background color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_404_section',
           'default'  => '#000000',
           'priority' => 70
         );

$controls[] = array(
           'type'     => 'slider',
           'setting'  => '404_color_opa',
           'label'    => _x( 'Background color opacity', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_404_section',
           'default'  => '0',
           'input_attrs'  => array(
                            'min' => '0',
                            'max' => '100',
                            'step' => '10'
                         ),
           'priority' => 80,
           'transport'=> 'postMessage'
         );
//==============================================================
// Page Loader
//==============================================================
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_page_loader_subtitle',
           'label'    => _x( 'Page Loader General Settings','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_page_loader_section',
           'default'  => '0',
           'priority' => 0
         );
$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'df_enable_page_loader',
           'label'    => _x( 'Page Loader', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_page_loader_section',
           'default'  => 0,
           'priority' => 10,
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'df_page_loader_animation',
           'label'    => _x( 'Page Loader Animation', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_page_loader_section',
           'default'  => 'fadeOut',
           'choices'  => array(
                            'fadeOut' => _x('Fade Out', 'backend customizer','dahztheme'),
                            'rotateOutUpRight' => _x('Rotate Out Up Right', 'backend customizer','dahztheme'),
                            'zoomOut'  => _x('Zoom Out','backend customizer', 'dahztheme'),
                            'rollOut'  => _x('Roll Out','backend customizer', 'dahztheme'),
                         ),
           'priority' => 20
         );
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_loading_animation_subtitle',
           'label'    => _x( 'Loading Animation Settings','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_page_loader_section',
           'default'  => '',
           'priority' => 30
         );
$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'df_enable_loading_animation',
           'label'    => _x( 'Loading Animation', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_page_loader_section',
           'default'  => 0,
           'priority' => 40,
         );
$controls[] = array(
           'type'     => 'select',
           'setting'  => 'df_loading_animation_style',
           'label'    => _x( 'Loding Animation Style', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_page_loader_section',
           'default'  => 'fadeOut',
           'choices'  => array(
                            'pulse' => _x('Pulse', 'backend customizer','dahztheme'),
                            'ball_rotate' => _x('Ball Rotate', 'backend customizer','dahztheme'),
                            'rotating_cubes'  => _x('Rotating Cubes','backend customizer', 'dahztheme'),
                            'stripes'  => _x('Stripes','backend customizer', 'dahztheme'),
                            'ball_rotate_multiple'  => _x('Ball Rotate Multiple','backend customizer', 'dahztheme'),
                            'line_pulse_out'  => _x('Stripes Pulse Out','backend customizer', 'dahztheme'),
                            'line_pulse'  => _x('Line Pulse','backend customizer', 'dahztheme'),
                         ),
           'priority' => 50
         );
$controls[] = array(
           'type'     => 'color',
           'setting'  => 'df_loading_animation_color',
           'label'    => _x('Loding Animation Color', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_page_loader_section',
           'default'  => '#000000',
           'priority' => 60,
         );
$controls[] = array(
           'type'     => 'color',
           'setting'  => 'df_page_loader_background',
           'label'    => _x('Page Loader Background Color', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_page_loader_section',
           'default'  => '#ffffff',
           'priority' => 70,
         );
$controls[] = array(
           'type'     => 'image',
           'setting'  => 'df_loading_animation_img',
           'label'    => _x('Loading Animation Image', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_page_loader_section',
           'default'  => '',
           'priority' => 80,
         );
//==============================================================
// Subsets Section
//==============================================================
$controls[] = array(
          'type'      => 'checkbox',
          'mode'      => 'toggle',
          'setting'   => 'custom_font_subsets',
          'label'     => _x('Enable Subsets', 'backend customizer' ,'dahztheme'),
          'section'   => 'df_customizer_font_subset_section',
          'default'   => 1,
          'priority'  => 90
         );
$controls[] = array(
          'type'      => 'checkbox',
          'setting'   => 'custom_font_subset_cyrillic',
          'label'     => _x('Cyrillic', 'backend customizer' ,'dahztheme'),
          'section'   => 'df_customizer_font_subset_section',
          'default'   => 1,
          'priority'  => 100
         );
$controls[] = array(
          'type'      => 'checkbox',
          'setting'   => 'custom_font_subset_greek',
          'label'     => _x('Greek', 'backend customizer' , 'dahztheme'),
          'section'   => 'df_customizer_font_subset_section',
          'default'   => 1,
          'priority'  => 110
         );
$controls[] = array(
          'type'      => 'checkbox',
          'setting'   => 'custom_font_subset_vietnamese',
          'label'     => _x('Vietnamese', 'backend customizer' ,'dahztheme'),
          'section'   => 'df_customizer_font_subset_section',
          'default'   => 1,
          'priority'  => 120
         );
