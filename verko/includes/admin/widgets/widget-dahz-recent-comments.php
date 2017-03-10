<?php
if (!defined('ABSPATH')) { exit; }

class Dahz_Widget_Recent_Comments extends WP_Widget {

    function Dahz_Widget_Recent_Comments() {
        $widget_ops = array('classname' => 'widget_dahz_recent_comments', 'description' => __('This is a DahzFramework standardized most recent comments widget.', 'dahztheme'));
        WP_Widget::__construct('dahz-recent-comments', __('DF Widget - Recent Comments', 'dahztheme'), $widget_ops);
        $this->alt_option_name = 'widget_dahz_recent_comments';

        if (is_active_widget(false, false, $this->id_base))
            add_action('wp_head', array($this, 'recent_comments_style'));

        add_action('comment_post', array($this, 'flush_widget_cache'));
        add_action('edit_comment', array($this, 'flush_widget_cache'));
        add_action('transition_comment_status', array($this, 'flush_widget_cache'));
    }

    function recent_comments_style() {

        /**
         * Filter the Recent Comments default widget styles.
         *
         * @since 3.1.0
         *
         * @param bool   $active  Whether the widget is active. Default true.
         * @param string $id_base The widget ID.
         */
        if (!current_theme_supports('widgets') // Temp hack #14876
                || !apply_filters('show_recent_comments_widget_style', true, $this->id_base))
            return;
        ?>
        <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
        <?php
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_dahz_recent_comments', 'widget');
    }

    function widget($args, $instance) {
        global $comments, $comment;

        $cache = array();
        if (!$this->is_preview()) {
            $cache = wp_cache_get('widget_dahz_recent_comments', 'widget');
        }
        if (!is_array($cache)) {
            $cache = array();
        }

        if (!isset($args['widget_id']))
            $args['widget_id'] = $this->id;

        if (isset($cache[$args['widget_id']])) {
            echo $cache[$args['widget_id']];
            return;
        }

        extract($args, EXTR_SKIP);
        $output = '';

        $title = (!empty($instance['title']) ) ? $instance['title'] : __('Recent Comments', 'dahztheme');

        /** This filter is documented in wp-includes/default-widgets.php */
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        $gravatar = !empty($instance['gravatar']) ? $instance['gravatar'] : 70;

        $number = (!empty($instance['number']) ) ? absint($instance['number']) : 5;
        if (!$number)
            $number = 5;

        /**
         * Filter the arguments for the Recent Comments widget.
         *
         * @since 3.4.0
         *
         * @see get_comments()
         *
         * @param array $comment_args An array of arguments used to retrieve the recent comments.
         */
        $comments = get_comments(apply_filters('widget_dahz_comments_args', array(
            'number' => $number,
            'status' => 'approve',
            'post_status' => 'publish'
        )));

        $output .= $before_widget;
        if ($title)
            $output .= $before_title . esc_attr( $title ) . $after_title;


        $output .= '<ul id="recentcomments">';
        if ($comments) {
            // Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
            $post_ids = array_unique(wp_list_pluck($comments, 'comment_post_ID'));
            _prime_post_caches($post_ids, strpos(get_option('permalink_structure'), '%category%'), false);

            foreach ((array) $comments as $comment) {
                $output .= '<li class="recentcomments">' . get_avatar($comment->comment_author_email, $gravatar) . /* translators: comments widget: 1: comment author, 2: post link */'<div class="comment-section">' . sprintf(_x('%1$s on %3$s %2$s', 'widgets', 'dahztheme'), '<em>' . get_comment_author_link() . '</em>', '<h4><a href="' . esc_url(get_comment_link($comment->comment_ID)) . '">' . get_the_title($comment->comment_post_ID) . '</a></h4>', '<br>') . '</div><div class="clear"></div></li>';
            }
        }

        $output .= '</ul>';
        $output .= $after_widget;

        echo $output;

        if (!$this->is_preview()) {
            $cache[$args['widget_id']] = $output;
            wp_cache_set('widget_recent_comments', $cache, 'widget');
        }
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
        $instance['gravatar'] = strip_tags($new_instance['gravatar']);
        $this->flush_widget_cache();

        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['widget_dahz_recent_comments']))
            delete_option('widget_dahz_recent_comments');

        return $instance;
    }

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'dahztheme'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of comments to show:', 'dahztheme'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>
        <?php
    }

}

add_action('widgets_init', create_function('', 'return register_widget("Dahz_Widget_Recent_Comments");'), 1);