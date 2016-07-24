$(document).ready(function() {

	$(document).on('click', '#demoDelete', function() {

		bootbox.confirm("Are you sure you want to delete all records?", function(result) {
			if (result) {
				$.ajax({
					url: $(this).attr('href'),
					type: 'DELETE',
					data: null,
					success: function(json) {
				        displayNiftyMessage('success', json.msg);
					}
				});
			}
		});

		return false;
	});

});

function showAddNewForm(formId) {
	$('#' + formId).slideDown('slow');
}



