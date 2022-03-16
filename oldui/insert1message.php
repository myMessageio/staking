<?php
 /*
 This is to store all the messages that are posted to the blockchain by user.
 It need to know which blocknum last updated. Then it will start to download the lastblocknumupdated+1 to latestblocknum
 and start to store all data into db.
 
 */
 //" ('$datestr',  $timestamp, '$txid','$message' ) ";

 
 
 		$zilsenderaddress=$_POST["sender"] ; 
		$timestamp=$_POST["timestamp"] ;
		$txid=$_POST["txid"] ;
		$message=$_POST["message"] ; 
	
		
		$message=urldecode($message);
		
		//if (!isset($timestamp) || !isset($txid) || !isset($message)
		//	exit();






		$con = mysqli_connect('globaldefi.fatcowmysql.com', 'zildbadmin1198', 'Zil119955#8pwd', "dbzilliqa"); 
 


		//////////////////////////////// INSERT into db////////////////////////////////////////////////////////	
		$updatedb=true;
		if ($updatedb)
		{
				$datestr=date("Y-m-d H:i:s", intval($timestamp));  
				$qry = "INSERT INTO tblmessage ".
				" (fdate,ftimestamp,    ftxid,fmessage,fzilsenderaddress  ) VALUES".
				" ('$datestr',  $timestamp, '$txid','$message', '$zilsenderaddress' ) ";	
				
			//	$qry = 'INSERT INTO tblmessage '.				
			//	' (fdate,ftimestamp,    ftxid,fmessage,fzilsenderaddress  ) VALUES '.				
			//	" ('$datestr',  $timestamp, '$txid','$message', '$zilsenderaddress' ) ";	



				
				//echo $qry;			
				$result = mysqli_query($con,$qry);	
				if (!$result) 
				{	
						
						echo mysqli_error ($con); echo "<br>";
						echo "senderaddr=".$zilsenderaddress; echo "<br>";
						echo "message=".$message; echo "<br>";
						echo "txid=".$txid; echo "<br>"; echo "<br>";		
 echo "<br>"; echo "<br>";	
						echo $qry;
 echo "<br>"; echo "<br>";	
 
						$errstr=sprintf("Insert tblmessage Failed! ERROR=910<br>");
						mysqli_close($con);
						echo $errstr; exit(0);					
				}
				else
				{

						//echo "Blockbnum=".$blocknum." Insert tblmessage into dbzilliqa success"."<br>";
						if(ob_get_level()>0) ob_end_flush(); 
						echo "SUCCESS";
				} 
		}
						
		mysqli_close($con);
	
	
	
?>