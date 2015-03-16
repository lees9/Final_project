<?php
session_start();
if ($_SESSION["logged_on"] != 1){
	header("Location: login.php");
}
include_once ('mysql.php');
include 'header.php';

	if (isset($_POST['reply_submit'])){
		$creator = $_SESSION['username'];
		$cid = $_POST['cid'];
		$tid = $_POST['tid'];
		$reply_content = $_POST['reply_content'];
		$sql = "INSERT INTO Posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$tid."', '".$creator."', '".$reply_content."', now())";
		$res = mysqli_query($conn, $sql);
		$sql2 = "UPDATE Categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
		$res2 = mysqli_query($conn, $sql2);
		$sql3 = "UPDATE Topic SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."' LIMIT 1";
		$res3 = mysqli_query($conn, $sql3);

		if (($res) && ($res2) && ($res3)){
			echo "<p>Reply Posted <a class='btn btn-primary btn-lg' href='view_topic.php?cid=".$cid."&tid=".$tid."'>Return</a></p>";
		}
		else{
			echo "Could not post your reply. Please try again";
			echo "<p><a class='btn btn-primary btn-lg' href='view_topic.php?cid=".$cid."&tid=".$tid."'>Return</a></p>";
		}
	}
?>