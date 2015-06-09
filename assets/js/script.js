

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
  
  
  
  // POPOVER
  $('[data-toggle="popover"]').popover({
    html : true, 
    content: function() {
      console.log($(this).siblings('.popContent').html());
      return $(this).siblings('.popContent').html();
    }
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
    var city = button.data('city') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('#geopicker-address').val(city);
    $('#geopicker').locationpicker('autosize');
    var mapContext = $('#geopicker').locationpicker('map');
    //$('#geopicker').locationpicker('location', {latitude: 36.15242437752303, longitude: 2.7470703125});
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
