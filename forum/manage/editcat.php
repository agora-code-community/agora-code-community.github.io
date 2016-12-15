<?php
if(!defined("STAFF_IS_INCLUDED")){header("Location:unauthorised_error.php");}
?>
<div class="col-sm-6">
      	                  <section class="panel panel-default">
      	                    <header class="panel-heading font-bold">Forum - Edit category</header>
      	                    <div class="panel-body">
<?php
if ($userStatus >= "3")
   {
      if(isset($_POST['submit']))
      {
         if(!$_POST['catname'])
         {
         	?>
         	<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ban-circle"></i><strong>Oh snap!</strong> No category name specified.
                  </div>
         	<?php
         }
         else
         {
           $catid=$_POST['catid'];
           $catname=$_POST['catname'];
           $sort=$_POST['sort'];
           $updatecat="Update forum_categories set category_name='$catname',cat_sort='$sort' where category_id='$catid'";
           pg_query($dbconn,$updatecat) or die("Could not update category");
           ?>
                   <div class="alert alert-success">
                               <button type="button" class="close" data-dismiss="alert">&times;</button>
                               <i class="fa fa-ok-sign"></i><strong>Well done!</strong>
                               Category <b><?php echo $catname; ?></b> Successfully updated.
                             </div>
                   <?php
         }

      }
      else
      {
        $categoryid=$_GET['categoryid'];
        $getcatinfo="SELECT * from forum_categories where category_id='$categoryid'";
        $getcatinfo2=pg_query($dbconn, $getcatinfo) or die("Could not get category info");
        $getcatinfo3=pg_fetch_array($getcatinfo2);
        print "<form action='?page=forum/editcat' method='post'>";
        print "<input type='hidden' name='catid' value='$getcatinfo3[category_id]'>";
        print "Name of Category:<br>";
        print "<input type='text' name='catname' value='$getcatinfo3[category_name]' size='25'><br><br>";
        print "Order the category is shown:<br>";
        print "<input type='text' name='sort' value='$getcatinfo3[cat_sort]'><br><br>";
        print "<input type='submit' class='btn btn-sm btn-default' name='submit' value='Edit Category'></form>";
   
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
