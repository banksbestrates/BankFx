
  <!--==========================
    over view banner
  ============================-->
  <?php if(count($page_data)>=1){
            foreach($page_data as $d){
              if($d->div_type == "overview_heading"){?>
                  <div class="overview_banner" style="background-image:linear-gradient(to left, rgba(245, 246, 252, 0.02), rgba(13, 13, 13, 0.73)),url('<?php echo base_url().$d->image ?>">
                    <div class="banner_heading">
                      <h1 class="display-4"><?php echo $d->heading ?></h1>
                      <div class="text-white"><?php echo $d->content ?></div>
                    </div>
                </div>
        <?php } 
        }
    }?>
 

 <!-- Card view -->
 <div class="container card_row pt-4">   
      <div class="col-md-12 mx-auto row px-0 pt-5" id="blog_data">
          
        </div>
  </div> 

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/blogProcess.js"></script>
<script>
  get_blog_overview_post();
</script>





