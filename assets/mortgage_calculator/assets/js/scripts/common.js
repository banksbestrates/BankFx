$(document).on('ready', function() {
	// initialization of carousel
	$.HSCore.components.HSCarousel.init('.js-carousel');

	// initialization of tabs
	$.HSCore.components.HSTabs.init('[role="tablist"]');

	// initialization of rating
	$.HSCore.components.HSRating.init($('.js-rating'), {
		spacing: 4
	});

	// initialization of counters
	var counters = $.HSCore.components.HSCounter.init('[class*="js-counter"]');

	// initialization of go to
	$.HSCore.components.HSGoTo.init('.js-go-to');

});

$(window).on('load', function() {
	// initialization of header
	$.HSCore.components.HSHeader.init($('#js-header'));
	$.HSCore.helpers.HSHamburgers.init('.hamburger');

	// initialization of HSMegaMenu component
	$('.js-mega-menu').HSMegaMenu({
		event: 'hover',
		pageContainer: $('.container'),
		breakpoint: 991
	});

	// initialization of horizontal progress bars
	setTimeout(function() { // important in this case
		var horizontalProgressBars = $.HSCore.components.HSProgressBar.init('.js-hr-progress-bar', {
			direction: 'horizontal',
			indicatorSelector: '.js-hr-progress-bar-indicator'
		});
	}, 1);
});

$(window).on('resize', function() {
	setTimeout(function() {
		$.HSCore.components.HSTabs.init('[role="tablist"]');
	}, 200);
});

$.fn.digits = function() {
	return this.each(function() {
		$(this).val($(this).val().replace("$", ""));
		$(this).val($(this).val().replace(",", ""));
		$(this).val("$" + $(this).val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
	})
}

$.fn.percent = function() {
	return this.each(function() {
		$(this).val($(this).val().replace("%", ""));
		$(this).val($(this).val() + "%");
	})
}

function stripTags(input) {
	input = input.replace('$', '');
	input = input.replace(',', '');
	input = input.replace('%', '');
	input = input.replace(/,/g,"");
	return parseFloat(input);
}

function ReplaceNumberWithCommas(number) {
	//Seperates the components of the number
	var n = number.toString().split(".");
	//Comma-fies the first part
	n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	//Combines the two sections
	return n.join(".");
}
