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
var MESAPrice;


var pluttokenaddress="0xb192d5fC358D35194282a1a06814aba006198010"; // plut token address mainnet

 
 
 
 
 
//<p id="currentplutpriceid"></p><br>
//<p id="currentbusdpriceid"></p><br>
 
const getPLUTPrice = async event => {
 
//console.log('getHistoricalPrice');

let string="https://api.coingecko.com/api/v3/simple/price?ids=mymessage&vs_currencies=usd";

await fetch(string)
.then(resp => resp.json())
.then(data => 
{
    MESAPrice = data['mymessage']['usd']
 var formattedvalue=properdecimal(data['mymessage']['usd'],3);
document.getElementById("meas-price").innerHTML='$'+formattedvalue+' USD'


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
document.getElementById("btc-price").innerHTML='$'+formattedvalue+' USD'
 
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

document.getElementById("eth-price").innerHTML='$'+formattedvalue+' USD'

}
 
 )


}  
  
 
  
  
const getPLUTVolume = async event => {
 
//console.log('getHistoricalPrice');

let string="https://api.coingecko.com/api/v3/coins/mymessage/market_chart?vs_currency=usd&days=0&interval=daily";

await fetch(string)
.then(resp => resp.json())
.then(data => 
{
var temp=data['total_volumes'][0];
console.log(temp);
//var value=temp.split(',');

var formattedvalue=properdecimal(temp[1],2);

document.getElementById("mesa-volume").innerHTML='$'+formattedvalue+' USD'
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
				 
	// userwalletplutbalance=properdecimal(userwalletplutbalance,2);
	 
	
	
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
    
	balance=await getPLUTWalletBalance('0xA39F29647099E4d6aA5ac865416D869A4Aa280Cf');
    document.getElementById('abm-prog_tram').style.width = (balance / 500000000000 * 100) + '%'
	document.getElementById("abm-balance_team").innerHTML=properdecimal(balance, 2);

	balance=await getPLUTWalletBalance('0x7eCCA533397246aB067E04C433F7d6D8aac9Dc3e');
    document.getElementById('abm-prog_advisors').style.width = (balance / 200000000000 * 100) + '%'
	document.getElementById("abm-balance_advisors").innerHTML=properdecimal(balance, 2);

	balance=await getPLUTWalletBalance('0xaA74e7A1290bE31328AaC053a5Dea0db46308C3a');
    document.getElementById('abm-prog_reserve').style.width = (balance / 250000000000 * 100) + '%'
	document.getElementById("abm-balance_reserve").innerHTML=properdecimal(balance, 2);

	balance=await getPLUTWalletBalance('0xa93E86aAA37c42024d87eE57Ef0A12060B97e9d0');
    document.getElementById('abm-prog_lp').style.width = (balance / 982313546423.89 * 100) + '%'
	document.getElementById("abm-balance_lp").innerHTML=properdecimal(balance, 2);

	balance=await getPLUTWalletBalance('0x9176E06d7b184aB808288CC04AB4456196616127');
    document.getElementById('abm-prog_legal').style.width = (balance / 500000000000 * 100) + '%'
	document.getElementById("abm-balance_legal").innerHTML=properdecimal(balance, 2);

	balance=await getPLUTWalletBalance('0x641D2936626486dCe5251021f6A06b20b8220799');
    document.getElementById('abm-prog_liquidity').style.width = (balance / 573021767401.71 * 100) + '%'
	document.getElementById("abm-balance_liquidity").innerHTML=properdecimal(balance, 2);

	balance=await getPLUTWalletBalance('0x37c633600130D04FeEe8C1cE5A93B7341b8a5064');
    document.getElementById('abm-prog_private').style.width = (balance / 1540000000000 * 100) + '%'
	document.getElementById("abm-balance_private").innerHTML=properdecimal(balance, 2);

	balance=await getPLUTWalletBalance('0x903540CF49193e111fC14AD063c4FB15B6bA8107');
    document.getElementById('abm-prog_public').style.width = (balance / 94444444444.44 * 100) + '%'
	document.getElementById("abm-balance_public").innerHTML=properdecimal(balance, 2);
		
	var totalsupply=5000000000000;
	wallet1=await getWalletBalancePLUT('0xA39F29647099E4d6aA5ac865416D869A4Aa280Cf');
	wallet2=await getWalletBalancePLUT('0x7eCCA533397246aB067E04C433F7d6D8aac9Dc3e');
	wallet3=await getWalletBalancePLUT('0xaA74e7A1290bE31328AaC053a5Dea0db46308C3a');
	wallet4=await getWalletBalancePLUT('0xa93E86aAA37c42024d87eE57Ef0A12060B97e9d0');

	wallet5=await getWalletBalancePLUT('0x9176E06d7b184aB808288CC04AB4456196616127');
	wallet6=await getWalletBalancePLUT('0x641D2936626486dCe5251021f6A06b20b8220799');
	wallet7=await getWalletBalancePLUT('0x37c633600130D04FeEe8C1cE5A93B7341b8a5064');
	wallet8=await getWalletBalancePLUT('0x903540CF49193e111fC14AD063c4FB15B6bA8107');
	
	
	
	
	burnwallet=await getWalletBalancePLUT('0x000000000000000000000000000000000000dEaD');

	var circulationsupplyBefore=totalsupply-wallet1-wallet2-wallet3-wallet4-wallet5-wallet6-wallet7-wallet8

	circulationsupply=properdecimal(circulationsupplyBefore,2);
	document.getElementById("circulation_supply").innerHTML=circulationsupply;

    const circulationBefore = Number(circulationsupplyBefore)
    document.getElementById('market_cap').innerHTML = properdecimal(new BigNumber(circulationBefore).multipliedBy(Number(MESAPrice)).toFixed(2), 2);
 
	// stakingv2wallet=properdecimal(stakingv2wallet,2);
	// stakingv3wallet=properdecimal(stakingv3wallet,2);
	// stakingv4wallet=properdecimal(stakingv4wallet,2);
	// stakingv5wallet=properdecimal(stakingv5wallet,2);	
	// stakingv6wallet=properdecimal(stakingv6wallet,2);	
	// document.getElementById("stakingv2id").innerHTML='Staking V2 Locked= '+stakingv2wallet+' PLUT';	// 	
	// document.getElementById("stakingv3id").innerHTML='Staking V3 Locked= '+stakingv3wallet+' PLUT';	// 	
	// document.getElementById("stakingv4id").innerHTML='Staking V4 Locked= '+stakingv4wallet+' PLUT';	// 	
	// document.getElementById("stakingv5id").innerHTML='Staking V5 Locked= '+stakingv5wallet+' PLUT';	// 	
	// document.getElementById("stakingv6id").innerHTML='Staking V6 Locked= '+stakingv6wallet+' PLUT';	// 	
	// burnwallet=properdecimal(burnwallet,2);
	// document.getElementById("totalburnamountid").innerHTML='Amount token burned= '+burnwallet+' PLUT';	// 	

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
