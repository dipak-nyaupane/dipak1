<script type="text/javascript">
var http = false;

if(navigator.appName == "Microsoft Internet Explorer") {
  http = new ActiveXObject("Microsoft.XMLHTTP");
} else {
  http = new XMLHttpRequest();
} 


function AJX_FETCH_GRID(CID) {
  var UserID;
  var Password; 
  UserID = document.getElementById('UID').value;
  PIN = document.getElementById('PWD').value;
  MoveID = document.getElementById('MOVEMENT_CODE').value;

  http.open("POST", "./ajax/hr/attendance_result.php?uid=" + UserID  + "&pin=" + PIN + "&mid=" + MoveID + "&cid=" + CID, true);
  http.onreadystatechange=function() {
    if(http.readyState == 4) {
       document.getElementById('AttendanceID').innerHTML = http.responseText;
    }
  }
  http.send(null);
}
</script>

<?php
    $GLOBAL_SID = "erp_shared";
    $GLOBAL_CID = $ERP->COMPANY_ID();

?>


    <div class="panel panel-default" style="margin-top:-20px">

          <div class="panel-heading">
	  <h3 class="panel-title"><span class="glyphicon glyphicon-leaf"></span> <b>Attendance System</b></h3>
         </div>


	  <div style="margin:10px">
	  <form method="POST" action="index.php" onsubmit="javascript:return false">
	  <table class="table">
	  <tr><td><input type="text" style="width:100%" class="form-control" id="UID" name="UID" placeholder="Employee Login ID" value="" REQUIRED></td></tr>
	  <tr><td><input type="password" style="width:100%" class="form-control" id="PWD" name="PWD" placeholder="Password" value="" REQUIRED></td></tr>
	  <tr><td><?php $SerialID=NULL; $ORID=NULL; $TBID = "movement_code"; include("./libraries/shared_selection_box.php"); ?></td></tr>
	  </table> 
	  <table class="table">
	  <tr>
	  <td width="5%"><button class="btn btn-success" onclick="AJX_FETCH_GRID('<?php print $GLOBAL_CID; ?>')">Submit</button></td>
	  <td style="text-align:right">&nbsp;</td>
	  </table>	
	  </form>
	  </div>

	  <div id="AttendanceID" style="margin:10px">&nbsp;</div>
	
     </div>
