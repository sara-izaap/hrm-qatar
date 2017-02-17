     
  <div class="row blue-mat">
      <div class="breadcrumbs col-md-6">
        <?php echo set_breadcrumb(); ?>
        <!--<a href="<?php echo $this->previous_url;?>" class="btn btn-sm"><i class="back_icon"></i> Back</a>-->
      </div>
      <div class="col-md-6 action-buttons text-right">
        <a href="<?php echo site_url('employee/add');?>" class="btn" capsOn>Create Employee</a>
        <a href="<?php echo site_url('employee/template_download');?> " class="btn active">Download Sample CSV</a>
    </div>
  </div>

  <?php display_flashmsg($this->session->flashdata()); ?>
    
  <?php echo $grid;?>