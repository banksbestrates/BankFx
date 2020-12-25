$(document).on('ready', function() {
	$('#amountInSavings, #monthlyWithdrawal').digits();
	$('#annualInterestRate').percent();
	setIncomeCalculation();
	// initialization of forms
	$.HSCore.components.HSSlider.init(
		'#amountInSavingsSlider1, #annualInterestRateSlider1, #monthlyWithdrawalSlider1'
	);
});

$("body").on('DOMSubtreeModified', '#amountInSavingstest', function() {
	$('#amountInSavings').val($('#amountInSavingstest').text());
	$('#amountInSavings').digits();
	setTimeout(function() {
		setIncomeCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#annualInterestRatetest', function() {
	$('#annualInterestRate').val($('#annualInterestRatetest').text());
	$('#annualInterestRate').percent();
	setTimeout(function() {
		setIncomeCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#monthlyWithdrawaltest', function() {
	$('#monthlyWithdrawal').val($('#monthlyWithdrawaltest').text());
	$('#monthlyWithdrawal').digits();
	setTimeout(function() {
		setIncomeCalculation();
	}, 1000);
});

function setIncomeCalculation() {
	var amountInSavings = stripTags($('#amountInSavings').val());
	var annualInterestRate = stripTags($('#annualInterestRate').val());
	var monthlyWithdrawal = stripTags($('#monthlyWithdrawal').val());
	var savingsLast_years = stripTags($('#savingsLast_years').val());
	var savingsLast_months = stripTags($('#savingsLast_months').val());
	if ((amountInSavings > 0 && annualInterestRate > 0) && (monthlyWithdrawal > 0 && savingsLast_years > 0)) {
		var totalIncome = calcIncomeEarned(amountInSavings, annualInterestRate, monthlyWithdrawal, savingsLast_years, savingsLast_months);
		if (totalIncome['total_years'] || totalIncome['monthly_withdrawal']) {
			$('.withdrawVal').text("$" + monthlyWithdrawal.toLocaleString());
			if(totalIncome['total_years'] == 0 && totalIncome['total_months'] == 0){
				$('.durationVal').text('Forever');
			}
			else if(totalIncome['total_years'] > 0 && totalIncome['total_months'] <= 0){
				$('.durationVal').text(totalIncome['total_years'] + " Years");
			}
			else if(totalIncome['total_years'] <= 0 && totalIncome['total_months'] > 0){
				$('.durationVal').text(totalIncome['total_months'] + " Months");
			}
			else{
				$('.durationVal').text(totalIncome['total_years'] + " Years add " + totalIncome['total_months'] + " Months");
			}
			
			if(savingsLast_years > 0 && savingsLast_months > 0){
				$('.inputYearsVal').text(savingsLast_years + " years and " + savingsLast_months);
			}
			else if(savingsLast_years > 0 && savingsLast_months == 0){
				$('.inputYearsVal').text(savingsLast_years + " years");
			}
			else if(savingsLast_years == 0 && savingsLast_months > 0){
				$('.inputYearsVal').text(savingsLast_months + " months");
			}
			else{
				$('.inputYearsVal').text("0 years");
			}
			$('.withdrawalVal').text("$" + totalIncome['monthly_withdrawal'].toLocaleString());
		}
	}
}

function calcIncomeEarned(amountInSavings, annualInterestRate, monthlyWithdrawal, savingsLast_years, savingsLast_months) {
	var value = [];
	var forever = 0;
	var monthCounter = 1;
	var monthlyInterest = amountInSavings * ((annualInterestRate / 100) / 12);
	var monthlyInterestValue = monthlyInterest;
	
	// Part 1
	if(monthlyWithdrawal > monthlyInterest){
		var totalWithInterest = amountInSavings + monthlyInterest;
		var finalAfterExpenses = totalWithInterest - monthlyWithdrawal;
		do{
			monthlyInterest = finalAfterExpenses * ((annualInterestRate / 100) / 12);
			totalWithInterest = finalAfterExpenses + monthlyInterest;
			finalAfterExpenses = totalWithInterest - monthlyWithdrawal;
			monthCounter++;
		}
		while(finalAfterExpenses > 0);
		var totalYears = Math.round(monthCounter / 12);
		var totalYearsInMonths = totalYears * 12;
		var totalMonths = monthCounter - totalYearsInMonths;
	}
	else{
		forever = 1;
	}
	
	// Part 2
	var totalSavings = 0;
	var annualInterestPercent = (annualInterestRate / 100);
	var savingsDurationMonths = (savingsLast_years * 12) + savingsLast_months;
	var savingsDurationYears = savingsDurationMonths / 12;
	var interestCalculation = (1 - Math.pow((1 + (annualInterestPercent)), -(savingsDurationYears))) / annualInterestPercent;
	var annualExpenseEstimation = amountInSavings / interestCalculation;
	var monthlyExpenseEstimation = annualExpenseEstimation / 12;
	
	value['total_years'] = (forever == 0 ? totalYears : 0);
	value['total_months'] = (forever == 0 ? totalMonths : 0);
	value['monthly_withdrawal'] = monthlyExpenseEstimation;
	return value;
}