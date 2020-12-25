
<style>
    .table-bordered {
        border: 1px solid #D79F01 !important;
    }
</style>

<!--==========================
  over view banner
============================-->
<div class="overview_banner">
    <div class="banner_heading w-75">
        <?php if(count($page_data)>=1){
              foreach($page_data as $d){
                if($d->div_type == "overview_heading"){?>
                  <h1><?php echo $d->heading ?></h1>
                  <p><?php echo $d->content ?></p>
          <?php } 
          }
        }?>
    </div>
</div>

<div class="container pb-3"> 
    <div class="col-md-12 row px-0">
        <div class="col-md-10">
            <!-- <span>Bank Reviews ></span> <span class="text_yellow">Aliiant Bank</span> -->
            <h2 class="font-weight-900 pt-4 mb-2">Headlines About Life Insurance</h2>
            <span>Published on <?php echo date("M d"); ?> . Do you want to get more information ?</span>
        </div> 
        <div class="col-md-2">
            
        </div> 
    </div>
</div>

<?php if(count($page_data)>=1){
        foreach($page_data as $index=> $d){
          if($d->div_type == "normal_content"){?>
            
            <div class="container pt-4 ">
                <h4 class="border_bottom_golden font-weight-900"><?php echo $d->heading?></h4>
                <p><?php echo $d->content?> </p>
            </div>
            <?php  if($index == 1)
            {?>
               <h1 class="text-center" >CALCULATOR WILL COME HERE </h1>
            <?php } 
          } 
        }
}?>

<div class="container">
    <h4 class="border_bottom_golden font-weight-900">Life Insurance Rates</h4>
    <table class="table table-bordered  text-secondary font-weight-bold">
        <thead>
            <tr>
                <th class="">Age at Purchase</th>
                <th class="">Policy Amount</th>             
                <th class="">20-year term</th>
                <th class="">30-year term</th>
                <th class="">Whole Life</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="">Male, 30</th>
                <th class="">$250,000</th>             
                <th class="">$148</th>
                <th class="">$220</th>
                <th class="">$1,829</th> 
            </tr>                                 
            <tr>
                <th class="">Male, 30</th>
                <th class="">$250,000</th>             
                <th class="">$148</th>
                <th class="">$220</th>
                <th class="">$1,829</th>                   
            </tr>                                      
            <tr>
                <th class="">Male, 30</th>
                <th class="">$250,000</th>             
                <th class="">$148</th>
                <th class="">$220</th>
                <th class="">$1,829</th>                  
            </tr>                                      
        </tbody>  
    </table>   
</div>

<!-- Content Related to Loans -->
<div class="container py-5">
    <h3 class="border_bottom_golden">LATEST FROM BANKS BEST RATES</h3>
    <div id="related_articles">
    </div>     
</div> 

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/insuranceProcess.js"></script>
<script>
  get_life_insurance_posts();
</script>
