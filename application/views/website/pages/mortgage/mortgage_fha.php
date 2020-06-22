<style>
.rate_header{
    background-color:rgba(223, 204, 190, 0.36);
    padding:80px 0px 40px 0px;
}

.bottom_calculator{
    background-color:rgba(144, 190, 204, 0.36);
    padding:40px 0px 40px 0px;
}
.rate_header .btn{
    background-color:#968719;
    color:white;
}
label{
    color:black;
}
.form-control {
    
    line-height: 2.5!important;
}
select.form-control:not([size]):not([multiple]) {
    height: calc(3.25rem + 0px);
}
.result_div{
    padding:20px 0px 20px 0px;
}
.checked {
  color: orange;
}
.advantage{
    color:green;
}
.disadvantage{
    color:red;
}
 .project-tab .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
    background-color:#968719;
    color:white;
}
</style>
<div class="rate_header">
    <header class="text-center">
        <h3>FHA Loan Rates</h3>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <label>Mortgage type</label>
                <select class="form-control">
                    <option>Refinance</option>
                    <option>Purchase</option>
                </select>
            </div>
            <div class="col-md-2">
                <label>ZIP Code</label>
                <input type="text" class="form-control" value="12345"/>
            </div>
            <div class="col-md-2">
                <label>Purchase Price</label>
                <input type="text" class="form-control" value="$410,000"/>
            </div>
            <div class="col-md-2">
                <label>Down payment</label>
                <input type="text" class="form-control" value="$82,000">
            </div>
            <div class="col-md-2">
                <label>Credit score </label>
                <select class="form-control">
                    <option>740+</option>
                    <option>720-739</option>
                    <option>720-739</option>
                    <option>7420-739</option>
                    <option>720-739</option>
                </select>
            </div>
            <div class="col-md-2">
                <label>Loan term</label>
                <select class="form-control">
                    <option>30 Years</option>
                    <option>20 Years</option>
                    <option>15 Years</option>
                    <option>10 Years</option> 
                </select>
            </div>
        </div>
        <div class="text-center pt-4">
            <button class="col-md-2 form-control btn">Search</button>
        </div>
    </div>
</div>
<div class="container result_div">
    <p class="text-center">Showing results for: Single-family home, 30 year fixed mortgages with all points options. </p>
    <table class="table">
    <thead>
        <tr>
            <th>LENDER</th>
            <th>RATE</th>
            <th>APR</th>
            <th>MO. PAYMENT </th>
            <th>UPFRONT COSTS </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img src="<?php echo base_url()?>assets/img/logo/demo_bank.png"/><br/>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </td>
            <td>
                <h4>2.875%</h4>
                <small>30 Year fixed</small>
            </td>
            <td>
                <h4>3.48%</h4>
            </td>
            <td>
                <h4>$1416</h4>
            </td>
            <td>
                <h4>$0</h4>
                <small>Points:0</small><br/>
                <small>5 Year cost:$52,575</small>
            </td>
            
        </tr>
        <tr>
            <td><img src="<?php echo base_url()?>assets/img/logo/demo_bank.png"/><br/>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </td>
            <td>
                <h4>2.875%</h4>
                <small>30 Year fixed</small>
            </td>
            <td>
                <h4>3.48%</h4>
            </td>
            <td>
                <h4>$1416</h4>
            </td>
            <td>
                <h4>$0</h4>
                <small>Points:0</small><br/>
                <small>5 Year cost:$52,575</small>
            </td>
            
        </tr>
        <tr>
            <td><img src="<?php echo base_url()?>assets/img/logo/demo_bank.png"/><br/>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </td>
            <td>
                <h4>2.875%</h4>
                <small>30 Year fixed</small>
            </td>
            <td>
                <h4>3.48%</h4>
            </td>
            <td>
                <h4>$1416</h4>
            </td>
            <td>
                <h4>$0</h4>
                <small>Points:0</small><br/>
                <small>5 Year cost:$52,575</small>
            </td>
            
        </tr>
        <tr>
            <td><img src="<?php echo base_url()?>assets/img/logo/demo_bank.png"/><br/>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </td>
            <td>
                <h4>2.875%</h4>
                <small>30 Year fixed</small>
            </td>
            <td>
                <h4>3.48%</h4>
            </td>
            <td>
                <h4>$1416</h4>
            </td>
            <td>
                <h4>$0</h4>
                <small>Points:0</small><br/>
                <small>5 Year cost:$52,575</small>
            </td>
            
        </tr>
        <tr>
            <td><img src="<?php echo base_url()?>assets/img/logo/demo_bank.png"/><br/>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </td>
            <td>
                <h4>2.875%</h4>
                <small>30 Year fixed</small>
            </td>
            <td>
                <h4>3.48%</h4>
            </td>
            <td>
                <h4>$1416</h4>
            </td>
            <td>
                <h4>$0</h4>
                <small>Points:0</small><br/>
                <small>5 Year cost:$52,575</small>
            </td>
            
        </tr>
        <tr>
            <td><img src="<?php echo base_url()?>assets/img/logo/demo_bank.png"/><br/>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </td>
            <td>
                <h4>2.875%</h4>
                <small>30 Year fixed</small>
            </td>
            <td>
                <h4>3.48%</h4>
            </td>
            <td>
                <h4>$1416</h4>
            </td>
            <td>
                <h4>$0</h4>
                <small>Points:0</small><br/>
                <small>5 Year cost:$52,575</small>
            </td>
            
        </tr>
        <tr>
            <td><img src="<?php echo base_url()?>assets/img/logo/demo_bank.png"/><br/>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </td>
            <td>
                <h4>2.875%</h4>
                <small>30 Year fixed</small>
            </td>
            <td>
                <h4>3.48%</h4>
            </td>
            <td>
                <h4>$1416</h4>
            </td>
            <td>
                <h4>$0</h4>
                <small>Points:0</small><br/>
                <small>5 Year cost:$52,575</small>
            </td>
            
        </tr>
        <tr>
            <td><img src="<?php echo base_url()?>assets/img/logo/demo_bank.png"/><br/>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </td>
            <td>
                <h4>2.875%</h4>
                <small>30 Year fixed</small>
            </td>
            <td>
                <h4>3.48%</h4>
            </td>
            <td>
                <h4>$1416</h4>
            </td>
            <td>
                <h4>$0</h4>
                <small>Points:0</small><br/>
                <small>5 Year cost:$52,575</small>
            </td>
            
        </tr>
        <tr>
            <td><img src="<?php echo base_url()?>assets/img/logo/demo_bank.png"/><br/>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </td>
            <td>
                <h4>2.875%</h4>
                <small>30 Year fixed</small>
            </td>
            <td>
                <h4>3.48%</h4>
            </td>
            <td>
                <h4>$1416</h4>
            </td>
            <td>
                <h4>$0</h4>
                <small>Points:0</small><br/>
                <small>5 Year cost:$52,575</small>
            </td>
            
        </tr>
        <tr>
            <td><img src="<?php echo base_url()?>assets/img/logo/demo_bank.png"/><br/>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </td>
            <td>
                <h4>2.875%</h4>
                <small>30 Year fixed</small>
            </td>
            <td>
                <h4>3.48%</h4>
            </td>
            <td>
                <h4>$1416</h4>
            </td>
            <td>
                <h4>$0</h4>
                <small>Points:0</small><br/>
                <small>5 Year cost:$52,575</small>
            </td>
            
        </tr>
        
    </tbody>  
</table>       
</div>

<div class="container pb-5">
    <h2>Today’s FHA Loan Ratess</h2>
    <p>The table below brings together a comprehensive national survey of mortgage lenders to help you know what are the most competitive FHA loan rates. This interest rate table is updated daily to give you the most current rates when choosing an FHA mortgage home loan.</p>
    <section id="tabs" class="project-tab pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="col-md-6 nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Purchase</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Refinance</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Interest</th>
                                            <th>ARP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Employer</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">30-Year FHA Rate</a></td>
                                            <td>3.250%</td>
                                            <td>3.690%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   
    <h2>What is a FHA Loan?</h2>
    <p>
    Federal Housing Administration (FHA) loans are government-backed mortgages for single-family and multifamily homes.
    </p>
    <p>FHA-backed loans typically have lower income and credit score requirements than conventional mortgages. FHA also requires a minimum 3.5 percent down payment, which is helpful for buyers who don’t have a lot of funds saved for a big lump sum payment. These are two reasons FHA loans are so popular among first-time homebuyers, people on tight budgets and folks who have lower credit scores.
    FHA loans do require FHA mortgage insurance for homebuyers who put down less than 20 percent. All FHA borrowers must pay two insurance premiums: the upfront mortgage insurance premium (1.75 percent of the base loan amount) and an annual mortgage insurance premium. The annual premium is based on loan terms, loan amount and the loan-to-value ratio. Keep these extra costs in mind when you’re budgeting for a house.
    </p>
    <h2>Who is a FHA Loan for?</h2>
    <p>
        A FHA loan can be a viable path to homeownership for many types of buyers. Here we’ll look at two scenarios where FHA loans might make sense.
    </p>
        <h2 class="advantage">Advantages of FHA Loans</h2>
        <hr/>
    <ul>
        <li> Low down-payment requirements.</li>
        <li>Amenable to first-time home buyers (includes those who have not owned a home for at least three years).</li>
        <li>Financing for mobile homes and factory-built homes.</li>
        <li>May accommodate people who own the land where the home will be located and those who will live in a mobile home park.</li>
        <li>Can lock in a low rate without a large down payment.</li>
    </ul>
        <h2 class="disadvantage" >Disadvantage of FHA Loans</h2>
    <ul>
        <li> Low down-payment requirements.</li>
        <li>Amenable to first-time home buyers (includes those who have not owned a home for at least three years).</li>
        <li>Financing for mobile homes and factory-built homes.</li>
        <li>May accommodate people who own the land where the home will be located and those who will live in a mobile home park.</li>
        <li>Can lock in a low rate without a large down payment.</li>
    </ul>
</div>

<!-- Related stories part -->
<div class="bottom_calculator">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Loan comparision Calculator</h5>
                        <p class="card-text">
                            Estimate the mortgage amount that best fits your budget.
                        </p>
                        <a href="#"><i class="fa fa-long-arrow-right fa-2x" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Loan comparision Calculator</h5>
                        <p class="card-text">
                            Estimate the mortgage amount that best fits your budget.
                        </p>
                        <a href="#"><i class="fa fa-long-arrow-right fa-2x" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Mortgage loan calculator</h5>
                        <p class="card-text">
                            Calculate what your mortgage payment will be and how much ..
                        </p>
                        <a href="#"><i class="fa fa-long-arrow-right fa-2x" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Loan comparision Calculator</h5>
                        <p class="card-text">
                            Estimate the mortgage amount that best fits your budget.
                        </p>
                        <a href="#"><i class="fa fa-long-arrow-right fa-2x" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
