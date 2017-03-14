  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create New Project</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <form name="create_project_form" id="create_project_form" method="POST">
              <div class="form-grid">
                
                <div class="form-group col-md-6 <?php echo (form_error('project_name'))?'error':'';?>" data-error="<?php echo (form_error('project_name'))? form_error('project_name'):'';?>">
                  <label required>Project Name</label>
                  <input type="text" name="project_name" class="form-control" id="project_name" value="<?php echo set_value('project_name');?>">
                </div>

                <div class="form-group col-md-6 <?php echo (form_error('description'))?'error':'';?>" data-error="<?php echo (form_error('description'))? form_error('description'):'';?>">
                  <label required>Description</label>
                  <textarea name="description" class="form-control" id="description" > <?php echo set_value('description');?></textarea>
                </div>

            </div>
           </form> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default active" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="create_project('process');">Save</button>
      </div>
    </div>
  </div>