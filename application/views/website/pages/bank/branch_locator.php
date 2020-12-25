<style>
.map_search_bar{
    background-color:black;
    color:white;
}
</style>

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
<div class="container pt-3">
    <div class="col-md-10 px-0" style="border:1px solid #D79F01">
        <div class="col-md-12 py-3 map_search_bar px-3"> 
            <div class="row">
                <div class="col-md-9 pt-2">CHOOSE YOUR STATE OR ENTER YOUR ZIP CODE TO FIND BANKS NEAR YOU</div>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" id="zipcode" class="form-control bg-white" placeholder="Enter Zip Code" style="font-size:12px">
                        <div class="input-group-append" onclick="serch_by_zip()">                   
                            <button class="btn" > <i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <iframe src="https://createaclickablemap.com/map.php?&id=96221&maplocation=false&online=true" width="100%" height="550" style="border: none;"></iframe>
        <script>if (window.addEventListener){ window.addEventListener("message", function(event) { if(event.data.length >= 22) { if( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); } }, false); } else if (window.attachEvent){ window.attachEvent("message", function(event) { if( event.data.length >= 22) { if ( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); } }, false); } </script>
    </div>
</div>

<!-- Bank locator -->
<div class="container pt-4">
    <div id="map_search_result" class="row pt-4" style="display:none">
       <!-- search result -->
        <!-- <div class="col-md-10">
            <h3 class="text-uppercase">SEARCH RESULT</h3>
            <div class="col-md-12 background_blue">
                <h6 class="text-white py-2 text-left">Bank of Ameria</h6>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="content">
                        <img src="<?php echo base_url();?>assets/img/oerview/image_not_available.jpg" alt="">
                        <h6 class="font-weight-bold">Bank of America</h6>
                        <small>abcd address isdjf ahdfaf, 10001</small>
                    </div><hr>
                </div>
            </div>
        </div> -->
    </div>
    <div class="row pt-3">
        <div class="col-md-10">
            <h4 class="mb-2 px-2">SEARCH BANK BY STATE</h4>
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
            <h4 class="mb-2 px-2">TOP 50 BANKS IN THE United States</h4>
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

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script>
$('#zipcode').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
    serch_by_zip();
  }
}); 

function serch_by_zip()
{
    var zipcode = $('#zipcode').val();
    let formData = new FormData();
    formData.append("zipcode",zipcode);
    let url = baseUrl + "api/search_bank_by_zip";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            $(window).scrollTop(700);
            let obj = JSON.parse(xhr.responseText);
            let d = obj
            let data = d['Returned'];
            let before_list =  '<div class="col-md-10">'+
                                   '<h3 class="text-uppercase px-2">SEARCH RESULT</h3>'
            let after_list =  '</div>'
            if(data)
            {    
                let list = "";
                for(var i=0;i<data.length;i++)
                {
                    var d1 = data[i];
                        
                    for(let a in d1)
                    {
                        list =list + '<div class="col-md-12 background_blue">'+
                                    '<h6 class="text-white py-2 text-left">'+a+'</h6>'+
                                    '</div>'+     
                                    '<div class="row mb-3">'
                                    for (let b in d1[a])
                                    {
                                        list =list + '<div class="col-md-6">'+
                                        '        <div class="content">'+
                                        '            <img src="'+baseUrl+'assets/img/overview/image_not_available.jpg"/>'+
                                        '            <h6 class="font-weight-bold">'+d1[a][b].bankName+'</h6>'+
                                        '            <small>'+d1[a][b].address+', '+d1[a][b].postalCode+'</small>'+
                                        '        </div><hr>'+
                                        '    </div>'
                                    }
                                    list = list+ '</div>'
                    };      
                }        
                
                $("#map_search_result").html(before_list + list +after_list);
                $("#map_search_result").css("display","block");  
            }
            
            else{
                $("#map_search_result").css("display","block");
                $("#map_search_result").html(before_list+"<h5 class='text-danger pl-2'>OPPS! NO DATA FOUND</h5>"+after_list);
            }        
        }
    };
}
</script>



 



