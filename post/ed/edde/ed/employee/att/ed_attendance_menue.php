	<div class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../images/action.png" width="20"></button>
	<div class="dropdown-menu" style="width:200px"> 

        <table class="table table-borderless">


        <form role="form" method="post" action="index.php">
        <tr><td>
        <input type="hidden" name="o" value="ed_attendance">
        <input type="hidden" name="no" value="<?php print $LOG_NO; ?>">
        <input type="hidden" name="mid" value="view">
        <button type="submit" style="border:none;background:none;color:blue">
        <img src="../images/edit.png">
        View Transaction
        </button>
        </td></tr>
        </form>
        

        <form role="form" method="post" action="index.php">
        <tr><td>
	    <input type="hidden" name="o" value="ed_attendance">
        <input type="hidden" name="no" value="<?php print $LOG_NO; ?>">
        <input type="hidden" name="mid" value="edit">
        <button type="submit" style="border:none;background:none;color:blue">
    	<img src="../images/edit.png">
        Edit Transaction
	    </button>
        </td></tr>
	    </form>
        </table>
</div>
</div>