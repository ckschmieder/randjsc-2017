<?php

/**
 * Table of Content
 *  - blog list add class to index
 *  - blog grid content layout
 *  - blog grid content coloumn
 *  - Global Post Meta
 *  - Category Blog
 *  - Content / Excerpt Conditional
 *  - Excerpt Read More
 *  - Isotope Category Grid
 *  - Author Bio single post
 *  - Tag single Blog
 *  - Postnav single Blog next prev no thumbnail
 *  - Related post single Blog
 *  - Related Post Meta
 */

add_filter( 'df_blog_class_wrapper',    'df_blog_layout',                        0  );
add_filter( 'df_blog_class_wrapper',    'df_blog_class_for_infinite_pagination', 5  );
add_filter( 'excerpt_more',             'df_custom_excerpt_more'                    );

/* filter for blog post element */
add_filter( 'df_post_meta',             'df_postmeta_single',                    0  );
add_filter( 'df_post_meta',             'df_postmeta_loop_list',                 5  );
add_filter( 'df_post_meta',             'df_postmeta_loop_grid',                 10 );
add_filter( 'df_blog_share',            'df_blog_share',                         0  );

/* filter for single blog post element */
add_filter( 'df_single_blog_elements',  'df_blog_tags',                          0  );
add_filter( 'df_single_blog_elements',  'df_blog_share',                         5  );
add_filter( 'df_single_blog_elements',  'df_blog_author',                        10 );
add_filter( 'df_single_blog_elements',  'df_single_blog_postnav',                15 );
add_filter( 'df_single_blog_elements',  'df_single_blog_related_post',           20 );

/* filter for loop blog post element */
add_action( 'df_loop_post_title',       'df_loop_blog_post_title'                   );

add_action( 'edit_category',            'df_category_transient_flusher'             );
add_action( 'save_post',                'df_category_transient_flusher'             );

/* ----------------------------------------------------------------------------------- */
/* blog list add class to index                                                        */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_blog_class_for_infinite_pagination')) :

    function df_blog_class_for_infinite_pagination() {
        if ( is_singular() && is_archive() ) return;

        $pagination_switcher = df_options( 'pagination_style', dahz_get_default( 'pagination_style' ) );

        if ( $pagination_switcher == 'infinite' || $pagination_switcher == 'infinite_button' ) {
            echo 'isotope_ifncsr';
        }
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* blog grid content layout                                                            */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_blog_layout')) :

    function df_blog_layout() {

        if ( is_single() || is_page() ) return;

        $df_blog_layout = df_options( 'blog_layout', dahz_get_default( 'blog_layout' ) );
        $df_grid_type = df_options( 'blog_content_grid', dahz_get_default( 'blog_content_grid' ) );
        if ( is_archive() ){
            $df_blog_layout = df_options( 'archive_layout', dahz_get_default( 'archive_layout' ) );
            $df_grid_type = df_options( 'arch_content_grid',  dahz_get_default( 'arch_content_grid' ) );
        }

        if ( $df_blog_layout === 'grid' ) :

            switch ( $df_grid_type ) {
                case 'masonry':
                    echo 'df_grid_masonry df_row-fluid ';
                    break;
                default:
                    echo 'df_grid_fit df_row-fluid ';
                    break;
            }

        elseif ( $df_blog_layout === 'list' ) :

            echo 'df_list_blog ';

        endif;

    }

endif;

/* ----------------------------------------------------------------------------------- */
/* Big Grid And Blog List Class filter.                                                */
/* ----------------------------------------------------------------------------------- */
if ( !function_exists( 'df_image_as_bg' ) ) :

    function df_image_as_bg() {
        if ( is_single() ) return;

        $classes            = '';
        $df_blog_layout     = is_archive() ? df_options( 'archive_layout', dahz_get_default( 'archive_layout' ) ) : df_options( 'blog_layout', dahz_get_default( 'blog_layout' ) );
        $df_bg_mode_lay     = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true );
        $df_style_post_list = get_post_meta( get_the_ID(), 'df_metabox_list_post_lay', true );

        // if option feature image as background checked
        if ( $df_bg_mode_lay == '1' ) :
            $classes = 'df-standard-image-big-skny';
        elseif ( $df_blog_layout == 'list' ) :
            switch ( $df_style_post_list ) {
                case 'left_lay':
                    $classes = 'df-image-left';
                    break;
                case 'right_lay':
                    $classes = 'df-image-right';
                    break;
                default:
                    $classes = 'df-image-top';
                    break;
            }
        endif;

        return $classes;
    }

endif;

if ( !function_exists( 'df_big_post_grid' ) ) :

    function df_big_post_grid() {
        if ( is_single() ) return;

        $classes          = '';
        $df_blog_layout   = is_archive() ? df_options( 'archive_layout', dahz_get_default( 'archive_layout' ) ) : df_options( 'blog_layout', dahz_get_default( 'blog_layout' ) );
        $df_big_post_grid = get_post_meta( get_the_ID(), 'df_metabox_enable_big_post_grid', true );

        // conditional from metabox big post grid
        // ============================================================

        // if option big post grid checked
        if ( $df_big_post_grid == '1' ) :

            // if post type is 'post' && layout is 'grid'
            if ( $df_blog_layout == 'grid' ) :
                $classes = 'big-post-grid';
            endif;

        endif;

        return $classes;

    }

endif;

/* ----------------------------------------------------------------------------------- */
/* blog grid content coloumn                                                           */
/* ----------------------------------------------------------------------------------- */
if (!function_exists( 'df_blog_grid_col' ) ) :
    function df_blog_grid_col() {
        if ( is_single() ) return;

        $classes        = '';
        $df_blog_layout = is_archive() ? df_options( 'archive_layout', dahz_get_default( 'archive_layout' ) ) : df_options( 'blog_layout', dahz_get_default( 'blog_layout' ) );
        $df_grid_col    = is_archive() ? df_options( 'arch_grid_col', dahz_get_default( 'arch_grid_col' ) ) : df_options( 'blog_grid_col', dahz_get_default( 'blog_grid_col' ) );

        if ( $df_blog_layout == 'grid' ) :
            switch ( $df_grid_col ) :
                case '2col':
                    $classes = 'df_span-sm-6'; break;
                case '3col':
                    $classes = 'df_span-sm-4'; break;
                case '4col':
                    $classes = 'df_span-sm-3'; break;
                case '5col':
                    $classes = 'df_span-sm-2'; break;
                default:
                    $classes = 'df_span-sm-6'; break;
            endswitch;
        endif;

        return $classes;
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* PostMeta                                                                            */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_posted_author')) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function df_posted_author() {
        $author = __('By', 'dahztheme') .' '. sprintf('<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span> ', esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author()));

        printf( '<span class="posted-on">%1$s</span>', $author );
    }

endif;

if (!function_exists('df_posted_on')) :

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function df_posted_on() {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date()));

        printf( '<span class="byline">%1$s</span>', sprintf('<a href="%1$s" rel="bookmark">%2$s</a>', esc_url( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ) ), $time_string ) );
    }

endif;

/* post meta grid */
if ( !function_exists( 'df_postmeta_loop_grid' ) ) :
    function df_postmeta_loop_grid() {
        $df_blog_layout = is_archive() ? df_options( 'archive_layout', dahz_get_default( 'archive_layout' ) ) : df_options( 'blog_layout', dahz_get_default( 'blog_layout' ) );
        $df_grid_type   = is_archive() ? df_options( 'arch_content_grid', dahz_get_default( 'arch_content_grid' ) ) : df_options( 'blog_content_grid', dahz_get_default( 'blog_content_grid' ) );
        $df_bg_mode_lay = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true );
        $except_PF      = ( ! in_array( get_post_format(), array( 'aside', 'chat', 'status', 'quote', 'link' ) ) );                                                          
        if ( !is_single() && $df_blog_layout == 'grid' ) :

            if ( $df_grid_type == 'masonry' && ( $df_bg_mode_lay == '1' || $except_PF ) ) :

                echo "<div class='df-postmeta'>";                    
                    df_posted_author();
                echo "</div>";

            elseif( $df_grid_type == 'fitrows' ) :

                echo "<div class='df-postmeta'>";                    
                    df_posted_author();
                echo "</div>";

            endif;

        endif;
    }
endif;

/* post meta list */
if ( !function_exists( 'df_postmeta_loop_list' ) ) :
    function df_postmeta_loop_list() {
        $df_blog_layout = is_archive() ? df_options( 'archive_layout', dahz_get_default( 'archive_layout' ) ) : df_options( 'blog_layout', dahz_get_default( 'blog_layout' ) );
        $df_bg_mode_lay = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true );
        $except_PF      = ( ! in_array( get_post_format(), array( 'aside', 'chat', 'status', 'quote', 'link' ) ) );

        if ( !is_single() && ( $df_blog_layout == 'list' && ( $df_bg_mode_lay == '1' || $except_PF ) ) ) :

            echo "<div class='df-postmeta'>";

                df_posted_author();
                df_category_blog();
                df_posted_on();

                if (comments_open() || '0' != get_comments_number()) :
                    echo "<span class='comment'><a href='" . esc_url(get_comments_link()) . "'><i class='md-comment'></i>";
                    comments_number(__('0', 'dahztheme'), __('1', 'dahztheme'), __('%', 'dahztheme'));
                    echo "</a></span>";
                endif;

            echo "</div>";

        endif;
    }
endif;

/* post meta single */
if ( !function_exists( 'df_postmeta_single' ) ) :
    function df_postmeta_single() {
        if ( is_single() ) :
            echo "<div class='df-postmeta'>";
                df_posted_author();
                df_posted_on();
                df_category_blog();
            echo "</div>";

            if (comments_open() || '0' != get_comments_number()) :
                echo "<span class='comment'><a href='" . esc_url(get_comments_link()) . "'><i class='md-comment'></i>";
                comments_number(__('0 Comments', 'dahztheme'), __('1 Comment', 'dahztheme'), __('% Comments', 'dahztheme'));
                echo "</a></span>";
            endif;
        endif;
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* Category Blog                                                                       */
/* ----------------------------------------------------------------------------------- */
function df_category_blog() {
    if( !is_archive() ) :
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( esc_html__( ', ', 'dahztheme' ) );

        if ( $categories_list && df_categorized_blog() ) :
            echo ' <span class="df-category-content-post">' . $categories_list . '</span>';
        endif;
    endif;
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function df_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'df_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'df_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so prototype_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so prototype_categorized_blog should return false.
        return false;
    }
}
/**
 * Flush out the transients used in df_categorized_blog
 */
function df_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'df_categories' );
}

/* ----------------------------------------------------------------------------------- */
/* Share Blog                                                                          */
/* ----------------------------------------------------------------------------------- */
if ( !function_exists( 'df_share_elements' ) ) :
    function df_share_elements() {
        $df_enable_share      = df_options( 'blog_share', dahz_get_default( 'blog_share' ) );

        if ( $df_enable_share == 0 ) return;

        $src                  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ) );
        $df_enable_fb_blog    = df_options( 'fb_share', dahz_get_default( 'fb_share' ) );
        $df_enable_twit_blog  = df_options( 'twt_share', dahz_get_default( 'twt_share' ) );
        $df_enable_gp_blog    = df_options( 'gplus_share', dahz_get_default( 'gplus_share' ) );
        $df_enable_pin_blog   = df_options( 'pin_share', dahz_get_default( 'pin_share' ) );
        $df_enable_email_blog = df_options( 'mail_share', dahz_get_default( 'mail_share' ) );
        $df_enable_ldn_blog   = df_options( 'link_share', dahz_get_default( 'link_share' ) ); ?>

        <ul class="df-social-connect">
            <?php if ($df_enable_fb_blog == '1') { // facebook share ?>
            <li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink( get_the_ID() ); ?>" target="_blank"><i class="fa-facebook fa"></i><i class="fa-facebook fa"></i></a></li>
            <?php } ?>
            <?php if ($df_enable_twit_blog == '1') { // twitter share ?>
            <li><a class="twitter" href="http://twitter.com/share?text=<?php echo urlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) );?>&amp;url=<?php the_permalink( get_the_ID() ); ?>" target="_blank"><i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a></li>
            <?php } ?>
            <?php if ($df_enable_gp_blog == '1') { // google+ share ?>
            <li><a class="google" href="https://plus.google.com/share?url=<?php the_permalink( get_the_ID() ); ?>" target="_blank"><i class="fa-google-plus fa"></i><i class="fa-google-plus fa"></i></a></li>
            <?php } ?>
            <?php if ($df_enable_pin_blog == '1') { // pinterest share ?>
            <li><a class="pinterest" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink( get_the_ID() ); ?>&amp;media=<?php echo $src[0]; ?>&amp;description=<?php echo urlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) ); ?>" target="_blank"><i class="fa fa-pinterest "></i><i class="fa fa-pinterest "></i></a></li>
            <?php } ?>
            <?php if ($df_enable_email_blog == '1') { // email share ?>
            <li><a class="mail-to" href="mailto:?subject=<?php the_permalink( get_the_ID() ); ?>" target="_top"><i class="fa-envelope-o fa"></i><i class="fa-envelope-o fa"></i></a></li>
            <?php } ?>
            <?php if ($df_enable_ldn_blog == '1') { // linkedin share ?>
            <li><a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink( get_the_ID() ); ?>" target="_blank"><i class="fa fa-linkedin"></i><i class="fa fa-linkedin"></i></a></li>
            <?php } ?>
        </ul>
<?php }
endif;

/* single post share*/
if ( !function_exists( 'df_blog_share' ) ) :
    function df_blog_share() {
        $like_btn       = df_options( 'love_btn', dahz_get_default( 'love_btn' ) );
        $enable_lk_btn  = $like_btn == '1';
        $df_blog_layout = is_archive() ? df_options( 'archive_layout', dahz_get_default( 'archive_layout' ) ) : df_options( 'blog_layout', dahz_get_default( 'blog_layout' ) );

        if ( is_single() ) :
            echo '<div class="clear"></div>';
            echo '<div class="df-share-content">';
            echo '<span class="share-text">' . __( 'Share', 'dahztheme' ) . '</span>';
            echo '<div class="df-share-components">';
                ( $enable_lk_btn ) ? df_like() : '';
                df_share_elements();
            echo '</div>';
            echo '<div class="clear"></div>';
            echo '</div>';
        else :
            switch ( $df_blog_layout ) {
                case 'grid':
                    echo '<div class="df-share-content">';
                    echo '<div class="df-share-components">';
                    echo '<div class="alignleft">';
                        df_posted_on();
                    echo '</div>';
                    echo '<div class="alignright">';
                        ( $enable_lk_btn ) ? df_like() : '';
                        if (comments_open() || '0' != get_comments_number()) :
                            echo "<span class='comment'><a href='" . esc_url(get_comments_link()) . "'><i class='md-comment'></i>";
                            comments_number(__('0', 'dahztheme'), __('1', 'dahztheme'), __('%', 'dahztheme'));
                            echo "</a></span>";
                        endif;
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="clear"></div>';
                    echo '</div>';
                break;
                default:
                    echo '<div class="df-share-content">';
                    echo '<span class="share-text alignleft">' . __( 'Share', 'dahztheme' ) . '</span>';
                    echo '<div class="df-share-components alignright">';
                        ( $enable_lk_btn ) ? df_like() : '';
                        df_share_elements();
                    echo '</div>';
                    echo '<div class="clear"></div>';
                    echo '</div>';
                break;
            }
        endif;
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* Content / Excerpt Conditional                                                       */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_blog_content')) :

    function df_blog_content(){
        $df_bg_mode_lay      = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true );

        if ( $df_bg_mode_lay == '1' ) return;

        $df_blog_layout  = df_options( 'blog_layout', dahz_get_default( 'blog_layout' ) );
        $df_grid_type    = df_options( 'blog_content_grid', dahz_get_default( 'blog_content_grid' ) );
        $df_full_summary = df_options( 'blog_content_list', dahz_get_default( 'blog_content_list' ) );

        if( is_archive() ) {
          $df_blog_layout   = df_options( 'archive_layout', dahz_get_default( 'archive_layout' )  );
          $df_grid_type     = df_options( 'arch_content_grid', dahz_get_default( 'arch_content_grid' ) );
          $df_full_summary  = df_options( 'arch_content_list', dahz_get_default( 'arch_content_list' ) );
        }

        if ( is_search() ) :

            the_excerpt();

        /* end if search template */
        else :

            if ( $df_blog_layout == 'list' ) :

                switch ( $df_full_summary ) {
                    case 'fulltext': the_content(); break;
                    case 'summary' : the_excerpt(); break;
                    default: the_excerpt(); break;
                }

            elseif ( $df_blog_layout == 'grid' && $df_grid_type == 'masonry' ) :

                the_excerpt();

            endif;

        endif;
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* Excerpt Read More                                                                   */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_custom_excerpt_more')) :
    function df_custom_excerpt_more( $more ) {
        $more .= '<a href="' . get_permalink() . '" class="df-link-excerpt">';
        $more .= esc_html__( 'Continue reading', 'dahztheme' );
        $more .= '</a>';

        return $more;
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* Isotope Category Grid                                                               */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_isotope_category_blog')) :

    function df_isotope_category_blog() {

        $df_enable_filter_cat = df_options( 'cat_filter', dahz_get_default( 'cat_filter' ) );
        $df_homepage_layout   = df_options( 'blog_layout', dahz_get_default( 'blog_layout' ) );

        if ( $df_enable_filter_cat != '1' ) { return false; }

        if ( $df_homepage_layout == 'grid' && !is_tax() && !is_page() && !is_single()) :

            $terms = get_terms( 'category' );
            $html  = '<ul id="options-blog-sort">';

            foreach ( $terms as $term ) {
                $html .= "<li><a href='#' data-filter='{$term->term_id}'>{$term->name}</a></li>";
            }

            $html .= '</ul><div class="clear"></div>';

            echo $html;

        endif; // endif $df_homepage_layout == 'grid' && !is_tax() && !is_page() && !is_single()
    }

endif;

/* ================================ single blog ================================ */

/* ----------------------------------------------------------------------------------- */
/* Author Bio single post                                                              */
/* ----------------------------------------------------------------------------------- */

if (!function_exists('df_blog_author')) :

    function df_blog_author() {
        $html = $border_class = '';

        if ( !is_author() && !is_single() ) { return false; }

        if ( is_single() ) { $border_class = 'df_border_top'; }

        $active_social_author = df_active_social_sites();

        $html  = '<div class="clear"></div>';
        $html .= '<div class="about-author ' . esc_attr( $border_class ) .'">';
        $html .= '<div class="avatar-pic col-left">' . get_avatar(get_the_author_meta('ID'), 70) . '</div>';
        $html .= '<div class="about-author-desc">';
        $html .= '<h4 class="title-about">' . esc_html__('About ', 'dahztheme') . '<a href="' . get_author_posts_url(get_the_author_meta('ID')) . '">' . get_the_author() . '</a></h4>';
        $html .= '<p>' . get_the_author_meta('description') . '</p>';
        $html .= '<div class="df-share-content author-social">';
        $html .= '<ul class="df-social-connect">';

        foreach( $active_social_author as $social_site ) {
            if ( strlen( get_the_author_meta($social_site) ) > 0 ) {
                  $active_sites[] = $social_site;
            }
        }

        if ( !empty( $active_sites ) ) :
            foreach ($active_sites as $active_site ) :
                $html .= '<li>';
                $html .= '<a target="_blank" class="'.$active_site.'" href="'.get_the_author_meta($active_site).'">';
                if($active_site == 'google'):
                    $html .= '<i class="fa fa-'.$active_site.'-plus"></i><i class="fa fa-'.$active_site.'-plus"></i>';
                else:
                    $html .= '<i class="fa fa-'.$active_site.'"></i><i class="fa fa-'.$active_site.'"></i>';
                endif;
                $html .= '</a>';
                $html .= '</li>';
            endforeach;
        endif;

        $html .= '</ul><div class="clear"></div></div></div></div>';

        echo $html;

    }

endif;

/* ----------------------------------------------------------------------------------- */
/* Tag single Blog                                                                     */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_blog_tags')) :
    function df_blog_tags() {
        $tags = get_the_tag_list('<ul class="tag-list"><li class="tag-item df_round df_border">','</li><li class="tag-item df_round df_border">','</li></ul>');

        if ( $tags != '' ) :
            echo "<div class='clear'></div>";
            echo "<div class='single-tag-blog'>";
            echo '<span class="df-link">' . $tags . '</span>';
            echo "</div>";
        endif; // endif $tags != ''
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* Postnav single Blog next prev no thumbnail                                          */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_single_blog_postnav')) :
    function df_single_blog_postnav() {
        echo '<div class="post-pagination df_border df_round">';
        echo '<div class="navi-prev">';
        echo previous_post_link('<span class="df-link title-link-nav-single-post"><i class="md-keyboard-arrow-left"></i>%link</span>');
        echo '</div>';
        echo '<div class="navi-next">';
        echo next_post_link('<span class="df-link title-link-nav-single-post"><i class="md-keyboard-arrow-right"></i>%link</span>');
        echo '</div><div class="clear"></div></div>';
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* Related post single Blog                                                            */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_single_blog_related_post')) :

    function df_single_blog_related_post() {
        $dflt_img   = '';
        $url_src    = esc_url( get_template_directory_uri() . '/includes/assets/images/post-formats/big/' );
        $term_list  = wp_get_post_terms( get_the_ID(), 'category', array( 'fields' => 'slugs' ) );
        $args       = array(
                        'post_type'       => 'post',
                        'post_status'     => 'publish',
                        'post__not_in'    => array( get_the_ID() ),
                        'posts_per_page'  => -1, // Number of related posts to display.
                        'tax_query'       => array(
                            array(
                                'taxonomy'  => 'category',
                                'field'     => 'slug',
                                'terms'     => $term_list
                            )
                      ) );

        $my_query = new wp_query( $args );

        echo '<div class="related-post">';
        echo '<h3 class="related-post-title">' . esc_html__( 'You May Also Like', 'dahztheme' ) . '</h3>';
        echo '<div id="related-slider">';

        while ( $my_query->have_posts() ) : $my_query->the_post();

            switch ( get_post_format() ) :
                case 'audio': $dflt_img = $url_src . 'audio.jpg'; break;
                case 'gallery': $dflt_img = $url_src . 'gallery.jpg'; break;
                case 'image': $dflt_img = $url_src . 'image.jpg'; break;
                case 'video': $dflt_img = $url_src . 'video.jpg'; break;
                case 'quote': $dflt_img = $url_src . 'quote.jpg'; break;
                case 'link': $dflt_img = $url_src . 'link.jpg'; break;
                case 'aside': $dflt_img = $url_src . 'aside.jpg'; break;
                case 'chat': $dflt_img = $url_src . 'chat.jpg'; break;
                case 'status': $dflt_img = $url_src . 'status.jpg'; break;
                default: $dflt_img = $url_src . 'standard.jpg'; break;
            endswitch;

            echo '<div class="related-post-content">';

            echo get_the_image( array(
                    'post_id'           => get_the_ID(),
                    'order'             => array( 'featured', 'default' ),
                    'featured'          => true,
                    'size'              => 'dahz-grid-thumb-cropping',
                    'link_to_post'      => true,
                    'cache'             => true, // Cache the image.
                    'image_class'       => !has_post_thumbnail() ? 'attachment-thumbnail-single-related wp-post-image' : '',
                    'default'           => $dflt_img,
                    'before'            => '<div class="featured-media">',
                    'after'             => '</div>'
                ) );

            echo '<h3 class="related-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';

            echo df_related_posted_on();

            echo '</div>';

        endwhile;

        echo '</div></div><div class="clear"></div>';

        wp_reset_postdata();

    }

endif;

/* ----------------------------------------------------------------------------------- */
/* Related Post Meta                                                                   */
/* ----------------------------------------------------------------------------------- */
if ( !function_exists( 'df_related_posted_on' ) ) :

    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function df_related_posted_on() {
        $author      = esc_html__('By', 'dahztheme') .' '. sprintf('<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span> ', esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author()));
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date()));

        echo '<div class="related-by">';
            printf( '<span class="byline">%1$s</span>', $author );
            df_category_blog();
        echo '</div>';

        printf( '<span class="posted-on">%1$s</span>', sprintf('<a href="%1$s" rel="bookmark">%2$s</a>', esc_url( esc_url( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ) ) ), $time_string ) );

        echo '<div class="related-bytime">';
            df_like();

            if (comments_open() || '0' != get_comments_number()) {

                echo "<span class='comment'><a href='" . esc_url(get_comments_link()) . "'><i class='md-comment'></i><span>";
                comments_number(__('0', 'dahztheme'), __('1', 'dahztheme'), __('%', 'dahztheme'));
                echo "</span></a></span>";
            }

        echo '</div>';
    }

endif;

/* ================================ loop blog ================================ */

/* ----------------------------------------------------------------------------------- */
/* Loop Post Title                                                                     */
/* ----------------------------------------------------------------------------------- */
if ( !function_exists( 'df_loop_blog_post_title' ) ) :
    function df_loop_blog_post_title() {
        // check blog / archive layouts
        $df_blog_layout = is_archive() ? df_options( 'archive_layout', dahz_get_default( 'archive_layout' ) ) : df_options( 'blog_layout', dahz_get_default( 'blog_layout' ) );

        $title          = $df_blog_layout == 'list' ? 'h1' : 'h2';
        $url            = get_post_format() == 'link' ? esc_url( df_get_the_post_format_url() ) : esc_url( get_permalink() );

        printf( '<%1$s ' . dahz_get_attr( 'entry-title' ) . '><a href="%2$s" rel="bookmark" title="%3$s" itemprop="url">%3$s</a></%1$s>', $title, $url, get_the_title() );
    }
endif;
