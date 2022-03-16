<?php
 


			$txid=array();
			/*
			 $txid[0]="61e76042b36e616583cac9ae0ece2d5b60ce10572789094653f92393a17dd442";
			$txid[1]="b9d6489ad0132baa12ad5941efaf0a3796aaa7d47ee8837e8f127e65940751e2";  
			$txid[2]="0fd19d89b2a68bf69a0f1ed08af3f9faac2477ba87b4b67c903d62c7778ed52e";
			$txid[3]="a6ec12cba39e66a790acfc257cdbf92e6c9be85abc6bab2ff34a4d2ec9564a25";
			$txid[4]="7a32c48315ba08e42201f90a83498cf61b471dbbd8e0f4c44dc8019f9d2cc697";
			$txid[5]="3185400968c57dd690a1a99db11b3e31f094a2e4ee1b92890b637243c7bfecb4";
			$txid[6]="8a690b09cfa5420e7077e7fee0032053558b40ce54bcae9141718855ca3befb9";
			$txid[7]="9f29ff7eb50b6bae7aaae7facef48b0643ce83d3b7658a122fe77a6cda65f8d3";
			$txid[8]="7fa72d5c8daed710303ab8980afc4f32c954ef69eee420bf3fb12483e3fb2e3e";
			$txid[9]="c5122de843b7a718171bd2839aafc61fe2a2cae2e7026d1a7f35cbc423d2df99";
			$txid[10]="8b3700d1c6201bcfee8018ccbcfd410ba8062f126a950649d34216937607605c";
			$txid[11]="406c4b20327c790f63a7cb210c61e16628a68cf5f7addde2712701b7f35884ab";

			 
			$totaltxid=10;    
			*/                


			// each page is max 10 only
			// tblmessage has fdate, ftimestamp, ftxid, fno ==this number starts from 1 and autoincrease

			//So for page 1 list all ftxid from fno=1 to fno<=10 order by fno
			//for page 2, list all ftxid from fno=11 to fno<=20 order by fno
			//for page 3, list all ftxid from fno=21 to fno<=30 order by fno
			// viewer3.php?page=2
			$page=1;
			if (!isset($_GET["page"]))
				$page=1;
			else
				$page=$_GET["page"] ;
				
			$maxfno=$page*10;
			$minfno=$maxfno-9;
			$con = mysqli_connect('globaldefi.fatcowmysql.com', 'zildbadmin1198', 'Zil119955#8pwd', "dbzilliqa"); 
			$qry="SELECT * from tblmessage where fno>=$minfno and fno<=$maxfno order by fno";
			$result=mysqli_query($con,$qry);

			$index=0;		
 


			$result = mysqli_query($con,$qry);	
			if (!$result) 
			{	
					$errstr=sprintf("Query tblstake Failed! ERROR=910<br>");
					mysqli_close($con);
					echo $errstr; exit(0);
					
			}
			$num_rows = mysqli_num_rows($result);
 
			
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$txid[$index]=$row['ftxid'];
				$index++;				 	
			}
			$totaltxid=$index;
			
			
			/// find last fno
			$qry="SELECT fno FROM tblmessage ORDER BY fno DESC LIMIT 1";
			$result = mysqli_query($con,$qry);	
			if (!$result) 
			{	
					$errstr=sprintf("Query tblstake Failed! ERROR=910<br>");
					mysqli_close($con);
					echo $errstr; exit(0);
					
			}
			$num_rows = mysqli_num_rows($result);
			$row = mysqli_fetch_assoc($result);
			$lastfno=$row['fno'];

			
			
			//$lastfno=2656;
			// if $lastfno=10, so lastpage=1;
			// if $lastfno=11, so last page=2
			$lastpage=ceil($lastfno/10.0);
			///   <<< << <  Page 1 2 3 4  ... 198 199 200 > >> >>>
			
			
			
			mysqli_close($con);

 
 
  $num1=$page;
  $num1str='<a href="viewmessage.php?page='.$num1.'">'.$num1.'</a>';
  
  $num2=$page+1;
  
  $num3=$page+2;
  
  $num4=$lastpage-2;
  $num5=$lastpage-1;
  $num6=$lastpage;
  $num6str='<a href="viewmessage.php?page='.$num6.'">'.$num6.'</a>';
  
  $firstpage=1;
   
  $firstpagestr='<a href="viewmessage.php?page=1"><<<</a>';  
  
  $doublearrowleft="<i class='fas fa-angle-double-left' style='font-size:24px' style'vertical-align: middle;'></i>";
  $doublearrowright="<i class='fas fa-angle-double-right' style='font-size:24px' style='vertical-align: middle;'></i>";
  $singlearrowleft="<i class='fas fa-angle-left' style='font-size:24px' style='vertical-align: middle;'></i>";
  $singlearrowright="<i class='fas fa-angle-right' style='font-size:24px' style='vertical-align: middle;'></i>";
  
  
  $firstpagestr='<a href="viewmessage.php?page=1">'.$doublearrowleft."</a>";
  
  
  $lastpagestr='<a href="viewmessage.php?page='.$lastpage.'">'.$doublearrowright."</a>";
  
  
  
  $nextpage=$page+1;
  if ($nextpage>$lastpage)
	  $nextpage=$lastpage;
  
  $previouspage=$page-1;
  if ($previouspage<0)
	$previouspage=1;



  $nextpagestr='<a href="viewmessage.php?page='.$nextpage.'">></a>';
  
  $nextpagestr='<a href="viewmessage.php?page='.$nextpage.'">'.$singlearrowright.'</a>';

  
  $previouspagestr='<a href="viewmessage.php?page='.$previouspage.'"><</a>';
  
  
  $previouspagestr='<a href="viewmessage.php?page='.$previouspage.'">'.$singlearrowleft.'</a>';


  
  $navigation= "$firstpagestr $previouspagestr $num1str $num2 $num3 ... $num4 $num5 $num6str $nextpagestr $lastpagestr";
  



 ?>
 
 
 
<!DOCTYPE html> 
<!--Clement T 08.01.2021 email:clement@myzilliqawallet.com-->
<!--Clement T-->
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" data-react-helmet="true" content="myZilliqa Wallet is a true open-source client side wallet. Run the wallet from your own computer!">
<meta name="keywords" content="zilliqa, wallet, client side, staking, statistic, myzilliqawallet">
 
<title>My Zilliqa Wallet</title>
<link rel="icon" href="images/myzilliqawalletlogo.png">
  
<script src="js/jquery-3.3.1.min.js"></script>   
<script src="js/bootstrap.min.js"></script> 
<script src="js/zilliqa.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/aes.js"></script>
 
<link href="css/bootstrap.min.css" rel="stylesheet" />

<style type="text/css">
.full-width {
    width: 100%;
    margin-left: 60px; 
}


textarea {
  font-family:Consolas,Monaco,Lucida Console,Liberation Mono,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier New, monospace;
  resize: none;
}


select.form-control{

display:inline-block;
width: 300px;
text-align: right;
}

 
 	
</style>
 
</head>
<body>
<div class="bs-1">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a href="home.html" class="navbar-brand">
            <img src="images/myzilliqawalletsmall.png" height="28" alt="myZilliqaWallet">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">  				
				<a href="homemessage.html" class="nav-item nav-link">Home</a>
				<a href="sendmessage.html" class="nav-item nav-link">Send Message</a>
				<a href="readmessage.php" class="nav-item nav-link ">Read Message</a>
				<a href="viewmessage.php" class="nav-item nav-link   active">Messages Viewer</a>				
				<a href="searchmessage.html" class="nav-item nav-link">Search Message</a> 
            </div> 
        </div>			
		
		
    </nav> 
</div>
 
 
	
	
 
 
 

 <div class="container-fluid full-width ">
 
 <br>
 <h5> Messages Viewer b0.6b</h5> 
 <div class="row">
	<div class="col-sm-4">
		<p> View all messages stored at our blockchain</p>   
	</div>
 
	<div class="col-sm-6">
		 <?php echo $navigation ?> 
	</div>		
	
  </div>
  
  
   <div class="row">
			<div class="col-sm-4">
			 
					<div class="input-group input-group-sm mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text" id="inputGroup-sizing-sm">Page #</span>
					  </div>
					  <input type="text" id="page" class="form-control" aria-label="Page #" aria-describedby="inputGroup-sizing-sm">
					</div>
					     
					<button type="button" class="btn btn-primary btn-sm  btn-block" id="viewbutton" onclick="viewpage()"   >View Page</button>
	
			</div>
			<div class="col-sm-4">
					<div class="form-group" class="form-inline">	
						<span  >
						  <label for="size" id="estimatedgas"> </label>
						  <select class="form-control form-control-sm" id="size"    style="text-align:right;">
							<option>Font: 2px</option>
							<option>Font: 4px</option>
							<option selected="selected">Font: 6px</option>
							<option>Font: 8px</option>
							<option>Font: 10px</option>
							<option>Font: 12px</option>
							<option>Font: 14px</option>
							<option>Font: 16px</option>								
						  </select>
						</span>
					</div>			
			
			</div>
	</div>	
	<br>
	
 <div class="row">
	<div class="col-sm-4">	
			<p id="pagenum">Page # <?php echo $page ?> </p>	
	</div>
 	<div class="col-sm-6">	
			<p id="pagenum">Total <?php echo $lastfno ?> messages</p>	
	</div>	
</div>	
 <hr>
 
 
 
 
 
 
 
 
 
  
 
 
 
 
 
 
 
 
 
 
 
  <small> <p id="txid1">Message #1  </p></small>
  <div class="row">
  
		  <div class="col-sm-7"> 
			
			   <textarea class="form-control" rows="11" id="comment1"></textarea>
		  </div> 
  </div>  
  <hr>	
	
	
	
  <small> <p id="txid2">Message #2  </p></small>
  <div class="row">
  
		  <div class="col-sm-7"> 
			
			   <textarea class="form-control" rows="11" id="comment2"></textarea>
		  </div> 
  </div>  
  <hr>	
	 
	
  <small> <p id="txid3">Message #3  </p></small>
  <div class="row">
  
		  <div class="col-sm-7"> 
			
			   <textarea class="form-control" rows="11" id="comment3"></textarea>
		  </div> 
  </div>  
  <hr>	
	 				  
				  

  <small> <p id="txid4">Message #4  </p></small>
  <div class="row">
  
		  <div class="col-sm-7"> 
			
			   <textarea class="form-control" rows="11" id="comment4"></textarea>
		  </div> 
  </div>  
  <hr>	
	 
  	  
	
  <small> <p id="txid5">Message #5  </p></small>
  <div class="row">
  
		  <div class="col-sm-7"> 
			
			   <textarea class="form-control" rows="11" id="comment5"></textarea>
		  </div> 
  </div>  
  <hr>	
	 	
	
  <small> <p id="txid6">Message #6  </p></small>
  <div class="row">
  
		  <div class="col-sm-7"> 
			
			   <textarea class="form-control" rows="11" id="comment6"></textarea>
		  </div> 
  </div>  
  <hr>	
	 	
	
	  

  <small> <p id="txid7">Message #2  </p></small>
  <div class="row">
  
		  <div class="col-sm-7"> 
			
			   <textarea class="form-control" rows="11" id="comment7"></textarea>
		  </div> 
  </div>  
  <hr>	
	 


  <small> <p id="txid8">Message #2  </p></small>
  <div class="row">
  
		  <div class="col-sm-7"> 
			
			   <textarea class="form-control" rows="11" id="comment8"></textarea>
		  </div> 
  </div>  
  <hr>	
	 


  <small> <p id="txid9">Message #2  </p></small>
  <div class="row">
  
		  <div class="col-sm-7"> 
			
			   <textarea class="form-control" rows="11" id="comment9"></textarea>
		  </div> 
  </div>  
  <hr>	
	 


  <small> <p id="txid10">Message #2  </p></small>
  <div class="row">
  
		  <div class="col-sm-7"> 
			
			   <textarea class="form-control" rows="11" id="comment10"></textarea>
		  </div> 
  </div>  
  <hr>	
	 





 
 

 



 
 

<noscript>
  You need to enable JavaScript to run this app.
</noscript>

  
</body>

 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

 
 
 
<script>
//  Copyright (C) 2021 myzilliqawallet
//
 
//
//  This program is free software: you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation, either version 3 of the License, or
//  (at your option) any later version.
//
//  This program is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//  GNU General Public License for more details.
//
//  You should have received a copy of the GNU General Public License
//  along with this program.  If not, see <https://www.gnu.org/licenses/>.

var animatespinner='<i class="fas fa-spinner fa-spin fa-2x"></i>'; 
var totaltxid=<?php echo $totaltxid?>;
 

async function readmsgfromblockhain(txid, num)
{
	
	 num=num+1;
	 
	 
	 document.getElementById("comment"+num).value="Loading...";
     zilliqa = new Zilliqa.Zilliqa('https://dev-api.zilliqa.com');
	 //zilliqa =await new Zilliqa.Zilliqa("https://api.zilliqa.com/");
	 
     //txid="d38604292084ae44cd043125f79a9d02ddf781bef90499d70cfbadc60082353a";
	 console.log(txid);
	 txn = await zilliqa.blockchain.getTransaction(  txid	);
	 msg=txn.receipt.event_logs[0].params[0].value;
	 
	 numofrow=msg.split(/\r\n|\r|\n/).length;
	 
	 if (numofrow<5) numofrow=5;
	  
	 document.getElementById("comment"+num).rows = numofrow;
	 
	 
	 document.getElementById("comment"+num).value=msg;
	 console.log(msg);	
	 console.log(txn.senderAddress.toLowerCase());
	 senderAddr=Zilliqa.toBech32Address(txn.senderAddress.toLowerCase());	
	 console.log(txn.toAddr.toLowerCase());
	 contractAddr=Zilliqa.toBech32Address(txn.toAddr.toLowerCase());	 
	 blocknum=txn.receipt.epoch_num;
	 
	 //document.getElementById("blocknum"+num).innerHTML="Blocknum: "+blocknum;
	 //document.getElementById("txid"+num).innerHTML="Message #"+num+" txid: "+txid;
	 
	 
	 
	  newtab=' target="_blank" rel="noopener noreferrer"';			
			//http://127.0.0.1:8080/myzilliqawallet/readmsg.php?txid=d38604292084ae44cd043125f79a9d02ddf781bef90499d70cfbadc60082353a
			
			url1="https://myzilliqawallet.com/pm/readmessage.php?txid="+txid;
			myzilliqawalletlink='<a href="'+url1+'"'+newtab+'>'+ txid + '</a>';
			
			document.getElementById("txid"+num).innerHTML="Message #"+num+" txid: "+myzilliqawalletlink;
			 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 //document.getElementById("senderaddress"+num).innerHTML="Sender Address: "+senderAddr;

///////zil1rh4363klwrw6cnmjkguetsh2yx057dqmrr8ufd   senderAddr in zil	 
	// document.getElementById("contractaddress"+num).innerHTML="Contract Address: "+contractAddr; 
	 //zil1644y20t8ksj5zm73krgasrw4dnhew020ld0q4y   contract address
}
 
 
 
 
 window.onload = readallmessage;

 
 
function readallmessage()
{
	
	 for (i=1;i<totaltxid+1;i++)
	 		document.getElementById("comment"+i).style.fontSize = "10px";		
	txid=[];
	//txid[0]="<?php echo $txid[0]?>";
	//txid[1]="<?php echo $txid[1]?>";	
	//txid[2]="<?php echo $txid[2]?>";	
	//txid[3]="<?php echo $txid[3]?>";
	//txid[4]="<?php echo $txid[4]?>";	
	//txid[5]="<?php echo $txid[5]?>";
	//txid[6]="<?php echo $txid[6]?>";	
	//txid[7]="<?php echo $txid[7]?>";	
	//txid[8]="<?php echo $txid[8]?>";
	//txid[9]="<?php echo $txid[9]?>";
    <?php for ($i=0;$i<$totaltxid; $i++) echo "txid[".$i."]=".'"'.$txid[$i].'"; ';	?>
 
	
    //console.log(txid[0]);
	//console.log(txid[1]);
	//console.log(txid[2]);	
	
	 for (i=0; i<totaltxid; i++)
	 	readmsgfromblockhain(txid[i],i); 
	
	for (i=1;i<totaltxid+1;i++)
			document.getElementById("comment"+i).style.fontSize = "4px";	
		 
}

$("#comment").on("change keyup paste", function(){
    
	//comment=document.getElementById("comment").value; 
	//estimatedgasfee=0.75*comment.length/1000.0+0.9989;
	//sizeinkbyte=comment.length/1000.0;
	//msg="Estimated gas fee="+estimatedgasfee.toFixed(3)+" ZIL &#9 &#9 &#9 "+ sizeinkbyte.toFixed(2)+" kByte";
	//document.getElementById("estimatedgas").innerHTML=msg; 
	
	
	
})





$("#size").on("change keyup paste", function(){
    
	size=document.getElementById("size").value; 
	console.log(size);
	if (size=="Font: 2px")
	{
		for (i=1;i<totaltxid+1;i++)
			document.getElementById("comment"+i).style.fontSize = "2px";
		
		
	}
	if (size=="Font: 4px")
	{
		for (i=1;i<totaltxid+1;i++)
			document.getElementById("comment"+i).style.fontSize = "4px";
	   // document.getElementById("comment").rows = "75";		
	}
	if (size=="Font: 6px")
	{
		for (i=1;i<totaltxid+1;i++)
			document.getElementById("comment"+i).style.fontSize = "6px";			
	}
	if (size=="Font: 8px")
	{
		for (i=1;i<totaltxid+1;i++)
			document.getElementById("comment"+i).style.fontSize = "8px";			
		
	}
	if (size=="Font: 10px")
	{
		for (i=1;i<totaltxid+1;i++)
			document.getElementById("comment"+i).style.fontSize = "10px";		
		
	}

	if (size=="Font: 12px")
	{
		for (i=1;i<totaltxid+1;i++)
			document.getElementById("comment"+i).style.fontSize = "12px";			
		
	}

	if (size=="Font: 14px")
	{
		for (i=1;i<totaltxid+1;i++)
			document.getElementById("comment"+i).style.fontSize = "14px";		
		
	}	
	
	if (size=="Font: 16px")
	{
		for (i=1;i<totaltxid+1;i++)
			document.getElementById("comment"+i).style.fontSize = "16px";			
		
	}		
	
	//
	
})



function viewpage()
{
	pagenum=document.getElementById("page").value;
	window.location.replace("https://myzilliqawallet.com/pm/viewmessage.php?page="+pagenum);
}	
 
 
 
 
//testsend();
</script>
</html>