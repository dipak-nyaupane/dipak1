<?php

    function CLIENT_IP() {
       $IP = NULL;
       $IP = gethostbyaddr($_SERVER['REMOTE_ADDR']);
       RETURN $IP;
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

?>