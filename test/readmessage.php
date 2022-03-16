<?php




if (isset($_GET['txid'])) {
	$txid = $_GET["txid"];
} else
	$txid = "0";



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




	<script src="js/zilliqa.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/all.min.js"></script>
	<script src="js/aes.js"></script>
	<script src="js/md5.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/styles.css" rel="stylesheet" />









	<style>
		textarea {
			font-family: Consolas, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace;
		}
	</style>


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




					<a href="index.html" class="nav-item nav-link ">Home</a>
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
					<input type="text" id="searchtxid" class="form-control" aria-describedby="basic-addon1">
				</div>
			</div>
			<div class="col-2">
				<button type="button" class="btn btn-primary   btn-block" id="sendtxid" onclick="sendtxid()">SEND</button>

			</div>

		</div>

		<hr>

		<div class="row">


			<div class="col-4">

				<hr>
				<hr>
				<h5 style="word-break: break-word;"> <small>
						<p id="txid"> </p>
						<p id="senderaddress"> </p>
						<p id="contractaddress"> </p>
						<p id="blocknum"> </p>
				</h5></small>

				<h5> <small>

				</h5></small>
				<hr>

				<hr>
			</div>

			<div class="col-6">

				<h6>If message is encrypted, you can decrypt by entering secret key below.</h6>

				<div class="form-group" class="form-inline">
					<span style="white-space: nowrap">
						<label for="size" id="estimatedgas"> </label>
						<select class="form-control form-control-sm" id="size" style="text-align:right;">
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

				<div id="encryptsection"><br>
					<h6><small>
							<p id="secretkeymsg">Enter Your Sceret Key</p>
						</small></h6>
					<input type="text" class="form-control" id="secretkey" value="">
				</div>
				<br>



				<h6><small>
						<p id="replyto" hidden>Reply Message (optional)</p>
					</small></h6>
				<textarea class="form-control" rows="11" id="replymessage" hidden></textarea>
				<br>


				<button type="button" class="btn btn-primary btn-sm  btn-block" id="decryptid" onclick="decryptmessage()" disabled>Decrypt Message</button>
				<br>
				<button type="button" class="btn btn-primary btn-sm    btn-block" id="replymessageid" onclick="replymessage()" hidden>Reply Message</button>
				<br>
				<button type="button" class="btn btn-primary btn-sm    btn-block" id="filedownloadid" onclick="downloadattachment()" disabled>File Download</button>

				<hr>
			</div>

		</div>

		<p>


			<br>
			<hr>
			<noscript>
				You need to enable JavaScript to run this app.
			</noscript>


</body>
<script>
	var animatespinner = '<i class="fas fa-spinner fa-spin fa-2x"></i>',
		oripermanentmessage = "",
		flagdigit1 = 0,
		flagdigit2 = 0,
		flagdigit3 = 0;
	async function decryptmessage() {
		content = oripermanentmessage, console.log("showing content=", content), endofheader = "@@-----@@", secretkey = document.getElementById("secretkey").value;
		var e = ""; - 1 == content.search(endofheader) ? (content = content.substring(8), endofcontent = "@@-@@@-@@", nextindex = content.search(endofcontent), -1 != nextindex && (content = content.substr(0, nextindex)), encryptedtext = content.replace(/(\r\n|\n|\r)/gm, ""), bytes = CryptoJS.AES.decrypt(encryptedtext, secretkey), e = bytes.toString(CryptoJS.enc.Utf8), document.getElementById("comment").value = e) : (endofcontent = "@@-@@@-@@", endcontentindex = content.search(endofcontent), console.log("endcontentindex=", endcontentindex), num = content.search(endofheader), removelen = num + endofheader.length, k = content.length - removelen, remainlen = content.length - k, headerstr = content.substr(0, remainlen), headerstr = headerstr.substring(8), console.log("header..."), console.log(headerstr), encryptedtext = content.substring(removelen), nextindex = encryptedtext.search(endofcontent), console.log("nextindex=", nextindex), -1 != nextindex && (encryptedtext = encryptedtext.substr(0, nextindex)), console.log("encrypt-=", encryptedtext), encryptedtext = encryptedtext.replace(/(\r\n|\n|\r)/gm, ""), console.log("encryptedtext=", encryptedtext), bytes = CryptoJS.AES.decrypt(encryptedtext, secretkey), e = bytes.toString(CryptoJS.enc.Utf8), headerstr = headerstr.replace("@@-----@@", ""), headerstr = headerstr.replace("@@-@@@-@@", ""), document.getElementById("comment").value = headerstr + "\r\n" + e)
	}

	function dataURLtoFile(e, t) {
		for (var n = e.split(","), o = n[0].match(/:(.*?);/)[1], d = atob(n[1]), c = d.length, r = new Uint8Array(c); c--;) r[c] = d.charCodeAt(c);
		return new File([r], t, {
			type: o
		})
	}

	function downloadattachment() {
		content = oripermanentmessage, console.log("showing content=", content), endofheader = "@@-@@@-@@", secretkey = document.getElementById("secretkey").value;
		var e = "";
		if (-1 == content.search(endofheader)) console.log("not attachment found!"), encryptedtext = content.replace(/(\r\n|\n|\r)/gm, ""), bytes = CryptoJS.AES.decrypt(encryptedtext, secretkey), e = bytes.toString(CryptoJS.enc.Utf8), document.getElementById("comment").value = headerstr + e;
		else {
			num = content.search(endofheader), removelen = num + endofheader.length, k = content.length - removelen, remainlen = content.length - k, headerstr = content.substr(0, remainlen), encryptedtext = content.substring(removelen), 2 == flagdigit3 ? (secretkey = document.getElementById("secretkey").value, encryptedtext = encryptedtext.replace(/(\r\n|\n|\r)/gm, ""), bytes = CryptoJS.AES.decrypt(encryptedtext, secretkey), e = bytes.toString(CryptoJS.enc.Utf8), encryptedtext = e) : (encryptedtext = encryptedtext.replace(/(\r\n|\n|\r)/gm, ""), console.log("attachment:", encryptedtext)), endnum = encryptedtext.search("data:");
			var t = encryptedtext.substr(0, endnum);
			encryptedtext = encryptedtext.substring(endnum);
			var n = document.createElement("a");
			n.style.display = "none", n.setAttribute("target", "_blank"), n.setAttribute("href", encryptedtext), n.setAttribute("download", t), document.body.appendChild(n), n.click(), document.body.removeChild(n)
		}
	}
	async function readmsgfromblockhain(e) {
		document.getElementById("comment").value = "Loading...",
		zilliqa = new Zilliqa.Zilliqa("https://dev-api.zilliqa.com"),
		console.log(e),
		txn = await zilliqa.blockchain.getTransaction(e),
		msg = txn.receipt.event_logs[0].params[0].value,
		oripermanentmessage = msg,
		flagstr = msg.substring(0, 8),
		flagdigit1 = flagstr.charAt(2),
		flagdigit2 = flagstr.charAt(3),
		flagdigit3 = flagstr.charAt(4),
		console.log("flagstr=", flagstr),
		document.getElementById("replymessageid").disabled = !1,
		2 == flagdigit2 && (document.getElementById("decryptid").disabled = !1),
		0 != flagdigit3 && (document.getElementById("filedownloadid").disabled = !1),
		numofrow = msg.split(/\r\n|\r|\n/).length,
		numofrow < 5 && (numofrow = 5),
		document.getElementById("comment").rows = numofrow,
		msg = msg.substring(8),
		msg = msg.replace("@@-----@@", ""),
		msg = msg.replace("@@-@@@-@@", ""),
		document.getElementById("comment").value = msg,
		console.log(msg),
		console.log(txn.senderAddress.toLowerCase()),
		senderAddr = Zilliqa.toBech32Address(txn.senderAddress.toLowerCase()),
		console.log(txn.toAddr.toLowerCase()),
		contractAddr = Zilliqa.toBech32Address(txn.toAddr.toLowerCase()),
		blocknum = txn.receipt.epoch_num,
		document.getElementById("blocknum").innerHTML = "Blocknum: " + blocknum,
		document.getElementById("txid").innerHTML = "TXid: 0x" + e,
		document.getElementById("senderaddress").innerHTML = "Sender Address: " + senderAddr
	}

	function sendtxid() {
		searchtxid = document.getElementById("searchtxid").value,
		window.location.replace("http://127.0.0.1/mymessage/readmessage.php?txid=" + searchtxid)
	}
	txid = "<?php echo $txid ?>",
	"0" != txid && (document.getElementById("txid").value = "<?php echo $txid ?>",
	readmsgfromblockhain(txid)),
	$("#comment").on("change keyup paste", function() {}),
	$("#size").on("change keyup paste", function() {
		size = document.getElementById("size").value,
		console.log(size),
		"Font: 2px" == size && (document.getElementById("comment").style.fontSize = "2px", document.getElementById("comment").rows = "150"),
		"Font: 4px" == size && (document.getElementById("comment").style.fontSize = "4px", document.getElementById("comment").rows = "75"),
		"Font: 6px" == size && (document.getElementById("comment").style.fontSize = "6px", document.getElementById("comment").rows = "50"),
		"Font: 8px" == size && (document.getElementById("comment").style.fontSize = "8px", document.getElementById("comment").rows = "38"),
		"Font: 10px" == size && (document.getElementById("comment").style.fontSize = "10px"),
		"Font: 12px" == size && (document.getElementById("comment").style.fontSize = "12px"),
		"Font: 14px" == size && (document.getElementById("comment").style.fontSize = "14px"),
		"Font: 16px" == size && (document.getElementById("comment").style.fontSize = "16px")
	}), $("#encryptmessage").on("change keyup paste", function() {
		encryptedchecked = document.getElementById("encryptmessage").checked,
		encryptedchecked ? document.getElementById("encryptsection").style.display = "block" : document.getElementById("encryptsection").style.display = "none"
	});
</script>

</html>