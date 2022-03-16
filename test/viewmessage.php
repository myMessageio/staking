<?php
 $txid=array(); $page=1; if (!isset($_GET["page"])) $page=1; else $page=$_GET["page"] ; $maxfno=$page*10; $minfno=$maxfno-9; $con = mysqli_connect('globaldefi.fatcowmysql.com', 'zildbadmin1198', 'Zil119955#8pwd', "dbzilliqa"); $qry="SELECT * from tblmessage where fno>=$minfno and fno<=$maxfno order by fno"; $result=mysqli_query($con,$qry); $index=0; $result = mysqli_query($con,$qry); if (!$result) { $errstr=sprintf("Query tblstake Failed! ERROR=910<br>"); mysqli_close($con); echo $errstr; exit(0); } $num_rows = mysqli_num_rows($result); while ($row = mysqli_fetch_assoc($result)) { $txid[$index]=$row['ftxid']; $index++; } $totaltxid=$index; $qry="SELECT fno FROM tblmessage ORDER BY fno DESC LIMIT 1"; $result = mysqli_query($con,$qry); if (!$result) { $errstr=sprintf("Query tblstake Failed! ERROR=910<br>"); mysqli_close($con); echo $errstr; exit(0); } $num_rows = mysqli_num_rows($result); $row = mysqli_fetch_assoc($result); $lastfno=$row['fno']; $lastpage=ceil($lastfno/10.0); mysqli_close($con); $num1=1; $num1str='<a href="viewmessage.php?page='.$num1.'">'.$num1.'</a>'; $num2=2; $num3=3; $num4=$lastpage-2; $num5=$lastpage-1; $num6=$lastpage; $num6str='<a href="viewmessage.php?page='.$num6.'">'.$num6.'</a>'; $currentpagestr='<a href="viewmessage.php?page='.$page.'"   style="vertical-align: middle;" >'.$page.'</a>'; $firstpage=1; $firstpagestr='<a href="viewmessage.php?page=1"><<<</a>'; $doublearrowleft="<i class='fas fa-angle-double-left' style='font-size:24px' style='vertical-align: middle;'></i>"; $doublearrowright="<i class='fas fa-angle-double-right' style='font-size:24px' style='vertical-align: middle;'></i>"; $singlearrowleft="<i class='fas fa-angle-left' style='font-size:24px' style='vertical-align: middle;'></i>"; $singlearrowright="<i class='fas fa-angle-right' style='font-size:24px' style='vertical-align: middle;'></i>"; $firstpagestr='<a href="viewmessage.php?page=1">'.$doublearrowleft."</a>"; $lastpagestr='<a href="viewmessage.php?page='.$lastpage.'">'.$doublearrowright."</a>"; $nextpage=$page+1; if ($nextpage>$lastpage) $nextpage=$lastpage; $previouspage=$page-1; if ($previouspage<0) $previouspage=1; $nextpagestr='<a href="viewmessage.php?page='.$nextpage.'">></a>'; $nextpagestr='<a href="viewmessage.php?page='.$nextpage.'">'.$singlearrowright.'</a>'; $previouspagestr='<a href="viewmessage.php?page='.$previouspage.'"><</a>'; $previouspagestr='<a href="viewmessage.php?page='.$previouspage.'">'.$singlearrowleft.'</a>'; $navigation= "$firstpagestr $previouspagestr  $currentpagestr  $nextpagestr $lastpagestr"; ?>
 
<!DOCTYPE html>
<!--Clement T 08.01.2021 email:clement@myzilliqawallet.com-->
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" data-react-helmet="true" content="myMessage is a true permanent message storage tool to store your information permanently on blockchain!">
<meta name="keywords" content="message, permanent,   myMessage">
 
<title>myMessage.io</title>
<link rel="icon" href="images/myMessagelogo.png">



 
 <script src="js/zilliqa.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>   
<script src="js/bootstrap.min.js"></script>  
<script src="js/all.min.js"></script> 
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/styles.css" rel="stylesheet" />  
  
        
  

 
 

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
 	
label {
   
    text-align: left;
     
}	
	
 	
</style>
 
 
 
 
 
<body>
<div class="bs-1">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a href="home.html" class="navbar-brand">
            <img src="images/myMessagesmall.png" height="28" alt="myMessage.io">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                 
 			
				
				
				<a href="index.html" class="nav-item nav-link ">Home</a>
				<a href="sendmessage.html" class="nav-item nav-link">Send Message</a>
				<a href="readmessage.php" class="nav-item nav-link">Read Message</a>
				<a href="viewmessage.php" class="nav-item nav-link active ">Messages Viewer</a>				
				<a href="searchmessage.html" class="nav-item nav-link">Search Message</a> 			
				
            </div>
 
        </div>
    </nav>
</div>
 
 
	
	
 
 
 

 <div class="container-fluid full-width ">
 
 <br>
 <h5> Messages Viewer 0.8b</h5> 
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
 
async function readmsgfromblockhain(e,n){n+=1,document.getElementById("comment"+n).value="Loading...",zilliqa=new Zilliqa.Zilliqa("https://dev-api.zilliqa.com"),console.log(e),txn=await zilliqa.blockchain.getTransaction(e),msg=txn.receipt.event_logs[0].params[0].value,numofrow=msg.split(/\r\n|\r|\n/).length,numofrow<5&&(numofrow=5),document.getElementById("comment"+n).rows=numofrow,document.getElementById("comment"+n).value=msg,console.log(msg),console.log(txn.senderAddress.toLowerCase()),senderAddr=Zilliqa.toBech32Address(txn.senderAddress.toLowerCase()),console.log(txn.toAddr.toLowerCase()),contractAddr=Zilliqa.toBech32Address(txn.toAddr.toLowerCase()),blocknum=txn.receipt.epoch_num,newtab=' target="_blank" rel="noopener noreferrer"',url1="readmessage.php?txid="+e,myzilliqawalletlink='<a href="'+url1+'"'+newtab+">"+e+"</a>",document.getElementById("txid"+n).innerHTML="Message #"+n+" txid: "+myzilliqawalletlink}window.onload=readallmessage;

 
 
function readallmessage()
{
	
	 for (i=1;i<totaltxid+1;i++)
	 		document.getElementById("comment"+i).style.fontSize = "10px";		
	txid=[];
 
    <?php for ($i=0;$i<$totaltxid; $i++) echo "txid[".$i."]=".'"'.$txid[$i].'"; ';	?>
 
	
	 for (i=0; i<totaltxid; i++)
	 	readmsgfromblockhain(txid[i],i); 
	
	for (i=1;i<totaltxid+1;i++)
			document.getElementById("comment"+i).style.fontSize = "4px";	
		 
}
function viewpage(){pagenum=document.getElementById("page").value,window.location.replace("viewmessage.php?page="+pagenum)}$("#comment").on("change keyup paste",function(){}),$("#size").on("change keyup paste",function(){if(size=document.getElementById("size").value,console.log(size),"Font: 2px"==size)for(i=1;i<totaltxid+1;i++)document.getElementById("comment"+i).style.fontSize="2px";if("Font: 4px"==size)for(i=1;i<totaltxid+1;i++)document.getElementById("comment"+i).style.fontSize="4px";if("Font: 6px"==size)for(i=1;i<totaltxid+1;i++)document.getElementById("comment"+i).style.fontSize="6px";if("Font: 8px"==size)for(i=1;i<totaltxid+1;i++)document.getElementById("comment"+i).style.fontSize="8px";if("Font: 10px"==size)for(i=1;i<totaltxid+1;i++)document.getElementById("comment"+i).style.fontSize="10px";if("Font: 12px"==size)for(i=1;i<totaltxid+1;i++)document.getElementById("comment"+i).style.fontSize="12px";if("Font: 14px"==size)for(i=1;i<totaltxid+1;i++)document.getElementById("comment"+i).style.fontSize="14px";if("Font: 16px"==size)for(i=1;i<totaltxid+1;i++)document.getElementById("comment"+i).style.fontSize="16px"});
 
 
 
</script>
</html>