<?php
session_start();
$_SESSION['username'] = $_POST['username'];
header("Location: http://personal-dash/index.php"); 
/* The first functionality of the login-redir, in its MVP-model, is to redir to index.html. 
Test: land on the URL, and the page should automatically redir to index.html
	Passed 10/20/22 22:15 with no additional code. # */
?>

<!-- test-URL http://personal-dash/testing-progress/login.validate-redir,test.php -->

<!-- Testing-changelog 
00:26 AM 10/21/22: 
	From http://personal-dash/testing-progress/session.var-assign,test.php
	I made a form submission, with this page linked in the action attribute, and a post
	with a username field entry. This page successfully redirected to the homepage, and
	defined the $_POST variable to # the $_SESSION['username'] superglobal. That variable #
	echoed on the homepage, also ✔️-->