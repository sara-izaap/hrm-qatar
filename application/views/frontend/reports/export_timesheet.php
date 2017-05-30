<?php
if($timesheet)
{
  $dates = [];
  foreach ($timesheet as $key => $value)
  {
    $dates[$value['date']][$value['emp_id']]['hour'] = $value['hour'];
  }
  $colspan = count($dates) + 8;
  // echo "<pre>";print_r($dates);
  $dd = explode("|",$daterange);
  ?>
  <table border="1">
    <thead>
      <tr>
        <th colspan="<?=$colspan;?>" style="text-align:center">Timesheet <?=date("F Y",strtotime($dd[1]));?> - MIQAS SOLUTIONS W.L.L PEARL 2</th>
      </tr>
      <tr>
        <th colspan="<?=$colspan;?>"  style="text-align:center">Time sheet march 2017 - MIQAS SOLUTIONS W.L.L PEARL 2</th>
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
              <td><?=$hour = get_hourly_rate($emp_id,$daterange);?></td>
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
  <?php
}
?>
<script type="text/javascript">
  window.print();
</script>