( function( api ) {

	// Extends our custom "timesnews" section.
	api.sectionConstructor['timesnews'] = api.Section.extend( {

		// No timesnews for this type of section.
		attachEuphoric: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
