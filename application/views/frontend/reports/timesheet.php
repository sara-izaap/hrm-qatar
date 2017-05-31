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
      <div class="form-group col-md-4 <?php echo (form_error('daterange'))?'error':'';?>" data-error="<?php echo (form_error('daterange'))? form_error('daterange'):'';?>">
          <label required>Date Range</label>
          <input type="text" name="daterange" class="form-control date_range" value="">
      </div>
    </div>
    <div class="form-grid">
      <div class="form-group col-md-4">
          <label class="col-md-12">&nbsp;</label>
          <button class="btn btn-success pull-left" type="submit">Generate Timesheet</button>
      </div>
    </div>
  </form>
</div>
<?php
  $org_id = isset($_POST['organization']) ? $_POST['organization'] : 1;
  $daterange = isset($_POST['daterange']) ? str_replace(" | ", "-to-",$_POST['daterange']) : "";
  if($timesheet)
  {
    $dates = [];
    foreach ($timesheet as $key => $value)
    {
      $dates[$value['date']][$value['emp_id']]['hour'] = $value['hour'];
    }
    $colspan = count($dates) + 8;
    // echo "<pre>";print_r($dates);
    ?>
    <div class="row">
    <div class="col-md-5 pull-right">
      <a href="<?=site_url('reports/export_timesheet');?>/<?=$org_id."/".$daterange."/xls";?>" class="btn pull-right">Export as XLS</a>
      <a href="<?=site_url('reports/export_timesheet');?>/<?=$org_id."/".$daterange."/pdf";?>" class="btn pull-right">Save as PDF</a>
    </div>
    <br><br><?php $dd = explode("|",$_POST['daterange']);?>
    <div class="col-md-12">
      <table border="1" class="timesheet-full">
        <thead>
          <tr>
            <th colspan="<?=$colspan;?>"  style="text-align:center">Timesheet <?=date("F Y",strtotime($dd[1]));?> - MIQAS SOLUTIONS W.L.L PEARL 2</th>
          </tr>
           <tr>
          <th colspan="<?=$colspan;?>">&nbsp;</th>
          </tr>
          <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Trade</th>
            <?php
              foreach ($dates as $key => $value)
              {
                  if(date("D",strtotime($key)) == "Fri")
                      $class1 = "bg-grey";
                    else
                      $class1 = "";
                ?>
                  <th class="rotate <?=$class1;?>"><div><span><?=$key;?></div></span></th>
                <?php
              }
            ?>
            <th>Total</th>
            <th>Hrs. Rate</th>
            <th>Mess Amount</th>
            <th>Total Amount</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $id = []; $i=1;$row = [];
          foreach ($timesheet as $key => $value)
          {
            $sub_tot = [];
               $emp_id = $value['emp_id'];
              if(in_array($value['emp_id'], $id))
                continue;
              
            ?>
              <tr>
                <td><?=$i;?></td>
                <td><?=get_employee_details($value['emp_id'])['emp_name'];?></td>
                <td><?=get_employee_details($value['emp_id'])['designation'];?></td>
                <?php
                  $m = 1;
                  foreach ($dates as $key1 => $value1)
                  {
                    if(date("D",strtotime($key1)) == "Fri")
                      $class = "bg-grey";
                    else
                      $class = "";
                    if(isset($dates[$key1][$emp_id]['hour']))
                    {
                      $row[$m][] = $dates[$key1][$emp_id]['hour'];
                      $sub_tot [] = $dates[$key1][$emp_id]['hour'];
                      ?>
                        <td class="<?=$class;?>"><?=$dates[$key1][$emp_id]['hour'];?></td>
                      <?php
                    }
                    else
                    {
                      ?>
                        <td>0</td>
                      <?php
                    }
                    $m++;
                  }
                ?>
                  <td>
                    <?php
                      echo $tot2 = array_sum($sub_tot);
                      $tot[] = array_sum($sub_tot);
                    ?>
                  </td>
                  <td><?=$hour = get_hourly_rate($emp_id,$_POST['daterange']);?></td>
                  <td><?=$mess = get_employee_details($emp_id)['food_allowance'];?></td>
                  <td><?=$gtot[] = ($tot2 * $hour) - $mess;?></td>
              </tr>
            <?php
              $id[] = $value['emp_id'];
              $i++;
          }
        ?>
              <tr>
                <td>&nbsp;</td>
                <td>Grand Total</td>
                <td>&nbsp;</td>
                <?php
                for($j=1;$j<=count($dates);$j++)
                {
                  ?>
                    <td class="<?=$class;?>"><?=array_sum($row[$j]);?></td>
                  <?php
                }
                ?>
                <td><?=array_sum($tot);?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><?=array_sum($gtot);?></td>
              </tr>
        </tbody>
      </table>
    </div>
    </div>
    <?php
  }
  else
  {
    echo "No Records Found.";
  }
  ?>
<style type="text/css">
th.rotate {
 
  height: 140px;
  white-space: nowrap;
}

th.rotate > div {
  transform: translate(25px, 51px) rotate(270deg);
  width: 30px;
}
th.rotate > div > span {
  padding: 0px 22px;
    position: relative;
    left: 0px;
    top: -18px;
}

th.rotate {
  height: 140px;
  white-space: nowrap;
}
.bg-grey
{
  background: #adadad;
}
.timesheet-full 
{
 width: 100%; 
 margin-bottom: 20px;
}
.timesheet-full th, .timesheet-full td 
{
  text-align: center;
}

  
</style>
