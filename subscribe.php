<?php
require_once ('configuration.php');
$email   = trim($_REQUEST['email']);
$err     = "";
$nheaders = "From: " . SUBSCRIBER_FROM_NAME . " <" . $email . ">\r\nReply-To: " . $email . "";
$userheaders = "From: Agora Code Community <" . TO_EMAIL . ">\r\nReply-To: " . TO_EMAIL . "";
$pattern = "^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$^";
if (!preg_match_all($pattern, $email, $out)) {
    $err = MSG_INVALID_SUBSCRIBE_EMAIL;
}
if (!$email) {
    $err = MSG_INVALID_SUBSCRIBE_EMAIL;
}
if (!$err) {
    //Save to Database
    $query  = "SELECT * FROM subscribe WHERE email_address = '" . $email . "'";
    $result = mysqli_query($dbconn,$query);
    if (mysqli_num_rows($result) > 0){
        echo '<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Oops!</strong> Already exists in the subscriber database!
						</div>';
    }else {
        $query = "INSERT INTO subscribe (email_address, subscribed) VALUES ('" . $email . "', '" . SUBSCRIPTION . "')";
        mysqli_query($dbconn, $query) or die("Error adding " . $email . " to the database!");
        $sent = mail(TO_EMAIL, SUBJECT, SUBSCRIBER_MAIL_MESSAGE, $nheaders);
        $usersent = mail($email, USERSUBJECT, USER_SUBSCRIBER_MAIL_MESSAGE, $userheaders);
        if ($sent){
            echo '<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Well done!</strong> Subscribed Successfully...
						</div>';
        }else{
            echo '<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Oops!</strong> '.MSG_SEND_ERROR.'
						</div>';
        }

    }
} else {
    echo '<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Oops!</strong> '.$err.'
						</div>';
}
?>