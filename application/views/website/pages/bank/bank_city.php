
<!-- Bank locator -->

<div class="container pt-5">
    <div class="row">
        <div class="col-md-8">
            <span><a href="<?php echo base_url()?>bank_overview">Banking Overview</a> > <a href="<?php echo base_url()?>branch_locator">Bank Branch Locator</a> > </span><span class="text_yellow">  <?php echo $data['City']['FullList'][0]?>,  <?php echo $data['State']['FullList'][0]?></span>
            <h2 class="font-weight-900 pt-2 mb-2 text-uppercase">BANKS IN <?php echo $data['City']['FullList'][0]?>, <?php echo $data['State']['FullList'][0]?></h2>
            <!-- <span>Published by <?php echo date('M Y')?> Do we need to have this information?</span> -->
        </div>
        <!-- <div class="col-md-4 text-right pt-4">
           
        </div> -->
    </div>
</div>

<!-- zip box view -->
<div class="container py-5">  
    <div class="col-md-12">
        <div class="row">
                <div class="col-md-10 box_round_border">
                    <div class="row">
                        <div class="col-md-5 px-0 location_div" id="bank_search_result_scroll">   
                            <div class="zip_code py-2 px-4">
                                <div class="input-group" style="border:none">
                                    <input class="form-control py-2 border-right-0 border" type="text" value=""  placeholder="ZIP CODE" id="zipcode">
                                    <span class="input-group-append border">
                                        <div class="input-group-text bg-transparent" style="border:none;cursor:pointer" onclick="search_by_zip()">
                                        <i class="fa fa-search pt-1" style="font-size:25px"></i></div>
                                    </span>
                                </div>
                            </div>    
                            <div class="" id="bank_data">
                                <!-- <?php  for($i=0 ;$i<count($data['Returned']);$i++)
                                {
                                    foreach($data['Returned'][$i] as $key=>$value)
                                    {  
                                        foreach($value as $bank)
                                        {?>
                                            <div class=" py-4 px-4" style="border-top:2px solid">
                                                <h6 class="mb-2"><?php echo $bank['bankName']?></h6>
                                                <span><?php echo $bank['address']?>,<br>
                                                        <?php echo $bank['stateAbbr']?> <?php echo $bank['postalCode']?></span><br/><br/>
                                                <span class="mt-4">Phone:(123) 456 - 789</span><br>
                                                <span>www.branchwebsite.com</span><span style="float:right"><i class="fa fa-map-marker" aria-hidden="true" style="font-size:60px"></i><br>0.82 mi</span><br>
                                                <br><span>HOURS</span>
                                            </div>  
                                    <?php   }
                                    }
                                }?> -->
                            </div>
                            <div class="" id="search_bank_data" style="display:none">
                            </div>
                        </div>
                        <div class="col-md-7 px-0 image_div"> 
                            <div id="map"></div> 
                        </div>
                    </div>
                </div>

                <div class="col-md-3">   
                </div>
        </div>
    </div>
</div>


<div class="container py-5">
    <!-- <h3 class="font-weight-900 text-uppercase">LIST OF BANKS IN <?php echo $data['City']['FullList'][0]?>, <?php echo $data['State']['FullList'][0]?></h3> -->
      
        <?php  for($i=0 ;$i<count($data['Returned']) ;$i++)
        {
            foreach($data['Returned'][$i] as $key=>$value)
            { ?>
                <div class="col-md-12 background_blue">
                    <h6 class="text-white py-2 text-left"><?php echo $key ?></h6>
                </div>
                <div class="row mb-3">
                    <?php foreach($value as $bank){?>
                        <div class="col-md-6">
                            <div class="content">
                                <?php if($bank['imagePath']==" "){?>
                                    <img src="<?php echo base_url();?>assets/img/oerview/image_not_available.jpg" alt="">
                                <?php }else{?>
                                    <img src="<?php echo $bank['imagePath']?>" alt="" >
                                <?php }?>
                               
                                <h6 class="font-weight-bold"><?php echo $bank['bankName']?></h6>
                                <small><?php echo $bank['address']?>, <?php echo $bank['postalCode']?></small>
                            </div><hr>
                        </div>
                    <?php } ?>
                </div>

        <?php } }?>
</div>

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLDmvcZpQKHnbkEg76bk9jMd4QB_kZw4c&callback=initMap"></script>

<script>
get_all_banks_incity('<?php echo $state_code?>','<?php echo $city_name ?>');
// initMap();
// function initMap() {

//     if (navigator.geolocation) {
// 		navigator.geolocation.getCurrentPosition(function(position) {
//             //  var myLatLng = {lat: 40.7143528, lng: -74.0059731};
//             var myLatLng = {lat: position.coords.latitude, lng: position.coords.longitude};

//             var map = new google.maps.Map(document.getElementById('map'), {
//             zoom: 15,
//             center: myLatLng
//             });

//             var marker = new google.maps.Marker({
//                 position: myLatLng,
//                 map: map,
//                 title: 'My Location'
//                 });
//             });
//         }
 
// }

$('#zipcode').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
    var zipcode = $('#zipcode').val();
    // alert(zipcode);
    let formData = new FormData();
    formData.append("zipcode",zipcode);
    let url = baseUrl + "api/search_bank_by_zip";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
      
            let obj = JSON.parse(xhr.responseText);
            let d = obj
            let data = d['Returned'];
            if(data)
            {
                $("#bank_data").css("display","none");
            }else{
                alert("No Data Availbale");
                return false;
            }
            
            let allData = new Array();
            for(var i=0;i<data.length;i++)
            {
               var d1 = data[i];
                    
                console.log(d1);
                for(let a in d1)
                {
                    for (let b in d1[a])
                    {
                        allData.push(d1[a][b])
                    }
                    
                };
                
            }
            var list ="";  

            var bank_1 ={lat: parseFloat(allData[0].latitude), lng: parseFloat(allData[0].longitude)};
            var infoWindow = new google.maps.InfoWindow();
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: bank_1
            });
          
         var latlngbounds = new google.maps.LatLngBounds();
         for(var j=0;j<allData.length;j++)
         {

           list += '<div class=" py-4 px-4" style="border-top:2px solid">'+
                   '                         <h6 class="mb-2">'+allData[j].bankName+'</h6>'+
                   '                         <span>'+allData[j].address+' ,<br>'+ allData[j].stateAbbr + ', '+  allData[j].postalCode+'</span>'+
                   '                               <br/><br/>'+
                //    '                         <span class="mt-4">Phone:(123) 456 - 789</span><br>'+
                '                       <a href="http://'+allData[j].mainURL+'" target="_blank"><span class="mt-2">'+allData[j].mainURL+'</span></a>'+
                //    '                           <span style="float:right"><i class="fa fa-map-marker" aria-hidden="true" style="font-size:60px"></i><br>0.82 mi</span><br>'+
                //    '                         <br><span>HOURS</span>'+
                   '                     </div>'

      
                // Locations of landmarks
                if(allData[j].latitude!="" &&  allData[j].longitude!="")
                {
                    var bankLatLong = {lat: parseFloat(allData[j].latitude), lng: parseFloat(allData[j].longitude)};
                    var mk1 = new google.maps.Marker({position: bankLatLong, map: map,title:allData[j].bankName, description:allData[j].address});   
                    latlngbounds.extend(bankLatLong);
                }
              
         }
            var bounds = new google.maps.LatLngBounds();
            //Center map and adjust Zoom based on the position of all markers.
            map.setCenter(latlngbounds.getCenter());
            map.fitBounds(latlngbounds);


         $("#search_bank_data").html(list);
         $("#search_bank_data").css("display","block");          
        }
    };
  }
}); 

function search_by_zip()
{
    var zipcode = $('#zipcode').val();
    // alert(zipcode);
    let formData = new FormData();
    formData.append("zipcode",zipcode);
    let url = baseUrl + "api/search_bank_by_zip";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
           
            let obj = JSON.parse(xhr.responseText);
            let d = obj
            let data = d['Returned'];
            if(data)
            {
                $("#bank_data").css("display","none");
            }else{
                alert("No Data Available");
                return false;
            }
            
            let allData = new Array();
            for(var i=0;i<data.length;i++)
            {
               var d1 = data[i];
                    
                for(let a in d1)
                {
                    for (let b in d1[a])
                    {
                        allData.push(d1[a][b])
                    }
                    
                };
                
            }
        var list =""; 
        var bank_1 ={lat: parseFloat(allData[0].latitude), lng: parseFloat(allData[0].longitude)};
            var infoWindow = new google.maps.InfoWindow();
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: bank_1
            });
          
         var latlngbounds = new google.maps.LatLngBounds();
         for(var j=0;j<allData.length;j++)
         {

           list += '<div class=" py-4 px-4" style="border-top:2px solid">'+
                   '                         <h6 class="mb-2">'+allData[j].bankName+'</h6>'+
                   '                         <span>'+allData[j].address+' ,<br>'+ allData[j].stateAbbr + ', '+  allData[j].postalCode+'</span>'+
                   '                               <br/><br/>'+
                //    '                         <span class="mt-4">Phone:(123) 456 - 789</span><br>'+
                '                       <a href="http://'+allData[j].mainURL+'" target="_blank"><span class="mt-2">'+allData[j].mainURL+'</span></a>'+
                //    '                           <span style="float:right"><i class="fa fa-map-marker" aria-hidden="true" style="font-size:60px"></i><br>0.82 mi</span><br>'+
                //    '                         <br><span>HOURS</span>'+
                   '                     </div>'

      
                // Locations of landmarks
            
                if(allData[j].latitude!="" &&  allData[j].longitude!="")
                {
                    var bankLatLong = {lat: parseFloat(allData[j].latitude), lng: parseFloat(allData[j].longitude)};
                    var mk1 = new google.maps.Marker({position: bankLatLong, map: map,title:allData[j].bankName, description:allData[j].address});   
                    latlngbounds.extend(bankLatLong);
                }
         }
            var bounds = new google.maps.LatLngBounds();
            //Center map and adjust Zoom based on the position of all markers.
            map.setCenter(latlngbounds.getCenter());
            map.fitBounds(latlngbounds);


         $("#search_bank_data").html(list);
         $("#search_bank_data").css("display","block");    
 
        }
    };
}

function get_all_banks_incity(state_code,city_name)
{
    let formData = new FormData();
    formData.append("state_code",state_code);
    formData.append("city_name",city_name);
    let url = baseUrl + "api/get_all_city_banks";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
           
            let obj = JSON.parse(xhr.responseText);
            let d = obj
            let data = d['Returned'];
            if(data)
            {
                $("#search_bank_data").css("display","none");
            }else{
                alert("No Data Available");
                return false;
            }
            
            let allData = new Array();
            for(var i=0;i<data.length;i++)
            {
               var d1 = data[i];
                    
                for(let a in d1)
                {
                    for (let b in d1[a])
                    {
                        allData.push(d1[a][b])
                    }
                    
                };
                
            }
        var list =""; 
        var bank_1 ={lat: parseFloat(allData[0].latitude), lng: parseFloat(allData[0].longitude)};
            var infoWindow = new google.maps.InfoWindow();
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: bank_1
            });
          
         var latlngbounds = new google.maps.LatLngBounds();
         for(var j=0;j<allData.length;j++)
         {

           list += '<div class=" py-4 px-4" style="border-top:2px solid">'+
                   '                         <h6 class="mb-2">'+allData[j].bankName+'</h6>'+
                   '                         <span>'+allData[j].address+' ,<br>'+ allData[j].stateAbbr + ', '+ allData[j].postalCode+'</span>'+
                   '                               <br/><br/>'+
                //    '                         <span class="mt-4">Phone:(123) 456 - 789</span><br>'+
                   '                       <a href="http://'+allData[j].mainURL+'" target="_blank"><span class="mt-2">'+allData[j].mainURL+'</span></a>'+
                //    '                           <span style="float:right"><i class="fa fa-map-marker" aria-hidden="true" style="font-size:60px"></i><br>0.82 mi</span><br>'+
                //    '                         <br><span>HOURS</span>'+
                   '                     </div>'

      
                // Locations of landmarks
            
                if(allData[j].latitude!="" &&  allData[j].longitude!="")
                {
                    var bankLatLong = {lat: parseFloat(allData[j].latitude), lng: parseFloat(allData[j].longitude)};
                    var mk1 = new google.maps.Marker({position: bankLatLong, map: map,title:allData[j].bankName, description:allData[j].address});   
                    latlngbounds.extend(bankLatLong);
                }
         }
            var bounds = new google.maps.LatLngBounds();
            //Center map and adjust Zoom based on the position of all markers.
            map.setCenter(latlngbounds.getCenter());
            map.fitBounds(latlngbounds);


         $("#bank_data").html(list);
         $("#bank_data").css("display","block");    
 
        }
    };
}


</script>



