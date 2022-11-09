<?php
require 'C:\wamp64\www\personal-dash\php_local_libs\mysql.query-inc.php'; 
function validate_username($username) {
	$result = full_users_tb_select(); 
	while($row = $result->fetch_assoc()) {
		if($_POST['username'] == $row['username']) {
			return true;
		}
	}
	return false; 
} 
function highest_user_ID() {
	$sql = "SELECT user_ID FROM users_tb ORDER BY user_ID DESC LIMIT 1"; 
	global $conn; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	$user_ID = $row["user_ID"]; 
	// print_r($row); 
	// echo $user_ID; 
	return $user_ID; 
}
if(validate_username($_POST['username'])) {
	header("Location: http://personal-dash/register.php?username=duplicate");
} else {
	$sql = "CREATE TABLE dash_{$_POST['username']}_posts (post_ID bigint(20), post_title TEXT, text1 TEXT, url1 TEXT, text2 TEXT, url2 TEXT, text3 TEXT, url3 TEXT, text4 TEXT, url4 TEXT, text5 TEXT, url5 TEXT, text6 TEXT, url6 TEXT, text7 TEXT, url7 TEXT, text8 TEXT, url8 TEXT, text9 TEXT, url9 TEXT, notes LONGTEXT, back_url TEXT, attributes TEXT)";
	$conn->query($sql); 
	// echo $sql; 
	echo $conn->error;
	$user_ID = highest_user_ID() + 1; 
	$sql = "INSERT INTO users_tb (user_ID, username, password) VALUES ($user_ID, '{$_POST['username']}', '{$_POST['password']}')";
	$conn->query($sql); 
	// echo $sql; 
	echo $conn->error;
} ?>
<!-- test-URL http://personal-dash/testing-progress/login.validate-redir,test.php -->
<!-- Testing-changelog 
5:47 AM 11/8/22:
	Added highest_user_ID function, with incremeted variable, and insert new row to user_tb:
		All user information added correctly, user_ID is +1 from highest. 
		Problem: rest of the file still runs, even when there is a duplicate username, because
		interpreter still runs rest of the file, despite redirect. Solution:
		Rearranged conditional setup, to only execute the 2 MySQL-statements,
		if validate_username comes back as false, else redirect. 
		Test passed:
			Creation of duplicate table and row in users_tb blocked, if username exists. 
			When there is no duplicate, creation still works. 
	Added CREATE TABLE with name that includes the $POST['username']):
		Test passed: table with correct name created, and all columns, with correct types. 
5:30 AM 11/8/22:
	Added validate_username with reverse logic to login-validate. 
		Test passed: redirect back to register.php with GET 'duplicate' if match, 
		else forward here without redirect. 
-->