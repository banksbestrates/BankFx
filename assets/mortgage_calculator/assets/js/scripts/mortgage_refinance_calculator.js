$(document).on('ready', function() {
	$('#currentMonthlyPayment, #balanceLeftMortgage, #applicationFee, #creditCheck, #attorneyFee, #attorneyFeeLender, #titleSearch, #titleInsurance, #appraisalFee, #inspection, #localFee, #documentPreparation, #other').digits();
	$('#currentInterestRate, #newInterestRate').percent();
	setRefinanceCalculation();
	// initialization of forms
	$.HSCore.components.HSSlider.init(
		'#currentMonthlyPaymentSlider1, #balanceLeftMortgageSlider1, #currentInterestRateSlider1, #newInterestRateSlider1, #remainingLoanTermSlider1, #newLoanTermSlider1, #applicationFeeSlider1, #creditCheckSlider1, #attorneyFeeSlider1, #attorneyFeeLenderSlider1, #titleSearchSlider1, #titleInsuranceSlider1, #appraisalFeeSlider1, #inspectionSlider1, #localFeeSlider1, #documentPreparationSlider1, #otherSlider1'
	);
});

$("body").on('DOMSubtreeModified', '#currentMonthlyPaymenttest', function() {
	$('#currentMonthlyPayment').val($('#currentMonthlyPaymenttest').text());
	$('#currentMonthlyPayment').digits();
});
$("body").on('DOMSubtreeModified', '#balanceLeftMortgagetest', function() {
	$('#balanceLeftMortgage').val($('#balanceLeftMortgagetest').text());
	$('#balanceLeftMortgage').digits();
});
$("body").on('DOMSubtreeModified', '#currentInterestRatetest', function() {
	$('#currentInterestRate').val($('#currentInterestRatetest').text());
	$('#currentInterestRate').percent();
});
$("body").on('DOMSubtreeModified', '#newInterestRatetest', function() {
	$('#newInterestRate').val($('#newInterestRatetest').text());
	$('#newInterestRate').percent();
});
$("body").on('DOMSubtreeModified', '#remainingLoanTermtest', function() {
	$('#remainingLoanTerm').val($('#remainingLoanTermtest').text());
});
$("body").on('DOMSubtreeModified', '#newLoanTermtest', function() {
	$('#newLoanTerm').val($('#newLoanTermtest').text());
});


$("body").on('DOMSubtreeModified', '#applicationFeetest', function() {
	$('#applicationFee').val($('#applicationFeetest').text());
	$('#applicationFee').digits();
});
$("body").on('DOMSubtreeModified', '#creditChecktest', function() {
	$('#creditCheck').val($('#creditChecktest').text());
	$('#creditCheck').digits();
});
$("body").on('DOMSubtreeModified', '#attorneyFeetest', function() {
	$('#attorneyFee').val($('#attorneyFeetest').text());
	$('#attorneyFee').digits();
});
$("body").on('DOMSubtreeModified', '#attorneyFeeLendertest', function() {
	$('#attorneyFeeLender').val($('#attorneyFeeLendertest').text());
	$('#attorneyFeeLender').digits();
});
$("body").on('DOMSubtreeModified', '#titleSearchtest', function() {
	$('#titleSearch').val($('#titleSearchtest').text());
	$('#titleSearch').digits();
});
$("body").on('DOMSubtreeModified', '#test', function() {
	$('#').val($('#test').text());
	$('#').digits();
});
$("body").on('DOMSubtreeModified', '#titleInsurancetest', function() {
	$('#titleInsurance').val($('#titleInsurancetest').text());
	$('#titleInsurance').digits();
});
$("body").on('DOMSubtreeModified', '#appraisalFeetest', function() {
	$('#appraisalFee').val($('#appraisalFeetest').text());
	$('#appraisalFee').digits();
});
$("body").on('DOMSubtreeModified', '#inspectiontest', function() {
	$('#inspection').val($('#inspectiontest').text());
	$('#inspection').digits();
});
$("body").on('DOMSubtreeModified', '#localFeetest', function() {
	$('#localFee').val($('#localFeetest').text());
	$('#localFee').digits();
});
$("body").on('DOMSubtreeModified', '#documentPreparationtest', function() {
	$('#documentPreparation').val($('#documentPreparationtest').text());
	$('#documentPreparation').digits();
});
$("body").on('DOMSubtreeModified', '#othertest', function() {
	$('#other').val($('#othertest').text());
	$('#other').digits();
});

function setRefinanceCalculation() {
	var currentMonthlyPayment = stripTags($('#currentMonthlyPayment').val());
	var balanceLeftMortgage = stripTags($('#balanceLeftMortgage').val());
	var currentInterestRate = stripTags($('#currentInterestRate').val());
	var newInterestRate = stripTags($('#newInterestRate').val());
	var remainingLoanTerm = stripTags($('#remainingLoanTerm').val());
	var newLoanTerm = stripTags($('#newLoanTerm').val());
	var points = stripTags($('#points').val());
	var applicationFee = stripTags($('#applicationFee').val());
	var creditCheck = stripTags($('#creditCheck').val());
	var attorneyFee = stripTags($('#attorneyFee').val());
	var attorneyFeeLender = stripTags($('#attorneyFeeLender').val());
	var titleSearch = stripTags($('#titleSearch').val());
	var titleInsurance = stripTags($('#titleInsurance').val());
	var appraisalFee = stripTags($('#appraisalFee').val());
	var inspection = stripTags($('#inspection').val());
	var localFee = stripTags($('#localFee').val());
	var documentPreparation = stripTags($('#documentPreparation').val());
	var other = stripTags($('#other').val());
	
	if (currentMonthlyPayment > 0) {
		var totalRefinance = calcMortgageRefinance(currentMonthlyPayment, balanceLeftMortgage, currentInterestRate, newInterestRate, remainingLoanTerm, newLoanTerm, points);
		console.log(totalRefinance);
		if (totalRefinance['cost_of_point']) {
			var costOfPoint = totalRefinance['cost_of_point'];
			var newMonthlyPayment = totalRefinance['new_monthly_payment'];
			var monthlySavings = totalRefinance['monthly_savings'];
			var diffInInterest = totalRefinance['difference_in_interest'];
			var totalCost = totalRefinance['total_cost'];
			var monthsToRecoup = totalRefinance['months_to_recoup'];
			
			$('.costOfPoint').text("$" + costOfPoint.toLocaleString());
			$('.newMonthlyPayment').text("$" + newMonthlyPayment.toLocaleString());
			$('.monthlySavings').text("$" + monthlySavings.toLocaleString());
			$('.diffInInterest').text(diffInInterest);
			$('.totalCost').text("$" + totalCost.toLocaleString());
			$('.monthsToRecoup').text(monthsToRecoup);
		}
	}
}

function calcMortgageRefinance(currentMonthlyPayment, balanceLeftMortgage, currentInterestRate, newInterestRate, remainingLoanTerm, newLoanTerm, points) {
	var value = [];
	// FORM VALUES
	points = (points > 0 ? points : 0);
	applicationFee = (applicationFee > 0 ? applicationFee : 0);
	creditCheck = (creditCheck > 0 ? creditCheck : 0);
	attorneyFee = (attorneyFee > 0 ? attorneyFee : 0);
	attorneyFeeLender = (attorneyFeeLender > 0 ? attorneyFeeLender : 0);
	titleSearch = (titleSearch > 0 ? titleSearch : 0);
	titleInsurance = (titleInsurance > 0 ? titleInsurance : 0);
	appraisalFee = (appraisalFee > 0 ? appraisalFee : 0);
	inspection = (inspection > 0 ? inspection : 0);
	localFee = (localFee > 0 ? localFee : 0);
	documentPreparation = (documentPreparation > 0 ? documentPreparation : 0);
	other = (other > 0 ? other : 0);
	
	// CALCULATION
	var mortgageTermMonthly = remainingLoanTerm * 12;
	var interestRate = currentInterestRate / 100;
	var interestRateMonthly = interestRate / 12;
	//var paymentsMonthly = (( Math.pow((1 + interestRate), remainingLoanTerm)) - 1) / (interestRate * Math.pow((1 + interestRate), remainingLoanTerm));
	
	var compoundInterest = Math.pow((1 + interestRateMonthly), (mortgageTermMonthly));
	var mortgageMonthlyPaymentCurrent = (compoundInterest * interestRateMonthly) / (compoundInterest - 1) * balanceLeftMortgage;
	
	var mortgageTermMonthlyNew = newLoanTerm * 12;
	var interestRateMonthlyNew = (newInterestRate / 100) / 12;
	var compoundInterestNew = Math.pow((1 + interestRateMonthlyNew), (mortgageTermMonthlyNew));
	var mortgageMonthlyPaymentNew = (compoundInterestNew * interestRateMonthlyNew) / (compoundInterestNew - 1) * balanceLeftMortgage;
	var savings = mortgageMonthlyPaymentCurrent - mortgageMonthlyPaymentNew;
	var totalCost = points * 1000;
	
	var diffInInterest = (mortgageMonthlyPaymentCurrent * mortgageTermMonthly) - (mortgageMonthlyPaymentNew * mortgageTermMonthlyNew);
	var calcMonths = (mortgageMonthlyPaymentNew * mortgageTermMonthlyNew) / mortgageMonthlyPaymentCurrent;
	calcMonths = mortgageTermMonthly - calcMonths;
	
	value['cost_of_point'] = totalCost;
	value['new_monthly_payment'] = mortgageMonthlyPaymentNew.toFixed(2);
	value['monthly_savings'] = savings.toFixed(2);
	value['difference_in_interest'] = diffInInterest.toFixed(2);
	value['total_cost'] = totalCost;
	value['months_to_recoup'] = calcMonths.toFixed(2);
	return value;
}