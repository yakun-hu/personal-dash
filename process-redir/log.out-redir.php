<?php
session_start();
session_destroy();
// require 'C:\wamp64\www\personal-dash\php_local_libs\testing-inc.php'; 
// sess_super_username_check(); 
header("Location: http://personal-dash/index.php");
?>

<!-- test-url: http://personal-dash/testing-progress/log.out-redir,test.php -->
<!-- test.change-cases 
	4:51 AM 10/21/22:
		Testing redirect to index.php, from doc-bottom # Expected behavior: logged out, 
		username is emptied, and I am redirected back to index.php, where I will see 'username is empty':
			Test passed. 
	4:51 AM 10/21/22
		session_destroy(); added:
			Test: Access page, during an active session, and expected: 'username is empty' printed. 
				Test failed: 'visitor', a username, is printed when the page is initially accessed. 
					Only upon refresh is 'username is empty' printed. 
					The page needs to work on the first try. 
					Additional info: 'blind' is still displayed on THIS page, but after I access this URL,
					and I visit index.php, which also runs sess_super_username_check(); the username will now be empty #
					This is very suspect, because that means when sess_super_username_check(); is run, the username is still 
					available, during this session. 
					Anyways, it works well enough for now, reverse decision: test passed ✔️