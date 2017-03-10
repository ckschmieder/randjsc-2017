<?php
if (!defined('ABSPATH')) { exit; }

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'df_button_style',
           'label'    => _x( 'Button Style', 'backend customizer', 'dahztheme' ),
           'section'  => 'df_customizer_button_section',
           'default'  => 'flat',
           'choices'  => array(
                            'flat'     => 'Flat',
                            '3d'       => '3D',
                            'outline'  => 'Outline'
                         ),
           'priority' => 0
         );

$controls[] = array(
           'type'     => 'select',
           'setting'  => 'df_button_shape',
           'label'    => _x( 'Button Shape', 'backend customizer', 'dahztheme' ),
           'section'  => 'df_customizer_button_section',
           'default'  => 'round',
           'choices'  => array(
                            'square'  => 'Square',
                            'round'   => 'Rounded',
                            'pill'    => 'Pill'
                         ),
           'priority' => 10
         );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_button_color_subtitle',
           'label'    => _x( 'Color','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_button_section',
           'default'  => '',
           'priority' => 20
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'df_button_text_color',
           'label'    => _x( 'Text Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_button_section',
           'default'  => '#ffffff',
           'priority' => 30
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'df_button_bg_color',
           'label'    => _x( 'Background Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_button_section',
           'default'  => '#00c1cf',
           'priority' => 40
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'df_button_bottom_color',
           'label'    => _x( 'Bottom Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_button_section',
           'default'  => '',
           'priority' => 50
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'df_button_border_color',
           'label'    => _x( 'Border Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_button_section',
           'default'  => '#00c1cf',
           'priority' => 60
         );

$controls[] = array(
           'type'     => 'sub-title',
           'setting'  => 'df_button_hover_color_subtitle',
           'label'    => _x( 'Hover Color','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_button_section',
           'default'  => '',
           'priority' => 70
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'df_button_text_hover_color',
           'label'    => _x( 'Text Hover Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_button_section',
           'default'  => '#ffffff',
           'priority' => 80
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'df_button_bg_hover_color',
           'label'    => _x( 'Background Hover Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_button_section',
           'default'  => '#00dfce',
           'priority' => 90
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'df_button_bottom_hover_color',
           'label'    => _x( 'Bottom Hover Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_button_section',
           'default'  => '#4f4f4f',
           'priority' => 100
         );

$controls[] = array(
           'type'     => 'color',
           'setting'  => 'df_button_border_hover_color',
           'label'    => _x( 'Border Hover Color', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_button_section',
           'default'  => '#00dfce',
           'priority' => 110
         );