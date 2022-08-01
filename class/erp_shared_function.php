<?php

   include_once 'erp_connect.php';

   class erp_shared_function extends erp_connect
   {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function RETURN_SHARED_FIELD($TAB, $DESC, $FIELD, $VAL) {
        $RET = NULL;  
        $qry = "SELECT " . $DESC . " AS RET FROM " . $TAB . " WHERE " . $FIELD . "='" . $VAL . "'"; 
        $rs = $this->connection->query($qry);

        while ($row = $rs->fetch_assoc()) {
            $RET = $row['RET'];
        }
        
        if (strlen($RET)==0) { $RET = Null; } 

        return $RET;
    } 

    public function ERP_SHARED_DATA($QID, $P1=NULL, $P2=NULL, $P3=NULL, $P4=NULL, $P5=NULL)
    {        

        $GLOBAL_SID = "erp_shared";
        $GLOBAL_RID = "erp_registration";

	if ($QID=='FY_MONTH_LIST')  { $QRY = "SELECT * FROM " . $GLOBAL_SID . ".bs_month_code WHERE ad_start_date>='$P1' AND ad_start_date<='$P2'"; } 
	if ($QID=='EDU_MONTH_LIST')  { $QRY = "SELECT * FROM " . $GLOBAL_SID . ".bs_month_code WHERE code>='$P1' AND code<='$P2'"; } 

        $rs = $this->connection->query($QRY);
        
        if ($rs == false) {
            return false;
        } 
        
        $rows = array();
        
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
   }





}

?>