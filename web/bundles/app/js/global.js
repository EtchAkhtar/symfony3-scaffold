// @codekit-prepend "partials/_params.js"
// @codekit-prepend "partials/_global_functions.js"
// @codekit-prepend "partials/_modals.js"
// @codekit-prepend "partials/_forms.js"
// @codekit-prepend "partials/_formValidation.js"

/*
 * Author: Etch Akhtar
 * Version: 1.0
 * Created Date:
 * Copyright (c) Etch Akhtar
 *
 * Global file
 */

$(document).ready(function() {

	// Bind modal blocking to ajax submissions (unless overridden)
	$(document).ajaxStart(function(){
		if (typeof noblock === 'undefined') { noblock = false; }
		if (!noblock) { modalBlock(); }
	});

	$(document).ajaxStop(function(){
		modalUnblock();
	});

	// Handle ajax errors
    $(document).ajaxComplete(function(event, XMLHttpRequest) {
    	if (XMLHttpRequest.status === 403) {
			displayNiftyMessage('failure', XMLHttpRequest.responseText, true);
		}
    	else if (XMLHttpRequest.status !== 200) {
			displayNiftyMessage('failure', 'Application failure, contact the developer.', true);
    	}
    });

	// Sort datatables date columns
	$.fn.dataTable.moment( 'Do MMM YYYY' );
	$.fn.dataTable.moment( 'Do MMM YYYY, h:mma' );

	// Data tables (if not already converted)
	doDataTables();

});

function doDataTables() {
	$('table.autoscroll').each(function() {
		if (! $.fn.dataTable.isDataTable( $(this) )) {
			$(this).dataTable({
				"responsive": true,
				"searching": false,
				"bLengthChange" : false,
				"iDisplayLength": 5,
			});
		}
	});
}

/*
 * Block ui with modal
 */
function modalBlock() {
	$.blockUI({
		baseZ: 1100,
		css: {
			border: 'none',
			backgroundColor: 'transparent',
			'border-radius': '10px',
			opacity: 1,
			width: 'auto',
			left: '49%',
		},
		overlayCSS: {
			cursor: 'auto',
			backgroundColor: '#ffffff',
			opacity: 0.6,
		},
		message: '<img id="imgLoaderAnimation" src="/bundles/app/images/ajax-loader.gif" alt="" />',
	});

	// Fix for animation stopping on form submit
	setTimeout(function() {
		var imgAnimation = $('#imgLoaderAnimation');
		imgAnimation.attr('src', imgAnimation.attr('src'));
	}, 100);
}

/*
 * Unblock ui modal
 */
function modalUnblock() {
	$.unblockUI();
}


