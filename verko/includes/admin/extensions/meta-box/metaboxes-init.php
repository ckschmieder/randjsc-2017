<?php

$nav_menus       = get_terms('nav_menu');
$nav_menus_clear = array(
    0  => _x('Primary location menu', 'backend metabox', 'dahztheme'),
    -1 => _x('Default menu', 'backend metabox', 'dahztheme')
);

foreach ($nav_menus as $nav_menu) {
    $nav_menus_clear[$nav_menu->term_id] = $nav_menu->name;
}

$url = get_template_directory_uri() . '/includes/assets/images/metaboxui/';

$master_slider = ( class_exists( 'Master_Slider' ) ) ? get_masterslider_names( true ) : array( 'none' => __( 'None', 'dahztheme' ) );

$meta_boxes[] = array(
	'title' 	=> __( 'Page / Post Settings', 'dahztheme' ),
    'context'   => 'normal',
	'priority'  => 'high',
	'pages'     => array( 'page', 'post', 'portfolio' ),
	'tabs'      => array(
		'layout' => array( 'label' => __( 'Layout', 'dahztheme' ) ),
		'header' => array( 'label' => __( 'Header', 'dahztheme' ) )
	 ),
	'tab_style' => 'left',
	'fields' 	=> array(
		// Layouts
		array(
            'name'      => _x('Layout', 'backend metabox', 'dahztheme'),
            'id'        => "{$prefix}_layout_content",
            'type'      => 'image_select',
            'options'   => array(
                            'two-col-left'  => $url . '2cl.png',
                            'one-col'       => $url . '1c.png',
                            'two-col-right' => $url . '2cr.png'
                           ),
            'std'       => 'two-col-left',
            'tab'		=> 'layout'
        ),
        array(
            'name'      => _x('Enable sidebar off-canvas', 'backend metabox', 'dahztheme'),
            'id'        => "{$prefix}_layout_sidebar_offcanvas",
            'type'      => 'checkbox',
            'std'       => 0,
            'tab'		=> 'layout'
        ),
        array(
            'name'      => _x('Enable footer', 'backend metabox', 'dahztheme'),
            'id'        => "{$prefix}_footer",
            'type'      => 'checkbox',
            'std'       => 1,
            'tab'		=> 'layout'
        ),
        array(
            'name'      => _x('Primary menu', 'backend metabox', 'dahztheme'),
            'id'        => "{$prefix}_custom_menu",
            'type'      => 'select',
            'options'   => $nav_menus_clear,
            'std'       => 0,
            'tab'		=> 'layout'
        ),
		// Header
        array(
            'name'      => _x('Choose Header Layout', 'backend metabox', 'dahztheme'),
            'id'        => "{$prefix}_header_transparency",
            'type'      => 'select',
            'options'   => array(
								'default'         => __( 'Default ( Global )', 'dahztheme' ),
								'light'           => __( 'Light', 'dahztheme' ),
								'dark'            => __( 'Dark', 'dahztheme' ),
								'no-transparency' => __( 'No Transparency', 'dahztheme' )
                           ),
            'std'       => 'default',
            'tab'		=> 'header'
        ),
        array(
            'name'      => _x('Header Style', 'backend metabox', 'dahztheme'),
            'id'        => "{$prefix}_header_style",
            'type'      => 'image_select',
            'options'   => array(
                                'show'   => $url . 'show-title.png',
                                'hide'   => $url . 'hide-title.png',
                                'fancy'  => $url . 'fancy-title.png',
                                'slider' => $url . 'slideshow.png'
                           ),
            'std'       => 'show',
            'tab'		=> 'header'
        ),
        array(
            'name'      => _x('Enable offset content', 'backend metabox', 'dahztheme'),
            'id'        => "{$prefix}_offset_content",
            'type'      => 'checkbox',
            'std'       => 0,
            'tab'		=> 'header'
        ),
        array(
            'name'      => _x('Header Alignment', 'backend metabox', 'dahztheme'),
            'id'        => "{$prefix}_header_align",
            'type'      => 'image_select',
            'options'   => array(
                                'left'   => $url . 'fancy-align-left.png',
                                'right'  => $url . 'fancy-align-right.png',
                                'center' => $url . 'fancy-align-center.png'
                           ),
            'std'       => 'left',
            'tab'		=> 'header'
        ),
        array(
            'name'      => _x('Title', 'backend metabox', 'dahztheme'),
            'id'        => "{$prefix}_title",
            'type'      => 'text',
            'std'       => '',
            'tab'		=> 'header'
        ),
        array(
            'name'      => _x('Title Color', 'backend metabox', 'dahztheme'),
            'id'        => "{$prefix}_title_color",
            'type'      => 'color',
            'tab'		=> 'header'
        ),
        array(
            'name'      => _x('Subtitle', 'backend metabox', 'dahztheme'),
            'id'        => "{$prefix}_subtitle",
            'type'      => 'text',
            'std'       => '',
            'tab'		=> 'header'
        ),
        array(
            'name'      => _x('Subtitle Color', 'backend metabox', 'dahztheme'),
            'id'        => "{$prefix}_subtitle_color",
            'type'      => 'color',
            'tab'		=> 'header'
        ),
        array(
            'name'      => _x('Background Options', 'backend metabox', 'dahztheme'),
            'id'        => "{$prefix}_background_options",
            'type'      => 'radio',
            'options'   => array(
                                'normal'   => _x('Normal Background', 'backend metabox', 'dahztheme'),
                                'parallax' => _x('Parallax Background', 'backend metabox', 'dahztheme'),
                                'video'    => _x('Video Background', 'backend metabox', 'dahztheme')
                           ),
            'std'       => 'normal',
            'tab'		=> 'header'
        ),
        array(
            'name'      => _x('Background Color', 'backend metabox', 'dahztheme'),
            'id'        => "{$prefix}_background_color",
            'type'      => 'color',
            'tab'		=> 'header'
        ),
        array(
            'name'              => _x('Upload Image', 'backend metabox', 'dahztheme'),
            'id'                => "{$prefix}_upload_image_fancy_title",
            'type'              => 'file_advanced',
            'max_file_uploads'  => 4,
            'mime_type'         => 'image',
            'tab'				=> 'header'
        ),
        array(
            'name'              => _x('Upload Video', 'backend metabox', 'dahztheme'),
            'id'                => "{$prefix}_upload_video_fancy_title",
            'type'              => 'file_advanced',
            'max_file_uploads'  => 4,
            'mime_type'         => 'video',
            'desc'              => _x('Only works for desktop view, on mobile the site will desplay normal background', 'backend metabox', 'dahztheme'),
            'tab'				=> 'header'
        ),
        array(
            'name'              => _x('Repeat Options', 'backend metabox', 'dahztheme'),
            'id'                => "{$prefix}_repeat_options",
            'type'              => 'select',
            'options'           => array(
                                    'repeat' => 'Repeat',
                                    'repeat-x' => 'Repeat X',
                                    'repeat-y' => 'Repeat Y',
                                    'no-repeat' => 'No-Repeat',
                                   ),
            'std'               => 'no-repeat',
            'tab'				=> 'header'
        ),
        array(
            'name'              => _x('Repeat X', 'backend metabox', 'dahztheme'),
            'id'                => "{$prefix}_repeat_x",
            'type'              => 'select',
            'options'           => array(
                                    'left' => 'Left',
                                    'right' => 'Right',
                                    'center' => 'Center',
                                   ),
            'std'               => 'center',
            'tab'				=> 'header'
        ),
        array(
            'name'              => _x('Repeat Y', 'backend metabox', 'dahztheme'),
            'id'                => "{$prefix}_repeat_y",
            'type'              => 'select',
            'options'           => array(
                                    'left' => 'Left',
                                    'right' => 'Right',
                                    'center' => 'Center',
                                   ),
            'std'               => 'center',
            'tab'				=> 'header'
        ),
        array(
            'name'              => _x('Parallax speed', 'backend metabox', 'dahztheme'),
            'id'                => "{$prefix}_fancy_parallax_speed",
            'type'              => 'text',
            'std'               => '',
            'tab'				=> 'header'
        ),
        array(
            'name'              => _x('Height (px)', 'backend metabox', 'dahztheme'),
            'id'                => "{$prefix}_header_height_setting",
            'type'              => 'text',
            'std'               => '',
            'tab'				=> 'header'
        ),
        array(
            'name'              => _x('Full Screen Height', 'backend metabox', 'dahztheme'),
            'id'                => "{$prefix}_header_full_screen_height_setting",
            'type'              => 'checkbox',
            'std'               => 0,
            'tab'				=> 'header'
        ),
        array(
            'name'              => _x('Enable Header Border', 'backend metabox', 'dahztheme'),
            'id'                => "{$prefix}_header_border",
            'type'              => 'checkbox',
            'std'               => 1,
            'tab'				=> 'header'
        ),
        array(
            'name'              => _x('Header Border Color Settings', 'backend metabox', 'dahztheme'),
            'id'                => "{$prefix}_header_border_color_setting",
            'type'              => 'color',
            'tab'				=> 'header'
        ),
        array(
            'name'              => _x('onLoad Page Title Animation', 'backend metabox', 'dahztheme'),
            'id'                => "{$prefix}_onLoad_animate",
            'type'              => 'select',
            'options'           => array(
                                    'none'       => 'None',
                                    'fadein'     => 'FadeIn',
                                    'fadeindown' => 'FadeInDown',
                                    'fadeinup'   => 'FadeInUp',
                                    'zoom-in'    => 'ZoomIn'
                                   ),
            'std'               => 'center',
            'tab'				=> 'header'
        ),
        array(
            'name'              => _x('onScroll Page Title Animation', 'backend metabox', 'dahztheme'),
            'id'                => "{$prefix}_onScroll_animate",
            'type'              => 'select',
            'options'           => array(
                                    'none'        => 'None',
                                    'fadeout'     => 'FadeOut',
                                    'fadeoutdown' => 'FadeOutDown',
                                    'fadeoutup'   => 'FadeOutUp',
                                    'zoom-out'    => 'ZoomOut'
                                   ),
            'std'               => 'center',
            'tab'				=> 'header'
        ),
        // Master slider
        array(
            'name'              => _x( 'Choose slider', 'backend metabox', 'dahztheme'),
            'id'                => "{$prefix}_master_slider",
            'type'              => 'select',
            'std'               => 'none',
            'options'           => $master_slider,
            'multiple'          => false,
            'tab'				=> 'header'
        )
	)
);