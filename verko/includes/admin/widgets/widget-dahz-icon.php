<?php
// File Security Check
if (!defined('ABSPATH')) { exit; }

class Dahz_Widget_Icon extends WP_Widget {
  private $max_custom = 10;

	/* ----------------------------------------
      Constructor.
      ----------------------------------------

     * The constructor. Sets up the widget.
      ---------------------------------------- */
	function Dahz_Widget_Icon() {
		/* Widget settings. */
        $widget_ops = array('classname' => 'icon-widget', 'description' => __('This is a DahzFramework standardized widget to add any type of Fontawesome Icons or Material Design Iconic Font as a widget.', 'dahztheme'));

        /* Widget control settings. */
        $control_ops = array('width' => 250, 'height' => 350, 'id_base' => 'icon-widget');

        /* Create the widget. */
        WP_Widget::__construct('icon-widget', __('DF Widget - Icon Widget', 'dahztheme'), $widget_ops, $control_ops);
	} // End Constructor

	/* ----------------------------------------
      widget()
      ----------------------------------------

     * Displays the widget on the frontend.
      ---------------------------------------- */
	function widget($args, $instance) {
    $html   = '';
    extract($args, EXTR_SKIP);

    $title        = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base );
    $custom_count = $instance['custom_count'];

    echo $before_widget;

    /* Display the widget title if one was input (before and after defined by themes). */
    if ( $title ) {
        echo $before_title . esc_attr( $title ) . $after_title;
    } // End IF Statement

      $html .= '<ul>';

        for($i=1; $i<=$custom_count; $i++):
          $name = isset($instance["custom_name"][$i]) ? $instance["custom_name"][$i] : '';
          $icon = isset($instance["custom_icon"][$i]) ? $instance["custom_icon"][$i] : '';
          $link = isset($instance["custom_url"][$i]) ? $instance["custom_url"][$i] : '#';

          $html .= '<li>';
          $html .= '<a href="' . esc_url( $link ) . '" rel="nofollow" target="_blank" title="' . esc_attr( $name ) . '">';
          $html .= '<i class="' . esc_attr( $icon ) . ' fa-2x"></i><span>' . esc_attr( $name ) . '</span>';
          $html .= '</a>';
          $html .= '</li>';
        endfor;

      $html .= '</ul>';

    echo $html;

    echo $after_widget;
	} // End widget()

	/* ----------------------------------------
      update()
      ----------------------------------------

     * Function to update the settings from
     * the form() function.

     * Params:
     * - Array $new_instance
     * - Array $old_instance
      ---------------------------------------- */
	function update($new_instance, $old_instance) {
		$instance                 = $old_instance;
    $instance['title']        = strip_tags( $new_instance['title'] );
    $instance['custom_count'] = (int)$new_instance['custom_count'];

    for ( $i=1; $i<=$instance['custom_count']; $i++ ) {
      $instance["custom_name"][$i]  = strip_tags( $new_instance["custom_name_$i"] );
      $instance["custom_url"][$i]   = strip_tags( $new_instance["custom_url_$i"] );
      $instance["custom_icon"][$i]  = strip_tags( $new_instance["custom_icon_$i"] );
    }
    return $instance;
	} // End update()

	/* ----------------------------------------
      form()
      ----------------------------------------

     * The form on the widget control in the
     * widget administration area.

     * Make use of the get_field_id() and
     * get_field_name() function when creating
     * your form elements. This handles the confusing stuff.

     * Params:
     * - Array $instance
      ---------------------------------------- */
	function form($instance) {

      $title        = isset($instance['title']) ? esc_attr( $instance['title'] ) : '';
      $custom_count = isset($instance['custom_count']) ? absint( $instance['custom_count'] ) : 0;

      for ( $i = 1; $i <= $this->max_custom; $i++ ) {
          $custom_names[$i]   = isset($instance['custom_name'][$i]) ? $instance['custom_name'][$i] : '';
          $custom_urls[$i]    = isset($instance['custom_url'][$i]) ? $instance['custom_url'][$i] : 'https://';
          $custom_icons[$i]   = isset($instance['custom_icon'][$i]) ? $instance['custom_icon'][$i] : 'fa fa-pencil or md-3d-rotation';
      } ?>

      <p>
          <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'dahztheme' ); ?></label>
          <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
      </p>

      <p>
          <label for="<?php echo esc_attr( $this->get_field_id( 'custom_count' ) ); ?>"><?php _e( 'How many links to show?', 'dahztheme' ); ?></label>
          <select id="<?php echo esc_attr( $this->get_field_id( 'custom_count' ) ); ?>" class="num_shown" name="<?php echo esc_attr( $this->get_field_name( 'custom_count' ) ); ?>">
              <option <?php selected( 0, $custom_count ) ?>>0</option>
              <?php for ( $i=1; $i<=$this->max_custom; $i++ ): ?>
                <option <?php selected( $i, $custom_count ) ?>><?php echo intval( $i ) ?></option>
              <?php endfor ?>
          </select>
      </p>

      <div class="hidden_wrap">
          <?php for ( $i=1; $i <= $this->max_custom; $i++ ):
              $custom_name  = "custom_name_$i";
              $custom_url   = "custom_url_$i";
              $custom_icon  = "custom_icon_$i"; ?>

              <div class="hidden_el" <?php if ( $i > $custom_count ):?>style="display:none"<?php endif; ?>>

                  <p>
                      <label for="<?php echo esc_attr( $this->get_field_id( $custom_name ) ); ?>"><?php printf( __( 'Name %d:', 'dahztheme' ) , $i ); ?></label>
                      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $custom_name ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $custom_name ) ); ?>" type="text" value="<?php echo esc_attr( $custom_names[$i] ); ?>" />
                  </p>

                  <p>
                      <label for="<?php echo esc_attr( $this->get_field_id( $custom_url ) ); ?>"><?php printf( __( 'URL %d:', 'dahztheme' ) , $i ); ?></label>
                      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $custom_url ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $custom_url ) ); ?>" type="text" value="<?php echo esc_attr( $custom_urls[$i] ); ?>" />
                  </p>

                  <p>
                      <label for="<?php echo esc_attr( $this->get_field_id( $custom_icon ) ); ?>"><?php printf( __( 'Icon %d:', 'dahztheme' ) , $i ); ?></label><br />
                      <small><?php printf( __( 'Manually select from the %1$s or %2$s websites', 'dahztheme'), '<a href="http://fontawesome.io/icons/" target="_blank">FontAwesome</a>', '<a href="http://zavoloklom.github.io/material-design-iconic-font/icons.html" target="_blank">Material Design Iconic Font</a>' ); ?>.</small>
                      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $custom_icon ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $custom_icon ) ); ?>" type="text" value="<?php echo esc_attr( $custom_icons[$i] ); ?>" />
                  </p>

              </div>

          <?php endfor; ?>
      </div>

      <script>
        (function($) {
          $(document).on('change', '.num_shown', function() {
            var wrap = $(this).closest('p').siblings('.hidden_wrap');
            wrap.children('div').hide();
            $('.hidden_el:lt(' + $(this).val() + ')', wrap).show();
          });
        })(jQuery);
      </script>

<?php } // End form()
}

/* ----------------------------------------
  Register the widget on `widgets_init`.
  ----------------------------------------

 * Registers this widget.
  ---------------------------------------- */

add_action( 'widgets_init', create_function( '', 'return register_widget( "Dahz_Widget_Icon" );' ), 1 );