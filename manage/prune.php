<?php
if(!defined("STAFF_IS_INCLUDED")){header("Location:unauthorised_error.php");}
?>
<div class="col-sm-6">
      	                  <section class="panel panel-default">
      	                    <header class="panel-heading font-bold">Forum - Prune Topics</header>
      	                    <div class="panel-body">
<?php // prune module for forum boards

if ($userStatus >= 3) //if the user is an administrator
   {


    if(isset($_POST['submit']))
    {
     $prune=$_POST['prune'];
     $rightnow=date("U"); //gets today's date
     $deletetime=$rightnow-$prune*24*3600;
 
      $selectthreads="SELECT*from forum_posts where te_lapsed<'$deletetime' and thread_parent='0'";
      $selectthreads2=pg_query($dbconn, $selectthreads) or die("Could not select threads");
      while($selectthreads3=pg_fetch_array($selectthreads2))
      {
        $deletethreads="Delete from forum_posts where thread_parent='$selectthreads3[id]'";
        pg_query($dbconn, $deletethreads) or die("Could not delete threads");
      }
      $deletetopics="DELETE from forum_posts where te_lapsed<'$deletetime' and thread_parent='0'";
      pg_query($dbconn, $deletetopics) or die("Topics not deleted");
      $updateforumposts="SELECT * from forum_forums";
      $updateforumposts2=pg_query($dbconn, $updateforumposts) or die("Could not select forums");
      while($updateforumsposts3=pg_fetch_array($updateforumposts2))
      {
         $fposts="SELECT * from forum_posts where post_forum='$updateforumsposts3[id]'";
         $fposts2=pg_query($dbconn, $fposts) or die("Could not select posts");
         $fposts3=pg_num_rows($fposts2);
         $updatepostnumber="update forum_forums set num_posts='$fposts3' where id='$updateforumsposts3[id]'";
         pg_query($dbconn, $updatepostnumber) or die("Cannot update post number");
         $ftopics="SELECT* from forum_posts where thread_parent='0' and post_forum='$updateforumsposts3[id]'";
         $ftopics2=pg_query($dbconn, $ftopics) or die("Could not choose topics");
         $ftopics3=pg_num_rows($ftopics2);
         $updateposttopics="update forum_forums set num_topics='$ftopics3' where id='$updateforumsposts3[id]'";
         pg_query($dbconn, $updateposttopics) or die("Could not update number of topics");
      }
  
      ?>
                                              <div class="alert alert-success">
                                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                          <i class="fa fa-ok-sign"></i><strong>Well done!</strong>
                                                          Pruning Finished.
                                                        </div>
            <?php

    }
    else
    {

      print "<form action='?page=forum/prune' method='post'>Prune Thread without replies over how many days?<br>";
      print "<input type='text' name='prune' length='15'><br><br>";
      print "<input class='btn btn-sm btn-default' type='submit' name='submit' value='submit'>";
      print "</form>";  
    }
   }
else
   {
     	print "You Don't Have Permision to view this page.. Redirecting to Login <META HTTP-EQUIV = 'Refresh' Content = '2; URL =index.php'>";
   }

?>
</div>
      	                  </section>
      	                </div>
