( function( api ) {

	// Extends our custom "campus-lite" section.
	api.sectionConstructor['newsair'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );