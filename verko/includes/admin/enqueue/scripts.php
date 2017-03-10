<?php

/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/ENQUEUE/SCRIPTS.PHP
 * - Theme Frontend JavaScript
 * - Metabox Options Custom JavaScript
  ================================================================================= */
/* ----------------------------------------------------------------------------------- */
/* Theme Frontend JavaScript                                                           */
/* ----------------------------------------------------------------------------------- */

  add_action( 'wp_enqueue_scripts', 'df_add_javascript' );
  add_action( 'admin_enqueue_scripts', 'df_enqueue_metabox_options_script' );


if (!function_exists('df_add_javascript')) :
    function df_add_javascript() {
        $suffix = dahz_get_min_suffix();
        wp_enqueue_script( 'df-modernizr', get_template_directory_uri() . '/includes/assets/js/vendor/modernizr.js', array( 'jquery' ), NULL );
        wp_enqueue_script( 'df-twitter-widget', get_template_directory_uri() . '/includes/assets/js/vendor/twitter-widget.js', array( 'jquery' ), NULL, true );
        wp_register_script( 'df-vide-js', get_template_directory_uri() . '/includes/assets/js/vendor/jquery.vide.min.js', array( 'jquery' ), NULL, true );
        wp_register_script( 'df-plugins', get_template_directory_uri() . '/includes/assets/js/plugins.js', array( 'jquery' ), NULL, true );
        do_action( 'df_add_javascript' );

        wp_enqueue_script( 'df-main', get_template_directory_uri() . '/includes/assets/js/main'.$suffix.'.js', array( 'df-plugins' ), NULL, true );

    }
endif;// End dahztheme_add_javascript()

/* ----------------------------------------------------------------------------------- */
/* Metabox Options Custom JavaScript                                                   */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_enqueue_metabox_options_script')) :
    function df_enqueue_metabox_options_script() {
        global $pagenow;
        $suffix = dahz_get_min_suffix();
        if ( ( in_array( $pagenow, array( 'post.php', 'post-new.php', 'page-new.php', 'page.php' ) ))) {
            wp_enqueue_script('meta-options-toggle', get_template_directory_uri() . '/includes/assets/js/admin/metabox-options-toggle'.$suffix.'.js', array( 'jquery' ), NULL, true);
        }
    }
endif;// End df_enqueue_metabox_options_script()
