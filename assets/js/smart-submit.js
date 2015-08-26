$(document).ready(function (){


	// detect form on page
	$('form.smart-submit').each(function() {
		initSmartSubmit($(this));
	});

});

// honeypot
smart_submit_honeypot = function() {
	$(".smart-submit-honeypot").each(function() { 
		$(this).attr("value", parseInt($(this).attr("value")) + 1);
	});
	setTimeout("smart_submit_honeypot()", 1000);
}

// init
initSmartSubmit = function(form) {

	//find response div
	if (form.attr('data-response-div')) {
		var responseDiv = $('#' + form.attr('data-response-div'));
	} else {
		var responseDiv = false;
	}

	// create honeypot
	form.append('<input type="hidden" name="smart-submit-honeypot" class="smart-submit-honeypot" value="0">');

	// start honeypot
	smart_submit_honeypot(); 


	// catch form submission
	form.on('submit', function(e){

		e.preventDefault();

		// clear previous response
		if (responseDiv) responseDiv.html('');

		// submit
		$.ajax({
			url: $(this).prop('action'),
			data: $(this).serialize(),
			type: 'post',
			success: function(data) {
				if(data) {
					if (responseDiv) responseDiv.html(data);
				}
				if (data.success)
				{
					$('main').addClass('viewMode').removeClass('editMode');
				}
				else if (data.redirect)
				{
					window.location = data.redirect;
				}
			}
		});

		return false;
	});
}