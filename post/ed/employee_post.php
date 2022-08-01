<?php

  $INPUT = $_SERVER['REQUEST_METHOD'];

  if ($INPUT=='POST') { 

	$CREATED_DATE = date('Y-m-d H:i:s');
	$EDESC = (isset($_POST['EDESC']) ? $_POST['EDESC'] : null);
	$NDESC = (isset($_POST['NDESC']) ? $_POST['NDESC'] : null);
	$BS_BIRTH_DATE = (isset($_POST['BS_BIRTH_DATE']) ? $_POST['BS_BIRTH_DATE'] : null);
	$BIRTH_DATE = (isset($_POST['BIRTH_DATE']) ? $_POST['BIRTH_DATE'] : null);
	$GENDER_CODE = (isset($_POST['GENDER_CODE']) ? $_POST['GENDER_CODE'] : null);
	$MARITAL_CODE = (isset($_POST['MARITAL_STATUS_CODE']) ? $_POST['MARITAL_STATUS_CODE'] : null);
	$ED_DESIGNATION_CODE1= (isset($_POST['ED_DESIGNATION_CODE1']) ? $_POST['ED_DESIGNATION_CODE1'] : null);
	$RELIGION_CODE = (isset($_POST['RELIGION_CODE']) ? $_POST['RELIGION_CODE'] : null);
	$LANGUAGE_CODE = (isset($_POST['LANGUAGE_CODE']) ? $_POST['LANGUAGE_CODE'] : null);
	$JOIN_DATE = (isset($_POST['JOIN_DATE']) ? $_POST['JOIN_DATE'] : null);
	$EMAIL = (isset($_POST['EMAIL']) ? $_POST['EMAIL'] : null);
	$FATHER_NAME = (isset($_POST['FATHER_NAME']) ? $_POST['FATHER_NAME'] : null);
	$MOTHER_NAME = (isset($_POST['MOTHER_NAME']) ? $_POST['MOTHER_NAME'] : null);
	$BLOOD_CODE = (isset($_POST['BLOOD_GROUP_CODE']) ? $_POST['BLOOD_GROUP_CODE'] : null);
	$ADDRESS = (isset($_POST['ADDRESS']) ? $_POST['ADDRESS'] : null);
	$ACC_NO = (isset($_POST['ACC_NO']) ? $_POST['ACC_NO'] : null);
	$STATUS_FLAG = (isset($_POST['STATUS_FLAG']) ? $_POST['STATUS_FLAG'] : null);
	if ($STATUS_FLAG=='on') { $STATUS_FLAG='Y'; } else { $STATUS_FLAG ='N'; } 
	$MOBILE = (isset($_POST['MOBILE']) ? $_POST['MOBILE'] : null);

	$LOGIN = (isset($_POST['LOGIN']) ? $_POST['LOGIN'] : null);
	$PASSWORD = (isset($_POST['PASSWORD']) ? $_POST['PASSWORD'] : null);
	$PASSWORD = md5($PASSWORD);
	$REMARKS = (isset($_POST['REMARKS']) ? $_POST['REMARKS'] : null);

	

	if ($MID=='new') {

	        $INSERT = "INSERT INTO ed_employee_setup(edesc, ndesc,  
			   bs_birth_date, birth_date, gender_code, marital_code, ed_designation_code1,  
			   religion_code, join_date,
			   father_name, mother_name, acc_no,
			   blood_group_code, address,mobile, email, 
			   login,password, remarks, status_flag, ccode, cby, cdate) 

		   VALUES('$EDESC','$NDESC',
			  '$BS_BIRTH_DATE','$BIRTH_DATE', '$GENDER_CODE','$MARITAL_CODE','$ED_DESIGNATION_CODE1','$RELIGION_CODE','$JOIN_DATE',
			  '$FATHER_NAME','$MOTHER_NAME', '$ACC_NO',
			  '$BLOOD_CODE','$ADDRESS','$MOBILE', '$EMAIL',
			  '$LOGIN', '$PASSWORD', '$REMARKS', '$STATUS_FLAG' ,'$GLOBAL_CID','$GLOBAL_UID','$CREATED_DATE')";
	        $ERP->ERP_EXECUTE($INSERT);
	} 

	if ($MID=='edit') {
	
		$EMPLOYEE_CODE = (isset($_POST['id']) ? $_POST['id'] : null);
		$UPDATE = "UPDATE ed_employee_setup SET 
				  edesc='$EDESC'		
				 ,ndesc='$NDESC'
				 ,bs_birth_date='$BS_BIRTH_DATE'
				 ,birth_date='$BIRTH_DATE'
				 ,gender_code='$GENDER_CODE'
				 ,marital_code='$MARITAL_CODE'
				 ,ed_designation_code1='$ED_DESIGNATION_CODE1'
				 ,religion_code	='$RELIGION_CODE'
				 ,join_date='$JOIN_DATE'
				 ,father_name='$FATHER_NAME'					 
				 ,mother_name='$MOTHER_NAME'
				 ,acc_no='$ACC_NO'
				 ,blood_group_code='$BLOOD_CODE'
				 ,address='$ADDRESS'
				 ,mobile='$MOBILE'
				 ,email='$EMAIL'
				 ,login='$LOGIN'
				 ,password='$PASSWORD'
				 ,remarks='$REMARKS'
				 ,status_flag='$STATUS_FLAG'
				 ,mby='$GLOBAL_UID'	
				 ,mdate='$CREATED_DATE'
				WHERE code='$EMPLOYEE_CODE'
				AND ccode='$GLOBAL_CID'";
				PRINT $UPDATE;

	        $ERP->ERP_EXECUTE($UPDATE);

	}
 
    }


?>