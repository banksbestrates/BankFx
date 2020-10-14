
<style>
.form-control{
  line-height:1.5!important;
}
</style>
<!-- TOP NAME DIV -->
<div class="container pt-5 pb-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-weight-900 mb-2">Auto Loan Rates for <?php echo date('F Y')?></h1>
            </div>
        </div>
    </div>

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
        <iframe  id="Ifrmae" style="height:150vh;width:100%;border:2px solid #d79f01" src="https://widgets.icanbuy.com/c/standard/us/en/auto/tables/Auto.aspx?siteid=9e42fea46ee9090e&perpage=1000&disable_paging=1&&listingbtnbgcolor=D79F01&searchbtnbgcolor=000000"></iframe>
    </div>
    <div class="container pb-5">
        <?php if(count($page_data)>=1){
                foreach($page_data as $d){
                if($d->div_type == "bottom"){?>
                    <h5 class="mb-2"><?php echo $d->heading;?></h5>
                   <div class="text-justify"><?php echo $d->content;?></div>
            <?php } 
            }
        }?>
    </div>




 



