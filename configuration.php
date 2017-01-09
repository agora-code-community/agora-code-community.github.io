<?php
define('CONSUMER_KEY', 'your-twitter-consumer-key');
define('CONSUMER_SECRET', 'your-twitter-consumer-secret-key');
define('OAUTH_CALLBACK', 'your-twitter-callback-url');

//Facebook
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = 'your-facebook-appid'; //Facebook App ID
$appSecret = 'your-facebook-secret-key'; // Facebook App Secret
$homeurl = 'your home url';  //return to home
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
		'appId'  => $appId,
		'secret' => $appSecret

));
$fbuser = $facebook->getUser();
//End Facebook

//Connect databse
$dbconn = mysqli_connect('localhost','root','','agora');
//$dbconn = mysqli_connect('icifrost.me','icifrost_agora','agora19112016!','icifrost_agora');
//Sending Mail
$from = 'kafwana@mwanta.com';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: '.$from."\r\n".
		'Reply-To: '.$from."\r\n" .
		'X-Mailer: PHP/' . phpversion();

//NEWSLETTER
//Pagination Configuration
define('RECORDPERPAGE', '10'); //Number of Rows/Items Per Page
define('SHOWPAGENUMBERS', 'true'); //Hide/Show Page Numbers Button
define('SHOWPREVNEXT', 'true'); //Hide/Show Previous & Next Button

//Receiver Mail i.e., From Email Address
define('SUBSCRIBER_FROM_NAME', 'Subscriber');
define('TO_EMAIL', 'admin@mwanta.com');

//Subject For Email
define('SUBJECT', 'Contact from your website');
define('USERSUBJECT', 'Welcome to Agora Code Community Newsletter');

//Subscription
define('SUBSCRIPTION', 'Yes');


//Messages
define('SUBSCRIBER_MAIL_MESSAGE', 'New subscriber subscribed to our website');
define('USER_SUBSCRIBER_MAIL_MESSAGE', 'Subscribed Successfully, To unsubscribe http://agora.icifrost.me/unsubscribe/');
define('MSG_INVALID_NAME', 'Please enter your name.');
define('MSG_INVALID_EMAIL', 'Please enter valid e-mail.');
define('MSG_INVALID_MESSAGE', 'Please enter your message.');
define('MSG_SEND_ERROR', 'Sorry, we can\'t send this message.');
define('MSG_INVALID_SUBSCRIBE_EMAIL', 'Oops! Please enter a valid email address');

//-> END NEWSLETTER

$numtopicsperpage = 20;
?>
