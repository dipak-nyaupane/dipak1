		<?php

   $BIN_NO = (isset($_POST['no']) ? $_POST['no'] : null);
   $INPUT = $_SERVER['REQUEST_METHOD'];

   if ($INPUT=='POST') { 

	$T1 = NULL;
	if ($o=='order.manager') 		{ $T1="canteen_order_log";  } 
	if ($o=='purchase.manager') 		{ $T1="canteen_purchase_log";  } 
	if ($o=='inquiry') 			{ $T1="inquiry_log";  } 
	if ($o=='enrollment.voucher')		{ $T1="ed_enrollment_voucher";  } 
	if ($o=='receipt.voucher')		{ $T1="ed_receipt_voucher";  } 
	if ($o=='misc.voucher')			{ $T1="ed_misc_voucher";  } 
	if ($o=='bill.automation')		{ $T1="ed_billing_log";  } 
	if ($o=='attendance')			{ $T1="ed_attendance_log";  } 
	if ($o=='transpo')			{ $T1="ed_transportation_log";  } 
	if ($o=='settlement.voucher')		{ $T1="ed_settlement_voucher";  } 
	if ($o=='clinic')			{ $T1="ed_clinic_log";  } 
	if ($o=='behaviour')			{ $T1="ed_behaviour_log";  } 
	if ($o=='upgradation')			{ $T1="ed_upgradation_log";  } 
	if ($o=='course.progress')		{ $T1="ed_progress_log";  } 
	if ($o=='assignment')			{ $T1="ed_assignment_log";  } 
	if ($o=='participation')		{ $T1="ed_participation_log";  }
	if ($o=='marksheet')			{ $T1="ed_marksheet_log";  }
	if ($o=='payroll')			{ $T1="ed_salary_sheet";  }
	if ($o=='data')				{ $T1="ed_teacher_data";  }
	if ($o=='document')			{ $T1="ed_document_log";  }


	$VERIFY_DATE = date('Y-m-d H::i:s');
	if (strlen($T1)!=0) { 
	   $VERIFY = "UPDATE " . $T1 . " SET vby='$GLOBAL_UID', vdate='$VERIFY_DATE' WHERE log_no='" . $BIN_NO . "' AND ccode='" . $GLOBAL_CID . "'";  
  	   $ERP->ERP_EXECUTE($VERIFY);  
	} 


	if ($o=='upgradation') { 

           $DATA_BANK = $ERP_EDUCATION->ERP_EDUCATION_DATA("UPGRADATION_DETAIL", $BIN_NO, $GLOBAL_CID); 

           foreach ($DATA_BANK AS $ROW) {
	       $STUDENT_CODE = $ROW['student_code'];
   	       $CLASS_CODE = $ROW['upgrade_class_code'];
	       $MARK_OBTAINED = $ROW['mark_obtained'];
	       $GRADE_OBTAINED = $ROW['grade_obtained'];
	       $PASS_FLAG = $ROW['pass_flag'];
	       //$UPDATE = "UPDATE ed_student_setup SET class_code='$CLASS_CODE', admission_flag='N', pass_flag='$PASS_FLAG', mark_obtained='$MARK_OBTAINED', grade_obtained='$GRADE_OBTAINED' WHERE code='$STUDENT_CODE' and ccode='$GLOBAL_CID'"; 	   
	       //$ERP->ERP_EXECUTE($UPDATE);  
	   }	
	} 



	if ($o=='enrollment.voucher') { 
	   //do student profile update passing log no.
	   $MY_STUDENT_ID = $ERP->RETURN_FIELD('ed_enrollment_voucher','student_code','log_no', $BIN_NO); 
	   $MY_CLASS_ID = $ERP->RETURN_FIELD('ed_enrollment_voucher','class_code','log_no', $BIN_NO); 
	   $MY_SECTION_ID = $ERP->RETURN_FIELD('ed_enrollment_voucher','section_code','log_no', $BIN_NO); 
	   $MY_ROLE_NO = $ERP->RETURN_FIELD('ed_enrollment_voucher','role_no','log_no', $BIN_NO); 
	   $MY_ADMISSION_FLAG = $ERP->RETURN_FIELD('ed_enrollment_voucher','admission_flag','log_no', $BIN_NO); 

	   $HISTORY = "INSERT INTO ed_student_class_history(student_code, class_code, section_code, role_no, ccode, cby, cdate) (SELECT code, class_code, section_code, role_no, ccode, '$GLOBAL_UID', '$VERIFY_DATE' FROM ed_student_setup WHERE code='$MY_STUDENT_ID' and ccode='$GLOBAL_CID')"; 
	   $ERP->ERP_EXECUTE($HISTORY);  

	   $ENROLLMENT = "UPDATE ed_student_setup 
			  SET class_code='$MY_CLASS_ID', section_code='$MY_SECTION_ID', role_no ='$MY_ROLE_NO', admission_flag='$MY_ADMISSION_FLAG' 
			  WHERE code='$MY_STUDENT_ID' and ccode='$GLOBAL_CID'";
	   $ERP->ERP_EXECUTE($ENROLLMENT);  
	} 

	if ($o=='data') { 
	   //do something updates
	   $BASIC_FLAG = $ERP->RETURN_FIELD('ed_teacher_data','basic_flag','log_no', $BIN_NO); 
           $DATA_BANK = $ERP_EDUCATION->ERP_EDUCATION_DATA("TEACHER_DETAIL_LIST", $BIN_NO, $GLOBAL_CID); 

           foreach ($DATA_BANK AS $ROW) {
	       $TEACHER_CODE = $ROW['teacher_code'];
   	       $BASIC_SAL = $ROW['basic_sal'];
	       $GRADE_SAL = $ROW['grade_sal'];
	       $UPDATE = "UPDATE ed_teacher_setup SET basic_sal='$BASIC_SAL', grade_sal='$GRADE_SAL' WHERE code='$TEACHER_CODE' and ccode='$GLOBAL_CID'"; 	   
	       $ERP->ERP_EXECUTE($UPDATE);  
	   }	

	} 



	

   }


	
?>
