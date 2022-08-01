 <?php

   include_once 'erp_connect.php';

   class erp_education_function extends erp_connect
   {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function ED_TRAN_ID($TAB, $CID) {


        $RET = NULL;  

	$QRY = "SELECT lpad((ifnull(cast(max(substr(log_no,7,5)) as unsigned), 0)+1),5,'0') AS RET from " . $TAB . " where ccode='" . $CID . "'";
        $rs = $this->connection->query($QRY);

        while ($row = $rs->fetch_assoc()) { $RET = $row['RET']; }
        if (strlen($RET)==0) { $RET = "00001"; } 

	$RET = date('Ym'). $RET; 
        return $RET;

    }


     public function M_TRAN_ID($TAB, $CID) {


        $RET = NULL;  

	$QRY = "SELECT lpad((ifnull(cast(max(substr(log_no,7,5)) as unsigned), 0)+1),5,'0') AS RET from " . $TAB . " where ccode='" . $CID . "'";
        $rs = $this->connection->query($QRY);

        while ($row = $rs->fetch_assoc()) { $RET = $row['RET']; }
        if (strlen($RET)==0) { $RET = "00001"; } 

	$RET = date('Ym'). $RET; 
        return $RET;

    }  



    public function ERP_EDUCATION_DATA($QID, $P1=NULL, $P2=NULL, $P3=NULL, $P4=NULL, $P5=NULL, $P6=NULL)
    {        

        $GLOBAL_SID = "erp_shared";
        $GLOBAL_RID = "erp_registration";

	if ($QID=='EXTRA_MARKSHEET_DATA_FINAL')  { $QRY = "SELECT * FROM ed_marksheet_extra WHERE log_no='$P1' and symbol_no='$P2' and ccode='$P3'"; } 
    if ($QID=='DESIGNATION_CODE_LIST')  {   $QRY = "SELECT * FROM ed_designation_code1 ";  } 

	if ($QID=='EMPLOYEE_INFO')  { $QRY = "SELECT * FROM ed_employee_setup WHERE code='$P1' and ccode='$P2'"; } 
    
    if ($QID=='EMPLOYEE_INFO_ATTENDANCE')  { $QRY = "SELECT * FROM ed_employee_setup WHERE ccode='$P1'"; } 

    if ($QID=='EMPLOYEE_INFO_ATTENDANCE1')  { $QRY = "SELECT * FROM ed_attendance_extra WHERE log_no='$P1' and ccode='$P2'";} 

   if ($QID=='DESIGNATION_INFO')  { $QRY = "SELECT * FROM ed_designation_code1 WHERE  code='$P1' and ccode='$P2'";} 

    if ($QID=='EMPLOYEE_ATTENDANCE')  { $QRY = "SELECT distinct log_no, log_date FROM ed_attendance_extra WHERE ccode='$P1' "; } 
    if ($QID=='EMPLOYEE_ATTENDANCE1')  { $QRY = "SELECT log_no, log_date,employee_code, arrival_time,departure_time,remarks FROM ed_attendance_extra WHERE ccode='$P1' "; } 
      

	if ($QID=='EMPLOYEE_LIST')  { $QRY = "SELECT * FROM ed_employee_setup WHERE ed_designation_code1='$P1' and ccode='$P2'";} 

    if ($QID=='SEARCH_EMPLOYEE_LIST')  { $QRY = "SELECT * FROM ed_employee_setup WHERE ed_designation_code1='$P1' and edesc LIKE '$P1%'"; } 
	
	if ($QID=='EMPLOYEE_DESIGNATION')  { $QRY = "SELECT * FROM ed_designation_code1 WHERE ccode='$P1'";}



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

    public function ERP_EDUCATION_INFO($QID, $P1=NULL, $P2=NULL, $P3=NULL, $P4=NULL, $P5=NULL, $P6=NULL)
    {

    if ($QID=='TOTAL_EMPLOYEE') { $QRY = "SELECT COUNT(*) AS RET FROM ed_attendance_extra WHERE log_no='$P1' and ccode='$P2'"; } 

    $rs = $this->connection->query($QRY);
    $RET = NULL;
        while ($row = $rs->fetch_assoc()) {
           $RET = $row['RET'];
        }
      
        return $RET;

    }


    public function ED_NEW_ID($TAB, $CID) {

        $RET = NULL;  
        $qry = "SELECT MAX(code) + 1 AS RET FROM " . $TAB . " WHERE ccode='" . $CID . "'";
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['RET'];
        }
        
        if (strlen($RET)==0) { $RET = 1; } 
        return $RET;

    } 

    public function ED_NEW_MASTER_ID($TAB, $CID) {

        $RET = NULL;  
        $qry = "SELECT ifnull((lpad((max(substr(master_code, 3,2))+1),2,'0')),'01') AS RET FROM " . $TAB . " WHERE ccode='" . $CID . "'"; 
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = "0." . $row['RET'];
        }
        
        return $RET;

    } 

    public function ED_NEW_ROLE_ID($CLASS_CODE, $SECTION_CODE, $CID) {

        $RET = '1';  
        $qry = "SELECT ifnull(max(role_no),0)+1 AS RET FROM ed_enrollment_voucher WHERE class_code='$CLASS_CODE' and section_code='$SECTION_CODE' and ccode='" . $CID . "'"; 
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) {
            $RET = $row['RET'];
        }
        
        return $RET;

    } 




    public function ED_CALENDAR_AVAIL($MID) {
        $RET = 0;  
        $qry = "SELECT count(*) AS RET FROM calendar_data WHERE bs_month='$MID'";
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) { $RET = $row['RET']; }
        return $RET;
    } 

    public function ED_HOLIDAY_INFO($MID, $FLAG) {
        $RET = 0;  

	if ($FLAG=='W') { $qry = "SELECT count(*) AS RET FROM calendar_data WHERE bs_month='$MID' AND dt_flag='S'"; } 
	if ($FLAG=='H') { $qry = "SELECT count(*) AS RET FROM calendar_data WHERE bs_month='$MID' AND dt_flag IN ('N','F','O')"; } 

        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) { $RET = $row['RET']; }
        return $RET;
    } 


    public function STUDENT_PREV_AMOUNT($STUDENT_ID, $FROM_MONTH_CODE,  $CID) {

        $BALANCE = NULL;  
	$THIS_DATE = date('Y-m-d'); 
        $qry = "SELECT IFNULL(SUM(dr_amount),0) as RET FROM v_fee_ledger WHERE student_code='$STUDENT_ID' and month_code<'$FROM_MONTH_CODE' and ccode='$CID'";

        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) { $ISSUED = $row['RET']; }


        $qry = "SELECT IFNULL(SUM(cr_amount),0) as RET FROM v_fee_ledger WHERE student_code='$STUDENT_ID' and log_date<='$THIS_DATE' and ccode='$CID'";
        $rs = $this->connection->query($qry);
        while ($row = $rs->fetch_assoc()) { $PAYMENT = $row['RET']; }

	$BALANCE = $ISSUED - $PAYMENT;        
        return $BALANCE;

    } 


    public function TDS_AMOUNT($AMT, $MARITAL_CODE,  $CID) {

        $RET = NULL;  
        $qry = "SELECT * FROM erp_shared.slab_setting order by oindex"; 
        $rs = $this->connection->query($qry);

	$TAX = 0;

        while ($row = $rs->fetch_assoc()) {
            $NAME = $row['name'];
            $RATE = $row['rate'];

	    if ($MARITAL_CODE=='M') { $LIMIT = 	$row['married']; } 
	    if ($MARITAL_CODE=='U') { $LIMIT = 	$row['unmarried']; } 

	    if ($AMT>=$LIMIT) { 
	      $TAXABLE = $LIMIT; 
	      $AMT = $AMT - $LIMIT; 
   	    } else { 
	       $TAXABLE = $AMT; 
	       $AMT = 0;
	    }		

	   $TAX = $TAX + ($TAXABLE*$RATE)/100;

        }

	$RET = $TAX;
        
        return $RET;

    } 


    public function WEB_SYNCHRONIZATION($TAB, $URL, $UID) {

       $qry = "SELECT * FROM " . $TAB; 

       if ($TAB=='ed_examination_schedule') {
           $qry = "SELECT * FROM " . $TAB . " WHERE examination_code IN (SELECT code FROM ed_examination_code WHERE status_flag='Y')"; 		
       }			

       $rs = $this->connection->query($qry);
       $n = mysqli_num_rows($rs);

       $CURL_DATA = "tab=$TAB&rows=$n";

       $i = 0; 	

       while ($row = mysqli_fetch_assoc($rs)) { 
 	  $i = $i + 1; 
	  foreach($row as $column => $val) { $CURL_DATA = $CURL_DATA . "&" . $column . $i . "=" . $val; }
       } 	

       //print $URL ."?" .$CURL_DATA;


       $ch = curl_init();
       $timeout = 5;
       curl_setopt($ch, CURLOPT_URL, $URL);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
       curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
       curl_setopt($ch, CURLOPT_POST, 1);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $CURL_DATA);
       $data = curl_exec($ch);
       curl_errno($ch);

       if(curl_errno($ch)){ echo 'Curl error: ' . curl_error($ch); }
       curl_close($ch);

       if ($n>0) {
	   $SDATE = date('Y-m-d H:i:s'); 
	   $UPDATE = "UPDATE synchronization_setup SET sby='$UID', sdate='$SDATE', scount= scount+1, rows=$n WHERE code='$TAB'";
           $rs = $this->connection->query($UPDATE);

	   RETURN 'Success'; 
       } else { 	
	   RETURN 'Failed'; 	
       }

    } 


    public function WEB_STUDENT_SYNCHRONIZATION($ID, $URL, $UID, $CID) {

       //$qry = "SELECT * FROM ed_student_setup WHERE class_code='$ID' and ccode='$CID' limit 30"; 
       $qry = "SELECT code, edesc, role_no, class_code, section_code, gender_code, admission_flag, father_name, mother_name, address, birth_date, bs_birth_date, ccode FROM ed_student_setup WHERE class_code='$ID' and ccode='$CID'"; 
       $rs = $this->connection->query($qry);
       $n = mysqli_num_rows($rs);

       $CURL_DATA = "tab=ed_student_setup&class=$ID&rows=$n";

       $i = 0; 	

       while ($row = mysqli_fetch_assoc($rs)) { 
 	  $i = $i + 1; 
	  foreach($row as $column => $val) { $CURL_DATA = $CURL_DATA . "&" . $column . $i . "=" . $val; }
       } 	

       //print $URL ."?" .$CURL_DATA;

       $ch = curl_init();
       $timeout = 5;
       curl_setopt($ch, CURLOPT_URL, $URL);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
       curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
       curl_setopt($ch, CURLOPT_POST, 1);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $CURL_DATA);
       $data = curl_exec($ch);
       curl_errno($ch);

       if(curl_errno($ch)){ echo 'Curl error: ' . curl_error($ch); }
       curl_close($ch);

       if ($n>0) {
	   $SDATE = date('Y-m-d H:i:s'); 
	   $UPDATE = "UPDATE student_synchronization_setup SET sby='$UID', sdate='$SDATE', scount= scount+1, rows=$n WHERE code='$ID'";
           $rs = $this->connection->query($UPDATE);

	   RETURN 'Success'; 
       } else { 	
	   RETURN 'Failed'; 	
       }

    } 


    public function WEB_VERIFICATION($OB, $NO, $CLASS_ID, $SECTION_ID, $EXAM_ID, $URL, $UID) {
       $CURL_DATA = "ob=$OB&no=$NO&class=$CLASS_ID&sub=$SECTION_ID&exam=$EXAM_ID&id=$UID";

       //print $URL . "?" . $CURL_DATA;
       $ch = curl_init();
       $timeout = 5;
       curl_setopt($ch, CURLOPT_URL, $URL);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
       curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
       curl_setopt($ch, CURLOPT_POST, 1);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $CURL_DATA);
       $data = curl_exec($ch);
       curl_errno($ch);
       if(curl_errno($ch)){ echo 'Curl error: ' . curl_error($ch); }
       curl_close($ch);
    } 




}

?>