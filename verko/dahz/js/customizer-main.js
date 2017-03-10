( function($) {

var api = wp.customize, customControls;

customControls = {

	cache: {},

	init : function() {
			// Populate cache
		  this.cache.$buttonset  = $('.df-radio-control-buttonset, .df-radio-control-image');
		  this.cache.$range      = $('.input_df_slider_text');

			// Initialize Button sets
			if (this.cache.$buttonset.length > 0) {
				this.buttonset();
			}

			// Initialize ranges
			if (this.cache.$range.length > 0) {
				this.range();
			}

	},


	// Radio Buttonset
	buttonset: function() {
  	this.cache.$buttonset.buttonset();
	},

	// Slider Range
	range: function(){

		this.cache.$range.each(function() {
				var $input = $(this),
					$slider = $input.parent().find('.slider_df_slider_text'),
					value = parseFloat( $input.val() ),
					min = parseFloat( $input.attr('min') ),
					max = parseFloat( $input.attr('max') ),
					step = parseFloat( $input.attr('step') );

				$slider.slider({
					value : value,
					min   : min,
					max   : max,
					step  : step,
					slide : function(e, ui) {
						$input.val(ui.value).keyup().trigger('change');
					}
				});
				$input.val( $slider.slider('value') );
				$input.on('keyup',function () {
				$slider.slider('value', this.value);
				});
			});

	}

};

// Load after Customizer initialization is complete.
jQuery(document).ready(function() {
	customControls.init();
});

})( jQuery );
