<?php

    $TITLE_ID = "Designation"; 

    $o = (isset($_REQUEST['o']) ? $_REQUEST['o'] : null);
    $ID = (isset($_POST['id']) ? $_POST['id'] : null);
    $MID = (isset($_POST['mid']) ? $_POST['mid'] : null);
    $TAB = (isset($_POST['tab']) ? $_POST['tab'] : null);

    if (strlen($TAB)==0) { $TAB = "tab1"; } 

    $DESIGNATION_ID =  (isset($_POST['DESIGNATION_CODE']) ? $_POST['DESIGNATION_CODE'] : null);
    if (strlen($o)==0) { exit; }


	if ($SUBMIT=='SUBMIT')  { 
		include("../post/ed/designation_post.php"); 
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
       <?php include("designation/navigation.php"); ?>
       </div>
    </div>

    <div class="col-md-8">
  	<?php 

	      $DATA_BANK = $ERP_EDUCATION->ERP_EDUCATION_DATA('DESIGNATION_INFO', $ID, $GLOBAL_CID);
              foreach ($DATA_BANK AS $ROW) {

		    $MY_ID = $ROW['code'];  
			
		    $MY_EDESC = $ROW['edesc'];
			
		    $MY_REMARKS		= $ROW['remarks'];

	     if (($MID=='new') or (strlen($ID)==0)) { 

 		    $MY_ID = NULL;
		    $MY_EDESC = NULL;
		    $MY_NDESC = NULL;
		    $MY_REMARKS		= NULL;

		 }
       
	     }		


	    ?>

		<?php include("designation/data_detail.php"); ?>
	    <script>
	    document.getElementById('CODE').value='<?php print $MY_ID; ?>';
	    document.getElementById('EDESC').value='<?php print $MY_EDESC; ?>';
	    document.getElementById('NDESC').value='<?php print $MY_NDESC; ?>';
		 document.getElementById('NDESC').value='<?php print $MY_REMARKS; ?>';
	   
		</script>


 	   </div>



    </div>
  </div>
</BODY>
</HTML>
