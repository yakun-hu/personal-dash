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
// echo validate_username($_POST['username']); 
/* Consider the impact on efficiency 1) define validate_password before it is
used, and it might not be used 2) not using these from an include */
function validate_password($password) {
	if(fetch_password($_POST['username']) == $password) {
		return true;
	} else {
		return false;
	}
}
// echo validate_password($_POST['password']); 
if(validate_username($_POST['username'])) {
	if(validate_password($_POST['password'])) {
		$_SESSION['username'] = $_POST['username'];
		header("Location: http://personal-dash/index.php"); 
		} else {
			header("Location: http://personal-dash/login.php?password=wrong");
		}
	} else {
		header("Location: http://personal-dash/login.php?username=notexist");
}		
/* The first functionality of the login-redir, in its MVP-model, is to redir to index.html. 
Test: land on the URL, and the page should automatically redir to index.html
	Passed 10/20/22 22:15 with no additional code. # */
?>
<!-- test-URL http://personal-dash/testing-progress/login.validate-redir,test.php -->
<!-- Testing-changelog 
4:30 AM 11/8/22:
	Added conditional operation of both validate functions:
		Test: logged in with correct username + pass.
			Test passed: logged into index.php
		Test: logged in with missing username. 
			Test passed: redirected to login.php, with URL append ?username=notexist
		Test: logged in with matching username, but wrong password.
			Test passed: redirected to login.php, with URL append ?password=wrong. 
	Added validate_password function # 
		Test: logged in with correct password.
			Test passed: 1 is displayed. 
		Test: logged in with incorrect password. 
			Test passed: nothing is displayed. 
	Added validate_username function # 
	Test:
		Logged in with username that exists in the database:
		Test passed: 1 is displayed, for both row 1, and row 2. 
	Test:
		Logged in with username that does not exist in the database:
		Test passed: nothing is displayed. 
	Note: This while loop should stop when fetch_assoc runs out of rows<80% 11/8/22>
	according to PHP-docs, fetch_assoc returns null when no more rows. How does
	this affect the while loop? If the $row variable is empty, does it continue?
	Added echo 'hey'; after the while loop, when username is not found, still displayed,
	which means the loop is not going on forever.
00:26 AM 10/21/22: 
	From http://personal-dash/testing-progress/session.var-assign,test.php
	I made a form submission, with this page linked in the action attribute, and a post
	with a username field entry. This page successfully redirected to the homepage, and
	defined the $_POST variable to # the $_SESSION['username'] superglobal. That variable #
	echoed on the homepage, also ✔️-->