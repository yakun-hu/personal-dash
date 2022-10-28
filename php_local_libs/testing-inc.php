<?php 
function sess_super_username_check() {
	if (isset($_SESSION['username'])) {
		echo $_SESSION['username'];
	} else {
		echo "username is empty";
	}
}
// sess_super_username_check(); 
?>

<!-- test-url: http://personal-dash/php_local_libs/testing-inc.php -->
<!-- issues-list<fbno>: 
	Inclusion of this page wipes index.php, of its content<unclear> -->	
<!-- testing-log:
	Testing.to-do<fbno>:
		Test this document, when there is an active session, and username # 
	4:21 AM: 
		No session is active, and therefore $_SESSION['username'] is empty.
			Returns "username is empty" ✔️ -->