<?php

$dir_path 		= get_template_directory();
$admin_dir 		= $dir_path . '/includes/admin';
$customizer_dir = $dir_path . '/includes/customizer';
$modules_dir 	= $dir_path . '/includes/modules';
$functions_dir 	= $dir_path . '/includes/admin/functions';

// DahzFramework Core Admin Initialization
require_once ( trailingslashit( $dir_path ) . 'dahz/admin-init.php' );
new Dahz();

/* ----------------------------------------------------------------------------------- */
/* Load the theme-specific files.													   */
/* ----------------------------------------------------------------------------------- */

require $functions_dir . '/conditionals.php'; // Conditionals
require $customizer_dir . '/bundled.php'; // Custom panel settings and custom settings theme customizer
require $admin_dir . '/theme-setup.php'; // General Setup

/* ----------------------------------------------------------------------------------- */
/* Load all files in function folder.                                                  */
/* ----------------------------------------------------------------------------------- */
// tmp
require $functions_dir . '/templates/template-post.php';
require $functions_dir . '/templates/template-media.php';
require $functions_dir . '/templates/template-tags.php';
// ctnt
require $functions_dir . '/contents/content-classes.php';
require $functions_dir . '/contents/content-blog.php';
require $functions_dir . '/contents/content-formats.php';
require $functions_dir . '/contents/content-image.php';
require $functions_dir . '/admin-screen.php';
require $functions_dir . '/utilities.php';
require $functions_dir . '/paginations.php';
require $functions_dir . '/custom-attribute.php';
require $functions_dir . '/page-loader-function.php';
require $functions_dir . '/df-like.class.php';
require $functions_dir . '/title-controller.php';
require $functions_dir . '/navbar-menu.php';

require $admin_dir . '/theme-comments.php'; // Custom comments/pingback loop
require $admin_dir . '/theme-enqueue.php'; // Load Stylesheet & JavaScript via wp_enqueue_script
require $admin_dir . '/theme-extensions.php'; // Load all various of plugin integrations
require $admin_dir . '/theme-sidebar.php'; // Initialize widgetized areas
require $admin_dir . '/theme-widgets.php'; // Theme widgets


/* ----------------------------------------------------------------------------------- */
/* Load the part of modules files.                                                     */
/* ----------------------------------------------------------------------------------- */
require $modules_dir . '/part-header.php' ;
require $modules_dir . '/part-layout.php';
require $modules_dir . '/part-footer.php' ;

/*-----------------------------------------------------------------------------------
* The best and safest way to extend Verko with your own custom functions is to create a child theme.
* You can add functions here but they will be lost on upgrade. If you use a child theme, you are safe!
*-----------------------------------------------------------------------------------*/
