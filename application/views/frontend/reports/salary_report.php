<div class="row blue-mat">
  <div class="breadcrumbs">
    <?php echo set_breadcrumb();?>
    <!--<a href="<?php echo $this->previous_url;?>" class="btn btn-sm"><i class="back_icon"></i> Back</a>-->
  </div>
</div>
<?php display_flashmsg($this->session->flashdata());?>
 

<div class="container-fluid">
  <div class="row">
    <!--Advanced Search Popup content starts here-->
    <div id="popOverBox" style="display:block;"></div>
    <div class="col-sm-10">
      <div>
        <?php echo $grid;?>
      </div>
    </div>
  </div>
</div>
    
