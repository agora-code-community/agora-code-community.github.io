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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agora Code Community</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">

	<link href="css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">
                <img data-u="image" src="img/_agora_logo.png"/>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="./">Home</a></li>
                    <li><a href="?page=about">About</a></li>
                    <!--<li><a href="?page=events">Events</a></li>-->
                    <li><a href="?page=jobs">Jobs</a></li>
                    <li><a href="?page=community">Community</a></li>
                    <?php if(isset($_SESSION['member']) || (isset($_SESSION['status']) && $_SESSION['status'] == 'verified')){
                        $user=$_SESSION['member'];
                        $getuser="SELECT * from account where account_id='$user'";
                        $getuser2=mysqli_query($dbconn,$getuser) or die("Could not get user info");
                        $getuser3=mysqli_fetch_array($getuser2);
                        $username = $getuser3['username'];
                        $fullname = $getuser3['first_name'].' '.$getuser3['last_name'];
                        $regDate = $getuser3['created'];

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
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Selected Tab content -->
    <section>
        <section>
            <div>
                <?php
                if(isset($_GET['page'])) //looking at a page
                {
                    $page = $_GET['page'];
                    include"$page.php";
                }else //looking at main index
                {
                    include "landing.php";
                }
                ?>
            </div>
        </section>
    </section>
    <!--/. Selected Tab content -->
    </body>


	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="0.4s">
					<div class="page-scroll marginbot-30">
						<a href="#intro" id="totop" class="btn btn-circle">
							<i class="fa fa-angle-double-up animated"></i>
						</a>
					</div>
					</div>
                    <!--<p>&copy;SquadFREE. All rights reserved.</p>-->
                    <div class="credits">
                        <!-- 
                            All the links in the footer should remain intact. 
                            You can delete the links only if you purchased the pro version.
                            Licensing information: https://bootstrapmade.com/license/
                            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Squadfree
                        -->
                    </div>
				</div>
			</div>	
		</div>
	</footer>

    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
    
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.js"></script>

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

</html>
