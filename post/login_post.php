<?php

        $UID = (isset($_POST['UID']) ? $_POST['UID'] : null);
        $PWD = (isset($_POST['PWD']) ? $_POST['PWD'] : null);
        $PWD = md5($PWD); 

        include("../libraries/connect.php"); 

	//error_reporting(0);
        $qry = "SELECT * FROM user WHERE login = '$UID' AND password='$PWD'"; 

        $rs = mysqli_query($connect, $qry);
	if( $rs){	
        $count = mysqli_num_rows($rs);
 
        if ($count>0) { 

            while ($row = mysqli_fetch_assoc($rs)) { 

               $NAME = $row['name']; 

   	       session_id('mySessionID'); 
  	       if (session_status() == PHP_SESSION_NONE) {session_start(); }	


	       $_SESSION['MY_UID'] = $UID;
	       $_SESSION['MY_NAM'] = $NAME;

	       $ServerID = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
	       $SessionID = date('Ymd.His');
	       $INSERT = "INSERT INTO session_log(session_id, server_id, user_id) VALUES('" . $SessionID . "', '" . $ServerID . "', '" . $UID . "')"; 
	       $rs = mysqli_query($connect, $INSERT);

	       NOTIFY($UID, 'logged in', ' to the system', NULL);

  	       error_reporting(0);

               ?><META HTTP-EQUIV="Refresh" CONTENT="0; URL=main.php"><?php 

  	    } 

        } else { 
          
          $MessageBox = "Invalid User ID or Password.";

        } 
    }

?>