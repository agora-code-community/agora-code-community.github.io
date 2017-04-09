<?php
session_start();
?>
<!DOCTYPE html>
<html class="no-js" xmlns:display="http://www.w3.org/1999/xhtml">

    <head>

        <link rel="shortcut icon" href="favicon.ico" >
        <link rel="icon" type="image/gif" href="animated_favicon1.gif" >
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
	                    <li class="current"><a href="#body">Home</a></li>
	                    <li><a href="#about">About us</a></li>
	                    <!--<li><a href="#service">Services</a></li>-->
	                    <li><a href="#contact">Contact</a></li>
	                </ul>
	            </nav><!-- /.navbar-collapse -->
	        </div><!-- /.container-fluid -->
	    </div>

	    <section id="hero-area">
	        <div class="container">
	            <div class="row">
	                <div class="">
	                    <div class="block customhero">
	                        <a class="">
                                <img src="images/opti_agora_logo_new_c.png">
                            </a>
	                    </div>
	                </div>
	            </div><!-- .row close -->
                <div>
                    <div class="block customhero">
                        <a class="">
                            <img src="images/color_bar.png">
                        </a>
                    </div>
                </div>
	        </div><!-- .container close -->
	    </section><!-- header close -->


        <!-- 
        About start
        ==================== -->
        <section id="about" class="section">
            <div class="container">
                <div class="row">
                    <div class="heading wow fadeInUp">
                        <h2>Who Are We?</h2>
                        <p>Agora Code Community’s mission is to grow the community of developers across Africa.
                            <br>To breed a better industry through diversity in developers and development.</p>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft">
                        <div class="service">
                            <div class="icon-box custom">
                                <img src="images/opti_puzzle_img.png">
                            </div>
                            <div class="caption" >
                                <h3>Hack</h3>
                                <p align="center">Share your programing ideas and issues, and we'll help streamline those ideas and solve those problems. Every coding issue is a chance to learn, and we never stops learning!</p><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.3s">
                        <div class="service">
                            <div class="icon-box custom">
                                <img src="images/opti_training.png">
                            </div>
                            <div class="caption">
                            	<h3>Training</h3>
                                <p align="center">Need Training? Don't worry, we've got you. We provide training sessions by IT personnel and communication volunteers, teaching coding, programming and computing.</p><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.6s">
                        <div class="service">
                            <div class="icon-box custom">
                                <img src="images/opti_handshake_img.png">
                            </div>
                            <div class="caption">
                                <h3>Outreach</h3>
                                 <p align="center">We tour schools and community centers to spread our love of code. We provide resources to enable the realization of ideas and technological advancements.</p><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.6s">
                        <div class="service">
                            <div class="icon-box custom">
                                <img src="images/opti_globe.png">
                            </div>
                            <div class="caption">
                                <h3>Community</h3>
                                <p align="center">Our community breeds an enabling environment for freelance developers to get together, share ideas, resources and opportunities for jobs and networking.</p><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .container close -->
        </section><!-- #service close -->

        <section id="call-to-action" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow text-center">
                        <div class="block">
                            <h2>Sign to our Newsletter</h2>
                            <!--<p>We still new at this but we will try to keep you updated. And we definitely wont spam you</p>-->
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Your Email Address">
                                <button class="btn btn-submit btn-hover" type="submit">Get Notified</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #call-to-action close -->

        <!-- 
        Contact start
        ==================== -->
        <section id="contact" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="block">
                            <div class="heading wow fadeInUp">
                                <h2>Get In Touch</h2>
                                <p>Lets do awesome things together we here to help you be better and get better! <br> Our community is full of interesting people and you look like you would be a great addition.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5 wow fadeInUp">
						<div class="block text-left">
							<div class="sub-heading">
								<h4>Contact Us</h4>
								<p>We are always interested in hearing from you, Comments, Suggestions thoughts feel free to contact us, or come visit us physically our doors are always open.</p>
							</div>
							<address class="address">
                                <hr>
								<p>Agora Code Community,<br> Great East Road 5777A,<br> Lusaka </p>
                                <hr>
                                <p><strong>Email:</strong>&nbsp;info@agoracode.community<br>
                                <strong>Phone:</strong>&nbsp;+260 97 8715997</p>
								
                                
							</address>
						</div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-1 wow fadeInUp" data-wow-delay="0.3s">
                    	<div class="form-group">

                    	    <form name="User_query" action="mail.php" method="POST">

                    	        <div class="input-field">
                    	            <input type="text" class="form-control" placeholder="Your Name" name="user_name">
                    	        </div>

                    	        <div class="input-field">
                    	            <input type="email" class="form-control" placeholder="Email Address" data-required="true" name="email">
                    	        </div>

                                <div class="input-field">
                                    <input type="text" class="form-control" required="true" placeholder="Subject" name="subject">
                                </div>

                    	        <div class="input-field">
                    	            <textarea class="form-control" placeholder="Your Message" rows="3" name="message"></textarea>
                    	        </div>

                    	        <button class="btn btn-send btn-hover" type="submit">Send</button>
                    	    </form>
                            <?php
                            if (isset($_SESSION['success']))
                            {
                                echo '<div class="alert alert-success alert-dismissible" role="alert">'
                                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                                    . '<span aria-hidden="true">&times;</span></button>'
                                    . 'Message sent successfully'
                                    . '</div>';
                                unset($_SESSION['success']);
                            }
                            ?>

                    	</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="wow fadeInUp">
        	<div class="map-wrapper">
        	</div>
        </section>

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

        <!--Dialog windows-->

        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <!--------------------- enter code to be run when button is pressed below this --------------------------->
            <div><img class="custom" src="images/Optimized-agora_logo_new.png"><br></div>
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1 id="error_msg"></h1>
            </div>
            <!-------------------- end of model content --------------------------->

        </div>


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


    </body>
</html>
