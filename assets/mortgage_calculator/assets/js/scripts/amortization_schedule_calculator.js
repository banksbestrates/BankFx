$(document).on('ready', function() {
	$('#loanAmount, #grossMonthlyIncome').digits();
	$('#interestRateFrom, #interestRateTo').percent();
	setAmortizationCalculation();
	// initialization of forms
	$.HSCore.components.HSSlider.init(
		'#loanAmountSlider1, #rateStepSlider1, #termRangeStepSlider1'
	);
});

$("body").on('DOMSubtreeModified', '#loanAmounttest', function() {
	$('#loanAmount').val($('#loanAmounttest').text());
	$('#loanAmount').digits();
});
$("body").on('DOMSubtreeModified', '#loanTermYearstest', function() {
	$('#loanTermYears').val($('#loanTermYearstest').text());
	$('#loanTermYears').digits();
});

function setAmortizationCalculation() {
	var loanAmount = stripTags($('#loanAmount').val());
	var interestRateFrom = stripTags($('#interestRateFrom').val());
	var interestRateTo = stripTags($('#interestRateTo').val());
	var rateStep = stripTags($('#rateStep').val());
	
	var termRangeFrom = stripTags($('#termRangeFrom').val());
	var termRangeTo = stripTags($('#termRangeTo').val());
	var termRangeStep = stripTags($('#termRangeStep').val());
	if (loanAmount > 0) {
		$('.termMonthsTo').text(termRangeTo + " months");
		$('.termMonthsFrom').text(termRangeFrom + " months");
		$('.termInterestTo').text(interestRateTo + "%");
		$('.termInterestFrom').text(interestRateFrom + "%");
		
		var amortResult = calcPay(loanAmount, interestRateFrom, interestRateTo, rateStep, termRangeFrom, termRangeTo, termRangeStep);
		if (amortResult['payment_term_one']) {
			// - Setting Values
			$('.paymentTermOne').text("$" + amortResult['payment_term_one'].toLocaleString());
			$('.paymentTermTwo').text("$" + amortResult['payment_term_two'].toLocaleString());
			$('.paymentTermThree').text("$" + amortResult['payment_term_three'].toLocaleString());
			$('.paymentTermFour').text("$" + amortResult['payment_term_four'].toLocaleString());
		}
	}
}

function calcPay(loanAmount, interestRateFrom, interestRateTo, rateStep, termRangeFrom, termRangeTo, termRangeStep) {
	interestRateTo = interestRateTo / 100;
	interestRateFrom = interestRateFrom / 100;
	var value = [];
	var amortOne = ((Math.pow((1 + interestRateTo), termRangeTo)) - 1) / (interestRateTo * Math.pow((1 + interestRateTo), termRangeTo));
	amortOne = loanAmount / amortOne;
	var amortTwo = ((Math.pow((1 + interestRateFrom), termRangeTo)) - 1) / (interestRateFrom * Math.pow((1 + interestRateTo), termRangeTo));
	amortTwo = loanAmount / amortTwo;
	var amortThree = ((Math.pow((1 + interestRateTo), termRangeFrom)) - 1) / (interestRateTo * Math.pow((1 + interestRateTo), termRangeFrom));
	amortThree = loanAmount / amortThree;
	var amortFour = ((Math.pow((1 + interestRateFrom), termRangeFrom)) - 1) / (interestRateFrom * Math.pow((1 + interestRateFrom), termRangeFrom));
	amortFour = loanAmount / amortFour;
	value['payment_term_one'] = amortOne.toFixed(2);
	value['payment_term_two'] = amortTwo.toFixed(2);
	value['payment_term_three'] = amortThree.toFixed(2);
	value['payment_term_four'] = amortFour.toFixed(2);
	return value;
}