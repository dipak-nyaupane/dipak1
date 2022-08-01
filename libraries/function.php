<?php


  function NOTIFY($UID, $MODE, $OBJ, $ID) {

        require('connect.php');

        $MYDATE = date('Y-m-d H:i:s'); 
	$TEXT = $UID . " " . $MODE . " " . $OBJ;
        if (strlen($ID)>0) { $TEXT = $TEXT . "#" . $ID; } 

        $qry = "INSERT INTO notifications(date, uid, text, object) VALUES('" . $MYDATE . "','" . $UID . "','" . $TEXT . "', '" . $OBJ . "')";
        $rx = mysqli_query($connect, $qry);
        return NULL;
    } 

    function RETURN_FIELD($TAB, $DESC, $FIELD, $VAL) {

        require('connect.php');

        $RET = NULL;  

        $qry = "SELECT " . $DESC . " AS RET FROM " . $TAB . " WHERE " . $FIELD . "='" . $VAL . "'"; 
        $rx = mysqli_query($connect, $qry);

             while ($rows = mysqli_fetch_assoc($rx)) { 	
		$RET = $rows['RET']; 
             } 
             if (strlen($RET)==0) { $RET = Null; } 

        return $RET;
    } 

    function NEW_CODE_ID($TABLE) {

        require('connect.php');

        $RET = NULL;  

        $qry = "SELECT MAX(code)+1 AS RET FROM " . $TABLE; 
        $rx = mysqli_query($connect, $qry);

             while ($rows = mysqli_fetch_assoc($rx)) { 	
		$RET = $rows['RET']; 
             } 
             if (strlen($RET)==0) { $RET = '1'; } 

        return $RET;
    } 


    function LOG_NO($TAB) {

        require('connect.php');

        $RET = NULL;  

        $qry = "SELECT max(log_no) AS RET FROM transaction";
        $rx = mysqli_query($connect, $qry);

             while ($rows = mysqli_fetch_assoc($rx)) { 	
		$RET = $rows['RET']; 
             } 
             if (strlen($RET)==0) { $RET = Null; } 

        return $RET;
    } 


    function STUDENT_BAL($STUDENT_ID, $CID) {

        require('connect.php');

        $RET = NULL;  

        $qry = "SELECT sum(dr_amount) AS DR FROM v_fee_ledger WHERE student_code='$STUDENT_ID' and ccode='$CID'";
        $rx = mysqli_query($connect, $qry);
        while ($rows = mysqli_fetch_assoc($rx)) { 	$DR = $rows['DR'];  } 


        $qry = "SELECT sum(cr_amount) AS CR FROM v_fee_ledger WHERE student_code='$STUDENT_ID' and ccode='$CID'";
        $rx = mysqli_query($connect, $qry);
        while ($rows = mysqli_fetch_assoc($rx)) { 	$CR = $rows['CR'];  } 

        $RET = $DR - $CR; 

        return $RET;
    } 



?>
