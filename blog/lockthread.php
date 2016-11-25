<?php
session_start();
include "connect.php";
?>
<?php
print "<table class='maintable'>";
print "<tr class='headline'><td><center>Lock Thread</center></td></tr>";
print "<tr class='forumrow'><td>";
$user=$_SESSION['user'];
$getuser="SELECT * from b_users a, b_templates b where b.templateid=a.templateclass and a.username='$user'";
$getuser2=mysql_query($getuser) or die("Could not get user info");
$getuser3=mysql_fetch_array($getuser2);
$ID=$_GET['ID'];
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
  die("<table class='maintable'><tr class='headline'><td><center>Lock Thread</center></td></tr><tr class='forumrow'><td><center>You do not have permission to lock this thread</center></td></tr></table>");
}
else
{
  if(isset($_POST['submit']))
  {
    $threadid=$_POST['threadid'];
    $lock="Update b_posts set locked='1' where ID='$threadid'";
    mysql_query($lock) or die("Could not lock thread");
    $lock3="Update b_posts set locked='1' where threadparent='$threadid'";
    mysql_query($lock3) or die("Could not lock posts");
    print "Thread Locked";

  }
  else
  {
    print "<form action='lockthread.php?ID=$ID' method='post'>";
    print "Are You sure you want to lock this thread?<br>";
    print "<input type='hidden' name='threadid' value='$ID'>";
    print "<input type='submit' name='submit' value='Lock Thread'></form>";  
  }
}
?>