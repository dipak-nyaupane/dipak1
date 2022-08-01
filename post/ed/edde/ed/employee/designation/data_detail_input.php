<form id="form1" method="post">


	        <div class="panel panel-default" style="margin-right:5px;margin-left:5px">
                  <div class="panel-heading">
		     <table width="100%">
		     <tr>
                     <td width="60%"><h3 class="panel-title"><b><?php print $TITLE_ID; ?> Information</b></h3></td>
                     
		     </tr>
		     </table>
                </div>  
	       <table class='table'>



  	       <tr>
    	       <td width="<?php print $TWIDTH; ?>%" align="right"><?php print $TITLE_ID; ?> ID</td>
    	       <td width="1%" align="center">:</td>
             <td><input type="text" name="ID" id="ID" maxlenght= "4" value="<?php print $MY_ID; ?>" placeholder="<?php print $TITLE_ID; ?> ID" class="form-control" REQUIRED></td>
		
	       
	       <td>

	       </td>
  	       </tr>	

	       <tr>
	       <td style="text-align:right"><?php print $TITLE_ID; ?> Name</td>
	       <td>:</td>
	       <td><input type="text" name="EDESC" id="EDESC" value="<?php print $MY_EDESC; ?>" placeholder="<?php print $TITLE_ID; ?> Name" class="form-control" REQUIRED></td>
	       </tr>

		   

	       </td>
	       </tr>

	       </table>	
		   <table class='table'>
  <tr>
    <td width="<?php print $TWIDTH; ?>%" align="right">Local Language</td>
    <td width="1%" align="center">:</td>
    <td align="left"><input type="text" name="NDESC" id="NDESC" value="<?php print $MY_NDESC; ?>" class="form-control" placeholder="Account Name in Local Language"></td>
    </td>
  </tr>

  
 
  <tr>
  <td align="right">Remarks</td>
  <td>:</td>
  <td><input type="text" class="form-control" name="REMARKS" value="<?php print $MY_REMARKS; ?>" placeholder="Remarks" ></td>
  </tr>


  </table>



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
  <input type="hidden" name="DESIGNATION_CODE" value="<?php print $DESIGNATION_ID; ?>">
  <button type="submit" id="BTN_SUBMIT" class="btn btn-success"><b>Submit</b> <?php echo $TITLE_ID; ?></button>
  </form>  

	
  </td>

  <td width="20%" style="text-align:left"> 
  <form method="POST" action="index.php"> 
  <input type="hidden" name="o" value="<?php echo $o; ?>">
  <input type="hidden" name="DESIGNATION_CODE" value="<?php print $POST_ID; ?>">
  <button type="submit" id="BTN_CANCEL" class="btn btn-default">Cancel</button>
  </form>  

  </td>

  </tr>
  </table>	

	   </div> 

