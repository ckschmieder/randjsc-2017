<?php
if (!defined('ABSPATH')) { exit; }

/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/CUSTOMIZER/CUSTOMIZER-GENERAL-OUTPUT.PHP
 *
 * - Customizer General Options CSS Output
 *    1. Site Layout
 *
  ================================================================================= */
?>

/*============================================================
  Site Layout
=============================================================*/
<?php $m_w = 100 - 2.5;  ?>
.df_container-fluid.fluid-max{
max-width:<?php echo round ( $df_site_max_width * ($m_w / 100) ) . 'px'; ?>;}

<?php if ( $df_layout_site == 'boxed' ) : ?>
.df-boxed-layout-active .site,
.df-navibar.df_container-fluid.fluid-max,
.df-boxed-layout-active .df-topbar,
.df-boxed-layout-active .site-header{
max-width: <?php echo $df_site_max_width + 15 . 'px'; ?>;
}
.df-boxed-layout-active .df-topbar,
.df-boxed-layout-active .site-header{
	margin:0 auto;
}
<?php endif; ?>
