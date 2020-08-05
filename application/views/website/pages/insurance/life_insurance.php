
  
  <style>
  .table-bordered {
    border: 1px solid #CB9D24 !important;
  }
  </style>
  <!--==========================
    over view banner
  ============================-->
  <div class="overview_banner mb-4">
        <div class="banner_heading">
        <h1 class="display-4">Life Insurance</h1>
        <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum dolorem hic<br/>
            Its just a dummy text to show the design only  dummy textx dummy</h6>
        </div>
  </div>

  <div class="col-md-10 mx-auto pt-5">
    <div class="row">
        <div class="col-md-12">
            <!-- <span>Bank Reviews ></span> <span class="text_yellow">Aliiant Bank</span> -->
            <h2 class="font-weight-900 pt-2 mb-2">Headline About Life Insurance</h2>
            <span>Published on July 30. Do you want to get more information ?</span>
        </div>
       
    </div>
</div>

    <?php if(count($page_data)>=1){
        foreach($page_data as $index=> $d){
          if($d->div_type == "normal_content"){?>
            
            <div class="col-md-10 mx-auto  pt-4 ">
                <h4 class="border_bottom_golden font-weight-900"><?php echo $d->heading?></h4>
                <p><?php echo $d->content?> </p>
            </div>
            <?php  if($index == 1)
            {?>
               <h1 class="text-center" >CALCULATOR WILL COME HERE </h1>
            <?php } 
          } 
        }
    }?>

    <br/><br/>


<div class="col-md-10 mx-auto">
    <h4 class="border_bottom_golden font-weight-900">Life Insurance Rates</h4>
    <table class="table table-bordered  text-secondary font-weight-bold">
        <thead>
            <tr>
                <th class="">Age at Purchase</th>
                <th class="">Policy Amount</th>             
                <th class="">20-year term</th>
                <th class="">30-year term</th>
                <th class="">Whole Life</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="">Male, 30</th>
                <th class="">$250,000</th>             
                <th class="">$148</th>
                <th class="">$220</th>
                <th class="">$1,829</th> 
            </tr>                                 
            <tr>
                <th class="">Male, 30</th>
                <th class="">$250,000</th>             
                <th class="">$148</th>
                <th class="">$220</th>
                <th class="">$1,829</th>                   
            </tr>                                      
            <tr>
                <th class="">Male, 30</th>
                <th class="">$250,000</th>             
                <th class="">$148</th>
                <th class="">$220</th>
                <th class="">$1,829</th>                  
            </tr>                                      
        </tbody>  
    </table>   
</div>

<!-- <div class="col-md-10 mx-auto">
    <table class="table table-bordered text-secondary font-weight-bold">
        <thead>
            <tr>
                <th class="w-25">State</th>
                <th>Full Coverage</th>             
                <th>Minimum Coverage</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                 <td>Alabama</td>
                 <td>$1,198</td>
                 <td>$478</td>                  
            </tr>                     
            <tr>
                 <td>Alabama</td>
                 <td>$1,198</td>
                 <td>$478</td>                  
            </tr>                                      
            <tr>
                 <td>Alabama</td>
                 <td>$1,198</td>
                 <td>$478</td>                  
            </tr>                                      
        </tbody>  
    </table>   
</div> -->
 

 <!-- <div class="col-md-10 mx-auto  py-5 ">
       <h4 class="border_bottom_golden font-weight-900">Related Articles</h4>    
        <?php if(count($page_data)>=1){
            foreach($page_data as $d){
            if($d->div_type == "realted_article"){?>
                <div class="col-md-12 mx-auto row px-0">
                    <div class="col-md-6 related_image" style="background-image:url('<?php echo base_url() . $d->image ?>')">
                    </div>
                    <div class="col-md-6 related_content">
                        <p class="mb-2">EDITOR'S PICK </p>
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
        
      
</div> -->
