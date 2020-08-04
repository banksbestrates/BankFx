
  <!--==========================
    over view banner
  ============================-->
  <div class="overview_banner mb-4">
        <div class="banner_heading">
        <h1 class="display-4">Best Brokers for Beginners</h1>
        <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum dolorem hic<br/>
                Its just a dummy text to show the design only  dummy textx dummy</h6>
        </div>
  </div>

  <div class="col-md-10 mx-auto pt-5">
    <div class="row">
        <div class="col-md-12">
            <!-- <span>Bank Reviews ></span> <span class="text_yellow">Aliiant Bank</span> -->
            <h2 class="font-weight-900 pt-2 mb-2">Best Brokers for Beginners in 2020 </h2>
            <span>Published on July 30. Do you want to get more information ?</span>
        </div>
       
    </div>
  </div>

<?php if(count($page_data)>=1){
      foreach($page_data as $d){
      if($d->div_type == "normal_content"){?>
        <div class="col-md-10 mx-auto pt-5 ">
            <h4 class="border_bottom_golden font-weight-900"><?php echo $d->heading?></h4>
            <p><?php echo $d->content?></p>
        </div>
      <?php }
      }
}?>


<div class="col-md-10 mx-auto pt-4">
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
 
 <!-- Content Related to Loans -->
 <div class="col-md-10 mx-auto  py-5 ">
    <h4 class="border_bottom_golden font-weight-900">Related Articles</h4>    
    <?php if(count($page_data)>=1){
      foreach($page_data as $d){
      if($d->div_type == "related_article"){?>
        <div class="col-md-12 mx-auto row px-0">
            <div class="col-md-6 related_image" style="background-image:url(<?php echo base_url().$d->image?>)">
            </div>
            <div class="col-md-6 related_content">
                <p class="mb-1">EDITOR'S PICK </p>
                <h4><?php echo $d->heading?></h4>
                <p><?php echo $d->content?></p>
                  <div class="row">
                        <div class="col-md-1">
                          <i class="fa fa-arrow-circle-right"  aria-hidden="true"></i>
                        </div>
                        <div class="col-md-8 pt-2">6 MIN </div>
                    </div>
            </div>
        </div>
      <?php }
      }
    }?>
     
</div>
