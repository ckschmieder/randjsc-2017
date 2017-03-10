<?php
/* ----------------------------------------------------------------------------------- */
/* Plugins List Activation                                                             */
/* ----------------------------------------------------------------------------------- */

if (!function_exists('df_register_required_plugins')) {

    function df_register_required_plugins() {
        $plugins = array(
            array(
                'name'                  => 'Meta Box', // The plugin name
                'slug'                  => 'meta-box', // The plugin slug (typically the folder name)
                'required'              => true, // If false, the plugin is only 'recommended' instead of required
            ),
            array(
                'name'                  => 'Meta Box Tabs', // The plugin name
                'slug'                  => 'meta-box-tabs', // The plugin slug (typically the folder name)
                'source'                => get_template_directory() . '/includes/admin/plugins/meta-box-tabs.zip', // The plugin source
                'required'              => true, // If false, the plugin is only 'recommended' instead of required
                'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'                  => 'Visual Composer Page Builder', // The plugin name
                'slug'                  => 'js_composer', // The plugin slug (typically the folder name)
                'source'                => get_template_directory() . '/includes/admin/plugins/js_composer.zip', // The plugin source
                'required'              => true, // If false, the plugin is only 'recommended' instead of required
                'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'                  => 'Dahz DF Shortcodes', // The plugin name
                'slug'                  => 'df-shortcodes', // The plugin slug (typically the folder name)
                'source'                => get_template_directory() . '/includes/admin/plugins/df-shortcodes.zip', // The plugin source
                'required'              => true, // If false, the plugin is only 'recommended' instead of required
                'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'                  => 'Dahz DF Testimonials', // The plugin name
                'slug'                  => 'df-testimonial', // The plugin slug (typically the folder name)
                'source'                => get_template_directory() . '/includes/admin/plugins/df-testimonial.zip', // The plugin source
                'required'              => true, // If false, the plugin is only 'recommended' instead of required
                'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'                  => 'Dahz DF Portfolio', // The plugin name
                'slug'                  => 'df-portfolio', // The plugin slug (typically the folder name)
                'source'                => get_template_directory() . '/includes/admin/plugins/df-portfolio.zip', // The plugin source
                'required'              => true, // If false, the plugin is only 'recommended' instead of required
                'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'                  => 'Sidebar Generator', // The plugin name
                'slug'                  => 'sidebar-generator', // The plugin slug (typically the folder name)
                'source'                => get_template_directory() . '/includes/admin/plugins/sidebar-generator.zip', // The plugin source
                'required'              => false, // If false, the plugin is only 'recommended' instead of required
                'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ),
            // array(
            //     'name'                  => 'Photoswipe Gallery', // The plugin name
            //     'slug'                  => 'photoswipe-gallery', // The plugin slug (typically the folder name)
            //     'source'                => get_template_directory() . '/includes/admin/plugins/photoswipe-gallery.zip', // The plugin source
            //     'required'              => false, // If false, the plugin is only 'recommended' instead of required
            //     'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            //     'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            //     'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            //     'external_url'          => '', // If set, overrides default API URL and points to an external URL
            // ),
            array(
                'name'                  => 'Master Slider', // The plugin name
                'slug'                  => 'masterslider', // The plugin slug (typically the folder name)
                'source'                => get_template_directory() . '/includes/admin/plugins/masterslider.zip', // The plugin source
                'required'              => true, // If false, the plugin is only 'recommended' instead of required
                'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'                  => 'Envato Wordpress Toolkit', // The plugin name
                'slug'                  => 'envato-toolkit', // The plugin slug (typically the folder name)
                'source'                => get_template_directory() . '/includes/admin/plugins/envato-toolkit.zip', // The plugin source
                'required'              => false, // If false, the plugin is only 'recommended' instead of required
                'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'                  => 'Contact Form 7', // The plugin name
                'slug'                  => 'contact-form-7', // The plugin slug (typically the folder name)
                'required'              => false, // If false, the plugin is only 'recommended' instead of required
            )
        );


        /**
         * Array of configuration settings. Amend each line as needed.
         * If you want the default strings to be available under your own theme domain,
         * leave the strings uncommented.
         * Some of the strings are added into a sprintf, so see the comments at the
         * end of each line for what each argument will be.
         */
        $config = array(
            //'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
            'default_path' => '', // Default absolute path to pre-packaged plugins
            'parent_slug' => 'admin.php', // Default parent menu slug
            'menu' => 'dahz-addons', // Menu slug
            'has_notices' => true, // Show admin notices or not
            'is_automatic' => false, // Automatically activate plugins after installation or not
            'message' => '', // Message to output right before the plugins table
        );

        tgmpa( $plugins, $config );
    }

}
add_action( 'tgmpa_register', 'df_register_required_plugins' );
