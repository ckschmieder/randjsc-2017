<?php
if (!defined('ABSPATH')) { exit; }

/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/CUSTOMIZER/CUSTOMIZER-BUTTON-OUTPUT.PHP
 *
 * - Customizer Button Options CSS Output
 *
  ================================================================================= */
?>

<?php if($df_btn_style == 'flat') : ?>

	<?php if( $df_btn_text_color != '' ) : ?>
	/*==========================================================================================
		Button Color
	==========================================================================================*/
	.df_button_flat .button, .df_button_flat button, .df_button_flat input[type="submit"],
	.df_button_flat input[type="reset"], .df_button_flat input[type="button"]
	<?php if( $pagination_switcher == 'infinite_button' ) : ?>
		, .df_button_flat .nav-next.button
	<?php endif; ?>
	{
		color:<?php echo $df_btn_text_color; ?>;
		<?php if( $df_btn_border_color != '' ) : ?>
			border-color:<?php echo $df_btn_border_color; ?>;
		<?php endif; ?>
		<?php if( $df_btn_bg_color != '' ) : ?>
			background:<?php echo $df_btn_bg_color; ?>;
		<?php endif; ?>
	}
	<?php if( $pagination_switcher == 'infinite_button' ) : ?>
		.df_button_flat .nav-next.button a {
			color:<?php echo $df_btn_text_color; ?>;
		}
	<?php endif; ?>

	<?php endif; ?>


	<?php if( $df_btn_text_color_hover != '' ) : ?>
	/*==========================================================================================
		Button Color Hover
	==========================================================================================*/
	.df_button_flat .button:hover, .df_button_flat button:hover, .df_button_flat input[type="submit"]:hover,
	.df_button_flat input[type="reset"]:hover, .df_button_flat input[type="button"]:hover
	<?php if( $pagination_switcher == 'infinite_button' ) : ?>
		, .df_button_flat .nav-next.button:hover, .df_button_flat .nav-next.disable
	<?php endif; ?>
	{
		color:<?php echo $df_btn_text_color_hover; ?>;
		<?php if( $df_btn_border_color_hover != '' ) : ?>
			border-color:<?php echo $df_btn_border_color_hover; ?>;
		<?php endif; ?>
		<?php if( $df_btn_bg_color_hover != '' ) : ?>
			background:<?php echo $df_btn_bg_color_hover; ?>;
		<?php endif; ?>
	}

	<?php if( $pagination_switcher == 'infinite_button' ) : ?>
		.df_button_flat .nav-next.button:hover a, .df_button_flat .nav-next.disable {
			color:<?php echo $df_btn_text_color_hover; ?>;
		}
	<?php endif; ?>

	<?php endif; ?>

<?php elseif($df_btn_style == '3d') : ?>

	<?php if( $df_btn_text_color != '' ) : ?>
	/*==========================================================================================
		Button Color
	==========================================================================================*/
	.df_button_3d .button, .df_button_3d button, .df_button_3d input[type="submit"],
	.df_button_3d input[type="reset"], .df_button_3d input[type="button"]
	<?php if( $pagination_switcher == 'infinite_button' ) : ?>
		, .df_button_3d .nav-next.button
	<?php endif; ?>
	{
		color: <?php echo $df_btn_text_color; ?>;
		<?php if( $df_btn_bg_color != '' ) : ?>
			background: <?php echo $df_btn_bg_color; ?>;
		<?php endif; ?>
		<?php if( $df_btn_border_color != '' ) : ?>
			border-color: <?php echo $df_btn_border_color; ?>;
		<?php endif; ?>
		<?php if( $df_btn_bottom_color != '' ) : ?>
			box-shadow:0px 6px <?php echo $df_btn_bottom_color; ?>;
			-webkit-box-shadow:0px 6px <?php echo $df_btn_bottom_color; ?>;
			-moz-box-shadow:0px 6px <?php echo $df_btn_bottom_color; ?>;
			-ms-box-shadow:0px 6px <?php echo $df_btn_bottom_color; ?>;
			-o-box-shadow:0px 6px <?php echo $df_btn_bottom_color; ?>;
		<?php endif; ?>
	}
	<?php if( $pagination_switcher == 'infinite_button' ) : ?>
		.df_button_3d .nav-next.button a {
			color: <?php echo $df_btn_text_color; ?>;
		}
	<?php endif; ?>

	<?php endif; ?>

	<?php if( $df_btn_text_color_hover != '' ) : ?>
	/*==========================================================================================
		Button Color Hover
	==========================================================================================*/
	.df_button_3d .button:hover, .df_button_3d button:hover, .df_button_3d input[type="submit"]:hover,
	.df_button_3d input[type="reset"]:hover, .df_button_3d input[type="button"]:hover
	<?php if( $pagination_switcher == 'infinite_button' ) : ?>
		, .df_button_3d .nav-next.button:hover, .df_button_3d .nav-next.disable
	<?php endif; ?>
	{
		color: <?php echo $df_btn_text_color_hover; ?>;
		<?php if( $df_btn_bg_color_hover != '' ) : ?>
			background: <?php echo $df_btn_bg_color_hover; ?>;
		<?php endif; ?>
		<?php if( $df_btn_border_color_hover != '' ) : ?>
			border-color: <?php echo $df_btn_border_color_hover; ?>;
		<?php endif; ?>
		<?php if( $df_btn_bottom_hover_color != '' ) : ?>
			box-shadow:0px 6px <?php echo $df_btn_bottom_hover_color; ?>;
			-webkit-box-shadow:0px 3px <?php echo $df_btn_bottom_hover_color; ?>;
			-moz-box-shadow:0px 3px <?php echo $df_btn_bottom_hover_color; ?>;
			-ms-box-shadow:0px 3px <?php echo $df_btn_bottom_hover_color; ?>;
			-o-box-shadow:0px 3px <?php echo $df_btn_bottom_hover_color; ?>;
		<?php endif; ?>
	}

	<?php if( $pagination_switcher == 'infinite_button' ) : ?>
		.df_button_3d .nav-next.button:hover a, .df_button_3d .nav-next.disable {
			color: <?php echo $df_btn_text_color_hover; ?>;
		}
	<?php endif; ?>

	<?php endif; ?>

<?php elseif($df_btn_style == 'outline') : ?>

	<?php if( $df_btn_text_color != '' ) : ?>
	/*==========================================================================================
		Button Color
	==========================================================================================*/
	.df_button_outline .button, .df_button_outline button, .df_button_outline input[type="submit"],
	.df_button_outline input[type="reset"], .df_button_outline input[type="button"]
	<?php if( $pagination_switcher == 'infinite_button' ) : ?>
		, .df_button_outline .nav-next.button
	<?php endif; ?>
	{
		background:transparent;
		color: <?php echo $df_btn_text_color; ?>;
		<?php if( $df_btn_border_color != '' ) : ?>
			border:1px solid <?php echo $df_btn_border_color; ?>;
		<?php endif; ?>
	}

	<?php if( $pagination_switcher == 'infinite_button' ) : ?>
		.df_button_outline .nav-next.button a {
			color: <?php echo $df_btn_text_color; ?>;
		}
	<?php endif; ?>

	<?php endif; ?>

	<?php if( $df_btn_text_color_hover != '' ) : ?>
	/*==========================================================================================
		Button Color Hover
	==========================================================================================*/
	.df_button_outline .button:hover, .df_button_outline button:hover, .df_button_outline input[type="submit"]:hover,
	.df_button_outline input[type="reset"]:hover, .df_button_outline input[type="button"]:hover
	<?php if( $pagination_switcher == 'infinite_button' ) : ?>
		, .df_button_outline .nav-next.button:hover, .df_button_outline .nav-next.disable
	<?php endif; ?>
	{
		background:transparent;
		color: <?php echo $df_btn_text_color_hover; ?>;
		<?php if( $df_btn_border_color_hover != '' ) : ?>
			border:1px solid <?php echo $df_btn_border_color_hover; ?>;
		<?php endif; ?>
	}

	<?php if( $pagination_switcher == 'infinite_button' ) : ?>
		.df_button_outline .nav-next.button:hover a, .df_button_outline .nav-next.disable {
			color: <?php echo $df_btn_text_color; ?>;
		}
	<?php endif; ?>

	<?php endif; ?>

<?php endif; ?>


<?php if ( class_exists( 'df_Shortcodes' ) ) : ?>
	<?php if( $df_btn_text_color != '' ) : ?>
		/*==========================================================================================
			Button Color shortcode
		==========================================================================================*/
	 	.wpb_inherit, .vc_btn3-color-inherit
		{
			color:<?php echo $df_btn_text_color; ?>!important;
			<?php if( $df_btn_border_color != '' ) : ?>
				border-color:<?php echo $df_btn_border_color; ?>!important;
			<?php endif; ?>
			<?php if( $df_btn_bg_color != '' ) : ?>
				background:<?php echo $df_btn_bg_color; ?>!important;
			<?php endif; ?>
		}
	<?php endif; ?>
	<?php if( $df_btn_text_color_hover != '' ) : ?>
		/*==========================================================================================
			Button Color Hover shortcode
		==========================================================================================*/
	 	.wpb_inherit:hover, .vc_btn3-color-inherit:hover
		{
			color:<?php echo $df_btn_text_color_hover; ?>!important;
			<?php if( $df_btn_border_color_hover != '' ) : ?>
				border-color:<?php echo $df_btn_border_color_hover; ?>!important;
			<?php endif; ?>
			<?php if( $df_btn_bg_color_hover != '' ) : ?>
				background:<?php echo $df_btn_bg_color_hover; ?>!important;
			<?php endif; ?>
		}
	<?php endif; ?>
<?php endif; ?>


