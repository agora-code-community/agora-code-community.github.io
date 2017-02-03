<?php
include 'connect.php';
session_start();

?>





<center>

<?php
include "admin/var.php";
print "<title>$sitetitle</title>";
?>
</center>


<br><br>


<center>



<?php
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
if(isset($_POST['submit'])||isset($_POST['searchterm'])||isset($_GET['searchterm']))
{
  if(!isset($start))
  {
    $start=0;
  }
  else
  {
    $start=$_GET['start'];
  }
  if(isset($_GET['searchterm']))
  {
    $searchterm=$_GET['searchterm'];
  }
  else
  {
    $searchterm=$_POST['searchterm'];
  }
  print "<table class='maintable'>";
  print "<tr class='headline'><td colspan='2'>Topics</td></tr>";
  $searchterm=$_POST['searchterm'];
  $getthreads="SELECT * from b_posts where  post like '%$searchterm%' and threadparent='0' order by telapsed DESC limit $start, 50";
  $getthreads2=mysql_query($getthreads) or die("Could not get threads"); 
  while($getthreads3=mysql_fetch_array($getthreads2))
  {
    print "<tr class='forumrow'><td><A href='index.php?forumID=$getthreads3[postforum]&ID=$getthreads3[ID]'>$getthreads3[title]</a></td>";
    print "<td>Last Post by: <b>$getthreads3[lastpost]</b> at <br>$getthreads3[timepost]</td></tr>";
  }
  print "</table>";
  $prev=$start-50;
  $next=$start+50;
  $num=mysql_num_rows($getthreads2);
  print "<table class='maintable'>";
  print "<tr class='regrow'><td>";
  print "<center>";
  if($start>=50)
  {
     print "<a href='search.php?searchterm=$searchterm&start=$prev'><< Prev</a>&nbsp;&nbsp;&nbsp;";
  }
  if($start<=$num-50)
  {
     print "<a href='search.php?searchterm=$searchterm&start=$next'>Next >></a>";
  }
  print "</td></tr></table>";
  

 

}
else
{
  print "<table class='maintable'>";
  print "<tr class='headline'><td>Search</td></tr>";
  print "<tr class='forumrow'><td>";
  print "<form acton='search.php' method='post'>";
  print "Search : <input type='text' name='searchterm' size='20'>&nbsp;<input type='submit' name='submit' value='search'></form>";

} 
?>



</center>   









<br><br>
<center>
