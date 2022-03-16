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

getsearchmessage.php?s=tesla&a=&df=03/31/2021&dt=&eb=1&ab=0
getsearchmessage.php?s=&a=&df=12/01/2020&dt=04/24/2021&eb=0&ab=

eb encryption message checkbox
ab attachment checkbox
dt= dateto
df= datefrom
s=keyword/tag
a=address (zil address)


*/
$searchstr="";
$searchaddr="";

$searchstrflag=0;
$searchaddrflag=0;

if (isset($_GET["s"]))
{
	$searchstr= $_GET["s"] ;	
	//$searchstr = preg_replace('/\s/', '', $searchstr);
	$searchstrflag=1;
}
 
 
if (isset($_GET["a"]))
{
	$searchaddr= $_GET["a"] ;
	$searchaddr = preg_replace('/\s/', '', $searchaddr);
	$searchaddrflag=1;
}

$datefrom	= $_GET["df"] ;
$dateto		= $_GET["dt"] ;	
$dfrom=false;
$dto=false;

$dfromstr="";
$dtostr="";

if (strlen($datefrom)==10)
{
	$tmp=explode("/", $datefrom);
	$frommm=$tmp[0]; // month
	$fromdd=$tmp[1]; // day	
	$fromyyyy=$tmp[2]; // year	
	$dfrom=true;
	$dfromstr="fdate>='".$fromyyyy."-".$frommm."-".$fromdd." 00:00:00'";
}

if (strlen($dateto)==10)
{
	$tmp=explode("/", $dateto);
	$tomm=$tmp[0]; // month
	$todd=$tmp[1]; // day	
	$toyyyy=$tmp[2]; // year	
	$dto=true;
	$dtostr="fdate<='".$toyyyy."-".$tomm."-".$todd." 23:59:59'";
}



	

$encryptioncheckbox= $_GET["eb"] ;	
if ($encryptioncheckbox==1)
	$destr="fencryption=".$encryptioncheckbox;
else
	$destr="";

$attachmentcheckbox= $_GET["ab"] ;
if ($attachmentcheckbox==1)
	$dastr="fattachment=".$attachmentcheckbox;
else
	$dastr="";



if ($searchstrflag==0 && $searchaddrflag==0)
	return;

	

//$con = mysqli_connect('localhost','root','','dbzindex'); 
//$con = mysqli_connect('globaldefi.fatcowmysql.com','datascientist','datA9881@-11t','dbinvestor');  
$con = mysqli_connect('globaldefi.fatcowmysql.com', 'zildbadmin1198', 'Zil119955#8pwd', "dbzilliqa"); 

getmessage($con, $searchstr, $searchaddr, $dfromstr, $dtostr, $destr, $dastr);
//getallhistoricaldata($con);


mysqli_close($con);

		
		function getmessage($con, $searchstr, $searchaddr, $dfromstr, $dtostr, $destr, $dastr)
		{
			//echo "str=".$searchstr;
			//echo "addr=".$searchaddr;
			$useaddr=0;
			$usestr=0;
			//12345678901234567890123456789012345678901234567890
			//zil1rh4363klwrw6cnmjkguetsh2yx057dqmrr8ufd   //42 bytes
			//zil1rh4363klwrw6cnmjkguetsh2yx057dqmrr8ufd
			if (strlen($searchaddr)==42)
			{
				$useaddr=1;
				//echo "useaddr";
				
			}
			
			if (strlen($searchstr)>1)
			{
				
				$usestr=1;
			}
             
			//SELECT name FROM users WHERE name LIKE BINARY 't%'  // for case sensitive search
			//$qry="SELECT * FROM tblmessage WHERE  tblmessage.fmessage  LIKE '%".$searchstr."%'";
			//$qry="";
			
			$qry="SELECT * FROM tblmessage WHERE ";
			
			
			if ($usestr==0 && $useaddr==1)
			{
				$qry.="   fzilsenderaddress='".$searchaddr."'";
			//	echo $qry;
			
				
			}
			else if ($usestr==1 && $useaddr==0)
			{
				$qry.="   tblmessage.fmessage  LIKE '%".$searchstr."%'";
				//echo $qry;

			}
			else if ($usestr==1 && $useaddr==1)
			{
				$qry.="   fzilsenderaddress='".$searchaddr."' and tblmessage.fmessage  LIKE '%".$searchstr."%'";				
			//	echo $qry;				
			}
			else
			{
				$qry.="  ftimestamp>1 ";
			}
			
			if (strlen($dfromstr)>6)
				$qry=$qry." AND ".$dfromstr;
			if (strlen($dtostr)>6)
				$qry=$qry." AND ".$dtostr;				
//, $destr, $dastr

			 



			if (strlen($destr)>6)
				$qry=$qry." AND ".$destr;
			if (strlen($dastr)>6)
				$qry=$qry." AND ".$dastr;	










			
			
			// echo $qry;
			
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
 					//$url="https://myzilliqawallet.com/viewer3.php?page=".$page;
					
					$url="viewmessage.php?page=".$page;					
					//$url="";
					
					$ref='<a href="'.$url.'">'.$page.'</a>';					
					//$ref=$page;
					
					//<a href=" faf">asdasd</a>
			
					echo "<td>"; echo $ref; echo "</td>";	
					//////////////////////////////////////////////////////////
					
					$txid=$row['ftxid'];
					//https://myzilliqawallet.com/readmsg.php?txid=edce291f8cca0620c0011b56d6137bc3f92063baa51a370395b96765703fd67f
					//$url="https://myzilliqawallet.com/pm/readmessage.php?txid=".$txid;
					
					// $url="readmessage.php?txid=".$txid;
					$url="read-message.html?txid=".$txid;
					//$url=$txid;

					
					$newtab=' target="_blank" rel="noopener noreferrer"';	
					//myzilliqawalletlink='1) <a href="'+url1+'"'+newtab+'>myZilliqaWallet Explorer</a>';
					//$url.=$newtab;
					
					$ref='<a href="'.$url.'">'.$txid.'</a>';	
					//$ref=$txid;
					
					echo "<td>"; echo $ref; echo "</td>";	 
					
					//////////////////////////////////////////////////////////
					$shortmsg=$row['fmessage'];
					$shortmsg=substr($shortmsg,8);  // remove the first 8 characters which is flagstr
					//$shortmsg=str_replace("@@-----@@", "",$shortmsg);
					//$shortmsg=str_replace("@@-@@@-@@", "",$shortmsg);					
					
 
					
					$shortmsg = substr($shortmsg,0,60);
					echo "<td>"; echo $shortmsg; echo "</td>";		
					echo "<td>"; echo $row['fzilsenderaddress']; echo "</td>";
					echo "</tr>";				  
				}
			echo "</tbody>";	
			echo "</table>";



		}
		              
 

?>