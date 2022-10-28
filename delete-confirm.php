<?php
session_start(); 
echo '<h1>Confirm-delete?</h1>';
echo 'You are attempting to delete: ' . '<a target="blank" href="../post.post-number.php?author=' . $_SESSION['username'] . '&post_ID=' . $_GET['post_ID'] . '">Post_ID=' . $_GET['post_ID'] . '</a>';
echo '<br>You can click on the Post_ID URL to check your post, or click here to confirm: '; 
echo '<button onclick="delete_forward()">Confirm</button>'; 
?>
<script> 
function delete_forward() {
	location.href = "process-redir/mysql.delete-redir.php?author=<?php echo $_SESSION['username']; ?>&post_ID=<?php echo $_GET['post_ID']; ?>";
}
</script>

<!-- test-url: http://personal-dash/delete-confirm.php -->
<!-- test-log:
	2:03 AM 10/23:
		location.href URL updated to include process-redir/ folder dive #
			Test passed. 
	1:06 AM 10/23/22: 
		Tests passed: 
			Test<h1> displayed on page. 
			Correct post-url genereated, clickable, correct destination, target="blank"
			Confirm button displayed. 
			Clicking the confirm button, onclick, goes to the location.href URL, correct destination. 