<?php

/**
* Home Screen
*
* @version 2.0.0
* @author Dahz
*/
class Dahz_screen_home extends Dahz_screen_admin_base
{

	function __construct() {
		parent::__construct();

		add_action( 'admin_menu', array( $this, 'admin_menus' ) );

	}

	function admin_menus(){
	   add_menu_page( 'dahzframework', $this->theme_data['theme_name'], 'manage_options', 'dahzframework', array($this, 'home_screen'), NULL, 3 );
	   $home = add_submenu_page( 'dahzframework', $this->theme_data['theme_name'], 'Home', 'manage_options', 'dahzframework', array($this, 'home_screen') );
       do_action( 'dahz_screen_menu' );

       add_action( 'admin_print_styles-'. $home, array( $this, 'admin_css' ) );

	}


	function home_screen() {
		?>
		<div class="wrap home-wrap dahz-wrap">
		<?php $this->_intro(); ?>
		</div>
		<?php
	}

	function _intro() {
		$ct = $this->theme_obj;
		$cf = apply_filters( 'dahz_screen_config', array() );
		$intro = 'Thanks for installing! ' . $ct->display( 'Name' ) . ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis molestias odio,
		 corporis aut nulla fugiat! Distinctio voluptas, maiores eaque?';
		?>
		<div class="dahz-welcome-panel">
		<h2><?php echo sprintf( __( 'Welcome to %s', 'dahztheme' ), '<span class="theme-name">' . $ct->display( 'Name' ) . '</span>' ); ?></h2>
		<div class="theme-badge">
			<img src="<?php echo $cf['theme_badge']; ?>" alt="theme badge">
			<p><?php printf( __( 'Version %s', 'dahztheme' ), '<strong>' . $ct->__get( 'Version' ) . '</strong>' ); ?></p>
		</div>
		<p class="theme-description">
		<?php echo ( $cf['theme_description'] != '' ? $cf['theme_description'] : $intro ); ?>
		</p>
		<?php #$this->_theme_meta(); ?>
		</div>
		<hr>
		<?php $cf['theme_content'] != '' ?  call_user_func( $cf['theme_content'] ) : $this->_theme_content(); ?>
		 <?php
	}

	function _theme_meta() {
		$ct = $this->theme_obj;
		?>
		<ul class="theme-info dahz-theme-info">
			<!-- <li><?php //printf( __( 'Version %s', 'dahztheme' ), '<strong>' . $ct->__get( 'Version' ) . '</strong>' ); ?></li> -->
			<?php
			//if ($ct->parent()) {
			?>
			<!-- <li><?php// printf( __( '%s Version %s', 'dahztheme' ), $ct->parent()->__get( 'Name' ), '<strong>' . $ct->parent()->__get( 'Version' ) . '</strong>' ); ?></li> -->
			<?php
			//}
			if ( current_user_can( 'install_themes' ) ) {
			?>
			<li><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php printf( __( 'Customize %s', 'dahztheme' ), $ct->display( 'Name' ) ); ?></a></li>
			<?php //printf( __( 'DahzFramework %s', 'dahztheme' ), '<strong>' . $this->theme_data['framework_version'] . '</strong>' ); ?>
			<?php
			}
			?>
		</ul>

		<?php
	}

	function _theme_content() {
        ob_start(); ?>
        <div class="row group">
        <div class="col two-col">
        <h3>Title</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis molestias odio, corporis aut nulla fugiat! Distinctio voluptas, maiores eaque?
 		Fuga ea placeat, architecto voluptates reprehenderit. Iure vitae temporibus maiores perspiciatis! </p>
 		</div>
        <div class="col two-col"><h3>Title</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis molestias odio, corporis aut nulla fugiat! Distinctio voluptas, maiores eaque?
 		Fuga ea placeat, architecto voluptates reprehenderit. Iure vitae temporibus maiores perspiciatis! </p></div>
 		</div>

        <div class="stuffbox">
        <div class="row group">
        <div class="col three-col">
        <div class="padded">
        <h3>Title</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis molestias odio, corporis aut nulla fugiat! Distinctio voluptas, maiores eaque?
 		Fuga ea placeat, architecto voluptates reprehenderit. Iure vitae temporibus maiores perspiciatis! </p>
 		</div></div>
        <div class="col three-col"><div class="padded"><h3>Title</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis molestias odio, corporis aut nulla fugiat! Distinctio voluptas, maiores eaque?
 		Fuga ea placeat, architecto voluptates reprehenderit. Iure vitae temporibus maiores perspiciatis! </p></div></div>
        <div class="col three-col"><div class="padded"><h3>Title</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis molestias odio, corporis aut nulla fugiat! Distinctio voluptas, maiores eaque?
 		Fuga ea placeat, architecto voluptates reprehenderit. Iure vitae temporibus maiores perspiciatis! </p></div></div>
 		</div>
 		</div>

 		<div class="row group">
        <div class="col three-col">
        <h3>Title</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis molestias odio, corporis aut nulla fugiat! Distinctio voluptas, maiores eaque?
 		Fuga ea placeat, architecto voluptates reprehenderit. Iure vitae temporibus maiores perspiciatis! </p>
 		</div>
        <div class="col three-col"><h3>Title</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis molestias odio, corporis aut nulla fugiat! Distinctio voluptas, maiores eaque?
 		Fuga ea placeat, architecto voluptates reprehenderit. Iure vitae temporibus maiores perspiciatis! </p></div>
        <div class="col three-col"><h3>Title</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis molestias odio, corporis aut nulla fugiat! Distinctio voluptas, maiores eaque?
 		Fuga ea placeat, architecto voluptates reprehenderit. Iure vitae temporibus maiores perspiciatis! </p></div>
 		</div>
        <?php
        $output = ob_get_contents(); ob_end_clean();
        echo apply_filters('home_screen_content', $output);
	}

}
new Dahz_screen_home();
