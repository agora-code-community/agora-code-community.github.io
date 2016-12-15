<?php
if(!defined("STAFF_IS_INCLUDED")){header("Location:unauthorised_error.php");}
?>
<div class="col-sm-6">
      	                  <section class="panel panel-default">
      	                    <header class="panel-heading font-bold">Forum - Add Rank</header>
      	                    <div class="panel-body">
<?php

if ($userStatus >= 3)
   {
      if(isset($_POST['submit']))
      {
         if(!$_POST['rankname'])
         {
           print "You did not input a rank name";
         }
         else if(!$_POST['postsneeded'])
         {
           print "You did not specify the number of posts needed to achieve this rank";
         }
         else
         {
           $rankname=$_POST['rankname'];
           $postsneeded=$_POST['postsneeded'];
           $insertrank="INSERT into forum_ranks (rank_name, posts_needed) values('$rankname','$postsneeded')";
           pg_query($dbconn,$insertrank) or die("Could not add rank");
           ?>
                                                   <div class="alert alert-success">
                                                               <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                               <i class="fa fa-ok-sign"></i><strong>Well done!</strong>
                                                               Rank <b><?php echo $rankname; ?></b> added.
                                                             </div>
                 <?php
         }
      }
        print "<form action='?page=forum/addrank' method='post'>";
        print "Rank:<br>";
        print "<input type='text' name='rankname' size='20'><br>";
        print "Posts needed to achieve rank:<br>";
        print "<input type='text' name='postsneeded' size='20'><br/><br/>";
        print "<input class='btn btn-sm btn-default' type='submit' name='submit' value='submit'></form><br/>";       

       
   }
   
else
   {
     		print "You Don't Have Permision to view this page.. Redirecting to Login <META HTTP-EQUIV = 'Refresh' Content = '2; URL =index.php'>";
   }

?>
</div>
      	                  </section>
      	                </div>
