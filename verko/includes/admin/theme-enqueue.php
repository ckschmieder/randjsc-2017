<?php
if ( !defined('ABSPATH') ){
 exit; 
}
/* ----------------------------------------------------------------------------------- */
/* Load all files in enqueue folder.                                                  */
/* ----------------------------------------------------------------------------------- */

require_once get_template_directory() . '/includes/admin/enqueue/styles.php'; // Loads the includes/admin/enqueue/styles.php .
require_once get_template_directory() . '/includes/admin/enqueue/scripts.php'; // Loads the includes/admin/enqueue/scripts.php .
require_once get_template_directory() . '/includes/admin/enqueue/localize.php'; // Loads the includes/admin/enqueue/localize.php .


