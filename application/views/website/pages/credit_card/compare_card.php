
<style>
.form-control{
  line-height:1.5;
}
.checked{
    color:#CB9D24;
}
.rating_point{
    color:black;
    font-size:35px;
    padding-right:20px;
    font-weight:bold;
}
.best_rating_blue{
    font-size:15; 
    position:absolute;
    padding-top:14px;
}
.credit_list_view h6{
margin:0px;
}

.credit_card_image{

    height: 200px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}

</style>
<!-- TOP NAME DIV -->
<div class="col-md-10 mx-auto pt-5 pb-4">
    <div class="row">
        <div class="col-md-8">
            <h1 class=" font-weight-bold mb-2">Compare Cards Side By Side</h1>
            <p>Published on July 30. Do you want to get more information ?</p>
        </div>
        <div class="col-md-4 text-right pt-3">
            <button class="btn button_green">DOWNLOAD OUR APP</button>
        </div>
    </div>
</div>

<div class="col-md-10 mx-auto p-3" style="border:2px solid yellow;border-radius:30px;">
    <div class="row pb-5" style="border-bottom:2px solid red">
        <div class="col-md-4">
            <div class="credit_card_image" style="background-image:url('<?php echo base_url()?>assets/img/overview/credit_card.png')">
            </div>

            <div class="text-center">
                <h5 class="mb-0">Fancy World Card</h5>
                <div class="">
                <span class="fa fa-star fa-2x checked "></span>
                <span class="fa fa-star fa-2x checked"></span>
                <span class="fa fa-star fa-2x checked "></span>
                <span class="fa fa-star fa-2x checked "></span>
                <span class="fa fa-star fa-2x checked"></span>

                <!-- span -->
                <span class="rating_point px-3">5.0</span><br/>
                <span class=" text_blue">Banks Best Rating</span><br/>
            </div>
                <button class="btn button_blue w-75 mt-3 ">APPLY NOW </button>
            </div>
           
        </div>
        <div class="col-md-4">
            <div class="credit_card_image" style="background-image:url('<?php echo base_url()?>assets/img/overview/credit_card.png')">
            </div>

            <div class="text-center">
                <h5 class="mb-0">Fancy World Card</h5>
                <div class="">
                <span class="fa fa-star fa-2x checked "></span>
                <span class="fa fa-star fa-2x checked"></span>
                <span class="fa fa-star fa-2x checked "></span>
                <span class="fa fa-star fa-2x checked "></span>
                <span class="fa fa-star fa-2x checked"></span>

                <!-- span -->
                <span class="rating_point px-3">5.0</span><br/>
                <span class=" text_blue">Banks Best Rating</span><br/>
            </div>
                <button class="btn button_blue w-75 mt-3 ">APPLY NOW </button>
            </div>
           
        </div>
        <div class="col-md-4">
            <div class="credit_card_image" style="background-image:url('<?php echo base_url()?>assets/img/overview/credit_card.png')">
            </div>

            <div class="text-center">
                <h5 class="mb-0">Fancy World Card</h5>
                <div class="">
                <span class="fa fa-star fa-2x checked "></span>
                <span class="fa fa-star fa-2x checked"></span>
                <span class="fa fa-star fa-2x checked "></span>
                <span class="fa fa-star fa-2x checked "></span>
                <span class="fa fa-star fa-2x checked"></span>

                <!-- span -->
                <span class="rating_point px-3">5.0</span><br/>
                <span class=" text_blue">Banks Best Rating</span><br/>
            </div>
              
                <button class="btn button_blue w-75 mt-3 ">APPLY NOW </button>
            </div>
           
        </div>
    </div>

    <!-- collapsable part -->
    <div id="accordion" class="w-100 pt-4">
        <div class="px-3">
            <div class="" id="headingOne">
                <p class="mb-2 px-5">
                    <span>Great for </span>
                    <button style="float:right" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        >
                    </button>
                </p>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="row" style="font-size:18px">
                    <div class="col-md-4 px-5" >
                        <span>Balance Transfer</span><br/>
                        <span>Bonus Offer</span><br/>
                        <span>Business</span><br/>
                        <span>Cash Back</span><br/>
                        <span>Gas</span><br/>
                        <span>Low Intrest</span><br/>
                        <span>Rewards </span><br/>
                        <span>Travel</span><br/>
                        <span>Zero Percent</span><br/>
                    </div>
                    <div class="col-md-4 px-5" >
                        <span>Balance Transfer</span><br/>
                        <span>Bonus Offer</span><br/>
                        <span>Business</span><br/>
                        <span>Cash Back</span><br/>
                        <span>Gas</span><br/>
                        <span>Low Intrest</span><br/>
                        <span>Rewards </span><br/>
                        <span>Travel</span><br/>
                        <span>Zero Percent</span><br/>
                    </div> 
                    <div class="col-md-4 px-5" >
                        <span>Balance Transfer</span><br/>
                        <span>Bonus Offer</span><br/>
                        <span>Business</span><br/>
                        <span>Cash Back</span><br/>
                        <span>Gas</span><br/>
                        <span>Low Intrest</span><br/>
                        <span>Rewards </span><br/>
                        <span>Travel</span><br/>
                        <span>Zero Percent</span><br/>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-3">
            <div class="" id="headingTwo">
                <p class="mb-2 px-5">
                    <span>Great for </span>
                    <button style="float:right" class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        >
                    </button>
                </p>
            </div>
            <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="row" style="font-size:18px">
                    <div class="col-md-4 px-5" >
                        <span>Balance Transfer</span><br/>
                        <span>Bonus Offer</span><br/>
                        <span>Business</span><br/>
                        <span>Cash Back</span><br/>
                        <span>Gas</span><br/>
                        <span>Low Intrest</span><br/>
                        <span>Rewards </span><br/>
                        <span>Travel</span><br/>
                        <span>Zero Percent</span><br/>
                    </div>
                    <div class="col-md-4 px-5" >
                        <span>Balance Transfer</span><br/>
                        <span>Bonus Offer</span><br/>
                        <span>Business</span><br/>
                        <span>Cash Back</span><br/>
                        <span>Gas</span><br/>
                        <span>Low Intrest</span><br/>
                        <span>Rewards </span><br/>
                        <span>Travel</span><br/>
                        <span>Zero Percent</span><br/>
                    </div> 
                    <div class="col-md-4 px-5" >
                        <span>Balance Transfer</span><br/>
                        <span>Bonus Offer</span><br/>
                        <span>Business</span><br/>
                        <span>Cash Back</span><br/>
                        <span>Gas</span><br/>
                        <span>Low Intrest</span><br/>
                        <span>Rewards </span><br/>
                        <span>Travel</span><br/>
                        <span>Zero Percent</span><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>     
</div>





 



