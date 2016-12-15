<?php
define('CONSUMER_KEY', 'ENUKTqUw8HG05fj3yzK0I7xZG');
define('CONSUMER_SECRET', 'c3iy9osbsruizoncjzSCAYxVIlUr8SmykVJZVNYlJikd9M7hPM');
define('OAUTH_CALLBACK', 'http://kafwana/web/agora/process.php');

//Facebook
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '331968697159745'; //Facebook App ID
$appSecret = '5a8e42a2680a8e52574f339532796108'; // Facebook App Secret
$homeurl = 'http://localhost/web/agora/';  //return to home
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
		'appId'  => $appId,
		'secret' => $appSecret

));
$fbuser = $facebook->getUser();
//End Facebook

//Connect databse
$dbconn = mysqli_connect('localhost','root','260586','agora');
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