<?php
include "../../configuration.php";
?>

<!-- google io page custom css -->
<link rel="stylesheet" href="pages/googleio/css/googleio.css">

<!-- ====== Google I/O page content ====== -->

<div>
    <section id="banner-area">
        <div class="container">
            <div class="row">
                <div class="margintop ">
                    
                    <div class="block custombanner wow fadeInUp" align="center">
                        <a class="">
                            <img src="pages/googleio/images/google_io_banner.png" >
                        </a>
                    </div>
                </div>
            </div><!-- .row close -->
        </div><!-- .container close -->
    </section><!-- header close -->

    <!-- the live stream for the google io -->
    <div class="container">
        <div>
            <br>
                <div style="position:relative;height:0;padding-bottom:56.25%">
                    <iframe src="https://www.youtube.com/embed/Y2VF8tmLFHw?ecver=2" width="640" height="360" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe>
                </div>
            <br>
        </div>

        <div class="container-fluid">
            <script src="https://app.dialogfeed.com/wc/bower_components/webcomponentsjs/webcomponents-lite.min.js">

            </script>  <link rel="import" href="https://app.dialogfeed.com/wc/elements/dialogfeed-wall.html">
            <dialogfeed-wall slug='google-i-o' width="" env='production_page'></dialogfeed-wall>
            <!--<a style="text-indent: -9999px; position: absolute; bottom: 50px; right: 20px; z-index: -1; display:inline-block;" href="http://www.dialogfeed.com/"></a>-->
        </div>
    </div><!-- /.container -->
</div>

