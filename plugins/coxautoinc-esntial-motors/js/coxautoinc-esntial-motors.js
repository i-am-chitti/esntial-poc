// In-screen editing approach

jQuery( document ).ready(
	function() {
		let previewField = jQuery( '.gf-live-preview' );

		previewField.on(
			'click',
			function ( e ) {
				let gfield = jQuery( this ).data( 'gfield' );
				jQuery( '.gfield.' + gfield ).css( 'display','block' );
			}
		);

		previewField.on(
			'input',
			function ( e ) {
				let gfield = jQuery( this ).data( 'gfield' );
				jQuery( '.gfield.' + gfield + ' input' ).val( jQuery( this ).text() );
				jQuery( '.gfield.' + gfield + ' textarea' ).val( jQuery( this ).text() );
			}
		);

		jQuery( '.gf-live-preview.save-changes' ).on(
			'click',
			function ( e ) {
				jQuery( '.gfield' ).css( 'display','none' );
				wp.heartbeat.connectNow();
			}
		);

		jQuery( '.gf-live-preview.preview-changes' ).on(
			'click',
			function ( e ) {
				location.reload();
			}
		);
	}
);

/*
 * Split screen editing approach - used by JS Fiddle etc
 * Disadvantage -
 * Not mobile responsive
*/
