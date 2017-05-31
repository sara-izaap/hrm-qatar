<div class="container">
	<div class="row">
		<div class="col-md-2 pull-left  print-btn">
			<br>
			<a class="btn" href="javascript:;" onclick="window.print();">Print</a>
		</div>
		<div class="col-md-10">
			<div class="logo pull-right">
				<img src="<?=base_url();?>assets/images/logo.jpg">
			</div>
		</div>
	</div>
	<!-- <?=print_r($employee);?> -->
	<div class="margin-top-20"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="pull-right">
				Date : <?=date('d-M-y');?>
			</div>
		</div>
	</div>
	<div class="margin-top-50"></div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered">
				<thead>
					<th class="text-center" colspan="2">
						Salary slip for the month of May 2017
					</th>
				</thead>
				<tbody>
					<tr>
						<td width="550"><b>Employee Name & Employee Number</b></td>
						<td class="text-center"><?=$employee['emp_name']." ;".$employee['emp_code'];?></td>
					</tr>
					<tr>
						<td width="550"><b>Designation</b></td>
						<td class="text-center"><?=$employee['designation'];?></td>
					</tr>
					<tr>
						<td width="550"><b>Date of Joining</b></td>
						<td class="text-center"><?=date("d-M-y",strtotime($employee['joining_date']));?></td>
					</tr>
					<tr>
						<td width="550"><b>Element Name</b></td>
						<td class="text-center"><b>Amount in QR</b></td>
					</tr>
					<tr>
						<td width="550"><b>Earnings</b></td>
						<td class="td-background">&nbsp;</td>
					</tr>
					<tr>
						<td width="550" class="orange-bg">Basic Salary</td>
						<td class="text-center"><?=$employee['basic_salary'];?></td>
					</tr>
					<tr>
						<td width="550" class="orange-bg">Food Allowance</td>
						<td class="text-center"><?=$employee['food_allowance'];?></td>
					</tr>
					<tr>
						<td width="550" class="orange-bg">Special Allowance</td>
						<td class="text-center"><?=$employee['special_allowance'];?></td>
					</tr>
					<tr>
						<td width="550" class="orange-bg">Overtime (N.O.T + F.O.T)</td>
						<td class="text-center">
							<?php
							$overtime = 0;
							if($not || $fot)
							{
									$not_rate = number_format($hourly_rate + (($hourly_rate / 100) * 1.25),2);
									$fot_rate = number_format($hourly_rate + (($hourly_rate / 100) * 1.5),2);
									echo $not." * ".$not_rate." + ".$fot." * ".$fot_rate." = ";
									echo $overtime = number_format(($not * $not_rate) + ($fot * $fot_rate),2);
							}
							?>	
						</td>
					</tr>
					<tr class="blue-bg">
						<td><b>Total Earnings</b></td>
						<td class="text-center">
							<b><?php
								$total_earn=($worked_hours * $hourly_rate) + $overtime + $employee['food_allowance']+$employee['special_allowance'];
								$earn = ($worked_hours * $hourly_rate) + $overtime;
								echo number_format($total_earn,2);
								?></b>
						</td>
					</tr>
					<tr>
						<td width="550"><b>Deductions</b></td>
						<td class="td-background">&nbsp;</td>
					</tr>
					<tr>
						<td width="550" class="orange-bg">Food Advance</td>
						<td class="text-center"><?=$employee['advancce_deduction'];?></td>
					</tr>
					<tr>
						<td width="550" class="orange-bg">Other Advance</td>
						<td class="text-center">-</td>
					</tr>
					<tr>
						<td width="550" class="orange-bg">Unpaid Leave</td>
						<td class="text-center">-</td>
					</tr>
					<tr class="blue-bg">
						<td><b>Total Deductions</b></td>
						<td class="text-center"><b><?=$employee['advancce_deduction'];?></b></td>
					</tr>
					<tr>
						<td width="550" class="red"><b>Net Salary</b></td>
						<td class="text-center">
							<?php
							$net_salary = "0.00";
								if($earn>0)
								{
									$net_salary=$total_earn - $employee['advancce_deduction'];
									echo  number_format($net_salary,2);
								}
							?>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-center"><b>Payment Details</b></td>
					</tr>
					<tr>
						<td colspan="2" style="height:30px;padding: 0;">
							<table style="height: 30px;">
								<td width="300" class="text-center border-right">Net Salary</td>
								<td width="300" class="text-center border-right">Currency</td>
								<td width="300" class="text-center border-right">Bank</td>
								<td width="300" class="text-center">Account</td>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="height:50px;padding: 0;">
							<table style="height: 50px;">
								<td width="297" class="text-center border-right"><b><?=number_format($net_salary,2);?></b></td>
								<td width="303" class="text-center border-right">Qatari Riyals</td>
								<td width="299" class="text-center border-right"><?=$employee['emp_bank_short_name'];?></td>
								<td width="295" class="text-center"><?=$employee['emp_account'];?></td>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<?php
								if($net_salary>0){?>
								<b>Amount in Words : <?=convert_number($net_salary)." QARs ".convert_to_paise($net_salary);?></b>
								<?php }?>
						</td>
					</tr>
					<tr>
						<td>Employee</td>
						<td class="text-center">For MIQAS</td>
					</tr>
					<tr>
						<td height="400">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="margin-top-50"></div>
<style type="text/css">
.container {
  -webkit-print-color-adjust: exact !important;
  width: 1070px;
  padding-right: 15px;
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
	}
	.col-md-2 {
    width: 16.66666667%;
}
	.table-bordered {border: 1px solid #000;}
	.col-md-12{width: 100%;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;}
	.pull-right{float: right;}.pull-left{float: left;}
	.text-center{text-align: center;}
	.margin-top-50{margin-top: 50px;}.margin-top-20{margin-top: 20px;}
	.td-background{background: #ccc;}
	.orange-bg{background: #ffe5b6;}
	.blue-bg{background: #8DB4E3;}
	.red{color:red;}
	.border-right{border-right:1px solid black;}
	
	.row {
    margin-right: -15px;
    margin-left: -15px;
    display: table;
    width: 100%;
	}
	.container:before,.row:before {
    display: table;
    content: " ";
	}
	.container:after,.row:after {
    clear: both;
	}
	body {margin: 0;}
	table {background-color: transparent;border-spacing: 0;border-collapse: collapse;width: 100%;max-width: 100%;}
	.table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {
    border-top: 0;
}
.table-bordered, .table-bordered>thead>tr>th, .table-bordered>tbody>tr>td {
    border: 1px solid black !important;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
}
.btn{    background-color: #064ba8;
    -moz-border-radius: 50px;
    -webkit-border-radius: 50px;
    border-radius: 50px;
    color: #fff;
    font-size: 16px;
    padding: 5px 15px;
    border: 2px solid transparent;}
    a{text-decoration: none;}
    @media print{.print-btn{display: none;}}
</style>


