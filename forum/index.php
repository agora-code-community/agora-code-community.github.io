<?php
include "smilies.php";
?>
<br><br>
<center>
<?php
if(isset($_SESSION['member']))
{
		$user=$_SESSION['member'];
  $getuser="SELECT * from account a where a.account_id='$user'";
  $getuser2=mysqli_query($dbconn, $getuser) or die("Could not get user info");
  $getuser3=mysqli_fetch_array($getuser2);
  $userStatus = $getuser3['status'];
  $thedate=date("U");
  $checktime=$thedate-200;
  $uprecords="Update account set last_time='$thedate' where account_id='".$getuser3['account_id']."'";
  mysqli_query($dbconn, $uprecords) or die("Could not update records");
  if($getuser3['tsgone']<$checktime)
  {
    $updatetime="Update account set tsgone='$thedate', old_time='".$getuser3['tsgone']."' where account_id='".$getuser3['account_id']."'";
    mysqli_query($dbconn,$updatetime) or die("Could not update time");
  }
}
else
{
  $thedate=date("U");

    $ip=$_SERVER["REMOTE_ADDR"];
    //TODO: Search on REPLACE in sql
    $insertguestip="INSERT INTO guestsonline (time, guestip) VALUES ('$thedate', '$ip')";
    mysqli_query($dbconn, $insertguestip) or die("Could not insert guestip");
    $templateclass="default";
}

if(isset($_GET['forumID'])&&isset($_GET['ID'])&&$_GET['ID']!=0) //If looking at specific post
 {
   if(!isset($_GET['start']))
   {
    $start=0;
   }
   else
   {
    $start=$_GET['start'];
   }
   $forumID=$_GET['forumID'];
   $ID=$_GET['ID'];
   $user=$_SESSION['member'];
   $getranks="SELECT * from forum_ranks order by postsneeded ASC";
   $getranks2=mysqli_query($dbconn, $getranks);
   $updateviews="update forum_posts set views=views+1 where id='$ID'";
   mysqli_query($dbconn, $updateviews) or die("Could not update views");
   print "<table class='maintable'>";
   print "<tr class='headline'><td><center>User Options</center></td></tr>";
   print "<tr class='forumrow'><td>";
   
   print "--<a href='top.php'><b>Top 20 Posters</b></a>--<A href='search.php'><b>Search Topics</b></a>";
   print "</td></tr></table><br><br>";
   print "<table class='maintable' cellspacing='1'>";
   $getthread="SELECT * from forum_posts, forum_forums where forum_forums.id=forum_posts.post_forum and forum_posts.id='$ID'";
   $getthread2=mysqli_query($dbconn, $getthread) or die("Could not get thread");
   $getthread3=mysqli_fetch_array($getthread2);
   if(!isset($_SESSION['member']))
   {
     $getuser3[status]=-1;
   }
   if($getthread3['permission_min']>$getuser3['status'])
   {
     die("<table class='maintable'><tr class='headline'><td><center>No permission</center></td></tr><tr class='forumrow'><td><center>You do not have permission to view this thread</center></td></tr></table>");
   }
   print "<tr class='regrow'><td colspan='2'><p align='left'><A href='index.php'>Forum Main</a>>><A href='index.php?forumID=$getthread3[postforum]'>$getthread3[name]</a>>>$getthread3[title]</p></td>";
   print "<td><p align='right'><a href='?page=forum/newtopic&forumID=$forumID'>New Topic</a>";
   print "-";
   print "<a href='?page=forum/reply&forumID=$forumID&ID=$ID'>Reply</a>";
   if($getuser3[status]>1)
   {
      print "-<a href='?page=forum/poststicky&forumID=$forumID'>Post Sticky</a>";
   }
   print "</p></td></tr></table>";
   


   print "<table class='maintable'>";
   $postselect="SELECT * from account u, forum_posts p WHERE u.account_id = p.author and p.id='$ID'";
   $postselect2=mysql_query($postselect) or die(mysql_error());
   $threadselect="SELECT * FROM account u, forum_posts p  WHERE p.threadparent='$ID' and u.account_id = p.author order by p.id ASC limit $start, $numrepliesperpage";
   $threadselect2=mysql_query($threadselect) or die(mysql_error());  
   print "<tr class='headline'><td valign='top'>";
   print "<center>Author</center></td><td valign='top'><center>Post</center></td></tr>"; 
     
    
   while($postselect3=mysql_fetch_array($postselect2))
   {
    $postselect3[post]=BBCode($postselect3[post]);
    if($postselect3[nosmilies]==0)
    {
      $postselect3[post]=Smiley($postselect3[post]); 
    }  
    if($postselect3['rank']!='0')
    {
      $rank=$postselect3[rank];
    }
    else
    {  
      $rank=getrank($postselect3[posts],$getranks2);
    }
    $group=getstatus($postselect3[status]);
    if(mysql_num_rows($getranks2)>0)
    {
      mysql_data_seek($getranks2, 0); 
    }
    if($start==0) //if the start is zero then select a topic
    { 
     if($postselect3[username]!="Guest")
     {
      print "<tr class='forumrow'><td width='20%' valign='top'><A href='profile.php?userID=$postselect3[userID]'><b>$postselect3[username]</b></a><br>";
      if($allowavatar=="Yes" && strlen($postselect3[avatar])>0)
      {
         $postselect3[avatar]=strip_tags($postselect3[avatar]);
         print "<img src='$postselect3[avatar]' height='$avatarheight' width='$avatarwidth' border='0'><br>";
      }
      print "Rank:$rank<br>Group: $group<br>Posts: $postselect3[posts]<br>";
      if($getuser3[status]>=3)
      {
        print "IP: $postselect3[ipaddress]<br><br>";
      }
      else
      {
        print "IP Logged<br><br>";
      }
      if($usepms=="Yes" && $postselect3[usepm]==1)
      {
         print "PM ID: $postselect3[userID]<br>";
         print "<a href='pm/writepm.php?userID=$postselect3[userID]'>PM [$postselect3[username]]</a><br><br>";
      }
      if($getuser3[status]>=2)
      {
        print "<a href='banuser.php?userID=$postselect3[author]'>Ban User</a>";
      }
      print "</td>";
     }
      else
     {
       print "<tr class='forumrow'><td width='20%' valign='top'><b>$postselect3[username]</b><br>Group: Unregistered<br>";
       if($getuser3[status]>=3)
       {
         print "IP: $postselect3[ipaddress]<br>";
       }
       else
       {
         print "IP Logged<br>";
       }
       
       print "</td>";
     }
     print "<td width='80%' valign='top'>Last replied to on $postselect3[timepost]<br>";
     print "<a href='edit.php?forumID=$forumID&ID=$postselect3[ID]'>Edit Post</a>|<A href='quote.php?forumID=$forumID&ID=$postselect3[ID]'>Quote</a>";
     if($getuser3[status]>0)
     {
       if($postselect3[locked]==0)
       {
         print "|<a href='lockthread.php?ID=$postselect3[ID]'>Lock Thread</a>";
       }
       else
       {
         print "|<a href='unlockthread.php?ID=$postselect3[ID]'>Unlock Thread</a>";
       }
         print "|<a href='deletepost.php?ID=$postselect3[ID]'>Delete Thread</a>|<A href='movethread.php?ID=$postselect3[ID]'>Move Thread</a>";
     }
     print "<hr>";
     print "$postselect3[post]<br>";
     if(($allowsigs=="Yes" || $allowsigs="yes")&&$postselect3[sig]) // if signatures are allowed
     {
       $postselect3[sig]=strip_tags($postselect3[sig]);
       $postselect3[sig]=Smiley($postselect3[sig]);
       $postselect3[sig]=BBcode($postselect3[sig]);
       print "-----------------------------<br>";
       print "$postselect3[sig]<br>";
     }
     print "<hr></td></tr>";
    }
   }
  $i=0;
   while($threadselect3=mysql_fetch_array($threadselect2))
   {
      
  
       $threadselect3[post]=BBCode($threadselect3[post]);
       if($threadselect3[nosmilies]==0)
       {
         $threadselect3[post]=Smiley($threadselect3[post]);
       }
       if($threadselect3['rank']=='0')
       {
         $rank1=getrank($threadselect3[posts],$getranks2);
       }
       else
       {
         $rank1=$threadselect3['rank'];
       }
       $groups=getstatus($threadselect3[status]);
        if(mysql_num_rows($getranks2)>0)
        {
          mysql_data_seek($getranks2, 0); 
        }
     if($threadselect3[username]!="Guest")
     {
       print "<tr class='forumrow'><td width='20%' valign='top'><A href='profile.php?userID=$threadselect3[userID]'><b>$threadselect3[username]</a></b><br>";
       if($allowavatar=="Yes" && strlen($threadselect3[avatar])>0)
       {
         $threadselect3[avatar]=strip_tags($threadselect3[avatar]);
         print "<img src='$threadselect3[avatar]' height='$avatarheight' width='$avatarwidth' border='0'><br>";
       }
       print "Rank:$rank1<br>Group: $groups<br>Posts: $threadselect3[posts]<br>";
       if($getuser3[status]>=3)
       {
         print "IP: $threadselect3[ipaddress]<br>";
       }
       else
       {
         print "IP Logged<br>";
       }
       if($usepms=="Yes" && $threadselect3[usepm]==1)
       {
         print "PM ID: $threadselect3[userID]<br>";
         print "<a href='pm/writepm.php?userID=$threadselect3[userID]'>[PM $threadselect3[username]]</a><br/><br/>";
       }
       if($getuser3[status]>=2)
       {
         print "<a href='banuser.php?userID=".$threadselect3['account_id']."'>Ban User</a>";
       }
       
       print "</td>";
     }
     else
     {
       print "<tr class='forumrow'><td width='20%' valign='top'><b>$threadselect3[username]</b><br>Group: unregistered<br>";
       if($getuser3[status]>=3)
       {
         print "IP: $threadselect3[ipaddress]";
       }
       else
       {
         print "IP Logged";
       }

      
       print "</td>";
     }
     print "<td width='80%' valign='top'>Posted at $threadselect3[timepost]<br>";
     print "<a href='edit.php?forumID=$forumID&ID=$threadselect3[ID]'>Edit post</a>|<A href='quote.php?forumID=$forumID&ID=$threadselect3[ID]'>Quote</a>";
     if($getuser3[status]>0)
     {
         print "|<A href='deletepost.php?ID=$threadselect3[ID]'>Delete post</a>";
     }
     print "<hr>";
     print "$threadselect3[post]<br>";
     if(($allowsigs=="Yes" || $allowsigs="yes")&&$threadselect3[sig]) // if signatures are allowed
     {
       $threadselect3[sig]=strip_tags($threadselect3[sig]);
       $threadselect3[sig]=Smiley($threadselect3[sig]);
       $threadselect3[sig]=BBcode($threadselect3[sig]);
  
       print "-----------------------------<br>";
       print "$threadselect3[sig]<br>";
     }
 
     print "<hr></td></tr>";
     $i++;
   }
   print "<tr class='catline'><tr height='10'></td></tr>";
   print "</table>"; 
   print "<table class='regrow'><tr><td>";
   print "<p align='right'><b>Page:</b> ";  
   $order="SELECT COUNT(*) FROM account u, forum_posts p  WHERE p.threadparent='$ID' and u.account_id = p.author order by p.ID ASC";
   $order2=mysql_query($order) or die("2");
   $d=0;
   $f=0;
   $g=1;
   $order3=mysql_result($order2,0);
   $prev=$start-$numrepliesperpage;
   $next=$start+$numrepliesperpage;
   if($start>=$numrepliesperpage)
   {
     print "<a href='index.php?forumID=$forumID&ID=$ID'>First</a>&nbsp&nbsp;&nbsp;";
     print "<a href='index.php?forumID=$forumID&ID=$ID&start=$prev'><<</a>&nbsp;";
   }
   while($f<$order3)
   {
     if($f%$numrepliesperpage==0)
       {
         if($f>=$start-3*$numrepliesperpage&&$f<=$start+7*$numrepliesperpage)
         {
           print "<a href='index.php?forumID=$forumID&ID=$ID&start=$d'><b>$g</b></a> ";
           $g++;
         }
       }
     $d=$d+1;
     $f++;
   }
   if($start<$order3-$numrepliesperpage)
   {
     print "&nbsp;<a href='index.php?forumID=$forumID&ID=$ID&start=$next'>>></a>&nbsp;&nbsp;&nbsp;";
     $last=$order3-$numrepliesperpage;
     print "<a href='index.php?forumID=$forumID&ID=$ID&start=$last'>Last</a>";
   }
   print "</td></tr></table>";
   print "</p><br><br>";
    if($getuser3[status]>=3)
    {
      print "<center><a href='admin/index.php'>Admin CP</a></center>";
    }


 }

else if(isset($_GET['forumID'])&&(!isset($_GET['ID']) || $_GET['ID']==0)) //looking at specific forum index
 {
   if(!isset($_GET['start']))
   {
     $start=0;
   }
   else
   {
     $start=$_GET['start'];
   }
   $forumID=$_GET['forumID'];
   $ID="";
   if(isset($_GET['ID'])){
   	$ID=$_GET['ID'];
   }
   if(isset($_SESSION['member'])){
   	$user=$_SESSION['member'];
   }
   
   $selection="SELECT * from forum_posts,account where  forum_posts.author=account.account_id  and forum_posts.threadparent='NADA' and forum_posts.postforum='$forumID' order by forum_posts.value DESC, forum_posts.telapsed DESC limit $start, $numtopicsperpage";
   $selection2=mysqli_query($dbconn, $selection);
  
   print "<table class='maintable'>";
   print "<tr class='headline'><td><center>User Options</center></td></tr>";
   print "<tr class='forumrow'><td>";
   if (isset($_SESSION['member']))
   {
     print "<b>Logged in as $user--</b><a href='usercp.php?username=$user'><b>User CP</b></a>--<A href='logout.php'><b>Logout</b></a>";
   }
   if (!isset($_SESSION['member']))
    {
       print "<a href='register.php'><b>Register</b></a>--<A href='login.php'><b>Login</b></a>";
    }
   print "--<a href='top.php'><b>Top 20 Posters</b></a>--<A href='search.php'><b>Search Topics</b></a>";
   print "</td></tr></table><br>";
   print "<table class='maintable' cellspacing='0'>";
   print "<tr class='regrow'><td valign='top'><p align='left'>";
   $getforuminfo="SELECT * from forum_forums where ID='$forumID'";
   $getforuminfo2=mysqli_query($dbconn, $getforuminfo) or die("Could not get forum info");
   $getforuminfo3=mysqli_fetch_array($getforuminfo2);
   if(!isset($_SESSION['member']))
   {
     $getuser3[status]=-1;
   }
   if($getforuminfo3['permission_min']>$getuser3['status'])
   {
     die("<table class='maintable'><tr class='headline'><td><center>No permission</center></td></tr><tr class='forumrow'><td><center>You do not have permission to access this forum</center></td></tr></table>");
   }
   print "<a href='index.php'>Forum Main</a>>>$getforuminfo3[name]</p>";
   print "</p></td>";
   print "<td valign='top'><p align='right'>";
   print "<a href='?page=forum/newtopic&forumID=$forumID'>New Topic</a>";
   if($getuser3[status]>1)
   {
     print "--<a href='poststicky.php?forumID=$forumID'>Post Sticky</a>";
   }
   print "</p></td></tr></table>";
   print "<table class='maintable' cellspacing='1'>";
   print "<tr class='headline'>";
   print "<td width='40%' colspan='2'>Topic</td>";
   print "<td width='20%' g'>Topic Starter</td>";
   print "<td width='5%'>Replies</td>";
   print "<td width='5%'>Views</td>";
   print "<td width='30%' >Last Post</td></tr>";
   while($selection3=mysqli_fetch_array($selection2))
      {
         print "<tr class='forumrow'>";
         print "<td width='2%'>";
         if($selection3[value]>0)
         {
           if($selection3[locked]==1)
           {
             print "<img src='default/lockedsticky.gif' border='0'/></td>";
           }
           else
           {
             print "<img src='default/sticky.gif' border='0'/></td>";
           }
         } 
         else if($selection3[locked]==0)
         {
           if($selection3[telapsed]>$getuser3[oldtime])
           {
             print "<img src='default/yesnewposts.gif' border='0'></td>";
           }
           else
           {
             print "<img src='default/topic.gif' border='0'></td>";
           }
         }
         else if($selection3[locked]==1)
         {
           print "<img src='images/locked.gif' border='0'></td>";
         }
         print "<td width='38%'><a href='index.php?forumID=$forumID&ID=$selection3[ID]'><b>$selection3[title]</b></a></td>";
         print "<td width='20%'>$selection3[username]</td>";
         print "<td width='5%'>$selection3[numreplies]</td>";
         print "<td width='5%'>$selection3[views]</td>";
         print "<td width='30%'>$selection3[timepost]<br>Last Post by: <b>$selection3[lastpost]</b></td></tr>";
      }
  print "<tr><td colspan='6' class='catline'></td></tr>";
  print "</table>";
  print "<table border='0' width=90%>";
  print "<tr><td class='regrow'>";
  print "<p align='right'>";
  $order="SELECT COUNT(*) from forum_posts,account where account.account_id=forum_posts.author and forum_posts.threadparent='NADA' and forum_posts.postforum='$forumID' order by forum_posts.telapsed DESC";
  $order2=mysqli_query($dbconn, $order);
  $d=0;
  $f=0;
  $g=1;
  $order3=mysqli_num_rows($order2);
  $prev=$start-$numtopicsperpage;
  $next=$start+$numtopicsperpage;
  print " Page: ";
  if($start>=$numtopicsperpage)
  {
    print "<a href='index.php?forumID=$forumID'>First</a>&nbsp&nbsp;&nbsp;";
    print "<a href='index.php?forumID=$forumID&start=$prev'><<</a>&nbsp;";
  }
  while($f<$order3)
   {
      if($f%$numtopicsperpage==0)
       {
        if($f>=$start-3*$numtopicsperpage&&$f<=$start+7*$numtopicsperpage)
         {
           print "<a href='index.php?forumID=$forumID&start=$d'>$g</a> ";
           $g++;
         }
       }
     $d=$d+1;
     $f++;
   }
  if($start<=$order3-$numtopicsperpage)
  {
    print "&nbsp;<a href='index.php?forumID=$forumID&start=$next'>>></a>&nbsp;&nbsp;&nbsp;";
    $last=$order3-$numtopicsperpage;
    print "<a href='index.php?forumID=$forumID&start=$last'>Last</a>";
  }
  print "</p></td></tr></table><br><br>";
   
 }  

else //looking at main index
{
	if(isset($_SESSION['member']))
	{
		$getusertime="SELECT * from account where account_id ='".$user."'";
		$getusertime2=mysqli_query($dbconn, $getusertime) or die("Could not get user time");
		$getusertime3=mysqli_fetch_array($getusertime2);
		print "<table class='maintable' cellspacing='0'>";
		print "<tr class='regrow'><td valign='top'><A href='top.php'>Top 20 Posters</a>-<A href='search.php'>Search Topics</a></td><td valign='top'><p align='right'>";
		print "</td></tr></table><br>";
	}
      
      $forumselect1="SELECT * from forum_forums order by sort ASC";
      $forumselect2=mysqli_query($dbconn, $forumselect1);
      print "<table class='table m-b-none' cellspacing='1'>";
      print "<tr>";
      print "<td valign='top' colspan='2'><b>Forum Name</b></td>";
      print "<td valign='top'><b>Topics</b></td>";
      print "<td valign='top'><b>Posts</b></td>";
      print "<td valign='top'><b>Last Post</b></td></tr>";
      $catselect="SELECT * from forum_categories order by cat_sort ASC";
      $catselect2=mysqli_query($dbconn, $catselect) or die("Could not select categories");
      while($catselect3=mysqli_fetch_array($catselect2))
      {
        $catID=$catselect3['category_id'];
        print "<tr class='bg-info dker'><td colspan='5'>$catselect3[category_name]</td></tr>";
        
        while($forumselect3=mysqli_fetch_array($forumselect2))
        {
          if($forumselect3['parent_id']==$catID&&$userStatus>=$forumselect3['permission_min'])
          {
            print "<tr class='bg-info lter'>";
            if($forumselect3['permission_min']=='-1')
            {
              if($forumselect3['last_post_time']>$getusertime3['old_time'])
              {
                print "<td><img src='forum/templates/default/postforum.jpg' border='0'></td>";
              }
              else
              {
                print "<td><img src='forum/templates/default/postforum.gif' border='0'></td>";
              }
            }
            
            print "<td valign='top'><a href='?page=forum/index&forumID=".$forumselect3['id']."'><b>$forumselect3[name]</b></a><br>$forumselect3[description]</td>";
            print "<td valign='top'>$forumselect3[num_topics]</td>";
            print "<td valign='top'>$forumselect3[num_posts]</td>";
            print "<td valign='top'>$forumselect3[last_post]<br>Last post by: <b>$forumselect3[last_post_user]</b></td></tr>";
          }
        }
      }
      print "</table><br><br>";
      include "useronline.php";
      print "<br><br>";
      print "<table class='table table-striped m-b-none' cellspacing='1'>";
      print "<tr><td colspan='2'><b>Basic Stats</b></td></tr>";
      print "<tr><td rowspan='3'><span class='fa fa-bar-chart-o' ></span></td>";
      $users1 = "SELECT COUNT(*) AS usercount FROM account where username!='Guest'";
      $users2=mysqli_query($dbconn, $users1) or die(mysql_error());
      $usercount= mysqli_num_rows($users2); 
      $count1 = "SELECT COUNT(*) AS postcount FROM forum_posts";
      $count2=mysqli_query($dbconn, $count1) or die("Could not count posts"); 
      $postcount = mysqli_num_rows($count2); 
      print "<td>There are $usercount registered users who have posted a total of $postcount posts.";
      print"</td></tr>";
      print "</table>";
      print "<table class='maintable'>";
      print "<tr><td class='forumrow'>";
      print "<span class='fa fa-circle-o' ></span>&nbsp;General Access<br><br>";
      print "<span class='fa fa-circle' ></span>&nbsp;New Posts since your last visit<br><br>";
      print "<tr><td></td></tr>";
      print "</td></tr></table>"; 
      print "<br><center>"; 

}  


?>

<?php
//function for getting member status
function getstatus($statnum)
{
  if ($statnum==0)
  {
     return "members";
  }
  else if($statnum==1)
  {
     return "moderators";
  }
  else if($statnum==2)
  {
    return "supermoderators";
  }
  else if($statnum==3)
  {
    return "administrators";
  }
  else if($statnum==4)
  {
    return "Head Administrator";
  }
}
?>
    
 
<?php
//function for getting ranks
   function getrank($numposts, $thequery)
   {
      while($therank=mysql_fetch_array($thequery))
      {
        if($numposts>=$therank[postsneeded])
        { 
           $rank=$therank[rankname];
        }
      }
      return $rank;
   }
?>

<?php
//BBCODE function
	//Local copy

	function BBCode($Text)
	    {
        	// Replace any html brackets with HTML Entities to prevent executing HTML or script
            // Don't use strip_tags here because it breaks [url] search by replacing & with amp
     

            // Convert new line chars to html <br /> tags
            $Text = nl2br($Text);

            // Set up the parameters for a URL search string
            $URLSearchString = " a-zA-Z0-9\:\&\/\-\?\.\=\_\~\#\'";
            // Set up the parameters for a MAIL search string
            $MAILSearchString = $URLSearchString . " a-zA-Z0-9\.@";

            // Perform URL Search
            $Text = preg_replace("(\[url\]([$URLSearchString]*)\[/url\])", '<a href="$1">$1</a>', $Text);
            $Text = preg_replace("(\[url\=([$URLSearchString]*)\]([$URLSearchString]*)\[/url\])", '<a href="$1" target="_blank">$2</a>', $Text);
            $Text = preg_replace("(\[URL\=([$URLSearchString]*)\]([$URLSearchString]*)\[/URL\])", '<a href="$1" target="_blank">$2</a>', $Text);
            // Perform MAIL Search
            $Text = preg_replace("(\[mail\]([$MAILSearchString]*)\[/mail\])", '<a href="mailto:$1">$1</a>', $Text);
            $Text = preg_replace("/\[mail\=([$MAILSearchString]*)\](.+?)\[\/mail\]/", '<a href="mailto:$1">$2</a>', $Text);

            // Check for bold text
            $Text = preg_replace("(\[b\](.+?)\[\/b])is",'<b>$1</b>',$Text);

            // Check for Italics text
            $Text = preg_replace("(\[i\](.+?)\[\/i\])is",'<I>$1</I>',$Text);

            // Check for Underline text
            $Text = preg_replace("(\[u\](.+?)\[\/u\])is",'<u>$1</u>',$Text);

            // Check for strike-through text
            $Text = preg_replace("(\[s\](.+?)\[\/s\])is",'<span class="strikethrough">$1</span>',$Text);

            // Check for over-line text
            $Text = preg_replace("(\[o\](.+?)\[\/o\])is",'<span class="overline">$1</span>',$Text);

            // Check for colored text
            $Text = preg_replace("(\[color=(.+?)\](.+?)\[\/color\])is","<span style=\"color: $1\">$2</span>",$Text);

            // Check for sized text
            $Text = preg_replace("(\[size=(.+?)\](.+?)\[\/size\])is","<span style=\"font-size: $1px\">$2</span>",$Text);

            // Check for list text
            $Text = preg_replace("/\[list\](.+?)\[\/list\]/is", '<ul class="listbullet">$1</ul>' ,$Text);
            $Text = preg_replace("/\[list=1\](.+?)\[\/list\]/is", '<ul class="listdecimal">$1</ul>' ,$Text);
            $Text = preg_replace("/\[list=i\](.+?)\[\/list\]/s", '<ul class="listlowerroman">$1</ul>' ,$Text);
            $Text = preg_replace("/\[list=I\](.+?)\[\/list\]/s", '<ul class="listupperroman">$1</ul>' ,$Text);
            $Text = preg_replace("/\[list=a\](.+?)\[\/list\]/s", '<ul class="listloweralpha">$1</ul>' ,$Text);
            $Text = preg_replace("/\[list=A\](.+?)\[\/list\]/s", '<ul class="listupperalpha">$1</ul>' ,$Text);
            $Text = str_replace("[*]", "<li>", $Text);
             $Text = preg_replace("(\[quote\](.+?)\[\/quote])is",'<center><table class="quotecode"><tr row="forumrow"><td>Quote:<br>$1</td></tr></table></center>',$Text);
            $Text = preg_replace("(\[code\](.+?)\[\/code])is",'<center><table class="quotecode"><tr row="forumrow"><td>Code:<br>$1</td></tr></table></center>',$Text);

            // Check for font change text
            $Text = preg_replace("(\[font=(.+?)\](.+?)\[\/font\])","<span style=\"font-family: $1;\">$2</span>",$Text);

    

            // Images
            // [img]pathtoimage[/img]
            $Text = preg_replace("/\[IMG\](.+?)\[\/IMG\]/", '<img src="$1">', $Text);
            $Text = preg_replace("/\[img\](.+?)\[\/img\]/", '<img src="$1">', $Text);
            // [img=widthxheight]image source[/img]
            $Text = preg_replace("/\[img\=([0-9]*)x([0-9]*)\](.+?)\[\/img\]/", '<img src="$3" height="$2" width="$1">', $Text);

	        return $Text;
		}
?>


</center>
