jQuery(window).load(function($) {

  "use strict";

    function is_part_of_object(needle, object) {
        for (var i in object) {
            if (object[i] === needle) {
                return (true);
            }
        }
        return (false);
    }

    function loadVariants(selectField) {

        var _dataID = selectField.data('customize-setting-link').replace(/family/, "weight");
        var _font = jQuery('option:selected', selectField).val();
        var _customFont = jQuery('select[data-customize-setting-link="df_options[body_font_family]"] option:selected').val();
        var _variants = _wpCustomizeSettings.settings['list_font_weights']['value'][_font];
        var _customVariants = _wpCustomizeSettings.settings['list_font_weights']['value'][_customFont];
        var _DefaultVariant = _wpCustomizeSettings.settings['list_font_weights']['value']['Roboto Slab'];

           jQuery('input[name="_customize-radio-' + _dataID + '"]').each(function() {
                if (!is_part_of_object(jQuery(this).val(), _variants)) {
                    jQuery(this).parent().hide();
                } else {
                    jQuery(this).parent().show();
                }
            });

    }

    jQuery('select[data-customize-setting-link]').each(function() {
        loadVariants(jQuery(this));
    }).on('change', function() {
        loadVariants(jQuery(this));
    });

        loadVariants(jQuery('select[data-customize-setting-link]'));

});




jQuery(document).ready(function($) { "use strict";
    /*================================================================
     * Add additional customizer admin support for the Theme Customizer.
     *================================================================*/

    var previewDiv = $('#customize-preview');

    $('.wp-full-overlay-header').append('<div id="df-customizer-tools"></div>');

    var dfTools = $('#df-customizer-tools');

    dfTools.append('<button id="trigger-overlay" class="button dashicons dashicons-edit" title="Custom CSS"></button>');
    previewDiv.prepend('<div id="overlay-customcss"><form><textarea id="csstextarea"></textarea></form></div>');

    var cssWindow = $('#customize-preview #overlay-customcss');
    var cssText = $('#customize-preview #overlay-customcss form textarea');
    var ogText = $("li#customize-control-df_options-custom_styles").children().children('textarea');

    // click
    $('#trigger-overlay').click(function(e) {

        e.preventDefault();

        // turn off
        if ($(this).hasClass('btn-active')) {

            $(this).removeClass('btn-active');

            cssWindow.fadeToggle('fast');

            ogText.val(cssText.val()).keyup();

            // turn on
        } else {

            $(this).addClass('btn-active');

            // fade in
            cssWindow.fadeToggle('fast');

            // empty
            cssText.val('');

            // focus
            cssText.focus();

            // fill
            cssText.val(ogText.val());

        }

    });

/* ===============================================================================
*                                   Header Panel
   =============================================================================== */

   /* Navbar */
   var navbarPos = $('#customize-control-df_options-header_navbar_position input');
   var navbarPos1 = $('#customize-control-df_options-header_navbar_position input[value="left"]');
   var navbarPos2 = $('#customize-control-df_options-header_navbar_position input[value="split"]');
   var navbarPos3 = $('#customize-control-df_options-header_navbar_position input[value="center"]');
   var navbarAlign = $('#customize-control-df_options-header_navbar_align');

   if (!navbarPos1.is(':checked')) {
        navbarAlign.css('display', 'none');
   }

   if (!navbarPos2.is(':checked') || !navbarPos3.is(':checked')) {
        navbarAlign.css('display', 'block');
   }

    navbarPos.change(function() {
        if ($(this).val() === 'left') {
            navbarAlign.css('display', 'block');
        } else if ($(this).val() === 'split' || $(this).val() === 'center') {
            navbarAlign.css('display', 'none');
        }
    });

   /* End of navbar */


/* ===============================================================================
*                                   Content Panel
   =============================================================================== */

   /* Layout */

   var blogLay      = $('#customize-control-df_options-blog_layout input'),
       blogLayList  = $('#customize-control-df_options-blog_layout input[value="list"]'),
       blogLayGrid  = $('#customize-control-df_options-blog_layout input[value="grid"]'),
       blogList     = $('#customize-control-df_options-blog_content_list'),
       blogGrid     = $('#customize-control-df_options-blog_content_grid'),
       blogGridCol  = $('#customize-control-df_options-blog_grid_col'),
       blogGridCat  = $('#customize-control-df_options-cat_filter');

       if (!blogLayList.is(':checked')) {
            blogList.css('display', 'none');
            blogGrid.css('display', 'block');
            blogGridCol.css('display', 'block');
            blogGridCat.css('display', 'block');
       }

       if (!blogLayGrid.is(':checked')) {
            blogList.css('display', 'block');
            blogGrid.css('display', 'none');
            blogGridCol.css('display', 'none');
            blogGridCat.css('display', 'none');
       }

       blogLay.change(function() {
           if ($(this).val() === 'list') {
                blogList.css('display', 'block');
                blogGrid.css('display', 'none');
                blogGridCol.css('display', 'none');
                blogGridCat.css('display', 'none');
           } else if ($(this).val() === 'grid') {
                blogList.css('display', 'none');
                blogGrid.css('display', 'block');
                blogGridCol.css('display', 'block');
                blogGridCat.css('display', 'block');
           }
       });

  /* End of layout */

  /* Archive */

  var archiveLay      = $('#customize-control-df_options-archive_layout input'),
      archiveLayList  = $('#customize-control-df_options-archive_layout input[value="list"]'),
      archiveLayGrid  = $('#customize-control-df_options-archive_layout input[value="grid"]'),
      archiveList     = $('#customize-control-df_options-arch_content_list'),
      archiveGrid     = $('#customize-control-df_options-arch_content_grid'),
      archiveGridCol  = $('#customize-control-df_options-arch_grid_col');

      if (!archiveLayList.is(':checked')) {
        archiveList.css('display', 'none');
        archiveGrid.css('display', 'block');
        archiveGridCol.css('display', 'block');
      }

      if (!archiveLayGrid.is(':checked')) {
        archiveList.css('display', 'block');
        archiveGrid.css('display', 'none');
        archiveGridCol.css('display', 'none');
      }

      archiveLay.change(function() {
          if ($(this).val() === 'list') {
            archiveList.css('display', 'block');
            archiveGrid.css('display', 'none');
            archiveGridCol.css('display', 'none');
          } else if ($(this).val() === 'grid') {
            archiveList.css('display', 'none');
            archiveGrid.css('display', 'block');
            archiveGridCol.css('display', 'block');
          }
      });

  /* End of archive */

  /* Button */

  $('#customize-control-df_options-df_button_style').change(function() {
    $('#customize-control-df_options-df_button_style option:selected').each(function() {

      if ($(this).val() === '3d') {
        $('#customize-control-df_options-df_button_bottom_color').css('display', 'block');
        $('#customize-control-df_options-df_button_bottom_hover_color').css('display', 'block');

        $('#customize-control-df_options-df_button_bg_color').css('display', 'block');
        $('#customize-control-df_options-df_button_bg_hover_color').css('display', 'block');
      }

      if ($(this).val() === 'outline') {
        $('#customize-control-df_options-df_button_bg_color').css('display', 'none');
        $('#customize-control-df_options-df_button_bg_hover_color').css('display', 'none');

        $('#customize-control-df_options-df_button_bottom_color').css('display', 'none');
        $('#customize-control-df_options-df_button_bottom_hover_color').css('display', 'none');
      }

      if ($(this).val() === 'flat') {
        $('#customize-control-df_options-df_button_bottom_color').css('display', 'none');
        $('#customize-control-df_options-df_button_bottom_hover_color').css('display', 'none');

        $('#customize-control-df_options-df_button_bg_color').css('display', 'block');
        $('#customize-control-df_options-df_button_bg_hover_color').css('display', 'block');
      }

    });

  });

    $('#customize-control-df_options-df_button_style option:selected').each(function() {

      if ($(this).val() === '3d') {
        $('#customize-control-df_options-df_button_bottom_color').css('display', 'block');
        $('#customize-control-df_options-df_button_bottom_hover_color').css('display', 'block');

      }

      if ($(this).val() === 'outline') {
        $('#customize-control-df_options-df_button_bg_color').css('display', 'none');
        $('#customize-control-df_options-df_button_bg_hover_color').css('display', 'none');

        $('#customize-control-df_options-df_button_bottom_color').css('display', 'none');
        $('#customize-control-df_options-df_button_bottom_hover_color').css('display', 'none');
      }

      if ($(this).val() === 'flat') {
        $('#customize-control-df_options-df_button_bottom_color').css('display', 'none');
        $('#customize-control-df_options-df_button_bottom_hover_color').css('display', 'none');
      }

    });

  /* end of button */

  /*Typography*/



  /*end of typography*/

/* ===============================================================================
*                                   Blog Panel
   =============================================================================== */

   /*Share*/

   var buttonTrigger = $('#customize-control-df_options-blog_share input');

    $(function(){
      var myArray = ["fb_share", "twt_share", "gplus_share", "pin_share", "mail_share", "stumble_share", "link_share", "reddit_share", "tumblr_share"],
        share = "";
      $.each(myArray, function(index, value){
        var share = $("#customize-control-df_options-" + value);
         if (!buttonTrigger.is(':checked')) {
            share.css('display', 'none');
         }

         buttonTrigger.change(function() {
          share = $("#customize-control-df_options-" + value);

           if (buttonTrigger.is(':checked') ) {
              share.fadeIn("fast");
           } else if (!buttonTrigger.is(':checked')) {
              share.fadeOut("fast");
           }
         });


      });
    })

   /*end of Share*/

/* ===============================================================================
*                                   End Blog Panel
   =============================================================================== */


/* ===============================================================================
*                                   Misc Panel
   =============================================================================== */

   /* Page loader */

   var pageLoaderTrigger = $("#customize-control-df_options-df_enable_page_loader input"),
       animationTrigger = $("#customize-control-df_options-df_enable_loading_animation input");

    $(function(){
      var myArray = ["df_page_loader_animation", "df_loading_animation_subtitle", "df_enable_loading_animation", "df_page_loader_background", "df_loading_animation_img"],
          animationArray = [ "df_loading_animation_style", "df_loading_animation_color"],
          merge = $.merge(myArray, animationArray);

      $.each(merge, function(index, value){
        var option = $("#customize-control-df_options-" + value);

         if (!pageLoaderTrigger.is(':checked')) {
            option.css('display', 'none');
         }

        pageLoaderTrigger.change(function() {
          option = $("#customize-control-df_options-" + value);

           if (pageLoaderTrigger.is(':checked') ) {
              option.fadeIn("fast");
           } else if (!pageLoaderTrigger.is(':checked')) {
              option.fadeOut("fast");
           }
         });

      });

      $.each(animationArray, function(index, value) {
        var optionAnimation = $("#customize-control-df_options-" + value);

         if (!animationTrigger.is(':checked')) {
            optionAnimation.css('display', 'none');
         }

        animationTrigger.change(function() {
          optionAnimation = $("#customize-control-df_options-" + value);

           if (animationTrigger.is(':checked') ) {
              optionAnimation.fadeIn("fast");
           } else if (!animationTrigger.is(':checked')) {
              optionAnimation.fadeOut("fast");
           }
         });
      });
    })

   /* End Page loader */

   /* Font subsets */

   var subFontTrigger = $('#customize-control-df_options-custom_font_subsets input');

      $(function(){
        var myArray = ["custom_font_subset_cyrillic", "custom_font_subset_greek", "custom_font_subset_vietnamese"],
            subsId = "";

            $.each(myArray, function(index, value) {
              var subsId = $('#customize-control-df_options-' + value);
              if (!subFontTrigger.is(':checked')) {
                subsId.css('display', 'none');
              }

              subFontTrigger.change(function(event) {
                subsId = $('#customize-control-df_options-' + value);
                if (subFontTrigger.is(':checked')) {
                  subsId.fadeIn("fast");
                } else if (!subFontTrigger.is(':checked')) {
                  subsId.fadeOut("fast");
                }
              });

            });

      });


   /* End Font subsets */

/* ===============================================================================
*                                   End Misc Panel
   =============================================================================== */

    HTMLTextAreaElement.prototype.getCaretPosition = function() { //return the caret position of the textarea
        return this.selectionStart;
    };
    HTMLTextAreaElement.prototype.setCaretPosition = function(position) { //change the caret position of the textarea
        this.selectionStart = position;
        this.selectionEnd = position;
        this.focus();
    };
    HTMLTextAreaElement.prototype.hasSelection = function() { //if the textarea has selection then return true
        if (this.selectionStart == this.selectionEnd) {
            return false;
        } else {
            return true;
        }
    };
    HTMLTextAreaElement.prototype.getSelectedText = function() { //return the selection text
        return this.value.substring(this.selectionStart, this.selectionEnd);
    };
    HTMLTextAreaElement.prototype.setSelection = function(start, end) { //change the selection area of the textarea
        this.selectionStart = start;
        this.selectionEnd = end;
        this.focus();
    };

    var textarea = document.getElementById('csstextarea');

    textarea.onkeydown = function(event) {

        //support tab on textarea
        if (event.keyCode == 9) { //tab was pressed
            var newCaretPosition;
            newCaretPosition = textarea.getCaretPosition() + "    ".length;
            textarea.value = textarea.value.substring(0, textarea.getCaretPosition()) + "    " + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
            textarea.setCaretPosition(newCaretPosition);
            return false;
        }
        if (event.keyCode == 8) { //backspace
            if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
                var newCaretPosition;
                newCaretPosition = textarea.getCaretPosition() - 3;
                textarea.value = textarea.value.substring(0, textarea.getCaretPosition() - 3) + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
                textarea.setCaretPosition(newCaretPosition);
            }
        }
        if (event.keyCode == 37) { //left arrow
            var newCaretPosition;
            if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
                newCaretPosition = textarea.getCaretPosition() - 3;
                textarea.setCaretPosition(newCaretPosition);
            }
        }
        if (event.keyCode == 39) { //right arrow
            var newCaretPosition;
            if (textarea.value.substring(textarea.getCaretPosition() + 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
                newCaretPosition = textarea.getCaretPosition() + 3;
                textarea.setCaretPosition(newCaretPosition);
            }
        }
    }



  /**
  * ---------------------------------------------------------------------------
  * Highlight sections on customizer controls
  */
  $('.control-section > h3').on('hover', function(){
    var section_id = $(this).parent().attr('id'),
        Previewiframe_id = $('#customize-preview iframe').contents();

    if ( section_id == 'accordion-section-df_customizer_general_section' ) {
      Previewiframe_id.find('body').addClass('highlighted-element')
    }// panel

    if ( section_id == 'accordion-panel-df_customizer_header_panel' ) {
      Previewiframe_id.find('.header-wrapper').addClass('highlighted-element')
    }// panel

    if ( section_id == 'accordion-section-df_customizer_topbar_section' ) {
      Previewiframe_id.find('.df-topbar').addClass('highlighted-element').css({position:'relative'})
    }

    if ( section_id == 'accordion-section-df_customizer_logo_section' ) {
      Previewiframe_id.find('.df-sitename').addClass('highlighted-element').css({position:'relative'})
    }

    if ( section_id == 'accordion-section-df_customizer_navbar_sticky_section' ) {
      Previewiframe_id.find('.site-header.sticky-scroll-nav').addClass('highlighted-element')
    }

    if ( section_id == 'accordion-section-df_customizer_navbar_section' ) {
      Previewiframe_id.find('.df-navi').addClass('highlighted-element').css({position:'relative'})
    }

    if ( section_id == 'accordion-section-df_customizer_navbar_miscellaneous_section' ) {
      Previewiframe_id.find('.site-misc-tools').addClass('highlighted-element').css({position:'relative'})
    }

    if ( section_id == 'accordion-section-df_customizer_pagetitle_section' ) {
      Previewiframe_id.find('.df-header').addClass('highlighted-element').css({position:'relative'});
    }


     if ( section_id == 'accordion-panel-df_customizer_footer_panel' ) {
      Previewiframe_id.find('.df-footer').addClass('highlighted-element').css({position:'relative'});
    }// panel




  });

  $('.control-section > h3').on('mouseleave', function(){
      $('#customize-preview iframe').contents().find('.highlighted-element').removeClass('highlighted-element').css({position:''});
  });



});
