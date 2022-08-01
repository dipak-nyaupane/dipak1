<!DOCTYPE html>
<html lang="en">
<head>
<TITLE>imERP - an Enterprises Solution</TITLE>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->

    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="./js/html5shiv.min.js"></script>
    <script src="./js/respond.min.js"></script>
    <![endif]-->
 
    <!-- for calendar picker -->
    <script src="./js/jquery-ui.js"></script>
    <link href="./css/jquery-ui.css" rel="stylesheet">

    <script>
    $(function() {
    $( "#dp_from_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#dp_to_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#dp_log_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#dp_ref_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });
    </script>

    <script langauge="javaScript">
    function ShowHide()  {  var divCtrl=document.all(arguments[0]);  var imgCtrl=eval("document."+arguments[1]);  if(divCtrl.style=="" || divCtrl.style.display=="none")  
       { divCtrl.style.display="block";	  }  else if(divCtrl.style!="" || divCtrl.style.display=="block")  {	divCtrl.style.display="none";	  }  }
    </script>

  </head>
  <body>



  </body>

</html>  