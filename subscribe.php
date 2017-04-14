<?php
require_once ('configuration.php');
$email   = trim($_REQUEST['email']);
$err     = "";
$nheaders = "From: " . SUBSCRIBER_FROM_NAME . " <" . $email . ">\r\nReply-To: " . $email . "";
$userheaders = "From: Agora Code Community <" . TO_EMAIL . ">\r\nReply-To: " . TO_EMAIL . "";

if (!$email) {
    $err = MSG_INVALID_SUBSCRIBE_EMAIL;
}
if (!$err) {
    //Save to Database
    $query  = "SELECT * FROM subscribe WHERE email_address = '" . $email . "'";
    $result = mysqli_query($dbconn,$query);
    if (mysqli_num_rows($result) > 0){
       $_SESSION['success'] = "This email is already in our mail list";
        header("location: http://agoracode.community/#call_to_action");
    }else {
        $query = "INSERT INTO subscribe (email_address, subscribed) VALUES ('" . $email . "', '" . SUBSCRIPTION . "')";
        mysqli_query($dbconn, $query) or die("Error adding " . $email . " to the database!");
        $sent = mail(TO_EMAIL, SUBJECT, SUBSCRIBER_MAIL_MESSAGE, $nheaders);
        $usersent = mail($email, USERSUBJECT, USER_SUBSCRIBER_MAIL_MESSAGE, $userheaders);
        if ($sent){
            $_SESSION['success'] = "Subscription Successfull";
            header("location: http://agoracode.community/#call_to_action");
        }else{
            $_SESSION['success'] = "Sorry, we can't send this message";
            header("location: http://agoracode.community/#call_to_action");
        }
    }
} else {
    /*echo '<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Oops!</strong> '.$err.'
						</div>';*/
}
//Set the session variable
$_SESSION['success'] = "Subscription Successfull";
header("location: http://agoracode.community/#call_to_action");
/*header("location: http://agoracode.community/#contact");*/
?>