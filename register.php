<?php
include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php';
require 'C:\wamp64\www\personal-dash\php_local_libs\testing-inc.php'; 
?>
<h1>Register:</h1>
<form action="/process-redir/registration.process-redir.php" method="post">
  <label for="username">Username</label><br>
  <input type="text" id="username" name="username" required value="Enter-username" minlength="1" maxlength="18"><br>
    <label for="username">Password</label><br>
  <input type="password" id="password" name="password" required value="Enter-pass" minlength="1" maxlength="18"><br>
  <input type="submit" name="submit" value="Register">
 
<br><br>Note: do not set a secure password, because admin can see that column in the db. 
<?php if(isset($_GET['username'])) {
	echo '<p style="color:red;">Username already exists!</p>'; 
} ?>
<!-- test-URL http://personal-dash/register.php --> 
<!-- test-changelog
 --> 