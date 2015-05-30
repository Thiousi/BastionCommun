

$(window).resize(function(){
	
});

$(document).ready(function (){

	var editor, savedContent;

	$('.button').click(function() {
		if($(this).hasClass('editButton')){
			$(this).parent().find('.submitButton').show();
			$(this).toggleClass('cancelButton editButton').text('Cancel').parent().find('#description-editor').addClass('editable');
			savedContent = $('.editable').html();
		 	editor = new MediumEditor('.editable', {
				extensions: {
					markdown: new MeMarkdown(function (md) {
						$('#description-markdown').val(md);
					})
				}
			});
		} else if ($(this).hasClass('cancelButton')){
			editor.destroy();	
			$('.editable').html(savedContent);		
			$(this).parent().find('.submitButton').hide();
			$(this).toggleClass('cancelButton editButton').text('Edit').parent().find('#description-editor').removeClass('editable');
		}
	});



	// LOGIN
	$('#login').click(function() {
		$('#login-panel').toggleClass('shown');
	});
	$('#button').click(function() {
		$('#panel').toggleClass('shown');
	});
	
});
