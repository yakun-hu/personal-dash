<?php 
include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php';
require 'C:\wamp64\www\personal-dash\php_local_libs\testing-inc.php'; 
echo "Your username: ", sess_super_username_check(); 
?>
<html>
<head>
</head>
<body><br><br>
  MIC-home<br>
  <script src="script.js"></script>
<p <?php 
$output = logged_in_binary(); 
if ($output == 1) {
	echo 'hidden';
}
?>><a href="../login.php">Log-in</a></p>
<p <?php 
$output = logged_in_binary(); 
if ($output != 1) {
	echo 'hidden';
}
?>><a href="../process-redir/log.out-redir">Log-out</a></p>
<p>1: <a href="post.post-number.php?author=blind&post_ID=1" data-type="URL" data-id="https://developer.wordpress.org/plugins/">personal-dash</a></p>
</body>
</html>
<!-- Testing changelog, in reverse-chron
6:29 AM 10/21/22:
	Bulk changes: 
		session_start(); removed
		include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php'; added, to top-php
		Log-in button removed. 
		Conditional log.in/out added from log.out-button,test.php
		Test: 
			Log-out displayed when logged-in to 'blind': ✔️
			Log-out clicked, logs-out ✔️
			Log-in is now displayed, with logged.out-status ✔️
			Page display still normal ✔️
			Log-in link works ✔️
			Personal-dash link works ✔️
4:35 AM 10/21/22:
	require 'C:\wamp64\www\personal-dash\php_local_libs\testing-inc.php';  added. 
	sess_super_username_check() swapped in for $_SESSION['username'] in my username.display-echo,test. 
		Test passed. 
22:18 PM 10/20/22:
	First php-encap added. 
	session_start(); added. 
00:51 AM 10/20/22:
	<p>1: URL updated
	Click, links to http://personal-dash/post.post-number.php?author=blind&post_ID=1
	Test passed. -->