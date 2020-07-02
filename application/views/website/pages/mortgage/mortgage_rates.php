
<style>



.mortgag_form_div{
  background-color:black;
  border-top:2px solid red;
  border-bottom:2px solid red;
}
.mortgag_form_div label{
  color:white;
}
.form-control{
  line-height:1.5;
}
.table td , .table th{
    border-bottom:1px solid #CB9D24;
    border-top:none; 
}
.table thead th{
    border-bottom:1px solid #CB9D24;
}

.table > tbody > tr > td {
     vertical-align: middle;
    
}
.table h4 {
    margin-bottom:0px;
}
.active td{
    padding-top:30px;
    padding-bottom:30px;
}
.button_yellow{
    color:white;
    background-color:#CB9D24;
}
.button_grey{
    color:white;
    background-color:#626262;
}
</style>
<!-- TOP NAME DIV -->
<div class="col-md-10 mx-auto py-5">
    <div class="row">
        <div class="col-md-8">
            <h1 class=" font-weight-bold mb-2">Best Mortgage Rate for July 2020</h1>
            <p>Published on July 30. Do you want to get more information ?</p>
        </div>
        <div class="col-md-4 text-right pt-3">
            <button class="btn button_compare">DOWNLOAD OUR APP</button>
        </div>
    </div>
</div>

<!-- Calculate form div -->
<div class="col-md-12 py-4 mortgag_form_div">
  <div class="col-md-10 mx-auto px-0 ">
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
      </div>
</div> 

<!-- Table div -->
<div class="col-md-12 py-5 ">
  <div class="col-md-10 mx-auto px-0 ">
  <table class="table">
        <thead>
            <tr>
                <th class="">BANK</th>
                <th class="">APY</th>             
                <th class="">TERM</th>
                <th class="">DEPOSIT </th>
                <th>EARNINGS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr class="active">
                <td>
                  <img src="<?php echo base_url()?>assets/img/overview/bank1.png"/><br/>
                </td>
                <td>
                    <h4>1.15%</h4>
                </td>
                <td>
                    <h4>1 yr</h4>
                </td>
                <td>
                    <h4>$1000</h4>
                </td>
                <td>
                    <h4>$400</h4>
                </td>
                <td>
                    <h4><button class="btn button_yellow">SEE OFFER DETAILS</button></h4>
                </td>              
            </tr>       
            <tr>
                <td>
                  BANK NAME<br/>
                  MLS 123456<br/>
                  12345678
                </td>
                <td>
                    1.15%
                </td>
                <td>
                    1 yr
                </td>
                <td>
                    $1000
                </td>
                <td>
                    $400
                </td>
                <td>
                    <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
                </td>              
            </tr>       
            <tr>
                <td>
                  BANK NAME<br/>
                  MLS 123456<br/>
                  12345678
                </td>
                <td>
                    1.15%
                </td>
                <td>
                    1 yr
                </td>
                <td>
                    $1000
                </td>
                <td>
                    $400
                </td>
                <td>
                    <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
                </td>              
            </tr>       
            <tr>
                <td>
                  BANK NAME<br/>
                  MLS 123456<br/>
                  12345678
                </td>
                <td>
                    1.15%
                </td>
                <td>
                    1 yr
                </td>
                <td>
                    $1000
                </td>
                <td>
                    $400
                </td>
                <td>
                    <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
                </td>              
            </tr>       
            <tr>
                <td>
                  BANK NAME<br/>
                  MLS 123456<br/>
                  12345678
                </td>
                <td>
                    1.15%
                </td>
                <td>
                    1 yr
                </td>
                <td>
                    $1000
                </td>
                <td>
                    $400
                </td>
                <td>
                    <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
                </td>              
            </tr>       
            <tr>
                <td>
                  BANK NAME<br/>
                  MLS 123456<br/>
                  12345678
                </td>
                <td>
                    1.15%
                </td>
                <td>
                    1 yr
                </td>
                <td>
                    $1000
                </td>
                <td>
                    $400
                </td>
                <td>
                    <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
                </td>              
            </tr>       
            <tr>
                <td>
                  BANK NAME<br/>
                  MLS 123456<br/>
                  12345678
                </td>
                <td>
                    1.15%
                </td>
                <td>
                    1 yr
                </td>
                <td>
                    $1000
                </td>
                <td>
                    $400
                </td>
                <td>
                    <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
                </td>              
            </tr>       
            <tr>
                <td>
                  BANK NAME<br/>
                  MLS 123456<br/>
                  12345678
                </td>
                <td>
                    1.15%
                </td>
                <td>
                    1 yr
                </td>
                <td>
                    $1000
                </td>
                <td>
                    $400
                </td>
                <td>
                    <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
                </td>              
            </tr>       
            <tr>
                <td>
                  BANK NAME<br/>
                  MLS 123456<br/>
                  12345678
                </td>
                <td>
                    1.15%
                </td>
                <td>
                    1 yr
                </td>
                <td>
                    $1000
                </td>
                <td>
                    $400
                </td>
                <td>
                    <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
                </td>              
            </tr>       
            <tr>
                <td>
                  BANK NAME<br/>
                  MLS 123456<br/>
                  12345678
                </td>
                <td>
                    1.15%
                </td>
                <td>
                    1 yr
                </td>
                <td>
                    $1000
                </td>
                <td>
                    $400
                </td>
                <td>
                    <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
                </td>              
            </tr>       
        </tbody>  
    </table>   
      </div>
</div> 






  <!-- Darker Gold #CB9D24
Lighter Gold #E6C245
Grey #626262
Blue #002A75 -->

 



