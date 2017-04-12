<?php

//Connect databse
$dbconn = mysqli_connect('localhost','root','','agora');
if(!$dbconn){
    echo "error connecting to database";
}
//Receiver Mail i.e., From Email Address
define('SUBSCRIBER_FROM_NAME', 'Subscriber');
define('TO_EMAIL', 'buddy@agoracode.community');

//Subscription
define('SUBSCRIPTION', 'Yes');

//Subject For Email
define('SUBJECT', 'Contact from your website');
define('USERSUBJECT', 'Welcome to Agora Code Community Newsletter');


//Messages
define('SUBSCRIBER_MAIL_MESSAGE', 'New subscriber subscribed to our website');
define('USER_SUBSCRIBER_MAIL_MESSAGE', 'Hey There!!..
Thanks so much for signing up for the Agora Code Community newsletter! 
You’re joining an amazing community of folks who love nerding out about productivity.
Here’s what to expect We will be sending you get emails with a collection of our best content, advice and food for thought to help you get more out of your dev.. As well as regular updates on our events and activties done. You wont have to worry we do not spam.
Oh, by the way, let’s introduce ourselves before we get going. Agora Code Community is a subsidiary of Agora Innovatus Limited. It is an idea born with a purpose, to create a community both online and off to encourage more partnership, improve the network of coders/programmers and provide a platform for people of all ages to learn how to code/program across Africa.
We’d love to chat. Just hit reply to this email or any of our newsletters to get in touch with feedback, questions, or ideas for us!
Have an awesome day!
From Agora Code Community..http://buddy@agoracode.community/unsubscribe/');
define('MSG_INVALID_NAME', 'Please enter your name.');
define('MSG_INVALID_EMAIL', 'Please enter valid e-mail.');
define('MSG_INVALID_MESSAGE', 'Please enter your message.');
define('MSG_SEND_ERROR', 'Sorry, we can\'t send this message.');
define('MSG_INVALID_SUBSCRIBE_EMAIL', 'Oops! Please enter a valid email address');