
<?php include("header.php"); ?>

<script type="text/javascript">
var http = false;
if(navigator.appName == "Microsoft Internet Explorer") {
  http = new ActiveXObject("Microsoft.XMLHTTP");
} else {
  http = new XMLHttpRequest();
} 


function AJX_FETCH_GRID() {
  var UserID;
  var Password; 
  UserID = document.getElementById('UID').value;
  PIN = document.getElementById('PWD').value;

  http.open("POST", "login_check.php?uid=" + UserID  + "&pin=" + PIN + "&cid=001", true);


  http.onreadystatechange=function() {
    if(http.readyState == 4) {
    var response = http.responseText;
      if (response.length==4) { 
          document.getElementById('BTN_SUBMIT').disabled = false;
    } else { 
         // document.getElementById('BTN_SUBMIT').disabled = true;
    } 
          document.getElementById('LoginBox').innerHTML = http.responseText;
    }
  }
  http.send(null);
}
</script>


<div class="panel panel-default">

          <div class="panel-heading" >
	  <h3 class="panel-title"><b>User Login</b></h3>
          
          </div>

         
	  <table class="table">

       <br><div style="text-align:center"><img src="images/logo.png" width="35%"></div><br>
    <div style="margin:10px">Please input valid Email and Password first. After Email & Password validation only, Submit button will be appeared for Login. </div>

    <table class="table">
	  <tr> 
          <td align="right">User ID : </td>
          <td><input type="text" style="width:100%" class="form-control" id="UID" name="UID" placeholder="User ID" value="admin" required></td>
  	     </tr>	

	 
         <tr> 

          <td align="right">Password : </td>
          
          <td><input type="password" style="width:100%" width="100%" class="form-control" id="PWD" name="PWD" value="admin" onkeydown="AJX_FETCH_GRID()" onclick="AJX_FETCH_GRID()"  required> </td>
  	  </tr>	

	  <tr> 
        
      
      <td>
        <td><div id="LoginBox" style="color:red;margin-top:10px;display:block"><button class="btn btn-success" DISABLED>User Login</button></div></td></td>
        
        <!--<button type="submit" name='BUTSYS' class="btn btn-primary">User Login</button> -->
</tr>
  	  

	  </table>
 	  



    </div>
