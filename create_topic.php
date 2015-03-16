<?php
session_start();
if ($_SESSION["logged_on"] != 1){
	header("Location: login.php");
}
include_once ('mysql.php');
include 'header.php';
?>

<?php
	echo '<h3>Welcome to the Warriors forum<h3>';
	echo '<h4>Create an account</h4>';
	$cid = $_GET['cid'];
?>
	<!--<fieldset>-->
		<div id="post">
			<form action="create_topic_parse.php" method="post">
				<p>Topic Title</p>
				<input type="text" class="form-control" name="topic_title" placeholder="Title" /></input>
				<br />
				<p>Topic Content</p>
				<textarea name="topic_content" class="form-control" rows="5" cols="75" placeholder="Content"></textarea>
				<br /><br />
				<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
				<input type="submit" name="topic_submit" value="Create Topic" />
			</form>
		</div>
	<!--</fieldset>-->


<?php
	include 'footer.php';
?>