<?php
session_start();
if ($_SESSION["logged_on"] != 1){
	header("Location: login.php");
}
include_once ('mysql.php');
include 'header.php';

if (isset($_POST['topic_submit'])){
	if(($_POST['topic_title'] == "") && ($_POST['topic_content'] == "")){
		echo "Both Topic Title and Content are required. <a class='btn btn-primary btn-lg' href=view_topic.php?cid=$cid&tid=$new_topic_id>Click to Return</a>";
		exit();
	}
	else{
		$cid = $_POST['cid'];
		$title = $_POST['topic_title'];
		$content = $_POST['topic_content'];
		$creator = $_SESSION["username"];
		$sql = "INSERT INTO Topic (category_id, topic_title, topic_creator, topic_date, topic_reply_date) VALUES ('".$cid."','".$title."', '".$creator."', now(), now())";
		$res = mysqli_query($conn, $sql);
		$new_topic_id = mysqli_insert_id($conn);
		$sql2 = "INSERT INTO Posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$new_topic_id."', '".$creator."', '".$content."', now())";
		$res2 = mysqli_query($conn, $sql2);
		$sql3 = "UPDATE Categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
		$res3 = mysqli_query($conn, $sql3);
		if (($res) && ($res2) && ($res3)){
			echo "Topic has been posted. <a class='btn btn-primary btn-lg' href=view_topic.php?cid=$cid&tid=$new_topic_id>Click to Return</a>";
		}
		else{
			echo "Problem occurred. Please try again. <a class='btn btn-primary btn-lg' href=view_topic.php?cid=$cid&tid=$new_topic_id>Click to Return</a>";
		}

	}
}

?>
<?php
	include 'footer.php';
?>