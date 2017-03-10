<?php
if (!defined('ABSPATH')) {
    exit;
}
/* ------------------------------------------------------------------------------------
  TABLE OF CONTENTS

  - Remove Tag Cloud Inline Style
  - Add css class post count on archives and category widget
  - Site Favicon
  - Social Connect
  - Button Shape
  ------------------------------------------------------------------------------------ */

/* ----------------------------------------------------------------------------------- */
/* Remove Tag Cloud Inline Style                                                       */
/* ----------------------------------------------------------------------------------- */

if (!function_exists('df_remove_tag_cloud_inline_style')) {

    function df_remove_tag_cloud_inline_style($tag_string) {
        return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
    }

    add_filter('wp_generate_tag_cloud', 'df_remove_tag_cloud_inline_style');
}

/* ----------------------------------------------------------------------------------- */
/* Add css class post count on archives and category widget                            */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_archives_add_span_cat_count')) {

  function df_archives_add_span_cat_count($link_html) {
      $link_html = str_replace('</a>', '</a><span class="post-count">', $link_html);
      $link_html = str_replace('</li>', '</span></li>', $link_html);
      return $link_html;
    }

}
add_filter('get_archives_link', 'df_archives_add_span_cat_count');

if (!function_exists('df_category_add_span_cat_count')) {

  function df_category_add_span_cat_count($link_html) {
          $link_html = str_replace(' (', ' <span class="post-count">(', $link_html);
          $link_html = str_replace(')', ')</span>', $link_html);
          return $link_html;
  }

}
add_filter('wp_list_categories', 'df_category_add_span_cat_count');


/* ----------------------------------------------------------------------------------- */
/* Social Connect                                                                      */
/* ----------------------------------------------------------------------------------- */
function df_active_social_sites(){
  $social_sites = array( 'facebook', 'twitter', 'google', 'youtube', 'vimeo', 'instagram', 'pinterest', 'dribbble', 'linkedin', 'rss' );
  return $social_sites;
}

if ( ! function_exists( 'df_social_connect' ) ) {

    function df_social_connect() {
        $enable_topbar_sc = df_options( 'enable_topbar_social_icon', dahz_get_default('enable_topbar_social_icon') );
        $active_socials   = df_active_social_sites();

        $_is_customizing = is_customize_preview();
        $enable_sc = $inline_topbar_social_css = $output = '';

        if ( $_is_customizing ) {
            $enable_sc = true;
            $inline_topbar_social_css = $enable_topbar_sc == 1 ? 'style="display:table-cell;"' : 'style="display:none;"';
        } else {
            $enable_sc = $enable_topbar_sc == 1;
        }

        if ( $enable_sc ) :

            foreach( $active_socials as $social_site ) {
                $df_social = df_options( $social_site, dahz_get_default( $social_site ) );
                if ( strlen( $df_social ) > 0 ) {
                    $active_sites[] = $social_site;
                }
            }
            if ( ! empty( $active_sites ) ) :
                echo '<ul class="df-social-connect"' . $inline_topbar_social_css . '>';

                foreach ( $active_sites as $active_site ) : ?>
                <li>
                  <a href="<?php echo esc_url( df_options( $active_site ) ); ?>" class="<?php echo $active_site; ?>" title="<?php echo ucwords( $active_site ); ?>" target="_blank">
                  <?php if( $active_site == 'youtube' ) : ?>
                    <i class="fa fa-<?php echo $active_site; ?>-play"></i><i class="fa fa-<?php echo $active_site; ?>-play"></i></a>
                  <?php elseif( $active_site == 'vimeo' ):  ?>
                    <i class="fa fa-<?php echo $active_site; ?>-square"></i><i class="fa fa-<?php echo $active_site;?>-square"></i></a>
                  <?php elseif( $active_site == 'google' ):  ?>
                    <i class="fa fa-<?php echo $active_site; ?>-plus"></i><i class="fa fa-<?php echo $active_site; ?>-plus"></i></a>
                  <?php else: ?>
                    <i class="fa fa-<?php echo $active_site; ?>"></i><i class="fa fa-<?php echo $active_site; ?>"></i></a>
                  <?php endif; ?>
                </li>
                <?php
                endforeach;

                echo '</ul><div class="clear"></div>';
            endif;

        endif;

        //echo $output;
    }
}

/* ----------------------------------------------------------------------------------- */
/* Button Shape                                                                        */
/* ----------------------------------------------------------------------------------- */
if ( ! function_exists( 'df_btn_shape' ) ) {

    function df_btn_shape( $classes = '' ) {


        $df_button_shape = df_options( 'df_button_shape', dahz_get_default( 'df_button_shape' ) );

        switch ($df_button_shape) {
            case 'square' :
                $classes = 'df_square';
                break;
            case 'round' :
                $classes = 'df_round';
                break;
            case 'pill' :
                $classes = 'df_pill';
                break;
        }

        return $classes;
    }

}

/*-----------------------------------------------------------------------------------*/
/* Ajax search header */
/*-----------------------------------------------------------------------------------*/
add_action('wp_ajax_ajax_search', 'ajax_search');
add_action('wp_ajax_nopriv_ajax_search', 'ajax_search');

function ajax_search(){

global $post;

$s = $_POST['s'];

    $args = array(
        's' => $s,
        'showposts' => -1,
        'post_status' => 'publish',
        'suppress_filters' => 0,
    );


    $query = new WP_Query($args);
    if($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post(); ?>

        <?php
            $post_type = get_post_type( $post->ID );
        ?>
             <div id="result-<?php echo $post->ID; ?>" class="ajax-search-result animated fadeIn">
                <?php
                 if ( has_post_thumbnail()){ ?>
                    <div class='df-search-image'>
                        <a class="image_thum_post" href="<?php esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>" >
                           <?php  the_post_thumbnail('dahz-small-thumb'); ?>
                        </a>
                    </div>
                <?php } else {

                $url_src = esc_url(get_template_directory_uri() . '/includes/assets/images/search.jpg');
                echo "<div class='df-search-image'>";
                echo '<a href="' . esc_url(get_permalink(get_the_ID())) . '" rel="bookmark" title="">';
                echo '<img src="' . $url_src . '" class="" alt="">';
                echo "</a>";
                echo "</div>";


                 } ?>
                <div class="df-search-content">
                   <h3><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
                    <div class='df-postmeta'>
                        <?php
                            if (get_post_type() == 'page') {
                                echo "<span class='search-post-on'>";
                                    df_posted_on();
                                echo "</span>";
                            }else {
                                df_posted_author();
                                df_posted_on();
                                df_category_blog();
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="clear"></div>

    <?php endwhile;
    else :
    ?>

    <div id="result-not-found animated fadeIn">
        <h1> <?php _e('Nothing Found','dahztheme'); ?> </h1>
        <p><?php _e('Sorry, but nothing matched your search terms. Please try again some different keyword','dahztheme'); ?></p>
    </div>

    <?php
    endif;
    die();
    wp_reset_postdata();
}

/*-----------------------------------------------------------------------------------*/
/* Option Sort Ajax */
/*-----------------------------------------------------------------------------------*/
add_action('wp_ajax_option_search_ajax', 'option_search_ajax');
add_action('wp_ajax_nopriv_option_search_ajax', 'option_search_ajax');

function option_search_ajax() {

    $selector = $_POST['selector'];

    $args = array(
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'cat'                 => $selector,
        'posts_per_page'      => -1,
        'ignore_sticky_posts' => 1
    );

    $query = new WP_Query( $args );

    if( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();

           dahz_get_content_template(); // Loads the includes/templates/content/*.php template.

        endwhile;
    endif;

    die();

    wp_reset_postdata();

}

/* ----------------------------------------------------------------------------------- */
/* Custom nextpage links                                                               */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_custom_nextpage_links')) :
    function df_custom_nextpage_links($defaults) {
        $args = array(
            'before'        => '<div class="my-paginated-posts"><ul><li>' . __('Pages : ', 'dahztheme').'</li>',
            'after'         => '</ul><div class="clear"></div></div>',
            'link_before'   => '<li>',
            'link_after'    => '</li>',
        );
        $r = wp_parse_args($args, $defaults);
        return $r;
    }
    add_filter('wp_link_pages_args','df_custom_nextpage_links');
endif;

/* ----------------------------------------------------------------------------------- */
/* Password protected change form                                                      */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_password_form')) :

function df_password_form() {
        global $post;
        $label = 'pwbox-'.(empty($post->ID) ? rand() : $post->ID);
        $output = '<div class="password-form">
        <p class="protected-text">' . __('This post is password protected. To view it, please enter your password below:', 'dahztheme') . '</p>
        <form action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
        <p><input name="post_password" id="' . $label . '" type="password" size="20" placeholder="password" /> <input placeholder="password" type="submit" name="submit" value="' . esc_attr__('Submit', 'dahztheme') . '" /></p></form></div>';
        return $output;
    }
    add_filter('the_password_form','df_password_form');
endif;


/* ----------------------------------------------------------------------------------- */
/* WPML - Languages Flags                                                              */
/* ----------------------------------------------------------------------------------- */
function language_selector_flags() {

    $language_output = "";

    if (function_exists('icl_get_languages')) {
        $languages = icl_get_languages('skip_missing=0&orderby=code');
        if(!empty($languages)){
            foreach($languages as $l){
                $language_output .= '<li>';
                if($l['country_flag_url']){
                    if(!$l['active']) {
                        $language_output .= '<a href="'.$l['url'].'"><img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" /><span class="language name">'.$l['translated_name'].'</span></a>'."\n";
                    } else {
                        $language_output .= '<div class="current-language"><img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" /><span class="language name">'.$l['translated_name'].'</span></div>'."\n";
                    }
                }
                $language_output .= '</li>';
            }
        }
    } else {

        $language_output .= '<li><a href="#">DEMO - EXAMPLE PURPOSES</a><li><a href="#"><span class="language name">DE</span></a></li><li><div class="current-language"><span class="language name">EN</span></div></li><li><a href="#"><span class="language name">ES</span></a></li><li><a href="#"><span class="language name">FR</span></a></li>'."\n";
    }

    return $language_output;
}

/* ----------------------------------------------------------------------------------- */
/* Share Meta Image                                                                    */
/* ----------------------------------------------------------------------------------- */
if ( !function_exists( 'df_share_meta_head' ) ) :

    function df_share_meta_head() {
        global $post;
        if ( !is_object( $post ) ) { return; }

        $image       = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $description = is_singular() ? trim( wp_trim_words( strip_shortcodes( strip_tags( get_post()->post_content ) ), 35, '' ), '.!?,;:-' ) . '&hellip;' : get_bloginfo( 'description' );

        if ( has_post_thumbnail( $post->ID ) ): ?>

            <!-- Facebook Share Meta -->
            <meta property="og:title" content="<?php the_title(); ?>" />
            <meta property="og:image" content="<?php echo $image[0]; ?>" />
            <meta property="og:url" content="<?php esc_url( get_the_permalink() ); ?>" />
            <meta property="og:description" content="<?php echo $description; ?>" />
            <!-- Twitter Share Meta -->
            <meta name="twitter:url" content="<?php esc_url( get_the_permalink() ); ?>">
            <meta name="twitter:title" content="<?php the_title(); ?>">
            <meta name="twitter:description" content="<?php echo $description; ?>">
            <meta name="twitter:image" content="<?php echo $image[0]; ?>">

        <?php endif;
    }

    add_action('wp_head', 'df_share_meta_head');
endif;
