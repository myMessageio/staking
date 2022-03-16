 
 
 
<!DOCTYPE html>
<!--Clement T 08.01.2021 email:clement@myzilliqawallet.com-->
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" data-react-helmet="true" content="Zilstat is a zilliqa staking statistic portal.">
<meta name="keywords" content="zilliqa,  staking, statistic, zilstat">
 
<title>Zilstat</title>
<link rel="icon" href="images/zilstat.png">



 
 
 
  
        

 
<script src="js/jquery-3.3.1.min.js"></script>   
<script src="js/bootstrap.min.js"></script>  
<link href="css/bootstrap.min.css" rel="stylesheet" /> 
<link href="css/styles.css" rel="stylesheet" />  




<!--datepicker-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<!--=======================================================================================================================-->



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 
 
 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

 
 
 
 
 
 
 
 
<body>
<div class="bs-1">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a href="home.html" class="navbar-brand">
            <img src="images/zilstattiny.png" height="32" alt="zilstat">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
 				<a href="home" class="nav-item nav-link ">Home</a>
				<a href="delegators" class="nav-item nav-link">Delegators  Stat</a>
				<a href="inflowoutflow" class="nav-item nav-link   active">Inflow and Outflow Stat</a>
				<a href="pendingwithdrawal" class="nav-item nav-link">Pending Withdrawal Stat</a>				
				<a href="pricecorrelation" class="nav-item nav-link">Price Correlation Stat</a>	 		
             </div>
 
        </div>
    </nav>
</div>
    
	
	

	
	
	
	
	
	
<style type="text/css">
.tab-content .tab-pane .highcharts-container {
    border: 1px solid red;
}

.tab-content > .tab-pane:not(.active) {
    display: block;
    height: 0;
    overflow-y: hidden;
}


        #special { 
            display: none; 
            
        }


 
  
  /* Just for styling */
.styling {
  background: #f5f5f5;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 20px;
  text-align: center;
  /* height: 150px;
  overflow: auto; */
}
 		
		
		
</style>	

 
 
 
<div class="container">
  <div class="row">
		  <div class="col-sm-12">
		  <br>
		   
				<h5> Zilliqa Staking Price Correlation. Select from and to date. You can also unselect what not to show to reduce too many charts. Our database starts from 2021-01-29. <br>Disclaimer: This data is provided for entertainment purposes only and should not be considered as financial advice. </h5>
		    
		   <hr>
		   </div>
  </div>
  
 
  
  
      
		
  <div class="row">		
        <div class="col-sm-4 ">
		<label for="datetimepickerfromdiv" >Date From</label>
           <div class='input-group date' id='datetimepickerfromdiv'>
            <input type='text' id="datetimepickerfrom" class="form-control " />
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
        </div>		
   		
        <div class="col-sm-4 ">
		<label for="datetimepickertodiv"  >Date To</label>
            <div class='input-group date' id='datetimepickertodiv'>
            <input type='text' id="datetimepickerto" class="form-control " />
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
        </div>		
		
		<div class="col-sm-2 ">
		       <label for="datetimepickertodiv55"  ><br></label>
					<div class='input-group' id='datetimepickertodiv55'>
					  <button type="button" class="btn btn-primary btn-sm  btn-block" onclick="send()">SEND</button> 
						 
					</div>
				</div>		
		
		
		
  </div>    
	 
 
 
	 
	 
   <div class="row"> 
		<div class="col-sm-2 ">
			<div class="checkbox">
			  <label><input type="checkbox" id="stakingamount"   checked>Staking Amount</label>
			</div>
			<div class="checkbox">
			  <label><input type="checkbox" id="btcprice" checked>BTC Price</label>
			</div>
        </div>	 
  
		<div class="col-sm-2 ">
			<div class="checkbox">
			  <label><input type="checkbox" id="ethprice"  checked>ETH Price</label>
			</div>
			<div class="checkbox">
			  <label><input type="checkbox" id="rank" checked>Rank</label>
			</div>
        </div>	    

		<div class="col-sm-2 ">
			<div class="checkbox">
			  <label><input type="checkbox" id="githubcommit"  checked>Github Commit</label>
			</div>
			<div class="checkbox">
			  <label><input type="checkbox" id="redditpost"  checked>Reddit Post</label>
			</div>
        </div>	
		
		<div class="col-sm-2 ">
			<div class="checkbox">
			  <label><input type="checkbox" id="redditcomments"  checked>Reddit Comments</label>
			</div>
			<div class="checkbox">
			  <label><input type="checkbox" id="twitterfollowers" checked>Twitter Followers</label>
			</div>
        </div>			
		
		 	
   </div>	

<hr>   

  <div class="row">
    <div class="col-sm-12">
	 
      <div id="chart1" ></div>
    </div>
  </div>
  <br>
  
  <div class="row">	
    <div class="col-sm-12">
      <div id="chart2" ></div>
    </div>
  </div>
   <br> 
 
  <div class="row">
    <div class="col-sm-12">
	 
      <div id="chart3" ></div>
    </div>
  </div>
  <br>  
  
  <div class="row">	
    <div class="col-sm-12">
      <div id="chart4" ></div>
    </div>
  </div> 
  <br>  
  
 
  <div class="row">
    <div class="col-sm-12">
	 
      <div id="chart5" ></div>
    </div>
  </div>
  <br>  
  
  <div class="row">	
    <div class="col-sm-12">
      <div id="chart6" ></div>
    </div>
  </div> 
   <br> 

 
  <div class="row">
    <div class="col-sm-12">
	 
      <div id="chart7" ></div>
    </div>
  </div>
   <br>
   
  <div class="row">	
    <div class="col-sm-12">
      <div id="chart8" ></div>
    </div>
  </div> 
  <br>  
  
 
  <div class="row">
    <div class="col-sm-12">
	 
      <div id="chart9" ></div>
    </div>
  </div>
  <br>
  
  <div class="row">	
    <div class="col-sm-12">
      <div id="chart10" ></div>
    </div>
  </div>   
  
  
  
 
   
 <br> <hr>
	 <div class="row"> 
				<div class="col-sm-1"></div>
				 <div class="col-sm-10">
				   	<table id="myDynamicTable"  class="display" style="width:100%"> 
					</table>
				  

					<br>
						<div id="special">
						<label class="form-check-label" for="downloadbutton">Download data as CSV</label>
					   <button type="button" class="btn btn-primary btn-sm  btn-block" id="downloadbutton" onclick="download_table_as_csv('myDynamicTable');"    >Download</button> 
						</div>
				  </div>
				  <br><br><br>
	  
	  </div>    
  
  
  
		
  
</div> 
 
 <br>
 <hr>
 
 
 
	
	
</body> 
 
 
 
 
 
 
 
 
 
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
   

<script>

/*
rank
github_commit_count_4_weeks
telegram_user_count
reddit_accounts_active_48hr
reddit_subscriber
reddit_average_comments_48hr
twitter_followers




*/

google.charts.load('current', {'packages':['line', 'corechart']});
//google.charts.setOnLoadCallback(drawChart);
	 


function send()
{
	
	// if(continuousChart != undefined)
       //    continuousChart.clearChart();
	  
	 //clearLineChart() 
	 
	drawLineChart();
}
	////////////////////Datetimepicker////////////////////////////////////////////////////////////////////////////////////////

 $(function () {
   var bindDatePicker = function() {
		$(".date").datetimepicker({
        format:'YYYY-MM-DD',
			icons: {
				time: "fa fa-clock-o",
				date: "fa fa-calendar",
				up: "fa fa-arrow-up",
				down: "fa fa-arrow-down"
			}
		}).find('input:first').on("blur",function () {
			// check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
			// update the format if it's yyyy-mm-dd
			var date = parseDate($(this).val());

			if (! isValidDate(date)) {
				//create date based on momentjs (we have that)
				date = moment().format('YYYY-MM-DD');
			}

			$(this).val(date);
		});
	}
   
   var isValidDate = function(value, format) {
		format = format || false;
		// lets parse the date to the best of our knowledge
		if (format) {
			value = parseDate(value);
		}

		var timestamp = Date.parse(value);

		return isNaN(timestamp) == false;
   }
   
   var parseDate = function(value) {
		var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
		if (m)
			value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

		return value;
   }
   
   bindDatePicker();
 });
 
 
 
 
     $(document).ready(function() {
        
       
		
		var todayDate = new Date().toISOString().slice(0,10);
		$('#datetimepickerto').val(todayDate);
		
		$('#datetimepickerfrom').val("2021-01-29");		
		
		
        $('#datetimepickerto').change(function () {
           // console.log($('#date-daily').val());
        });
    });
 
        
 
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
  
	///////////////////////////Google Chart////////////////////////////////////////////////////////////////////////////////////
  
	
	
    function drawLineChart() {
		startdatestr= document.getElementById('datetimepickerfrom').value;
		
		if (startdatestr<"2021-01-29")
		{
			document.getElementById('datetimepickerfrom').value="2021-01-29";
			startdatestr="2021-01-29";
			
		}
		enddatestr=document.getElementById('datetimepickerto').value;
		
		console.log("startdatestr=",startdatestr);
		console.log("enddatestr=",enddatestr);
		
		urlstr="gettblstakejson2.php?startdate="+startdatestr+"&enddate="+enddatestr;
		console.log("urlstr=", urlstr);
		
		
        $.ajax({
            url: urlstr,  //url: "https://myzilliqawallet/getzilstat.php", not working, weird, when supply full url, it doesnt work!
            dataType: "json",
            type: "GET",
            contentType: "application/json; charset=utf-8",
            success: function (data) {
	////////////////////////////////////////CHART 1////////////////////////////////////////////////////////////////////

						var chartDiv = document.getElementById('chart1');
						
						continuousChart = new google.charts.Line(document.getElementById('chart1'));
	

									var arrSales1= [];
										$.each(data, function (index, value) {
											arrSales1.push([    new Date(value.Date),  value.stakingamount, value.zilprice ]);
										});
				 
									var continuousData1 = new google.visualization.DataTable();
								 
									 continuousData1.addColumn('date', 'Date');
									continuousData1.addColumn('number', 'Staking Amount');
									continuousData1.addColumn('number', 'Zil Price');
									 
									continuousData1.addRows(arrSales1);              
											



								  var materialOptions = {
										chart: {
										  title: 'Staking amount and zil price vs date'
										},
										width: 900,
										height: 500,
										series: {
										  // Gives each series an axis name that matches the Y-axis below.
										  0: {axis: 'StakingAmount'},
										  1: {axis: 'ZilPrice'}
										},
										axes: {
										  // Adds labels to each axis; they don't have to match the axis names.
										  y: {
											StakingAmount: {label: 'Staking Amount'},
											ZilPrice: {label: 'Zil Price'}
										  }
										}
									  };
	 								  
						 
				
					continuousChart.clearChart(); 
						
						if (document.getElementById("stakingamount").checked)	
							continuousChart.draw(continuousData1,materialOptions);	  
				
	/////////////////////////////////////////CHART 2/////////////////////////////////////////////////////////////////////////////////////////
						var chartDiv2 = document.getElementById('chart2');


									var arrSales2= [];
										$.each(data, function (index, value) {
											arrSales2.push([    new Date(value.Date),  value.btcprice, value.zilprice ]);
										});
				 
									var continuousData2 = new google.visualization.DataTable();
								 
									continuousData2.addColumn('date', 'Date');
									continuousData2.addColumn('number', 'BTC Price');
									continuousData2.addColumn('number', 'Zil Price');
									 
									continuousData2.addRows(arrSales2);              
											



								  var materialOptions2 = {
										chart: {
										  title: 'btc price and zil price vs date'
										},
										width: 900,
										height: 500,
										series: {
										  // Gives each series an axis name that matches the Y-axis below.
										  0: {axis: 'BtcPrice'},
										  1: {axis: 'ZilPrice'}
										},
										axes: {
										  // Adds labels to each axis; they don't have to match the axis names.
										  y: {
											BtcPrice: {label: 'Btc Price'},
											ZilPrice: {label: 'Zil Price'}
										  }
										} 
									  };
									  
									  
						var continuousChart2 = new google.charts.Line(document.getElementById('chart2'));
						if (document.getElementById("btcprice").checked)	
						continuousChart2.draw(continuousData2,materialOptions2);	  
				
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//////////////////////////////////////CHART 3////////////////////////////////////////////////////////////////////////////////////////////
						var chartDiv3 = document.getElementById('chart3');


									var arrSales3= [];
										$.each(data, function (index, value) {
											arrSales3.push([    new Date(value.Date),  value.ethprice, value.zilprice ]);
										});
				 
									var continuousData3 = new google.visualization.DataTable();
								 
									continuousData3.addColumn('date', 'Date');
									continuousData3.addColumn('number', 'ETH Price');
									continuousData3.addColumn('number', 'Zil Price');
									 
									continuousData3.addRows(arrSales3);              
											



								  var materialOptions3 = {
										chart: {
										  title: 'Eth price and zil price vs date'
										},
										width: 900,
										height: 500,
										series: {
										  // Gives each series an axis name that matches the Y-axis below.
										  0: {axis: 'EthPrice'},
										  1: {axis: 'ZilPrice'}
										},
										axes: {
										  // Adds labels to each axis; they don't have to match the axis names.
										  y: {
											EthPrice: {label: 'Eth Price'},
											ZilPrice: {label: 'Zil Price'}
										  }
										} 
									  };



 		 
	
									  
									  
						var continuousChart3 = new google.charts.Line(document.getElementById('chart3'));
						
						if (document.getElementById("ethprice").checked)							
							continuousChart3.draw(continuousData3,materialOptions3);	  
				
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						var chartDiv4 = document.getElementById('chart4');


									var arrSales4= [];
										$.each(data, function (index, value) {
											arrSales4.push([    new Date(value.Date),  value.market_cap_rank, value.zilprice ]);
										});
				 
									var continuousData4 = new google.visualization.DataTable();
								 
									continuousData4.addColumn('date', 'Date');
									continuousData4.addColumn('number', 'Market Cap Rank');
									continuousData4.addColumn('number', 'Zil Price');
									 
									continuousData4.addRows(arrSales4);              
											



								  var materialOptions4 = {
										chart: {
										  title: 'Market Cap Rank and zil price vs date'
										},
										width: 900,
										height: 500,
										series: {
										  // Gives each series an axis name that matches the Y-axis below.
										  0: {axis: 'Rank'},
										  1: {axis: 'ZilPrice'}
										},
										axes: {
										  // Adds labels to each axis; they don't have to match the axis names.
										  y: {
											Rank: {label: 'Market Cap Rank'},
											ZilPrice: {label: 'Zil Price'}
										  }
										} 
									  };
							  
									  
						var continuousChart4 = new google.charts.Line(document.getElementById('chart4'));
						
						if (document.getElementById("rank").checked)							
							continuousChart4.draw(continuousData4,materialOptions4);	  
				
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						var chartDiv5 = document.getElementById('chart5');


									var arrSales5= [];
										$.each(data, function (index, value) {
											arrSales5.push([    new Date(value.Date),  value.commit_count_4_weeks, value.zilprice ]);
										});
				 
									var continuousData5 = new google.visualization.DataTable();
								 
									continuousData5.addColumn('date', 'Date');
									continuousData5.addColumn('number', 'commit_count_4_weeks');
									continuousData5.addColumn('number', 'Zil Price');
									 
									continuousData5.addRows(arrSales5);              
											



								  var materialOptions5 = {
										chart: {
										  title: 'Github Commits 4 Weeks and zil price vs date'
										},
										width: 900,
										height: 500,
										series: {
										  // Gives each series an axis name that matches the Y-axis below.
										  0: {axis: 'commit_count_4_weeks'},
										  1: {axis: 'ZilPrice'}
										},
										axes: {
										  // Adds labels to each axis; they don't have to match the axis names.
										  y: {
											commit_count_4_weeks: {label: 'commit_count_4_weeks'},
											ZilPrice: {label: 'Zil Price'}
										  }
										} 
									  };
									  

 
 

									  
						var continuousChart5 = new google.charts.Line(document.getElementById('chart5'));
						
						if (document.getElementById("githubcommit").checked)							
							continuousChart5.draw(continuousData5,materialOptions5);	  
				
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						var chartDiv6 = document.getElementById('chart6');


									var arrSales6= [];
										$.each(data, function (index, value) {
											arrSales6.push([    new Date(value.Date),  value.reddit_average_posts_48h, value.zilprice ]);
										});
				 
									var continuousData6 = new google.visualization.DataTable();
								 
									continuousData6.addColumn('date', 'Date');
									continuousData6.addColumn('number', 'reddit_average_posts_48h');
									continuousData6.addColumn('number', 'Zil Price');
									 
									continuousData6.addRows(arrSales6);              
											



								  var materialOptions6 = {
										chart: {
										  title: 'Reddit Post 48 hours and zil price vs date'
										},
										width: 900,
										height: 500,
										series: {
										  // Gives each series an axis name that matches the Y-axis below.
										  0: {axis: 'reddit_average_posts_48h'},
										  1: {axis: 'ZilPrice'}
										},
										axes: {
										  // Adds labels to each axis; they don't have to match the axis names.
										  y: {
											reddit_average_posts_48h: {label: 'reddit_average_posts_48h'},
											ZilPrice: {label: 'Zil Price'}
										  }
										} 
									  };

	 
		 

									  
									  
						var continuousChart6 = new google.charts.Line(document.getElementById('chart6'));
						
						if (document.getElementById("redditpost").checked)							
							continuousChart6.draw(continuousData6,materialOptions6);	  
				
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						var chartDiv7 = document.getElementById('chart7');


									var arrSales7= [];
										$.each(data, function (index, value) {
											arrSales7.push([    new Date(value.Date),  value.reddit_average_comments_48h, value.zilprice ]);
										});
				 
									var continuousData7 = new google.visualization.DataTable();
								 
									continuousData7.addColumn('date', 'Date');
									continuousData7.addColumn('number', 'reddit_average_comments_48h');
									continuousData7.addColumn('number', 'Zil Price');
									 
									continuousData7.addRows(arrSales7);              
											



								  var materialOptions7 = {
										chart: {
										  title: 'Reddit Average Comments 48 hours and zil price vs date'
										},
										width: 900,
										height: 500,
										series: {
										  // Gives each series an axis name that matches the Y-axis below.
										  0: {axis: 'reddit_average_comments_48h'},
										  1: {axis: 'ZilPrice'}
										},
										axes: {
										  // Adds labels to each axis; they don't have to match the axis names.
										  y: {
											reddit_average_comments_48h: {label: 'reddit_average_comments_48h'},
											ZilPrice: {label: 'Zil Price'}
										  }
										} 
									  };
		 
 
								  
									  
						var continuousChart7 = new google.charts.Line(document.getElementById('chart7'));
						
						if (document.getElementById("redditcomments").checked)							
							continuousChart7.draw(continuousData7,materialOptions7);	  
				
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						var chartDiv8 = document.getElementById('chart8');


									var arrSales8= [];
										$.each(data, function (index, value) {
											arrSales8.push([    new Date(value.Date),  value.twitter_followers, value.zilprice ]);
										});
				 
									var continuousData8 = new google.visualization.DataTable();
								 
									continuousData8.addColumn('date', 'Date');
									continuousData8.addColumn('number', 'twitter_followers');
									continuousData8.addColumn('number', 'Zil Price');
									 
									continuousData8.addRows(arrSales8);              
											



								  var materialOptions8 = {
										chart: {
										  title: 'Twitter followers and zil price vs date'
										},
										width: 900,
										height: 500,
										series: {
										  // Gives each series an axis name that matches the Y-axis below.
										  0: {axis: 'twitter_followers'},
										  1: {axis: 'ZilPrice'}
										},
										axes: {
										  // Adds labels to each axis; they don't have to match the axis names.
										  y: {
											twitter_followers: {label: 'twitter_followers'},
											ZilPrice: {label: 'Zil Price'}
										  }
										} 
									  };
									  
									  
						var continuousChart8 = new google.charts.Line(document.getElementById('chart8'));
 									
						
						if (document.getElementById("twitterfollowers").checked)							
							continuousChart8.draw(continuousData8,materialOptions8);	  
				
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////					
						  

						  
  				
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert('Got an Error');
            }
        });
    }
	
	
	
	
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  




  
</script>  
  
  
  
  
  
  
  </html>