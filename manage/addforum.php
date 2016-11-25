<?php
if(!defined("ADMIN_IS_INCLUDED")){header("Location:unauthorised_error.php");}
?>
<div class="col-sm-6">
      	                  <section class="panel panel-default">
      	                    <header class="panel-heading font-bold">Forum - Add Forum</header>
      	                    <div class="panel-body">
<?php
if ($userStatus >= 3)
   {
    if(isset($_POST['submit']))
    {
      $forumname=$_POST['forumname'];
      $description=$_POST['description'];
      $sort=$_POST['sort'];
      $permission=$_POST['permission'];
      $parent=$_POST['parent'];
      $permissionpost=$_POST['permissionpost'];
      $permissionreply=$_POST['permissionreply'];
      $insertforum="INSERT into forum_forums(name, description, parent_id, sort, permission_min, permission_post, permission_reply) values('$forumname', '$description','$parent','$sort','$permission','$permissionpost','$permissionreply')";
      mysqli_query($dbconn, $insertforum) or die ("Could not insert forum");
      ?>
                                  <div class="alert alert-success">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <i class="fa fa-ok-sign"></i><strong>Well done!</strong>
                                              Category <b><?php echo $forumname; ?></b> Successfully Added.
                                            </div>
                                  <?php
    }
      print "<form action='?page=addforum' method='post'>Type name of forum to add:<br>";
      print "<input type='text' name='forumname' length='15'><br><br>";
      print "What category?<br><br>";
      $getcats="SELECT * from forum_categories order by cat_sort ASC";
      $getcats2=mysqli_query($dbconn, $getcats) or die("Could not get categories");
      print "<select name='parent'>";
      while($getcats3=mysqli_fetch_array($getcats2))
      {
        print "<option value='$getcats3[category_id]'>$getcats3[category_name]</option><br>";
      }
      print "</select><br><br>";
      print "Order which it appears in the category:(lower values displays first)<br><br>";
      print "<input type='text' name='sort' value='0'><br><br>";
      print "Minimum Permission needed to view forum?<br><br>";
      print "<select name='permission'>";
      print "<option value='-1'>All</option><br>";
      print "<option value='0'>Members</option><br>";
      print "<option value='1'>Moderators</option><br>";
      print "<option value='2'>Supermoderators</option><br>";
      print "<option value='3'>Administrators</option><br>";
      print "</select><br><br>";
      print "Minimum Permission needed to Post in forum?<br><br>";
      print "<select name='permissionpost'>";
      print "<option value='-1'>All</option><br>";
      print "<option value='0'>Members</option><br>";
      print "<option value='1'>Moderators</option><br>";
      print "<option value='2'>Supermoderators</option><br>";
      print "<option value='3'>Administrators</option><br>";
      print "</select><br><br>";
      print "Minimum Permission needed to Reply in forum?<br><br>";
      print "<select name='permissionreply'>";
      print "<option value='-1'>All</option><br>";
      print "<option value='0'>Members</option><br>";
      print "<option value='1'>Moderators</option><br>";
      print "<option value='2'>Supermoderators</option><br>";
      print "<option value='3'>Administrators</option><br>";
      print "</select><br><br>";
      print "Type a forum Description:<br>";
      print "<textarea rows='6' name='description' cols='45'></textarea><br><br>";
      print "<input type='submit' name='submit' value='Create Forum'></form>";  
   }
else
   {
		print "You Don't Have Permision to view this page.. Redirecting to Login <META HTTP-EQUIV = 'Refresh' Content = '2; URL =index.php'>";
   }

?>
</div>
      	                  </section>
      	                </div>
