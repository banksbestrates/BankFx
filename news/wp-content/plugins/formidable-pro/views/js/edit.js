( function() {
	tryToMoveSVGLockIconIntoCustomizationHeader();

	function tryToMoveSVGLockIconIntoCustomizationHeader() {
		var lock, $advInfo,
			unlock = copyLockReferenceIcon( true );

		if ( false === unlock ) {
			return;
		}

		lock = document.createElement( 'a' );
		$advInfo = jQuery( '#frm_adv_info' );

		lock.setAttribute( 'href', '#' );
		lock.appendChild( unlock );
		$advInfo.find( '.postbox-header .handle-actions' ).prepend( lock );

		jQuery( lock ).click( function( e ) {
			var icon;

			e.preventDefault();

			$advInfo.toggleClass( 'frm-remove-lock' );
			icon = copyLockReferenceIcon( ! $advInfo.hasClass( 'frm-remove-lock' ) );
			lock.innerHTML = '';
			lock.appendChild( icon );
		});
	}

	function copyLockReferenceIcon( locked ) {
		var clone,
			id = 'frm_views_' + ( locked ? 'unlock' : 'lock' ),
			referenceIcon = document.getElementById( id );

		if ( null === referenceIcon ) {
			return false;
		}

		clone = referenceIcon.cloneNode( true );
		clone.id = '';
		return clone;
	}
}() );
