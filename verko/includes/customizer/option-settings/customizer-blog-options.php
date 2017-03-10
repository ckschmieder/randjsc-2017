<?php
if (!defined('ABSPATH')) { exit; }

// Featured Slider
$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'feat_slider',
           'label'    => _x( 'Featured Slider', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_featslider_section',
           'default'  => 0,
           'priority' => 0,
         );

$controls[] = array(
           'type'     => 'textarea',
           'setting'  => 'slider_sc',
           'label'    => _x( 'Slider Shortcode', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_featslider_section',
           'default'  => '',
           'priority' => 20,
         );

// Layout
$controls[] = array(
           'type'     => 'radio',
           'mode'     => 'buttonset',
           'setting'  => 'blog_layout',
           'label'    => _x( 'Blog Layout', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_layout_section',
           'default'  => 'list',
           'choices'  => array(
                        'list' => 'List',
                        'grid' => 'Grid'
                       ),
           'priority' => 0,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'blog_content_list',
           'label'    => _x( 'Excerpt Content', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_layout_section',
           'default'  => 'summary',
           'choices'  => array(
                            'fulltext'    => 'Full Text',
                            'summary'     => 'Summary'
                         ),
           'priority' => 10,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'blog_content_grid',
           'label'    => _x( 'Content Grid', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_layout_section',
           'default'  => 'fitrows',
           'choices'  => array(
                        'fitrows'   => 'Fitrows',
                        'masonry'   => 'Masonry'
                       ),
           'priority' => 10,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'blog_grid_col',
           'label'    => _x( 'Grid Columns', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_layout_section',
           'default'  => '2col',
           'choices'  => array(
                        '2col'    => '2 Columns',
                        '3col'    => '3 Columns',
                        '4col'    => '4 Columns',
                        '5col'    => '5 Columns'
                       ),
           'priority' => 20,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'cat_filter',
           'label'    => _x( 'Category Filter', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_layout_section',
           'default'  => 1,
           'priority' => 30,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'love_btn',
           'label'    => _x( 'Love Button', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_layout_section',
           'default'  => 1,
           'priority' => 40,
         );

$controls[] = array(
           'type'     => 'select',
           'direction' => 'upward',
           'setting'  => 'pagination_style',
           'label'    => _x( 'Pagination Style', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_layout_section',
           'default'  => 'prev-next',
           'choices'  => array(
                            'number'                => _x('Number', 'backend customizer','dahztheme'),
                            'infinite'              => _x('Infinite Scroll', 'backend customizer','dahztheme'),
                            'infinite_button'       => _x('Infinite Scroll Button', 'backend customizer','dahztheme'),
                            'prev-next'             => _x('Prev / Next', 'backend customizer','dahztheme')
                         ),
           'priority' => 50
         );

// Single Blog
$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'feat_image',
           'label'    => _x( 'Feature Image', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_singleblog_section',
           'default'  => 1,
           'priority' => 0,
         );

// archive
$controls[] = array(
           'type'     => 'radio',
           'mode'     => 'buttonset',
           'setting'  => 'archive_layout',
           'label'    => _x( 'Archive Layout', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_archive_section',
           'default'  => 'list',
           'choices'  => array(
                        'list' => 'List',
                        'grid' => 'Grid'
                       ),
           'priority' => 0,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'arch_content_list',
           'label'    => _x( 'Archive Content List', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_archive_section',
           'default'  => 'summary',
           'choices'  => array(
                            'fulltext'    => 'Full Text',
                            'summary'     => 'Summary'
                         ),
           'priority' => 10,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'arch_content_grid',
           'label'    => _x( 'Archive Content Grid', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_archive_section',
           'default'  => 'fitrows',
           'choices'  => array(
                        'fitrows'   => 'Fitrows',
                        'masonry'   => 'Masonry'
                       ),
           'priority' => 10,
         );

$controls[] = array(
           'type'     => 'radio',
           'setting'  => 'arch_grid_col',
           'label'    => _x( 'Grid Columns', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_archive_section',
           'default'  => '2col',
           'choices'  => array(
                        '2col'    => '2 Columns',
                        '3col'    => '3 Columns',
                        '4col'    => '4 Columns',
                        '5col'    => '5 Columns'
                       ),
           'priority' => 20,
         );

// share
$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'blog_share',
           'label'    => _x( 'Blog Share', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_share_section',
           'default'  => 1,
           'priority' => 0,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'fb_share',
           'label'    => _x( 'Facebook', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_share_section',
           'default'  => 1,
           'priority' => 10,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'twt_share',
           'label'    => _x( 'Twitter', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_share_section',
           'default'  => 1,
           'priority' => 20,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'gplus_share',
           'label'    => _x( 'Google Plus', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_share_section',
           'default'  => 1,
           'priority' => 30,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'pin_share',
           'label'    => _x( 'Pinterest', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_share_section',
           'default'  => 1,
           'priority' => 40,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'mail_share',
           'label'    => _x( 'Mail To', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_share_section',
           'default'  => 0,
           'priority' => 50,
         );

$controls[] = array(
           'type'     => 'checkbox',
           'mode'     => 'toggle',
           'setting'  => 'link_share',
           'label'    => _x( 'LinkedIn', 'backend customizer' , 'backend_dahztheme' ),
           'section'  => 'df_customizer_share_section',
           'default'  => 0,
           'priority' => 60,
         );
