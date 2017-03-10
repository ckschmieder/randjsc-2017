( function( $ ) {

  var api = wp.customize;

  // General
    api( 'df_options[site_max_width]', function( value ) {
		value.bind( function( newval ) {
			var m_w = 100 - 2.5;
			$('.df_container-fluid.fluid-max').css('max-width', Math.round(newval*(m_w / 100)) + 'px' );
			$('.df-boxed-layout-active .site').css('max-width', newval + 'px' );
			$('.df-boxed-layout-active .df-topbar').css('max-width', newval + 'px' );
			$('.df-boxed-layout-active .site-header').css('max-width', newval + 'px' );
			$('.df_container-fluid.fluid-max,.df-boxed-layout-active .site').css('transition', 'all .3s ease-out' );
		} );
	} );

   // Topbar
	api( 'df_options[header_topbar]' , function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$('.df-topbar').fadeOut('slow');
			}
			else {
				$('.df-topbar').fadeIn('fast');
			}
		} );
	});
	api( 'df_options[header_topbar_content]', function( value ) {
		value.bind( function( newval ) {
			$( '.info-description' ).html( newval );
		} );
	} );
	api( 'df_options[header_topbar_txt_color]' , function( value ) {
		value.bind( function( newval ) {
			$('.df-topbar, .info-description, .df-social-connect li a, .df-topbar .main-navigation a').css('color', newval );
		} );
	});
	api( 'df_options[header_topbar_bg_color]' , function( value ) {
		value.bind( function( newval ) {
			$('.df-topbar').css('background-color', newval );
		} );
	});
	api( 'df_options[enable_topbar_social_icon]' , function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$('.df-social-connect').fadeOut('slow');
			}
			else {
				$('.df-social-connect').fadeIn('fast');
			}
		} );
	});

	// Logo
	api( 'df_options[logo_height]' , function( value ) {
		value.bind( function( newval ) {
			$('.df-sitename img, .site-header > .main-navigation, .site-misc-tools').css('height', newval );
			$('.site-header > .main-navigation, .site-misc-tools').css('line-height', newval+'px' );
		} );
	});
	api( 'df_options[logo_spacing_above]' , function( value ) {
		value.bind( function( newval ) {
			$('.header-wrapper .site-header').css('padding-top', newval+'px');
		} );
	});
		api( 'df_options[logo_spacing_below]' , function( value ) {
		value.bind( function( newval ) {
			$('.header-wrapper .site-header').css('padding-bottom', newval+'px');
		} );
	});

    // Navbar

    api( 'df_options[header_navbar_align]' , function( value ) {
		value.bind( function( newval ) {
			if('align-right' == newval){
				$('.menu-align').addClass('alignright');
				$('.menu-align').removeClass('alignleft');
				$('.menu-align').removeClass('aligncenter');
			} else if ('align-center' == newval) {
				$('.menu-align').addClass('aligncenter');
				$('.menu-align').removeClass('alignright');
				$('.menu-align').removeClass('alignleft');
			} else if ('align-left' == newval){
				$('.menu-align').addClass('alignleft');
				$('.menu-align').removeClass('alignright');
				$('.menu-align').removeClass('aligncenter');
			}
		} );
	});

	api( 'df_options[header_navbar_wide]' , function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$('.df-topbar .df_container-fluid, .df-header-inner').addClass('fluid-max');
			}
			else {
				$('.df-topbar .df_container-fluid, .df-header-inner').addClass('widepad').removeClass('fluid-max');
			}
		} );
	});
	api( 'df_options[header_navbar_bg_color]' , function( value ) {
		value.bind( function( newval ) {
			$('.site-header').css('background-color', newval );
		} );
	});
	api( 'df_options[header_navbar_txt_color]' , function( value ) {
		value.bind( function( newval ) {
			$('.site-header, .main-navigation a').css('color', newval );
		} );
	});

    // Sticky Navbar
	api( 'df_options[sticky_navbar_bg_color]' , function( value ) {
		value.bind( function( newval ) {
			$('.site-header.sticky-scroll-nav').css('background-color', newval );
		} );
	});
	api( 'df_options[sticky_navbar_txt_color]' , function( value ) {
		value.bind( function( newval ) {
			$('.site-header.sticky-scroll-nav,.site-header.sticky-scroll-nav .main-navigation a,.site-header.sticky-scroll-nav .site-misc-tools ul li a').css('color', newval );
		} );
	});

	//Miscellaneous
	api( 'df_options[show_header_search]' , function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$('.df-ajax-search').fadeOut('slow');
			}
			else {
				$('.df-ajax-search').fadeIn('fast');
			}
		} );
	});
	api( 'df_options[show_wpml_icon]' , function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$('.wpml-languages').fadeOut('slow');
			}
			else {
				$('.wpml-languages').fadeIn('fast');
			}
		} );
	});
	api( 'df_options[show_offcanvas]' , function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$('.df-menu-off-canvas').fadeOut('slow');
			}
			else {
				$('.df-menu-off-canvas').fadeIn('fast');
			}
		} );
	});

    // Page Title
	api( 'df_options[page_header_title_bg_color]' , function( value ) {
		value.bind( function( newval ) {
			$('.df-page-header').css('background-color', newval );
		} );
	});
	api( 'df_options[page_header_title_height]' , function( value ) {
		value.bind( function( newval ) {
			$('.df-header-container').css('height', newval );
			$('#df-normal-header').css('min-height', newval+'px' );
		} );
	});


    //Update the Social Connect in real time...

	 //    api( 'df_options[facebook]', function( value ) {
		// 	value.bind( function( newval ) {
		// 		$( '.df-social-connect li a' ).attr( 'href', newval );
		// 	} );
		// } );

    // Accent Color
     api( 'df_options[accent_color]', function( value ) {
			value.bind( function( newval ) {
				$( 'a, .post-pagination i, .widget_nav_menu li > a:hover' ).css( 'color', newval );
				$( '.single-portfolio .df-single-portfolio-postnav .df-back-to-page-portfolio a:hover,.single-portfolio .df-single-portfolio-postnav .nav-next a:hover,.single-portfolio .df-single-portfolio-postnav .nav-prev a:hover' ).css( 'color', newval );
				$( '.single .single-tag-blog ul li:hover,.widget_tag_cloud a:hover, .df-next-prev-pagination a:hover, .df-sidebar-off-canvas' ).css( 'background-color', newval );
				$( '.single .single-tag-blog ul li:hover, .comment-form input[type=text]:focus, .comment-form textarea:focus, .widget_search input[type="search"]:focus, .widget .selectricOpen .selectric, .selectricHover .selectric' ).css( 'border-color', newval );
			} );
		} );
	// Footer Widget Column
	api( 'df_options[pf_widget_title_color]', function( value ) {
			value.bind( function( newval ) {
				$( '.footer-primary-widgets .widget h3, .footer-primary-widgets .widget caption' ).css( 'color', newval );
			} );
	} );
	api( 'df_options[pf_widget_content_color]', function( value ) {
			value.bind( function( newval ) {
				$( '.footer-primary-widgets' ).css( 'color', newval );
			} );
	} );
	// Footer Copyright
	api( 'df_options[copyright_content]', function( value ) {
		value.bind( function( newval ) {
			$( '.siteinfo' ).html( newval );
		} );
	} );
	api( 'df_options[cf_text_color]', function( value ) {
			value.bind( function( newval ) {
				$( '.df-footer p' ).css( 'color', newval );
			} );
	} );
    api( 'df_options[cf_link_color]', function( value ) {
			value.bind( function( newval ) {
				$( '.df-footer a' ).css( 'color', newval );
			} );
		} );

} )( jQuery );
