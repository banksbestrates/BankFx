$(document).on('ready', function() {
	$('#mortgageAmount, #principalPayment').digits();
	$('#annualInterest').percent();
	setPayoffCalculation();
	// initialization of forms
	$.HSCore.components.HSSlider.init(
		'#yearsRemainingSlider1, #mortgageTermSlider1, #mortgageAmountSlider1, #principalPaymentSlider1, #annualInterestSlider1'
	);
});

$("body").on('DOMSubtreeModified', '#yearsRemainingtest', function() {
	$('#yearsRemaining').val($('#yearsRemainingtest').text());
	setTimeout(function() {
		setPayoffCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#mortgageTermtest', function() {
	$('#mortgageTerm').val($('#mortgageTermtest').text());
	setTimeout(function() {
		setPayoffCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#mortgageAmounttest', function() {
	$('#mortgageAmount').val($('#mortgageAmounttest').text());
	$('#mortgageAmount').digits();
	setTimeout(function() {
		setPayoffCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#principalPaymenttest', function() {
	$('#principalPayment').val($('#principalPaymenttest').text());
	$('#principalPayment').digits();
	setTimeout(function() {
		setPayoffCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#annualInteresttest', function() {
	$('#annualInterest').val($('#annualInteresttest').text());
	$('#annualInterest').percent();
	setTimeout(function() {
		setPayoffCalculation();
	}, 1000);
});

function setPayoffCalculation() {
	$('.viewAmortizaion').hide();
	var yearsRemaining = stripTags($('#yearsRemaining').val());
	var mortgageTerm = stripTags($('#mortgageTerm').val());
	var mortgageAmount = stripTags($('#mortgageAmount').val());
	var principalPayment = stripTags($('#principalPayment').val());
	var interestRate = stripTags($('#interestRate').val());
	if ((yearsRemaining > 0 && mortgageTerm >= 0) && (mortgageAmount > 0 && principalPayment > 0) && interestRate > 0) {
		var totalPayoff = calcMortgagePayoff(yearsRemaining, mortgageTerm, mortgageAmount, principalPayment, interestRate);
		if (totalPayoff['normal_payment']) {
			var normalPayment = totalPayoff['normal_payment'];
			var acceleratedPayment = totalPayoff['accelerated_payment'];
			var totalScheduledPayment = totalPayoff['total_scheduled_payment'];
			var totalAcceleratedPayment = totalPayoff['total_accelerated_payment'];
			var savings = totalPayoff['savings'];
			var mortgageShortenedBy = totalPayoff['mortgage_shortened_by'];
			var totalExpenses = totalPayoff['total_expenses'];
			var currentPayment = totalPayoff['current_payment'];
			var currentAcceleratedPayment = totalPayoff['current_accelerated_payment'];
			var scheduledPayment = totalPayoff['scheduled_payment'];
			var scheduledAcceleratedPayment = totalPayoff['scheduled_accelerated_payment'];
			
			$('.totalExpenses').text("$" + totalExpenses.toLocaleString());
			$('.currentPayment').text("$" + currentPayment.toLocaleString());
			$('.currentAcceleratedPayment').text("$" + currentAcceleratedPayment.toLocaleString());
			$('.scheduledPayment').text("$" + scheduledPayment.toLocaleString());
			$('.scheduledAcceleratedPayment').text("$" + scheduledAcceleratedPayment.toLocaleString());
			
			$('.originalTerm').text(mortgageTerm);
			$('.remaining').text(yearsRemaining);
			$('.annualInterestRate').text(interestRate + "%");
			$('.additionalPrincipalPayment').text("$" + principalPayment.toLocaleString());
			
			$('.normalPayment').text("$" + normalPayment.toLocaleString());
			$('.acceleratedPayment').text("$" + acceleratedPayment.toLocaleString());
			$('.totalScheduledPayment').text("$" + totalScheduledPayment.toLocaleString());
			$('.totalAcceleratedPayment').text("$" + totalAcceleratedPayment.toLocaleString());
			$('.savings').text("$" + savings.toLocaleString());
			$('.mortgageShortenedBy').text(mortgageShortenedBy.toLocaleString());
		}
	}
}

function calcMortgagePayoff(yearsRemaining, mortgageTerm, mortgageAmount, principalPayment, interestRate) {
	var value = [];
	var monthsRemaining = yearsRemaining * 12;
	var mortgageMonthlyTerm = mortgageTerm * 12;
	var paymentsMade = mortgageMonthlyTerm - monthsRemaining;
	var interestRateMonthly = (interestRate / 100) / 12;
	
	// Calculations
	var compoundInterest = Math.pow((1 + interestRateMonthly), (mortgageMonthlyTerm));
	var mortgageMonthlyPaymentCurrent = (compoundInterest * interestRateMonthly) / (compoundInterest - 1) * mortgageAmount;
	var acceleratedMonthlyPayment = mortgageMonthlyPaymentCurrent + principalPayment;
	var totalAmountPaidInYears = mortgageMonthlyPaymentCurrent * mortgageMonthlyTerm;
	
	// - Ammortization
	var ammortization = calcAmmort(mortgageAmount, interestRate, mortgageTerm, mortgageMonthlyPaymentCurrent, principalPayment, paymentsMade);
	$('.ammortizationTable').html('');
	var appendContent = '';
	$.each(ammortization, function(key, value) {
		if (key > 0) {
			appendContent += '<tr>\
			<td>' + value.installment_month + '</td>\
			<td>$' + (value.current_balance > 0 ? value.current_balance.toLocaleString() : 0) + '</td>\
			<td>$' + (value.principal_paid > 0 ? value.principal_paid.toLocaleString() : 0) + '</td>\
			<td>$' + (value.interest_paid > 0 ? value.interest_paid.toLocaleString() : 0) + '</td>\
			<td>$' + (value.remaining_balance > 0 ? value.remaining_balance.toLocaleString() : 0) + '</td>\
			<td>$' + (value.monthly_payment > 0 ? value.monthly_payment.toLocaleString() : 0) + '</td>\
		  </tr>';
		}
	});
	$('.ammortizationTable').append(appendContent);
	$('.viewAmortizaion').show();
	
	var totalAcceleratedPaymentInYears = (ammortization['total_payment'] ? ammortization['total_payment'] : 0);
	var savings = (totalAmountPaidInYears - totalAcceleratedPaymentInYears) + principalPayment;
	if(savings < 0){
		savings = -(savings);
	}
	
	var shortenedMonths = savings / mortgageMonthlyPaymentCurrent;
	shortenedMonths = Math.ceil(shortenedMonths);
	var shortenedYears = shortenedMonths / 12;
	shortenedYears = (shortenedYears > 0 ? Math.floor(shortenedYears) : 0);
	
	// CALCULATION
	value['normal_payment'] = mortgageMonthlyPaymentCurrent;
	value['accelerated_payment'] = acceleratedMonthlyPayment;
	value['total_scheduled_payment'] = totalAmountPaidInYears;
	value['total_accelerated_payment'] = totalAcceleratedPaymentInYears;
	value['savings'] = savings;
	value['mortgage_shortened_by'] = shortenedYears + " years and " + shortenedMonths + " months";
	value['total_expenses'] = savings;
	value['current_payment'] = mortgageMonthlyPaymentCurrent;
	value['current_accelerated_payment'] = acceleratedMonthlyPayment;
	value['scheduled_payment'] = totalAmountPaidInYears;
	value['scheduled_accelerated_payment'] = totalAcceleratedPaymentInYears;
	return value;
}

function calcAmmort(principalAmount, interestRate, paymentYears, monthlyInstallment, principalPayment, paymentsMade) {
	var value = [];
	var interestWithPrincipalArr = [];
	var scheduledInterestArr = [];
	var balWithAdditionalPrincipalArr = [];
	var scheduledPrincipalBalArr = [];
	var paymentMonths = paymentYears * 12;
	var totalInterest = 0;
	var totalPrincipal = 0;
	var totalPayment = 0;
	var interestRateMonthly = (interestRate / 100) / 12;
	
	var interestMonthly = calcAmountPayable(principalAmount, interestRateMonthly);
	var principalPaidPerMonth = monthlyInstallment - interestMonthly;
	var principalRemaining = principalAmount - principalPaidPerMonth;
	var paidInstallment = principalPaidPerMonth + interestMonthly;
	
	scheduledPrincipalBalArr.push(Math.round(totalPrincipal));
	scheduledInterestArr.push(Math.round(principalRemaining));
	interestWithPrincipalArr.push(Math.round(principalRemaining));
	balWithAdditionalPrincipalArr.push(Math.round(totalPrincipal));
	value[1] = {
		'installment_month': 1,
		'interest_paid': interestMonthly.toFixed(2),
		'principal_paid': principalPaidPerMonth.toFixed(2),
		'current_balance': principalAmount.toFixed(2),
		'remaining_balance': principalRemaining.toFixed(2),
		'monthly_payment': paidInstallment.toFixed(2)
	};
	totalInterest += interestMonthly;
	totalPrincipal += totalPrincipal;
	totalPayment += paidInstallment;

	for (i = 1; i < paymentMonths; i++) {
		var extra = 0;
		if(i > paymentsMade){
			extra = principalPayment;
		}
		interestMonthly = calcAmountPayable(principalRemaining, interestRateMonthly);
		principalPaidPerMonth = monthlyInstallment - interestMonthly;
		var principalCurrent = principalRemaining;
		principalRemaining = principalCurrent - principalPaidPerMonth;
		paidInstallment = principalPaidPerMonth + interestMonthly + extra;
		
		scheduledPrincipalBalArr.push(Math.round(totalPrincipal));
		scheduledInterestArr.push(Math.round(principalRemaining));
		interestWithPrincipalArr.push(Math.round(principalRemaining + extra));
		balWithAdditionalPrincipalArr.push(Math.round(totalPrincipal + extra));
		value[i + 1] = {
			'installment_month': (i + 1),
			'interest_paid': interestMonthly.toFixed(2),
			'principal_paid': principalPaidPerMonth.toFixed(2),
			'current_balance': principalCurrent.toFixed(2),
			'remaining_balance': principalRemaining.toFixed(2),
			'monthly_payment': paidInstallment.toFixed(2)
		};
		totalInterest += interestMonthly;
		totalPrincipal += principalPaidPerMonth;
		totalPayment += paidInstallment;
	}
	value['total_interest'] = totalInterest;
	value['total_principal'] = totalPrincipal;
	value['total_payment'] = totalPayment;
	
	showSplineChart(scheduledPrincipalBalArr, scheduledInterestArr, interestWithPrincipalArr, balWithAdditionalPrincipalArr);
	return value;
}

function calcAmountPayable(principalAmount, interestRateMonthly) {
	var interestPerMonth = principalAmount * interestRateMonthly;
	return interestPerMonth;
}

// - Highcharts
function showSplineChart(scheduledPrincipalBalArr, scheduledInterestArr, interestWithPrincipalArr, balWithAdditionalPrincipalArr) {
	Highcharts.chart('splineChart', {
		title: {
			text: ''
		},
		legend: {
			layout: 'vertical',
			align: 'center',
			verticalAlign: 'top',
			x: 0,
			y: 0
		},
		exporting: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		plotOptions: {
			series: {
				label: {
					connectorAllowed: false
				},
				pointStart: 2020
			}
		},
		series: [{
			name: 'Scheduled principal balance',
			color: '#72c02c',
			data: scheduledPrincipalBalArr
		}, {
			name: 'Scheduled interest paid',
			color: '#3398dc',
			data: scheduledInterestArr
		}, {
			name: 'Interest with additional payments',
			color: '#ebc71d',
			data: interestWithPrincipalArr
		}, {
			name: 'Balance with additional principal paid',
			color: '#FF8C00',
			data: balWithAdditionalPrincipalArr
		}],
		responsive: {
			rules: [{
				condition: {
					maxWidth: 500
				},
				chartOptions: {
					legend: {
						layout: 'horizontal',
						align: 'center',
						verticalAlign: 'bottom'
					}
				}
			}]
		}
	});
}