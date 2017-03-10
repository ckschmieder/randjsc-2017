<?php

$topbar                   = df_options( 'header_topbar', dahz_get_default( 'header_topbar' ) );
$df_header_topbar_classes = implode( " ", apply_filters('df_header_topbar_classes', array('df_container-fluid', 'fluid-width', 'fluid-max') ) );
//if is Customizing run this
$_is_customizing          = is_customize_preview();
$header_topbar            = $topbar == 1;
$inline_css = '' ;
if( $_is_customizing ){
    $header_topbar = true ;
    $inline_css    = $topbar == 1 ? 'style="display:block;"' : 'style="display:none;"';
}

// TODO : Create Ads.
if( $header_topbar ): ?>

<div class="df-topbar" <?php echo esc_attr( $inline_css ); ?>>
  <div class="<?php echo esc_attr( $df_header_topbar_classes ) ?> col-full">
    <div class="df-topbar-left col-left">

          <?php
           $df_topbar_content = df_options( 'header_topbar_content', dahz_get_default( 'header_topbar_content' ) );
           if ( function_exists( 'icl_register_string' ) ) { icl_register_string( 'Dahz Topbar Content', 'topbar text – ' . $df_topbar_content, $df_topbar_content ); }
              $icl_t = function_exists( 'icl_t' );
              $topbar_text = $icl_t ? icl_t( 'Dahz Topbar Content', 'topbar text – ' . $df_topbar_content, $df_topbar_content) : $df_topbar_content;
            if ( $df_topbar_content != '' ) : ?>
            <p class="info-description">
            <?php echo do_shortcode( $topbar_text ); ?>
            </p>
            <?php endif; ?>

      </div>

      <div class="df-topbar-right col-right">

            <?php dahz_get_menu( 'top' ); ?>

            <?php df_social_connect(); ?>

      </div>
  </div>
</div>

<?php endif; ?>
