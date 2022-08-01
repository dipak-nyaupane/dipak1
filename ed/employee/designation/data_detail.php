<?php if (($MID=='edit') OR ($MID=='new')) { 

   include("data_detail_input.php"); 
   include("../libraries/help.php"); 

}  else {  ?>

<div class="panel panel-default">
<div class="panel-heading">
<table width="100%"><tr>
<td width="80%"><h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> <?php print $TITLE_ID; ?> Information</h3></td>
<td width="20%"><input type="checkbox" <?php print $CHECKED; ?> DISABLED><?php include("operation_menu.php"); ?></td>
</tr></table>
</div> 
<?php include("data_detail_ready.php");  } ?><?php ?>
</div> 

