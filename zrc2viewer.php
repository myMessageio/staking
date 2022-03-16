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
				<a href="createwallet.php" class="nav-item nav-link">Create Wallet</a>
				<a href="sendtoken.html" class="nav-item nav-link">Send Tokens</a>
				<a href="checkbalance.html" class="nav-item nav-link">Check Balance</a>				
				<a href="zilstatistic.php" class="nav-item nav-link">Staking Statistic</a>	 		
				<a href="zrc2viewer.php" class="nav-item nav-link">ZRC2 Viewer</a>				
				<a href="countdowngzil.html" class="nav-item nav-link ">gZIL Countdown</a>					
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
		<h5>Zilliqa ZRC2 Token viewer.<br> A simple and easy to view all holders for any ZRC2 token holder. If your ZRC2 token not in the list, you can enter the smart contract address. Click Send button to view. <br><b>Please wait for few minutes due to many holders to download. </b> You can use the search function to look for your own wallet balance.</h5>

  </div>  
   
   
   
   
 <div class="container">
 <hr>
  <div class="row ">
			 
			<div class="col-md-2"> 
			<p>
			<label for="datePicker" >Token</label>
					<div class="col-sm-13 date">
						<select class="form-control" name="group_by" id="tokenname">
							  <option value="gZIL">gZIL</option>
							  <option value="XSGD">XSGD</option>
							  <option value="BARTER">BARTER</option> 
							  <option value="BOLT">BOLT</option> 							  
							  <option value="RedC">RedC</option> 							  
							  <option value="SERGS">SERGS</option> 							  
							  <option value="SHRK">SHRK</option> 							  
							  <option value="ZLF">ZLF</option> 							   				  
							  <option value="PORT">PORT</option> 
							  <option value="ZLP">ZLP</option> 
							  <option value="CARB">CARB</option> 							  
							  <option value="ZYF">ZYF</option> 	
							  <option value="OTHER">Other</option> 						  
						</select>
					</div>
			<p>
		    </div>
			 
			 
			<div class="col-md-4">
			<p>
				<label for="datePicker" >Smart Contract Address</label>
				<div class="col-sm-13 date">
					<div class="input-group input-append date" id="datePicker">
						
						
						  <input type="text"   class="form-control" id="smartcontractaddress" value="zil14pzuzq6v6pmmmrfjhczywguu0e97djepxt8g3e"  disabled>
					</div>
				</div>
			
			</p>
			</div>
			 
			 
			 
			<div class="col-md-2">	
			<p>
				<label for="datePicker2"  >Token Decimals</label>
				<div class="col-sm-13 date">
					<div class="input-group input-append date" id="datePicker2">
					   <input type="text"   class="form-control" id="tokendecimal" value="15" disabled>
						 
					</div>
				</div>		
			
			</p>  
			</div>
			
			<div class="col-md-2">	
			<p>
				<label for="datePicker2"  >.</label>
				<div class="col-sm-13 date">
					<div class="input-group input-append date" id="sendclassid">
					  <button type="button" class="btn btn-primary btn-sm  btn-block" onclick="send()">SEND</button> 
						 
					</div>
				</div>		
			
			</p>  
			</div>			
			
			
   </div>
   <hr>
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
    // Visualization API with the Line chart package.
	// https://www.encodedna.com/google-chart/create-line-charts-with-dynamic-json-data-using-google-charts.htm
   // google.charts.load('current', { packages: ['line'] });

	
	//google.charts.load('current', {'packages':['bar']});
	
    // Visualization API with the 'corechart' package.
	
	$(function () {
				  $("select#tokenname").on("change", function(value){
			   var This      = $(this);
			   var selectedD = $(this).val();
			   console.log(selectedD);
			   
	var contractaddrarray={
    "gZIL": "zil14pzuzq6v6pmmmrfjhczywguu0e97djepxt8g3e",
	
    "BARTER": "zil17zvlqn2xamqpumlm2pgul9nezzd3ydmrufxnct",  
    "BOLT": "zil1x6z064fkssmef222gkhz3u5fhx57kyssn7vlu0", 
    "CARB": "zil1hau7z6rjltvjc95pphwj57umdpvv0d6kh2t8zk", 
    "RedC": "zil1a5wkhunysdp9x0nww5qe6m2m8x2m3ygdpuu257", 
    "SERGS": "zil1ztmv5jhfpnxu95ts9ylup7hj73n5ka744jm4ea", 
    "SHRK": "zil17tsmlqgnzlfxsq4evm6n26txm2xlp5hele0kew", 
     
    "XSGD": "zil1zu72vac254htqpg3mtywdcfm84l3dfd9qzww8t",
    "ZLF": "zil1r9dcsrya4ynuxnzaznu00e6hh3kpt7vhvzgva0", 
    "ZLP": "zil1l0g8u6f9g0fsvjuu74ctyla2hltefrdyt7k5f4", 
    "ZYF": "zil1arrjugcg28rw8g9zxpa6qffc6wekpwk2alu7kj",
	"XFER": "zil180v66mlw007ltdv8tq5t240y7upwgf7djklmwh",
	"PORT": "zil18f5rlhqz9vndw4w8p60d0n7vg3n9sqvta7n6t2"
	
	};
	
var contractdecimalarray={
    "gZIL": 15,
	
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
					document.getElementById("smartcontractaddress").value=contractaddrarray[selectedD];
					document.getElementById("tokendecimal").value=contractdecimalarray[selectedD];
					document.getElementById("smartcontractaddress").disabled = true; 
					document.getElementById("tokendecimal").disabled = true; 						
				}
				
				 	
			   
				else  
				{
					// change smart contract address to gzil and token decimal to 15
					document.getElementById("smartcontractaddress").value="";
					document.getElementById("tokendecimal").value="";					 
					
					document.getElementById("smartcontractaddress").disabled = false; 
					document.getElementById("tokendecimal").disabled = false; 					
				}				   
			   
			   
			   
			   
			});
	});
	
	
	async function send (){
		//url="getDataTableFormatZRC2Wallet2.php?sc=a845C1034CD077bD8D32be0447239c7E4be6cb21&td=15";
		urlstr="getDataTableFormatZRC2Wallet2.php";
		sc=document.getElementById("smartcontractaddress").value;
		
		
		var erc20address;
		
		try {
			erc20address=await Zilliqa.fromBech32Address(sc);
		} catch(e) {
			errmsg="Invalid contract addresss!";
			alert(errmsg);	   
			return;			   
		}  
		
		
		
		
		
		 
		erc20address=erc20address.substring(2); // to remove the first 2 characters from string which is 0x
		td=document.getElementById("tokendecimal").value;
		
		if (!Number.isInteger(parseInt(td)))
		{
			errmsg="Token decimal is not integer!";
			alert(errmsg);	   
			return;				
			
		}
		
		
		tokenname=document.getElementById("tokenname").value;		
		
		
		urlstr=urlstr+"?sc="+erc20address+"&td="+td+"&tn="+tokenname;
		
		//document.getElementById("wait").innerHTML= '<i class="fas fa-spinner fa-spin"></i>';
		//drawLineChart(urlstr);
		
		setTimeout(drawLineChart(urlstr), 10); 
		
	}
	
	
	
    google.charts.load('visualization', { packages: ['corechart'] });
   // google.charts.setOnLoadCallback(drawLineChart);
   
   
   $("#sendclassid").on("mousedown", function () {
			
		document.getElementById("wait").innerHTML= '<i class="fas fa-spinner fa-spin fa-5x"></i>';
	
	
}).on('mouseup', send);
   
   
   
   
   
    //google.charts.setOnLoadCallback(drawLineChart);
    function drawLineChart(urlstr) {
        
   			 
			   //////////////////////////////////////////////////////////////////////////////////////////////////////////////		
	
		/////////////////////Now request another ajax!
		       	
				var jsonData = $.ajax({
					  url: urlstr,					  
					   async: false
					  }).responseText;
				   
					
					document.getElementById("tablechart").innerHTML = jsonData;
					
					
				   // $('#data').DataTable();
					 
					$('#data').dataTable( {
				"order":[]
				} );
		
				document.getElementById("wait").innerHTML="";
	 
			   //////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				
            
    }
</script>
</html>