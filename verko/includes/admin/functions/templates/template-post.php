<?php
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Template functions related to posts.  The functions in this file are for handling template tags or features 
 * of template tags that WordPress core does not currently handle.
 *
 */

/* === Galleries === */

/**
 * Gets the gallery *item* count.  This is different from getting the gallery *image* count.  By default, 
 * WordPress only allows attachments with the 'image' mime type in galleries.  However, some scripts such 
 * as Cleaner Gallery allow for other mime types.  This is a more accurate count than the 
 * df_get_gallery_image_count() function since it will count all gallery items regardless of mime type.
 *
 * @todo Check for the [gallery] shortcode with the 'mime_type' parameter and use that in get_posts().
 *
 * @since  1.0
 * @access public
 * @return int
 */
// function df_get_gallery_item_count() {

	/* Check the post content for galleries. */
	// $galleries = get_post_galleries( get_the_ID(), true );

	/* If galleries were found in the content, get the gallery item count. */
	// if ( !empty( $galleries ) ) {
	// 	$items = '';

	// 	foreach ( $galleries as $gallery => $gallery_items )
	// 		$items .= $gallery_items;

	// 	preg_match_all( '#src=([\'"])(.+?)\1#is', $items, $sources, PREG_SET_ORDER );

	// 	if ( !empty( $sources ) )
	// 		return count( $sources );
	// }

	/* If an item count wasn't returned, get the post attachments. */
	// $attachments = get_posts( 
	// 	array( 
	// 		'fields'         => 'ids',
	// 		'post_parent'    => get_the_ID(), 
	// 		'post_type'      => 'attachment', 
	// 		'numberposts'    => -1 
	// 	) 
	// );

	/* Return the attachment count if items were found. */
	// if ( !empty( $attachments ) )
	// 	return count( $attachments );

	/* Return 0 for everything else. */
	// return 0;
// }

/**
 * Returns the number of images displayed by the gallery or galleries in a post.
 *
 * @since  1.0
 * @access public
 * @return int
 */
// function df_get_gallery_image_count() {

	/* Set up an empty array for images. */
	// $images = array();

	/* Get the images from all post galleries. */
	// $galleries = get_post_galleries_images();

	/* Merge each gallery image into a single array. */
	// foreach ( $galleries as $gallery_images )
	// 	$images = array_merge( $images, $gallery_images );

	/* If there are no images in the array, just grab the attached images. */
	// if ( empty( $images ) ) {
	// 	$images = get_posts( 
	// 		array( 
	// 			'fields'         => 'ids',
	// 			'post_parent'    => get_the_ID(), 
	// 			'post_type'      => 'attachment', 
	// 			'post_mime_type' => 'image', 
	// 			'numberposts'    => -1 
	// 		) 
	// 	);
	// }

	/* Return the count of the images. */
	// return count( $images );
// }

/* === Links === */

/**
 * Gets a URL from the content, even if it's not wrapped in an <a> tag.
 *
 * @since  1.0
 * @access public
 * @param  string  $content
 * @return string
 */
function df_get_content_url( $content ) {

	/* Catch links that are not wrapped in an '<a>' tag. */
	preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', make_clickable( $content ), $matches );

	return !empty( $matches[1] ) ? esc_url_raw( $matches[1] ) : '';
}

/**
 * Filters 'get_the_post_format_url' to make for a more robust and back-compatible function.  If WP did 
 * not find a URL, check the post content for one.  If nothing is found, return the post permalink.
 *
 * @since  1.0
 * @access public
 * @param  string  $url
 * @param  object  $post
 * @note   Setting defaults for the parameters so that this function can become a filter in future WP versions.
 * @return string
 */
function df_get_the_post_format_url( $url = '', $post = null ) {

	if ( empty( $url ) ) {

		$post = is_null( $post ) ? get_post() : $post;

		$content_url = df_get_content_url( $post->post_content );

		$url = !empty( $content_url ) ? $content_url : get_permalink( $post->ID );
	}

	return $url;
}

/**
 * The WordPress.org theme review requires that a link be provided to the single post page for untitled 
 * posts.  This is a filter on 'the_title' so that an '(Untitled)' title appears in that scenario, allowing 
 * for the normal method to work.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $title
 * @return string
 */
function df_untitled_post( $title ) {

	if ( empty( $title ) && !is_admin() ) {

		/* Translators: Used as a placeholder for untitled posts on non-singular views. */
		$title = __( 'Untitled', 'dahztheme' );
	}

	return $title;
}
add_filter( 'the_title', 'df_untitled_post' );