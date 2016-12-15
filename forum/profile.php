<?php
$userID=$_GET['userID'];
$getuserinfo="SELECT * from b_users a, b_templates b where b.templateid=a.templateclass and a.userID='$userID'";
$getuserinfo2=mysql_query($getuserinfo) or die("Could not get user info");
$getuserinfo3=mysql_fetch_array($getuserinfo2);
if(strlen($getuserinfo3[username])>1)
{
  $templateclass=$getuserinfo3['templatepath'];
}
else
{
  $templateclass="default";
}
print "<link rel='stylesheet' href='templates/$templateclass/style.css' type='text/css'>"; //chooses which template to display
print "<table class='maintable'>";
print "<tr class='regrow'><td><A href='index.php'>Forum Home</a>>>User Profiles</td></tr>";
print "</table><br><br>";
print "<table class='maintable'>";
print "<tr class='headline'><td colspan='2'><center>User Profile for $getuserinfo3[username]</center></td></tr>";
if($getuserinfo3[showprofile]==0)
{
  print "<tr class='forumrow'><td colspan='2'>This user has opted to not show their profile</td></tr>";
}
else
{
  print "<tr class='forumrow'><td>Username</td><td>$getuserinfo3[username]</td></tr>";
  print "<tr class='forumrow'><td>Posts</td><td>$getuserinfo3[posts]</td></tr>";
  print "<tr class='forumrow'><td>E-mail</td><td><A href='mailto:$getuserinfo3[email]'>$getuserinfo3[email]</a></td></tr>";
  print "<tr class='forumrow'><td>Location</td><td>$getuserinfo3[location]</td></tr>";
  print "<tr class='forumrow'><td>AIM</td><td>$getuserinfo3[AIM]</td></tr>";
  print "<tr class='forumrow'><td>ICQ</td><td>$getuserinfo3[ICQ]</td></tr>";
  print "<tr class='forumrow'><td>Signature</td><td>$getuserinfo3[sig]</td></tr>";
}
print "</table>";



?>