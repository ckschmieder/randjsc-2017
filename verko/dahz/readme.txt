** DahzFramework Changelog **

Version 2.2.0
* Removed: selectbox custom control
* Removed: tooltip description
* Added: autoloader callback.
* Added: customizer default filter dahz_get_option_default( $setting )
* Changed : Renaming file in folder customizer.
* Changed: customizer custom control filename.

Version 2.1.2
* Removed: return of array wp_parse_args()
* Removed: textarea custom control now it's introduce in WP 4.1
* Changed: use object class admin-init.php.
* Added: $option_control_parameters containing an array option customizer ( customizer/dahz-customizer-builder.php )

Version 2.1.1
* added: typography customizer control type
* added: class Dahz_Sanitization_Helper
* Removed: File ( customizer/dahz-customizer-controls.php, customizer/dahz-customizer-settings.php )

Version 2.1.0
* added: after_setup_theme admin screen and customizer control
* changed: for template.php use folder templates
* Fixed: rendering customizer control dropdown
* Updated: semantic-ui transition javascript & css

Version 2.0.0
* added: use call_user_func() for callback theme content admin home screen.
* added: data-head.php more cleanup output site data to head.
* added: li0n.php for Localization.
* added: support custom css section for theme.
* added: prefix class Dahz_ (folder customizer/*, screen/*).
* added: Admin Screen Branding.
* added: register_control_type in some customizer custom control.
* added: new method content_template in customizer custom control.
* added: apply_filters('df_options_default_setting'), by making the return valuable filterable, the Theme defaults can be easily overridden by a Child Theme or Plugin.
* updated: get-the-image.php extensions.
* removed: dahz_meta() function deprecated.

Version 1.5.0
* added $control['id'] control customizer
* added sanitize callback for theme customizer
* added file dahz/customizer/dahz-customizer-scripts.php
* added file dahz/customizer/dahz-customizer-options.php
* added file dahz/customizer/helpers/sanitization.php
* remove rwmb-metabox from folder core use plugin instead.

Version 1.4.0
 * Set breadcrumbs to class function

Version 1.3.1
 * update empty option automatically when theme activate. (dahz/customizer/admin-customizer.php)
 * add function array_of_control use the default WordPress Core Customizer fields when possible and only add our own custom controls when needed. (dahz/customizer/controls/class-DahzFramework_Controls.php)
 * return bool doing ajax when theme is customizing

Version 1.3.0
 * add backward compatibilty wp_title()
 * add extensions folder
 * add customizer radiobox custom control
 * add customizer checkbox custom control
 * add customizer selectbox custom control
 * add post format function
 * add helper function for getting the script/style `.min` function
 * add function df_is_customizing() checks if is customizing : two contexts, admin and front (preview frame)
 * deprecated function df_get_template use dahz_get_template for global template part
 * Update rwmb-metabox 4.4.1

Version 1.2.0
 * Add Theme Customizer controls
 * Fixed customizer backup
 * Update rwmb-metabox 4.3.11

2014.11.01 - Version 1.1.0
 * Add global options admin-customizer.php
 * Use update_option when importing theme customizer.
 * Adds the default framework actions and filters.

2014.03.01 - Version 1.0.0
 * First Logged release
