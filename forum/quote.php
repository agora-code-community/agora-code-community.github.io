<?php
include 'connect.php';
session_start();
?>

<center>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script> 
<?php
include "admin/var.php";
?>
</center>

<link rel="stylesheet" href="style.css" type="text/css">
<br><br>



<center>



<?php
if(!isset($_GET['forumID']))
{
  die("<table class='maintable'><tr class='headline'><td><center>Quote</center></td></tr><tr class='forumrow'><td><center>No Forum Parent Selected</center></td></tr></table>");
}
$user=$_SESSION['user'];
$getuser="SELECT * from b_users a, b_templates b where b.templateid=a.templateclass and a.username='$user'";
$getuser2=mysql_query($getuser) or die("Could not get user info");
$getuser3=mysql_fetch_array($getuser2);
if(strlen($getuser3[username])>1)
{
  $templateclass=$getuser3['templatepath'];
}
else
{
  $templateclass="default";
}
print "<link rel='stylesheet' href='templates/$templateclass/style.css' type='text/css'>"; //chooses which template to display 
$forumID=$_GET['forumID'];
$s=$_SERVER["REMOTE_ADDR"];
$checkip="SELECT * from b_banip where ip='$s'";
$checkip2=mysql_query($checkip) or die("Could not get ips");
$checkip3=mysql_fetch_array($checkip2);
if($checkip3)
{
   die("<table class='maintable'><tr class='headline'><td><center>Quote</center></td></tr><tr class='forumrow'><td><center>Your IP was banned from posting</center></td></tr></table>");
}
$ID=$_GET['ID'];
$isthreadlocked="SELECT *, b_posts.ID as postid from b_posts, b_forums where b_posts.id='$ID' and b_forums.id=b_posts.postforum";
$isthreadlocked2=mysql_query($isthreadlocked) or die("Could not check threadlock");
$isthreadlocked3=mysql_fetch_array($isthreadlocked2);
if($isthreadlocked3['locked']=='1')
{
  die("<table class='maintable'><tr class='headline'><td><center>Quote</center></td></tr><tr class='forumrow'><td><center>This thread is locked</center></td></tr></table>");
}
if (isset($_SESSION['user'])||$guestposting=="Yes"||$guestposting=="yes")
{
 $user=$_SESSION['user'];
 $getid="SELECT * from b_users where username='$user'";
 $getid2=mysql_query($getid) or die("could not get user");
 $getid3=mysql_fetch_array($getid2);
 $thetime=date("U");
 if($getid3[lastposttime]>$thetime-30)
 {
   die("<table class='maintable'><tr class='headline'><td><center>Quote</center></td></tr><tr class='forumrow'><td><center>You may post once every 30 seconds.</center></td></tr></table>");
 }
 $getforuminfo="SELECT * from b_forums where ID='$forumID'";
 $getforuminfo2=mysql_query($getforuminfo) or die("COuld not get forum info");
 $getforuminfo3=mysql_fetch_array($getforuminfo2);
 if(!$_SESSION['user'])
  {
       $getid3[status]=-1;
  }
if($getforuminfo3[permission_reply]>$getid3[status])
{
   die("<table class='maintable'><tr class='headline'><td><center>Quote</center></td></tr><tr class='forumrow'><td><center>You Do not have permission to post in this forum</center></td></tr></table>");
}
 if($getid3[banned]=="Yes")
 {
  die("<table class='maintable'><tr class='headline'><td><center>New Topic</center></td></tr><tr class='forumrow'><td><center>You have been banned from posting</center></td></tr></table>");
 } 
 if(isset($_POST['reply']))
 {
      if(!$_POST['name'] || !$_POST['post'])
      {
        print "<table class='maintable'>";
        print "<tr class='headline'><td><center>Quote</center></td></tr>";
        print "<tr class='forumrow'><td><center>";
        print "One of the required fields was not filled in, please go back and try again";
        print "</td></tr></table";
      }
      else
     {
       $name=$getid3['userID'];
       $title=$_POST['title'];
       $post=$_POST['post'];
       $threadparent=$_POST['threadparent']; 
       $day=date("D M d, Y H:i:s");
       $timegone=date("U") ;
       if($_POST['nosmiley'])
       {
         $nosmiley=1;
       }
       else
       {
         $nosmiley=0;
       }
       $name=htmlspecialchars($name);
       $title=htmlspecialchars($title);
       $post=strip_tags($post,'<p><a><b><i><img><u><font>[url][img][URL][IMG][FONT][font]<sub><sup><span><li><size>[list][o][size][s][mail]');
       if(!$_SESSION['user'])
       {
         $user="Guest";
       }
       $s=$_SERVER["REMOTE_ADDR"];
     
       $posting="INSERT INTO b_posts (author, title, post,timepost, telapsed, threadparent, postforum, lastpost,nosmilies,ipaddress ) values ('$name', '$title', '$post', '$day', '$timegone', '$threadparent', '$forumID','$user','$nosmiley','$s')";
       mysql_query($posting) or die("could not post");
       $update="Update b_posts SET numreplies=numreplies+1, timepost='$day', telapsed='$timegone', lastpost='$user' where ID='$threadparent'";
       mysql_query($update);
       $updateforum="Update b_forums set numposts=numposts+1, lastpost='$day',lastpostuser='$user',lastposttime='$timegone' where ID='$forumID'";
       mysql_query($updateforum);
       if($_SESSION['user'])
       {
         $timenow=date("U");
         $updateuser="update b_users set Posts=Posts+1, lastposttime='$timenow' where username='$user'";
         mysql_query($updateuser) or die("COuld not update numposts"); 
       }
       print "<table class='maintable'>";
       print "<tr class='headline'><td><center>New Topic</center></td></tr>";
       print "<tr class='forumrow'><td><center>";
       print "Thanks for posting... Redirecting to topic <META HTTP-EQUIV = 'Refresh' Content = '2; URL =index.php?forumID=$forumID&ID=$threadparent'>";
       print "</td></tr></table>";
     }
 }

else
 {
    $s="SELECT * from b_posts where ID='$ID'";
    $s2=mysql_query($s);
    $s3=mysql_fetch_array($s2);
    print "<table class='maintable'>";
    print "<tr class='headline'><td><center>Quote</center></td></tr>";
    print "<tr class='forumrow'><td><center>";
    print "<table border='0'><tr class='forumrow'><td>";
    print "<form action='quote.php?forumID=$forumID' method='post' name='form'>";
    if (isset($_SESSION['user']))
    {
      print "<input type='hidden' name='name' value=$getid3[userID]><br>";
      print "<b>Name:</b>$user<br>";
    }
    else
    {
      $getguest="SELECT * FROM b_users WHERE username='Guest'";
      $getguest2=mysql_query($getguest);
      $getguest3=mysql_fetch_array($getguest2);
      print "<input type='hidden' name='name' value='$getguest3[userID]'><br>";
      print "<b>Name:</b>Guest<br>";
    }
    print "<b>Topic:</b><br>";
    if($s3[threadparent]==0)
    {
        print "<input type='hidden' name='threadparent' value=$s3[ID]>";
    }
    else
    {     
        print "<input type='hidden' name='threadparent' value=$s3[threadparent]>";
    }
    print "<input type='text' name='title' length='15'><br><br>";
    print "<b>Message:</b><br><br>";
    print "<textarea rows='6' name='post' cols='45' ID='7'>[quote]  $s3[post][/quote]</textarea><br><br>";
    print '<script language="JavaScript">';
    print "generate_wysiwyg('7')";
    print "</script>";
    print "<input type='checkbox' name='nosmiley'>&nbsp;Disable Smilies<br><br>";
    print "<input type='submit' name='reply' value='reply'>";
    print "</form>";
    print "<center>Clickable Smilies</center>";
    print "<a onClick=\"addSmiley(':)')\"><img src='images/smile.gif'></a> ";	
    print "<a onClick=\"addSmiley(':blush')\"><img src='images/blush.gif'></a> ";
    print "<a onClick=\"addSmiley(':angry')\"><img src='images/angry.gif'></a> ";
    print "<a onClick=\"addSmiley(':shocked')\"><img src='images/shocked.gif'></a> ";
    print "<a onClick=\"addSmiley(':cool')\"><img src='images/cool.gif'></a> ";
    print "<a onclick=\"addSmiley(':{blink}')\"><img src='images/winking.gif'></a>";
    print "<A onclick=\"addSmiley('{clover}')\"><img src='images/clover.gif'></a>";
    print "<a onclick=\"addSmiley(':[glasses]')\"><img src='images/glasses.gif'></a>";
    print "<a onclick=\"addSmiley(':[barf]')\"><img src='images/barf.gif'></a>";
    print "<a onclick=\"addSmiley(':[reallymad]')\"><img src='images/mad.gif'></a><br>";
    print "<a onclick=\"addSmiley(':[normal]')\"><img src='../smiley/normal.gif'></a>";
    print "<a onclick=\"addSmiley(':[inqu]')\"><img src='../smiley/inquisitive.gif'></a>";
    print "<a onclick=\"addSmiley(':[happyinlove]')\"><img src='../smiley/happyinlove.gif'></a>";
    print "<a onclick=\"addSmiley(':[sadinlove]')\"><img src='../smiley/sadinlove.gif'></a>";
    print "<a onclick=\"addSmiley(':[normalinlove]')\"><img src='../smiley/normalaboutlove.gif'></a><br>";
    print "<a onclick=\"addSmiley(':[bangry]')\"><img src='../smiley/angry.jpg'></a>";
    print "<a onclick=\"addSmiley(':[grin]')\"><img src='../smiley/grin.jpg'></a>";
    print "<a onclick=\"addSmiley(':[sadness]')\"><img src='../smiley/sadness.jpg'></a>";
    print "<a onclick=\"addSmiley(':[smilies]')\"><img src='../smiley/smiles.jpg'></a>";
    print "<a onclick=\"addSmiley(':[winking]')\"><img src='../smiley/winking.jpg'></a><br>";
    print "</td></tr></table></center>";
    print "</td></tr></table>";
   
 }
}
else
{
  print "<table class='maintable'>";
  print "<tr class='headline'><td><center>Quote</center></td></tr>";
  print "<tr class='forumrow'><td><center>";
  print "Not logged in, please <A href='login.php'>Go here</a> to log in";
  print "</td></tr></table>";
}
 
?>

</td></tr></table>

</center>   
<script language="JavaScript" type="text/javascript">
function addSmiley(textToAdd)
{
  var thewindow = window.frames['wysiwyg7'];
  var varEditor; 
  var varHidVal; 
  varHidVal =document.getElementById("wysiwyg7"); 
  varEditor =window.frames["wysiwyg7"]; 
  varHidVal.value=varEditor.document.body.innerHTML; 
  thewindow.document.open();
  thewindow.document.write(varHidVal.value+textToAdd);
  thewindow.document.close();
//document.getElementById("wysiwyg" + 7).contentWindow.value+= textToAdd;
//document.getElementById("wysiwyg" + 7).contentWindow.focus();
}
</script>
   
    




<br><br>
