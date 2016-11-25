<?php 
session_start();
// Start a session
define("ADMIN_IS_INCLUDED", true);// Defines the variable that controls direct
require_once ('../configuration.php');
date_default_timezone_set("Africa/Lusaka");
$loginmessage = '';
$userStatus = 0;
if(isset($_POST['login'])){
	include 'login.php';
}

if(isset($_SESSION['manage'])){
	$user=$_SESSION['manage'];
	$selectuser="SELECT * from account, staff where account.account_id='$user' and staff.account_id = account.account_id";
	$selectuser2=mysqli_query($dbconn, $selectuser);
	$selectuser3=mysqli_fetch_array($selectuser2);
	$fullname = $selectuser3['first_name']." ".$selectuser3['last_name'];
	$userStatus = 0;
	if($selectuser3){
		$userStatus = 3;
	}

}

?>
<!DOCTYPE html>
<html lang="en" class="">
<head>  
  <meta charset="utf-8" />
  <title>Agora Code Community | Admin</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="../js/jPlayer/jplayer.flat.css" type="text/css" />
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />  
    <!--[if lt IE 9]>
    <script src="../js/ie/html5shiv.js"></script>
    <script src="../js/ie/respond.min.js"></script>
    <script src="../js/ie/excanvas.js"></script>
  <![endif]-->
  
  <script>
function loadVal(){
	desc = $("#editor").html();
	document.form1.desc.value = desc;
}
</script>
</head>
<body class="">
<?php 
if(isset($_GET['logout'])){
	$_SESSION['staff']=null;
	session_destroy();
	$loginmessage = '<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Well done!</strong> Logged out successfully.
						</div>';
}

if(isset($_SESSION['manage'])){
	include "dashboard.php";
}else{
	//include "frontpage.php";
	include "frontpage.php";
}
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
                
  <script src="../js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.js"></script>
  <!-- App -->
  <script src="../js/app.js"></script>  
  <script src="../js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../js/app.plugin.js"></script>
  <script type="text/javascript" src="../js/jPlayer/jquery.jplayer.min.js"></script>
  <script type="text/javascript" src="../js/jPlayer/add-on/jplayer.playlist.min.js"></script>
  <script type="text/javascript" src="../js/jPlayer/demo.js"></script>
</body>
</html>