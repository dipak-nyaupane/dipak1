<?php

   $BIN_NO = (isset($_POST['no']) ? $_POST['no'] : null);
   $STD_ID = (isset($_POST['id']) ? $_POST['id'] : null);

   $INPUT = $_SERVER['REQUEST_METHOD'];

   if ($INPUT=='POST') { 

	
	
	$ERP->ERP_EXECUTE($BIN);


   }
	
?>
