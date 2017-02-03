<?php
if(!defined("IS_INCLUDED")){header("Location:unauthorised_error.php");}
?>


<!--loading page style sheet-->
<style>
    /* Center the loader */
    #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #420042;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Add animation to "page content" */
    .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
        from { bottom:-100px; opacity:0 }
        to { bottom:0px; opacity:1 }
    }

    @keyframes animatebottom {
        from{ bottom:-100px; opacity:0 }
        to{ bottom:0; opacity:1 }
    }

    #myDiv {
        display: none;
        text-align: center;
    }
</style>
<!-- end of loading page style sheet-->

<!--image slider style sheet-->
<style scoped>
    /* jssor slider arrow navigator skin 02 css */
    /*
    .jssora02l                  (normal)
    .jssora02r                  (normal)
    .jssora02l:hover            (normal mouseover)
    .jssora02r:hover            (normal mouseover)
    .jssora02l.jssora02ldn      (mousedown)
    .jssora02r.jssora02rdn      (mousedown)
    .jssora02l.jssora02lds      (disabled)
    .jssora02r.jssora02rds      (disabled)
    */
    .jssora02l, .jssora02r {
        display: block;
        position: absolute;
        /* size of arrow element */
        width: 55px;
        height: 55px;
        cursor: pointer;
        overflow: hidden;
    }
    .jssora02l { background-position: -3px -33px; }
    .jssora02r { background-position: -63px -33px; }
    .jssora02l:hover { background-position: -123px -33px; }
    .jssora02r:hover { background-position: -183px -33px; }
    .jssora02l.jssora02ldn { background-position: -3px -33px; }
    .jssora02r.jssora02rdn { background-position: -63px -33px; }
    .jssora02l.jssora02lds { background-position: -3px -33px; opacity: .3; pointer-events: none; }
    .jssora02r.jssora02rds { background-position: -63px -33px; opacity: .3; pointer-events: none; }
    /* jssor slider thumbnail navigator skin 03 css *//*.jssort03 .p            (normal).jssort03 .p:hover      (normal mouseover).jssort03 .pav          (active).jssort03 .pdn          (mousedown)*/.jssort03 .p {    position: absolute;    top: 0;    left: 0;    width: 62px;    height: 32px;}.jssort03 .t {    position: absolute;    top: 0;    left: 0;    width: 100%;    height: 100%;    border: none;}.jssort03 .w, .jssort03 .pav:hover .w {    position: absolute;    width: 60px;    height: 30px;    border: white 1px dashed;    box-sizing: content-box;}.jssort03 .pdn .w, .jssort03 .pav .w {    border-style: solid;}.jssort03 .c {    position: absolute;    top: 0;    left: 0;    width: 62px;    height: 32px;    background-color: #000;    filter: alpha(opacity=45);    opacity: .45;    transition: opacity .6s;    -moz-transition: opacity .6s;    -webkit-transition: opacity .6s;    -o-transition: opacity .6s;}.jssort03 .p:hover .c, .jssort03 .pav .c {    filter: alpha(opacity=0);    opacity: 0;}.jssort03 .p:hover .c {    transition: none;    -moz-transition: none;    -webkit-transition: none;    -o-transition: none;}* html .jssort03 .w {    width /**/: 62px;    height /**/: 32px;}
</style>

<!--end of slider style sheet-->

<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>

<!--Begining of landing page-->
<div style="display:none;" id="myDiv" class="animate-bottom">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="logo" href="./"><img src="images/logo_small.png" alt="Logo" ></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#about" class="scroll">About</a></li>
                    <!--<li><a href="?page=forum/index">Forum</a></li>-->
                    <li><a href="#event" class="scroll">Events</a></li>
                    <!--<li><a href="?page=jobs">Jobs</a></li>-->
                    <li><a href="#modal-form" data-toggle="modal">Sign in</a></li>
                </ul>
            </div><!--/.navbar-collapse -->
        </div>
    </div>

    <div class="mouse-icon hidden-xs">
        <div class="scroll"></div>
    </div>
    <header class="header" >

        <div class="row inner-navbar">
                  <div class="col-xs-6">
                    <a href="./"><img src="img/agora_logo_black_sml.png" alt="Logo"></a>
                  </div>
                  <div class="col-xs-6 signin text-right navbar-nav">

                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse2">
                    <span class="fa fa-bars"></span>
                  </button>

                  </div>
                  <div class="col-xs-6 signin text-right navbar-nav">
                  <div class="navbar-collapse2 collapse">
                    <a href="#about" class="scroll">About</a> &nbsp;&nbsp;
                    <!--<a href="?page=forum/index">Forum</a> &nbsp;&nbsp;-->
                    <a href="#event" class="scroll">Events</a> &nbsp;&nbsp;
        <!--<a href="?page=jobs">Jobs</a> &nbsp;&nbsp;-->
        <!--<a href="#modal-form" data-toggle="modal">Sign in</a>-->
         </div>
         </div>

       </div>

        <!-- sliding event card -->
        <div class="carousel slide auto" data-interval="15000">
            <div class="carousel-inner">
                <div class="item active" style="background: url(./images/kuma.png) no-repeat center center;
  width: 100%;x
  padding: 20px 10px 60px 10px;
  height: 100vh;
  overflow: hidden;
  background-size: cover;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;">
                    <div class="row header-info">

                        <div class="col-sm-10 col-sm-offset-1 text-center">
                            <h1 class="wow fadeIn">Welcome to Agora Code Community!</h1>
                            <br />
                            <p class="lead wow fadeIn sml" data-wow-delay="0.5s">where coders come together to share resources and teach each other code. It's also platform to network and connect with other coders.</p>
                            <br />

                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                                    <div class="row">
                                        <div class="col-xs-6 text-right wow fadeInUp" data-wow-delay="1s">
                                            <a href="#about" class="btn btn-secondary btn-lg scroll">Learn More</a>
                                        </div>
                                        <div class="col-xs-6 text-left wow fadeInUp" data-wow-delay="1.4s">
                                            <a href="#invite" class="btn btn-primary btn-lg scroll">Subscribe</a>
                                        </div>
                                    </div><!--End Button Row-->
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="item" style="background: url(./images/picaso.png) no-repeat center center;
       width: 100%;
       padding: 20px 10px 60px 10px;
       height: 100vh;
       overflow: hidden;
       background-size: cover;
       -webkit-background-size: cover;
       -moz-background-size: cover;
       -o-background-size: cover;">
                     <div class="row header-info">
                         <div class="col-sm-10 col-sm-offset-1 text-center">
                             <h1 class="wow fadeIn">Learn, Code, Collaborate</h1>
                             <br />
                             <p class="lead wow fadeIn" data-wow-delay="0.5s">Come and take part in our events </p>
                             <br />

                             <div class="row">
                                 <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                                     <div class="row">
                                         <div class="col-xs-6 text-right wow fadeInUp" data-wow-delay="1s">
                                             <a href="#about" class="btn btn-secondary btn-lg scroll">Learn More</a>
                                         </div>
                                         <div class="col-xs-6 text-left wow fadeInUp" data-wow-delay="1.4s">
                                             <a href="#invite" class="btn btn-primary btn-lg scroll">Subscribe</a>
                                         </div>
                                     </div>
                                     <!--End Button Row-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- /sliding event card -->
    </header>
    <!--/sliding header-->

    <!--event window-->
    <section id="event" class="row pad-x2">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center margin-30 wow fadeIn" data-wow-delay="0.6s">
                    <h2>Thank You!!</h2>
                    <p class="lead">To all those that took there time to take part in our event. It was a whole lot of fun please join us next time!!</p>
                </div>
            </div>

            <div class="row margin-50">

                <!--first row-->
                <div class="row pricing-container wow fadeInUp" data-wow-delay="0.4s" width="100%">

                    <div class="list-unstyled pricing-table">
                        <a href="http://globalgamejam.org/2017/jam-sites/agora-code-community"><img src="images/global_game_jam.png" alt="" width="25%" </a>
                    </div>

                </div>

                <!--second row-->
                
            </div>
        </div>
    </section>
    <!--/event window-->



    <!--About-->
    <section id="about" class="pad-x2">
        <div class="container">
            <div class="row margin-40">
                <div class="col-sm-10 col-sm-offset-1 text-center wow fadeIn" data-wow-delay="0.6s">
                    <h2 class="black">About Agora</h2>
                    <br/>
                    <p>Agora Code Community is a subsidiary of Agora Innovatus Limited.
                        It is an idea born with a purpose, to create a community both online
                        and off to encourage more partnership, improve the network of coders/programmers
                        and provide a platform for people of all ages to learn how to code/program across Africa.
                        A community will breed a more enabling environment for freelance coders and developers to
                        get access to resources and opportunities for Jobs and networking. Development of partnerships
                        with leading Software companies, upcoming companies and outreach groups will spur the growth
                        of the software industry in the country. We aim to encourage physical interaction as much as
                        online interaction, coding is fun, and it should be fun, we encourage coders to attend coding
                        events hosted near their respective locations as well as join online coding competitions.
                        The next generation is important to us and therefore reaching out to the next generation is
                        paramount if development is to be taken to the next level.
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-4 wow fadeIn" data-wow-delay="0.4s">
                    <hr class="line purple">
                    <h3>Learn How to Code</h3>
                    <p>Be it experts, Newbies, Enthusiasts... The community provides the best environment
                        for collaborations, networking, sharing ideas and having fun while coding.</p>
                </div>
                <div class="col-sm-4 wow fadeIn" data-wow-delay="0.8s">
                    <hr  class="line blue">
                    <h3>Share Coding Experiences</h3>
                    <p>Show off those codes that took you an entire night to get it right.
                        There is so much you can learn from other communty members.
                        Have fun sharing those coding experiences.</p>
                </div>
                <div class="col-sm-4 wow fadeIn" data-wow-delay="1.2s">
                    <hr  class="line yellow">
                    <h3>Meet Cool Folks who love code</h3>
                    <p>Meet people who love code as much as you do and network.
                        The community provides a good opportunity and environment for leaning.
                        Be inspired by fellow coders.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="main-info" >

    </section>

    <!--/About-->

    <!--t-shirt promotion-->

    <section id="price" class="pad-x2" media="(min-width: 400px)">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center margin-30 wow fadeIn" data-wow-delay="0.6s">
                    <h2>Get Your Gear</h2>
                    <p class="lead">Grab your awesome gear and dev in style!.</p>
                </div>
            </div>

            <div class="row margin-50">

                <!--sml class to remove a view on a mobile screen-->
                <div class="sml">
                    <div class="col-sm-4 pricing-container wow fadeInUp" data-wow-delay="1s">
                        <br />
                        <ul class="list-unstyled pricing-table text-center">
                            <li class="price">#BINARY</li>
                            <img src="images/t-shirt-binary.png" alt="" width="100%">
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4 pricing-container wow fadeInUp" data-wow-delay="0.4s">
                    <br />
                    <ul class="list-unstyled pricing-table text-center">
                        <li class="price">#CODEMAN</li>
                        <img src="images/t-shirt-code-man.png" alt="" width="100%">
                    </ul>
                </div>

                <div class="sml">
                    <div class="col-sm-4 pricing-container wow fadeInUp" data-wow-delay="1.3s">
                        <br />
                        <ul class="list-unstyled pricing-table text-center">
                            <li class="price">#CODEMODE</li>
                            <img src="images/t-shirt-switch.png" alt="" width="100%">
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!--/t-shirt promotion-->


    <section id="invite" class="pad-lg light-gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <i class="fa fa-envelope-o margin-40"></i>
                    <h2 class="black">Sign Up for Our Newsletter</h2>
                    <br />
                    <p class="black">Get up to speed with the latest developments at Agora Code Community. No Spam, We Promise!</p>
                    <br />

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

                            <div id="loading" style="display:none;"><img src="img/load.gif"/></div>
                            <div id="results">

                            </div>

                            <form action="index.php?subscribe" method="post" data-validate="parsley" id="subscribe" role="form">
                                <div class="form-group">
                                    <input class="form-control input-lg" id="email" name="email" type="text" value=""  data-type="email" data-required="true" id="exampleInputEmail1" placeholder="Enter email"/>
                                </div>
                                <button type="submit" id="Submit" class="btn btn-s-sm btn-primary btn-lg">Subscribe</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section id="press" class="pad-sm">
        <div class="container">

            <div class="row margin-30 news-container">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="0.8s">
                    <a href="http://fb.me/5iuyMAD5y" target="_blank">
                        <img class="news-img pull-left" src="img/gpz_logo.jpg" width="150px" height="80px" alt="Global Platform Zambia"/>
                        <p class="black">We have really enjoyed hosting Agora Code Community this weekend. Look forward to seeing you again soon.<br />
                            <small><em>Golbal Plaftorm Zambia - November 21, 2016</em></small></p>
                    </a>
                </div>
            </div>

            <!--<div class="row margin-30 news-container">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="1.2s">
                    <a href="#" target="_blank">
                        <img class="news-img pull-left" src="img/press-02.jpg" alt="Forbes">
                        <p class="black">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra orci ut. <br />
                            <small><em>Forbes - Feb 25, 2015</em></small></p>
                    </a>
                </div>
            </div>-->

        </div>
    </section>

    <footer>
        <div class="container">

            <div class="row">
                <div class="col-sm-8 margin-20">
                    <ul class="list-inline social">
                        <li>Connect with us on</li>
                        <li><a href="https://twitter.com/CodeAgora" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/agoracodecomm" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    </ul>
                    <p><small><a href="?page=tos">Terms &amp; Conditions</a> |
                            <a href="?page=privacy">Privacy Policy</a></small></p>
                </div>

                <div class="col-sm-4 text-right">
                    <p><small>Copyright &copy; <?php echo date('Y'); ?>. All rights reserved. <br>
                            Created by <a href="http://agoracode.community">The Agora Code Community</a></small></p>
                </div>
            </div>

        </div>
    </footer>

</div>

<script>
    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 3000);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    }
</script>

</body>

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


<!--image slider script-->
<script src="js/jssor.slider-22.1.8.min.js" type="text/javascript"></script>
<script type="text/javascript">
    jssor_1_slider_init = function() {

        var jssor_1_options = {
            $AutoPlay: true,
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 9,
                $SpacingX: 3,
                $SpacingY: 3,
                $Align: 260
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*responsive code begin*/
        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 600);
                jssor_1_slider.$ScaleWidth(refSize);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }
        ScaleSlider();
        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        /*responsive code end*/
    };
</script>
<script type="text/javascript">jssor_1_slider_init();</script>

<script language="javascript">
    $(document).ready(function() {

        var loading;
        var results;

        form = document.getElementById('form');
        loading = document.getElementById('loading');
        results = document.getElementById('results');

        $('#Submit').click( function() {

            if($('#email').val() == "")
            {
                $('#results').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">x</button><strong>Oops!</strong> Please Enter Your Email Address.</div>');

                return false;
            }

            results.style.display = 'none';
            $('#results').html('');
            loading.style.display = 'inline';

            $.post('subscribe.php?email=' + escape($('#email').val()),{
            }, function(response){

                results.style.display = 'block';
                $('#results').html(unescape(response));
                loading.style.display = 'none';
            });

            return false;
        });

    });
    $('.carousel').carousel({
        pause: "false"
    });
</script>
