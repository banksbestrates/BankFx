$(document).on('ready', function() {
	$('#wages, #alimonyReceived, #investmentDivident, #other, #downPayment, #yearlyTaxes, #yearlyInsurance, #carPayment, #creditCardPayment, #alimonyPaid, #otherDebts').digits();
	$('#interestRate').percent();
	setMortgageIncomeCalculation();
	// initialization of forms
	$.HSCore.components.HSSlider.init(
		'#wagesSlider1, #alimonyReceivedSlider1, #investmentDividentSlider1, #otherSlider1, #downPaymentSlider1, #yearlyTaxesSlider1, #loanTermSlider1, #yearlyInsuranceSlider1, #carPaymentSlider1, #creditCardPaymentSlider1, #alimonyPaidSlider1, #otherDebtsSlider1'
	);
});

$("body").on('DOMSubtreeModified', '#wagestest', function() {
	$('#wages').val($('#wagestest').text());
	$('#wages').digits();
	setTimeout(function() {
		setMortgageIncomeCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#alimonyReceivedtest', function() {
	$('#alimonyReceived').val($('#alimonyReceivedtest').text());
	$('#alimonyReceived').percent();
	setTimeout(function() {
		setMortgageIncomeCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#investmentDividenttest', function() {
	$('#investmentDivident').val($('#investmentDividenttest').text());
	$('#investmentDivident').digits();
	setTimeout(function() {
		setMortgageIncomeCalculation();
	}, 1000);
});

$("body").on('DOMSubtreeModified', '#othertest', function() {
	$('#other').val($('#othertest').text());
	$('#other').digits();
});
$("body").on('DOMSubtreeModified', '#downPaymenttest', function() {
	$('#downPayment').val($('#downPaymenttest').text());
	$('#downPayment').digits();
});
$("body").on('DOMSubtreeModified', '#yearlyTaxestest', function() {
	$('#yearlyTaxes').val($('#yearlyTaxestest').text());
	$('#yearlyTaxes').digits();
});
$("body").on('DOMSubtreeModified', '#loanTermtest', function() {
	$('#loanTerm').val($('#loanTermtest').text());
	$('#loanTerm').digits();
});
$("body").on('DOMSubtreeModified', '#yearlyInsurancetest', function() {
	$('#yearlyInsurance').val($('#yearlyInsurancetest').text());
	$('#yearlyInsurance').digits();
});
$("body").on('DOMSubtreeModified', '#carPaymenttest', function() {
	$('#carPayment').val($('#carPaymenttest').text());
	$('#carPayment').digits();
});
$("body").on('DOMSubtreeModified', '#creditCardPaymenttest', function() {
	$('#creditCardPayment').val($('#creditCardPaymenttest').text());
	$('#creditCardPayment').digits();
});
$("body").on('DOMSubtreeModified', '#alimonyPaidtest', function() {
	$('#alimonyPaid').val($('#alimonyPaidtest').text());
	$('#alimonyPaid').digits();
});
$("body").on('DOMSubtreeModified', '#otherDebtstest', function() {
	$('#otherDebts').val($('#otherDebtstest').text());
	$('#otherDebts').digits();
});

function setMortgageIncomeCalculation() {
	var wages = stripTags($('#wages').val());
	var alimonyReceived = stripTags($('#alimonyReceived').val());
	var investmentDivident = stripTags($('#investmentDivident').val());
	var other = stripTags($('#other').val());
	var downPayment = stripTags($('#downPayment').val());
	var loanTerm = stripTags($('#loanTerm').val());
	var yearlyTaxes = stripTags($('#yearlyTaxes').val());
	var yearlyInsurance = stripTags($('#yearlyInsurance').val());
	var interestRate = stripTags($('#interestRate').val());
	var carPayment = stripTags($('#carPayment').val());
	var creditCardPayment = stripTags($('#creditCardPayment').val());
	var alimonyPaid = stripTags($('#alimonyPaid').val());
	var otherDebts = stripTags($('#otherDebts').val());
	if (loanTerm > 0 && interestRate > 0) {
		var totalIncome = calcMortgageIncome(wages, alimonyReceived, investmentDivident, other, downPayment, loanTerm, yearlyTaxes, yearlyInsurance, interestRate, carPayment, creditCardPayment, alimonyPaid, otherDebts);
		if (totalIncome['available_mortgage_payment'] || totalIncome['affordable_home_amount']) {
			$('.totalMonthlyIncome').text("$" + totalIncome['total_monthly_income'].toLocaleString());
			$('.totalMonthlyExpenses').text("$" + totalIncome['total_monthly_expenses'].toLocaleString());
			$('.availableMortgagePayment').text("$" + totalIncome['available_mortgage_payment'].toLocaleString());
			$('.affordableHomeAmount').text("$" + totalIncome['affordable_home_amount'].toLocaleString());
		}
	}
}

function calcMortgageIncome(wages, alimonyReceived, investmentDivident, other, downPayment, loanTerm, yearlyTaxes, yearlyInsurance, interestRate, carPayment, creditCardPayment, alimonyPaid, otherDebts) {
	var value = [];
	var interestRateMonthly = (interestRate / 100) / 12;
	var mortgageMonthlyTerm = loanTerm * 12;
	// CALCULATION
	var monthlyIncome = wages + alimonyReceived + investmentDivident + other;
	var yearlyExpenses = yearlyTaxes + yearlyInsurance;
	var expensesPerMonth = yearlyExpenses / 12;
	var monthlyExpenses = expensesPerMonth + carPayment + creditCardPayment + alimonyPaid + otherDebts;
	
	var annualIncome = monthlyIncome * 12;
	var annualPayment = annualIncome * 0.28;
	var monthlyPayment = monthlyIncome * 0.28;
	var monthlyLoanPayment = monthlyPayment - monthlyExpenses;
	var yearlyPayment = monthlyLoanPayment * 12;
	
	var totalPrincipalAndInterest = (yearlyPayment * loanTerm) - downPayment;
	var annualInterestRate = (interestRate / 100) * 12;
	var totalPrincipal = totalPrincipalAndInterest * annualInterestRate;
	var totalInterest = totalPrincipalAndInterest - totalPrincipal;
	
	//var compoundInterest = Math.pow((1 + interestRateMonthly), (mortgageMonthlyTerm));
	//var mortgageMonthlyPaymentCurrent = (compoundInterest * interestRateMonthly) / (compoundInterest - 1) * mortgageAmount;
	
	value['total_monthly_income'] = monthlyIncome.toFixed(2);
	value['total_monthly_expenses'] = monthlyExpenses.toFixed(2);
	value['available_mortgage_payment'] = monthlyLoanPayment.toFixed(2);
	value['affordable_home_amount'] = totalPrincipalAndInterest.toFixed(2);
	return value;
}