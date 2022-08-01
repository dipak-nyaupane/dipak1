<?php
    $o = (isset($_POST['o']) ? $_POST['o'] : null);
    if (strlen($o)==0) { exit; }

    $TITLE_ID = "User"; 
    $SUBMIT = (isset($_POST['submit']) ? $_POST['submit'] : null);
    $MID = (isset($_POST['mid']) ? $_POST['mid'] : null);

    if ($SUBMIT=='SUBMIT')  { 
	include("../post/ed/user_post.php"); 
	//include("redirection.php"); 

    } 

    $ID = (isset($_POST['id']) ? $_POST['id'] : null);

?>


<HTML>
<HEAD>
<TITLE><?php echo $TITLE_ID; ?></TITLE>
</HEAD>
<BODY>

 <div class="row">
    <div class="col-md-4" style="margin:0px">

       <div class="container" style="padding:5px;width:100%">
       <?php include("user/users_tree_navigation.php"); ?>
       
       </div>
    </div>

    <div class="col-md-8">

	<form method="POST" action="index.php">

	<!-- this block is activated when new group or individual created -->
	<div class="hidethis" id="AutomaticID" style="display:none">
        <div id="DivMessageID">&nbsp;</div>
        <?php $MY_ID='AutomaticID'; include("user/users_data_detail_input.php"); ?>
 	</div>


	<script>
	var Bags  = [];
 	</script>	
 
	<?php

	    $i = 0;
	

           $DATA_BANK = $ERP->ERP_DATA('USER_LIST', $GLOBAL_CID);
           foreach ($DATA_BANK AS $ROW) {
	
		$MY_ID = $ROW['login'];
		$MY_NAME = $ROW['name'];
		$MY_ADDRESS = $ROW['address'];
		$MY_MOBILE = $ROW['mobile'];
		$MY_EMAIL = $ROW['email'];
		$MY_STATUS_FLAG = $ROW['status_flag'];
		$MY_USER_FLAG = $ROW['user_flag'];

		if ($MY_USER_FLAG=='S') { $MY_USER_GROUP ='Supervisor'; } 
		if ($MY_USER_FLAG=='O') { $MY_USER_GROUP ='Operator'; } 
		if ($MY_USER_FLAG=='M') { $MY_USER_GROUP ='Manager'; } 
	        $CHECKED = "";
	 	if ($MY_STATUS_FLAG=='Y') { 
		   $CHECKED = "CHECKED"; 
 		} 

	    ?>

	    <script>
	       data =['<?php print $MY_ID; ?>'
		      ,'<?php print $MY_NAME; ?>'
		      ,'<?php print $MY_ADDRESS; ?>' 
		      ,'<?php print $MY_MOBILE; ?>'
		      ,'<?php print $MY_EMAIL; ?>'
		      ,'<?php print $MY_STATUS_FLAG; ?>'
		      ,'<?php print $MY_USER_FLAG; ?>'
		      ,'<?php print $MY_BRANCH_DATA; ?>'
		      ,'<?php print $MY_REMARKS; ?>'
		     ];

	       Bags.push(data);
	    </script>







	    <?php if ($i==0) { ?>
	    <div class="hidethis" id="DTL<?php print $MY_ID; ?>" style="display:block">
	    <?php } else { ?>
	    <div class="hidethis" id="DTL<?php print $MY_ID; ?>" style="display:none">
	    <?php } ?>

    	    <!-- this block is activated for each and every individual transaction -->
	    <?php include("user/users_data_detail.php"); ?>
 	   </div>


        <?php $i = $i + 1; } ?>

        <?php include("../libraries/help.php"); ?>

    </div>
  </div>
</BODY>
</HTML>






<script>

function CreateTransaction() {

   document.getElementById("mid").value='new';
   document.getElementById("CODE").value="";
   document.getElementById("CREATE_BUTTON").disabled = true;
   document.getElementById('MessageID').innerHTML = "Creating <b>User</b>..."; 


}

function EditTransaction(IndexID) {

   var index_i_need;
   for(var i in Bags) {
   if(Bags[i][0]===IndexID) {
        index_i_need = i;
        break;
   }}

  document.getElementById("CODE").value = Bags[index_i_need][0];
  document.getElementById("NAME").value = Bags[index_i_need][1];
  document.getElementById("ADDRESS").value = Bags[index_i_need][2];
  document.getElementById("MOBILE").value = Bags[index_i_need][3];
  document.getElementById("EMAIL").value = Bags[index_i_need][4];

  if (Bags[index_i_need][5]=='Y') { 
  document.getElementById("STATUS_FLAG").checked = true;
  } else { 
  document.getElementById("STATUS_FLAG").checked = false;
  }     

  document.getElementById('USER_FLAG').value= Bags[index_i_need][6];
  document.getElementById("REMARKS").value = Bags[index_i_need][8];
  document.getElementById("CODE").readOnly = true;


  document.getElementById('MessageID').innerHTML = "Editing..."; 
  document.getElementById("mid").value='edit';
  document.getElementById("CREATE_BUTTON").disabled = true;

}

</script>

