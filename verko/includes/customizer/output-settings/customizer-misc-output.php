<?php
if (!defined('ABSPATH')) { exit; }

/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/CUSTOMIZER/CUSTOMIZER-MISC-OUTPUT.PHP
 *
 * - Customizer Misc Options CSS Output
 * 	   1. 404 page
 *
  ================================================================================= */
?>

/*==========================================================================================
  404 Page
==========================================================================================*/
<?php if( is_404() ) : ?>

	<?php if( $df_404_bg_image != '' ) : ?>
		body.error404 {
			background: url(<?php echo $df_404_bg_image; ?>) <?php echo $df_404_bg_repeat_options; ?>;
			background-attachment: <?php echo $df_404_bg_att; ?>;
			background-size: <?php echo $df_404_bg_size; ?>;
		}
	<?php endif; ?>

	<?php if( $df_404_bg_color != '' ) : ?>
		body.error404 .site{
			height:100%;
			background-color: <?php echo $df_404_bg_rgba; ?>;
		}
		body.error404.df-boxed-layout-active .site {
			max-width: 100%;
		}
	<?php endif; ?>

	<?php if( $df_content_bg_color != '' ) : ?>
		.error-404 .content-404 {
			background: <?php echo $df_content_bg_rgba ?>;
		}
	<?php endif; ?>

<?php endif; ?>

/*==========================================================================================
  Page Loader
==========================================================================================*/
<?php if( $page_loader ) : ?>
	.ajax_loader {
		background-color: <?php echo $page_loader_bg_color; ?>;
	}
<?php endif; ?>
