<?php

    $BXID = strtoupper($TBID);
    if (strlen($ORID)==0) { $ORID = "code"; } 

    if ($REQUIRED=='NONE') { $REQUIRED=''; } else { $REQUIRED = "REQUIRED";  } 

   //for multiple rows
    if (strlen($SerialID)<>0) { 
        $BXID = $BXID . $SerialID; 
        $SerialID = NULL; 
    } 

    $QRY = "SELECT * FROM " . $TBID . " WHERE ccode='" . $GLOBAL_CID . "'" ;
    

    if (strlen($FILTER_OPTION)<>0) { $QRY = $QRY . " and " . $FILTER_OPTION; }


    $QRY = $QRY . " ORDER BY " . $ORID;
    
    $rsGeneralList = mysqli_query($connect, $QRY);
    $ORID = NULL;

    if (strlen($ALL)==0) { $ALL = "Select"; } 


?>
<SELECT id="<?php print $BXID; ?>" NAME="<?php print $BXID; ?>" class="form-control" <?php print $REQUIRED; ?>>
<OPTION VALUE=""><?php print $ALL; ?></OPTION>
<?php

     while ($rowGeneralList = mysqli_fetch_assoc($rsGeneralList)) { 
            $GENERAL_ID = $rowGeneralList['code']; 
            $GENERAL_NAME = $rowGeneralList['edesc'];
           
            

?>

<OPTION VALUE="<?php print $GENERAL_ID; ?>"><?php print $GENERAL_NAME; ?></OPTION>

<?php 

  $ALL = NULL;
  $REQUIRED = "REQUIRED";

  } 
?>

</SELECT>