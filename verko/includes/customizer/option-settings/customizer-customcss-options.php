<?php

if (!defined('ABSPATH')) {
 exit;
}

//======================================================================
// Custom CSS
//======================================================================

$controls[] = array(
           'type'     => 'textarea',
           'setting'  => 'custom_styles',
           'label'    => _x( 'CSS', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_custom_style_section',
           'priority' => 10
         );
