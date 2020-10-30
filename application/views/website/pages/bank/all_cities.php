<style>
a{
    color:black;
}
</style>
<!-- Bank locator -->

     <?php foreach($city_data['Returning'][0] as $key=>$value)
     {
        foreach($value as $index=>$bank){
        $StateFullName = $bank['stateName'];

     } }?>  

<div class="container pt-5">
    <div class="row">
        <div class="col-md-8">
            <span><a href="<?php echo base_url()?>bank_overview">Banking Overview </a> ><a href="<?php echo base_url()?>branch_locator"> Bank Branch Locator </a> ></span> <span class="text_yellow"><?php echo $StateFullName?> Banks</span>
            <h2 class="font-weight-900 pt-3 mb-2 text-uppercase">BANKS IN <?php echo $StateFullName?></h2>
            <!-- <span>Published on <?php echo date('M Y')?>. Do you want to get more information ?</span> -->
        </div>
        <div class="col-md-4 text-right pt-4">
            <!-- <button class="btn button_blue">DOWNLOAD OUR APP</button> -->
        </div>
    </div>
</div>

<div class="container mt-5" style="border:2px solid gray">
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
</div>


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
                                <div class="dbox ">
                                    <span class="ab blu"><?php echo $d[0]?></span>
                                    <a href="<?php echo base_url()?>bank_city/<?php echo $d[0]?>/<?php echo $d[1]?>" title="<?php echo $d[1]?>" class="litem"><?php echo $d[1]?></a>
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
</script>









 



