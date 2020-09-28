
<!-- Bank locator -->
<div class="container pt-5">
    <div class="row">
        <div class="col-md-8">
            <!-- <span>Banking Overview > Bank Branch Locator ></span> <span class="text_yellow">  California Banks</span> -->
            <h2 class="font-weight-900 pt-3 mb-2">BRANCH LOCATOR</h2>
            <!-- <span>Published on <?php echo date('M d')?>. Do you want to get more information ?</span> -->
        </div>
        <div class="col-md-4 text-right pt-4">
            <!-- <button class="btn button_blue">DOWNLOAD OUR APP</button> -->
        </div>
    </div>
</div>

<!-- Map -->
<div class="container">
<iframe src="https://createaclickablemap.com/map.php?&id=96221&maplocation=false&online=true" width="80%" height="550" style="border: none;"></iframe>
        <script>if (window.addEventListener){ window.addEventListener("message", function(event) { if(event.data.length >= 22) { if( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); } }, false); } else if (window.attachEvent){ window.attachEvent("message", function(event) { if( event.data.length >= 22) { if ( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); } }, false); } </script>
</div>

<!-- Bank locator -->
<div class="container pt-4">
    <div class="row">
        <div class="col-md-10">
            <h4 class="mb-2 pl-2">SEARCH BANK BY STATE</h4>
            <ul class="listing">
        
            <?php  for($i=0 ;$i<count($all_states['Returning']) ;$i++)
             {
                foreach($all_states['Returning'][$i] as $key=>$value){
                    foreach($value as $state){?>
                        <li>
                            <div class="dbox ">
                                <span class="ab blu"><?php echo $state['stateCode']?></span>
                                <a href="<?php echo base_url()?>state/<?php echo $state['stateCode']?>"  class="litem"><?php echo $key?></a>
                            </div>
                            <div class="total_cities"><small><?php echo $state['bankingGroups']?> Banks - <?php echo $state['branchLocations']?> Branches</small></div>
                        </li>
            <?php }
                }
             }?>
            

                <!-- <li>
                    <div class="dbox ">
                        <span class="ab blu">AL</span>
                        <a href="<?php echo base_url()?>bank_state" title="Alabama Banks" class="litem">Alabama</a>
                    </div>
                    <div class="total_cities"><small>63 Banks - 353 Offices</small></div>
                </li>              -->
            </ul>
        </div>
       
    </div>
</div>

<!-- top 50 banks in united states -->
<!-- Bank locator -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-10">
            <h4 class="mb-2">TOP 50 BANKS IN THE United States</h4>
            <ul class="listing">
            <!-- <?php print_r($data['Returned']); ?> -->

            <?php foreach($data['Returned'] as $d)
            {?>
                 <li style="height:190px">
                    <div class="text-center top_50_bank_image py-4">
                        <?php if($d['ImagePath']==""){?>
                            <img src="<?php echo base_url()?>assets/img/overview/image_not_available.jpg" class="w-100 px-2">
                        <?php } else{?>
                         <img src="<?php echo $d['ImagePath']?>" class="w-100 px-2">
                        <?php }?>
                    </div>
                    <div class="text-center"><h6 class="mb-0"><?php echo $d['BankName']?></h6>
                    <!-- <small>353 Offices in 37 States</small></div>         -->
                </li>
            <?php }?>
            </ul>
        </div>
       
    </div>
</div>



 



