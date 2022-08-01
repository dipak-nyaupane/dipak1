
<?php 
   $o= (isset($_REQUEST['o']) ? $_REQUEST['o'] : null);
   if (strlen($o)==0) { exit; } 

   include("main_men.php"); 
   $ERP = new erp_function();
   $ERP_SHARED = new erp_shared_function();
   $ERP_EDUCATION = new erp_education_function();
   $login = (isset($_POST['login']) ? $_POST['login'] : null);

   $TOKEN = (isset($_REQUEST['token']) ? $_REQUEST['token'] : null);
   //$DESIGNATION_CODE = (isset($_POST['designation_code']) ? $_POST['designation_code'] : null);

   $USER_NAME=(isset($_REQUEST['user_name']) ? $_REQUEST['user_name'] : null);
   


   
  
   $COOK_ID = "user";

  //print $USER_FLAG . "$$";
   if (strlen($TOKEN)>0) { 
      $COOK_VAL = $TOKEN;

      //set for 1 day   
      setcookie($COOK_ID, $COOK_VAL, time() + (86400 * 30), "/"); 
   }  

   if(!isset($_COOKIE[$COOK_ID])) {

   } else {
       $TOKEN = $_COOKIE[$COOK_ID];
   }


  
   //$WEB_PATH = "http://localhost/teacher/lib/"; 

?>


<HTML>
<HEAD>
<TITLE>imERP - <?php print $o; ?></TITLE>
</HEAD>

<BODY>

<div id="SEARCH_STUDENT_LIST">&nbsp;</div>




<?php 


 
   
   if ($o=='dashboard') { include("employee/dashboard.php"); }
   if ($o=='emp_reg') { include("employee/employee_register.php"); }
   if ($o=='deg') {include("employee/designation.php");}
   if ($o=='emp_att') {include("employee/employee_attendance.php"); }
   if ($o=='report'){ include("report/att_report.php"); }
   if ($o=='emp_report'){ include("report/emp_report.php"); }
   if ($o=='ed_attendance') { include("employee/att/ed_attendance.php"); }
   if ($o=='users') { include("User_management/user.php"); }






   ?>

</BODY> 



