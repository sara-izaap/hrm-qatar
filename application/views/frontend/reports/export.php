<?php
$filename=$organization['name'].'-'.date("Y-m-d").'.xls'; //save our workbook as this file name
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
?>
<table class="table table-bordered">
  <thead>
    <th>Employer EID</th><th>File Creation Date</th><th> File Creation Time</th><th>Payer EID</th><th>Payer QID</th>
    <th>Payer Bank Short Name</th><th>Payer IBAN</th><th>Salary Year and Month</th><th>Total Salaries</th><th>Total records</th>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td><?=date('Y-m-d');?></td>
      <td><?=date('H:i');?></td>
      <td><?=$organization['registration_no'];?></td>
      <td></td>
      <td><?=$organization['short_name'];?></td>
      <td></td>
      <td><?=date('Y-m');?></td>
      <td></td>
      <td><?=count($employee);?></td>
    </tr>
  </tbody>
</table>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Record ID</th><th>Employee QID</th><th scope="col">Employee Visa ID</th><th scope="col">Employee Name</th>
      <th scope="col">Employee Bank Short Name</th><th scope="col">Employee Account</th><th scope="col">Salary Frequency</th>
      <th scope="col">Number of Working Days</th><th scope="col">Net Salary</th><th scope="col">Basic Salary</th>
      <th scope="col">Extra hours</th><th scope="col">Extra Income</th><th scope="col">Deductions</th>
      <th scope="col">Payment Type</th><th scope="col">Notes / Comments</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if($employee)
      {
        $i = 1;
        foreach ($employee as $value)
        {
          $emp_id = $value['id'];
          $total_working_days = get_working_days($year,$month);
          $total_hours_in_month = $total_working_days * 8;
          $emp_code = $value['emp_code'];
          $total_hours = $this->reports_model->get_total_working_hours($emp_code,$month);
          $not = $this->reports_model->get_normal_ot($emp_code,$month);
          $fot = $this->reports_model->get_friday_ot($emp_code,$month);
          $total_working_hours = $total_hours - ($not + $fot);
          $basic_salary = $value['basic_salary'];
          $hourly_rate = number_format(($basic_salary / $total_working_days) / 8,2);
          $salary = $total_working_hours * $hourly_rate;
          $extra =($not * ($hourly_rate + (($hourly_rate / 100) * 1.25))) + ($fot * ($hourly_rate + (($hourly_rate / 100) * 1.5))) + ($value['food_allowance'] * ceil($total_working_hours/8)) + ($value['special_allowance'] * ceil($total_working_hours/8));
          ?>
            <tr>
              <td><?=$i++;?></td>
              <td><?=$value['emp_qid'];?></td>
              <td><?=$value['emp_visa_id'];?></td>
              <td><?=$value['emp_name'];?></td>
              <td><?=$value['emp_bank_short_name'];?></td>
              <td><?=$value['emp_account'];?></td>
              <td><?=$value['salary_frequency'];?></td>
              <td><?=ceil($total_working_hours/8);?></td>
              <td><?=$salary;?></td>
              <td><?=$value['basic_salary'];?></td>
              <td><?=$not+$fot;?></td>
              <td><?=number_format($extra,2);?></td>
              <td><?=$value['basic_salary'] - $salary;?></td>
              <td><?=$value['payment_type'];?></td>
              <td>Wages for <?=date("F",$month);?> 2017</td>
            </tr>
          <?php
        }
      }
    ?>
  </tbody>
</table>

<style type="text/css">
  .table-bordered {
    border: 1px solid #ddd;
}
.table-bordered > thead > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > tfoot > tr > td {
    border: 1px solid #ddd;
}
.table-scrollable > .table > thead > tr > th, .table-scrollable > .table > tbody > tr > th, .table-scrollable > .table > tfoot > tr > th, .table-scrollable > .table > tfoot > tr > th, .table-scrollable > .table > tfoot > tr > td {
    white-space: nowrap;
}
.table > caption + thead > tr:first-child > th, .table > caption + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child > th, .table > thead:first-child > tr:first-child > td {
    border-top: 0;
}
.table-bordered > thead > tr > th, .table-bordered > thead > tr > td {
    border-bottom-width: 2px;
}
.table > thead > tr > th, .table > thead > tr > td, .table > tbody > tr > th, .table > tbody > tr > td, .table > tfoot > tr > th, .table > tfoot > tr > td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
.table > thead > tr > th {
    vertical-align: bottom;
    border-bottom: 2px solid #ddd;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
}
.text-center{text-align: center;}
</style>