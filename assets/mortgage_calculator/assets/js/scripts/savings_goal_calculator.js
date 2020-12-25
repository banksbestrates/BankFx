$(document).on('ready', function() {
	$('#savingsGoal, #firstDepositAmount').digits();
	setGoalBasedCalculation();
	// initialization of forms
	$.HSCore.components.HSSlider.init(
		'#savingsGoalSlider1, #firstDepositAmountSlider1'
	);
});

$("body").on('DOMSubtreeModified', '#savingsGoaltest', function() {
	$('#savingsGoal').val($('#savingsGoaltest').text());
	$('#savingsGoal').digits();
	setTimeout(function() {
		setGoalBasedCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#firstDepositAmounttest', function() {
	$('#firstDepositAmount').val($('#firstDepositAmounttest').text());
	$('#firstDepositAmount').digits();
	setTimeout(function() {
		setGoalBasedCalculation();
	}, 1000);
});

function setGoalBasedCalculation() {
	var savingsGoal = stripTags($('#savingsGoal').val());
	var yearsToReach = $('#yearsToReach').val();
	var compoundMethod = $('#compoundMethod').val();
	var firstDepositAmount = stripTags($('#firstDepositAmount').val());
	if ((savingsGoal > 0 && firstDepositAmount > 0) && (yearsToReach > 0 && compoundMethod != "")) {
		var totalSavings = calcGoalBasedSavings(savingsGoal, firstDepositAmount, yearsToReach, compoundMethod);
		if (totalSavings['daily_contribution']) {
			compoundSelected = compoundMethod.toLowerCase().replace(/\b[a-z]/g, function(letter) {
				return letter.toUpperCase();
			});
			$('#compoundSelected').text(compoundSelected);
			var dailyCont = totalSavings['daily_contribution'].toLocaleString();
			var weeklyCont = totalSavings['weekly_contribution'].toLocaleString();
			var monthlyCont = totalSavings['monthly_contribution'].toLocaleString();
			var quarterlylyCont = totalSavings['quarterly_contribution'].toLocaleString();
			var yearlyCont = totalSavings['yearly_contribution'].toLocaleString();
			if(compoundMethod == 'daily'){
				$('#monthlyDeposit2').text(dailyCont);
			}
			else if(compoundMethod == 'weekly'){
				$('#monthlyDeposit2').text(weeklyCont);
			}
			else if(compoundMethod == 'monthly'){
				$('#monthlyDeposit2').text(monthlyCont);
			}
			else if(compoundMethod == 'quarterly'){
				$('#monthlyDeposit2').text(quarterlylyCont);
			}
			else if(compoundMethod == 'yearly'){
				$('#monthlyDeposit2').text(yearlyCont);
			}
			
			/* Total Savings */
			var totalSavings = '$'+dailyCont+' a day or $'+weeklyCont+' a week';
			$('#depositSummary').text(totalSavings);
		}
	}
}

function calcGoalBasedSavings(savingsGoal, firstDepositAmount, yearsToReach, compoundMethod) {
	var value = [];
	var dailyContribution = 0;
	var weeklyContribution = 0;
	var monthlyContribution = 0;
	var quarterlyContribution = 0;
	var yearlyContribution = 0;
	var savingsRequired = savingsGoal - firstDepositAmount;
	// daily contribution
	var principalDaily = yearsToReach * 365;
	dailyContribution = savingsRequired / principalDaily;
	
	//weekly contribution
	var principalWeekly = yearsToReach * 52;
	weeklyContribution = savingsRequired / principalWeekly;
	
	//monthly contribution
	var principalMonthly = yearsToReach * 12;
	monthlyContribution = savingsRequired / principalMonthly;
	
	//quarterly contribution
	var principalQuarterly = yearsToReach * 4;
	quarterlyContribution = savingsRequired / principalQuarterly;
	
	//yearly contribution
	var principalYearly = yearsToReach;
	yearlyContribution = savingsRequired / principalYearly;
	
	value['daily_contribution'] = dailyContribution;
	value['weekly_contribution'] = weeklyContribution;
	value['monthly_contribution'] = monthlyContribution;
	value['quarterly_contribution'] = quarterlyContribution;
	value['yearly_contribution'] = yearlyContribution;
	return value;
}