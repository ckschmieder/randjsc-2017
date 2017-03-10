<?php

/*
 * modify existing HTML attribute functions and filters.
 */
function df_custom_attr_menu( $attr ) {

	$attr['class'] = 'main-navigation hidden-tl hidden-sm';

	return $attr;
}
add_filter('dahz_attr_menu', 'df_custom_attr_menu');

function df_custom_attr_entry_title( $attr ) {

	$df_blog_layout = '';
	if ( is_home() ) {
		$df_blog_layout = df_options( 'blog_layout', dahz_get_default( 'blog_layout' ) );
		$df_grid_type = df_options( 'blog_content_grid', dahz_get_default( 'blog_content_grid' ) );
	} elseif ( is_archive() ) {
		$df_blog_layout = df_options( 'archive_layout', dahz_get_default( 'archive_layout' ) );
		$df_grid_type = df_options( 'arch_content_grid', dahz_get_default( 'arch_content_grid' ) );
	}
    $df_bg_mode_lay = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true );

    $output 		= array( 'entry-title', 'df-post-title' );
    
    if ( !is_single() && ( $df_blog_layout == 'list' || ( $df_blog_layout == 'grid' && $df_grid_type == 'masonry' ) ) ) {
    	if ( $df_bg_mode_lay != '1' && ( in_array( get_post_format(), array( 'aside', 'quote', 'status' ) ) ) ) {
			$output[] = 'hide';
    	}
	} else if ( is_single() ) {
		$output[] = 'hide';
	}

	$attr['class'] = esc_attr( implode( " ", $output ) );

	return $attr;
}
add_filter('dahz_attr_entry-title', 'df_custom_attr_entry_title');

function df_custom_attr_post( $attr ) {

	// set the output class
	$blog_layout   = is_page() ? array() : array( df_image_as_bg(), df_big_post_grid(), df_blog_grid_col() );
	$sticky  	   = is_sticky() ? array( 'df_sticky' ) : array();
	$outputs 	   = array_merge( get_post_class(), $blog_layout, $sticky );
	$attr['class'] = esc_attr( implode( " ", $outputs ) );

	return $attr;
}
add_filter( 'dahz_attr_post', 'df_custom_attr_post' );

function df_custom_remove_role( $attr ) {

	unset( $attr['role'] );

	return $attr;
}

add_filter( 'dahz_attr_header',  'df_custom_remove_role', 5    );
add_filter( 'dahz_attr_footer',  'df_custom_remove_role', 5    );
add_filter( 'dahz_attr_content', 'df_custom_remove_role', 5    );
add_filter( 'dahz_attr_sidebar', 'df_custom_remove_role', 5, 2 );
add_filter( 'dahz_attr_menu',    'df_custom_remove_role', 5, 2 );
add_filter( 'dahz_attr_post',    'df_custom_remove_role', 5    );
add_filter( 'dahz_attr_entry',   'df_custom_remove_role', 5    );