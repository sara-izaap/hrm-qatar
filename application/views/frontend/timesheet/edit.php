  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Timesheet</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <form name="timesheet_edit" id="timesheet_edit" method="POST">
              <div class="form-grid">
                
                <div class="form-group col-md-6" data-error="">
                  <label>Employee Name</label>
                  <input type="text" name="emp_name" class="form-control" id="emp_name" value="<?php echo $edit_data['emp_name'];?>" readonly>
                </div>

                <div class="form-group col-md-6" data-error="">
                  <label>Employee Code</label>
                  <input type="text" name="emp_code" class="form-control" id="emp_code" value="<?php echo $edit_data['emp_code'];?>" readonly>
                </div>

                <div class="form-group col-md-6" data-error="">
                  <label>Date(yyyy-mm-dd)</label>
                  <input type="text" name="date" class="form-control" id="date" value="<?php echo $edit_data['date'];?>" readonly>
                </div>

                <div class="form-group col-md-6 <?php echo (form_error('hour'))?'error':'';?>" data-error="<?php echo (form_error('hour'))? form_error('hour'):'';?>">
                  <label required>Hours</label>
                  <input type="text" name="hour" class="form-control" id="hour" onkeypress="return numbersonly(event)" value="<?php echo set_value('hour', $edit_data['hour']);?>">
                </div>

                <div class="form-group col-md-6" data-error="">
                  <label>Type</label>
                      <?=form_dropdown('timesheet_type', array('Present'=>'Present','Absent'=>'Absent','Idle'=>'Idle','Weekend'=>'Weekend','Ramadan'=>'Ramadan'), set_value('timesheet_type', $edit_data['type']), 'class="form-control"')?> 
                </div>

                <div class="form-group col-md-6" data-error="">
                  <label>Project</label>
                  <?=form_dropdown('project', array(''=>'Select Project')+ get_projects(), set_value('project', $edit_data['project']), 'class="form-control"')?> 
                </div>


                <div class="form-group col-md-6 <?php echo (form_error('purpose'))?'error':'';?>" data-error="">
                  <label>Purpose</label>
                  <input type="text" name="purpose" class="form-control" id="purpose" value="<?php echo set_value('purpose', $edit_data['purpose']);?>">
                </div>

            </div>
           </form> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default active" data-dismiss="modal">Close</button>
        <?php if(get_user_role() == '1'):?>
        <button type="button" class="btn btn-primary" onclick="edit_timesheet('process','<?php echo $id;?>');">Save changes</button>
        <?php endif;?>
      </div>
    </div>
  </div>