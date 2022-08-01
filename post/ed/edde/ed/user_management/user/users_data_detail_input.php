<form id="form1" method="post">

	        <div class="panel panel-default" style="margin-right:5px;margin-left:5px">
                  <div class="panel-heading">
		     <table width="100%">
		     <tr>
                     <td width="60%"><h3 class="panel-title"><b><?php print $TITLE_ID; ?> Information</b></h3></td>
                     <td width="40%" style="text-align:right">Enabled ID <input type="checkbox" id="STATUS_FLAG" name="STATUS_FLAG"></td>
		     </tr>
		     </table>
                </div> 
 
	       <table class='table'>


  	       <tr>
    	       <td width="<?php print $TWIDTH; ?>%" align="right"><?php print $TITLE_ID; ?> ID</td>
    	       <td width="1%" align="center">:</td>
	       <td>

	       <input type="text" name="CODE" id="CODE" placeholder="<?php print $TITLE_ID; ?> ID" class="form-control">

	       </td>
  	       </tr>

	       <tr>
	       <td style="text-align:right"><?php print $TITLE_ID; ?> Name</td>
	       <td>:</td>
	       <td><input type="text" name="NAME" id="NAME" placeholder="<?php print $TITLE_ID; ?> Name" class="form-control" REQUIRED></td>
	       </tr>

	       <!------hidden fields----------->	
	       <input type="hidden" name="MOD" id="MOD">
	       <input type="hidden" name="GRP" id="GRP">
	       </td>
	       </tr>

	       </table>		
	
   	       <?php include("users_tab_input.php"); ?>

	   </div> 

