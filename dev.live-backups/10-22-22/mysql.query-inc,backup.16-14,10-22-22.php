<?php
session_start();
require 'C:\wamp64\www\personal-dash\php_local_libs\db.conn-inc.php'; 

function highest_post_ID_sess() {
	$session_username = $_SESSION['username'];
	$sql = "SELECT post_ID FROM dash_{$session_username}_posts ORDER BY post_ID DESC"; 
	global $conn; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	$post_ID = $row["post_ID"]; 
	// print_r($row); 
	// echo $post_ID; 
	return $post_ID; 
} 

highest_post_ID_sess();
?>

<!-- test-url: http://personal-dash/php_local_libs/mysql.query-inc.php --> 
<!-- test-changelog: 
	4:53 AM 10/22/22: 
		highest_post_ID_sess(); call test: global declaration added to $conn variable only.
			Test passed: returned 45. -->