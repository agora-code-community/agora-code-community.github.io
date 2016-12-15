<?php
if(!defined("STAFF_IS_INCLUDED")){header("Location:unauthorised_error.php");}
?>
<div class="col-sm-12">
      	                  <section class="panel panel-default">
      	                    <header class="panel-heading font-bold">Forum - Edit Forums</header>
      	                    <div class="panel-body">
<?php
if ($userStatus >= 3)
   {


    if(isset($_GET['ID']))
    {

     $ID=$_GET['ID'];
     if(isset($_POST['submit']))
     {
      $forumtitle=$_POST['forumtitle'];
      $description=$_POST['description'];
      $sort=$_POST['sort'];
      $permission=$_POST['permission'];
      $parent=$_POST['parent'];
      $permissionpost=$_POST['permissionpost'];
      $permissionreply=$_POST['permissionreply'];
      $updateforum="UPDATE forum_forums set name='$forumtitle', description='$description', sort='$sort', permission_min='$permission', parent_id='$parent', permission_post='$permissionpost', permission_reply='$permissionreply' where id='$ID'";
      pg_query($dbconn, $updateforum) or die("could not edit forum");
      ?>
                                              <div class="alert alert-success">
                                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                          <i class="fa fa-ok-sign"></i><strong>Well done!</strong>
                                                          Forum edited successfully.
                                                        </div>
            <?php
     }
     else
     {
      $editforum="SELECT * from forum_forums where id='$ID'";
      $editforum2=pg_query($dbconn, $editforum) or die("Could not display forum details");
      $editforum3=pg_fetch_array($editforum2);
      $getcurrentcat="SELECT parent_id,category_name,category_id from forum_forums a, forum_categories b where b.category_id=a.parent_id";
      $getcurrentcat2=pg_query($dbconn, $getcurrentcat) or die("Could not get category");
      $getcurrentcat3=pg_fetch_array($getcurrentcat2);
      print "<form action='?page=forum/edit&ID=$editforum3[id]' method='post'>";
      print "<b>Title:</b><br>";
      print "<input type='text' name='forumtitle' value='$editforum3[name]' length='25'><br><br>";
      print "Which category does this forum belong to?<br><br>";
      $getcats="SELECT * from forum_categories order by cat_sort ASC";
      $getcats2=pg_query($dbconn, $getcats) or die("Could not get categories");
      print "<select name='parent'>";
      print "<option value='$getcurrentcat3[category_id]'>$getcurrentcat3[category_name]</option>";
      while($getcats3=pg_fetch_array($getcats2))
      {
        print "<option value='$getcats3[category_id]'>$getcats3[category_name]</option><br>";
      }
      print "</select><br><br>";
      print "Order which it appears in the category:(lower values displays first)<br><br>";
      print "<input type='text' name='sort' value='$editforum3[sort]'><br><br>";
      print "Minimum Permission needed to view forum?<br><br>";
      $permissionview=getstatus($editforum3['permission_min']);
      print "<select name='permission'>";
      print "<option value='$editforum3[permission_min]'>$permissionview</option>";
      print "<option value='-1'>All</option><br>";
      print "<option value='0'>Members</option><br>";
      print "<option value='1'>Moderators</option><br>";
      print "<option value='2'>Supermoderators</option><br>";
      print "<option value='3'>Administrators</option><br>";
      print "</select><br><br>";
      print "Minimum Permission needed to Post in forum?<br><br>";
      $permissionpost=getstatus($editforum3['permission_post']);
      print "<select name='permissionpost'>";
      print "<option value='$editforum3[permission_post]'>$permissionpost</option>";
      print "<option value='-1'>All</option><br>";
      print "<option value='0'>Members</option><br>";
      print "<option value='1'>Moderators</option><br>";
      print "<option value='2'>Supermoderators</option><br>";
      print "<option value='3'>Administrators</option><br>";
      print "</select><br><br>";
      print "Minimum Permission needed to Reply in forum?<br><br>";
      $permissionreply=getstatus($editforum3['permission_reply']);
      print "<select name='permissionreply'>";
      print "<option value='$editforum3[permission_reply]'>$permissionreply</option>";
      print "<option value='-1'>All</option><br>";
      print "<option value='0'>Members</option><br>";
      print "<option value='1'>Moderators</option><br>";
      print "<option value='2'>Supermoderators</option><br>";
      print "<option value='3'>Administrators</option><br>";
      print "</select><br><br>";
      print "<b>Description</b><br>";
      print "<textarea rows='6' name='description' cols='45'>$editforum3[description]</textarea><br><br>";
      print "<input type='submit' name='submit' value='submit'></form>";
     }
    }
    else
    {
      $forumdisp="SELECT * from forum_forums order by sort ASC";
      $forumdisp2=pg_query($dbconn, $forumdisp) or die("Could not display forums");
      $getcats="SELECT * from forum_categories order by cat_sort ASC";
      $getcats2=pg_query($dbconn, $getcats) or die("Could not query categories");
      print "<br><center><table class='table table-bordered bootstrap-datatable datatable'>";
      print "<tr><td><b>Forum name</b></td>";
      print "<td><b>Forum Description</b></td>";
      print "<td><b>Order</b></td>";
      print "<td><b>Permission level needed:</b></td>";
      print "<td><b>Edit</b></td></tr>";
      while($getcats3=pg_fetch_array($getcats2))
      {
        print "<tr class='bg-primary dker'><td colspan='5'>$getcats3[category_name]</td></tr>";
        while ($forumdisp3=pg_fetch_array($forumdisp2))
        {
          $permission=getstatus($forumdisp3['permission_min']);
          if($getcats3['category_id']==$forumdisp3['parent_id'])
            {
              print "<tr class='forumrow'><td valign='top'>$forumdisp3[name]</td>";
              print "<td valign='top'>$forumdisp3[description]</td>";
              print "<td valign='top'>$forumdisp3[sort]</td>";
              print "<td valign='top'>$permission</td>";
              print "<td valign='top'><a class='btn btn-sm btn-default' href='?page=forum/edit&ID=$forumdisp3[id]'>Edit</a></td></tr>";
            } 
        }    
      }
      print "</table></center>";
     }
    
   }
else
   {
		print "You Don't Have Permision to view this page.. Redirecting to Login <META HTTP-EQUIV = 'Refresh' Content = '2; URL =index.php'>";
   }

?>
<?php
//function for getting member status
function getstatus($statnum)
{
  if($statnum==-1)
  {
     return "All";
  }
  else if ($statnum==0)
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
}

  
?>
</div>
      	                  </section>
      	                </div>