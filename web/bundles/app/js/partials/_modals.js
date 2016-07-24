$(document).ready(function() {

	// Demo modal
	$(document).on('click', '#demoModal', function() {

		var path = $(this).attr('href');
		$.getJSON(path, '', function(json) {
			// Show modal
			bootbox.dialog({
				title: "Test App",
				message: json.msg,
				className: "modal-size-medium",
				buttons: {
				}
			});

		});

		return false;
	});

});





