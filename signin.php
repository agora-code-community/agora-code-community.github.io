 <?php 
if(!defined("IS_INCLUDED")){header("Location:unauthorised_error.php");}
?>
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
                    <p>Logging In... Wrong username or password or unactivated account.
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
                  <label>Email</label>
                  <input type='email' name='email' class="form-control" placeholder="Enter email">
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
              <h4>Not a member?</h4>
              <p>You can create an account <a href="?page=member&signup" class="text-info">here</a></p>
              <p>OR</p>
              <a href="#" class="btn btn-primary btn-block m-b-sm"><i class="fa fa-facebook pull-left"></i>Sign in with Facebook</a>
              <a href="process.php" class="btn btn-info btn-block m-b-sm"><i class="fa fa-twitter pull-left"></i>Sign in with Twitter</a>
              <a href="#" class="btn btn-danger btn-block"><i class="fa fa-google-plus pull-left"></i>Sign in with Google+</a>
            </div>
          </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->