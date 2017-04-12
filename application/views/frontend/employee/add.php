 <div class="row">
    <div class="breadcrumbs">
      <?php echo set_breadcrumb(); ?>
        <a href="<?php echo $this->previous_url;?>" class="btn btn-sm pull-right"><i class="back_icon"></i> Back</a>
      
    </div>
  </div>

  <div class="row">

  <form name="organization" method="POSt">

      <div class="form-grid">
        
        <div class="form-group col-md-4 <?php echo (form_error('emp_name'))?'error':'';?>" data-error="<?php echo (form_error('emp_name'))? form_error('emp_name'):'';?>">
          <label required>Employee Name</label>
          <input type="text" name="emp_name" class="form-control" id="emp_name" value="<?php echo set_value('emp_name', $editdata['emp_name']);?>" placeholder="John Doe">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('emp_code'))?'error':'';?>" data-error="<?php echo (form_error('emp_code'))? form_error('emp_code'):'';?>">
          <label required>Employee Code</label>
          <input type="text" name="emp_code" class="form-control" id="emp_code" value="<?php echo set_value('emp_code', $editdata['emp_code']);?>" placeholder="XY0004">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('org_id'))?'error':'';?>" data-error="<?php echo (form_error('org_id'))? form_error('org_id'):'';?>">
          <label required>Organization</label>
          <select class="form-control" name="org_id" id="org_id">
            <option value="">---Select---</option>
              <?php foreach($org_list as $org):

                  $sel = ($org['id'] == set_value('org_id', $editdata['org_id']))?'selected':'';
              ?>
                <option value="<?php echo $org['id'];?>" <?php echo $sel;?> > <?php echo $org['name'];?> </option>
              <?php endforeach;?>
          </select>
        </div>
        
        <div class="form-group col-md-4 <?php echo (form_error('date_arrival'))?'error':'';?>" data-error="<?php echo (form_error('date_arrival'))? form_error('date_arrival'):'';?>">
          <label required>Date of Arrival</label>
          <input type="text" name="date_arrival" class="form-control singledate" id="date_arrival" value="<?php echo set_value('date_arrival', $editdata['date_arrival']);?>" placeholder="yyyy-mm-dd">
        </div>
        
        <div class="form-group col-md-4 <?php echo (form_error('date_exit_leave'))?'error':'';?>" data-error="">
          <label>Date of Exit -leave</label>
          <input type="text" name="date_exit_leave" class="form-control singledate" id="date_exit_leave" value="<?php echo set_value('date_exit_leave', $editdata['date_exit_leave']);?>" placeholder="yyyy-mm-dd">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('date_exit_final'))?'error':'';?>" data-error="">
          <label>Date of Exit -Final</label>
          <input type="text" name="date_exit_final" class="form-control singledate" id="date_exit_final" value="<?php echo set_value('date_exit_final', $editdata['date_exit_final']);?>" placeholder="yyyy-mm-dd">
        </div>
        
        <div class="form-group col-md-4 <?php echo (form_error('date_exit_absc'))?'error':'';?>" data-error="">
          <label>Date of Exit -Absc</label>
          <input type="text" name="date_exit_absc" class="form-control singledate" id="date_exit_absc" value="<?php echo set_value('date_exit_absc', $editdata['date_exit_absc']);?>" placeholder="yyyy-mm-dd">
        </div>
        
        <div class="form-group col-md-4 <?php echo (form_error('current_status'))?'error':'';?>" data-error="<?php echo (form_error('current_status'))? form_error('current_status'):'';?>">
          <label required>Current Status</label>
          <?php echo form_dropdown('current_status', array(''=>'---Status---') + employee_status(), set_value('current_status', $editdata['current_status']), 'class="form-control"');?>
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('phone1'))?'error':'';?>" data-error="<?php echo (form_error('phone1'))? form_error('phone1'):'';?>">
          <label required>Phone1</label>
          <input type="text" name="phone1" class="form-control" id="phone1" value="<?php echo set_value('phone1', $editdata['phone1']);?>" placeholder="Phone1">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('phone2'))?'error':'';?>" data-error="">
          <label>Phone2</label>
          <input type="text" name="phone2" class="form-control" id="phone2" value="<?php echo set_value('phone2', $editdata['phone2']);?>" placeholder="Phone2">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('agency'))?'error':'';?>" data-error="">
          <label>Agency</label>
          <input type="text" name="agency" class="form-control" id="agency" value="<?php echo set_value('agency', $editdata['agency']);?>" placeholder="Agency">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('designation'))?'error':'';?>" data-error="<?php echo (form_error('designation'))? form_error('designation'):'';?>">
          <label required>Designation</label>
          <input type="text" name="designation" class="form-control" id="designation" value="<?php echo set_value('designation', $editdata['designation']);?>" placeholder="Designation">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('visa_designation'))?'error':'';?>" data-error="">
          <label>VISA Designation</label>
          <input type="text" name="visa_designation" class="form-control" id="visa_designation" value="<?php echo set_value('visa_designation', $editdata['visa_designation']);?>" placeholder="Visa Designation">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('dob'))?'error':'';?>" data-error="<?php echo (form_error('dob'))? form_error('dob'):'';?>">
          <label required>Date of Birth</label>
          <input type="text" name="dob" class="form-control singledate" id="dob" value="<?php echo set_value('dob', $editdata['dob']);?>" placeholder="yyyy-mm-dd">
        </div>
        
        <div class="form-group col-md-4 <?php echo (form_error('age'))?'error':'';?>" data-error="">
          <label>Age</label>
          <input type="text" name="age" class="form-control" id="age" value="<?php echo set_value('age', $editdata['age']);?>" placeholder="Age">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('joining_date'))?'error':'';?>" data-error="<?php echo (form_error('joining_date'))? form_error('joining_date'):'';?>">
          <label required>Date of Joining</label>
          <input type="text" name="joining_date" class="form-control singledate" id="joining_date" value="<?php echo set_value('joining_date', $editdata['joining_date']);?>" placeholder="yyyy-mm-dd">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('no_of_months_completed'))?'error':'';?>" data-error="">
          <label>No of Months completed</label>
          <input type="text" name="no_of_months_completed" class="form-control" id="no_of_months_completed" value="<?php echo set_value('no_of_months_completed', $editdata['no_of_months_completed']);?>" placeholder="8">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('nationality'))?'error':'';?>" data-error="<?php echo (form_error('nationality'))? form_error('nationality'):'';?>">
          <label required>Nationality</label>
          <input type="text" name="nationality" class="form-control" id="nationality" value="<?php echo set_value('nationality', $editdata['nationality']);?>" placeholder="US">
        </div>


        <!-- Employee Details -->

        <div class="form-group col-md-4 <?php echo (form_error('pp_number'))?'error':'';?>" data-error="">
          <label>PP Number</label>
          <input type="text" name="pp_number" class="form-control" id="pp_number" value="<?php echo set_value('pp_number', $editdata['pp_number']);?>" placeholder="546DFG">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('pp_validity'))?'error':'';?>" data-error="">
          <label>PP Validity</label>
          <input type="text" name="pp_validity" class="form-control" id="pp_validity" value="<?php echo set_value('pp_validity', $editdata['pp_validity']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('vp_number'))?'error':'';?>" data-error="">
          <label>VP Number</label>
          <input type="text" name="vp_number" class="form-control" id="vp_number" value="<?php echo set_value('vp_number', $editdata['vp_number']);?>" placeholder="">
        </div>

         <div class="form-group col-md-4 <?php echo (form_error('rp_number'))?'error':'';?>" data-error="">
          <label>RP No</label>
          <input type="text" name="rp_number" class="form-control" id="rp_number" value="<?php echo set_value('rp_number', $editdata['rp_number']);?>" placeholder="">
        </div>
        
         <div class="form-group col-md-4 <?php echo (form_error('rp_validity'))?'error':'';?>" data-error="">
          <label>RP Validity</label>
          <input type="text" name="rp_validity" class="form-control" id="rp_validity" value="<?php echo set_value('rp_validity', $editdata['rp_validity']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('ot_rate'))?'error':'';?>" data-error="">
          <label>OT Rate</label>
          <input type="text" name="ot_rate" class="form-control" id="ot_rate" value="<?php echo set_value('ot_rate', $editdata['ot_rate']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('sot_rate'))?'error':'';?>" data-error="">
          <label>SOT Rate</label>
          <input type="text" name="sot_rate" class="form-control" id="sot_rate" value="<?php echo set_value('sot_rate', $editdata['sot_rate']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('food_allowance'))?'error':'';?>" data-error="">
          <label>Food Allowance</label>
          <input type="text" name="food_allowance" class="form-control" id="food_allowance" value="<?php echo set_value('food_allowance', $editdata['food_allowance']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('food_allowance_deduction'))?'error':'';?>" data-error="">
          <label>Food Allowance deduction</label>
          <input type="text" name="food_allowance_deduction" class="form-control" id="food_allowance_deduction" value="<?php echo set_value('food_allowance_deduction', $editdata['food_allowance_deduction']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('accomodation_allowance'))?'error':'';?>" data-error="">
          <label>Accomodation allowance</label>
          <input type="text" name="accomodation_allowance" class="form-control" id="accomodation_allowance" value="<?php echo set_value('accomodation_allowance', $editdata['accomodation_allowance']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('transport_allowance'))?'error':'';?>" data-error="">
          <label>Transportation Allowance</label>
          <input type="text" name="transport_allowance" class="form-control" id="transport_allowance" value="<?php echo set_value('transport_allowance', $editdata['transport_allowance']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('telephone_allowance'))?'error':'';?>" data-error="">
          <label>Telephone Allowance</label>
          <input type="text" name="telephone_allowance" class="form-control" id="telephone_allowance" value="<?php echo set_value('telephone_allowance', $editdata['telephone_allowance']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('special_allowance'))?'error':'';?>" data-error="">
          <label>Special Allowance</label>
          <input type="text" name="special_allowance" class="form-control" id="special_allowance" value="<?php echo set_value('special_allowance', $editdata['special_allowance']);?>" placeholder="">
        </div>

         <div class="form-group col-md-4 <?php echo (form_error('salary_advance'))?'error':'';?>" data-error="">
          <label>Salary Advance</label>
          <input type="text" name="salary_advance" class="form-control" id="salary_advance" value="<?php echo set_value('salary_advance', $editdata['salary_advance']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('advancce_deduction'))?'error':'';?>" data-error="">
          <label>Advance Deduction</label>
          <input type="text" name="advancce_deduction" class="form-control" id="advancce_deduction" value="<?php echo set_value('advancce_deduction', $editdata['advancce_deduction']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('emp_qid'))?'error':'';?>" data-error="">
          <label>Employee QID</label>
          <input type="text" name="emp_qid" class="form-control" id="emp_qid" value="<?php echo set_value('emp_qid', $editdata['emp_qid']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('emp_visa_id'))?'error':'';?>" data-error="">
          <label>Employee Visa ID</label>
          <input type="text" name="emp_visa_id" class="form-control" id="emp_visa_id" value="<?php echo set_value('emp_visa_id', $editdata['emp_visa_id']);?>" placeholder="">
        </div>

         <div class="form-group col-md-4 <?php echo (form_error('emp_bank_short_name'))?'error':'';?>" data-error="">
          <label>Employee Bank Short Name</label>
          <input type="text" name="emp_bank_short_name" class="form-control" id="emp_bank_short_name" value="<?php echo set_value('emp_bank_short_name', $editdata['emp_bank_short_name']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('emp_account'))?'error':'';?>" data-error="">
          <label>Employee Account</label>
          <input type="text" name="emp_account" class="form-control" id="emp_account" value="<?php echo set_value('emp_account', $editdata['emp_account']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('salary_frequency'))?'error':'';?>" data-error="">
          <label>Salary Frequency</label>
          <input type="text" name="salary_frequency" class="form-control" id="salary_frequency" value="<?php echo set_value('salary_frequency', $editdata['salary_frequency']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('no_working_days'))?'error':'';?>" data-error="">
          <label>Number of Working Days</label>
          <input type="text" name="no_working_days" class="form-control" id="no_working_days" value="<?php echo set_value('no_working_days', $editdata['no_working_days']);?>" placeholder="">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('net_salary'))?'error':'';?>" data-error="<?php echo (form_error('net_salary'))? form_error('net_salary'):'';?>">
          <label required>Net Salary</label>
          <input type="text" name="net_salary" class="form-control" id="net_salary" value="<?php echo set_value('net_salary', $editdata['net_salary']);?>" placeholder="Net salary">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('basic_salary'))?'error':'';?>" data-error="<?php echo (form_error('basic_salary'))? form_error('basic_salary'):'';?>">
          <label required>Basic Salary</label>
          <input type="text" name="basic_salary" class="form-control" id="basic_salary" value="<?php echo set_value('basic_salary', $editdata['basic_salary']);?>" placeholder="Basic salary">
        </div>

         <div class="form-group col-md-4 <?php echo (form_error('extra_hours'))?'error':'';?>" data-error="">
          <label>Extra hours</label>
          <input type="text" name="extra_hours" class="form-control" id="extra_hours" value="<?php echo set_value('extra_hours', $editdata['extra_hours']);?>" placeholder="7.5">
        </div>

         <div class="form-group col-md-4 <?php echo (form_error('extra_income'))?'error':'';?>" data-error="">
          <label>Extra Income</label>
          <input type="text" name="extra_income" class="form-control" id="extra_income" value="<?php echo set_value('extra_income', $editdata['extra_income']);?>" placeholder="7.5">
        </div>

        <div class="form-group col-md-4 <?php echo (form_error('deductions'))?'error':'';?>" data-error="">
          <label>Deductions</label>
          <input type="text" name="deductions" class="form-control" id="deductions" value="<?php echo set_value('deductions', $editdata['deductions']);?>" placeholder="345">
        </div>

         <div class="form-group col-md-4 <?php echo (form_error('payment_type'))?'error':'';?>" data-error="<?php echo (form_error('payment_type'))? form_error('payment_type'):'';?>">
          <label>Payment Type</label>
          <?php echo form_dropdown('payment_type', array(''=>'---Payment Type---','Account'=>'Account','Cash'=>'Cash'), set_value('payment_type', $editdata['payment_type']), 'class="form-control"');?>
        </div>


        <!-- Employee Notes -->
        <hr>

        <div class="form-group col-md-6 <?php echo (form_error('comments'))?'error':'';?>" data-error="">
          <label>Notes / Comments</label>
          <textarea class="form-control" name="comments" rows="5" placeholder="Comments" id="comments"><?php echo set_value('comments', $editdata['comments']);?></textarea>
        </div>

        <div class="form-group col-md-6 <?php echo (form_error('future_data1'))?'error':'';?>" data-error="">
          <label>Future Data-1</label>
          <textarea class="form-control" name="future_data1" rows="5" placeholder="Future Data-1" id="future_data1"><?php echo set_value('future_data1', $editdata['future_data1']);?></textarea>
        </div>

        <div class="form-group col-md-6 <?php echo (form_error('future_data2'))?'error':'';?>" data-error="">
          <label>Future Data-2</label>
          <textarea class="form-control" name="future_data2" rows="5" placeholder="Future Data-2" id="future_data2"><?php echo set_value('future_data2', $editdata['future_data2']);?></textarea>
        </div>

         <div class="form-group col-md-6 <?php echo (form_error('future_data3'))?'error':'';?>" data-error="">
          <label>Future Data-3</label>
          <textarea class="form-control" name="future_data3" rows="5" placeholder="Future Data-3" id="future_data3"><?php echo set_value('future_data3', $editdata['future_data3']);?></textarea>
        </div>

        <div class="form-group col-md-6 <?php echo (form_error('future_data4'))?'error':'';?>" data-error="">
          <label>Future Data-4</label>
          <textarea class="form-control" name="future_data4" rows="5" placeholder="Future Data-4" id="future_data4"><?php echo set_value('future_data4', $editdata['future_data4']);?></textarea>
        </div>

        <div class="form-group col-md-6 <?php echo (form_error('future_data5'))?'error':'';?>" data-error="">
          <label>Future Data-5</label>
          <textarea class="form-control" name="future_data5" rows="5" placeholder="Future Data-5" id="future_data5"><?php echo set_value('future_data5', $editdata['future_data5']);?></textarea>
        </div>
        
        
        <input type="hidden" name="edit_id" class="form-control" id="edit_id" value="<?php echo $editdata['emp_id'];?>">

        <div class="form-group col-md-2 col-md-offset-8">   
          <a href="<?php echo site_url('employee');?>" class="btn btn-block active text-center">Back</a>
        </div>
        
        <?php if(get_user_role() == '1'):?>
        <div class="form-group col-md-2">
          <button type="submit" class="btn btn-block">Save</button>
        </div>
        <?php endif;?>
    
    </div>

  </form>

</div>  
