<style>
.rate_header{
    background-color:rgba(223, 204, 190, 0.36);
    padding:80px 0px 40px 0px;

}
.rate_header .btn{
    background-color:#D79F01;
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
</style>
<div class="rate_header">
    <header class="text-center">
        <h3>Current Mortgage Rates for June 2020</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus voluptate odio <p>
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
                <th>RATE/th>
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

<div class="container">
    <header class="text-center">
        <h1>What are today's mortgage rates?</h1>
    </header>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur modi adipisci iure. Facilis sint quibusdam reprehenderit illum esse magni eos maxime amet cum aliquam iure, incidunt, a animi aliquid autem?</p>
    <header class="text-center">
        <h1>Current Mortgage and Refinance Rates</h1>
    </header>  
    <table class="table">
    <thead>
      <tr>
        <th>Product</th>
        <th>Intrest Rate/th>
        <th>ARP</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>30-Year Fixed Rate</td>
        <td>3.400%	</td>
        <td>3.630%</td>
      </tr>
      <tr>
      <td>20-Year Fixed Rate</td>
        <td>3.400%	</td>
        <td>3.630%</td>
      </tr>
      <tr>
      <td>15-Year Fixed Rate</td>
        <td>3.400%	</td>
        <td>3.630%</td>
      </tr>
      <tr>
      <td>10-Year Fixed Rate</td>
        <td>3.400%	</td>
        <td>3.630%</td>
      </tr>
      <tr>
      <td>10/1 ARM Rate</td>
        <td>3.400%	</td>
        <td>3.630%</td>
      </tr>
      <tr>
      <td>7/1 ARM Rate</td>
        <td>3.400%	</td>
        <td>3.630%</td>
      </tr>
      <tr>
      <td>5/1 ARM Rate</td>
        <td>3.400%	</td>
        <td>3.630%</td>
      </tr>
    </tbody>
  </table>

</div>

