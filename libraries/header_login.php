<?php


  include("configuration.php");
  $connect = mysqli_connect($HOST, $UID, $PWD, $DB);
  $ServerID = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
  date_default_timezone_set('Asia/Kathmandu');

  $qry = "SELECT a.login, a.name, a.designation_code FROM user a, session_log b
	  WHERE a.login = b.user_id AND b.server_id='" . $ServerID . "' 
          AND b.session_id in (SELECT max(session_id) FROM session_log WHERE server_id='" . $ServerID . "' and user_id='$TOKEN')";


  $rs = mysqli_query($connect, $qry);

  while ($row = mysqli_fetch_assoc($rs)) { 
        $GLOBAL_UID = $row['login']; 
        $GLOBAL_NAM = $row['name']; 
        $DESIGNATION_CODE=$row['designation_code'];
       
      
        //$GLOBAL_FLG = $row['designation_code']; 


  }

  mysqli_close($connect);


?>

