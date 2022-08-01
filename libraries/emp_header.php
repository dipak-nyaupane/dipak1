<?php

  $GLOBAL_SID ="erp_shared";

  session_start();
  $GLOBAL_CID = $_SESSION['MY_CID'];
  $GLOBAL_UID = $_SESSION['MY_UID'];


  include("connect.php");
  $ServerID = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
  date_default_timezone_set('Asia/Kathmandu');


  $qry = "SELECT a.login, a.edesc, a.ccode FROM hr_employee_setup a, session_log b
	    WHERE a.login = b.user_id AND b.server_id='" . $ServerID . "' AND b.session_id in (SELECT max(session_id) FROM session_log WHERE server_id='" . $ServerID . "')";

  $rs = mysqli_query($connect, $qry);

  while ($row = mysqli_fetch_assoc($rs)) { 
        $GLOBAL_NAM = $row['edesc']; 
  }



?>

