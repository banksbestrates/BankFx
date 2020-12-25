$(document).on('ready', function() {
	$('#annualIncome, #cashOnHand, #otherClosingCost').digits();
	$('#interestRate, #propertyTax, #homeInsurance, #loanOrigination').percent();
	setBorrowCalculation();
	// initialization of forms
	$.HSCore.components.HSSlider.init(
		'#annualIncomeSlider1, #interestRateSlider1, #propertyTaxSlider1, #homeInsuranceSlider1, #cashOnHandSlider1, #loanOriginationSlider1, #pointsPaidSlider1, #otherClosingCostSlider1'
	);
});

$("body").on('DOMSubtreeModified', '#annualIncometest', function() {
	$('#annualIncome').val($('#annualIncometest').text());
	$('#annualIncome').digits();
});
$("body").on('DOMSubtreeModified', '#interestRatetest', function() {
	$('#interestRate').val($('#interestRatetest').text());
	$('#interestRate').percent();
});
$("body").on('DOMSubtreeModified', '#propertyTaxtest', function() {
	$('#propertyTax').val($('#propertyTaxtest').text());
	$('#propertyTax').percent();
});
$("body").on('DOMSubtreeModified', '#homeInsurancetest', function() {
	$('#homeInsurance').val($('#homeInsurancetest').text());
	$('#homeInsurance').percent();
});
$("body").on('DOMSubtreeModified', '#cashOnHandtest', function() {
	$('#cashOnHand').val($('#cashOnHandtest').text());
	$('#cashOnHand').digits();
});
$("body").on('DOMSubtreeModified', '#loanOriginationtest', function() {
	$('#loanOrigination').val($('#loanOriginationtest').text());
	$('#loanOrigination').percent();
});
$("body").on('DOMSubtreeModified', '#pointsPaidtest', function() {
	$('#pointsPaid').val($('#pointsPaidtest').text());
});
$("body").on('DOMSubtreeModified', '#otherClosingCosttest', function() {
	$('#otherClosingCost').val($('#otherClosingCosttest').text());
	$('#otherClosingCost').digits();
});

function setBorrowCalculation() {
	var calculateFor = stripTags($('#calculateFor').val());
	var annualIncome = stripTags($('#annualIncome').val());
	var paymentYears = stripTags($('#paymentYears').val());
	var interestRate = stripTags($('#interestRate').val());
	var propertyTax = stripTags($('#propertyTax').val());
	var homeInsurance = stripTags($('#homeInsurance').val());
	var reportAmortization = stripTags($('#reportAmortization').val());
	
	var cashOnHand = Math.round(stripTags($('#cashOnHand').val()));
	var loanOrigination = Math.round(stripTags($('#loanOrigination').val()));
	if(loanOrigination > 5){
		loanOrigination = 5;
		$('#loanOrigination').val(5);
	}
	var pointsPaid = Math.round(stripTags($('#pointsPaid').val()));
	if(pointsPaid > 8){
		pointsPaid = 8;
		$('#pointsPaid').val(8);
	}
	var otherClosingCost = Math.round(stripTags($('#otherClosingCost').val()));
	
	var limitDownpayment = ($('#limitDownpayment').is('checked') ? stripTags($('#limitDownpayment').val()) : 0);
	var monthlyCarPayment = stripTags($('#monthlyCarPayment').val());
	var creditCardPayment = stripTags($('#creditCardPayment').val());
	var otherLoanPayment = stripTags($('#otherLoanPayment').val());
	
	
	if (annualIncome > 0) {
		var paymentInstallments = calcPay(calculateFor, annualIncome, paymentYears, interestRate, propertyTax, homeInsurance, reportAmortization, cashOnHand, loanOrigination, pointsPaid, otherClosingCost, limitDownpayment, monthlyCarPayment, creditCardPayment, otherLoanPayment);
		if (paymentInstallments['total_principal']) {
			var totalPrincipal = paymentInstallments['total_principal'];
			var totalBorrow = totalPrincipal;
			var totalInterest = paymentInstallments['total_interest'];
			var pmi = Math.round(paymentInstallments['pmi']);
			var taxes = Math.round(paymentInstallments['taxes']);
			var insurance = Math.round(paymentInstallments['insurance']);
			var monthlyLoanPayment = Math.round(paymentInstallments['monthly_loan_payment']);
			var totalMonthlyDues = monthlyLoanPayment + pmi + taxes + insurance;
			var yearlyInstallment = monthlyLoanPayment * 12;
			
			// - Setting Values
			$('.totalBorrowAmount').text("$" + totalPrincipal.toLocaleString());
			$('.totalMonthlyPayment').text("$" + totalMonthlyDues.toLocaleString());
			$('.loanAmount').text("$" + totalPrincipal.toLocaleString());
			$('.totalInterest').text("$" + totalInterest.toLocaleString());
			$('.totalPrincipal').text("$" + totalPrincipal.toLocaleString());
			$('.cashOnHand').text("$" + cashOnHand.toLocaleString());
			
			totalPrincipal = Math.round(totalPrincipal);
			var amortValues = calcAmmort(totalPrincipal, interestRate, paymentYears, yearlyInstallment);
			
			// - display pieChart
			showPieChart(monthlyLoanPayment, pmi, taxes, insurance);
			
			var loanOriginationVal = totalBorrow * (loanOrigination / 100);
			var pointsPaidVal = loanOriginationVal + (totalBorrow * (pointsPaidVal / 100));
			
			// - display barChart
			var remainingCash = 0;
			showBarChart(cashOnHand, loanOriginationVal, pointsPaidVal, otherClosingCost, remainingCash);
		}
	}
}

function calcPay(calculateFor, annualIncome, paymentYears, interestRate, propertyTax, homeInsurance, reportAmortization, cashOnHand, loanOrigination, pointsPaid, otherClosingCost, limitDownpayment, monthlyCarPayment, creditCardPayment, otherLoanPayment) {
	var value = [];
	
	annualIncome = (annualIncome > 0 ? annualIncome : 0);
	paymentYears = (paymentYears > 0 ? paymentYears : 0);
	interestRate = (interestRate > 0 ? interestRate : 0);
	propertyTax = (propertyTax > 0 ? propertyTax : 0);
	homeInsurance = (homeInsurance > 0 ? homeInsurance : 0);
	reportAmortization = (reportAmortization > 0 ? reportAmortization : 0);
	cashOnHand = (cashOnHand > 0 ? cashOnHand : 0);
	loanOrigination = (loanOrigination > 0 ? loanOrigination : 0);
	pointsPaid = (pointsPaid > 0 ? pointsPaid : 0);
	otherClosingCost = (otherClosingCost > 0 ? otherClosingCost : 0);
	limitDownpayment = (limitDownpayment > 0 ? limitDownpayment : 0);
	monthlyCarPayment = (monthlyCarPayment > 0 ? monthlyCarPayment : 0);
	creditCardPayment = (creditCardPayment > 0 ? creditCardPayment : 0);
	otherLoanPayment = (otherLoanPayment > 0 ? otherLoanPayment : 0);
	
	var monthlyIncome = annualIncome / 12;
	var annualPayment = annualIncome * 0.28;
	var monthlyPayment = monthlyIncome * 0.28;
	var pmi = monthlyPayment * (6.25 / 100);
	var taxes = monthlyPayment * (12.5 / 100);
	var insurance = monthlyPayment * (6.25 / 100);
	var monthlyLoanPayment = monthlyPayment - (pmi + taxes + insurance);
	var yearlyPayment = monthlyLoanPayment * 12;
	
	var totalPrincipalAndInterest = yearlyPayment * paymentYears;
	var annualInterestRate = (interestRate / 100) * 12;
	var totalPrincipal = totalPrincipalAndInterest * annualInterestRate;
	var totalInterest = totalPrincipalAndInterest - totalPrincipal;
	
	value['total_principal'] = totalPrincipal;
	value['total_interest'] = totalInterest;
	value['pmi'] = pmi;
	value['taxes'] = taxes;
	value['insurance'] = insurance;
	value['monthly_loan_payment'] = monthlyLoanPayment;
	return value;
}

function calcAmmort(totalPrincipal, interestRate, paymentYears, yearlyInstallment) {
	var value = [];
	var principalBalanceArr = [];
	var interestPaidToDateArr = [];
	var principalAmount = 0;
	var totalInterest = 0;
	interestRate = interestRate / 100;
	
	var interestTotal = 0;
	var principalTotal = 0;
	principalBalanceArr.push(totalPrincipal);
	interestPaidToDateArr.push(0);
	
	for (i = 1; i < paymentYears; i++) {
		var tempInterest = totalPrincipal * interestRate;
		var tempPrincipal = yearlyInstallment - tempInterest;
		totalPrincipal = totalPrincipal - tempPrincipal;
		totalPrincipal = Math.round(totalPrincipal);
		interestTotal += tempInterest;
		interestTotal = Math.round(interestTotal);
		principalTotal += tempPrincipal;
		principalBalanceArr.push(totalPrincipal);
		interestPaidToDateArr.push(interestTotal);
	}
			
	// - display splineChart
	showSplineChart(principalBalanceArr, interestPaidToDateArr);
	return value;
}

// - Highcharts
function showSplineChart(principalBalanceArr, interestPaidToDateArr) {
	Highcharts.chart('splineChart', {
		title: {
			text: ''
		},
		xAxis: {
			title: {
				text: 'Years'
			}
		},
		yAxis: {
			title: {
				text: 'Thousands of Dollars'
			}
		},
		legend: {
			layout: 'horizontal',
			align: 'center',
			verticalAlign: 'top',
			x: 0,
			y: 0,
			labelFormatter: function() {
				 var sum = this.yData.reduce(function(pv, cv) { return pv + cv; }, 0);
				 return this.name;   
			}
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
					connectorAllowed: true
				},
				pointStart: 0,
			}
		},
		series: [{
			name: 'Principal balance',
			color: '#72c02c',
			data: principalBalanceArr
		}, {
			name: 'Interest paid to date',
			color: '#3398dc',
			data: interestPaidToDateArr
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
						verticalAlign: 'top'
					}
				}
			}]
		}
	});
}

function showPieChart(monthlyLoanPayment, pmi, taxes, insurance) {
	var colors = Highcharts.getOptions().colors,
		categories = [
			'Principal & Interest',
			'Home Insurance',
			'Property Taxes',
			'PMI'
		],
		data = [{
				color: '#FF8C00',
				drilldown: {
					name: 'Principal & Interest',
					categories: [
						'Principal & Interest'
					],
					data: [
						monthlyLoanPayment
					]
				}
			},
			{
				color: '#3398dc',
				drilldown: {
					name: 'Home Insurance',
					categories: [
						'Home Insurance'
					],
					data: [
						insurance
					]
				}
			},
			{
				color: '#ebc71d',
				drilldown: {
					name: 'Property Taxes',
					categories: [
						'Property Taxes'
					],
					data: [
						taxes
					]
				}
			},
			{
				color: '#72c02c',
				drilldown: {
					name: 'PMI',
					categories: [
						'PMI'
					],
					data: [
						pmi
					]
				}
			},
		],
		versionsData = [],
		i,
		j,
		dataLen = data.length,
		drillDataLen,
		brightness;


	// Build the data arrays
	for (i = 0; i < dataLen; i += 1) {

		// add version data
		drillDataLen = data[i].drilldown.data.length;
		for (j = 0; j < drillDataLen; j += 1) {
			brightness = 0.2 - (j / drillDataLen) / 5;
			versionsData.push({
				name: data[i].drilldown.categories[j],
				y: data[i].drilldown.data[j],
				color: Highcharts.color(data[i].color).brighten(brightness).get()
			});
		}
	}

	// Create the chart
	Highcharts.chart('pieChart', {
		chart: {
			type: 'pie'
		},
		title: {
			text: ''
		},
		legend: {
			align: 'center',
			verticalAlign: 'bottom',
			x: 0,
			y: 0,
			labelFormatter: function() {
				return this.name + '<br><span style="font-size:14px;">$' + this.y + '</span>';
			}
		},
		exporting: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true,
				shadow: false,
				center: ['50%', '50%']
			}
		},
		series: [{
			name: '$',
			data: versionsData,
			size: '80%',
			innerSize: '60%',
			dataLabels: {
				formatter: function() {
					// display only if larger than 1
					return this.y > 1 ? '<b>' + this.point.name + ':</b> ' +
						'$' + this.y : null;
				}
			},
			id: 'versions'
		}],
		responsive: {
			rules: [{
				condition: {
					maxWidth: 250
				}
			}]
		}
	});

}

function showBarChart(cashOnHand, loanOriginationVal, pointsPaidVal, otherClosingCost, remainingCash){
	var colors = Highcharts.getOptions().colors,
		categories = [
			'Down payment',
			'Loan origination',
			'Points paid',
			'Other closing cost',
			'Remaining cash'
		],
		data = [{
				color: '#FF8C00',
				drilldown: {
					name: 'Down payment',
					categories: [
						'Down payment'
					],
					data: [
						cashOnHand
					]
				}
			},
			{
				color: '#3398dc',
				drilldown: {
					name: 'Loan origination',
					categories: [
						'Loan origination'
					],
					data: [
						loanOriginationVal
					]
				}
			},
			{
				color: '#ebc71d',
				drilldown: {
					name: 'Points paid',
					categories: [
						'Points paid'
					],
					data: [
						pointsPaidVal
					]
				}
			},
			{
				color: '#72c02c',
				drilldown: {
					name: 'Other closing cost',
					categories: [
						'Other closing cost'
					],
					data: [
						otherClosingCost
					]
				}
			},
			{
				color: '#A9A9A9',
				drilldown: {
					name: 'Remaining cash',
					categories: [
						'Remaining cash'
					],
					data: [
						remainingCash
					]
				}
			},
		],
		versionsData = [],
		i,
		j,
		dataLen = data.length,
		drillDataLen,
		brightness;


	// Build the data arrays
	for (i = 0; i < dataLen; i += 1) {

		// add version data
		drillDataLen = data[i].drilldown.data.length;
		for (j = 0; j < drillDataLen; j += 1) {
			brightness = 0.2 - (j / drillDataLen) / 5;
			versionsData.push({
				name: data[i].drilldown.categories[j],
				y: data[i].drilldown.data[j],
				color: Highcharts.color(data[i].color).brighten(brightness).get()
			});
		}
	}

	// Create the chart
	Highcharts.chart('barChart', {
		chart: {
			type: 'column'
		},
		title: {
			text: ''
		},
		xAxis: {
			title: {
				text: 'Down payment & closing cost'
			}
		},
		yAxis: {
			title: {
				text: 'Values'
			}
		},
		legend: {
			align: 'center',
			verticalAlign: 'bottom',
			x: 0,
			y: 0,
			labelFormatter: function() {
				return this.name + '<br><span style="font-size:14px;">$' + this.y + '</span>';
			}
		},
		exporting: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true,
				shadow: false,
				center: ['50%', '50%']
			}
		},
		series: [{
			name: '$',
			data: versionsData,
			size: '80%',
			innerSize: '60%',
			dataLabels: {
				formatter: function() {
					// display only if larger than 1
					return this.y > 1 ? '<b>' + this.point.name + ':</b> ' +
						'$' + this.y : null;
				}
			},
			id: 'versions'
		}],
		responsive: {
			rules: [{
				condition: {
					maxWidth: 250
				}
			}]
		}
	});
}