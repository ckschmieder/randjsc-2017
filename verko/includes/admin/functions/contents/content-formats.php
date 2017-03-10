<?php

if ( ! defined( 'ABSPATH' ) ) { exit; }


// =======================================================================
// DF POST FORMAT AUDIO
// =======================================================================
if ( !function_exists('df_audio_post_format') ) :

	function df_audio_post_format() {
		if (! post_password_required() ) :
			// metabox page audio upload blog
		  $upload_audio = wp_get_attachment_url( get_post_meta( get_the_ID(), 'df_metabox_pf_upload_single_post_audio', true ) );
			$embbed_audio = get_post_meta( get_the_ID(), 'df_metabox_pf_audio_textarea', true );

	        if ( has_post_thumbnail() && $upload_audio != '' ) {
	            echo "<div class='df-post-audio df-post-audio-thumbnail'>";
	            the_post_thumbnail( 'full' );
	        } else {
	            echo "<div class='df-post-audio'>";
	        }

	        if ( $upload_audio != '' ) {
	            echo do_shortcode( '[audio src="' . esc_url( $upload_audio ) . '"]' );
	        } elseif ( $embbed_audio != '' ) {
	            $allowed_html = array(
	                'iframe' => array(
	                    'src' 				=> array(),
	                    'id' 				=> array(),
	                    'allowfullscreen' 	=> array(),
	                    'frameborder' 		=> array(),
	                    'width' 			=> array(),
	                    'height' 			=> array(),
	                    'url' 				=> array(),
	                    'scrolling' 		=> array(),
	                )
	            );
	            echo wp_kses( $embbed_audio, $allowed_html, "http, https, ftp, mailto");
	        }
	        echo "</div>";

		endif;
	}

endif;

// =======================================================================
// DF POST FORMAT GALLERY
// =======================================================================
function df_gallery_post_format() {

	if (! post_password_required() ) :
		$df_bg_mode_lay = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true );

		if ( $df_bg_mode_lay == '1' ) { return false; }

		$gallery 		= get_post_gallery( get_the_ID() );
		if ( is_home() ) {
			$df_blog_layout = df_options( 'blog_layout', dahz_get_default( 'blog_layout' ) );
			$df_grid_type = df_options( 'blog_content_grid', dahz_get_default( 'blog_content_grid' ) );
			$conditional = ( is_home() && $df_grid_type == 'masonry'  );
		} elseif ( is_archive() ) {
			 $df_blog_layout = df_options( 'archive_layout', dahz_get_default( 'archive_layout' ) );
			 $df_grid_type = df_options( 'arch_content_grid', dahz_get_default( 'arch_content_grid' ) );
			 $conditional = ( is_archive() && $df_grid_type == 'masonry'  );
		}

			if( $df_blog_layout == 'list' || $conditional ) :
		    echo "<div class='df-gallery-grid'>";
		    echo $gallery;
		    echo "</div>";
	    endif;

	endif;

}

// =======================================================================
// DF POST FORMAT VIDEO
// =======================================================================
if ( !function_exists('df_video_post_format') ) :

	function df_video_post_format() {

		if (! post_password_required() ) :

			// metabox page video upload blog
		    $upload_videos = wp_get_attachment_url(get_post_meta(get_the_ID(), 'df_metabox_pf_upload_single_post_video', true));
		    $embbed_videos = get_post_meta(get_the_ID(), 'df_metabox_pf_video_textarea', true);

		    echo "<div class='df-post-video'>";

			    if ( $upload_videos != '' ) {
			        echo do_shortcode('[video src="' . esc_url($upload_videos) . '"]');

			    } elseif ( $embbed_videos != '' ) {
					$allowed_html = array(
						'iframe' 						=> array(
							'src' 						=> array(),
							'id' 							=> array(),
							'allowfullscreen' => array(),
							'frameborder' 		=> array(),
							'width' 					=> array(),
							'height' 					=> array(),
							'url' 						=> array(),
							'scrolling' 			=> array(),
						)
					);

					echo wp_kses( $embbed_videos, $allowed_html, "http, https, ftp, mailto");
			    }

		    echo "</div>";

		endif;

	}

endif;
