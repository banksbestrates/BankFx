$(document).on('ready', function() {
	$('#loanAmount, #grossMonthlyIncome').digits();
	$('#interestRate').percent();
	setLoanCalculation();
	// initialization of forms
	$.HSCore.components.HSSlider.init(
		'#loanAmountSlider1, #loanTermYearsSlider1'
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

function setLoanCalculation() {
	$('.ammortizationSection').hide();
	var loanAmount = stripTags($('#loanAmount').val());
	var loanTermYears = stripTags($('#loanTermYears').val());
	var loanTermMonths = stripTags($('#loanTermMonths').val());
	var interestRate = stripTags($('#interestRate').val());
	
	var extraToMonthlyPayment = stripTags($('#extraToMonthlyPayment').val());
	extraToMonthlyPayment = (extraToMonthlyPayment > 0 ? extraToMonthlyPayment : 0);
	var extraToYearlyPayment = stripTags($('#extraToYearlyPayment').val());
	extraToYearlyPayment = (extraToYearlyPayment > 0 ? extraToYearlyPayment : 0);
	var paymentYearlyOn = stripTags($('#paymentYearlyOn').val());
	var extraOTP = stripTags($('#extraOTP').val());
	extraOTP = (extraOTP > 0 ? extraOTP : 0);
	var extraOTPMonth = stripTags($('#extraOTPMonth').val());
	var extraOTPYears = stripTags($('#extraOTPYears').val());
	if (loanAmount > 0 && (loanTermYears > 0 || loanTermMonths > 0) && (interestRate > 0)) {
		var loanResult = calcPay(loanAmount, loanTermYears, loanTermMonths, interestRate, extraToMonthlyPayment, extraToYearlyPayment, paymentYearlyOn, extraOTP, extraOTPMonth, extraOTPYears);
		if (loanResult['loan_payment']) {
			// - Setting Values
			var loan_payment = loanResult['loan_payment'];
			loan_payment = loan_payment + extraToMonthlyPayment;
			var total_interest = loanResult['total_interest'];
			// - Ammortization
			var ammortization = calcAmmort(loanAmount, interestRate, loanTermYears, loan_payment);
			
			$('.ammortizationTable').html('');
			var appendContent = '';
			$.each(ammortization, function(key, value) {
				if (key > 0) {
					appendContent += '<tr>\
					<td>' + value.installment_year + '</td>\
					<td>$' + value.monthly_payment.toLocaleString() + '</td>\
					<td>$' + value.current_balance.toLocaleString() + '</td>\
					<td>$' + value.principal_paid.toLocaleString() + '</td>\
					<td>$' + value.interest_paid.toLocaleString() + '</td>\
					<td>$' + value.remaining_balance.toLocaleString() + '</td>\
				  </tr>';
				}
			});
			$('.ammortizationTable').append(appendContent);
			$('.ammortizationSection').show();
			
			$('.monthlyPayment').text("$" + loan_payment.toLocaleString());
			$('.totalPrincipalPaid').text("$" + loanAmount.toLocaleString());
			$('.totalInterestPaid').text("$" + total_interest.toLocaleString());
		}
	}
}

function calcPay(loanAmount, loanTermYears, loanTermMonths, interestRate, extraToMonthlyPayment, extraToYearlyPayment, paymentYearlyOn, extraOTP, extraOTPMonth, extraOTPYears) {
	var value = [];
	var monthlyPayments = loanTermYears * 12;
	var interestRatePerMonth = (interestRate / 100) / 12;
	var discountFactor = ((Math.pow((1 + interestRatePerMonth), monthlyPayments)) - 1) / (interestRatePerMonth * Math.pow((1 + interestRatePerMonth), monthlyPayments));
	var loanPayment = loanAmount / discountFactor;
	loanPayment = loanPayment.toFixed(2);
	var totalInterest = (loanPayment * loanTermMonths) - loanAmount;
	value['loan_payment'] = loanPayment;
	value['total_interest'] = Math.round(totalInterest, 2);
	return value;
}

function calcAmmort(loanAmount, interestRate, paymentYears, monthlyInstallment) {
	var value = [];
	var principalAmount = loanAmount;
	var totalInterest = 0;
	var totalPrincipal = 0;
	interestRate = interestRate / 100;
	var interestRateMonthly = interestRate / 12;
	var paymentMonths = paymentYears * 12;
	// Yearly Calculation
	var yearlyInstallment = monthlyInstallment * 12;
	var interestPerMonth = calcAmountPayable(principalAmount, interestRateMonthly);
	var principalPaidPerMonth = monthlyInstallment - interestPerMonth;
	var principalRemaining = principalAmount - principalPaidPerMonth;
	value[1] = {
		'installment_year': 1,
		'monthly_payment': ReplaceNumberWithCommas(monthlyInstallment),
		'interest_paid': ReplaceNumberWithCommas(interestPerMonth.toFixed(2)),
		'principal_paid': ReplaceNumberWithCommas(principalPaidPerMonth.toFixed(2)),
		'current_balance': ReplaceNumberWithCommas(principalAmount.toFixed(2)),
		'remaining_balance': ReplaceNumberWithCommas(principalRemaining.toFixed(2))
	};
	totalInterest += interestPerMonth;
	totalPrincipal += totalPrincipal;

	for (i = 1; i < paymentMonths; i++) {
		interestPerMonth = calcAmountPayable(principalRemaining, interestRateMonthly);
		principalPaidPerMonth = monthlyInstallment - interestPerMonth;
		var principalCurrent = principalRemaining;
		principalRemaining = principalCurrent - principalPaidPerMonth;
		value[i + 1] = {
			'installment_year': (i + 1),
			'monthly_payment': ReplaceNumberWithCommas(monthlyInstallment),
			'interest_paid': ReplaceNumberWithCommas(interestPerMonth.toFixed(2)),
			'principal_paid': ReplaceNumberWithCommas(principalPaidPerMonth.toFixed(2)),
			'current_balance': ReplaceNumberWithCommas(principalCurrent.toFixed(2)),
			'remaining_balance': ReplaceNumberWithCommas(principalRemaining.toFixed(2))
		};
		totalInterest += interestPerMonth;
		totalPrincipal += principalPaidPerMonth;
	}
	return value;
}

function calcAmountPayable(principalAmount, interestRate) {
	var interestPerAnnum = principalAmount * interestRate;
	return interestPerAnnum;
}