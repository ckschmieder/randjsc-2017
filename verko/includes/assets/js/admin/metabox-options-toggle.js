/*
* jQuery(document).ready(function($)) {
*   - Show/Hide Audio, Video
* }
*
*/
jQuery(document).ready(function($) {

    "use strict";

    /*
    * Show/Hide Audio, Video
    */
    if ($('[name="post_format"][value="0"]').is(':checked')) {
        $('[value="single-post-gallery-photo"], [value="single-post-audio"], [value="single-post-video"], [value="single-post-quote"], [value="single-post-link"]').attr('checked', 'checked');
        $('#single-post-audio, #single-post-video').addClass('df-metabox-hidden hide-if-js');
    } else if ($('[name="post_format"][value="audio"]').is(':checked')) {
        $('#single-post-audio').removeClass('df-metabox-hidden hide-if-js');
        $('#single-post-video').addClass('df-metabox-hidden hide-if-js');
    } else if ($('[name="post_format"][value="video"]').is(':checked')) {
        $('#single-post-video').removeClass('df-metabox-hidden hide-if-js');
        $('#single-post-audio').addClass('df-metabox-hidden hide-if-js');
    } else if ($('[name="post_format"][value="image"], [name="post_format"][value="aside"], [name="post_format"][value="chat"], [name="post_format"][value="status"], [name="post_format"][value="link"], [name="post_format"][value="quote"], [name="post_format"][value="gallery"]').is(':checked')) {
        $('#single-post-audio, #single-post-video').addClass('df-metabox-hidden hide-if-js');
    }
    $('[name="post_format"]').change(function() {
        if (this.value === '0') {
            $('[value="single-post-gallery-photo"], [value="single-post-audio"], [value="single-post-video"], [value="single-post-quote"], [value="single-post-link"]').attr('checked', 'checked');
            $('#single-post-audio, #single-post-video').addClass('df-metabox-hidden hide-if-js');
        } else if (this.value === 'audio') {
            $('#single-post-audio').removeClass('df-metabox-hidden hide-if-js');
            $('#single-post-video').addClass('df-metabox-hidden hide-if-js');
        } else if (this.value === 'video') {
            $('#single-post-video').removeClass('df-metabox-hidden hide-if-js');
            $('#single-post-audio').addClass('df-metabox-hidden hide-if-js');
        } else if (this.value === 'image' || this.value === 'aside' || this.value === 'chat' || this.value === 'gallery' || this.value === 'quote' || this.value === 'link' || this.value === 'status') {
            $('#single-post-audio, #single-post-video').addClass('df-metabox-hidden hide-if-js');
        }
    });

    if ($('[name="post_format"][value="0"], [name="post_format"][value="image"], [name="post_format"][value="gallery"], [name="post_format"][value="audio"], [name="post_format"][value="video"]').is(':checked')) {
        $('#df_metabox_list_post_lay').parent().parent().removeClass('df-metabox-hidden');
    } else {
        $('#df_metabox_list_post_lay').parent().parent().addClass('df-metabox-hidden');
    }

    $('[name="post_format"]').change(function() {
        if (this.value === '0' || this.value === 'image' || this.value === 'gallery' || this.value === 'audio' || this.value === 'video' ) {
            $('#df_metabox_list_post_lay').parent().parent().removeClass('df-metabox-hidden');
        } else {
            $('#df_metabox_list_post_lay').parent().parent().addClass('df-metabox-hidden');
        }
    });
});

jQuery(window).on('load', function($) { "use strict";

        var $ = jQuery,
            show = $('[name="df_metabox_header_style"][value="show"]'),
            hide = $('[name="df_metabox_header_style"][value="hide"]'),
            fancy = $('[name="df_metabox_header_style"][value="fancy"]'),
            slider = $('[name="df_metabox_header_style"][value="slider"]'),
            normal = $('[name="df_metabox_background_options"][value="normal"]'),
            parallax = $('[name="df_metabox_background_options"][value="parallax"]'),
            horParallax = $('[name="df_metabox_background_options"][value="horizontal-parallax"]');

    /* ================================================================================================= */
    /* Header Options                                                                                    */
    /* ================================================================================================= */

    // Fancy Header
    function showFancyHeaderStyleOptions() {
        $('[name="df_metabox_header_align"]').parent().parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_title').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_title_color').parent().parent().parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_subtitle').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_subtitle_color').parent().parent().parent().parent().removeClass('df-metabox-hidden');
        $('[name="df_metabox_background_options"]').parent().parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_background_color').parent().parent().parent().parent().removeClass('df-metabox-hidden');
        $('[data-field_id="df_metabox_upload_image_fancy_title"]').parent().parent().removeClass('df-metabox-hidden');
        $('[data-field_id="df_metabox_upload_video_fancy_title"]').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_repeat_options').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_repeat_x').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_repeat_y').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_fancy_parallax_speed').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_header_height_setting').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_header_full_screen_height_setting').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_header_border').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_header_border_color_setting').parent().parent().parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_onScroll_animate').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_onLoad_animate').parent().parent().removeClass('df-metabox-hidden');


        if (normal.is(':checked')) {
            showNormalOptions();
            hideParallaxOptions();
            hideVideoOptions();
        } else if (parallax.is(':checked') || horParallax.is(':checked')) {
            showParallaxOptions();
            hideNormalOptions();
            hideVideoOptions();
        } else {
            showVideoOptions();
            hideNormalOptions();
            hideParallaxOptions();
        }
        if ($('#df_metabox_header_border').is(':checked')) {
            showHeaderBorderOptions();
        } else {
            hideHeaderBorderOptions();
        }
    }

    function hideFancyHeaderStyleOptions() {
        $('[name="df_metabox_header_align"]').parent().parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_title').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_title_color').parent().parent().parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_subtitle').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_subtitle_color').parent().parent().parent().parent().addClass('df-metabox-hidden');
        $('[name="df_metabox_background_options"]').parent().parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_background_color').parent().parent().parent().parent().addClass('df-metabox-hidden');
        $('[data-field_id="df_metabox_upload_image_fancy_title"]').parent().parent().addClass('df-metabox-hidden');
        $('[data-field_id="df_metabox_upload_video_fancy_title"]').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_repeat_options').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_repeat_x').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_repeat_y').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_fancy_parallax_speed').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_header_height_setting').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_header_full_screen_height_setting').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_header_border').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_header_border_color_setting').parent().parent().parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_onScroll_animate').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_onLoad_animate').parent().parent().addClass('df-metabox-hidden');

        hideNormalOptions();
        hideParallaxOptions();
        hideVideoOptions();
        hideHeaderBorderOptions();
    }

    // Background Options
    function showNormalOptions() {
        $('[data-field_id="df_metabox_upload_image_fancy_title"]').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_repeat_options').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_repeat_x').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_repeat_y').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_onScroll_animate').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_onLoad_animate').parent().parent().removeClass('df-metabox-hidden');
    }
    function hideNormalOptions() {
        $('#df_metabox_repeat_options').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_repeat_x').parent().parent().addClass('df-metabox-hidden');
        $('#df_metabox_repeat_y').parent().parent().addClass('df-metabox-hidden');
    }
    function showParallaxOptions() {
        $('[data-field_id="df_metabox_upload_image_fancy_title"]').parent().parent().removeClass('df-metabox-hidden');
        $('#df_metabox_fancy_parallax_speed').parent().parent().removeClass('df-metabox-hidden');
    }
    function hideParallaxOptions() {
        $('#df_metabox_fancy_parallax_speed').parent().parent().addClass('df-metabox-hidden');
    }
    function showVideoOptions() {
        $('[data-field_id="df_metabox_upload_image_fancy_title"]').parent().parent().addClass('df-metabox-hidden');
        $('[data-field_id="df_metabox_upload_video_fancy_title"]').parent().parent().removeClass('df-metabox-hidden');
    }
    function hideVideoOptions() {
        $('[data-field_id="df_metabox_upload_video_fancy_title"]').parent().parent().addClass('df-metabox-hidden');
    }
    // Background Options

    // border
    function showHeaderBorderOptions() {
        $('#df_metabox_header_border_color_setting').parent().parent().parent().parent().removeClass('df-metabox-hidden');
    }
    function hideHeaderBorderOptions() {
        $('#df_metabox_header_border_color_setting').parent().parent().parent().parent().addClass('df-metabox-hidden');
    }
    // border
    // Fancy Header

    // Master Slider Header
    function showMasterSliderHeaderStyleOptions() {
        $('#df_metabox_master_slider').parent().parent().removeClass('df-metabox-hidden');
    }
    function hideMasterSliderHeaderStyleOptions() {
        $('#df_metabox_master_slider').parent().parent().addClass('df-metabox-hidden');
    }
    // Master Slider Header

    function showOffsetHideStyleOptions() {
        $('#df_metabox_offset_content').parent().parent().removeClass('df-metabox-hidden');
    }

    function hideOffsetHideStyleOptions() {
        $('#df_metabox_offset_content').parent().parent().addClass('df-metabox-hidden');
    }
    // Conditional
    if ( show.is(':checked') ) {
        hideMasterSliderHeaderStyleOptions();
        hideFancyHeaderStyleOptions();
        hideOffsetHideStyleOptions();
    } else if( hide.is(':checked') ) {
        hideMasterSliderHeaderStyleOptions();
        hideFancyHeaderStyleOptions();
        showOffsetHideStyleOptions();
    } else if (fancy.is(':checked')) {
        showFancyHeaderStyleOptions();
        hideMasterSliderHeaderStyleOptions();
        hideOffsetHideStyleOptions();
    } else {
        hideFancyHeaderStyleOptions();
        showMasterSliderHeaderStyleOptions();
        hideOffsetHideStyleOptions();
    }

    $('[name="df_metabox_header_style"]').change(function() {
        if (this.value === 'show') {
            hideMasterSliderHeaderStyleOptions();
            hideFancyHeaderStyleOptions();
            hideOffsetHideStyleOptions();
        } else if ( this.value === 'hide' ) {
            hideMasterSliderHeaderStyleOptions();
            hideFancyHeaderStyleOptions();
            showOffsetHideStyleOptions();
        } else if (this.value === 'fancy') {
            showFancyHeaderStyleOptions();
            hideMasterSliderHeaderStyleOptions();
            hideOffsetHideStyleOptions();
        } else {
            hideFancyHeaderStyleOptions();
            showMasterSliderHeaderStyleOptions();
            hideOffsetHideStyleOptions();
        }
    });

    $('[name="df_metabox_background_options"]').change(function() {
        if (this.value === 'normal') {
            showNormalOptions();
            hideParallaxOptions();
            hideVideoOptions();
        } else if (this.value === 'parallax' || this.value === 'horizontal-parallax') {
            hideNormalOptions();
            showParallaxOptions();
            hideVideoOptions();
        } else {
            hideNormalOptions();
            hideParallaxOptions();
            showVideoOptions();
        }
    });

    $('#df_metabox_header_border').change(function() {
        if (this.checked) {
            showHeaderBorderOptions();
        } else {
            hideHeaderBorderOptions();
        }
    });
    /* ================================================================================================= */
    /* Header Options                                                                                    */
    /* ================================================================================================= */

    /* ================================================================================================= */
    /* Page / post layout options                                                                        */
    /* ================================================================================================= */

    var oneCol = $('[name="df_metabox_layout_content"][value="one-col"]'),
        twoColLeft = $('[name="df_metabox_layout_content"][value="two-col-left"]'),
        twoColRight = $('[name="df_metabox_layout_content"][value="two-col-right"]');

    function oneColShowFunction() {
        $('#df_metabox_layout_sidebar_offcanvas').parent().parent().removeClass('df-metabox-hidden');
    }

    function twoColLeftHideFunction() {
        $('#df_metabox_layout_sidebar_offcanvas').parent().parent().addClass('df-metabox-hidden');
    }

    function twoColRightHideFunction() {
        $('#df_metabox_layout_sidebar_offcanvas').parent().parent().addClass('df-metabox-hidden');
    }

    if (twoColLeft.is(':checked') || twoColRight.is(':checked')) {
        twoColLeftHideFunction();
        twoColRightHideFunction();
    } else {
        oneColShowFunction();
    }

    $('[name="df_metabox_layout_content"]').change(function() {
        if (this.value === 'one-col') {
            oneColShowFunction();
        } else {
            twoColLeftHideFunction();
            twoColRightHideFunction();
        }
    });

    /* ================================================================================================= */
    /* Page / post layout options                                                                        */
    /* ================================================================================================= */

});