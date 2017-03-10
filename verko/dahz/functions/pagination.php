<?php

/*-----------------------------------------------------------------------------------*/
/* dahz_pagination() - Custom loop pagination function  */
/*-----------------------------------------------------------------------------------*/
/*
/* Additional documentation: http://codex.wordpress.org/Function_Reference/paginate_links
/*
/* Params:
/*
/* Arguments Array:
/*
/* 'base' (optional) 				- The query argument on which to determine the pagination (for advanced users)
/* 'format' (optional) 				- The format in which the query argument is formatted in it's raw format (for advanced users)
/* 'total' (optional) 				- The total amount of pages
/* 'current' (optional) 			- The current page number
/* 'prev_next' (optional) 			- Whether to include the previous and next links in the list or not.
/* 'prev_text' (optional) 			- The previous page text. Works only if 'prev_next' argument is set to true.
/* 'next_text' (optional) 			- The next page text. Works only if 'prev_next' argument is set to true.
/* 'show_all' (optional) 			- If set to True, then it will show all of the pages instead of a short list of the pages near the current page. By default, the 'show_all' is set to false and controlled by the 'end_size' and 'mid_size' arguments.
/* 'end_size' (optional) 			- How many numbers on either the start and the end list edges.
/* 'mid_size' (optional) 			- How many numbers to either side of current page, but not including current page.
/* 'add_fragment' (optional) 		- An array of query args to add using add_query_arg().
/* 'type' (optional) 				- Controls format of the returned value. Possible values are:
									  'plain' - A string with the links separated by a newline character.
									  'array' - An array of the paginated link list to offer full control of display.
									  'list' - Unordered HTML list.
/* 'before' (optional) 				- The HTML to display before the paginated links.
/* 'after' (optional) 				- The HTML to display after the paginated links.
/* 'echo' (optional) 				- Whether or not to display the paginated links (alternative is to "return").
/* 'use_search_permastruct' (optiona;) - Whether or not to use the "pretty" URL permastruct for search URLs.
/*
/* Query Parameter (optional) 		- Specify a custom query which you'd like to paginate.
/*
/*-----------------------------------------------------------------------------------*/
/**
 * dahz_pagination() is used for paginating the various archive pages created by WordPress. This is not
 * to be used on single.php or other single view pages.
 *
 * @since 3.7.0
 * @uses paginate_links() Creates a string of paginated links based on the arguments given.
 * @param array $args Arguments to customize how the page links are output.
 * @param object $query An optional custom query to paginate.
 */

if ( ! function_exists( 'dahz_pagination' ) ) :
	function dahz_pagination( $args = array(), $query = '' ) {
		global $wp_rewrite, $wp_query;

		do_action( 'dahz_pagination_start' );

		if ( $query ) {

			$wp_query = $query;

		} // End IF Statement

		/* If there's not more than one page, return nothing. */
		if ( 1 >= $wp_query->max_num_pages )
			return;

		/* Get the current page. */
		$current = ( get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1 );

		/* Get the max number of pages. */
		$max_num_pages = intval( $wp_query->max_num_pages );

		/* Set up some default arguments for the paginate_links() function. */
		$defaults = array(
			'base' => add_query_arg( 'paged', '%#%' ),
			'format' => '',
			'total' => $max_num_pages,
			'current' => $current,
			'prev_next' => true,
			'prev_text' => __( '<i class="fa-caret-left"></i>', 'dahztheme' ), // Translate in WordPress. This is the default.
			'next_text' => __( '<i class="fa-caret-right"></i>', 'dahztheme' ), // Translate in WordPress. This is the default.
			'show_all' => false,
			'end_size' => 1,
			'mid_size' => 1,
			'add_fragment' => '',
			'type' => 'plain',
			'before' => '<div class="pagination dahz-pagination">', // Begin woo_pagination() arguments.
			'after' => '</div>',
			'echo' => true, 
			'use_search_permastruct' => true
		);

		/* Allow themes/plugins to filter the default arguments. */
		$defaults = apply_filters( 'dahz_pagination_args_defaults', $defaults );

		/* Add the $base argument to the array if the user is using permalinks. */
		if( $wp_rewrite->using_permalinks() && ! is_search() )
			$defaults['base'] = user_trailingslashit( trailingslashit( get_pagenum_link() ) . 'page/%#%' );

		/* Force search links to use raw permastruct for more accurate multi-word searching. */
		if ( is_search() )
			$defaults['use_search_permastruct'] = false;

		/* If we're on a search results page, we need to change this up a bit. */
		if ( is_search() ) {
		/* If we're in BuddyPress, or the user has selected to do so, use the default "unpretty" URL structure. */
			if ( class_exists( 'BP_Core_User' ) || $defaults['use_search_permastruct'] == false ) {
				$search_query = get_query_var( 's' );
				$paged = get_query_var( 'paged' );
				$base = add_query_arg( 's', urlencode( $search_query ) );
				$base = add_query_arg( 'paged', '%#%' );
				$defaults['base'] = $base;
			} else {
				$search_permastruct = $wp_rewrite->get_search_permastruct();
				if ( ! empty( $search_permastruct ) ) {
					$base = get_search_link();
					$base = add_query_arg( 'paged', '%#%', $base );
					$defaults['base'] = $base;
				}
			}
		}

		/* Merge the arguments input with the defaults. */
		$args = wp_parse_args( $args, $defaults );

		/* Allow developers to overwrite the arguments with a filter. */
		$args = apply_filters( 'dahz_pagination_args', $args );

		/* Don't allow the user to set this to an array. */
		if ( 'array' == $args['type'] )
			$args['type'] = 'plain';

		/* Make sure raw querystrings are displayed at the end of the URL, if using pretty permalinks. */
		$pattern = '/\?(.*?)\//i';

		preg_match( $pattern, $args['base'], $raw_querystring );

		if( $wp_rewrite->using_permalinks() && $raw_querystring )
			$raw_querystring[0] = str_replace( '', '', $raw_querystring[0] );
			@$args['base'] = str_replace( isset($raw_querystring[0]), '', $args['base'] );
			@$args['base'] .= substr( isset($raw_querystring[0]), 0, -1 );
		
		/* Get the paginated links. */
		$page_links = paginate_links( $args );

		/* Remove 'page/1' from the entire output since it's not needed. */
		$page_links = str_replace( array( '&#038;paged=1\'', '/page/1\'' ), '\'', $page_links );

		/* Wrap the paginated links with the $before and $after elements. */
		$page_links = $args['before'] . $page_links . $args['after'];

		/* Allow devs to completely overwrite the output. */
		$page_links = apply_filters( 'dahz_pagination', $page_links );

		do_action( 'dahz_pagination_end' );

		/* Return the paginated links for use in themes. */
		if ( $args['echo'] )
			echo $page_links;
		else
			return $page_links;
	} // End dahz_pagination()
endif; // End IF Statement

/*-----------------------------------------------------------------------------------*/
/* If the user has specified a "posts page", load the "Blog" page template there */
/*-----------------------------------------------------------------------------------*/

add_filter( 'template_include', 'dahz_load_posts_page_blog_template', 10 );
    
if ( ! function_exists( 'dahz_load_posts_page_blog_template' ) ) {
    function dahz_load_posts_page_blog_template ( $template ) {
        if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && is_home() ) {
            $tpl = locate_template( array( 'template-blog.php' ) );
            if ( $tpl != '' ) { $template = $tpl; }
        }
        return $template;
    } // End dahz_load_posts_page_blog_template()
}