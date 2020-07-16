<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title"></h5>                              
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <textarea name="editor" id="data"></textarea>
                            </div>
                            <br/>
                            <button class="btn btn-block btn-primary" id="update_button" onclick="updatePageData('<?php echo $admin_data['page_type']?>')">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Datatables -->
<script src="<?php echo base_url()?>assets/admin_panel/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/admin_panel/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/admin_panel/libs/pageProcess.js"></script>
<script>
    get_page_data("<?php echo $admin_data['page_type']?>");
    CKEDITOR.replace( 'editor' );
</script>