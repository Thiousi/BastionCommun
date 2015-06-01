

$(window).resize(function(){
	
});

$(document).ready(function (){

	var editors=[], savedContent=[];

	$('.button').click(function() {
		if($(this).hasClass('editButton')){
			$(this).parent().find('.submitButton').show();
			$(this).toggleClass('cancelButton editButton').text('Cancel').parent().find('#description-editor').addClass('editable');
			savedContent = $('.editable').html();
		 	editors.push( new MediumEditor('.editable.standardEdit', {
        buttons: ['bold', 'italic', 'anchor', 'quote'],
        buttonLabels: 'fontawesome',
				extensions: {
					markdown: new MeMarkdown(function (md) {
						$('#description-markdown').val(md);
					})
				}
			}));
      editors.push( new MediumEditor('.editable.minimalEdit', {
        disableReturn: true,
        buttons: [''],
				extensions: {
					markdown: new MeMarkdown(function (md) {
						$('#description-markdown').val(md);
					})
				}
			}));
		} else if ($(this).hasClass('cancelButton')){
			//editors.forEach( function(editor){ editor.destroy() });
			//$('.editable').html(savedContent);		
			//$(this).parent().find('.submitButton').hide();
			//$(this).toggleClass('cancelButton editButton').text('Edit').parent().find('#description-editor').removeClass('editable');
		}
	});



	// LOGIN
	$('#login').click(function() {
		$('#login-panel').toggleClass('shown');
	});
	$('.panelButton').click(function() {
		$(this).next('.panel').toggleClass('shown');
	});
  
  // GALLERY
  var galleryTop = new Swiper('.gallery-top', {
      nextButton: '.swiper-button-next',
      prevButton: '.swiper-button-prev',
      spaceBetween: 10,
  });
  var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      centeredSlides: true,
      slidesPerView: 'auto',
      touchRatio: 0.2,
      slideToClickedSlide: true
  });
  galleryTop.params.control = galleryThumbs;
  galleryThumbs.params.control = galleryTop;
  
  // IMAGES UPLOAD
   $('#fileupload').fileupload({
        url: '/BastionCommun/images/',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
	
  });
