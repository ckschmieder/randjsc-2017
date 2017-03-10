<?php
$df_header_inner_classes = implode( " ", apply_filters('df_header_inner_classes', array('df-header-inner' ,'df_container-fluid', 'fluid-width', 'fluid-max') ) );
$df_header_navbar_pos = df_options( 'header_navbar_position', dahz_get_default( 'header_navbar_position' ) );
?>
<div class="menu-section">

<?php dahz_get_header( 'topbar' ); // Loads the includes/templates/header/topbar.php template. ?>

<header <?php dahz_attr( 'header' ); ?> class="site-header">

	<div class="<?php echo esc_attr( $df_header_inner_classes ) ?> col-full hide">
  <?php
   if ( isset( $_GET['header-navbar-center'] ) || 'center' == $df_header_navbar_pos ){
			get_template_part( 'includes/templates/global/navbar/_navbar', esc_attr( 'center' ) );
	 } elseif( isset( $_GET['header-navbar-split'] ) || 'split' == $df_header_navbar_pos ){
		 	get_template_part( 'includes/templates/global/navbar/_navbar', esc_attr( 'split' ) );
	 } else {
		 	get_template_part( 'includes/templates/global/navbar/_navbar', esc_attr( 'left' ) );
	 }
	?>

	</div><!-- end of df-header-inner -->

</header><!-- end of header -->

</div>
