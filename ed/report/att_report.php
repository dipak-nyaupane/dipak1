
   <?php 

      $YEAR_CODE = (isset($_POST['ED_YEAR_CODE']) ? $_POST['ED_YEAR_CODE'] : null);
      $FROM_DATE = (isset($_POST['FROM_DATE']) ? $_POST['FROM_DATE'] : null);
      $TO_DATE = (isset($_POST['TO_DATE']) ? $_POST['TO_DATE'] : null);
      
     

      $EMPLOYEE_CODE = (isset($_POST['ED_EMPLOYEE_SETUP']) ? $_POST['ED_EMPLOYEE_SETUP'] : null);
      
    ?>

<div class="panel panel-default"  style="margin:5px">
    <div class="panel-heading">

      <form method="POST" action="index.php">

      <table width="100%">
      <tr>

      <td width="40%"><h3 class="panel-title"><b>Employee Attendance Report</b></h3></td>
      <?php if ($DESIGNATION_CODE=='1') { ?>
      <td> Employee Name:</td>
       <td><?php $TBID = "ed_employee_setup"; $ORID="code";  $REQUIRED="NONE"; include("../libraries/s_box.php"); ?></td> 
    <?php } ?>
      
 

      <td>&nbsp;</td>

      <td>From : </td>
      <td><input type="text" name="FROM_DATE" value="<?php print $FROM_DATE; ?>" id="dp_schedule_date1" placeholder="YYYY-MM-DD" class="form-control" style="max-width:120px"></td>
      <td>To : </td>
      <td><input type="text" name="TO_DATE" value="<?php print $TO_DATE; ?>" id="dp_schedule_date2" placeholder="YYYY-MM-DD" class="form-control" style="max-width:120px"></td>
      <td width="1%" style="text-align:right;">&nbsp;</td>

      <td>
      <button class="btn btn-primary">Go</button>
      <input type="hidden" name="o" value="<?php print $o; ?>">
      <input type="hidden" name="dp_schedule_date1" value= "<?php print $FROM_DATE; ?>" >
      <input type="hidden" name="dp_schedule_date2" value= "<?php print $TO_DATE; ?>" >
      <input type="hidden" name="ed_attendance_extra" value= "<?php print $EMPLOYEE_CODE; ?>" >
       
      </td>
      </tr>
      </table>
      </form>
    </div>
    
 

    <div class="panel-body">
    <table class="table">
    <tr>
    <th>S.NO </th>
    <th>Log NO  </th>
    <th>Employee Name</th>
    <th> Date </th>
    <th>In time </th>
    <th>Out Time </th>
    <th> Remarks </th>
    </tr>
<?php 

 if($DESIGNATION_CODE=="1"){

$i = 0;

  $QRY = "SELECT * FROM ed_attendance_extra";
  if (strlen((($FROM_DATE)>0) and strlen(($TO_DATE)>0)) and strlen(($EMPLOYEE_CODE)>0)) { $QRY = $QRY . " WHERE log_date>='$FROM_DATE' AND log_date<='$TO_DATE'" ; $QRY= $QRY." and employee_code='$EMPLOYEE_CODE'";}
  else if (strlen(($FROM_DATE)>0) and strlen(($TO_DATE)>0)) { $QRY = $QRY . " WHERE log_date>='$FROM_DATE' AND log_date<='$TO_DATE'";}
  else if (strlen($EMPLOYEE_CODE)>0) { $QRY= $QRY." where employee_code='$EMPLOYEE_CODE'"; } 
  
  }
  else  {

    $QRY = "SELECT * FROM ed_attendance_extra";


  if (strlen(($FROM_DATE)==0) and strlen(($TO_DATE)==0)) { $QRY = $QRY . " WHERE employee_code='$EMPLOYEE_CODE1'";} 

  if (strlen(($FROM_DATE)>0) and strlen(($TO_DATE)>0)) { $QRY = $QRY . " WHERE log_date>='$FROM_DATE' AND log_date<='$TO_DATE'";  }

  }



        $rsREPORT = mysqli_query($connect, $QRY);


        while ($ROW = mysqli_fetch_assoc($rsREPORT)) { 

      $i = $i + 1; 
    $LOG_NO = $ROW['log_no'];
    $L_DATE = $ROW['log_date'];
    $EMPLOYEE_NAME=$ROW['employee_name'];
    $ARRIVAL_TIME=$ROW['arrival_time'];
    $DEPARTURE_TIME=$ROW['departure_time'];
    $REMARKS=$ROW['remarks'];



?>



    <tr>
      <td> <?php print $i; ?></td>
      <td><?php print $LOG_NO; ?></td>
      <td> <?php print $EMPLOYEE_NAME; ?></td>
      <td><?php print $L_DATE; ?></td>
      <td> <?php print $ARRIVAL_TIME; ?></td>
      <td> <?php print $DEPARTURE_TIME; ?></td>
      <td> <?php print $REMARKS; ?></td>
      
      

    </tr>
  

  <?php } ?>


    </thead>

     </div>

  </div>
</BODY>
