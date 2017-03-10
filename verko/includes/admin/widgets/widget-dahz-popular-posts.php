<?php
if (!defined('ABSPATH')) { exit; }

class Dahz_Widget_Popular_Posts extends WP_Widget {

	function Dahz_Widget_Popular_Posts() {
        $widget_ops = array('classname' => 'widget_dahz_popular_entries', 'description' => __("This is a DahzFramework standardized most popular Posts widget.", 'dahztheme'));
        WP_Widget::__construct('dahz-popular-posts', __('DF Widget - Popular Posts', 'dahztheme'), $widget_ops);
        $this->alt_option_name = 'widget_dahz_popular_entries';

        add_action('save_post',    array($this, 'flush_widget_cache'));
        add_action('deleted_post', array($this, 'flush_widget_cache'));
        add_action('switch_theme', array($this, 'flush_widget_cache'));
    }

    function widget($args, $instance) {
        $cache = array();
        if (!$this->is_preview()) {
            $cache = wp_cache_get('widget_dahz_popular_posts', 'widget');
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

        $title = (!empty($instance['title']) ) ? $instance['title'] : __('Popular Posts', 'dahztheme');

        /** This filter is documented in wp-includes/default-widgets.php */
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        $number = (!empty($instance['number']) ) ? absint($instance['number']) : 5;
        if (!$number)
            $number         = 5;
            $show_favourite = isset($instance['show_favourite']) ? $instance['show_favourite'] : true;
            $author         = sprintf('<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a> %3$s</span>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author()), __('on', 'dahztheme')
        );
        $img = isset($instance['img']) ? $instance['img'] : false;

        /**
         * Filter the arguments for the popular Posts widget.
         *
         * @since 3.4.0
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args An array of arguments used to retrieve the popular posts.
         */
        $r = new WP_Query(apply_filters('widget_dahz_popular_posts_args', array(
            'posts_per_page'        => $number,
            'no_found_rows'         => true,
            'post_status'           => 'publish',
            'meta_key'              => '_df-like',
            'orderby'               => 'meta_value_num',
            'ignore_sticky_posts'   => true
        )));

        if ($r->have_posts()) :
            ?>
            <?php echo $before_widget; ?>
            <?php if ($title) echo $before_title . esc_attr( $title ) . $after_title; ?>
            <ul>
                <?php while ($r->have_posts()) : $r->the_post(); ?>
                    <li class="popularentries">

                        <?php if ($img) : ?>

                            <?php if (has_post_thumbnail()) : ?>
                                <?php get_the_image( array( 'size' => 'dahz-small-thumb' ) ); ?>
                            <?php else: ?>
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/includes/assets/images/post-formats/standard.jpg' ) ?>" width="80" height="80" alt="default-img">
                            <?php endif; ?>

                        <?php endif; ?>

                        <div class="popular-section">
                            <?php echo $author; ?>
                            <br>
                            <a class="post-title" href="<?php echo esc_url( get_permalink() ); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
                        </div>

                        <?php if ($show_favourite) : ?>
                            <span class="post-favourite">
                                <?php df_like_widget(); ?>
                            </span>
                        <?php endif; ?>

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
            wp_cache_set('widget_dahz_popular_posts', $cache, 'widget');
        } else {
            ob_end_flush();
        }
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['img'] = esc_url( $new_instance['img'] );
        $instance['show_favourite'] = isset($new_instance['show_favourite']) ? (bool) $new_instance['show_favourite'] : true;
        $this->flush_widget_cache();

        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['widget_dahz_popular_entries']))
            delete_option('widget_dahz_popular_entries');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_dahz_popular_posts', 'widget');
    }

    function form($instance) {
        $title          = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number         = isset($instance['number']) ? absint($instance['number']) : 5;
        $img            = isset($instance['img']) ? (bool) $instance['img'] : true;
        $show_favourite = isset($instance['show_favourite']) ? (bool) $instance['show_favourite'] : true;
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'dahztheme'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'dahztheme'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox" <?php checked($img); ?> id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" />
            <label for="<?php echo $this->get_field_id('img'); ?>"><?php _e('Display Image ?', 'dahztheme'); ?></label></p>


        <p><input class="checkbox" type="checkbox" <?php checked($show_favourite); ?> id="<?php echo $this->get_field_id('show_favourite'); ?>" name="<?php echo $this->get_field_name('show_favourite'); ?>" />
            <label for="<?php echo $this->get_field_id('show_favourite'); ?>"><?php _e('Display favourite icon ?', 'dahztheme'); ?></label></p>

        <?php
    }

}

add_action('widgets_init', create_function('', 'return register_widget("Dahz_Widget_Popular_Posts");'), 1);