<?php
include 'header.php';
?>

<h3>Welcome to the Warriors forum<h3>
	<h4>User login</h4>
	<div id="error"></div>
	
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

		<a class="btn btn-primary btn-lg" href="javascript:void(0);" onclick="user_login();" role="button">Submit</a>
		<a class="btn btn-primary btn-lg" href="signup.php" role="button">Need an Account?</a>
	</form>
</div>

<?php
	include 'footer.php';
?>

