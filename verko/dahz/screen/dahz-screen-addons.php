<?php

/**
* Backup Screen
*
* @version 2.0.0
* @author Dahz
*/
class Dahz_screen_addons extends Dahz_screen_admin_base
{

	function __construct() {
		parent::__construct();

		add_action( 'admin_menu', array( $this, 'admin_menus' ) );
	}


	function admin_menus(){
	   $addons = add_submenu_page( 'dahzframework', 'Addons', 'Addons', 'manage_options', 'dahz-addons', array($this, 'addons_screen') );

       add_action( 'admin_print_styles-'. $addons, array( $this, 'admin_css' ) );

	}


	function addons_screen() {
		?>

		  <div class="wrap addons-wrap dahz-wrap">
		  <?php
		  $this->_intro();
		  ?>
		  </div>
		<?php
	}


	function _intro() {
		$ct = $this->theme_obj;
		?>
		<h2><?php printf( __('Extend %s', 'dahztheme'), $ct->display( 'Name' ) ); ?> <span class="dashicons dashicons-admin-plugins"></span></h2>
		<p><?php echo $ct->display( 'Name' ); ?> offers support for several plugins allowing you add advanced functionality at the click of a button.<p>
		<p>To install or activate them, use the actions below.</p>
		<?php
	}

}
new Dahz_screen_addons();
