<?php
include 'connect.php';
session_start();

?>

<title>Chipmunk board</title>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script> 
<center>




<?php
$user=$_SESSION['user'];
$getuser="SELECT * from b_users a, b_templates b where b.templateid=a.templateclass and a.username='$user'";
$getuser2=mysql_query($getuser) or die("Could not get user info");
$getuser3=mysql_fetch_array($getuser2);
if(isset($_POST['ID']))
{
  $ID=$_POST['ID'];
}
else
{
  $ID=$_GET['ID'];
}
$checking="SELECT * from b_posts,b_users where b_users.userID=b_posts.author and b_posts.ID='$ID'";
$checking2=mysql_query($checking);
$checking3=mysql_fetch_array($checking2);
if(strlen($getuser3[username])>1)
{
  $templateclass=$getuser3['templatepath'];
}
else
{
  $templateclass="default";
}
print "<link rel='stylesheet' href='templates/$templateclass/style.css' type='text/css'>"; //chooses which template to display
if($checking3[userID]==$getuser3[userID]||$getuser3[status]>$checking3[status])
{
 if(isset($_POST['edit']))
 {
      if(!$_POST['post'])
      {
        print "<table class='maintable'>";
        print "<tr class='headline'><td><center>Edit</center></td></tr>";
        print "<tr class='forumrow'><td><center>";
        print "One of the required fields was not filled in, please go back and try again";
        print "</td></tr></table>";
      }
      else
      {
       $title=$_POST['title'];
       $post=$_POST['post'];   
       if($_POST['nosmiley'])
       {
         $nosmiley=1;
       }
       else
       {
         $nosmiley=0;
       }
       $title=htmlspecialchars($title);
       $post=strip_tags($post,'<p><a><b><i><img><u><font>[url][img][URL][IMG][FONT][font]<sub><sup><span><li><size>[list][o][size][s][mail]');
       $update1="Update b_posts SET title='$title', post='$post',nosmilies='$nosmiley' where ID='$ID'";
       mysql_query($update1);
       print "<table class='maintable'>";
       print "<tr class='headline'><td><center>Edit</center></td></tr>";
       print "<tr class='forumrow'><td><center>";
       if($checking3['threadparent']!='0')
       {
         print "Thanks for editing... Redirecting to topic <META HTTP-EQUIV = 'Refresh' Content = '2; URL =index.php?forumID=$forumID&ID=$checking3[threadparent]'>";
       }
       else
       {
          print "Thanks for editing... Redirecting to topic <META HTTP-EQUIV = 'Refresh' Content = '2; URL =index.php?forumID=$forumID&ID=$checking3[ID]'>";
       }
       print "</td></tr></table>";
      }
 }

else
 {
    print "<table class='maintable'>";
    print "<tr class='headline'><td><center>Edit</center></td></tr>";
    print "<tr class='forumrow'><td><center>";
    print "<table border='0'><tr class='forumrow'><td>";
    print "<form action='edit.php' method='post' name='form'>";
    print "<input type='hidden' name='name' value=$checking3[author]><br>";
    print "<b>Name:</b>$user<br>";
    print "<input type='hidden' name='ID' value='$ID'>";
    print "<b>Topic:</b><br>";
    print "<input type='text' name='title' length='15' value='$checking3[title]'><br><br>";
    print "<b>Message:</b><br><br>";
    print "<textarea rows='6' name='post' cols='45' id='7'>$checking3[post]</textarea><br><br>";
    print '<script language="JavaScript">';
    print "generate_wysiwyg('7')";
    print "</script>";
    print "<input type='checkbox' name='nosmiley'>&nbsp;Disable Smilies<br><br>";
    print "<input type='submit' name='edit' value='edit'>";
    print "</form><br>";
    print "<center>Clickable Smilies</center>";
    print "<a onClick=\"addSmiley(':)')\"><img src='images/smile.gif'></a> ";
    print "<a onClick=\"addSmiley(':(')\"><img src='images/sad.gif'></a> ";
    print "<a onClick=\"addSmiley(';)')\"><img src='images/wink.gif'></a> ";
    print "<a onClick=\"addSmiley(';smirk')\"><img src='images/smirk.gif'></a> ";	
    print "<a onClick=\"addSmiley(':blush')\"><img src='images/blush.gif'></a> ";
    print "<a onClick=\"addSmiley(':angry')\"><img src='images/angry.gif'></a> ";
    print "<a onClick=\"addSmiley(':shocked')\"><img src='images/shocked.gif'></a> ";
    print "<a onClick=\"addSmiley(':cool')\"><img src='images/cool.gif'></a> ";
    print "<a onClick=\"addSmiley(':ninja')\"><img src='images/ninja.gif'></a> ";
    print "<a onClick=\"addSmiley('(heart)')\"><img src='images/heart.gif'></a> ";
    print "<a onClick=\"addSmiley('(!)')\"><img src='images/exclamation.gif'></a> ";
    print "<a onClick=\"addSmiley('(?)')\"><img src='images/question.gif'></a><br>";
    print "<a onclick=\"addSmiley(':{blink}')\"><img src='images/winking.gif'></a>";
    print "<A onclick=\"addSmiley('{clover}')\"><img src='images/clover.gif'></a>";
    print "<a onclick=\"addSmiley(':[glasses]')\"><img src='images/glasses.gif'></a>";
    print "<a onclick=\"addSmiley(':[barf]')\"><img src='images/barf.gif'></a>";
    print "<a onclick=\"addSmiley(':[reallymad]')\"><img src='images/mad.gif'></a>";
    print "</td></tr></table></td></tr></table>";
 }
}
else
{
  print "<table class='maintable'>";
  print "<tr class='headline'><td><center>Edit</center></td></tr>";
  print "<tr class='forumrow'><td><center>";
  print "You do not have permission to edit this post";
  print "</td></tr></table>";
}
 
?>
<br><br>

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
