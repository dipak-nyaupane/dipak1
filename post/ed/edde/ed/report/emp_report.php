<?php 

      $EMPLOYEE_CODE = (isset($_POST['ED_EMPLOYEE_SETUP']) ? $_POST['ED_EMPLOYEE_SETUP'] : null);
      $DESIGNATION_CODE1=(isset($_POST['ED_DESIGNATION_CODE1']) ? $_POST['ED_DESIGNATION_CODE1']: null);
         
    ?>


<div class="panel panel-default"  style="margin:5px">
    <div class="panel-heading">

      <form method="POST" action="index.php">

      <table width="100%">
      <tr>

      <td width="40%"><h3 class="panel-title"><b>Employee Report</b></h3></td>
      <td> Employee Name:</td>
       <td><?php $TBID = "ed_employee_setup"; $ORID="code";  $REQUIRED="NONE"; include("../libraries/s_box.php"); ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td> Designation:</td>
       <td><?php $TBID = "ed_designation_code1"; $QRID="code"; $REQUIRED="NONE"; include("../libraries/s_box.php"); ?>
        
       </td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
      <td>
      <button class="btn btn-primary">Go</button>
      <input type="hidden" name="o" value="<?php print $o; ?>">
      <input type="hidden" name="ed_designation_code1" value="<?php print  $DESIGNATION_CODE1; ?>">
     <input type="hidden" name="ed_employee_setup" value= "<?php print $EMPLOYEE_CODE; ?>" > 
       
      </td>
      </tr>
      </table>
      </form>
    </div>
    
 

    <div class="panel-body">
    <table class="table">
    <tr>

    <th>S.N.  </th>
    <th>Employee Name</th>
    <th>Gender</th>
    <th>Join Date </th>
    <th>Designation </th>
    <th>Address </th>
    </tr>
<?php 

$i = 0;

  $QRY = "SELECT * FROM ed_employee_setup";
  if (strlen((($DESIGNATION_CODE1)>0) and strlen(($EMPLOYEE_CODE)>0)))  { $QRY = $QRY . " WHERE ed_designation_code1='$DESIGNATION_CODE1' " ; $QRY= $QRY."and code='$EMPLOYEE_CODE'"; }

  else if (strlen($DESIGNATION_CODE1)>0) { $QRY= $QRY." where ed_designation_code1='$DESIGNATION_CODE1'";} 
  else if (strlen($EMPLOYEE_CODE)>0) { $QRY= $QRY." where code='$EMPLOYEE_CODE'"; }
 
        $rsREPORT = mysqli_query($connect, $QRY);


        while ($ROW = mysqli_fetch_assoc($rsREPORT)) { 

      $i = $i + 1; 
    $EMPLOYEE_NAME = $ROW['edesc'];
    $GENDER=$ROW['gender_code'];
    $GENDER_NAME = $ERP_SHARED->RETURN_SHARED_FIELD($GLOBAL_SID . '.gender_code', 'edesc', 'code', $GENDER);
    $JOIN_DATE=$ROW['join_date'];
    $DESIGNATION_CODE = $ROW['ed_designation_code1'];
    $DESIGNATION_NAME = $ERP_SHARED->RETURN_SHARED_FIELD('.ed_designation_code1', 'edesc', 'code', $DESIGNATION_CODE);
    $ADDRESS=$ROW['address'];

?>



    <tr>
      <td><?php print $i; ?></td>
      <td> <?php print $EMPLOYEE_NAME; ?></td>
      <td><?php print $GENDER_NAME; ?></td>
      <td> <?php print $JOIN_DATE; ?></td>
      <td> <?php print $DESIGNATION_NAME; ?></td>
      <td> <?php print $ADDRESS; ?></td>
    </tr>
    <?php } ?>


    </thead>

     </div>

  </div>
</BODY>
