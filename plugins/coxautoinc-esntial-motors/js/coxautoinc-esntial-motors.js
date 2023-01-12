// In-screen editing approach

// jQuery( document ).ready(
// 	function() {
// 		let previewField = jQuery( '.gf-live-preview' );

// 		previewField.on(
// 			'click',
// 			function ( e ) {
// 				let gfield = jQuery( this ).data( 'gfield' );
// 				jQuery( '.gfield.' + gfield ).css( 'display','block' );
// 				//let imagesBtn = jQuery( '.gfield.'+gfield + ' button[type=button]' );
// 				// imagesBtn.click();
// 			}
// 		);

// 		previewField.on(
// 			'input',
// 			function ( e ) {
// 				let gfield = jQuery( this ).data( 'gfield' );
// 				console.log(gfield);
// 				jQuery( '.gfield.' + gfield + ' input' ).val( jQuery( this ).text() );
// 				jQuery( '.gfield.' + gfield + ' textarea' ).val( jQuery( this ).text() );
// 			}
// 		);

// 		jQuery( '.gf-live-preview.save-changes' ).on(
// 			'click',
// 			function ( e ) {
// 				jQuery( '.gfield' ).css( 'display','none' );
// 				wp.heartbeat.connectNow();
// 			}
// 		);

// 		jQuery( '.gf-live-preview.preview-changes' ).on(
// 			'click',
// 			function ( e ) {
// 				location.reload();
// 			}
// 		);
// 	}
// );

/*
 * Split screen editing approach - used by JS Fiddle etc
 * Disadvantage -
 * Not mobile responsive
*/

window.Split({
	minSize: 400,
    columnGutters: [{
        track: 1,
        element: document.querySelector('.gutter-col-1'),
    }],
});

jQuery( document ).ready(
	function() {

		let headingInputField = jQuery(' #input_3_1 ');
		let headingInputElement = jQuery('#heading_3_1');

		let descriptionInputField = jQuery('#input_3_3');
		let descriptionInputElement = jQuery('#description_3_3');

		headingInputField.on('input', function(e) {
			headingInputElement.text(headingInputField.val());
		});

		descriptionInputField.on('input', function(e) {
			descriptionInputElement.text(descriptionInputField.val());
		});
	}
);
