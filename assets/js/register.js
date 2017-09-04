$(document).ready(function() {
	// body...
	/*$('.first a').on('click', function() {
		// body...
		$('.first').css('display', 'none');
		$('.second').css('display', 'block');
	})

	$('.second a').on('click', function() {
		// body...
		$('.first').css('display', 'block');
		$('.second').css('display', 'none');
	})*/

	// OR

	$(".first a").click(function() {
		$(".first").slideUp("slow", function() {
			$(".second").slideDown("slow");
		});
	});

	$(".second a").click(function() {
		$(".second").slideUp("slow", function() {
			$(".first").slideDown("slow");
		});
	});

})