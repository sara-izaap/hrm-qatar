     
  <div class="row blue-mat">
      <div class="breadcrumbs col-md-6">
        <?php echo set_breadcrumb(); ?>
        <!--<a href="<?php echo $this->previous_url;?>" class="btn btn-sm"><i class="back_icon"></i> Back</a>-->
      </div>

      <div class="col-md-6 action-buttons text-right">

        <?php if(get_user_role() == '1'):?>
          <a href="javascript:void(0);" onclick="create_project('form')" class="btn active">Create New Project</a>        
        <?php endif;?>
        <a href="<?php echo site_url('timesheet/template_download');?> " class="btn active">Download Sample CSV</a>
        
        <div class="btn-group timesheet-downbload">
          <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-download" aria-hidden="true"></i> Download Reports
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="javascript:void(0);" onclick="export_timesheet('1')">Export by date wise</a>
            <a class="dropdown-item" href="javascript:void(0);" onclick="export_timesheet('2')">Export by total hours</a>        
          </div>
        </div>

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

<div class="modal fade" id="CreateProject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> </div>
