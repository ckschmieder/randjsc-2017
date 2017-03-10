<?php
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* Page & Post Header Title Contoller*/
/*-----------------------------------------------------------------------------------*/
//class DF_Title_Controller {

/**
 * init()
 *
 * initialize action
 *
 * @return void
 */
//public function DF_Title_Controller() {
//
    add_action( 'dahztheme_title_controller',  'df_fancy_title_header_controller' , 15 );
    add_action( 'dahztheme_title_controller',  'df_page_title_header_controller', 16 );
    add_action( 'dahztheme_title_controller',  'df_slider_title_header_controller' , 10 );

//}

/**
 *  Page & Post Show or Hide Header Title Contoller
 * @return void
 */
if( ! function_exists( 'df_page_title_header_controller' ) ) :

function df_page_title_header_controller() {
 	$page_title_bg_color = df_options( 'page_header_title_bg_color', dahz_get_default( 'page_header_title_bg_color' ) );
 	$page_title_height   = df_options( 'page_header_title_height', dahz_get_default( 'page_header_title_height' ) );
 	$title_align 		 = df_options( 'page_header_title_align', dahz_get_default( 'page_header_title_align' ) );
 	$page_title 		 = df_options( 'show_page_header_title', dahz_get_default( 'show_page_header_title' ) );
 	$page_breadcrumb 	 = df_options( 'show_page_header_breadcrumb', dahz_get_default( 'show_page_header_breadcrumb' ) );

 	$show_titles 		 = ( 1 == $page_title );
	$title_classes 		 = array( 'col-full df-page-header' );
	$container_style 	 = array();
	$df_breadcrumbs 	 = ( 1 == $page_breadcrumb );
	$is_home 			 = ( ! df_is_homepage() );
  $title = '';

	if ( is_404() ) return;

	if ( ! $show_titles ) { return; }

	switch( $title_align ) {

		case 'right' :
			$title_classes[] = 'title-right';
			break;

		case 'center' :
			$title_classes[] = 'title-center';
			break;

		default:
			$title_classes[] = 'title-left';
	}

 $container_style[] = $page_title_bg_color ? 'background-color: ' . $page_title_bg_color : '';
 $container_style[] = $page_title_height ? 'min-height: ' . $page_title_height . 'px' : '';
 $header_container_height = $page_title_height ? ' style="height: ' . $page_title_height . 'px;"' : '';

 $before_title =  '<div id="df-normal-header" class="'.esc_attr( implode( ' ', $title_classes ) ).'" style="'.esc_attr( implode( '; ', $container_style ) ).'">'."\n".'
 					<div class="df_container-fluid fluid-width fluid-max df-header-wrap">'."\n".'
 						<div class="df-header-container" ' .$header_container_height. '>'."\n";
 $after_title = '</div></div></div>';
 $title_template = '<div class="df-header"><h1>%s</h1></div>';
 $page_header_style = get_post_meta( df_get_the_id(), 'df_metabox_header_style', true );

 				if( is_page() || is_single() ) {

    					if( 'hide' != $page_header_style ){

    						  $title = sprintf( $title_template, get_the_title() );

    					} else {

      						$df_breadcrumbs = (  '' == $page_breadcrumb );
      						$before_title = $after_title = '';
      						return;

    					}

        } elseif ( is_search() ) {

          		$content = _x( 'Search Results..', 'archive title', 'dahztheme' );
          		$title = sprintf( $title_template, $content );

				} elseif ( is_archive() ) {

              $title = sprintf( $title_template, get_the_archive_title() );

				} elseif ( is_404() ) {

					    $title = sprintf( $title_template, _x( 'Oops! That page can&rsquo;t be found.', 'index title', 'dahztheme') );

				} else {

					    $title = sprintf( $title_template, _x( 'Blog', 'index title', 'dahztheme')  );

				}

 echo $before_title;

	if ( 'right' == $title_align ) {

        if( $df_breadcrumbs ){
        	if( $is_home ) {
        	echo '<div class="breadcrumbs df-header">';
				dahz_breadcrumbs();
		    echo '</div>';
			}
		}
		echo apply_filters( 'df_page_title', $title, $title_template );
	} else {

		echo apply_filters( 'df_page_title', $title, $title_template );
		if( $df_breadcrumbs ){
			if( $is_home ) {
        	echo '<div class="breadcrumbs df-header">';
				dahz_breadcrumbs();
		    echo '</div>';
			}
		}
	}

 echo $after_title;

}

endif;
/**
 * Page & Post Fancy Header Title Contoller
 * @return void
 */
if( ! function_exists('df_fancy_title_header_controller') ) :

function df_fancy_title_header_controller() {

  $page_breadcrumb 	= df_options( 'show_page_header_breadcrumb', dahz_get_default( 'show_page_header_breadcrumb' ) );
  if ( is_404() || is_search() || is_archive() ) return;

  if ( 'fancy' != get_post_meta( df_get_the_id(), 'df_metabox_header_style', true ) ) {
		return;
  }

  remove_action( 'dahztheme_title_controller', 'df_page_title_header_controller', 16 );

  $page_title_background_color = get_post_meta( df_get_the_id(), 'df_metabox_background_color', true );
  $page_title_background_image = wp_get_attachment_image_src(get_post_meta(df_get_the_id(), 'df_metabox_upload_image_fancy_title', true), 'full');
  $page_title_video_bg = wp_get_attachment_url(get_post_meta(df_get_the_id(), 'df_metabox_upload_video_fancy_title', true));
  $header_height_setting = get_post_meta( df_get_the_id(), 'df_metabox_header_height_setting', true );
  $header_border = get_post_meta( df_get_the_id(), 'df_metabox_header_border', true );
  $header_border_color = get_post_meta( df_get_the_id(), 'df_metabox_header_border_color_setting', true );
  $page_header_style = get_post_meta( df_get_the_id(), 'df_metabox_header_style', true );
  $page_header_options_bg = get_post_meta( df_get_the_id(), 'df_metabox_background_options', true );
  $page_title_position = get_post_meta( df_get_the_id(), 'df_metabox_header_align', true );
  $fancy_title =  get_post_meta( df_get_the_id(), 'df_metabox_title', true );
  $fancy_subtitle =  get_post_meta( df_get_the_id(), 'df_metabox_subtitle', true );
  $page_title_color = esc_attr(get_post_meta( df_get_the_id(), 'df_metabox_title_color', true ));
  $page_subtitle_color = esc_attr(get_post_meta( df_get_the_id(), 'df_metabox_subtitle_color', true ));
  $fancy_parallax_speed = get_post_meta( df_get_the_id(), 'df_metabox_fancy_parallax_speed', true );


	// title and sub title
	$title = '';
	if (  $fancy_title ) {
		$title .= '<h1 class="fancy-title entry-title"';
		if ( $page_title_color ) $title .= ' style="color: ' . $page_title_color . '"';
		$title .= '>' . wp_kses_post( $fancy_title ) . '</h1>';
	} else {
		$title .= '<h1 class="fancy-title entry-title"';
		if ( $page_title_color ) $title .= ' style="color: ' . $page_title_color . '"';
		$title .= '>' . get_the_title() . '</h1>';
	}

	if ( $fancy_subtitle ) {
		$title .= '<h3 class="fancy-subtitle entry-title"';
		if (  $page_subtitle_color ) $title .= ' style="color: ' . $page_subtitle_color . '"';
		$title .= '>' . wp_kses_post( $fancy_subtitle ) . '</h3>';
	}

	if ( $title ) { $title = '<div class="df-header">' . $title . '</div>'; }

	// Enable Breadcrumbs
	$df_breadcrumbs = (  1 == $page_breadcrumb );
	$is_home = ( ! df_is_homepage() );

	if( $header_border == 1 ) {
	$container_classes = array( 'df-fancy-header' );
	} else {
	$container_classes = array( 'df-fancy-header-2' );
	}

	// Title Classes
	switch ( $page_title_position ){
	case 'right' :
		$container_classes[] = 'title-right';
		 break;
	case 'center' :
		$container_classes[] = 'title-center';
		 break;
	default :
     	$container_classes[] = 'title-left';
    	break;
	}

    // Parallax Background
	$data_attr = array();
    if ( false == $fancy_parallax_speed ) {
		$fancy_parallax_speed = 0.1;
	}

	if( $page_header_options_bg == "parallax" ){
		$container_classes[] = 'df-fancy-header-parallax';
		$data_attr[] = 'data-fancy-prlx-speed="' . $fancy_parallax_speed . '"';
	} elseif( $page_header_options_bg == "horizontal-parallax") {
		$container_classes[] = 'df-fancy-header-parallax';
		$data_attr[] = 'data-fancy-horprlx-speed="' . $fancy_parallax_speed . '"';
	}

	 // Video Background
	if( $page_header_options_bg == "video" ){
		if ( $page_title_video_bg ) {
			wp_enqueue_script( 'df-vide-js' );

			$container_classes[] = 'df-fancy-header-video';

			//$data_attr[] = 'data-fancy-video-url="' . $page_title_video_bg . '"';
			// TODO: Support .Webm
			$display_vid = substr( $page_title_video_bg, 0, strrpos( $page_title_video_bg, '.' ) );
			$data_attr[] = 'data-vide-bg="mp4:' . $display_vid . '" data-vide-options="posterType: none"';
		}
	}

	// Normal Background
    $container_style = array();
    	if ( $page_title_background_color ) {
		$container_style[] = 'background-color: ' . $page_title_background_color;
	}

	if ( $page_title_background_image ) {

			$container_style[] = "background-image: url({$page_title_background_image[0]})";

			$repeat 	= get_post_meta( df_get_the_id(), 'df_metabox_repeat_options', true );
			$position_x = get_post_meta( df_get_the_id(), 'df_metabox_repeat_x', true );
			$position_y = get_post_meta( df_get_the_id(), 'df_metabox_repeat_y', true );

			$container_style[] = "background-repeat: {$repeat}";
			$container_style[] = "background-position: {$position_x} {$position_y}";

	}
	$header_container_height = $header_height_setting ? 'style="height: ' . $header_height_setting . 'px;"' : '';
	$container_style[] = $header_height_setting ? 'min-height: ' . $header_height_setting . 'px' : '';
	$container_style[] = $header_border_color ? 'border-color:'. $header_border_color : '';

   // Output Content
	$before_title = $after_title = '';
	$before_title .=
	'<div id="df-fancy-header" class="col-full ' . esc_attr( implode( ' ', $container_classes ) ) .'" '.implode( ' ', $data_attr ).' style="'.esc_attr( implode( '; ', $container_style ) ).'">'."\n".
	'<div class="df_container-fluid fluid-width fluid-max df-header-wrap">'."\n".
	'<div class="df-header-container" ' .$header_container_height. '>';
	$after_title .= '</div>'."\n".'</div>'."\n".'</div>';


	echo $before_title;
	if ( 'right' == $page_title_position ) {
        if( $df_breadcrumbs ){
        	if( $is_home ) {
        	echo '<div class="breadcrumbs df-header" style="color: ' . $page_title_color . '">';
				dahz_breadcrumbs();
		    echo '</div>';
			}
		}
		echo $title;
   } else {
   		echo $title;
   	    if( $df_breadcrumbs ){
        	if( $is_home ) {
        	echo '<div class="breadcrumbs df-header" style="color: ' . $page_title_color . '">';
				dahz_breadcrumbs();
		    echo '</div>';
			}
		}
   }
   echo $after_title;

}

endif;
/**
 * Page & Post Slider Header Title Contoller
 * @return void
 */

if( ! function_exists( 'df_slider_title_header_controller' ) ) :

 function df_slider_title_header_controller() {
    if ( is_404() || is_search() || is_archive() ) return ;

	if ( 'slider' != get_post_meta( df_get_the_id(), 'df_metabox_header_style', true ) ) {
		return;
	}

	remove_action( 'dahztheme_title_controller',  'df_page_title_header_controller', 16 );

    $master_slider = get_post_meta( df_get_the_id(), 'df_metabox_master_slider', true);

	if ( $master_slider ) {
		echo '<div id="df-slider-header">';
		echo do_shortcode( '[masterslider id="' . $master_slider . '"]' );
		echo '</div>';
	}

}

endif;
//} // end Class DF_Title_Controller

/**
 * $df_title_controller
 * @var DF_Title_Controller
 */
//new DF_Title_Controller();

/**
 * Output title controller to front-end
 * @return void
 */
function dahztheme_title_controller(){
	 do_action( 'dahztheme_title_controller' );
}
