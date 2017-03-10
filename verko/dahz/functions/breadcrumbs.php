<?php
/*-----------------------------------------------------------------------------------*/
/* dahz_breadcrumbs() - Custom breadcrumbs generator function  */
/*
/* Params:
/*
/* Arguments Array:
/*
/* 'separator' 			- The character to display between the breadcrumbs.
/* 'before' 			- HTML to display before the breadcrumbs.
/* 'after' 				- HTML to display after the breadcrumbs.
/* 'front_page' 		- Include the front page at the beginning of the breadcrumbs.
/* 'show_home' 			- If $show_home is set and we're not on the front page of the site, link to the home page.
/* 'echo' 				- Specify whether or not to echo the breadcrumbs. Alternative is "return".
/* 'show_posts_page'	- If a static front page is set and there is a posts page, toggle whether or not to display that page's tree.
/*
/*-----------------------------------------------------------------------------------*/
function dahz_breadcrumbs( $args = array() ) {
	$df_framework = new dahzBreadcrumbs( $args );
}


class dahzBreadcrumbs {
	public $args = array();

	private static $instance;
	function __construct() {
		self::$instance =& $this;
		$this->setup();

		add_filter( 'dahz_breadcrumbs_trail', array($this, 'dahz_maybe_add_shop_page_link') );
		add_filter( 'dahz_breadcrumbs_args', array($this, 'df_set_default_breadcrumb_taxonomies') );

	}

	public function setup( $args = array() ) {
		global $wp_query, $wp_rewrite;
		/* Create an empty variable for the breadcrumb. */
		$breadcrumb = '';

		/* Create an empty array for the trail. */
		$trail = array();
		$path = '';

		/* Set up the default arguments for the breadcrumb. */
		$defaults = array(
			'separator' 					=> '›',
			'before' 						=> '<span class="breadcrumb-title">' . __( 'You are here:', 'dahztheme' ) . '</span>',
			'after' 						=> false,
			'front_page' 					=> true,
			'show_home' 							=> __( 'Home ', 'dahztheme' ),
			'echo' 							=> true,
			'show_posts_page' 				=> true,
			'show_only_first_taxonomy_tree' => false
		);

		/* Allow singular post views to have a taxonomy's terms prefixing the trail. */
		if ( is_singular() ) {
			$defaults["singular_{$wp_query->post->post_type}_taxonomy"] = false;
		}

		/* Apply filters to the arguments. */
		$args = apply_filters( 'dahz_breadcrumbs_args', $args );

		/* Parse the arguments and extract them for easy variable naming. */
		extract( wp_parse_args( $args, $defaults ) );

		/* If $show_home is set and we're not on the front page of the site, link to the home page. */
		if ( !is_front_page() && $show_home )
			$trail[] = '<a href="' . esc_url( home_url() ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home" class="trail-begin">' . esc_html( $show_home ) . '</a>';

		/* If viewing the front page of the site. */
		if ( is_front_page() ) {
			if ( !$front_page )
				$trail = false;
			elseif ( $show_home )
				$trail['trail_end'] = "{$show_home}";
		}

		/* If viewing the "home"/posts page. */
		elseif ( is_home() ) {
			$home_page = get_page( $wp_query->get_queried_object_id() );
			$trail = array_merge( $trail, $this->dahz_breadcrumbs_get_parents( $home_page->post_parent, '' ) );
			$trail['trail_end'] = get_the_title( $home_page->ID );
		}

		/* If viewing a singular post (page, attachment, etc.). */
		elseif ( is_singular() ) {

			/* Get singular post variables needed. */
			$post = $wp_query->get_queried_object();
			$post_id = absint( $wp_query->get_queried_object_id() );
			$post_type = $post->post_type;
			$parent = $post->post_parent;
			$post_type_object = get_post_type_object( $post_type );

			/* If an attachment, check if there are any pages in its hierarchy based on the slug. */
			if ( 'attachment' == $post_type ) {
				/* If $front has been set, add it to the $path. */
				if ( ( $post_type_object->rewrite['with_front'] && $wp_rewrite->front ) )
					$path .= trailingslashit( $wp_rewrite->front );

				/* If there's a slug, add it to the $path. */
				if ( !empty( $post_type_object->rewrite['slug'] ) )
					$path .= $post_type_object->rewrite['slug'];

				/* If there's a path, check for parents. */
				if ( !empty( $path ) && '/' != $path )
					$trail = array_merge( $trail, $this->dahz_breadcrumbs_get_parents( '', $path ) );
			}

			/* If there's an archive page, add it to the trail. */
			if ( ! empty( $post_type_object->has_archive ) )
				$trail['post_type_archive_link'] = '<a href="' . get_post_type_archive_link( $post_type ) . '" title="' . esc_attr( $post_type_object->labels->name ) . '">' . esc_html( $post_type_object->labels->name ) . '</a>';

			/* If the post type path returns nothing and there is a parent, get its parents. */
			if ( empty( $path ) && 0 !== $parent || 'attachment' == $post_type )
				$trail = array_merge( $trail, $this->dahz_breadcrumbs_get_parents( $parent, '' ) );

			/* Toggle the display of the posts page on single blog posts. */
			if ( 'post' == $post_type && $show_posts_page == true && 'page' == get_option( 'show_on_front' ) ) {
				$posts_page = get_option( 'page_for_posts' );
				if ( $posts_page != '' && is_numeric( $posts_page ) ) {
					$trail = array_merge( $trail, $this->dahz_breadcrumbs_get_parents( $posts_page, '' ) );
				}
			}

			/* Display terms for specific post type taxonomy if requested. */
			if ( isset( $args["singular_{$post_type}_taxonomy"] ) ) {
				$raw_terms = get_the_terms( $post_id, $args["singular_{$post_type}_taxonomy"] );

				if ( is_array( $raw_terms ) && 0 < count( $raw_terms ) && ! is_wp_error( $raw_terms ) ) {
					$links = array();
					$count = 0;

					$sorted = $raw_terms;

					$terms_by_ancestor = array();
					foreach ( $raw_terms as $k => $v ) {
						$ancestors = array_reverse( get_ancestors( $v->term_id, $args["singular_{$post_type}_taxonomy"] ) );
						if ( isset( $ancestors[0] ) ) {
							$key = $ancestors[0];
						} else {
							$key = $v->term_id;
						}
						$terms_by_ancestor[$key][$v->term_id] = get_term_by( 'term_id', $v->term_id, $args["singular_{$post_type}_taxonomy"] );
					}

					if ( 0 < count( $terms_by_ancestor ) ) {
						$sorted = array();
						foreach ( $terms_by_ancestor as $k => $v ) {
							if ( 0 < count( $v ) ) {
								foreach ( $v as $i => $j ) {
									$sorted[$i] = $j;
								}
							}
						}
						foreach ( $sorted as $k => $v ) {
							if ( isset( $sorted[$v->parent] ) ) {
								unset( $sorted[$v->parent] );
							}
						}
					}

					foreach ( $sorted as $k => $v ) {
						$count++;
						if ( isset( $args['show_only_first_taxonomy_tree'] ) && true == (bool)$args['show_only_first_taxonomy_tree'] && 1 < $count ) continue; // Display only the first match.
						$parents = $this->dahz_get_term_parents( $v->term_id, $args["singular_{$post_type}_taxonomy"], true, ', ', $v->name, array() );
						if ( $parents != '' && ! is_wp_error( $parents ) ) {
							$parents_arr = explode( ', ', $parents );
							foreach ( $parents_arr as $p ) {
								if ( $p != '' && ! in_array( $p, $links ) ) { $links[] = $p; }
							}
						}
					}

					if ( 0 < count( $links ) ) {
						foreach ( $links as $k => $v ) {
							$trail[] = $v;
						}
					}
				}
			}

			/* End with the post title. */
			$post_title = get_the_title( $post_id ); // Force the post_id to make sure we get the correct page title.
			if ( !empty( $post_title ) )
				$trail['trail_end'] = $post_title;
		}

		/* If we're viewing any type of archive. */
		elseif ( is_archive() ) {

			/* If viewing a taxonomy term archive. */
			if ( is_tax() || is_category() || is_tag() ) {

				/* Get some taxonomy and term variables. */
				$term = $wp_query->get_queried_object();
				$taxonomy = get_taxonomy( $term->taxonomy );

				/* Get the path to the term archive. Use this to determine if a page is present with it. */
				if ( is_category() )
					$path = get_option( 'category_base' );
				elseif ( is_tag() )
					$path = get_option( 'tag_base' );
				else {
					if ( $taxonomy->rewrite['with_front'] && $wp_rewrite->front )
						$path = trailingslashit( $wp_rewrite->front );
					$path .= $taxonomy->rewrite['slug'];
				}

				/* Get parent pages by path if they exist. */
				if ( $path )
					$trail = array_merge( $trail, $this->dahz_breadcrumbs_get_parents( '', $path ) );

				/* If the taxonomy is hierarchical, list its parent terms. */
				if ( is_taxonomy_hierarchical( $term->taxonomy ) && $term->parent )
					$trail = array_merge( $trail, $this->dahz_breadcrumbs_get_term_parents( $term->parent, $term->taxonomy ) );

				/* Add the term name to the trail end. */
				$trail['trail_end'] = $term->name;
			}

			/* If viewing a post type archive. */
			elseif ( is_post_type_archive() ) {

				/* Get the post type object. */
				$post_type_object = get_post_type_object( get_query_var( 'post_type' ) );

				/* If $front has been set, add it to the $path. */
				if ( $post_type_object->rewrite['with_front'] && $wp_rewrite->front )
					$path .= trailingslashit( $wp_rewrite->front );

				/* If there's a slug, add it to the $path. */
				if ( !empty( $post_type_object->rewrite['archive'] ) )
					$path .= $post_type_object->rewrite['archive'];

				/* If there's a path, check for parents. */
				if ( !empty( $path ) && '/' != $path )
					$trail = array_merge( $trail, $this->dahz_breadcrumbs_get_parents( '', $path ) );

				/* Add the post type [plural] name to the trail end. */
				$trail['trail_end'] = $post_type_object->labels->name;
			}

			/* If viewing an author archive. */
			elseif ( is_author() ) {
				/* If $front has been set, add it to $path. */
				if ( !empty( $wp_rewrite->front ) )
					$path .= trailingslashit( $wp_rewrite->front );

				/* If an $author_base exists, add it to $path. */
				if ( !empty( $wp_rewrite->author_base ) )
					$path .= $wp_rewrite->author_base;

				/* If $path exists, check for parent pages. */
				if ( !empty( $path ) )
					$trail = array_merge( $trail, $this->dahz_breadcrumbs_get_parents( '', $path ) );

				/* Add the author's display name to the trail end. */
				$trail['trail_end'] = get_the_author_meta( 'display_name', get_query_var( 'author' ) );
			}

			/* If viewing a time-based archive. */
			elseif ( is_time() ) {
				if ( get_query_var( 'minute' ) && get_query_var( 'hour' ) )
					$trail['trail_end'] = get_the_time( __( 'g:i a', 'dahztheme' ) );

				elseif ( get_query_var( 'minute' ) )
					$trail['trail_end'] = sprintf( __( 'Minute %1$s', 'dahztheme' ), get_the_time( __( 'i', 'dahztheme' ) ) );

				elseif ( get_query_var( 'hour' ) )
					$trail['trail_end'] = get_the_time( __( 'g a', 'dahztheme' ) );
			}

			/* If viewing a date-based archive. */
			elseif ( is_date() ) {
				/* If $front has been set, check for parent pages. */
				if ( $wp_rewrite->front )
					$trail = array_merge( $trail, $this->dahz_breadcrumbs_get_parents( '', $wp_rewrite->front ) );

				if ( is_day() ) {
					$trail[] = '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attr__( 'Y', 'dahztheme' ) ) . '">' . get_the_time( __( 'Y', 'dahztheme' ) ) . '</a>';
					$trail[] = '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '" title="' . get_the_time( esc_attr__( 'F', 'dahztheme' ) ) . '">' . get_the_time( __( 'F', 'dahztheme' ) ) . '</a>';
					$trail['trail_end'] = get_the_time( __( 'j', 'dahztheme' ) );
				}

				elseif ( get_query_var( 'w' ) ) {
					$trail[] = '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attr__( 'Y', 'dahztheme' ) ) . '">' . get_the_time( __( 'Y', 'dahztheme' ) ) . '</a>';
					$trail['trail_end'] = sprintf( __( 'Week %1$s', 'dahztheme' ), get_the_time( esc_attr__( 'W', 'dahztheme' ) ) );
				}

				elseif ( is_month() ) {
					$trail[] = '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attr__( 'Y', 'dahztheme' ) ) . '">' . get_the_time( __( 'Y', 'dahztheme' ) ) . '</a>';
					$trail['trail_end'] = get_the_time( __( 'F', 'dahztheme' ) );
				}

				elseif ( is_year() ) {
					$trail['trail_end'] = get_the_time( __( 'Y', 'dahztheme' ) );
				}
			}
		}

		/* If viewing search results. */
		elseif ( is_search() )
			$trail['trail_end'] = sprintf( __( 'Search results for &quot;%1$s&quot;', 'dahztheme' ), esc_attr( get_search_query() ) );

		/* If viewing a 404 error page. */
		elseif ( is_404() )
			$trail['trail_end'] = __( '404 Not Found', 'dahztheme' );

		/* Allow child themes/plugins to filter the trail array. */
		$trail = apply_filters( 'dahz_breadcrumbs_trail', $trail, $args );

		/* Connect the breadcrumb trail if there are items in the trail. */
		if ( is_array( $trail ) ) {

			/* Open the breadcrumb trail containers. */
			$breadcrumb = '<div class="breadcrumb woo-breadcrumbs"><div class="breadcrumb-trail">';

			/* If $before was set, wrap it in a container. */
			if ( !empty( $before ) )
				$breadcrumb .= '<span class="trail-before">' . wp_kses_post( $before ) . '</span> ';

			/* Wrap the $trail['trail_end'] value in a container. */
			if ( !empty( $trail['trail_end'] ) )
				$trail['trail_end'] = '<span class="trail-end">' . wp_kses_post( $trail['trail_end'] ) . '</span>';

			/* Format the separator. */
			if ( !empty( $separator ) )
				$separator = '<span class="sep">' . wp_kses_post( $separator ) . '</span>';

			/* Join the individual trail items into a single string. */
			$breadcrumb .= join( " {$separator} ", $trail );

			/* If $after was set, wrap it in a container. */
			if ( !empty( $after ) )
				$breadcrumb .= ' <span class="trail-after">' . wp_kses_post( $after ) . '</span>';

			/* Close the breadcrumb trail containers. */
			$breadcrumb .= '</div></div>';
		}

		/* Allow developers to filter the breadcrumb trail HTML. */
		$breadcrumb = apply_filters( 'dahz_breadcrumbs', $breadcrumb );

		/* Output the breadcrumb. */
		if ( $echo )
			echo $breadcrumb;
		else
			return $breadcrumb;
	}

	public function dahz_breadcrumbs_get_term_parents( $parent_id = '', $taxonomy = '' ) {
		/* Set up some default arrays. */
		$trail = array();
		$parents = array();

		/* If no term parent ID or taxonomy is given, return an empty array. */
		if ( empty( $parent_id ) || empty( $taxonomy ) )
			return $trail;

		/* While there is a parent ID, add the parent term link to the $parents array. */
		while ( $parent_id ) {

			/* Get the parent term. */
			$parent = get_term( $parent_id, $taxonomy );

			/* Add the formatted term link to the array of parent terms. */
			$parents[] = '<a href="' . get_term_link( $parent, $taxonomy ) . '" title="' . esc_attr( $parent->name ) . '">' . $parent->name . '</a>';

			/* Set the parent term's parent as the parent ID. */
			$parent_id = $parent->parent;
		}

		/* If we have parent terms, reverse the array to put them in the proper order for the trail. */
		if ( !empty( $parents ) )
			$trail = array_reverse( $parents );

		/* Return the trail of parent terms. */
		return $trail;
	}

	public function dahz_get_term_parents( $id, $taxonomy, $link = false, $separator = '/', $nicename = false, $visited = array() ) {
		$chain = '';
		$parent = get_term( $id, $taxonomy );
		if ( is_wp_error( $parent ) )
			return $parent;

		if ( $nicename ) {
			$name = $parent->slug;
		} else {
			$name = $parent->name;
		}

		if ( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
			$visited[] = $parent->parent;
			$chain .= $this->dahz_get_term_parents( $parent->parent, $taxonomy, $link, $separator, $nicename, $visited );
		}

		if ( $link ) {
			$chain .= '<a href="' . get_term_link( $parent, $taxonomy ) . '" title="' . esc_attr( sprintf( __( 'View %s', 'dahztheme' ), $parent->name ) ) . '">' . esc_html( $parent->name ) . '</a>' . $separator;
		} else {
			$chain .= $name.$separator;
		}
		return $chain;
	}

	public function dahz_breadcrumbs_get_parents( $post_id = '', $path = '' ) {
		/* Set up an empty trail array. */
		$trail = array();

		/* If neither a post ID nor path set, return an empty array. */
		if ( empty( $post_id ) && empty( $path ) )
			return $trail;

		/* If the post ID is empty, use the path to get the ID. */
		if ( empty( $post_id ) ) {

			/* Get parent post by the path. */
			$parent_page = get_page_by_path( $path );

			/* ********************************************************************
			Modification: The above line won't get the parent page if
			the post type slug or parent page path is not the full path as required
			by get_page_by_path. By using get_page_with_title, the full parent
			trail can be obtained. This may still be buggy for page names that use
			characters or long concatenated names.
			Author: Byron Rode
			Date: 06 June 2011
			******************************************************************* */

			if( empty( $parent_page ) )
			        // search on page name (single word)
				$parent_page = get_page_by_title ( $path );

			if( empty( $parent_page ) )
				// search on page title (multiple words)
				$parent_page = get_page_by_title ( str_replace( array('-', '_'), ' ', $path ) );

			/* End Modification */

			/* If a parent post is found, set the $post_id variable to it. */
			if ( !empty( $parent_page ) )
				$post_id = $parent_page->ID;
		}

		/* If a post ID and path is set, search for a post by the given path. */
		if ( $post_id == 0 && !empty( $path ) ) {

			/* Separate post names into separate paths by '/'. */
			$path = trim( $path, '/' );
			preg_match_all( "/\/.*?\z/", $path, $matches );

			/* If matches are found for the path. */
			if ( isset( $matches ) ) {

				/* Reverse the array of matches to search for posts in the proper order. */
				$matches = array_reverse( $matches );

				/* Loop through each of the path matches. */
				foreach ( $matches as $match ) {

					/* If a match is found. */
					if ( isset( $match[0] ) ) {

						/* Get the parent post by the given path. */
						$path = str_replace( $match[0], '', $path );
						$parent_page = get_page_by_path( trim( $path, '/' ) );

						/* If a parent post is found, set the $post_id and break out of the loop. */
						if ( !empty( $parent_page ) && $parent_page->ID > 0 ) {
							$post_id = $parent_page->ID;
							break;
						}
					}
				}
			}
		}

		/* While there's a post ID, add the post link to the $parents array. */
		while ( $post_id ) {
			/* Get the post by ID. */
			$page = get_page( $post_id );

			/* Add the formatted post link to the array of parents. */
			$parents[]  = '<a href="' . esc_url( get_permalink( $post_id ) ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . esc_html( get_the_title( $post_id ) ) . '</a>';

			/* Set the parent post's parent to the post ID. */
			$post_id = $page->post_parent;
		}

		/* If we have parent posts, reverse the array to put them in the proper order for the trail. */
		if ( isset( $parents ) )
			$trail = array_reverse( $parents );

		/* Return the trail of parent posts. */
		return $trail;
	}

	public function dahz_maybe_add_shop_page_link ( $trail ) {
		if ( is_singular() && 'product' == get_post_type() && function_exists( 'wc_get_page_id' ) ) {
			$permalinks   = get_option( 'woocommerce_permalinks' );
			$shop_page_id = wc_get_page_id( 'shop' );
			$shop_page    = get_post( $shop_page_id );

			// If permalinks contain the shop page in the URI prepend the breadcrumb with shop
			if ( isset( $trail['post_type_archive_link'] ) ) {
				if ( $shop_page_id && $shop_page && strstr( $permalinks['product_base'], '/' . $shop_page->post_name ) && get_option( 'page_on_front' ) !== $shop_page_id ) {
					$trail['post_type_archive_link'] = '<a href="' . esc_url( get_permalink( $shop_page_id ) ) . '" title="' . esc_attr( $shop_page->post_title ) . '">' . esc_html( $shop_page->post_title ) . '</a>';
				} else {
					if ( true == (bool)apply_filters( 'df_hide_product_post_type_archive_link', false ) ) {
						unset( $trail['post_type_archive_link'] );
					}
				}
			}
		}
		return $trail;
	}

	public function df_set_default_breadcrumb_taxonomies ( $args ) {
		$post_types = get_post_types( array( 'public' => true ) );
		if ( 0 < count( $post_types ) ) {
			foreach ( $post_types as $k => $v ) {
				$taxonomies = get_taxonomies( array( 'object_type' => array( $k ), 'public' => true ) );
				$post_types[$k] = '';
				// Choose the first taxonomy, if one is present.
				if ( 0 < count( $taxonomies ) ) {
					foreach ( $taxonomies as $i => $j ) {
						if ( '' != $post_types[$k] ) continue;
						$post_types[$k] = $j;
					}
				}

				if ( '' != $post_types[$k] && ! isset( $args['singular_' . $k . '_taxonomy'] ) && is_singular() && ( $k == get_post_type() ) ) {
					$args['singular_' . $k . '_taxonomy'] = $post_types[$k];
				}
			}
		}

		return $args;
	}

}

// End dahzBreadcrumbs class();
