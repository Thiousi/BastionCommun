$(function(){

	// honeypot
	smart_submit_honeypot = function() {
		$("#smart-submit-honeypot").attr("value", parseInt($("#smart-submit-honeypot").attr("value")) + 1);
		setTimeout("smart_submit_honeypot()", 1000);
	}
	
	// detect form on page
	if ( $('form#smart-submit').length ) 
	{ 
		// cache
		var form = $('form#smart-submit');

		//create response div
		//form.before('<div id="smart-submit-response"></div>');

		// create honeypot
		form.append('<input type="hidden" name="smart-submit-honeypot" id="smart-submit-honeypot" value="0">');
		
		// start honeypot
		smart_submit_honeypot(); 

		// auto focus
		$('form#smart-submit input[type="text"]:visible:first, form#smart-submit textarea:visible:first').focus();


		// catch form submission
		form.on('submit', function(){

			// clear previous response
			var response = $('#smart-submit-response');
			response.html('');

			// submit
			$.ajax({
				url: $(this).prop('action'),
				data: $(this).serialize(),
				type: 'post',
				dataType: 'json',
				success: function(data) {
					if (data.success)
					{
						//response.html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+data.success+'</div>');
            $('main').addClass('viewMode').removeClass('editMode');
					}
					else if (data.redirect)
					{
						window.location = data.redirect;
					}
					else
					{
						//response.html('<div class="smart-submit-alert smart-submit-alert-error">'+data.error+'</div>');
					}
			  	}
			});
      
			return false;
		});

	}

	


});