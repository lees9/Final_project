
function signup(){

	var username = $("#user_name").val();
	var password1 = $("#user_password1").val();
	var password2 = $("#user_password2").val();
	var email = $("#user_email").val();
	var email_test = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

	if (username == ""){
		$("#error").html('<p>A username is required</p>');
		$("#user_name").focus();
	}
	else if (email == ""){
		$("#error").html("<p>An email is required</p>");
		$("#user_email").focus();
	}
	else if (!(email_test.test(email))){
		$("#error").html("<p>A valid email is required</p>");
		$("#user_email").focus();
	}
	else if(password1 == ""){
		$("#error").html("<p>A password is required</p>");
		$("#user_password1").focus();
	}
	else if (password1 != password2){
		$("#error").html("<p>Both passwords must match</p>");
		$("#user_password1").focus();
	}
	else{
		var dataString = 'user_name='+ username + '&user_password1=' + password1 + '&user_email=' + email + '&page=register';
		$.ajax({
			type: 'POST',
			url: 'save_users.php',
			data: dataString,
			cache: false,
			beforeSend: function(){
				$("#error").html("<p>Creating new account...</p>");
			},
			success: function(response){
				var res = response.indexOf('success=yes');
				if (res != -1){
					$("#error").html("<p>Created!</p>");
					var url = 'login.php';
					window.location.replace(url);
				}
				else{
					$("#error").fadeIn(1000).html(response);
				}
			}
		});

	}
}


function user_login() {
	var usn = $("#user_name").val();
	var passwd = $("#user_password1").val();
	
	if(usn == ""){
		$("#error").html('<p>Please enter a username.</p>');
		$("#user_name").focus();
	}
	else if(passwd == ""){
		$("#error").html('<p>Please enter your account password.</p>');
		$("#user_password1").focus();
	}
	else{
		var dataString = 'user_name=' + usn + '&user_password1=' + passwd + '&page=users_login';
		$.ajax({
			type: "POST",
			url: "save_users.php",
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#error").html("<p>Logging in...</p>");
			},
			success: function(response)
			{
				var response_brought = response.indexOf('login_success=yes');
				if (response_brought != -1) 
				{
					$("#error").html('Logged In');
					var url = 'render.php';
					window.location.replace(url);
				}
				else
				{
					$("#error").fadeIn(1000).html(response);
				}
			}
		});
	}
}

