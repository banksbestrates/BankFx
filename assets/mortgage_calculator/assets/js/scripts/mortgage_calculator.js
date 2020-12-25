$(document).on('ready', function() {
	$('#purchaseAmount, #downPayment_amount, #annualPropertyTax, #annualHomeInsurance, #monthlyHOADues').digits();
	setCalculation();
	// initialization of forms
	$.HSCore.components.HSSlider.init(
		'#purchaseAmountSlider1, #interestRateSlider1, #annualTaxSlider1, #annualInsuranceSlider1, #monthlyDuesSlider1, #mortgageSlider, #homeInsuranceSlider, #taxesSlider'
	);
});

$("body").on('DOMSubtreeModified', '#purchaseAmounttest', function() {
	$('#purchaseAmount').val($('#purchaseAmounttest').text());
	$('#purchaseAmount').digits();
	setTimeout(function() {
		setCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#interestRatetest', function() {
	$('#interestRate').val($('#interestRatetest').text());
	setTimeout(function() {
		setCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#annualTaxtest', function() {
	$('#annualPropertyTax').val($('#annualTaxtest').text());
	$('#annualPropertyTax').digits();
	setTimeout(function() {
		setCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#annualInsurancetest', function() {
	$('#annualHomeInsurance').val($('#annualInsurancetest').text());
	$('#annualHomeInsurance').digits();
	setTimeout(function() {
		setCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#monthlyDuestest', function() {
	$('#monthlyHOADues').val($('#monthlyDuestest').text());
	$('#monthlyHOADues').digits();
	setTimeout(function() {
		setCalculation();
	}, 1000);
});

function getDownpayment(value, type) {
	var totalAmount = stripTags($('#purchaseAmount').val());
	if (totalAmount > 0) {
		if (type == 'amount' && value > 0) {
			var percentage = (value / totalAmount) * 100;
			$('#downPayment_percentage').val(percentage);
		} else if (type == 'percentage' && value > 0) {
			var amount = (value / 100) * totalAmount;
			$('#downPayment_amount').val(amount);
			$('#downPayment_amount').digits();
		}
	} else {
		$('#downPayment_percentage').val(0);
		$('#downPayment_amount').val(0);
	}
}

function setCalculation() {
	var loanAmount = stripTags($('#purchaseAmount').val());
	var downPayment = stripTags($('#downPayment_amount').val());
	var interestRate = $('#interestRate').val();
	var paymentYears = $('#paymentYears').val();
	var annualPropertyTax = stripTags($('#annualPropertyTax').val());
	var monthlyHOADues = stripTags($('#monthlyHOADues').val());
	var annualHomeInsurance = stripTags($('#annualHomeInsurance').val());
	if ((loanAmount > 0 && downPayment > 0) && (interestRate > 0 && paymentYears > 0)) {
		var paymentInstallments = calcPay(loanAmount, paymentYears, interestRate, downPayment, annualPropertyTax, monthlyHOADues, annualHomeInsurance);
		if (paymentInstallments['principal_and_interest']) {
			var monthlyInstallment = paymentInstallments['principal_and_interest'];
			var homeOwnerInsurance = paymentInstallments['insurance'];
			var pmiInsurance = 250;
			var homeInsurance = homeOwnerInsurance + pmiInsurance;
			var hoaFees = paymentInstallments['HOA_fees'];
			var propertyTaxes = paymentInstallments['property_taxes'];
			var taxFees = hoaFees + propertyTaxes;
			// - Setting Values
			$('.mortgage_payment').text('$' + monthlyInstallment.toLocaleString());
			$('.home_insurance').text('$' + homeInsurance.toLocaleString());
			$('.homeowner_insurance').text('$' + homeOwnerInsurance.toLocaleString());
			$('.pmi_insurance').text('$' + pmiInsurance.toLocaleString());
			$('.tax_fees').text('$' + taxFees.toLocaleString());
			$('.property_tax').text('$' + propertyTaxes.toLocaleString());
			$('.hoa_tax').text('$' + hoaFees.toLocaleString());

			// - display donutChart
			showDonutChart(monthlyInstallment, homeInsurance, taxFees);

			// - Range Slider
			/* Mortgage Slider */
			let mortgage_slider = $("#mortgageSlider");
			$(function() {
				mortgage_slider.slider({
					value: monthlyInstallment,
					// setup the rest ...
				});
				$('#mortgagePayment2').text(monthlyInstallment.toLocaleString());
			});
			/* Home Insurance */
			let homeIns_slider = $("#homeInsuranceSlider");
			$(function() {
				homeIns_slider.slider({
					value: homeInsurance,
					// setup the rest ...
				});
				$('#homeInsurance2').text(homeInsurance.toLocaleString());
			});
			/* Taxes & Fees */
			let taxes_slider = $("#taxesSlider");
			$(function() {
				taxes_slider.slider({
					value: taxFees,
					// setup the rest ...
				});
				$('#taxes2').text(taxFees.toLocaleString());
			});

			// - Ammortization
			var ammortization = calcAmmort(loanAmount, downPayment, interestRate, paymentYears, monthlyInstallment);
			$('.ammortizationTable').html('');
			var appendContent = '';
			$.each(ammortization, function(key, value) {
				if (key > 0) {
					appendContent += '<tr>\
					<td>' + value.installment_year + '</td>\
					<td>$' + value.current_balance.toLocaleString() + '</td>\
					<td>$' + value.principal_paid.toLocaleString() + '</td>\
					<td>$' + value.interest_paid.toLocaleString() + '</td>\
					<td>$' + value.remaining_balance.toLocaleString() + '</td>\
				  </tr>';
				}
			});
			$('.ammortizationTable').append(appendContent);
		}
	}
}

function calcPay(loanAmount, paymentYears, interestRate, downPayment, annualPropertyTax, monthlyHOADues, annualHomeInsurance) {
	var value = [];
	var monthlyInstallment = 0;
	var monthlyHomeInsurance = 0;
	var principalAmount = loanAmount - downPayment;
	var interestRate = interestRate / 100;
	var interestPerMonth = interestRate / 12;
	var paymentTerms = paymentYears * 12;
	monthlyInstallment = (principalAmount * interestPerMonth * (Math.pow((1.0 + interestPerMonth), paymentTerms))) / ((Math.pow((1.0 + interestPerMonth), paymentTerms)) - 1.0);
	monthlyInstallment = Math.round(monthlyInstallment, 2);
	value['principal_and_interest'] = monthlyInstallment;
	if (annualPropertyTax > 0) {
		monthlyPropertyTax = annualPropertyTax / 12;
		value['property_taxes'] = Math.round(monthlyPropertyTax, 2);
	}
	var monthlyHOADues = (monthlyHOADues > 0 ? monthlyHOADues : 0);
	value['HOA_fees'] = parseInt(monthlyHOADues);
	if (annualHomeInsurance > 0) {
		monthlyHomeInsurance = annualHomeInsurance / 12;
		value['insurance'] = Math.round(monthlyHomeInsurance, 2);
	}
	var totalPayment = parseFloat(monthlyInstallment) + parseFloat(monthlyPropertyTax) + parseFloat(monthlyHOADues) + parseFloat(monthlyHomeInsurance);
	value['total_payment'] = Math.round(totalPayment, 2);
	return value;
}

function calcAmmort(loanAmount, downPayment, interestRate, paymentYears, monthlyInstallment) {
	var value = [];
	var remBalArr = [];
	var prnPaidArr = [];
	var intPaidArr = [];
	var principalAmount = loanAmount - downPayment;
	var totalInterest = 0;
	var totalPrincipal = 0;
	interestRate = interestRate / 100;
	// Yearly Calculation
	var yearlyInstallment = monthlyInstallment * 12;
	var interestPerAnnum = calcAmountPayable(principalAmount, interestRate);
	var principalPaidPerAnnum = yearlyInstallment - interestPerAnnum;
	var principalRemaining = principalAmount - principalPaidPerAnnum;
	value[1] = {
		'installment_year': 1,
		'interest_paid': ReplaceNumberWithCommas(interestPerAnnum.toFixed(2)),
		'principal_paid': ReplaceNumberWithCommas(principalPaidPerAnnum.toFixed(2)),
		'current_balance': ReplaceNumberWithCommas(principalAmount.toFixed(2)),
		'remaining_balance': ReplaceNumberWithCommas(principalRemaining.toFixed(2))
	};
	totalInterest += interestPerAnnum;
	totalPrincipal += totalPrincipal;
	remBalArr.push(Math.round(principalRemaining));
	prnPaidArr.push(Math.round(totalPrincipal));
	intPaidArr.push(Math.round(totalInterest));

	for (i = 1; i < paymentYears; i++) {
		interestPerAnnum = calcAmountPayable(principalRemaining, interestRate);
		principalPaidPerAnnum = yearlyInstallment - interestPerAnnum;
		var principalCurrent = principalRemaining;
		principalRemaining = principalCurrent - principalPaidPerAnnum;
		value[i + 1] = {
			'installment_year': (i + 1),
			'interest_paid': ReplaceNumberWithCommas(interestPerAnnum.toFixed(2)),
			'principal_paid': ReplaceNumberWithCommas(principalPaidPerAnnum.toFixed(2)),
			'current_balance': ReplaceNumberWithCommas(principalCurrent.toFixed(2)),
			'remaining_balance': ReplaceNumberWithCommas(principalRemaining.toFixed(2))
		};
		totalInterest += interestPerAnnum;
		totalPrincipal += principalPaidPerAnnum;
		remBalArr.push(Math.round(principalRemaining));
		prnPaidArr.push(Math.round(totalPrincipal));
		intPaidArr.push(Math.round(totalInterest));
	}
	showSplineChart(remBalArr, prnPaidArr, intPaidArr);
	return value;
}

function calcAmountPayable(principalAmount, interestRate) {
	var interestPerAnnum = principalAmount * interestRate;
	return interestPerAnnum;
}

function stripTags(input) {
	input = input.replace('$', '');
	input = input.replace(',', '');
	return parseInt(input);
}

function ReplaceNumberWithCommas(number) {
	//Seperates the components of the number
	var n = number.toString().split(".");
	//Comma-fies the first part
	n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	//Combines the two sections
	return n.join(".");
}

// - Highcharts
function showSplineChart(remBalance, prnPaid, intPaid) {
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
			name: 'Remaining Balance',
			color: '#72c02c',
			data: remBalance
		}, {
			name: 'Principal Paid',
			color: '#3398dc',
			data: prnPaid
		}, {
			name: 'Interest Paid',
			color: '#ebc71d',
			data: intPaid
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

function showDonutChart(mortgagePayment, homeInsurance, taxFees) {
	var colors = Highcharts.getOptions().colors,
		categories = [
			'Mortgage Payment',
			'Home Insurance',
			'Taxes & Other Fees'
		],
		data = [{
				color: '#72c02c',
				drilldown: {
					name: 'Mortgage Payment',
					categories: [
						'Mortgage Payment'
					],
					data: [
						mortgagePayment
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
						homeInsurance
					]
				}
			},
			{
				color: '#ebc71d',
				drilldown: {
					name: 'Taxes & Other Fees',
					categories: [
						'Taxes & Other Fees'
					],
					data: [
						taxFees
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
	Highcharts.chart('donutChart', {
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
				showInLegend: true
			}
		},
		series: [{
			name: 'Dollars',
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