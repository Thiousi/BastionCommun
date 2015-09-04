
$(window).resize(function(){
	
});

$(document).ready(function (){
	
	$.fn.datepicker.dates['fr'] = {
		days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"],
		daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"],
		daysMin: ["D", "L", "Ma", "Me", "J", "V", "S", "D"],
		months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
		monthsShort: ["Jan", "Fev", "Mar", "Avr", "Mai", "Jui", "Jul", "Aou", "Sep", "Oct", "Nov", "Dec"],
		today: "Aujourd'hui",
		weekStart: 1
	};
	
	/* SMARTSUBMIT
	------------------------------------ */
	
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
						if (responseDiv) {
							if (form.attr('data-response-div') == 'annonce') {
								loadAnnonce($('#annonce').attr('data-uri'));
							} else {
								responseDiv.html(data);
							}
						}

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
	
		// detect form on page
	$('form.smart-submit').each(function() {
		initSmartSubmit($(this));
	});
	
	/* HOME
	-------------------------------------------- */

    // To do : Loader ?
	setTimeout(function(){ $('#cover').fadeOut(200) }, 0);

  /*  Annonce
  -------------------------------------------- */
	/* functions */
	function inputsGroupToField(group, field) {
    var fields = {};
    group.find('.input').each(function(i) {
      fields[$(this).attr("data-slug")] = $(this).val();
    });
    $( field ).val( JSON.stringify(fields) );
  }
	
	/* update */
	function annonceUpdate() {
		
		//editors.forEach( function(editor){ editor.destroy() });
		//gallery.destroy()
		var editors=[];
		
		// Mode édition
		if(window.location.hash.substring(1)=='edit') {
			$('.editButton').click();
			window.location.hash = '';
		}
		
		/***** buttons *****/
		
		/* edit */
		$('.editButton').click(function() {
			$('main').removeClass('viewMode').addClass('editMode');
			$(this).parent().find('.submitButton').show();
			$(".inputsGroup .input").attr('readonly', false);
			$("#informations").removeClass('readonly');
			$('#toggle-public').bootstrapToggle('enable');
			inputsGroupToField( $('.inputsGroup.active'), "#hidden-" + $('.inputsGroup.active').attr('data-populate') );
			$("input[type='checkbox']").each(function() {
				$( "#hidden-" + $(this).attr('data-populate') ).val($(this).prop('checked'));
			});

			$(".inputsGroup .input").on('input', function() {
				var inputsGroup = $(this).parents('.inputsGroup');
				inputsGroupToField( inputsGroup , "#hidden-" + inputsGroup.attr('data-populate') );
			});

			$("input[type='checkbox']").change(function() {
				$( "#hidden-" + $(this).attr('data-populate') ).val($(this).prop('checked'));
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
		/* cancel */
		$('.cancelButton').click(function() {
			location.reload(); 
		});
		/* submit */
		$('.submitButton').click(function() {
			//$('main').removeClass('editMode').addClass('viewMode');
			//$(".inputsGroup .input").attr('readonly', true);
			//$("#informations").addClass('readonly');
			//editors.forEach( function(editor){ editor.destroy() });
			
		});
		
		/***** tools *****/
		/* dropdowns */
		$(".dropdown-menu li a").on('click', function(){
			var fieldToPopulate = $(this).parents('.dropdown').attr('data-populate');
			var value = $(this).parent('li').attr('data-value');
			$("#hidden-" + fieldToPopulate).val(value);
			$(this).parents('.dropdown').find(".current").html($(this).text());
		});
		$(".dropdown-menu li.active a").click();
		/* datepicker */
		$('.datepicker').datepicker({ autoclose:true, weekStart:1, language:'fr' })
		/* toggle */
		$('#toggle-public').bootstrapToggle();
	  /* gallery */
		var gallery = new Swiper('.swiper-container', {
			pagination: '.swiper-pagination',
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			slidesPerView: 1,
			paginationClickable: true,
			spaceBetween: 30,
			loop: true
		});
		/* smart-submit */
		initSmartSubmit($('#column-annonce .smart-submit'));
		/* geopicker */
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
				button.find('.name').text($('#geopicker-address').val());
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

		// TOOLTYPE
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})

		// CATEGORIE SELECT
		$('#categorie-select').change(function() {
			var categorie = $(this).val();
			$('#informations .fieldsGroup').removeClass('selected');
			$('#informations .fieldsGroup.categorie-'+categorie).addClass('selected');
		});
		
		$('.column').perfectScrollbar('update');
		
	}
	annonceUpdate();

	/* ANNONCES
	------------------------------------ */
	
	function loadAnnonce(uri) {
		$('#megabloc-wrapper').animate({ scrollLeft : $(window).width() * 0.5 }, 300 );
		$('#column-annonce').html('');
		$.ajax({
				url: BASTION.smartSubmitUrl + "?handler=view",
				data: { uri : uri },
				type: 'post',
				success: function(data) {
					if(data) {
						$('#column-annonce').html(data);
						annonceUpdate();
					}
				}
			});
	}
	
	// search fields
	$('.selectpicker').selectpicker();
	
	$("#form-annonces select").change(function() { $(this.form).find('input[type="submit"]').click() });
	
	$(document).on('click', '#liste-annonces a.link-annonce', function(e){
		e.preventDefault();
		loadAnnonce($(e.target).attr('data-uri'));
		
	});
	
	/* SLIDE
	------------------------------------ */
	$( "#megabloc-wrapper" ).scrollLeft(1);
	$( "#megabloc-wrapper" ).on("scroll", function() {
  	if ( parseInt($("#megabloc-wrapper").scrollLeft()) > $(window).width() * 0.25 ) {
			$("#arrow-slide-right").hide();
			$("#arrow-slide-left").show();
		} else {
			$("#arrow-slide-right").show();
			$("#arrow-slide-left").hide();
		}
	}, 50);
	$("#arrow-slide-right").click(function() {
		$( "#megabloc-wrapper" ).animate({ scrollLeft : $(window).width() * 0.5 }, 300 );
	});
	$("#arrow-slide-left").click(function() {
		$( "#megabloc-wrapper" ).animate({ scrollLeft : 0 }, 300 );
	});
	
	$('.column').perfectScrollbar();

});


/*!
 * jquery.unevent.js 0.2
 * https://github.com/yckart/jquery.unevent.js
 *
 * Copyright (c) 2013 Yannick Albert (http://yckart.com)
 * Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php).
 * 2013/07/26
**/
;(function ($) {
    var on = $.fn.on, timer;
    $.fn.on = function () {
        var args = Array.apply(null, arguments);
        var last = args[args.length - 1];

        if (isNaN(last) || (last === 1 && args.pop())) return on.apply(this, args);

        var delay = args.pop();
        var fn = args.pop();

        args.push(function () {
            var self = this, params = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                fn.apply(self, params);
            }, delay);
        });

        return on.apply(this, args);
    };
}(this.jQuery || this.Zepto));
