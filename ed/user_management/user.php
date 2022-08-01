<?php

    $TITLE_ID = "User"; 

    $o = (isset($_REQUEST['o']) ? $_REQUEST['o'] : null);
    $ID = (isset($_POST['id']) ? $_POST['id'] : null);
    $CODE = (isset($_POST['code']) ? $_POST['code'] : null);
    $MID = (isset($_POST['mid']) ? $_POST['mid'] : null);
    $TAB = (isset($_POST['tab']) ? $_POST['tab'] : null);
	$SUBMIT = (isset($_POST['submit']) ? $_POST['submit'] : null);

    if (strlen($TAB)==0) { $TAB = "tab1"; } 
    if (strlen($ID)==0) { $ID = "1"; } 
    if (strlen($CODE)==0) { $CODE = "1"; } 


    if (strlen($o)==0) { exit; }


	if ($SUBMIT=='SUBMIT')  { 
		include("../post/ed/user_post.php"); 
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
       <?php include("user/navigation.php"); ?>
       </div>
    </div>

    <div class="col-md-8">
  	<?php 
  			
    	      $DATA_BANK = $ERP_EDUCATION->ERP_EDUCATION_DATA('USER_INFO1', $CODE, $GLOBAL_CID);
              foreach ($DATA_BANK AS $ROW) {
            $MY_CODE=$ROW['code'];
  
		    $MY_ID = $ROW['login'];  
		    $MY_NAME = $ROW['name'];

		    $MY_PASSWORD=$ROW['password'];
		    $MY_EMAIL=$ROW['email'];
		    $MY_DESIGNATION_CODE	= $ROW['designation_code'];
            $MY_DESIGNATION_CODE1 = $ERP_SHARED->RETURN_SHARED_FIELD('.ed_designation_code1', 'edesc', 'code', $MY_DESIGNATION_CODE);
			
		    $MY_REMARKS		= $ROW['remarks'];

	     if (($MID=='new') or (strlen($ID)==0)) { 
 		    $MY_ID = NULL;
		    $MY_NAME = NULL;
		    $MY_PASSWORD = NULL;
		    $MY_DESIGNATION_CODE1=NULL;
		    $MY_REMARKS		= NULL;
		    $MY_CODE=NULL;

		 }
       
	     }		


	    ?>

		<?php include("user/data_detail.php"); ?>
	    <script>
	    document.getElementById('CODE').value='<?php print $MY_CODE; ?>';
	    document.getElementById('ID').value='<?php print $MY_ID; ?>';
	    document.getElementById('USERNAME').value='<?php print $MY_NAME; ?>';
	    document.getElementById('EMAIL').value='<?php print $MY_EMAIL; ?>';
		document.getElementById('DESIGNATION_CODE').value='<?php print $MY_DESIGNATION_CODE1; ?>';
	   
		</script>


 	   </div>



    </div>
  </div>
</BODY>
</HTML>
