
<!-- Bank locator -->
<div class="col-md-10 mx-auto pt-5">
    <div class="row">
        <div class="col-md-8">
            <span>Banking Overview > Bank Branch Locator ></span> <span class="text_yellow">  California Banks</span>
            <h2 class="font-weight-900 pt-3 mb-2">BANK IN CALIFORNIA</h2>
            <span>Published on July 30. Do you want to get more information ?</span>
        </div>
        <div class="col-md-4 text-right pt-4">
            <button class="btn button_blue">DOWNLOAD OUR APP</button>
        </div>
    </div>
</div>

<div class="col-md-10 mx-auto mt-5" style="border:2px solid gray">
    <div class="row">
            <div class="col-md-6 pt-4" >   
                <img src="<?php echo base_url()?>assets/img/bank_images/map.png" class="w-100"/>                                                              
            </div>
            <div class="col-md-6 px-0" style="border-left:2px solid gray">  
                <div class="button_yellow py-3">
                    <h5 class="text-white mb-0 text-center ">FUN BANKING FACTS ABOUT CALIFORNIA</h5>
                </div>
                <div class="px-4 py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus dictum nisl ac ultricies. Proin viverra velit rhoncus dignissim luctus. Sed mattis, velit non elementum malesuada, urna turpis mattis libero, semper semper leo tortor vel ex. Vestibulum gravida faucibus vulputate. Suspendisse placerat mi eget ipsum egestas, vitae consectetur ipsum tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum gravida faucibus vulputate. Suspendisse placerat mi eget ipsum egestas, vitae consectetur ipsum tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus dictum nisl ac ultricies. Proin viverra velit rhoncus dignissim luctus.
                </div>
            </div>
    </div>
</div>


<!-- top banks of california -->
<div class="col-md-10 mx-auto py-5">
    <div class="row">
        <div class="col-md-12">
            <h5 class="">TOP CITIES AND TOWNS IN CALIFORNIA</h5>
            <ul class="listing">

                    <?php 
                    $curlRef = curl_init();
                    $curlConfig = array(
                          CURLOPT_URL  => 'http://nemo-soft.com/bbr/Location_API.php',
                          CURLOPT_POST  => true,
                          CURLOPT_RETURNTRANSFER => true,
                                                      
                          CURLOPT_POSTFIELDS     => array(
                                'UserName'  => 'schmid@banksbestrates.com',
                                'Password'  => '12345678',
                                'StateCode' => $state_name,
                                )
                            );
                            
                            curl_setopt_array($curlRef, $curlConfig); 
                            $returned_JSON = curl_exec($curlRef);
                            $json = preg_replace('/[[:cntrl:]]/', '', $returned_JSON);
                            $json = json_decode($json, true);          
                            curl_close($curlRef);
                            $all_cities = ($json['City']['FullList']);
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
                                    <a href="<?php echo base_url()?>bank_city" title="<?php echo $city?>" class="litem"><?php echo $city?></a>
                                </div>
                                <div class="total_cities"><small>63 Banks - 353 Offices</small></div>
                                </li>
                        <?php  } ?>
            </ul>
        </div>
       
    </div>
</div>

<div class="col-md-10 mx-auto pb-4">
    <div class="border_div">  
        <h3></h3>  
    </div>   
</div>










 



