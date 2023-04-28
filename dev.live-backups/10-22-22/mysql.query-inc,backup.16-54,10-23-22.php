<?php
session_start();
require 'C:\wamp64\www\personal-dash\php_local_libs\db.conn-inc.php'; 
function highest_post_ID_sess() {
	$session_username = $_SESSION['username'];
	$sql = "SELECT post_ID FROM dash_{$session_username}_posts ORDER BY post_ID DESC LIMIT 1"; 
	global $conn; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	$post_ID = $row["post_ID"]; 
	// print_r($row); 
	// echo $post_ID; 
	return $post_ID; 
} 
// highest_post_ID_sess();
function full_post_list_select1() {
	$session_username = $_SESSION['username'];
	$sql = "SELECT post_ID, post_title FROM dash_{$session_username}_posts ORDER BY post_ID DESC"; 
	global $conn; 
	$result = $conn->query($sql); 
	return $result; 
} 
?>
<!-- test-url: http://personal-dash/php_local_libs/mysql.query-inc.php --> 
<!-- test-changelog: 
	2:20 AM 10/23/22:
		full_post_list_select() function imported from db.full-list,test. 
		Dependency altered on page-list.php
		Page-load functionality continues to work. Multiple entries are displayed. 
			Test passed. 
	🟡 Testing.to-do[1]: see 16:16 PM 10/22/22: 
		Technically, I don't know # if the LIMIT worked, or was ineffective. 
		I would need to write a fetch loop in order to test this. Will do this some time later. 
	16:16 PM 10/22/22: 
		LIMIT clause added to highest_post_ID_sess() SELECT: 
		Ref: https://www.w3schools.com/mysql/mysql_limit.asp
		Test:
			Ran page w/ uncommented function call and echo, highest # still returned. 
				Test passed. 	
	4:53 AM 10/22/22: 
		highest_post_ID_sess(); call test: global declaration added to $conn variable only.
			Test passed: returned 45. -->