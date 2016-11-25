<div class="col-sm-6">
      	                  <section class="panel panel-default">
      	                    <header class="panel-heading font-bold">Forum - Delete Rank</header>
      	                    <div class="panel-body">
<?php

if ($userStatus >= 3)
   {
      if(isset($_POST['submit']))
      {
         $rankid=$_POST['rankid'];
         $delrank="DELETE from forum_ranks where rank_id='$rankid'";
         pg_query($dbconn, $delrank) or die("Could not delete rank");
         ?>
                                                 <div class="alert alert-success">
                                                             <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                             <i class="fa fa-ok-sign"></i><strong>Well done!</strong>
                                                            Rank deleted successfully.
                                                           </div>
               <?php
      }
      if(isset($_GET['rankid']))
      {
         $rankid=$_GET['rankid'];
         print "<form action='?page=forum/delrank' method='post'>";
         print "<input type='hidden' name='rankid' value='$rankid'>";
         print "Are you sure you want to delete this Rank<br/><br/>";
         print "<input class='btn btn-sm btn-default' type='submit' name='submit' value='Delete Rank'></form>";     

      }
        print "<center>Ranks by Posts needed.</center><br>";
        print "<table class='table table-striped table-bordered bootstrap-datatable datatable'>";
        print "<tr><td><b>Rank</b></td><td><b>Posts Needed</b></td><td><b>Delete</b></td></tr>";
        $getban="SELECT * from forum_ranks order by posts_needed ASC";
        $getban2=pg_query($dbconn, $getban) or die("Could not ranks");
        while($getban3=pg_fetch_array($getban2))
        {
           print "<tr class='forumrow'><td>$getban3[rank_name]</td><td>$getban3[posts_needed]</td><td><a class='btn btn-sm btn-default' href='?page=forum/delrank&rankid=$getban3[rank_id]'>Delete</a></td></tr>";
        }
        print "</table>";

   }
   
else
   {
     print "You Don't Have Permision to view this page.. Redirecting to Login <META HTTP-EQUIV = 'Refresh' Content = '2; URL =index.php'>";
   }

?>
</div>
      	                  </section>
      	                </div>
