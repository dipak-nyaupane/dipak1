
<?php

$INPUT = $_SERVER['REQUEST_METHOD'];

if ($INPUT=='POST') { 

  $CREATED_DATE = date('Y-m-d H:i:s');


  $ID = (isset($_POST['ID']) ? $_POST['ID'] : null);
  $EDESC = (isset($_POST['EDESC']) ? $_POST['EDESC'] : null);
  $NDESC = (isset($_POST['NDESC']) ? $_POST['NDESC'] : null);
  $REMARKS = (isset($_POST['REMARKS']) ? $_POST['REMARKS'] : null);
  
  if ($MID=='new') {

          $INSERT = "INSERT INTO ed_designation_code1(CODE, edesc, ndesc, remarks, ccode, cby, cdate) 
         VALUES('$ID','$EDESC','$NDESC','$REMARKS','$GLOBAL_CID','$GLOBAL_UID','$CREATED_DATE')";
print $INSERT;
          $ERP->ERP_EXECUTE($INSERT);
          
  } 

  if ($MID=='edit') {
  
      $EMPLOYEE_CODE = (isset($_POST['id']) ? $_POST['id'] : null);
      $UPDATE = "UPDATE ed_designation_code1 SET 
                code ='$ID'
              ,edesc='$EDESC'		
               ,ndesc='$NDESC'
               ,remarks='$REMARKS'
               ,cby='$GLOBAL_UID'	
               ,cdate='$CREATED_DATE'
              WHERE code='$EMPLOYEE_CODE'
              AND ccode='$GLOBAL_CID'";

          $ERP->ERP_EXECUTE($UPDATE);

             print $UPDATE;



  }



  }


?>