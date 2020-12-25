
  <!--==========================
    over view banner
  ============================-->
  <?php if(count($page_data)>=1){
            foreach($page_data as $d){
              if($d->div_type == "overview_heading"){?>
                  <!-- <div class="overview_banner" style="background-image:linear-gradient(to left, rgba(245, 246, 252, 0.02), rgba(13, 13, 13, 0.73)),url('<?php echo base_url().$d->image ?>"> -->
                  <div class="overview_banner" style="background-image:url('<?php echo base_url().$d->image ?>')">
                  <div class="banner_heading">
                    <h1 class="display-4"><?php echo $d->heading ?></h1>
                    <div id="heading_content_text"><?php echo $d->content?></div>
                  </div>
                </div>
        <?php } 
        }
    }?>

<!--==========================
    Top 10 ivestment list
  ============================-->

  <div class="container mt-4">    
    <div class="col-md-12">
            <div class="row box_round_border my-5">
                <div class="col-md-8 text-left px-5 py-3" style="min-height: 320px;">
                    <h6>Top 10 Investments you can go for </h6>
                        <ol class="px-4 mb-1  text-secondary" id="top_10_list">             
                        </ol>
                </div>
                <div class="col-md-4 p-0">
                    <div class="best_investment_image"></div>
                </div>
            </div>
        </div>
    </div>
  </div>

    <!-- Content Related to Loans -->
    <div class="container">
        <div id="related_articles">
        </div>    
    </div> 


<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/investingProcess.js"></script>
<script>
  get_best_investing_posts();
</script>

<br/>


 
