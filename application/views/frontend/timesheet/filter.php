<?php 
  $date_range = array('name' => 'date_range', 'value' => $date_range, 'class' => 'form-control date_range');
?>

<form id="advance_search_form" method="POST">
  <div class="col-sm-2">
      <div class="filter-column">
        
        <div class="filter-row">
          <label>Organization</label>
          <?=form_dropdown('organization', array(''=>'Select Organization')+ get_organizations(), $organization, 'onchange="get_employeeslist(this.value,\'\')" id="organizationlist" class="form-control"')?> 
              
        </div>

        <div class="filter-row">
          <label>Project</label>              
          <?=form_dropdown('project', array(''=>'Select Project')+ get_projects(), $project, 'class="form-control"')?>   
        </div>

        <div class="filter-row">
          <label>Select Month</label>
          <?php echo form_input($date_range);?>
        </div>

        <div class="text-center m_top">
          <a href="javascript:void(0)" class="btn btn-sm active" onclick="$.fn.clear_advance_search();">Clear</a>
          <button type="button" class="btn btn-sm" onclick="$.fn.submit_advance_search_form();">Search</button>
        </div> 

      </div>
  </div>
  <div class="col-sm-2">
    <div class="row">
      <div class="emp-list">
          <label for="checkall" class="custom-checkbox checkallbox" align="left">Employee List</label>
          <input type="checkbox" name="checkall" id="checkall" class="checkbox">
      </div>
    <div class="user-wrapper filter_employee_list">
      
      <?php $emp_list = get_employees();

        foreach($emp_list as $key => $val): 

          $chk = '';
          if($emplist && in_array($val,$emplist))
            $chk = "checked";
          ?>
            <div class="single-user">
                <label for="checkbox-<?=$key;?>" class="custom-checkbox" align="left"><?php echo $val;?> </label>
                <input type="checkbox" name="emplist[]" value="<?=$key;?>" <?php echo $chk;?> id="checkbox-<?=$key;?>" class="checkbox empcheckbox">
            </div>

         <?php endforeach;?>    

    </div>
  </div>
  </div>

</form>
