<?php
include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php';
require 'C:\wamp64\www\personal-dash\php_local_libs\testing-inc.php'; 
// echo "Your username: ", sess_super_username_check(); 
// empty_sess_uname_check();
// echo $_SESSION['username']; 
// session_destroy();
?>
<h1>Log-in:</h1>
<form action="/process-redir/login.validate-redir.php" method="post">
  <label for="username">Username</label><br>
  <input type="text" id="username" name="username" required value="Enter-username" minlength="1" maxlength="18"><br>
    <label for="username">Password</label><br>
  <input type="password" id="password" name="password" required value="Enter-pass" minlength="1" maxlength="18"><br>
  <input type="submit" name="submit" value="Login">
 
<?php if(isset($_GET['username'])) {
	echo '<p style="color:red;">Username does not match a record in the database!</p>'; 
}
if(isset($_GET['password'])) {
	echo '<p style="color:red;">Password does not match the column for this username!</p>'; 
} ?>
<!-- test-URL --> 
<!-- test-changelog
5:16 AM 11/8/22:
	Added error messages, using $_GET for username and password. 
		Test passed: Correct error message, depending on condition, is displayed. 
4:00 AM 11/8/22:
	Added a new field for password, type=password, obscured type. 
		Test passed: display on new line, correct label. 
1:55 AM 10/21/22:
	This page should display, when the echo is active, visitor, at the start of a session. 
		Test passed. 
	After a username is typed into the form, and Login clicked, users should be re-directed to the homepage,
	and 'blind' is now displayed, there, as the username. 
		Test-passed. 
 --> 