$(document).on('ready', function() {
	$('#beginningBalance, #minMonthlyPayment, #maxMonthlyPayment').digits();
	$('#annualPercentage').percent();
	setLifeCalculation();
	// initialization of forms
	$.HSCore.components.HSSlider.init(
		'#beginningBalanceSlider1, #minMonthlyPaymentSlider1, #maxMonthlyPaymentSlider1, #annualPercentageSlider1'
	);
});

$("body").on('DOMSubtreeModified', '#beginningBalancetest', function() {
	$('#beginningBalance').val($('#beginningBalancetest').text());
	$('#beginningBalance').digits();
	setTimeout(function() {
		setLifeCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#minMonthlyPaymenttest', function() {
	$('#minMonthlyPayment').val($('#minMonthlyPaymenttest').text());
	$('#minMonthlyPayment').digits();
	setTimeout(function() {
		setLifeCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#maxMonthlyPaymenttest', function() {
	$('#maxMonthlyPayment').val($('#maxMonthlyPaymenttest').text());
	$('#maxMonthlyPayment').digits();
	setTimeout(function() {
		setLifeCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#annualPercentagetest', function() {
	$('#annualPercentage').val($('#annualPercentagetest').text());
	$('#annualPercentage').percent();
	setTimeout(function() {
		setLifeCalculation();
	}, 1000);
});

function setLifeCalculation() {
	var beginningBalance = stripTags($('#beginningBalance').val());
	var minMonthlyPayment = stripTags($('#minMonthlyPayment').val());
	var maxMonthlyPayment = stripTags($('#maxMonthlyPayment').val());
	var annualPercentage = stripTags($('#annualPercentage').val());
	if ((beginningBalance > 0 && minMonthlyPayment > 0) && (maxMonthlyPayment > 0 && annualPercentage > 0)) {
		var totalInterest = calcSavings(beginningBalance, minMonthlyPayment, maxMonthlyPayment, annualPercentage);
		if (totalInterest['minimum_interest_monthly'] || totalInterest['maximum_interest_monthly']) {
			$('.totalMinInterest').text("$" + totalInterest['minimum_interest_yearly'].toLocaleString());
			$('.monthlyMinInterest').text("$" + totalInterest['minimum_interest_monthly'].toLocaleString());
			$('.totalMaxInterest').text("$" + totalInterest['maximum_interest_yearly'].toLocaleString());
			$('.monthlyMaxInterest').text("$" + totalInterest['maximum_interest_monthly'].toLocaleString());
		}
	}
}

function calcSavings(beginningBalance, minMonthlyPayment, maxMonthlyPayment, annualPercentage) {
	var value = [];
	var minInterestArr = [];
	var maxInterestArr = [];
	var annualPercentageVal = annualPercentage / 100;
	var monthlyPercentageVal = annualPercentageVal / 12;
	var minInterestMonths = beginningBalance / minMonthlyPayment;
	var minInterestYears = minInterestMonths / 12;
	var maxInterestMonths = beginningBalance / maxMonthlyPayment;
	var maxInterestYears = maxInterestMonths / 12;
		
	var yearlyInterest = beginningBalance * ((annualPercentage / 100) / 12);
	minInterestArr.push(yearlyInterest);
	maxInterestArr.push(yearlyInterest);
	var minPrincipalLeft = beginningBalance - minMonthlyPayment + yearlyInterest;
	do{
		yearlyInterest = minPrincipalLeft * ((annualPercentage / 100) / 12);
		minInterestArr.push(yearlyInterest);
		minPrincipalLeft = minPrincipalLeft - minMonthlyPayment + yearlyInterest;
	}
	while(minPrincipalLeft > 0);
	
	var maxPrincipalLeft = beginningBalance - maxMonthlyPayment + yearlyInterest;
	do{
		yearlyInterest = maxPrincipalLeft * ((annualPercentage / 100) / 12);
		maxInterestArr.push(yearlyInterest);
		maxPrincipalLeft = maxPrincipalLeft - maxMonthlyPayment + yearlyInterest;
	}
	while(maxPrincipalLeft > 0);
	
	var totalMinInterest = 0;
	for (var i = 0; i < minInterestArr.length; i++) {
		totalMinInterest += minInterestArr[i] << 0;
	}
	
	var totalMaxInterest = 0;
	for (var i = 0; i < maxInterestArr.length; i++) {
		totalMaxInterest += maxInterestArr[i] << 0;
	}
	var monthlyMinInterest = totalMinInterest / minInterestArr.length;
	var monthlyMaxInterest = totalMaxInterest / maxInterestArr.length;
	
	value['minimum_interest_yearly'] = totalMinInterest;
	value['minimum_interest_monthly'] = monthlyMinInterest;
	value['maximum_interest_yearly'] = totalMaxInterest;
	value['maximum_interest_monthly'] = monthlyMaxInterest;
	return value;
}