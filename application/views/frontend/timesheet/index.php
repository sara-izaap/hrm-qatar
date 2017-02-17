     
  <div class="row blue-mat">
      <div class="breadcrumbs col-md-6">
        <?php echo set_breadcrumb(); ?>
        <!--<a href="<?php echo $this->previous_url;?>" class="btn btn-sm"><i class="back_icon"></i> Back</a>-->
      </div>
      <div class="col-md-6 action-buttons text-right">
        <a href="<?php echo site_url('timesheet/template_download');?> " class="btn active">Download Sample CSV</a>
    </div>
  </div>

  <?php display_flashmsg($this->session->flashdata()); ?>
  

    <div class="container-fluid">
      <div class="row">

      <!--Advanced Search Popup content starts here-->
      <div id="popOverBox" style="display: block;"></div>

      <div class="col-sm-8">
          <div>
              <?php echo $grid;?>
          </div>
      </div>

      </div>
    </div>
    


<!-- Modal -->
<div class="modal fade" id="TimesheetEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> </div>
