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
	echo '<h4>Post Reply</h4>';
	$cid = $_GET['cid'];
	$tid = $_GET['tid'];
?>
	<fieldset>
		<div id="post">
			<form action="post_reply_parse.php" method="post">
				<textarea class="form-control" name="reply_content" rows="5" cols="75" placeholder="Reply"></textarea>
				<br /><br />
				<input type="hidden" name="cid" value="<?php echo $cid;?>" />
				<input type="hidden" name="tid" value="<?php echo $tid;?>" />
				<input type="submit" name="reply_submit" value="Submit" />
			</form>
		</div>
	</fieldset>


<?php
	include 'footer.php';
?>