<form id="form1" method="post" action="index.php">

	        <div class="panel panel-default" style="margin-right:5px;margin-left:5px">
                  <div class="panel-heading">
		     <table width="100%">
		     <tr>
                     <td width="60%"><h3 class="panel-title"><b>User Information</h3></b></td>
                     <td width="40%" style="text-align:right">
		     <input type="checkbox" <?php print $CHECKED; ?> DISABLED>	
		     <?php include("users_operation_menu.php"); ?></td>
		     </tr>
		     </table>
                </div> 
 
	       <table class='table'>

  	       <tr>
    	       <td width="<?php print $TWIDTH; ?>%" align="right"><?php print $TITLE_ID; ?> ID</td>
    	       <td width="1%" align="center">:</td>
    	       <td align="left"><?php print $MY_ID; ?></td>
  	       </tr>

	       <tr>
	       <td style="text-align:right"><?php print $TITLE_ID; ?> Name</td>
	       <td>:</td>

	       <td><?php print $MY_NAME; ?></td>
	       </tr>
	       </table>		
	
   	       <?php include("users_tab.php"); ?>

	   </div> 

