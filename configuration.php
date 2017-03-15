<?php
define('CONSUMER_KEY', 'ENUKTqUw8HG05fj3yzK0I7xZG');
define('CONSUMER_SECRET', 'c3iy9osbsruizoncjzSCAYxVIlUr8SmykVJZVNYlJikd9M7hPM');
define('OAUTH_CALLBACK', 'http://agoracode.community/process.php');

//Facebook
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '331968697159745'; //Facebook App ID
$appSecret = '5a8e42a2680a8e52574f339532796108'; // Facebook App Secret
$homeurl = 'http://agoracode.community/';  //return to home
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
//Sending Mail
$from = 'noreply@agoracode.community';

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
define('TO_EMAIL', 'agoracode@agoracode.community');

//Subject For Email
define('SUBJECT', 'Contact from your website');
define('USERSUBJECT', 'Welcome to Agora Code Community');

//Subscription
define('SUBSCRIPTION', 'Yes');


//Messages
define('SUBSCRIBER_MAIL_MESSAGE', 'New subscriber subscribed to our website');
define('USER_SUBSCRIBER_MAIL_MESSAGE', 'Hey There!!..

Thanks so much for signing up for the Agora Code Community newsletter! 

You’re joining an amazing community of folks who love nerding out about productivity.

Here’s what to expect We will be sending you get emails with a collection of our best content, advice and food for thought to help you get more out of your dev.. As well as regular updates on our events and activties done. You wont have to worry we do not spam.

Oh, by the way, let’s introduce ourselves before we get going. Agora Code Community is a subsidiary of Agora Innovatus Limited. It is an idea born with a purpose, to create a community both online and off to encourage more partnership, improve the network of coders/programmers and provide a platform for people of all ages to learn how to code/program across Africa.

We’d love to chat. Just hit reply to this email or any of our newsletters to get in touch with feedback, questions, or ideas for us!

Have an awesome day!
From Agora Code Community..

[unsubscribe]
');
define('MSG_INVALID_NAME', 'Please enter your name.');
define('MSG_INVALID_EMAIL', 'Please enter valid e-mail.');
define('MSG_INVALID_MESSAGE', 'Please enter your message.');
define('MSG_SEND_ERROR', 'Sorry, we can\'t send this message.');
define('MSG_INVALID_SUBSCRIBE_EMAIL', 'Oops! Please enter a valid email address');

//-> END NEWSLETTER
?>
