<?php 
   $o= (isset($_REQUEST['o']) ? $_REQUEST['o'] : null);
   if (strlen($o)==0) { exit; } 

   include("main_men.php"); 
   $ERP = new erp_function();
   $ERP_SHARED = new erp_shared_function();
   $ERP_EDUCATION = new erp_education_function();

   $SerialID = NULL;
   $ORID = NULL;
   $REQUIRED = NULL;
   $CHECKED = NULL;
   $FILTER_OPTION = NULL;
   $ALL = NULL;
   $FROM_MONTH_CODE = $ERP->RETURN_FIELD('preferences_option','edu_from_month','code', $GLOBAL_CID);
   $TO_MONTH_CODE = $ERP->RETURN_FIELD('preferences_option','edu_to_month','code', $GLOBAL_CID);
   $SUBMIT= (isset($_POST['submit']) ? $_POST['submit'] : null);
   if ($SUBMIT=='SUBMIT_STUDENT') { 
	include("../post/ed/transaction/participation_student_post.php"); 
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