$(document).on('ready', function() {
	$('#minDownpayment, #maxDownpayment, #purchasePrice').digits();
	$('#interestRate, #rateEarn, #federalTaxRate').percent();
	setPutDownCalculation();
	// initialization of forms
	$.HSCore.components.HSSlider.init(
		'#minDownpaymentSlider1, #maxDownpaymentSlider1, #purchasePriceSlider1, #rateEarnSlider1, #federalTaxRateSlider1'
	);
});

$("body").on('DOMSubtreeModified', '#minDownpaymenttest', function() {
	$('#minDownpayment').val($('#minDownpaymenttest').text());
	$('#minDownpayment').digits();
});
$("body").on('DOMSubtreeModified', '#maxDownpaymenttest', function() {
	$('#maxDownpayment').val($('#maxDownpaymenttest').text());
	$('#maxDownpayment').digits();
});
$("body").on('DOMSubtreeModified', '#purchasePricetest', function() {
	$('#purchasePrice').val($('#purchasePricetest').text());
	$('#purchasePrice').digits();
});
$("body").on('DOMSubtreeModified', '#rateEarntest', function() {
	$('#rateEarn').val($('#rateEarntest').text());
	$('#rateEarn').percent();
});
$("body").on('DOMSubtreeModified', '#federalTaxRatetest', function() {
	$('#federalTaxRate').val($('#federalTaxRatetest').text());
	$('#federalTaxRate').percent();
});

function setPutDownCalculation() {
	var minDownpayment = stripTags($('#minDownpayment').val());
	var maxDownpayment = stripTags($('#maxDownpayment').val());
	var purchasePrice = stripTags($('#purchasePrice').val());
	var loanMonths = $('#loanMonths').val();
	var interestRate = stripTags($('#interestRate').val());
	var rateEarn = stripTags($('#rateEarn').val());
	var federalTaxRate = stripTags($('#federalTaxRate').val());
	if ((minDownpayment > 0 && maxDownpayment > 0) && (loanMonths > 0 && interestRate > 0)) {
		var downpaymentResult = calcPay(minDownpayment, maxDownpayment, purchasePrice, loanMonths, interestRate, rateEarn, federalTaxRate);
		if (downpaymentResult['money_down_with_save']) {
			// - Setting Values
			$('.moneyDownWithSave').text('$' + downpaymentResult['money_down_with_save'].toLocaleString());
			$('.withMoreMoneyDown').text('$' + downpaymentResult['with_more_money_down'].toLocaleString());
			$('.withLessMoneyDown').text('$' + downpaymentResult['with_less_money_down'].toLocaleString());
		}
	}
}

function calcPay(minDownpayment, maxDownpayment, purchasePrice, loanMonths, interestRate, rateEarn, federalTaxRate) {
	var value = [];
	var interestRateMonthly = (interestRate / 100) / 12;
	var compoundInterest = Math.pow((1 + interestRateMonthly), (loanMonths));
	var minPayment = (compoundInterest * interestRateMonthly) / (compoundInterest - 1) * (purchasePrice - minDownpayment);
	var maxPayment = (compoundInterest * interestRateMonthly) / (compoundInterest - 1) * (purchasePrice - maxDownpayment);
	var diff = minPayment - maxPayment;
	minPayment = minPayment.toFixed(2);
	maxPayment = maxPayment.toFixed(2);
	diff = diff.toFixed(2);
	
	// FOR DOWNPAYMENT SAVE
	var interestRateEarn = interestRate - rateEarn;
	var interestRateEarnMonthly = (interestRateEarn / 100) / 12;
	var compoundInterest = Math.pow((1 + interestRateEarnMonthly), (loanMonths));
	var minEarnPayment = (compoundInterest * interestRateEarnMonthly) / (compoundInterest - 1) * (purchasePrice - minDownpayment);
	var maxEarnPayment = (compoundInterest * interestRateEarnMonthly) / (compoundInterest - 1) * (purchasePrice - maxDownpayment);
	var diffEarn = minEarnPayment - maxEarnPayment;
	
	value['with_more_money_down'] = maxPayment;
	value['with_less_money_down'] = minPayment;
	value['money_down_with_save'] = diffEarn;
	return value;
}