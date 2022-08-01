<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("../libraries/browser_back.php"); ?>
   <?php include("../libraries/browser_spinner.php"); ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.min.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->
 


    <script langauge="javaScript">
    function ShowHide() {  
      var divCtrl=document.all(arguments[0]);  
      var imgCtrl=eval("document."+arguments[1]);  
      if(divCtrl.style=="" || divCtrl.style.display=="none") { 
         divCtrl.style.display="block";	  
      }  else if(divCtrl.style!="" || divCtrl.style.display=="block")  {	
        divCtrl.style.display="none"; }
      }
    </script>

    <!-- for calendar picker -->
    <script src="../js/jquery-ui.js"></script>
    <link href="../css/jquery-ui.css" rel="stylesheet">

    <!--required for erp-->
    <script src="../js/js/erp.standard.js"></script> 
    <script src="../js/js/erp.datetimepicker.js"></script> 

    <link href="../css/css/erp.datetimepicker.css" rel="stylesheet">

    <script src="../js/js/table2excel.js"></script> 


    <!--for graphs-->
    <script src="graph/raphael-min.js"></script>
    <script src="graph/morris.js"></script>
    <script src="graph/prettify.min.js"></script>
    <link rel="stylesheet" href="graph/prettify.min.css">
    <link rel="stylesheet" href="graph/morris.css">



  </head>
  <body>

	


  </body>

</html>  