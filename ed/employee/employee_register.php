
<?php
include ("../header.php");


    $TITLE_ID = "Employee"; 
    
    $o = (isset($_REQUEST['o']) ? $_REQUEST['o'] : null);
    $ID = (isset($_POST['id']) ? $_POST['id'] : null); 
    $CODE = (isset($_POST['code']) ? $_POST['code'] : null);
    
    $MID = (isset($_POST['mid']) ? $_POST['mid'] : null);
    
    $TAB = (isset($_POST['tab']) ? $_POST['tab'] : null);

    if (strlen($TAB)==0) { $TAB = "tab1"; }
    if (strlen($CODE)==0) { $CODE= "1"; }  

    $CLASS_ID =  (isset($_POST['ED_CLASS_CODE']) ? $_POST['ED_CLASS_CODE'] : null);
    $FLAG_ID =  (isset($_POST['ADMISSION_FLAG']) ? $_POST['ADMISSION_FLAG'] : null);
    $DESIGNATION_CODE = (isset($_POST['designation_code']) ? $_POST['designation_code'] : null);
    if (strlen($FLAG_ID)==0) { $FLAG_ID ='A'; } 	

    if (strlen($CLASS_ID)==0) { $CLASS_ID = 1; } 
    if (strlen($o)==0) { exit; }
  
     $SUBMIT = (isset($_POST['submit']) ? $_POST['submit'] : null);

    if ($SUBMIT=='SUBMIT')  { 
	include("../post/ed/employee_post.php"); 
	//include("redirection.php"); 
    } 
	 if ($SUBMIT=='SUBMIT_BIN')  {
	include("../bin/ed/employee_bin.php"); 
    } 
?>

<HTML>
<HEAD>
<TITLE><?php echo $TITLE_ID; ?></TITLE>
</HEAD>
<BODY>

 <div class="row">
    <div class="col-md-4" style="margin:0px">
       <div class="container" style="padding:5px;width:100%">
       <?php include("empl/navigation.php"); ?> 
       </div>
    </div>

    <div class="col-md-8">
        
  	<?php 

	      $DATA_BANK = $ERP_EDUCATION->ERP_EDUCATION_DATA('EMPLOYEE_INFO', $ID, $GLOBAL_CID);
              foreach ($DATA_BANK as $ROW) {


                    
                  $MY_ID = $ROW['code'];
                  
                  $MY_EDESC = $ROW['edesc'];
                  
                  $MY_NDESC = $ROW['ndesc'];
                  $MY_BS_BIRTH_DATE 	= $ROW['bs_birth_date'];
                  $MY_BIRTH_DATE 	= $ROW['birth_date'];
                  
                  $MY_JOIN_DATE 	= $ROW['join_date'];
                  
                  $MY_DESIGNATION_CODE	= $ROW['ed_designation_code1'];
                  $MY_DESIGNATION_CODE1 = $ERP_SHARED->RETURN_SHARED_FIELD('.ed_designation_code1', 'edesc', 'code', $MY_DESIGNATION_CODE);
                 
                   $MY_GENDER_CODE  = $ROW['gender_code'];
                  $MY_GENDER_NAME = $ERP_SHARED->RETURN_SHARED_FIELD($GLOBAL_SID . '.gender_code', 'edesc', 'code', $MY_GENDER_CODE);
                 
                  $MY_GENDER_NAME = $ERP_SHARED->RETURN_SHARED_FIELD($GLOBAL_SID . '.gender_code', 'edesc', 'code', $MY_GENDER_CODE);
                  $MY_MARITAL_CODE = $ROW['marital_code'];
                  $MY_MARITAL_NAME = $ERP_SHARED->RETURN_SHARED_FIELD($GLOBAL_SID . '.marital_status_code', 'edesc', 'code', $MY_MARITAL_CODE);
                  $MY_RELIGION_CODE 	= $ROW['religion_code'];
                  $MY_ACCOUNT_NUMBER =$ROW[ 'acc_no'];
                  $MY_ADDRESS 	= $ROW['address'];
                  $MY_EMAIL=$ROW['email'];

                  $MY_MOBILE 		= $ROW['mobile'];
                  $MY_FATHER_NAME 	= $ROW['father_name'];
                  $MY_MOTHER_NAME 	= $ROW['mother_name'];
                  $MY_BLOOD_CODE	= $ROW['blood_group_code'];
                  $MY_LOGIN_CODE =$ROW['login'];
                  $MY_PASSWORD_CODE =$ROW['password'];
                  $MY_REMARKS 	= $ROW['remarks'];
                  $MY_STATUS_FLAG 	= $ROW['status_flag'];


                  if (($MID=='new') or (strlen($ID)==0)) {
                      $MY_ID = "Automatic";
                      $MY_EDESC = null;
                      $MY_NDESC = null;
                      $MY_BIRTH_DATE 	= null;
                      $MY_BS_BIRTH_DATE 	= null;
                      $MY_JOIN_DATE 	=  date('Y-m-d');
                      $MY_GENDER_CODE 	= null;
                      $MY_GENDER_NAME = null;
                      $MY_MARITAL_CODE = null;
                      $MY_MARITAL_NAME = null;
                      $MY_RELIGION_CODE= null;
                      $MY_DESIGNATION_CODE1=null;
                      $MY_DESIGNATION_CODE=null;
                      $MY_JOIN_DATE =null;
                      $MY_EMAIL=null;
                      $MY_RELIGION_NAME = null;
                      $MY_FATHER_NAME 	= null;
                      $MY_MOTHER_NAME 	= null; 
                      $MY_ACCOUNT_NUMBER= null;      
                      $MY_REMARKS 	= null;
                      $MY_LOGIN_CODE= null;
                      $MY_PASSWORD_CODE= null;
                      $MY_ADDRESS 	= null;
                      $MY_MOBILE 		= null;
                      $MY_BLOOD_CODE	= 'NA';
                      $CHECKED=NULL;
                      if ($MY_STATUS_FLAG=='Y') {$CHECKED="CHECKED"; }
                  }
              }
					
	    ?>

	    <?php include("empl/data_detail.php"); ?>


	    <script>

	    document.getElementById('CODE').value='<?php print $MY_ID; ?>';
	    document.getElementById('EDESC').value='<?php print $MY_EDESC; ?>';
	    document.getElementById('NDESC').value='<?php print $MY_NDESC; ?>';
	    
	    document.getElementById('ADDRESS').value='<?php print $MY_ADDRESS; ?>';
	    document.getElementById('BS_BIRTH_DATE').value='<?php print $MY_BS_BIRTH_DATE; ?>';
        document.getElementById('BIRTH_DATE').value='<?php print $MY_BIRTH_DATE; ?>';

	    document.getElementById('ED_DESIGNATION_CODE1').value='<?php print $MY_DESIGNATION_CODE1; ?>';
	    document.getElementById('GENDER_CODE').value='<?php print $MY_GENDER_CODE; ?>';
	    document.getElementById('BLOOD_GROUP_CODE').value='<?php print $MY_BLOOD_CODE; ?>';
	    document.getElementById('MARITAL_STATUS_CODE').value='<?php print $MY_MARITAL_CODE; ?>';
        document.getElementById('JOIN_DATE').value='<?php print $MY_JOIN_DATE; ?>';

	    document.getElementById('RELIGION_CODE').value='<?php print $MY_RELIGION_CODE; ?>';
      document.getElementById('EMAIL').value='<?php print $MY_EMAIL; ?>';
	    document.getElementById('FATHER_NAME').value='<?php print $MY_FATHER_NAME; ?>';
	    document.getElementById('MOTHER_NAME').value='<?php print $MY_MOTHER_NAME; ?>';
        document.getElementById('ACC_NO').value='<?php print $MY_ACCOUNT_NUMBER; ?>';
	    
	    document.getElementById('REMARKS').value='<?php print $MY_REMARKS; ?>';
	    </script>	
	    <?php if ($MY_STATUS_FLAG=='Y') { ?>
	    <script> document.getElementById('STATUS_FLAG').checked = true; </script>
	    <?php } ?>

 	   </div>
    </div>
  </div>
</BODY>
</HTML>