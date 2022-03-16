<!DOCTYPE html>
<!--https://htmlcompressor.com/compressor/-->
<!-- gEtblockpwd111444 -->

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>My Zilliqa Wallet</title>
<link rel="icon" href="images/myzilliqawalletlogo.png">
 
 
  
  


 

 
<script src="js/jquery-3.3.1.min.js"></script>   
<script src="js/bootstrap.min.js"></script> 
<script src="zilliqa.min.js"></script>
<script src="js/all.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" />

<style type="text/css">
.full-width {
    width: 100%;
    margin-left: 60px;
     
  
}



	
</style>
 
</head>
<body>
<div class="bs-1">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a href="home.php" class="navbar-brand">
            <img src="images/myzilliqawalletsmall.png" height="28" alt="myZilliqaWallet">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                 
 			
				
				
				<a href="home.php" class="nav-item nav-link">Home</a>
				<a href="createwallet.php" class="nav-item nav-link">Create Wallet</a>
				<a href="sendtoken.php" class="nav-item nav-link   active">Send Tokens</a>
				<a href="zilstatistic.php" class="nav-item nav-link">Staking Statistic</a>
				
				
				
				
            </div>
 
        </div>
    </nav>
</div>



 






 <div class="container-fluid full-width ">
 <br>
 <br>
 <h5> ZILLIQA (ZIL) Client Side Wallet 0.9.8 </h5>  
 This wallet is still under testing, use it at your own risk. Download the source and run from your computer for maximum security.<b>
<p id="instruction">Please disconnect the internet now! And unlock your wallet using method 1,2 or 3, then press Unlock button.</p></b>
 <hr>
   
 <div class="row">
		  <div class="col-4">
		  <h5>Your Wallet Information</h5>
		  <br>
		  <h5>
		  Bech32 Address
		  </h5>
		  <h6>
		  <p id="walletaddressbech32"> <p>
		  </h6>
		   
		  <h5>
		  ERC Address
		  </h5>
		  <h6>		  
		  <p id="walletaddresserc20"> <p> 
		   	
		  <h5>		  		  
		  Balance
		  </h5>
		  <h6>			  
		   <p id="walletzilbalance"> <p>  
		  <br>	
          </h6>
		  
		  <hr>
		   
		  <h5>Node</h5>
		  <h6>
		  <!-- For mainnet, the node is api.zilliqa.com, for testnet it is dev-api.zilliqa.com, and the chainid=1 for mainnet, 333 for testnet -->
          <!--		<input type="text" name="mnemonic" class="form-control" id="walletnode" value="https://dev-api.zilliqa.com">   	  -->
		  <input type="text" name="mnemonic" class="form-control" id="walletnode" value="https://api.zilliqa.com/">
				 
		  <br>
		  <h5>Chain ID</h5>  <small>mainnet=1, testnet=333</small>
		  <h6>
          <!--		<input type="text" name="mnemonic" class="form-control" id="walletchainid" value="333">			 -->
		  <input type="text" name="mnemonic" class="form-control" id="walletchainid" value="1">		  
		  
		  
		  <hr>		  
		  
		  <h5>
		  <p id="txidlabel"></p>
		  </h5>
		  <h6 style="word-break: break-word;">
		  <p id="txid"></p>
		 

 	 
		  <p id="message" ><p>
		   
		  </h6>
		  
		  
		   <p id="message2"><p>	  

		  </div>
  
 
  
  
  
  
  
  
  
  
		  <div class="col-6"> 
		            <h4>Unlock Your Wallet</h4>
					<br>
					<h5>Method 1: Private Key</h5>
					<label for="datePicker" >Private Key</label>			 
					<input type="text" name="privatekey" class="form-control" id="privatekey" value="">
			        <br>

					<h5>Method 2: Mnemonic</h5>
					<label for="datePicker" >Enter Mnemonic</label>			 
					<input type="text" name="mnemonic" class="form-control" id="mnemonic" value="">
			        <br>	
					
					<h5>Method 3: Keystore</h5>
					 	 
					<input type="file" name="file" class="form-control" id="file-input" value="">
					<label for="datePicker" >Enter Passphrase</label>			 
					<input type="text" name="mnemonic" class="form-control" id="passphrase" value="">			        
					
					
					
					<br>						
					
					
					
					<button type="button" class="btn btn-primary btn-sm  btn-block" onclick="unlockwallet()">UNLOCK</button> 

					<hr>
					
					<br>						
					
					
					
					<button type="button" class="btn btn-primary btn-sm  btn-block" id="refreshbutton" onclick="refreshinternet()" disabled>REFRESH</button> 

					<hr>					
					
					
					<br> 					
					<h5>Send Tokens</h5>					

					
					<label for="datePicker" >Destination ZIL Address</label>			 
					<input type="text" name="privatekey" class="form-control" id="destziladdress" value=""   disabled>	
					<br>
					
					<div class="row">
						<div  class="col-8">
									<label for="datePicker" >Amount In ZIL</label>			 
									<input type="text" name="privatekey" class="form-control" id="amount" value=""   disabled>	
									<br>
 
						</div>
						<div  class="col-4">
									<label for="datePicker" >Gas In ZIL</label>			 
									<input type="text" name="privatekey" class="form-control" id="gas" value="0.002"   disabled>	
									<br>
							  
						</div>						
					</div>
					 <button type="button" class="btn btn-primary btn-sm  btn-block" id="sendbutton" onclick="sendtxnow()"   disabled>SEND</button> 
						

							   
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  </div>

  
  
  
  
  
  
  
  </div> 
      
	
	
	

	<p>
	
       
		
	











			<br>  
				
				 
				 <hr>
				  

		 
  	  
	
	
	
	
	
	  
















 
 

 



 
 



  
</body>

 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

 
 
 
<script>

// Wrong bech32 zil1sf2t9jdvmuvp6ht8jmtrxg8mkgx5ahgj6h833q

// mainnet acct with 100  zil1z3vtafy6csmfu2wq48ay3kaxqf9vjpuupu8c4r
// c0092063dd78ad3426daa9e21fbd56480b5ef90adbadd829df6fc12c8857591b

// test acct3
// c4dbb14cf11eb37fbd122a4592d3b6e8707231594bd01a848b43a14b94d7d9f4
// with keystore passphrase testnet123
// zil1fcpzcyd2v5ek7tn78wf7w60htxh2gj2h5klu8u

// test acct4 using mnenomic
// gorilla devote exact satoshi gadget choose expire lamp vendor pause march sustain
// zil1ervsaj36u69kvzx65qm68ynsxzl34ua4dzu5qr

// ****************************************************************
// 9719df7eacad3458984deb44e69974f0a74d10123c31a633468938295cb61baa
// zil1wjms7rda4lxygkavtps67dsafzqx8zx9j5yk49  


//3375F915F3F9AE35E6B301B7670F53AD1A5BE15D8221EC7FD5E503F21D3450C8
// zil1sf2t9jdvmuvp6ht8jmtrxg8mkgx5ahgj6h833r

var zilliqa;
var VERSION;
var address;
var fileselected=0;     // for keystore
var keystore="EMPTY";   // for keystore
var address;
var balanceinzil=0;

function initvar()
{
 fileselected=0;     // for keystore
 keystore="EMPTY";   // for keystore	
 //balanceinzil=0;
	
}


async function init()
{
	 initvar();
  var node=document.getElementById("walletnode").value;
  zilliqa = new Zilliqa.Zilliqa(node);
  
  
  var chainid=document.getElementById("walletchainid").value;  
  
  //const chainId = 333;  
  
  const msgVersion = 1;
   VERSION = Zilliqa.bytes.pack(chainid, msgVersion);	
	console.log(VERSION);
	
}

async function refreshinternet()
{
	// internet is reconnected, now get balance

  //console.log(`My account address is: ${address}`);


  // Get Balance
		//const balance = await zilliqa.blockchain.getBalance(address);	
  
  
  
  
		var balance;
 		try {
		    balance = await zilliqa.blockchain.getBalance(address);	
			var qa=new Zilliqa.BN( balance.result.balance);
			balanceinzil=Zilliqa.units.fromQa(  qa, Zilliqa.units.Units.Zil );
			document.getElementById("walletzilbalance").innerHTML=balanceinzil+" ZIL";	
			document.getElementById("destziladdress").disabled = false;
			document.getElementById("amount").disabled = false; 
			document.getElementById("sendbutton").disabled = false; 
			document.getElementById("gas").disabled = false; 
			method=0;
			initvar();	
			document.getElementById("instruction").innerHTML="Remain connected to internet, now you can start to send your ZIL";			
		} catch(e) {
			errmsg="This wallet has no balance!";
			alert(errmsg);	   
			return;			   
		}   
  
  
}

async function unlockwallet()
{
	
	//await init();
   
	privateKey= document.getElementById('privatekey').value;
	mnemonic= document.getElementById('mnemonic').value;
   
	var method=0;
   
   
	document.getElementById("instruction").innerHTML="Wallet Unlocked! Reconnect your internet and press Refresh button now. ";

  
   //document.getElementById("message2").innerHTML=keystore;
   
	   var passphrase=document.getElementById("passphrase").value;
	   if (fileselected==1 && keystore!="EMPTY" && passphrase.length>1) // seems like user selected keystore
	   {
		   //address=await zilliqa.wallet.addByKeystore(keystore , passphrase );   
		   //method=3;
		   //console.log(address);
		   //document.getElementById("walletaddresserc20").innerHTML=address;  
		   //document.getElementById("walletaddressbech32").innerHTML=Zilliqa.toBech32Address(address);
		   
		
			try {
				 address=await zilliqa.wallet.addByKeystore(keystore , passphrase );   
			     method=3;
			     //console.log(address);
			     document.getElementById("walletaddresserc20").innerHTML=address;  
			     document.getElementById("walletaddressbech32").innerHTML=Zilliqa.toBech32Address(address);				 
			} catch(e) {
				//errmsg=destaddressbech32+" is an invalid ZIL address!!";
				 alert("Invalid Keystore/Passphrase");	   
				 return;			   
			}   
	   }
   
		/// first try private key
		if (privateKey.length>1)
		{
			if (!Zilliqa.validation.isPrivateKey(privateKey))
			{
				document.getElementById('privatekey').value="";
				alert("Invalid Private Key!");	   
				return;
			}



			try {
				await zilliqa.wallet.addByPrivateKey(privateKey); 
				method=1;
				address = Zilliqa.getAddressFromPrivateKey(privateKey);
			    document.getElementById("walletaddresserc20").innerHTML=address;  
			    document.getElementById("walletaddressbech32").innerHTML=Zilliqa.toBech32Address(address);				
		
			} catch(e) {
				document.getElementById('privatekey').value="";
				//errmsg=destaddressbech32+" is an invalid ZIL address!!";
				alert("Invalid Private Key!");	   
				return;			   
			}   
		}
		
		if (mnemonic.length>1)
		{				
			try {
				address=await zilliqa.wallet.addByMnemonic(mnemonic);
				method=2;
			    document.getElementById("walletaddresserc20").innerHTML=address;  
			    document.getElementById("walletaddressbech32").innerHTML=Zilliqa.toBech32Address(address);				
			
			} catch(e) {
				//errmsg=destaddressbech32+" is an invalid ZIL address!!";
				document.getElementById('mnemonic').value="";
				alert("Invalid Mnemonic!!");	   
				return;					   
			} 	 			
		}
 
   
		var starstring="";
		if (method==1)
			document.getElementById('privatekey').value=starstring; // hide it after unlock
		else if (method==2)
			document.getElementById('mnemonic').value=starstring; // hide it after unlock
		else if (method==3)
			document.getElementById('passphrase').value=starstring; // hide it after unlock
		if (method!=0)
			document.getElementById("refreshbutton").disabled = false;

  
}









async function checkkeystore(json,passphrase)
{
	const address = await this.zilliqa.wallet.addByKeystore(json, passphrase).catch((		err) => {
				  return 0;
		});
}				
 
async function sendtx( destaddressbech32,   amountinzil ) {
  //const zilliqa = new Zilliqa.Zilliqa('https://api.zilliqa.com/');
  //const chainId = 1;
  

  //console.log(VERSION);
  // Populate the wallet with an account
  //const privateKey =
  //  '3375F915F3F9AE35E6B301B7670F53AD1A5BE15D8221EC7FD5E503F21D3450C8';
  //     9719df7eacad3458984deb44e69974f0a74d10123c31a633468938295cb61baa
	//  zil1wjms7rda4lxygkavtps67dsafzqx8zx9j5yk49   
	

  // Get Minimum Gas Price from blockchain
  const minGasPrice = await zilliqa.blockchain.getMinimumGasPrice();
 
  console.log(`Current Minimum Gas Price: ${minGasPrice.result}`);
 /////'2000' here is 0.002 ZIL as gas fee
  var gasinzil=document.getElementById("gas").value;
  if (gasinzil>10) // 10zil to be paid as zil? too highlight_file
  {
	  alert("Gas too high! Higher than 10 zil!");
	  return;	  
  }
  
  if (gasinzil<0.002) // 10zil to be paid as zil? too highlight_file
  {
	  alert("Gas too low error!");
	  return;	  
  }  
  
  var gastobepaid=gasinzil*1000000;
  const myGasPrice = Zilliqa.units.toQa(gastobepaid, Zilliqa.units.Units.Li); // Gas Price that will be used by all transactions
  console.log(`My Gas Price ${myGasPrice.toString()}`);
  const isGasSufficient = myGasPrice.gte(new Zilliqa.BN(minGasPrice.result)); // Checks if your gas price is less than the minimum gas price
  console.log(`Is the gas price sufficient? ${isGasSufficient}`);

  
  var destaddress=Zilliqa.fromBech32Address(destaddressbech32);
  var amounttosend= amountinzil ;
  // Send a transaction to the network
  console.log('Sending a payment transaction to the network...');
  
  document.getElementById("message").innerHTML= "Sending...."+'<i class="fas fa-spinner fa-spin"></i>';
  
  
  const tx = await zilliqa.blockchain.createTransactionWithoutConfirm(
    // Notice here we have a default function parameter named toDs which means the priority of the transaction.
    // If the value of toDs is false, then the transaction will be sent to a normal shard, otherwise, the transaction.
    // will be sent to ds shard. More info on design of sharding for smart contract can be found in.
    // https://blog.zilliqa.com/provisioning-sharding-for-smart-contracts-a-design-for-zilliqa-cd8d012ee735.
    // For payment transaction, it should always be false.
    zilliqa.transactions.new(
      {
        version: VERSION,
        toAddr: destaddress,
        amount: new Zilliqa.BN(
		
		
          Zilliqa.units.toQa(amounttosend, Zilliqa.units.Units.Zil),
        ), // Sending an amount in Zil (1) and converting the amount to Qa
        gasPrice: myGasPrice, // Minimum gasPrice veries. Check the `GetMinimumGasPrice` on the blockchain
        gasLimit: Zilliqa.Long.fromNumber(1),
      },
      false,
    ),
  );

  // process confirm
  console.log(`The transaction id is:`, tx.id);

 
  document.getElementById("txidlabel").innerHTML="TXID";
  document.getElementById("txid").innerHTML= tx.id;
  
  
  document.getElementById("message").innerHTML= '<i class="fas fa-spinner fa-spin"></i>';
  
  
  const confirmedTxn = await tx.confirm(tx.id);  
  // Get Balance
  const newbalance = await zilliqa.blockchain.getBalance(address);	
  var qa=new Zilliqa.BN( newbalance.result.balance);
  balanceinzil=Zilliqa.units.fromQa(  qa, Zilliqa.units.Units.Zil );
  document.getElementById("walletzilbalance").innerHTML=balanceinzil+" ZIL";	  
  document.getElementById("message").innerHTML="Tx confirmed!";
  console.log(`The transaction status is:`);
  console.log(confirmedTxn.receipt);
}




async function sendtxnow()
{
destaddressbech32= document.getElementById('destziladdress').value;

 
amounttosendinzil= document.getElementById('amount').value;

 

// ask again before sending

   // check address
   if (!Zilliqa.validation.isBech32(destaddressbech32))  // if this is not a valid bech32 address
   {
	    errmsg=destaddressbech32+" is an invalid ZIL address!";
	    alert(errmsg);	   
	    return;
   }
   
   //const address = await this.zilliqa.wallet.addByKeystore(json, passphrase).catch((err) => {
   //   return 0;
   // });
   
   
   
   //  erc20address=await Zilliqa.fromBech32Address(destaddressbech32).catch((err) => {
	//    errmsg=destaddressbech32+" is an invalid ZIL address2!";
	//    alert(errmsg);	   
	//    return;				
   //  });  
   
   
   
    var erc20address="";
	//var destaddressbech32="zil1r5verznnwvrzrz6uhveyrlxuhkvccwnju4aehf";
	
	/*
	try {
		 erc20address=await Zilliqa.fromBech32Address(destaddressbech32)
			.then({  })
			.catch(err => {   });
	} catch (error) {
		errmsg=destaddressbech32+" is an invalid ZIL address2!";
	    alert(errmsg);	   
	    return;	
	}   
	*/
	   
   
		try {
		    erc20address=await Zilliqa.fromBech32Address(destaddressbech32);
		} catch(e) {
			errmsg=destaddressbech32+" is an invalid ZIL address!!";
			alert(errmsg);	   
			return;	
		   
		}  
   
   
   
   
   
   
   
   if (!Zilliqa.validation.isAddress(erc20address))
   {
	    errmsg=destaddressbech32+" is an invalid ZIL address3!";
	    alert(errmsg);	   
	    return;	   	   
   }
   
   if (parseInt(amounttosendinzil, 10)>parseInt(balanceinzil, 10)) // insufficient balance to send
   {
	   errmsg="You balance ("+balanceinzil+" ZIL)"+" is less than "+amounttosendinzil+ " ZIL";
	    alert(errmsg);	   
	   return;	   
   }

   
   
   var gasinzil=document.getElementById("gas").value;
  if (gasinzil>10) // 10zil to be paid as zil? too highlight_file
  {
	  alert("Gas too high! Higher than 10 zil!");
	  return;	  
  }
  
  if (gasinzil<0.002) // 10zil to be paid as zil? too highlight_file
  {
	  alert("Gas too low error!");
	  return;	  
  }    
   
   
   
   
   
   
   
   
   
   
   
   
 
  var txt;
  confirmmsg="Are you sure you want to send "+amounttosendinzil+ " ZIL to "+destaddressbech32+"?";
  
  
  if (confirm(confirmmsg)) {
    sendtx( destaddressbech32,  amounttosendinzil );
  } else {
     
  }
   
  
 
}

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
/////////////Add keystore support, read file
document.getElementById('file-input')
  .addEventListener('change', readSingleFile, false);	
 

 
function readSingleFile(e) {
  fileselected=1; // user selected a file.
  var file = e.target.files[0];
  if (!file) {
    return;
  }
  var reader = new FileReader();
  reader.onload = function(e) {
    var contents = e.target.result;
	
    keystore=contents;
    //displayContents(contents);
  };
  reader.readAsText(file);
}

function displayContents(contents) {
 // var element = document.getElementById('file-content');
 // element.textContent = contents;
}  
 
 
  
 
 
 

window.addEventListener('load', init);

 
 

</script>
</html>