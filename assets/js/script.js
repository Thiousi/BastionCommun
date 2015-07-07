

$(window).resize(function(){
	
});

$(document).ready(function (){

	var editors=[];
  
  function inputsGroupToField(group, field) {
    var fields = {};
    group.find('.input').each(function(i) {
      fields[$(this).attr("data-slug")] = $(this).val();
    });
    $( field ).val( JSON.stringify(fields) );
  }

	$('.editButton').click(function() {
    
    $('main').removeClass('viewMode').addClass('editMode');
    $(this).parent().find('.submitButton').show();
    $(".inputsGroup .input").attr('readonly', false);
    inputsGroupToField( $('.inputsGroup.active'), "#hidden-" + $('.inputsGroup.active').attr('data-populate') );
    
    $(".inputsGroup .input").on('input', function() {
      var inputsGroup = $(this).parents('.inputsGroup');
      inputsGroupToField( inputsGroup , "#hidden-" + inputsGroup.attr('data-populate') );
    });

    $(".simpleEdit").each(function() {
      var field = $(this);
      editors.push( new MediumEditor( $(this), {
        disableReturn: true,
        buttons: [],
        extensions: {
          markdown: new MeMarkdown(function (md) {
            var fieldToPopulate = field.attr('data-populate');
            $("#hidden-" + fieldToPopulate).val(md);
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
    location.reload(); 
  });
  $('.submitButton').click(function() {
    $('main').removeClass('editMode').addClass('viewMode');
    $(".inputsGroup .input").attr('readonly', true);
    editors.forEach( function(editor){ editor.destroy() });
  });
  
  
  // Passer en mode édition si l'url le demande
  if(window.location.hash.substring(1)=='edit') {
    $('.editButton').click();
    window.location.hash = '';
  }
    
	
  
  $(".dropdown-menu li a").on('click', function(){
    var fieldToPopulate = $(this).parents('.dropdown').attr('data-populate');
    var value = $(this).parent('li').attr('data-value');
    $("#hidden-" + fieldToPopulate).val(value);
    $(this).parents('.dropdown').find(".current").html($(this).text());
  });
  $(".dropdown-menu li.active a").click();

  
  // GALLERY
  var gallery = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    slidesPerView: 1,
    paginationClickable: true,
    spaceBetween: 30,
    loop: true
  });
  
  
  // GEOPICKER
  function updateControls(addressComponents) {
    $('#geopicker-street').val(addressComponents.addressLine1);
    $('#geopicker-city').val(addressComponents.city);
    //$('#us5-state').val(addressComponents.stateOrProvince);
    $('#geopicker-zip').val(addressComponents.postalCode);
    $('#geopicker-country').val(addressComponents.country);
  }
  $('#geopicker').locationpicker({
    location: {latitude: 46.15242437752303, longitude: 2.7470703125},	
    radius: 300,
    enableAutocomplete: true,
    //enableReverseGeocode: false,
    inputBinding: {
        latitudeInput: $('#geopicker-lat'),
        longitudeInput: $('#geopicker-lon'),
        locationNameInput: $('#geopicker-address')
    },
    onchanged: function (currentLocation, radius, isMarkerDropped) {
        var addressComponents = $(this).locationpicker('map').location.addressComponents;
        updateControls(addressComponents);
    },
    oninitialized: function(component) {
        var addressComponents = $(component).locationpicker('map').location.addressComponents;
        updateControls(addressComponents);
    }
  });
  $('#modal-geopicker').on('shown.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var input = button.siblings('.input');
    var location;
    try {
        var data = JSON.parse( input.val() );
        if (data && typeof data === "object" && data !== null) {
          location = data;
        }
    }
    catch (e) { }
    var modal = $(this);
    $('#geopicker').locationpicker('autosize');
    if(typeof location !== "undefined") {
      var mapContext = $('#geopicker').locationpicker('map');
      $('#geopicker').locationpicker('location', { latitude: location.latitude, longitude: location.longitude });
      $('#geopicker-street').val(location.street);
      $('#geopicker-city').val(location.city);
      $('#geopicker-zip').val(location.zip);
      $('#geopicker-country').val(location.country);
    }
    
    $('#confirm-geolocation').off();
    $('#confirm-geolocation').click(function() {
      $('#modal-geopicker').modal('hide');
      button.find('.name').text($('#geopicker-city').val() + ' (' + $('#geopicker-zip').val() + ')');
      input.val( JSON.stringify({ latitude: $('#geopicker-lat').val(), longitude: $('#geopicker-lon').val(), street: $('#geopicker-street').val(), city: $('#geopicker-city').val(), zip: $('#geopicker-zip').val(), country: $('#geopicker-country').val() }) );
    });
  });
  
  
  // AUTOCOMPLETE
  $('.autocomplete').each(function() {
    $(this).autocomplete({
      serviceUrl: '../smart-submit?handler=autocomplete',
      params: { field: $(this).attr('data-slug') }
    });
  });
  
  // IMAGES UPLOAD
  $('#fileupload').fileupload({
    dataType: 'json',
    done: function (e, data) {
      $('#uploader-message').text('Images ajoutés : ');
      $.each(data.result.files, function (index, file) {
        $('<p/>').text(file.name).appendTo('#files').addClass('label label-success');
        console.log(data);
        gallery.prependSlide('<figure class="swiper-slide" data-pageuri="' + $('#slider').data('pageuri') + '" data-filename="' + file.name + '"><div class="swiper-image" style="background-image:url(' + $('#slider').data('pageurl') + '/' + file.name + ')"></div></figure>');
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
  
  // IMAGES DELETE
  $('#swiper-button-delete').click(function() {
    $.post('../smart-submit?handler=delete', 
      {
        file : $('.swiper-slide-active').data('filename'),
        page : $('#slider').data('pageuri')
      },
      function() {
        var i = gallery.activeIndex-1;
        gallery.removeSlide(i);
        gallery.update();
      }
    );

  });
  
  // CATEGORIE SELECT
  $('#categorie-select').change(function() {
    var categorie = $(this).val();
    $('#informations .fieldsGroup').removeClass('selected');
    $('#informations .fieldsGroup.categorie-'+categorie).addClass('selected');
  });
	
	
	/* ANNONCES
	------------------------------------ */
	
	// search fields
	$('.selectpicker').selectpicker();
	


	
});
