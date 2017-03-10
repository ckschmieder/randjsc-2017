<div class="col-left">
 <?php dahz_get_header( 'branding' ); // Loads the includes/templates/header/branding.php template. ?>
</div>
<div class="col-right site-misc-tools">
	<?php dahz_get_header( 'misc' ) // Loads the includes/templates/header/misc.php template. ?>
</div> 
<div class="<?php echo esc_attr( implode( " ", apply_filters( 'df_menu_alignment', array('menu-align') ) ) ) ?>"> 
 <?php dahz_get_menu( 'primary' ); // Loads the includes/templates/menu/primary.php template. ?>
</div>