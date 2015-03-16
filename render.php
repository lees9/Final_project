<?php
session_start();
if ($_SESSION["logged_on"] != 1){
	header("Location: login.php");
}
include 'mysql.php';
include 'header.php';
?>
	<h3>Welcome to the Warriors forum<h3>
	<h4>Main Page</h4>
	<div id="categories">
	<?php
		$sql = "SELECT * FROM Categories ORDER BY category_title ASC";
		$res = mysqli_query($conn, $sql);
		$categories = "";
		if (mysqli_num_rows($res) > 0){
			while ($row = mysqli_fetch_assoc($res)){
				$id = $row['id'];
				$title = $row['category_title'];
				$description = $row['category_description'];
				$categories .= "<a href='view_category.php?cid=".$id."' class=list-group-item>" . $title ." - <font size = '-1'>".$description."</font></a>";
			}
			echo "<div class='list-group'>";
			echo $categories.'</div>';
		}
		else{
			echo "<p>There are no categories available yet.</p>";
		}
	?>

		</div>
<?php
	include 'footer.php';
?>