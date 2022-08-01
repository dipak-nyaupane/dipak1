<div class="panel panel-default">

  <div class="panel-heading">
  <h3 class="panel-title">Employee Detail</h3>
  </div>

  <table class='table'>

  <tr>
    <td width="<?php print $TWIDTH; ?>%" align="right">in Local Language</td>
    <td width="1%" align="center">:</td>
    <td align="left"><input type="text" name="NDESC" id="NDESC" value="<?php print $MY_NDESC; ?>" class="form-control" placeholder="Employee Name in Local Language"></td>
    </td>
  </tr>
  <tr>
  <td style="text-align:right">Address</td>
  <td>:</td>
  <td><input class="form-control" type="text" id="ADDRESS" name="ADDRESS" placeholder="Address" value="<?php print $MY_ADDRESS; ?>"></td>
  </tr> 


  <tr>
  <td style="text-align:right">BS / AD Birth Date</td>
  <td>:</td>
  <td>
  <table width="100%">
  <tr><td width="20%">
  <input type="text" id="BS_BIRTH_DATE" name="BS_BIRTH_DATE" placeholder="YYYY-MM-DD" class="form-control" style="max-width:120px"></td>
  <td><input type="text" name="BIRTH_DATE" placeholder="YYYY-MM-DD" value="<?php print $MY_BIRTH_DATE; ?>" class="form-control" style="max-width:120px">
  </td><td>
  <script>
  $(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
  });
  });
  </script>


  </td>
  </tr>
  </table>


  </td>


  </tr> 


  <tr>
  <td style="text-align:right">Blood Group</td>
  <td>:</td>
  <td><?php $TBID = "blood_group_code"; include("../libraries/shared_selection_box.php"); ?></td>
  </tr>

<script>
document.getElementById('BLOOD_GROUP_CODE').value='<?php print $MY_BLOOD_CODE; ?>';
</script>


  <tr>
  <td style="text-align:right">Gender</td>
  <td>:</td>
  <td><?php $TBID = "gender_code"; include("../libraries/shared_selection_box.php"); ?></td>
  </tr> 
  <script>document.getElementById('GENDER_CODE').value='<?php print $MY_GENDER_CODE; ?>';
</script>


  <tr>
    <?php if($MY_DESIGNATION_CODE=='1'){ ?>
  <td style="text-align:right">Designation</td>
  <td>:</td>
  <td><?php $TBID = "ed_designation_code1"; include("../libraries/selection_box.php"); ?></td>
  </tr> 
  <script>
  document.getElementById('ED_DESIGNATION_CODE1').value='<?php print $MY_DESIGNATION_CODE; ?>'; </script>
<?php } ?>

  <tr>
  <td style="text-align:right">Marital Status</td>
  <td>:</td>
  <td><?php $TBID = "marital_status_code"; include("../libraries/shared_selection_box.php"); ?>
  </td>
  </tr> 
  <script> document.getElementById('MARITAL_STATUS_CODE').value='<?php print $MY_MARITAL_CODE; ?>';</script>

  <tr>
  <td style="text-align:right">Religion</td>
  <td>:</td>
  <td><?php $TBID = "religion_code"; include("../libraries/shared_selection_box.php"); ?></td>
  </tr> 
<script> document.getElementById('RELIGION_CODE').value='<?php print $MY_RELIGION_CODE; ?>';</script>

  <tr>
  <td style="text-align:right">Join Date</td>
  <td>:</td>
  <td><input type="text" name="JOIN_DATE" value="<?php print $MY_JOIN_DATE; ?>" id="dp_to_date" placeholder="YYYY-MM-DD" class="form-control"></td>
  </tr> 



  <tr>
  <td style="text-align:right">Father Name</td>
  <td>:</td>
  <td><input type="text" name="FATHER_NAME" id="FATHER_NAME" value="<?php print $MY_FATHER_NAME;?>" placeholder="Father Name" class="form-control"></td>
  </tr> 

  <tr>
  <td style="text-align:right">Mother Name</td>
  <td>:</td>
  <td><input type="text" name="MOTHER_NAME" id="MOTHER_NAME" value="<?php print $MY_MOTHER_NAME;?>" placeholder="Mother Name" class="form-control"></td>
  </tr> 
  <tr>
  <td style="text-align:right">Account Number</td>
  <td>:</td>
  <td><input type="text" name="ACC_NO" id="ACC_NO" value="<?php print $MY_ACCOUNT_NUMBER;?>" placeholder="Account number" class="form-control"></td>
  </tr> 

  <tr>
  <td align="right">Mobile</td>
  <td>:</td>
  <td><input type="number" class="form-control" name="MOBILE" value="<?php print $MY_MOBILE; ?>" placeholder="Mobile Number" min="9000000000" max="9900000000"></td>
  </tr>

  <tr>
  <td style="text-align:right">Email</td>
  <td>:</td>
  <td><input type="text" name="EMAIL" id="EMAIL" value="<?php print $MY_EMAIL;?>" placeholder="EMAIL" class="form-control"></td>
  </tr> 

  <tr>
  <td style="text-align:right">Login Credential</td>
  <td>:</td>
  <td>
  <table width="100%">
  <tr>
  <td width="50%"><input type="text" name="LOGIN" id="LOGIN"  value="<?php print $MY_LOGIN_CODE;?>"placeholder="Login ID" class="form-control"></td> 
  <td width="1%">&nbsp;</td> 
  <td width="49%"><input type="password" name="PASSWORD" id="PASSWORD"  value="<?php print $MY_PASSWORD_CODE;?>"placeholder="Unchanged remains earlier password" class="form-control"></td> 
  </tr>
  </table>

  </td>
  </tr> 

  <tr>
  <td style="text-align:right">Remarks</td>
  <td>:</td>
  <td><input type="text" name="REMARKS" id="REMARKS" value="<?php print $MY_REMARKS;?>" placeholder="Account Description" class="form-control"></td>
  </tr>



  <table class="table">
  <tr>&nbsp;</tr>
  <tr>
  <td>
  <div id="MessageID" style="color:green">&nbsp;</div>
  </td>
  <td width="20%" style="text-align:right">
  <input type="hidden" name="o" value="<?php echo $o; ?>">
  <input type="hidden" name="submit" value="SUBMIT">
  <input type="hidden" name="mid" value="<?php print $MID; ?>">
  <input type="hidden" name="id" value="<?php print $MY_ID; ?>">
  <button type="submit" id="BTN_SUBMIT" class="btn btn-success"><b>Submit</b> <?php echo $TITLE_ID; ?></button>

  </form>  

	
  </td>

  <td width="20%" style="text-align:left"> 
  <form method="POST" action="index.php"> 
  <input type="hidden" name="o" value="<?php echo $o; ?>">
  <button type="submit" id="BTN_CANCEL" class="btn btn-default">Cancel</button>
  </form>  

  </td>

  </tr>
  </table>
  

