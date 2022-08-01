<?php 

   $ERP = new erp_function();
   $ERP_SHARED = new erp_shared_function();

   $o= (isset($_REQUEST['o']) ? $_REQUEST['o'] : null);
      $DESIGNATION_CODE = (isset($_POST['designation_code']) ? $_POST['designation_code'] : null);
      print $DESIGNATION_CODE;
   

   if (strlen($o)==0) { exit; }

   $MID = (isset($_POST['mid']) ? $_POST['mid'] : null);
   
   $SUBMIT = (isset($_POST['submit']) ? $_POST['submit'] : null);
    
   
   if (strlen($SUBMIT)>0) { 


       include("../post/ed/transaction_post.php");  
       //include("redirection.php");  


   }

 if ($SUBMIT=='SUBMIT_EMPLOYEE_DATA')  { 
    include("../post/ed/employee_att_post.php"); 
    }

?>  

<HTML>


<BODY>
  <div class="container" style="padding:5px;width:100%">

      <div class="col-md-3" style="margin:0px">
          <?php include("transaction/transaction_create_option.php"); ?>  

      </div>

   <div class="col-md-9" style="margin:0px">
    <table>
    <td width="15%"><h3>Employee Attendance List</h3></td>
    <form action="index.php" method="post">
            <td width="15%" align="right">
             <input type="hidden" name="gid" value="<?php print $o; ?>">   
             <input type="hidden" name="o" value="ed_attendance">
             <input type="hidden" name="mid" value="new">
             <button type="submit" class="btn btn-success">Create Attendance</button>
   
    </td>
  </form>
  </table>

  <table width="100%" class="table table-striped" border="0">
      <tr>
        <th>Log No.</th>
        <th>Log Date</th>
        <th>&nbsp;</th>
        <th>Total Employee</th>
      </tr>

    <?php  

  $DATA_BANK = $ERP_EDUCATION->ERP_EDUCATION_DATA('EMPLOYEE_ATTENDANCE', $GLOBAL_CID);   

       foreach ($DATA_BANK AS $ROW) {

    $LOG_NO = $ROW['log_no'];
    $L_DATE = $ROW['log_date'];

    $TOTAL_EMPLOYEE=$ERP_EDUCATION->ERP_EDUCATION_INFO('TOTAL_EMPLOYEE', $LOG_NO, $GLOBAL_CID);
    
    ?>

    <tr>
      <td>
        <form role="form" method="post" action="index.php">
        <button type="submit" style="border:none;background:none;color:blue"><?php print $LOG_NO; ?></button>
        <input  type="hidden" name="o" value="ed_attendance">
        <input  type="hidden" name="log_date" value="<?php print $L_DATE; ?>">
        <input  type="hidden" name="no" value="<?php print $LOG_NO; ?>">
        <input  type="hidden" name="mid" value="view">
        </form>
      </td>
      <td><?php print $L_DATE; ?></td>
      <td><?php include("att/ed_attendance_menue.php"); ?></td>
      <td><?php print $TOTAL_EMPLOYEE; ?></td>

    </tr>

  <?php } ?>

    </thead>

     </div>

  </div>
</BODY>
</HTML>