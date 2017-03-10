<?php

/* filter for image post */
add_action( 'df_image_as_background',  'df_post_bg_image'        );
add_action( 'df_image_normal_post',    'df_ftr_image_list',   0  );
add_action( 'df_image_normal_post',    'df_ftr_image_fit',    5  );
add_action( 'df_image_normal_post',    'df_ftr_image_mason',  10 );
add_action( 'df_image_normal_post',    'df_ftr_image_single', 15 );

/* ----------------------------------------------------------------------------------- */
/* post background image                                                               */
/* ----------------------------------------------------------------------------------- */
if ( !function_exists( 'df_post_bg_image' ) ) :
    function df_post_bg_image() {
        $df_big_mode_lay = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true);

        if ( is_single() && $df_big_mode_lay != '1' ) { return false; }

        if ( $df_big_mode_lay == '1' ) {
            $image_url = wp_get_attachment_url( get_post_thumbnail_id(), 'full' );

            echo '<div class="post-warpper" style="background-image:url(' . esc_url( $image_url ) . ');"></div>';
        }
    }
endif;

/* ----------------------------------------------------------------------------------- */
/* Blog Feature Image                                                                  */
/* ----------------------------------------------------------------------------------- */
/* Feature Image Lists */
if ( !function_exists( 'df_ftr_image_list' ) ) :
    function df_ftr_image_list() {
        $df_blog_layout  = is_archive() ? df_options( 'archive_layout', dahz_get_default( 'archive_layout' ) ) : df_options( 'blog_layout', dahz_get_default( 'blog_layout' ) );
        $df_big_mode_lay = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true );


        if ( !is_single() && $df_blog_layout == 'list' && $df_big_mode_lay != '1' ):
            $df_bg_mode_lay  = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true );
            $img_size_thumb  = 'dahz-large';
            $post_format_img = get_post_format() == 'image';
            $post_format_gal = get_post_format() == 'gallery';

            $image_args = array(
                'size'          => $img_size_thumb,
                'split_content' => $post_format_img ? true : false,
                'scan_raw'      => $post_format_img ? true : false,
                'scan'          => $post_format_img ? true : false,
                'order'         => df_has_featured_image(),
                'callback'      => $post_format_gal ? df_gallery_post_format() : '',
                'link_to_post'  => is_singular() ? false : true,
                'before'        => $post_format_gal ? '' : '<div class="featured-media">',
                'after'         => $post_format_gal ? '' : '</div>'
            );
     
            ( in_array( get_post_format(), array( '', 'image', 'gallery' ) ) ) ? get_the_image( $image_args ) : '';
        endif;
    }
endif;

/* Feature Image Fitrows */
if ( !function_exists( 'df_ftr_image_fit' ) ) :
    function df_ftr_image_fit() {
        $df_blog_layout  = is_archive() ? df_options( 'archive_layout' ) : df_options( 'blog_layout' );
        $df_grid_type    = is_archive() ? df_options( 'arch_content_grid' ) : df_options( 'blog_content_grid' );
        $df_big_mode_lay = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true );

        if ( !is_single() &&  $df_blog_layout == 'grid' && $df_grid_type == 'fitrows' && $df_big_mode_lay != '1' ):

            $df_bg_mode_lay     = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true );
            $df_big_post_grid   = get_post_meta( get_the_ID(), 'df_metabox_enable_big_post_grid', true );
            $img_size_thumb     = $df_big_post_grid == 1 ? 'dahz-large' : 'dahz-grid-thumb-cropping';
            $post_format_img    = get_post_format() == 'image';
            $dummy_image        = esc_url( get_template_directory_uri() . '/includes/assets/images/fitrow.jpg' );
            $order              = array( 'featured', 'default' );

            $image_args = array(
                'size'          => $img_size_thumb,
                'split_content' => $post_format_img ? true : false,
                'scan_raw'      => $post_format_img ? true : false,
                'scan'          => $post_format_img ? true : false,
                'order'         => $order,
                'default'       => $dummy_image,
                'link_to_post'  => is_singular() ? false : true,
                'before'        => '<div class="featured-media">',
                'after'         => '</div>'
            );

            get_the_image( $image_args );
        endif;
    }
endif;

/* Feature Image Masonry */
if ( !function_exists( 'df_ftr_image_mason' ) ) :
    function df_ftr_image_mason() {
        $df_blog_layout  = is_archive() ? df_options( 'archive_layout' ) : df_options( 'blog_layout' );
        $df_grid_type    = is_archive() ? df_options( 'arch_content_grid' ) : df_options( 'blog_content_grid' );
        $df_big_mode_lay = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true );

        if ( !is_single() && $df_blog_layout == 'grid' && $df_grid_type == 'masonry' && $df_big_mode_lay != '1' ):
            $df_big_post_grid = get_post_meta( get_the_ID(), 'df_metabox_enable_big_post_grid', true );
            $df_bg_mode_lay   = get_post_meta( get_the_ID(), 'df_metabox_ftr_img_background', true );
            $post_format_img  = get_post_format() == 'image';
            $post_format_gal  = get_post_format() == 'gallery';
            $img_size_thumb   = $df_big_post_grid == 1 ? 'dahz-large' : 'dahz-grid-thumb';

            $image_args = array(
                'size'          => $img_size_thumb,
                'split_content' => $post_format_img ? true : false,
                'scan_raw'      => $post_format_img ? true : false,
                'scan'          => $post_format_img ? true : false,
                'order'         => df_has_featured_image(),
                'callback'      => $post_format_gal ? df_gallery_post_format() : '',
                'link_to_post'  => is_singular() ? false : true,
                'before'        => $post_format_gal ? '' : '<div class="featured-media">',
                'after'         => $post_format_gal ? '' : '</div>'
            );

            ( in_array( get_post_format(), array( '', 'image', 'gallery' ) ) ) ? get_the_image( $image_args ) : '';
        endif;
    }
endif;

/* Feature Image Single */
if ( !function_exists( 'df_ftr_image_single' ) ) :
    function df_ftr_image_single() {
        $df_show_feat_image = df_options( 'feat_image', dahz_get_default( 'feat_image' ) );

        if ( is_single() && $df_show_feat_image == 1 ) :
            $post_format_std    = get_post_format() == '';
            $post_format_img    = get_post_format() == 'image';
            $order              = array();

            if ( $post_format_img ) :
                $order = array( 'scan_raw', 'scan', 'featured', 'attachment' );
            else :
                $order = array( 'featured' );
            endif;

            $image_args = array(
                'size'          => 'dahz-large',
                'split_content' => $post_format_img ? true : false,
                'scan_raw'      => $post_format_img ? true : false,
                'scan'          => $post_format_img ? true : false,
                'order'         => $order,
                'link_to_post'  => is_singular() ? false : true,
                'before'        => '<div class="featured-media">',
                'after'         => '</div>'
            );

            if( $post_format_std || $post_format_img ) :
                get_the_image( $image_args );
            endif;
        endif;

    }
endif;