<?php
 

$txid=$_GET["txid"] ;

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
<script src="js/md5.js"></script>
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
 
.tab { margin-left: 40px; }

label {
   cursor: pointer;
   /* Style as you please, it will become the visible UI component. */
}

/* to make upload file hidden */
#upload-photo {
   opacity: 0;
   position: absolute;
   z-index: -1;
} 


h3 {
  font-size: 1.5em;
}

h4 {
  font-size: 0.55em;
}

p {
  font-size: 0.975em;
   
}







</style>
 
</head>
<body>
<div class="bs-1">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a href="home.html" class="navbar-brand">
            <img src="images/pmsmall.png" height="28" alt="myZilliqaWallet">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">  				
				<a href="homemessage.html" class="nav-item nav-link">Home</a>
				<a href="sendmessage.html" class="nav-item nav-link">Send Message</a>
				<a href="readmessage.php" class="nav-item nav-link  active">Read Message</a>
				<a href="viewmessage.php" class="nav-item nav-link ">Messages Viewer</a>				
				<a href="searchmessage.html" class="nav-item nav-link">Search Message</a> 
            </div> 
        </div>

            <div class="navbar-nav navbar-right">  
<i class="fas fa-cog"></i>
		
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
 
 
 
  
 
   
		  <div class="col-8"> 

					 						
					
					 			
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
 				
					
					
					
				 <div class="row  align-items-end">	
					<div class="col-sm-6"> 
						<div id="encryptsection"  ><br>
						<h6><small ><p id="secretkeymsg"  >Enter Your Sceret Key</p></small></h6>			 
						<input type="text"  class="form-control" id="secretkey" value=""   >
						</div>
					</div>
					
			        <div class="col-sm-3">  
						 
						<h6><small ><p id="secretkeymsg"  > .</p></small></h6>							
					
									<button type="button" class="btn btn-primary btn-sm  btn-block" id="sendbutton" onclick="decryptmessage()"    >
															
						Decrypt Message</button> 
					</div> 	
					
					
					<div class="col-sm-2"> 				 
					                <button type="button" class="btn btn-primary btn-sm  btn-block" id="downloadattachment" onclick="downloadattachment()"    >Download</button> 
					</div>
					
					
					
					

			        <div class="col-sm-1">  
						 
						<h6><small ><p id="secretkeymsg"  > .</p></small></h6>							
					
									<a href="#demo" button type="button" class="btn btn-primary btn-sm  btn-block" id="sendbutton"  data-toggle="collapse"    ><i class="fas fa-comment-dots"></i></a> 
					</div> 	 
					
				</div>
				
			<div id="demo" class="collapse">	
				<br>
				
				<h6><small ><p id="replyto"  >Reply Message To <?php echo "0x".$txid?>(optional)</p></small></h6>			
				<textarea class="form-control" rows="11" id="replymessage"></textarea>					 
					 <br>
					 
					 
						<div class="row">
								<div class="col-sm-7"> 
									<div>
									   <label for="file">Attach file (optional)</label>
									   <input type="file" id="file" name="file" >
									</div>
								</div>
							 
								<div class="col-sm-3"> 
							        <button type="button" class="btn btn-primary btn-sm  btn-block" id="ewp" onclick="replymessage()"    >Reply Message</button> 	
								</div>

								
								<div class="col-sm-1"> 				 
					                <button type="button" class="btn btn-primary btn-sm  btn-block" id="downloadattachment" onclick="testdisplay()"    >T</button> 
								</div>
						</div>
				 
					 
					     <hr><small>
						<p id="txid"> </p>		
						<p id="txconfirm">  </p>							
						<p id="viewmssage"></p>						 
						<p id="viewlink1">  </a> </p>								
						<p id="viewlink2">  </a></p>
						<p id="insert">  </a></p>
						</small>
						<hr>
						<p id="allreply">
						
						
						
						</p>
						
			</div>			
						
						
						
					 
					 
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
 
 
 
 
 
//message.message;   //L1
//message.replyby[0].message;    // L2
//message.replyby[1].message;    // L2
//message.replyby[0].reply[0].message;   //L3
//message.replyby[0].replyby[0].replyby[0].message;   //L4
var replyicon='<i class="fas fa-comment-dots"></i>';

var fileicon='<i class="fas fa-file"></i>';
var sendicon='<i class="fas fa-share"></i>';

//dividstart='id="demo'+num+'" class="collapse">';
//textarea='<textarea class="form-control" rows="11" id="replymessage"></textarea>';
//dividend='</div>';

//dividstart='id="demo'+num+'" class="collapse">';
//replyinner=dividstart+textarea+dividend;


//<div id="demo" class="collapse">				 	
//				<textarea class="form-control" rows="11" id="replymessage"></textarea>					 
					 
//</div>

var testmsg='{ "message":"f5fccd972202a714e71307bfd7b801f27551db4c5d17c2f5e412346aba59a8cd this is also L3", "senderAddress":"zil1f3u7g842ftlnm5lqsa753djn73vkf4hr862yel", "txid":"f32633b369f8127bfe85fd0363f5d853760b03d01236fc5bfa87ac2075db0ee0", "timestamp":"1613290867", "replyby": [ { "message":"f32633b369f8127bfe85fd0363f5d853760b03d01236fc5bfa87ac2075db0ee0 this is also L4 not encrypted", "senderAddress":"zil1f3u7g842ftlnm5lqsa753djn73vkf4hr862yel", "txid":"30677c8130beb80ac4f889f4d59c4c396533413f9d2466d40f0f2b2fdf926c70", "timestamp":"1613291228","replyby": [ ]]} }';

 
/*
#@1threadtitle@#checksum

#@2txid@#checksum


how to calculate checksum
example

#@2abc123@#

hashchecksum=hex_md5("#@2abc123@#")

hashchecksum="59ac48da232ebea73fe99ee9b09a0587"
checksum=  hashchecksum.substr(hashchecksum.length - 6); // last 6 characters
cgecksum="9a0587"

#@2abc123@#9a0587


md5($hashchecksum)   //php

*/ 
 
 
 
function sendreplymessagebytxid(i, txid)
{
	console.log("sendreplymessagebytxid",i,"txid=",gtxid[i]);
	
}
var gtxid=[];




function formatmessage(msg, senderAddress, txid, i, indentation)
{
			header='<p style="margin-left:  ';
		
			headerstr=header+indentation+'px">';
		    tailstr='</p>';							   
		    newline="<br>";				
			
 				
			dividstart='<div padding-left: 50px; id="demo'+i+'" class="collapse">';
			textarea='<textarea placeholder="Write your reply and then click the send icon, you can also attach a file if you want. " class="form-control" rows="11" id="replymessage"></textarea>';
			
			uploadfile='<label for="upload-photo">'+fileicon+'</label><input type="file" name="photo" id="upload-photo" />';
			
			dividend='</div>';

			
			replyinner=dividstart+textarea+uploadfile+" "+sendicon+dividend;	
			
			gtxid[i]=txid;
			
			// add 0x to txid
			txid="0x"+txid;
			
			
 			sendfunctionstart='<div onclick="sendreplymessagebytxid('+i+  ')">';
				 
			sendfunctionend='</div>';

 

			
			replyinner=dividstart+textarea+uploadfile+" "+sendfunctionstart+sendicon+sendfunctionend+dividend;			
			
			replyhrefstart='<a href="#demo'+i+'"  data-toggle="collapse"    >';
			
			replyhrefend='</i></a>';
			
			pstart='<p style="background-color:#FCFCFC;   margin-left:'+indentation+'px">'; 
			pend='</p>';
			msg=pstart+msg+pend;	
			

	       	 h4start='<h4 style="text-align:left;float:left; margin-left:'+indentation+'px">'; 
			//h4start='<h4  ">'; 
			h4end='</h4>';
			
			h4startgrey='<h4 style="color:#828282; text-align:right;float:right;"">';
		
			 
			
			const unixTimestamp = 1575909015;
			const milliseconds = 1575909015 * 1000;; // 1575909015000

			const dateObject = new Date(milliseconds)

			datetime = dateObject.toLocaleString() //2019-12-9 10:30:15			
			fromsenderstr=h4start+senderAddress+" "+datetime+h4end+h4startgrey+" "+txid+h4end;
			
			msgstr= fromsenderstr+newline+msg+ headerstr+ replyhrefstart+ 
			replyicon+ replyhrefend+newline+replyinner+newline+tailstr ;				
			

			//msgstr=headerstr+fromsenderstr+newline+msg+tailstr+headerstr+replyhrefstart+ 
			//replyicon+ replyhrefend+newline+replyinner+newline+tailstr;	

			return msgstr;
	
}



var finalmsgstr="";

function recursivecall(message, indentation)
{
		level1rows=message.replyby.length;
		console.log("count=", level1rows);
		//for (var i=0; i<level1rows; i++)
		for(var i = 0, count = message.replyby.length; i < count; i++)   // need cache using count=... if not it wont work
		{	
	
			msg=message.replyby[i].message;			
			msg = Base64.decode(msg);			
			senderAddress=message.replyby[i].senderAddress;
			txid=message.replyby[i].txid;

			msgstr=formatmessage(msg, senderAddress, txid, i, indentation);
			console.log(msgstr);
			finalmsgstr+=msgstr;
			if (message.replyby[i].replyby.length>0)
				recursivecall(message.replyby[i], indentation+20);
		}
}

function displayReplyMessage(message)
{
	finalmsgstr="";
	recursivecall(message,20);
	document.getElementById("allreply").innerHTML=finalmsgstr;
	
}


function displayReplyMessageX(message)
{
		var finalmsgstr="";
 
		level1rows=message.replyby.length;
		for (i=0; i<level1rows; i++)
		{
		    indentation=20;
			 
			msg=message.replyby[i].message;			
			msg = Base64.decode(msg);			
			senderAddress=message.replyby[i].senderAddress;
			txid=message.replyby[i].txid;

			msgstr=formatmessage(msg, senderAddress, txid, i, indentation);
			finalmsgstr+=msgstr;
			console.log(msgstr);
			//console.log(finalmsgstr);
			
			msg3=message.replyby[i];
			
			l2row=msg3.replyby.length;
			
			level2rows=message.replyby[i].replyby.length;
			for (j=0; j<level2rows; j++)
			{
					indentation=40;
					 
					msg=message.replyby[i].replyby[j].message;
					msg = Base64.decode(msg);	
					senderAddress=message.replyby[i].replyby[j].senderAddress;
					txid=message.replyby[i].replyby[j].txid;					
					msgstr=formatmessage(msg, senderAddress, txid, i, indentation);							
					finalmsgstr+=msgstr;				
					level3rows=message.replyby[i].replyby[j].replyby.length; 
					console.log(msgstr);
				//	console.log(finalmsgstr);
			
					for (k=0; k<level3rows; k++)
					{
						indentation=60;
						 
						msg=message.replyby[i].replyby[j].replyby[k].message;
						senderAddress=message.replyby[i].replyby[j].replyby[k].senderAddress;
						txid=message.replyby[i].replyby[j].replyby[k].txid;						
						msg = Base64.decode(msg);						
						msgstr=formatmessage(msg, senderAddress, txid, i, indentation);
						finalmsgstr+=msgstr;							
	
						console.log(msgstr);
					//	console.log(finalmsgstr);
	
					}  
			}  
		}
		
		 document.getElementById("allreply").innerHTML=finalmsgstr;
 
}
 
  
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

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
			 
			     
		 findreplymessagebytxid(txid);
		 
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
	 
	 //document.getElementById("blocknum").innerHTML="Blocknum: "+blocknum;
	// document.getElementById("txid").innerHTML="TXid: 0x"+txid;
	 //document.getElementById("senderaddress").innerHTML="Sender Address: "+senderAddr;

//zil1rh4363klwrw6cnmjkguetsh2yx057dqmrr8ufd   senderAddr in zil	 
	 //document.getElementById("contractaddress").innerHTML="Contract Address: "+contractAddr; 
	 //zil1644y20t8ksj5zm73krgasrw4dnhew020ld0q4y   contract address
	 console.log("before findreplymessagebytxid=", txid);
	 findreplymessagebytxid(txid);
	 console.log("after findreplymessagebytxid=", txid);
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
 
 	

 
zilliqa = new Zilliqa.Zilliqa('https://dev-api.zilliqa.com');
// These are set by the core protocol, and may vary per-chain.
// You can manually pack the bytes according to chain id and msg version.
// For more information: https://apidocs.zilliqa.com/?shell#getnetworkid

const chainId = 333; // chainId of the developer testnet
const msgVersion = 1; // current msgVersion
//const VERSION = bytes.pack(chainId, msgVersion);
const VERSION = Zilliqa.bytes.pack(chainId, msgVersion);	
// Populate the wallet with an account
//const privateKey =  '757a20e197d56f76816c45d7a1e2d1f841b583ed014802c597b729eb5d9f6692';   //the most messages posted with this private key
  
  
const privateKey =    "1b3285815c5ff7472269d1cd97027792e5ed9abafbebaea17535b10eefe8903c";

zilliqa.wallet.addByPrivateKey(privateKey);

const address = Zilliqa.getAddressFromPrivateKey(privateKey);
const zilsenderaddress=Zilliqa.toBech32Address(address);
//document.getElementById("ziladdress").innerHTML=zilsenderaddress;
//  document.getElementById("encryptsection").style.display = "none"; 
var callTx ;

var animatespinner='<i class="fas fa-spinner fa-spin fa-2x"></i>';
var gfilename;

getlatestbalance();


async function sendtoBlockchain(msgtosend,noncetouse) {
  try {
    // Get Balance
   //////const balance = await zilliqa.blockchain.getBalance(address);
    // Get Minimum Gas Price from blockchain
    //////const minGasPrice = await zilliqa.blockchain.getMinimumGasPrice();
 
    // Account balance (See note 1)
    //console.log(`Your account balance is:`);
    //console.log(balance.result);
    //console.log(`Current Minimum Gas Price: ${minGasPrice.result}`);
   // const myGasPrice = units.toQa('1000', units.Units.Li); // Gas Price that will be used by all transactions
	
	const myGasPrice = Zilliqa.units.toQa('3000', Zilliqa.units.Units.Li);
    console.log(`My Gas Price ${myGasPrice.toString()}`);
    //////const isGasSufficient = myGasPrice.gte(new Zilliqa.BN(minGasPrice.result));// Checks if your gas price is less than the minimum gas price
    //console.log(`Is the gas price sufficient? ${isGasSufficient}`);

    const deployedContract = zilliqa.contracts.at(
      'zil1644y20t8ksj5zm73krgasrw4dnhew020ld0q4y',
    );

    // Create a new timebased message and call setHello
    // Also notice here we have a default function parameter named toDs as mentioned above.
    // For calling a smart contract, any transaction can be processed in the DS but not every transaction can be processed in the shards.
    // For those transactions are involved in chain call, the value of toDs should always be true.
    // If a transaction of contract invocation is sent to a shard and if the shard is not allowed to process it, then the transaction will be dropped.
   // const newMsg = 'Hello, the time is ' + Date.now();
	
	    const newMsg = msgtosend;
    //console.log('Calling setHello transition with msg: ' + newMsg);
    callTx = await deployedContract.callWithoutConfirm(
      'setMsg',
      [
        {
          vname: 'msg',
          type: 'String',
          value: newMsg,
        },
      ],
      {
        // amount, gasPrice and gasLimit must be explicitly provided
        version: VERSION,
        amount: new Zilliqa.BN(0),
        gasPrice: myGasPrice,
        gasLimit: Zilliqa.Long.fromNumber(80000),  // max at 80000, more than 80000 it will return error
		nonce: noncetouse,
		
      },
      false,
    );

    console.log(callTx.bytes);
    // check the pending status
    const pendingStatus = await zilliqa.blockchain.getPendingTxn(callTx.id);
    console.log(`Pending status is: `);
    console.log(pendingStatus);
	document.getElementById("txid").innerHTML="TxID="+callTx.id;

	 
	
    // process confirm
    console.log(`The transaction id is:`, callTx.id);
 
	document.getElementById("txconfirm").innerHTML=animatespinner;



	
	var waitforconfirm=true;
    if (waitforconfirm)
	{
			console.log(`Waiting transaction be confirmed`);
			const confirmedTxn = await callTx.confirm(callTx.id);
			document.getElementById("txconfirm").innerHTML="Congratulations! Your message is permanently stored in Zilliqa Blochchain!";
			
			
			 
		   
			document.getElementById("viewmssage").innerHTML="To view your message";
			
		    newtab=' target="_blank" rel="noopener noreferrer"';			
			//http://127.0.0.1:8080/myzilliqawallet/readmsg.php?txid=d38604292084ae44cd043125f79a9d02ddf781bef90499d70cfbadc60082353a
			
			url1="https://myzilliqawallet.com/pm/readmessage.php?txid="+callTx.id;
			myzilliqawalletlink='1) <a href="'+url1+'"'+newtab+'>myZilliqaWallet Explorer</a>';
			
			
			document.getElementById("viewlink1").innerHTML=myzilliqawalletlink;
			
			//https://viewblock.io/zilliqa/tx/0x548f22bba5f1ddcb994d3840e1266707533c6bbd80534a1e0be923841001f088?network=testnet
			url2="https://viewblock.io/zilliqa/tx/0x"+callTx.id+"?network=testnet";
		

//<a href="https://www.freecodecamp.org/" target="_blank" rel="noopener noreferrer">freeCodeCamp</a>		
			
			viewblocklink='2) <a href="'+url2+'"'+newtab+'>ViewBlock Explorer</a>';
			document.getElementById("viewlink2").innerHTML=viewblocklink;			

			console.log(`The transaction status is:`);
			console.log(confirmedTxn.receipt);
			
			if (confirmedTxn.receipt.success === true) {
			  console.log(`Contract address is: ${deployedContract.address}`);
			  
			timestampstr=Math.floor(Date.now() / 1000);
			// success? ok great, let's store the message at our server
			 updatemessage(callTx.id, msgtosend, timestampstr) ;
			  
			  
			  
			  return 1;
			}
	}
	  
	 
  } catch (err) {
    console.log(err);
	return 0;
  }
}


function sleep(delay) {
    var start = new Date().getTime();
    while (new Date().getTime() < start + delay);
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
        gfilename=filename;
        return new File([u8arr], filename, {type:mime});
    }
	
	
	
	
async function getlatestbalance()
{

    //document.getElementById("balance").innerHTML= '<i class="fas fa-spinner fa-spin fa-2x"></i>';
	nonce = (await zilliqa.blockchain.getBalance(address)).result.nonce + 1;
	
	
    const balance = await zilliqa.blockchain.getBalance(address);
    nonce = balance.result.nonce + 1; 
     
	
	zilbalance=balance.result.balance/(10**12);
	zilbalance=zilbalance.toFixed(2)
	 
    //document.getElementById("balance").innerHTML="Balance: "+zilbalance+ " ZIL";
     console.log(`Your account balance is:`);
     console.log(balance.result);	
	
}	



async function replymessage()
{   

	
	 
    multilinemsg=document.getElementById("replymessage").value;  
	 

	
	//encryptedstr=encryptedmsg.toString();
	//console.log(encryptedstr);	
	//var decrypted = CryptoJS.AES.decrypt(encryptedstr, key);
	
	
	//console.log(decrypted.toString(CryptoJS.enc.Utf8));
	
	//console.log("Length original=", multilinemsg.length);
	//console.log("Length encrypted=", encryptedstr.length);
	encryptedchecked=document.getElementById("encryptmessage").checked;
	var secretkey="";
	var encryptedmsg;
	var msgtosend="";
	var totalmsg="";
	//if (encryptedchecked)
	secretkey=document.getElementById("secretkey").value;
	if (secretkey.length>0)
	{
		secretkey=document.getElementById("secretkey").value;
		if (secretkey.length<5)
		{
		     alert("Your secretkey length too short!");
			 return;
		}
		console.log("secretkey=",secretkey);
		encryptedmsg = CryptoJS.AES.encrypt(multilinemsg, secretkey);  
		msgtosend=encryptedmsg.toString();
		console.log(encryptedmsg.toString());
		
		
		// Decrypt
 
		bytes  = CryptoJS.AES.decrypt(encryptedmsg.toString(), secretkey);
		originalText = bytes.toString(CryptoJS.enc.Utf8);
		console.log(originalText);
		
		//document.getElementById("comment").value=encryptedmsg;
    }
	else
		msgtosend=multilinemsg;
	
	// if optionalheader has text, need to add a seperator _END_#OF#_HEADER_
	endofheader="\r\n@@-----@@\r\n";
	
	fileheaderheader="\r\n@@-@@@-@@\r\n";
	totalmsg="";
	//header=document.getElementById("optionalheader").value;  
	header="#@#2#"+txid;
	
	if (header.length>0) // need to add header
		totalmsg=header+endofheader+msgtosend;
	else
		totalmsg=msgtosend;
		
		
	// now attach file if user attach a file
	var files = document.getElementById('file').files;
	  if (files.length > 0) {
		//getBase64(files[0]);
		   file=files[0];
		   
		   gfilename=file.name;
		
		   var reader = new FileReader();
		   await reader.readAsDataURL(file);
		   reader.onload =async function () {
		      console.log("got file attached");
			 console.log(reader.result);
			 totalmsg=totalmsg+fileheaderheader+gfilename+reader.result;
			// totalmsg=totalmsg+fileheaderheader+reader.result;
			 
				console.log("totalmsg");
					console.log(totalmsg);
				 
						
					estimatedgasfee=0.75*totalmsg.length/1000.0+0.9989;
						
					var txt;
					confirmmsg="Are you sure you want to your message which is "+totalmsg.length+ " bytes permanently to blockchain for an estimated gas fee of "+estimatedgasfee+" ZIL?";
					  
					  
					if (confirm(confirmmsg)) {
							console.log("Nonce=",nonce);				 
							rtn=await sendtoBlockchain(totalmsg, nonce);
							 
					  } else {
						 
					  }			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
		   };
		   reader.onerror = function (error) {
			 console.log('Error: ', error);
		   };		
		
		
		
		
	  }
	  else // no attachment
	  {
				console.log("totalmsg");
					console.log(totalmsg);
				 
						
					estimatedgasfee=0.75*totalmsg.length/1000.0+0.9989;
						
					var txt;
					confirmmsg="Are you sure you want to your message which is "+totalmsg.length+ " bytes permanently to blockchain for an estimated gas fee of "+estimatedgasfee+" ZIL?";
					  
					  
					if (confirm(confirmmsg)) {
							console.log("Nonce=",nonce);				 
							rtn=await sendtoBlockchain(totalmsg, nonce);
							 
					  } else {
						 
					  }	  
	  
	  
	  
	  }
		
	
		 	
		 

				//sleep(1000); // in ms
	  
 
 
}

$("#comment").on("change keyup paste", function(){
    
	comment=document.getElementById("comment").value; 
	estimatedgasfee=0.75*comment.length/1000.0+0.9989;
	sizeinkbyte=comment.length/1000.0;
	msg="Estimated gas fee="+estimatedgasfee.toFixed(3)+" ZIL &#9 &#9 &#9 "+ sizeinkbyte.toFixed(2)+" kByte";
	document.getElementById("estimatedgas").innerHTML=msg; 
	
	
	
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
	    document.getElementById("comment").rows = "32";			
		
	}

	if (size=="Font: 12px")
	{
		document.getElementById("comment").style.fontSize = "12px";
	    document.getElementById("comment").rows = "28";			
		
	}

	if (size=="Font: 14px")
	{
		document.getElementById("comment").style.fontSize = "14px";
	    document.getElementById("comment").rows = "26";			
		
	}	
	
	if (size=="Font: 16px")
	{
		document.getElementById("comment").style.fontSize = "16px";
	    document.getElementById("comment").rows = "24";			
		
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

 
 




    //google.charts.setOnLoadCallback(drawLineChart);
    function updatemessage(txidstr, messagestr, timestampstr) {
  
  
  
				var param = encodeURIComponent(messagestr); 
				console.log(zilsenderaddress);
				
				var datareceive = $.ajax({
						traditional: true,
					  url: "insert1message.php",
						type: 'POST',					  
					 data: { 'txid': txidstr, 'message' : param, 'timestamp':timestampstr, 'sender':zilsenderaddress },					  
					   async: false
					  }).responseText;
				   
				   console.log(param);
				   console.log(txidstr);
				   console.log(timestampstr);
					
					//document.getElementById("tablechart").innerHTML = jsonData;
					
					document.getElementById("insert").innerHTML=datareceive;
				  
		
				//document.getElementById("wait").innerHTML="";
	 
			   //////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				
            
    } 
 











































async function readmsgfromblockhain2(txid)
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
	  
	// document.getElementById("comment").rows = numofrow;
	 
	 
	// document.getElementById("comment").value=msg;
	 console.log(msg);	
	 console.log(txn.senderAddress.toLowerCase());
	 senderAddr=Zilliqa.toBech32Address(txn.senderAddress.toLowerCase());	
	 console.log(txn.toAddr.toLowerCase());
	 contractAddr=Zilliqa.toBech32Address(txn.toAddr.toLowerCase());	 
	 blocknum=txn.receipt.epoch_num;
	 
	// document.getElementById("blocknum").innerHTML="Blocknum: "+blocknum;
	// document.getElementById("txid").innerHTML="TXid: 0x"+txid;
	// document.getElementById("senderaddress").innerHTML="Sender Address: "+senderAddr;

//zil1rh4363klwrw6cnmjkguetsh2yx057dqmrr8ufd   senderAddr in zil	 
	 //document.getElementById("contractaddress").innerHTML="Contract Address: "+contractAddr; 
	 //zil1644y20t8ksj5zm73krgasrw4dnhew020ld0q4y   contract address
	 
}

var data;

var glongmessage="";



var gdata;

 function findreplymessagebytxid(txid) {
		urlstr="getsearchmessagebytxid5.php?txid="+txid;
		console.log(urlstr);		   
        $.ajax({
            url: urlstr,  //url: "https://myzilliqawallet/getzilstat.php", not working, weird, when supply full url, it doesnt work!
           dataType:"json",
            type: "GET",
			async: false,
            contentType: "application/json; charset=utf-8",
            success: function (data) {
				//rtn=JSON.parse(data);
				console.log(data);
				 displayReplyMessage(data);
				 gdata=data;
				 
				
				
				//rtn=JSON.parse(testmsg);
				//displayReplyMessage( rtn);
				
				 
				 
				  
			},
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(textStatus);
				console.log(errorThrown);
            }
        });
    }
			



 
			

// give me a message. i decrypt and return the content

 function returndecryptmessage(messagetodecrypt)
{
	 content=messagetodecrypt;
	 //console.log("showing content=", content);
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
				//document.getElementById("comment").value= decrypted;		 
				//return (decrypted);
				return "abc";
		 
		 
		 
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
				//decrypted =headerstr+"<br>"+decrypted;		
				//console.log(decrypted );
				return (decrypted);
			     
		 
		 
	 }
	 
	 /// detect if there is any file attached
	
	 
	 
	  
} 

 
   
   function testshowreplymessages()
   {
	  
	   //replymessage=document.getElementById("allreply").innerHTML ;
	   test1='<p style="margin-left: 40px">This text is indented.</p>';
	   
	   test2='<p style="margin-left: 60px">This text is indented.</p>';	   
	   
	   replymessage=test1+test2;
	   
	   document.getElementById("allreply").innerHTML=replymessage;
	   
	   
	   
	   
	   
	   
	   
   }
   
   
   
   
   var Base64 = {

    // private property
    _keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

    // public method for encoding
    encode : function (input) {
      var output = "";
      var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
      var i = 0;

      input = Base64._utf8_encode(input);

      while (i < input.length) {

        chr1 = input.charCodeAt(i++);
        chr2 = input.charCodeAt(i++);
        chr3 = input.charCodeAt(i++);

        enc1 = chr1 >> 2;
        enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
        enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
        enc4 = chr3 & 63;

        if (isNaN(chr2)) {
          enc3 = enc4 = 64;
        } else if (isNaN(chr3)) {
          enc4 = 64;
        }

        output = output +
        this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
        this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

      }

      return output;
    },

    // public method for decoding
    decode : function (input) {
      var output = "";
      var chr1, chr2, chr3;
      var enc1, enc2, enc3, enc4;
      var i = 0;

      input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

      while (i < input.length) {

        enc1 = this._keyStr.indexOf(input.charAt(i++));
        enc2 = this._keyStr.indexOf(input.charAt(i++));
        enc3 = this._keyStr.indexOf(input.charAt(i++));
        enc4 = this._keyStr.indexOf(input.charAt(i++));

        chr1 = (enc1 << 2) | (enc2 >> 4);
        chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
        chr3 = ((enc3 & 3) << 6) | enc4;

        output = output + String.fromCharCode(chr1);

        if (enc3 != 64) {
          output = output + String.fromCharCode(chr2);
        }
        if (enc4 != 64) {
          output = output + String.fromCharCode(chr3);
        }

      }

      output = Base64._utf8_decode(output);

      return output;

    },

    // private method for UTF-8 encoding
    _utf8_encode : function (string) {
      string = string.replace(/\r\n/g,"\n");
      var utftext = "";

      for (var n = 0; n < string.length; n++) {

        var c = string.charCodeAt(n);

        if (c < 128) {
          utftext += String.fromCharCode(c);
        }
        else if((c > 127) && (c < 2048)) {
          utftext += String.fromCharCode((c >> 6) | 192);
          utftext += String.fromCharCode((c & 63) | 128);
        }
        else {
          utftext += String.fromCharCode((c >> 12) | 224);
          utftext += String.fromCharCode(((c >> 6) & 63) | 128);
          utftext += String.fromCharCode((c & 63) | 128);
        }

      }

      return utftext;
    },

    // private method for UTF-8 decoding
    _utf8_decode : function (utftext) {
      var string = "";
      var i = 0;
      var c = c1 = c2 = 0;

      while ( i < utftext.length ) {

        c = utftext.charCodeAt(i);

        if (c < 128) {
          string += String.fromCharCode(c);
          i++;
        }
        else if((c > 191) && (c < 224)) {
          c2 = utftext.charCodeAt(i+1);
          string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
          i += 2;
        }
        else {
          c2 = utftext.charCodeAt(i+1);
          c3 = utftext.charCodeAt(i+2);
          string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
          i += 3;
        }

      }

      return string;
    }

  }
   
 

function displayReplyMessageOri(message)
{
		var finalmsgstr="";
 
		level1rows=message.replyby.length;
		for (i=0; i<level1rows; i++)
		{
		    indentation=20;
			 
			msg=message.replyby[i].message;			
			msg = Base64.decode(msg);			
			senderAddress=message.replyby[i].senderAddress;
			txid=message.replyby[i].txid;

			msgstr=formatmessage(msg, senderAddress, txid, i, indentation);
			finalmsgstr+=msgstr;
			console.log(msgstr);
			//console.log(finalmsgstr);
			
			level2rows=message.replyby[i].replyby.length;
			for (j=0; j<level2rows; j++)
			{
					indentation=40;
					 
					msg=message.replyby[i].replyby[j].message;
					msg = Base64.decode(msg);	
					senderAddress=message.replyby[i].replyby[j].senderAddress;
					txid=message.replyby[i].replyby[j].txid;					
					msgstr=formatmessage(msg, senderAddress, txid, i, indentation);							
					finalmsgstr+=msgstr;				
					level3rows=message.replyby[i].replyby[j].replyby.length; 
					console.log(msgstr);
				//	console.log(finalmsgstr);
			
					for (k=0; k<level3rows; k++)
					{
						indentation=60;
						 
						msg=message.replyby[i].replyby[j].replyby[k].message;
						senderAddress=message.replyby[i].replyby[j].replyby[k].senderAddress;
						txid=message.replyby[i].replyby[j].replyby[k].txid;						
						msg = Base64.decode(msg);						
						msgstr=formatmessage(msg, senderAddress, txid, i, indentation);
						finalmsgstr+=msgstr;							
	
						console.log(msgstr);
					//	console.log(finalmsgstr);
	
					}  
			}  
		}
		
		 document.getElementById("allreply").innerHTML=finalmsgstr;
 
}
//testsend();
</script>
</html>