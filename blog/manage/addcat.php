<?php
if(!defined("STAFF_IS_INCLUDED")){header("Location:unauthorised_error.php");}
?>
<div class="col-sm-6">
      	                  <section class="panel panel-default">
      	                    <header class="panel-heading font-bold">Forum - Add category</header>
      	                    <div class="panel-body">
<?php
if ($userStatus >= "3")
   {
      if(isset($_POST['submit']))
      {
        $sort=$_POST['sort'];
        $catname=$_POST['catname'];
        $addcategory="INSERT into forum_categories (category_name, cat_sort) values('$catname','$sort')";
        pg_query($dbconn, $addcategory) or die("Could not add categories");
        ?>
        <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ok-sign"></i><strong>Well done!</strong>
                    Category <b><?php echo $catname; ?></b> Successfully Added.
                  </div>
        <?php

      }
      	
      	?>
      	   	
      	                      <form role="form" action="?page=forum/addcat" method="post" data-validate="parsley">
      	                        <div class="form-group">
      	                          <label>Type name of category to add:</label>
      	                          <input type="text" class="form-control" placeholder="Enter Name of Category" name="catname" length="15" data-required="true">
      	                        </div>
      	                        <div class="form-group">
      	                          <label>Order this category will show?(Lower number shows first)</label>
      	                          <input type="text" class="form-control" placeholder="Order" name="sort" value="0" data-type="number" data-required="true">
      	                        </div>
      	                        <button type="submit" class="btn btn-sm btn-default" name="submit" value="submit">Submit</button>
      	                      </form>
      	                    
      	   	<?php
       
   }
   
else
   {
			print "You Don't Have Permision to view this page.. Redirecting to Login <META HTTP-EQUIV = 'Refresh' Content = '2; URL =index.php'>";
   }

?>
</div>
      	                  </section>
      	                </div>
