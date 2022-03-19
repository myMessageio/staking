 /*
 
 Note, you need to unlock metamask first before you can deposit, withdraw 
 any send call!
 
 If not it will just do nothing and report  RPC Error: Invalid parameters: must provide an Ethereum address in the background.


this one for reward not plut but other token

 
 */
window.addEventListener('load', init);

/// global variables
var firsttime;
var previouslastradedprice;
var tablemarkethistroyrow;
var staking;
var useraddr;


var pluttokenaddress="0x2984f825bfe72e55e1725d5c020258e81ff97450"; // plut token address mainnet

 
 
 
 
 
//<p id="currentplutpriceid"></p><br>
//<p id="currentbusdpriceid"></p><br>
 
const getPLUTPrice = async event => {
 
//console.log('getHistoricalPrice');

let string="https://api.coingecko.com/api/v3/simple/price?ids=plutos-network&vs_currencies=usd";

await fetch(string)
.then(resp => resp.json())
.then(data => 
{
 var formattedvalue=properdecimal(data['plutos-network']['usd'],3);
document.getElementById("currentplutpriceid").innerHTML='Current PLUT price= $'+formattedvalue+' USD'


} 
 )


} 
 
 
const getBTCPrice = async event => {
 
//console.log('getHistoricalPrice');

let string="https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd";

await fetch(string)
.then(resp => resp.json())
.then(data => 
 
 {
 var formattedvalue=properdecimal(data['bitcoin']['usd'],2);
document.getElementById("currentbtcpriceid").innerHTML='Current BTC price= $'+formattedvalue+' USD'
 
 }
 )


}  
 
const getETHPrice = async event => {
 
//console.log('getHistoricalPrice');

let string="https://api.coingecko.com/api/v3/simple/price?ids=ethereum&vs_currencies=usd";

await fetch(string)
.then(resp => resp.json())
.then(data => 

{
 var formattedvalue=properdecimal(data['ethereum']['usd'],2);

document.getElementById("currentethpriceid").innerHTML='Current ETH price= $'+formattedvalue+' USD'

}
 
 )


}  
  
 
  
  
const getPLUTVolume = async event => {
 
//console.log('getHistoricalPrice');

let string="https://api.coingecko.com/api/v3/coins/plutos-network/market_chart?vs_currency=usd&days=0&interval=daily";

await fetch(string)
.then(resp => resp.json())
.then(data => 
{
var temp=data['total_volumes'][0];
console.log(temp);
//var value=temp.split(',');

var formattedvalue=properdecimal(temp[1],2);

document.getElementById("currentplutvolumeid").innerHTML='Current PLUT volume= $'+formattedvalue+' USD'
}
 
 )


} 
 
 


function isNumber (value)
{
 

 if(typeof value == 'number')
	return true;
 else
	return false;


}

 

 
 

 
 
    
   



function converttimestampto24time(s) {

var ts = new Date(s* 1e3).toLocaleTimeString("en-US", { hour12: false });
return (ts);


    //return new Date(s * 1e3).toISOString().slice(-13, -5);
}


  
 




async function getPLUTWalletBalance(walletaddress)
{
	
				      
	console.log("getuserwalletbalance");	 
	var userwalletplutbalance;
	 
	
	
	
	 
	 
			//console.log("getwalletbalancemint");
			// The minimum ABI to get ERC20 Token balance
			let minABI = [
			  // balanceOf
			  {
				"constant":true,
				"inputs":[{"name":"_owner","type":"address"}],
				"name":"balanceOf",
				"outputs":[{"name":"balance","type":"uint256"}],
				"type":"function"
			  },
			  // decimals
			  {
				"constant":true,
				"inputs":[],
				"name":"decimals",
				"outputs":[{"name":"","type":"uint8"}],
				"type":"function"
			  }
			];
			console.log("`before call");

			let contract = new web3.eth.Contract(minABI,pluttokenaddress);
 
			  //bal = await contract.methods.balanceOf(useraddr);
				bal = await contract.methods.balanceOf(walletaddress).call();
				console.log('bal=',bal);
  
				bal =bal/(10**18); 

				userwalletplutbalance=bal;
				 
	userwalletplutbalance=properdecimal(userwalletplutbalance,2);
	 
	
	
	return   userwalletplutbalance ;
}






async function getMetric(){
	console.log("getStakedAmount");
	/*
   
Wallet Address: 0x678555dd4e1023affd859789cfce5ac87eced230<br>
Quantity: <p id="mininingreservebalid"></p><br>

Liquidity Fund<br>
Wallet Address: 0x860e88ee74b1a9a42baac7b8b77763865d929495<br>
Quantity: <p id="liquidityfundbalid"></p><br>
 
Ecosystem Growth<br>
Wallet Address: 0x3d82d440c076b8cbfa4cc1ada4b0b7a129b96ddf<br>
Quantity: <p id="ecosystemgrowthbalid"></p><br>

Fundraising<br>
Wallet Address: 0xfaf34224096410d8d3b522d88f2189e7531ca805<br>
Quantity: <p id="fundraisingbalid"></p><br>
 
Team & Advisors<br>
Wallet Address: 0xc2191a11609bff17baf0ee699810de3d78bae243<br>	
	
	
	*/
	//console.log("wallet balance for team");
	balance=await getPLUTWalletBalance('0x678555dd4E1023AffD859789cfcE5ac87ECEd230');
	//console.log("miningreservebalance=",miningreservebalance );
	document.getElementById("mininingreservebalid").innerHTML='Current balance= '+balance+' PLUT';
				 
	balance=await getPLUTWalletBalance('0x860e88ee74b1a9a42baac7b8b77763865d929495');
	document.getElementById("liquidityfundbalid").innerHTML='Current balance= '+balance+' PLUT';	// 	

	balance=await getPLUTWalletBalance('0x3d82d440c076b8cbfa4cc1ada4b0b7a129b96ddf');
	document.getElementById("ecosystemgrowthbalid").innerHTML='Current balance= '+balance+' PLUT';	// 	

	balance=await getPLUTWalletBalance('0xfaf34224096410d8d3b522d88f2189e7531ca805');
	document.getElementById("fundraisingbalid").innerHTML='Current balance= '+balance+' PLUT';	// 	

	balance=await getPLUTWalletBalance('0xc2191a11609bff17baf0ee699810de3d78bae243');
	document.getElementById("teamadvisorsbalid").innerHTML='Current balance= '+balance+' PLUT';	// 	
	
		
	var totalsupply=100000000;
	wallet1=await getWalletBalancePLUT('0xFaF34224096410d8D3b522D88f2189E7531ca805');
	wallet2=await getWalletBalancePLUT('0x678555dd4E1023AffD859789cfcE5ac87ECEd230');
	wallet3=await getWalletBalancePLUT('0x3d82D440C076B8cbfa4Cc1aDA4b0B7a129b96dDf');
	wallet4=await getWalletBalancePLUT('0xc2191a11609BfF17bAf0Ee699810DE3D78bae243');
	wallet5=await getWalletBalancePLUT('0x860E88eE74b1A9A42bAAc7b8B77763865d929495');
	
	burnwallet			=await getWalletBalancePLUT('0x860E88eE74b1A9A42bAAc7b8B77763865d929495');
	stakingv2wallet		=await getWalletBalancePLUT('0xFd9779D1816B3EccfE81A8bac69Cf32453708614');
	stakingv3wallet		=await getWalletBalancePLUT('0xA5662542fE6Dd81347FBa4E05786B93306C3c2E3');	
	stakingv4wallet		=await getWalletBalancePLUT('0x5eA6ccCF1bC78018F3782F7cE8A5DF764429d6b6');		
	stakingv5wallet		=await getWalletBalancePLUT('0x59644639e9ED146515d380422B43b816F12a6e7a');	
	stakingv6wallet		=await getWalletBalancePLUT('0xe43be42841251131568cc85E5209F04D2E0Ea690');
	
	
	
	
	burnwallet=await getWalletBalancePLUT('0x000000000000000000000000000000000000dEaD');

	var circulationsupply=totalsupply-wallet1-wallet2-wallet3-wallet4-wallet5-burnwallet-stakingv2wallet-stakingv3wallet-stakingv4wallet-stakingv5wallet-stakingv6wallet;

	circulationsupply=properdecimal(circulationsupply,2);

	document.getElementById("circulationsupplyid").innerHTML='Circulation Supply= '+circulationsupply+' PLUT';	// 	

 
	stakingv2wallet=properdecimal(stakingv2wallet,2);
	stakingv3wallet=properdecimal(stakingv3wallet,2);
	stakingv4wallet=properdecimal(stakingv4wallet,2);
	stakingv5wallet=properdecimal(stakingv5wallet,2);	
	stakingv6wallet=properdecimal(stakingv6wallet,2);	
	document.getElementById("stakingv2id").innerHTML='Staking V2 Locked= '+stakingv2wallet+' PLUT';	// 	
	document.getElementById("stakingv3id").innerHTML='Staking V3 Locked= '+stakingv3wallet+' PLUT';	// 	
	document.getElementById("stakingv4id").innerHTML='Staking V4 Locked= '+stakingv4wallet+' PLUT';	// 	
	document.getElementById("stakingv5id").innerHTML='Staking V5 Locked= '+stakingv5wallet+' PLUT';	// 	
	document.getElementById("stakingv6id").innerHTML='Staking V6 Locked= '+stakingv6wallet+' PLUT';	// 	
	burnwallet=properdecimal(burnwallet,2);
	document.getElementById("totalburnamountid").innerHTML='Amount token burned= '+burnwallet+' PLUT';	// 	

} 

 
 
async function loadweb3() {

    window.web3  = new Web3('https://bsc-dataseed1.binance.org:443');
 
}
   

async function loadweb3ori()
{

    if (window.ethereum) {
        //window.web3 = new Web3(ethereum);
		//window.web3  = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io/v3/270ba568374f47fe99aed619bfef776a"))
		window.web3   = new Web3('https://bsc-dataseed1.binance.org:443');
		//window.web3 = new Web3.providers.HttpProvider("https://mainnet.infura.io/v3/270ba568374f47fe99aed619bfef776a");
 
        try {
            await ethereum.enable();
           // var accounts= await web3.eth.getAccounts();
		//	defaultwalletaddress=accounts[0];
			// useraddr=defaultwalletaddress;
			//console.log(accounts);
             
        } catch (error) {
            // User denied account access...
			console.log("error..");
			console.log(error);
        }
    }
    // Legacy dapp browsers...
    else if (window.web3) {
       // window.web3 = new Web3(web3.currentProvider);
		//window.web3  = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io/v3/270ba568374f47fe99aed619bfef776a"))


		window.web3   = new Web3('https://bsc-dataseed1.binance.org:443');
        // Acccounts always exposed
		//defaultwalletaddress=web3.eth.defaultAccount;
		// useraddr=defaultwalletaddress;
		//console.log("legacy dapp browsers");
         
    }
    // Non-dapp browsers...
    else {
        console.log('Non-Ethereum browser detected. You should consider trying MetaMask!');
    }


 
}






async function init() {
   previouslastradedprice=0;
   tablemarkethistroyrow=0;
   firsttime=1;
   await loadweb3();
    
    
   firsttime=0;
   
	getMetric();
	getPLUTPrice();
	getPLUTVolume();	
	getBTCPrice();
	getETHPrice();	
 } 
 
  
	 





// convert the ip address to a decimal
// assumes dotted decimal format for input
function convertIpToDecimal(ip) {
        // a not-perfect regex for checking a valid ip address
	// It checks for (1) 4 numbers between 0 and 3 digits each separated by dots (IPv4)
	// or (2) 6 numbers between 0 and 3 digits each separated by dots (IPv6)
	var ipAddressRegEx = /^(\d{0,3}\.){3}.(\d{0,3})$|^(\d{0,3}\.){5}.(\d{0,3})$/;
	var valid = ipAddressRegEx.test(ip);
	if (!valid) {
		return false;
	}
	var dots = ip.split('.');
	// make sure each value is between 0 and 255
	for (var i = 0; i < dots.length; i++) {
		var dot = dots[i];
		if (dot > 255 || dot < 0) {
			return false;
		}
	}
	if (dots.length == 4) {
		// IPv4
		return ((((((+dots[0])*256)+(+dots[1]))*256)+(+dots[2]))*256)+(+dots[3]);
	} else if (dots.length == 6) {
		// IPv6
		return ((((((((+dots[0])*256)+(+dots[1]))*256)+(+dots[2]))*256)+(+dots[3])*256)+(+dots[4])*256)+(+dots[5]);
	}
	return false;
}


 

  function httpGet(theUrl)
{

	 console.log(theUrl);
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
     xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
		 console.log(xmlhttp.responseText);
            return xmlhttp.responseText;
			
        }
    }
    xmlhttp.open("GET", theUrl, false );
    xmlhttp.send();    
}

  

  

	 
	 
function getWalletBalanceMINT(useraddr) {
			console.log("getwalletbalancemint");
			// The minimum ABI to get ERC20 Token balance
			let minABI = [
			  // balanceOf
			  {
				"constant":true,
				"inputs":[{"name":"_owner","type":"address"}],
				"name":"balanceOf",
				"outputs":[{"name":"balance","type":"uint256"}],
				"type":"function"
			  },
			  // decimals
			  {
				"constant":true,
				"inputs":[],
				"name":"decimals",
				"outputs":[{"name":"","type":"uint8"}],
				"type":"function"
			  }
			];

			let contract = new web3.eth.Contract(minABI,pluttokenaddress);
			async function getBalance() {
			  //bal = await contract.methods.balanceOf(useraddr);
				bal = await contract.methods.balanceOf(useraddr).call();
				console.log("Balance=",bal);
				return bal;
			}

			getBalance().then(function (result) {
				bal =bal/(10**18); 		
				console.log("after Balance=", bal);
				document.getElementById("deposittokenid").innerHTML="You have "+bal.toFixed(3)+" MINT";		
			});
 
   
}	 
	    
 
 
	 
	 
async function getWalletBalancePLUT(useraddr) {
			console.log("getwalletbalancemint");
			// The minimum ABI to get ERC20 Token balance
			let minABI = [
			  // balanceOf
			  {
				"constant":true,
				"inputs":[{"name":"_owner","type":"address"}],
				"name":"balanceOf",
				"outputs":[{"name":"balance","type":"uint256"}],
				"type":"function"
			  },
			  // decimals
			  {
				"constant":true,
				"inputs":[],
				"name":"decimals",
				"outputs":[{"name":"","type":"uint8"}],
				"type":"function"
			  }
			];

			let contract = new web3.eth.Contract(minABI,pluttokenaddress);
			 
			  //bal = await contract.methods.balanceOf(useraddr);
				bal = await contract.methods.balanceOf(useraddr).call();
				console.log("Balance=",bal);
				bal =bal/(10**18); 		
				return bal;
			 
   
}	 





	     
 
 
// usage:   num2dec=properdecimal(num2dec);
function properdecimal(num, decimalpoint)
{
  var num2 = parseFloat(num).toFixed(decimalpoint);
  return numberWithCommas(num2);
} 
 
function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}
