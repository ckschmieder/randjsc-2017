<?php
$_is_customizing    	  = is_customize_preview();
$search_header			  = df_options( 'show_header_search', dahz_get_default( 'show_header_search' ) );
$off_canvas			  	  = df_options( 'show_offcanvas', dahz_get_default( 'show_offcanvas' ) );

$inline_header_search_css = $inline_offcanvas_css = $inline_wpml_icon_css = '';
$show_header_search       = $search_header == 1;
$show_offcanvas 	      = $off_canvas == 1;
// $show_wpml_icon 	      = ( $df_options[ 'show_wpml_icon' ] == 1 );

if( $_is_customizing ){
	$show_header_search = $show_offcanvas = true;
	// $show_wpml_icon = true;
	$inline_header_search_css = $search_header == 1 ? 'style=display:inline-block;' : 'style=display:none;';
	$inline_offcanvas_css     = $off_canvas == 1 ? 'style=display:inline-block;' : 'style=display:none;';
	// $inline_wpml_icon_css     = ( $df_options['show_wpml_icon'] == 1 ) ? 'style=display:inline-block;' : 'style=display:none;';
}

?>

<ul>

    <?php //if( $show_wpml_icon ):  ?>
<!--
    	<li class="wpml-languages" <?php //echo esc_attr( $inline_wpml_icon_css ); ?>><i class="md-public"></i></a>
    		<ul class="languages-list sub-nav">
    			<?php //echo language_selector_flags(); ?>
    		</ul>
    	</li> -->

    <?php //endif; ?>

	<?php if( $show_header_search ): ?>

		<li class="df-ajax-search" <?php echo esc_attr( $inline_header_search_css ); ?>><i class="md-search"></i></li>

	<?php endif; ?>

	<?php if( $show_offcanvas ): ?>

			<li class="df-menu-off-canvas" <?php echo esc_attr( $inline_offcanvas_css ); ?>><i class="md-menu"></i></li>
	<?php else: ?>
			<li class="df-menu-off-canvas df-mobile-off-canvas"><i class="md-menu"></i></li>
	<?php endif; ?>

</ul>
