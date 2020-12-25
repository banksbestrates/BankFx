$(document).on('ready', function() {
	$('#monthlyDebt, #grossMonthlyIncome').digits();
	setDebtIncomeCalculation();
	// initialization of forms
	$.HSCore.components.HSSlider.init(
		'#monthlyDebtSlider1, #grossMonthlyIncomeSlider1'
	);
});

$("body").on('DOMSubtreeModified', '#monthlyDebttest', function() {
	$('#monthlyDebt').val($('#monthlyDebttest').text());
	$('#monthlyDebt').digits();
});
$("body").on('DOMSubtreeModified', '#grossMonthlyIncometest', function() {
	$('#grossMonthlyIncome').val($('#grossMonthlyIncometest').text());
	$('#grossMonthlyIncome').digits();
});

function setDebtIncomeCalculation() {
	var monthlyDebt = stripTags($('#monthlyDebt').val());
	var grossMonthlyIncome = stripTags($('#grossMonthlyIncome').val());
	if (monthlyDebt > 0 && grossMonthlyIncome > 0) {
		var incomeResult = calcPay(monthlyDebt, grossMonthlyIncome);
		if (incomeResult['debt_income_ratio']) {
			// - Setting Values
			$('.debtIncomeRatio').text(incomeResult['debt_income_ratio'] + '%');
		}
	}
}

function calcPay(monthlyDebt, grossMonthlyIncome) {
	var value = [];
	var dti = (monthlyDebt / grossMonthlyIncome) * 100;
	value['debt_income_ratio'] = Math.round(dti, 2);
	return value;
}