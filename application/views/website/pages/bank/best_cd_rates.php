
<!-- Bank locator -->
<div class="container pt-5">
    <div class="row">
        <div class="col-md-9">
            <span>Banking > </span> <span class="text_yellow">National CD Rates</span>
            <h2 class="font-weight-900 pt-2 mb-2">National CD Rates</h2>
            <!-- <span>Do we need to have any sort of legal disclaimers here such as on the FDIC website?</span> -->
        </div>
        <div class="col-md-3 text-right pt-4">
          
        </div>
    </div>
</div>

<!-- <div class="container px-0  pt-5">
    <table class="table text-secondary font-weight-bold">
        <tbody>
            <tr >
                <td class="px-5">BANK NAME</td>
                <td>1.15%</td>
            </tr>
            <tr>
                <td class="px-5">BANK NAME</td>
                <td>1.15%</td>
            </tr>
            <tr>
                <td class="px-5">BANK NAME</td>
                <td>1.15%</td>
            </tr>
        </tbody>  
    </table>   
</div> -->

 <!-- Content Related this page -->
<div class="container pt-5 ">
        <h4 class="font-weight-900">National Average CD Non Jumbo Deposit Rates (under $100,000)</h4>
        <div class="col-md-12 mx-auto row px-0">
            <div class="col-md-9">
                <table class="table table-bordered">    
                <?php $non_jumbo = $non_jumbo_rates['Returned'][0]['DetailData'];?>
                 <tr>
                    <th> Deposit Products</th>
                    <th>National Rate</th>
                    <th>National Rate Cap</th>
                </tr>
                <?php  foreach($non_jumbo as $data)
                    {?>
                        <tr>
                            <td><?php echo $data['ProductID'] ?></td>
                            <td><?php echo $data['NationalRate'] ?></td>
                            <td><?php echo $data['NationalRateCap'] ?></td>
                        </tr>
                <?php }
                    ?>

                    <!-- <?php foreach($jumbo_rates['Returned'][0]['DetailData'] as $data){?>
                        <tr>heloo</tr>
                    <?php }?> -->
               
                </table>
            </div>
            <div class="col-md-3">
            </div>         
        </div>
</div>
<div class="container pt-5">
<h4 class="font-weight-900">National Average CD Jumbo Deposit Rates (over $100,000)</h4>
        <div class="col-md-12 mx-auto row px-0">
            <div class="col-md-9">
                <table class="table table-bordered">
                <?php $non_jumbo = $jumbo_rates['Returned'][0]['DetailData'];?>
                 <tr>
                    <th> Deposit Products</th>
                    <th>National Rate</th>
                    <th>National Rate Cap</th>
                </tr>
                <?php  foreach($non_jumbo as $data)
                    {?>
                        <tr>
                            <td><?php echo $data['ProductID'] ?></td>
                            <td><?php echo $data['NationalRate'] ?></td>
                            <td><?php echo $data['NationalRateCap'] ?></td>
                        </tr>
                <?php }
                    ?>
                </table>
            </div>
            <div class="col-md-3">
            </div>         
        </div>
</div>
<div class="container pb-5">
<small>*The rate cap is determined by adding 75 basis points to the national rate.
To determine conformance with the regulation, compare rates offered by the institution,
based on size and maturity of the deposit, to the rate caps. For accounts less than $100,000 use
   the applicable rate cap under the non-jumbo column, and for accounts $100,000 and over, use the 
   rate caps under the jumbo column. 
Interpolation should be used for deposits with maturities not listed above.</small>
</div>









 



