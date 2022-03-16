<?php
 
$debug=1;
/*
give me a searchstr, i will return search results in tablular form

//filename: searchmessage.php?s='LET ROCK ZILLIQA'

$searchstr= $_GET["s"] ;
if (!isset($_GET["page"))
  return;
$searchstr="Message LET ROCK ZILLIQA!!!! 9";

$qry="SELECT * FROM tblmessage WHERE  tblmessage.fmessage  LIKE '%".$searchstr."%'";

SELECT * FROM tblmessage WHERE  tblmessage.fmessage  LIKE '%Message LET ROCK ZILLIQA!!!! 9%'

it will return results, either 0 or 1 or few rows.

Then we will display either the first 30 bytes and txid, timestamp and date, fno, and fpage


User can clickk on the txid to view full message where he can decrypt if necessary
or view using fpage or fno where only viewer, no descrypt




give me a txid
i will search my db with the txid in the message
and return all the related txid that contains




*/
$searchstr= $_GET["txid"] ;
if (!isset($_GET["txid"]))
  return;
 
 
//$con = mysqli_connect('localhost','root','','dbzindex'); 
//$con = mysqli_connect('globaldefi.fatcowmysql.com','datascientist','datA9881@-11t','dbinvestor');  
$con = mysqli_connect('globaldefi.fatcowmysql.com', 'zildbadmin1198', 'Zil119955#8pwd', "dbzilliqa"); 

gettxid($con, $searchstr);
//getallhistoricaldata($con);


mysqli_close($con);

		 
		
		
		
		
		
		

		
		function gettxid($con, $searchstr)
		{
            // tblstake
			// fname:Bitcoin
			// fsymbol: BTC
			// flastupdatedtimestamp
			// fprice: 11694.67
			// fcurrentmarketcap: 2121212121212
			
			$qry="SELECT * FROM tblmessage WHERE  tblmessage.fmessage  LIKE '%".$searchstr."%'";
			//if ($debug)  echo $qry;
			
			$result = mysqli_query($con,$qry);	
			if (!$result) 
			{	
					$errstr=sprintf("Query tblwithdraw Failed! ERROR=910<br>");
					mysqli_close($con);
					echo $errstr; exit(0);
					
			}
			$num_rows = mysqli_num_rows($result);
	


/*

echo '[';
echo '    { "Date": "2015-01-01", "stat1": 21, "stat2": 5 },';
echo '    { "Date": "2015-01-02", "stat1": 32, "stat2": 15 },';
echo '    { "Date": "2015-01-03", "stat1": 19, "stat2": 11 },';
echo '    { "Date": "2015-01-04", "stat1": 8, "stat2": 17 },';
echo '   { "Date": "2015-01-05", "stat1": 26, "stat2": 5 },';
echo '    { "Date": "2015-01-06", "stat1": 31, "stat2": 2 },';
echo '    { "Date": "2015-01-07", "stat1": 37, "stat2": 28 },';
echo '    { "Date": "2015-01-08", "stat1": 16, "stat2": 14 },';
 echo '   { "Date": "2015-01-09", "stat1": 25, "stat2": 19 },';
 echo '   { "Date": "2015-01-11", "stat1": 30, "stat2": 8 }';
echo ']';

*/
			echo ' [';
			$cur_row=0;
			
			while ($row = mysqli_fetch_assoc($result)) 
			{
				//$header=array("Date","Timestamp","Inflow","Outflow", "Net_Inflow" );
				//              fdate ,ftimestamp , famountnewadded, famountunstaked, fnetamountincreased
 				echo '{ ';
				$date=$row['fdate'];
				 
				//$stat1=$row['fstat1']; // <=100k
				//$stat2=$row['fstat2']; // >100k				
				//$stat3=$row['fstat3']; // >500k				
				//$stat4=$row['fstat4']; // >1m				
				//$stat5=$row['fstat5']; // >5m	
				
				$txid   =$row['ftxid'];
				$zilsenderaddress  =$row['fzilsenderaddress'];
				$timestamp=$row['ftimestamp'];
				$message=$row['fmessage']; 			
				//$datetime=$date;
				 
				echo '"timestamp":"'.$timestamp.'",';
				//echo '"zilsenderaddress":'.$zilsenderaddress.',';
				echo '"zilsenderaddress":"'.$zilsenderaddress.'",';
				// need to encode message because js when decoding json dont allow /r/natcasesort
				$encoded_string = base64_encode($message);
				
				 echo '"message":"'.$encoded_string.'",';					
				//echo '"txid":'.$txid ;				
				echo '"txid":"'.$txid.'"';				 			
 				echo '}';
				if ($cur_row!=($num_rows-1))
					echo  ",";
				$cur_row++;


			}
			
			
			
			
			//echo "] }";
			echo "]  ";			 
		//{ "btc":19222, "eth":240.1, "xrp":0.24}



		}
		              
 
		 		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		              
 

?>