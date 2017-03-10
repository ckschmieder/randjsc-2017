<?php
// File Security Check
if (!defined('ABSPATH')) { exit; }

class Dahz_Widget_Contact extends WP_Widget {

	// Widget Settings
    function Dahz_Widget_Contact() {

        $widget_ops 	= array('description' => __('This is a DahzFramework standardized Display your Contact Informations widget', 'dahztheme'));

        $control_ops 	= array('width' => 300, 'height' => 350, 'id_base' => 'contact');

        WP_Widget::__construct('contact', __('DF Widget - Contact Info', 'dahztheme'), $widget_ops, $control_ops);

    }

    // Widget Output
    function widget($args, $instance) {

        extract($args);

        $title 		= apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
        $icl_t 		= function_exists('icl_t');
        $text 		= $icl_t ? icl_t('Content Text', 'widget text – ' . $this->id, $instance['text']) : $instance['text'];
        $address 	= $icl_t ? icl_t('Content Text', 'widget text address – ' . $this->id, $instance['address']) : $instance['address'];
        $social 	= $instance['social'];

        echo $before_widget;

        if ($instance['img'] != '') {
            echo $before_title . '<img src="' . esc_url( $instance['img'] ) . '">' . $after_title;
        } else {
            // ------
            echo $before_title . esc_attr( $title ) . $after_title;
        } ?>

        <address>

            <?php if ($text): ?>
                <p> <?php echo esc_attr( $text ); ?></p>
            <?php endif; ?>

            <?php if ($address): ?>
                <p class="address"><span class="icon_contact_widget"><i class="fa fa-map-marker "></i></span><span class="p_contact"><?php echo $address; ?></span></p>
            <?php endif; ?>

            <?php if ($instance['phone']): ?>
                <p class="phone"><span class="icon_contact_widget"><i class="fa fa-phone"></i></span><span class="p_contact"><?php _e('+', 'dahztheme') ?> <?php echo $instance['phone']; ?></span></p>
            <?php endif; ?>

            <?php if ($instance['fax']): ?>
                <p class="fax"> <span class="icon_contact_widget"><i class="fa fa-file-text-o"></i></span><span class="p_contact"><?php echo $instance['fax']; ?></span></p>
            <?php endif; ?>

            <?php if ($instance['email']): ?>
                <p class="email"><span class="icon_contact_widget"><i class="fa fa-envelope-o"></i></span><span class="p_contact"><?php _e(' E-Mail', 'dahztheme') ?> : <a href="mailto:<?php echo esc_attr( $instance['email'] ); ?>"><?php echo $instance['email']; ?></a></p>
            <?php endif; ?>

            <?php if ($instance['web']): ?>
                <p class="web"><span class="icon_contact_widget"><i class="fa fa-globe"></i></span><span class="p_contact"><a href="<?php echo esc_url($instance['web']); ?>"><?php echo $instance['web']; ?></a></span></p>
            <?php endif; ?>

        </address>

        <?php if ($social != 'on') { df_social_connect(); }

		echo $after_widget;
        // ------
    }

    // Update
    function update($new_instance, $old_instance) {
        $instance 			 = $old_instance;
        $instance['title'] 	 = strip_tags($new_instance['title']);
        $instance['text'] 	 = esc_attr( $new_instance['text'] );
        $instance['img'] 	 = esc_url( $new_instance['img'] );
        $instance['address'] = esc_attr( $new_instance['address'] );
        $instance['phone'] 	 = esc_attr( $new_instance['phone'] );
        $instance['fax'] 	 = esc_attr( $new_instance['fax'] );
        $instance['email'] 	 = esc_attr( $new_instance['email'] );
        $instance['web'] 	 = esc_attr( $new_instance['web'] );
        $instance['social']  = esc_attr($new_instance['social']);

        if (function_exists('icl_register_string')) {
            icl_register_string('Content Text', 'widget text – ' . $this->id, $instance['text']);
            icl_register_string('Content Text', 'widget text address – ' . $this->id, $instance['address']);
        }

        return $instance;
    }

    // Backend Form
    function form($instance) {

        $defaults = array('title' => __('Contact Info', 'dahztheme'), 'img' => '', 'text' => '', 'address' => '', 'phone' => '', 'fax' => '', 'email' => '', 'web' => '', 'social' => '');
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'dahztheme'); ?></label>
            <input type="text" class="widefat"  id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('img'); ?>"><?php _e('Title image URL ( Optional ):', 'dahztheme'); ?></label>
            <input type="text" class="widefat"  id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" value="<?php echo $instance['img']; ?>" />
        </p>

        <p>
            <textarea class="widefat" rows="7" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $instance['text']; ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('address'); ?>">Address:</label>
            <input type="text" class="widefat"  id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" value="<?php echo esc_attr($instance['address']); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('phone'); ?>">Phone:</label>
            <input type="text" class="widefat"  id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" value="<?php echo esc_attr($instance['phone']); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('fax'); ?>">Fax:</label>
            <input type="text" class="widefat"  id="<?php echo $this->get_field_id('fax'); ?>" name="<?php echo $this->get_field_name('fax'); ?>" value="<?php echo esc_attr($instance['fax']); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>">Email:</label>
            <input type="text" class="widefat"  id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo esc_attr($instance['email']); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('web'); ?>">Website URL:</label>
            <input type="text"  class="widefat"  id="<?php echo $this->get_field_id('web'); ?>" name="<?php echo $this->get_field_name('web'); ?>" value="<?php echo esc_attr($instance['web']); ?>" />
        </p>
        <!-- Widget Social Icons: Checkbox Input -->
        <p>
            <input id="<?php echo $this->get_field_id('social'); ?>" name="<?php echo $this->get_field_name('social'); ?>" type="checkbox"<?php checked($instance['social'], 'on'); ?> />
            <label for="<?php echo $this->get_field_id('social'); ?>"> <?php _e('Disable Social Icons', 'dahztheme'); ?></label>
        </p>

        <?php
    }

}

add_action('widgets_init', create_function('', 'return register_widget("Dahz_Widget_Contact");'), 1);