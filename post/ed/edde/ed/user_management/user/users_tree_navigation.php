<table width="100%" border="0">
 <tr>
 <td valign="center">
 <h3>Application Users</h3>  
 </td>
 <td valign="center" align="right">
 
  <div class="btn-group">
   <button id="CREATE_BUTTON" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Create <?php print $TITLE_ID; ?>
  </button>
  <div class="dropdown-menu">
    <table class="table">
    <tr><td><img src="../images/in.png"> 
            <a href="javascript:ClearAll();ShowHide('AutomaticID');CreateTransaction();" 
            style="color:black; font-size:12;text-decoration:none"> Application User
            </a>
    </td></tr>
    </table>
  </div>
 </div>

 </td>
 </tr>
</table> 
<br>
   <div class="panel panel-default">
      <div class="panel-heading">
      <h3 class="panel-title">Application Users</h3>
      </div>

      <table class="table">

      <?php 

          $i = 0;


           $DATA_BANK = $ERP->ERP_DATA('USER_LIST', $GLOBAL_CID);
           foreach ($DATA_BANK AS $ROW) {
	
	    	$i = $i + 1;	
		$MY_ID = $ROW['login'];
		$MY_NAME = $ROW['name'];

      ?>
 

	   <tr>
	   <td><div style="margin:5px">
	   <a href="javascript:ShowDetail('DTL<?php print $MY_ID; ?>');">
	   <?php print $MY_NAME; ?>
	   </a></div>
	   </td>
	   </tr>	

      <?php } ?>	
      </table>	

   </div>




