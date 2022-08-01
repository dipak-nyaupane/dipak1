<div class="panel panel-default">

  <div class="panel-heading">
  <h3 class="panel-title"><?php print $TITLE_ID; ?> Detail</h3>
  </div>

  <table class='table'>
  <tr>
  <td style="text-align:right">Password</td>
  <td>:</td>
  <td><input type="password" id="PASSWORD" name="PASSWORD" placeholder="Enter password" class="form-control"></td>
  </tr> 

  <tr>
  <td style="text-align:right">Email</td>
  <td>:</td>
  <td><input type="email" name="EMAIL" id="EMAIL" placeholder="Email" class="form-control"></td>
  </tr> 

  <tr>
  <td style="text-align:right">User Group</td>
  <td>:</td>
  <td>
  <SELECT class="form-control" id="USER_FLAG" name="USER_FLAG">
  <OPTION VALUE="O">ADMIN</OPTION>
  <OPTION VALUE="S">General Staff</OPTION>
  <OPTION VALUE="M">Internship</OPTION>
  </SELECT>
  </td>
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
  <input type="hidden" id="mid" name="mid" value="<?php echo $MID; ?>">
  <input type="hidden" name="submit" value="SUBMIT">
  <button type="submit" id="BTN_SUBMIT" class="btn btn-success" onClick="SubmitTransaction();"><b>Submit</b> <?php echo $TITLE_ID; ?></button>

  </form>

  </td>
  <td width="20%" style="text-align:left"> 
  <form method="POST" action="index.php">
  <input type="hidden" name="o" value="<?php echo $o; ?>">
  <button type="submit" id="BTN_CANCEL" class="btn btn-default">Cancel</button>
   </form>	
  </td>

  </tr>
  </table>
  </td>
  </tr>
  </table>

</div>



