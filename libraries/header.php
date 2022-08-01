<?php

  $GLOBAL_SID ="erp_shared";

  $connect = mysqli_connect("localhost", "root", "", "erp_employee");
  $ServerID = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
  mysqli_set_charset( $connect, 'UTF8');

  

  date_default_timezone_set('Asia/Kathmandu');

  $qry = "SELECT a.login, a.name,a.designation_code,a.code FROM user a, session_log b
	    WHERE a.login = b.user_id AND b.server_id='" . $ServerID . "' AND b.session_id in (SELECT max(session_id) FROM session_log WHERE server_id='" . $ServerID . "')"; 

  $rs = mysqli_query($connect, $qry);

  while ($row = mysqli_fetch_assoc($rs)) { 
        $GLOBAL_UID = $row['login'];
        $GLOBAL_NAM = $row['name']; 
        $DESIGNATION_CODE=$row['designation_code'];
        $EMPLOYEE_CODE1=$row['code'];

      
  }


?>

<?php if (strlen($GLOBAL_NAM)==0) { header("Location: ../index.php"); }  ?>



