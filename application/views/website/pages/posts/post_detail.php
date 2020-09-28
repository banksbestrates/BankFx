<!-- Bank Review -->
<div class="container pt-5 mb-4">
    <div class="row">
        <div class="col-md-9">
            <h1 class="font-weight-900 mb-2" id="heading"><h1><hr/>
        </div>
        <div class="col-md-3 text-right pt-3">
            <!-- <button class="btn button_blue btn-sm">DOWNLOAD OUR APP</button> -->
        </div>
    </div>
    <div id="author_detail"></div>
</div>

<div class="container">
    <div id="source_image"></div>
    <div id="content" class="text-justify pb-4"></div>
</div> 

  
<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>
<script src="<?php echo base_url()?>assets/libs/postProcess.js"></script>
<script>
  get_post_detail(<?php echo $post_id?>);
</script>




 