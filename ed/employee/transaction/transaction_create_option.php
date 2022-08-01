 	<div class="panel panel-default">
   	<div class="panel-heading"><b>Search Options</b></div>
   	<div class="panel-body">

        <form role="form" method="POST" action="index.php">

          <div class="form-group">
            <label><?php print $TitleID; ?> Date within</label>

	 
	    <p>
	    <p>
            <table width="100%">
              <tr>
                <td width="50%">
                  <div class="input-append date" >
                    <input name="FROM_DATE" class="form-control" id="dp_from_date" placeholder="From Date" style="text-align:center">
                  </div>
                </td>
                <td width="02%">&nbsp;</td>
                <td width="50%"><input name="TO_DATE" class="form-control" id="dp_to_date" placeholder="To Date" style="text-align:center"></td>
              </tr>
            </table>
          </div>


       	  <div class="form-group" style="text-align:right">
          <input type="hidden" name="o" value="<?php echo $o ?>">
          <input type="hidden" name="search" value="SEARCH">
	        <button type="submit" class="btn btn-success">Search Attendance</button>

	  
        </div>
   </form>
  </div>
  </div>