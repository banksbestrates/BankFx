
  <!--==========================
    over view banner
  ============================-->
  <?php if(count($page_data)>=1){
            foreach($page_data as $d){
              if($d->div_type == "overview_heading"){?>
                  <!-- <div class="overview_banner" style="background-image:linear-gradient(to left, rgba(245, 246, 252, 0.02), rgba(13, 13, 13, 0.73)),url('<?php echo base_url().$d->image ?>"> -->
                  <div class="overview_banner" style="background-image:url('<?php echo base_url().$d->image ?>')">
                  <div class="banner_heading">
                    <h1 class="display-4"><?php echo $d->heading ?></h1>
                    <div id="heading_content_text"><?php echo $d->content?></div>
                  </div>
                </div>
        <?php } 
        }
    }?>

<div class="container"> 
    <div class="col-md-12 row px-0">
        <!-- <div class="col-md-10">  
            <h2 class="font-weight-900 pt-4 mb-2">The Best Online Brokers for <?php echo date("Y"); ?> </h2>
        </div> 
        <div class="col-md-2">     
        </div>  -->
    </div>
</div>

<div id="brokerage_posts">
</div>

<!-- <?php if(count($page_data)>=1){
      foreach($page_data as $d){
      if($d->div_type == "normal_content"){?>
        <div class="container pt-5 ">
            <h4 class="border_bottom_golden font-weight-900"><?php echo $d->heading?></h4>
            <p><?php echo $d->content?></p>
        </div>
      <?php }
      }
}?> -->


<!-- <div class="container py-4">
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
</div> -->

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/brokerageProcess.js"></script>
<script>
  get_best_brokerage_posts();
</script>
 

