<?php
session_start();
if ($_SESSION["logged_on"] != 1){
	header("Location: login.php");
}
include_once ('mysql.php');
include 'header.php';
?>

<h3>Welcome to the Warriors forum<h3>
<h4>View Topics</h4>

	<div id="post">
	<?php
		$cid = $_GET['cid'];
		$tid = $_GET['tid'];
		$sql = "SELECT * FROM Topic WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
		$res = mysqli_query($conn, $sql);

		$rep = "<a class='btn btn-primary btn-lg' href='post_reply.php?cid=".$cid."&tid=".$tid."'>Reply</a>";
		$ret = "<a class='btn btn-primary btn-lg' href='view_category.php?cid=".$cid."'>Return to Topic</a><hr />";

		echo "<p>" . $rep . "&nbsp" . $ret . "</p>";

		if (mysqli_num_rows($res) != 1){
			echo "Topic does not exist.";
		}

		while ($rows = mysqli_fetch_assoc($res)){
			$sql2 = "SELECT * FROM Posts WHERE category_id='".$cid."' AND topic_id='".$tid."'";
			$res2 = mysqli_query($conn, $sql2);
			$topic_title = $rows['topic_title'];
			while ($row2 = mysqli_fetch_assoc($res2)){
				$topics .= "<a class='list-group-item'><small><span class='post_info'>Posted by: ".$row2['post_creator']." on ".$row2['post_date']."</span></small><br />".$row2['post_content']."</a>";
			}

		}
		
		echo "<h3>".$topic_title."</h3>";
		echo "<div class='list-group'>";
				echo $topics.'</div>';

	?>
		</div>


<?php
	include 'footer.php';
?>