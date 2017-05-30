<?php 
  // $date_range = array('name' => 'date_range', 'value' => $date_range, 'class' => 'form-control date_range');
?>

<form id="advance_search_form" method="POST">
  <div class="col-sm-2">
      <div class="filter-column">
        <div class="filter-row">
          <label>Organization</label>
          <?=form_dropdown('organization', array(''=>'Select Organization')+ get_organizations(), $organization, ' id="organizationlist" class="form-control"')?>
        </div>
        <div class="filter-row">
          <label>Select Month</label>
          <select class="form-control" name="month">
            <option value="">--Select--</option>
            <option <?=($month=="01")?"selected":"";?> value="01">January</option>
            <option <?=($month=="02")?"selected":"";?> value="02">February</option>
            <option <?=($month=="03")?"selected":"";?> value="03">March</option>
            <option <?=($month=="04")?"selected":"";?> value="04">April</option>
            <option <?=($month=="05")?"selected":"";?> value="05">May</option>
            <option <?=($month=="06")?"selected":"";?> value="06">June</option>
            <option <?=($month=="07")?"selected":"";?> value="07">July</option>
            <option <?=($month=="08")?"selected":"";?> value="08">August</option>
            <option <?=($month=="09")?"selected":"";?> value="09">September</option>
            <option <?=($month=="10")?"selected":"";?> value="10">October</option>
            <option <?=($month=="11")?"selected":"";?> value="11">November</option>
            <option <?=($month=="12")?"selected":"";?> value="12">December</option>
          </select>
        </div>
        <div class="filter-row">
          <label>Select Year</label>
          <select class="form-control" name="year">
            <option value="">--Select--</option>
            <?php
              $year1 = date("Y");
              $year2 = date("Y",strtotime("-3 years"));
              for ($i=$year1; $i >= $year2; $i--)
              { 
                ?>
                  <option <?=($year==$i)?"selected":"";?> value="<?=$i;?>"><?=$i;?></option>
                <?php
              }
            ?>
          </select>
        </div>

        <div class="text-center m_top">
          <a href="javascript:void(0)" class="btn btn-sm active" onclick="$.fn.clear_advance_search();">Clear</a>
          <button type="button" class="btn btn-sm" onclick="$.fn.submit_advance_search_form();">Search</button>
        </div> 

      </div>
  </div>
  <!-- <div class="col-sm-2">
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
  </div> -->
  </div>

</form>
