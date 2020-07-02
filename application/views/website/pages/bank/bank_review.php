
<style>
.review_box{
    border:2px solid #CB9D24; 
    padding:20px 30px 20px 30px;
}
.review_box .review_div .fa{
    font-size:40px;
}
.review_box .rates span{
    color:black;
    font-weight:bold;
}
.icon_view img{
    /* height:100px; */
    width:85px;
}

.map_box {
    border:2px solid #CB9D24; 
    border-top:18px solid #CB9D24;
}
.zip_code{
    background-color:#a7b3deb0
}
.zip_code .form-control{
    border-radius:10px;
    font-size:20px;
    height:55px;
}
.location_div{
    color:#002A75;
    border-right:2px solid #CB9D24;
}
.location_div  h5{
    color:#002A75;
}
.border_div h3::before {
    content: '';
    position: absolute;
    display: block;
    width: 100%;
    height: 3px;
    background: #ddd;
    /* bottom: 1px; */
}
.border_div  h3::after {
    content: '';
    position: absolute;
    display: block;
    width: 60px;
    height: 6px;
    background: #CB9D24;
    /* bottom: 0; */
    left: calc(50% - 20px);
}
.what_to_like span{
    font-size: 30px;
    font-weight: bold;
    position: absolute;
    padding-top: 10px;
    padding-left: 23px;
    color: black;

}
.what_to_like .fa{
    color: #CB9D24;
}
.what_to_like p{
   text-align:justify;
}
.checked{
    color:#CB9D24;
    
}
.star_button_div .fa
{
    font-size:40px;
    padding-right:10px;
}
.star_button_div
{
    text-align:right;
    padding-top:40px;
}
.button_yellow
{
    color:white;
    background-color:#CB9D24;
}


</style>
<!-- Bank Review -->
<div class="col-md-10 mx-auto py-5">
    <div class="row">
        <div class="col-md-8">
            <h1 class="display-4 font-weight-bold mb-2">ALLIANT BANK REVIEW</h1>
            <p>Published on July 30. Do you want to get more information ?</p>
        </div>
        <div class="col-md-4 text-right pt-3">
            <button class="btn button_yellow">DOWNLOAD OUR APP</button>
        </div>
    </div>
</div>

<!-- map view -->
<div class="col-md-10 mx-auto  review_box">
    <!-- 1st div starts here -->
    <div class="row">
            <div class="col-md-5 review_div">        
                    <span class="fa fa-star checked pr-4"></span>
                    <span class="fa fa-star checked pr-4"></span>
                    <span class="fa fa-star checked pr-4"></span>
                    <span class="fa fa-star checked pr-4"></span>
                    <span class="fa fa-star checked pr-4"></span>   
                    <br/><br/>                   
                    <h4><span style="font-weight:300">BANKS BEST RATES</span> RATING</h4>
                    <div class="col-md-9 rates px-0 pb-1">
                    <span>CD's</span> <span class="float-right"> 4.2</span>
                    </div>
                    <div class="col-md-9 rates px-0 pb-1">
                    <span>CHECKING</span> <span class="float-right">5.0</span>
                    </div>
                    <div class="col-md-9 rates px-0 pb-1">
                    <span>SAVING</span> <span class="float-right"> 4.7</span>
                    </div>
                    <div class="compare_rates pt-3 pl-0">
                    <button class="btn button_yellow">COMPARE BANKS BEST RATES</button>
                    
                    </div>                                                          
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 image_div  pt-4">
                    <img src="<?php echo base_url();?>assets/img/overview/bank1.png" style="width:100%">
                    <div class="icon_view col-md-12 px-0 pt-5">
                        <div class="row">
                            <div class="col-md-3">
                            <img src="<?php echo base_url();?>assets/img/icons/best_cd.png" class="pb-3">
                                <h6>SERVICE</h6>
                            </div>
                            <div class="col-md-3">
                            <img src="<?php echo base_url();?>assets/img/icons/best_cd.png" class="pb-3">
                                <h6>SERVICE</h6>
                            </div>
                            <div class="col-md-3">
                            <img src="<?php echo base_url();?>assets/img/icons/best_cd.png" class="pb-3">
                                <h6>SERVICE</h6>
                            </div>
                            <div class="col-md-3">
                            <img src="<?php echo base_url();?>assets/img/icons/best_cd.png" class="pb-3">
                                <h6>SERVICE</h6>
                            </div>  
                        </div>
                    </div>
            </div>
    </div>
</div> 
<div class="col-md-10 mx-auto map_box">
    <!-- 1st div starts here -->
    <div class="row">
            <div class="col-md-5 px-0 location_div">   
                <div class="zip_code py-2 px-4" >
                    <input type="text" class="form-control" placeholder="ZIP CODE">
                </div>    
                <!-- address 1 -->
                <div class=" py-4 px-4" >
                    <h5 class="mb-2">BANK BRANCH</h5>
                    <span > 123456 Street Name Drive<br/>
                        Town Name, ST 1234578</span><br/>
                    <span class="mt-4">Phone:(123) 456 - 789</span><br/>
                    <span>www.branchwebsite.com</span><span style="float:right"><i class="fa fa-map-marker" aria-hidden="true" style="font-size:60px"></i><br/>0.82 mi</span><br/>
                    <br/><span>HOURS</span>
                </div>  
                <!-- address 2  -->
                <div class=" py-4 px-4" style="border-top:2px solid #CB9D24">
                    <h5 class="mb-2">BANK BRANCH</h5>
                    <span > 123456 Street Name Drive<br/>
                        Town Name, ST 1234578</span><br/>
                    <span class="mt-4">Phone:(123) 456 - 789</span><br/>
                    <span>www.branchwebsite.com</span><span style="float:right"><i class="fa fa-map-marker" aria-hidden="true" style="font-size:60px"></i><br/>0.82 mi</span><br/>
                    <br/><span>HOURS</span>
                </div>                                                          
            </div>
            <div class="col-md-7 image_div">  
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d787940.2404064332!2d-92.69448908827884!3d39.516936997260665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87dd3cb0e14b6c91%3A0xafbb5066cf09af0e!2sAlliant%20Bank!5e0!3m2!1sen!2sus!4v1593620227899!5m2!1sen!2sus"
            width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>   
            </div>
    </div>
</div> 
  
<div class="col-md-10 mx-auto py-5">
                <div class="row text-center">
                    <div class="col-md">
                            <img src="<?php echo base_url();?>assets/img/icons/best_cd.png" class="pb-3">
                            <h6>MOBILE BANKING</h6>
                    </div>
                    <div class="col-md">
                            <img src="<?php echo base_url();?>assets/img/icons/best_cd.png" class="pb-3">
                            <h6>FREE CHECKING</h6>
                    </div>
                    <div class="col-md">
                            <img src="<?php echo base_url();?>assets/img/icons/best_cd.png" class="pb-3">
                            <h6>NO MINIMUM BALANCE</h6>
                    </div>
                    <div class="col-md">
                            <img src="<?php echo base_url();?>assets/img/icons/best_cd.png" class="pb-3">
                            <h6>HIGH APY'S</h6>
                    </div>
                    <div class="col-md">
                            <img src="<?php echo base_url();?>assets/img/icons/best_cd.png" class="pb-3">
                            <h6>NO MONTHLY FEES</h6>
                    </div>
                   
                
                </div>
       
</div> 
<!-- row 1 -->
<div class="col-md-10 mx-auto pb-5">
    <div class="border_div">  
        <h3></h3>  
    </div>   
</div> 
<div class="col-md-10  mx-auto">
    <div class="row">
            <div class="col-md-6 what_to_like">
                <i class="fa fa-check-circle fa-4x"></i> <span >WHAT TO LIKE </span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti consequuntur eveniet 
                deserunt debitis corrupti quis expedita, architecto, ducimus vero dolorem
                deserunt debitis corrupti quis expedita, architecto, ducimus vero dolorem
                temporibus amet perferendis voluptates reprehenderit assumenda impedit ea soluta. Quas.</p>
            </div>
            <div class="col-md-6 what_to_like ">
            <i class="fa fa-times-circle fa-4x"></i> <span >WHAT TO BE CAUTION ABOUT </span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti consequuntur eveniet 
                deserunt debitis corrupti quis expedita, architecto, ducimus vero dolorem
                deserunt debitis corrupti quis expedita, architecto, ducimus vero dolorem
                temporibus amet perferendis voluptates reprehenderit assumenda impedit ea soluta. Quas.</p>
            
            </div>
        </div>
</div>
<!-- row 1 -->
<div class="col-md-10 mx-auto pb-5">
    <div class="border_div">  
        <h3></h3>  
    </div>   
</div> 
<div class="col-md-10  mx-auto">
    <div class="row">
            <div class="col-md-6" style="text-align:justify">
                <h3>CD RATES</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti consequuntur eveniet 
                deserunt debitis corrupti quis expedita, architecto, ducimus vero dolorem
                deserunt debitis corrupti quis expedita, architecto, ducimus vero dolorem
                temporibus amet perferendis voluptates reprehenderit assumenda impedit ea soluta. Quas.</p>
            </div>
            <div class="col-md-6 star_button_div">
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star "></span>
                    <br/>
                    <button class="btn mt-4 button_yellow">COMPARE CHECKING RATES</button>                   
            </div>
        </div>
</div>
<!-- row 2 -->
<div class="col-md-10 mx-auto pb-5">
    <div class="border_div">  
        <h3></h3>  
    </div>   
</div> 
<div class="col-md-10  mx-auto">
    <div class="row">
            <div class="col-md-6" style="text-align:justify">
                <h3>CHECKING ACCOOUNT RATES</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti consequuntur eveniet 
                deserunt debitis corrupti quis expedita, architecto, ducimus vero dolorem
                deserunt debitis corrupti quis expedita, architecto, ducimus vero dolorem
                temporibus amet perferendis voluptates reprehenderit assumenda impedit ea soluta. Quas.</p>
            </div>
            <div class="col-md-6 star_button_div">
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star "></span>
                    <br/>
                    <button class="btn mt-4 button_yellow">COMPARE CHECKING RATES</button>                   
            </div>
        </div>
</div>
<!-- row 3 -->
<div class="col-md-10 mx-auto pb-5">
    <div class="border_div">  
        <h3></h3>  
    </div>   
</div> 
<div class="col-md-10  pb-5 mx-auto">
    <div class="row">
            <div class="col-md-6" style="text-align:justify">
                <h3>SAVING ACCOUNT RATES</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti consequuntur eveniet 
                deserunt debitis corrupti quis expedita, architecto, ducimus vero dolorem
                deserunt debitis corrupti quis expedita, architecto, ducimus vero dolorem
                temporibus amet perferendis voluptates reprehenderit assumenda impedit ea soluta. Quas.</p>
            </div>
            <div class="col-md-6 star_button_div">
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <br/>
                    <button class="btn mt-4 button_yellow">COMPARE CHECKING RATES</button>                   
            </div>
        </div>
</div>


  <!-- Darker Gold #CB9D24
Lighter Gold #E6C245
Grey #626262
Blue #002A75 -->

 



