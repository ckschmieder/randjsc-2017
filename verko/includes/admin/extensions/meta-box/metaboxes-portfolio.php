<?php

    // portfolio metaboxes settings
    $category_in_porto = array();
    $terms_in_porto = get_terms('portfolio-gallery');

    if (is_array($terms_in_porto) && count($terms_in_porto) > 0 ) {
        foreach ($terms_in_porto as $k => $v) {
            $category_in_porto[$v->slug] = $v->name;
        }
    }

    $category_ex_porto = array();
    $terms_ex_porto = get_terms('portfolio-gallery');

    if (is_array($terms_ex_porto) && count($terms_ex_porto) > 0 ) {
        foreach ($terms_ex_porto as $k => $v) {
            $category_ex_porto[$v->slug] = $v->name;
        }
    }

    // metaboxes for single post portfolio
    $meta_boxes[] = array(
        'title' => __('Single Portfolio Settings ', 'dahztheme'),
        'pages' => array('portfolio'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __('Enable Single Portfolio Pagination', 'backend metabox', 'dahztheme'),
                'id' => "{$prefix}_portfolio_pagination_single",
                'type' => 'checkbox',
                'std' => 1
            ),
            array(
                'name' => __('Enable Related Project on Single Portfolio', 'backend metabox', 'dahztheme'),
                'id' => "{$prefix}_enable_related_port",
                'type' => 'checkbox',
                'std' => 1
            ),
            array(
                'name' => __('Category To Use For Related Project', 'backend metabox', 'dahztheme'),
                'id' => "{$prefix}_select_category_include_porto_related",
                'type' => 'checkbox_list',
                'options' => $category_in_porto,
                'desc' => __('Leave It Empty To Only Use The Same Category', 'dahztheme')
            ),
            array(
                'name' => __('Back to Page Button', 'backend metabox', 'dahztheme'),
                'id' => "{$prefix}_enable_back_to_page",
                'type' => 'checkbox',
                'std' => 1
            ),
            array(
                'name' => __('Select Page', 'backend metabox', 'dahztheme'),
                'id' => "{$prefix}_back_to_page",
                'type' => 'post',
                'post_type' => 'page',
                'field_type' => 'select',
                'query_args' => array(
                    'post_status' => 'publish',
                    'posts_per_page' => '-1',
                ),
                'std' => 4
            ),
            array(
                'name'  => __('Related Portfolio Text Title', 'backend metabox', 'dahztheme'),
                'id'    => "{$prefix}_portfolio_title_text",
                'type'  => 'text',
            ),
        )
    );