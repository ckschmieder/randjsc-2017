<?php
/* ----------------------------------------------------------------------------------- */
/* Pagination switcher                                                                 */
/* ----------------------------------------------------------------------------------- */
if ( !function_exists( 'df_get_pagination' ) ) :
    function df_get_pagination() {
        if( ! is_customize_preview() ):
            $pagination_switcher = df_options( 'pagination_style', dahz_get_default( 'pagination_style' ) );
                switch ( $pagination_switcher ) :
                    case 'prev-next': df_pagenav(); break;
                    case 'number': df_pagenav_number(); break;
                    case 'infinite': df_pagenav_infinite_scroll(); break;
                    case 'infinite_button': df_pagenav_infinite_scroll_button(); break;
                    default: df_pagenav(); break;
                endswitch;
        endif;
    }
endif;
/* ----------------------------------------------------------------------------------- */
/* Standard Pagination display                                                         */
/* ----------------------------------------------------------------------------------- */
if ( !function_exists( 'df_pagenav' ) ) :
    function df_pagenav() {
        // Don't print empty markup if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) return;

        echo '<div class="clear"></div>';
        echo '<nav class="navigation paging-navigation col-full df-next-prev-pagination">';
        echo '<div class="nav-links">';
        if (get_previous_posts_link()) :
            echo '<div class="nav-previous alignleft">';
                previous_posts_link(__('Prev', 'dahztheme'));
            echo '</div>';
        endif;
        if (get_next_posts_link()) :
            echo '<div class="nav-next alignright">';
                next_posts_link(__('Next', 'dahztheme'));
            echo '</div>';
        endif;
        echo '</div><!-- .nav-links -->';
        echo '</nav><!-- .navigation -->';
        echo '<div class="clear"></div>';
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* Pagination number display                                                           */
/* ----------------------------------------------------------------------------------- */
if ( !function_exists( 'df_pagenav_number' ) ) :
    function df_pagenav_number() {
        global $wp_query, $wp_rewrite;
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        $default_link   = @add_query_arg('paged', '%#%', esc_url(get_pagenum_link('page')));
        $custom_link    = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');

        $next_text_pagination = is_rtl() ? '<i class="md-keyboard-arrow-left"></i>' : '<i class="md-keyboard-arrow-right"></i>';
        $prev_text_pagination = is_rtl() ? '<i class="md-keyboard-arrow-right"></i>' : '<i class="md-keyboard-arrow-left"></i>';

        $pagination_num = array(
            'base'      => ( $wp_rewrite->using_permalinks() ) ? $custom_link : $default_link,
            'format'    => '?paged=%#%',
            'total'     => $wp_query->max_num_pages,
            'current'   => $current,
            'show_all'  => false,
            'end_size'  => 1,
            'mid_size'  => 2,
            'type'      => 'list',
            'add_args'  => ( !empty( $wp_query->query_vars['s'] ) ) ? array('s' => get_query_var('s')) : '',
            'next_text' => $next_text_pagination,
            'prev_text' => $prev_text_pagination
        );

        echo "<div class='df-pagination-number'>";
        echo paginate_links( $pagination_num );
        echo '<div class="clear"></div>';
        echo "</div>";
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* Pagination inifinite scroll display                                                 */
/* ----------------------------------------------------------------------------------- */
if ( !function_exists( 'df_pagenav_infinite_scroll' ) ) :
    function df_pagenav_infinite_scroll() {
        // Don't print empty markup if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) return;

        echo '<nav class="navigation paging-navigation col-full df-infi-scr">';
        echo '<div class="nav-links">';
        if ( get_next_posts_link() ) :
            echo '<div class="nav-next df-infi-scr">';
                next_posts_link(__('Next Page <i class="df-arrow-grand-right"></i>', 'dahztheme'));
            echo '</div>';
        endif;
        echo '</div>';
        echo '</nav>';
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* Pagination infinite scroll button display                                           */
/* ----------------------------------------------------------------------------------- */
if ( !function_exists( 'df_pagenav_infinite_scroll_button' ) ) :
    function df_pagenav_infinite_scroll_button() {
        // Don't print empty markup if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) return;

        echo '<nav class="navigation paging-navigation col-full df-infi-scr-btn">';
        echo '<div class="nav-links">';
        if ( get_next_posts_link() ) :
            echo '<div class="nav-next button ' . esc_attr( df_btn_shape() ) . '">';
                next_posts_link(__('load more', 'dahztheme'));
            echo '</div>';
        endif;
        echo '</div><!-- .nav-links -->';
        echo '</nav><!-- .navigation -->';
        echo '<div class="clear"></div>';
    }
endif;


/* ----------------------------------------------------------------------------------- */
/* Enqueue Media Element Script and Style                                              */
/* ----------------------------------------------------------------------------------- */

add_action( 'wp_enqueue_scripts', 'df_enqueue_mediaelement' );

if ( !function_exists( 'df_enqueue_mediaelement' ) ) :
    function df_enqueue_mediaelement() {
        wp_enqueue_style( 'wp-mediaelement' );
        wp_enqueue_script( 'wp-playlist' );
    }
endif;
