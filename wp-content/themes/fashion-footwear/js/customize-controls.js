( function( api ) {

	// Extends our custom "fashion-footwear" section.
	api.sectionConstructor['fashion-footwear'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );