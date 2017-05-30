<div class="row blue-mat">
  <div class="breadcrumbs">
    <?php echo set_breadcrumb();?>
    <!--<a href="<?php echo $this->previous_url;?>" class="btn btn-sm"><i class="back_icon"></i> Back</a>-->
  </div>
</div>
<?php display_flashmsg($this->session->flashdata());?>
 
<div class="row">
  <form name="monthly_timesheet" action="" method="POST">
    <div class="form-grid">
      <div class="form-group col-md-4 <?php echo (form_error('organization'))?'error':'';?>" data-error="<?php echo (form_error('organization'))? form_error('organization'):'';?>">
          <label required>Organization</label>
          <?=form_dropdown('organization',get_organizations(),'', ' id="organizationlist" class="form-control"')?>
      </div>
    </div>
    <div class="form-grid">
      <div class="form-group col-md-4 <?php echo (form_error('month'))?'error':'';?>" data-error="<?php echo (form_error('month'))? form_error('month'):'';?>">
          <label required>Month</label>
          <select class="form-control" name="month">
            <option value="01">January</option><option value="02">February</option><option value="03">March</option>
            <option value="04">April</option><option value="05">May</option><option value="06">June</option>
            <option value="07">July</option><option value="08">August</option><option value="09">September</option>
            <option value="10">October</option><option value="11">November</option><option value="12">December</option>
          </select>
      </div>
    </div>
    <div class="form-grid">
      <div class="form-group col-md-4 <?php echo (form_error('year'))?'error':'';?>" data-error="<?php echo (form_error('year'))? form_error('year'):'';?>">
        <label>Select Month</label>
        <select class="form-control" name="year">
          <?php
            $year = date("Y");
            $year1 = date("Y",strtotime("-5 years"));
            for ($i=$year; $i >= $year1; $i--)
            {
              ?>
                <option value="<?=$i;?>"><?=$i;?></option>
              <?php
            }
          ?>
        </select>
      </div>
    </div>       

    <div class="form-grid col-md-2 pull-right">
      <button class="btn btn-success pull-right" type="submit">Generate Timesheet</button>
    </div>
  </form>
</div><br>
<?php $org = isset($_POST['organization']) ? $_POST['organization'] : "1";?>
<div class="row">
  <div class="col-md-2 pull-right">
    <a href="<?=site_url('reports/export');?>/<?=$org;?>" target="_blank" class="btn pull-right">Export</a>
  </div>
  <div class="col-md-12">
    <div class="table-scrollable">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Record ID</th><th>Employee QID</th><th scope="col">Employee Visa ID</th><th scope="col">Employee Name</th>
            <th scope="col">Employee Bank Short Name</th><th scope="col">Employee Account</th><th scope="col">Salary Frequency</th>
            <th scope="col">Number of Working Days</th><th scope="col">Net Salary</th><th scope="col">Basic Salary</th>
            <th scope="col">Extra hours</th><th scope="col">Extra Income</th><th scope="col">Deductions</th>
            <th scope="col">Payment Type</th><th scope="col" width="400">Notes / Comments</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if($employee)
            {
              $i = 1;
              foreach ($employee as $value)
              {
                ?>
                  <tr>
                    <td><?=$i++;?></td>
                    <td><?=$value['emp_qid'];?></td>
                    <td><?=$value['emp_visa_id'];?></td>
                    <td><?=$value['emp_name'];?></td>
                    <td><?=$value['emp_bank_short_name'];?></td>
                    <td><?=$value['emp_account'];?></td>
                    <td><?=$value['salary_frequency'];?></td>
                    <td><?=$value['no_working_days'];?></td>
                    <td><?=$value['net_salary'];?></td>
                    <td><?=$value['basic_salary'];?></td>
                    <td><?=$value['extra_hours'];?></td>
                    <td><?=$value['extra_income'];?></td>
                    <td><?=$value['deductions'];?></td>
                    <td><?=$value['emp_qid'];?></td>
                    <td>Wages for March 2017</td>
                  </tr>
                <?php
              }
            }
            else
            {
              ?>
                <tr>
                  <td colspan="15"> No Records Found.</td>
                </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>