<?php
$df_footer_text = df_options( 'copyright_content', dahz_get_default( 'copyright_content' ) );
$df_cf_bg_image	= df_options( 'copyright_footer_image_bg', dahz_get_default( 'copyright_footer_image_bg' ) );

if ( function_exists( 'icl_register_string' ) ) {
	icl_register_string( 'Footer Content', 'footer text – ' . $df_footer_text, $df_footer_text );
}

$icl_t = function_exists( 'icl_t' );

$footer_text = $icl_t ? icl_t( 'Footer Content', 'footer text – ' . $df_footer_text, $df_footer_text ) : $df_footer_text;
?>

<?php if ( $df_cf_bg_image != '' ) : ?>
	<div class="df-wrapper-footer">
<?php endif; ?>

<footer <?php dahz_attr( 'footer' ); ?> class="df-footer">

	<div class="df_container-fluid fluid-width fluid-max">

		<div class="siteinfo col-full">

			<?php if( $footer_text == '' ) : ?>

			    <p><?php echo sprintf( '%1$s %4$s %3$s %2$s', __("Copyright &copy; ", 'dahztheme') . date( 'Y' ), get_bloginfo( 'name' ) . '.', __( 'All Rights Reserved.', 'dahztheme' ), 'DAHZ' ); ?></p>

			<?php else: ?>

				<?php echo do_shortcode( $footer_text ); ?>

			<?php endif; ?>

		</div><!-- end of site info -->

	</div>

</footer><!-- end of footer -->

<?php if ( $df_cf_bg_image != '' ) : ?>
	</div>
<?php endif; ?>

<!-- Back To Top  -->
<a class="scroll-top anchor hide" href="#wrapper" title="Back to Top">
	<i class="md-arrow-forward md-rotate-270"></i>
</a>