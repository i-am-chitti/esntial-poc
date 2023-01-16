// In-screen editing approach

jQuery( document ).ready(
	function() {
		let previewField = jQuery( '.gf-live-preview' );
		let imageUploadInputField = jQuery( '.gfield.images' + ' input' );

		previewField.on(
			'click',
			function ( e ) {
				let gfield = jQuery( this ).data( 'gfield' );
				jQuery( '.gfield.' + gfield ).css( 'display','block' );
				if (gfield === 'images') {
					imageUploadInputField.click();
				}
			}
		);

		imageUploadInputField.on('change', function(et) {
			const imgFile = this.files[0];
			const fileReader = new FileReader();
			fileReader.onload = function(e) {
				jQuery( '.gf-live-preview.images' ).attr('src', e.target.result);
			}
			fileReader.readAsDataURL(imgFile);
		});

		previewField.on(
			'input',
			function ( e ) {
				let gfield = jQuery( this ).data( 'gfield' );

				if(jQuery(this).prop('tagName').toLowerCase() === 'input') {
					jQuery( '.gfield.' + gfield + ' input' ).val( jQuery( this ).val() );
				} else {
					jQuery( '.gfield.' + gfield + ' input' ).val( jQuery( this ).text() );
				}

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
