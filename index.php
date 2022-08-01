
<?php

    include("class/erp_function.php");
    $ERP = new erp_function();
    //$ERP->SYSTEM_PERMISSION();

    error_reporting(0); 
    include("header.php");
    $login = null;
    $MessageBox = null;
	$GLOBAL_CID = '001'; 

    $o = (isset($_POST['o']) ? $_POST['o'] : null);
    
    if (strlen($o)==0) { $o='erp'; } 
    
    $login = (isset($_POST['login']) ? $_POST['login'] : null);

    if (strlen($login)!=0) { 
	include("libraries/connect.php"); 
	include("libraries/function.php"); 
	include("post/login_post.php"); 
    } 
?>

	<?php include("libraries/index_menu.php"); ?>

</head>


<HTML>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<BODY>

<div class="container" style="background:white;width:100%; height:108px">

    <div class="col-lg-8"> 
    <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title"> <b>About Us</b> : Employee Attendance System  ! </h3>
    </div>

    <div style="margin:10px">	
    <img src="./images/39-397672_sms-marketing-gateway-sms-marketing-images-png.png.jpg" width="100%">
    </div>	

    </div>
    </div>	

    <div class="col-lg-4"> 

    <?php 
       include("libraries/connect.php"); 

       if ($o=='home') { include("about.php"); } 	
       if ($o=='erp') { include("login.php"); } 
       if ($o=='attendance') { include("ed/v/attendance.php"); } 

    ?>	

    </div>	

</div>



</BODY>