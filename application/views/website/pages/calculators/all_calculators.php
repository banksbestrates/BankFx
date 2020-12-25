
  <!--==========================
    over view banner
  ============================-->
  <style>
  ul{
    font-size:14px;
    line-height:1.8;
  }
  </style>
  <?php if(count($page_data)>=1){
            foreach($page_data as $d){
              if($d->div_type == "overview_heading"){?>
               
                  <div class="overview_banner" style="background-image:url('<?php echo base_url().$d->image ?>')">
                  <div class="banner_heading">
                    <h1 class="display-4"><?php echo $d->heading ?></h1>
                    <div id="heading_content_text w-75"><?php echo $d->content?></div>
                  </div>
                </div>
        <?php } 
        }
    }?> 
<div class="container">
    <div class="row col-md-12 mx-auto">
        <div class="pt-5 pb-3 pl-3"><h6>
            Select a category below to display all the calculators in that field.</h6></div>
        <div class="col-md-9">
          <!-- auto loans calculators -->
          <div class="pb-4">
          <button type="button" class="panel-heading cal_dropdown btn btn-block text-left font-weight-bold" data-toggle="collapse" data-target="#autoloan_drop">Auto Loan Calculators</button>
          <div id="autoloan_drop" class="collapse pt-3">
            <ul>
              <a href="<?php echo base_url()?>calculator_detail/auto_loan"><li>Auto Loan Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/auto_rebate"><li>Auto Rebate vs. Interest Rate Calculator</li></a>
            </ul>
          </div>
        </div>

        <!-- boat loans calculators -->
        <div class="pb-4">
          <button type="button" class="panel-heading cal_dropdown btn btn-block text-left font-weight-bold" data-toggle="collapse" data-target="#boatloan_drop">Boat Loan Calculators</button>
          <div id="boatloan_drop" class="collapse pt-3">
            <ul>
              <a href="<?php echo base_url()?>calculator_detail/boat_loan"><li>Boat Loan Calculator</li></a>
            </ul>
          </div>
        </div>
        <!--Business Finance Calculators  -->
        <div class="pb-4">
          <button type="button" class="panel-heading cal_dropdown btn btn-block text-left font-weight-bold" data-toggle="collapse" data-target="#business_finance_drop">Business Finance Calculators</button>
          <div id="business_finance_drop" class="collapse pt-3">
            <ul>
              <a href="<?php echo base_url()?>calculator_detail/asset_allocator"><li>Asset Allocator Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/breakeven_analysis"><li>Break Even Analysis Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/business_debt"><li>Business Debt Consolidation Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/business_valuation"><li>Business Valuation Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/cash_flow_cal"><li>Cash Flow Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/equipment_vs_lease"><li>Equipment Buy vs. Lease Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/financial_ratios"><li>Financial Ratios Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/inventory_cal"><li>Inventory Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/investment_loan"><li>Investment Loan Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/like_kind_exchange"><li>Like Kind Exchange Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/line_of_credit"><li>Line of Credit Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/loan_tax_saving"><li>Loan Tax Savings Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/profit_margin"><li>Profit Margin Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/repossession_cal"><li>Repossession Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/stock_distribution"><li>Stock Distribution Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/working_capital"><li>Working Capital Calculator</li></a>
            </ul>
          </div>
        </div>
        <!-- credit card calculators -->
        <div class="pb-4">
          <button type="button" class="panel-heading cal_dropdown btn btn-block text-left font-weight-bold" data-toggle="collapse" data-target="#credicard_drop">Credit Card Calculators</button>
          <div id="credicard_drop" class="collapse pt-3">
            <ul>
            <a href="<?php echo base_url()?>calculator_detail/dealer_vs_credit_union"><li>Dealer vs. Credit Union Financing Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/cost_of_debt"><li>Cost-of-Debt Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/credit_card_debt"><li>Credit Card Debt Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/credit_card_payoff"><li>Credit Card Pay Off Calculator</li></a>
            </ul>
          </div>
        </div>
        <!-- mortgage calculators -->
        <div class="pb-4">
          <button type="button" class="panel-heading cal_dropdown btn btn-block text-left font-weight-bold" data-toggle="collapse" data-target="#mortgage_drop">Mortgage Calculators</button>
          <div id="mortgage_drop" class="collapse pt-3">
            <ul>
              <a href="<?php echo base_url()?>calculator_detail/adjustable_rate_mortgage_cal"><li>Adjustable Rate Mortgage Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/arp_calculator"><li>APR Calculator for Adjustable Rate Mortgages</li></a>
              <a href="<?php echo base_url()?>calculator_detail/arm_interest"><li>ARM & Interest Only ARM vs. Fixed Rate Mortgage Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/arm_fixed"><li>ARM vs. Fixed Rate Mortgage Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/bi_weekly"><li>Bi-Weekly Mortgage Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/home_equity"><li>Home Equity Line of Credit Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/home_equity_vs_auto_loan"><li>Home Equity vs. Auto loan Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/interest_only"><li>Interest Only Mortgage Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/maximun_mortgage"><li>Maximum Mortgage Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/mortgage_calculator"><li>Mortgage Calculators</li></a>
              <a href="<?php echo base_url()?>calculator_detail/mortgage_arp"><li>Mortgage APR Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/mortgage_balloon"><li>Mortgage Balloon Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/mortgage_comparison"><li>Mortgage Comparison Calculator 20 Years vs 30 Years</li></a>
              <a href="<?php echo base_url()?>calculator_detail/mortgage_loan_calculator"><li>Mortgage Loan Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/mortgage_payment_calculator"><li>Mortgage Payment Calculator for 15 yr, 20 yr and 30 yr loans</li></a>
              <a href="<?php echo base_url()?>calculator_detail/mortgage_payoff"><li>Mortgage Payoff Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/mortgage_point"><li>Mortgage Points Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/mortgage_qualifier"><li>Mortgage Qualifier Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/mortgage_required_income"><li>Mortgage Required Income Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/refinance_breakeven"><li>Refinance Breakeven Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/rent_vs_buy_cal"><li>Rent vs. Buy Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/reverse_mortgage"><li>Reverse Mortgage Calculator</li></a>        
              <a href="<?php echo base_url()?>calculator_detail/roll_down"><li>Roll Down your Credit Card Debt Calculator</li></a>
            </ul>
          </div>
        </div>
        <!-- Retirement Finance Calculators calculators -->
        <div class="pb-4">
          <button type="button" class="panel-heading cal_dropdown btn btn-block text-left font-weight-bold" data-toggle="collapse" data-target="#retirement_drop">Retirement Finance Calculators</button>
          <div id="retirement_drop" class="collapse pt-3">
            <ul>
              <a href="<?php echo base_url()?>calculator_detail/retirement_401k"><li>401k Savings Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/retirement_403b"><li>403b Savings Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/457_plan"><li>457 Plan: Roth vs. Pre-tax Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/72th_cal"><li>72t Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/annual_rate_of_return"><li>Annual Rate of Return Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/borrowing_from_401k"><li>Borrowing From a 401k or 403b Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/comapre_investment_fees"><li>Compare Investment Fees Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/investment_quest"><li>Investment Questionnaire Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/life_expectancy"><li>Life Expectancy Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/long_term_care"><li>Long Term Care Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/muncipal_bond"><li>Municipal Bond Tax Equivalent Yield Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/mutual_fund"><li>Mutual Fund Expense Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/required_min_distribution"><li>Required Minimum Distribution RMD Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/retirement_income"><li>Retirement Income Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/retirement_planner"><li>Retirement Planner Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/retirement_shortfall_cal"><li>Retirement Shortfall Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/roth_401k"><li>Roth 401k vs Traditional 401k Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/roth_ira"><li>Roth IRA Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/roth_traditional"><li>Roth vs. Traditional IRA Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/social_security"><li>Social Security Benefits Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/taxable_vs_tax_deferred"><li>Taxable vs. Tax Deferred vs. Tax Free Investment Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/traditional_ira"><li>Traditional IRA Calculator</li></a>
             
            </ul>
          </div>
        </div>
        <!-- rv/motorcycle loans calculators -->
        <div class="pb-4">
          <button type="button" class="panel-heading cal_dropdown btn btn-block text-left font-weight-bold" data-toggle="collapse" data-target="#rv_drop">RV & Motorcycle Loan Calculators</button>
          <div id="rv_drop" class="collapse pt-3">
            <ul>
              <a href="<?php echo base_url()?>calculator_detail/rv_loan_calculator"><li>Recreational Vehicle (RV) Loan Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/motorcycle_loan"><li>Motorcycle Loan Calculator</li></a>
            </ul>
          </div>
        </div>
        <!-- personal calculators -->
        <div class="pb-4">
          <button type="button" class="panel-heading cal_dropdown btn btn-block text-left font-weight-bold" data-toggle="collapse" data-target="#personal_drop">Personal Finance Calculators</button>
          <div id="personal_drop" class="collapse pt-3">
            <ul>
              <a href="<?php echo base_url()?>calculator_detail/advance_loan"><li>Advanced Loan Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/amortization_calculator"><li>Amortization Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/loan_payment_frequency"><li>Loan Payment Frequency Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/loan_prequalification"><li>Loan Prequalification Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/basic_financial"><li>Basic Financial Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/comprehensive_life_insurance"><li>Comprehensive Life Insurance Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/fixed_annuity"><li>Fixed Annuity Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/health_saving"><li>Health Savings Account (HSA) Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/how_much_you_owe"><li>How Much Do You Owe Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/human_life_value"><li>Human Life Value Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/lease_vs_buy"><li>Lease vs. Buy Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/life_insurance"><li>Life Insurance Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/networth_cal"><li>Net Worth Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/student_loan"><li>Student Loan Calculator</li></a>
            </ul>
          </div>
        </div>
       
        <!--Savings Finance Calculators  -->
        <div class="pb-4">
          <button type="button" class="panel-heading cal_dropdown btn btn-block text-left font-weight-bold" data-toggle="collapse" data-target="#saving_finance_drop">Savings Finance Calculators</button>
          <div id="saving_finance_drop" class="collapse pt-3">
            <ul>
              <a href="<?php echo base_url()?>calculator_detail/budgeting_cal"><li>Budgeting Calculator</li></a>
              <a href="<?php echo base_url()?>calculator_detail/checkbook_balancing"><li>Checkbook Balancing Calculator</li></a>
              <a href="<?php echo base_url()?>college_saving"><li>College Savings Calculator</li></a>
              <a href="<?php echo base_url()?>cool_million"><li>Cool Million Calculator</li></a>
              <a href="<?php echo base_url()?>family_income"><li>Family Income Calculator</li></a>
              <a href="<?php echo base_url()?>future_value"><li>Future Value Calculator</li></a>
              <a href="<?php echo base_url()?>home_budget"><li>Home Budget Calculator</li></a>
              <a href="<?php echo base_url()?>home_buyer"><li>Home Buyer Savings Calculator</li></a>
              <a href="<?php echo base_url()?>internal_rate"><li>Internal Rate of Return (IRR) Calculator</li></a>
              <a href="<?php echo base_url()?>retirement_saving"><li>Retirement Savings Calculator</li></a>
              <a href="<?php echo base_url()?>saving_calculator"><li>Savings Calculator</li></a>
              <a href="<?php echo base_url()?>saving_tax_inflation"><li>Savings Calculator, Taxes and Inflation</li></a>
              <a href="<?php echo base_url()?>saving_goals"><li>Savings Goals Calculator</li></a>
              <a href="<?php echo base_url()?>student_budget"><li>Student Budget Calculator</li></a>
            </ul>
          </div>
        </div>
       
        <!--Tax Estimation Calculators  -->
        <div class="pb-4">
          <button type="button" class="panel-heading cal_dropdown btn btn-block text-left font-weight-bold" data-toggle="collapse" data-target="#tax_estimator_drop">Tax Estimators Calculators</button>
          <div id="tax_estimator_drop" class="collapse pt-3">
            <ul>
              <a href="<?php echo base_url()?>1040_tax"><li>1040 Tax Calculator</li></a>
              <a href="<?php echo base_url()?>charitable_contributions"><li>Charitable Contributions Calculator</li></a>
              <a href="<?php echo base_url()?>estate_tax"><li>Estate Tax Liability Calculator</li></a>
              <a href="<?php echo base_url()?>marginal_tax_rate"><li>Marginal Tax Rate Calculator</li></a>
              <a href="<?php echo base_url()?>net_to_gross_paycheck"><li>Net to Gross Paycheck Calculator</li></a>
              <a href="<?php echo base_url()?>pyroll_deductions"><li>Payroll Deductions Calculator</li></a>
              <a href="<?php echo base_url()?>self_employment"><li>Self Employment SE Taxes Calculator</li></a>
              <a href="<?php echo base_url()?>student_loan_tax_rate"><li>Student Loan Tax Rate Calculator</li></a>
             
            </ul>
          </div>
        </div>
       
    </div>
    <div class="col-md-3"></div>
    </div>
</div>
  
   
  <!-- Card view -->
  <div class="container card_row pb-4">   
        <div class="pt-5 col-md-12  row card_view ">
              <!-- <div class="col-md mb-3">
                  <div class="card pb-3">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/mortgage_rates.png" style="width:100px; height:100px;">
                    </div>
                    <a href="<?php echo base_url()?>mortgage_rates">
                      <h6> Mortgage Rates</h6>
                    </a>
                  </div>
              </div>
              <div class="col-md mb-3">
                  <div class="card pb-3">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/home_equity.png" style="width:100px; height:100px;">
                    </div>
                    <a href="<?php echo base_url()?>home_equity_rates">
                      <h6>Home Equity Rates</h6>
                    </a>
                  </div>
              </div>
              <div class="col-md mb-3">
                  <div class="card pb-3">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/refinance_rate.png" style="width:100px; height:100px;">
                    </div>
                    <a href="<?php echo base_url()?>mortgage_rates">
                     <h6>Refinance Rates</h6>
                    </a>
                  </div>
              </div>
              <div class="col-md mb-3">
                <div class="card pb-3">
                  <div style="width:100%; text-align:center">
                    <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/mortgage_calculator.png" style="width:100px; height:100px;">
                  </div>
                  <a href="<?php echo base_url()?>mortgage_calculator">
                    <h6>Mortgage Calculator</h6>
                  </a>
                  </div>
              </div> -->
        </div>
      </div>
  </div> 

