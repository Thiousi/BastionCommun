

$(window).resize(function(){
	
});

$(document).ready(function (){

	var editors=[];

	$('.editButton').click(function() {
    
    $('main').removeClass('viewMode').addClass('editMode');
    $(this).parent().find('.submitButton').show();

    $(".simpleEdit").each(function() {
      var field = $(this);
      editors.push( new MediumEditor( $(this), {
        disableReturn: true,
        buttons: [],
        extensions: {
          markdown: new MeMarkdown(function (md) {
            var fieldToPopulate = field.attr('data-populate');
            if (fieldToPopulate){ 
              $("#hidden-" + fieldToPopulate).val(md);
            } else {
              var fields = {};
              $('#informations .tab-pane.active .input').each(function(i) {
                fields[$(this).attr("data-slug")] = $(this).html();
              });
              $( "#hidden-informations" ).val( JSON.stringify(fields) );
            }
          })
        }
      }));
    });
    
    $(".fullEdit").each(function() {
      editors.push( new MediumEditor(".fullEdit", {
        buttons: ['bold', 'italic', 'anchor', 'quote'],
        buttonLabels: 'fontawesome',
				extensions: {
					markdown: new MeMarkdown(function (md) {
						$('#hidden-description').val(md);
					})
				}
			}));
    });
  });
      
  $('.cancelButton').click(function() {
    $('main').removeClass('editMode').addClass('viewMode');
    //editors.forEach( function(editor){ editor.destroy() });
    //$('.editable').html(savedContent);		
    //$(this).parent().find('.submitButton').hide();
    //$(this).toggleClass('cancelButton editButton').text('Edit').parent().find('#description-editor').removeClass('editable');
  });
    
	
  
  $(".dropdown-menu li a").on('click', function(){
    var fieldToPopulate = $(this).parents('.dropdown').attr('data-populate');
    var value = $(this).parent('li').attr('data-value');
    $("#hidden-" + fieldToPopulate).val(value);
    console.log(value);
    $(this).parents('.dropdown').find(".current").html($(this).text());
  });
  $(".dropdown-menu li.active a").click();


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
  
	
});
