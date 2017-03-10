<?php

if (!defined('ABSPATH')) {
 exit;
}

/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/FUNCTIONS/CONTENT-CLASSES.PHP
 *
 * - Body Classes
  ================================================================================= */
/*-----------------------------------------------------------------------------------*/
/* Layout body class */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'df_layout_body_class' ) ) :

    function df_layout_body_class( $classes ) {
        global $post;

        $df_header_navbar = df_options( 'header_navbar_position' );
        $df_button_style  = df_options( 'df_button_style', dahz_get_default( 'df_button_style' ) );

        // Navbar positioning.
        if ( isset( $_GET['header-navbar-center'] ) || 'center' == $df_header_navbar ){
           $classes[] = 'df-navibar-center-active';
        } elseif( isset( $_GET['header-navbar-split'] ) || 'split' == $df_header_navbar ){
           $classes[] = 'df-navibar-split-active';
        } else {
           $classes[] = 'df-navibar-left-active';
        }

        // Button style
        switch ( $df_button_style ) {
            case 'flat' :
                $classes[] = 'df_button_flat';
                break;
            case '3d' :
                $classes[] = 'df_button_3d';
                break;
            case 'outline' :
                $classes[] = 'df_button_outline';
                break;
        }

        $meta_sb_off_canvas  = get_post_meta( df_get_the_id(), 'df_metabox_layout_sidebar_offcanvas', true );
        $meta_layout_content = get_post_meta( df_get_the_id(), 'df_metabox_layout_content', true );

        // one-col and off canvas sidebar checked
        if( $meta_layout_content == 'one-col' && $meta_sb_off_canvas == 1 ){

                $classes[] = 'has-sidebar-offcanvas';

        }

        return $classes;
    }

endif;

add_filter( 'body_class', 'df_layout_body_class', 10 );

// Add custom CSS class to the <body> tag if layout site boxed/fullwidth option is checked.
// ==================================================================================
if ( ! function_exists( 'df_boxed_layout_body_class' ) ) :
    function df_boxed_layout_body_class( $classes ) {
        $layout_site = df_options( 'layout_site', dahz_get_default( 'layout_site' ) );
        // layout full-width, boxed
        $classes[] = 'df-' . $layout_site. '-layout-active';

        return $classes;
    }
endif;
add_filter( 'body_class', 'df_boxed_layout_body_class', 10 );

// =============================================================================
// Page/Post Template Menu filter.
// =============================================================================
if ( ! function_exists( 'df_page_template_menu_filter' ) ) :

    function df_page_template_menu_filter( $args ) {
        global $post;

        // TODO : Split Menu location

        if( $args['theme_location'] == 'primary-menu' ) {
            $page_primary_menu = get_post_meta( df_get_the_id(), 'df_metabox_custom_menu', true );
            $menu = wp_get_nav_menu_object( $page_primary_menu );
            $args['menu'] = $menu;
        }

        return $args;
    }

endif;
add_filter( 'wp_nav_menu_args', 'df_page_template_menu_filter' );

/*-----------------------------------------------------------------------------------*/
/* Browser and operating system body class */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'df_browser_body_class' ) ) :

    function df_browser_body_class( $classes ) {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        if($is_lynx) { $classes[] = 'lynx'; }
        elseif($is_gecko) { $classes[] = 'gecko'; }
        elseif($is_opera) { $classes[] = 'opera'; }
        elseif($is_NS4) { $classes[] = 'ns4'; }
        elseif($is_safari) { $classes[] = 'safari'; }
        elseif($is_chrome) { $classes[] = 'chrome'; }
        elseif($is_IE) {
                $classes[] = 'ie';
                if( preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version ) )
                {$classes[] = 'ie'.$browser_version[1];}
        } else $classes[] = 'unknown';

        if( $is_iphone ) { $classes[] = 'iphone'; }
        if ( stristr( $_SERVER['HTTP_USER_AGENT'], "mac" ) ) {
                 $classes[] = 'osx';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'], "linux" ) ) {
                 $classes[] = 'linux';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'], "windows" ) ) {
                 $classes[] = 'windows';
           }
        return $classes;

    }
endif;
add_filter( 'body_class' , 'df_browser_body_class' );
