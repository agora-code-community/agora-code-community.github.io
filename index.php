<?php 
session_start();
// Start a session
define("IS_INCLUDED", true);// Defines the variable that controls direct
require_once ('configuration.php');
include_once("inc/twitteroauth.php");
//For the database connectivity
include_once("includes/functions.php");
date_default_timezone_set("Africa/Lusaka");
$loginmessage = '';

if(isset($_GET['logout'])){
	$_SESSION['member']=null;
	unset($_SESSION['userdata']);
	session_destroy();
	$loginmessage = '<div class="alert alert-success">
							<strong>Well done!</strong> You have successfully logged out...
						</div>';
	header("Location:index.php");
}

$userStatus = 0;

if(isset($_POST['login'])){
	include "login.php";
}

if(isset($_SESSION['status']) && $_SESSION['status'] == 'verified')
{
	//Retrive variables
	$screen_name = $_SESSION['request_vars']['screen_name'];
	$twitter_id			= $_SESSION['request_vars']['user_id'];
	$oauth_token 		= $_SESSION['request_vars']['oauth_token'];
	$oauth_token_secret = $_SESSION['request_vars']['oauth_token_secret'];

	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $oauth_token, $oauth_token_secret);

	$selectuser="SELECT * FROM account WHERE oauth_uid ='$twitter_id'";
	$selectuser2=mysqli_query($dbconn, $selectuser) or die("Could not query. " .mysqli_error($dbconn));
	$selectuser3=mysqli_fetch_array($selectuser2);

	$_SESSION['member'] = $selectuser3['account_id'];
}

//Facebook
if(!$fbuser){
	$fbuser = null;
	$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));
	$output = '<a href="'.$loginUrl.'"><img src="images/fb_login.png"></a>';
}else{
	$user_profile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
	$user = new Users();
	$user_data = $user->checkUser('facebook',$user_profile['id'],$user_profile['first_name'],$user_profile['last_name'],$user_profile['email'],$user_profile['locale'],"","",$user_profile['picture']['data']['url']);
	if(!empty($user_data)){
		$output = '<h1>Facebook Profile Details </h1>';
		$output .= '<img src="'.$user_data['avatar'].'">';
		$output .= '<br/>Facebook ID : ' . $user_data['oauth_uid'];
		$output .= '<br/>Name : ' . $user_data['first_name'].' '.$user_data['last_name'];
		$output .= '<br/>Email : ' . $user_data['email'];
		//$output .= '<br/>Gender : ' . $user_data['gender'];
		//$output .= '<br/>Locale : ' . $user_data['locale'];
		$output .= '<br/>You are login with : Facebook';
		$output .= '<br/>Logout from <a href="logout.php?logout">Facebook</a>';
			
		$selectuser="SELECT * FROM account WHERE oauth_uid ='".$user_data['oauth_uid']."'";
		$selectuser2=mysqli_query($dbconn, $selectuser) or die("Could not query. " .mysqli_error($dbconn));
		$selectuser3=mysqli_fetch_array($selectuser2);
			
		$_SESSION['member'] = $selectuser3['account_id'];
	}else{
		$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
	}
}

if(isset($_SESSION['member'])){
	$user=$_SESSION['member'];
	$selectuser="SELECT * from account, staff where account.account_id='$user' and staff.account_id = account.account_id";
	$selectuser2=mysqli_query($dbconn, $selectuser);
	$selectuser3=mysqli_fetch_array($selectuser2);
	$userStatus = 0;
	if($selectuser3){
		$userStatus = 3;
	}

}

$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));

?><!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8">
  <title>Agora Code Community | Lusaka, Zambia</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <meta property="og:title" content="">
	<meta property="og:type" content="website">
	<meta property="og:url" content="">
	<meta property="og:site_name" content="">
	<meta property="og:description" content="">

  <!-- Styles -->

  <link rel="icon" type="image/gif" href="favicon.png" />
  
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  
  <?php 
  if(!isset($_GET['page']) && !isset($_SESSION['member']) && !isset($_SESSION['status'])){
  	?>
  	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900|Montserrat:400,700' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="css/main.css">
  	<script src="js/modernizr-2.7.1.js"></script>
  	<?php
  }else{
  	?>
  	<link rel="stylesheet" href="js/jPlayer/jplayer.flat.css" type="text/css" />
  	<link rel="stylesheet" href="css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />  
    <link rel="stylesheet" href="js/datepicker/datepicker.css" type="text/css" />
<link rel="stylesheet" href="js/slider/slider.css" type="text/css" />
<link rel="stylesheet" href="js/chosen/chosen.css" type="text/css" />
<link rel="stylesheet" href="js/datatables/datatables.css" type="text/css"/> 
  	<?php
  }
  ?>

  <script src="js/jquery.min.js"></script>  

</head>

<body class="">
    <?php 
  if (isset($_SESSION['member']) || isset($_GET['page']) || (isset($_SESSION['status']) && $_SESSION['status'] == 'verified')):
		include "frontpage.php";
  	
  else:
          include"landing.php";
  endif;
  ?>
    


    <!-- Javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<!--Sign in dialog-->
   <div class="modal fade" id="modal-form">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body wrapper-lg">
          <div class="row">
            <div class="col-sm-6 b-r">
              <h3 class="m-t-none m-b">Sign in</h3>
              <p>Sign in to meet your friends.</p>
              <form action='index.php' role="form" method="post">
                <div class="form-group">
                  <label>Email</label>
                  <input type='email' name='email' class="form-control" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Password" name='password' value=''>
                </div>
                <div class="checkbox m-t-lg">
                  <button type="submit" name='login' class="btn btn-sm btn-success pull-right text-uc m-t-n-xs"><strong>Log in</strong></button>
                  <label>
                    <input type="checkbox"> Remember me
                  </label>
                </div>
              </form>
            </div>
            <div class="col-sm-6">
              <h4>Not a member?</h4>
              <p>You can create an account <a href="?page=member&signup" class="text-info">here</a></p>
              <p>OR</p>
              <a href="<?php echo $loginUrl; ?>" class="btn btn-primary btn-block m-b-sm"><i class="fa fa-facebook pull-left"></i>Sign in with Facebook</a>
              <a href="process.php" class="btn btn-info btn-block m-b-sm"><i class="fa fa-twitter pull-left"></i>Sign in with Twitter</a>
              <a href="#" class="btn btn-danger btn-block"><i class="fa fa-google-plus pull-left"></i>Sign in with Google+</a>
            </div>
          </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
<!--Sign in dialog-->

	<!--ticket dialog-->
    <div class="modal fade" id="modal-form-2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body wrapper-lg">
                    <div class="row">
                        <div class="container-fluid" style="width:100%; text-align:left;">
                            <iframe src="//eventbrite.com/tickets-external?eid=29684227323&ref=etckt" frameborder="0" height="275" width="100%" vspace="0" hspace="0" marginheight="5" marginwidth="5" scrolling="auto" allowtransparency="true">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
	<!--ticket dialog-->
  
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <?php 
  if(!isset($_GET['page']) && !isset($_SESSION['member']) && !isset($_SESSION['status'])){
  	?>
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
  	<?php
  }else{
  	?>
  
  <!-- App -->
  <script src="js/app.js"></script>
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
  	<!-- parsley -->
<script src="js/parsley/parsley.min.js"></script>
<script src="js/parsley/parsley.extend.js"></script>
  
  <!-- datepicker -->
  <script src="js/datepicker/bootstrap-datepicker.js"></script>
  <!-- slider -->
  <script src="js/slider/bootstrap-slider.js"></script>
  <!-- file input -->
  <script src="js/file-input/bootstrap-filestyle.min.js"></script>
  <!-- wysiwyg -->
  <script src="js/wysiwyg/jquery.hotkeys.js"></script>
  <script src="js/wysiwyg/bootstrap-wysiwyg.js"></script>
  <script src="js/wysiwyg/demo.js"></script>
  <!-- markdown -->
  <script src="js/markdown/epiceditor.min.js"></script>
  <script src="js/markdown/demo.js"></script>

  <script src="js/chosen/chosen.jquery.min.js"></script>
  <script src="js/app.plugin.js"></script>
  <script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script>
  <script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script>
  <script type="text/javascript" src="js/jPlayer/demo.js"></script>
  	<?php
  }
  ?>
  
  
  
  
  <script type="text/javascript"> 
$("input[type=password]").keyup(function(){
    var ucase = new RegExp("[A-Z]+");
	var lcase = new RegExp("[a-z]+");
	var num = new RegExp("[0-9]+");
	var spchar = new RegExp("[@#$%]+");
	
	if($("#password1").val().length >= 8){
		$("#8char").removeClass("fa-times");
		$("#8char").addClass("fa-check");
		$("#8char").css("color","#00A41E");
	}else{
		$("#8char").removeClass("fa-check");
		$("#8char").addClass("fa-times");
		$("#8char").css("color","#FF0004");
	}
	
	if(ucase.test($("#password1").val())){
		$("#ucase").removeClass("fa-times");
		$("#ucase").addClass("fa-check");
		$("#ucase").css("color","#00A41E");
	}else{
		$("#ucase").removeClass("fa-check");
		$("#ucase").addClass("fa-times");
		$("#ucase").css("color","#FF0004");
	}

	if(spchar.test($("#password1").val())){
		$("#spchar").removeClass("fa-times");
		$("#spchar").addClass("fa-check");
		$("#spchar").css("color","#00A41E");
	}else{
		$("#spchar").removeClass("fa-check");
		$("#spchar").addClass("fa-times");
		$("#spchar").css("color","#FF0004");
	}
	
	if(lcase.test($("#password1").val())){
		$("#lcase").removeClass("fa-times");
		$("#lcase").addClass("fa-check");
		$("#lcase").css("color","#00A41E");
	}else{
		$("#lcase").removeClass("fa-check");
		$("#lcase").addClass("fa-times");
		$("#lcase").css("color","#FF0004");
	}
	
	if(num.test($("#password1").val())){
		$("#num").removeClass("fa-times");
		$("#num").addClass("fa-check");
		$("#num").css("color","#00A41E");
	}else{
		$("#num").removeClass("fa-check");
		$("#num").addClass("fa-times");
		$("#num").css("color","#FF0004");
	}
	
	if($("#password1").val() == $("#password2").val()){
		$("#pwmatch").removeClass("fa-times");
		$("#pwmatch").addClass("fa-check");
		$("#pwmatch").css("color","#00A41E");
	}else{
		$("#pwmatch").removeClass("fa-check");
		$("#pwmatch").addClass("fa-times");
		$("#pwmatch").css("color","#FF0004");
	}
});
</script>
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.js"></script>
	<!-- App -->
	<script src="js/app.js"></script>
	<script src="js/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="js/app.plugin.js"></script>
	<script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script>
	<script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script>
	<script type="text/javascript" src="js/jPlayer/demo.js"></script>


    </body>
</html>
