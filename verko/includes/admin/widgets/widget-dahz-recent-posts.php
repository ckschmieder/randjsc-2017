<?php
if (!defined('ABSPATH')) { exit; }

class Dahz_Widget_Recent_Posts extends WP_Widget {

    function Dahz_Widget_Recent_Posts() {
        $widget_ops = array('classname' => 'widget_dahz_recent_entries', 'description' => __("This is a DahzFramework standardized most recent Posts widget.", 'dahztheme'));
        WP_Widget::__construct('dahz-recent-posts', __('DF Widget - Recent Posts', 'dahztheme'), $widget_ops);
        $this->alt_option_name = 'widget_dahz_recent_entries';

        add_action('save_post', array($this, 'flush_widget_cache'));
        add_action('deleted_post', array($this, 'flush_widget_cache'));
        add_action('switch_theme', array($this, 'flush_widget_cache'));
    }

    function widget($args, $instance) {

        $img_position = $instance['img_position'];

        $cache = array();
        if (!$this->is_preview()) {
            $cache = wp_cache_get('widget_dahz_recent_posts', 'widget');
        }

        if (!is_array($cache)) {
            $cache = array();
        }

        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        if (isset($cache[$args['widget_id']])) {
            echo $cache[$args['widget_id']];
            return;
        }

        ob_start();
        extract($args);

        $title = (!empty($instance['title']) ) ? $instance['title'] : __('Recent Posts', 'dahztheme');

        /** This filter is documented in wp-includes/default-widgets.php */
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        $number = (!empty($instance['number']) ) ? absint($instance['number']) : 5;
        if (!$number)
            $number = 5;
        $show_date = isset($instance['show_date']) ? $instance['show_date'] : false;
        $img = isset($instance['img']) ? $instance['img'] : false;

        /**
         * Filter the arguments for the Recent Posts widget.
         *
         * @since 3.4.0
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args An array of arguments used to retrieve the recent posts.
         */
        $r = new WP_Query(apply_filters('widget_dahz_posts_args', array(
            'posts_per_page'        => $number,
            'no_found_rows'         => true,
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => true
        )));

        if ($r->have_posts()) :
            ?>
            <?php echo $before_widget; ?>
            <?php if ($title) echo $before_title . $title . $after_title; ?>
            <ul>
                <?php while ($r->have_posts()) : $r->the_post(); ?>
                    <li class="recententries">
                        <?php if ($img) :

                            switch ($img_position) {
                                case 'left': ?>
                                    <?php if (has_post_thumbnail()) : ?>

                                        <div class="df-widget-image">
                                            <?php get_the_image( array( 'size' => 'dahz-small-thumb', 'image_class' => 'widget-img-left' ) ); ?>
                                        </div>

                                    <?php else: ?>

                                        <div class="df-widget-image">
                                            <img class="widget-img-left" height="80" width="80" src="<?php echo esc_url( get_template_directory_uri() . '/includes/assets/images/post-formats/standard.jpg' ) ?>" alt="default-img">
                                        </div>

                                    <?php endif; ?>

                                <?php break; ?>

                            <?php case 'top':
                                default: ?>

                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="df-widget-image-top">
                                            <?php get_the_image( array( 'size' => 'dahz-grid-thumb-cropped' ) ); ?>
                                        </div>
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/includes/assets/images/post-formats/big/standard.jpg' ) ?>"  alt="default-img">
                                    <?php endif; ?>

                                <?php break;

                            } ?>

                            <?php endif; ?>

                            <div class="df-content">
                                <h4><a class="post-title" href="<?php echo esc_url( get_permalink() ); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></h4>
                                <?php if ($show_date) : ?>
                                    <time class="post-date published" datetime="<?php echo esc_attr( get_the_date('c') ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
                                <?php endif; ?>
                            </div>
                            <div class="clear"></div>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php echo $after_widget; ?>
            <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();

        endif;

        if (!$this->is_preview()) {
            $cache[$args['widget_id']] = ob_get_flush();
            wp_cache_set('widget_dahz_recent_posts', $cache, 'widget');
        } else {
            ob_end_flush();
        }
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['img'] = $new_instance['img'];
        $instance['img_position'] = $new_instance['img_position'];
        $instance['show_date'] = isset($new_instance['show_date']) ? (bool) $new_instance['show_date'] : false;
        $this->flush_widget_cache();

        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['widget_dahz_recent_entries']))
            delete_option('widget_dahz_recent_entries');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_dahz_recent_posts', 'widget');
    }

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        $img = isset($instance['img']) ? (bool) $instance['img'] : true;
        $img_position = isset($instance['img_position']) ? esc_attr($instance['img_position']) : 'top';
        $show_date = isset($instance['show_date']) ? (bool) $instance['show_date'] : true;
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'dahztheme'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:','dahztheme'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox" <?php checked($show_date); ?> id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>" />
            <label for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e('Display post date &amp; comment ?', 'dahztheme'); ?></label></p>

        <p><input class="checkbox" type="checkbox" <?php checked($img); ?> id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" />
            <label for="<?php echo $this->get_field_id('img'); ?>"><?php _e('Display Image ?', 'dahztheme'); ?></label></p>

        <p><label for="<?php echo esc_attr($this->get_field_id('img_position')); ?>"><?php _e('Display image on:', 'dahztheme'); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id('img_position')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('img_position')); ?>">
                <?php $options = array('top' => 'Top', 'left' => 'Left'); ?>
                <?php foreach ($options as $option => $key) : ?>
                    <option value="<?php echo esc_attr($option); ?>"<?php $img_position == $option ? selected($img_position, $option) : ''; ?>><?php echo $key; ?></option>
                <?php endforeach; ?>
            </select></p>
            <?php
    }

}

add_action('widgets_init', create_function('', 'return register_widget("Dahz_Widget_Recent_Posts");'), 1);