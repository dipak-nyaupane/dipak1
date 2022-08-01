<form id="form1" method="post">


	        <div class="panel panel-default" style="margin-right:5px;margin-left:5px">
                  <div class="panel-heading">

		     <table width="100%">
		     <tr>
          <td width="60%"><h3 class="panel-title"><b><?php print $TITLE_ID; ?> Information</b></h3></td>
          <td width="40%" style="text-align:right">Enabled ID <input type="checkbox" id="STATUS_FLAG" name="STATUS_FLAG"></td>
                     
		     </tr>
		     </table>
                </div>  
	       <table class='table'>



  	       <tr>
    	       <td width="<?php print $TWIDTH; ?>%" align="right">CODE</td>
    	       <td width="1%" align="center">:</td>
              <td width="33%"><input type="text" name="CODE" id="CODE" maxlenght= "8" value="<?php print $MY_CODE; ?>"
              placeholder="<?php print $TITLE_ID; ?> Code" class="form-control" READONLY></td>
		
	       
	       <td>

           <tr>
             <td width="<?php print $TWIDTH; ?>%" align="right"><?php print $TITLE_ID; ?>ID</td>
             <td width="1%" align="center">:</td>
             <td><input type="text" name="ID" id="ID" maxlenght= "8" value="<?php print $MY_ID; ?>" placeholder="<?php print $TITLE_ID; ?> ID" class="form-control" REQUIRED></td>
    
         
         <td>


	       </td>
  	       </tr>	

	       <tr>
	       <td style="text-align:right"><?php print $TITLE_ID; ?> 
       Name</td>
	       <td>:</td>
	       <td><input type="text" name="USERNAME" id="USERNAME" value="<?php print $MY_NAME; ?>" placeholder="<?php print $TITLE_ID; ?> Name" class="form-control" REQUIRED></td>
	       </tr>

         <tr>
         <td style="text-align:right"><?php print $TITLE_ID; ?> Password </td>
         <td>:</td>
         <td><input type="text" name="PASSWORD" id="PASSWORD" placeholder="Password" class="form-control" REQUIRED></td>
         </tr>

          <tr>
         <td style="text-align:right">Designation</td>
          <td>:</td>
         <td><?php $TBID = "ed_designation_code1"; include("../libraries/selection_box.php"); ?></td>
         </tr> 
       <script>
      document.getElementById('ED_DESIGNATION_CODE1').value='<?php print $MY_DESIGNATION_CODE; ?>'; </script>

	       </table>	
		   <table class='table'>
  <tr>
    <td width="<?php print $TWIDTH; ?>%" align="right">Email</td>
    <td width="1%" align="center">:</td>
    <td align="left"><input type="text" name="EMAIL" id="EMAIL" value="<?php print $MY_EMAIL; ?>" class="form-control" placeholder="Email"></td>
    </td>
  </tr>

  
 
  <tr>
  <td align="right">Remarks</td>
  <td>:</td>
  <td><input type="text" class="form-control" name="REMARKS" value="<?php print $MY_REMARKS; ?>" placeholder="Remarks" ></td>
  </tr>


  </table>



  <table class="table">
  <tr>&nbsp;</tr>
  <tr>
  <td>
  <div id="MessageID" style="color:green">&nbsp;</div>
  </td>
  <td width="20%" style="text-align:right">
  <input type="hidden" name="o" value="<?php echo $o; ?>">
  <input type="hidden" name="submit" value="SUBMIT">
  <input type="text" name="mid" value="<?php print $MID; ?>">
  <input type="hidden" name="code" value="<?php print $CODE; ?>">
   <input type="hidden" name="designation_code" id="designation_code" value="<?php print $DESIGNATION_CODE;?>">
  <button type="submit" id="BTN_SUBMIT" class="btn btn-success"><b>Submit</b> <?php echo $TITLE_ID; ?></button>
  </form>  

	
  </td>

  <td width="20%" style="text-align:left"> 
  <form method="POST" action="index.php"> 
  <input type="hidden" name="o" value="<?php echo $o; ?>">
  <input type="hidden" name="code" value="<?php print $CODE; ?>">
  <button type="submit" id="BTN_CANCEL" class="btn btn-default">Cancel</button>
  </form>  

  </td>

  </tr>
  </table>	

	   </div> 

