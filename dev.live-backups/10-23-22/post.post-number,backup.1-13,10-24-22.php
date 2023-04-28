<!DOCTYPE html>
<html>
<head>
</head>
<body>
  page-name |
  <script src="script.js"></script>
<?php 
// Global requirements, for this script #, and variable declarations #:
require 'C:\wamp64\www\personal-dash\php_local_libs\db.conn-inc.php'; 
include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php';
// require 'db-lib.php'; shelved for the moment due to #  Notice: Undefined variable: conn in C:\wamp64\www\personal-dash\db-lib.php on line 7
$post_author_username = $_GET['author'];
$post_ID = $_GET['post_ID'];
?>
<a href="index.php">Index</a> | <?php 
$output = logged_in_binary(); 
if ($output == 1) {
?>
<a href="../process-redir/log.out-redir">Log-out</a>
<?php }
else { ?>
<a href="../login.php">Log-in</a>
<?php } ?>
<!-- After implementing $post_ID, and URL appends, the next link will need to call the $post_ID variable, as an append #  -->
<p <?php 
$output = check_edit_perm($post_author_username);
if ($output != 1) {
	echo 'hidden';
}
?>><a href="dash-edit.php?author=<?php echo $post_author_username; ?>&post_ID=<?php echo $post_ID; ?>">Edit</a></p>
<p>1: <a href="<?php 
	$sql = "SELECT url1 FROM dash_{$post_author_username}_posts WHERE post_ID=$post_ID"; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	echo $row["url1"]; 
?>" data-type="URL" data-id="https://developer.wordpress.org/plugins/" target="_blank"><?php 
	$sql = "SELECT text1 FROM dash_{$post_author_username}_posts WHERE post_ID = $post_ID"; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	echo $row["text1"]; 
?></a></p>
<p>2: <a href="<?php 
// the require statement propgates <WP.MIC-H2S35>
	$sql = "SELECT url2 FROM dash_{$post_author_username}_posts WHERE post_ID=$post_ID"; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	echo $row["url2"]; 
?>" data-type="URL" data-id="https://developer.wordpress.org/plugins/" target="_blank"><?php 
	$sql = "SELECT text2 FROM dash_{$post_author_username}_posts WHERE post_ID=$post_ID"; 
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

<!-- dev.live-URL http://personal-dash/post.post-number.php?author=blind&post_ID=1 -->

<!-- Testing changelog, in reverse-chron
2:19 AM 10/23/22:
	"Back" button renamed to "Index"
01:55 AM EDT, 10/22/22:
	Pushed Dr. Dunkle's conditional implementation, see index.php same time, to login/out buttons. 
		Logged-out, log-in is displayed ✔️
		Logged-in, log-out is displayed ✔️
06:41 AM EDT, 10/21/22:
	Log.in/out pushed from log.out-button,test.php, with same.line-display,UI! 
		Test: 
			Links are displayed correctly, on the same line as Back | ✅
			Conditional control works ✅
			Edit button conditional dependency did not break<fbno> ✅
			Clicking the buttons has the correct-E ✅
00:59 AM EDT, 10/20/22:
	Variable declaration added to global-header: $post_author_username = $_GET['author'];
		Page still loads ✅
	Line 18, swapped in for hard-coded 'blind': $output = check_edit_perm($post_author_username);
		Removed single quote around the previous string. 
		author=blind, Edit button shown ✅
		author=lucy, Edit button hidden ✅
	HTML link display section:
		In every $sql declaration, swapped in variable username with hard-coded 'blind' in the table name:
		$sql = "SELECT url1 FROM dash_{$post_author_username}_posts WHERE post_ID=$post_ID"; 
		author=blind, all text displays ✅
		author=blind, all links load ✅
		author=lucy, text and links hidden ✅ error given. 
	Link to dash-edit updated to include author=:
		<a href="dash-edit.php?author=<?php echo $post_author_username; ?>&post_ID=<?php echo $post_ID; ?>
		Output URL correct ✅ http://personal-dash/dash-edit.php?author=blind&post_ID=1
17:17 EDT, 10/19/22:
	All code from /testing-progress/threaded.echo-test,2 was pushed to here, in several locations #
	Testing paradigm defined as of https://www.wordpress.materialinchess.com/2022/10/19/h2s51-a-granular-process-of-merging-code/
	H3S2: 'lucy' and 'blind' test repeated, Edit button behavior expected #
	H3S3: Clicking edit icon, still leads to correct URL. 
	H3S3: All redirects, and db-behavior, remains functional. 
	Testing status: ✅
	Backup location: dev.live-backups/post.post-number,backup.17-07,10-19-22
-->
