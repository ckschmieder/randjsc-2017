<?php
if (!defined('ABSPATH')) { exit; }

/* -----------------------------------------------------------------------------------

  TABLE OF CONTENTS

  - function (constructor)
  - function widget ()
  - function update ()
  - function form ()

  - Register the widget on `widgets_init`.

  ----------------------------------------------------------------------------------- */

class Dahz_Widget_Subscribe extends WP_Widget {
    /* ----------------------------------------
      Constructor.
      ----------------------------------------

     * The constructor. Sets up the widget.
      ---------------------------------------- */

    function Dahz_Widget_Subscribe() {

        /* Widget settings. */
        $widget_ops = array('classname' => 'widget_dahz_subscribe', 'description' => __('This is a DahzFramework standardized Add a connect widget.', 'dahztheme'));

        /* Widget control settings. */
        $control_ops = array('width' => 250, 'height' => 350, 'id_base' => 'dahz_subscribe');

        /* Create the widget. */
        WP_Widget::__construct('dahz_subscribe', __('DF Widget - Connect', 'dahztheme'), $widget_ops, $control_ops);
    }

// End Constructor

    /* ----------------------------------------
      widget()
      ----------------------------------------

     * Displays the widget on the frontend.
      ---------------------------------------- */

    function widget($args, $instance) {
        extract($args, EXTR_SKIP);

        // $social_big = '';

        /* Our variables from the widget settings. */
        $title = (!empty($instance['title']) ) ? $instance['title'] : __('Connect', 'dahztheme');

        /** This filter is documented in wp-includes/default-widgets.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base);

        $social_big = isset( $instance['social_big'] ) ? $instance['social_big'] : false;

        /* Before widget (defined by themes). */
        echo $before_widget;

        /* Widget content. */

        if ($title) :
            echo $before_title . esc_attr( $title ) . $after_title;
        endif;

        if ($social_big == 'on') : echo '<div class="sc_big">'; endif;
            df_social_connect();
        if ($social_big == 'on') : echo '</div>'; endif;

        /* After widget (defined by themes). */
        echo $after_widget;
    }

// End widget()

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

        $instance = $old_instance;

        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['title']      = strip_tags($new_instance['title']);
        $instance['social_big'] = $new_instance['social_big'];

        return $instance;
    }

// End update()

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

        /* Set up some default widget settings. */
        $title      = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $social_big = isset($instance['social_big']) ? (bool) $instance['social_big'] : false; ?>

        <!-- No options -->
        <p><em><?php printf(__('Setup this widget in your <a href="%s">customizer</a> under <strong>Connect</strong>', 'dahztheme'), esc_url( admin_url('customize.php') ) ); ?></em>.</p>

        <!-- Widget Title: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'dahztheme'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($social_big); ?> id="<?php echo $this->get_field_id('social_big'); ?>" name="<?php echo $this->get_field_name('social_big'); ?>" />
            <label for="<?php echo $this->get_field_id('social_big'); ?>"><?php _e('Show Social Icons Big ?', 'dahztheme'); ?></label>
        </p>

        <?php
    }

// End form()
}

// End Class

/* ----------------------------------------
  Register the widget on `widgets_init`.
  ----------------------------------------

 * Registers this widget.
  ---------------------------------------- */

add_action('widgets_init', create_function('', 'return register_widget("Dahz_Widget_Subscribe");'), 1);