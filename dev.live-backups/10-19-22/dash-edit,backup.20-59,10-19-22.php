<!DOCTYPE html>
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