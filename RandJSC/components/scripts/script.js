// Document Ready Function 
jQuery(document).ready(function ($) {
	console.log( "document is top" );
	console.log( "another test" );

	$( "ul.vc_tta-tabs-list li:first-child a" ).click(function() {
  		console.log( "clicked on first child tab" );
  		$( "#peso-underline" ).css({ "background-color": "#dd385e" });
	});
	$( "ul.vc_tta-tabs-list li:nth-child(2) a" ).click(function() {
  		console.log( "clicked on 2nd child tab" );
  		$( "#peso-underline" ).css({ "background-color": "#fdbd4d" });
	});
	$( "ul.vc_tta-tabs-list li:nth-child(3) a" ).click(function() {
  		console.log( "clicked on 3nd child tab" );
  		$( "#peso-underline" ).css({ "background-color": "#c0da6b" });
	});
	$( "ul.vc_tta-tabs-list li:nth-child(4) a" ).click(function() {
  		console.log( "clicked on 4th child tab" );
  		$( "#peso-underline" ).css({ "background-color": "#4ab5e4" });

	});

/*particlesJS("particles-js", {
	"particles": {
		"number": {
			"value": 289,
			"density": {
				"enable": true,
				"value_area": 1260
			}
		},
		"color": {
			"value": "#586336"
		},
		"shape": {
			"type": "circle",
			"stroke": {
				"width": 0,
				"color": "#000000"
			},
			"polygon": {
				"nb_sides": 5
			},
			"image": {
				"src": "img/github.svg",
				"width": 100,
				"height": 100
			}
		},
		"opacity": {
			"value": .9,
			"random": false,
			"anim": {
				"enable": false,
				"speed": 1,
				"opacity_min": 0.7,
				"sync": false
			}
		},
		"size": {
			"value": 9,
			"random": true,
			"anim": {
				"enable": false,
				"speed": 40,
				"size_min": 7,
				"sync": false
			}
		},
		"line_linked": {
			"enable": true,
			"distance": 130,
			"color": "#586336",
			"opacity": 0.8,
			"opacity_min": 0.7,
			"width": 2.8
		},
		"move": {
			"enable": true,
			"speed": 0.35,
			"direction": "none",
			"random": false,
			"straight": false,
			"out_mode": "out",
			"bounce": false,
			"attract": {
				"enable": false,
				"rotateX": 600,
				"rotateY": 1200
			}
		}
	},
	"interactivity": {
		"detect_on": "canvas",
		"events": {
			"onhover": {
				"enable": true,
				"mode": "grab"
			},
			"onclick": {
				"enable": true,
				"mode": "push"
			},
			"resize": true
		},
		"modes": {
			"grab": {
				"distance": 145,
				"line_linked": {
					"opacity": .8
				}
			},
			"bubble": {
				"distance": 400,
				"size": 40,
				"duration": 2,
				"opacity": 8,
				"speed": 3
			},
			"repulse": {
				"distance": 25,
				"duration": 2.2
			},
			"push": {
				"particles_nb": 4
			},
			"remove": {
				"particles_nb": 2
			}
		}
	},
	"retina_detect": true
});*/



});

/*$(document).ready(function() {

	console.log( "ready is ready" );

	$('.vc_grid-item').each(function(){
		console.log( "gridf is ready" );
		var containsToken = false,
				token = '1',
				classToAdd = 'winner';
		
		jQuery(this).children().each(function(){
			if (jQuery(this).text().indexOf(token) !== -1) {
				containsToken = true;
			}
		});
		if(containsToken) {
			jQuery(this).addClass(classToAdd);
			jQuery(".winner").prepend("<img class='award-banner' src='http://www.dev.randjsc.com/wp-content/uploads/2016/12/Awards-FINAL.png'>");
		} 
		
	});

});*/
// $.noConflict();
// jQuery(document).ready(function ($) {

/*jQuery(document).ready(function ($) {
	console.log( "document is ready" );

	// jQuery
jQuery('#content-wrap').imagesLoaded().done( function( instance ) {
  console.log('DONE  - all images have been successfully loaded - jquery');
});

jQuery('.imagesloaded .vc_gitem-zone-img').imagesLoaded().done( function( instance ) {
  console.log('DONE  - all images have been successfully loaded - jquery');
});*/

// vanilla JS
/*imgLoad.on( 'done', function( instance ) {
  console.log('DONE  - all images have been successfully loaded - vanilla js');
});*/



/*----------------------
// imagesLoaded
*----------------------*/

console.log("So far so good");




/*----------------------
// Add awards banner
*----------------------*/

jQuery(window).on('load', function (e) {

	console.log( "window is ready" );


  // place this within dom ready function
  function bannerdelay() {

    console.log( "bannerdelay fired from script file after window load" );

    jQuery('.vc_grid-item').each(function ($) {
		console.log( "grid function fired!" );
		var containsToken = false,
				token = '1',
				classToAdd = 'awarded';
		
		jQuery(this).children().each(function(){
			if (jQuery(this).text().indexOf(token) !== -1) {
				containsToken = true;
			}
		});
		if(containsToken) {
			jQuery(this).addClass(classToAdd);
			// jQuery(".winner").prepend("<img class='award-banner' src='http://www.dev.randjsc.com/wp-content/uploads/2016/12/Awards-FINAL.png'>");
		}
		// jQuery('.award-winner').css( "display", "none" );
		
	});
 }

 // use setTimeout() to execute
 setTimeout(bannerdelay, 4000)


/* jQuery('body').on('load', function(){
        console.log("body has loaded!");
    });*/
});


/*jQuery(window).on('load', function (e) {

  console.log( "window has loaded" );

  // $this = $(this);

  jQuery('.menu-item').addClass('chriss');

  jQuery('.vc_grid-item').each(function ($) {
		console.log( "gridf is ready" );
		var containsToken = false,
				token = '1',
				classToAdd = 'winner';
		
		jQuery(this).children().each(function(){
			if (jQuery(this).text().indexOf(token) !== -1) {
				containsToken = true;
			}
		});
		if(containsToken) {
			jQuery(this).addClass(classToAdd);
			jQuery(".winner").prepend("<img class='award-banner' src='http://www.dev.randjsc.com/wp-content/uploads/2016/12/Awards-FINAL.png'>");
		} 
		
	});

  console.log( "window loaded function END" );

});*/

// Peso Model Navbar
/*jQuery(document).ready(function ($) {

	console.log("So far so good");

	jQuery(".peso-tabs .vc_tta-tabs-list").prepend('<div id="nav-bar"></div>');

	// Elements
	var $nav = jQuery('.peso-tabs .vc_tta-tabs-list'),
		$links = jQuery('.peso-tabs .vc_tta-tabs-list a'),
		$bar = jQuery('#nav-bar');

	var bar = {
		width: $links.first().innerWidth(),
		pos: $links.first().position().left
	};

	setBarPos();

	function setBarPos(){
		$bar.stop().animate({
			left: bar.pos,
			width: bar.width
		});
	}

	// Link
	$links.mouseenter(function(e) {
		var _tar = $(e.target),
			_tarPos = _tar.position().left,
			_tarWidth = _tar.innerWidth();

		bar.width = _tarWidth;
		bar.pos = _tarPos;

		setBarPos();
	});
});*/

  