<?php
session_start();
include "connect.php";
?>
<?php
print "<table class='maintable'>";
print "<tr class='headline'><td><center>Delete Post</center></td></tr>";
print "<tr class='forumrow'><td>";
$user=$_SESSION['user'];
$ID=$_GET['ID'];
$getuser="SELECT * from b_users a, b_templates b where b.templateid=a.templateclass and a.username='$user'";
$getuser2=mysql_query($getuser) or die("Could not get user info");
$getuser3=mysql_fetch_array($getuser2);
$gettopic="SELECT * from b_posts, b_users where b_posts.ID='$ID' and b_users.userID=b_posts.author";
$gettopic2=mysql_query($gettopic) or die("Could not get topic");
$gettopic3=mysql_fetch_array($gettopic2);
print "<link rel='stylesheet' href='templates/$templateclass/style.css' type='text/css'>"; //chooses which template to display
if($getuser3[status]<1 || ($getuser3[status]<=$gettopic3[status]&&$getuser3[userID]!=$gettopic3[userID]))
{
  die("<table class='maintable'><tr class='headline'><td><center>Move Thread</center></td></tr><tr class='forumrow'><td><center>You do not have permission to move this thread</center></td></tr></table>");
}
else
{
  if(isset($_POST['submit']))
  {
    $threadid=$_POST['threadid'];
    $ispostreply="SELECT * from b_posts where ID='$threadid'";
    $isreply2=mysql_query($ispostreply) or die("Could not query for post reply");
    $isreply3=mysql_fetch_array($isreply2);
    if($isreply3['threadparent']!='0')
    {
       $delthread="DELETE from b_posts where ID='$threadid'";
       mysql_query($delthread) or die("Could not delete thread");
       $upthread="Update b_posts set numreplies=numreplies-1 where ID='$isreply3[threadparent]'";
       mysql_query($upthread) or die("could not update thread");
       $getlastposter="SELECT * from b_posts where postforum='$isreply3[postforum]' order by telapsed DESC limit 1";
       $getlastposter2=mysql_query($getlastposter) or die(mysql_error());
       $getlastposter3=mysql_fetch_array($getlastposter2);
       $updateforum="update b_forums set numposts=numposts-1,lastpost='$getlastposter3[timepost]',lastpostuser='$getlastposter3[lastpost]' where ID='$isreply3[postforum]'";
       mysql_query($updateforum) or die(mysql_error());
       print "Thread Deleted <A href='index.php'>Click here to return to main index</a>.";
    }
    else
    {
       $delthread="DELETE from b_posts where ID='$threadid'";
       mysql_query($delthread) or die("Could not delete thread");
       $getforuminfo="SELECT * from b_posts where postforum='$isreply3[postforum]'";
       $getforuminfo2=mysql_query($getforuminfo) or die("Could get forum info");
       $getforuminfo3=mysql_num_rows($getforuminfo2);      
       $delrest="DELETE from b_posts where threadparent='$threadid'";
       mysql_query($delrest) or die("Could not delete sub posts");
       $getlastposter="SELECT * from b_posts where postforum='$isreply3[postforum]' and threadparent='0' order by telapsed DESC limit 1";
       $getlastposter2=mysql_query($getlastposter) or die("Could not get last poster");
       $getlastposter3=mysql_fetch_array($getlastposter2);
       $updateforum="update b_forums set numtopics=numtopics-1, numposts='$getforuminfo3',lastpost='$getlastposter3[timepost]', lastpostuser='$getlastposter3[lastpost]' where ID='$isreply3[postforum]'";
       mysql_query($updateforum) or die("Could not update forums");
       print "Thread Deleted <A href='index.php'>Click here to return to main index</a>.";
  }
 }
  else
  {
   
    print "<form action='deletepost.php?ID=$ID' method='post'>";
    print "Are You sure you want to delete this post?<br>";
    print "<input type='hidden' name='threadid' value='$ID'>";
    print "<input type='submit' name='submit' value='Delete Post'></form>";  
  }
}