<section class="vbox">
    <header class="bg-white header header-md navbar">
        <div class="navbar-header navbar-left aside" style="width: 250px">
            <a href="index.php" class="navbar-brand text-lt">
                <img src="img/agora_logo_white_sml.png" alt=".">
            </a>
            <a class="btn btn-link visible-xs pull-right" data-toggle="dropdown" data-target=".user">
                <i class="icon-list"></i>
            </a>
        </div>
        <div class="navbar-right ">
            <ul class="nav navbar-nav m-n hidden-xs nav-user user">
                <li><a href="#about" class="scroll">About</a></li>
                <li><a href="?page=forum/index">Forum</a></li>
                <li><a href="?page=events">Events</a></li>
                <li><a href="?page=jobs">Jobs</a></li>
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
    </header>
    <section>
        <section class="hbox stretch">

            <section id="content">
                <section class="hbox stretch">
                    <section>
                        <section class="vbox">
                            <section class="scrollable padder-lg w-f-md" id="bjax-target">
                                <br/>

                                <?php
                                if(isset($_GET['page'])) //looking at a page
                                {
                                    $page = $_GET['page'];
                                    include"$page.php";
                                }else //looking at main index
                                {
                                    include "dashboard.php";
                                }
                                ?>
                            </section>

                        </section>

                    </section>

                </section>
                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
            </section>

        </section>

    </section>


    <footer class="footer bg-white">
        <p class="pull-left">Copyright &copy; <?php echo date('Y')." <a href='index.php'>Agora Code Community</a>";?>
            | <a href="?page=tos">Terms &amp; Conditions</a> | <a href="?page=privacy">Privacy Policy</a></p>
        <p class="pull-right">
            <a href='https://twitter.com/CodeAgora' class="btn btn-rounded btn-sm btn-icon btn-default" target="_blank"><i data-toggle="tooltip" data-placement="top" title="twitter" class="fa fa-twitter"></i></a>
            &nbsp;
            <a href='https://www.facebook.com/agoracodecomm' class="btn btn-rounded btn-sm btn-icon btn-default" target="_blank"><i data-toggle="tooltip" data-placement="top" title="facebook" class="fa fa-facebook"></i></a>
        </p>
    </footer>
    


</section>