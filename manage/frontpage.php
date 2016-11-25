<?php if(!defined("ADMIN_IS_INCLUDED")){header("Location:unauthorised_error.php");} ?>
<?php
if(isset($_GET['status'])){
	$failed_login = $_GET['status'];
	if($failed_login == '1'){
		?>
		<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4><i class="fa fa-bell-alt"></i>Oh snap!</h4>
                    <p>There were invalid characters in your name.
											<a href="index.php?page=login" class="alert-link">Try and login again</p>
                  </div>
		<?php
	}
	if($failed_login == '2'){
	?>
	<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4><i class="fa fa-bell-alt"></i>Oh snap!</h4>
                    <p>Logging In... Wrong username or password.
							<a href="index.php?page=login" class="alert-link">Try and login again</p>
                  </div>
	<?php
	}
}
?>

 <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body wrapper-lg">
          <div class="row">
            <div class="col-sm-6 b-r">
              <h3 class="m-t-none m-b">Sign in</h3>
              <p>Sign in to meet your friends.</p>
              <form action='index.php' role="form" method="post">
                <div class="form-group">
                  <label>Username</label>
                  <input type='text' name='username' class="form-control" placeholder="Enter username">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Password" name='password' value=''>
                </div>
                <div class="checkbox m-t-lg">
                  <button type="submit" name='login' class="btn btn-sm btn-success pull-right text-uc m-t-n-xs"><strong>Log in</strong></button>
                  <label>
                    <input type="checkbox"> Remember me
                  </label>
                </div>
              </form>
            </div>
            <div class="col-sm-6">
              <h3>Agora Code Community</h3>
              <h5>Adminitrator Login</h5>
              <span class="fa fa-unlock-alt fa-5x"></span>
            </div>
          </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->