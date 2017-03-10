<?php
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package dahztheme
 */

add_filter( 'dahz_breadcrumbs_args', 'df_custom_breadcrumbs_args',            10    );
add_filter( 'user_contactmethods',   'df_contactmethods',                     10, 1 );

/* ----------------------------------------------------------------------------------- */
/* Breadcrumb display                                                                  */
/* ----------------------------------------------------------------------------------- */
// Customise the breadcrumb
if ( !function_exists( 'df_custom_breadcrumbs_args' ) ) {

    function df_custom_breadcrumbs_args( $args ) {

        $args = array( 'separator' => '&rsaquo;', 'before' => '', 'show_home' => sprintf( __( 'Home', 'dahztheme' ) ) );

        return $args;
    }

// End df_custom_breadcrumbs_args()
}

/* ----------------------------------------------------------------------------------- */
/* Author Social Links                                                                 */
/* ----------------------------------------------------------------------------------- */
function df_contactmethods( $contactmethods ) {

    $contactmethods['twitter']   = 'Twitter Username';
    $contactmethods['facebook']  = 'Facebook Username';
    $contactmethods['google']    = 'Google Plus Username';
    $contactmethods['instagram'] = 'Instagram Username';
    $contactmethods['pinterest'] = 'Pinterest Username';

    return $contactmethods;
}
