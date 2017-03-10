<?php

/**
* Backup Screen
*
* @version 2.0.0
* @author Dahz
*/
class Dahz_screen_backup extends Dahz_screen_admin_base
{

	function __construct() {
		parent::__construct();

		add_action( 'admin_menu', array( $this, 'admin_menus' ) );

	}

	function admin_menus(){
		global $backup;
	   $backup = add_submenu_page( 'dahzframework', 'Backup', 'Backup', 'manage_options', 'dahz-backup', array( $this, 'backup_screen') );

       add_action( 'admin_print_styles-'. $backup, array( $this, 'admin_css') );
       add_action( 'admin_enqueue_scripts', array( $this, 'scripts') );

	}


	function backup_screen() {
		?>

		  <div class="wrap backup-wrap dahz-wrap">
		  <?php $this->_intro();?>
		  <div class="row group">
		  <?php
		  dahz_customizer_import_option_page(); // load from customizer/dahz-customizer-backup.php
		  dahz_customizer_export_option_page(); // load from customizer/dahz-customizer-backup.php
		  ?>
		  </div>
		  </div>
		<?php
	}

	function _intro() {
		?>
		<h2><?php _e( 'Backup Settings', 'dahztheme' ); ?> <span class="dashicons dashicons-backup"></span></h2>
		<?php
	}

	function scripts( $hook ){
		global $backup;
		if ( $hook != $backup ) {
			return;
		}
    wp_enqueue_script( 'dahz-screen-backup', DF_CORE_JS_DIR . 'backup.js', array('jquery'), '28042014', true );
	}

}
new Dahz_screen_backup();
