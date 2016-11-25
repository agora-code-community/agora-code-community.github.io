<?php
if(!defined("IS_INCLUDED")){header("Location:unauthorised_error.php");}
?>
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
</script>
<header class="header">
      <div class="container">
        <div class="row">
          <div class="col-xs-6">
            <a href="./"><img src="img/_agora_logo.png" alt="Logo"></a>
          </div>
          <div class="col-xs-6 signin text-right navbar-nav">
            <a href="#about" class="scroll">About</a> &nbsp;&nbsp;
            <a href="?page=forum/index">Forum</a> &nbsp;&nbsp;
            <a href="?page=events">Events</a> &nbsp;&nbsp;
            <a href="?page=jobs">Jobs</a> &nbsp;&nbsp;
            <a href="#modal-form" data-toggle="modal">Sign in</a>
          </div>
        </div>

        <div class="row header-info">
          <div class="col-sm-10 col-sm-offset-1 text-center">
            <h1 class="wow fadeIn">Welcome to Agora Code Community!</h1>
            <br />
            <p class="lead wow fadeIn" data-wow-delay="0.5s">where coders come together to share resources and teach each other code. It's also platform to network and connect with other coders.</p>
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
    </header>
<section id="about" class="pad-xl">
<div class="container">
<div class="row">
<div class="col-sm-8 col-sm-offset-2 text-center margin-30 wow fadeIn" data-wow-delay="0.6s">
<h2>About Us</h2>
<p class="lead">We're an awesome community that loves to code.</p>
</div>
</div>

<div class="iphone wow fadeInUp" data-wow-delay="1s">
<img src="img/iScreen.png">
</div>

</div>
</section>

<section id="main-info" class="pad-xl">
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

<div class="row margin-30 news-container">
<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="1.2s">
<a href="#" target="_blank">
<img class="news-img pull-left" src="img/press-02.jpg" alt="Forbes">
<p class="black">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra orci ut. <br />
<small><em>Forbes - Feb 25, 2015</em></small></p>
</a>
</div>
</div>

</div>
</section>