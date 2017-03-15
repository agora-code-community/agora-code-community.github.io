<?php
if(!defined("IS_INCLUDED")){header("Location:unauthorised_error.php");}
if (isset($_POST['login'])) // name of submit button
{
    $email=$_POST['email'];
    $email=strip_tags(trim($email));
    $password=$_POST['password'];
    $password=strip_tags($password);
    $password=trim($password);
    $query = "select * from account where email='$email'";
    $result = mysqli_query($dbconn, $query) or die("Could not query") ;
    $result2=mysqli_fetch_array($result);
    $password_hash = $result2['password'];
    $account_id = $result2['account_id'];
    if (password_verify($password, $password_hash)){
        $validated = "1";
        $query = "select * from account where account_id='$account_id' and oauth_provider = 'email'";
        $result = mysqli_query($dbconn, $query) or die("Could not query") ;
        //$result2=pg_num_rows($result);
        $result2=mysqli_fetch_array($result);
        if($result2){
            $validated = $result2['validated'];
        }
        if($validated == 0){
            header("Location:index.php?page=signin&status=2");
        }else{
            $_SESSION['member']=$account_id;
            $loginmessage = '<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Well done!</strong> logged in successfully...
						</div>';
        }

    }else{
        header("Location:index.php?page=signin&status=2");
    }
}
else
{
}?>