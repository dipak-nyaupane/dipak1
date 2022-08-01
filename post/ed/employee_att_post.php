
<?php


  $INPUT = $_SERVER['REQUEST_METHOD'];

  if ($INPUT=='POST') { 
				$CREATED_DATE = date('Y-m-d H:i:s');
        $ROW_COUNT = (isset($_POST['ROW_COUNT']) ? $_POST['ROW_COUNT'] : null);
        $LOG_NO = (isset($_POST['LOG_NO']) ? $_POST['LOG_NO'] : null);
        $LOG_DATE = (isset($_POST['LOG_DATE']) ? $_POST['LOG_DATE'] : null);
        $MID = (isset($_POST['mid']) ? $_POST['mid'] : null);
        

	for ($x = 1; $x <= $ROW_COUNT; $x++) {

		$FIELD_ID = "EMPLOYEE_CODE" . $x; $EMPLOYEE_CODE = (isset($_POST[$FIELD_ID]) ? $_POST[$FIELD_ID] : null);
		$FIELD_ID = "EMPLOYEE_NAME" . $x; $EMPLOYEE_NAME = (isset($_POST[$FIELD_ID]) ? $_POST[$FIELD_ID] : null);
		$FIELD_ID = "ARRIVAL_TIME" . $x; $ARRIVAL_TIME = (isset($_POST[$FIELD_ID]) ? $_POST[$FIELD_ID] : null);
		$FIELD_ID = "DEPARTURE_TIME" . $x; $DEPARTURE_TIME = (isset($_POST[$FIELD_ID]) ? $_POST[$FIELD_ID] : null);
		$FIELD_ID = "REMARKS" . $x; $REMARKS = (isset($_POST[$FIELD_ID]) ? $_POST[$FIELD_ID] : null);
		
		if ($MID=="new"){

			$ACTION = "INSERT INTO ed_attendance_extra(id, log_no,log_date, employee_code, employee_name, arrival_time, departure_time, remarks,
				ccode, cby, cdate)
				   VALUES('$x','$LOG_NO','$LOG_DATE','$EMPLOYEE_CODE', '$EMPLOYEE_NAME' ,'$ARRIVAL_TIME','$DEPARTURE_TIME','$REMARKS',
				   '$GLOBAL_CID','$GLOBAL_UID','$CREATED_DATE')";	

				   		   		
			$ERP->ERP_EXECUTE($ACTION);

} else if ($MID=="edit") {

        $LOG = (isset($_POST['LOG']) ? $_POST['LOG'] : null);
        $L_DATE = (isset($_POST['L_DATE']) ? $_POST['L_DATE'] : null);

	$DELETE = "DELETE FROM ed_attendance_extra WHERE log_no='$LOG' and id='$x' and ccode='$GLOBAL_CID'";

	$ERP->ERP_EXECUTE($DELETE); 

			$UPDATE = "INSERT INTO ed_attendance_extra(id, log_no,log_date,employee_code,employee_name,arrival_time,departure_time, remarks,
				ccode, cby, cdate)
				   VALUES('$x','$LOG','$L_DATE','$EMPLOYEE_CODE','$EMPLOYEE_NAME','$ARRIVAL_TIME','$DEPARTURE_TIME','$REMARKS',
				   '$GLOBAL_CID','$GLOBAL_UID','$CREATED_DATE')";	
					$ERP->ERP_EXECUTE($UPDATE);
} 

	  } 

    }


?>