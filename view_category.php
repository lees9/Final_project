<?php
session_start();
if ($_SESSION["logged_on"] != 1){
	header("Location: login.php");
}
include_once ('mysql.php');
include 'header.php';
?>
	<h3>Welcome to the Warriors forum<h3>
	<h4>View Categories</h4>

	<div id="post">
	<?php
		$cid = $_GET['cid'];
		
		$logged = "<a class='btn btn-primary btn-lg' href='create_topic.php?cid=".$cid."'>Create Topic</a>";
		
		$return = "<a class='btn btn-primary btn-lg' href='render.php'>Return to forum Index</a>";
		echo "<p>" . $logged . "&nbsp" . $return . "</p>";
		$sql = "SELECT id FROM Categories WHERE id='".$cid."' LIMIT 1";
		$res = mysqli_query($conn, $sql);
		$row_count = mysqli_num_rows($res);
		if (mysqli_num_rows($res) == 1){
			$sql2 = "SELECT * FROM Topic WHERE category_id='".$cid."' ORDER BY topic_reply_date DESC";
			$res2 = mysqli_query($conn, $sql2);
			if (mysqli_num_rows($res2) > 0){
				while ($row = mysqli_fetch_assoc($res2)){
					$tid = $row['id'];
					$title = $row['topic_title'];
					$views = $row['topic_views'];
					$date = $row['topic_date'];
					$creator = $row['topic_creator'];

					$topics .= "<a class='list-group-item' href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."<small><span class='post_info'> - Posted by: ".$creator." on ".$date."</span></small></a>";
				}

				echo "<h3>$title</h3>";
				echo "<div class='list-group'>";
				echo $topics.'</div>';
			}
			else{
				echo "<p><a href='render.php'>Return to forum Index</a></p>";
				echo "<p>There are no topics in this category.</p>".$logged;

			}
		}
		else{
			echo "<p><a href='render.php'>Return to forum Index</a></p>";
			echo "<p>You are trying to view a category that does not exist.</p>";
		}
	?>
		</div>

<?php include 'footer.php'; ?>


