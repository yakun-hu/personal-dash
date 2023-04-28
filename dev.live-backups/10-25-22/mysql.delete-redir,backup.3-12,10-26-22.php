<?php
require 'C:\wamp64\www\personal-dash\php_local_libs\db.conn-inc.php'; 
session_start();
$session_username = $_SESSION['username'];
$post_ID = $_GET['post_ID'];
$sql = "DELETE FROM dash_{$session_username}_posts WHERE post_id={$post_ID}"; 
	$conn->query($sql); 
	// echo $sql; 
	echo $conn->error;
header("Location: http://personal-dash/page-list.php"); 
?>

<!-- test-url: http://personal-dash/testing-progress/mysql.delete-redir,test.php --> 
<!-- test-log
	2:07 AM 10/23/22:
		Header redirect updated:
			
	1:49 AM 10/23/22
		Page tested from delete.confirm-test.php, which itself is forwarded from page.list-test.php
		Correct URL-appends propagated, from both previous pages. 
		Table-row was wiped from table. 
		Row-wipe is reflected, immediately, when users redirect back to page-list. 
		No other pages were affected<99%><fbno>
			All tests passed. 