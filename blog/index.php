<?php 
session_start();
// Start a session
define("ADMIN_IS_INCLUDED", true);// Defines the variable that controls direct
require_once ('../configuration.php');
date_default_timezone_set("Africa/Lusaka");
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Agora Code Community | Blog</title>
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
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="">
  <section class="vbox">
    <header class="bg-white-only header header-md navbar navbar-fixed-top-xs">
      <div class="navbar-header aside bg-info nav-xs">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="icon-list"></i>
        </a>
        <a href="index.html" class="navbar-brand text-lt">
          <i class="icon-earphones"></i>
          <img src="images/logo.png" alt="." class="hide">
          <span class="hidden-nav-xs m-l-sm">Musik</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="icon-settings"></i>
        </a>
      </div>      <ul class="nav navbar-nav hidden-xs">
        <li>
          <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted">
            <i class="fa fa-indent text"></i>
            <i class="fa fa-dedent text-active"></i>
          </a>
        </li>
      </ul>
      <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" class="form-control input-sm no-border rounded" placeholder="Search songs, albums...">
          </div>
        </div>
      </form>
      <div class="navbar-right ">
        <ul class="nav navbar-nav m-n hidden-xs nav-user user">
          <li class="hidden-xs">
            <a href="#" class="dropdown-toggle lt" data-toggle="dropdown">
              <i class="icon-bell"></i>
              <span class="badge badge-sm up bg-danger count">2</span>
            </a>
            <section class="dropdown-menu aside-xl animated fadeInUp">
              <section class="panel bg-white">
                <div class="panel-heading b-light bg-light">
                  <strong>You have <span class="count">2</span> notifications</strong>
                </div>
                <div class="list-group list-group-alt">
                  <a href="#" class="media list-group-item">
                    <span class="pull-left thumb-sm">
                      <img src="images/a0.png" alt="..." class="img-circle">
                    </span>
                    <span class="media-body block m-b-none">
                      Use awesome animate.css<br>
                      <small class="text-muted">10 minutes ago</small>
                    </span>
                  </a>
                  <a href="#" class="media list-group-item">
                    <span class="media-body block m-b-none">
                      1.0 initial released<br>
                      <small class="text-muted">1 hour ago</small>
                    </span>
                  </a>
                </div>
                <div class="panel-footer text-sm">
                  <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                  <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                </div>
              </section>
            </section>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="images/a0.png" alt="...">
              </span>
              John.Smith <b class="caret"></b>
            </a>
            <ul class="dropdown-menu animated fadeInRight">            
              <li>
                <span class="arrow top"></span>
                <a href="#">Settings</a>
              </li>
              <li>
                <a href="profile.html">Profile</a>
              </li>
              <li>
                <a href="#">
                  <span class="badge bg-danger pull-right">3</span>
                  Notifications
                </a>
              </li>
              <li>
                <a href="docs.html">Help</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="modal.lockme.html" data-toggle="ajaxModal" >Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black dk aside hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f-md scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                


                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <ul class="nav bg clearfix">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      Discover
                    </li>
                    <li>
                      <a href="index.html">
                        <i class="icon-disc icon text-success"></i>
                        <span class="font-bold">What's new</span>
                      </a>
                    </li>
                    <li>
                      <a href="genres.html">
                        <i class="icon-music-tone-alt icon text-info"></i>
                        <span class="font-bold">Genres</span>
                      </a>
                    </li>
                    <li>
                      <a href="events.html">
                        <i class="icon-drawer icon text-primary-lter"></i>
                        <b class="badge bg-primary pull-right">6</b>
                        <span class="font-bold">Events</span>
                      </a>
                    </li>
                    <li>
                      <a href="listen.html">
                        <i class="icon-list icon  text-info-dker"></i>
                        <span class="font-bold">Listen</span>
                      </a>
                    </li>
                    <li>
                      <a href="video.html" data-target="#content" data-el="#bjax-el" data-replace="true">
                        <i class="icon-social-youtube icon  text-primary"></i>
                        <span class="font-bold">Video</span>
                      </a>
                    </li>
                    <li class="m-b hidden-nav-xs"></li>
                  </ul>
                  <ul class="nav" data-ride="collapse">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      Interface
                    </li>
                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="fa fa-angle-left text"></i>
                          <i class="fa fa-angle-down text-active"></i>
                        </span>
                        <i class="icon-screen-desktop icon">
                        </i>
                        <span>Layouts</span>
                      </a>
                      <ul class="nav dk text-sm">
                        <li >
                          <a href="layout-color.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Color option</span>
                          </a>
                        </li>
                        <li >
                          <a href="layout-boxed.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Boxed layout</span>
                          </a>
                        </li>
                        <li >
                          <a href="layout-fluid.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Fluid layout</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="fa fa-angle-left text"></i>
                          <i class="fa fa-angle-down text-active"></i>
                        </span>
                        <i class="icon-chemistry icon">
                        </i>
                        <span>UI Kit</span>
                      </a>
                      <ul class="nav dk text-sm">
                        <li >
                          <a href="buttons.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Buttons</span>
                          </a>
                        </li>
                        <li >
                          <a href="icons.html" class="auto">                            
                            <b class="badge bg-info pull-right">369</b>                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Icons</span>
                          </a>
                        </li>
                        <li >
                          <a href="grid.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Grid</span>
                          </a>
                        </li>
                        <li >
                          <a href="widgets.html" class="auto">                            
                            <b class="badge bg-dark pull-right">8</b>                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Widgets</span>
                          </a>
                        </li>
                        <li >
                          <a href="components.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Components</span>
                          </a>
                        </li>
                        <li >
                          <a href="list.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>List group</span>
                          </a>
                        </li>
                        <li >
                          <a href="#table" class="auto">                            
                            <span class="pull-right text-muted">
                              <i class="fa fa-angle-left text"></i>
                              <i class="fa fa-angle-down text-active"></i>
                            </span>                            
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Table</span>
                          </a>
                          <ul class="nav dker">
                            <li >
                              <a href="table-static.html">
                                <i class="fa fa-angle-right"></i>
                                <span>Table static</span>
                              </a>
                            </li>
                            <li >
                              <a href="table-datatable.html">
                                <i class="fa fa-angle-right"></i>
                                <span>Datatable</span>
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li >
                          <a href="#form" class="auto">                            
                            <span class="pull-right text-muted">
                              <i class="fa fa-angle-left text"></i>
                              <i class="fa fa-angle-down text-active"></i>
                            </span>                            
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Form</span>
                          </a>
                          <ul class="nav dker">
                            <li >
                              <a href="form-elements.html">
                                <i class="fa fa-angle-right"></i>
                                <span>Form elements</span>
                              </a>
                            </li>
                            <li >
                              <a href="form-validation.html">
                                <i class="fa fa-angle-right"></i>
                                <span>Form validation</span>
                              </a>
                            </li>
                            <li >
                              <a href="form-wizard.html">
                                <i class="fa fa-angle-right"></i>
                                <span>Form wizard</span>
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li >
                          <a href="chart.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Chart</span>
                          </a>
                        </li>
                        <li >
                          <a href="portlet.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Portlet</span>
                          </a>
                        </li>
                        <li >
                          <a href="timeline.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Timeline</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="fa fa-angle-left text"></i>
                          <i class="fa fa-angle-down text-active"></i>
                        </span>
                        <i class="icon-grid icon">
                        </i>
                        <span>Pages</span>
                      </a>
                      <ul class="nav dk text-sm">
                        <li >
                          <a href="profile.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Profile</span>
                          </a>
                        </li>
                        <li >
                          <a href="blog.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Blog</span>
                          </a>
                        </li>
                        <li >
                          <a href="invoice.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Invoice</span>
                          </a>
                        </li>
                        <li >
                          <a href="gmap.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Google Map</span>
                          </a>
                        </li>
                        <li >
                          <a href="jvectormap.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Vector Map</span>
                          </a>
                        </li>
                        <li >
                          <a href="signin.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Signin</span>
                          </a>
                        </li>
                        <li >
                          <a href="signup.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>Signup</span>
                          </a>
                        </li>
                        <li >
                          <a href="404.html" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>

                            <span>404</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                  <ul class="nav text-sm">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      <span class="pull-right"><a href="#"><i class="icon-plus i-lg"></i></a></span>
                      Playlist
                    </li>
                    <li>
                      <a href="#">
                        <i class="icon-music-tone icon"></i>
                        <span>Hip-Pop</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="icon-playlist icon text-success-lter"></i>
                        <b class="badge bg-success dker pull-right">9</b>
                        <span>Jazz</span>
                      </a>
                    </li>
                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
              <div class="bg hidden-xs ">
                  <div class="dropdown dropup wrapper-sm clearfix">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb-sm avatar pull-left m-l-xs">                        
                        <img src="images/a3.png" class="dker" alt="...">
                        <i class="on b-black"></i>
                      </span>
                      <span class="hidden-nav-xs clear">
                        <span class="block m-l">
                          <strong class="font-bold text-lt">John.Smith</strong> 
                          <b class="caret"></b>
                        </span>
                        <span class="text-muted text-xs block m-l">Art Director</span>
                      </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight aside text-left">                      
                      <li>
                        <span class="arrow bottom hidden-nav-xs"></span>
                        <a href="#">Settings</a>
                      </li>
                      <li>
                        <a href="profile.html">Profile</a>
                      </li>
                      <li>
                        <a href="#">
                          <span class="badge bg-danger pull-right">3</span>
                          Notifications
                        </a>
                      </li>
                      <li>
                        <a href="docs.html">Help</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="modal.lockme.html" data-toggle="ajaxModal" >Logout</a>
                      </li>
                    </ul>
                  </div>
                </div>            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder-lg w-f-md" id="bjax-target">

<?php
include "smilies.php";
?>
<br><br>
<center>
<?php
if(isset($_SESSION['member']))
{
  $user=$_SESSION['member'];
  $getuser="SELECT * from account a where a.account_id='$user'";
  $getuser2=pg_query($dbconn, $getuser) or die("Could not get user info");
  $getuser3=pg_fetch_array($getuser2);
  $thedate=date("U");
  $checktime=$thedate-200;
  $uprecords="Update account set last_time='$thedate' where account_id='".$getuser3['account_id']."'";
  pg_query($dbconn, $uprecords) or die("Could not update records");
  if($getuser3['tsgone']<$checktime)
  {
    $updatetime="Update account set tsgone='$thedate', old_time='".$getuser3['tsgone']."' where account_id='".$getuser3['account_id']."'";
    pg_query($dbconn,$updatetime) or die("Could not update time");
  }
}
else
{
  $thedate=date("U");

    $ip=$_SERVER["REMOTE_ADDR"];
    //TODO: Search on REPLACE in sql
    $insertguestip="INSERT INTO guestsonline (time, guestip) VALUES ('$thedate', '$ip')";
    mysqli_query($dbconn, $insertguestip) or die("Could not insert guestip");
    $templateclass="default";
}

if(isset($_GET['forumID'])&&isset($_GET['ID'])&&$_GET['ID']!=0) //If looking at specific post
 {
   if(!isset($_GET['start']))
   {
    $start=0;
   }
   else
   {
    $start=$_GET['start'];
   }
   $forumID=$_GET['forumID'];
   $ID=$_GET['ID'];
   $user=$_SESSION['user'];
   $getranks="SELECT * from forum_ranks order by postsneeded ASC";
   $getranks2=pg_query($dbconn, $getranks);
   $updateviews="update forum_posts set views=views+1 where id='$ID'";
   pg_query($dbconn, $updateviews) or die("Could not update views");
   print "<table class='maintable'>";
   print "<tr class='headline'><td><center>User Options</center></td></tr>";
   print "<tr class='forumrow'><td>";
   
   print "--<A href='top.php'><b>Top 20 Posters</b></a>--<A href='search.php'><b>Search Topics</b></a>";
   print "</td></tr></table><br><br>";
   print "<table class='maintable' cellspacing='1'>";
   $getthread="SELECT * from forum_posts, forum_forums where forum_forums.id=forum_posts.post_forum and forum_posts.id='$ID'";
   $getthread2=pg_query($dbconn, $getthread) or die("Could not get thread");
   $getthread3=pg_fetch_array($getthread2);
   if(!isset($_SESSION['user']))
   {
     $getuser3[status]=-1;
   }
   if($getthread3['permission_min']>$getuser3['status'])
   {
     die("<table class='maintable'><tr class='headline'><td><center>No permission</center></td></tr><tr class='forumrow'><td><center>You do not have permission to view this thread</center></td></tr></table>");
   }
   print "<tr class='regrow'><td colspan='2'><p align='left'><A href='index.php'>Forum Main</a>>><A href='index.php?forumID=$getthread3[postforum]'>$getthread3[name]</a>>>$getthread3[title]</p></td>";
   print "<td><p align='right'><a href='newtopic.php?forumID=$forumID'>New Topic</a>";
   print "-";
   print "<a href='reply.php?forumID=$forumID&ID=$ID'>Reply</a>";
   if($getuser3[status]>1)
   {
      print "-<A href='poststicky.php?forumID=$forumID'>Post Sticky</a>";
   }
   print "</p></td></tr></table>";
   


   print "<table class='maintable'>";
   $postselect="SELECT * from cms_users u, forum_posts p WHERE u.userID = p.author and p.ID='$ID'";
   $postselect2=mysql_query($postselect) or die(mysql_error());
   $threadselect="SELECT * FROM cms_users u, forum_posts p  WHERE p.threadparent='$ID' and u.userID = p.author order by p.ID ASC limit $start, $numrepliesperpage";
   $threadselect2=mysql_query($threadselect) or die(mysql_error());  
   print "<tr class='headline'><td valign='top'>";
   print "<center>Author</center></td><td valign='top'><center>Post</center></td></tr>"; 
     
    
   while($postselect3=mysql_fetch_array($postselect2))
   {
    $postselect3[post]=BBCode($postselect3[post]);
    if($postselect3[nosmilies]==0)
    {
      $postselect3[post]=Smiley($postselect3[post]); 
    }  
    if($postselect3['rank']!='0')
    {
      $rank=$postselect3[rank];
    }
    else
    {  
      $rank=getrank($postselect3[posts],$getranks2);
    }
    $group=getstatus($postselect3[status]);
    if(mysql_num_rows($getranks2)>0)
    {
      mysql_data_seek($getranks2, 0); 
    }
    if($start==0) //if the start is zero then select a topic
    { 
     if($postselect3[username]!="Guest")
     {
      print "<tr class='forumrow'><td width='20%' valign='top'><A href='profile.php?userID=$postselect3[userID]'><b>$postselect3[username]</b></a><br>";
      if($allowavatar=="Yes" && strlen($postselect3[avatar])>0)
      {
         $postselect3[avatar]=strip_tags($postselect3[avatar]);
         print "<img src='$postselect3[avatar]' height='$avatarheight' width='$avatarwidth' border='0'><br>";
      }
      print "Rank:$rank<br>Group: $group<br>Posts: $postselect3[posts]<br>";
      if($getuser3[status]>=3)
      {
        print "IP: $postselect3[ipaddress]<br><br>";
      }
      else
      {
        print "IP Logged<br><br>";
      }
      if($usepms=="Yes" && $postselect3[usepm]==1)
      {
         print "PM ID: $postselect3[userID]<br>";
         print "<A href='pm/writepm.php?userID=$postselect3[userID]'>PM [$postselect3[username]]</a><br><br>";
      }
      if($getuser3[status]>=2)
      {
        print "<A href='banuser.php?userID=$postselect3[author]'>Ban User</a>";
      }
      print "</td>";
     }
      else
     {
       print "<tr class='forumrow'><td width='20%' valign='top'><b>$postselect3[username]</b><br>Group: Unregistered<br>";
       if($getuser3[status]>=3)
       {
         print "IP: $postselect3[ipaddress]<br>";
       }
       else
       {
         print "IP Logged<br>";
       }
       
       print "</td>";
     }
     print "<td width='80%' valign='top'>Last replied to on $postselect3[timepost]<br>";
     print "<A href='edit.php?forumID=$forumID&ID=$postselect3[ID]'>Edit Post</a>|<A href='quote.php?forumID=$forumID&ID=$postselect3[ID]'>Quote</a>";
     if($getuser3[status]>0)
     {
       if($postselect3[locked]==0)
       {
         print "|<A href='lockthread.php?ID=$postselect3[ID]'>Lock Thread</a>";
       }
       else
       {
         print "|<A href='unlockthread.php?ID=$postselect3[ID]'>Unlock Thread</a>";
       }
         print "|<A href='deletepost.php?ID=$postselect3[ID]'>Delete Thread</a>|<A href='movethread.php?ID=$postselect3[ID]'>Move Thread</a>";
     }
     print "<hr>";
     print "$postselect3[post]<br>";
     if(($allowsigs=="Yes" || $allowsigs="yes")&&$postselect3[sig]) // if signatures are allowed
     {
       $postselect3[sig]=strip_tags($postselect3[sig]);
       $postselect3[sig]=Smiley($postselect3[sig]);
       $postselect3[sig]=BBcode($postselect3[sig]);
       print "-----------------------------<br>";
       print "$postselect3[sig]<br>";
     }
     print "<hr></td></tr>";
    }
   }
  $i=0;
   while($threadselect3=mysql_fetch_array($threadselect2))
   {
      
  
       $threadselect3[post]=BBCode($threadselect3[post]);
       if($threadselect3[nosmilies]==0)
       {
         $threadselect3[post]=Smiley($threadselect3[post]);
       }
       if($threadselect3['rank']=='0')
       {
         $rank1=getrank($threadselect3[posts],$getranks2);
       }
       else
       {
         $rank1=$threadselect3['rank'];
       }
       $groups=getstatus($threadselect3[status]);
        if(mysql_num_rows($getranks2)>0)
        {
          mysql_data_seek($getranks2, 0); 
        }
     if($threadselect3[username]!="Guest")
     {
       print "<tr class='forumrow'><td width='20%' valign='top'><A href='profile.php?userID=$threadselect3[userID]'><b>$threadselect3[username]</a></b><br>";
       if($allowavatar=="Yes" && strlen($threadselect3[avatar])>0)
       {
         $threadselect3[avatar]=strip_tags($threadselect3[avatar]);
         print "<img src='$threadselect3[avatar]' height='$avatarheight' width='$avatarwidth' border='0'><br>";
       }
       print "Rank:$rank1<br>Group: $groups<br>Posts: $threadselect3[posts]<br>";
       if($getuser3[status]>=3)
       {
         print "IP: $threadselect3[ipaddress]<br>";
       }
       else
       {
         print "IP Logged<br>";
       }
       if($usepms=="Yes" && $threadselect3[usepm]==1)
       {
         print "PM ID: $threadselect3[userID]<br>";
         print "<A href='pm/writepm.php?userID=$threadselect3[userID]'>[PM $threadselect3[username]]</A><BR><br>";
       }
       if($getuser3[status]>=2)
       {
         print "<A href='banuser.php?userID=$threadselect3[userID]'>Ban User</a>";
       }
       
       print "</td>";
     }
     else
     {
       print "<tr class='forumrow'><td width='20%' valign='top'><b>$threadselect3[username]</b><br>Group: unregistered<br>";
       if($getuser3[status]>=3)
       {
         print "IP: $threadselect3[ipaddress]";
       }
       else
       {
         print "IP Logged";
       }

      
       print "</td>";
     }
     print "<td width='80%' valign='top'>Posted at $threadselect3[timepost]<br>";
     print "<A href='edit.php?forumID=$forumID&ID=$threadselect3[ID]'>Edit post</a>|<A href='quote.php?forumID=$forumID&ID=$threadselect3[ID]'>Quote</a>";
     if($getuser3[status]>0)
     {
         print "|<A href='deletepost.php?ID=$threadselect3[ID]'>Delete post</a>";
     }
     print "<hr>";
     print "$threadselect3[post]<br>";
     if(($allowsigs=="Yes" || $allowsigs="yes")&&$threadselect3[sig]) // if signatures are allowed
     {
       $threadselect3[sig]=strip_tags($threadselect3[sig]);
       $threadselect3[sig]=Smiley($threadselect3[sig]);
       $threadselect3[sig]=BBcode($threadselect3[sig]);
  
       print "-----------------------------<br>";
       print "$threadselect3[sig]<br>";
     }
 
     print "<hr></td></tr>";
     $i++;
   }
   print "<tr class='catline'><tr height='10'></td></tr>";
   print "</table>"; 
   print "<table class='regrow'><tr><td>";
   print "<p align='right'><b>Page:</b> ";  
   $order="SELECT COUNT(*) FROM cms_users u, forum_posts p  WHERE p.threadparent='$ID' and u.userID = p.author order by p.ID ASC";
   $order2=mysql_query($order) or die("2");
   $d=0;
   $f=0;
   $g=1;
   $order3=mysql_result($order2,0);
   $prev=$start-$numrepliesperpage;
   $next=$start+$numrepliesperpage;
   if($start>=$numrepliesperpage)
   {
     print "<A href='index.php?forumID=$forumID&ID=$ID'>First</a>&nbsp&nbsp;&nbsp;";
     print "<A href='index.php?forumID=$forumID&ID=$ID&start=$prev'><<</a>&nbsp;";
   }
   while($f<$order3)
   {
     if($f%$numrepliesperpage==0)
       {
         if($f>=$start-3*$numrepliesperpage&&$f<=$start+7*$numrepliesperpage)
         {
           print "<A href='index.php?forumID=$forumID&ID=$ID&start=$d'><b>$g</b></a> ";
           $g++;
         }
       }
     $d=$d+1;
     $f++;
   }
   if($start<$order3-$numrepliesperpage)
   {
     print "&nbsp;<A href='index.php?forumID=$forumID&ID=$ID&start=$next'>>></a>&nbsp;&nbsp;&nbsp;";
     $last=$order3-$numrepliesperpage;
     print "<A href='index.php?forumID=$forumID&ID=$ID&start=$last'>Last</a>";
   }
   print "</td></tr></table>";
   print "</p><br><br><center><font size='1'>Powered by � <A href='http://www.chipmunk-scripts.com'>Chipmunk Board</a></center>";
    if($getuser3[status]>=3)
    {
      print "<center><A href='admin/index.php'>Admin CP</a></center>";
    }


 }

else if(isset($_GET['forumID'])&&(!isset($_GET['ID']) || $_GET['ID']==0)) //looking at specific forum index
 {
   if(!isset($_GET['start']))
   {
     $start=0;
   }
   else
   {
     $start=$_GET['start'];
   }
   $forumID=$_GET['forumID'];
   $ID=$_GET['ID'];
   $user=$_SESSION['user'];
   $selection="SELECT * from b_posts,b_users where  b_posts.author=b_users.userID  and b_posts.threadparent='NADA' and b_posts.postforum='$forumID' order by b_posts.value DESC, b_posts.telapsed DESC limit $start, $numtopicsperpage";
   $selection2=mysql_query($selection);
  
   print "<table class='maintable'>";
   print "<tr class='headline'><td><center>User Options</center></td></tr>";
   print "<tr class='forumrow'><td>";
   if (isset($_SESSION['user']))
   {
     print "<b>Logged in as $user--</b><A href='usercp.php?username=$user'><b>User CP</b></a>--<A href='logout.php'><b>Logout</b></a>";
   }
   if (!isset($_SESSION['user']))
    {
       print "<A href='register.php'><b>Register</b></a>--<A href='login.php'><b>Login</b></a>";
    }
   print "--<A href='top.php'><b>Top 20 Posters</b></a>--<A href='search.php'><b>Search Topics</b></a>";
   print "</td></tr></table><br>";
   print "<table class='maintable' cellspacing='0'>";
   print "<tr class='regrow'><td valign='top'><p align='left'>";
   $getforuminfo="SELECT * from forum_forums where ID='$forumID'";
   $getforuminfo2=mysql_query($getforuminfo) or die("Could not get forum info");
   $getforuminfo3=mysql_fetch_array($getforuminfo2);
   if(!isset($_SESSION['user']))
   {
     $getuser3[status]=-1;
   }
   if($getforuminfo3['permission_min']>$getuser3['status'])
   {
     die("<table class='maintable'><tr class='headline'><td><center>No permission</center></td></tr><tr class='forumrow'><td><center>You do not have permission to access this forum</center></td></tr></table>");
   }
   print "<A href='index.php'>Forum Main</a>>>$getforuminfo3[name]</p>";
   print "</p></td>";
   print "<td valign='top'><p align='right'>";
   print "<a href='newtopic.php?forumID=$forumID'>New Topic</a>";
   if($getuser3[status]>1)
   {
     print "--<A href='poststicky.php?forumID=$forumID'>Post Sticky</a>";
   }
   print "</p></td></tr></table>";
   print "<table class='maintable' cellspacing='1'>";
   print "<tr class='headline'>";
   print "<td width='40%' colspan='2'>Topic</td>";
   print "<td width='20%' g'>Topic Starter</td>";
   print "<td width='5%'>Replies</td>";
   print "<td width='5%'>Views</td>";
   print "<td width='30%' >Last Post</td></tr>";
   while($selection3=mysql_fetch_array($selection2))
      {
         print "<tr class='forumrow'>";
         print "<td width='2%'>";
         if($selection3[value]>0)
         {
           if($selection3[locked]==1)
           {
             print "<img src='default/lockedsticky.gif' border='0'></td>";
           }
           else
           {
             print "<img src='default/sticky.gif' border='0'></td>";
           }
         } 
         else if($selection3[locked]==0)
         {
           if($selection3[telapsed]>$getuser3[oldtime])
           {
             print "<img src='default/yesnewposts.gif' border='0'></td>";
           }
           else
           {
             print "<img src='default/topic.gif' border='0'></td>";
           }
         }
         else if($selection3[locked]==1)
         {
           print "<img src='images/locked.gif' border='0'></td>";
         }
         print "<td width='38%'><A href='index.php?forumID=$forumID&ID=$selection3[ID]'><b>$selection3[title]</b></a></td>";
         print "<td width='20%'>$selection3[username]</td>";
         print "<td width='5%'>$selection3[numreplies]</td>";
         print "<td width='5%'>$selection3[views]</td>";
         print "<td width='30%'>$selection3[timepost]<br>Last Post by: <b>$selection3[lastpost]</b></td></tr>";
      }
  print "<tr><td colspan='6' class='catline'><center>Powered by � <A href='http://www.chipmunk-scripts.com'>Chipmunk Board</a></td></tr>";
  print "</table>";
  print "<table border='0' width=90%>";
  print "<tr><td class='regrow'>";
  print "<p align='right'>";
  $order="SELECT COUNT(*) from forum_posts,cms_users where cms_users.userID=forum_posts.author and forum_posts.threadparent='NADA' and forum_posts.postforum='$forumID' order by forum_posts.telapsed DESC";
  $order2=mysql_query($dbconn, $order);
  $d=0;
  $f=0;
  $g=1;
  $order3=mysql_result($order2,0);
  $prev=$start-$numtopicsperpage;
  $next=$start+$numtopicsperpage;
  print " Page: ";
  if($start>=$numtopicsperpage)
  {
    print "<a href='index.php?forumID=$forumID'>First</a>&nbsp&nbsp;&nbsp;";
    print "<a href='index.php?forumID=$forumID&start=$prev'><<</a>&nbsp;";
  }
  while($f<$order3)
   {
      if($f%$numtopicsperpage==0)
       {
        if($f>=$start-3*$numtopicsperpage&&$f<=$start+7*$numtopicsperpage)
         {
           print "<a href='index.php?forumID=$forumID&start=$d'>$g</a> ";
           $g++;
         }
       }
     $d=$d+1;
     $f++;
   }
  if($start<=$order3-$numtopicsperpage)
  {
    print "&nbsp;<A href='index.php?forumID=$forumID&start=$next'>>></a>&nbsp;&nbsp;&nbsp;";
    $last=$order3-$numtopicsperpage;
    print "<a href='index.php?forumID=$forumID&start=$last'>Last</a>";
  }
  print "</p></td></tr></table><br><br>";
   
 }  

else //looking at main index
{
	if(isset($_SESSION['member']))
	{
		$getusertime="SELECT * from account where account_id ='".$user."'";
		$getusertime2=pg_query($dbconn, $getusertime) or die("Could not get user time");
		$getusertime3=pg_fetch_array($getusertime2);
		print "<table class='maintable' cellspacing='0'>";
		print "<tr class='regrow'><td valign='top'><A href='top.php'>Top 20 Posters</a>-<A href='search.php'>Search Topics</a></td><td valign='top'><p align='right'>";
		print "</td></tr></table><br>";
	}
      
      $forumselect1="SELECT * from forum_forums order by sort ASC";
      $forumselect2=mysqli_query($dbconn, $forumselect1);
      print "<table class='table m-b-none' cellspacing='1'>";
      print "<tr>";
      print "<td valign='top' colspan='2'><b>Forum Name</b></td>";
      print "<td valign='top'><b>Topics</b></td>";
      print "<td valign='top'><b>Posts</b></td>";
      print "<td valign='top'><b>Last Post</b></td></tr>";
      $catselect="SELECT * from forum_categories order by cat_sort ASC";
      $catselect2=mysqli_query($dbconn, $catselect) or die("Could not select categories");
      while($catselect3=mysqli_fetch_array($catselect2))
      {
        $catID=$catselect3['category_id'];
        print "<tr class='bg-info dker'><td colspan='5'>$catselect3[category_name]</td></tr>";
        
        while($forumselect3=mysqli_fetch_array($forumselect2))
        {
          if($forumselect3['parent_id']==$catID&&$getuser3['status']>=$forumselect3['permission_min'])
          {
            print "<tr class='bg-info lter'>";
            if($forumselect3['permission_min']=='-1')
            {
              if($forumselect3['last_post_time']>$getusertime3['old_time'])
              {
                print "<td><img src='default/postforum.jpg' border='0'></td>";
              }
              else
              {
                print "<td><img src='default/postforum.gif' border='0'></td>";
              }
            }
            
            print "<td valign='top'><a href='index.php?forumID=".$forumselect3['id']."'><b>$forumselect3[name]</b></a><br>$forumselect3[description]</td>";
            print "<td valign='top'>$forumselect3[num_topics]</td>";
            print "<td valign='top'>$forumselect3[num_posts]</td>";
            print "<td valign='top'>$forumselect3[last_post]<br>Last post by: <b>$forumselect3[last_post_user]</b></td></tr>";
          }
        }
      }
      print "</table><br><br>";
      include "forum/useronline.php";
      print "<br><br>";
      print "<table class='table table-striped m-b-none' cellspacing='1'>";
      print "<tr><td colspan='2'><b>Basic Stats</b></td></tr>";
      print "<tr><td rowspan='3'><span class='fa fa-bar-chart-o' ></span></td>";
      $users1 = "SELECT COUNT(*) AS usercount FROM account where username!='Guest'";
      $users2=mysqli_query($dbconn, $users1) or die(mysql_error());
      $usercount= mysqli_result($users2, 0); 
      $count1 = "SELECT COUNT(*) AS postcount FROM forum_posts";
      $count2=mysqli_query($dbconn, $count1) or die("Could not count posts"); 
      $postcount = mysqli_result($count2, 0); 
      print "<td>There are $usercount registered users who have posted a total of $postcount posts.";
      print"</td></tr>";
      print "</table>";
      print "<table class='maintable'>";
      print "<tr><td class='forumrow'>";
      print "<span class='fa fa-circle-o' ></span>&nbsp;General Access<br><br>";
      print "<span class='fa fa-circle' ></span>&nbsp;New Posts since your last visit<br><br>";
      print "<tr><td></td></tr>";
      print "</td></tr></table>"; 
      print "<br><center>"; 

}  


?>

<?php
//function for getting member status
function getstatus($statnum)
{
  if ($statnum==0)
  {
     return "members";
  }
  else if($statnum==1)
  {
     return "moderators";
  }
  else if($statnum==2)
  {
    return "supermoderators";
  }
  else if($statnum==3)
  {
    return "administrators";
  }
  else if($statnum==4)
  {
    return "Head Administrator";
  }
}
?>
    
 
<?php
//function for getting ranks
   function getrank($numposts, $thequery)
   {
      while($therank=mysql_fetch_array($thequery))
      {
        if($numposts>=$therank[postsneeded])
        { 
           $rank=$therank[rankname];
        }
      }
      return $rank;
   }
?>

<?php
//BBCODE function
	//Local copy

	function BBCode($Text)
	    {
        	// Replace any html brackets with HTML Entities to prevent executing HTML or script
            // Don't use strip_tags here because it breaks [url] search by replacing & with amp
     

            // Convert new line chars to html <br /> tags
            $Text = nl2br($Text);

            // Set up the parameters for a URL search string
            $URLSearchString = " a-zA-Z0-9\:\&\/\-\?\.\=\_\~\#\'";
            // Set up the parameters for a MAIL search string
            $MAILSearchString = $URLSearchString . " a-zA-Z0-9\.@";

            // Perform URL Search
            $Text = preg_replace("(\[url\]([$URLSearchString]*)\[/url\])", '<a href="$1">$1</a>', $Text);
            $Text = preg_replace("(\[url\=([$URLSearchString]*)\]([$URLSearchString]*)\[/url\])", '<a href="$1" target="_blank">$2</a>', $Text);
            $Text = preg_replace("(\[URL\=([$URLSearchString]*)\]([$URLSearchString]*)\[/URL\])", '<a href="$1" target="_blank">$2</a>', $Text);
            // Perform MAIL Search
            $Text = preg_replace("(\[mail\]([$MAILSearchString]*)\[/mail\])", '<a href="mailto:$1">$1</a>', $Text);
            $Text = preg_replace("/\[mail\=([$MAILSearchString]*)\](.+?)\[\/mail\]/", '<a href="mailto:$1">$2</a>', $Text);

            // Check for bold text
            $Text = preg_replace("(\[b\](.+?)\[\/b])is",'<b>$1</b>',$Text);

            // Check for Italics text
            $Text = preg_replace("(\[i\](.+?)\[\/i\])is",'<I>$1</I>',$Text);

            // Check for Underline text
            $Text = preg_replace("(\[u\](.+?)\[\/u\])is",'<u>$1</u>',$Text);

            // Check for strike-through text
            $Text = preg_replace("(\[s\](.+?)\[\/s\])is",'<span class="strikethrough">$1</span>',$Text);

            // Check for over-line text
            $Text = preg_replace("(\[o\](.+?)\[\/o\])is",'<span class="overline">$1</span>',$Text);

            // Check for colored text
            $Text = preg_replace("(\[color=(.+?)\](.+?)\[\/color\])is","<span style=\"color: $1\">$2</span>",$Text);

            // Check for sized text
            $Text = preg_replace("(\[size=(.+?)\](.+?)\[\/size\])is","<span style=\"font-size: $1px\">$2</span>",$Text);

            // Check for list text
            $Text = preg_replace("/\[list\](.+?)\[\/list\]/is", '<ul class="listbullet">$1</ul>' ,$Text);
            $Text = preg_replace("/\[list=1\](.+?)\[\/list\]/is", '<ul class="listdecimal">$1</ul>' ,$Text);
            $Text = preg_replace("/\[list=i\](.+?)\[\/list\]/s", '<ul class="listlowerroman">$1</ul>' ,$Text);
            $Text = preg_replace("/\[list=I\](.+?)\[\/list\]/s", '<ul class="listupperroman">$1</ul>' ,$Text);
            $Text = preg_replace("/\[list=a\](.+?)\[\/list\]/s", '<ul class="listloweralpha">$1</ul>' ,$Text);
            $Text = preg_replace("/\[list=A\](.+?)\[\/list\]/s", '<ul class="listupperalpha">$1</ul>' ,$Text);
            $Text = str_replace("[*]", "<li>", $Text);
             $Text = preg_replace("(\[quote\](.+?)\[\/quote])is",'<center><table class="quotecode"><tr row="forumrow"><td>Quote:<br>$1</td></tr></table></center>',$Text);
            $Text = preg_replace("(\[code\](.+?)\[\/code])is",'<center><table class="quotecode"><tr row="forumrow"><td>Code:<br>$1</td></tr></table></center>',$Text);

            // Check for font change text
            $Text = preg_replace("(\[font=(.+?)\](.+?)\[\/font\])","<span style=\"font-family: $1;\">$2</span>",$Text);

    

            // Images
            // [img]pathtoimage[/img]
            $Text = preg_replace("/\[IMG\](.+?)\[\/IMG\]/", '<img src="$1">', $Text);
            $Text = preg_replace("/\[img\](.+?)\[\/img\]/", '<img src="$1">', $Text);
            // [img=widthxheight]image source[/img]
            $Text = preg_replace("/\[img\=([0-9]*)x([0-9]*)\](.+?)\[\/img\]/", '<img src="$3" height="$2" width="$1">', $Text);

	        return $Text;
		}
?>


</center>
                </section>
                <footer class="footer bg-dark">
                  <div id="jp_container_N">
                    <div class="jp-type-playlist">
                      <div id="jplayer_N" class="jp-jplayer hide"></div>
                      <div class="jp-gui">
                        <div class="jp-video-play hide">
                          <a class="jp-video-play-icon">play</a>
                        </div>
                        <div class="jp-interface">
                          <div class="jp-controls">
                            <div><a class="jp-previous"><i class="icon-control-rewind i-lg"></i></a></div>
                            <div>
                              <a class="jp-play"><i class="icon-control-play i-2x"></i></a>
                              <a class="jp-pause hid"><i class="icon-control-pause i-2x"></i></a>
                            </div>
                            <div><a class="jp-next"><i class="icon-control-forward i-lg"></i></a></div>
                            <div class="hide"><a class="jp-stop"><i class="fa fa-stop"></i></a></div>
                            <div><a class="" data-toggle="dropdown" data-target="#playlist"><i class="icon-list"></i></a></div>
                            <div class="jp-progress hidden-xs">
                              <div class="jp-seek-bar dk">
                                <div class="jp-play-bar bg-info">
                                </div>
                                <div class="jp-title text-lt">
                                  <ul>
                                    <li></li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="hidden-xs hidden-sm jp-current-time text-xs text-muted"></div>
                            <div class="hidden-xs hidden-sm jp-duration text-xs text-muted"></div>
                            <div class="hidden-xs hidden-sm">
                              <a class="jp-mute" title="mute"><i class="icon-volume-2"></i></a>
                              <a class="jp-unmute hid" title="unmute"><i class="icon-volume-off"></i></a>
                            </div>
                            <div class="hidden-xs hidden-sm jp-volume">
                              <div class="jp-volume-bar dk">
                                <div class="jp-volume-bar-value lter"></div>
                              </div>
                            </div>
                            <div>
                              <a class="jp-shuffle" title="shuffle"><i class="icon-shuffle text-muted"></i></a>
                              <a class="jp-shuffle-off hid" title="shuffle off"><i class="icon-shuffle text-lt"></i></a>
                            </div>
                            <div>
                              <a class="jp-repeat" title="repeat"><i class="icon-loop text-muted"></i></a>
                              <a class="jp-repeat-off hid" title="repeat off"><i class="icon-loop text-lt"></i></a>
                            </div>
                            <div class="hide">
                              <a class="jp-full-screen" title="full screen"><i class="fa fa-expand"></i></a>
                              <a class="jp-restore-screen" title="restore screen"><i class="fa fa-compress text-lt"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="jp-playlist dropup" id="playlist">
                        <ul class="dropdown-menu aside-xl dker">
                          <!-- The method Playlist.displayPlaylist() uses this unordered list -->
                          <li class="list-group-item"></li>
                        </ul>
                      </div>
                      <div class="jp-no-solution hide">
                        <span>Update Required</span>
                        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                      </div>
                    </div>
                  </div>
                </footer>
              </section>
            </section>
            <!-- side content -->
            <aside class="aside-md bg-light dk" id="sidebar">
              <section class="vbox animated fadeInRight">
                <section class="w-f-md scrollable hover">
                  <h4 class="font-thin m-l-md m-t">Connected</h4>
                  <ul class="list-group no-bg no-borders auto m-t-n-xxs">
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a1.png" alt="..." class="img-circle">
                        <i class="on b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Chris Fox</a></div>
                        <small class="text-muted">New York</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a2.png" alt="...">
                        <i class="on b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Amanda Conlan</a></div>
                        <small class="text-muted">France</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a3.png" alt="...">
                        <i class="busy b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Dan Doorack</a></div>
                        <small class="text-muted">Hamburg</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a4.png" alt="...">
                        <i class="away b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Lauren Taylor</a></div>
                        <small class="text-muted">London</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a5.png" alt="..." class="img-circle">
                        <i class="on b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Chris Fox</a></div>
                        <small class="text-muted">Milan</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a6.png" alt="...">
                        <i class="on b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Amanda Conlan</a></div>
                        <small class="text-muted">Copenhagen</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a7.png" alt="...">
                        <i class="busy b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Dan Doorack</a></div>
                        <small class="text-muted">Barcelona</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a8.png" alt="...">
                        <i class="away b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Lauren Taylor</a></div>
                        <small class="text-muted">Tokyo</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a9.png" alt="..." class="img-circle">
                        <i class="on b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Chris Fox</a></div>
                        <small class="text-muted">UK</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a1.png" alt="...">
                        <i class="on b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Amanda Conlan</a></div>
                        <small class="text-muted">Africa</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a2.png" alt="...">
                        <i class="busy b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Dan Doorack</a></div>
                        <small class="text-muted">Paris</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a3.png" alt="...">
                        <i class="away b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Lauren Taylor</a></div>
                        <small class="text-muted">Brussels</small>
                      </div>
                    </li>
                  </ul>
                </section>
                <footer class="footer footer-md bg-black">
                  <form class="" role="search">
                    <div class="form-group clearfix m-b-none">
                      <div class="input-group m-t m-b">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-sm bg-empty text-muted btn-icon"><i class="fa fa-search"></i></button>
                        </span>
                        <input type="text" class="form-control input-sm text-white bg-empty b-b b-dark no-border" placeholder="Search members">
                      </div>
                    </div>
                  </form>
                </footer>
              </section>              
            </aside>
            <!-- / side content -->
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>    
  </section>
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

   
     








