$(document).on('ready', function() {
	$('#startingBalance, #annualContribution').digits();
	$('#rateOfReturn, #marginalTaxRate').percent();
	setIraCalculation();
	// initialization of forms
	$.HSCore.components.HSSlider.init(
		'#startingBalanceSlider1, #annualContributionSlider1, #currentAgeSlider1, #ageOfRetirementSlider1, #rateOfReturnSlider1, #marginalTaxRateSlider1'
	);
});

$("body").on('DOMSubtreeModified', '#startingBalancetest', function() {
	$('#startingBalance').val($('#startingBalancetest').text());
	$('#startingBalance').digits();
	setTimeout(function() {
		setIraCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#annualContributiontest', function() {
	$('#annualContribution').val($('#annualContributiontest').text());
	setTimeout(function() {
		setIraCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#currentAgetest', function() {
	$('#currentAge').val($('#currentAgetest').text());
	setTimeout(function() {
		setIraCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#ageOfRetirementtest', function() {
	$('#ageOfRetirement').val($('#ageOfRetirementtest').text());
	setTimeout(function() {
		setIraCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#rateOfReturntest', function() {
	$('#rateOfReturn').val($('#rateOfReturntest').text());
	$('#rateOfReturn').percent();
	setTimeout(function() {
		setIraCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#marginalTaxRatetest', function() {
	$('#marginalTaxRate').val($('#marginalTaxRatetest').text());
	$('#marginalTaxRate').percent();
	setTimeout(function() {
		setIraCalculation();
	}, 1000);
});

function setIraCalculation() {
	var maxContribution = ($('input[name="setMaxContribution"]').prop('checked') == true ? 1 : 0);
	var startingBalance = stripTags($('#startingBalance').val());
	var annualContribution = stripTags($('#annualContribution').val());
	var currentAge = $('#currentAge').val();
	var ageOfRetirement = $('#ageOfRetirement').val();
	var rateOfReturn = stripTags($('#rateOfReturn').val());
	var marginalTaxRate = stripTags($('#marginalTaxRate').val());
	if ((startingBalance > 0 || annualContribution > 0) && (currentAge > 0 && ageOfRetirement > 0) && (rateOfReturn > 0 && marginalTaxRate > 0)) {
		// - Ammortization
		var ammortization = calcAmmort(startingBalance, annualContribution, currentAge, ageOfRetirement, rateOfReturn, marginalTaxRate, maxContribution);
		
		// - Result Summary
		var totalTenure = ageOfRetirement - currentAge;
		var maxContributionAmount = 0;
		if(maxContribution == 1){
			var maxAgeDiff = ageOfRetirement - 50;
			maxContributionAmount = maxAgeDiff * 1000;
		}
		var totalAnnualContribution = (annualContribution * totalTenure) + maxContributionAmount;
		$('#totalContributions').html('$'+totalAnnualContribution.toLocaleString());
		$('.startingBalanceDisp').html('$'+startingBalance.toLocaleString());
		$('.maxContributionDisp').html('$'+(annualContribution+1000).toLocaleString());
		$('.actualContributionDisp').html('$'+annualContribution.toLocaleString());
		$('.totalContributionDisp').html('$'+totalAnnualContribution.toLocaleString());
		$('.iraTotalDisp').html('$'+ammortization['ira_retirement_total'].toLocaleString());
		$('.taxableSavingsDisp').html('$'+ammortization['taxable_savings_total'].toLocaleString());
		var differenceDisp = ammortization['ira_retirement_total'] - ammortization['taxable_savings_total'];
		$('.differenceDisp').html('$'+differenceDisp.toLocaleString());
		$('.resultsSummaryTable').show();
		
		// - Input Summary
		$('.annualContributionDisp').html('$'+annualContribution.toLocaleString());
		$('.startingBalanceDisp').html('$'+startingBalance.toLocaleString());
		$('.currentAgeDisp').html(currentAge);
		$('.ageOfRetirementDisp').html(ageOfRetirement);
		$('.yearsRetirementDisp').html(totalTenure);
		$('.expectedRateDisp').html(rateOfReturn+"%");
		$('.marginalRateDisp').html(marginalTaxRate+"%");
		$('.inputSummaryTable').show();
		$('.rothIraTable').html('');
		var appendContent = '';
		$.each(ammortization, function(key, value) {
			appendContent += '<tr>\
			<td>' + value.installment_age + '</td>\
			<td>$' + value.ira_contribution + '</td>\
			<td>$' + value.roth_ira_balance + '</td>\
			<td>$' + value.taxable_account + '</td>\
		  </tr>';
		});
		$('.rothIraTable').append(appendContent);
	}
}

function calcAmmort(startingBalance, annualContribution, currentAge, ageOfRetirement, rateOfReturn, marginalTaxRate, maxContribution) {
	var value = [];
	var rothIraArr = [];
	var taxableSavingsArr = [];
	var counter = 0;
	var iraRetirementTotal = 0;
	var taxableSavingsTotal = 0;
	var difference = 0;
	var ageStart = currentAge;
	// calculation
	var totalContribution = startingBalance + annualContribution;
	var taxDeduction = totalContribution * (marginalTaxRate / 100);
	var deductedIncome = totalContribution - taxDeduction;
	
	if(maxContribution == 1 && currentAge >= 50){
		var iraContribution = (totalContribution + 1000) + ((totalContribution + 1000) * (rateOfReturn / 100));
	}else{
		var iraContribution = totalContribution + (totalContribution * (rateOfReturn / 100));	
	}
	var taxableIncome = totalContribution + (deductedIncome * (rateOfReturn / 100));
	iraRetirementTotal += iraContribution;
	taxableSavingsTotal += taxableIncome;
	currentAge = parseInt(currentAge)+1;

	value[0] = {
		'installment_age': currentAge,
		'ira_contribution': ReplaceNumberWithCommas(annualContribution.toFixed(2)),
		'roth_ira_balance': ReplaceNumberWithCommas(iraContribution.toFixed(2)),
		'taxable_account': ReplaceNumberWithCommas(taxableIncome.toFixed(2))
	};
	rothIraArr.push(Math.round(iraContribution));
	taxableSavingsArr.push(Math.round(taxableIncome));

	for (i = currentAge; i < ageOfRetirement; i++) {
		counter++;
		currentAge++;
		deductedIncome = (taxableIncome + annualContribution) - ((taxableIncome + annualContribution) * (marginalTaxRate / 100));
		if(maxContribution == 1 && currentAge >= 50){
			iraContribution = (annualContribution + iraContribution + 1000) + ((annualContribution + iraContribution + 1000) * (rateOfReturn / 100));
		}else{
			iraContribution = (annualContribution + iraContribution) + ((annualContribution + iraContribution) * (rateOfReturn / 100));	
		}
		annualProfit = deductedIncome * (rateOfReturn / 100);
		taxableIncome = taxableIncome + annualContribution + annualProfit;
		iraRetirementTotal = iraContribution;
		taxableSavingsTotal = taxableIncome;
		value[counter] = {
			'installment_age': currentAge,
			'ira_contribution': ReplaceNumberWithCommas(annualContribution.toFixed(2)),
			'roth_ira_balance': ReplaceNumberWithCommas(iraContribution.toFixed(2)),
			'taxable_account': ReplaceNumberWithCommas(taxableIncome.toFixed(2))
		};
		rothIraArr.push(Math.round(iraContribution));
		taxableSavingsArr.push(Math.round(taxableIncome));
	}
	showSplineChart(rothIraArr, taxableSavingsArr, ageStart);
	value['ira_retirement_total'] = iraRetirementTotal;
	value['taxable_savings_total'] = taxableSavingsTotal;
	return value;
}

// - Highcharts
function showSplineChart(rothIraArr, taxableSavingsArr, ageStart) {
	ageStart = parseInt(ageStart);
	Highcharts.chart('splineChart', {
		title: {
			text: ''
		},
		xAxis: {
			title: {
				text: 'Your Age'
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
				 return this.name + ' ($'+ sum.toLocaleString() + ')';   
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
				pointStart: ageStart,
			}
		},
		series: [{
			name: 'Roth IRA',
			color: '#72c02c',
			data: rothIraArr
		}, {
			name: 'Taxable Savings',
			color: '#3398dc',
			data: taxableSavingsArr
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