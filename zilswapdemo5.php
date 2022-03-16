<!DOCTYPE html>
<!--https://htmlcompressor.com/compressor/-->
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>My Zilliqa Wallet</title>
<link rel="icon" href="images/myzilliqawalletlogo.png">



 
 
<script src="js/jquery-3.3.1.min.js"></script>   
<script src="js/bootstrap.min.js"></script> 
 <script src="js/zilliqa.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" />
<script src="js/all.min.js"></script>
 
 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>

 
 
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
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
				<a href="createwallet.php" class="nav-item nav-link">Swap</a>
				<a href="sendtoken.html" class="nav-item nav-link">Add Liquidity</a>
				<a href="checkbalance.html" class="nav-item nav-link">Remove Liquidity</a>				
				<a href="zilstatistic.php" class="nav-item nav-link">Create New Pool</a>	 		
 				
            </div>
 
        </div>
    </nav>
</div>
    
	
	
	
<?php
//////////// Show realtime printout, no cache  
header( 'Content-type: text/html; charset=utf-8' );
header("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
set_time_limit(0);
ob_implicit_flush(1);
///////////////////////////////


?>	
	
	
	
	
	
	
	
<style type="text/css">
.tab-content .tab-pane .highcharts-container {
    border: 1px solid red;
}

.tab-content > .tab-pane:not(.active) {
    display: block;
    height: 0;
    overflow-y: hidden;
}





</style>	

 
 
 
 
 
		
    
   
  <div class="container">
		<h3>myZilliqaSwap. Testnet Version 0.2b. Do not trade real ZIL here.</h3>  
  </div>  
   
   
   
   
 <div class="container">
 <hr>
  <div class="row ">
			 
			<div class="col-md-2"> 
			<p>
			<label for="datePicker" >Token Give</label>
					<div class="col-sm-13 date">
						<select class="form-control" name="group_by" id="tokennamegive">
						     <option hidden >Select Token</option>
							  <option value="ZIL">ZIL</option>						
							 <option value="ZWAP">ZWAP</option>								  
							  <option value="XSGD">XSGD</option>							   
							  <option value="ZLP">ZLP</option> 
							  						  
						</select>
					</div>
			<p>
		    </div>
			 
			 
			<div class="col-md-4">
			<p>
				<label for="datePicker" >Smart Contract Address</label>
				<div class="col-sm-13 date">
					<div class="input-group input-append date" id="datePicker">
						
						
						  <input type="text"   class="form-control" id="smartcontractaddressgive" value=" "  disabled>
					</div>
				</div>
			
			</p>
			</div>
			 
			 
			<div class="col-md-4">
			<p>
				<label for="datePicker" >Amount Give  <small id="maxamountgive" style="text-align: right"></small></label>
				<div class="col-sm-13 date">
					<div class="input-group input-append date" id="datePicker">
						
						
						  <input type="text"   class="form-control" id="amountGive"  >
					</div>
				</div>
			
			</p>
			</div>				
   </div>
    <br>  
  <div class="row "> 
  <div class="col-md-4"> 
  </div>
			<i class="fas fa-retweet fa-3x" onclick="reversetoken()"></i>
  </div> 
   <br>
  <div class="row ">
			 
			<div class="col-md-2"> 
			<p>
			<label for="datePicker" >Token Get</label>
					<div class="col-sm-13 date">
						<select class="form-control" name="group_by" id="tokennameget">
						     <option hidden >Select Token</option>
							  <option value="ZIL">ZIL</option>
							  <option value="ZWAP">ZWAP</option>		
							  <option value="XSGD">XSGD</option>							  
							  <option value="ZLP">ZLP</option> 							  				  
						</select>
					</div>
			<p>
		    </div>
			 
			 
			<div class="col-md-4">
			<p>
				<label for="datePicker" >Smart Contract Address</label>
				<div class="col-sm-13 date">
					<div class="input-group input-append date" id="datePicker">
						
						
						  <input type="text"   class="form-control" id="smartcontractaddressget" value=""  disabled>
					</div>
				</div>
			
			</p>
			</div>
			 
			 
			<div class="col-md-4">
			<p>
				<label for="datePicker" >Amount Get</label>
				<div class="col-sm-13 date">
					<div class="input-group input-append date" id="datePicker">
						
						
						  <input type="text"   class="form-control" id="amountGet"  >
					</div>
				</div>
			
			</p>
			</div>				
   </div>   
   
    <br>
    <div class="row "> 
		<div class="col-md-6">	
			<p id="exchangerate">   </p>
  			<p id="priceimpact">   </p> 
			<p id="txid"> </p> 
			<p id="txconfirm"> </p> 
		</div>
		<div class="col-md-6">	
			<p id="poolzilamount">   </p>
  			<p id="pooltokenamount">   </p> 
		</div>		
		
		
		
    </div>
   
   
    <div class="row "> 
 			<div class="col-md-6">	
			<p>
				<label for="datePicker2"  ></label>
				<div class="col-sm-13 date">
					<div class="input-group input-append date" id="sendclassid">
					  <button type="button" class="btn btn-primary btn-sm  btn-block" onclick="swap()">SWAP</button> 
						 
					</div>
				</div>		
			
			</p>  
			</div>	  
   
    </div>
   
   
   
   
   
   
   <hr>
     <div class="row "> 
		<div class="col-md-6">	

			<p id="givesymbol">   </p>
			<p> ATH: coming soon</p>
  			<p> ATL: coming soon </p> 			
			<p id="givedailyvolume">   </p>			
			<p id="givemarketcap">  </p>			
			<p id="givecurrentrate">  </p>					
		</div>
		
		<div class="col-md-6">	

			<p id="getsymbol">   </p>
			<p> ATH: coming soon</p>
  			<p> ATL: coming soon </p> 			
			<p id="getdailyvolume">   </p>			
			<p id="getmarketcap">  </p>			
			<p id="getcurrentrate">  </p>						
		</div>		
		
    </div>  
     <hr> 
   
  <div class="row ">
			 
			 
			 
			 
			<div class="col-md-3">
			<p>
				<label for="datePicker" >Slippage tolerance(%)</label>
				<div class="col-sm-13 date">
					<div class="input-group input-append date" id="datePicker">
						
						
						  <input type="text"   class="form-control" id="slippagetolerance" value="0.5"  disabled >
					</div>
				</div>
			
			</p>
			</div>
			 
			 
			<div class="col-md-3">
			<p>
				<label for="datePicker" >Transaction deadline (minutes)</label>
				<div class="col-sm-13 date">
					<div class="input-group input-append date" id="datePicker">
						
						
						  <input type="text"   class="form-control" id="transactiondeadline" value="20"  disabled >
					</div>
				</div>
			
			</p>
			</div>		

 			<div class="col-md-3">	
			<p>
				<label for="datePicker2"  >Change Settings</label>
				<div class="col-sm-13 date">
					<div class="input-group input-append date" id="sendclassid">
					  <button type="button" class="btn btn-primary btn-sm  btn-block" onclick="enablesettings()">Enable Settings</button> 
						 
					</div>
				</div>		
			
			</p>  
			</div>	 


			
   </div>    
   
   
   
   
   
   
   
   
   <p id="wait"></p>
   <div class="row ">	
			<div class="col-md-8">	
			<p>
				 
				<div class="col-sm-13 date">
					<div class="input-group input-append date" id="datePicker2">
					   <div id="tablechart" style="margin-left:0%;margin-right:0%; width:100%"></div>  
						 
					</div>
				</div>		
			
			</p>  
			</div>



 
	</div>
   
   <hr>
 
	
</body>


<script>




const myzilliqaswapaddress="0x1a62dd9c84b0c8948cb51fc664ba143e7a34985c";
const myzilliqaswapbech32address="zil1rf3dm8yykryffr94rlrxfws58earfxzu5lw792";

const defaultwalletaddress='0x0d04a3dafcecc89745fd29e5b5bc154e2007759e';
const defaultzilwalletaddress="zil1p5z28khuanyfw30a98jmt0q4fcsqwav7564uge";
 
zilliqa = new Zilliqa.Zilliqa('https://dev-api.zilliqa.com');
// These are set by the core protocol, and may vary per-chain.
// You can manually pack the bytes according to chain id and msg version.
// For more information: https://apidocs.zilliqa.com/?shell#getnetworkid

const chainId = 333; // chainId of the developer testnet
const msgVersion = 1; // current msgVersion
//const VERSION = bytes.pack(chainId, msgVersion);
const VERSION = Zilliqa.bytes.pack(chainId, msgVersion);	
// Populate the wallet with an account
const privateKey =
  '662d467fba1b6514e21b5035c4a2900ec0df408190797500cf63aee42fc5e671';  ////zil1p5z28khuanyfw30a98jmt0q4fcsqwav7564uge  my zilpay wallet address

zilliqa.wallet.addByPrivateKey(privateKey);

const address = Zilliqa.getAddressFromPrivateKey(privateKey);
  
var callTx ;

var animatespinner='<i class="fas fa-spinner fa-spin fa-2x"></i>';
var gfilename;



$("#amountGive").on("change keyup paste", async function(){
    
	 updatepriceandexchangerate();
})


var tokendecimalarr={
					"ZIL":12,
					"gZIL": 15,
					"ZWAP":12,
					
					"BARTER":  2,
					"BOLT":  18,
					"CARB":  8,
					"RedC":  2,
					"SERGS":  5,
					"SHRK":  6,
					
					
					"ZLF":  5,
					"ZLP": 27,
					"ZYF":  3,
					"XSGD": 6,
					"PORT": 4
					}	;
					
					
					
function reversetoken()
{
	symbolget=document.getElementById("tokennameget").value;
	symbolgive=document.getElementById("tokennamegive").value;	
	document.getElementById("tokennamegive").value=symbolget;
	document.getElementById("tokennameget").value=symbolgive;
	updatepriceandexchangerate();

}	

async function updatepriceandexchangerate()
{
	
	amountGive=document.getElementById("amountGive").value; 
	

	 
	
	
	//bech32addressget=document.getElementById("smartcontractaddressget").value;
	//console.log(bech32addressget);
	
	//addressget=Zilliqa.fromBech32Address(bech32addressget);
	
	//addressget=addressget.toLowerCase();
	
	
	gettokenaddressbech32=document.getElementById("smartcontractaddressget").value; 
    givetokenaddressbech32=document.getElementById("smartcontractaddressgive").value; 	
	
	symbolget=document.getElementById("tokennameget").value;
	symbolgive=document.getElementById("tokennamegive").value;		
	if (symbolget!="ZIL" && symbolget!="Select Token")
	{
		addressget=Zilliqa.fromBech32Address(gettokenaddressbech32);	
		addressget=addressget.toLowerCase();
	
		
		
	}
	
	if (symbolgive=="ZIL" )
	{
	
		zilbalance=await getbalanceZIL(defaultwalletaddress);
		zilbalance=zilbalance/(10**12);
		document.getElementById("maxamountgive").innerHTML=" max "+zilbalance+" ZIL";	

	}
	else if (symbolgive!="ZIL" && symbolgive!="Select Token")
	{
		addressgive=Zilliqa.fromBech32Address(givetokenaddressbech32);	
		addressgive=addressgive.toLowerCase();	
		
	    walletbalancegive=await getbalance(addressgive, defaultwalletaddress);	
		givedecimal=tokendecimalarr[symbolgive];
		walletbalancegive=walletbalancegive/(10**givedecimal);
		document.getElementById("maxamountgive").innerHTML=" max "+walletbalancegive+" "+symbolgive;	
	}
		
	
	
	
	
	
	value= await getpool(addressget);
	console.log("poolamount");
	poolzilamount=parseInt(value.zil);
	console.log(poolzilamount);
	pooltokenamount=parseInt(value.token);
	console.log(pooltokenamount);
	
	symbolget=document.getElementById("tokennameget").value;
	symbolgive=document.getElementById("tokennamegive").value;		
	getdecimal=tokendecimalarr[symbolget];
	givedecimal=tokendecimalarr[symbolgive];

	poolzilamount=poolzilamount/(10**givedecimal);
	pooltokenamount=pooltokenamount/(10**getdecimal);
	
	
 
	oldexchangerate=pooltokenamount/poolzilamount;
	
	//amountGet=calculateAmountTokenGet(amountGive, poolzilamount, pooltokenamount);
	console.log(amountGive);
	
	testnum=document.getElementById("amountGive").value; 	
	if (!isNaN(parseFloat(testnum)))
	{
	
		amountGet=calculateAmountTokenGet(parseFloat(amountGive), poolzilamount, pooltokenamount);
		document.getElementById("amountGet").value= parseFloat(amountGet).toFixed(6);  
		exchangerate=calculateExchangeRate(amountGive,amountGet);	
		exchangerate = parseFloat(exchangerate).toFixed(6);
		document.getElementById("exchangerate").innerHTML="Exchange Rate: 1 "+symbolgive+" :"+exchangerate + " "+symbolget;	
			newexchangerate=exchangerate;
	priceimpact=Math.abs(priceImpact(newexchangerate, oldexchangerate));	
	
	priceimpact=properdecimal(priceimpact);
	
	document.getElementById("priceimpact").innerHTML="Price Impact: "+priceimpact +"%";		
		
		
		
	}
	else
	{
		document.getElementById("amountGet").value= "";  
		
	}
 
	
 

	
	

	
	
	document.getElementById("poolzilamount").innerHTML		="Current Pool Size " ;
	document.getElementById("pooltokenamount").innerHTML	=properdecimal(poolzilamount)+" ZIL +"+properdecimal(pooltokenamount)+" "+symbolget;
	
	
	

	
	 	
}












// note address in the parameter must be 0x04333E1536851FAc5fC19b454C496A94A76C0785 must have 0x
async function getpool(address){
	console.log(address);
	
	const addr=myzilliqaswapaddress.substring(2);
	const smartContractState = await zilliqa.blockchain.getSmartContractState(addr); // zilswap testnet
	
	
	poolzilamount	=smartContractState.result.pools[address].arguments[0]  // zil amount
	pooltokenamount	=smartContractState.result.pools[address].arguments[1]  // token amount
	console.log(poolzilamount);
	console.log(pooltokenamount);
	
	var obj={
		zil: poolzilamount,
		token: pooltokenamount
		
	}
	
	return (obj);
}





// amountGive, tokenGive, amountGet, tokenGet


// use for swapzilfortoken
function calculateAmountTokenGet(ziltoexchange, poolzilamount, pooltokenamount){
	var numerator=poolzilamount*pooltokenamount;
	var newtokenamount=numerator/(poolzilamount+ziltoexchange);
	amountget=pooltokenamount-newtokenamount;	
	return amountget;
}


function calculateExchangeRate(amountGive, amountGet)
{
	return (amountGet/amountGive);
	
}

function priceImpact(newexchangerate, oldexchangerate)
{
	var newpriceimpact=(newexchangerate-oldexchangerate)/oldexchangerate*100.0;
	return newpriceimpact;
	
	
}


async function swap() {
  
    // Get Balance
   //////const balance = await zilliqa.blockchain.getBalance(address);
    // Get Minimum Gas Price from blockchain
    //////const minGasPrice = await zilliqa.blockchain.getMinimumGasPrice();
 
    // Account balance (See note 1)
    //console.log(`Your account balance is:`);
    //console.log(balance.result);
    //console.log(`Current Minimum Gas Price: ${minGasPrice.result}`);
   // const myGasPrice = units.toQa('1000', units.Units.Li); // Gas Price that will be used by all transactions
   
    const nextnonce = (await zilliqa.blockchain.getBalance(defaultwalletaddress)).result.nonce + 1;
   				 
 	slippage=document.getElementById("slippagetolerance").value; // default 0.5
	slippage=parseFloat(slippage);
	console.log("slippage=",slippage);
	deadline=document.getElementById("transactiondeadline").value;  // default 20
	deadline_block=await getLatestBlockNumber();
	
	deadline_block=deadline_block+parseInt(deadline);
	deadline_block=deadline_block.toString();
	
	console.log("deadline=",deadline);
	   
 	amountGet=document.getElementById("amountGet").value; 
	amountGive=document.getElementById("amountGive").value; 
	symbolget=document.getElementById("tokennameget").value;
	symbolgive=document.getElementById("tokennamegive").value;		
	getdecimal=tokendecimalarr[symbolget];
	givedecimal=tokendecimalarr[symbolgive];

	rawamountget=amountGet*(10**getdecimal);
	rawamountgive=amountGive*(10**givedecimal);
	
	//minrawamountget=rawamountget*0.95; //5%	
	minrawamountget=rawamountget*(1-slippage);	
	
	minrawamountget=Math.ceil(minrawamountget);  // round up,make it to integer
	
	msg="rawamountget="+rawamountget+" rawamountgive="+rawamountgive+" minrawamountget="+minrawamountget;
	console.log(msg);  
 
	//SwapExactTokensForZIL  need to checkallowance, if no allowance, then need to approve first
	//swapExactZILForTokens  No need checkallowance since you are selling zil 
	//swapExactTokensForZIL(token_address,token_amount,min_zil_amount, deadline_block)
	//swapExactZILForTokens(rawzilamountgive, token_address,min_token_amount,deadline_block,recipient_address)
	//swapTokensForTokens(token0_address,token1_address,token0_amount,min_token1_amount,deadline_block)  need to checkallowance, if no allowance, then need to approve first
	//authorizeTokenTransfer(tokenziladdress, fromaddress20, toaddress20, rawamount )
	//checkallowance(tokenaddress)
	
    gettokenaddressbech32=document.getElementById("smartcontractaddressget").value; 
    givetokenaddressbech32=document.getElementById("smartcontractaddressgive").value; 	
	
	if (symbolget!="ZIL")
	{
		addressget=Zilliqa.fromBech32Address(gettokenaddressbech32);	
		addressget=addressget.toLowerCase();		
		
	}
	

	if (symbolgive!="ZIL")
	{
		addressgive=Zilliqa.fromBech32Address(givetokenaddressbech32);	
		addressgive=addressgive.toLowerCase();	
	}
	
	
	
	 
	// need to check symbolget and symbolgive
	if (symbolgive=="ZIL") // use swapExactZILForTokens
	{
		recipient_address=defaultwalletaddress;
		min_token_amount=minrawamountget.toString();
		token_address=addressget;
		rawzilamountgive=rawamountgive;
		
		swapExactZILForTokens(rawzilamountgive, token_address,min_token_amount,deadline_block,recipient_address);
		
	}
	else if (symbolget=="ZIL") // use swapExactTokensForZIL
	{
		// need to check allowance for , if not enough or no allowance, then need appr
		tokenallowance=await checkallowance(addressgive, defaultwalletaddress);
		if (rawamountgive>tokenallowance) // need allowance
		{
			//authorizeTokenTransfer(tokenziladdress, fromaddress20, toaddress20, rawamount );
			console.log("Need authrorizetoken");
			
			
		}
		else
		{
			token_address=addressget;	
			//token_amount=rawamountgive.toString();
			token_amount=BigInt(rawamountgive).toString();
			//min_zil_amount=minrawamountget.toString();
			min_zil_amount=BigInt(minrawamountget).toString();
			
			swapExactTokensForZIL(token_address,token_amount,min_zil_amount, deadline_block);
			
		}
		
		
	}
	else   // use swapTokensForTokens
	{
		tokenallowance=await checkallowance(addressgive, defaultwalletaddress);	
		
		if (rawamountgive>tokenallowance) // need allowance
		{
			console.log("Need authrorizetoken");
			rawamount=rawamountgive;
			tokenziladdress=givetokenaddressbech32;
			fromaddress20=defaultwalletaddress;
			toaddress20=myzilliqaswapaddress;
			
			//await authorizeTokenTransfer(tokenziladdress, fromaddress20, toaddress20, rawamount );
			
			await increaseAllowance(tokenziladdress, toaddress20, rawamount );
			// token0 sell, token1 buy
			token0_address=addressgive;
			token1_address=addressget;
			//token0_amount=rawamountgive.toString();
			token0_amount=BigInt(rawamountgive).toString();
			
			
			temp=BigInt(minrawamountget);
			temp=temp.toString();
			console.log("minrawamountget=",temp);
			//min_token1_amount=minrawamountget.toString();			
			min_token1_amount=temp;
			recipient_address=defaultwalletaddress;
			 
			await swapExactTokensForTokens(token0_address,token1_address,token0_amount,min_token1_amount,deadline_block,recipient_address);			
			
			
		}
		else
		{
 		
			// token0 sell, token1 buy
			token0_address=addressgive;
			token1_address=addressget;
			//token0_amount=rawamountgive.toString();
			token0_amount=BigInt(rawamountgive).toString();
			
			temp=BigInt(minrawamountget);
			temp=temp.toString();
			console.log("minrawamountget=",temp);
			//min_token1_amount=minrawamountget.toString();			
			min_token1_amount=temp;
			recipient_address=defaultwalletaddress;
			 
			await swapExactTokensForTokens(token0_address,token1_address,token0_amount,min_token1_amount,deadline_block,recipient_address);
			
		}		
		
	}

 
}


function sleep(delay) {
    var start = new Date().getTime();
    while (new Date().getTime() < start + delay);
} 


//zilswap testnet address 
//zil1rf3dm8yykryffr94rlrxfws58earfxzu5lw792
//0x1a62Dd9C84b0C8948cb51FC664ba143e7A34985c

   
	
	$(function () {
				  $("select#tokennameget").on("change", function(value){
			   var This      = $(this);
			   var selectedD = $(this).val();
			   console.log(selectedD);
			   
				var contractaddrarray={
				"ZIL": " ",
				"ZWAP": "zil1ktmx2udqc77eqq0mdjn8kqdvwjf9q5zvy6x7vu", //0xb2f66571a0c7bd9001fb6ca67b01ac749250504c
				"BARTER": "zil17zvlqn2xamqpumlm2pgul9nezzd3ydmrufxnct",  
				"BOLT": "zil1x6z064fkssmef222gkhz3u5fhx57kyssn7vlu0", 
				"CARB": "zil1hau7z6rjltvjc95pphwj57umdpvv0d6kh2t8zk", 
				"RedC": "zil1a5wkhunysdp9x0nww5qe6m2m8x2m3ygdpuu257", 
				"SERGS": "zil1ztmv5jhfpnxu95ts9ylup7hj73n5ka744jm4ea", 
				"SHRK": "zil17tsmlqgnzlfxsq4evm6n26txm2xlp5hele0kew", 
				 
				"XSGD": "zil10a9z324aunx2qj64984vke93gjdnzlnl5exygv",
				"ZLF": "zil1r9dcsrya4ynuxnzaznu00e6hh3kpt7vhvzgva0", 
				"ZLP": "zil1du93l0dpn8wy40769raza23fjkvm868j9rjehn", 
				"ZYF": "zil1arrjugcg28rw8g9zxpa6qffc6wekpwk2alu7kj",
				"XFER": "zil180v66mlw007ltdv8tq5t240y7upwgf7djklmwh",
				"PORT": "zil18f5rlhqz9vndw4w8p60d0n7vg3n9sqvta7n6t2"
				
				};
	
				var contractdecimalarray={
					"gZIL": 15,
					"ZWAP":12,
					
					"BARTER":  2,
					"BOLT":  18,
					"CARB":  8,
					"RedC":  2,
					"SERGS":  5,
					"SHRK":  6,
					
					
					"ZLF":  5,
					"ZLP":  18,
					"ZYF":  3,
					"XSGD": 6,
					"PORT": 4
					}	;
	
	
				if (selectedD!="OTHER")
				{
					// change smart contract address to gzil and token decimal to 15
					document.getElementById("smartcontractaddressget").value=contractaddrarray[selectedD];
					//document.getElementById("tokendecimal").value=contractdecimalarray[selectedD];
					document.getElementById("smartcontractaddressget").disabled = true; 
					//document.getElementById("tokendecimal").disabled = true; 						
				}
				
				 	
			   
				else  
				{
					// change smart contract address to gzil and token decimal to 15
					document.getElementById("smartcontractaddressget").value="";
					//document.getElementById("tokendecimal").value="";					 
					
					document.getElementById("smartcontractaddressget").disabled = false; 
					//document.getElementById("tokendecimal").disabled = false; 					
				}				   
			   
			   symbol=document.getElementById("tokennameget").value;
			   getcurrentstatget(symbol);	
				updatepriceandexchangerate();
			   
			   
			});
	}); 
	
	
	
	
   
	
	$(function () {
				  $("select#tokennamegive").on("change", function(value){
			   var This      = $(this);
			   var selectedD = $(this).val();
			   console.log(selectedD);
			   
				var contractaddrarray={
				"ZIL": " ",
				"ZWAP": "zil1ktmx2udqc77eqq0mdjn8kqdvwjf9q5zvy6x7vu",
				"BARTER": "zil17zvlqn2xamqpumlm2pgul9nezzd3ydmrufxnct",  
				"BOLT": "zil1x6z064fkssmef222gkhz3u5fhx57kyssn7vlu0", 
				"CARB": "zil1hau7z6rjltvjc95pphwj57umdpvv0d6kh2t8zk", 
				"RedC": "zil1a5wkhunysdp9x0nww5qe6m2m8x2m3ygdpuu257", 
				"SERGS": "zil1ztmv5jhfpnxu95ts9ylup7hj73n5ka744jm4ea", 
				"SHRK": "zil17tsmlqgnzlfxsq4evm6n26txm2xlp5hele0kew", 
				 
				"XSGD": "zil10a9z324aunx2qj64984vke93gjdnzlnl5exygv",
				"ZLF": "zil1r9dcsrya4ynuxnzaznu00e6hh3kpt7vhvzgva0", 
				"ZLP": "zil1du93l0dpn8wy40769raza23fjkvm868j9rjehn", 
				"ZYF": "zil1arrjugcg28rw8g9zxpa6qffc6wekpwk2alu7kj",
				"XFER": "zil180v66mlw007ltdv8tq5t240y7upwgf7djklmwh",
				"PORT": "zil18f5rlhqz9vndw4w8p60d0n7vg3n9sqvta7n6t2"
				
				};
	
				var contractdecimalarray={
					"gZIL": 15,
					"ZWAP":12,
					"BARTER":  2,
					"BOLT":  18,
					"CARB":  8,
					"RedC":  2,
					"SERGS":  5,
					"SHRK":  6,
					
					
					"ZLF":  5,
					"ZLP":  18,
					"ZYF":  3,
					"XSGD": 6,
					"PORT": 4
					}	;
	
	
				if (selectedD!="OTHER")
				{
					// change smart contract address to gzil and token decimal to 15
					document.getElementById("smartcontractaddressgive").value=contractaddrarray[selectedD];
					//document.getElementById("tokendecimal").value=contractdecimalarray[selectedD];
					document.getElementById("smartcontractaddressgive").disabled = true; 
					//document.getElementById("tokendecimal").disabled = true; 						
				}
				
				 	
			   
				else  
				{
					// change smart contract address to gzil and token decimal to 15
					document.getElementById("smartcontractaddressgive").value="";
					//document.getElementById("tokendecimal").value="";					 
					
					document.getElementById("smartcontractaddressgive").disabled = false; 
					//document.getElementById("tokendecimal").disabled = false; 					
				}				   
			   
			   symbol=document.getElementById("tokennamegive").value;
			   getcurrentstatgive(symbol);
			   updatepriceandexchangerate()
			   
			   
			});
	}); 
	
		
	 
	 
   
   
   
   
  

async function getcurrentstatgive(symbol)
{ 
		var request = new XMLHttpRequest();

		//https://api.zilstream.com/tokens/zwap
		url="https://api.zilstream.com/tokens/"+symbol;	
		request.open('GET', url, false);		
		request.onreadystatechange = await async function () {
		if (this.readyState === 4) {
	 
				console.log("Await start corefetching");				
				console.log(this.responseText);
				
				 
				if (this.responseText.length<3)
				{
						console.log("EMPTY");
						 
						return 0;
				}
				else
				{
					stat=JSON.parse( this.responseText);
					currentsupply=stat.current_supply;
					dailyvolume=stat.daily_volume;
					marketcap=stat.market_cap;
					rate=stat.rate;
					rateusd=stat.rate_usd;
					
					document.getElementById("givesymbol").innerHTML="Symbol: "+symbol;						
					document.getElementById("givedailyvolume").innerHTML="Daily Volume: $"+properdecimal(dailyvolume);						
					document.getElementById("givemarketcap").innerHTML="Market Cap: $"+properdecimal(marketcap);					
					document.getElementById("givecurrentrate").innerHTML="Current Rate: $"+properdecimal(rateusd);
			/*		
			<p id="givesymbol"> Symbol: ZIL </p>
			<p> ATH: $0.51</p>
  			<p> ATL: $0.02 </p> 			
			<p id="givedailyvolume"> Daily Volume: $1,400,000,000 </p>			
			<p id="givemarketcap"> market_cap: 107003982.8 </p>			
			<p id="givecurrentrate"> Current Rate: $0.172</p>						
				*/	
					
					console.log(currentsupply);
			  
					console.log("Await end corefetching");
			 	 	 					
					return 1;
				
				}
				

 
		  }
		  
		  
		  
		};

		request.send();

}







async function getcurrentstatget(symbol)
{ 
		var request = new XMLHttpRequest();

		//https://api.zilstream.com/tokens/zwap
		url="https://api.zilstream.com/tokens/"+symbol;	
		request.open('GET', url, false);		
		request.onreadystatechange = await async function () {
		if (this.readyState === 4) {
	 
				console.log("Await start corefetching");				
				console.log(this.responseText);
				
				 
				if (this.responseText.length<3)
				{
						console.log("EMPTY");
						 
						return 0;
				}
				else
				{
					stat=JSON.parse( this.responseText);
					currentsupply=stat.current_supply;
					dailyvolume=stat.daily_volume;
					marketcap=stat.market_cap;
					rate=stat.rate;
					rateusd=stat.rate_usd;
					
					document.getElementById("getsymbol").innerHTML="Symbol: "+symbol;						
					document.getElementById("getdailyvolume").innerHTML="Daily Volume: $"+properdecimal(dailyvolume);					
					document.getElementById("getmarketcap").innerHTML="Market Cap: $"+properdecimal(marketcap);				
					document.getElementById("getcurrentrate").innerHTML="Current Rate: $"+properdecimal(rateusd);
			/*		
			<p id="givesymbol"> Symbol: ZIL </p>
			<p> ATH: $0.51</p>
  			<p> ATL: $0.02 </p> 			
			<p id="givedailyvolume"> Daily Volume: $1,400,000,000 </p>			
			<p id="givemarketcap"> market_cap: 107003982.8 </p>			
			<p id="givecurrentrate"> Current Rate: $0.172</p>						
				*/	
					
					console.log(currentsupply);
			  
					console.log("Await end corefetching");
			 	 	 					
					return 1;
				
				}
				

 
		  }
		  
		  
		  
		};

		request.send();

}

	
// usage:   num2dec=properdecimal(num2dec);
function properdecimal(num)
{
	num2 = parseFloat(num).toFixed(2);
	return numberWithCommas(num2);
} 

// usage:   num2dec=properdecimal(num2dec);
function properdecimal2(num)
{
	num2 = parseFloat(num).toFixed(4);
	return numberWithCommas(num2);
} 
// usage:   num2dec=properdecimal(num2dec);
function properdecimal3(num)
{
	num2 = parseFloat(num).toFixed(5);
	return numberWithCommas(num2);
} 

function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}   



function isNumber(val) {
    return !isNaN(val);
}



async function getLatestBlockNumber()
{
	const txBlock = await zilliqa.blockchain.getLatestTxBlock();	
	latestblocknum=txBlock.result.header.BlockNum;
	return latestblocknum;
	
}

			
 
function enablesettings()
{
	if (document.getElementById("slippagetolerance").disabled )
		document.getElementById("slippagetolerance").disabled = false; 		
	else
		document.getElementById("slippagetolerance").disabled = true;

	if (document.getElementById("transactiondeadline").disabled )
		document.getElementById("transactiondeadline").disabled = false; 		
	else
		document.getElementById("transactiondeadline").disabled = true;
}


/*
SwapExactTokensForTokens
Parameter	Type	Description
token0_address	ByStr20	The token address of the ZRC-2 token to send (sell)
token1_address	ByStr20	The token address of the ZRC-2 token to take (buy)
token0_amount	Uint128	The exact amount of token0 to be sent (sold)
min_token1_amount	Uint128	The minimum amount of token1 to be taken (bought)
deadline_block	BNum	The deadline that this transaction must be executed by
*/



// need to approve first
async function swapExactTokensForTokens(token0_address,token1_address,token0_amount,min_token1_amount,deadline_block, recipient_address) {
  try {

	
	const myGasPrice = Zilliqa.units.toQa('3000', Zilliqa.units.Units.Li);
    const deployedContract = zilliqa.contracts.at(
      myzilliqaswapbech32address,  // zilswap testnet    also 0x1a62dd9c84b0c8948cb51fc664ba143e7a34985c
    );
 
    callTx = await deployedContract.callWithoutConfirm(
      'SwapExactTokensForTokens',
      [
		{	
          vname: 'token0_address',
          type: 'ByStr20',
          value: token0_address,  //bystr20 address of token address that you want
        },		  
        {
          vname: 'token1_address',
          type: 'ByStr20',
          value: token1_address,
        },
		{
		
          vname: 'token0_amount',
          type: 'Uint128',
          value: token0_amount,
        },	
		{
          vname: 'min_token1_amount',
          type: 'Uint128',
          value: min_token1_amount, //zil1p5z28khuanyfw30a98jmt0q4fcsqwav7564uge  my zilpay wallet address
        },		
		{
          vname: 'deadline_block',
          type: 'BNum',
          value: deadline_block, //zil1p5z28khuanyfw30a98jmt0q4fcsqwav7564uge  my zilpay wallet address
        },	
        {
          vname: 'recipient_address',
          type: 'ByStr20',
          value: recipient_address,
        },		
		
      ],
      {
        // amount, gasPrice and gasLimit must be explicitly provided
        version: VERSION,
        //amount: new Zilliqa.BN(0),
		//nonce: nextnonce,
		amount: new Zilliqa.BN(0),  // 5000 zil
        gasPrice: myGasPrice,
        gasLimit: Zilliqa.Long.fromNumber(80000),  // max at 80000, more than 80000 it will return error
		 
		
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
			document.getElementById("txconfirm").innerHTML="Tx Confirmed.";
		 
	}
	  
	 
  } catch (err) {
    console.log(err);
	return 0;
  }
}






/*
SwapExactTokensForZIL
token_address	ByStr20	The token address of the pool to add liquidity to
token_amount	Uint128	The exact amount of ZRC-2 tokens to be sent (sold)
min_zil_amount	Uint128	The minimum amount of ZIL tokens to be taken (bought)
deadline_block	BNum	The deadline that this transaction must be executed by
*/

async function swapExactTokensForZIL(token_address,token_amount,min_zil_amount, deadline_block) {
  try {
    
	
	const myGasPrice = Zilliqa.units.toQa('3000', Zilliqa.units.Units.Li);
    const deployedContract = zilliqa.contracts.at(
      myzilliqaswapbech32address,  // zilswap testnet    also 0x1a62Dd9C84b0C8948cb51FC664ba143e7A34985c
    );
 
    callTx = await deployedContract.callWithoutConfirm(
      'SwapExactTokensForZIL',
      [
		{	
          vname: 'token_address',
          type: 'ByStr20',
          value: token_address,  //bystr20 address of token address that you want
        },		  
        {
          vname: 'token_amount',
          type: 'Uint128',
          value: token_amount,
        },
		{
		
          vname: 'min_zil_amount',
          type: 'Uint128',
          value: min_zil_amount,
        },	
		{
          vname: 'deadline_block',
          type: 'BNum',
          value: deadline_block,  
        },		
		
		
      ],
      {
        // amount, gasPrice and gasLimit must be explicitly provided
        version: VERSION,
        //amount: new Zilliqa.BN(0),
		amount: new Zilliqa.BN(rawzilamountgive),  // 5000 zil
        gasPrice: myGasPrice,
        gasLimit: Zilliqa.Long.fromNumber(80000),  // max at 80000, more than 80000 it will return error
		 
		
      },
      false,
    );

 
    // check the pending status
    const pendingStatus = await zilliqa.blockchain.getPendingTxn(callTx.id);
 
	document.getElementById("txid").innerHTML="TxID="+callTx.id; 
	document.getElementById("txconfirm").innerHTML=animatespinner;



	
	var waitforconfirm=true;
    if (waitforconfirm)
	{
			console.log(`Waiting transaction be confirmed`);
			const confirmedTxn = await callTx.confirm(callTx.id);
			document.getElementById("txconfirm").innerHTML="Tx Confirmed.";
		 
	}
	  
	 
  } catch (err) {
    console.log(err);
	return 0;
  }
}




async function swapExactZILForTokens(rawzilamountgive, token_address,min_token_amount,deadline_block,recipient_address) {
  try {
    
	
	const myGasPrice = Zilliqa.units.toQa('3000', Zilliqa.units.Units.Li);
    const deployedContract = zilliqa.contracts.at(
      myzilliqaswapbech32address,  // zilswap testnet    also 0x1a62Dd9C84b0C8948cb51FC664ba143e7A34985c
    );
 
    callTx = await deployedContract.callWithoutConfirm(
      'SwapExactZILForTokens',
      [
		{	
          vname: 'token_address',
          type: 'ByStr20',
          value: token_address,  //bystr20 address of token address that you want
        },		  
        {
          vname: 'min_token_amount',
          type: 'Uint128',
          value: min_token_amount,
        },
		{
		
          vname: 'deadline_block',
          type: 'BNum',
          value: deadline_block,
        },	
		{
          vname: 'recipient_address',
          type: 'ByStr20',
          value: recipient_address, //  '0x0D04A3dAFcEcc89745fd29e5b5bc154E2007759e', //zil1p5z28khuanyfw30a98jmt0q4fcsqwav7564uge  my zilpay wallet address
        },		
		
		
      ],
      {
        // amount, gasPrice and gasLimit must be explicitly provided
        version: VERSION,
        //amount: new Zilliqa.BN(0),
		amount: new Zilliqa.BN(rawzilamountgive),  // 5000 zil
        gasPrice: myGasPrice,
        gasLimit: Zilliqa.Long.fromNumber(80000),  // max at 80000, more than 80000 it will return error
		 
		
      },
      false,
    );

 
    // check the pending status
    const pendingStatus = await zilliqa.blockchain.getPendingTxn(callTx.id);
 
	document.getElementById("txid").innerHTML="TxID="+callTx.id; 
	document.getElementById("txconfirm").innerHTML=animatespinner;



	
	var waitforconfirm=true;
    if (waitforconfirm)
	{
			console.log(`Waiting transaction be confirmed`);
			const confirmedTxn = await callTx.confirm(callTx.id);
			document.getElementById("txconfirm").innerHTML="Tx Confirmed.";
		 
	}
	  
	 
  } catch (err) {
    console.log(err);
	return 0;
  }
}

 
//const myzilliqaswapaddress="0x1a62dd9c84b0c8948cb51fc664ba143e7a34985c";
//const myzilliqaswapbech32address="zil1rf3dm8yykryffr94rlrxfws58earfxzu5lw792";
//const defaultwalletaddress='0x0d04a3dafcecc89745fd29e5b5bc154e2007759e';


// note address in the parameter must be 0x04333E1536851FAc5fC19b454C496A94A76C0785 must have 0x
async function checkallowance(tokenaddress, walletaddress){
	//console.log("tokenaaddress at checkallowance=",tokenaddress);
	const addr=tokenaddress.substring(2); // remove the 0x
	console.log("addr at checkallowance=",addr);	
	const smartContractState = await zilliqa.blockchain.getSmartContractState(addr); // query the ZRC2 token smart contract address	
	
	try {
	// note both defaultwalletaddress and myzilliqaswapaddress has 0x infront
		amountallowanace=smartContractState.result.allowances[walletaddress][myzilliqaswapaddress]; 
		return (amountallowanace);
	}
	catch (e) {
		return 0;		
	}
}


//smartContractState.result.balances[defaultwalletaddress]
// note address in the parameter must be 0x04333E1536851FAc5fC19b454C496A94A76C0785 must have 0x
async function getbalance(tokenaddress, walletaddress){
	//console.log(tokenaddress);	
	const addr=tokenaddress.substring(2);
	const smartContractState = await zilliqa.blockchain.getSmartContractState(addr); // 
	try {
	// note both defaultwalletaddress and myzilliqaswapaddress has 0x infront
		bal=smartContractState.result.balances[walletaddress];	
		return (bal);
	}
	catch (e) {
		return 0;		
	}	
	
}


async function getbalanceZIL(walletaddress){
	//console.log(walletaddress);	
	const addr=walletaddress.substring(2);
	const smartContractState = await zilliqa.blockchain.getBalance(addr); // 
	try {
	 
		bal=smartContractState.result.balance;	
		return (bal);
	}
	catch (e) {
		return 0;		
	}	
	
}

 


//AuthorizedMoveIfSufficientBalance(from: ByStr20, to: ByStr20, amount: Uint128)
//transition IncreaseAllowance(spender: ByStr20, amount: Uint128)
async function increaseAllowance(tokenziladdress, spenderaddress, rawamount ) {
  try {
	  
	  
	 console.log("increaseAllowance");
      
	const myGasPrice = Zilliqa.units.toQa('3000', Zilliqa.units.Units.Li);
    const deployedContract = zilliqa.contracts.at(
      tokenziladdress,  // zilswap testnet    also 0x1a62Dd9C84b0C8948cb51FC664ba143e7A34985c
    );
 
    callTx = await deployedContract.callWithoutConfirm(
      'IncreaseAllowance',
      [
		{	
          vname: 'spender',
          type: 'ByStr20',
          value: spenderaddress,  //bystr20 address of token address that you want
        },		  
         
		{
		
          vname: 'amount',
          type: 'Uint128',
          //value: rawamount.toString(),
		  value: "3402823669209384634633746074317682114"
        },	
		 
         	
      ],
      {
        // amount, gasPrice and gasLimit must be explicitly provided
        version: VERSION,
        //amount: new Zilliqa.BN(0),
		amount: new Zilliqa.BN(0),  // 5000 zil
        gasPrice: myGasPrice,
        gasLimit: Zilliqa.Long.fromNumber(80000),  // max at 80000, more than 80000 it will return error
		 
		
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
    console.log(`The increaseAllowance transaction id is:`, callTx.id);
 
	document.getElementById("txconfirm").innerHTML=animatespinner;



	
	var waitforconfirm=true;
    if (waitforconfirm)
	{
			console.log(`Waiting transaction be confirmed`);
			const confirmedTxn = await callTx.confirm(callTx.id);
			document.getElementById("txconfirm").innerHTML="Congratulations! Your message is permanently stored in Zilliqa Blochchain!";
		 
	}
	  
	 
  } catch (err) {
    console.log(err);
	return 0;
  }
}


</script>
</html>