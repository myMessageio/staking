<?php
 
$debug=1;
/*
give me at txid, i will search the db for all txid, then also search the whole db for any content that contains the txid in a special format
then will continue to search the txid that the content has

Algo

txid:12
msgA


txid:13
msgB txid12

txid14
msgC txid12


txid15
msgD txid13

txid16
msgE txid13

txid17
msgF txid16





giveme a txid, first find the message
then use txid as searchstring, find the messages contains txid
then 





*/



/*
//var message =  
echo	'			  {					                                              ';                                    
echo	'			 "message":"This is a message from L1",                             ';
echo	'			 "senderAddress":"ZIL1234567", "txid":"0x1a9d6e94fffb1a9840607dfc5209d6b77b0b549a6bd1f1b038ddd7e6d8a8abd2",                                     ';                               
echo	'			 "timestamp":"1234567",                                             ';
echo	'			 "replyby": [                                                       ';                        
echo	'			   {                                                              ';                 
echo	'				  "message":"This is a message from L2",                        ';                                  
echo	'				  "senderAddress":"ZIL1334567","txid":"0x1a9d6e94fffb1a9840607dfc5209d6b77b0b549a6bd1f1b038ddd7e6d8a8abd2",                                  ';
echo	'				  "timestamp":"2234567",                                        ';                  
echo	'				  "replyby": [                                                  ';
echo	'					{                                                         ';                      
echo	'					   "message":"This is a message from L3",                   ';  
echo	'					   "senderAddress":"ZIL333334567", "txid":"0x1a9d6e94fffb1a9840607dfc5209d6b77b0b549a6bd1f1b038ddd7e6d8a8abd2",                          ';                                
echo	'					   "timestamp":"222234567",                                 ';                         
echo	'					   "replyby": [                                             ';             
echo	'						 {                                                    ';      
echo	'						   "message":"This is a message from L4",               ';                 
echo	'						   "senderAddress":"ZIL333334567","txid":"0x1a9d6e94fffb1a9840607dfc5209d6b77b0b549a6bd1f1b038ddd7e6d8a8abd2",                       ';
echo	'						   "timestamp":"222234567",                             ';                             
echo	'							"replyby": [                                        ';
echo	'							  {                                               ';           
echo	'								   "message":"This is a message from L5",       ';
echo	'								   "senderAddress":"ZIL333334567", "txid":"0x1a9d6e94fffb1a9840607dfc5209d6b77b0b549a6bd1f1b038ddd7e6d8a8abd2",              ';                               
echo	'								   "timestamp":"222234567",                     ';
echo	'									"replyby":[]						          ';                      
echo	'							  },                                              ';
echo	'							  {                                               ';           
echo	'								   "message":"This is a 2nd message from L5",   ';
echo	'								   "senderAddress":"ZIL111333334567", "txid":"0x1a9d6e94fffb1a9840607dfc5209d6b77b0b549a6bd1f1b038ddd7e6d8a8abd2",           ';                                    
echo	'								   "timestamp":"22223554567" ,                  ';
echo	'								   "replyby":[]                                 ';                         
echo	'							  }                                               ';
echo	'							]                                                 ';                            
echo	'						 }                                                    ';
echo	'					   ]                                                      ';                           
echo	'					}                                                         ';
echo	'				  ]                                                           ';                      
echo	'			   },                                                             ';
echo	'			   {                                                              ';                   
echo	'				  "message":"Greeting from Lao Han L2. I know this is a tough question to ask, how will you able to erform under extreme stress? We need to find a strategy to achieve that. You know what I mean, the climate is bad, and we need some improvement!",                     ';
echo	'				  "senderAddress":"ZIL1334567", "txid":"0x1a9d6e94fffb1a9840607dfc5209d6b77b0b549a6bd1f1b038ddd7e6d8a8abd2",                                 ';                                    
echo	'				  "timestamp":"2234567",                                        ';
echo	'				  "replyby":[]					                              ';                   
echo	'			   },                                                             ';
echo	'			   {                                                              ';                   
echo	'				  "message":"Another is 3rd message from L2",                   ';
echo	'				  "senderAddress":"ZIL4334567", "txid":"0x1a9d6e94fffb1a9840607dfc5209d6b77b0b549a6bd1f1b038ddd7e6d8a8abd2",                                 ';             
echo	'				  "timestamp":"3234567",                                        ';
echo	'				  "replyby":[						                              ';                  
echo	'							 {                                                ';
echo	'								   "message":"This is a message from L3",       ';                         
echo	'								   "senderAddress":"ZIL333334567",  "txid":"0x1a9d6e94fffb1a9840607dfc5209d6b77b0b549a6bd1f1b038ddd7e6d8a8abd2",             ';
echo	'								   "timestamp":"222234567" ,                    ';                      
echo	'								   "replyby":[]                                 ';
echo	'							  },                                              ';                                  
echo	'							  {                                               ';
echo	'								   "message":"This is a 2nd message from L3",   ';                    
echo	'								   "senderAddress":"ZIL111333334567", "txid":"0x1a9d6e94fffb1a9840607dfc5209d6b77b0b549a6bd1f1b038ddd7e6d8a8abd2",           ';
echo	'								   "timestamp":"22223554567",                   ';                           
echo	'									"replyby":[]						          ';
echo	'							  }  							                  ';                            
echo	'						  ] 					                              ';
echo	'			   }						                                      ';                    
echo	'			 ]                                                                ';
 
echo '}';
 exit();
 
 */
 //header( 'Content-type: text/html; charset=utf-8' );
 //header("Cache-Control: no-cache, must-revalidate");
 //header ("Pragma: no-cache");
//set_time_limit(0);
//ob_implicit_flush(1);
 

 
//echo "<pre><h1>";




		$nl="<br>";
		$txid= $_GET["txid"] ;
		if (!isset($_GET["txid"]))
		  return;
		 
		$con = mysqli_connect('globaldefi.fatcowmysql.com', 'zildbadmin1198', 'Zil119955#8pwd', "dbzilliqa"); 
		
		
		$message="";
		$timestamp=0;
		$zilsenderaddress="";
		
		// first load the content of txid
		getbytxid($con, $txid,  $message,  $timestamp, $zilsenderaddress);
		
		
		echo	'  {					                                              ';                                    
	 
		echo ' "message":"'            .$message         .'",';
		echo ' "senderAddress":"'      .$zilsenderaddress.'",';
		echo ' "txid":"'               .$txid.'",'; 
		echo ' "timestamp":"'          .$timestamp.'",'; 
	 
                                              	
		getcontentbytxid($con, $txid);
		
		
        echo ' }';
		
		
		
		
		
		
		
		
		 
		
		mysqli_close($con);
		
		
		
		
		

 
		function getbytxid($con, $txid, &$message, &$timestamp, &$zilsenderaddress)
		{
			$qry="SELECT * FROM tblmessage WHERE   ftxid='$txid'";
			$result = mysqli_query($con,$qry);	
			if (!$result) 
			{	
					$errstr=sprintf("Query tblwithdraw Failed! ERROR=910<br>");
					mysqli_close($con);
					echo $errstr; exit(0);
					
			}		
			$row = mysqli_fetch_assoc($result);
				$txid   =$row['ftxid'];
				$zilsenderaddress  =$row['fzilsenderaddress'];
				$timestamp=$row['ftimestamp'];
				$message=$row['fmessage']; 	
				//echo str_replace("11223344", "","REGISTER 11223344 here");
				
$message=  base64_encode($message);				
	//$message="ABC";			
				
				
				
		//	echo "first message that contains the txid is ";
		//	echo "content=".$message;
		//	echo $nl;		
		}
 
 
		
		function getcontentbytxid($con, $txid)
		{
            $childtxid=array();
			
			$qry="SELECT * FROM tblmessage WHERE  tblmessage.fmessage  LIKE '%".$txid."%'";
			//echo $nl;	echo $nl;	echo $nl;	
			//echo $qry;
			//echo $nl;	echo $nl;	echo $nl;	
			
			$oritxid=$txid;
		    
			//if ($debug)  echo $qry;
			
			$result = mysqli_query($con,$qry);	
			if (!$result) 
			{	
					$errstr=sprintf("Query tblwithdraw Failed! ERROR=910<br>");
					mysqli_close($con);
					echo $errstr; exit(0);
					
			}
			$num_rows = mysqli_num_rows($result);
	

 
	 
			$cur_row=0;
			
			
			echo	' "replyby": [                            ';    			
			while ($row = mysqli_fetch_assoc($result)) 
			{
 				 
				//$date=$row['fdate'];
	  
				$txid   =$row['ftxid'];
				$zilsenderaddress  =$row['fzilsenderaddress'];
				$timestamp=$row['ftimestamp'];
				$message=$row['fmessage']; 	
$message=str_replace($oritxid, "", $message);  // remove the txid in the message				
$message=   base64_encode($message);	

//$message="ABC";			
				
				
                    
				echo	'	 {                                    ';                 
				echo ' "message":"'            .$message         .'",';                                 
				echo ' "senderAddress":"'      .$zilsenderaddress.'",';   
			    echo ' "txid":"'               .$txid.'",'; 
				//if ($cur_row==($num_rows-1) ) // last row
			//		echo ' "timestamp":"'          .$timestamp.'"';  					
			//	else
				echo ' "timestamp":"'          .$timestamp.'",';  			
				getcontentbytxid($con, $txid);
				
				if ($cur_row==($num_rows-1)) // last row
					echo '}';
				else 
					echo '},';
				
					
                                          			
				 
				
 
				//if ($cur_row!=($num_rows-1))
				//	echo  ",";
				$childtxid[$cur_row]=$txid;
				$cur_row++; 
			}
		    echo ']';
				 
			
			
			//if ($cur_row==0)
			//	echo '"replyby": []';
 
			//return ($childtxid); 
		 



		}
		              
 
		 		 
 

?>