<style>
a{
    color:black;
}
.btn-outline-primary {
  color: #2888ae;
  background-color: transparent;
  background-image: none;
  border-color: #2888ae;
}

.btn-outline-primary:hover {
  color: #fff;
  background-color: #2888ae;
  border-color: #2888ae;
}

.btn-outline-primary:focus, .btn-outline-primary.focus {
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}

.btn-outline-primary.disabled, .btn-outline-primary:disabled {
  color: #2888ae;
  background-color: transparent;
}

</style>
<!-- Bank locator -->

     <?php foreach($city_data['Returning'][0] as $key=>$value)
        {
            foreach($value as $index=>$bank){
            $StateFullName = $bank['stateName'];

        }
     }?>  

<div class="container pt-5">
    <div class="row">
        <div class="col-md-8">
            <span><a href="<?php echo base_url()?>bank_overview">Banking Overview </a> ><a href="<?php echo base_url()?>branch_locator"> Bank Branch Locator </a> ></span> <span class="text_yellow"><?php echo $StateFullName?> Banks</span>
            <h2 class="font-weight-900 pt-3 mb-2 text-uppercase" id="bank_heading">BANKS IN <?php echo $StateFullName?></h2>
            <h2 class="font-weight-900 pt-3 mb-2 text-uppercase" style="display:none" id="credit_heading" >CREDIT UNIONS IN <?php echo $StateFullName?></h2>
        </div>
        <div class="col-md-4 text-right pt-4">
        </div>
    </div>
</div>
<div class="container" id="content_div">
    
</div>
<div class="container pt-3">
    <div class="col-md-10 py-4" style="border:1px solid #CEA036">
        <div class="row">
        <div class="col-md-6 my-3"><button class="btn btn-block btn-outline-primary" id="bank_button" onclick="get_bank_type('bank')">BANKS</button></div>
        <div class="col-md-6 my-3"><button class="btn btn-block btn-outline-primary" id="credit_union_button" onclick="get_bank_type('credit_union')">CREDIT UNIONS</button></div>
        </div>
    </div>
</div>

<!-- <div class="container mt-5" style="border:2px solid gray">
    <div class="row">
            <div class="col-md-6 pt-4" >   
                <img src="<?php echo base_url()?>assets/images/website/state_maps/<?php echo $state_code ?>.png" class="w-100"/>                                                              
            </div>
            <div class="col-md-6 px-0" style="border-left:2px solid gray">  
                <div class="button_yellow py-3">
                    <h5 class="text-white mb-0 text-center text-uppercase">FUN BANKING FACTS </h5>
                </div>
                <div class="px-4 py-3" id="fun_facts">
                    
                </div>
            </div>
    </div>
</div> -->


<!-- top banks of california -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-uppercase pl-2"> CITIES AND TOWNS IN <?php echo $StateFullName?></h5>
            <ul class="listing">
                  
            <?php  for($i=0 ;$i<count($city_data['Returning']) ;$i++)
            {
                foreach($city_data['Returning'][$i] as $key=>$value)
                {
                     foreach($value as $index=>$bank){
                        $d = explode(",",$key);
                        ?>     
                            <li>
                                <div class="dbox banks_list">
                                    <span class="ab blu"><?php echo $d[0]?></span>
                                    <a href="<?php echo base_url()?>bank_city/<?php echo $d[0]?>/<?php echo $d[1]?>" title="<?php echo $d[1]?>" class="litem"><?php echo $d[1]?></a>
                                </div>
                                <div class="dbox credit_union_list" style="display:none">
                                    <span class="ab blu"><?php echo $d[0]?></span>
                                    <a href="<?php echo base_url()?>credit_unions/<?php echo $d[0]?>/<?php echo $d[1]?>" title="<?php echo $d[1]?>" class="litem"><?php echo $d[1]?></a>
                                </div>
                                <div class="total_cities"><small><?php echo $bank['bankingGroups']?> Banks - <?php echo $bank['branchLocations']?> Offices</small></div>
                            </li>
                    <?php  }
                } 
            } ?>

                <!-- <?php 
                    $all_cities = ($city_data['City']['FullList']);
                    foreach($all_cities as $city)
                        { 
                        $words = explode(" ", $city);
                        $acronym = "";
                            foreach ($words as $w) {
                            $acronym .= $w[0];
                            }
                    ?>
                        <li>
                        <div class="dbox ">
                            <span class="ab blu"><?php echo $acronym?></span>
                            <a href="<?php echo base_url()?>bank_city/<?php echo $city?>" title="<?php echo $city?>" class="litem"><?php echo $city?></a>
                        </div>
                        <div class="total_cities"><small>63 Banks - 353 Offices</small></div>
                        </li>
                <?php  } ?> -->
            </ul>
        </div>
    </div>
</div>

<!-- articles form wp -->
<div class="container py-5">
        <h3 class="border_bottom_golden">LATEST FROM BANKS BEST RATES</h3>
        <div id="related_articles">
        </div>     
  </div> 


<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/bankProcess.js"></script>
<script>
  get_fun_fact();
  get_best_bank_posts();
    var bank_selected =""
  function get_bank_type(bank_type)
  {
    if(bank_type=="bank")
    { 
        $(".credit_union_list").css("display","none");
        $(".banks_list").css("display","block");
        $("#bank_heading").css("display","block");
        $("#credit_heading").css("display","none");
        // $("#bank_button").css("background-color","#2888ae");
        // $("#credit_button").css("background-color","#ffffff");
    }
    else if(bank_type=="credit_union"){
        $(".credit_union_list").css("display","block");
        $(".banks_list").css("display","none");
        $("#bank_heading").css("display","none");
        $("#credit_heading").css("display","block");
        // $("#bank_button").css("background","#ffffff");
        // $("#credit_button").css("background","#2888ae");
    }
  }
</script>









 



