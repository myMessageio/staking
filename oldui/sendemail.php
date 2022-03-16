<?php 

// sendemail.php?e=clement@myzilliqawallet.com&t=0xabcdeqwewqeqe&s=zilsadbasjdbasj&d=2020-01-21
$email=$_POST["e"];
$txid=$_POST["t"];
$senderaddress=$_POST["s"];
$datesent=$_POST["d"];
 
$url='https://mymessage.io/test/readmessage.php?txid='.$txid;


$url2="https://viewblock.io/zilliqa/tx/0x".$txid."?network=testnet";

$link="<a href='$url'>$url</a>"; 
$link2="<a href='$url2'>$url2</a>";
 
$to      = $email; // Send email to our user
$subject = 'myMessage | message recorded on blockchain'; // Give the email a subject 
$message2 = 

'Thanks for using myMessage!'."<br>".
'Your message has been sent and recorded on blockchain, you can view your message by clicking the url below.'."<br>". 
"1)".$link."<br>". 
"2)".$link2."<br>". 

'-------------------------------------------------------'."<br>".  
'txid: '.$txid."<br>".
'sender address: '.$senderaddress."<br>".
'date sent: '.$datesent."<br>";
 

  
$from="noreply@myMessage.io"; 
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
  

// Compose a simple HTML email message
$message = '<html><body>';
$message .='<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">';
$message .= '<h4>';
$message .=$message2;
//$message .= '<h1 style="color:#f40;">Hi Jane!</h1>';
//$message .= '<p style="color:#080;font-size:18px;">Will you marry me?</p>';

$message .= '</h4>';
$message .= '</body></html>';


  

//1mail('recipient@example.com', 'Subject', "Message Body", $headers, '-freturn@yourdomain.com')
if (mail($to, $subject, $message, $headers, '-fnoreply@globaldefi.io')) // Send our email
{
echo "email sent success"."<br>".$message;

}
else
	echo "ERROR sending email";
?>