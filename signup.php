<?php
include 'header.php';
?>
	<h3>Welcome to the Warriors forum<h3>
	<h4>Create an account</h4>
	<div id="error"></div>
<div class="container-fluid">
	<fieldset>
	<div class="form-groups">
	<form method="post" action='<?php echo $_SERVER['PHP_SELF']; ?>'>
	<div class="form-group">
    	<label for="user_name">Username</label>
    	<input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter Username">
  	</div>

  	<div class="form-group">
    	<label for="user_password1">Password</label>
    	<input type="password" class="form-control" id="user_password1" name="user_password1" placeholder="Enter Password">
  	</div>

  	<div class="form-group">
    	<label for="user_password2">Confirm password</label>
    	<input type="password" class="form-control" id="user_password2" name="user_password2" placeholder="Confirm Password">
  	</div>

  	<div class="form-group">
    	<label for="user_email">email</label>
    	<input type="text" class="form-control" id="user_email" name="user_email" placeholder="Enter Email">
  	</div>
		<a class="btn btn-primary btn-lg" href="javascript:void(0);" onclick="signup();" role="button">Submit</a>
		<a class="btn btn-primary btn-lg" href="login.php" role="button">Already Registered?</a>
	</fieldset>
	</form>
</div>
</div>

<?php
	include 'footer.php';
?>
