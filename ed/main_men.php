<?php
//$o = (isset($_REQUEST['o']) ? $_REQUEST['o'] : null);
 error_reporting(0); 
if (strlen($o)==0) { 

     include("../class/erp_function.php");
     $ERP = new erp_function();
     $ERP->SYSTEM_PERMISSION();
     exit; 
  } 

  if (session_status() == PHP_SESSION_NONE) {session_start(); }

  //use erp_control.erp_data_setup(code)

  $ICON = "32"; 
  $GLOBAL_CID = "001";
  $GLOBAL_SID = "erp_shared";


  $GLOBAL_UID = $_SESSION['MY_UID'];
  $GLOBAL_NAM =	$_SESSION['MY_NAM'];



$TOKEN = (isset($_REQUEST['token']) ? $_REQUEST['token'] : null);



// $USER_NAME=(isset($_REQUEST['user_name']) ? $_REQUEST['user_name'] : null);


  include("../libraries/header.php");

?>


<script type="text/javascript">
var http = false;

if(navigator.appName == "Microsoft Internet Explorer") {
  http = new ActiveXObject("Microsoft.XMLHTTP");
} else {
  http = new XMLHttpRequest();
} 

function SEARCH_INFORMATION(TEXT) {

  var URL_DATA = "?search=" + TEXT;
  http.open("POST", "../ajax/ed/search_student.php" + URL_DATA, true); 
  http.onreadystatechange=function() {
    if(http.readyState == 4) {
       document.getElementById('SEARCH_STUDENT_LIST').innerHTML = http.responseText;
    }
  }

  http.send(null);

}

</script>

<?php 
     
  // Turn on output buffering  
  ob_start();  

  //Get the ipconfig details using system commond  
  system('ipconfig /all');  

  // Capture the output into a variable  
  $mycomsys=ob_get_contents();  

  // Clean (erase) the output buffer  
  ob_clean();  

  $find_mac = "Physical"; 
  //find the "Physical" & Find the position of Physical text  

  $pmac = strpos($mycomsys, $find_mac);  
  // Get Physical Address  

  $macaddress=substr($mycomsys,($pmac+36),17);  
  //Display Mac Address  





?>



<?php include("header.php"); ?>


<script type="text/javascript">
var http = false;

if(navigator.appName == "Microsoft Internet Explorer") {
  http = new ActiveXObject("Microsoft.XMLHTTP");
} else {
  http = new XMLHttpRequest();
} 

function AJX_INSERT_FLAT_VAL(KEY) {

  http.open("GET", "search_result.php?key=" + KEY, true);
  http.onreadystatechange=function() {

    if(http.readyState == 4) {
       document.getElementById('SEARCH_RESULT').innerHTML = http.responseText;
    }
  }
  http.send(null);
}

</script>
<style>
ul#navmenu, ul.dropdown-menu, ul.sub-menu {
    list-style-type: none;
    font-size: 9pt;
    }
    
  ul#navmenu li {
    width: 125px;
    text-align: center;
    position: relative;
    float: left;
    margin-right: 4px;
    }
    
  ul#navmenu a {
    text-decoration: none;
    display: block;
    width: 125px;
    height: 25px;
    line-height: 25px;
    background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 5px;
    }
    
  ul#nav navbar-nav .dropdown-menu li {
    margin-top: 5px;
    }
    
  ul#nav navbar-nav .dropdown-menu a {
    margin-top: 5px;
    }
    
  ul#nav navbar-nav .sub-menu a {
    margin-left: 3px;
    }
    
  ul#nav navbar-nav li:hover > a {
    background-color: #CFC;
    }
    
  ul#nav navbar-nav li:hover a:hover {
    background-color: #FF0;
    }
    
  ul#nav navbar-nav ul.dropdown-menu {
    display: none;
    position: absolute;
    top: 26px;
    left: 0px;
    }
    
  ul#nav navbar-nav ul.sub-menu {
    display: none;
    position: absolute;
    top: 0px;
    left: 326px;
    }
    
  ul#nav navbar-nav li:hover .dropdown-menu {
    display: block;
    }
    
  ul#nav navbar-nav .dropdown-menu li:hover .sub-menu {
    display: block;
    }
    
  .darrow {
    font-size: 11pt;
    position: absolute;
    top: 5px;
    right: 4px;
    }
    
  
.rarrow {
    font-size: 16pt;
    position: absolute;
    top: 6px;
    right: 4px;
    }
  
  </style>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>

        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <?php 

include("../libraries/header_login.php"); 

      ?>


      <ul class="nav navbar-nav">
        <li class="active">


       <!-- Collect the nav links, forms, and other content for toggling -->


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <li style="margin-top:10px" class="active">
  <form method="post" action="index.php">
  <button type="submit" class="btn btn-default" style="border:none;background:none"></span> <img src="../images/home.png" width="32">Home</button>
  <input type="hidden" name='o' value='dashboard'>
  
  </form>
  </li>


         <li class="dropdown" style="margin-top:2px">
          <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	  <img src="../images/setup.png" width=" <?php print $ICON; ?>"> Administration <span class="caret"></span></a>
          <ul class="dropdown-menu">

    


 	     <li style="margin-top:10px">
          
		  <form action='index.php' method='post'>
		  <input class="hidden" name='o' value='emp_reg'>
	          <button type="submit" class="btn btn-default" style="border:none;background:none;"></span> 
	      	  <img src="../images/ed/student.png" width=" <?php print $ICON; ?>"> Employee Registration
		  </button>
	      </form>
            
			</li>
    
      

 <?php if ($DESIGNATION_CODE=="1") {?>
  
	<li style="margin-top:10px">
    
		  <form action='index.php' method='post'>
		  <input class="hidden" name='o' value='emp_att'>
      <button type="submit" class="btn btn-default" style="border:none;background:none;"></span> 
	      	  <img src="../images/ed/attend.png" width=" <?php print $ICON; ?>"> Employee Attendance
		      </button>
	           </form>
         
	</li>


	<li style="margin-top:10px">
    
		  <form action='index.php' method='post'>
		  <input class="hidden" name='o' value='deg'>
	          <button type="submit" class="btn btn-default" style="border:none;background:none;"></span> 
	      	  <img src="../images/education.png" width=" <?php print $ICON; ?>"> Create Designation
		      </button>
	           </form>
           
	</li>

   <li style="margin-top:10px">
    
      <form action='index.php' method='post'>
      <input class=hidden name='o' value='users'>
      <button type="submit" class="btn btn-default" style="border:none;background:none;"></span> 
      <img src="../images/setup.png" width=" <?php print $ICON; ?>"> User Management
      </button>
      </form>


    </li>
     <?php } ?>
     
    </ul>
   

         <li class="dropdown" style="margin-top:3px;  ">
          <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
      	  <img src="../images/report.png" width=" <?php print $ICON; ?>"> Reports <span class="caret"></span></a>
          <ul class="dropdown-menu">



		  <li>
		  <form action='index.php' method='post'>
		  <input class="hidden" name='o' value='report'>
	          <button type="submit" class="btn btn-default" style="border:none;background:none"></span> Attendance Report </button>
	          </form>
	   </li>
      <li>
        <?php if ($DESIGNATION_CODE=="1") {?>
        
		  <form action='index.php' method='post'>
		  <input class="hidden" name='o' value='emp_report'>
	          <button type="submit" class="btn btn-default" style="border:none;background:none"></span> Employee Report </button>
	          </form>
             <?php } ?>

           </li>

          </ul>

        </li>


         <?php if ($DESIGNATION_CODE=="1") {?>

         

         <li style="margin-top:10px">
      <table width="100%"> 
      <tr><td><input type="text" class="form-control" id="SEARCH_TEXT" name="SEARCH_TEXT" placeholder="Search Employee" onchange="SEARCH_INFORMATION(this.value);"></td></tr>
    </table>

          </li>
        <?php } ?>



         <li class="dropdown" style="margin-top:2px">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	  <img src="../images/logout.png" width=" <?php print $ICON; ?>"><?php print $GLOBAL_NAM; ?>   <span class="caret"></span></a>
          <ul class="dropdown-menu">


	  <li  style="margin-left:10px">
	  <form action='index.php' method='post' target="_new">
	  <input class="hidden" name='o' value='dashboard'>
          <button type="submit" class="btn btn-default" style="border:none;background:none"></span> New Window</button>
          </form>
          </li>

	  <li  style="margin-left:10px">
	  <form action='../index.php' method='post'>
	  <input class="hidden" name='o' value='home'>
          <button type="submit" class="btn btn-default" style="border:none;background:none"></span> Logout</button>
          </form>
          </li>

          </ul>





    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

</nav>


<?php 

  $TWIDTH = "40%"; 
  include("../libraries/connect.php");
  include("../class/erp_function.php");
  include("../class/erp_shared_function.php");
  include("../class/erp_education_function.php");
  include("../class/erp_validation.php");

?>

