<?php
/**
 * Dahz Framework output site data to 'head' tag.
 *
 * @package WordPress
 * @subpackage  DahzFramework
 * @category  Core
 * @author  Dahz
 * @since  2.0.0
 */

add_action( 'wp_head', 'dahz_meta_charset', 0 );
add_action( 'wp_head', 'dahz_meta_viewport', 1 );
add_action( 'wp_head', 'dahz_link_pingback',  2 );
add_action( 'init', 'get_theme_framework_version_init', 10 );
add_action( 'wp_head', 'dahz_framework_version', 10 );

/**
 * Adds the meta charset to the header.
 *
 * @since  2.0.0
 * @access public
 * @return void
 */
function dahz_meta_charset() {
	printf( '<meta charset="%s" />' . "\n", esc_attr( get_bloginfo( 'charset' ) ) );
}


/**
 * Load responsive <meta> tags in the <head>
 * @since 2.0.0
 *
 */
function dahz_meta_viewport() {
        $html = '';

        $html .= "\n" . '<!--  Mobile viewport scale -->' . "\n";
        $html .= '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">' . "\n";

        echo $html;
}// End dahz_meta_viewport()


/**
 * Adds the pingback link to the header.
 *
 * @since  2.0.0
 * @access public
 * @return void
 */
function dahz_link_pingback() {
	if ( 'open' === get_option( 'default_ping_status' ) )
		printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}


if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
/**
 * Backward Compatibilty wp_title()
 *
 * @return type
 * @since  1.2.1
 */
if ( ! function_exists( '_wp_render_title_tag' ) ) {
  function dahz_render_title() {
  ?>
   <title><?php wp_title('|', true, 'right'); ?></title>
  <?php
  }
	add_action( 'wp_head', 'dahz_render_title' );
}
endif;


if ( ! function_exists( 'df_add_blog_name_to_title' ) ) {
/**
 * Add the site title to the wp_title() text.
 * @since  1.0.0
 * @param  string $title     Existing title value.
 * @param  string $sep       Separator string.
 * @param  string $raw_title Raw title value.
 * @return string            Modified title.
 */
  function df_add_blog_name_to_title ( $title, $sep, $raw_title ) {
    $site_title = get_bloginfo( 'name' );
    $title .= apply_filters( 'df_add_blog_name_to_title', $site_title );
    return $title;
  } // End df_add_blog_name_to_title()
}


if ( ! function_exists( 'df_maybe_add_page_number_to_title' ) ) {
/**
 * Maybe add the page number, if paginating, to the dahz_title() text.
 * @since  1.0.0
 * @param  string $title     Existing title value.
 * @param  string $sep       Separator string.
 * @param  string $raw_title Raw title value.
 * @return string            Modified title.
 */
function df_maybe_add_page_number_to_title ( $title, $sep, $raw_title ) {
  if ( is_paged() ) {
    $page = intval( get_query_var( 'page' ) );
    $paged = intval( get_query_var( 'paged' ) );
    $page_number = $paged;
    if ( 0 < $page ) {
      $page_number = $page;
    }

    $title .= apply_filters( 'df_maybe_add_page_number_to_title', ' ' . $sep . ' ' . sprintf( __( 'Page %s', 'dahztheme' ), intval( $page_number ) ) );
  }
  return $title;
} // End df_maybe_add_page_number_to_title()
}

if ( ! class_exists( 'WPSEO_Frontend' ) && ! defined( 'WPSEO_VERSION' ) ) {
  //add_filter( 'wp_title', 'df_add_blog_name_to_title', 10, 3 );
  //add_filter( 'wp_title', 'df_maybe_add_page_number_to_title', 10, 3 );
}

/**
 * Get framework version data
 */
function get_theme_framework_version_data() {

    $response = array(
        'theme_version' => '',
        'theme_name' => '',
        'framework_version' => get_option( 'df_framework_version' ),
        'is_child' => is_child_theme(),
        'child_theme_version' => '',
        'child_theme_name' => ''
        );

    if ( function_exists( 'wp_get_theme' ) ) {
      $theme_data = wp_get_theme();
      if ( true == $response['is_child'] ) {
        $response['theme_version'] = $theme_data->parent()->Version;
        $response['theme_name'] = $theme_data->parent()->Name;

        $response['child_theme_version'] = $theme_data->Version;
        $response['child_theme_name'] = $theme_data->Name;
      } else {
        $response['theme_version'] = $theme_data->Version;
        $response['theme_name'] = $theme_data->Name;
      }
    } else {
      $theme_data = wp_get_theme(trailingslashit( get_stylesheet_directory() ).'style.css');
      $response['theme_version'] = $theme_data['Version'];
      $response['theme_name'] = $theme_data['Name'];

      if ( true == $response['is_child'] ) {
        $theme_data = wp_get_theme(trailingslashit( get_stylesheet_directory() ).'style.css');
        $response['child_theme_version'] = $theme_data['Version'];
        $response['child_theme_name'] = $theme_data['Name'];
      }
    }

    return $response;

}

/**
 * Store framework version to DB
 */
function get_theme_framework_version_init() {

      $df_framework_version = DF_VERSION;
      if ( get_option( 'df_framework_version' ) != $df_framework_version ) {
        update_option( 'df_framework_version', $df_framework_version );
      }

}

/**
 * Framework version
 */
function dahz_framework_version() {

    $data = get_theme_framework_version_data();
    echo "\n<!-- Theme version -->\n";
    if ( isset( $data['is_child'] ) && true == $data['is_child'] ) echo '<meta name="generator" content="'. esc_attr( $data['child_theme_name'] . ' ' . $data['child_theme_version'] ) . '" />' ."\n";
    echo '<meta name="generator" content="'. esc_attr( $data['theme_name'] . ' ' . $data['theme_version'] ) . '" />' ."\n";
    echo '<meta name="generator" content="DahzFramework '. esc_attr( DF_VERSION ) .'" />' ."\n";

}
