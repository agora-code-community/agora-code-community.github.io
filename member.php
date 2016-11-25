<?php
if(!defined("IS_INCLUDED")){header("Location:unauthorised_error.php");}
?>
<?php  include"breadcrumb.php";?>
<section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xxl">
    
<?php
if (isset($_GET['signup'])):
if(isset($_POST['register']))
{
		$bademail=0; //trackers for banned e-mails
		$email=trim(strip_tags($_POST['email']));
		$getbademails="SELECT * from banemails";
		$getbademails2=mysqli_query($dbconn, $getbademails) or die("Could not grab bad emails");
		while($getbademails3=mysqli_fetch_array($getbademails2))
		{
			if(substr_count($email,$getbademails3['email'])>0)
			{
				$bademail++;
			}
		}
		if($bademail>0)
		{
			print"<table class='maintable'><tr class='headline'><td><center>Registering...</center></td></tr><tr class='forumrow'><td><center>That email is banned from registering</td></tr></table></center>";
		}
		$valid=1;
		$username=trim(strip_tags($_POST['username']));
		$password=strip_tags(trim($_POST['password']));
		$pass2=$_POST['pass2'];
		$usercheck="SELECT * from account where username='$username' or email='$email'";
		$usercheck2=mysqli_query($dbconn, $usercheck);
		while ($usercheck3=mysqli_fetch_array($usercheck2))
		{
			$valid=0;
		}
		if($valid==0)
		{
			print "<table class='maintable'>";
			print "<tr class='headline'><td><center>Registering...</center></td></tr>";
			print "<tr class='forumrow'><td><center>";
			print "That username has been taken or there is already someone registered with that email, please <A href='?page=member&signup'>Try to register again</a>.";
			print "</td></tr></table></center>";
		}
		else
		{
				$todayTimestamp = mktime(Date('H'),Date('i'),Date('s'),Date('m'),Date('d'),Date('Y'));
				
				$options = [
				'cost' => 11,
				'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
				];
				$password = password_hash($password, PASSWORD_BCRYPT, $options);

				$email=$_POST['email'];
				$firstname=$_POST['firstname'];
				$lastname=$_POST['lastname'];
				$newsletter=$_POST['newsletter'];
				$key=RAND(1000000,2000000);
				$nl = 1;
				if($newsletter == "ON"){
					$nl = 1;
					$values = 'values ("'.$email.'", "yes")';
					$insert ="INSERT into subscribe(email_address, subscribed) ".$values;
					mysqli_query($dbconn, $insert) or die(mysqli_error($dbconn));
				}  else {
					$nl = 0;
				}
				$SQL ="INSERT into account (username, password, first_name, last_name, email)
				values('$username','$password','$firstname','$lastname','$email')";
				mysqli_query($dbconn, $SQL) or die(mysqli_error($dbconn));
				
				$queryuser = "select * from account where username='$username'";
				$resultuser = mysqli_query($dbconn, $queryuser) or die("Could not query") ;
				//$result2=pg_num_rows($result);
				$resultuser2=mysqli_fetch_array($resultuser);
				
				$account_id = $resultuser2['account_id'];
				
				//Create Client
				$SQL ="INSERT into client (account_id, validated, keynode, validation_reminder, registration_date, funds)
				values('$account_id','0','$key','3','$todayTimestamp','0.00')";
				mysqli_query($dbconn, $SQL) or die(mysqli_error($dbconn));
				
				echo'<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Well done!</strong> Registration completed please check your email for activation key. Go here to <a href="#modal-form" data-toggle="modal">Login</a>.
						</div>';
				
				
				
				$to = $email;
				$subject = 'Your Agora Code Community activation key';
				
				// Compose a simple HTML email message
				$message = '<html><body>';
				$message .= '<h1 style="color:#f40;">Dear '.$firstname.' '.$lastname.',</h1>';
				$message .= '<p style="color:#080;font-size:18px;">In order to serve you better,
		An account has been created for you at <a href="www.agora.icifrost.me">www.agora.icifrost.me</a>.</p>';
				$message .= '<p style="color:#080;font-size:18px;">
						<a href="http://www.agora.icifrost.me/index.php?page=member&activate&username='.$username.'&keynode='.$key.'">
						Click Here</a> To activate your account or copy and paste the following 
						URL in your browser<br/>
				<a href="http://www.agora.icifrost.me/index.php?page=member&activate&username='.$username.'&keynode='.$key.'">
						http://www.agora.icifrost.me/index.php?page=member&activate&username='.$username.'&keynode='.$key.'</a></p>';
				$message .= '<p style="color:#080;font-size:18px;"> Regards, <br/>
		Team Mwanta <br/>
		<a href="www.agora.icifrost.me">www.agora.icifrost.me</a>
		</p>';
				$message .= '</body></html>';
				
				// Sending email
				if(mail($to, $subject, $message, $headers)){
					echo'<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Well done!</strong> Your mail has been sent successfully.
						</div>';
				} else{
					echo'<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Oops!</strong> Unable to send email. Please try again.
						</div>';
				}
				
				mail("admin@mwanta.com","Registration at Agora Code Community Website","This is just to inform you that $username has just registered on agora.icifrost.me");
		}
}else{
?>

      <header class="panel-heading bg-black dk font-bold rounded">Create an Account
      <a href='?page=signin' class="navbar-right"><b>LOG IN?</b></a>
      </header>
                    <div class="panel-body">
                    <p>New to Mwanta? Quickly signup for an account now. <br/>
                    <b>All fields are required.</b></p>
                      <form id="passwordForm" action="index.php?page=member&signup" method="post" data-validate="parsley">
                      <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="username" class="form-control" data-required="true" placeholder="Enter Username">
                        </div>
                        <p>
                        All new passwords must contain at least 8 characters, one capital and one lower-case letter (Aa-Zz), one special symbol (#, &, % etc), and one number (0-9).
                        </p>
                        <div class="form-group">
                          <label>Password</label>
                          <input name="password" type="password" value="" id="password1" class="form-control" placeholder="Password"
 pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{8,100})" data-parsley-pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})" data-required="true" autocomplete="off">
                        </div>
                        <div class="row">
<div class="col-sm-6">
<small>
<span id="8char" class="fa fa-times" style="color:#FF0004;"></span> 8 Characters Long<br>
<span id="ucase" class="fa fa-times" style="color:#FF0004;"></span> One Uppercase Letter<br/>
<span id="spchar" class="fa fa-times" style="color:#FF0004;"></span> Special Character
</small>
</div>
<div class="col-sm-6">
<span id="lcase" class="fa fa-times" style="color:#FF0004;"></span> One Lowercase Letter<br>
<span id="num" class="fa fa-times" style="color:#FF0004;"></span> One Number
</div>
</div>
<br/>
                        <div class="form-group">
                          <label>Confirm Password</label>
                          <input name="pass2" type="password" id="password2" value="" data-equalto="#password1" class="form-control" placeholder="Password" data-required="true" autocomplete="off">
                        </div>
                        <div class="row">
<div class="col-sm-12">
<span id="pwmatch" class="fa fa-times" style="color:#FF0004;"></span> Passwords Match
</div>
</div>
<br/>

                        <div class="form-group">
                          <label>First Name</label>
                          <input name="firstname" type="text" value="" id="password2" class="form-control" placeholder="Enter First Name" data-required="true">
                        </div>
                        <div class="form-group">
                          <label>Last Name</label>
                          <input name="lastname" type="text" value="" class="form-control" placeholder="Enter Last Name" data-required="true">
                        </div>
                        
                        <div class="form-group">
                          <label>Email address</label>
                          <input name="email" type="text" value="" class="form-control" data-type="email" data-required="true" placeholder="Enter email">
                        </div>
                        
                        <div class="form-group">
                        <label class="checkbox i-checks">
                              <input type="checkbox" name="inlineCheckbox1" value="option1" data-required="true" data-error-message="<span style='color: red'>You must agree to the site policy.</span>"><i></i> I agree to the 
                              <a href="?page=legal/legal" class="text-info">Terms of Service</a>
                            </label>
                        </div>
                        
                        <div class="checkbox i-checks">
                          <label>
                            <input type="checkbox" name="newsletter" checked><i></i> Subscribe to our Newsletter.
                          </label>
                        </div>
                        
                        <button type="submit" name="register" class="btn btn-primary">Signup</button>
                      </form>
                    </div>
<?php
}
?>
<?php
elseif (isset($_GET['activate'])):
$username=strip_tags($_GET['username']);
$keynode=strip_tags($_GET['keynode']);
$getuserkeys="Select * from account, client where account.username='$username' and client.keynode='$keynode' and account.account_id = client.account_id";
$getuserkeys2=mysqli_query($dbconn, $getuserkeys) or die(mysqli_error($dbconn));
$getuserkeys3=mysqli_fetch_array($getuserkeys2);
if($getuserkeys3)
{
	$account_id = $getuserkeys3['account_id'];
  	$update="Update client set validated='1' where account_id='$account_id'";
  	mysqli_query($update) or die("Could not activate");
  	echo'<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Well done!</strong> Account activated.
						</div>';
}else{
	print "<table class='maintable'>";
  	print "<tr class='headline'><td><center>Registering...</center></td></tr>";
  	print "<tr class='forumrow'><td><center>";
  	print "No such user.";
  	print "</td></tr></table>";
}

elseif (isset($_GET['profile'])):

$user=$_SESSION['member'];
$getuser="SELECT * from users where username='$user'";
$getuser2=mysqli_query($dbconn, $getuser) or die("Could not get user info");
$getuser3=mysqli_fetch_array($getuser2);
if(isset($_POST['submit']))
{
	$password=$_POST['password'];
	$password2=$_POST['password2'];
	$email=$_POST['email'];
	$location=$_POST['location'];
	if($_POST['password']==$_POST['password2'])
	{
		if($_POST['password'])
		{
			$options = [
			'cost' => 11,
			'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
			];
			$password = password_hash($password, PASSWORD_BCRYPT, $options);
			$cp="Update users set password='$password', email='$email',location='$location' where username='$user'";
			mysqli_query($dbconn, $cp) or die("not1");
		}
		else if(strlen($email)<4 || substr_count($email," ")>0)
		{
			die("You did not enter an email");
		}
		else
		{
			$cp="Update users set email='$email',location='$location' where username='$user'";
			mysqli_query($dbconn, $cp) or die(mysqli_error($dbconn));
		}
		print "<div class='valid_box'>
      <b>User CP</b><br/>
        Details updated, redirecting to forum index. <META HTTP-EQUIV = 'Refresh' Content = '2; URL =index.php'>
     </div><table class='maintable'>";
	}
	else if(!$_POST['email'])
	{
		print "<div class='error_box'>
      <b>User CP</b><br/>
        No e-mail value entered, please hit back and try again.
     </div>";
	}
	else
	{
		print "<div class='error_box'>
      <b>User CP</b><br/>
        Passwords did not match, please try again.
     </div>";
	}
}

else
{
	print "From here you can change your password<br><br>";
	$userselect="SELECT*from users where username='$user'";
	$userselect2=mysqli_query($dbconn, $userselect);
	$userselect3=mysqli_fetch_array($userselect2);
	print "<form action='?page=member&profile' method='post'>";
	print "<input type='hidden' name='username' value='$userselect3[username]'><br>";
	print "Password:<br><input type='password' name='password'><br>";
	print "Type password again:<br><input type='password' name='password2'><br>";
    print "Your email:<br>";
    print "<input type='text' name='email' size='15' value='$userselect3[email]'><br>";
    print "Location:<br>";
    print "<input type='text' name='location' size='15' value='$userselect3[location]'><br>";
    print "<input type='submit' name='submit' value='change details'>";
    print "</form>";
  }

else:

endif;
?>
</div>
</section>