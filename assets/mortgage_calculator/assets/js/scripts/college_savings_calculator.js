$(document).on('ready', function() {
	$('#currentSavings, #monthlyContribution, #tuitionChildOne, #roomBoardChildOne').digits();
	$('#educationCostInflation, #rateOfReturn').percent();
	setCollegeSavingCalculation();
	// initialization of forms
	$.HSCore.components.HSSlider.init(
		'#educationCostInflationSlider1, #currentSavingsSlider1, #monthlyContributionSlider1, #rateOfReturnSlider1'
	);
});

$("body").on('DOMSubtreeModified', '#educationCostInflationtest', function() {
	$('#educationCostInflation').val($('#educationCostInflationtest').text());
	$('#educationCostInflation').digits();
	setTimeout(function() {
		setCollegeSavingCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#currentSavingstest', function() {
	$('#currentSavings').val($('#currentSavingstest').text());
	$('#currentSavings').digits();
	setTimeout(function() {
		setCollegeSavingCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#monthlyContributiontest', function() {
	$('#monthlyContribution').val($('#monthlyContributiontest').text());
	$('#monthlyContribution').digits();
	setTimeout(function() {
		setCollegeSavingCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#rateOfReturntest', function() {
	$('#rateOfReturn').val($('#rateOfReturntest').text());
	$('#rateOfReturn').digits();
	setTimeout(function() {
		setCollegeSavingCalculation();
	}, 1000);
});

function setCollegeSavingCalculation() {
	var educationCostInflation = stripTags($('#educationCostInflation').val());
	var currentSavings = stripTags($('#currentSavings').val());
	var monthlyContribution = stripTags($('#monthlyContribution').val());
	var rateOfReturn = stripTags($('#rateOfReturn').val());
	if ((educationCostInflation > 0 && currentSavings >= 0) && (monthlyContribution > 0 && rateOfReturn > 0)) {
		var totalSavings = calcCollegeSavings(educationCostInflation, currentSavings, monthlyContribution, rateOfReturn);
		if (totalSavings['total_expenses']) {
			var totalExpenses = totalSavings['total_expenses'];
			var increaseMonthlySaving = totalSavings['increase_monthly_savings'];
			
			$('.educationCostInflation').text(educationCostInflation.toLocaleString() + "%");
			$('.currentSavings').text("$" + currentSavings.toLocaleString());
			$('.monthlyContribution').text("$" + monthlyContribution.toLocaleString());
			$('.rateOfReturn').text(rateOfReturn.toLocaleString() + "%");
			$('.totalExpenses').text("$" + totalExpenses.toLocaleString());
			$('.increaseMonthlySaving').text("$" + increaseMonthlySaving.toLocaleString());
		}
	}
}

function calcCollegeSavings(educationCostInflation, currentSavings, monthlyContribution, rateOfReturn) {
	var value = [];
	var inflationRate = educationCostInflation / 100;
	// Children Expenses
	var ageOfChildOne = stripTags($('#ageOfChildOne').val());	
	var educationStartChildOne = stripTags($('#educationStartChildOne').val());
	var tuitionChildOne = stripTags($('#tuitionChildOne').val());
	var roomBoardChildOne = stripTags($('#roomBoardChildOne').val());
	var yearsChildOne = educationStartChildOne - ageOfChildOne;
	if((yearsChildOne > 0 || educationStartChildOne > 0) && (tuitionChildOne > 0 || roomBoardChildOne > 0)){
		var counter = 0;
		var expensesOne = 1;
		var tempExp = (tuitionChildOne + roomBoardChildOne);
		expensesOneVal = tempExp + (tempExp * inflationRate);
		expensesOne += expensesOneVal;
		do{
			expensesOneVal = expensesOneVal + (expensesOneVal * inflationRate);
			expensesOne += expensesOneVal;
			counter++;
		}
		while(counter < yearsChildOne);
		console.log(expensesOne);
		return false;
	}
	
	var ageOfChildTwo = $('#ageOfChildTwo').val();	
	var educationStartChildTwo = $('#educationStartChildTwo').val();
	var tuitionChildTwo = $('#tuitionChildTwo').val();
	var roomBoardChildTwo = $('#roomBoardChildTwo').val();
	
	var ageOfChildThree = $('#ageOfChildThree').val();	
	var educationStartChildThree = $('#educationStartChildThree').val();
	var tuitionChildThree = $('#tuitionChildThree').val();
	var roomBoardChildThree = $('#roomBoardChildThree').val();
	
	var ageOfChildFour = $('#ageOfChildFour').val();	
	var educationStartChildFour = $('#educationStartChildFour').val();
	var tuitionChildFour = $('#tuitionChildFour').val();
	var roomBoardChildFour = $('#roomBoardChildFour').val();
	
	
	var totalExpenses = 0;
	var increaseMonthlySaving = 0;
	//var totalContribution = initialDeposit + (monthlyContribution * savingsPeriod);
	//var savingsPeriodYears = savingsPeriod / 12;
	//var interestPerAnnum = totalContribution * (apyRate / 100);
	//interestEarned = interestPerAnnum * savingsPeriodYears;
	value['total_expenses'] = totalExpenses+1;
	value['increase_monthly_savings'] = increaseMonthlySaving+1;
	return value;
}