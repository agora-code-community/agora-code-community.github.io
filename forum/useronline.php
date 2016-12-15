<?php
$recent=date("U")-900;
$getusersonline="SELECT account_id,username from account where last_time>'$recent'"; //grab from sql users on in last 15 minutes
$getusersonline2=mysqli_query($dbconn, $getusersonline) or die("Could not get users");
$num=mysqli_num_rows($getusersonline2);
$countguests="SELECT DISTINCT guestip from guestsonline where time>'$recent'";
$countguests2=mysqli_query($dbconn, $countguests) or die("Could not count guests");
$thecount=mysqli_num_rows($countguests2);
print "<table class='table table-striped m-b-none' cellspacing='1'>";
print "<tr class='catline'><td colspan='2'><b>There have been $num members and $thecount guests online in the last 15 minutes</td></tr>";
print "<tr class='forumrow'><td>";
while($getusersonline3=mysqli_fetch_array($getusersonline2))
{
  print "<a href='profile.php?userID=".$getusersonline3['account_id']."'>".$getusersonline3['username']."</a>,";
}
print "</td></tr></table><br><br>";
?>