
<?php
$LOG_DATE = date('Y-m-d'); 
$LOG_NO = $ERP_EDUCATION->ED_TRAN_ID('ed_attendance_extra', $GLOBAL_CID);

    $LOG = (isset($_POST['no']) ? $_POST['no'] : null);
    $o = (isset($_POST['o']) ? $_POST['o'] : null);
    $MID = (isset($_POST['mid']) ? $_POST['mid'] : null);
   

?>

<?php if ($MID == "new") { ?>

  <form method="POST" action="index.php">
  <h2 style="text-align: center;"><strong> Daily Attendance </strong> </h2>
  <div class="panel panel-default" style="margin:5px">
  <div class="panel-heading">

 <table>
  <tr > 
  <td width="10%" ><strong> LOG NO :</strong> <?php print $LOG_NO;?></td> 
  <td width="50%"> <strong>LOG DATE :</strong> <?php print $LOG_DATE;?></td> 
  </tr>
</table>
<br>
  <table width="100%" width="100%">
  <table class="table" border="2">
  <tr border="2">
  <th width="5%">Code </th>
  <th width="40%" style="text-align:center;">Employee Name</th>
  <th width="10%">In Time</th>
  <th width="10%">Out Time</th> 
  <th width="20%">Remarks </th>
<?php  
$x=0;
  $DATA_BANK = $ERP_EDUCATION->ERP_EDUCATION_DATA('EMPLOYEE_INFO_ATTENDANCE', $GLOBAL_CID);   

       foreach ($DATA_BANK AS $ROW) {
$x=$x+1;
    $EMPLOYEE_CODE = $ROW['code'];
    $EMPLOYEE_NAME = $ROW['edesc'];

?>

  <tr>
  <td style="text-align:center"><?php print $EMPLOYEE_CODE; ?>
  <input type="hidden" name="EMPLOYEE_CODE<?php print $x; ?>" value="<?php print $EMPLOYEE_CODE; ?>"></td>
  <td style="text-align:center"><?php print $EMPLOYEE_NAME; ?>
  <input type="hidden" name="EMPLOYEE_NAME<?php print $x; ?>" value="<?php print $EMPLOYEE_NAME; ?>"></td>

  <td ><input type="text" class="form-control" placeholder="Arrival Time" style="text-align:left" name="ARRIVAL_TIME<?php print $x; ?>"></td>
  <td ><input type="text" class="form-control" placeholder="Departure Time" name="DEPARTURE_TIME<?php print $x; ?>"></td>
  <td><input type="text" class="form-control" placeholder="Remarks" name="REMARKS<?php print $x; ?>"></td>

</tr>
<?php } ?>


  </table>
  <tr>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td>
    <button class="btn btn-primary" style="float: right">Submit New Data</button>
    <input type="hidden" name="LOG_NO" value="<?php print $LOG_NO; ?>">
    <input type="hidden" name="LOG_DATE" value="<?php print $LOG_DATE; ?>">
    <input type="hidden" name="submit" value="SUBMIT_EMPLOYEE_DATA">
    <input type="hidden" name="o" value="emp_att">
    <input type="hidden" name="mid" value="<?php print $MID; ?>">
    <input type="hidden" name="ROW_COUNT" value="<?php print $x; ?>">
  </td>
  </tr>
  <!-- edit -->

<?php } else if ($MID=="edit"){ ?>


  <form method="POST" action="index.php">
  <h2 style="text-align: center;"> ATTENDANCE </h2>
  <div class="panel panel-default" style="margin:10px">
  <div class="panel-heading">
  <?php 
   

  $DATA_BANK = $ERP_EDUCATION->ERP_EDUCATION_DATA('EMPLOYEE_INFO_ATTENDANCE1', $LOG,  $GLOBAL_CID);   

       foreach ($DATA_BANK AS $ROW) {   
}
?>

 <table>
  <tr > 
  <td width="10%" > LOG NO : <?php print $LOG;?></td> 
  <td width="50%"> LOG DATE : <?php print $LOG_DATE;?></td> 
  </tr>
</table>
<br>
  <table class="table" border="2" >
  <tr>
  <table class="table" border="2">
  <tr>
  <th width="5%">Code </th>
  <th width="40%" style="text-align:center;">Employee Name</th>
  <th width="10%">In Time</th>
  <th width="10%">Out Time</th> 
  <th width="30%">Remarks </th>
  <?php 

     $x=0;
    $DATA_BANK = $ERP_EDUCATION->ERP_EDUCATION_DATA('EMPLOYEE_INFO_ATTENDANCE', $GLOBAL_CID);   

       foreach ($DATA_BANK AS $ROW) {
    $x=$x+1;
    $EMPLOYEE_CODE = $ROW['code'];
    $EMPLOYEE_NAME = $ROW['edesc'];


      $EMPLOYEE_CODE = $ERP->RETURN_FIELD_MARKSHEET('ed_attendance_extra','employee_code','id', $x, $LOG);
      $EMPLOYEE_NAME = $ERP->RETURN_FIELD_MARKSHEET('ed_attendance_extra','employee_name','id', $x, $LOG);	 
      $ARRIVAL_TIME = $ERP->RETURN_FIELD_MARKSHEET('ed_attendance_extra','arrival_time','id', $x, $LOG);
      $DEPARTURE_TIME = $ERP->RETURN_FIELD_MARKSHEET('ed_attendance_extra','departure_time','id', $x, $LOG);
      $REMARKS = $ERP->RETURN_FIELD_MARKSHEET('ed_attendance_extra','remarks','id', $x, $LOG);

  ?>


  
  <tr>

  <td><?php print $EMPLOYEE_CODE;  ?>
    <input type="hidden" name="EMPLOYEE_CODE<?php print $x; ?>" value="<?php print $EMPLOYEE_CODE; ?>"></td>

  <td><?php print $EMPLOYEE_NAME;  ?>
     <input type="hidden" name="EMPLOYEE_NAME<?php print $x; ?>" value="<?php print $EMPLOYEE_NAME; ?>"></td>
  <td ><input type="text" class="form-control" name="ARRIVAL_TIME<?php print $x; ?>"  value="<?php print $ARRIVAL_TIME   ?>" ></td>
  <td ><input type="text" class="form-control" name="DEPARTURE_TIME<?php print $x;?>" value="<?php print $DEPARTURE_TIME ?>" ></td>
  <td><input type="text" class="form-control"  name="REMARKS<?php print $x; ?>"       value="<?php print $REMARKS        ?>" ></td>
  

  </tr>



<?php } ?>



  </table>
  <tr>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td>
    <button class="btn btn-primary" style="float: right">Submit Edited Data</button>
    <input type="hidden" name="LOG" value="<?php print $LOG; ?>">
    <input type="hidden" name="L_DATE" value="<?php print $LOG_DATE; ?>">
    <input type="hidden" name="submit" value="SUBMIT_EMPLOYEE_DATA">
    <input type="hidden" name="o" value="emp_att">
    <input type="hidden" name="mid" value="<?php print $MID; ?>">
    <input type="hidden" name="ROW_COUNT" value="<?php print $x; ?>">
  </td>

  </tr>

 </form>

</div>

<?php } else if ($MID=="view") { ?>


  <form method="POST" action="index.php">
  <h2 style="text-align: center;"> ATTENDANCE </h2>
  <div class="panel panel-default" style="margin:10px">
  <div class="panel-heading">
  <?php 
   

  $DATA_BANK = $ERP_EDUCATION->ERP_EDUCATION_DATA('EMPLOYEE_INFO_ATTENDANCE1', $LOG,  $GLOBAL_CID);   

       foreach ($DATA_BANK AS $ROW) {   
}
?>

 <table>
  <tr > 
  <td width="10%" > LOG NO : <?php print $LOG;?></td> 
  <td width="50%"> LOG DATE : <?php print $LOG_DATE;?></td> 
  </tr>
</table>
<br>
  <table class="table" border="2" id="export_data">
  <tr>
  <table class="table" border="2">
  <tr>
  <th width="5%">Code </th>
  <th width="40%" style="text-align:center;">Employee Name</th>
  <th width="10%">In Time</th>
  <th width="10%">Out Time</th> 
  <th width="30%">Remarks </th>
  <?php 

     $x=0;
    $DATA_BANK = $ERP_EDUCATION->ERP_EDUCATION_DATA('EMPLOYEE_INFO_ATTENDANCE', $GLOBAL_CID);   

       foreach ($DATA_BANK AS $ROW) {
    $x=$x+1;
    $EMPLOYEE_CODE = $ROW['code'];
    $EMPLOYEE_NAME = $ROW['edesc'];

      $EMPLOYEE_CODE = $ERP->RETURN_FIELD_MARKSHEET('ed_attendance_extra','employee_code','id', $x, $LOG); 
      $EMPLOYEE_NAME = $ERP->RETURN_FIELD_MARKSHEET('ed_attendance_extra','employee_name','id', $x, $LOG);   
      $ARRIVAL_TIME = $ERP->RETURN_FIELD_MARKSHEET('ed_attendance_extra','arrival_time','id', $x, $LOG);
      $DEPARTURE_TIME = $ERP->RETURN_FIELD_MARKSHEET('ed_attendance_extra','departure_time','id', $x, $LOG);
      $REMARKS = $ERP->RETURN_FIELD_MARKSHEET('ed_attendance_extra','remarks','id', $x, $LOG);

  ?>
  <tr>
  

 <td><?php print $EMPLOYEE_CODE;  ?>
     <input type="hidden" name="EMPLOYEE_CODE<?php print $x; ?>" value="<?php print $EMPLOYEE_CODE; ?>"></td>
  <td><?php print $EMPLOYEE_NAME;  ?>

     <input type="hidden" name="EMPLOYEE_NAME<?php print $x; ?>" value="<?php print $EMPLOYEE_NAME; ?>"></td>
  <td ><?php print $ARRIVAL_TIME; ?>
  <input type="hidden" class="form-control" name="ARRIVAL_TIME<?php print $x; ?>"  value="<?php print $ARRIVAL_TIME   ?>" ></td>
  <td> <?php print $DEPARTURE_TIME; ?>
    <input type="hidden" class="form-control" name="DEPARTURE_TIME<?php print $x;?>" value="<?php print $DEPARTURE_TIME ?>"></td>

  <td><?php print $REMARKS; ?>
  <input type="hidden" class="form-control"  name="REMARKS<?php print $x; ?>"value="<?php print $REMARKS?>" ></td>
  

  </tr>
<?php } ?>


<?php } ?>







