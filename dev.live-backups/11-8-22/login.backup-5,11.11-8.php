<?php
include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php';
require 'C:\wamp64\www\personal-dash\php_local_libs\testing-inc.php'; 
echo "Your username: ", sess_super_username_check(); 
// empty_sess_uname_check();
// echo $_SESSION['username']; 
// session_destroy();
?>
<form action="/process-redir/login.validate-redir.php" method="post">
  <label for="username">Username</label><br>
  <input type="text" id="username" name="username" required value="Enter-username" minlength="1" maxlength="18"><br>
    <label for="username">Password</label><br>
  <input type="password" id="password" name="password" required value="Enter-pass" minlength="1" maxlength="18"><br>
  <input type="submit" name="submit" value="Login"><br><br>
<!-- test-URL --> 
<!-- test-changelog
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