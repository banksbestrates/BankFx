
<style>
.form-control{
    line-height: 1.5!important;
}
</style>
<!-- TOP NAME DIV -->
    <div class="container pt-5 pb-4">
        <div class="row">
            <div class="col-md-9">
                <h1 class="font-weight-900 mb-2">Home Equity Rates for <?php echo date('F Y')?></h1>
                <!-- <p>Published on <?php echo date('M d')?>. Do you want to get more information ?</p> -->
            </div>
            <div class="col-md-3 text-right pt-3">
                <!-- <button class="btn button_blue btn-sm">DOWNLOAD OUR APP</button> -->
            </div>
        </div>
    </div>

    <!-- Mortgage rate top -->
    <div class="container">
        <?php if(count($page_data)>=1){
                foreach($page_data as $d){
                if($d->div_type == "top"){?>
                    <h5 class="mb-2"><?php echo $d->heading;?></h5>
                   <div class="text-justify"><?php echo $d->content;?></div>
            <?php } 
            }
        }?>
    </div>

    <div class="container pb-4" >
        <iframe  id="Ifrmae" style="height:210vh;width:100%;border:2px solid #d79f01" src="https://widgets.icanbuy.com/c/standard/us/en/homeequity/tables/HomeEquityCurrent.aspx?siteid=6958e75ba6b00b8b&perpage=1000&disable_paging=1&include_text_results=1"></iframe>
    </div>

    <!-- Mortgage rate top -->
    <div class="container pb-5">
        <?php if(count($page_data)>=1){
                foreach($page_data as $d){
                if($d->div_type == "bottomo"){?>
                    <h5 class="mb-2"><?php echo $d->heading;?></h5>
                   <div class="text-justify"><?php echo $d->content;?></div>
            <?php } 
            }
        }?>
    </div>

    <script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/libs/common.js"></script>
    <script>
    // Selecting the iframe element
    var iframe = document.getElementById("Ifrmae");
    // Adjusting the iframe height onload event
    iframe.onload = function(){
        iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
    }
    </script>


 



