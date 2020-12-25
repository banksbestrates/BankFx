( function( api ) {

	// Extends our custom "multipurpose-magazine" section.
	api.sectionConstructor['multipurpose-magazine'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

	(function ($) {
	    $(document).ready(function ($) {
	        $('input[data-input-type]').on('input change', function () {
	            var val = $(this).val();
	            $(this).prev('.cs-range-value').html(val);
	            $(this).val(val);
	        });
	    })
	})(jQuery);

} )( wp.customize );