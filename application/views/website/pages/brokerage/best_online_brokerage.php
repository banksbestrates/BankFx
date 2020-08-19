
  <!--==========================
    over view banner
  ============================-->
  <div class="overview_banner">
    <div class="banner_heading w-75">
        <?php if(count($page_data)>=1){
              foreach($page_data as $d){
                if($d->div_type == "overview_heading"){?>
                  <h1><?php echo $d->heading ?></h1>
                  <p><?php echo $d->content ?></p>
          <?php } 
          }
        }?>
    </div>
  </div>

<div class="container pb-3"> 
    <div class="col-md-12 row px-0">
        <div class="col-md-10">
            <!-- <span>Bank Reviews ></span> <span class="text_yellow">Aliiant Bank</span> -->
            <h2 class="font-weight-900 pt-4 mb-2">The Best Online Brokers for <?php echo date("Y"); ?> </h2>
            <span>Published on <?php echo date("M d"); ?> . Do you want to get more information ?</span>
        </div> 
        <div class="col-md-2">
            
        </div> 
    </div>
</div>

<?php if(count($page_data)>=1){
      foreach($page_data as $d){
      if($d->div_type == "normal_content"){?>
        <div class="container pt-5 ">
            <h4 class="border_bottom_golden font-weight-900"><?php echo $d->heading?></h4>
            <p><?php echo $d->content?></p>
        </div>
      <?php }
      }
}?>


<div class="container py-4">
    <h4 class="border_bottom_golden font-weight-900">Best Online Brokers</h4>
    <table class="table text-center text-secondary font-weight-bold">
        <thead>
            <tr>
                <th class="w-25">Broker</th>
                <th>Rating             </th>             
                <th>Commissions        </th>
                <th>Account Minimum    </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                 <td class="table_bank_image">
                 <img src="<?php echo base_url();?>assets/img/bank_images/bank_of_america.png" class="w-75"><br>
                 </td>
                 <td>
                     <span class="fa fa-star  checked"></span>
                     <span class="fa fa-star  checked"></span>
                     <span class="fa fa-star  checked"></span>
                     <span class="fa fa-star  checked"></span>
                     <span class="fa fa-star  checked"></span>
                 </td>
                 <td>
                     <span>#123456</span>
                 </td>
                 <td>
                     <span>$500</span>
                 </td>
                 <td>
                     <a href="<?php echo base_url();?>branch_locator">
                     <h4><button class="btn button_blue btn-sm  px-5">APPLY NOW</button></h4></a>
                 </td>              
            </tr>       
            <tr>
                 <td class="table_bank_image">
                 <img src="<?php echo base_url();?>assets/img/bank_images/usbank.png" class="w-75"><br>
                 </td>
                 <td>
                     <span class="fa fa-star  checked"></span>
                     <span class="fa fa-star  checked"></span>
                     <span class="fa fa-star  checked"></span>
                     <span class="fa fa-star  checked"></span>
                     <span class="fa fa-star  checked"></span>
                 </td>
                 <td>
                     <span>#123456</span>
                 </td>
                 <td>
                     <span>$500</span>
                 </td>
                 <td>
                     <a href="<?php echo base_url();?>branch_locator">
                     <h4><button class="btn button_blue btn-sm  px-5">APPLY NOW</button></h4></a>
                 </td>              
            </tr>       
            <tr>
                 <td class="table_bank_image">
                 <img src="<?php echo base_url();?>assets/img/bank_images/region.png" class="w-75"><br>
                 </td>
                 <td>
                     <span class="fa fa-star  checked"></span>
                     <span class="fa fa-star  checked"></span>
                     <span class="fa fa-star  checked"></span>
                     <span class="fa fa-star  checked"></span>
                     <span class="fa fa-star  checked"></span>
                 </td>
                 <td>
                     <span>#123456</span>
                 </td>
                 <td>
                     <span>$500</span>
                 </td>
                 <td>
                     <a href="<?php echo base_url();?>branch_locator">
                     <h4><button class="btn button_blue btn-sm  px-5">APPLY NOW</button></h4></a>
                 </td>              
            </tr>       
                 
                     

        </tbody>  
    </table>   
    <small>
            This line can be used as a disclaimer for when the information was pulled last. 
            Thus way the end user might feel more confident with up-to-date numbers.
    </small>
</div>
 
<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/investingProcess.js"></script>
<script>
    get_best_online_brokerage_posts();
</script>
