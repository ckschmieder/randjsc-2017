<?php
if (!defined('ABSPATH')){
 exit;
}

/* Section : General */
$controls[] = array(
           'type'     => 'select',
           'setting'  => 'site_max_width',
           'label'    => _x( 'Site Max Width','backend customizer', 'backend_dahztheme' ),
           'section'  => 'df_customizer_general_section',
           'default'  => '1200',
           'choices'  => $site_max_width,
           'priority' => 5,
           'transport'=> 'postMessage'
         );

$controls[] = array(
           'type'     => 'images_radio',
           'setting'  => 'layout_site',
           'label'    => _x('Site Layout', 'backend customizer','backend_dahztheme'),
           'section'  => 'df_customizer_general_section',
           'default'  => 'wide',
           'choices'  => $layout_site,
           'priority' => 10
         );
