<?php
if(!defined("STAFF_IS_INCLUDED")){header("Location:unauthorised_error.php");}
?>
<div class="col-sm-6">
      	                  <section class="panel panel-default">
      	                    <header class="panel-heading font-bold">Forum - Delete / Edit category</header>
      	                    <div class="panel-body">
<?php
if ($userStatus >= "3")
   {      
      if(isset($_POST['submit']))
      {
         $catid=$_POST['catid'];
         $deletecategory="DELETE from forum_categories where category_id='$catid'";
         pg_query($dbconn,$deletecategory) or die("Could not delete category");
         ?>
                            <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <i class="fa fa-ok-sign"></i><strong>Well done!</strong>
                                        Category Successfully Deleted.
                                      </div>
                            <?php
      }
      if(isset($_GET['categoryid']))
      {
         $categoryid=$_GET['categoryid'];
         $checkcat="SELECT * from forum_forums where parent_id='$categoryid'";
         $checkcat2=pg_query($dbconn, $checkcat) or die("Could not check category");
         $checkcat3=pg_fetch_array($checkcat2);
         if($checkcat3)
         {
         	
         	?>
         	         	<div class="alert alert-danger">
         	                    <button type="button" class="close" data-dismiss="alert">&times;</button>
         	                    <i class="fa fa-ban-circle"></i><strong>Oh snap!</strong> You cannot delete a category with forums currently in it, you must first delete all the forums in the category.
         	                  </div>
         	         	<?php
         }
         else
         {
           print "<form action='?page=forum/deletecat' method='post'>";
           print "<input type='hidden' name='catid' value='$categoryid'>";
           print "Are you sure you want to delete this category?<br>";
           print "<input type='submit' class='btn btn-sm btn-default'  name='submit' value='Delete this category'></form><br/><br/>";
         }

      }
      	?>
      	         	         	<div class="alert alert-warning">
      	         	                    <button type="button" class="close" data-dismiss="alert">&times;</button>
      	         	                    <i class="fa fa-ban-circle"></i><strong>Heads Up!</strong> <center>You cannot delete categories that have forums in them, you must delete the forums first.</center>
      	         	                  </div>
      	         	         	<?php
        print "<table class='table table-striped table-bordered bootstrap-datatable datatable'>";
        print "<tr class='headline'><td>Category Name</td><td>Delete</td><td>Edit</td></tr>";
        $getcats="SELECT * from forum_categories order by cat_sort ASC";
        $getcats2=pg_query($dbconn, $getcats) or die("Could not grab categories"); 
        while($getcats3=pg_fetch_array($getcats2))
        {
          print "<tr class='forumrow'><td>$getcats3[category_name]</td><td><a class='btn btn-sm btn-default' href='?page=forum/deletecat&categoryid=$getcats3[category_id]'>Delete?</a></td><td><a class='btn btn-sm btn-default' href='?page=forum/editcat&categoryid=$getcats3[category_id]'>Edit?</a></td></tr>";
        }     
      print "</td></tr></table>";    
       
   }
   
else
   {
		print "You Don't Have Permision to view this page.. Redirecting to Login <META HTTP-EQUIV = 'Refresh' Content = '2; URL =index.php'>";
   }

?>
</div>
      	                  </section>
      	                </div>
