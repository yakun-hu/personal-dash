<?php
require 'C:\wamp64\www\personal-dash\php_local_libs\db.conn-inc.php'; 
// The following variable will also pull from the URL, once that is set up #
$post_ID = $_GET['post_ID'];
// $post_author_username = $_GET['author'];
// Most users have an isset function to fill the $_POST variables; I'm declaring it off the bat, which means it's always
// declared <see-below>
$text1 = $_POST["text1"];
$url1 = 'https://www.w3schools.com/php/php_mysql_update.asp';
$text2 = 'Bridge';
$url2 = 'https://www.w3schools.com/php/php_if_else.asp';

// This statement declares a variable, to prep the db-call, but does not, in itself, run a db-call. 
$sql = "UPDATE dash_blind_posts SET text1='$text1' WHERE post_ID=$post_ID";
// This statement is needed, referring to 'database.php', every time code is to be run, to the db # 
	$conn->query($sql);
	// echo $conn->error
	// this echo can be repeated for each instance # 
$sql = "UPDATE dash_blind_posts SET url1='$url1' WHERE post_ID=$post_ID";
	$conn->query($sql);
$sql = "UPDATE dash_blind_posts SET text2='$text2' WHERE post_ID=$post_ID";
	$conn->query($sql);
$sql = "UPDATE dash_blind_posts SET url2='$url2' WHERE post_ID=$post_ID";
	$conn->query($sql);
// After implementing $post_ID, and URL appends, the next link will need to call the $post_ID variable, as an append #
header("Location: post.post-number.php?post_ID=$post_ID"); 

?>