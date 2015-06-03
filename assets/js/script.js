

$(window).resize(function(){
	
});

$(document).ready(function (){

	var editors=[], savedContent=[];

	$('.button').click(function() {
		if($(this).hasClass('editButton')){
      $('main').removeClass('viewMode').addClass('editMode');
      
      $('select, input, textarea').each(function() {
        if( $(this).attr('data-populate') ) {
          var populate = "#hidden-" + $(this).attr('data-populate');
          $( populate ).val( $(this).val() );
        }
      });
      populateInformations();
      
			$(this).parent().find('.submitButton').show();
			$(this).toggleClass('cancelButton editButton').text('Cancel').parent().find('#description-editor').addClass('editable');
			savedContent = $('.editable').html();
		 	editors.push( new MediumEditor('#field-title', {
        disableReturn: true,
        buttons: [],
				extensions: {
					markdown: new MeMarkdown(function (md) {
						$('#hidden-title').val(md);
					})
				}
			}));
      editors.push( new MediumEditor('#field-description', {
        buttons: ['bold', 'italic', 'anchor', 'quote'],
        buttonLabels: 'fontawesome',
				extensions: {
					markdown: new MeMarkdown(function (md) {
						$('#hidden-description').val(md);
					})
				}
			}));
      
		} else if ($(this).hasClass('cancelButton')){
      $('main').removeClass('editMode').addClass('viewMode');
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
    dataType: 'json',
    done: function (e, data) {
      $.each(data.result.files, function (index, file) {
        $('<p/>').text(file.name).appendTo('#files');
        console.log(file);
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
  
  // CATEGORIE SELECT
  $('#categorie-select').change(function() {
    var categorie = $(this).val();
    $('#informations .fieldsGroup').removeClass('selected');
    $('#informations .fieldsGroup.categorie-'+categorie).addClass('selected');
  });
  
  // POPULATE HIDDEN FIELD
  $('select, input, textarea').change(function() {
    if( $(this).attr('data-populate') ) {
      var populate = "#hidden-" + $(this).attr('data-populate');
      $( populate ).val( $(this).val() );
    }
  });
  $(document).on('change', '#informations .fieldsGroup.selected input', function() {
    populateInformations();
  });
  
  function populateInformations() {
    var fields = {};
    $('#informations .fieldsGroup.selected input').each(function() {
      fields[$(this).attr('data-slug')] = $(this).val() ;
    });
    $( "#hidden-informations" ).val( JSON.stringify(fields) );
  }
	
});
