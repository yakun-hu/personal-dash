<!DOCTYPE html>
<?php 
/* The following code will prevent any user, who is not the author, from seeing this page,
including visitors; these other users will be redirected back to the display page, of the post. */
include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php';
$post_ID = $_GET['post_ID'];
$output = check_edit_perm('blind');
if ($output != 1) {
	header("Location: http://personal-dash/post.post-number.php?post_ID=$post_ID");
	// correct.header-redir: header("Location: post.post-number.php?post_ID=$post_ID"); 
	// correct-URL: include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php';
}
?>
<html>
<body>

<?php 
require 'C:\wamp64\www\personal-dash\php_local_libs\db.conn-inc.php';
$post_ID = $_GET['post_ID'];
// $post_author_username = $_GET['author'];
?>
<!-- // Form submission issue: when an apostraphe is included, text does not enter into db, and there's no feedback for user #
Try WP.MIC-H2S35 H3S3 H4S6 later # -->
<form action="edit-mysql-redir.php?post_ID=<?php echo $post_ID; ?>" method="post">
  <label for="text1">1. Text:</label><br>
  <input type="text" id="text1" name="text1" value="<?php
  // the updated text is not displayed, immediately after clicking save; the page has to be refreshed
  // however, I can circumvent this, by re-directing users back to the display page, following refresh # 
	$sql = "SELECT text1 FROM dash_blind_posts WHERE post_ID=$post_ID"; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	echo $row["text1"]; 
  ?>" minlength="1" maxlength="18"><br>
  <input type="submit" name="submit" value="Save">
</form> 
</body>
</html>

<!-- dev.live-URL http://personal-dash/dash-edit.php?post_ID=1 -->

<!-- Testing changelog, in reverse-chron
21:04 pm EDT 10/19/22:
	Added code from conditional.static-redir,test.php
	Test.case-1: check_edit_perm('blind');
		Result: Viewers can see the page. 
	Test.case-2: check_edit_perm('lucy');
		Failed: Redirected, but to wrong URL: http://personal-dash/post.post-number.php?post_ID=
		Fix: Re-add the $_GET retrieval, to above the $output declaration: $post_ID = $_GET['post_ID'];
		Test passed: redirected, to correct URL: http://personal-dash/post.post-number.php?post_ID=1
	Dependency.test-1: check_edit_perm('blind');
		Database update function continues to work. All tests passed. 
-->
