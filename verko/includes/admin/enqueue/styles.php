<?php
if ( !defined('ABSPATH') ){
 exit;
}

/* ----------------------------------------------------------------------------------- */
/* Load style.css in the <head>                                                        */
/* ----------------------------------------------------------------------------------- */


if (!function_exists('df_load_frontend_css')) {

    function df_load_frontend_css() {

        $suffix                         = dahz_get_min_suffix();
        $custom_font_subsets            = df_options( 'custom_font_subsets', dahz_get_default( 'custom_font_subsets' ) );
        $subset_cyrillic                = df_options( 'custom_font_subset_cyrillic', dahz_get_default( 'custom_font_subset_cyrillic' ) );
        $subset_greek                   = df_options( 'custom_font_subset_greek', dahz_get_default( 'custom_font_subset_greek' ) );
        $subset_vietnamese              = df_options( 'custom_font_subset_vietnamese', dahz_get_default( 'custom_font_subset_vietnamese' ) );
        $navbar_font_family             = df_options( 'nav_font_family', dahz_get_default( 'nav_font_family' ) );
        $navbar_font_family_query       = str_replace( ' ', '+', $navbar_font_family );
        $navbar_font_weight_and_style   = df_options( 'nav_font_weight', dahz_get_default( 'nav_font_weight' ) );
        $navbar_font_weight             = ( strpos( $navbar_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $navbar_font_weight_and_style ) : $navbar_font_weight_and_style;
        $headings_font_family           = df_options( 'heading_font_family', dahz_get_default( 'heading_font_family' ) );
        $headings_font_family_query     = str_replace( ' ', '+', $headings_font_family );
        $headings_font_weight_and_style = df_options( 'heading_font_weight', dahz_get_default( 'heading_font_weight' ) );
        $headings_font_weight           = ( strpos( $headings_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $headings_font_weight_and_style ) : $headings_font_weight_and_style;
        $body_font_family               = df_options( 'body_font_family', dahz_get_default( 'body_font_family' ) );
        $body_font_family_query         = str_replace( ' ', '+', $body_font_family );
        $body_font_weight_and_style     = df_options( 'body_font_weight', dahz_get_default( 'body_font_weight' ) );
        $body_font_weight               = ( strpos( $body_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $body_font_weight_and_style ) : $body_font_weight_and_style;

        $subsets                        = 'latin,latin-ext';

        if ($custom_font_subsets == 1) {
            if ($subset_cyrillic == 1)   {  $subsets .= ',cyrillic,cyrillic-ext';  }
            if ($subset_greek == 1)      {  $subsets .= ',greek,greek-ext';        }
            if ($subset_vietnamese == 1) {  $subsets .= ',vietnamese';             }
        }

        $custom_font_set = array(
            'family' => urlencode ( $body_font_family . ':' . $body_font_weight_and_style . '|' . $navbar_font_family . ':' . $navbar_font_weight_and_style . '|' . $headings_font_family . ':' . $headings_font_weight_and_style ),
            'subset' => urlencode ( $subsets ),
        );

        // Output google font css in header
        $get_custom_font_family = add_query_arg($custom_font_set, '//fonts.googleapis.com/css');

        wp_enqueue_style('df-layout', THEME_URI . '/includes/assets/css/layout'.$suffix.'.css', NULL, NULL);

        if (is_rtl()) {
            wp_enqueue_style('rtl', get_template_directory_uri() . '/includes/assets/css/rtl'.$suffix.'.css', NULL, NULL);
        }

        wp_enqueue_style('df-font-custom', $get_custom_font_family, NULL, NULL, 'all');


    }

}
add_action('wp_enqueue_scripts', 'df_load_frontend_css', 20);

/* ----------------------------------------------------------------------------------- */
/* Theme Customizer Stylesheet                                                         */
/* ----------------------------------------------------------------------------------- */

if (!function_exists('df_enqueue_customizer_admin_style')) {

    function df_enqueue_customizer_admin_style() {
        $suffix = dahz_get_min_suffix();
        wp_enqueue_style('df-customizer-admin', get_template_directory_uri() . '/includes/assets/css/admin/theme-customizer'.$suffix.'.css');
    }

}
add_action('dahz_enqueue_customizer_admin', 'df_enqueue_customizer_admin_style');

/* ----------------------------------------------------------------------------------- */
/* Remove PrettyPhoto CSS                                                              */
/* ----------------------------------------------------------------------------------- */

if (!function_exists('df_deregister_prettyPhoto')) {

    function df_deregister_prettyPhoto() {
        wp_deregister_style('prettyphoto');
    }

add_action( 'wp_enqueue_scripts', 'df_deregister_prettyPhoto', 100 );
}