<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */
add_filter('rwmb_meta_boxes', 'df_metabox_page_post_register_meta_boxes');

/**
 * Register meta boxes page
 *
 * @return void
 */
function df_metabox_page_post_register_meta_boxes($meta_boxes) {
    $prefix = 'df_metabox';

    $metaboxes_file = array(
        'metaboxes-init.php',
        'metaboxes-single-blog.php',
        'metaboxes-post-format.php',
        'metaboxes-portfolio.php'
    );

    foreach ($metaboxes_file as $mb_file) {
        require_once $mb_file;
    }

    return $meta_boxes;

}

function rwmb_metabox_scripts(){
    wp_dequeue_style( 'rwmb' ); // unset css rwmb
    wp_enqueue_style( 'rwmb-metabox', get_template_directory_uri() . '/includes/admin/extensions/meta-box/css/style.css', false, RWMB_VER );
}
add_action( 'admin_enqueue_scripts',  'rwmb_metabox_scripts', 20 );