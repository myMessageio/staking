<?php
 

$txid=$_GET["txid"] ;

if(isset($_GET['txid'])) {
   $txid=$_GET["txid"] ;
}
else
	$txid="0";



?>
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



 
 
<script src="js/jquery-3.3.1.min.js"></script>   
<script src="js/bootstrap.min.js"></script>  
<script src="js/all.min.js"></script> 
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/styles.css" rel="stylesheet" />  
  
        
  

 
 
 
 
 
 
 
 
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
                 
 			
				
				
				<a href="homemessage.html" class="nav-item nav-link ">Home</a>
				<a href="sendmessage.html" class="nav-item nav-link">Send Message</a>
				<a href="readmessage.php" class="nav-item nav-link active">Read Message</a>
				<a href="viewmessage.php" class="nav-item nav-link ">Messages Viewer</a>				
				<a href="searchmessage.html" class="nav-item nav-link">Search Message</a> 			
				
            </div>
 
        </div>
    </nav>
</div>
 
 
	
	
 
 
 

 <div class="container-fluid full-width ">
 <br>
 <br>
 <h5> Message Reader </h5>  
  <p> Read messages stored at blockchain, given a TxID</p>
  
  
  
  <div class="row"> 
        <div class="col-4">
		  <div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">TXID </span>
		  </div>
		  <input type="text" id="searchtxid" class="form-control"  aria-describedby="basic-addon1">
		  </div>
		</div>
        <div class="col-2">	
			<button type="button" class="btn btn-primary   btn-block" id="sendtxid" onclick="sendtxid()"    >SEND</button> 		
								
		</div>		
		
  </div>
   
 <hr>
   
 <div class="row">
 
 
		  <div class="col-4">
		  
		  
		        
					<hr><hr>
		<h5 style="word-break: break-word;">	<small>	  		  
		 <p id="txid">  </p>
		 <p id="senderaddress">  </p>		 
		 <p id="contractaddress">  </p>		 
		 <p id="blocknum">  </p>				 
		  </h5></small> 
		  
		<h5>	<small>	  		  
		 
		  </h5></small><hr>		  
		  
		  
		  		  
		   
			 
			 							  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
	 
		  
		  <hr>
		   
	 	
		   
    

			   
		   
		   
		   
		   
		   
		   
				 
		  
	 
		  </div>
  
 
  
  
  
  
  
  
  
  
		  <div class="col-6"> 

					 						
					
					 			
					<h6>If message is encrypted, you can decrypt by entering secret key below.</h6>					

					
					 	 

	 
   
  
			 
				 <div class="form-group" class="form-inline">
					<span style="white-space: nowrap">
					  <label for="size" id="estimatedgas"> </label>
					  <select class="form-control form-control-sm" id="size"    style="text-align:right;">
						<option>Font: 2px</option>
						<option>Font: 4px</option>
						<option>Font: 6px</option>
						<option>Font: 8px</option>
						<option>Font: 10px</option>
						<option>Font: 12px</option>
						<option>Font: 14px</option>
						<option>Font: 16px</option>						
						
						
						
					  </select>
					</span>
				  </div>
          
  
  
 
 
  
 
				<textarea class="form-control" rows="11" id="comment"></textarea>
 
					 
					
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="" id="encryptmessage">
					  
					  <label class="form-check-label" for="flexCheckDefault">
						Decrypt Message
					  </label>
					</div>
 				
					
					
					
					
					<div id="encryptsection"  ><br>
					<h6><small ><p id="secretkeymsg"  >Enter Your Sceret Key</p></small></h6>			 
					<input type="text"  class="form-control" id="secretkey" value=""   >
					</div>
			         <br>
					 
				
				
				<h6><small ><p id="replyto"  >Reply Message (optional)</p></small></h6>			
				<textarea class="form-control" rows="11" id="replymessage"></textarea>					 
					 <br>
					
					
					 <button type="button" class="btn btn-primary btn-sm  btn-block" id="sendbutton" onclick="decryptmessage()"    >Decrypt Message</button> 
					 <br>
					 <button type="button" class="btn btn-primary btn-sm    btn-block" id="downloadattachment" onclick="replymessage()"    >Reply Message</button> 					 
					 <br>
					 <button type="button" class="btn btn-primary btn-sm    btn-block" id="downloadattachment" onclick="downloadattachment()"    >Download</button> 
					 
					 <hr> 
		  </div>
 
  </div> 

	<p>
	
     
	<br> <hr>
				  


  	  
	
	
	
	
	
	  
















 
 

 



 
 

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
 

async function decryptmessage()
{
	 content=document.getElementById("comment").value ;
	 console.log("showing content=", content);
	 endofheader="@@-----@@";
	 secretkey=document.getElementById("secretkey").value;
	 var decrypted="";
	 // attempt to find
	 if (content.search(endofheader)==-1)
	 {
				//console.log("not found header");
				 // no header
				 // attempt to decrypt nowrap
				//decrypted = CryptoJS.AES.decrypt(content, secretkey);
				//document.getElementById("comment").value=decrypted;
		 
		 
				encryptedtext = content.replace(/(\r\n|\n|\r)/gm, "");
				bytes = CryptoJS.AES.decrypt(encryptedtext, secretkey);
				decrypted = bytes.toString(CryptoJS.enc.Utf8);		 
				document.getElementById("comment").value=headerstr+decrypted;		 
		 
		 
		 
		 
	 }
	 else // found header, need to seperate header from encrypted text
	 {
				//console.log("found header");

				//endofheader="\r\n@@-----@@\r\n";

				num= content.search(endofheader);
				// document.getElementById("demo1").innerHTML = str;
				// document.getElementById("demo").innerHTML = num;
				//var res = str.substr(1, 4);
				removelen=num+endofheader.length;

				k=content.length-removelen;
				remainlen=content.length-k;


				headerstr=content.substr(0,remainlen);
				//console.log("header...");
				//console.log(headerstr);


				encryptedtext=content.substring(removelen);
				//console.log(encryptedtext);
				encryptedtext = encryptedtext.replace(/(\r\n|\n|\r)/gm, "");
				bytes = CryptoJS.AES.decrypt(encryptedtext, secretkey);
				decrypted = bytes.toString(CryptoJS.enc.Utf8);		 
				document.getElementById("comment").value=headerstr+"\r\n"+decrypted;		
				//console.log(decrypted );
			 
			     
		 
		 
	 }
	 
	 /// detect if there is any file attached
	
	 
	 
	  
} 


function dataURLtoFile(dataurl, filename) {
 
        var arr = dataurl.split(','),
            mime = arr[0].match(/:(.*?);/)[1],
            bstr = atob(arr[1]), 
            n = bstr.length, 
            u8arr = new Uint8Array(n);
            
        while(n--){
            u8arr[n] = bstr.charCodeAt(n);
        }
        
        return new File([u8arr], filename, {type:mime});
    }
    
    //Usage example:

	

function downloadattachment()
{

	 content=document.getElementById("comment").value ;
	 console.log("showing content=", content);
	 endofheader= "@@-@@@-@@";;
	 secretkey=document.getElementById("secretkey").value;
	 var decrypted="";
	 // attempt to find
	 if (content.search(endofheader)==-1)
	 {
				 console.log("not attachment found!");
				 // no header
				 // attempt to decrypt nowrap
				//decrypted = CryptoJS.AES.decrypt(content, secretkey);
				//document.getElementById("comment").value=decrypted;
		 
		 
				encryptedtext = content.replace(/(\r\n|\n|\r)/gm, "");
				bytes = CryptoJS.AES.decrypt(encryptedtext, secretkey);
				decrypted = bytes.toString(CryptoJS.enc.Utf8);		 
				document.getElementById("comment").value=headerstr+decrypted;		 
		 
		 
		 
		 
	 }
	 else // found header, need to seperate header from encrypted text
	 {
				//console.log("found header");

				//endofheader="\r\n@@-----@@\r\n";

				num= content.search(endofheader);
				// document.getElementById("demo1").innerHTML = str;
				// document.getElementById("demo").innerHTML = num;
				//var res = str.substr(1, 4);
				removelen=num+endofheader.length;

				k=content.length-removelen;
				remainlen=content.length-k;


				headerstr=content.substr(0,remainlen);
				//console.log("header...");
				//console.log(headerstr);


				encryptedtext=content.substring(removelen);
				//console.log(encryptedtext);
				encryptedtext = encryptedtext.replace(/(\r\n|\n|\r)/gm, "");
				
				console.log("attachment:",encryptedtext);
				
				/// now download the attachment

				 
 
				//var file = dataURLtoFile(encryptedtext,'hello22.txt');
				//console.log(file);
				// Download it
				//data:image/png;base64
				
				///find filename   hello.txtdata:image/png...
				/// note it depends on finding data: 
				/// the filename must not have :
				
				endnum=encryptedtext.search("data:");
				var filename=encryptedtext.substr(0,endnum);  // extract filename
				encryptedtext= encryptedtext. substring(endnum); // removed the front filename
				
				//var filename ='abc.txt';
				var link = document.createElement('a');
				link.style.display = 'none';
				link.setAttribute('target', '_blank');
				link.setAttribute('href', encryptedtext);
				link.setAttribute('download', filename);
				document.body.appendChild(link);
				link.click();
				document.body.removeChild(link);
					 	
	 
			 
			     
		 
		 
	 }
	 
	 /// detect if there is any file attached	
	
	
}

async function readmsgfromblockhain(txid)
{
	 document.getElementById("comment").value="Loading...";
     zilliqa = new Zilliqa.Zilliqa('https://dev-api.zilliqa.com');
	 //zilliqa =await new Zilliqa.Zilliqa("https://api.zilliqa.com/");
	 
     //txid="d38604292084ae44cd043125f79a9d02ddf781bef90499d70cfbadc60082353a";
	 console.log(txid);
	 txn = await zilliqa.blockchain.getTransaction(  txid	);
	 msg=txn.receipt.event_logs[0].params[0].value;
	 
	 numofrow=msg.split(/\r\n|\r|\n/).length;
	 
	 if (numofrow<5) numofrow=5;
	  
	 document.getElementById("comment").rows = numofrow;
	 
	 
	 document.getElementById("comment").value=msg;
	 console.log(msg);	
	 console.log(txn.senderAddress.toLowerCase());
	 senderAddr=Zilliqa.toBech32Address(txn.senderAddress.toLowerCase());	
	 console.log(txn.toAddr.toLowerCase());
	 contractAddr=Zilliqa.toBech32Address(txn.toAddr.toLowerCase());	 
	 blocknum=txn.receipt.epoch_num;
	 
	 document.getElementById("blocknum").innerHTML="Blocknum: "+blocknum;
	 document.getElementById("txid").innerHTML="TXid: 0x"+txid;
	 document.getElementById("senderaddress").innerHTML="Sender Address: "+senderAddr;

//zil1rh4363klwrw6cnmjkguetsh2yx057dqmrr8ufd   senderAddr in zil	 
	 //document.getElementById("contractaddress").innerHTML="Contract Address: "+contractAddr; 
	 //zil1644y20t8ksj5zm73krgasrw4dnhew020ld0q4y   contract address
}
 
txid="<?php echo $txid?>";
if (txid!="0")
{
	document.getElementById("txid").value="<?php echo $txid?>";
	readmsgfromblockhain(txid);
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
	   document.getElementById("comment").style.fontSize = "2px";
	    document.getElementById("comment").rows = "150";
		
		
	}
	if (size=="Font: 4px")
	{
		document.getElementById("comment").style.fontSize = "4px";
	    document.getElementById("comment").rows = "75";		
	}
	if (size=="Font: 6px")
	{
		document.getElementById("comment").style.fontSize = "6px";
	     document.getElementById("comment").rows = "50";			
	}
	if (size=="Font: 8px")
	{
		document.getElementById("comment").style.fontSize = "8px";
	    document.getElementById("comment").rows = "38";			
		
	}
	if (size=="Font: 10px")
	{
		document.getElementById("comment").style.fontSize = "10px";
	  //  document.getElementById("comment").rows = "32";			
		
	}

	if (size=="Font: 12px")
	{
		document.getElementById("comment").style.fontSize = "12px";
	  //  document.getElementById("comment").rows = "28";			
		
	}

	if (size=="Font: 14px")
	{
		document.getElementById("comment").style.fontSize = "14px";
	  //  document.getElementById("comment").rows = "26";			
		
	}	
	
	if (size=="Font: 16px")
	{
		document.getElementById("comment").style.fontSize = "16px";
	  //  document.getElementById("comment").rows = "24";			
		
	}		
	
	//
	
})


 
$("#encryptmessage").on("change keyup paste", function(){
    
	 //console.log("Press");
	 encryptedchecked=document.getElementById("encryptmessage").checked;
	 if (encryptedchecked)
	 {
		 
	  //console.log("checked");
	   document.getElementById("encryptsection").style.display = "block";
	  // document.getElementById("secretkey").style.display = "visible";	 
	 }
	 else
	{
	   //console.log("unchecked");
	   document.getElementById("encryptsection").style.display = "none";
	  // document.getElementById("secretkey").style.display = "hidden";		
	
	}
	
	
	
})

 
function sendtxid()
{
	
	//$txid=$_GET["txid"] ;
	searchtxid=document.getElementById("searchtxid").value;
	window.location.replace("https://myzilliqawallet.com/pm/readmessage.php?txid="+searchtxid);


}	
 
 	
  
 
//testsend();
</script>
</html>