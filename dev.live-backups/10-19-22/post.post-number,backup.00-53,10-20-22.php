<!DOCTYPE html>
<html>
<head>
</head>
<body>
  p.dash-home.
  <script src="script.js"></script>
<?php 
// Global requirements, for this script #, and variable declarations #:
require 'C:\wamp64\www\personal-dash\php_local_libs\db.conn-inc.php'; 
include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php';
// require 'db-lib.php'; shelved for the moment due to #  Notice: Undefined variable: conn in C:\wamp64\www\personal-dash\db-lib.php on line 7
// This post_ID defines this specific dash-page, and will be smart, as it will be associated with each author-name, in the format
// [author-name]_[layer]_[count] 
$post_ID = $_GET['post_ID'];
// $post_author_username = $_GET['author'];
?>
<p><a href="index.html">Back</a></p>
<!-- After implementing $post_ID, and URL appends, the next link will need to call the $post_ID variable, as an append #  -->
<p <?php 
$output = check_edit_perm('blind');
if ($output != 1) {
	echo 'hidden';
}
?>><a href="dash-edit.php?post_ID=<?php echo $post_ID; ?>">Edit</a></p>
<p>1: <a href="<?php 
	$sql = "SELECT url1 FROM dash_blind_posts WHERE post_ID=$post_ID"; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	echo $row["url1"]; 
?>" data-type="URL" data-id="https://developer.wordpress.org/plugins/" target="_blank"><?php 
	$sql = "SELECT text1 FROM dash_blind_posts WHERE post_ID = $post_ID"; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	echo $row["text1"]; 
?></a></p>
<p>2: <a href="<?php 
// the require statement propgates <WP.MIC-H2S35>
	$sql = "SELECT url2 FROM dash_blind_posts WHERE post_ID=$post_ID"; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	echo $row["url2"]; 
?>" data-type="URL" data-id="https://developer.wordpress.org/plugins/" target="_blank"><?php 
	$sql = "SELECT text2 FROM dash_blind_posts WHERE post_ID=$post_ID"; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	echo $row["text2"]; 
?></a></p>   
<p>3: <a href="https://developer.wordpress.org/plugins/" data-type="URL" data-id="https://developer.wordpress.org/plugins/" >dev-WP</a>[i]</p>
<p>4: <a href="https://developer.wordpress.org/plugins/" data-type="URL" data-id="https://developer.wordpress.org/plugins/" >dev-WP</a>[i]</p>
<p>5: <a href="https://developer.wordpress.org/plugins/" data-type="URL" data-id="https://developer.wordpress.org/plugins/" >dev-WP</a>[i]</p>
<p>6: <a href="https://developer.wordpress.org/plugins/" data-type="URL" data-id="https://developer.wordpress.org/plugins/" >dev-WP</a>[i]</p>
<p>7: <a href="https://developer.wordpress.org/plugins/" data-type="URL" data-id="https://developer.wordpress.org/plugins/" >dev-WP</a>[i]</p>
<p>8: <a href="https://developer.wordpress.org/plugins/" data-type="URL" data-id="https://developer.wordpress.org/plugins/" >dev-WP</a>[i]</p>
<p>9: <a href="https://developer.wordpress.org/plugins/" data-type="URL" data-id="https://developer.wordpress.org/plugins/" >dev-WP</a>[i]</p>

</body>

</html>

<!-- dev.live-URL http://personal-dash/post.post-number.php?post_ID=1 -->

<!-- Testing changelog, in reverse-chron
17:17 EDT, 10/19/22:
	All code from /testing-progress/threaded.echo-test,2 was pushed to here, in several locations #
	Testing paradigm defined as of https://www.wordpress.materialinchess.com/2022/10/19/h2s51-a-granular-process-of-merging-code/
	H3S2: 'lucy' and 'blind' test repeated, Edit button behavior expected #
	H3S3: Clicking edit icon, still leads to correct URL. 
	H3S3: All redirects, and db-behavior, remains functional. 
	Testing status: ✅
	Backup location: dev.live-backups/post.post-number,backup.17-07,10-19-22
-->
