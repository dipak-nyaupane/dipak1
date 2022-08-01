<table width="100%" border="0">
  <tr>
  <td valign="center"></td>
  <td valign="center" align="right">

  <div class="btn-group">
   <button id="CREATE_BUTTON" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Create <?php print $TITLE_ID; ?>
  </button>

  <div class="dropdown-menu">
    <table class="table">
    <tr><td>
       <form method="POST" action="index.php">
       <button style="background:none;border:none">
       <img >application User
       </button>  
       <input type="hidden" name="o" value="<?php print $o; ?>">
       <input type="hidden" name="path" value="<?php print $PATH; ?>">
        <input type="hidden" name="designation_code" id="designation_code" value="<?php print $DESIGNATION_CODE;?>">
       <input type="hidden" name="mid" value="new">
       </form> 
            </a>
    </td></tr>

    </table>
  </div>
 </div>

  </td>
 </tr>
</table> 
<br>


   <div class="panel panel-default">
      <div class="panel-heading"><h3 class="panel-title">List of User</h3></div>

      <table class="table">

     
      <?php 

         $DATA_BANK = $ERP_EDUCATION->ERP_EDUCATION_DATA('USER_INFO', $GLOBAL_CID);
              foreach ($DATA_BANK AS $ROW) {
   
        $LOGIN_ID  = $ROW['code'];
        $LOGIN_NAME   = $ROW['name']; 

      ?>

      <tr>
      <td><form method="POST" action="index.php"> 
      <img src="../images/gray_verify.png"> 
      
      <button style="background:none;border:none"><?php print $LOGIN_NAME; ?></button>
      <input type="hidden" name="o" value="<?php print $o; ?>">  
	   <input type="hidden" name="tab" value="<?php print $TAB; ?>">	
      <input type="hidden" name="code" value="<?php print $LOGIN_ID; ?>">  
      </form>
   

      </div>   
      </td></tr>

      <?php } ?>  
      </table> 

   </div>

  <script>
  document.getElementById('ED_LOGIN_CODE').value='<?php print $LOGIN_ID; ?>';
  </script> 




