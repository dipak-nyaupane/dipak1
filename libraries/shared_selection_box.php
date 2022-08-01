<?php

    error_reporting(0);
    $BXID = strtoupper($TBID);
    if (strlen($LABEL_ID)==0) { $LABEL_ID = "Select"; } 
    if ($REQUIRED=="NONE") { $REQURIED=""; } else { $REQUIRED = "REQUIRED"; } 

    //for multiple rows
    if (strlen($SerialID)<>0) { 
        $BXID = $BXID . $SerialID; 
        $SerialID = NULL; 
    } 

    if (strlen($ORID)==0) { $ORID = "oindex"; }     //if order index id is not defined, default is oindex
    $QRY = "SELECT * FROM " . $GLOBAL_SID . "." . $TBID;

    if (strlen($FILTER_OPTION)>0) {  $QRY = $QRY . " WHERE " . $FILTER_OPTION;  } 

    $QRY = $QRY . " ORDER BY " . $ORID;

    $ORID = NULL;



    $rsSharedList = mysqli_query($connect, $QRY);



?>
<SELECT id="<?php print $BXID; ?>" name="<?php print $BXID; ?>" class="form-control" <?php print $REQUIRED; ?>>
<OPTION VALUE=""><?php print $LABEL_ID; ?></OPTION>
<?php

     while ($rowSharedList = mysqli_fetch_assoc($rsSharedList)) { 
		    $SHARED_ID = $rowSharedList['code'];  
		    $SHARED_NAME = $rowSharedList['edesc'];

?>

<OPTION VALUE="<?php print $SHARED_ID; ?>"><?php print $SHARED_NAME; ?></OPTION>

<?php } ?>

</SELECT>

<?php error_reporting(1); ?>