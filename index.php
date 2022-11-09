<h1>Index-page:</h1>
<?php 
include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php';
require 'C:\wamp64\www\personal-dash\php_local_libs\testing-inc.php'; 
echo "Your username: ", sess_super_username_check(); 
?>
<html><head><style>
.instructions {
	width:400px
}</style></head><body><br><br>
  <script src="script.js"></script>
<a <?php 
$output = logged_in_binary(); 
if ($output != 1) {
	echo 'hidden';
}
?> href="page.create-form.php">(+) New-page | </a>
<a <?php 
$output = logged_in_binary(); 
if ($output != 1) {
	echo 'hidden';
}
?> href="page-list.php">Page-list | </a>
<?php 
$output = logged_in_binary(); 
if ($output == 1) {
?>
<a href="../process-redir/log.out-redir">Log-out</a>
<?php }
else { ?>
<a href="../login.php">Log-in</a> | <a href="../register.php">Register</a>
<?php } ?>

<div class="instructions">
<h2>Instructions for use:</h2>
<p> 1) 1: Job.app-notes[G-docs][2022] add mini-tags with [brackets] in the text-field
to help yourself # remember the destination category. This will minimize
mental.load-pre,click[Turing].</div>

</body></html>
<!-- Testing changelog, in reverse-chron
5:22 AM 11/08/22:
	Added registration button to register.php, echoes conditionally with log-in. 
		Test passed: button appears to the right of log-in, and goes to the correct destination. 
1:03 AM 10/27/22:
	Added <div class="instructions"> with basic styling #, first note. 
		Test passed: Formatting is correct, test displayed, looks good. 
2:17 AM 10/23/22:
	Page-list link added, with conditional control. 
		Link is only displayed, when users are logged in. ✔️
		Clicking on the link, leads to the correct destination. ✔️
	Hard-coded link to post_ID=1 page deleted. ✔️
		Page elements still load 
16:09 PM 10/22/22:
	(+) New-page button added, same-lined as Log buttons. 
	Test: 	
		Displays when user is logged in: ✔️
		Does not display when user is logged out ✔️
6:29 AM 10/22/22:
	Testing code update from Dr. Dunkle: https://wpbuffalo.slack.com/archives/C16QJHY2V/p1666363226103579
		The implementation disregards the hidden attribute and displays the buttons conditionally
		based on an if / else control, however, it leaves the HTML code completely outside of the php-tag,
		which frees up an additional level of php-encap, for other attributes, later. 
			Logged-out, log-in is displayed ✔️
			Logged-in, log-out is displayed ✔️
		I took the code snippet completely outside of HTML tags, by moving </body> and </html> up, and 
		deleting the <p> encapsulation, and the function of code was unaffected. 
			Test-passed. 
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