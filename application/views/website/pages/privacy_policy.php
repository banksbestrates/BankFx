<style>
.privacy_banner{
   background: 
  /*linear-gradient( rgba(58, 52, 52, 0.55), rgba(45, 41, 41, 0.67) ),  */
  url('<?php echo base_url()?>assets/img/overview/privacy_banner.jpg');
  background-size: cover;
  width: 100%;
  height: 234px;
  /* margin: 10px 0 0 10px; */
  position: relative;
  float: left;
  }


</style>
  <!--==========================
    over view banner
  ============================-->
  <div class="privacy_banner">
    <div class="banner_heading">
    <h1 class="display-4">Privacy Policy</h1>
  </div>
  </div>
 
  <!-- Card view -->
  <div class="col-md-10 mx-auto card_row pb-4">    
        <div class="pt-5 col-md-12 mx-auto row card_view" id="page_data">
            
        </div>
  </div> 

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/privacyProcess.js"></script>
<script>
  get_page_data('privacy_policy');
</script>
