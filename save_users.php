<?php
session_start();
include "mysql.php";


if(isset($_POST['page']) && !empty($_POST['page'])){

		if ($_POST['page'] == "register"){
			$username = $_POST['user_name'];
			$email = $_POST['user_email'];
			$password = $_POST['user_password1'];
			$password_protected = md5($password);
			$us_check = mysqli_real_escape_string($conn, $_POST['user_name']);
			$check = mysqli_query($conn, "SELECT * FROM Users WHERE username='" . $us_check . "'");
			$row_count = mysqli_num_rows($check);
				if ($row_count > 0){
					echo  'Username already exists. Please choose a different username.';
				}
				else{
				
					$sql = "INSERT INTO Users (username, password, email) VALUES ('$username', '$password_protected', '$email')";
					$result = mysqli_query($conn, $sql);

					if (!$result){
						echo "Could not create account. Please try again.";
					}
					else{
						echo 'success=yes';
					}
				}
	}


	elseif($_POST["page"] == "users_login"){ 	
		$user_name = $_POST['user_name'];
		$user_password = $_POST['user_password1'];
		$encrypted_md5_password = md5($user_password);
		$validate_user_information = mysqli_query($conn, "SELECT * FROM Users WHERE username= '".mysqli_real_escape_string($conn, $user_name)."' AND password= '".mysqli_real_escape_string($conn, $encrypted_md5_password)."'");
		$check = mysqli_num_rows($validate_user_information);

		if($check == 1)
		{
			$get_user_information = mysqli_fetch_array($validate_user_information, MYSQLI_BOTH);
			$_SESSION["username"] = $user_name;
			$_SESSION["uid"] = $get_user_information["user_id"];
			$_SESSION["logged_on"] = 1;
			echo 'login_success=yes';
		}
		else
		{
			echo '<br><div class="info">Incorrect username or password.</div><br>';
		}
	}
}

?>