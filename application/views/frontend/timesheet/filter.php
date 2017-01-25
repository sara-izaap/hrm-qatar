<?php 
  $date_range = array('name' => 'date_range', 'value' => $date_range, 'class' => 'form-control date_range');
?>

<div class="col-md-12 cf">
   <form id="advance_search_form" method="POST">
      <div class="timesheetView">        
          <div class="form-grid">
            <div class="form-group col-md-4">
              <label>Organization</label>
                <?=form_dropdown('organization', array(''=>'Select Organization')+ get_organizations(), $organization, 'class="form-control"')?> 
            </div>
             <div class="form-group col-md-4">
              <label>Select Month</label>
             <?php echo form_input($date_range);?>

            </div>
            <div class="form-group col-md-4">
              <label>Project</label>              
              <?=form_dropdown('project', array(''=>'Select Project')+ get_projects(), $project, 'class="form-control"')?> 
            </div>           
           
          </div>
          <div class="clearfix"></div>
      </div>
    <div class="col-md-12 cf">
      <div class="employeeView">
          <div class="employee-list">
            <h2>Employee List</h2>
          </div>
          <div class="table-sub-header employee-list-checkbox clearfix">
            <?php $emp_list = get_employees();

            foreach($emp_list as $key => $val): 

              $chk = '';
              if($emplist && in_array($val,$emplist))
                $chk = "checked";
              ?>
              <div class="col-md-4">
                <label for="checkbox-<?=$key;?>" class="custom-checkbox" align="left"><?php echo $val;?> </label>
                <input type="checkbox" name="emplist[]" value="<?=$key;?>" <?php echo $chk;?> id="checkbox-<?=$key;?>" class="checkbox empcheckbox">
              </div>
            <?php endforeach;?>
           
          </div>
          <div class="clearfix"></div>
      </div>
      <div class="text-center m_top">
          <a href="javascript:void(0)" class="btn btn-sm active" onclick="$.fn.clear_advance_search();">Clear</a>
          <button type="button" class="btn btn-sm" onclick="$.fn.submit_advance_search_form();">Filter</button>
      </div>  
    </div>
  </form>
  </div>
  <div class="clearfix"></div>