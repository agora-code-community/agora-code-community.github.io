<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About</title>
</head>
<body>
<!-- Section: about -->
<section id="about" class="home-section text-center">
    <div class="heading-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                            <h2>About us</h2>
                            <i class="fa fa-2x fa-angle-down"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
                <hr class="marginbot-50">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="wow bounceInUp" data-wow-delay="0.2s">
                    <div class="team boxed-grey">
                        <div class="inner">
                            <h5>Anna Hanaceck</h5>
                            <p class="subtitle">Pixel Crafter</p>
                            <div class="avatar"><img src="img/team/1.jpg" alt="" class="img-responsive img-circle" /></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="wow bounceInUp" data-wow-delay="0.5s">
                    <div class="team boxed-grey">
                        <div class="inner">
                            <h5>Maura Daniels</h5>
                            <p class="subtitle">Ruby on Rails</p>
                            <div class="avatar"><img src="img/team/2.jpg" alt="" class="img-responsive img-circle" /></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="wow bounceInUp" data-wow-delay="0.8s">
                    <div class="team boxed-grey">
                        <div class="inner">
                            <h5>Jack Briane</h5>
                            <p class="subtitle">jQuery Ninja</p>
                            <div class="avatar"><img src="img/team/3.jpg" alt="" class="img-responsive img-circle" /></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="wow bounceInUp" data-wow-delay="1s">
                    <div class="team boxed-grey">
                        <div class="inner">
                            <h5>Tom Petterson</h5>
                            <p class="subtitle">Typographer</p>
                            <div class="avatar"><img src="img/team/4.jpg" alt="" class="img-responsive img-circle" /></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Section: about -->

<!-- Section: contact -->
<section id="contact" class="home-section text-center">
    <div class="heading-contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                            <h2>Get in touch</h2>
                            <i class="fa fa-2x fa-angle-down"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
                <hr class="marginbot-50">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="boxed-grey">

                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <form id="contact-form" action="" method="post" role="form" class="contactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        Email Address</label>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subject">
                                        Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Message</label>
                                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-skin pull-right" id="btnContactUs">
                                    Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="widget-contact">
                    <h5>Main Office</h5>

                    <address>
                        <strong>Squas Design, Inc.</strong><br>
                        Tower 795 Folsom Ave, Beautiful Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>

                    <address>
                        <strong>Email</strong><br>
                        <a href="mailto:#">email.name@example.com</a>
                    </address>
                    <address>
                        <strong>We're on social networks</strong><br>
                        <ul class="company-social">
                            <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="social-dribble"><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </address>

                </div>
            </div>
        </div>

    </div>
</section>
<!-- /Section: contact -->

</body>
</html>
