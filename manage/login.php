<?php 
if(!defined("ADMIN_IS_INCLUDED")){header("Location:unauthorised_error.php");}
	if (isset($_POST['login'])) // name of submit button
	{
		$username=$_POST['username'];
		$username=strip_tags(trim($username));
      $password=$_POST['password'];
      $password=strip_tags($password);
      $password=trim($password);
      $query = "select * from account, staff where account.username='$username' and staff.account_id = account.account_id"; 
      $result = mysqli_query($dbconn, $query) or die("Could not query");
      $result2=mysqli_fetch_array($result);
      $password_hash = $result2['password'];
      $account_id = $result2['account_id'];
      if (password_verify($password, $password_hash)){
      		$_SESSION['manage']=$account_id;
      		$loginmessage = '<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Well done!</strong> logged in successfully...
						</div>';
      	
      }else{
      	header("Location:index.php?status=2");
      }
}
else
{ 
	}?>