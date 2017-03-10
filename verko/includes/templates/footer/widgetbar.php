<?php
$col_primary  = df_options('primary_footer_widget_columns', dahz_get_default( 'primary_footer_widget_columns' ) );

if( $col_primary != '0' ) :
?>

<div class="footer-widgets-wrapper">

<?php if ( is_numeric( $col_primary ) != 0 ) : ?>

    <div class="footer-primary-widgets col-full">

        <div class="df_container-fluid fluid-width fluid-max">

            <div class="df_row-fluid">

              <?php $i = 0; while ( $i < $col_primary ) : $i++;
                        switch ( $col_primary ) {
                            case 4 : $span = 'df_span-xs-12 df_span-sm-3';  break;
                            case 3 : $span = 'df_span-xs-12 df_span-sm-4';  break;
                            case 2 : $span = 'df_span-xs-12 df_span-sm-6';  break;
                            case 1 : $span = 'df_span-sm-12'; break;
                        }
                    echo '<div class="' . esc_attr( $span ) . '">';
                        dynamic_sidebar( 'footer-' . $i );
                    echo '</div>';
                    endwhile; ?>

            </div> <!-- end .df_row-fluid -->

        </div> <!-- end .df_container-fluid -->

    </div><!-- .footer-primary-widgets -->

<?php else: ?>

    <div class="footer-primary-widgets col-full">

        <div class="df_container-fluid fluid-width fluid-max">

            <div class="df_row-fluid">

              <?php switch ( $col_primary ) {
                  case 'half_third' : ?>
                      <div class="df_span-xs-12 df_span-sm-6">
                          <?php dynamic_sidebar( 'footer-1');?>
                      </div>

                      <div class="df_span-xs-12 df_span-sm-2">
                          <?php dynamic_sidebar( 'footer-2' );?>
                      </div>

                      <div class="df_span-xs-12 df_span-sm-2">
                          <?php dynamic_sidebar( 'footer-3' );?>
                      </div>

                      <div class="df_span-xs-12 df_span-sm-2">
                          <?php dynamic_sidebar( 'footer-4' );?>
                      </div>

              <?php break;
                  case 'half_two' : ?>
                      <div class="df_span-xs-12 df_span-sm-6">
                          <?php dynamic_sidebar( 'footer-1');?>
                      </div>

                      <div class="df_span-xs-12 df_span-sm-3">
                          <?php dynamic_sidebar( 'footer-2' );?>
                      </div>

                      <div class="df_span-xs-12 df_span-sm-3">
                          <?php dynamic_sidebar( 'footer-3' );?>
                      </div>

              <?php break;
                  case 'third_half_third' : ?>

                      <div class="df_span-xs-12 df_span-sm-3">
                          <?php dynamic_sidebar( 'footer-1' );?>
                      </div>

                      <div class="df_span-xs-12 df_span-sm-6">
                          <?php dynamic_sidebar( 'footer-2' );?>
                      </div>

                      <div class="df_span-xs-12 df_span-sm-3">
                          <?php dynamic_sidebar( 'footer-3' );?>
                      </div>
              <?php break;

            } ?>

            </div> <!-- end .df_row-fluid -->

        </div> <!-- end .df_container-fluid -->

    </div><!-- .footer-primary-widgets -->

<?php endif; ?>
</div>
<?php endif; ?>