(function($){

	// Run code when docuemnt is ready
	$(document).ready(function(){

		$( ".sidenav" ).hide();

		$( "#icon_bar" ).click(function(e) {
			e.preventDefault();
			$( ".sidenav" ).toggle();
			$( "#icon_bar" ).hide();
			$( ".closebtn" ).show();
		});

		$( ".closebtn" ).click(function(e) {
			e.preventDefault();
			$( ".sidenav" ).toggle();
			$( ".closebtn" ).hide();
			$( "#icon_bar" ).show();
		});

		
	});

})(jQuery);