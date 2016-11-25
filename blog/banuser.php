<?php
include 'connect.php';
session_start();

?>





<center>

<?php
include "title.php";
include "admin/var.php";
print "<title>$sitetitle</title>";
?>
</center>


<br><br>


<?php
$user=$_SESSION['user'];
$getid="SELECT * from b_users a, b_templates b where b.templateid=a.templateclass and a.username='$user'";
$getid2=mysql_query($getid) or die("could not get user");
$getid3=mysql_fetch_array($getid2);
print "<link rel='stylesheet' href='templates/$getid3[templatepath]/style.css' type='text/css'>";
if(isset($_GET['userID']))
{
  $userID=$_GET['userID'];
}
else
{
  $userID=$_POST['userID'];
}
$getbanuser="SELECT * from b_users where userID='$userID'";
$getbanuser2=mysql_query($getbanuser) or die("Could not get banned user");
$getbanuser3=mysql_fetch_array($getbanuser2);
if($getid3[status]>=2)
{

if($getbanuser3[status]>$getid3[status])
{
   die("<table class='maintable'><tr class='headline'><td><center>Ban User</center></td></tr><tr class='forumrow'><td><center>You cannot ban something with the same or higher permissions than yourself</center></td></tr></table>");
}
print "<table class='maintable'><tr class='headline'><td><center>Ban User</center></td></tr>";
print "<tr class='forumrow'><td>";
if(isset($_POST['submit']))
 {
    $banuser="Update b_users set banned='Yes' where userID='$userID'";
    mysql_query($banuser) or die("Could not ban user");
    print "User Banned";   
 
 }


 else
  {
     print "<form action='banuser.php' method='post'>";
     print "<input type='hidden' name='userID' value='$userID'>";
     print "Are you sure you want to ban this user?<br>";
     print "<input type='submit' name='submit' value='Ban User'></form>";
 
  }
print "</td></tr></table>";

}

else
{
  print "<table class='maintable'>";
  print "<tr class='headline'><td><center>Post Sticky</center></td></tr>";
  print "<tr class='forumrow'><td><center>";
  print "Sorry You must at least be a supermoderator to ban people, please <A href='index.php'>Return to the Forum index</a>.";
  print "</td></tr></table>";
}
 
?>



</center>   









<br><br>
<center>
