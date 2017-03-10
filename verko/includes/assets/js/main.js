(function() {
window.requestAnimFrame = Modernizr.prefixed('requestAnimationFrame', window)
|| function( callback ){
  window.setTimeout(callback, 1000 / 60);
};
}());


(function($){

dahzMasonry = {

   init: function(){
   var Main 	= $('.df-main'),
   _gridFit 	= Main.find('.df_grid_fit') ,
   _gridMasonry = Main.find('.df_grid_masonry');

    	$('.df_grid_fit, .df_grid_masonry').hover(function(){
			jQuery('.df_grid_fit, .df_grid_masonry').isotope('layout');
    	});

        if( _gridFit.length ){

	        var mycontainer = $('.df_grid_fit');

	        dahzMasonry.gridFit();

	    	mycontainer.imagesLoaded( function() {
				mycontainer.isotope('layout');
	        });

        } else if( _gridMasonry.length ) {

	        var mycontainer = $('.df_grid_masonry');
	        dahzMasonry.gridMasonry();
	            mycontainer.imagesLoaded( function() {
	              mycontainer.isotope('layout');
	            });

        }

    },


    gridFit: function (){
		if( $('.df_grid_fit').length ){
	        $('.df_grid_fit').isotope({
	            itemSelector: '.type-post',
	            layoutMode: 'fitRows',
	        });
	    }
    },

    gridMasonry: function(){
    	if( $( '.df_grid_masonry' ).length ){
	        if (jQuery('.grid-sizer').length == 0) {

	        	$( '.df_grid_masonry' ).prepend( '<div class="grid-sizer ' + dfOpt.grid_col + '"></div>' );
	        }


	        $( '.df_grid_masonry' ).isotope({
	            itemSelector: '.type-post',
	            masonry: {
	                columnWidth: '.grid-sizer.' + dfOpt.grid_col,
	                layoutMode: 'masonry',

	            }
	        });
		}

    },

    };


})(jQuery);


var DAHZ = DAHZ || {};

(function($){
   "use strict";

    DAHZ.$win = $(window);
    DAHZ.$body = $('body');
    DAHZ.$rtl = $('body').hasClass('rtl');

DAHZ.init = {

	initSite: function() {

        var init = this;

        init.fancyHeader();
        init.titleAnimateHeader();
        init.setHeaderPadding();
        init.navbarSticky();
        init.navbarMobile();
        init.ajaxSearch();
        init.infiniteScroll();
        init.offCanvas();
        init.dropDownToggle();
        init.megaMenu();
        init.relatedPost();
        init.pageLoader();
        init.likePost();
        init.ajaxFilter();
        init.isotopeMobile();
        init.tableResponsive();
        // init.photoSwipeDom();
        init.swipeAjaxInit();
        init.logoFix();
        init.scrollAnimateTop();

		$( 'select' ).selectric();
        $( '.df-post-video, .df-video-sc' ).fitVids();
	    $( '.nano-scroller' ).nanoScroller();

	    if( $('blockquote').hasClass('twitter-tweet') || $('iframe').hasClass('twitter-tweet')
	    	|| $('blockquote').hasClass('instagram-media') || $('iframe').hasClass('instagram-media') ) {
			$('.twitter-tweet, .instagram-media').parent().addClass('entry-status');
    	}

        DAHZ.$win.load(function(){
        	dahzMasonry.init();
        });

       	dahzMasonry.init();

       	DAHZ.$win.resize(function(e) {
	        init.isotopeMobile();
		});


    },

    fancyHeader: function(){
        if (!dfGlobals.isMobile) {
        	setTimeout(function(){
            $('.df-fancy-header-parallax').each(function() {
                var $_this = $(this),
                        speed_prl = $_this.data("fancy-prlx-speed");
                $_this.parallax("50%", speed_prl);
                $_this.addClass("fancy-header-parallax-done");
            });
        }, 1000);
        }


     var winFullHeight = DAHZ.$win.height();
     if(dfOpt.fullScreenHeight == 1){
     	$('#df-fancy-header').css('height', winFullHeight);

	 	 DAHZ.$win.resize(function(){
	 	 	$('#df-fancy-header').css('height', winFullHeight);
	 	 });
 	 }

   },/*fancyHeader function*/

   titleAnimateHeader: function() {

   	var pagetitleAnimate = $('.df-header'),
   		setOnloadAnimation = function(){
			if ( 'fadeinup' == pagetitle.titleOnload ) {
				pagetitleAnimate.addClass('animated fadeInUp');
			} else if ( 'fadein' == pagetitle.titleOnload ) {
				pagetitleAnimate.addClass('animated fadeIn');
			} else if ( 'zoom-in' == pagetitle.titleOnload ) {
				pagetitleAnimate.addClass('animated zoomIn');
			} else if ( 'fadeindown' == pagetitle.titleOnload ) {
				pagetitleAnimate.addClass('animated fadeInDown');
			};
		}

	$('.df-header-container').each(function(){

		var self = $(this),
			wrap = $('.header-wrapper'),
			$parent = wrap,
			parentHeight = $parent.height(),
			siteHeader = $('.site-header').outerHeight(),
			setOnscrollAnimation = function(){

				var opacity = 1,
					transform = 0,
					scale = 1,
					gapDistance = $('.site').height(),
					scrollTop = DAHZ.$win.scrollTop();

				if(parentHeight<=0){
					return;
				}

				if (scrollTop <= gapDistance - siteHeader) {
					opacity = 1 - scrollTop/parentHeight;
					transform = scrollTop/( gapDistance/parentHeight + 3 );
					scale = 1 - scrollTop/gapDistance;
					//self.css({opacity:opacity});
					//self.css({ 'transform':'translate3d(0,'+ transform +'px,0)','-webkit-transform':'translate3d(0,'+ transform +'px,0)'});
					//$('.df-header-wrap').css({ 'transform':'translate3d(0,'+ transform +'px,0)','-webkit-transform':'translate3d(0,'+ transform +'px,0)'});
					if ( 'fadeout' == pagetitle.titleOnscroll ) {
						self.css({opacity:opacity});
					} else if ( 'fadeoutdown' == pagetitle.titleOnscroll ) {
						self.css({opacity:opacity});
						self.css({ 'transform':'translate3d(0,'+ transform +'px,0)','-webkit-transform':'translate3d(0,'+ transform +'px,0)'});
						$('.df-header-wrap').css({ 'transform':'translate3d(0,'+ transform +'px,0)','-webkit-transform':'translate3d(0,'+ transform +'px,0)'});
					} else if ( 'fadeoutup' == pagetitle.titleOnscroll ) {
						self.css({opacity:opacity});
						self.css({ 'transform':'translate3d(0,'+ -transform +'px,0)','-webkit-transform':'translate3d(0,'+ -transform +'px,0)'});
						$('.df-header-wrap').css({ 'transform':'translate3d(0,'+ -transform +'px,0)','-webkit-transform':'translate3d(0,'+ -transform +'px,0)'});
					} else if ( 'zoom-out' == pagetitle.titleOnscroll ) {
						self.css({opacity:opacity});
						self.css({ 'transform':' translate3d(0,'+ transform +'px,0) scale3d('+ scale +','+ scale +','+ scale +')','-webkit-transform':' translate3d(0,'+ transform +'px,0) scale3d('+ scale +','+ scale +','+ scale +')'});
						$('.df-header-wrap').css({ 'transform':' translate3d(0,'+ transform +'px,0) scale3d('+ scale +','+ scale +','+ scale +')','-webkit-transform':' translate3d(0,'+ transform +'px,0) scale3d('+ scale +','+ scale +','+ scale +')'});
					}
				}
			};

		if(!dfGlobals.isMobile){
		setOnloadAnimation();
		DAHZ.$win.scroll(setOnscrollAnimation);
		}

	});



   },/*titleAnimateHeader function*/

   setHeaderPadding: function(){
   		// if header is transparent dark or light use this padding

			var setHeaderOnResize = function(){

 				var $defaultHeight = $('.menu-section').outerHeight();

		   		if( dfOpt.navTransparency == 'nav-transparent' ) {
		   			$('.df-page-header, .df-fancy-header').css({paddingTop:$defaultHeight});
		   		} else {
            		$('.header-wrapper').css({paddingTop:$defaultHeight});
		   		}

		   		if( dfOpt.showTitle == 0 ){
		   			$('.header-wrapper').css({paddingTop:$defaultHeight});
		   		}
		   		if( dfOpt.offsetContent == 1 ){
		   			$('.header-wrapper').css({paddingTop:'0'});
		   			if(!dfGlobals.isMobile){
		   			$('#content-wrap').css({padding:'0'});
		   			}
		   		}

			    };

    	  var headerResizeTimeout, fps = 60, interval = 1000 / fps;
      	  	DAHZ.$win.on('debouncedresize',function(){
 				 clearTimeout(headerResizeTimeout);
           		 headerResizeTimeout = setTimeout(function() {
                  window.requestAnimFrame(setHeaderOnResize)
                	DAHZ.$win.trigger('debouncedresize');
           		 }, interval );
               window.requestAnimFrame(setHeaderOnResize)
      	  	});
	        DAHZ.$win.resize();


   },/*setHeaderPadding function*/

   navbarSticky: function(){

		navbarStickyFunction();

       	$(window).resize(function(e) {
			navbarStickyFunction();
		});

		function navbarStickyFunction(){
			var windowWidth = $(window).width();
			if ((windowWidth > 1050 || windowWidth < 800) || !dfGlobals.isMobile) {
			   	DAHZ.$win.scroll(function() {
				    if ($(this).scrollTop() > 1){

						addClassNavbar();

				    } else {
						removeClassNavbar();
				    }
				});
			} else{
				removeClassNavbar();
				DAHZ.$win.unbind('scroll');
				DAHZ.init.navbarMobile();
			}
		} /*navbarStickyFunction*/

		function addClassNavbar(){
			$('.site-header').addClass('sticky-scroll-nav');
			$('.menu-section').addClass('on-fixed-scroll');
			$('.df-topbar').addClass('hidden');
		} /*addClassNavbar*/

		function removeClassNavbar(){
			$('.site-header').removeClass('sticky-scroll-nav');
			$('.menu-section').removeClass('on-fixed-scroll');
			$('.df-topbar').removeClass('hidden');
		}/*removeClassNavbar*/

   },/*navbarSticky function*/

	navbarMobile: function (){
	   	// Hide Header on on scroll down
		var didScroll;
		var lastScrollTop = 0;
		var delta = 5;
		var navbarHeight = $('.menu-section').outerHeight();

		$('.menu-section').addClass('menu-down');

		DAHZ.$win.scroll(function(event){
		    didScroll = true;
		});

		setInterval(function() {

		    if (didScroll) {
				var st = $(this).scrollTop();

			    // Make sure they scroll more than delta
			    if(Math.abs(lastScrollTop - st) <= delta)
			        return;

			    // If they scrolled down and are past the navbar, add class .nav-up.
			    // This is necessary so you never see what is "behind" the navbar.
			    if (st > lastScrollTop && st > navbarHeight){
			        // Scroll Down
			        $('.menu-section').removeClass('menu-down').addClass('menu-up');
			    } else {
			        // Scroll Up
			        if(st + DAHZ.$win.height() < $(document).height()) {
			            $('.menu-section').removeClass('menu-up').addClass('menu-down');
			        }
			    }

			    lastScrollTop = st;

		        didScroll = false;
		    }

		}, 250);
	},/*navbarMobile function*/

	ajaxSearch: function(){

		ajaxSearchStart();

		// ajax search show
		$(".df-ajax-search").click(ajaxSearchShow);

		// ajax search hide click
		$(".universe-search-close, .container-search-close, .search-container-close").click(ajaxSearchHide);

		// ajax search hide esc pressed
		$(document).keyup(function(e) {
            if (e.keyCode == 27) {
				ajaxSearchHide();
			}
		});

		// function ajax search
	    function ajaxSearchStart(){
			$('#searchfrm').keypress(function(e) {
	            var value = $(this).val(),
            		length = value.length;

	            if(length > 1 && e.keyCode == 13) {
        			$(".universe-search-results").removeClass('hide');
        			$(".universe-search-results").addClass('animated fadeIn');

	                $.post(dfOpt.ajaxurl, { action: 'ajax_search', s: value}, function(output) {
	                    $('.universe-search-results .nano-content').html(output);
	    				$(".search-results-scroller").nanoScroller();

	                });
	            }
	            nano_init();
	        });
	    }/*ajaxSearchStart function*/

	    function ajaxSearchShow(){
	    	$(".universe-search").fadeIn(300).css('display','block').addClass('ajax-search-active');
        	$(".universe-search-form .universe-search-input").focus().val('');
        	$(".universe-search-results").addClass('hide');
	    }/*ajaxSearchShow function*/

	    function ajaxSearchHide(){
            $(".universe-search").fadeOut(300).removeClass('ajax-search-active');
	    }/*ajaxSearchHide function*/

	    function nano_init(){

	        var containerNano = jQuery('.universe-search-results'),
	        window_height= $(window).height();
	        var nano_height = window_height - 250;

	        if (dfGlobals.isAndroid) {
	            var nano_height = window_height - 91 - 44;
	            nano_height = nano_height + 250;
	        }

	        containerNano.css('height', nano_height);

	    }/*jsp_init function*/
	},/*ajaxSearch function*/

	infiniteScroll : function() {

        var url          = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
        var url_match    = url.match(/-2/);

        if (url_match) {
            var infi_url = [url, "/"]
        } else {
            var infi_url = '';
        }

        if ( dfOpt.switcher == 'infinite_button' ) {
	        var count_post = $(".isotope_ifncsr .type-post").length;
	        $(".df-infi-scrl-count .count-value").append('<span>' + count_post + '</span>');
    	}

        var inficontainer = $('.isotope_ifncsr');
        inficontainer.infinitescroll({
            navSelector: ".navigation",
            nextSelector: ".nav-next a",
            itemSelector: ".df-main .type-post, .df-main .portfolio",
            path : infi_url,
            errorCallback: function(){
	        	$('.loading-pagination ').remove();
	        	jQuery('.df-infi-scr-btn .nav-next').unbind('click');
	        	jQuery('.df-infi-scr-btn .nav-next a').removeAttr('href').text(dfOpt.finishMessage);
            },

        }, function(arrayOfNewElems){
        	// Isotope
            if ($('.df_grid_masonry, .df_grid_fit').length) {

                jQuery('.isotope_ifncsr').isotope('appended', arrayOfNewElems);
                jQuery('.df_grid_fit, .df_grid_masonry').imagesLoaded( function() {
                    jQuery('.df_grid_fit, .df_grid_masonry').isotope('layout');
                });
            };

		    if( $('blockquote').hasClass('twitter-tweet') || $('iframe').hasClass('twitter-tweet')) {
				$('.twitter-tweet').parent().addClass('entry-twitter');
	    	}

        	if ( dfOpt.switcher == 'infinite_button_count' ) {
	        	$(".df-infi-scrl-count .count-value span:first-child").remove();

	            var count_post = $(".isotope_ifncsr .type-post").not('.sticky').length;
	            $(".df-infi-scrl-count .count-value").append('<span>' + count_post + '</span>');
        	}

        	if( $('blockquote').hasClass('twitter-tweet') ) {

        		if( !$( 'body' ).hasClass( 'has-twitter-js' ) ) {

		        	$('<script/>', {
					   type: 'text/javascript',
					   src: dfOpt.tweet_href,
					}).appendTo('head');

					$(this).parent().addClass( 'twitter-widget' );

        		}

        		$( 'body' ).addClass( 'has-twitter-js' );
        	}

       		$('.df-post-video').fitVids();
			$('audio').mediaelementplayer();
			$('video').mediaelementplayer();

	        // if finished loading
	        $('.df-infi-scr-btn .nav-next').removeClass('disable');
	        $('.loading-pagination ').remove();

	        if( $('blockquote').hasClass('instagram-tweet') || $('iframe').hasClass('twitter-tweet')
		    	|| $('blockquote').hasClass('instagram-media') || $('iframe').hasClass('instagram-media') ) {
				$('.twitter-tweet, .instagram-media').parent().addClass('entry-status');
	    	}

	    	DAHZ.init.likePost();
	    	DAHZ.init.photoSwipeDom();
        });

        if ( dfOpt.switcher == 'infinite_button' ) {
	        $(window).unbind('.infscr');

	        jQuery('.df-infi-scr-btn .nav-next').click(function() {
	         	$('.df-infi-scr-btn .nav-next').addClass('disable');

		        if (jQuery('.loading-pagination').length == 0) {
		         	$('.df-infi-scr-btn .nav-next').append('<em class="loading-pagination fa fa-circle-o-notch fa-spin"></em>');
		        }


	            jQuery('.isotope_ifncsr').infinitescroll('retrieve');
	            return false;
	        });
    	}

	},/*infinitescroll*/

	offCanvas : function(){
		$('.df-menu-off-canvas').on('click', function(e) {
			e.preventDefault();
			/* Act on the event */
			$('body').addClass('pushable').trigger('df_body_change');

			$('.navbar-off-canvas')
			  .sidebar('toggle')
			;
		});

		$('.df-sidebar-off-canvas').on('click', function(e) {
			e.preventDefault();

			$('body').addClass('pushable').trigger('df_body_change');

			$('.sidebar-off-canvas')
			  .sidebar('toggle')
			;
		});


		$('body').on('df_body_change', function() {

			$( ".dimmed").unbind( "click" );/*avoid user go to limbo*/

			setTimeout(function() {
	        	$('.dimmed').bind('click', function(e) {
					$('body').removeClass('pushable')
					$( ".dimmed").unbind( "click" );
				});
           	}, 100);
		});

	},/*OffCanvas*/

	dropDownToggle : function(){
        $('<span class="btnshow"></span>').insertBefore('.off-canvas-navigation ul, .df-child-pages ul, .widget_nav_menu .sub-menu');

	    $('<span class="df_button_flat df-hide-footer"><span class="button"></span></span>').insertBefore('.footer-widgets-wrapper');

        $('span.btnshow, .df-hide-footer').click(function() {
        	var var_click = $(this);
           	btnshowclick(var_click);
        });

        jQuery('.off-canvas-navigation li.menu-item-has-children > a').each(function() {
        	var var_click = $(this),
        		href_menu_child = $(this).attr('href');

        	if (href_menu_child == '#') {
        		emptyLinkClick(var_click);
	    	};/*end if href_menu_child*/

	    }); /*end each menu item has children*/



        function btnshowclick(var_click){
        	 //REMOVE THE ON CLASS FROM ALL BUTTONS
            var_click.removeClass('onacc');
            //NO MATTER WHAT WE CLOSE ALL OPEN SLIDES
            var_click.next().slideUp('normal');
            //IF THE NEXT SLIDE WASN'T OPEN THEN OPEN IT
            if(var_click.next().is(':hidden') == true) {
                //ADD THE ON CLASS TO THE BUTTON
                var_click.addClass('onacc');
                //OPEN THE SLIDE
                var_click.next().slideDown('normal');
            }
        }/*btnshowclick*/
        function emptyLinkClick(var_click){

            var_click.click(function(e) {
                e.preventDefault();

                var_click.next().removeClass('onacc');

                var_click.next().next().slideUp('normal');

                if(var_click.next().next().is(':hidden') == true) {

                    var_click.next().addClass('onacc');

                    var_click.next().next().slideDown('normal');

                }
            });
        }
   //     	$(window).resize(function(e) {
			// var winWid = $(window).width();
			// if (winWid > 959) {
			// 	$('.footer-widgets-wrapper').show();
			// }else{
			// 	$('.footer-widgets-wrapper').hide();
			// }
		// });
	},/*dropDownToggle*/

 	relatedPost: function() {
 		$('.one-col #related-slider').owlCarousel({
			rtl: ( DAHZ.$rtl ) ? true : false,
	        onTranslated: findHeight,
			margin: 30,
			dots: true,
			responsive: {
				1000: { items: 3 },
				 600: { items: 2 },
				   0: {
					   	items: 1,
					 	dots: false,
					 	nav: true,
					  }
			}
		});

		$('.two-col-left #related-slider, .two-col-right #related-slider').owlCarousel({
			rtl: ( DAHZ.$rtl ) ? true : false,
	        onTranslated: findHeight,
			margin: 30,
			dots: true,
			responsive: {
				1000: { items: 2 },
				 600: { items: 2 },
				   0: {
					   	items: 1,
					 	dots: false,
					 	nav: true,
					  }
			}
		});
		if ($('#related-slider .owl-item').length < 3) {
			$('.owl-controls').hide();
		}
		// If grab get max height
	    function findHeight() {
	        var max = -1;
	        $('.related-post .owl-item.active').each(function( i ) {
	            var h = $(this).height();
	            max = h > max ? h : max;
	        });
	        $('.related-post .owl-stage-outer, .editor-pick_container .owl-stage-outer').css({ 'height': max });
	    }

	    DAHZ.$win.load( findHeight );
 	},/*relatedPost*/

 	megaMenu : function(){
 		var windowWidth = jQuery(window).width(),
		    mega_menu  = $('.df-mega-menu').length;

		if (mega_menu != '0') {
		    $('body').addClass('has-mega-menu');
		}


		if (windowWidth > 959) {
			megaMenuCenter();
			megaMenuRight();
			megaBackground();
		}/*window width*/

       	$(window).resize(function(e) {
			var winWidth = $(window).width();
			if (winWidth > 959) {
				megaMenuCenter();
				megaMenuRight();
				megaBackground();
			}/*window width*/
		});

		function megaBackground(){
			jQuery('.df-mega-menu').each(function() {
		        if ($(this).find('> a > .mega-icon > img').length != '0') {
		            $(this).addClass('df-mega-menu-img');
		            var background_megamenu = $(this).find('> a > .mega-icon > img').attr('src');
		            background_megamenu = 'url("' +background_megamenu+'")'
		            $(this).find('> .sub-nav ').css('background-image', background_megamenu);
		            $(this).find('ul ul').css('background', 'transparent');
		        };
		       	if ($(this).find('a .mega-icon img').length != '0') {
		            $(this).find('a .mega-icon').parent().addClass('df-mega-menu-img-child');
		        }
		    });
		}/*megaBackground*/

	    function megaMenuRight(){
			if ($('.mega-position-right').length) {
				jQuery('.df-navi').each(function() {
					$(this).find('.mega-position-right').hover( function(){
		                var menu_right = $(this),
		                	left_position = menu_right.position().left,
		                	mega_right = menu_right.parent(),
		                	mega_menu_width = findWidth(mega_right),
		                	half = 1;

		                   	position(left_position, menu_right, mega_menu_width, half);
		            });
				});
			}
	    }/*megaMenuRight*/

	    function megaMenuCenter(){
		    if ($('.mega-position-center').length) {
		    	jQuery('.df-navi').each(function() {
		            $(this).find('.mega-position-center').hover( function(){
		                var menu_center = $(this),
		                	left_position = menu_center.position().left,
		                	mega_center = menu_center.parent(),
		                	mega_menu_width = findWidth(mega_center),
		                	half = 0.5;

		                   	position(left_position, menu_center, mega_menu_width, half);
		            });
		        });
		    }
	    }/*megaMenuCenter*/

	    function position(left_position, menu, width, half){
			var nav_width = $('.df-header-inner').width(),
				menu_width = nav_width * width - menu.width();

            left_position = left_position - menu_width * half;
            menu.find('> .sub-nav').css('left', left_position + 'px');

        }/*position*/

        function findWidth(mega_menu_width){
        	var width = 0;
        	if (mega_menu_width.find('.mega-column-2').length) {
                return width = 0.4;
            }else if(mega_menu_width.find('.mega-column-3').length){
                return width = 0.6;
            }else if(mega_menu_width.find('.mega-column-4').length){
                return width = 0.8;
            }
        }/*findWidth*/

 	},/*megaMenu*/

 	pageLoader : function(){
 		if (dfOpt.page_loader) {
			// jQuery('body').css('overflow', 'hidden');

       		DAHZ.$win.load(function(){
			 	// left: 37, up: 38, right: 39, down: 40,
				// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
				// var keys = [37, 38, 39, 40];

				// function preventDefault(e) {
				//   e = e || window.event;
				//   if (e.preventDefault)
				//       e.preventDefault();
				//   e.returnValue = false;
				// }

				// function keydown(e) {
				//     for (var i = keys.length; i--;) {
				//         if (e.keyCode === keys[i]) {
				//             preventDefault(e);
				//             return;
				//         }
				//     }
				// }

				// function wheel(e) {
				//   preventDefault(e);
				// }

				// function disable_scroll() {
				//   if (window.addEventListener) {
				//       window.addEventListener('DOMMouseScroll', wheel, false);
				//   }
				//   window.onmousewheel = document.onmousewheel = wheel;
				//   document.onkeydown = keydown;

				// }

				// function enable_scroll() {
				//     if (window.removeEventListener) {
				//         window.removeEventListener('DOMMouseScroll', wheel, false);
				//     }
				//     window.onmousewheel = document.onmousewheel = document.onkeydown = null;
				// }

				// disable_scroll();

				var ajax_loader = jQuery('.ajax_loader');

		    	if ( 'fadeOut' == dfOpt.page_loader_anim ) {
			    	ajax_loader.addClass('fadeOut animated');
				} else if ( 'rotateOutUpRight' == dfOpt.page_loader_anim ) {
			    	ajax_loader.addClass('rotateOutUpRight animated');
				} else if ( 'zoomOut' == dfOpt.page_loader_anim ) {
			    	ajax_loader.addClass('zoomOut animated');
				} else if ( 'rollOut' == dfOpt.page_loader_anim ) {
			    	ajax_loader.addClass('rollOut animated');
				}


    			setTimeout( function() {
			    	jQuery('.ajax_loader').hide();
					// jQuery('body').css('overflow', 'auto');
			   		// enable_scroll();
				}, 1000 );
	        });
	    }

 	},/*pageLoader*/

 	likePost: function(){
        $('.df-like').click(function() {

	        var $likeLink = $(this);
	        var $id = $(this).attr('id');

	        if ($likeLink.hasClass('liked'))
	            return false;

	        var $dataToPass = {
	            action: 'df_like',
	            likes_id: $id
	        }

	        var like = $.post(dfOpt.ajaxurl, $dataToPass, function(data) {
	            $likeLink.html(data).addClass('liked').attr('title', 'You already like this!'); // -> harus ke translate pake wp localize
	            $likeLink.find('span').css('opacity', 1);
	        });

	        return false;
	    });
	}, /*likePost*/

	ajaxFilter : function(){
		var $links = $('#options-blog-sort a');

		$links.click(function(e) {
			e.preventDefault();
            var selector = jQuery(this).attr('data-filter');
			$.post(dfOpt.ajaxurl, {
				action: 'option_search_ajax',
				selector: selector,
				beforeSubmit:  function(){
					$('.df_grid_fit, .df_grid_masonry').removeClass('animated fadeIn');
					$('.df_grid_fit, .df_grid_masonry').addClass('animated fadeOut');

				},
				}, function(output) {
    				$('.df_grid_fit, .df_grid_masonry').removeClass('animated fadeOut');
					$('.df_grid_fit, .df_grid_masonry').addClass('animated fadeIn');

    				$('.nav-links, .df-pagination-number').remove();

                    $('.df_grid_fit, .df_grid_masonry').html(output);

					$('.df_grid_fit, .df_grid_masonry').isotope('destroy');

    				dahzMasonry.init();
   					DAHZ.init.likePost();

		       		$('.df-post-video').fitVids();
					$('audio').mediaelementplayer();
					$('video').mediaelementplayer();

   					if( $('blockquote').hasClass('twitter-tweet') ) {

		        		if( !$( 'body' ).hasClass( 'has-twitter-js' ) ) {

				        	$('<script/>', {
							   type: 'text/javascript',
							   src: dfOpt.tweet_href,
							}).appendTo('head');
							$(this).parent().addClass( 'twitter-widget' );

		        		}

		        		$( 'body' ).addClass( 'has-twitter-js' );
		        	}

					if( $('blockquote').hasClass('twitter-tweet') || $('iframe').hasClass('twitter-tweet')) {
						$('.twitter-tweet').parent().addClass('entry-status');
					}

					$('.type-post').hover(function(){
						jQuery('.df_grid_fit, .df_grid_masonry').isotope('layout');
			    	});

			        $(window).unbind('.infscr');

	                $('#options-blog-sort').removeClass('active-hover');

	                DAHZ.init.photoSwipeDom();
	                DAHZ.init.swipeAjaxInit();
                }); /* end function output */

		});
	}, /*ajaxFilter*/
	isotopeMobile: function() {
		var windowWidth = DAHZ.$win.width();

		if (windowWidth < 780) {

	        if (jQuery('.filter-cat-blog').length == 0) {
                jQuery('#options-blog-sort').prepend('<div class="filter-cat-blog">' + dfOpt.filterBy + '</div>');
	        }

	            jQuery('.filter-cat-blog').on('click',function(event) {
	                if (jQuery(this).parent().hasClass('active-hover')) {
	                    jQuery(this).parent().removeClass('active-hover');

	                } else {
	                    jQuery(this).parent().addClass('active-hover');
	                }
	            });

	    } else {
	        jQuery('.filter-cat-blog').remove();
	    }
	},
	tableResponsive: function() {
	// Run on window load in case images or other scripts affect element widths
	$(window).on('load', function() {
	    if( dfGlobals.isMobile ){
	        // Check all tables. You may need to be more restrictive.
	        $('table').each(function() {
	            var element = $(this);
	            // Create the wrapper element
	            var scrollWrapper = $('<div />', {
	                'class': 'scrollable',
	                'html': '<div />' // The inner div is needed for styling
	            }).insertBefore(element);
	            // Store a reference to the wrapper element
	            element.data('scrollWrapper', scrollWrapper);
	            // Move the scrollable element inside the wrapper element
	            element.appendTo(scrollWrapper.find('div'));
	            // Check if the element is wider than its parent and thus needs to be scrollable
	            if (element.outerWidth() > element.parent().outerWidth()) {
	                element.data('scrollWrapper').addClass('has-scroll');
	            }
	            // When the viewport size is changed, check again if the element needs to be scrollable
	            $(window).on('debouncedresize', function() {
	                if (element.outerWidth() > element.parent().outerWidth()) {
	                    element.data('scrollWrapper').addClass('has-scroll');
	                } else {
	                    element.data('scrollWrapper').removeClass('has-scroll');
	                }
	            });
	        });
	    }
	});
	}, /*tableResponsive*/
	photoSwipeDom: function() {
			// PhotoSwipe
			var initPhotoSwipeFromDOM = function(gallerySelector) {

		    // parse slide data (url, title, size ...) from DOM elements
		    // (children of gallerySelector)
		    var parseThumbnailElements = function(el) {
		        var thumbElements = el.childNodes,
		            numNodes = thumbElements.length,
		            items = [],
		            figureEl,
		            linkEl,
		            size,
		            item;

		        for(var i = 0; i < numNodes; i++) {

		            figureEl = thumbElements[i]; // <figure> element

		            // include only element nodes
		            if(figureEl.nodeType !== 1) {
		                continue;
		            }

		            linkEl = figureEl.children[0]; // <a> element

		            size = linkEl.getAttribute('data-size').split('x');

		            // create slide object
		            item = {
		                src: linkEl.getAttribute('href'),
		                w: parseInt(size[0], 10),
		                h: parseInt(size[1], 10)
		            };



		            if(figureEl.children.length > 1) {
		                // <figcaption> content
		                item.title = figureEl.children[1].innerHTML;
		            }

		            if(linkEl.children.length > 0) {
		                // <img> thumbnail element, retrieving thumbnail url
		                item.msrc = linkEl.children[0].getAttribute('src');
		            }

		            item.el = figureEl; // save link to element for getThumbBoundsFn
		            items.push(item);
		        }

		        return items;
		    };

		    // find nearest parent element
		    var closest = function closest(el, fn) {
		        return el && ( fn(el) ? el : closest(el.parentNode, fn) );
		    };

		    // triggers when user clicks on thumbnail
		    var onThumbnailsClick = function(e) {
		        e = e || window.event;
		        e.preventDefault ? e.preventDefault() : e.returnValue = false;

		        var eTarget = e.target || e.srcElement;

		        // find root element of slide
		        var clickedListItem = closest(eTarget, function(el) {
		            return el.tagName === 'FIGURE';
		        });

		        if(!clickedListItem) {
		            return;
		        }

		        // find index of clicked item by looping through all child nodes
		        // alternatively, you may define index via data- attribute
		        var clickedGallery = clickedListItem.parentNode,
		            childNodes = clickedListItem.parentNode.childNodes,
		            numChildNodes = childNodes.length,
		            nodeIndex = 0,
		            index;

		        for (var i = 0; i < numChildNodes; i++) {
		            if(childNodes[i].nodeType !== 1) {
		                continue;
		            }

		            if(childNodes[i] === clickedListItem) {
		                index = nodeIndex;
		                break;
		            }
		            nodeIndex++;
		        }



		        if(index >= 0) {
		            // open PhotoSwipe if valid index found
		            openPhotoSwipe( index, clickedGallery );
		        }
		        return false;
		    };

		    // parse picture index and gallery index from URL (#&pid=1&gid=2)
		    var photoswipeParseHash = function() {
		        var hash = window.location.hash.substring(1),
		        params = {};

		        if(hash.length < 5) {
		            return params;
		        }

		        var vars = hash.split('&');
		        for (var i = 0; i < vars.length; i++) {
		            if(!vars[i]) {
		                continue;
		            }
		            var pair = vars[i].split('=');
		            if(pair.length < 2) {
		                continue;
		            }
		            params[pair[0]] = pair[1];
		        }

		        if(params.gid) {
		            params.gid = parseInt(params.gid, 10);
		        }

		        if(!params.hasOwnProperty('pid')) {
		            return params;
		        }
		        params.pid = parseInt(params.pid, 10);
		        return params;
		    };

		    var openPhotoSwipe = function(index, galleryElement, disableAnimation) {
		        var pswpElement = document.querySelectorAll('.pswp')[0],
		            gallery,
		            options,
		            items;

		        items = parseThumbnailElements(galleryElement);

		        // define options (if needed)
		        options = {
		            index: index,

		            // define gallery index (for URL)
		            galleryUID: galleryElement.getAttribute('data-pswp-uid'),

		            getThumbBoundsFn: function(index) {
		                // See Options -> getThumbBoundsFn section of documentation for more info
		                var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
		                    pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
		                    rect = thumbnail.getBoundingClientRect();

		                return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
		            }

		        };

		        if(disableAnimation) {
		            options.showAnimationDuration = 0;
		        }

		        // Pass data to PhotoSwipe and initialize it
		        gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
		        gallery.init();
		    };

		    // loop through all gallery elements and bind events
		    var galleryElements = document.querySelectorAll( gallerySelector );

		    for(var i = 0, l = galleryElements.length; i < l; i++) {
		        galleryElements[i].setAttribute('data-pswp-uid', i+1);
		        galleryElements[i].onclick = onThumbnailsClick;
		    }

		    // Parse URL and open gallery if it contains #&pid=3&gid=1
		    var hashData = photoswipeParseHash();
		    if(hashData.pid > 0 && hashData.gid > 0) {
		        openPhotoSwipe( hashData.pid - 1 ,  galleryElements[ hashData.gid - 1 ], true );
		    }
			};

			// execute above function
			initPhotoSwipeFromDOM('.gallery');
		}, /*photoSwipeDom*/
		swipeAjaxInit: function() {
			$('.swipeLink').each(function() {
				$.this = $(this);
				$.this.click(function(e) {
					e.preventDefault();
					$('body').addClass('swipeActive');
				});
				$('.pswp__item').click(function(e) {
					e.preventDefault();
					$('body').removeClass('swipeActive');
				});

					$('.pswp__ui').click(function(e) {
						e.preventDefault();
						$('body').removeClass('swipeActive');
					});

			});
		}, /*swipeAjaxInit*/
		logoFix: function(){
			if (dfOpt.logo != dfOpt.logo_sticky) {
				$(".df-sitename").addClass('diff_logo');
			};

			if ($('body').hasClass('osx') && !dfGlobals.isMobile) {
				DAHZ.$win.scroll(function() {
					if ($(this).scrollTop() > 1) {
			    		$('.normal-logo').addClass('hide');
			    		$('.sticky-logo').addClass('show-inline');
					} else {
						$('.normal-logo').removeClass('hide');
			    		$('.sticky-logo').removeClass('show-inline');
					}
				});
			};

			setTimeout( function() {
		    	$('.site-header .df-header-inner').removeClass('hide');
				$('.site-header .df-header-inner').addClass('animated fadeIn');

			}, 100 );

		},/*logoFix*/
		scrollAnimateTop: function(){
			DAHZ.$win.scroll(function() {
				if ($(this).scrollTop() > 600) {
					$('.scroll-top').addClass('animated fadeIn');
					$('.scroll-top').removeClass('fadeOut hide');
				} else {
					$('.scroll-top').addClass('animated fadeOut');
				}
			});
		},
}; // DAHZ.init


}(jQuery));

(function($) {

	DAHZ.init.initSite();

})(jQuery);
