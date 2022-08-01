<?php include "../libraries/header.php" ?>
<?php if ($DESIGNATION_CODE=='1') { ?>  
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
         <button style="background:none;border:3px">
          New Employee
         </button>  
         <input type="hidden" name="o" value="<?php print $o; ?>">
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
     <div class="panel-heading"><h3 class="panel-title">Employee Classification</h3></div>
      <table class="table">
      <?php

           $DATA_BANK = $ERP_EDUCATION->ERP_EDUCATION_DATA('EMPLOYEE_DESIGNATION', $GLOBAL_CID);
              foreach ($DATA_BANK as $ROW) {
                  $DEG_ID      = $ROW['code'];
                  $DEG_NAME    = $ROW['edesc']; ?>

      <tr>
      <td>
      <img src="../images/folder.png"> 
      <a href="javascript:ClearAll();ShowHide('DIV<?php print $DEG_ID; ?>');" style="color:black; text-decoration:none"><?php print $DEG_NAME; ?></a>
      <div id="DIV<?php print $DEG_ID; ?>" style="display:block">
      <table class="table"> 
     
     <?php
     $DATA_BANK = $ERP_EDUCATION->ERP_EDUCATION_DATA('EMPLOYEE_LIST', $DEG_ID, $GLOBAL_CID);
                  foreach ($DATA_BANK as $DETAIL_ROW) {
                      $EMPLOYEE_ID       = $DETAIL_ROW['code'];
                      $EMPLOYEE_NAME     = $DETAIL_ROW['edesc'];
                      $EMPLOYEE_GENDER_CODE   = $DETAIL_ROW['gender_code'];
                      if (strlen($ID)==0) {
                          $ID = $EMPLOYEE_ID;
                      } ?>  


      <tr>
           <td width="3%">&nbsp;</td>
      <td width="2%">
      <?php  if ($EMPLOYEE_GENDER_CODE=='M') { ?><img src="../images/ed/male.png" width="20"><?php } ?>
      <?php if ($EMPLOYEE_GENDER_CODE=='F') { ?><img src="../images/ed/female.png" width="20"><?php } ?>
      </td>
      <td>
      <form method="POST" action="index.php"> 
      <button style="background:none;border:none"><?php print $EMPLOYEE_NAME; ?></button>
      <input type="hidden" name="o" value="<?php print $o; ?>">       
      <input type="hidden" name="id" value="<?php print $EMPLOYEE_ID; ?>">  

      </form>
      </td>
      </tr>

     <?php
                  } ?>

      </table>
   

      </div>   
      </td></tr>

      <?php
              } ?> 
      </table> 

   </div>
   <?php } else  { ?>
 <table width="100%" border="0">
  <tr>
  <td valign="center"></td>
  <td valign="center" align="right">

  <div class="btn-group">
   
  <div class="dropdown-menu">
    <table class="table">
    <tr><td>
              
    </td></tr>

    </table>
  </div>
 </div>

  </td>
 </tr>
</table> 
<br>


   <div class="panel panel-default">
     <div class="panel-heading"><h3 class="panel-title">Employee Details</h3></div>
      <table class="table">

      <tr>
      <td>
      <table class="table"> 
     
     <?php
     $DATA_BANK = $ERP_EDUCATION->ERP_EDUCATION_DATA('EMPLOYEE_LIST1', $EMPLOYEE_CODE1, $GLOBAL_CID);
                  foreach ($DATA_BANK as $DETAIL_ROW) {
                      $EMPLOYEE_ID       = $DETAIL_ROW['code'];
                      $EMPLOYEE_NAME     = $DETAIL_ROW['name'];
                      
                      if (strlen($ID)==0) {
                          $ID = $EMPLOYEE_ID;
                      } ?>  
<tr>
      <td width="3%">&nbsp;</td>
      <td width="2%">

      <?php  if ($EMPLOYEE_CODE1>1) { ?><img src="../images/ed/male.png" width="30"><?php } ?>
      <?php if ($EMPLOYEE_CODE1=='') { ?><img src="../images/ed/female.png" width="20"><?php } ?>
   <td>
   
      <form method="POST" action="index.php"> 
      <button style="background:none;border:none"><?php print $EMPLOYEE_NAME; ?></button>
      <input type="hidden" name="o" value="<?php print $o; ?>">       
      <input type="hidden" name="id" value="<?php print $EMPLOYEE_ID; ?>">  

      </form>
       </td>
    </tr>
    
      

     <?php
                  } ?>

      </table>
   

      </div>   
      </td></tr>

      </table> 

   </div>

  <?php  }  ?>

 



