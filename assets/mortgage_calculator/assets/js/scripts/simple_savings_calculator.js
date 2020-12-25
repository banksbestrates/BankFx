$(document).on('ready', function() {
	$('#initialDeposit, #monthlyContribution').digits();
	setSavingCalculation();
	// initialization of forms
	$.HSCore.components.HSSlider.init(
		'#initialDepositSlider1, #monthlyContributionSlider1'
	);
});

$("body").on('DOMSubtreeModified', '#initialDeposittest', function() {
	$('#initialDeposit').val($('#initialDeposittest').text());
	$('#initialDeposit').digits();
	setTimeout(function() {
		setSavingCalculation();
	}, 1000);
});
$("body").on('DOMSubtreeModified', '#monthlyContributiontest', function() {
	$('#monthlyContribution').val($('#monthlyContributiontest').text());
	$('#monthlyContribution').digits();
	setTimeout(function() {
		setSavingCalculation();
	}, 1000);
});

function setSavingCalculation() {
	var initialDeposit = stripTags($('#initialDeposit').val());
	var monthlyContribution = stripTags($('#monthlyContribution').val());
	var savingsPeriod = $('#savingsPeriod').val();
	var apyRate = $('#apyRate').val();
	if ((initialDeposit > 0 && monthlyContribution > 0) && (savingsPeriod > 0 && apyRate > 0)) {
		var totalSavings = calcSavings(initialDeposit, monthlyContribution, savingsPeriod, apyRate);
		if (totalSavings['interest_earned']) {
			var interestEarned = totalSavings['interest_earned'];
			var totalContribution = totalSavings['total_contribution'];
			// - Setting Values
			var interestPercent = (interestEarned / 100000) * 100;
			$('#interestSlider .progress-bar').css('width', interestPercent+'%').attr('aria-valuenow', interestPercent);
			var contributionPercent = (totalContribution / 1000000) * 100;
			$('#contributionSlider .progress-bar').css('width', contributionPercent+'%').attr('aria-valuenow', contributionPercent);
			var depositPercent = (initialDeposit / 1000000) * 100;
			$('#depositSlider .progress-bar').css('width', depositPercent+'%').attr('aria-valuenow', depositPercent); 
			
			// - Range Slider
			/* Interest Slider */
			let interest_slider = $("#interestSlider");
			$(function() {
				interest_slider.slider({
					value: interestEarned,
					// setup the rest ...
				});
				$('#interestEarned2').text(interestEarned.toLocaleString());
			});
			/* Total Contribution */
			let totalContrib_slider = $("#contributionSlider");
			$(function() {
				totalContrib_slider.slider({
					value: totalContribution,
					// setup the rest ...
				});
				$('#totalContribution2').text(totalContribution.toLocaleString());
			});
			/* Initial Deposit */
			let deposit_slider = $("#depositSlider");
			$(function() {
				deposit_slider.slider({
					value: initialDeposit,
					// setup the rest ...
				});
				$('#initialDeposit2').text(initialDeposit.toLocaleString());
			});
			/* Total Savings */
			var totalSavings = initialDeposit + totalContribution + interestEarned;
			$('#totalSavings').text(totalSavings.toLocaleString());
		}
	}
}

function calcSavings(initialDeposit, monthlyContribution, savingsPeriod, apyRate) {
	var value = [];
	var interestEarned = 0;
	var totalContribution = 0;
	var totalContribution = initialDeposit + (monthlyContribution * savingsPeriod);
	var savingsPeriodYears = savingsPeriod / 12;
	var interestPerAnnum = totalContribution * (apyRate / 100);
	interestEarned = interestPerAnnum * savingsPeriodYears;
	value['interest_earned'] = interestEarned;
	value['total_contribution'] = totalContribution;
	return value;
}