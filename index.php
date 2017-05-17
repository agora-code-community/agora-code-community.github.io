<?php
include_once "configuration.php";
session_start();
?>
<!DOCTYPE html>
<html class="no-js" xmlns:display="http://www.w3.org/1999/xhtml">

    <head>

        <!--favicon-->
        <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <link rel="shortcut icon" href="favicon/favicon.ico" >
        <link rel="icon" type="image/png" href="favicon/android-icon-36x36.png" >
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Agora Code Community</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        
        <!-- Fonts -->
        <!-- Lato -->
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <!-- CSS -->

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/main.css">

        <!-- Responsive Stylesheet -->
        <link rel="stylesheet" href="css/responsive.css">
        <!--google io custom css-->

    </head>

    <body id="body">

    	<div id="preloader">
    		<div class="book">
    		  <div class="book__page"></div>
    		  <div class="book__page"></div>
    		  <div class="book__page"></div>
    		</div>
    	</div>

	    <!-- 
	    Header start
	    ==================== -->
	    <div class="navbar-default navbar-fixed-top" id="navigation">
	        <div class="container">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="#">
                        <img class="logo-1" src="images/Optimized-agora_logo_new.png" alt="LOGO">
	                    <img class="logo-2" src="images/Optimized-agora_logo_new.png" alt="LOGO">
	                </a>
	            </div>

	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <nav class="collapse navbar-collapse" id="navbar">
	                <ul class="nav navbar-nav navbar-right" id="top-nav">
                        <li><a href="javascript:ajaxpage('pages/landing/landing.php');">Home</a></li>
                        <!--<li><a href="javascript:ajaxpage('pages/landing/landing.php#about')">About us</a></li>-->
                        <li><a href="#about">About us</a></li>
                        <li><a href="javascript:ajaxpage('pages/googleio/gio.php')">Google I/O</a></li>
                        <!--<li><a href="javascript:ajaxpage('pages/jobs/jobs.php');">Jobs</a></li>--> <!--uncomment to add jobs tab-->
                        <!--<li><a href="javascript:ajaxpage('404.html');">Sign in</a></li>--> <!--uncomment to add sign in tab-->
                    </ul>
	            </nav><!-- /.navbar-collapse -->
	        </div><!-- /.container-fluid -->
	    </div>

	    <section>
	        <div id="body-content">
                <!-- All other pages plugin here -->
                <?php
                include "pages/landing/landing.php";
                ?>
                <!--end of All other pages plugin-->
            </div>
        </section><!-- #call-to-action close -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <p>Copyright &copy; <a href="http://agoracode.community">Agora Code Community</a>| All right reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Js -->
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="js/vendor/jquery-1.10.2.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script src="js/jquery.lwtCountdown-1.0.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.nav.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/main.js"></script>

        <!--custom css-->

        <!--This script controls the page flow in the body-content -->
        <script>
            function ajaxpage(url){
                var containerid = "body-content";   //container id
                $.get(url, function(response) {
                    $('#'+containerid).fadeOut('fast', function() {  //fade out previous content
                        $('#'+containerid).html($.trim(response)).fadeIn('fast').scrollTop('fast');     //get new content and fade it in
                    });
                });

                //*uncomment  the code below to have the page auto scroll up when loaded*
            }

        </script>

    </body>
</html>
