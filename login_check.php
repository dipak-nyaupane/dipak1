<?php 

  $SUCCESS = 0; 	
  $STATUS_CHECK = NULL;
 
  $INPUT = $_SERVER['REQUEST_METHOD'];
  if ($INPUT=='POST') { 

     include("libraries/connect.php");

     $UID = (isset($_REQUEST['uid']) ? $_REQUEST['uid'] : null);
     $PIN = (isset($_REQUEST['pin']) ? $_REQUEST['pin'] : null);
     $CID = (isset($_REQUEST['cid']) ? $_REQUEST['cid'] : null);

     include("libraries/function.php");

     $STATUS_CHECK = RETURN_FIELD('user','status_flag','login', $UID);	
     if ($STATUS_CHECK!=='N') { 
	print "User is suspended. Please contact your Administrator.<br>";
	exit;
     }	


     $PIN = TRIM($PIN);

     $REMARKS = $PIN;	
   
     $ServerID = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
     $SessionID = date('Ymd.His'); 

	$BROWSER = $_SERVER['HTTP_USER_AGENT'];

	if (preg_match('/linux/i', $BROWSER)) {
        	$OS= 'Linux';
	    } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $BROWSER)) {
        	$OS= 'Mac';
	    } elseif (preg_match('/windows|win32|win98|win95|win16/i', $BROWSER)) {
        	$OS= 'Windows';
	    } elseif (preg_match('/ubuntu/i', $BROWSER)) {
        	$OS= 'Ubuntu';
	    } elseif (preg_match('/iphone/i', $BROWSER)) {
        	$OS= 'IPhone';
	    } elseif (preg_match('/ipod/i', $BROWSER)) {
        	$OS= 'IPod';
	    } elseif (preg_match('/ipad/i', $BROWSER)) {
        	$OS= 'IPad';
	    } elseif (preg_match('/android/i', $BROWSER)) {
        	$OS= 'Android';
	    } elseif (preg_match('/blackberry/i', $BROWSER)) {
        	$OS= 'Blackberry';
	    } elseif (preg_match('/webos/i', $BROWSER)) {
        	$OS= 'Mobile';
	}
     
     if (strlen($PIN)>0) { 
         $PIN = md5($PIN); 

     	     
     $QRY = "SELECT * FROM user WHERE login = '$UID' AND password LIKE '%$PIN%' LIMIT 1"; 

     $rx = mysqli_query($connect, $QRY);

     while ($row = mysqli_fetch_assoc($rx)) { 

               $USER_NAME = $row['name']; 
               $LOGIN_CODE = $row['login']; 
               $DESIGNATION_CODE = $row['designation_code'];


	       $LOG_DATE = date('Y-m-d');
	       $LOG_TIME = date('H:i:s');

	       $INSERT = "INSERT INTO session_log(session_id, server_id, user_id, log_date, log_time, last_time, source_flag, module_code, logout) 
			  VALUES('$SessionID', '$ServerID', '$LOGIN_CODE','$LOG_DATE','$LOG_TIME','$LOG_TIME','L', 'start','N')";

	       $rs = mysqli_query($connect, $INSERT);

	       $LOGIN = date('iHmd');

	       $INSERT = "set global max_connections = 1000"; 
               $rs = mysqli_query($connect, $INSERT);

	       $SUCCESS = 1;
	
	       mysqli_close($connect);

     } 
     }



?>

 <?php if ($SUCCESS==1) { ?>

	  <table width="100%">
	  <tr>
          <td width="10%">

	  <form method="POST" action="ed/index.php">
          <button type="submit" name='BTN_SUBMIT' id="BTN_SUBMIT" class="btn btn-success">User Login</button>
	  <input type="hidden" name="o" value="home">
	  <input type="hidden" name="login" value="login">
	  <input type="hidden" name="token" id="token" value="<?php print $LOGIN_CODE; ?>">
	  <input type="hidden" name="user_name" id="name" value="<?php print $USER_NAME; ?>">
	  <input type="hidden" name="designation_code" id="designation_code" value="<?php print $DESIGNATION_CODE; ?>">
 	  </form>

	  </td>

	  <td width="2%">&nbsp;</td>
	  <td>
	  <form method="POST" action="index.php">
          <button type="submit" name='BTN_CANCEL' id="BTN_CANCEL" class="btn btn-default">Cancel</button>
	  <input type="hidden" name="o" value="home">
	  </form>
	  </td>
  	  </tr>
	  </table> 	 	


<?php } else { 

     if ((strlen($UID)>0) AND (strlen($PIN)>0)) { 	

	print "Invalid User ID or Password." ; 
	$TRY_ID = 1;
        $INSERT = "INSERT INTO attempt_log(session_id, server_id, user_id, browser, os, try, remarks) VALUES('" . $SessionID . "', '" . $ServerID . "', '" . $UID . "','$BROWSER','$OS','$TRY_ID','$REMARKS')"; 
        $rs = mysqli_query($connect, $INSERT);
        mysqli_close($connect);

	print "<br><br><p style='color:red;font-size:13px'><b>Warning:</b></p><p style='color:gray;font-size:13px; margin-top:-10px'> Abusive or invalid login attempt are illegal operation. We are tracking IP, Browser, OS and other information for all types of invalid login attempts.";

?>


	<div>
	<form method="POST" action="index.php">
	<button class="btn btn-primary">Forgot Password ?</button>
	<input type="hidden" name="o" value="forgot">
	</form>
	</div>

<?php

     } else { 


     }	
} ?>

<?php } ?>




