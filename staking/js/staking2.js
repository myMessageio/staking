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
var tokendecimal=18;
var defaultwalletaddress;
var mingasprice= '6000000000'; // PLUT gas price is 25000 gwei, much higher than eth
var eth="0x0000000000000000000000000000000000000000";
var pluttokenaddress=""; // plut token address mainnet
var myContractAddress=''; // staking V5 mainnet
////////////////////////new
var poolAmmount;
var symbol;
var isPlut;
var rewardtokenaddress="0x2984F825Bfe72e55e1725D5c020258E81ff97450"; // real busd in mainnet
 
var rewardsymbol="PLUT";
var rewardtokendecimal=18;
 

 
 
 
 
 

function isNumber (value)
{
 

 if(typeof value == 'number')
	return true;
 else
	return false;


}

 



async function deposittoken(){
 
  amount1=document.getElementById("iddeposittokenamount").value; 
   approvetransfer(amount1);

}


 





async function approvetransfer(depositamount)
{
let abi ='[{"constant": true,"inputs": [],"name": "name","outputs": [{"name": "","type": "string"}],"payable": false,"stateMutability": "view","type": "function"},{"constant": false,"inputs": [{"name": "_spender","type": "address"},{"name": "_value","type": "uint256"}],"name": "approve","outputs": [{"name": "","type": "bool"}],"payable": false,"stateMutability": "nonpayable","type": "function"},{"constant": true,"inputs": [],"name": "totalSupply","outputs": [{"name": "","type": "uint256"}],"payable": false,"stateMutability": "view","type": "function"},{"constant": false,"inputs": [{"name": "_from","type": "address"},{"name": "_to","type": "address"},{"name": "_value","type": "uint256"}],"name": "transferFrom","outputs": [{"name": "","type": "bool"}],"payable": false,"stateMutability": "nonpayable","type": "function"},{"constant": true,"inputs": [],"name": "decimals","outputs": [{"name": "","type": "uint8"}],"payable": false,"stateMutability": "view","type": "function"},{"constant": true,"inputs": [{"name": "_owner","type": "address"}],"name": "balanceOf","outputs": [{"name": "balance","type": "uint256"}],"payable": false,"stateMutability": "view","type": "function"},{"constant": true,"inputs": [],"name": "symbol","outputs": [{"name": "","type": "string"}],"payable": false,"stateMutability": "view","type": "function"},{"constant": false,"inputs": [{"name": "_to","type": "address"},{"name": "_value","type": "uint256"}],"name": "transfer","outputs": [{"name": "","type": "bool"}],"payable": false,"stateMutability": "nonpayable","type": "function"},{"constant": true,"inputs": [{"name": "_owner","type": "address"},{"name": "_spender","type": "address"}],"name": "allowance","outputs": [{"name": "","type": "uint256"}],"payable": false,"stateMutability": "view","type": "function"},{"payable": true,"stateMutability": "payable","type": "fallback"},{"anonymous": false,"inputs": [{"indexed": true,"name": "owner","type": "address"},{"indexed": true,"name": "spender","type": "address"},{"indexed": false,"name": "value","type": "uint256"}],"name": "Approval","type": "event"},{"anonymous": false,"inputs": [{"indexed": true,"name": "from","type": "address"},{"indexed": true,"name": "to","type": "address"},{"indexed": false,"name": "value","type": "uint256"}],"name": "Transfer","type": "event"}]';
tokenaddr=pluttokenaddress;

 erc20=await new web3.eth.Contract(JSON.parse(abi), tokenaddr);
   
  toaddress= myContractAddress;
   var amount=depositamount*(10**tokendecimal);
   
   //str=BigInt(amount).toString()
 
   //console.log(str);
   //bigamount = web3.utils.toBN( str);
   
   var bigamount=BigInt(amount);
   //bigamount="3800000000000000000";
   //console.log(bigamount);
 console.log("Calling contract approve!");  
 console.log("toaddress=",toaddress);
 console.log("bigamount=", bigamount);
 
let response = await erc20.methods
    .approve(toaddress, bigamount )  //function in contract
    .send({
      from: defaultwalletaddress,      
      gasPrice: mingasprice 
    }); 

 

}


 

async function approvetransferreward(depositamount)
{
let abi ='[{"constant": true,"inputs": [],"name": "name","outputs": [{"name": "","type": "string"}],"payable": false,"stateMutability": "view","type": "function"},{"constant": false,"inputs": [{"name": "_spender","type": "address"},{"name": "_value","type": "uint256"}],"name": "approve","outputs": [{"name": "","type": "bool"}],"payable": false,"stateMutability": "nonpayable","type": "function"},{"constant": true,"inputs": [],"name": "totalSupply","outputs": [{"name": "","type": "uint256"}],"payable": false,"stateMutability": "view","type": "function"},{"constant": false,"inputs": [{"name": "_from","type": "address"},{"name": "_to","type": "address"},{"name": "_value","type": "uint256"}],"name": "transferFrom","outputs": [{"name": "","type": "bool"}],"payable": false,"stateMutability": "nonpayable","type": "function"},{"constant": true,"inputs": [],"name": "decimals","outputs": [{"name": "","type": "uint8"}],"payable": false,"stateMutability": "view","type": "function"},{"constant": true,"inputs": [{"name": "_owner","type": "address"}],"name": "balanceOf","outputs": [{"name": "balance","type": "uint256"}],"payable": false,"stateMutability": "view","type": "function"},{"constant": true,"inputs": [],"name": "symbol","outputs": [{"name": "","type": "string"}],"payable": false,"stateMutability": "view","type": "function"},{"constant": false,"inputs": [{"name": "_to","type": "address"},{"name": "_value","type": "uint256"}],"name": "transfer","outputs": [{"name": "","type": "bool"}],"payable": false,"stateMutability": "nonpayable","type": "function"},{"constant": true,"inputs": [{"name": "_owner","type": "address"},{"name": "_spender","type": "address"}],"name": "allowance","outputs": [{"name": "","type": "uint256"}],"payable": false,"stateMutability": "view","type": "function"},{"payable": true,"stateMutability": "payable","type": "fallback"},{"anonymous": false,"inputs": [{"indexed": true,"name": "owner","type": "address"},{"indexed": true,"name": "spender","type": "address"},{"indexed": false,"name": "value","type": "uint256"}],"name": "Approval","type": "event"},{"anonymous": false,"inputs": [{"indexed": true,"name": "from","type": "address"},{"indexed": true,"name": "to","type": "address"},{"indexed": false,"name": "value","type": "uint256"}],"name": "Transfer","type": "event"}]';
tokenaddr=rewardtokenaddress;

 erc20=await new web3.eth.Contract(JSON.parse(abi), tokenaddr);
   
  toaddress= myContractAddress;
   var amount=depositamount*(10**tokendecimal);
   
   //str=BigInt(amount).toString()
 
   //console.log(str);
   //bigamount = web3.utils.toBN( str);
   
   var bigamount=BigInt(amount);
   //bigamount="3800000000000000000";
   //console.log(bigamount);
 console.log("Calling contract approve!");  
 console.log("toaddress=",toaddress);
 console.log("bigamount=", bigamount);
 
let response = await erc20.methods
    .approve(toaddress, bigamount )  //function in contract
    .send({
      from: defaultwalletaddress,      
      gasPrice: mingasprice 
    }); 

 

}


function checkAddress()
{
    var chkBox = document.getElementById('checkAddress');
    if (chkBox.checked)
    {
		console.log("unchecked");
		document.getElementById("stakebutton").disabled = true;
    }
	else
	{

		console.log("checked");
        document.getElementById("stakebutton").disabled = false;		
	}
}

 
 
async function stake(){
	
	
	

amount=document.getElementById("amountbuy").value;



poolnum=0;
//stakeid=document.getElementById("stakepoolid").value; 
//if (stakeid=="kitkat") 	    poolnum=1;
//if (stakeid=="oreo") 	 	poolnum=0;
	 var stakeid=document.getElementById("stakepoolid").value; 

 if (stakeid=="lavender") 	    poolnum=0;
  if (stakeid=="lemongrass") 	 	poolnum=1; 

									 

var allowance;
allowance=await getPLUTAllowance(defaultwalletaddress);
if (allowance<amount)
	await approvetransfer(amount); // need to approve first  
  
await staketoken( amount, poolnum); // 1 is for buy

getStakedAmount();
//approvetransfer(amount);


}


async function depositrewardtokentocontract(){
		var poolnum=0;
		var amount=document.getElementById("rewardamountid").value;
	 var stakeid=document.getElementById("rewardpoolid").value; 

 if (stakeid=="lavender") 	    poolnum=0;
  if (stakeid=="lemongrass") 	 	poolnum=1; 
		
						 		
		console.log("depositrewardtokentocontract poolnum=", poolnum);
		
		await approvetransferreward(amount); // need to approve first  
		await depositrewardtoken(amount,poolnum); // need to approve first  
		getStakedAmount();		 
}
  

async function staketoken(amount, poolnum){

var tokenAddr=pluttokenaddress;
var amt=amount*(10**tokendecimal); 
 amt=BigInt(amt);

 console.log("Calling contract staking depositToken55!");  
 console.log("pluttokenaddress=",pluttokenaddress);
 console.log("bigamount=", amt);
 console.log("poolnum=", poolnum);
  console.log("from address=", defaultwalletaddress);
 let response2 = await staking.methods
    .depositToken(pluttokenaddress, amt, poolnum)  //function in contract
    .send({
      from: defaultwalletaddress,        
      gasPrice: mingasprice 
    });	
	
	
	//setTimeout(function(){  getBalance(useraddr, pluttokenaddress); }, 3000);
	//getBalance(useraddr, pluttokenaddress); 
 
 
} 



 



async function depositrewardtoken(amount, poolnum){

var tokenAddr=rewardtokenaddress;
var amt=amount*(10**tokendecimal); 
 amt=BigInt(amt);

 console.log("Calling contract staking depositrewardtoken!");  
  
 console.log("bigamount=", amt);
 console.log("poolnum=", poolnum);
  console.log("from address=", defaultwalletaddress);
  console.log("tokenAddr=",tokenAddr);
 let response2 = await staking.methods
    .depositReward(tokenAddr, amt, poolnum)  //function in contract
    .send({
      from: defaultwalletaddress,        
      gasPrice: mingasprice 
    });	
	
	
	//setTimeout(function(){  getBalance(useraddr, pluttokenaddress); }, 3000);
	//getBalance(useraddr, pluttokenaddress); 
 
 
 
 
} 
 
 
 
async function withdrawstaketoken() {
    var poolnum=0;
	 //var pool =document.getElementById("withdrawpoolidstake").value; 	
	 stakeid=document.getElementById("withdrawpoolid").value; 
 if (stakeid=="lavender") 	    poolnum=0;
 if (stakeid=="lemongrass") 	poolnum=1;
	
	
	timestamp = await staking.methods.getUserPoolMaturityDate(poolnum).call({'from': defaultwalletaddress});
 	timestamp = timestamp*1000;
	
	currenttimestamp=Date.now();
	var localestr="sv-SE";
	 
	
	if (currenttimestamp<=timestamp)
	{
		datestr = new Date(parseInt(timestamp)).toLocaleString(localestr,{ timeZone: 'UTC'  }); 
		usermaturitydate1=datestr+ " UTC";
		
		alert("Your staking is not yet mature. Mature date is "+usermaturitydate1);
	
	}
	else
	{
		withdrawstake(poolnum);
		getStakedAmount();	
	}

}

async function withdrawrewardtoken() {
    var poolnum=0;
	//var pool =document.getElementById("withdrawpoolidreward").value; 	
	//stakeid=document.getElementById("withdrawpoolidreward").value; 
//if (stakeid=="kitkat") 	    poolnum=1;
//if (stakeid=="oreo") 	 	poolnum=0;


	 stakeid=document.getElementById("withdrawpoolrewardid").value; 
 if (stakeid=="lavender") 	    poolnum=0;
 if (stakeid=="lemongrass") 	poolnum=1;

console.log(" withdrawrewardtoken stakeid=",stakeid);
console.log("withdrawrewardtoken poolnum=",poolnum);
	
	
	timestamp = await staking.methods.getUserPoolMaturityDate(poolnum).call({'from': defaultwalletaddress});
 	timestamp = timestamp*1000;
	
	currenttimestamp=Date.now();
	var localestr="sv-SE";
	 
	
	if (currenttimestamp<=timestamp)
	{
		datestr = new Date(parseInt(timestamp)).toLocaleString(localestr,{ timeZone: 'UTC'  }); 
		usermaturitydate1=datestr+ " UTC";
		
		alert("Your staking is not yet mature. Mature date is "+usermaturitydate1);
	
	}
	else
	{
		withdrawreward(poolnum);
		getStakedAmount();	
	}

}


  
  


  

async function withdrawstake(poolnum){
 
     //amount =document.getElementById("idwithdrawtokenamount").value; 	
 	//amount=amount*(10**18);
	//amount=BigInt(amount);
	//amountstr=amount.toString(); // error here
	//console.log("Amount token str to withdraw="+amountstr);
	tokenaddr=pluttokenaddress;
 
 let response = await staking.methods
    .withdrawStakeToken(tokenaddr, poolnum)  //function in contract
    .send({
      from: defaultwalletaddress,      
      gasPrice: mingasprice
    });
 
  //setTimeout(function(){  getBalance(useraddr, pluttokenaddress); }, 3000);
 
  
  
 
}  
  
  
  

async function withdrawreward(poolnum){
 
     //amount =document.getElementById("idwithdrawtokenamount").value; 	
 	//amount=amount*(10**18);
	//amount=BigInt(amount);
	//amountstr=amount.toString(); // error here
	//console.log("Amount token str to withdraw="+amountstr);
	tokenaddr=rewardtokenaddress;
	console.log("tokenaddress reward",tokenaddr);
	console.log("poolnum",poolnum);
 
 let response = await staking.methods
    .withdrawRewardToken(tokenaddr, poolnum)  //function in contract
    .send({
      from: defaultwalletaddress,      
      gasPrice: mingasprice
    });
 
  //setTimeout(function(){  getBalance(useraddr, pluttokenaddress); }, 3000);
 
  
  
 
}  
    
   



function converttimestampto24time(s) {

var ts = new Date(s* 1e3).toLocaleTimeString("en-US", { hour12: false });
return (ts);


    //return new Date(s * 1e3).toISOString().slice(-13, -5);
}


 
  
async function getBurnAmount()
{
		var burnamount = await staking.methods.getBurnAmount().call({'from': defaultwalletaddress});
		burnamount=burnamount/(10**tokendecimal);	
		return burnamount;
	
} 



async function getPoolFilledAmount(poolnum)
{
		var poolfilledamount = await staking.methods.getPoolFilledAmount(poolnum).call({'from': defaultwalletaddress});
		poolfilledamount=poolfilledamount/(10**tokendecimal);	
		return poolfilledamount;
	
}


async function getUserStakedAmount(poolnum)
{
	var userstakedamountpool = await staking.methods.getUserStakedAmount(poolnum).call({'from': defaultwalletaddress});	
	userstakedamountpool=userstakedamountpool/(10**tokendecimal);	
	return userstakedamountpool;	
}


async function getUserRewardAmount(poolnum)
{
	var userstakedamountpool = await staking.methods.getUserRewardAmount(poolnum).call({'from': defaultwalletaddress});	
	userstakedamountpool=userstakedamountpool/(10**tokendecimal);	
	return userstakedamountpool;	
}

async function getMaturityDate(poolnum)
{
	var usermaturitydate="";
	var datestr;
	var localestr="sv-SE";
	var timestamp = await staking.methods.getUserPoolMaturityDate(poolnum).call({'from': defaultwalletaddress});	
    if (timestamp==0)
		usermaturitydate="N/A";
	else
	{	
		datestr = new Date(parseInt(timestamp)*1000).toLocaleString(localestr,{ timeZone: 'UTC'  }); 
		usermaturitydate=datestr+ " UTC";	
	}
	return usermaturitydate;
	
}


 


async function getUserWalletBalance()
{
	
				      
	console.log("getuserwalletbalance");	 
	var userwalletplutbalance;
	var userwalletbnbbalance;
	
	
	
	var balance2 = await web3.eth.getBalance(defaultwalletaddress); 
	userwalletbnbbalance =balance2/(10**18);	
	
	console.log("userwalletbnbbalance=", userwalletbnbbalance);
	 
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

			let contract = new web3.eth.Contract(minABI,pluttokenaddress);
 
			  //bal = await contract.methods.balanceOf(useraddr);
				bal = await contract.methods.balanceOf(useraddr).call();
  
				bal =bal/(10**18); 

				userwalletplutbalance=bal;
				 
	userwalletplutbalance=properdecimal(userwalletplutbalance,2);
	userwalletbnbbalance=properdecimal(userwalletbnbbalance,2);
		console.log("userwalletplutbalance=", userwalletplutbalance);
	
	
	return {userwalletbnbbalance, userwalletplutbalance};
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

			let contract = new web3.eth.Contract(minABI,pluttokenaddress);
 
			  //bal = await contract.methods.balanceOf(useraddr);
				bal = await contract.methods.balanceOf(walletaddress).call();
  
				bal =bal/(10**18); 

				userwalletplutbalance=bal;
				 
	userwalletplutbalance=properdecimal(userwalletplutbalance,2);
	 
	
	
	return   userwalletplutbalance ;
}




async function getPLUTAllowance(ownerwalletaddress)
{
	
				      
	console.log("getPLUTAllowance");	 
	var userwalletplutallowance;
	 
	
	
	
	 
	 
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
			  },
			  {
					"constant": true,
					"inputs": [
						{
							"name": "_owner",
							"type": "address"
						},
						{
							"name": "_spender",
							"type": "address"
						}
					],
					"name": "allowance",
					"outputs": [
						{
							"name": "",
							"type": "uint256"
						}
					],
					"payable": false,
					"stateMutability": "view",
					"type": "function"
				}
			  
			  
			  
			  
			];

			let contract = new web3.eth.Contract(minABI,pluttokenaddress);
 
			  //bal = await contract.methods.balanceOf(useraddr);
				bal = await contract.methods.allowance(ownerwalletaddress,myContractAddress ).call();
  
				bal =bal/(10**18); 

				userwalletplutallowance=bal;
				 
	//userwalletplutallowance=properdecimal(userwalletplutallowance,2);
	 
	console.log("allowed mesa=", userwalletplutallowance);
	
	return   userwalletplutallowance ;
}




async function getStakedAmount(){
	console.log("getStakedAmount");
  
	var userstakedamountpool1;
	var usermaturitydate1;
	var usertotalreward1;
	
	//var userstakedamountpool2;
//	var usermaturitydate2;
//	var usertotalreward2;	
	
 
	

   //var burnamount=await getBurnAmount();
  // var burnmsg="Amount PLUT tokens burned for this reward= "+burnamount+ " PLUT";
   //  document.getElementById("thisburnamountid").innerHTML=	burnmsg; 
	 
//	var totalburnamount=await getWalletBalancePLUT('0x000000000000000000000000000000000000dEaD');
	//var totalburnmsg="Total amount of PLUT burn= "+totalburnamount+ " PLUT";
    // document.getElementById("totalburnamountid").innerHTML=	totalburnmsg; 	


	//usertotalreward1=response[0];
	//console.log(response);	
	usertotalreward1 = await getUserRewardAmount(0) ;
	console.log("usertotalreward1=",usertotalreward1);
	usertotalreward2 = await getUserRewardAmount(1) ;	
	//usertotalreward3 = await getUserRewardAmount(2) ;
	
 	console.log("***********************************");
	console.log("***********************************");
	poolfilledamount1 = await getPoolFilledAmount(0);
	console.log("poolfilledamount1 (silver)=",poolfilledamount1);
	poolfilledamount2 = await getPoolFilledAmount(1);
	//console.log("poolfilledamount2 (gold)=",poolfilledamount2);
	//poolfilledamount3 = await getPoolFilledAmount(2);
	//console.log("poolfilledamount3 (diamond)=",poolfilledamount3);
	//console.log("***********************************");
	//console.log("***********************************");
	
 	userstakedamountpool1 = await getUserStakedAmount(0);
	console.log("userstakedamountpool1=",userstakedamountpool1);
    userstakedamountpool2 = await getUserStakedAmount(1);	
 	//userstakedamountpool3 = await getUserStakedAmount(2);	
	
  	usermaturitydate1 = await getMaturityDate(0);
	console.log("usermaturitydate1=",usermaturitydate1);
  	usermaturitydate2 = await getMaturityDate(1);	
  //	usermaturitydate3 = await getMaturityDate(2);	
	
	userstakedamountpool1=properdecimal(userstakedamountpool1, 2);
	
	userstakedamountpool2=properdecimal(userstakedamountpool2, 2);	
	//userstakedamountpool3=properdecimal(userstakedamountpool3, 2);	
	
	usertotalreward1=properdecimal(usertotalreward1, 2);
	usertotalreward2=properdecimal(usertotalreward2, 2);	
	//usertotalreward3=properdecimal(usertotalreward3, 2);		
	
	
	 
 
	let bal=await getUserWalletBalance();
	 
	var userwalletbnbbalance=bal.userwalletbnbbalance;
	var userwalletplutbalance=bal.userwalletplutbalance;
	
		console.log("nn userwalletbnbbalance=", userwalletbnbbalance);
		console.log("nn defaultwalletaddress=", defaultwalletaddress);			
	
	
	var userinfo1="<b>Jellybean Pool </b><br>You have staked "+userstakedamountpool1+" MESA <br>Your reward is "+usertotalreward1+" MESA <br>Maturity date: "+usermaturitydate1+" <br><br>" 
	 
 	document.getElementById("pool1stakedamount").innerHTML = userstakedamountpool1 + (isPlut ? " PLUT" : " MESA");
 	document.getElementById("pool1rewardamount").innerHTML = usertotalreward1 + (isPlut ? " MESA" : " PLUT");
 	document.getElementById("pool1maturitydate").innerHTML = "Maturity date: "+usermaturitydate1 ;				 
	//document.getElementById("userpoolinfo1").innerHTML=userinfo1  ;


	var userinfo1="<b>Marshmallow Pool </b><br>You have staked "+userstakedamountpool2+" MESA <br>Your reward is "+usertotalreward1+" MESA <br>Maturity date: "+usermaturitydate2+" <br><br>" 


 	document.getElementById("pool2stakedamount").innerHTML=userstakedamountpool2+" MESA"  ;
 	document.getElementById("pool2rewardamount").innerHTML=usertotalreward2+" MESA"  ;

 	document.getElementById("pool2maturitydate").innerHTML="Maturity date: "+usermaturitydate2 ;
	
				 
	//document.getElementById("userpoolinfo2").innerHTML=userinfo1  ;	
			      			


	
	var userwalletinfo="<b>Your Wallet</b><br>"+defaultwalletaddress+"<br>You have "+userwalletplutbalance+" " + symbol + " and "+userwalletbnbbalance+" BNB ";
	

	document.getElementById("userwalletinfo").innerHTML=userwalletinfo;

 
/*
	  <div class="progress-bar" id="poolprogress1id" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>


el.style.color = 'red';
*/

//[1000000000,1000000000,1000000000];
//            uint [] maxstakingperwallet=[100000,100000,100000];	
    
// kitkat, 300k, 90 days, apy 200%, poolnum=1
// oreo,200k, 30 days, apy 150%, poolnum=0

//  


	var tokensleft=poolAmmount-poolfilledamount1;
	tokensleft=properdecimal(tokensleft, 2);	
	
	document.getElementById("tokensleftid1").innerHTML=tokensleft+" MESA";

    pool1filledpercent1=Math.round(poolfilledamount1/2000000*100.0);   //poolfilledamount1 is oreo
	
	
	var tokensleft=poolAmmount-poolfilledamount2;
	tokensleft=properdecimal(tokensleft, 2);	
	
	document.getElementById("tokensleftid2").innerHTML=tokensleft+" MESA";

 //   pool1filledpercent2=Math.round(poolfilledamount2/2000000*100.0);   //poolfilledamount1 is oreo	
 //   pool1filledpercent2=Math.round(poolfilledamount2/300000*100.0);	  // kitkat
 //   pool1filledpercent3=Math.round(poolfilledamount3/500000*100.0);  //poolfilledamount3 is diamond
	
	console.log("pool1filledpercent1=",pool1filledpercent1);
	//console.log("pool1filledpercent2=",pool1filledpercent2);	
	//console.log("pool1filledpercent3=",pool1filledpercent3);	
				


/*				
	var x1 = document.getElementById("poolprogress1id"); 	
	x1.style.width=pool1filledpercent1+'%';	 //x1.setAttribute("width", "60%");  //not working
	x1.setAttribute("aria-valuenow", pool1filledpercent1);	
	document.getElementById("poolprogress1id").innerHTML=pool1filledpercent1+'%';   // diamond
				 
	var x2 = document.getElementById("poolprogress2id"); 	
	x2.style.width=pool2filledpercent1+'%';	 //x1.setAttribute("width", "60%");  //not working
	x2.setAttribute("aria-valuenow", pool2filledpercent1);	
	document.getElementById("poolprogress2id").innerHTML=pool2filledpercent1+'%';   // diamond	 	 
	*/			 
 	 	 
	
	/////////////////////////////////////////////
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
	
	/*
	balance=await getMESAWalletBalance('0x678555dd4E1023AffD859789cfcE5ac87ECEd230');
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
*/
	


} 

 
 

   

async function loadweb3()
{

    if (window.ethereum) {
        window.web3 = new Web3(ethereum);
        try {
            await ethereum.enable();
            var accounts= await web3.eth.getAccounts();
			defaultwalletaddress=accounts[0];
			 useraddr=defaultwalletaddress;
			console.log(accounts);
			var networkid=await web3.eth.net.getId();
			if (networkid!=56)
			{	
				alert("Please switch to BSC Mainnet in your metamask.");


			}

             
        } catch (error) {
            // User denied account access...
			console.log("error..");
			console.log(error);
        }
    }
    // Legacy dapp browsers...
    else if (window.web3) {
        window.web3 = new Web3(web3.currentProvider);
        // Acccounts always exposed
		defaultwalletaddress=web3.eth.defaultAccount;
		 useraddr=defaultwalletaddress;
		console.log("legacy dapp browsers");
 			var networkid=await web3.eth.net.getId();
			if (networkid!=56)
			{	
				alert("Please switch to BSC Mainnet in your metamask.");


			}        
    }
    // Non-dapp browsers...
    else {
        console.log('Non-Ethereum browser detected. You should consider trying MetaMask!');
    }


 
}






async function init() {
    let searchArray = window.location.search.split('?')[1].split('&')
    searchArray.forEach((item) => {
        if (item.includes('symbol')) {
            isPlut = item.split('=')[1] === 'PLUT'
			symbol = !isPlut ? 'MESA' : `PLUT`
            document.getElementById('bar-title').innerHTML = isPlut ? `PLUT BEP20 Token Address: ` : `MESA BEP20 Token Address: `
            document.getElementById('bar-address').innerHTML = isPlut ? `0x2984f825bfe72e55e1725d5c020258e81ff97450` : `0xb192d5fc358d35194282a1a06814aba006198010`
            document.getElementById('th-p1').innerHTML = isPlut ? `Stake here and earn up to 120% APY of profits simply by staking PLUT BEP20 tokens!` : `Stake here and earn up to 150% APY of profits simply by staking MESA BEP20 tokens!`
            document.getElementById('th-p2').innerHTML = isPlut ? `<span>Peppermint pool</span>: users will be able to stake PLUT to earn MESA rewards with APR of 120%` : `<span>Peppermint pool</span>: users will be able to stake MESA to earn PLUT rewards with APR as high as 150%`
            document.getElementById('h-t').innerHTML = isPlut ? `Rosemary` : `Peppermint`
			pluttokenaddress = isPlut ? `0x2984f825bfe72e55e1725d5c020258e81ff97450` : `0xb192d5fc358d35194282a1a06814aba006198010`
			myContractAddress = isPlut ? '0xa0DcCADfaaa2775acc4a9844b6f89FD602a8f9c5' : '0xb1Cd4e4011d83001cC2C03EF444f74DA0B330839'
			poolAmmount = isPlut ? 614000 : 14000000000
			document.getElementById('ammount').innerHTML = isPlut ? '614,000 PLUT' : `14,000,000,000 MESA`
			document.getElementById('rt-p').innerHTML = isPlut ? 'MESA' : `PLUT`
			document.getElementById('day').innerHTML = isPlut ? '60 days' : `90 days`
			document.getElementById('apy').innerHTML = isPlut ? '120%' : `150%`

			document.getElementById('withdrawpoolid').value = isPlut ? 'rosemary' : 'peppermint'
			document.getElementById('withdrawpoolrewardid').value = isPlut ? 'rosemary' : 'peppermint'
			document.getElementById('stakepoolid').value = isPlut ? 'rosemary' : 'peppermint'

			document.getElementById('reward-title').innerHTML = isPlut ? `Rosemary` : `Peppermint`
        }
    })
   previouslastradedprice=0;
   tablemarkethistroyrow=0;
   firsttime=1;
   await loadweb3();
   initcontract();
   //web3.eth.defaultAccount = '0x297d786E023002212041D6Ef07c8188467cdBEE1';
   //defaultwalletaddress=web3.eth.defaultAccount;
   
   
  // insertWaitingIconForTable();
 //  drawEmptyApexChart(); // draw empty chart and create the Apex chart handle
 //  trackEventMaker();

 //  refreshOrderBook();
  // updatemarkethistory();   
 //  updatelasttradedprice();
 //  getBalanceNow();
   firsttime=0;
   
   //useraddr=window.web3.eth.defaultAccount;
  
   //web3.eth.getAccounts((error, accounts) => console.log(accounts[0])) 
   
   //maker();
	//refreshOrderBook();
	getStakedAmount();
	//getPLUTPrice();
	//getBUSDPrice();
 } 
function initcontract()
{ 
//var myContractAddress='0x16E3C6804647dB42F564dEe362911e1B3B43e927';

 


 var myABI=
'[{"inputs":[],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"token","type":"address"},{"indexed":false,"internalType":"address","name":"user","type":"address"},{"indexed":false,"internalType":"uint256","name":"amount","type":"uint256"},{"indexed":false,"internalType":"uint256","name":"poolnum","type":"uint256"}],"name":"Deposit","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"token","type":"address"},{"indexed":false,"internalType":"address","name":"user","type":"address"},{"indexed":false,"internalType":"uint256","name":"amount","type":"uint256"},{"indexed":false,"internalType":"uint256","name":"poolnum","type":"uint256"}],"name":"Withdraw","type":"event"},{"inputs":[{"internalType":"address","name":"token","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"},{"internalType":"uint256","name":"poolnum","type":"uint256"}],"name":"depositReward","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"token","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"},{"internalType":"uint256","name":"poolnum","type":"uint256"}],"name":"depositToken","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"getBurnAmount","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"poolnum","type":"uint256"}],"name":"getPoolFilledAmount","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"poolnum","type":"uint256"}],"name":"getPoolRewardAmount","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"getRewardTokenSymbol","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"poolnum","type":"uint256"}],"name":"getUserPoolMaturityDate","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"poolnum","type":"uint256"}],"name":"getUserRewardAmount","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"poolnum","type":"uint256"}],"name":"getUserStakedAmount","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"token","type":"address"},{"internalType":"uint256","name":"poolnum","type":"uint256"}],"name":"withdrawRewardToken","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"token","type":"address"},{"internalType":"uint256","name":"poolnum","type":"uint256"}],"name":"withdrawStakeToken","outputs":[],"stateMutability":"nonpayable","type":"function"}]';






    staking=new web3.eth.Contract(JSON.parse(myABI), myContractAddress);
	
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

  

 

async function getWalletBalanceUSD(useraddr) {
	var balance2 = await web3.eth.getBalance(defaultwalletaddress); 
	balance2 =balance2/(10**18);	
	document.getElementById("depositusd").innerHTML="You have "+balance2.toFixed(3)+" USD";	

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
