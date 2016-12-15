<?php
if(!defined("STAFF_IS_INCLUDED")){header("Location:unauthorised_error.php");}
?>
<div class="col-sm-12">
      	                  <section class="panel panel-default">
      	                    <header class="panel-heading font-bold">Forum - Delete Forums</header>
      	                    <div class="panel-body">
<?php
if ($userStatus >= 3)
   {


    if(isset($_POST['ID']))
    {
      $ID=$_POST['ID'];
      $delposts="Delete from forum_posts where post_forum='$ID'";
      pg_query($dbconn, $delposts) or die("Could not delete posts");
      $delf="DELETE from forum_forums where ID='$ID'";
      pg_query($dbconn, $delf) or die("Could not delete forum");
      
      ?>
                                        <div class="alert alert-success">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <i class="fa fa-ok-sign"></i><strong>Well done!</strong>
                                                    Forum and threads within forum delete successfully.
                                                  </div>
      <?php

    }
    if(isset($_GET['ID']))
    {
      $ID=$_GET['ID'];
      print "<form action='?page=forum/deleteforum' method='post'>";
      print "Are you sure you want to delete this forum?<br>";
      print "<input type='hidden' name='ID' value='$ID'>";
      print "<input type='submit' class='btn btn-sm btn-default' name='submit' value='Delete This Forum'></form>";   
    }

      $forumdisp="SELECT * from forum_forums order by sort ASC";
      $forumdisp2=pg_query($dbconn, $forumdisp) or die("Could not display forums");
      $getcats="SELECT * from forum_categories order by cat_sort ASC";
      $getcats2=pg_query($dbconn, $getcats) or die("Could not query categories");
      print "<br><center><table class='table table-bordered bootstrap-datatable datatable'>";
      print "<tr><td><b>Forum name</b></td>";
      print "<td><b>Forum Description</b></td>";
      print "<td><b>Delete?</b></td></tr>";
      while($getcats3=pg_fetch_array($getcats2))
      {
        print "<tr class='bg-primary dker'><td colspan='3'>$getcats3[category_name]</td></tr>";
        while ($forumdisp3=pg_fetch_array($forumdisp2))
        {
          if($getcats3['category_id']==$forumdisp3['parent_id'])
            {
              print "<tr class='forumrow'><td valign='top'>$forumdisp3[name]</td>";
              print "<td valign='top'>$forumdisp3[description]</td>";
              print "<td valign='top'><a class='btn btn-sm btn-default' href='?page=forum/deleteforum&ID=$forumdisp3[id]'>Delete this forum</a><br/></td></tr>";
            } 
        }  
      }
      print "</table></center>";  
   }
else
   {
		print "You Don't Have Permision to view this page.. Redirecting to Login <META HTTP-EQUIV = 'Refresh' Content = '2; URL =index.php'>";
   }

?>
</div>
      	                  </section>
      	                </div>
