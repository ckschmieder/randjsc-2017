<?php
    //Audio
    $meta_boxes[] = array(
        'title'     => __('Single post Audio', 'backend metabox', 'dahztheme'),
        'pages'     => array('post'),
        'context'   => 'normal',
        'priority'  => 'high',
        'autosave'  => true,
        'fields'    => array(
            array(
                'name'  => __('Upload Your Audio File (.mp3, .ogg or .wav)', 'backend metabox', 'dahztheme'),
                'id'    => "{$prefix}_pf_upload_single_post_audio",
                'type'  => 'file_advanced',
                'max_file_uploads' => 1,
                'mime_type' => 'audio'
            ),
            array(
                'name'  => __('Embed Your Audio', 'backend metabox', 'dahztheme'),
                'id'    => "{$prefix}_pf_audio_textarea",
                'type'  => 'textarea',
                'std'   => ''
            ),
        )
    );

    //Video
    $meta_boxes[] = array(
        'title'     => __('Single post video', 'backend metabox', 'dahztheme'),
        'pages'     => array('post'),
        'context'   => 'normal',
        'priority'  => 'high',
        'autosave'  => true,
        'fields'    => array(
            array(
                'name'  => __('Upload Your Video ( .mp4, .ogv or .mov )', 'backend metabox', 'dahztheme'),
                'id'    => "{$prefix}_pf_upload_single_post_video",
                'type'  => 'file_advanced',
                'max_file_uploads'  => 1,
                'mime_type' => 'video'
            ),
            array(
                'name'  => __('Embed Your Video', 'backend metabox', 'dahztheme'),
                'id'    => "{$prefix}_pf_video_textarea",
                'type'  => 'textarea',
                'std'   => ''
            ),
        )
    );