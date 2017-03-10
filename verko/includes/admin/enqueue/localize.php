<?php
/*
*
*/
if ( ! function_exists('df_global_localize') ) :

	function df_global_localize(){
		global $post;

		$navbar_transparency 	= df_options( 'enable_navbar_transparency', dahz_get_default( 'enable_navbar_transparency' ) );
		$show_title 			= df_options( 'show_page_header_title', dahz_get_default( 'show_page_header_title' ) );
		$onload_animate 		= df_options( 'page_onload_title_animation', dahz_get_default( 'page_onload_title_animation' ) );
		$onscroll_animate 		= df_options( 'page_onscroll_title_animation', dahz_get_default( 'page_onscroll_title_animation' ) );
		$pagination_switcher	= df_options( 'pagination_style', dahz_get_default( 'pagination_style' ) );
		$page_loader 			= df_options( 'df_enable_page_loader', dahz_get_default( 'df_enable_page_loader' ) );
		$page_loader_animation 	= df_options( 'df_page_loader_animation', dahz_get_default( 'df_page_loader_animation' ) );
		$grid_col 				= df_blog_grid_col();
		$logo					= df_options( 'logo', dahz_get_default( 'logo' ) );
		$logo_sticky			= df_options( 'logo_alt', dahz_get_default( 'logo_alt' ) );

        $navbar_transparency_class = $offset_content = $meta_full_screen_height = '';

        /*
		  customizer dan get post meta this logic only work in some php file
		  1. branding.php
		  2. customizer-header-output.php
		  3. localize.php -> main.js
		  because this file is related one to another but the output not always same e.g
		  branding just need to distinguish original logo  and transparency logo
		 */
		if($navbar_transparency == 1){
			$navbar_transparency_class 	= 'nav-transparent';
		}
		if ( (get_post_meta( df_get_the_id(), 'df_metabox_header_transparency', true )) && (get_post_meta( df_get_the_id(), 'df_metabox_header_transparency', true ) != 'default') ) {
			$navbar_transparency_class 	= 'nav-transparent';
		}
		if ( (get_post_meta( df_get_the_id(), 'df_metabox_header_transparency', true )) && (get_post_meta( df_get_the_id(), 'df_metabox_header_transparency', true ) == 'no-transparency') ) {
			$navbar_transparency_class 	= '';
		}
		if ( (get_post_meta( df_get_the_id(), 'df_metabox_header_style', true )) && ( get_post_meta( df_get_the_id(), 'df_metabox_header_style', true ) == 'hide') ) {
			$show_title 				= false;
		}
		if ( get_post_meta( df_get_the_id(), 'df_metabox_offset_content', true ) == 1 ) {
			$offset_content 			= get_post_meta( df_get_the_id(), 'df_metabox_offset_content', true );
		}
		if ( get_post_meta( df_get_the_id(), 'df_metabox_header_style', true ) == 'fancy' ) {
			$onload_animate 			= get_post_meta( df_get_the_id(), 'df_metabox_onLoad_animate', true );
			$onscroll_animate 			= get_post_meta( df_get_the_id(), 'df_metabox_onScroll_animate', true );
			$meta_full_screen_height	= get_post_meta( df_get_the_id(), 'df_metabox_header_full_screen_height_setting', true );
			$show_title 				= true;
		}

        wp_localize_script( 'df-main', 'pagetitle', array(
    		'titleOnload' 		=> $onload_animate,
    		'titleOnscroll'	 	=> $onscroll_animate
        ) );

        wp_localize_script( 'df-main', 'dfOpt', apply_filters( 'df_opt_localize', array(
    	    'showTitle' 		=> $show_title,
    		'navTransparency' 	=> $navbar_transparency_class,
    		'offsetContent'     => $offset_content,
    		'fullScreenHeight'  => $meta_full_screen_height,
    	    'switcher' 			=> $pagination_switcher,
    	    'finishMessage' 	=> __('All Post Loaded', 'dahztheme'),
    	    'tweet_href'		=> esc_url( get_template_directory_uri() . '/includes/assets/js/vendor/twitter-widget.js'),
    	    'page_loader'		=> $page_loader,
    	    'page_loader_anim'	=> $page_loader_animation,
    	    'grid_col'			=> $grid_col,
    	    'filterBy'			=> __( 'Filter By :', 'dahztheme' ),
    	    'logo'				=> $logo,
    	    'logo_sticky'		=> $logo_sticky,
    	    'ajaxurl'			=> admin_url('admin-ajax.php')
        ) ));

	}
endif;
add_action('wp_enqueue_scripts', 'df_global_localize', 99 );

/**
 * localize for customizer preview
 */
// if( !function_exists('df_add_preview_localize') ):
// function df_add_preview_localize(){
// }
// endif;
//add_action('df_customizer_preview_localize', 'df_add_preview_localize');
