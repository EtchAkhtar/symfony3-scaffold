$(document).ready(function() {

	// For form validation
	faIcon = {
		valid: 'fa fa-check-circle fa-lg text-success',
		invalid: 'fa fa-times-circle fa-lg',
		validating: 'fa fa-refresh'
	};

	validateForm('demo');

});


function validateForm(type) {
	switch (type)
	{
		case 'demo':
			validateForm_demo();
			break;
	}
}


function validateForm_demo() {
	var elForm = $('#form-demo');

	elForm.bootstrapValidator({
		message: 'This value is not valid',
		excluded: [':disabled'],
		feedbackIcons: faIcon,
		fields: {
			"demo_form[name]": {
				container: 'tooltip',
				validators: {
					notEmpty: {
						message: 'Name is required'
					}
				}
			},
			"demo_form[age]": {
				container: 'tooltip',
				validators: {
					notEmpty: {
						message: 'Age is required'
					},
					regexp: {
						regexp: /^[0-9]+$/i,
						message: 'Age must be numeric'
					}
				}
			},
		}
	}).on('status.field.bv', function(e, data) {
		//formValidationTabs(e, data);
	}).on('success.form.bv',function(e) {
        e.preventDefault(); // Stop native form submit event

		$.ajax({
			url: elForm.attr('action'),
			type: 'POST',
			data: elForm.serialize(),
			success: function(json) {
		        bootbox.hideAll(); // Hide modal
		        displayNiftyMessage('success', json.msg);
			}
		});

 	});
}




