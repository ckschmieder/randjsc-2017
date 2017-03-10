<?php
if (!defined('ABSPATH')) {
  exit;
}

// Primary footer options
$controls[] = array(
           'type'     => 'select',
           'setting'  => 'primary_footer_widget_columns',
           'label'    => _x( 'Footer Widget Columns', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_primary_section',
           'default'  => '3',
           'choices'  => array(
                            0                   => 'None (Disable)',
                            1                   => '1 Column',
                            2                   => '2 Columns',
                            3                   => '3 Columns',
                            4                   => '4 Columns',
                            'half_third'        => '4 ( 40% + 20% + 20% + 20% )',
                            'half_two'          => '3 ( 50% + 25% + 25% )',
                            'third_half_third'  => '3 ( 25% + 50% + 25% )'
                         ),
           'priority' => 0
        );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_primary_footer_bg_image_subtitle',
           'label'    => _x( 'Background image','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_primary_section',
           'default'  => '',
           'priority' => 10
         );

$controls[] = array(
           'type'     => 'image',
           'setting'  => 'primary_footer_image_bg',
           'label'    => _x( 'Background image', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_primary_section',
           'default'  => '',
           'priority' => 20
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'primary_footer_image_bg_repeat',
           'label'    => _x( 'Background Image Repeat', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_primary_section',
           'default'  => 'no-repeat',
           'choices'  => array(
                            'no-repeat' => _x('No Repeat', 'backend customizer','dahztheme'),
                            'repeat'    => _x('Repeat', 'backend customizer','dahztheme'),
                            'repeat-x'  => _x('Repeat X','backend customizer', 'dahztheme'),
                            'repeat-y'  => _x('Repeat Y','backend customizer', 'dahztheme'),
                         ),
           'priority' => 30
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'primary_footer_background_pos',
           'label'    => _x( 'Background Image Position', 'backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_primary_section',
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
           'priority' => 40
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'primary_footer_background_size',
           'label'    => _x( 'Background Size', 'backend customizer', 'dahztheme' ),
           'section'  => 'df_customizer_primary_section',
           'default'  => 'auto',
           'choices'  => array(
                            'auto'     => 'Auto',
                            'cover'    => 'Cover',
                            'contain'  => 'Contain'
                         ),
           'priority' => 50
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'primary_footer_background_attachment',
           'label'    => _x( 'Background Attachment', 'backend customizer', 'dahztheme' ),
           'section'  => 'df_customizer_primary_section',
           'default'  => 'fixed',
           'choices'  => array(
                            'fixed'   => 'Fixed',
                            'scroll'  => 'Scroll'
                         ),
           'priority' => 60
         );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_primary_footer_bg_color_subtitle',
           'label'    => _x( 'Background color','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_primary_section',
           'default'  => '',
           'priority' => 70
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'primary_footer_bg_color',
           'label'    => _x( 'Background Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_primary_section',
           'default'  => '#292929',
           'priority' => 80
        );

$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'primary_footer_color_opa',
           'label'    => _x( 'Background color opacity', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_primary_section',
           'default'  => '100',
           'input_attrs'  => array(
                            'min' => '0',
                            'max' => '100',
                            'step' => '10'
                         ),
           'priority' => 90,
         );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_pf_widget_color_subtitle',
           'label'    => _x( 'Widget Colors','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_primary_section',
           'default'  => '',
           'priority' => 100
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'pf_widget_title_color',
           'label'    => _x( 'Widget Title Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_primary_section',
           'default'  => '#a78f68',
           'priority' => 110,
           'transport'=> 'postMessage'
        );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'pf_widget_content_color',
           'label'    => _x( 'Widget Text Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_primary_section',
           'default'  => '#ffffff',
           'priority' => 120,
           'transport'=> 'postMessage'
        );

// Copyright footer options
$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_copyright_footer_bg_image_subtitle',
           'label'    => _x( 'Background image','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_copyright_section',
           'default'  => '',
           'priority' => 0
         );

$controls[] = array(
           'type'     => 'image',
           'setting'  => 'copyright_footer_image_bg',
           'label'    => _x( 'Background image', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_copyright_section',
           'default'  => '',
           'priority' => 10
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'copyright_footer_image_bg_repeat',
           'label'    => _x( 'Background Image Repeat', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_copyright_section',
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
           'setting'  => 'copyright_footer_background_pos',
           'label'    => _x( 'Background Image Position', 'backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_copyright_section',
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
           'setting'  => 'copyright_footer_background_size',
           'label'    => _x( 'Background Size', 'backend customizer', 'dahztheme' ),
           'section'  => 'df_customizer_copyright_section',
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
           'setting'  => 'copyright_footer_background_attachment',
           'label'    => _x( 'Background Attachment', 'backend customizer', 'dahztheme' ),
           'section'  => 'df_customizer_copyright_section',
           'default'  => 'scroll',
           'choices'  => array(
                            'fixed'   => 'Fixed',
                            'scroll'  => 'Scroll'
                         ),
           'priority' => 50
         );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_copyright_footer_bg_color_subtitle',
           'label'    => _x( 'Background color','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_copyright_section',
           'default'  => '',
           'priority' => 60
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'copyright_footer_bg_color',
           'label'    => _x( 'Background Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_copyright_section',
           'default'  => '#292929',
           'priority' => 70
        );

$controls[] = array(
           'type'     => 'slider',
           'setting'  => 'copyright_footer_color_opa',
           'label'    => _x( 'Background color opacity', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_copyright_section',
           'default'  => '100',
           'input_attrs'  => array(
                            'min' => '0',
                            'max' => '100',
                            'step' => '10'
                         ),
           'priority' => 80
         );

$controls[] = array(
           'type'     => 'textarea',
           'setting'  => 'copyright_content',
           'label'    => _x( 'Custom Copyright Text', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_copyright_section',
           'default'  => '<p style="text-align: center; margin-bottom: 0;">Copyright © 2015 DAHZ All Rights Reserved. Verko</p>',
           'priority' => 90,
         );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_cf_text_color_subtitle',
           'label'    => _x( 'Text Colors','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_copyright_section',
           'default'  => '',
           'priority' => 100
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'cf_text_color',
           'label'    => _x( 'Text Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_copyright_section',
           'default'  => '#ffffff',
           'priority' => 110,
           'transport'=> 'postMessage'
        );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'cf_link_color',
           'label'    => _x( 'Link Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_copyright_section',
           'default'  => '#2eaee0',
           'priority' => 120,
           'transport'=> 'postMessage'
        );
