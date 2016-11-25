<?php
session_start();
// Start a session
define("IS_INCLUDED", true);// Defines the variable that controls direct
require_once ('configuration.php');
date_default_timezone_set("Africa/Lusaka");
$loginmessage = '';

if(isset($_GET['logout'])){
	$_SESSION['member']=null;
	session_destroy();
	$loginmessage = '<div class="alert alert-success">
							<strong>Well done!</strong> You have successfully logged out...
						</div>';
}

$userStatus = 0;

if(isset($_POST['login'])){
	include "login.php";
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
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900|Montserrat:400,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" type="text/css" media="screen, projection" href="style.css" />
  <link rel="icon" type="image/gif" href="favicon.png" />
  <link rel="stylesheet" href="js/jPlayer/jplayer.flat.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
    <link rel="stylesheet" href="js/datepicker/datepicker.css" type="text/css" />
<link rel="stylesheet" href="js/slider/slider.css" type="text/css" />
<link rel="stylesheet" href="js/chosen/chosen.css" type="text/css" />
<link rel="stylesheet" href="js/datatables/datatables.css" type="text/css"/>


  <link rel="stylesheet" href="css/bootstrap.min.css">

  <?php
  if(!isset($_GET['page']) && !isset($_SESSION['member'])){
  	echo '<link rel="stylesheet" href="css/main.css">';
  }
  ?>

  <script src="js/modernizr-2.7.1.js"></script>

  <script src="js/jquery.min.js"></script>

</head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="logo" href="./"><img src="img/_agora_logo_alt.png" alt="Logo"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#about" class="scroll">About</a></li>
            <li><a href="?page=forum/index">Forum</a></li>
            <li><a href="./events/">Events</a></li>
            <li><a href="?page=jobs">Jobs</a></li>
            <?php if(isset($_SESSION['member'])){
            	$user=$_SESSION['member'];
            	$getuser="SELECT * from account, client where account.account_id='$user' and account.account_id = client.account_id";
            	$getuser2=mysqli_query($dbconn,$getuser) or die("Could not get user info");
            	$getuser3=mysqli_fetch_array($getuser2);
            	$username = $getuser3['username'];
            	$fullname = $getuser3['first_name'].' '.$getuser3['last_name'];
            	$regDate = date('Y-m-d H:i:s', $getuser3['registration_date']);

            	$email = $getuser3['email'];

            	$oldDate = new DateTime($regDate);

            	$curDate = mktime(Date('H'),Date('i'),Date('s'),Date('m'),Date('d'),Date('Y'));
            	$curDate = new DateTime(date('Y-m-d H:i:s', $curDate));

            	$difference = $oldDate->diff($curDate);

            	$timePassed = $difference->y.' years, '.$difference->m.' months, '.$difference->d.' days';
            	?>
            	<li>
            <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
              <i class="icon-user"></i>
              Hi <?php echo $username; ?> <b class="caret"></b>
            </a>
            <section class="dropdown-menu aside-xl animated fadeInUp">
              <section class="panel bg-white">
                <div class="panel-heading b-light bg-light">
                  <strong><i class="icon-user"></i> Your Account</strong>
                </div>
                <div class="m-lg">
                <p><b>CUSTOMER: &emsp;&emsp;</b><?php echo $fullname; ?><br/>
                <b>USERNAME: &emsp;&emsp;</b><?php echo $username; ?><br/>
                <b>SUPPORT PIN: &emsp;&emsp;</b><?php echo ""; ?></p>

                    <hr/>

<a style="color: gray;" href="?page=dashboard&username=<?php echo $user; ?>">Dashboard</a><br/>
<a style="color: gray;" href="?page=profile/personal_info">Profile</a><br/>
<a style="color: gray;" href="?logout"><i class="fa fa-sign-out"></i> Logout</a><br/>

                </div>
              </section>
            </section>
          </li>
          <li><a href="?logout"><i class="fa fa-sign-out"></i> Logout</a></li>
            	<?php
			}else{
            	?>
            	<li><a href="#modal-form" data-toggle="modal">Sign in</a></li>
            	<?php
            }

            	?>

          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>


    <div class="mouse-icon hidden-xs">
				<div class="scroll"></div>
			</div>
			<?php
			if (isset($_SESSION['member']) && !isset($_GET['page'])):
        		?>
        		<?php
        			include "dashboard.php";
        			?>
			<?php
        		elseif(!isset($_GET['page']) && !isset($_SESSION['member'])):
        			include "frontpage.php";
        		else:

        		echo $loginmessage;
        		?>
        		                <?php
        		                if(isset($_GET['subscribe'])){
        		                	include "subscribe.php";
        		                }
        		            if(isset($_GET['page'])) //looking at a page
        		            {
        		                $page = $_GET['page'];
        		                include"$page.php";

        		            }else //looking at main index
        		            {

        		            }
        		            ?>

        		            <?php
        		endif;
        		?>
    <footer>
      <div class="container">

        <div class="row">
          <div class="col-sm-8 margin-20">
            <ul class="list-inline social">
              <li>Connect with us on</li>
              <li><a href="https://twitter.com/CodeAgora" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.facebook.com/agoracodecomm" target="_blank"><i class="fa fa-facebook"></i></a></li>
            </ul>
          </div>

          <div class="col-sm-4 text-right">
            <p><small>Copyright &copy; <?php echo date('Y'); ?>. All rights reserved. <br>
	            Created by <a href="http://agora.icifrost.me">The Agora Code Community</a></small></p>
          </div>
        </div>

      </div>

    </footer>


    <!-- Javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="js/wow.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
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
                  <label>Username</label>
                  <input type='text' name='username' class="form-control" placeholder="Enter username">
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
              <a href="#" class="btn btn-primary btn-block m-b-sm"><i class="fa fa-facebook pull-left"></i>Sign in with Facebook</a>
              <a href="#" class="btn btn-info btn-block m-b-sm"><i class="fa fa-twitter pull-left"></i>Sign in with Twitter</a>
              <a href="#" class="btn btn-danger btn-block"><i class="fa fa-google-plus pull-left"></i>Sign in with Google+</a>
            </div>
          </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

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


    </body>
</html>
