			 <div class="btn-group">
			 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../images/item.png" width="18px"> Operation</button>
		  	 <div class="dropdown-menu" style="width:200px">
		         <table class="table table-borderless">
		         <tr><td>

			    <form method="POST" action="index.php">	
			    <button style="background:none;border:none"><img src="../images/edit.png"> Edit <?php print $TITLE_ID; ?></button>
			    <input type="hidden" name="mid" value="edit">
			    <input type="hidden" name="o" value="<?php print $o; ?>">
			    <input type="hidden" name="id" value="<?php print $ID; ?>">
			    

		            </form>
 
             
		            </form>

			 </td></tr>
			 </table>
			 </div>
			 </div>
