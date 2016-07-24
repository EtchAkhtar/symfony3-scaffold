function displayNiftyMessage(alertType, msg, keepOpen) {
	var type, icon, timer;

	if (typeof keepOpen === 'undefined') { keepOpen = false; }
	timer = keepOpen ? false : 4000;

	switch (alertType) {
		case 'success':
			type = 'info';
			icon = 'fa-check';
			break;
		case 'failure':
			type = 'danger';
			icon = 'fa-minus';
			break;
	}

	$.niftyNoty({
		type: type,
		icon : 'fa ' + icon,
		message : msg,
		container : 'floating',
		timer : timer
	});
}

