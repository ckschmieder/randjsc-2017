<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head <?php dahz_attr('head'); ?>>

	<?php wp_head(); ?>

</head>

<?php do_action( '__before_body' ); ?>

<body <?php dahz_attr('body'); ?>>

	<?php do_action('__before_wrapper'); ?>

	<div id="wrapper" class="hfeed site pusher">

		<?php do_action('__header'); ?>
