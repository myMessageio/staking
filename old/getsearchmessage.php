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

It will output in a table?

*/
$searchstr= $_GET["s"] ;
if (!isset($_GET["s"]))
  return;
 
 
//$con = mysqli_connect('localhost','root','','dbzindex'); 
//$con = mysqli_connect('globaldefi.fatcowmysql.com','datascientist','datA9881@-11t','dbinvestor');  
$con = mysqli_connect('globaldefi.fatcowmysql.com', 'zildbadmin1198', 'Zil119955#8pwd', "dbzilliqa"); 

getmessage($con, $searchstr);
//getallhistoricaldata($con);


mysqli_close($con);

		
		function getmessage($con, $searchstr)
		{
             
			//SELECT name FROM users WHERE name LIKE BINARY 't%'  // for case sensitive search
			$qry="SELECT * FROM tblmessage WHERE  tblmessage.fmessage  LIKE '%".$searchstr."%'";
			//if ($debug)  echo $qry;
			
			$result = mysqli_query($con,$qry);	
			if (!$result) 
			{	
					$errstr=sprintf("Query tblmessage Failed! ERROR=910<br>");
					mysqli_close($con);
					echo $errstr; exit(0);
					
			}
			 
			 
			 //Then we will display either the first 30 bytes and txid, timestamp and date, fno, and fpage
			echo '<table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">';
			$header=array("Date","Timestamp","No","Page","TXID","Message","Sender" );
			
			// note message length is trimmed to max first 30 bytes only.
 				
			echo "<thead>";
				echo "<tr>";
				for ($i=0;$i<count($header);$i++)
				{
					echo "<th>";
					echo $header[$i];
					echo "</th>";				
				}			
				echo "</tr>";
			echo "</thead>";
 				
			echo "<tbody>";
				foreach($result as $row){				 
					echo "<tr>";					 
					echo "<td>"; echo $row['fdate']; echo "</td>";				 
					echo "<td>"; echo $row['ftimestamp']; echo "</td>";				 
					echo "<td>"; echo $row['fno']; echo "</td>";
					
					
					
					///// Calculate Page number /////////////////////////////
					$no=$row['fno'];			 
					$page=ceil($no/10.0);	
 
					$url="https://myzilliqawallet.com/viewer3.php?page=".$page;
					$ref='<a href="'.$url.'">'.$page.'</a>';
					//<a href=" faf">asdasd</a>
			
					echo "<td>"; echo $ref; echo "</td>";	
					//////////////////////////////////////////////////////////
					
					$txid=$row['ftxid'];
					//https://myzilliqawallet.com/readmsg.php?txid=edce291f8cca0620c0011b56d6137bc3f92063baa51a370395b96765703fd67f
					$url="https://myzilliqawallet.com/pm/readmessage.php?txid=".$txid;
					$newtab=' target="_blank" rel="noopener noreferrer"';	
					//myzilliqawalletlink='1) <a href="'+url1+'"'+newtab+'>myZilliqaWallet Explorer</a>';
					//$url.=$newtab;
					
					$ref='<a href="'.$url.'">'.$txid.'</a>';					
					echo "<td>"; echo $ref; echo "</td>";	 
					
					//////////////////////////////////////////////////////////
					$shortmsg=$row['fmessage'];
					$shortmsg = substr($shortmsg,0,30);
					echo "<td>"; echo $shortmsg; echo "</td>";		
					echo "<td>"; echo $row['fzilsenderaddress']; echo "</td>";
					echo "</tr>";				  
				}
			echo "</tbody>";	
			echo "</table>";



		}
		              
 

?>