<?php

/* ========================================================= */
/* Single Blog Metaboxes                                     */
/* ========================================================= */
$category_in        = '';
$terms_in           = get_terms('category', 'hide_empty=0');

if ( is_array( $terms_in ) && ( count( $terms_in ) > 0 ) ) {
    foreach ( $terms_in as $k => $v ) {
        $category_in[$v->slug] = $v->name;
    }
}

$meta_boxes[] = array(
	'title' 	=> _x('Single Post Settings', 'backend metabox', 'dahztheme'),
    'pages' 	=> array('post'),
    'context' 	=> 'normal',
    'priority' 	=> 'high',
    'autosave' 	=> true,
    'fields' 	=> array(
				        array(
			                'name'  	=> __('Enable Featured Image As Background', 'backend metabox', 'dahztheme'),
			                'id'    	=> "{$prefix}_ftr_img_background",
			                'type'  	=> 'checkbox',
			                'std'   	=> 0
				        ),
						array(
							'name' 		=> _x('List Post Layout', 'backend metabox', 'dahztheme'),
							'id' 		=> "{$prefix}_list_post_lay",
							'type' 		=> 'select',
							'options' 	=> array(
											'normal_lay' 	=> _x('Normal Post', 'backend metabox', 'dahztheme'),
											'left_lay' 		=> _x('Left Post', 'backend metabox', 'dahztheme'),
											'right_lay' 	=> _x('Right Post', 'backend metabox', 'dahztheme')
										   ),
							'std' 		=> 'normal_lay',
							'desc'  	=> _x('Active when you choose list post layout', 'backend metabox', 'dahztheme')
						),
				        array(
				            'name' 		=> _x('Enable Big Post', 'backend metabox', 'dahztheme'),
				            'id' 		=> "{$prefix}_enable_big_post_grid",
				            'type' 		=> 'checkbox',
				            'std' 		=> 0,
				            'desc' 		=> _x('Active when you choose grid post layout', 'backend metabox', 'dahztheme')
				        ),
) );