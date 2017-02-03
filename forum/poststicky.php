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
<br><br>


<center>



<?php
$forumID=$_GET['forumID'];
$user=$_SESSION['user'];
$getid="SELECT * from b_users a, b_templates b where b.templateid=a.templateclass and a.username='$user'";
$getid2=mysql_query($getid) or die("could not get user");
$getid3=mysql_fetch_array($getid2);
if(strlen($getid3[username])>1)
{
  $templateclass=$getid3['templatepath'];
}
else
{
  $templateclass="default";
}
print "<link rel='stylesheet' href='templates/$templateclass/style.css' type='text/css'>"; //chooses which template to display
if($getid3[status]>=2)
{
$getforuminfo="SELECT * from b_forums where ID='$forumID'";
$getforuminfo2=mysql_query($getforuminfo) or die("COuld not get forum info");
$getforuminfo3=mysql_fetch_array($getforuminfo2);
if($getforuminfo3[permission_post]>$getid3[status])
{
   die("<table class='maintable'><tr class='headline'><td><center>Sticky</center></td></tr><tr class='forumrow'><td><center>You Do not have permission to post in this forum</center></td></tr></table>");
}
if(isset($_POST['submitpost']))
 {
    if(!$_POST['title'] || !$_POST['post'] || !$_GET['forumID'])
      {
        print "<table class='maintable'>";
        print "<tr class='headline'><td><center>New Topic</center></td></tr>";
        print "<tr class='forumrow'><td><center>";
        print "One of the required fields was not filled in, please go back and try again";
        print "</td></tr></table>";
      }
    else
      {
       $name=$getid3['userID'];
       $title=$_POST['title'];
       $post=$_POST['post'];
       $day=date("D M d, Y H:i:s");
       $timegone=date("U") ;
       $forumID=$_GET['forumID'];
       if($_POST['nosmiley'])
       {
         $nosmiley=1;
       }
       else
       {
         $nosmiley=0;
       }
       $name=strip_tags($name);
       $title=strip_tags($title);       
       $post=strip_tags($post,'<p><a><b><i><img><u><font>[url][img][URL][IMG][FONT][font]<sub><sup><span><li><size>[list][o][size][s][mail]');
       $sticky=$_POST['sticky'];       
       $posting="INSERT INTO b_posts (value, author, title, post,timepost, telapsed, postforum,lastpost,nosmilies ) values ('$sticky','$name', '$title', '$post', '$day', '$timegone','$forumID','$user','$nosmiley')";
       mysql_query($posting) or die("could not post");
       $updates="update b_forums set numtopics=numtopics+1, numposts=numposts+1, lastpost='$day', lastpostuser='$user', lastposttime='$timegone' where ID='$forumID'";
       mysql_query($updates);
       $updateuser="update b_users set Posts=Posts+1 where username='$user'";
       mysql_query($updateuser) or die("COuld not update numposts");            
       print "<table class='maintable'>";
       print "<tr class='headline'><td><center>New Topic</center></td></tr>";
       print "<tr class='forumrow'><td><center>";
       print "Thanks for posting... Redirecting to forum index <META HTTP-EQUIV = 'Refresh' Content = '2; URL =index.php?forumID=$forumID'>";
       print "</td></tr></table>";
      }
  }


 else
  {
    print "<table class='maintable'>";
    print "<tr class='headline'><td><center>Post Sticky</center></td></tr>";
    print "<tr class='forumrow'><td><center>";
    print "<table border='0'><tr class='forumrow'><td>";
    print "<form action='poststicky.php?forumID=$forumID' method='post' name='form'>";
    print "<input type='hidden' name='name' value=$getid3[userID]><br>";
    print "<b>Name:</b> $user<br>"; 
    print "<b>Topic:</b><br>";
    print "<input type='hidden' name='sticky' value='1'>";
    print "<input type='text' name='title' length='15'><br><br>";
    print "<b>Message:</b><br><br>";
    print "<textarea rows='6' name='post' cols='45' ID='7'></textarea><br><br>";
    print '<script language="JavaScript">';
    print "generate_wysiwyg('7')";
    print "</script>";
    print "<input type='checkbox' name='nosmiley'>&nbsp;Disable Smilies<br><br>";
    print "<input type='submit' name='submitpost' value='Post'>";
    print "</form><br><br>";
    print "Clickable Smilies<br>";
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
  print "<tr class='headline'><td><center>Post Sticky</center></td></tr>";
  print "<tr class='forumrow'><td><center>";
  print "Sorry, you must be on the staff to post stickys, please <A href='index.php'>Return to the Forum index</a>.";
  print "</td></tr></table>";
}
 
?>



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
<center>
