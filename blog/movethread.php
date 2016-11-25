<?php
session_start();
include "connect.php";
?>
<?php
print "<table class='maintable'>";
print "<tr class='headline'><td><center>Move Thread</center></td></tr>";
print "<tr class='forumrow'><td>";
if(isset($_GET['ID']))
{
  $ID=$_GET['ID'];
}
else if(isset($_POST['threadid']))
{
  $ID=$_POST['threadid'];
}

$user=$_SESSION['user'];
$getuser="SELECT * from b_users a, b_templates b where b.templateid=a.templateclass and a.username='$user'";
$getuser2=mysql_query($getuser) or die("Could not get user info");
$getuser3=mysql_fetch_array($getuser2);
$gettopic="SELECT * from b_posts, b_users where b_posts.ID='$ID' and b_users.userID=b_posts.author";
$gettopic2=mysql_query($gettopic) or die("Could not get topic");
$gettopic3=mysql_fetch_array($gettopic2);
if(strlen($getuser3[username])>1)
{
  $templateclass=$getuser3['templatepath'];
}
else
{
  $templateclass="default";
}
print "<link rel='stylesheet' href='templates/$templateclass/style.css' type='text/css'>"; //chooses which template to display
if($getuser3[status]<1 || ($getuser3[status]<=$gettopic3[status]&&$getuser3[userID]!=$gettopic3[userID]))
{
  die("<table class='maintable'><tr class='headline'><td><center>Move Thread</center></td></tr><tr class='forumrow'><td><center>You do not have permission to move this thread</center></td></tr></table>");
}

if($gettopic3['threadparent']!='0')
{
  die("<table class='maintable'><tr class='headline'><td><center>Move Thread</center></td></tr><tr class='forumrow'><td><center>You must move a thread start post.</center></td></tr></table>"); 
}
else
{
  if(isset($_POST['submit']))
  {
     $threadid=$_POST['threadid'];
     $movedfrom=$_POST['movedfrom'];
     $moveto=$_POST['moveto'];
     $getnum="SELECT COUNT(*) from b_posts where threadparent='$threadid'";
     $getnum2=mysql_query($getnum) or die("Could not get number of subsequent threads");
     $getnum3=mysql_result($getnum2,0);
     $changedposts=$getnum3+1;
     $updatethread="update b_posts set postforum='$moveto' where ID='$threadid'";
     mysql_query($updatethread) or die("Could not update thread");
     $updaterest="update b_posts set postforum='$moveto' where threadparent='$threadid'";
     mysql_query($updaterest) or die("Could not update posts");
     $getfromforum="SELECT * from b_posts where postforum='$movedfrom' order by telapsed DESC, ID DESC limit 1";
     $getfromforum2=mysql_query($getfromforum) or die("Could not get moved from forum");
     $getfromforum3=mysql_fetch_array($getfromforum2);
     $gettoforum="SELECT * from b_posts where postforum='$moveto' order by telapsed DESC, ID DESC limit 1";
     $gettoforum2=mysql_query($gettoforum) or die("COuld not get moved to forum");
     $gettoforum3=mysql_fetch_array($gettoforum2);
     $updatefromforum="UPDATE b_forums set lastpostuser='$getfromforum3[lastpost]', numtopics=numtopics-1, numposts=numposts-'$changedposts', lastpost='$getforumfrom3[timepost]' where ID='$movedfrom'";
     mysql_query($updatefromforum) or die("Could not update forum 1");
     $updatetoforum="Update b_forums set lastpostuser='$gettoforum3[lastpost]', numtopics=numtopics+1, numposts=numposts+'$changedposts', lastpost='$gettoforum3[timepost]' where ID='$moveto'";
     mysql_query($updatetoforum) or die(mysql_error());
     print "Thread moved, <A href='index.php'>Back to Forum</a>";

     
  }
  else
  {
    print "<form action='movethread.php' method='post'>";
    print "Move this thread to..<br>";
    print "<input type='hidden' name='threadid' value='$ID'>";
    print "<input type='hidden' name='movedfrom' value='$gettopic3[postforum]'>";
    print "<select name='moveto'><br>";
    $getavailableforums="SELECT * from b_forums where permission_min<='$getuser3[status]' order by parentID ASC";
    $getavailableforums2=mysql_query($getavailableforums) or die("Could no get available Forums");
    while($getavailableforums3=mysql_fetch_array($getavailableforums2))
    {
       print "<option value='$getavailableforums3[ID]'>$getavailableforums3[name]</option><br>";
    }
    print "</select><br>";
    print "<input type='submit' name='submit' value='Move thread'></form>";  
  }
}