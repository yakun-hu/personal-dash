<?php
require 'C:\wamp64\www\personal-dash\php_local_libs\db.conn-inc.php'; 
// The following variable will also pull from the URL, once that is set up #
$post_author_username = $_GET['author'];
$post_ID = $_GET['post_ID'];
// $post_author_username = $_GET['author'];
// Most users have an isset function to fill the $_POST variables; I'm declaring it off the bat, which means it's always
// declared <see-below>
$text1 = $_POST["text1"];
$url1 = 'https://www.w3schools.com/php/php_mysql_update.asp';
$text2 = 'Bridge';
$url2 = 'https://www.w3schools.com/php/php_if_else.asp';

// This statement declares a variable, to prep the db-call, but does not, in itself, run a db-call. 
$sql = "UPDATE dash_{$post_author_username}_posts SET text1='$text1' WHERE post_ID=$post_ID";
// This statement is needed, referring to 'database.php', every time code is to be run, to the db # 
	$conn->query($sql);
	// echo $conn->error
	// this echo can be repeated for each instance # 
$sql = "UPDATE dash_{$post_author_username}_posts SET url1='$url1' WHERE post_ID=$post_ID";
	$conn->query($sql);
$sql = "UPDATE dash_{$post_author_username}_posts SET text2='$text2' WHERE post_ID=$post_ID";
	$conn->query($sql);
$sql = "UPDATE dash_{$post_author_username}_posts SET url2='$url2' WHERE post_ID=$post_ID";
	$conn->query($sql);
// After implementing $post_ID, and URL appends, the next link will need to call the $post_ID variable, as an append #
header("Location: post.post-number.php?author=$post_author_username&post_ID=$post_ID"); 
?>

<!-- dev.live-url http://personal-dash/edit-mysql-redir.php?author=blind&post_ID=1 -->

<!-- Testing changelog, in reverse-chron
1:11 AM EDT, 10/20/22:
	Variable declaration added to global-header: $post_author_username = $_GET['author'];
		Test pending...
		Page functions normally, when the full test from dash-edit is run ✅
	Link to post.post-number updated to include dynamic author propagation:
		header("Location: post.post-number.php?author=$post_author_username&post_ID=$post_ID"); 
		Correct redirect test: http://personal-dash/post.post-number.php?author=blind&post_ID=1
		Test passed ✅
	sql = "UPDATE dash_blind_posts SET text1='$text1' WHERE post_ID=$post_ID";
		4 instances updated, but only 1 form shows right now. 
		Update still works, when form is used from dash-edit ✅