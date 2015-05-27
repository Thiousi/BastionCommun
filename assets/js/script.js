

$(window).resize(function(){
	
});

$(document).ready(function (){

	// ARBRE MENU
	$('ul.menu ul:first-of-type').find('span.space').each(function(){
		var reverted = $(this).parent().children('span.space').length-($(this).index())
		if ($(this).parents('li').eq(reverted).is(':not(:last-child)')){
			$(this).addClass('bar');
		}
	});
	
	// RANGER L'ARBRE
	var moveFrom, moveTo;
	$( ".element" ).mousedown(function(e) {
		e.preventDefault();
		moveFrom = $(this).attr('data-dir');
		
		var $this = $(this);
		setTimeout(function() {
			$this.addClass('moving-element');
		}, 250);
		
	});
	$( ".element" ).mouseup(function(e) {
		e.preventDefault();
		
		$(this).removeClass('moving-element');
		
		directoryName = "/"+moveFrom.substring(moveFrom.lastIndexOf('/') + 1);
		moveTo = $(this).attr('data-dir') + directoryName;
		window.location.replace('?from='+moveFrom+'&to='+moveTo);
	});
	
	$(document).on('mousemove', function(e){
		$('.moving-element').css({
		 left:  e.pageX,
		 top:   e.pageY
		});
	});
	



	// LOGIN
	$('#login').click(function() {
		$('#login-panel').toggleClass('shown');
	});
	
});
