<?php
// File Security Check
if (!defined('ABSPATH')) { exit; }

class Dahz_Widget_AdSpace extends WP_Widget {
	/* ----------------------------------------
      Constructor.
      ----------------------------------------

     * The constructor. Sets up the widget.
      ---------------------------------------- */

    function Dahz_Widget_AdSpace() {

        /* Widget settings. */
        $widget_ops = array('classname' => 'adspace-widget', 'description' => __('This is a DahzFramework standardized widget to add any type of Ad as a widget.', 'dahztheme'));

        /* Widget control settings. */
        $control_ops = array('width' => 250, 'height' => 350, 'id_base' => 'adspace-widget');

        /* Create the widget. */
        WP_Widget::__construct('adspace-widget', __('DF Widget - Adspace Widget', 'dahztheme'), $widget_ops, $control_ops);

    } // End Constructor

    /* ----------------------------------------
      widget()
      ----------------------------------------

     * Displays the widget on the frontend.
      ---------------------------------------- */

      function widget($args, $instance) {

        $html 	= '';

        extract($args, EXTR_SKIP);

        /* Our variables from the widget settings. */
        $title 	= apply_filters('widget_title', $instance['title'], $instance, $this->id_base);

        $adcode = $instance['adcode'];
        $image 	= $instance['image'];
        $href 	= $instance['href'];
        $alt 	= $instance['alt'];

        /* Before widget (defined by themes). */
        echo $before_widget;

        /* Display the widget title if one was input (before and after defined by themes). */
        if ($title) {
            echo $before_title . esc_attr( $title ) . $after_title;
        } // End IF Statement

        /* Widget content. */

        // Add actions for plugins/themes to hook onto.
        do_action('widget_dahz_adspace_top');

        if ($adcode != '') {
            $html .= $adcode;
        } else {
            if ($href != '') {
                $html .= '<a href="' . esc_url( $href ) . '">';

                // If we have an image, display that. Otherwise, use the alt text as a text link.
                if ($image != '') {
                    $html .= '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $alt ) . '" />';
                } else {
                    if ($alt != '') {
                        $html .= $alt;
                    }
                }

                $html .= '</a>';
            }
        }

        echo $html;

        // Add actions for plugins/themes to hook onto.
        do_action('widget_dahz_adspace_bottom');

        /* After widget (defined by themes). */
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

        $instance = $old_instance;

        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['adcode'] = $new_instance['adcode'];
        $instance['image'] = esc_url($new_instance['image']);
        $instance['href'] = esc_url($new_instance['href']);
        $instance['alt'] = esc_attr($new_instance['alt']);

        if (!current_user_can('unfiltered_html')) {
            $instance['adcode'] = $old_instance['adcode'];
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

        /* Set up some default widget settings. */
        $defaults = array('title' => __('Advert', 'dahztheme'), 'adcode' => '', 'image' => '', 'href' => '', 'alt' => '');
        $instance = wp_parse_args((array) $instance, $defaults);

        /* Make the ad code read-only if the user can't work with unfiltered HTML. */
        $read_only = '';
        if (!current_user_can('unfiltered_html')) {
            $read_only = ' readonly="readonly"';
        }
        ?>
        <!-- Widget Title: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):', 'dahztheme'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <!-- Widget Ad Code: Textarea -->
        <p>
            <label for="<?php echo $this->get_field_id('adcode'); ?>"><?php _e('Ad Code:', 'dahztheme'); ?></label>
            <textarea name="<?php echo $this->get_field_name('adcode'); ?>" class="widefat" id="<?php echo $this->get_field_id('adcode'); ?>"<?php echo $read_only; ?>><?php echo $instance['adcode']; ?></textarea>
        </p>
        <p><strong><?php _e('or', 'dahztheme'); ?></strong></p>
        <!-- Widget Image: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image URL:', 'dahztheme'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo $instance['image']; ?>" class="widefat" id="<?php echo $this->get_field_id('image'); ?>" />
        </p>
        <!-- Widget Href: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id('href'); ?>"><?php _e('Link URL:', 'dahztheme'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('href'); ?>" value="<?php echo esc_url($instance['href']); ?>" class="widefat" id="<?php echo $this->get_field_id('href'); ?>" />
        </p>
        <!-- Widget Alt Text: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id('alt'); ?>"><?php _e('Alt text:', 'dahztheme'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('alt'); ?>" value="<?php echo esc_attr($instance['alt']); ?>" class="widefat" id="<?php echo $this->get_field_id('alt'); ?>" />
        </p>
        <?php
    } // End form()

} // End Class

/* ----------------------------------------
  Register the widget on `widgets_init`.
  ----------------------------------------

 * Registers this widget.
  ---------------------------------------- */

add_action('widgets_init', create_function('', 'return register_widget("Dahz_Widget_AdSpace");'), 1);