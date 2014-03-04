jQuery(document).ready(function($) {
	
	$('.toggle-target').on( 'tap click', function(e) {
		$( $(this).attr('href') ).slideToggle('fast').toggleClass('expanded');
		$(this).toggleClass('expanded');
		
		e.preventDefault();
	}).each(function() {
		$( $(this).attr('href') ).hide();
	});

	$('.scroll-to').on( 'tap click', function() {
		var id = $(this).attr('href');

		$('html, body').animate({
			scrollTop: $( id ).offset().top - 50
		}, 500);

		return false;
	});
	
	// scroll body to 0px on click
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scroll-to-top').fadeIn();
		} else {
			$('.scroll-to-top').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.scroll-to-top').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});

});
