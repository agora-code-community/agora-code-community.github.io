<?php
include "connect.php";
$getnum = "SELECT *, COUNT(ID) as TOTALCOUNT FROM b_posts WHERE id='6'"; 
$getnum2=mysql_query($getnum) or die(mysql_error());
while($getnum3=mysql_fetch_array($getnum2))
{
  print "$getnum3[post]<br>";
}
mysql_data_seek($getnum2,0);
$blah=mysql_result($getnum2,0);
print "$blah<br>";
?>