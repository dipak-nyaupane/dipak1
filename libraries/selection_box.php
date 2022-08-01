<?php

    $BXID = strtoupper($TBID);
    if (strlen($ORID)==0) { $ORID = "edesc"; } 

    if ($REQUIRED=='NONE') { $REQUIRED=''; } else { $REQUIRED = "REQUIRED";  } 

   //for multiple rows
    if (strlen($SerialID)<>0) { 
        $BXID = $BXID . $SerialID; 
        $SerialID = NULL; 
    } 

    $QRY = "SELECT * FROM " . $TBID . " WHERE ccode='" . $GLOBAL_CID . "'";

    if ($TBID=='hr_leave_setup') { $QRY = $QRY . " and group_flag='I'"; } 
    if ($TBID=='ed_employee_setup') { $QRY = $QRY . " and group_flag='I'"; } 
    if ($TBID=='ed_student_setup') { $QRY = $QRY . " and group_flag='I'"; }
    if ($TBID=='ip_supplier_setup') { $QRY = $QRY . " and group_flag='I'"; } 
    if ($TBID=='sb_customer_setup') { $QRY = $QRY . " and group_flag='I'"; } 
    if ($TBID=='ip_item_setup') { $QRY = $QRY . " and group_flag='I'"; } 
    if ($TBID=='ip_location_setup') { $QRY = $QRY . " and group_flag='I'"; } 
    if ($TBID=='canteen_setup') { $QRY = $QRY . " and group_flag='I'"; } 
    if ($TBID=='library_setup') { $QRY = $QRY . " and group_flag='I'"; } 
     



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
		    if ($TBID=='fa_ledger_accounts') { 
		    $GENERAL_ID = $rowGeneralList['account_no'];  } else { $GENERAL_ID = $rowGeneralList['code'];  
		    }	
		    $GENERAL_NAME = $rowGeneralList['edesc'];
            

?>

<OPTION VALUE="<?php print $GENERAL_ID; ?>"><?php print $GENERAL_NAME; ?></OPTION>

<?php 

  $ALL = NULL;
  $REQUIRED = "REQUIRED";

  } 
?>

</SELECT>