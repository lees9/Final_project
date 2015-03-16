<!-- Name: Sang Hoon Lee -->
<!-- Class: CS290 Winter 2015-->
<!-- Assignment: Final Project -->
<!-- Title: Warriors Messageboard -->
<!--Citation: http://code.tutsplus.com/tutorials/how-to-create-a-phpmysql-powered-forum-from-scratch-net-10188-->
	<!--for header.php, footer.php, save_users.php, script.js, render.php, signup.php, login.php -->
<!-- Citation: Youtube tutorial from TimKippTutorials PHP Series - Building A PHP MySQL Forum Tutorial Series Parts 1-5 (https://www.youtube.com/watch?v=em-rds8afX0)-->
	<!-- for create_topic.php, create_topic_parse.php, post_reply.php, post_reply_parse.php, view_category.php, view_topic.php-->
<!--Used jquery for ajax, and bootstrap for styling.-->

<!DOCTYPE html>
<head>
	<title>Golden State Warriors Messageboard</title>
	<meta charset='UTF-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" name="viewport">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	

</head>
<body>
		<div class = "container">
		<div class="jumbotron" id="menu">
			<div class="page-header">
  			<h1>All things Warriors<br /><small>Fan forum for the Golden State Warriors</small></h1>
			</div>
				<p><a class="btn btn-primary btn-lg" href="render.php" role="button">Home</a>

			<?php
			if ($_SESSION["logged_on"] == 1){
				
	 			echo '<a class="btn btn-danger" href="logout.php" role="button" align="right">Logout</a>';
	 		}
			?>
		</p>
	</div>
</div>
		<div class="col-lg-10 col-lg-offset-1" id="content" name="content">
