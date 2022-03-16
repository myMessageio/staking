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
				<a href="readmessage.php" class="nav-item nav-link  active">Read Message</a>
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
 				
					
					
					
					
					<div id="encryptsection"  ><br>
					<h6><small ><p id="secretkeymsg"  >Enter Your Sceret Key</p></small></h6>			 
					<input type="text"  class="form-control" id="secretkey" value=""   >
					</div>
			         <br>
					 <button type="button" class="btn btn-primary btn-sm  btn-block" id="sendbutton" onclick="decryptmessage()"    >Decrypt Message</button> 
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
							        <button type="button" class="btn btn-primary   btn-block" id="ewp" onclick="replymessage()"    >Reply Message</button> 	
								</div>
								<div class="col-sm-2"> 				 
					                <button type="button" class="btn btn-primary   btn-block" id="downloadattachment" onclick="downloadattachment()"    >Download</button> 
								</div>
								
								<div class="col-sm-1"> 				 
					                <button type="button" class="btn btn-primary   btn-block" id="downloadattachment" onclick="testshowreplymessages()"    >T</button> 
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

  function findreplymessagebytxid(txid) {
		urlstr="getsearchmessagebytxid.php?txid="+txid;
		console.log(urlstr);
		
		document.getElementById("allreply").innerHTML="";
 
		
		
		
		
		
		
		
		
		
		
		
	  
        $.ajax({
            url: urlstr,  //url: "https://myzilliqawallet/getzilstat.php", not working, weird, when supply full url, it doesnt work!
            dataType:"json",
            type: "GET",
			async: false,
            contentType: "application/json; charset=utf-8",
            success: function (data) {
				//rtn=JSON.parse(data);
				console.log(data);
				numofrow=data.length;
				console.log("numofrow=",numofrow);
				longmsgstr="";
				for (row=0; row<numofrow; row++)
				{
					
					
								console.log("txid=", data[row].txid);	// all the txid --- reply		
								 decoded_string = atob(data[row].message);  /// remember json parse not allow /r/n and control chars
								
	   //replymessage=document.getElementById("allreply").innerHTML ;
	   test1='<p style="margin-left: 40px">This text is indented.</p>';
	   
	   test2='<p style="margin-left: 60px">This text is indented.</p>';	    

							   ///test1='<p style="margin-left: 40px">This text is indented.</p>';
							   headerstr='<p style="margin-left: 40px">'
							   tailstr='</p>'
							   
							   newline="<br>";
							   
							    
							 
							   
							   
							   
							   //document.getElementById("allreply").innerHTML=replymessage;


								secretkey=document.getElementById("secretkey").value;
								if (secretkey.length>0)
								{
									secretkey=document.getElementById("secretkey").value;
									 
									 
									 msg=returndecryptmessage( decoded_string);
  								 
								}
								else
									msg= decoded_string;
								
								msgstr=headerstr+msg+tailstr+newline+newline;	
								console.log("msgstr=", msgstr);
								longmsgstr=longmsgstr+msgstr;
								console.log("longmsgstr=",longmsgstr);
								
								 
				}
				 document.getElementById("allreply").innerHTML=longmsgstr;
				
				
				
				
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
 
//testsend();
</script>
</html>