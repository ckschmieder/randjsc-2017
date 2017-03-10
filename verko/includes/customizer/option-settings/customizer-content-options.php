<?php
if (!defined('ABSPATH')) { exit; }


// start outer area

// image background
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_outer_area_bg_image_subtitle',
           'label'    => _x( 'Background Image','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_outer_area_section',
           'default'  => '',
           'priority' => 0
         );

$controls[] = array(
           'type'     => 'image',
           'setting'  => 'outer_area_image_bg',
           'label'    => _x( 'Background image', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_outer_area_section',
           'default'  => '',
           'priority' => 10
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'outer_area_image_bg_repeat',
           'label'    => _x( 'Background Image Repeat', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_outer_area_section',
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
           'setting'  => 'outer_area_background_pos',
           'label'    => _x( 'Background Image Position', 'backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_outer_area_section',
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
           'setting'  => 'outer_area_background_size',
           'label'    => _x( 'Background Size', 'backend customizer', 'dahztheme' ),
           'section'  => 'df_customizer_outer_area_section',
           'default'  => 'auto',
           'choices'  => array(
                            'auto'     => 'Auto',
                            'cover'    => 'Cover',
                            'contain'  => 'Contain'
                         ),
           'priority' => 40
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'outer_area_background_attachment',
           'label'    => _x( 'Background Attachment', 'backend customizer', 'dahztheme' ),
           'section'  => 'df_customizer_outer_area_section',
           'default'  => 'fixed',
           'choices'  => array(
                            'fixed'   => 'Fixed',
                            'scroll'  => 'Scroll'
                         ),
           'priority' => 50
         );

// color background
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_outer_area_bg_color_subtitle',
           'label'    => _x( 'Background color','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_outer_area_section',
           'default'  => '',
           'priority' => 60
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'outer_area_bg_color',
           'label'    => _x( 'Background Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_outer_area_section',
           'default'  => '#dbdbdb',
           'priority' => 70
        );

$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'outer_area_color_opa',
           'label'    => _x( 'Background color opacity', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_outer_area_section',
           'default'  => '50',
           'input_attrs'  => array(
                            'min' 	=> '0',
                            'max' 	=> '100',
                            'step' 	=> '10'
                         ),
           'priority' => 80,
           'transport'=> 'postMessage'
         );
// end outer area

// start content area
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_content_area_bg_image_subtitle',
           'label'    => _x( 'Background Image','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_content_area_section',
           'default'  => '',
           'priority' => 0
         );

$controls[] = array(
           'type'     => 'image',
           'setting'  => 'content_area_image_bg',
           'label'    => _x( 'Background image', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_content_area_section',
           'default'  => '',
           'priority' => 10
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'content_area_image_bg_repeat',
           'label'    => _x( 'Background Image Repeat', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_content_area_section',
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
           'setting'  => 'content_area_background_pos',
           'label'    => _x( 'Background Image Position', 'backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_content_area_section',
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
           'setting'  => 'content_area_background_size',
           'label'    => _x( 'Background Size', 'backend customizer', 'dahztheme' ),
           'section'  => 'df_customizer_content_area_section',
           'default'  => 'auto',
           'choices'  => array(
                            'auto'     => 'Auto',
                            'cover'    => 'Cover',
                            'contain'  => 'Contain'
                         ),
           'priority' => 40
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'content_area_background_attachment',
           'label'    => _x( 'Background Attachment', 'backend customizer', 'dahztheme' ),
           'section'  => 'df_customizer_content_area_section',
           'default'  => 'fixed',
           'choices'  => array(
                            'fixed'   => 'Fixed',
                            'scroll'  => 'Scroll'
                         ),
           'priority' => 50
         );

// color background
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_content_area_bg_color_subtitle',
           'label'    => _x( 'Background color','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_content_area_section',
           'default'  => '',
           'priority' => 60
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'content_area_bg_color',
           'label'    => _x( 'Background Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_content_area_section',
           'default'  => '#ffffff',
           'priority' => 70
        );

$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'content_area_color_opa',
           'label'    => _x( 'Background color opacity', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_content_area_section',
           'default'  => '100',
           'input_attrs'  => array(
                            'min' 	=> '0',
                            'max' 	=> '100',
                            'step' 	=> '10'
                         ),
           'priority' => 80,
           'transport'=> 'postMessage'
         );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_general_sidebar_subtitle',
           'label'    => _x( 'General sidebar','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_content_area_section',
           'default'  => '',
           'priority' => 90
         );

$controls[] = array(
           'type'     => 'images_radio',
           'setting'  => 'layout_content',
           'label'    => _x( 'Sidebar Position','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_content_area_section',
           'default'  => 'two-col-left',
           'choices'  => array(
                    'two-col-left'  => array( 'url' => $url . '2cl.png'),
                    'one-col'       => array( 'url' => $url . '1c.png'),
                    'two-col-right' => array( 'url' => $url . '2cr.png')
                    ),
           'priority' => 100
         );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_accent_color_subtitle',
           'label'    => _x( 'Accent Color','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_content_area_section',
           'default'  => '',
           'priority' => 110
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'accent_color',
           'label'    => _x( 'Accent Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_content_area_section',
           'default'  => '#00c1cf',
           'priority' => 120,
           'transport'=> 'postMessage'
        );
// end content area

// start typography
$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'general_font_size',
           'label'    => _x( 'General Font Size', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_typo_section',
           'default'  => '15',
           'input_attrs'  => array(
                            'min' 	=> '12',
                            'max' 	=> '24',
                            'step' 	=> '1'
                         ),
           'priority' => 0,
         );

// heading font style
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_heading_text_subtitle',
           'label'    => _x( 'Heading Text Style','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_typo_section',
           'default'  => '',
           'priority' => 10
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'heading_font_color',
           'label'    => _x( 'Heading Font Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_typo_section',
           'default'  => '#444751',
           'priority' => 30
        );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'heading_txt_transform',
           'label'    => _x( 'Heading Text Transform', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_typo_section',
           'default'  => 'none',
           'choices'  => array(
                    'none'        => 'None',
           					'capitalize'	=> 'Capitalize',
           					'lowercase' 	=> 'Lowercase',
           					'uppercase' 	=> 'Uppercase'
           				 ),
           'priority' => 50
        );

$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'heading_letter_space',
           'label'    => _x( 'Heading Letter Space', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_typo_section',
           'default'  => '1.25',
           'input_attrs'  => array(
                            'min' 	=> '0',
                            'max' 	=> '2',
                            'step' 	=> '0.25'
                         ),
           'priority' => 60,
         );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_body_text_subtitle',
           'label'    => _x( 'Body Text Style','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_typo_section',
           'default'  => '',
           'priority' => 70
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'body_font_color',
           'label'    => _x( 'Body Font Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_typo_section',
           'default'  => '#676c7b',
           'priority' => 90
        );

$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'body_letter_space',
           'label'    => _x( 'Body Letter Space', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_typo_section',
           'default'  => '0.25',
           'input_attrs'  => array(
                            'min' 	=> '0',
                            'max' 	=> '2',
                            'step' 	=> '0.25'
                         ),
           'priority' => 110,
         );
// end typography
