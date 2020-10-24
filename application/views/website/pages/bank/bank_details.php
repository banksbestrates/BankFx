

<!-- Bank detail  -->
<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <span>  Banking Overview > Bank Branch Locator > California Banks</span><span class="text_yellow"> Vallejo, CA</span>
            <h2 class="font-weight-900 pt-2 mb-2 text-uppercase">Bank of America VALLEJO PLAZA</h2>
            <!-- <span>Published by <?php echo date('M Y')?> Do we need to have this information?</span> -->
        </div>
        <div class="col-md-4 text-right pt-4">
            <!-- <button class="btn button_blue btn-sm">DOWNLOAD OUR APP</button> -->
        </div>
    </div>
</div>

<!-- zip box view -->
<div class="container">  
    <div class="row">
        <div class="col-md-10 box_round_border">
                <div class="row">
                    <div class="col-md-12 px-0 pt-2 border_bottom_golden">
                        <div class="row px-4">
                            <div class="col-md-4 px-4 text-center">
                                <img src="<?php echo base_url()?>assets/img/bank_images/allay_large.png" class="w-100 pt-4" />                                 
                            </div>
                            <div class="col-md-8 pt-2">
                                <span class="fa fa-star checked pr-2" style="font-size:20px"></span>
                                <span class="fa fa-star checked pr-2" style="font-size:20px"></span>
                                <span class="fa fa-star checked pr-2" style="font-size:20px"></span>
                                <span class="fa fa-star checked pr-2" style="font-size:20px"></span>
                                <span class="fa fa-star checked pr-2" style="font-size:20px"></span>
                                <span class="fa fa-star checked pr-2" style="font-size:20px"></span>
                                <span style="font-size:24px" class="font-weight-900 pl-3">5.0</span>
                                <small class="pl-2 text_skyblue font-weight-bold" style="font-size: 14px;">Banks Best Rating</small>
                                <div class="pt-2">
                                    <table class="table credit_card_small_row">
                                        <tbody>
                                            <tr>
                                                <td><small class="font-weight-bold">Branch Name: </small><small>Bank of America Vallejo Plaza</small></td>
                                            </tr>
                                            <tr>
                                                <td><small class="font-weight-bold">Office Address: </small><small> Address 1 , Bank of America Vallejo Plaza</small></td>
                                            </tr>
                                            <tr>
                                            <td><small class="font-weight-bold">Phone Number: </small><small>707-556-5936</small></td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom:none"><small class="font-weight-bold">Service Type:</small><small> Full Service Office</small></td>
                                            </tr>
                                        </tbody>     
                                    </table>
                                </div>
                            </div> 
                        </div>
                    </div> 
                    <div class="col-md-5 px-0 location_div" style="height:440px;overflow:auto">   
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
                            
                                <div class=" py-4 px-4" style="border-top:2px solid">
                                    <h6 class="mb-2">BRANCH NAME</h6>
                                    <span>Address Line number 1,<br>
                                    NY ,123456</span><br/><br/>
                                    <span class="mt-4">Phone:(123) 456 - 789</span><br>
                                    <span>www.branchwebsite.com</span><span style="float:right">
                                    <!-- <i class="fa fa-map-marker" aria-hidden="true" style="font-size:60px"></i><br>0.82 mi</span><br> -->
                                    <!-- <br><span>HOURS</span> -->
                                </div>  
                                <div class=" py-4 px-4" style="border-top:2px solid">
                                    <h6 class="mb-2">BRANCH NAME</h6>
                                    <span>Address Line number 1,<br>
                                    NY ,123456</span><br/><br/>
                                    <span class="mt-4">Phone:(123) 456 - 789</span><br>
                                    <span>www.branchwebsite.com</span><span style="float:right">
                                    <!-- <i class="fa fa-map-marker" aria-hidden="true" style="font-size:60px"></i><br>0.82 mi</span><br> -->
                                    <!-- <br><span>HOURS</span> -->
                                </div> 
                              
                        </div>
                        <div class="" id="search_bank_data" style="display:none">
                        </div>
                    </div>
                    <div class="col-md-7 px-0 image_div"> 
                        <div id="map"></div> 
                    </div>
                </div>
        </div>
        <div class="col-md-2">   
        </div>
    </div>   
</div>

<div class="container-fluid py-5" style="background-color:#f7f7f7">
    <div class="container pb-4">
        <div class="row">
            <div class="col-md-10">
            <h5 class="text-uppercase pl-2 font-weight-900 border_bottom_golden"> OFFICE DETAIL</h5> 
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus dictum nisl ac ultricies. 
            Proin viverra velit rhoncus dignissim luctus. Sed mattis, velit non elementum malesuada, 
            urna turpis mattis libero, semper semper leo tortor vel ex. Vestibulum gravida faucibus vulputate.
             Suspendisse placerat mi eget ipsum egestas, vitae consectetur ipsum tincidunt. Lorem ipsum dolor sit 
             amet, consectetur adipiscing elit. Vestibulum gravida faucibus vulputate. Suspendisse placerat mi eget
              ipsum egestas, vitae consectetur ipsum tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Sed luctus dictum nisl ac ultricies. Proin viverra velit rhoncus dignissim luctus.</p>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div> 
    <div class="container pb-4">
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-uppercase pl-2 font-weight-900 border_bottom_golden">BANK INFORMATION</h5> 
                        <div class="pt-2">
                            <table class="table credit_card_small_row">
                                <tbody>
                                    <tr>
                                        <td><small class="font-weight-bold">Bank Name: </small><small>Bank of America Vallejo Plaza</small></td>
                                    </tr>
                                    <tr>
                                        <td><small class="font-weight-bold">Branch Type: </small><small>National Bank</small></td>
                                    </tr>
                                    <tr>
                                        <td><small class="font-weight-bold">FDIC Insurance: </small><small>#3510</small></td>
                                    </tr>
                                    <tr>
                                        <td><small class="font-weight-bold">Routing Number:</small><small> NA</small></td>
                                    </tr>
                                    <tr>
                                        <td><small class="font-weight-bold">Online Banking:</small><small> bankofamerica.com</small></td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom:none"><small class="font-weight-bold">Branch Count:</small><small>4219 Offices in 37 States</small></td>
                                    </tr>
                                </tbody>     
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-uppercase pl-2 font-weight-900 border_bottom_golden">HOURS</h5> 
                        <div class="pt-2">
                            <table class="table credit_card_small_row">
                                <tbody>
                                    <tr>
                                        <td><small class="font-weight-bold">Monday: </small><small>09:00am - 5:00pm</small></td>
                                    </tr>
                                    <tr>
                                        <td><small class="font-weight-bold">Tuesday: </small><small>09:00am - 5:00pm</small></td>
                                    </tr>
                                    <tr>
                                        <td><small class="font-weight-bold">Wednesday: </small><small>09:00am - 5:00pm</small></td>
                                    </tr>
                                    <tr>
                                        <td><small class="font-weight-bold">Thursday:</small><small>09:00am - 5:00pm</small></td>
                                    </tr>
                                    <tr>
                                        <td><small class="font-weight-bold">Friday:</small><small>09:00am - 5:00pm</small></td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom:none"><small class="font-weight-bold">Saturday:</small><small>09:00am - 5:00pm</small></td>
                                    </tr>
                                </tbody>     
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
    <div class="container">
        <h5 class="text-uppercase pl-2 font-weight-900 border_bottom_golden">REVIEWS</h5> 
        <p>
            Vestibulum gravida faucibus vulputate. Suspendisse placerat mi eget ipsum egestas, vitae consectetur ipsum tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus dictum nisl ac ultricies. Proin viverra velit rhoncus dignissim luctus.
        </p>

        <textarea class="form-control" placeholder="Add a comment..." id="comment"></textarea>
        <!-- <button class="btn-get-started ">Submit</button> -->
    </div> 
</div>

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

$('#comment').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
    var comment = $('#comment').val();
    let formData = new FormData();
    formData.append("comment",comment);
    let url = baseUrl + "api/save_user_bank_comment";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if(status)
            {
                swal({
                    title: "Thankyou!",
                    text: message,
                    icon: "success",
                    timer: 2500,
                    showConfirmButton: false
                    });

                $("#comment").val("");              
            }
            else{
                swal({
                    title: "Oops!",
                    text: message,
                    icon: "warning",
                    });

                $("#comment").val("");
            }
        }
    };
  }
}); 

</script>


 



