<?php

$INPUT = $_SERVER['REQUEST_METHOD'];

if ($INPUT=='POST') { 

  $CREATED_DATE = date('Y-m-d H:i:s');
  $CODE = (isset($_POST['code']) ? $_POST['code'] : null);
  $ID = (isset($_POST['ID']) ? $_POST['ID'] : null);
  $USERNAME = (isset($_POST['USERNAME']) ? $_POST['USERNAME'] : null);
  $PASSWORD = (isset($_POST['PASSWORD']) ? $_POST['PASSWORD'] : null);
  $PASSWORD = MD5($PASSWORD);
  $EMAIL = (isset($_POST['EMAIL']) ? $_POST['EMAIL'] : null);
  $STATUS_FLAG = (isset($_POST['STATUS_FLAG']) ? $_POST['STATUS_FLAG'] : null);
  if ($STATUS_FLAG=='on') { $STATUS_FLAG='Y'; } else { $STATUS_FLAG ='N'; } 
  $ED_DESIGNATION_CODE1= (isset($_POST['ED_DESIGNATION_CODE1']) ? $_POST['ED_DESIGNATION_CODE1'] : null);
  $REMARKS = (isset($_POST['REMARKS']) ? $_POST['REMARKS'] : null);
  
  if ($MID=='new') {

          $INSERT = "INSERT INTO user(login,password,name,email, designation_code, remarks,status_flag, ccode, cby, cdate) 
         VALUES('$ID','$PASSWORD','$USERNAME','$EMAIL','$ED_DESIGNATION_CODE1','$REMARKS', '$STATUS_FLAG','$GLOBAL_CID','$GLOBAL_UID','$CREATED_DATE')";
        
        print $INSERT;
          $ERP->ERP_EXECUTE($INSERT);
          
  } 

  if ($MID=='edit') {
  
      $EMPLOYEE_CODE = (isset($_POST['code']) ? $_POST['code'] : null);
      $UPDATE = "UPDATE user SET 
              
              login ='$ID'
              ,password='$PASSWORD'   
              ,name='$USERNAME'
              ,email='$EMAIL'
              ,designation_code='$ED_DESIGNATION_CODE1'
              ,remarks='$REMARKS'
              ,status_flag='$STATUS_FLAG'
              ,ccode='$GLOBAL_CID'
              ,cby='$GLOBAL_UID' 
              ,cdate='$CREATED_DATE'
              WHERE code='$EMPLOYEE_CODE'
              AND ccode='$GLOBAL_CID'";

              print $UPDATE;
              

          $ERP->ERP_EXECUTE($UPDATE);



            



  }



  }


?>